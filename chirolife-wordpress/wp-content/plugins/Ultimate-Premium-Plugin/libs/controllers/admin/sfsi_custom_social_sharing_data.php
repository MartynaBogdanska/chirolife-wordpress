<?php

function sfsi_premium_social_media_metabox( $post ) {
    
    wp_nonce_field( 'sfsi_premium_social_media_submit', 'sfsi_premium_social_media_nonce' );?>

    <link rel='stylesheet' href="<?php echo SFSI_PLUS_PLUGURL.'css/sfsi_social_media_sharing_data_style.css';?>" type='text/css' />
    <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_social_media_sharing_data_view.php');?>
    <script src="<?php echo SFSI_PLUS_PLUGURL.'js/sfsi_social_media_sharing_data.js';?>"></script>
<?php     
}


/**
 * Add Case Study background image metabox to the back end of Case Study posts
 */
 
function sfsi_premium_icons_add_meta_boxes() {

    if(false != License_Manager::validate_license()){ 

        if(false === function_exists('get_current_screen')){
            require_once(ABSPATH . 'wp-admin/includes/screen.php');
            $screen = get_current_screen();         
        }
        else{
            $screen = get_current_screen();             
        }
        
        $option5           = unserialize(get_option('sfsi_premium_section5_options',false));
        $selectedPostTypes = (isset($option5['sfsi_custom_social_data_post_types_data'])) ? unserialize($option5['sfsi_custom_social_data_post_types_data']): array();

        // CODE TO REMOVE IN VERSION 2.8
        if(isset($selectedPostTypes[0]) && !empty($selectedPostTypes[0]) && is_array($selectedPostTypes[0])){
        	$selectedPostTypes = $selectedPostTypes[0];
        }
        
        if(isset($screen->post_type) && isset($option5['sfsi_plus_social_sharing_options']) && "posttype" == $option5['sfsi_plus_social_sharing_options'] && count($selectedPostTypes)>0){
            if(in_array($screen->post_type,$selectedPostTypes)){
                add_meta_box( 'sfsi-premium-social-media', 'Ultimate Social Media – Sharing text & pictures', 'sfsi_premium_social_media_metabox', $screen->post_type, 'normal', 'low' );
            }  
        }
    }
}
add_action( 'add_meta_boxes', 'sfsi_premium_icons_add_meta_boxes' );
 
/**
 * Save background image metabox for Case Study posts
 */
 
function sfsi_premium_social_media_save_meta_box( $post_id ) {
 
    if(false != License_Manager::validate_license()){ 

        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_first_nonce = ( isset( $_POST[ 'sfsi_premium_social_media_nonce' ] ) && wp_verify_nonce( $_POST[ 'sfsi_premium_social_media_nonce' ], 'sfsi_premium_social_media_submit' ) ) ? 'true' : 'false';
     
        // Exits script depending on save status
        if ( $is_autosave || $is_revision || !$is_valid_first_nonce) {
            return;
        }
     
       // Checks for input and sanitizes/saves if needed
        if( isset( $_POST[ 'sfsi-social-media-image' ] ) ) {
            update_post_meta( $post_id, 'sfsi-social-media-image', $_POST['sfsi-social-media-image'] );
        }
        if( isset( $_POST[ 'social_fbGLTw_title_textarea' ] ) ) {
            $title  =  wp_strip_all_tags(wp_kses_post(trim($_POST['social_fbGLTw_title_textarea'])));
            update_post_meta( $post_id, 'sfsi-fbGLTw-title', $title );
        }
        if( isset( $_POST[ 'social_fbGLTw_description_textarea' ] ) ) {
            $desc = wp_strip_all_tags(wp_kses_post(trim($_POST['social_fbGLTw_description_textarea'])));
            update_post_meta( $post_id, 'sfsi-fbGLTw-description', $desc );
        }    

        if( isset( $_POST[ 'sfsi-social-pinterest-image' ] ) ) {
            update_post_meta( $post_id, 'sfsi-pinterest-media-image', $_POST['sfsi-social-pinterest-image'] );
        }

        if( isset( $_POST[ 'social_pinterest_description_textarea' ] ) ) {
            $desc = wp_strip_all_tags(wp_kses_post(trim($_POST['social_pinterest_description_textarea']))) ;
            update_post_meta( $post_id, 'social-pinterest-description', $desc );
        }

        if( isset( $_POST[ 'social_twitter_description_textarea' ] ) ) {
            $title = wp_strip_all_tags(wp_kses_post(trim($_POST['social_twitter_description_textarea'])));
            update_post_meta( $post_id, 'social-twitter-description', $title );
        }
    }
}
add_action( 'save_post', 'sfsi_premium_social_media_save_meta_box' );
?>