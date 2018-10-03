<?php
function sfsi_save_shortlink($post_id,$toshortlink){

	global $wpdb;
	$table	 = $wpdb->prefix."sfsi_shorten_links";

	$sql 	 = "SELECT * FROM ".$table." WHERE `post_id` = ".$post_id." AND shorteningMethod = '".get_shortning_method()."'  AND `longUrl` = '".$toshortlink."'";
	$thepost = $wpdb->get_row($sql);

	if($thepost!==null){		
		$wpdb->query( $wpdb->prepare( "DELETE FROM $table WHERE post_id = %d AND shorteningMethod = %s AND longUrl!=%s",$post_id,get_shortning_method(),$toshortlink));
	}
	else{			
			$fshortlink = sfsi_url_short_api($toshortlink);				

			if(strlen($fshortlink)>0){
				$data = array(
						'shorteningMethod' =>get_shortning_method(),
		        		'shortenUrl' => $fshortlink,
		        		'longUrl'	 => $toshortlink,  
		        		'post_id' 	 => $post_id
					);
		     	$wpdb->insert( $table, $data);			
			}		
	  }	
}

function get_shortning_method(){
	$option5 =  unserialize(get_option('sfsi_premium_section5_options',false));	
	$sfsi_apiSettingType  = (isset($option5['sfsi_plus_url_shorting_api_type_setting']))
															? sanitize_text_field($option5['sfsi_plus_url_shorting_api_type_setting'])
															: 'no';
	return $sfsi_apiSettingType;
}

function is_url_shortner_on(){
	$sfsi_urlShortner_on_off  = (get_shortning_method()=="no")? false:true;
	return $sfsi_urlShortner_on_off;
}
function get_shortlink_from_db($post_id){

	$shortlink = '';
	
	if(is_url_shortner_on()){
	
		global $wpdb;
	
		$table	 = $wpdb->prefix."sfsi_shorten_links";

		$toshortlink = get_permalink($post_id);

		$sql 	 = "SELECT * FROM ".$table." WHERE `post_id` = '".$post_id."' AND shorteningMethod = '".get_shortning_method()."' AND `longUrl` = '".$toshortlink."'";
		$thepost = $wpdb->get_row($sql);

		if($thepost!==null){
			$shortlink = $thepost->shortenUrl;
		}		
	}
	return $shortlink;	
}

/*************************** SAVE shortlink ON POST CREATION ON UPDATE  *****************************************/
function sfsi_save_admin_shortlink($post_id){
	
	if(is_url_shortner_on()){
	    
	    // Avoid creating shortlinks during an autosave
	    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	        return;	    	
	    if (defined('DOING_AJAX') && DOING_AJAX)
	        return;    
	    if ( wp_is_post_revision( $post_id ) )
			return;

		if(false === function_exists('get_current_screen')){
			require_once(ABSPATH . 'wp-admin/includes/screen.php');
			$screen = get_current_screen();			
		}
        	else{
            		$screen = get_current_screen();             
        	}
        				
		if($screen->action=='add')
			return;

		$toshortlink = get_permalink($post_id);	
		sfsi_save_shortlink($post_id,$toshortlink);  	    			
	}

}
add_action( 'save_post', 'sfsi_save_admin_shortlink');

/*************************** SAVE shortlink ON page load ON UPDATE  *****************************************/

function sfsi_save_content_shortlink($content){

	if(is_url_shortner_on()){	
		$toshortlink = get_permalink($GLOBALS['post']->ID);	
		sfsi_save_shortlink($GLOBALS['post']->ID,$toshortlink);
	}
	return $content;
}
add_filter('the_content','sfsi_save_content_shortlink',1);

function delete_post_shortlinks($post_id){
	global $wpdb;
	$table	 = $wpdb->prefix."sfsi_shorten_links";
	$wpdb->query( $wpdb->prepare( "DELETE FROM $table WHERE post_id = %d",$post_id));
}
add_action('before_delete_post', 'delete_post_shortlinks');

/*************************** call shortlink bitly or google API  *****************************************/


function sfsi_custom_wp_default_shortlinks( $shortlink, $id, $context ) {
	
	global $post;
	
	$shortlink = isset($post->ID) && !empty($post->ID) ? get_bloginfo('url').'?p='.$post->ID : $shortlink;
    
    return $shortlink;
}

add_filter( 'pre_get_shortlink', 'sfsi_custom_wp_default_shortlinks', 10, 3 );

function sfsi_get($url) {

    $the = wp_remote_get($url, array('timeout' => '30',));

    if (is_array($the) && '200' == $the['response']['code'])
        return json_decode($the['body'], true);
}

function sfsi_url_short_api($toshortlink){

	$shortlink = '';

	$option5 =  unserialize(get_option('sfsi_premium_section5_options',false));
	
	// Get settings & api key
	$sfsi_apiSettingType  = (isset($option5['sfsi_plus_url_shorting_api_type_setting']))
															? sanitize_text_field($option5['sfsi_plus_url_shorting_api_type_setting'])
															: 'no';
	$sfsi_bitly_key       = (isset($option5['sfsi_plus_url_shortner_bitly_key']))
															? sanitize_text_field($option5['sfsi_plus_url_shortner_bitly_key'])
															: '';															
	$sfsi_google_key      = (isset($option5['sfsi_plus_url_shortner_google_key']))
															? sanitize_text_field($option5['sfsi_plus_url_shortner_google_key'])
															: '';

	if($sfsi_apiSettingType=='no'){
		$post_id   = url_to_postid($toshortlink);
		$post_type = get_post_type($post_id);
		$shortlink = wp_get_shortlink($post_id,$post_type,false);
		return $shortlink;
	}													
	else if($sfsi_apiSettingType=='bitly'){
		$shortlink = sfsi_bitly_shortlink($toshortlink,$sfsi_bitly_key);
		return $shortlink;		
	}															
	else if($sfsi_apiSettingType=='google'){
		$shortlink = sfsi_google_shortlink($toshortlink,$sfsi_google_key);
		return $shortlink;
	}																
}

function sfsi_bitly_shortlink($toshortlink,$oauthToken){
	
	$shortlink = get_shortlink_from_db($toshortlink);
   
    if (!empty($shortlink)) {
        
        $url = "https://api-ssl.bitly.com/v3/expand?access_token=".$oauthToken."&shortUrl=".$shortlink;

      	$response = sfsi_get($url);

        if ($toshortlink == $response['data']['expand'][0]['long_url'])
            return $shortlink;
    }
    else{
    	
    	$url = "https://api-ssl.bitly.com/v3/shorten?access_token=".$oauthToken."&longUrl=".urlencode($toshortlink);

	    $response = sfsi_get($url);

	    if (is_array($response) && $response['status_code']==200) {

	        $shortlink = isset($response['data']['url']) && !empty($response['data']['url']) ? $response['data']['url']: '';

	        return $shortlink;
	    }
	    else{
	    	
	    	$shortlink = '';
	    	return $shortlink;
	    }
    }
}

function sfsi_google_shortlink($toshortlink,$apiKey){

	$url = 'https://www.googleapis.com/urlshortener/v1/url';
				
	$result = wp_remote_post(
		add_query_arg(
			'key', 
			$apiKey, 
			'https://www.googleapis.com/urlshortener/v1/url'
		), 
			array(
				'body' => json_encode(array('longUrl' => esc_url_raw($toshortlink))),
				'headers' => array( 'Content-Type' => 'application/json')
			)
	);

	if(is_wp_error($result)){return;}

	$result = json_decode($result['body']);
	
	$outshortlink = isset($result->id) && !empty($result->id) ? $result->id : '';

	return $outshortlink;
}
?>