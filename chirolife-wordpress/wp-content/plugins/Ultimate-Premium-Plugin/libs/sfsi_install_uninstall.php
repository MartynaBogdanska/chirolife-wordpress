<?php
//adding some meta tags for facebook news feed
function sfsi_plus_checkmetas()
{
	$is_seo_plugin_active = false;

	if ( ! function_exists( 'get_plugins' ) )
	{
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}
	$all_plugins = get_plugins();
	foreach($all_plugins as $key => $plugin)
	{
		if(is_plugin_active($key))
		{
			if(preg_match("/(seo|search engine optimization|meta tag|open graph|opengraph|og tag|ogtag)/im", $plugin['Name']) || preg_match("/(seo|search engine optimization|meta tag|open graph|opengraph|og tag|ogtag)/im", $plugin['Description']))
			{
				$is_seo_plugin_active = true;
				break;
			}
		}
	}
	return $is_seo_plugin_active;
}

function sfsi_plus_add_fields_for_desktop_icons_order_option5($option5 = false,$option1 = false){

	$option5 = false != $option5 && is_array($option5) ? $option5: unserialize(get_option('sfsi_premium_section5_options',false));
    $option1 = false != $option1 && is_array($option1) ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));
    
    $arrIcons = array( 1=>"rss",2=> "email",3=> "fb",4=> "google",5=>"twitter",6=>"share",7=>"youtube",8=>"pinterest",9=>"linkedin",10=>"instagram",11=>"houzz",12=>"snapchat",
    	13=>"whatsapp",14=>"skype",15=>"vimeo",16=>"soundcloud",17=>"yummly",18=>"flickr",19=>"reddit",20=>"tumblr");

	$arrDefaultIconsOrder = array();

	foreach ($arrIcons as $defaultIndex => $iconName) {
		
    	$data = array(
    		
    		"iconName" => $iconName,
    		"index"    => sfsi_getOldDesktopIconOrder($iconName,$defaultIndex,$option5)
    	);

		array_push($arrDefaultIconsOrder, $data);		
	}

	if(isset($option5['sfsi_plus_CustomIcons_order']) && !empty($option5['sfsi_plus_CustomIcons_order']) && is_string($option5['sfsi_plus_CustomIcons_order'])){

		$sfsi_plus_CustomIcons_order = unserialize($option5['sfsi_plus_CustomIcons_order']); 

		if(isset($sfsi_plus_CustomIcons_order) && !empty($sfsi_plus_CustomIcons_order) && is_array($sfsi_plus_CustomIcons_order)){

			foreach ($sfsi_plus_CustomIcons_order as $iconData) {
				
		    	$data = array(
		    		
		    		"iconName" 			 => 'custom',
		    		"index"    			 => $iconData['order'],
		    		"customElementIndex" => $iconData['ele']
		    	);

				array_push($arrDefaultIconsOrder, $data);		
			}

			// Now remove old data for custom icon order
			unset($option5['sfsi_plus_CustomIcons_order']);
		}

	}
	else{

			$customIcons = array();

	        if(isset($option1['sfsi_custom_files']) && !empty($option1['sfsi_custom_files']) ){

	            $sfsi_custom_files = $option1['sfsi_custom_files'];

	            if( is_string($sfsi_custom_files) ){
	                $customIcons = unserialize($sfsi_custom_files);
	            }

	            else if( is_array($sfsi_custom_files) ){
	                $customIcons = $sfsi_custom_files;
	            }
	        } 		

	        if(!empty($customIcons)){

	        	foreach ($customIcons as $key => $value) {

		            $data = array();
		            $data['iconName']           = 'custom';
		            $data['index']              = count($arrDefaultIconsOrder)+1;
		            $data['customElementIndex'] = $key;			        		
	        		
	        		array_push($arrDefaultIconsOrder, $data);

	        	}

	        }
	}


	// Now remove old order data for standard icons
	foreach ($arrIcons as $key => $iconName) {
		
        $key = ("fb"== $iconName) ? 'sfsi_plus_facebookIcon_order': 'sfsi_plus_'.$iconName.'Icon_order';
		
		if( isset($option5[$key]) && !empty($option5[$key]) ){
			unset($option5[$key]);
		} 	
	}

	update_option('sfsi_premium_section5_options', serialize($option5));

	return $arrDefaultIconsOrder;	
}

function sfsi_plus_update_plugin()
{
	if($feed_id = sanitize_text_field(get_option('sfsi_premium_feed_id')))
	{
		if(is_numeric($feed_id))
		{
			$sfsiId = SFSI_PLUS_updateFeedUrl();
			update_option('sfsi_premium_feed_id'		, sanitize_text_field($sfsiId->feed_id));
			update_option('sfsi_premium_redirect_url'	, sanitize_text_field($sfsiId->redirect_url));
		}
	}
	
	//Install version
	update_option("sfsi_premium_pluginVersion", PLUGIN_CURRENT_VERSION);

	if(!get_option('sfsi_premium_serverphpVersionnotification'))
	{
		add_option("sfsi_premium_serverphpVersionnotification", "yes");
	}

	$option9 = unserialize(get_option('sfsi_premium_section9_options',false));

	if(isset($option9) && !empty($option9)){

		if(!isset($option9['sfsi_plus_form_privacynotice_text']))
		{
			$option9['sfsi_plus_form_privacynotice_text'] = 'We will treat your data confidentially';
		}

		if(!isset($option9['sfsi_plus_form_privacynotice_font']))
		{
			$option9['sfsi_plus_form_privacynotice_font'] = 'Helvetica,Arial,sans-serif';
		}
		if(!isset($option9['sfsi_plus_form_privacynotice_fontcolor']))
		{
			$option9['sfsi_plus_form_privacynotice_fontcolor'] = '#000000';
		}

		if(!isset($option9['sfsi_plus_form_privacynotice_fontsize']))
		{
			$option9['sfsi_plus_form_privacynotice_fontsize'] = 20;
		}

		if(!isset($option9['sfsi_plus_form_privacynotice_fontalign']))
		{
			$option9['sfsi_plus_form_privacynotice_fontalign'] = 'center';
		}
	}
	else{
		/* subscription form */
	    $option9 = array(
	    	'sfsi_plus_form_adjustment'			=> 'yes',
	        'sfsi_plus_form_height'				=> '180',
	        'sfsi_plus_form_width' 				=> '230',
	        'sfsi_plus_form_border'				=> 'yes',
	        'sfsi_plus_form_border_thickness'	=> '1',
	        'sfsi_plus_form_border_color'		=> '#b5b5b5',
	        'sfsi_plus_form_background'			=> '#ffffff',
			
	        'sfsi_plus_form_heading_text'		=>'Get new posts by email:',
	        'sfsi_plus_form_heading_font'		=>'Helvetica,Arial,sans-serif',
	        'sfsi_plus_form_heading_fontstyle'	=>'bold',
	        'sfsi_plus_form_heading_fontcolor'	=>'#000000',
	        'sfsi_plus_form_heading_fontsize'	=>'16',
	        'sfsi_plus_form_heading_fontalign'	=>'center',
			
			'sfsi_plus_form_field_text'			=>'Enter your email',
	        'sfsi_plus_form_field_font'			=>'Helvetica,Arial,sans-serif',
	        'sfsi_plus_form_field_fontstyle'	=>'normal',
	        'sfsi_plus_form_field_fontcolor'	=>'#000000',
	        'sfsi_plus_form_field_fontsize'		=>'14',
	        'sfsi_plus_form_field_fontalign'	=>'center',
			
			'sfsi_plus_form_button_text'		=>'Subscribe',
	        'sfsi_plus_form_button_font'		=>'Helvetica,Arial,sans-serif',
	        'sfsi_plus_form_button_fontstyle'	=>'bold',
	        'sfsi_plus_form_button_fontcolor'	=>'#000000',
	        'sfsi_plus_form_button_fontsize'	=>'16',
	        'sfsi_plus_form_button_fontalign'	=>'center',
	        'sfsi_plus_form_button_background'	=>'#dedede',

			'sfsi_plus_form_privacynotice_text'		 =>'We will treat your data confidentially',
	        'sfsi_plus_form_privacynotice_font'		 =>'Helvetica,Arial,sans-serif',
	        'sfsi_plus_form_privacynotice_fontcolor' =>'#000000',
	        'sfsi_plus_form_privacynotice_fontsize'	 =>'16',
	        'sfsi_plus_form_privacynotice_fontalign' =>'center'
	    );
	}

	update_option('sfsi_premium_section9_options',  serialize($option9));	

	/*Extra important options*/
	$sfsi_premium_instagram_sf_count = array(
		"date" => strtotime(date("Y-m-d")),
		"sfsi_plus_sf_count" => "",
		"sfsi_plus_instagram_count" => ""
	);
	add_option('sfsi_premium_instagram_sf_count',  serialize($sfsi_premium_instagram_sf_count));
	
	/*Float Icon setting*/
	$option8 = unserialize(get_option('sfsi_premium_section8_options',false));

	if(isset($option8) && !empty($option8))
	{
		if(!isset($option8['sfsi_plus_icons_floatMargin_top'])){
			$option8['sfsi_plus_icons_floatMargin_top']    = '';
			$option8['sfsi_plus_icons_floatMargin_bottom'] = '';
			$option8['sfsi_plus_icons_floatMargin_left']   = '';
			$option8['sfsi_plus_icons_floatMargin_right']  = '';			
		}
		if(!isset($option8['sfsi_plus_rectpinit']))
		{
			$option8['sfsi_plus_rectpinit'] = 'no';
		}
		if(!isset($option8['sfsi_plus_rectfbshare']))
		{
			$option8['sfsi_plus_rectfbshare'] = 'no';
		}

		if(!isset($option8['sfsi_plus_exclude_page'])){
			$option8['sfsi_plus_exclude_page'] 	= 'no';
		}

		// *** New exclusion rule added for Custom Post types & Taxnomies in VERISON 4.0  STARTS **** //
		if(!isset($option8['sfsi_plus_switch_exclude_custom_post_types']))
		{
			$option8['sfsi_plus_switch_exclude_custom_post_types'] = 'no';
		}
		if(!isset($option8['sfsi_plus_list_exclude_custom_post_types']))
		{
			$option8['sfsi_plus_list_exclude_custom_post_types'] = serialize(array());
		}

		if(!isset($option8['sfsi_plus_switch_exclude_taxonomies']))
		{
			$option8['sfsi_plus_switch_exclude_taxonomies'] = 'no';
		}
		if(!isset($option8['sfsi_plus_switch_exclude_taxonomies']))
		{
			$option8['sfsi_plus_list_exclude_taxonomies'] = serialize(array());
		}
		// *** New exclusion rule added for Custom Post types & Taxnomies in VERISON 4.0  CLOSES **** //


		// *** New inclusion rule added for in VERISON 8.4  STARTS **** //

		if(!isset($option8['sfsi_plus_icons_rules']))
		{
			$option8['sfsi_plus_icons_rules'] = 2;
		}

		if(!isset($option8['sfsi_plus_include_home']))
		{
			$option8['sfsi_plus_include_home'] = 'no';
		}
		if(!isset($option8['sfsi_plus_include_page']))
		{
			$option8['sfsi_plus_include_page'] = 'no';
		}
		if(!isset($option8['sfsi_plus_include_post']))
		{
			$option8['sfsi_plus_include_post'] = 'no';
		}
		if(!isset($option8['sfsi_plus_include_tag']))
		{
			$option8['sfsi_plus_include_tag'] = 'no';
		}
		if(!isset($option8['sfsi_plus_include_category']))
		{
			$option8['sfsi_plus_include_category'] = 'no';
		}
		if(!isset($option8['sfsi_plus_include_date_archive']))
		{
			$option8['sfsi_plus_include_date_archive'] = 'no';
		}
		if(!isset($option8['sfsi_plus_include_author_archive']))
		{
			$option8['sfsi_plus_include_author_archive'] = 'no';
		}
		if(!isset($option8['sfsi_plus_include_search']))
		{
			$option8['sfsi_plus_include_search'] = 'no';
		}
		if(!isset($option8['sfsi_plus_include_url']))
		{
			$option8['sfsi_plus_include_url'] = 'no';
		}
		if(!isset($option8['sfsi_plus_include_urlKeywords']))
		{
			$option8['sfsi_plus_include_urlKeywords'] = array();
		}
		if(!isset($option8['sfsi_plus_switch_include_custom_post_types']))
		{
			$option8['sfsi_plus_switch_include_custom_post_types'] = 'no';
		}
		if(!isset($option8['sfsi_plus_list_include_custom_post_types']))
		{
			$option8['sfsi_plus_list_include_custom_post_types'] = serialize(array());
		}
		if(!isset($option8['sfsi_plus_switch_include_taxonomies']))
		{
			$option8['sfsi_plus_switch_include_taxonomies'] = 'no';
		}
		if(!isset($option8['sfsi_plus_list_include_taxonomies']))
		{
			$option8['sfsi_plus_list_include_taxonomies'] = serialize(array());
		}
		// *** New inclusion rule added for Custom Post types & Taxnomies in VERISON 4.0  CLOSES **** //

		if(!isset($option8['sfsi_plus_textBefor_icons_font']))
		{
			$option8['sfsi_plus_textBefor_icons_font'] = 'inherit';
		}
		if(!isset($option8['sfsi_plus_textBefor_icons_fontcolor']))
		{
			$option8['sfsi_plus_textBefor_icons_fontcolor'] = '#000000';
		}

		if(!isset($option8['sfsi_plus_shortcode_horizontal_verical_Alignment'])){
			$option8['sfsi_plus_shortcode_horizontal_verical_Alignment'] = 'Horizontal';			
		}

		if(!isset($option8['sfsi_plus_display_after_pageposts'])){
			$option8['sfsi_plus_display_after_pageposts'] = 'no';			
		}
		if(!isset($option8['sfsi_plus_display_before_pageposts'])){
			$option8['sfsi_plus_display_before_pageposts'] = 'no';			
		}

		if(!isset($option8['sfsi_plus_taxonomies_for_icons'])){
			$option8['sfsi_plus_taxonomies_for_icons'] = serialize(array());			
		}

		if(!isset($option8['sfsi_plus_post_icons_vertical_spacing'])){
			$option8['sfsi_plus_post_icons_vertical_spacing'] = 5;			
		}														
		update_option('sfsi_premium_section8_options', serialize($option8));
	}

	// Add key for choosing  custom icons on mobile in Question 1-> Want to show different icons for mobile?
	$option1 = unserialize(get_option('sfsi_premium_section1_options',false));

	if(isset($option1) && !empty($option1)){

		if(!isset($option1['sfsi_custom_mobile_icons'])){
			$option1['sfsi_custom_mobile_icons'] = '';
		}

		if(!isset($option1['sfsi_custom_desktop_icons'])){
			$option1['sfsi_custom_desktop_icons'] = $option1['sfsi_custom_files'];
		}

		update_option('sfsi_premium_section1_options', serialize($option1));
	}

	//******** Set default selection of socila icons in Content selection option added in Question 7 in VERSION 3.6 STARTS *****//	
	$option7 = unserialize(get_option('sfsi_premium_section7_options',false));
	
	if(isset($option7) && !empty($option7))
	{
		if(!isset($option7['sfsi_plus_popup_type_iconsOrForm']))
		{
			$option7['sfsi_plus_popup_type_iconsOrForm'] = 'icons';
		}
	}
	update_option('sfsi_premium_section7_options', serialize($option7));

	//******** Set default selection of socila icons in Content selection option added in Question 7 in VERSION 3.6 CLOSES *****//
	
	$option5 =  unserialize(get_option('sfsi_premium_section5_options',false));
	
	if(isset($option5) && !empty($option5))
	{
		if(!isset($option5['sfsi_plus_follow_icons_language'])){
			$option5['sfsi_plus_follow_icons_language']  = 'Follow_en_US';
		}

		if(!isset($option5['sfsi_plus_facebook_icons_language'])){
			$option5['sfsi_plus_facebook_icons_language'] = 'Visit_us_en_US';
		}

		if(!isset($option5['sfsi_plus_twitter_icons_language'])){
			$option5['sfsi_plus_twitter_icons_language']  = 'Visit_us_en_US';
		}

		if(!isset($option5['sfsi_plus_google_icons_language'])){
			$option5['sfsi_plus_google_icons_language']   = 'Visit_us_en_US';
		}

		if(!isset($option5['sfsi_plus_icons_language'])){
			$option5['sfsi_plus_icons_language'] 		  = 'en_US';
		}
				
		if(!isset($option5['sfsi_plus_social_sharing_options'])){
			$option5['sfsi_plus_social_sharing_options'] = 'posttype';
		}
		if(!isset($option5['sfsiSocialMediaImage'])){
			$option5['sfsiSocialMediaImage'] 			 = '';
		}
		if(!isset($option5['sfsiSocialtTitleTxt'])){
			$option5['sfsiSocialtTitleTxt'] 			 = '';
		}
		if(!isset($option5['sfsiSocialDescription'])){
			$option5['sfsiSocialDescription'] 			 = '';
		}
		if(!isset($option5['sfsiSocialPinterestImage'])){
			$option5['sfsiSocialPinterestImage'] 		 = '';
		}
		if(!isset($option5['sfsiSocialPinterestDesc'])){
			$option5['sfsiSocialPinterestDesc'] 		 = '';
		}		
		if(!isset($option5['sfsiSocialTwitterDesc'])){
			$option5['sfsiSocialMediaImage'] 			 = '';
		}
		if(!isset($option5['sfsi_plus_loadjquery'])){
			$option5['sfsi_plus_loadjquery'] 			 = 'yes';
		}
		if(!isset($option5['sfsi_plus_nofollow_links'])){
			$option5['sfsi_plus_nofollow_links'] 		 = 'no';
		}

        if(!isset($option5['sfsi_plus_icons_suppress_errors'])){
        	
        	$sup_errors = "no";
        	$sup_errors_banner_dismissed = true;

        	if(defined('WP_DEBUG') && false != WP_DEBUG){
            	$sup_errors = 'yes';
            	$sup_errors_banner_dismissed = false;
        	}

            $option5['sfsi_plus_icons_suppress_errors'] = $sup_errors;
            update_option('sfsi_plus_error_reporting_notice_dismissed',$sup_errors_banner_dismissed);            
        }		
	}
	
	/*Youtube Channelid settings*/
	$option4 = unserialize(get_option('sfsi_premium_section4_options',false));
	if(isset($option4) && !empty($option4) && !isset($option4['sfsi_plus_youtube_channelId']))
	{
		$option4['sfsi_plus_youtube_channelId'] = '';
		update_option('sfsi_premium_section4_options', serialize($option4));
	}

	/*add whasapp page share and email page share*/
	$option2 = unserialize(get_option('sfsi_premium_section2_options',false));
	if(isset($option2) && !empty($option2) && !isset($option2['sfsi_plus_whatsapp_share_page']))
	{
		$option2['sfsi_plus_whatsapp_share_page'] 		= '${title} ${link}';
		$option2['sfsi_plus_email_icons_subject_line'] 	= '${title}';
		$option2['sfsi_plus_email_icons_email_content'] = 'Check out this article «${title}»: ${link}';
		update_option('sfsi_premium_section2_options', serialize($option2));
	}
	$option2 = unserialize(get_option('sfsi_premium_section2_options',false));

	if(isset($option2) && !empty($option2) )
	{
		if(!isset($option2['sfsi_plus_skype_options'])){
			$option2['sfsi_plus_skype_options'] 		= 'call';			
		}
		if(!isset($option2['sfsi_plus_my_whatsapp_number'])){
			$option2['sfsi_plus_my_whatsapp_number'] 	= '';			
		}		
		update_option('sfsi_premium_section2_options', serialize($option2));
	}	

	$option5 = unserialize(get_option('sfsi_premium_section5_options',false));
	
	if(isset($option5) && !empty($option5) )
	{
		if(false  == isset($option5['sfsi_plus_mobile_icon_alignment_setting'])){
			$option5['sfsi_plus_mobile_icon_alignment_setting'] 		= 'no';			
		}
		
		if(false  == isset($option5['sfsi_plus_mobile_horizontal_verical_Alignment'])){
			$option5['sfsi_plus_mobile_horizontal_verical_Alignment'] 		= 'Horizontal';			
		}

		if(!isset($option5['sfsi_plus_mobile_icons_Alignment_via_widget'])){
			$option5['sfsi_plus_mobile_icons_Alignment_via_widget'] 	= 'left';
		}

		if(!isset($option5['sfsi_plus_mobile_icons_Alignment_via_shortcode'])){
        	$option5['sfsi_plus_mobile_icons_Alignment_via_shortcode'] 	= 'left';
		}				
		
		if(!isset($option5['sfsi_plus_mobile_icons_Alignment'])){
        	$option5['sfsi_plus_mobile_icons_Alignment'] 				= 'left';
		}				
		
		if(!isset($option5['sfsi_plus_mobile_icons_perRow'])){
        	$option5['sfsi_plus_mobile_icons_perRow'] 					= '5';
		}				

		if(!isset($option5['sfsi_plus_horizontal_verical_Alignment'])){
			$option5['sfsi_plus_horizontal_verical_Alignment'] 	= 'Horizontal';
	        $option5['sfsi_plus_icons_Alignment_via_shortcode'] = 'left';
	        $option5['sfsi_plus_icons_Alignment_via_widget'] 	= 'left';
		}
		if(!isset($option5['sfsi_plus_twitter_summery'])){
			$option5['sfsi_plus_tooltip_Color'] 		= '#FFF';
        	$option5['sfsi_plus_tooltip_border_Color'] 	= '#e7e7e7';
        	$option5['sfsi_plus_tooltip_alighn'] 		= 'Automatic';			
		}

		if(!isset($option5['sfsi_plus_Facebook_linking'])){
			$option5['sfsi_plus_Facebook_linking'] 		= 'facebookurl';
        	$option5['sfsi_plus_facebook_linkingcustom_url'] 	= '';			
		}

		if(!isset($option5['sfsi_plus_mobile_icons_order_setting'])){
			$option5['sfsi_plus_mobile_icons_order_setting'] = 'no';
		}

		if(!isset($option5['sfsi_order_icons_desktop'])){
			$orderArrDesktopIcons = sfsi_plus_add_fields_for_desktop_icons_order_option5($option5);
			$option5['sfsi_order_icons_desktop'] = serialize($orderArrDesktopIcons);
		}

		if(!isset($option5['sfsi_order_icons_mobile'])){

			$option1 = 	unserialize(get_option('sfsi_premium_section1_options',false));

			if("no" == $option1['sfsi_plus_icons_onmobile'] && "no" == $option5['sfsi_plus_mobile_icons_order_setting']
				&& isset($option5['sfsi_order_icons_desktop']) && !empty($option5['sfsi_order_icons_desktop'])){

				$option5['sfsi_order_icons_mobile']  = unserialize($option5['sfsi_order_icons_desktop']);				
			}

			else{

				$option5['sfsi_order_icons_mobile']  = serialize(array());
			}

		}

        update_option('sfsi_premium_section5_options', serialize($option5));
	}
	
	$option4 = unserialize(get_option('sfsi_premium_section4_options',false));
	
	if(isset($option4) && !empty($option4))
	{
		if(!isset($option4['sfsi_plus_facebook_countsFrom_blog'])){
			$option4['sfsi_plus_facebook_countsFrom_blog'] 		= '';
		}
		if(!isset($option4['sfsi_plus_pinterest_appid'])){
			$option4['sfsi_plus_pinterest_appid'] = "";			
		}
		if(!isset($option4['sfsi_plus_pinterest_appsecret'])){
			$option4['sfsi_plus_pinterest_appsecret'] = "";			
		}
		if(!isset($option4['sfsi_plus_pinterest_appurl'])){
			$option4['sfsi_plus_pinterest_appurl'] = "";			
		}		
		update_option('sfsi_premium_section4_options', serialize($option4));						
	}

	/** Url shortner data table **/
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_s_name    = $wpdb->prefix."sfsi_shorten_links";
	
	if($wpdb->get_var("SHOW TABLES LIKE '$table_s_name'") != $table_s_name) {
		$sql = "CREATE TABLE $table_s_name (
		  id bigint(9) NOT NULL AUTO_INCREMENT,
		  post_id bigint(9) NOT NULL,
		  shorteningMethod varchar(30) NOT NULL,
		  longUrl text NOT NULL,
		  shortenUrl varchar(100) DEFAULT '' NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

//********************* UPDATE DB data code for VERSION 2.7  STARTS  **************************************************
	// Get values from Question 2
	$option2 = unserialize(get_option('sfsi_premium_section2_options'));
	$option5 = unserialize(get_option('sfsi_premium_section5_options'));

	// If true then current version is less than 2.6. If False then current version is 2.6
	if(isset($option2['sfsi_plus_twitter_aboutPage'])){

		if(isset($option2['sfsi_plus_twitter_aboutPageText'])){
			$option5['sfsi_plus_twitter_aboutPageText'] = $option2['sfsi_plus_twitter_aboutPageText'];
			unset($option2['sfsi_plus_twitter_aboutPageText']);
		}
		
		// Check if Add Twitter Card set in Question 2, Move to Question 5 
		if(isset($option2['sfsi_plus_twitter_twtAddCard'])){		
			$option5['sfsi_plus_twitter_twtAddCard'] = $option2['sfsi_plus_twitter_twtAddCard'];
			unset($option2['sfsi_plus_twitter_twtAddCard']);
		}

		// Check if Add Twitter Card Type in Question 2, Move to Question 5
		if(isset($option2['sfsi_plus_twitter_twtCardType'])){
			$option5['sfsi_plus_twitter_twtCardType'] = $option2['sfsi_plus_twitter_twtCardType'];
			unset($option2['sfsi_plus_twitter_twtCardType']);
		}

		// Check if Add Twitter Card Type in Question 2, Move to Question 5
		if(isset($option2['sfsi_plus_twitter_card_twitter_handle'])){
			$option5['sfsi_plus_twitter_card_twitter_handle'] = $option2['sfsi_plus_twitter_card_twitter_handle'];
			unset($option2['sfsi_plus_twitter_card_twitter_handle']);
		}		
	}

	// Current version is 2.6
	else{
		// Not get value for "Tweet about my page" from Question 2,Checking value in Question 6 
		if(isset($option5['sfsi_plus_twitter_aboutPage'])){
			$option2['sfsi_plus_twitter_aboutPage'] = $option5['sfsi_plus_twitter_aboutPage']; // set value in Question 2
			unset($option5['sfsi_plus_twitter_aboutPage']); // Remove value from Question 6
		}
		else{ // Value not get for "Tweet about my page" from Question 2 & Question 5, Setting default keys & data 
			
			$option2['sfsi_plus_twitter_aboutPage'] = "yes"; // Set "Tweet about my page" on for new users

			// Set default values for twitter users on for new users
			if(!isset($option5['sfsi_plus_twitter_aboutPageText']) && !isset($option5['sfsi_plus_twitter_twtAddCard']) && !isset($option5['sfsi_plus_twitter_twtCardType']) && !isset($option5['sfsi_plus_twitter_card_twitter_handle'])){
				$option5['sfsi_plus_twitter_aboutPageText'] 	  = '${title} ${link}';
				$option5['sfsi_plus_twitter_twtAddCard'] 		  = "yes";
				$option5['sfsi_plus_twitter_twtCardType'] 		  = "summary";
				$option5['sfsi_plus_twitter_card_twitter_handle'] = '';			
			}
		}		
	}


	// *********** Updating setting for post type selection in section 6. Now setting Page, Post selected default STARTS ****************/
	
	if(isset($option5['sfsi_custom_social_data_post_types_data'])){
			
			$sfsi_custom_social_data_post_types_data = unserialize($option5['sfsi_custom_social_data_post_types_data']);

			if(count($sfsi_custom_social_data_post_types_data)>0){

					// CODE TO REMOVE FOR VERSION 2.10 STARTS //

					if(isset($sfsi_custom_social_data_post_types_data[0]) && is_array($sfsi_custom_social_data_post_types_data[0])){
						$sfsi_custom_social_data_post_types_data = $sfsi_custom_social_data_post_types_data[0];
					}
					
					// CODE TO REMOVE FOR VERSION 2.10 CLOSES //					
					
					if(!in_array('page', $sfsi_custom_social_data_post_types_data)){
						 $add_custom_social_data_post_types_data = array('page');
						 $sfsi_custom_social_data_post_types_data= array_merge($add_custom_social_data_post_types_data,$sfsi_custom_social_data_post_types_data);
					}
					else if(!in_array('post', $sfsi_custom_social_data_post_types_data)){
						 $add_custom_social_data_post_types_data = array('post');
						 $sfsi_custom_social_data_post_types_data= array_merge($add_custom_social_data_post_types_data,$sfsi_custom_social_data_post_types_data);
					}
					$option5['sfsi_custom_social_data_post_types_data']	= serialize($sfsi_custom_social_data_post_types_data);
			}
			else{
					$option5['sfsi_custom_social_data_post_types_data']	= serialize(array('page','post')); 			
			} 					
	}
	else{
		$option5['sfsi_custom_social_data_post_types_data']	= serialize(array('page','post'));
	}

	// **** Updating setting for post type selection in section 6. Now setting Page, Post selected default CLOSES ********************/	



	// ***** Update setting to allow USM to add open graph meta tags in Question 6 STARTS ********************************************/
	
	if(get_option('adding_plustags')){
		delete_option('adding_plustags');		
	}
	// ** If get setting found fron db -> ($option5['sfsi_plus_disable_usm_og_meta_tags']) from Question 6, else check other SEO plugins are activated, then set "Disable Ultimate Social Media Plugin to set the meta tags" setting only once ** //
	$option5 =  unserialize(get_option('sfsi_premium_section5_options',false));	
		
	if(!isset($option5['sfsi_plus_disable_usm_og_meta_tags'])){
		$option5['sfsi_plus_disable_usm_og_meta_tags'] = (sfsi_plus_checkmetas())? "yes":"no";
	}

	// **********Update setting to allow USM to add open graph meta tags in Question 6 CLOSES **********************************/

	if(!isset($option5['sfsi_premium_url_shortner_icons_names_list'])){
		$option5['sfsi_premium_url_shortner_icons_names_list'] = serialize(array('twitter','facebook','email'));
	}

	if(!isset($option5['sfsi_plus_url_shorting_api_type_setting'])){
		$option5['sfsi_plus_url_shorting_api_type_setting'] = 'no';
	}	

	if(!isset($option5['sfsi_plus_url_shortner_bitly_key'])){
		$option5['sfsi_plus_url_shortner_bitly_key'] = '';
	}

	if(!isset($option5['sfsi_plus_url_shortner_google_key'])){
		$option5['sfsi_plus_url_shortner_google_key'] = '';
	}		

	if(!isset($option5['sfsi_plus_custom_css'])){
		$option5['sfsi_plus_custom_css'] = serialize('');
	}

	if(!isset($option5['sfsi_plus_custom_admin_css'])){
		$option5['sfsi_plus_custom_admin_css'] = serialize('');
	}	

	$iconLinkOpen = (isset($option5['sfsi_plus_icons_ClickPageOpen']) && "yes" == $option5['sfsi_plus_icons_ClickPageOpen']) ? "tab" : "no";
	
	$option5['sfsi_plus_icons_ClickPageOpen'] = $iconLinkOpen;

	// Now updating Values in Question 2 & Question 6
	update_option('sfsi_premium_section5_options', serialize($option5));
	update_option('sfsi_premium_section2_options', serialize($option2));

//******************* UPDATE DB data code for VERSION 2.7  CLOSES  **************************************************	


//**************** UPDATE Desktop, Mobile show/hide settings in Question 3 in each section from VERSION 4.5 STARTS************

	// In Question 3 -> B) Show on Desktop Show on Mobile section removed IN VERSION 4.5
	
	$option8 = unserialize(get_option('sfsi_premium_section8_options',false));
	$option5 = unserialize(get_option('sfsi_premium_section5_options',false));

	if(isset($option8) && !empty($option8)){

        $option8['sfsi_plus_place_rectangle_icons_item_manually']       = (isset($option8['sfsi_plus_place_rectangle_icons_item_manually'])) ? $option8['sfsi_plus_place_rectangle_icons_item_manually'] : "no";

		$desktopValue = (isset($option8['sfsi_plus_show_on_desktop'])) ? $option8['sfsi_plus_show_on_desktop'] : "yes";
		$mobileValue  = (isset($option8['sfsi_plus_show_on_mobile']))  ? $option8['sfsi_plus_show_on_mobile']  : "yes";

		if(false == isset($option8['sfsi_plus_widget_show_on_desktop'])){
			$option8['sfsi_plus_widget_show_on_desktop'] = $desktopValue;
		}

		if(false == isset($option8['sfsi_plus_float_show_on_desktop'])){
			$option8['sfsi_plus_float_show_on_desktop'] = $desktopValue;
		}

		if(false == isset($option8['sfsi_plus_shortcode_show_on_desktop'])){
			$option8['sfsi_plus_shortcode_show_on_desktop'] = $desktopValue;
		}

		if(false == isset($option8['sfsi_plus_beforeafterposts_show_on_desktop'])){
			$option8['sfsi_plus_beforeafterposts_show_on_desktop'] = $desktopValue;
		}

		if(false == isset($option8['sfsi_plus_rectangle_icons_shortcode_show_on_desktop'])){
			$option8['sfsi_plus_rectangle_icons_shortcode_show_on_desktop'] = $desktopValue;
		}


		if(false == isset($option8['sfsi_plus_widget_show_on_mobile'])){
			$option8['sfsi_plus_widget_show_on_mobile'] = $mobileValue;
		}

		if(false == isset($option8['sfsi_plus_float_show_on_mobile'])){
			$option8['sfsi_plus_float_show_on_mobile'] = $mobileValue;
		}

		if(false == isset($option8['sfsi_plus_shortcode_show_on_mobile'])){
			$option8['sfsi_plus_shortcode_show_on_mobile'] = $mobileValue;
		}

		if(false == isset($option8['sfsi_plus_beforeafterposts_show_on_mobile'])){
			$option8['sfsi_plus_beforeafterposts_show_on_mobile'] = $mobileValue;
		}

		if(false == isset($option8['sfsi_plus_rectangle_icons_shortcode_show_on_mobile'])){
			$option8['sfsi_plus_rectangle_icons_shortcode_show_on_mobile'] = $mobileValue;
		}

        // Copy the setting if "Question 6-> Need different selections for mobile?"
        if(!isset($option8['sfsi_plus_mobile_widget'])){
        	$option8['sfsi_plus_mobile_widget'] = (isset($option5['sfsi_plus_mobile_icon_alignment_setting'])) ? $option5['sfsi_plus_mobile_icon_alignment_setting']: "no";
        }

        if(!isset($option8['sfsi_plus_mobile_float'])){
        	$option8['sfsi_plus_mobile_float'] = (isset($option5['sfsi_plus_mobile_icon_alignment_setting'])) ? $option5['sfsi_plus_mobile_icon_alignment_setting']: "no";
        }

        if(!isset($option8['sfsi_plus_mobile_shortcode'])){
        	$option8['sfsi_plus_mobile_shortcode'] = (isset($option5['sfsi_plus_mobile_icon_alignment_setting'])) ? $option5['sfsi_plus_mobile_icon_alignment_setting']: "no";
        }

        if(!isset($option8['sfsi_plus_mobile_beforeafterposts'])){
        	$option8['sfsi_plus_mobile_beforeafterposts'] = (isset($option5['sfsi_plus_mobile_icon_alignment_setting'])) ? $option5['sfsi_plus_mobile_icon_alignment_setting']: "no";
        }

        // Get Alignments settings from Question 6-> Desktop & Mobile
		$option5['sfsi_plus_horizontal_verical_Alignment'] = (isset($option5['sfsi_plus_horizontal_verical_Alignment'])) ? $option5['sfsi_plus_horizontal_verical_Alignment']: "Horizontal";

		$option5['sfsi_plus_mobile_horizontal_verical_Alignment'] = (isset($option5['sfsi_plus_mobile_horizontal_verical_Alignment'])) ? $option5['sfsi_plus_mobile_horizontal_verical_Alignment']: "Horizontal";


		// Set the alignments setting of icons for Desktop in Question 3 for Widget, floating icons, shortcode & before after posts
		if(false == isset($option8['sfsi_plus_widget_horizontal_verical_Alignment'])){
			$option8['sfsi_plus_widget_horizontal_verical_Alignment'] 			= $option5['sfsi_plus_horizontal_verical_Alignment'];
		}
		if(false == isset($option8['sfsi_plus_float_horizontal_verical_Alignment'])){
			$option8['sfsi_plus_float_horizontal_verical_Alignment'] 			= $option5['sfsi_plus_horizontal_verical_Alignment'];
		}
		if(false == isset($option8['sfsi_plus_shortcode_horizontal_verical_Alignment'])){
			$option8['sfsi_plus_shortcode_horizontal_verical_Alignment'] 		= $option5['sfsi_plus_horizontal_verical_Alignment'];
		}
		if(false == isset($option8['sfsi_plus_beforeafterposts_horizontal_verical_Alignment'])){
			$option8['sfsi_plus_beforeafterposts_horizontal_verical_Alignment'] = $option5['sfsi_plus_horizontal_verical_Alignment'];
		}						

		// Set the alignments setting of icons for Mobile in Question 3 for Widget, floating icons, shortcode & before after posts
		if(false == isset($option8['sfsi_plus_widget_mobile_horizontal_verical_Alignment'])){
			$option8['sfsi_plus_widget_mobile_horizontal_verical_Alignment'] = ($option8['sfsi_plus_mobile_widget'] == "yes") ? $option5['sfsi_plus_mobile_horizontal_verical_Alignment']: $option5['sfsi_plus_horizontal_verical_Alignment'];
		}
		if(false == isset($option8['sfsi_plus_float_mobile_horizontal_verical_Alignment'])){
			$option8['sfsi_plus_float_mobile_horizontal_verical_Alignment'] = ($option8['sfsi_plus_mobile_float'] == "yes") ? $option5['sfsi_plus_mobile_horizontal_verical_Alignment']: $option5['sfsi_plus_horizontal_verical_Alignment'];
		}
		if(false == isset($option8['sfsi_plus_shortcode_mobile_horizontal_verical_Alignment'])){
			$option8['sfsi_plus_shortcode_mobile_horizontal_verical_Alignment'] = ($option8['sfsi_plus_mobile_shortcode'] == "yes") ? $option5['sfsi_plus_mobile_horizontal_verical_Alignment']: $option5['sfsi_plus_horizontal_verical_Alignment'];
		}
		if(false == isset($option8['sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment'])){
			$option8['sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment'] = ($option8['sfsi_plus_mobile_beforeafterposts'] == "yes") ? $option5['sfsi_plus_mobile_horizontal_verical_Alignment']: $option5['sfsi_plus_horizontal_verical_Alignment'];
		}
		update_option('sfsi_premium_section8_options', serialize($option8));
	}

//****************** UPDATE Desktop, Mobile show/hide settings in Question 3 in each section from VERSION 4.5 CLOSES  *********


//************** UPDATE Desktop, Mobile show/hide settings in Question 7 in each section from VERSION 4.5 STARTS  *************

	// In Question 3 B) Show on Desktop Show on Mobile section removed IN VERSION 4.5
	
	$option7 = unserialize(get_option('sfsi_premium_section7_options',false));
	$option8 = unserialize(get_option('sfsi_premium_section8_options',false));

	if(isset($option7) && !empty($option7)){

		$desktopValue = (isset($option8['sfsi_plus_show_on_desktop']) && !empty($option8['sfsi_plus_show_on_desktop'])) ? $option8['sfsi_plus_show_on_desktop'] : "yes";
		$mobileValue  = (isset($option8['sfsi_plus_show_on_mobile'])  && !empty($option8['sfsi_plus_show_on_mobile']))  ? $option8['sfsi_plus_show_on_mobile']  : "yes";

        $option7['sfsi_plus_popup_show_on_desktop'] = (isset($option7['sfsi_plus_popup_show_on_desktop']) && !empty($option7['sfsi_plus_show_on_desktop'])) ? $option7['sfsi_plus_popup_show_on_desktop'] : $desktopValue;
        $option7['sfsi_plus_popup_show_on_mobile']  = (isset($option7['sfsi_plus_popup_show_on_mobile'])  && !empty($option7['sfsi_plus_popup_show_on_mobile']))  ? $option7['sfsi_plus_popup_show_on_mobile']  : $mobileValue;

		if(isset($option8['sfsi_plus_show_on_desktop'])) {
			unset($option8['sfsi_plus_show_on_desktop']);
		}
		if(isset($option8['sfsi_plus_show_on_mobile'])) {
			unset($option8['sfsi_plus_show_on_mobile']);
		}

		if(!isset($option7['sfsi_plus_Show_popupOn_somepages_blogpage'])) {
			$option7['sfsi_plus_Show_popupOn_somepages_blogpage'] = '';
		}
		if(!isset($option7['sfsi_plus_Show_popupOn_somepages_selectedpage'])) {
			$option7['sfsi_plus_Show_popupOn_somepages_selectedpage'] = '';
		}

		if(!isset($option7['sfsi_plus_Hide_popupOnScroll'])) {
			$option7['sfsi_plus_Hide_popupOnScroll'] = 'yes';
		}
		if(!isset($option7['sfsi_plus_Hide_popupOn_OutsideClick'])) {
			$option7['sfsi_plus_Hide_popupOn_OutsideClick'] = 'no';
		}

		update_option('sfsi_premium_section7_options', serialize($option7));
		update_option('sfsi_premium_section8_options', serialize($option8));
	}

//***************** UPDATE Desktop, Mobile show/hide settings in Question 7 in each section from VERSION 4.5 CLOSES ******

	$option4 = unserialize(get_option('sfsi_premium_section4_options',false));

	if(!isset($option4['$sfsi_plus_pinterest_appid'])){
		$option4['$sfsi_plus_pinterest_appid'] = '';
	}
	if(!isset($option4['$sfsi_plus_pinterest_appsecret'])){
		$option4['$sfsi_plus_pinterest_appsecret'] = '';
	}
	if(!isset($option4['$sfsi_plus_pinterest_appurl'])){
		$option4['$sfsi_plus_pinterest_appurl'] = '';
	}

	if(!isset($option4['$sfsi_plus_pinterest_board_name'])){
		$option4['$sfsi_plus_pinterest_board_name'] = '';
	}
	if(!isset($option4['$sfsi_plus_pinterest_access_token'])){
		$option4['$sfsi_plus_pinterest_access_token'] = '';
	}
	if(!isset($option4['$sfsi_plus_pinterest_user'])){
		$option4['$sfsi_plus_pinterest_user'] = '';
	}

	if(!isset($option4['$sfsi_plus_fb_count_caching_active'])){
		$option4['$sfsi_plus_fb_count_caching_active'] = 'no';
	}
	
	if(!isset($option4['sfsi_plus_fb_caching_interval'])){
		$option4['sfsi_plus_fb_caching_interval'] = 1;			
	}		

	if(!isset($option4['$sfsi_plus_tw_count_caching_active'])){
		$option4['$sfsi_plus_tw_count_caching_active'] = 'no';
	}	
	if(!isset($option4['$sfsi_plus_min_display_counts'])){
		$option4['$sfsi_plus_min_display_counts'] = 1;
	}	

	update_option('sfsi_premium_section4_options', serialize($option4));

	// Adding option to save current active licensing api added in version 6.6
	if(false === get_option('sfsi_active_license_api_name')){
		
		$ultimate_license_key  = get_option(ULTIMATELYSOCIAL_LICENSING.'_license_key');
		$sellcodes_license_key = get_option(SELLCODES_LICENSING.'_license_key');

		if(false !== $ultimate_license_key){
			update_option('sfsi_active_license_api_name',ULTIMATELYSOCIAL_LICENSING);							
		}
		
		if(false !== $sellcodes_license_key){
			update_option('sfsi_active_license_api_name',SELLCODES_LICENSING);					
		}		
	}

	// Remove job queue data with old code
	delete_option('sfsi-premium-fb-cumulative-api-call-queue');
	delete_option('sfsi-premium-fb-uncumulative-api-call-queue');

	// Create job queue table for handling facebook count caching
	$sfsi_job_queue = sfsiJobQueue::getInstance();

	$jobQueueInstalled = get_option('sfsi_premium_job_queue_installed',false);

	if(false == $jobQueueInstalled){
		$sfsi_job_queue->install_job_queue();	
	}			
}

function sfsi_premium_activate_plugin()
{
	add_option('sfsi_premium_plugin_do_activation_redirect', true);
	
	// Adding option to save current active licensing api added in version 6.6
	if(false === get_option('sfsi_active_license_api_name')){
		
		$ultimate_license_key  = get_option(ULTIMATELYSOCIAL_LICENSING.'_license_key');
		$sellcodes_license_key = get_option(SELLCODES_LICENSING.'_license_key');

		if(false !== $ultimate_license_key){
			update_option('sfsi_active_license_api_name',ULTIMATELYSOCIAL_LICENSING);							
		}
		
		if(false !== $sellcodes_license_key){
			update_option('sfsi_active_license_api_name',SELLCODES_LICENSING);					
		}		
	}
		
	/* check for CURL enable at server */
    sfsi_plus_curl_enable_notice();	
    $options1=array(
		'sfsi_plus_rss_display'				=>'yes',
		'sfsi_plus_email_display'			=>'yes',
		'sfsi_plus_facebook_display'		=>'yes',
		'sfsi_plus_twitter_display'			=>'yes',
		'sfsi_plus_google_display'			=>'yes',
		'sfsi_plus_share_display'			=>'no',
		'sfsi_plus_pinterest_display'		=>'no',
		'sfsi_plus_instagram_display'		=>'no',
		'sfsi_plus_linkedin_display'		=>'no',
		'sfsi_plus_youtube_display'			=>'no',
		'sfsi_plus_houzz_display'			=>'no',
		'sfsi_plus_snapchat_display'		=>'no',
		'sfsi_plus_whatsapp_display'		=>'no',
		'sfsi_plus_skype_display'			=>'no',
		'sfsi_plus_vimeo_display'			=>'no',
		'sfsi_plus_soundcloud_display'		=>'no',
		'sfsi_plus_yummly_display'			=>'no',
		'sfsi_plus_flickr_display'			=>'no',
		'sfsi_plus_reddit_display'			=>'no',
		'sfsi_plus_tumblr_display'			=>'no',
		'sfsi_custom_display'				=>'',

		'sfsi_custom_mobile_icons'			=>'',
		'sfsi_custom_desktop_icons' 		=>'',
		'sfsi_custom_files'					=>'',
		
		'sfsi_plus_icons_onmobile'			=>'no',
		'sfsi_plus_rss_mobiledisplay'		=>'no',
		'sfsi_plus_email_mobiledisplay'		=>'no',
		'sfsi_plus_facebook_mobiledisplay'	=>'no',
		'sfsi_plus_twitter_mobiledisplay'	=>'no',
		'sfsi_plus_google_mobiledisplay'	=>'no',
		'sfsi_plus_share_mobiledisplay'		=>'no',
		'sfsi_plus_pinterest_mobiledisplay'	=>'no',
		'sfsi_plus_instagram_mobiledisplay'	=>'no',
		'sfsi_plus_linkedin_mobiledisplay'	=>'no',
		'sfsi_plus_youtube_mobiledisplay'	=>'no',
		'sfsi_plus_houzz_mobiledisplay'		=>'no',
		'sfsi_plus_snapchat_mobiledisplay'	=>'no',
		'sfsi_plus_whatsapp_mobiledisplay'	=>'no',
		'sfsi_plus_skype_mobiledisplay'		=>'no',
		'sfsi_plus_vimeo_mobiledisplay'		=>'no',
		'sfsi_plus_soundcloud_mobiledisplay'=>'no',
		'sfsi_plus_yummly_mobiledisplay'	=>'no',
		'sfsi_plus_flickr_mobiledisplay'	=>'no',
		'sfsi_plus_reddit_mobiledisplay'	=>'no',
		'sfsi_plus_tumblr_mobiledisplay'	=>'no'
	);
	add_option('sfsi_premium_section1_options',  serialize($options1));
    
	if(get_option('sfsi_premium_feed_id') && get_option('sfsi_premium_redirect_url'))
	{
		$sffeeds["feed_id"] 		= sanitize_text_field(get_option('sfsi_premium_feed_id'));
		$sffeeds["redirect_url"] 	= sanitize_text_field(get_option('sfsi_premium_redirect_url'));
		$sffeeds = (object)$sffeeds;
	}
    else
	{
		$sffeeds = SFSI_PLUS_getFeedUrl();
	}
	
    /* Links and icons  options */	 
    $options2=array(
		'sfsi_plus_rss_url'						=> sfsi_plus_get_bloginfo('rss2_url'),
        'sfsi_plus_rss_icons'					=> 'subscribe', 
        'sfsi_plus_email_url'					=> $sffeeds->redirect_url,
        'sfsi_plus_email_icons_functions'		=> 'sf',
        'sfsi_plus_email_icons_contact'			=> '',
        'sfsi_plus_email_icons_pageurl'			=> '',
        'sfsi_plus_email_icons_mailchimp_apikey'=> '',
        'sfsi_plus_email_icons_mailchimp_listid'=> '',
        'sfsi_plus_email_icons_subject_line'    => '${title}',
        'sfsi_plus_email_icons_email_content'	=> 'Check out this article «${title}»: ${link}',

        'sfsi_plus_facebookPage_option'		=> 'no',
        'sfsi_plus_facebookPage_url'		=> '',
		'sfsi_plus_facebookProfile_url'		=> '',
        'sfsi_plus_facebookLike_option'		=> 'yes',
        'sfsi_plus_facebookShare_option'	=> 'yes',
		'sfsi_plus_facebookFollow_option'	=> 'no',
		
        'sfsi_plus_twitter_followme'		=> 'no',
        'sfsi_plus_twitter_followUserName'	=> '',
        'sfsi_plus_twitter_aboutPage'		=> 'yes',
		'sfsi_plus_twitter_page'			=> 'no',
        'sfsi_plus_twitter_pageURL'			=> '',
        
		'sfsi_plus_google_page'				=> 'no',
        'sfsi_plus_google_pageURL'			=> '',
        'sfsi_plus_googleLike_option'		=> 'yes',
        'sfsi_plus_googleShare_option'		=> 'yes',
		'sfsi_plus_googleFollow_option'		=> 'no',
		
        'sfsi_plus_youtube_pageUrl'			=> '',
        'sfsi_plus_youtube_page'			=> 'no',
        'sfsi_plus_youtube_follow'			=> 'no',
		'sfsi_plus_youtubeusernameorid'		=> 'name',
		'sfsi_plus_ytube_chnlid'			=> '',
		'sfsi_plus_ytube_user'				=> '',
        'sfsi_plus_pinterest_page'			=> 'no',
        'sfsi_plus_pinterest_pageUrl'		=> '',
        'sfsi_plus_pinterest_pingBlog'		=> '',
	 	'sfsi_plus_instagram_page'			=> 'no',
        'sfsi_plus_instagram_pageUrl'		=> '',
		'sfsi_plus_houzz_pageUrl'			=> '',
		
		'sfsi_plus_snapchat_pageUrl'		=> '',
		'sfsi_plus_whatsapp_message'		=> '',
		'sfsi_plus_my_whatsapp_number'      => '',
		'sfsi_plus_whatsapp_number'			=> '',
		'sfsi_plus_whatsapp_share_page'     => '${title} ${link}',

		'sfsi_plus_skype_options'			=> 'call',
		'sfsi_plus_skype_pageUrl'			=> '',
		'sfsi_plus_vimeo_pageUrl'			=> '',
		'sfsi_plus_soundcloud_pageUrl'		=> '',
		'sfsi_plus_yummly_pageUrl'			=> '',
		'sfsi_plus_flickr_pageUrl'			=> '',
		'sfsi_plus_reddit_pageUrl'			=> '',
		'sfsi_plus_tumblr_pageUrl'			=> '',
		'sfsi_plus_whatsapp_url_type'		=> '',
		'sfsi_plus_reddit_url_type'			=> '',
		
		'sfsi_plus_linkedin_page'			=> 'no',
        'sfsi_plus_linkedin_pageURL'		=> '',
        'sfsi_plus_linkedin_follow'			=> 'no',
        'sfsi_plus_linkedin_followCompany'	=> '',
        'sfsi_plus_linkedin_SharePage'		=> 'yes',
        'sfsi_plus_linkedin_recommendBusines'=> 'no',
        'sfsi_plus_linkedin_recommendCompany'=> '',
        'sfsi_plus_linkedin_recommendProductId'=> '',
        'sfsi_plus_CustomIcon_links'		=> ''
	);
	add_option('sfsi_premium_section2_options',  serialize($options2));
    
	/* Design and animation option  */
	$options3=array('sfsi_plus_mouseOver'	=>'no',
        'sfsi_plus_mouseOver_effect'		=>'fade_in',
        'sfsi_plus_shuffle_icons'			=>'no',
        'sfsi_plus_shuffle_Firstload'		=>'no',
        'sfsi_plus_shuffle_interval'		=>'no',
        'sfsi_plus_shuffle_intervalTime'	=>'',                              
        'sfsi_plus_actvite_theme'			=>'default'
	);
	add_option('sfsi_premium_section3_options',  serialize($options3));
	
	/* display counts options */         
	   $options4=array(
			'sfsi_plus_display_counts'			 => 'no',
	        'sfsi_plus_email_countsDisplay'		 => 'no',
	        'sfsi_plus_email_countsFrom'		 => 'source',
	        'sfsi_plus_email_manualCounts'		 => '20',
	        'sfsi_plus_rss_countsDisplay'		 => 'no',
	        'sfsi_plus_rss_manualCounts'		 => '20',
	        'sfsi_plus_facebook_PageLink'		 => '',
	        'sfsi_plus_facebook_countsDisplay'	 => 'no',
	        'sfsi_plus_facebook_countsFrom'		 => 'manual',
	        'sfsi_plus_facebook_manualCounts'	 => '20',
	        'sfsi_plus_facebook_countsFrom_blog' => '',
			'sfsi_plus_facebook_appid'			 => '',
			'sfsi_plus_facebook_appsecret'		 => '',
			'sfsi_plus_fb_count_caching_active'  => 'no',
			'sfsi_plus_fb_caching_interval'		 => 1,

	        'sfsi_plus_twitter_countsDisplay'	=>'no',
	        'sfsi_plus_twitter_countsFrom'		=>'manual',
			'sfsi_plus_tw_count_caching_active' => 'no',
	        
	        'sfsi_plus_twitter_manualCounts'	=>'20',
	        
	        'sfsi_plus_google_api_key'			=>'',
	        'sfsi_plus_google_countsDisplay'	=>'no',
	        'sfsi_plus_google_countsFrom'		=>'manual',
	        'sfsi_plus_google_manualCounts'		=>'20',
	        'sfsi_plus_linkedIn_countsDisplay'	=>'no',
	        'sfsi_plus_linkedIn_countsFrom'		=>'manual',
	        'sfsi_plus_linkedIn_manualCounts'	=>'20',
	        'sfsi_plus_ln_api_key'				=>'',
	        'sfsi_plus_ln_secret_key'			=>'',
	        'sfsi_plus_ln_oAuth_user_token'		=>'',
	        'sfsi_plus_ln_company'				=>'',
			'sfsi_plus_youtube_user'			=>'',
			'sfsi_plus_youtube_channelId'		=>'',
			'sfsi_plus_youtube_countsDisplay'	=>'no',
	        'sfsi_plus_youtube_countsFrom'		=>'manual',
	        'sfsi_plus_youtube_manualCounts'	=>'20',
	        'sfsi_plus_pinterest_countsDisplay'	=>'no',
	        'sfsi_plus_pinterest_countsFrom'	=>'manual',
	        'sfsi_plus_pinterest_manualCounts'	=>'20',

	        'sfsi_plus_pinterest_appid'			=> '',
	        'sfsi_plus_pinterest_appsecret'		=> '',
	        'sfsi_plus_pinterest_appurl'  		=> '',

	        'sfsi_plus_pinterest_user'			=> '',
	        'sfsi_plus_pinterest_board_name'	=> '',
	        'sfsi_plus_pinterest_access_token'  => '',

			'sfsi_plus_instagram_countsFrom'	=>'manual',
			'sfsi_plus_instagram_countsDisplay'	=>'no',
			'sfsi_plus_instagram_manualCounts'	=>'20',
			'sfsi_plus_instagram_User'			=>'',
			'sfsi_plus_instagram_clientid'		=>'',
			'sfsi_plus_instagram_appurl'		=>'',
			'sfsi_plus_instagram_token'			=>'',
	        'sfsi_plus_shares_countsDisplay'	=>'no',
	        'sfsi_plus_shares_countsFrom'		=>'manual',
	        'sfsi_plus_shares_manualCounts'		=>'20',
			'sfsi_plus_houzz_countsDisplay'		=>'no',
	        'sfsi_plus_houzz_countsFrom'		=>'manual',
	        'sfsi_plus_houzz_manualCounts'		=>'20',
			
			'sfsi_plus_snapchat_countsDisplay'	=>'no',
			'sfsi_plus_snapchat_countsFrom'		=>'manual',
			'sfsi_plus_snapchat_manualCounts'	=>'20',
			
			'sfsi_plus_whatsapp_countsDisplay'	=>'no',
			'sfsi_plus_whatsapp_countsFrom'		=>'manual',
			'sfsi_plus_whatsapp_manualCounts'	=>'20',
			
			'sfsi_plus_skype_countsDisplay'		=>'no',
			'sfsi_plus_skype_countsFrom'		=>'manual',
			'sfsi_plus_skype_manualCounts'		=>'20',
			
			'sfsi_plus_vimeo_countsDisplay'		=>'no',
			'sfsi_plus_vimeo_countsFrom'		=>'manual',
			'sfsi_plus_vimeo_manualCounts'		=>'20',
			
			'sfsi_plus_soundcloud_countsDisplay'=>'no',
			'sfsi_plus_soundcloud_countsFrom'	=>'manual',
			'sfsi_plus_soundcloud_manualCounts'	=>'20',
			
			'sfsi_plus_yummly_countsDisplay'	=>'no',
			'sfsi_plus_yummly_countsFrom'		=>'manual',
			'sfsi_plus_yummly_manualCounts'		=>'20',
			
			'sfsi_plus_flickr_countsDisplay'	=>'no',
			'sfsi_plus_flickr_countsFrom'		=>'manual',
			'sfsi_plus_flickr_manualCounts'		=>'20',
			
			'sfsi_plus_reddit_countsDisplay'	=>'no',
			'sfsi_plus_reddit_countsFrom'		=>'manual',
			'sfsi_plus_reddit_manualCounts'		=>'20',
			
			'sfsi_plus_tumblr_countsDisplay'	=>'no',
			'sfsi_plus_tumblr_countsFrom'		=>'manual',
			'sfsi_plus_tumblr_manualCounts'		=>'20',
			'sfsi_plus_min_display_counts'		=> 1
		);

	add_option('sfsi_premium_section4_options',  serialize($options4));		

  	// Setting to allow USM to add open graph meta tags //
	$is_other_seo_plugins_active 		= sfsi_plus_checkmetas();		
	$sfsi_plus_disable_usm_og_meta_tags = ($is_other_seo_plugins_active) ? "yes":"no";

    $options5 = array(
		'sfsi_plus_icons_size'				=> '40',
        'sfsi_plus_icons_spacing'			=> '5',
		'sfsi_plus_icons_verical_spacing'	=> '5',
		
        'sfsi_plus_mobile_icon_alignment_setting'			=> 'no',
        'sfsi_plus_mobile_horizontal_verical_Alignment'		=> 'Horizontal',
        'sfsi_plus_mobile_icons_Alignment_via_widget'		=> 'left',
        'sfsi_plus_mobile_icons_Alignment_via_shortcode'	=> 'left',
        'sfsi_plus_mobile_icons_Alignment'					=> 'left',
         'sfsi_plus_mobile_icons_perRow'					=> '5',
      
		'sfsi_plus_mobile_icon_setting'		=> 'no',
		'sfsi_plus_icons_mobilesize'		=> '40',
        'sfsi_plus_icons_mobilespacing'		=> '5',
		'sfsi_plus_icons_verical_mobilespacing'	=> '5',
		
		'sfsi_plus_horizontal_verical_Alignment'  => 'Horizontal',
        'sfsi_plus_icons_Alignment_via_shortcode' => 'left',
        'sfsi_plus_icons_Alignment_via_widget'    => 'left',
        
        'sfsi_plus_icons_Alignment'			=> 'left',
        'sfsi_plus_icons_perRow'			=> '5',
		'sfsi_plus_follow_icons_language'	=> 'Follow_en_US',
		'sfsi_plus_facebook_icons_language'	=> 'Visit_us_en_US',
		'sfsi_plus_twitter_icons_language'	=> 'Visit_us_en_US',
		'sfsi_plus_google_icons_language'	=> 'Visit_us_en_US',
		'sfsi_plus_icons_language'			=> 'en_US',
        'sfsi_plus_icons_ClickPageOpen'		=> 'no',
        'sfsi_plus_icons_float'				=> 'no',
		'sfsi_plus_disable_floaticons'		=> 'no',
		'sfsi_plus_disable_viewport'		=> 'no',
        'sfsi_plus_icons_floatPosition'		=> 'center-right',
        'sfsi_plus_icons_stick'				=> 'no',

		'sfsi_order_icons_desktop' 			=> serialize( array() ),
		'sfsi_order_icons_mobile' 			=> serialize( array() ), // Added in version 9.2 to support Order of mobile icons

        'sfsi_plus_rss_MouseOverText'		=> 'RSS',
        'sfsi_plus_email_MouseOverText'		=> 'Follow by Email',
        'sfsi_plus_twitter_MouseOverText'	=> 'Twitter',
        'sfsi_plus_facebook_MouseOverText'	=> 'Facebook',
        'sfsi_plus_google_MouseOverText'	=> 'Google+',
        'sfsi_plus_linkedIn_MouseOverText'	=> 'LinkedIn',
        'sfsi_plus_pinterest_MouseOverText'	=> 'Pinterest',
		'sfsi_plus_instagram_MouseOverText'	=> 'Instagram',
		'sfsi_plus_houzz_MouseOverText'		=> 'Houzz',
        'sfsi_plus_youtube_MouseOverText'	=> 'YouTube',
        'sfsi_plus_share_MouseOverText'		=> 'Share',
        'sfsi_plus_custom_MouseOverTexts'	=> '',
		
		'sfsi_plus_snapchat_MouseOverText'	=> "",
		'sfsi_plus_whatsapp_MouseOverText'	=> "",
		'sfsi_plus_skype_MouseOverText'		=> "",
		'sfsi_plus_vimeo_MouseOverText'		=> "",
		'sfsi_plus_soundcloud_MouseOverText'=> "",
		'sfsi_plus_yummly_MouseOverText'	=> "",
		'sfsi_plus_flickr_MouseOverText'	=> "",
		'sfsi_plus_reddit_MouseOverText'	=> "",
		'sfsi_plus_tumblr_MouseOverText'	=> "",
		'sfsi_plus_Facebook_linking'		=> "facebookurl",
		'sfsi_plus_facebook_linkingcustom_url' => "",
		'sfsi_plus_tooltip_Color'           =>'#FFF',
        'sfsi_plus_tooltip_border_Color'    => '#e7e7e7',
        'sfsi_plus_tooltip_alighn'          => 'Automatic',

		'sfsi_plus_twitter_aboutPageText'   => '${title} ${link}',
		'sfsi_plus_twitter_twtAddCard'		=> 'yes',
		'sfsi_plus_twitter_twtCardType'		=> 'summary',
		'sfsi_plus_twitter_card_twitter_handle'   => '',

		'sfsi_plus_social_sharing_options' => 'posttype',
		
		'sfsiSocialMediaImage' 				=> '',
		'sfsiSocialtTitleTxt' 				=> '',			
		'sfsiSocialDescription' 			=> '',
		'sfsiSocialPinterestImage' 			=> '',
		'sfsiSocialPinterestDesc' 			=> '',
		'sfsiSocialTwitterDesc' 			=> '',

		'sfsi_custom_social_data_post_types_data' => serialize(array('page','post')),
		'sfsi_plus_disable_usm_og_meta_tags'=> $sfsi_plus_disable_usm_og_meta_tags,

		'sfsi_premium_url_shortner_icons_names_list'=> serialize(array('twitter','facebook','email')),
		'sfsi_plus_url_shorting_api_type_setting'=> 'no',
		'sfsi_plus_url_shortner_bitly_key'  => '',
		'sfsi_plus_url_shortner_google_key' => '',
		'sfsi_plus_custom_css'				=> serialize(''),
		'sfsi_plus_custom_admin_css'		=> serialize(''),
		'sfsi_plus_loadjquery'				=> 'yes',
		'sfsi_plus_icons_suppress_errors'	=> 'no',
		'sfsi_plus_nofollow_links'			=> 'no',
	);
	add_option('sfsi_premium_section5_options',  serialize($options5));
    
	/* post options */	                
    $options6=array(
		'sfsi_plus_show_Onposts'		=>'no',
        'sfsi_plus_show_Onbottom'		=>'no',
        'sfsi_plus_icons_postPositon'	=>'source',
        'sfsi_plus_icons_alignment'		=>'center-right',
        'sfsi_plus_rss_countsDisplay'	=>'no',
        'sfsi_plus_textBefor_icons'		=>'Please follow and like us:',
        'sfsi_plus_icons_DisplayCounts'	=>'no'
	);
	add_option('sfsi_premium_section6_options',  serialize($options6));       
    
	/* icons pop options */

	$option7 = unserialize(get_option('sfsi_premium_section7_options',false));

	if(isset($option7) && !empty($option7)){

    	if(!isset($option7['sfsi_plus_Show_popupOn_somepages_blogpage'])) {
			$option7['sfsi_plus_Show_popupOn_somepages_blogpage'] = '';
		}
		if(!isset($option7['sfsi_plus_Show_popupOn_somepages_selectedpage'])) {
			$option7['sfsi_plus_Show_popupOn_somepages_selectedpage'] = '';
		}

    	if(!isset($option7['sfsi_plus_Hide_popupOnScroll'])) {
			$option7['sfsi_plus_Hide_popupOnScroll'] = 'yes';
		}
		if(!isset($option7['sfsi_plus_Hide_popupOn_OutsideClick'])) {
			$option7['sfsi_plus_Hide_popupOn_OutsideClick'] = 'no';
		}

    	if(!isset($option7['sfsi_plus_popup_fontStyle'])) {
			$option7['sfsi_plus_popup_fontStyle'] = 'normal';
		}		
	}
	else{

	    $options7=array(
			'sfsi_plus_show_popup'				=>'no',
	        'sfsi_plus_popup_text'				=>'Enjoy this blog? Please spread the word :)',
	        'sfsi_plus_popup_background_color'	=>'#eff7f7',
	        'sfsi_plus_popup_border_color'		=>'#f3faf2',
	        'sfsi_plus_popup_border_thickness'	=>'1',
	        'sfsi_plus_popup_border_shadow'		=>'yes',
	        'sfsi_plus_popup_font'				=>'Helvetica,Arial,sans-serif',
	        'sfsi_plus_popup_fontSize'			=>'30',
	        'sfsi_plus_popup_fontStyle'			=>'normal',
	        'sfsi_plus_popup_fontColor'			=>'#000000',
	        'sfsi_plus_Show_popupOn'			=>'none',
	        'sfsi_plus_Show_popupOn_PageIDs'	=>'',
	        
	        'sfsi_plus_Show_popupOn_somepages_blogpage' =>'',
	        'sfsi_plus_Show_popupOn_somepages_selectedpage'=>'',

	        'sfsi_plus_Hide_popupOnScroll'		  => 'yes',
	        'sfsi_plus_Hide_popupOn_OutsideClick' => 'no',

	        'sfsi_plus_Shown_pop'				=> array('ETscroll'),
	        'sfsi_plus_Shown_popupOnceTime'		=>'',
	        'sfsi_plus_Shown_popuplimitPerUserTime'=>'',
			'sfsi_plus_popup_limit'				=> 'no',
			'sfsi_plus_popup_limit_count'		=> '',
			'sfsi_plus_popup_limit_type'		=> '',
			'sfsi_plus_popup_type_iconsOrForm'  => 'icons'
		);
		add_option('sfsi_premium_section7_options',  serialize($options7));		
	}
	
	/*options that are added in the third question*/
	if(get_option('sfsi_premium_section4_options',false))
		$option4=  unserialize(get_option('sfsi_premium_section4_options',false));
	if(get_option('sfsi_premium_section5_options',false))	
		$option5=  unserialize(get_option('sfsi_premium_section5_options',false));
	if(get_option('sfsi_premium_section6_options',false))	
		$option6=  unserialize(get_option('sfsi_premium_section6_options',false));
	
	$options8 = array(
		'sfsi_plus_show_via_widget'				=> 'no',
        'sfsi_plus_float_on_page'				=> $option5['sfsi_plus_icons_float'],
        'sfsi_plus_float_page_position'			=> $option5['sfsi_plus_icons_floatPosition'],
		'sfsi_plus_make_icon'					=> '',
		'sfsi_plus_icons_floatMargin_top'		=> '',
		'sfsi_plus_icons_floatMargin_bottom'	=> '',
		'sfsi_plus_icons_floatMargin_left'		=> '',
		'sfsi_plus_icons_floatMargin_right'		=> '',
		
		'sfsi_plus_mobile_widget'				=> 'no',
		'sfsi_plus_mobile_float'				=> 'no',
		'sfsi_plus_mobile_shortcode'			=> 'no',
		'sfsi_plus_mobile_beforeafterposts'		=> 'no',

		'sfsi_plus_widget_horizontal_verical_Alignment'			 => 'Horizontal',
		'sfsi_plus_float_horizontal_verical_Alignment'			 => 'Horizontal',
		'sfsi_plus_shortcode_horizontal_verical_Alignment'		 => 'Horizontal',
		'sfsi_plus_beforeafterposts_horizontal_verical_Alignment'=> 'Horizontal',

		'sfsi_plus_widget_mobile_horizontal_verical_Alignment'			 => 'Horizontal',
		'sfsi_plus_float_mobile_horizontal_verical_Alignment'			 => 'Horizontal',
		'sfsi_plus_shortcode_mobile_horizontal_verical_Alignment'		 => 'Horizontal',
		'sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment' => 'Horizontal',		
						
		'sfsi_plus_float_page_mobileposition'		=> $option5['sfsi_plus_icons_floatPosition'],
		'sfsi_plus_make_mobileicon'					=> '',
		'sfsi_plus_icons_floatMargin_mobiletop'		=> '',
		'sfsi_plus_icons_floatMargin_mobilebottom'	=> '',
		'sfsi_plus_icons_floatMargin_mobileleft'	=> '',
		'sfsi_plus_icons_floatMargin_mobileright'	=> '',
		
        'sfsi_plus_post_icons_size'				=> $option5['sfsi_plus_icons_size'],
        'sfsi_plus_post_icons_spacing'			=> $option5['sfsi_plus_icons_spacing'],
        'sfsi_plus_post_icons_vertical_spacing'	=> 5,

		'sfsi_plus_show_Onposts'				=> $option6['sfsi_plus_show_Onposts'],
		'sfsi_plus_textBefor_icons'				=> $option6['sfsi_plus_textBefor_icons'],
		'sfsi_plus_textBefor_icons_font_size'	=> '20',
		'sfsi_plus_textBefor_icons_fontcolor'	=> '#000000',
		'sfsi_plus_textBefor_icons_font_type'	=> 'normal',
		'sfsi_plus_textBefor_icons_font'		=> 'inherit',

		'sfsi_plus_icons_alignment'				=> $option6['sfsi_plus_icons_alignment'],
		'sfsi_plus_icons_DisplayCounts'			=> $option6['sfsi_plus_icons_DisplayCounts'],
		
		'sfsi_plus_place_item_manually'			=> 'no',
		'sfsi_plus_shortcode_horizontal_verical_Alignment' => 'Horizontal',
		
		'sfsi_plus_place_rectangle_icons_item_manually'	=> 'no',
		
        'sfsi_plus_show_item_onposts'			=> $option6['sfsi_plus_show_Onposts'],
		'sfsi_plus_display_button_type'			=> 'standard_buttons',
        'sfsi_plus_display_before_posts'		=> 'no',
		'sfsi_plus_display_after_posts'			=> $option6['sfsi_plus_show_Onposts'],
		'sfsi_plus_display_on_postspage'		=> 'no',
		'sfsi_plus_display_on_homepage'			=> 'no',
		'sfsi_plus_display_before_blogposts'	=> 'no',
		'sfsi_plus_display_after_blogposts'		=> 'no',
		'sfsi_plus_display_before_pageposts'	=> 'no',
		'sfsi_plus_display_after_pageposts'		=> 'no',
		'sfsi_plus_rectsub'						=> 'yes',
		'sfsi_plus_rectfb'						=> 'yes',
		'sfsi_plus_rectgp'						=> 'yes',
		'sfsi_plus_rectshr'						=> 'no',
		'sfsi_plus_recttwtr'					=> 'yes',
		'sfsi_plus_rectpinit'					=> 'yes',
		'sfsi_plus_rectfbshare'					=> 'yes',
		'sfsi_plus_rectlinkedin'				=> 'yes',
		'sfsi_plus_rectreddit'					=> 'yes',

		'sfsi_plus_widget_show_on_desktop'		=> 'yes',
		'sfsi_plus_widget_show_on_mobile'		=> 'yes',

		'sfsi_plus_float_show_on_desktop'		=> 'yes',
		'sfsi_plus_float_show_on_mobile'		=> 'yes',

		'sfsi_plus_shortcode_show_on_desktop'	=> 'yes',
		'sfsi_plus_shortcode_show_on_mobile'	=> 'yes',

        'sfsi_plus_rectangle_icons_shortcode_show_on_desktop' => 'yes',
        'sfsi_plus_rectangle_icons_shortcode_show_on_mobile'  => 'yes',

		'sfsi_plus_beforeafterposts_show_on_desktop' => 'yes',
		'sfsi_plus_beforeafterposts_show_on_mobile'	 => 'yes',

		'sfsi_plus_choose_post_types'			=> serialize(array()),
		'sfsi_plus_taxonomies_for_icons'        => serialize(array()), // Taxonomy selection field added in Que3 in VERSION 3.1

		'sfsi_plus_icons_rules' 				=> 0,

		'sfsi_plus_exclude_home'				=> 'no',
		'sfsi_plus_exclude_page'				=> 'no',
		'sfsi_plus_exclude_post'				=> 'no',
		'sfsi_plus_exclude_tag'					=> 'no',
		'sfsi_plus_exclude_category'			=> 'no',
		'sfsi_plus_exclude_date_archive'		=> 'no',
		'sfsi_plus_exclude_author_archive'		=> 'no',
		'sfsi_plus_exclude_search'				=> 'no',
		'sfsi_plus_exclude_url'					=> 'no',
		'sfsi_plus_urlKeywords'					=> array(),
		'sfsi_plus_switch_exclude_custom_post_types'=> 'no',
		'sfsi_plus_list_exclude_custom_post_types'=> serialize(array()),
		'sfsi_plus_switch_exclude_taxonomies'	=> 'no',
		'sfsi_plus_list_exclude_taxonomies'		=> serialize(array()),	

		'sfsi_plus_include_home'				=> 'no',
		'sfsi_plus_include_page'				=> 'no',
		'sfsi_plus_include_post'				=> 'no',
		'sfsi_plus_include_tag'					=> 'no',
		'sfsi_plus_include_category'			=> 'no',
		'sfsi_plus_include_date_archive'		=> 'no',
		'sfsi_plus_include_author_archive'		=> 'no',
		'sfsi_plus_include_search'				=> 'no',
		'sfsi_plus_include_url'					=> 'no',
		'sfsi_plus_include_urlKeywords'			=> array(),
		'sfsi_plus_switch_include_custom_post_types'=> 'no',
		'sfsi_plus_list_include_custom_post_types'=> serialize(array()),
		'sfsi_plus_switch_include_taxonomies'	=> 'no',
		'sfsi_plus_list_include_taxonomies'		=> serialize(array()),

		'sfsi_plus_marginAbove_postIcon'		=> '',
		'sfsi_plus_marginBelow_postIcon'		=> ''

	);
	add_option('sfsi_premium_section8_options',  serialize($options8));		
	
	/*Some additional option added*/	
	update_option('sfsi_premium_feed_id'		, sanitize_text_field($sffeeds->feed_id));
	update_option('sfsi_premium_redirect_url'	, sanitize_text_field($sffeeds->redirect_url));
	
	add_option('sfsi_premium_installDate',date('Y-m-d h:i:s'));
	add_option('sfsi_premium_RatingDiv','no');
	add_option('sfsi_premium_footer_sec','no');
	update_option('sfsi_premium_activate', 1);
	
	/*Changes in option 2*/
	$get_option2 = unserialize(get_option('sfsi_premium_section2_options',false));
	$get_option2['sfsi_plus_email_url'] = $sffeeds->redirect_url;
	update_option('sfsi_premium_section2_options', serialize($get_option2));
	
	/*Activation Setup for (specificfeed)*/
	sfsi_plus_setUpfeeds($sffeeds->feed_id);
	sfsi_plus_updateFeedPing('N',$sffeeds->feed_id);
	
	/*Extra important options*/
	$sfsi_premium_instagram_sf_count = array(
		"date" => strtotime(date("Y-m-d")),
		"sfsi_plus_sf_count" => "",
		"sfsi_plus_instagram_count" => ""
	);
	add_option('sfsi_premium_instagram_sf_count',  serialize($sfsi_premium_instagram_sf_count));

	/** Url shortner data table **/
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix."sfsi_shorten_links";
	
	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
		$sql = "CREATE TABLE $table_name (
		  id bigint(9) NOT NULL AUTO_INCREMENT,
		  post_id bigint(9) NOT NULL,
		  shorteningMethod varchar(30) NOT NULL,
		  longUrl text NOT NULL,
		  shortenUrl varchar(100) DEFAULT '' NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

	// Create job queue table for handling facebook count caching
	$sfsi_job_queue = sfsiJobQueue::getInstance();

	$jobQueueInstalled = get_option('sfsi_premium_job_queue_installed',false);

	if(false == $jobQueueInstalled){
		$sfsi_job_queue->install_job_queue();	
	}	
}
/* end function  */
/* deactivate plugin */
function sfsi_plus_deactivate_plugin()
{
	global $wpdb;
	sfsi_plus_updateFeedPing('Y',sanitize_text_field(get_option('sfsi_premium_feed_id'))); 
}
/* end function  */
function sfsi_plus_updateFeedPing($status,$feed_id)
{
    $curl = curl_init();  
     
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/wordpress/pingfeed',
        CURLOPT_USERAGENT => 'sf rss request',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            'feed_id' => $feed_id,
            'status' => $status
        )
    ));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	$resp=json_decode($resp);
	curl_close($curl);
}

/* unistall plugin function */	
function sfsi_plus_Unistall_plugin()
{   global $wpdb;
    /* Delete option for which icons to display */
    delete_option('sfsi_premium_section1_options');
    delete_option('sfsi_premium_section2_options');
    delete_option('sfsi_premium_section3_options');
    delete_option('sfsi_premium_section4_options');
    delete_option('sfsi_premium_section5_options');
    delete_option('sfsi_premium_section6_options');
    delete_option('sfsi_premium_section7_options');
	delete_option('sfsi_premium_section8_options');
	delete_option('sfsi_premium_section9_options');

    delete_option('sfsi_premium_feed_id');
	delete_option('sfsi_premium_redirect_url');
    delete_option('sfsi_premium_footer_sec');
    delete_option('sfsi_premium_activate');
	delete_option('sfsi_premium_pluginVersion');
	delete_option('sfsi_premium_verificatiom_code');
	delete_option('sfsi_premium_curlErrorNotices');
	delete_option('sfsi_premium_curlErrorMessage');
	
	delete_option('sfsi_active_license_api_name');
	delete_option(ULTIMATELYSOCIAL_LICENSING.'_license_key');
	delete_option(ULTIMATELYSOCIAL_LICENSING.'_license_status');
	delete_option(ULTIMATELYSOCIAL_LICENSING.'_license_activated');
	delete_option(ULTIMATELYSOCIAL_LICENSING.'_license_expiry');

	delete_option(SELLCODES_LICENSING.'_license_key');
	delete_option(SELLCODES_LICENSING.'_license_status');
	delete_option(SELLCODES_LICENSING.'_license_activated');
	delete_option(SELLCODES_LICENSING.'_license_expiry');

	delete_option('adding_plustags');
	delete_option('sfsi_premium_RatingDiv');
	delete_option('sfsi_premium_instagram_sf_count');
	delete_option('sfsi_premium_installDate');
    delete_option('sfsi_premium_serverphpVersionnotification');

    delete_option('widget_sfsi-plus-widget');
    delete_option('widget_sfsiplus_subscriber_widget');

    /* Remove all images data from db saved for custom images for icons in Questions 4. We are not deleting actual files */
	delete_option('plus_rss_skin');
	delete_option('plus_email_skin');
	delete_option('plus_facebook_skin');
	delete_option('plus_google_skin');
	delete_option('plus_twitter_skin');
	delete_option('plus_share_skin');
	delete_option('plus_youtube_skin');
	delete_option('plus_pintrest_skin');
	delete_option('plus_linkedin_skin');
	delete_option('plus_instagram_skin');
	delete_option('plus_houzz_skin');
	delete_option('plus_snapchat_skin');
	delete_option('plus_whatsapp_skin');
	delete_option('plus_skype_skin');
	delete_option('plus_vimeo_skin');
	delete_option('plus_soundcloud_skin');
	delete_option('plus_yummly_skin');
	delete_option('plus_flickr_skin');
	delete_option('plus_reddit_skin');
	delete_option('plus_tumblr_skin');

	// Removing data saved for facebook count caching
	delete_option('sfsi_premium_fb_batch_api_last_call_log');

	delete_option('sfsi-premium-fb-cumulative-api-call-queue');
	delete_option('sfsi-premium-fb-uncumulative-api-call-queue');

	delete_option('sfsi-premium-fb-cumulative-cached-count');
	delete_option('sfsi-premium-fb-uncumulative-cached-count');

	delete_option('sfsi-premium-homepage-fb-cumulative-cached-count');
	delete_option('sfsi-premium-homepage-fb-uncumulative-cached-count');

	delete_option('sfsi-premium-cumulative-fb-count-for-url-not-having-postid');
	delete_option('sfsi-premium-uncumulative-fb-count-for-url-not-having-postid');

	// Remove data saved for twitter followers caching 
	delete_option('sfsi_premium_tw_api_last_call_log');
	delete_option('sfsi_premium_twitter_followers_count');
    
    /***** Remove table created for url shortner ******/
	$table_name = $wpdb->prefix.'sfsi_shorten_links';
	$wpdb->query( "DROP TABLE IF EXISTS $table_name" );

	$sfsiJobQueue = sfsiJobQueue::getInstance();
	$sfsiJobQueue->uninstall_job_queue();
}
/* end function */
/* check CUrl */
function sfsi_plus_curl_enable_notice(){
    if(!function_exists('curl_init')) {
		echo '<div class="error"><p> '.__('Error: It seems that CURL is disabled on your server. Please contact your server administrator to install / enable CURL.',SFSI_PLUS_DOMAIN).'</p></div>'; die;
    }
}
	
/* add admin menus */
function sfsi_plus_admin_menu() {
	
	$license_api_name = (false === get_option('sfsi_active_license_api_name')) ? ULTIMATELYSOCIAL_LICENSING: get_option('sfsi_active_license_api_name');
	$license = trim( get_option( $license_api_name.'_license_key' ));
	$status  = trim( get_option( $license_api_name.'_license_status'));
	
	if(!empty($license) && "valid" == strtolower($status))
	{
		add_menu_page(
			'USM Premium',
			'USM Premium',
			'administrator',
			'sfsi-plus-options',
			'sfsi_plus_options_page',
			plugins_url( 'images/premium-logo-small.png' , dirname(__FILE__) )
		);

		//add_submenu_page( 'sfsi-plus-options', "Import Setting", "Import Setting", 'administrator', "sfsi-import-setting", 'sfsi_plus_import_setting');
	}
	else
	{
		add_menu_page(
			'USM Premium',
			'USM Premium',
			'administrator',
			'sfsi-plus-options',
			'sfsi_plus_about_page',
			plugins_url( 'images/premium-logo-small.png' , dirname(__FILE__) )
		);
	}
}
function sfsi_plus_options_page(){ include SFSI_PLUS_DOCROOT . '/views/sfsi_options_view.php';	} /* end function  */
function sfsi_plus_about_page(){ include SFSI_PLUS_DOCROOT . '/views/sfsi_aboutus.php';	} /* end function  */
if ( is_admin() ){
    add_action('admin_menu', 'sfsi_plus_admin_menu');
}
/* fetch rss url from specificfeeds */ 
function SFSI_PLUS_getFeedUrl()
{
	$curl = curl_init();  
     
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/wordpress/plugin_setup',
        CURLOPT_USERAGENT => 'sf rss request',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            'web_url'	=> get_bloginfo('url'),
            'feed_url'	=> sfsi_plus_get_bloginfo('rss2_url'),
			'email'		=> '',
			'subscriber_type' => 'PWP'
        )
    ));
    // Send the request & save response to $resp
	$resp = curl_exec($curl);
	if(curl_errno($curl))
	{
		update_option("sfsi_premium_curlErrorNotices", "yes");
		update_option("sfsi_premium_curlErrorMessage", curl_errno($curl));
	}
	$resp = json_decode($resp);
	curl_close($curl);
		
	$feed_url = stripslashes_deep($resp->redirect_url);
	return $resp;exit;
         
}
/* fetch rss url from specificfeeds on */ 
function SFSI_PLUS_updateFeedUrl()
{
    $curl = curl_init();  
     
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/wordpress/updateFeedPlugin',
        CURLOPT_USERAGENT => 'sf rss request',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
			'feed_id' 	=> sanitize_text_field(get_option('sfsi_premium_feed_id')),
            'web_url' 	=> get_bloginfo('url'),
            'feed_url' 	=> sfsi_plus_get_bloginfo('rss2_url'),
            'email'		=> ''
        )
    ));
 	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	$resp = json_decode($resp);
	curl_close($curl);
	
	$feed_url = stripslashes_deep($resp->redirect_url);
	return $resp;exit;
}
/* add sf tags */
function sfsi_plus_setUpfeeds($feed_id)
{
	$curl = curl_init();  
	curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/rssegtcrons/download_rssmorefeed_data_single/'.$feed_id."/Y",
        CURLOPT_USERAGENT => 'sf rss request',
        CURLOPT_POST => 0      
	));
	$resp = curl_exec($curl);
	curl_close($curl);	
	
}
/* admin notice if wp_head is missing in active theme */
function sfsi_plus_check_wp_head() {
	
	$template_directory = get_template_directory();
	$header = $template_directory . '/header.php';
	
	if (is_file($header)) {
		
	    $search_header = "wp_head";
	    $file_lines = @file($header);
	    $foind_header=0;
	    foreach ($file_lines as $line)
		{
		    $searchCount = substr_count($line, $search_header);
		    if ($searchCount > 0)
			{
			    return true;
		    }
		}
	    $path=pathinfo($_SERVER['REQUEST_URI']);
	    
	    if($path['basename']=="themes.php" || $path['basename']=="theme-editor.php" || $path['basename']=="admin.php?page=sfsi-plus-options")
	    {
	    	$currentTheme = wp_get_theme();
	    		    	
	    	if(!is_child_theme() && isset($currentTheme) && !empty($currentTheme) && $currentTheme->get( 'Name' ) != "Customizr"){

	    		echo "<div class=\"error\" ><p>". __( 'Error : Please fix your theme to make plugins work correctly. Go to the Theme Editor and insert the following string:', SFSI_PLUS_DOMAIN )." &lt;?php wp_head(); ?&gt; ".__('Please enter it just before the following line of your header.php file:',SFSI_PLUS_DOMAIN)." &lt;/head&gt; ".__('Go to your theme editor: ',SFSI_PLUS_DOMAIN)."<a href=\"theme-editor.php\">".__('click here', SFSI_PLUS_DOMAIN )."</a>.</p></div>";		
	    	}
		}		
	}
}
/* admin notice if wp_footer is missing in active theme */
function sfsi_plus_check_wp_footer() {
    $template_directory = get_template_directory();
    $footer = $template_directory . '/footer.php';
 
	if (is_file($footer)) {
		$search_string = "wp_footer";
		$file_lines = @file($footer);
		
		foreach ($file_lines as $line) {
			$searchCount = substr_count($line, $search_string);
			if ($searchCount > 0) {
				return true;
			}
		}

		$path=pathinfo($_SERVER['REQUEST_URI']);

		$currentTheme = wp_get_theme();
		
		if($path['basename']=="themes.php" || $path['basename']=="theme-editor.php" || $path['basename']=="admin.php?page=sfsi-plus-options")
		{
			if(!is_child_theme()){
				echo "<div class=\"error\" ><p>".	__("Error: Please fix your theme to make plugins work correctly. Go to the Theme Editor and insert the following string as the first line of your theme's footer.php file: ", SFSI_PLUS_DOMAIN)." &lt;?php wp_footer(); ?&gt; ".__("Go to your theme editor: ", SFSI_PLUS_DOMAIN)."<a href=\"theme-editor.php\">".__('click here', SFSI_PLUS_DOMAIN )."</a>.</p></div>";
			}
		} 	    
	}
}
/* admin notice for first time installation */
function sfsi_plus_activation_msg()
{
	global $wp_version;
	
	if(get_option('sfsi_premium_activate',false)==1)
	{
		echo "<div class='updated'><p>".__("Thank you for installing the Ultimate Social Media Premium plugin. Please go to the plugin's settings page to configure it: ",SFSI_PLUS_DOMAIN)."<b><a href='admin.php?page=sfsi-plus-options'>".__("Click here",SFSI_PLUS_DOMAIN)."</a></b></p></div>";
		update_option('sfsi_premium_activate',0);
	}
	
	$path=pathinfo($_SERVER['REQUEST_URI']);
	update_option('sfsi_premium_activate',0);		
	
	if($wp_version < 3.5 && $path['basename'] == "admin.php?page=sfsi-plus-options")
	{
		echo "<div class=\"update-nag\" ><p><b>".__('You`re using an old Wordpress version, which may cause several of your plugins to not work correctly. Please upgrade', SFSI_PLUS_DOMAIN)."</b></p></div>"; 
	}
}
/* admin notice for first time installation */
function sfsi_plus_rating_msg()
{
    global $wp_version;
    $install_date = get_option('sfsi_premium_installDate');
    $display_date = date('Y-m-d h:i:s');
	$datetime1 = new DateTime($install_date);
	$datetime2 = new DateTime($display_date);
	$diff_inrval = round(($datetime2->format('U') - $datetime1->format('U')) / (60*60*24));

	if($diff_inrval >= 30 && get_option('sfsi_premium_RatingDiv')=="no")
	{
		$notification = '
			<div class="sfwp_fivestar updated">
				<p>'.__('We noticed you\'ve been using the Ultimate Social Media Premium Plugin for more than 30 days. If you\'re happy with it, could you please do us a BIG favor and give it a 5-star rating on Wordpress?', SFSI_PLUS_DOMAIN).'</p>
				<ul class="sfwp_fivestar_ul">
					<li><a href="https://wordpress.org/support/view/plugin-reviews/ultimate-social-media-plus" target="_new" title="Ok, you deserved it">'.__('Ok, you deserved it', SFSI_PLUS_DOMAIN).'</a></li>
					<li><a href="javascript:void(0);" class="sfsiHideRating" title="I already did">'.__('I already did', SFSI_PLUS_DOMAIN).'</a></li>
					<li><a href="javascript:void(0);" class="sfsiHideRating" title="No, not good enough">'.__('No, not good enough', SFSI_PLUS_DOMAIN).'</a></li>
				</ul>
			</div>
			<script>
			jQuery( document ).ready(function( $ ) {
				jQuery(\'.sfsiHideRating\').click(function(){
					var data={\'action\':\'plushideRating\'}
					jQuery.ajax({
						url: "'.admin_url( 'admin-ajax.php' ).'",
						type: "post",
						data: data,
						dataType: "json",
						async: !0,
						success: function(e) {
							if (e=="success") {
							   jQuery(\'.sfwp_fivestar\').slideUp(\'slow\');
							}
						}
					});
				})
			});
			</script>';
	}
}
add_action('wp_ajax_plushideRating','sfsi_plusHideRatingDiv');
function sfsi_plusHideRatingDiv()
{
    update_option('sfsi_premium_RatingDiv','yes');
    echo  json_encode(array("success")); exit;
}
/* add all admin message */

add_action('admin_notices', 'sfsi_plus_activation_msg');
add_action('admin_notices', 'sfsi_plus_rating_msg');
add_action('admin_notices', 'sfsi_plus_check_wp_head');
add_action('admin_notices', 'sfsi_plus_check_wp_footer');
function sfsi_plus_pingVendor( $post_id )
{
    global $wp,$wpdb;
	// If this is just a revision, don't send the email.
	if ( wp_is_post_revision( $post_id ) )
		return;
		
	$post_data=get_post($post_id,ARRAY_A);
	if($post_data['post_status']=='publish' && $post_data['post_type']=='post') : 
		
		$categories = wp_get_post_categories($post_data['ID']);
		$cats='';
		$total=count($categories);
		$count=1;
		foreach($categories as $c)
		{	
			$cat_data = get_category( $c );
			if($count==$total)
			{
				$cats.= $cat_data->name;
			}
			else
			{
				$cats.= $cat_data->name.',';	
			}
			$count++;	
		}
		$postto_array = array(
			'feed_id'	=> sanitize_text_field(get_option('sfsi_premium_feed_id')),
			'title'		=> $post_data['post_title'],
			'description' => $post_data['post_content'],
			'link'		=> $post_data['guid'],
			'author'	=> get_the_author_meta('user_login', $post_data['post_author']),
			'category' 	=> $cats,
			'pubDate'	=> $post_data['post_modified'],
			'rssurl'	=> sfsi_plus_get_bloginfo('rss2_url')
		);
		
		$curl = curl_init();  
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'http://www.specificfeeds.com/wordpress/addpostdata ',
			CURLOPT_USERAGENT => 'sf rss request',
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => $postto_array
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		$resp=json_decode($resp);
		curl_close($curl);
		return true;
    endif;
}
add_action( 'save_post', 'sfsi_plus_pingVendor' );			
?>
