<?php 
/* save all option to options table in database using ajax */
/* save settings for section 1 */        
add_action('wp_ajax_plus_updateSrcn1','sfsi_plus_options_updater1');        
function sfsi_plus_options_updater1()
{
    if ( !wp_verify_nonce( $_POST['nonce'], "update_plus_step1")) {
      echo  json_encode(array("wrong_nonce")); exit;
    }

    $option1=  unserialize(get_option('sfsi_premium_section1_options',false));

    $sfsi_plus_rss_display          = isset($_POST["sfsi_plus_rss_display"])       ? $_POST["sfsi_plus_rss_display"] : 'no'; 
    $sfsi_plus_email_display        = isset($_POST["sfsi_plus_email_display"])     ? $_POST["sfsi_plus_email_display"] : 'no'; 
    $sfsi_plus_facebook_display     = isset($_POST["sfsi_plus_facebook_display"])  ? $_POST["sfsi_plus_facebook_display"] : 'no'; 
    $sfsi_plus_twitter_display      = isset($_POST["sfsi_plus_twitter_display"])   ? $_POST["sfsi_plus_twitter_display"] : 'no'; 
    $sfsi_plus_google_display       = isset($_POST["sfsi_plus_google_display"])    ? $_POST["sfsi_plus_google_display"] : 'no'; 
    $sfsi_plus_share_display        = isset($_POST["sfsi_plus_share_display"])     ? $_POST["sfsi_plus_share_display"] : 'no'; 
    $sfsi_plus_youtube_display      = isset($_POST["sfsi_plus_youtube_display"])   ? $_POST["sfsi_plus_youtube_display"] : 'no'; 
    $sfsi_plus_pinterest_display    = isset($_POST["sfsi_plus_pinterest_display"]) ? $_POST["sfsi_plus_pinterest_display"] : 'no';
    $sfsi_plus_linkedin_display     = isset($_POST["sfsi_plus_linkedin_display"]) ? $_POST["sfsi_plus_linkedin_display"] : 'no';
    $sfsi_plus_instagram_display    = isset($_POST["sfsi_plus_instagram_display"]) ? $_POST["sfsi_plus_instagram_display"] : 'no';
    $sfsi_plus_houzz_display        = isset($_POST["sfsi_plus_houzz_display"])     ? $_POST["sfsi_plus_houzz_display"] : 'no';
    
    $sfsi_plus_snapchat_display     = isset($_POST["sfsi_plus_snapchat_display"])   ? $_POST["sfsi_plus_snapchat_display"] : 'no';
    $sfsi_plus_whatsapp_display     = isset($_POST["sfsi_plus_whatsapp_display"])   ? $_POST["sfsi_plus_whatsapp_display"] : 'no';
    $sfsi_plus_skype_display        = isset($_POST["sfsi_plus_skype_display"])      ? $_POST["sfsi_plus_skype_display"] : 'no';
    $sfsi_plus_vimeo_display        = isset($_POST["sfsi_plus_vimeo_display"])      ? $_POST["sfsi_plus_vimeo_display"] : 'no';
    $sfsi_plus_soundcloud_display   = isset($_POST["sfsi_plus_soundcloud_display"]) ? $_POST["sfsi_plus_soundcloud_display"] : 'no';
    $sfsi_plus_yummly_display       = isset($_POST["sfsi_plus_yummly_display"])     ? $_POST["sfsi_plus_yummly_display"] : 'no';
    $sfsi_plus_flickr_display       = isset($_POST["sfsi_plus_flickr_display"])     ? $_POST["sfsi_plus_flickr_display"] : 'no';
    $sfsi_plus_reddit_display       = isset($_POST["sfsi_plus_reddit_display"])     ? $_POST["sfsi_plus_reddit_display"] : 'no';
    $sfsi_plus_tumblr_display       = isset($_POST["sfsi_plus_tumblr_display"])     ? $_POST["sfsi_plus_tumblr_display"] : 'no';
    
    $sfsi_plus_icons_onmobile           = isset($_POST["sfsi_plus_icons_onmobile"]) ? $_POST["sfsi_plus_icons_onmobile"] : 'no'; 
    
    $sfsi_plus_rss_mobiledisplay        = isset($_POST["sfsi_plus_rss_mobiledisplay"]) ? $_POST["sfsi_plus_rss_mobiledisplay"] : 'no'; 
    $sfsi_plus_email_mobiledisplay      = isset($_POST["sfsi_plus_email_mobiledisplay"]) ? $_POST["sfsi_plus_email_mobiledisplay"] : 'no'; 
    $sfsi_plus_facebook_mobiledisplay   = isset($_POST["sfsi_plus_facebook_mobiledisplay"]) ? $_POST["sfsi_plus_facebook_mobiledisplay"] : 'no'; 
    $sfsi_plus_twitter_mobiledisplay    = isset($_POST["sfsi_plus_twitter_mobiledisplay"]) ? $_POST["sfsi_plus_twitter_mobiledisplay"] : 'no'; 
    $sfsi_plus_google_mobiledisplay     = isset($_POST["sfsi_plus_google_mobiledisplay"]) ? $_POST["sfsi_plus_google_mobiledisplay"] : 'no'; 
    $sfsi_plus_share_mobiledisplay      = isset($_POST["sfsi_plus_share_mobiledisplay"]) ? $_POST["sfsi_plus_share_mobiledisplay"] : 'no'; 
    $sfsi_plus_youtube_mobiledisplay    = isset($_POST["sfsi_plus_youtube_mobiledisplay"]) ? $_POST["sfsi_plus_youtube_mobiledisplay"] : 'no'; 
    $sfsi_plus_pinterest_mobiledisplay  = isset($_POST["sfsi_plus_pinterest_mobiledisplay"]) ? $_POST["sfsi_plus_pinterest_mobiledisplay"] : 'no';
    $sfsi_plus_instagram_mobiledisplay  = isset($_POST["sfsi_plus_instagram_mobiledisplay"]) ? $_POST["sfsi_plus_instagram_mobiledisplay"] : 'no';
    $sfsi_plus_houzz_mobiledisplay      = isset($_POST["sfsi_plus_houzz_mobiledisplay"]) ? $_POST["sfsi_plus_houzz_mobiledisplay"] : 'no';
    
    $sfsi_plus_snapchat_mobiledisplay   = isset($_POST["sfsi_plus_snapchat_mobiledisplay"]) ? $_POST["sfsi_plus_snapchat_mobiledisplay"] : 'no';
    $sfsi_plus_whatsapp_mobiledisplay   = isset($_POST["sfsi_plus_whatsapp_mobiledisplay"]) ? $_POST["sfsi_plus_whatsapp_mobiledisplay"] : 'no';
    $sfsi_plus_skype_mobiledisplay      = isset($_POST["sfsi_plus_skype_mobiledisplay"]) ? $_POST["sfsi_plus_skype_mobiledisplay"] : 'no';
    $sfsi_plus_vimeo_mobiledisplay      = isset($_POST["sfsi_plus_vimeo_mobiledisplay"]) ? $_POST["sfsi_plus_vimeo_mobiledisplay"] : 'no';
    $sfsi_plus_soundcloud_mobiledisplay = isset($_POST["sfsi_plus_soundcloud_mobiledisplay"]) ? $_POST["sfsi_plus_soundcloud_mobiledisplay"] : 'no';
    $sfsi_plus_yummly_mobiledisplay     = isset($_POST["sfsi_plus_yummly_mobiledisplay"]) ? $_POST["sfsi_plus_yummly_mobiledisplay"] : 'no';
    $sfsi_plus_flickr_mobiledisplay     = isset($_POST["sfsi_plus_flickr_mobiledisplay"]) ? $_POST["sfsi_plus_flickr_mobiledisplay"] : 'no';
    $sfsi_plus_reddit_mobiledisplay     = isset($_POST["sfsi_plus_reddit_mobiledisplay"]) ? $_POST["sfsi_plus_reddit_mobiledisplay"] : 'no';
    $sfsi_plus_tumblr_mobiledisplay     = isset($_POST["sfsi_plus_tumblr_mobiledisplay"]) ? $_POST["sfsi_plus_tumblr_mobiledisplay"] : 'no';
    
    $sfsi_plus_linkedin_mobiledisplay   = isset($_POST["sfsi_plus_linkedin_mobiledisplay"]) ? $_POST["sfsi_plus_linkedin_mobiledisplay"] : 'no';
    
    $sfsi_custom_icons                  = isset($option1['sfsi_custom_files']) ? $option1['sfsi_custom_files'] : '';

    $sfsi_custom_desktop_icons           = isset($_POST['sfsi_custom_desktop_icons']) ? serialize(array_filter($_POST['sfsi_custom_desktop_icons'])): '';

    $sfsi_custom_mobile_icons           = isset($_POST['sfsi_custom_mobile_icons']) ? serialize($_POST['sfsi_custom_mobile_icons']): '';

    $up_option1 =   array(
        'sfsi_plus_rss_display'         => sanitize_text_field($sfsi_plus_rss_display),
        'sfsi_plus_email_display'       => sanitize_text_field($sfsi_plus_email_display),
        'sfsi_plus_facebook_display'    => sanitize_text_field($sfsi_plus_facebook_display),
        'sfsi_plus_twitter_display'     => sanitize_text_field($sfsi_plus_twitter_display),
        'sfsi_plus_google_display'      => sanitize_text_field($sfsi_plus_google_display),
        'sfsi_plus_share_display'       => sanitize_text_field($sfsi_plus_share_display),
        'sfsi_plus_youtube_display'     => sanitize_text_field($sfsi_plus_youtube_display),
        'sfsi_plus_pinterest_display'   => sanitize_text_field($sfsi_plus_pinterest_display),
        'sfsi_plus_linkedin_display'    => sanitize_text_field($sfsi_plus_linkedin_display),
        'sfsi_plus_instagram_display'   => sanitize_text_field($sfsi_plus_instagram_display),
        'sfsi_plus_houzz_display'       => sanitize_text_field($sfsi_plus_houzz_display),
        
        'sfsi_plus_snapchat_display'    => sanitize_text_field($sfsi_plus_snapchat_display),
        'sfsi_plus_whatsapp_display'    => sanitize_text_field($sfsi_plus_whatsapp_display),
        'sfsi_plus_skype_display'       => sanitize_text_field($sfsi_plus_skype_display),
        'sfsi_plus_vimeo_display'       => sanitize_text_field($sfsi_plus_vimeo_display),
        'sfsi_plus_soundcloud_display'  => sanitize_text_field($sfsi_plus_soundcloud_display),
        'sfsi_plus_yummly_display'      => sanitize_text_field($sfsi_plus_yummly_display),
        'sfsi_plus_flickr_display'      => sanitize_text_field($sfsi_plus_flickr_display),
        'sfsi_plus_reddit_display'      => sanitize_text_field($sfsi_plus_reddit_display),
        'sfsi_plus_tumblr_display'      => sanitize_text_field($sfsi_plus_tumblr_display),
        
        'sfsi_plus_icons_onmobile'          => sanitize_text_field($sfsi_plus_icons_onmobile),
        'sfsi_plus_rss_mobiledisplay'       => sanitize_text_field($sfsi_plus_rss_mobiledisplay),
        'sfsi_plus_email_mobiledisplay'     => sanitize_text_field($sfsi_plus_email_mobiledisplay),
        'sfsi_plus_facebook_mobiledisplay'  => sanitize_text_field($sfsi_plus_facebook_mobiledisplay),
        'sfsi_plus_twitter_mobiledisplay'   => sanitize_text_field($sfsi_plus_twitter_mobiledisplay),
        'sfsi_plus_google_mobiledisplay'    => sanitize_text_field($sfsi_plus_google_mobiledisplay),
        'sfsi_plus_share_mobiledisplay'     => sanitize_text_field($sfsi_plus_share_mobiledisplay),
        'sfsi_plus_youtube_mobiledisplay'   => sanitize_text_field($sfsi_plus_youtube_mobiledisplay),
        'sfsi_plus_pinterest_mobiledisplay' => sanitize_text_field($sfsi_plus_pinterest_mobiledisplay),
        'sfsi_plus_linkedin_mobiledisplay'  => sanitize_text_field($sfsi_plus_linkedin_mobiledisplay),
        'sfsi_plus_instagram_mobiledisplay' => sanitize_text_field($sfsi_plus_instagram_mobiledisplay),
        'sfsi_plus_houzz_mobiledisplay'     => sanitize_text_field($sfsi_plus_houzz_mobiledisplay),
        
        'sfsi_plus_snapchat_mobiledisplay'  => sanitize_text_field($sfsi_plus_snapchat_mobiledisplay),
        'sfsi_plus_whatsapp_mobiledisplay'  => sanitize_text_field($sfsi_plus_whatsapp_mobiledisplay),
        'sfsi_plus_skype_mobiledisplay'     => sanitize_text_field($sfsi_plus_skype_mobiledisplay),
        'sfsi_plus_vimeo_mobiledisplay'     => sanitize_text_field($sfsi_plus_vimeo_mobiledisplay),
        'sfsi_plus_soundcloud_mobiledisplay'=> sanitize_text_field($sfsi_plus_soundcloud_mobiledisplay),
        'sfsi_plus_yummly_mobiledisplay'    => sanitize_text_field($sfsi_plus_yummly_mobiledisplay),
        'sfsi_plus_flickr_mobiledisplay'    => sanitize_text_field($sfsi_plus_flickr_mobiledisplay),
        'sfsi_plus_reddit_mobiledisplay'    => sanitize_text_field($sfsi_plus_reddit_mobiledisplay),
        'sfsi_plus_tumblr_mobiledisplay'    => sanitize_text_field($sfsi_plus_tumblr_mobiledisplay),

        'sfsi_custom_files'                 => $sfsi_custom_icons,
        'sfsi_custom_desktop_icons'         => $sfsi_custom_desktop_icons,
        'sfsi_custom_mobile_icons'          => $sfsi_custom_mobile_icons
    );
    
    update_option('sfsi_premium_section1_options',  serialize($up_option1));
    
    header('Content-Type: application/json');
    echo  json_encode(array("success")); exit;
}
/* save settings for section 2 */  
add_action('wp_ajax_plus_updateSrcn2','sfsi_plus_options_updater2');        
function sfsi_plus_options_updater2()
{
    if ( !wp_verify_nonce( $_POST['nonce'], "update_plus_step2"))
    {
      echo  json_encode(array("wrong_nonce")); exit;
    }
    $sfsi_plus_rss_url              = isset($_POST["sfsi_plus_rss_url"]) ? trim($_POST["sfsi_plus_rss_url"]) : ''; 
    $sfsi_plus_rss_icons            = isset($_POST["sfsi_plus_rss_icons"]) ? $_POST["sfsi_plus_rss_icons"] : 'email'; 
    
    $sfsi_plus_email_icons_functions        = isset($_POST["sfsi_plus_email_icons_functions"]) ? $_POST["sfsi_plus_email_icons_functions"] : 'sf'; 
    $sfsi_plus_email_icons_contact          = isset($_POST["sfsi_plus_email_icons_contact"]) ? $_POST["sfsi_plus_email_icons_contact"] : ''; 
    $sfsi_plus_email_icons_pageurl          = isset($_POST["sfsi_plus_email_icons_pageurl"]) ? $_POST["sfsi_plus_email_icons_pageurl"] : ''; 
    $sfsi_plus_email_icons_mailchimp_apikey = isset($_POST["sfsi_plus_email_icons_mailchimp_apikey"]) ? $_POST["sfsi_plus_email_icons_mailchimp_apikey"] : '';
    $sfsi_plus_email_icons_mailchimp_listid = isset($_POST["sfsi_plus_email_icons_mailchimp_listid"]) ? $_POST["sfsi_plus_email_icons_mailchimp_listid"] : '';

    $sfsi_plus_email_icons_subject_line     = isset($_POST["sfsi_plus_email_icons_subject_line"]) ? $_POST["sfsi_plus_email_icons_subject_line"] : '${title}'; 
    $sfsi_plus_email_icons_email_content    = isset($_POST["sfsi_plus_email_icons_email_content"]) ? $_POST["sfsi_plus_email_icons_email_content"] :'Check out this article «${title}»: ${link}';

    $sfsi_plus_email_icons_email_content    = htmlentities($sfsi_plus_email_icons_email_content, ENT_QUOTES, 'UTF-8');

    $sfsi_plus_facebookPage_option  = isset($_POST["sfsi_plus_facebookPage_option"]) ? $_POST["sfsi_plus_facebookPage_option"] : 'no'; 
    $sfsi_plus_facebookPage_url     = isset($_POST["sfsi_plus_facebookPage_url"]) ? trim($_POST["sfsi_plus_facebookPage_url"]) : ''; 
    $sfsi_plus_facebookLike_option  = isset($_POST["sfsi_plus_facebookLike_option"]) ? $_POST["sfsi_plus_facebookLike_option"] : 'no'; 
    $sfsi_plus_facebookShare_option = isset($_POST["sfsi_plus_facebookShare_option"]) ? $_POST["sfsi_plus_facebookShare_option"] : 'no';
    //$sfsi_plus_facebookFollow_option= isset($_POST["sfsi_plus_facebookFollow_option"]) ? $_POST["sfsi_plus_facebookFollow_option"] : 'no';
    //$sfsi_plus_facebookProfile_url    = isset($_POST["sfsi_plus_facebookProfile_url"]) ? $_POST["sfsi_plus_facebookProfile_url"] : ''; 
    
    $sfsi_plus_twitter_followme     = isset($_POST["sfsi_plus_twitter_followme"]) ? $_POST["sfsi_plus_twitter_followme"] : 'no'; 
    $sfsi_plus_twitter_followUserName = isset($_POST["sfsi_plus_twitter_followUserName"]) ? trim($_POST["sfsi_plus_twitter_followUserName"]) : '';
    $sfsi_plus_twitter_aboutPage    = isset($_POST["sfsi_plus_twitter_aboutPage"]) ? $_POST["sfsi_plus_twitter_aboutPage"] : 'no';
    $sfsi_plus_twitter_page         = isset($_POST["sfsi_plus_twitter_page"]) ? $_POST["sfsi_plus_twitter_page"] : 'no';
    $sfsi_plus_twitter_pageURL      = isset($_POST["sfsi_plus_twitter_pageURL"]) ? trim($_POST["sfsi_plus_twitter_pageURL"]) : '';
    $sfsi_plus_twitter_aboutPageText= isset($_POST["sfsi_plus_twitter_aboutPageText"])
                                        ? $_POST["sfsi_plus_twitter_aboutPageText"]
                                        : 'Hey check out this cool site I found';
    $sfsi_plus_twitter_twtAddCard   = isset($_POST["sfsi_plus_twitter_twtAddCard"]) ? $_POST["sfsi_plus_twitter_twtAddCard"] : 'no';
    $sfsi_plus_twitter_twtCardType  = isset($_POST["sfsi_plus_twitter_twtCardType"]) ? $_POST["sfsi_plus_twitter_twtCardType"] : 'summary';
    $sfsi_plus_twitter_card_twitter_handle  = isset($_POST["sfsi_plus_twitter_card_twitter_handle"]) ? $_POST["sfsi_plus_twitter_card_twitter_handle"] : $sfsi_plus_twitter_followUserName;                                      
    
    $sfsi_plus_google_page          = isset($_POST["sfsi_plus_google_page"]) ? $_POST["sfsi_plus_google_page"] : 'no';
    $sfsi_plus_google_pageURL       = isset($_POST["sfsi_plus_google_pageURL"]) ? trim($_POST["sfsi_plus_google_pageURL"]) : '';
    $sfsi_plus_googleLike_option    = isset($_POST["sfsi_plus_googleLike_option"]) ? $_POST["sfsi_plus_googleLike_option"] : 'no';
    $sfsi_plus_googleShare_option   = isset($_POST["sfsi_plus_googleShare_option"]) ? $_POST["sfsi_plus_googleShare_option"] : 'no';
    $sfsi_plus_googleFollow_option  = isset($_POST["sfsi_plus_googleFollow_option"]) ? $_POST["sfsi_plus_googleFollow_option"] : 'no';
    
    $sfsi_plus_youtube_pageUrl      = isset($_POST["sfsi_plus_youtube_pageUrl"]) ? trim($_POST["sfsi_plus_youtube_pageUrl"]) : '';
    $sfsi_plus_youtube_page         = isset($_POST["sfsi_plus_youtube_page"]) ? $_POST["sfsi_plus_youtube_page"] : 'no';
    $sfsi_plus_youtube_follow       = isset($_POST["sfsi_plus_youtube_follow"]) ? $_POST["sfsi_plus_youtube_follow"] : 'no';
    
    $sfsi_plus_pinterest_page       = isset($_POST["sfsi_plus_pinterest_page"]) ? $_POST["sfsi_plus_pinterest_page"] : 'no';
    $sfsi_plus_pinterest_pageUrl    = isset($_POST["sfsi_plus_pinterest_pageUrl"]) ? trim($_POST["sfsi_plus_pinterest_pageUrl"]) : '';
    $sfsi_plus_pinterest_pingBlog   = isset($_POST["sfsi_plus_pinterest_pingBlog"]) ? $_POST["sfsi_plus_pinterest_pingBlog"] : 'no';
    
    $sfsi_plus_instagram_pageUrl    = isset($_POST["sfsi_plus_instagram_pageUrl"]) ? trim($_POST["sfsi_plus_instagram_pageUrl"]) : '';  
    
    $sfsi_plus_linkedin_page        = isset($_POST["sfsi_plus_linkedin_page"]) ? $_POST["sfsi_plus_linkedin_page"] : 'no';
    $sfsi_plus_linkedin_pageURL     = isset($_POST["sfsi_plus_linkedin_pageURL"]) ? trim($_POST["sfsi_plus_linkedin_pageURL"]) : '';
    $sfsi_plus_linkedin_follow      = isset($_POST["sfsi_plus_linkedin_follow"]) ? $_POST["sfsi_plus_linkedin_follow"] : 'no';
    $sfsi_plus_linkedin_SharePage   = isset($_POST["sfsi_plus_linkedin_SharePage"]) ? $_POST["sfsi_plus_linkedin_SharePage"] : 'no';
    
    $sfsi_plus_linkedin_followCompany       =   isset($_POST["sfsi_plus_linkedin_followCompany"])
                                                    ? trim($_POST["sfsi_plus_linkedin_followCompany"])
                                                    : '';
    $sfsi_plus_linkedin_recommendBusines    =   isset($_POST["sfsi_plus_linkedin_recommendBusines"])
                                                    ? $_POST["sfsi_plus_linkedin_recommendBusines"]
                                                    : 'no';
    $sfsi_plus_linkedin_recommendCompany    =   isset($_POST["sfsi_plus_linkedin_recommendCompany"])
                                                    ? trim($_POST["sfsi_plus_linkedin_recommendCompany"])
                                                    : '';
    $sfsi_plus_linkedin_recommendProductId  =   isset($_POST["sfsi_plus_linkedin_recommendProductId"])
                                                    ? trim($_POST["sfsi_plus_linkedin_recommendProductId"])
                                                    : '';
    
    $sfsi_plus_youtubeusernameorid  = isset($_POST["sfsi_plus_youtubeusernameorid"]) ? trim($_POST["sfsi_plus_youtubeusernameorid"]) : '';
    $sfsi_plus_ytube_user           = isset($_POST["sfsi_plus_ytube_user"]) ? $_POST["sfsi_plus_ytube_user"] : '';
    $sfsi_plus_ytube_chnlid         = isset($_POST["sfsi_plus_ytube_chnlid"]) ? $_POST["sfsi_plus_ytube_chnlid"] : '';
    
    /*
     * Escape custom icons url
     */
    if(
        isset($_POST["sfsi_plus_custom_links"]) &&
        !empty($_POST["sfsi_plus_custom_links"])
    )
    {
        $esacpedUrls = array();
        $sfsi_plus_CustomIcon_links = $_POST["sfsi_plus_custom_links"];
        foreach($sfsi_plus_CustomIcon_links as $key => $sfsi_pluscustomIconUrl)
        {
            $esacpedUrls[$key] = $sfsi_pluscustomIconUrl;
        }
    }
    else
    {
        $esacpedUrls = '';
    }
    
    $sfsi_plus_CustomIcon_links     = isset($_POST["sfsi_plus_custom_links"]) ? serialize($esacpedUrls) : '';
    $sfsi_plus_houzz_pageUrl        = isset($_POST["sfsi_plus_houzz_pageUrl"]) ? trim($_POST["sfsi_plus_houzz_pageUrl"]) : '';
    
    $sfsi_plus_snapchat_pageUrl     = isset($_POST["sfsi_plus_snapchat_pageUrl"]) ? trim($_POST["sfsi_plus_snapchat_pageUrl"]) : '';
    $sfsi_plus_whatsapp_message     = isset($_POST["sfsi_plus_whatsapp_message"]) ? trim($_POST["sfsi_plus_whatsapp_message"]) : '';
    $sfsi_plus_my_whatsapp_number   = isset($_POST["sfsi_plus_my_whatsapp_number"]) ? trim($_POST["sfsi_plus_my_whatsapp_number"]) : '';
    $sfsi_plus_whatsapp_number      = isset($_POST["sfsi_plus_whatsapp_number"]) ? trim($_POST["sfsi_plus_whatsapp_number"]) : '';
    $sfsi_plus_whatsapp_share_page  = isset($_POST["sfsi_plus_whatsapp_share_page"]) ? trim($_POST["sfsi_plus_whatsapp_share_page"]) : '${title} ${link}';

    $sfsi_plus_skype_options        = isset($_POST["sfsi_plus_skype_options"]) ? sanitize_text_field($_POST["sfsi_plus_skype_options"]) : 'call';
    $sfsi_plus_skype_pageUrl        = isset($_POST["sfsi_plus_skype_pageUrl"]) ? trim($_POST["sfsi_plus_skype_pageUrl"]) : '';

    $sfsi_plus_vimeo_pageUrl        = isset($_POST["sfsi_plus_vimeo_pageUrl"]) ? trim($_POST["sfsi_plus_vimeo_pageUrl"]) : '';
    $sfsi_plus_soundcloud_pageUrl   = isset($_POST["sfsi_plus_soundcloud_pageUrl"]) ? trim($_POST["sfsi_plus_soundcloud_pageUrl"]) : '';
    $sfsi_plus_yummly_pageUrl       = isset($_POST["sfsi_plus_yummly_pageUrl"]) ? trim($_POST["sfsi_plus_yummly_pageUrl"]) : '';
    $sfsi_plus_flickr_pageUrl       = isset($_POST["sfsi_plus_flickr_pageUrl"]) ? trim($_POST["sfsi_plus_flickr_pageUrl"]) : '';
    $sfsi_plus_reddit_pageUrl       = isset($_POST["sfsi_plus_reddit_pageUrl"]) ? trim($_POST["sfsi_plus_reddit_pageUrl"]) : '';
    $sfsi_plus_tumblr_pageUrl       = isset($_POST["sfsi_plus_tumblr_pageUrl"]) ? trim($_POST["sfsi_plus_tumblr_pageUrl"]) : '';
    $sfsi_plus_whatsapp_url_type    = isset($_POST["sfsi_plus_whatsapp_url_type"]) ? trim($_POST["sfsi_plus_whatsapp_url_type"]) : '';
    $sfsi_plus_reddit_url_type      = isset($_POST["sfsi_plus_reddit_url_type"]) ? trim($_POST["sfsi_plus_reddit_url_type"]) : '';
   
    $option2    = unserialize(get_option('sfsi_premium_section2_options',false)); 
    $up_option2 = array(
        'sfsi_plus_rss_url'                 => esc_url($sfsi_plus_rss_url),
        'sfsi_rss_blogName'                 => '',
        'sfsi_rss_blogEmail'                => '',
        'sfsi_plus_rss_icons'               => sanitize_text_field($sfsi_plus_rss_icons),
        'sfsi_plus_email_url'               => esc_url($option2['sfsi_plus_email_url']),   
        
        'sfsi_plus_email_icons_functions'       => sanitize_text_field($sfsi_plus_email_icons_functions),
        'sfsi_plus_email_icons_contact'         => sanitize_text_field($sfsi_plus_email_icons_contact),
        'sfsi_plus_email_icons_pageurl'         => esc_url($sfsi_plus_email_icons_pageurl),
        'sfsi_plus_email_icons_mailchimp_apikey'=> sanitize_text_field($sfsi_plus_email_icons_mailchimp_apikey),
        'sfsi_plus_email_icons_mailchimp_listid'=> sanitize_text_field($sfsi_plus_email_icons_mailchimp_listid),

        'sfsi_plus_email_icons_subject_line'  => sanitize_text_field($sfsi_plus_email_icons_subject_line),
        'sfsi_plus_email_icons_email_content' => $sfsi_plus_email_icons_email_content,

        /* facebook buttons options */
        'sfsi_plus_facebookPage_option'     => sanitize_text_field($sfsi_plus_facebookPage_option),
        'sfsi_plus_facebookPage_url'        => esc_url($sfsi_plus_facebookPage_url),
        'sfsi_plus_facebookLike_option'     => sanitize_text_field($sfsi_plus_facebookLike_option),
        'sfsi_plus_facebookShare_option'    => sanitize_text_field($sfsi_plus_facebookShare_option),
        //'sfsi_plus_facebookFollow_option' => sanitize_text_field($sfsi_plus_facebookFollow_option),
        //'sfsi_plus_facebookProfile_url'       => esc_url($sfsi_plus_facebookProfile_url),
        
        /* Twitter buttons options */
        'sfsi_plus_twitter_followme'        => sanitize_text_field($sfsi_plus_twitter_followme),
        'sfsi_plus_twitter_followUserName'  => sanitize_text_field($sfsi_plus_twitter_followUserName),
        'sfsi_plus_twitter_aboutPage'       => sanitize_text_field($sfsi_plus_twitter_aboutPage),
        'sfsi_plus_twitter_page'            => sanitize_text_field($sfsi_plus_twitter_page),
        'sfsi_plus_twitter_pageURL'         => esc_url($sfsi_plus_twitter_pageURL),
        'sfsi_plus_twitter_aboutPageText'   => sanitize_text_field($sfsi_plus_twitter_aboutPageText),
        'sfsi_plus_twitter_twtAddCard'      => sanitize_text_field($sfsi_plus_twitter_twtAddCard),
        'sfsi_plus_twitter_twtCardType'     => sanitize_text_field($sfsi_plus_twitter_twtCardType),
        'sfsi_plus_twitter_card_twitter_handle'  => sanitize_text_field($sfsi_plus_twitter_card_twitter_handle),      
        
        /* google + options */
        'sfsi_plus_google_page'             => sanitize_text_field($sfsi_plus_google_page),
        'sfsi_plus_google_pageURL'          => esc_url($sfsi_plus_google_pageURL),
        'sfsi_plus_googleLike_option'       => sanitize_text_field($sfsi_plus_googleLike_option),
        'sfsi_plus_googleShare_option'      => sanitize_text_field($sfsi_plus_googleShare_option),
        'sfsi_plus_googleFollow_option'     => sanitize_text_field($sfsi_plus_googleFollow_option),
        
        /* youtube options */
        'sfsi_plus_youtube_pageUrl'         => esc_url($sfsi_plus_youtube_pageUrl),
        'sfsi_plus_youtube_page'            => sanitize_text_field($sfsi_plus_youtube_page),
        'sfsi_plus_youtube_follow'          => sanitize_text_field($sfsi_plus_youtube_follow),
        'sfsi_plus_ytube_user'              => sanitize_text_field($sfsi_plus_ytube_user),
        'sfsi_plus_youtubeusernameorid'     => sanitize_text_field($sfsi_plus_youtubeusernameorid),
        'sfsi_plus_ytube_chnlid'            => sanitize_text_field($sfsi_plus_ytube_chnlid),
        
        /* pinterest options */
        'sfsi_plus_pinterest_page'          => sanitize_text_field($sfsi_plus_pinterest_page),
        'sfsi_plus_pinterest_pageUrl'       => esc_url($sfsi_plus_pinterest_pageUrl),
        'sfsi_plus_pinterest_pingBlog'      => sanitize_text_field($sfsi_plus_pinterest_pingBlog),
        
        /* instagram and houzz options */
        'sfsi_plus_instagram_pageUrl'       => esc_url($sfsi_plus_instagram_pageUrl),
        'sfsi_plus_houzz_pageUrl'           => esc_url($sfsi_plus_houzz_pageUrl),
        
        'sfsi_plus_snapchat_pageUrl'        => esc_url($sfsi_plus_snapchat_pageUrl),
        'sfsi_plus_whatsapp_message'        => sanitize_text_field($sfsi_plus_whatsapp_message),
        'sfsi_plus_my_whatsapp_number'      => $sfsi_plus_my_whatsapp_number,
        'sfsi_plus_whatsapp_number'         => $sfsi_plus_whatsapp_number,
        'sfsi_plus_whatsapp_share_page'     => $sfsi_plus_whatsapp_share_page,
        
        'sfsi_plus_skype_options'           => $sfsi_plus_skype_options,
        'sfsi_plus_skype_pageUrl'           => sanitize_text_field($sfsi_plus_skype_pageUrl),
        'sfsi_plus_vimeo_pageUrl'           => esc_url($sfsi_plus_vimeo_pageUrl),
        'sfsi_plus_soundcloud_pageUrl'      => esc_url($sfsi_plus_soundcloud_pageUrl),
        'sfsi_plus_yummly_pageUrl'          => esc_url($sfsi_plus_yummly_pageUrl),
        'sfsi_plus_flickr_pageUrl'          => esc_url($sfsi_plus_flickr_pageUrl),
        'sfsi_plus_reddit_pageUrl'          => esc_url($sfsi_plus_reddit_pageUrl),
        'sfsi_plus_tumblr_pageUrl'          => esc_url($sfsi_plus_tumblr_pageUrl),
        'sfsi_plus_whatsapp_url_type'       => sanitize_text_field($sfsi_plus_whatsapp_url_type),
        'sfsi_plus_reddit_url_type'         => sanitize_text_field($sfsi_plus_reddit_url_type),
        
        /* linkedIn options */
        'sfsi_plus_linkedin_page'           => sanitize_text_field($sfsi_plus_linkedin_page),
        'sfsi_plus_linkedin_pageURL'        => esc_url($sfsi_plus_linkedin_pageURL),
        'sfsi_plus_linkedin_follow'         => sanitize_text_field($sfsi_plus_linkedin_follow),
        'sfsi_plus_linkedin_followCompany'  => intval($sfsi_plus_linkedin_followCompany),
        'sfsi_plus_linkedin_SharePage'      => sanitize_text_field($sfsi_plus_linkedin_SharePage),
        'sfsi_plus_linkedin_recommendBusines'=> sanitize_text_field($sfsi_plus_linkedin_recommendBusines),
        'sfsi_plus_linkedin_recommendCompany'=> sanitize_text_field($sfsi_plus_linkedin_recommendCompany),
        'sfsi_plus_linkedin_recommendProductId'=> intval($sfsi_plus_linkedin_recommendProductId),
        'sfsi_plus_CustomIcon_links'        => $sfsi_plus_CustomIcon_links
    );
    update_option('sfsi_premium_section2_options',serialize($up_option2));
    $option4    = unserialize(get_option('sfsi_premium_section4_options',false));     
    
    $option4['sfsi_plus_youtubeusernameorid']   = sanitize_text_field($sfsi_plus_youtubeusernameorid);
    $option4['sfsi_plus_ytube_chnlid']          = sfsi_plus_sanitize_field($sfsi_plus_ytube_chnlid);
    update_option('sfsi_premium_section4_options',  serialize($option4));
    
    header('Content-Type: application/json');
    echo  json_encode(array("success")); exit;
}
/* save settings for section 3 */ 
add_action('wp_ajax_plus_updateSrcn3','sfsi_plus_options_updater3');        
function sfsi_plus_options_updater3()
{
    if ( !wp_verify_nonce( $_POST['nonce'], "update_plus_step3")) {
      echo  json_encode(array("wrong_nonce")); exit;
    }
    $sfsi_plus_actvite_theme             = isset($_POST["sfsi_plus_actvite_theme"]) ? $_POST["sfsi_plus_actvite_theme"] : 'no'; 
    $sfsi_plus_mouseOver                 = isset($_POST["sfsi_plus_mouseOver"]) ? $_POST["sfsi_plus_mouseOver"] : 'no'; 
    $sfsi_plus_mouseOver_effect          = isset($_POST["sfsi_plus_mouseOver_effect"]) ? $_POST["sfsi_plus_mouseOver_effect"] : 'fade_in'; 
    $sfsi_plus_shuffle_icons             = isset($_POST["sfsi_plus_shuffle_icons"]) ? $_POST["sfsi_plus_shuffle_icons"] : 'no'; 
    $sfsi_plus_shuffle_Firstload         = isset($_POST["sfsi_plus_shuffle_Firstload"]) ? $_POST["sfsi_plus_shuffle_Firstload"] : 'no'; 
    $sfsi_plus_shuffle_interval          = isset($_POST["sfsi_plus_shuffle_interval"]) ? $_POST["sfsi_plus_shuffle_interval"] : 'no'; 
    $sfsi_plus_shuffle_intervalTime      = isset($_POST["sfsi_plus_shuffle_intervalTime"]) ? $_POST["sfsi_plus_shuffle_intervalTime"] : ''; 
    $sfsi_plus_specialIcon_animation     = isset($_POST["sfsi_plus_specialIcon_animation"]) ? $_POST["sfsi_plus_specialIcon_animation"] : '';
    $sfsi_plus_specialIcon_MouseOver     = isset($_POST["sfsi_plus_specialIcon_MouseOver"]) ? $_POST["sfsi_plus_specialIcon_MouseOver"] : 'no';
    $sfsi_plus_specialIcon_Firstload     = isset($_POST["sfsi_plus_specialIcon_Firstload"]) ? $_POST["sfsi_plus_specialIcon_Firstload"] : 'no';
   
    $sfsi_plus_specialIcon_Firstload_Icons  =   isset($_POST["sfsi_plus_specialIcon_Firstload_Icons"])
                                                    ? $_POST["sfsi_plus_specialIcon_Firstload_Icons"]
                                                    : 'all';
    $sfsi_plus_specialIcon_interval         = isset($_POST["sfsi_plus_specialIcon_interval"])
                                                    ? $_POST["sfsi_plus_specialIcon_interval"]
                                                    : 'no';
    $sfsi_plus_specialIcon_intervalTime     = isset($_POST["sfsi_plus_specialIcon_intervalTime"])
                                                    ? $_POST["sfsi_plus_specialIcon_intervalTime"]
                                                    : '';
    $sfsi_plus_specialIcon_intervalIcons    = isset($_POST["sfsi_plus_specialIcon_intervalIcons"])
                                                    ? $_POST["sfsi_plus_specialIcon_intervalIcons"]
                                                    : 'all';
    
   /* Design and animation option  */
   $up_option3 = array(     
        'sfsi_plus_actvite_theme'               => sanitize_text_field($sfsi_plus_actvite_theme),
        /* animations options */
        'sfsi_plus_mouseOver'                   => sanitize_text_field($sfsi_plus_mouseOver),
        'sfsi_plus_mouseOver_effect'            => sanitize_text_field($sfsi_plus_mouseOver_effect),
        'sfsi_plus_shuffle_icons'               => sanitize_text_field($sfsi_plus_shuffle_icons),
        'sfsi_plus_shuffle_Firstload'           => sanitize_text_field($sfsi_plus_shuffle_Firstload),
        'sfsi_plus_shuffle_interval'            => sanitize_text_field($sfsi_plus_shuffle_interval),
        'sfsi_plus_shuffle_intervalTime'        => intval($sfsi_plus_shuffle_intervalTime),
        'sfsi_plus_specialIcon_animation'       => sanitize_text_field($sfsi_plus_specialIcon_animation),
        'sfsi_plus_specialIcon_MouseOver'       => sanitize_text_field($sfsi_plus_specialIcon_MouseOver),
        'sfsi_plus_specialIcon_Firstload'       => sanitize_text_field($sfsi_plus_specialIcon_Firstload),
        'sfsi_plus_specialIcon_Firstload_Icons' => sanitize_text_field($sfsi_plus_specialIcon_Firstload_Icons),
        'sfsi_plus_specialIcon_interval'        => sanitize_text_field($sfsi_plus_specialIcon_interval),
        'sfsi_plus_specialIcon_intervalTime'    => sanitize_text_field($sfsi_plus_specialIcon_intervalTime),
        'sfsi_plus_specialIcon_intervalIcons'   => sanitize_text_field($sfsi_plus_specialIcon_intervalIcons),
    );
    update_option('sfsi_premium_section3_options',serialize($up_option3));
    header('Content-Type: application/json');
    echo  json_encode(array("success")); exit;
}
/* save settings for section 4 */ 
add_action('wp_ajax_plus_updateSrcn4','sfsi_plus_options_updater4');        
function sfsi_plus_options_updater4()
{
    if ( !wp_verify_nonce( $_POST['nonce'], "update_plus_step4")) {
      echo  json_encode(array("wrong_nonce")); exit;
    }
    $sfsi_plus_display_counts            = isset($_POST["sfsi_plus_display_counts"]) ? $_POST["sfsi_plus_display_counts"] : 'no'; 
   
    $sfsi_plus_email_countsDisplay       = isset($_POST["sfsi_plus_email_countsDisplay"]) ? $_POST["sfsi_plus_email_countsDisplay"] : 'no'; 
    $sfsi_plus_email_countsFrom          = isset($_POST["sfsi_plus_email_countsFrom"]) ? $_POST["sfsi_plus_email_countsFrom"] : 'manual'; 
    $sfsi_plus_email_manualCounts        = isset($_POST["sfsi_plus_email_manualCounts"]) ? trim($_POST["sfsi_plus_email_manualCounts"]) : ''; 
    
    $sfsi_plus_rss_countsDisplay         = isset($_POST["sfsi_plus_rss_countsDisplay"]) ? $_POST["sfsi_plus_rss_countsDisplay"] : 'no'; 
    $sfsi_plus_rss_manualCounts          = isset($_POST["sfsi_plus_rss_manualCounts"]) ? trim($_POST["sfsi_plus_rss_manualCounts"]) : ''; 
    
    $sfsi_plus_facebook_countsDisplay    = isset($_POST["sfsi_plus_facebook_countsDisplay"]) ? $_POST["sfsi_plus_facebook_countsDisplay"] : 'no'; 

    $sfsi_plus_facebook_countsFrom       = isset($_POST["sfsi_plus_facebook_countsFrom"]) ? $_POST["sfsi_plus_facebook_countsFrom"] : 'manual';

    $sfsi_plus_facebook_cachingActive    = isset($_POST["sfsi_plus_fb_count_caching_active"]) ? $_POST["sfsi_plus_fb_count_caching_active"] : 'no';

    $sfsi_plus_facebook_countsFrom_blog     = isset($_POST["sfsi_plus_facebook_countsFrom_blog"]) ? trim($_POST["sfsi_plus_facebook_countsFrom_blog"]) : '';

    $sfsi_plus_facebook_mypageCounts     = isset($_POST["sfsi_plus_facebook_mypageCounts"]) ? trim($_POST["sfsi_plus_facebook_mypageCounts"]) : '';
    $sfsi_plus_facebook_appid            = isset($_POST["sfsi_plus_facebook_appid"]) ? trim($_POST["sfsi_plus_facebook_appid"]) : '';
    $sfsi_plus_facebook_appsecret        = isset($_POST["sfsi_plus_facebook_appsecret"]) ? trim($_POST["sfsi_plus_facebook_appsecret"]) : '';
    $sfsi_plus_facebook_manualCounts     = isset($_POST["sfsi_plus_facebook_manualCounts"]) ? trim($_POST["sfsi_plus_facebook_manualCounts"]) : '';
    $sfsi_plus_facebook_PageLink         = isset($_POST["sfsi_plus_facebook_PageLink"]) ? trim($_POST["sfsi_plus_facebook_PageLink"]) : '';
    
    $sfsi_plus_twitter_countsDisplay     = isset($_POST["sfsi_plus_twitter_countsDisplay"]) ? $_POST["sfsi_plus_twitter_countsDisplay"] : 'no';
    $sfsi_plus_twitter_countsFrom        = isset($_POST["sfsi_plus_twitter_countsFrom"]) ? $_POST["sfsi_plus_twitter_countsFrom"] : 'manual';
    $sfsi_plus_twitter_manualCounts      = isset($_POST["sfsi_plus_twitter_manualCounts"]) ? trim($_POST["sfsi_plus_twitter_manualCounts"]) : '';
    $sfsiplus_tw_consumer_key            = isset($_POST["sfsiplus_tw_consumer_key"]) ? trim($_POST["sfsiplus_tw_consumer_key"]) : '';
    $sfsiplus_tw_consumer_secret         = isset($_POST["sfsiplus_tw_consumer_secret"]) ? trim($_POST["sfsiplus_tw_consumer_secret"]) : '';
    $sfsiplus_tw_oauth_access_token      = isset($_POST["sfsiplus_tw_oauth_access_token"]) ? trim($_POST["sfsiplus_tw_oauth_access_token"]) : '';

    $sfsiplus_tw_oauth_access_token_secret = isset($_POST["sfsiplus_tw_oauth_access_token_secret"])
                                                    ? trim($_POST["sfsiplus_tw_oauth_access_token_secret"])
                                                    : '';

    $sfsi_plus_tw_cachingActive          = isset($_POST["sfsi_plus_tw_count_caching_active"]) ? $_POST["sfsi_plus_tw_count_caching_active"] : 'no';
    
    $sfsi_plus_google_countsDisplay      = isset($_POST["sfsi_plus_google_countsDisplay"]) ? $_POST["sfsi_plus_google_countsDisplay"] : 'no';
    $sfsi_plus_google_countsFrom         = isset($_POST["sfsi_plus_google_countsFrom"]) ? $_POST["sfsi_plus_google_countsFrom"] : 'manual';
    $sfsi_plus_google_manualCounts       = isset($_POST["sfsi_plus_google_manualCounts"]) ? trim($_POST["sfsi_plus_google_manualCounts"]) : '';
    $sfsi_plus_google_api_key            = isset($_POST["sfsi_plus_google_api_key"]) ? trim($_POST["sfsi_plus_google_api_key"]) : '';  
    
    $sfsi_plus_linkedIn_countsDisplay    = isset($_POST["sfsi_plus_linkedIn_countsDisplay"]) ? $_POST["sfsi_plus_linkedIn_countsDisplay"] : 'no';
    $sfsi_plus_linkedIn_countsFrom       = isset($_POST["sfsi_plus_linkedIn_countsFrom"]) ? $_POST["sfsi_plus_linkedIn_countsFrom"] : 'manual';
    $sfsi_plus_linkedIn_manualCounts     = isset($_POST["sfsi_plus_linkedIn_manualCounts"]) ? trim($_POST["sfsi_plus_linkedIn_manualCounts"]) : '';
    $sfsi_plus_ln_company                = isset($_POST["sfsi_plus_ln_company"]) ? trim($_POST["sfsi_plus_ln_company"]) : '';
    $sfsi_plus_ln_api_key                = isset($_POST["sfsi_plus_ln_api_key"]) ? trim($_POST["sfsi_plus_ln_api_key"]) : '';
    $sfsi_plus_ln_secret_key             = isset($_POST["sfsi_plus_ln_secret_key"]) ? trim($_POST["sfsi_plus_ln_secret_key"]) : '';
    $sfsi_plus_ln_oAuth_user_token       = isset($_POST["sfsi_plus_ln_oAuth_user_token"]) ? trim($_POST["sfsi_plus_ln_oAuth_user_token"]) : '';
   
    $sfsi_plus_youtube_countsDisplay     = isset($_POST["sfsi_plus_youtube_countsDisplay"]) ? $_POST["sfsi_plus_youtube_countsDisplay"] : 'no';
    $sfsi_plus_youtube_countsFrom        = isset($_POST["sfsi_plus_youtube_countsFrom"]) ? $_POST["sfsi_plus_youtube_countsFrom"] : 'manual';
    $sfsi_plus_youtube_manualCounts      = isset($_POST["sfsi_plus_youtube_manualCounts"]) ? $_POST["sfsi_plus_youtube_manualCounts"] : '';
    $sfsi_plus_youtube_user              = isset($_POST["sfsi_plus_youtube_user"]) ? trim($_POST["sfsi_plus_youtube_user"]) : '';
    $sfsi_plus_youtube_channelId         = isset($_POST["sfsi_plus_youtube_channelId"]) ? trim($_POST["sfsi_plus_youtube_channelId"]) : '';
    
    $sfsi_plus_pinterest_countsDisplay   = isset($_POST["sfsi_plus_pinterest_countsDisplay"]) ? $_POST["sfsi_plus_pinterest_countsDisplay"] : 'no';
    $sfsi_plus_pinterest_countsFrom      = isset($_POST["sfsi_plus_pinterest_countsFrom"]) ? $_POST["sfsi_plus_pinterest_countsFrom"] : 'manual';
    $sfsi_plus_pinterest_manualCounts    = isset($_POST["sfsi_plus_pinterest_manualCounts"]) ? trim($_POST["sfsi_plus_pinterest_manualCounts"]) : '';

    $sfsi_plus_pinterest_appid           = isset($_POST["sfsi_plus_pinterest_appid"]) ? trim($_POST["sfsi_plus_pinterest_appid"]) : '';
    $sfsi_plus_pinterest_appsecret       = isset($_POST["sfsi_plus_pinterest_appsecret"]) ? trim($_POST["sfsi_plus_pinterest_appsecret"]) : '';
    $sfsi_plus_pinterest_appurl          =  isset($_POST["sfsi_plus_pinterest_appurl"]) ? trim($_POST["sfsi_plus_pinterest_appurl"]) : '';

    $sfsi_plus_pinterest_access_token    = isset($_POST["sfsi_plus_pinterest_access_token"]) ? trim($_POST["sfsi_plus_pinterest_access_token"]) : '';

    $sfsi_plus_pinterest_user            = isset($_POST["sfsi_plus_pinterest_user"]) ? trim($_POST["sfsi_plus_pinterest_user"]) : '';
    $sfsi_plus_pinterest_board           = isset($_POST["sfsi_plus_pinterest_board_name"]) ? trim($_POST["sfsi_plus_pinterest_board_name"]) : '';
    
    $sfsi_plus_instagram_countsDisplay   = isset($_POST["sfsi_plus_instagram_countsDisplay"]) ? $_POST["sfsi_plus_instagram_countsDisplay"] : 'no';
    $sfsi_plus_instagram_countsFrom      = isset($_POST["sfsi_plus_instagram_countsFrom"]) ? $_POST["sfsi_plus_instagram_countsFrom"] : 'manual';
    $sfsi_plus_instagram_manualCounts    = isset($_POST["sfsi_plus_instagram_manualCounts"]) ? trim($_POST["sfsi_plus_instagram_manualCounts"]) : '';
    $sfsi_plus_instagram_User            = isset($_POST["sfsi_plus_instagram_User"]) ? $_POST["sfsi_plus_instagram_User"] : '';
    $sfsi_plus_instagram_clientid        = isset($_POST["sfsi_plus_instagram_clientid"]) ? $_POST["sfsi_plus_instagram_clientid"] : '';
    $sfsi_plus_instagram_appurl          = isset($_POST["sfsi_plus_instagram_appurl"]) ? $_POST["sfsi_plus_instagram_appurl"] : '';
    $sfsi_plus_instagram_token           = isset($_POST["sfsi_plus_instagram_token"]) ? $_POST["sfsi_plus_instagram_token"] : '';
    
    $sfsi_plus_shares_countsDisplay      = isset($_POST["sfsi_plus_shares_countsDisplay"]) ? $_POST["sfsi_plus_shares_countsDisplay"] : 'no';
    $sfsi_plus_shares_countsFrom         = isset($_POST["sfsi_plus_shares_countsFrom"]) ? $_POST["sfsi_plus_shares_countsFrom"] : 'manual';
    $sfsi_plus_shares_manualCounts       = isset($_POST["sfsi_plus_shares_manualCounts"]) ? trim($_POST["sfsi_plus_shares_manualCounts"]) : '';
    
    $sfsi_plus_houzz_countsDisplay       = isset($_POST["sfsi_plus_houzz_countsDisplay"]) ? $_POST["sfsi_plus_houzz_countsDisplay"] : 'no';
    $sfsi_plus_houzz_countsFrom          = isset($_POST["sfsi_plus_houzz_countsFrom"]) ? $_POST["sfsi_plus_houzz_countsFrom"] : 'manual';
    $sfsi_plus_houzz_manualCounts        = isset($_POST["sfsi_plus_houzz_manualCounts"]) ? trim($_POST["sfsi_plus_houzz_manualCounts"]) : '';
    
    $sfsi_plus_snapchat_countsDisplay       = isset($_POST["sfsi_plus_snapchat_countsDisplay"]) ? $_POST["sfsi_plus_snapchat_countsDisplay"] : 'no';
    $sfsi_plus_snapchat_countsFrom          = isset($_POST["sfsi_plus_snapchat_countsFrom"]) ? $_POST["sfsi_plus_snapchat_countsFrom"] : 'manual';
    $sfsi_plus_snapchat_manualCounts        = isset($_POST["sfsi_plus_snapchat_manualCounts"]) ? trim($_POST["sfsi_plus_snapchat_manualCounts"]) : '';
    
    $sfsi_plus_whatsapp_countsDisplay       = isset($_POST["sfsi_plus_whatsapp_countsDisplay"]) ? $_POST["sfsi_plus_whatsapp_countsDisplay"] : 'no';
    $sfsi_plus_whatsapp_countsFrom          = isset($_POST["sfsi_plus_whatsapp_countsFrom"]) ? $_POST["sfsi_plus_whatsapp_countsFrom"] : 'manual';
    $sfsi_plus_whatsapp_manualCounts        = isset($_POST["sfsi_plus_whatsapp_manualCounts"]) ? trim($_POST["sfsi_plus_whatsapp_manualCounts"]) : '';
    
    $sfsi_plus_skype_countsDisplay       = isset($_POST["sfsi_plus_skype_countsDisplay"]) ? $_POST["sfsi_plus_skype_countsDisplay"] : 'no';
    $sfsi_plus_skype_countsFrom          = isset($_POST["sfsi_plus_skype_countsFrom"]) ? $_POST["sfsi_plus_skype_countsFrom"] : 'manual';
    $sfsi_plus_skype_manualCounts        = isset($_POST["sfsi_plus_skype_manualCounts"]) ? trim($_POST["sfsi_plus_skype_manualCounts"]) : '';
    
    $sfsi_plus_vimeo_countsDisplay       = isset($_POST["sfsi_plus_vimeo_countsDisplay"]) ? $_POST["sfsi_plus_vimeo_countsDisplay"] : 'no';
    $sfsi_plus_vimeo_countsFrom          = isset($_POST["sfsi_plus_vimeo_countsFrom"]) ? $_POST["sfsi_plus_vimeo_countsFrom"] : 'manual';
    $sfsi_plus_vimeo_manualCounts        = isset($_POST["sfsi_plus_vimeo_manualCounts"]) ? trim($_POST["sfsi_plus_vimeo_manualCounts"]) : '';
    
    $sfsi_plus_soundcloud_countsDisplay  = isset($_POST["sfsi_plus_soundcloud_countsDisplay"]) ? $_POST["sfsi_plus_soundcloud_countsDisplay"] : 'no';
    $sfsi_plus_soundcloud_countsFrom     = isset($_POST["sfsi_plus_soundcloud_countsFrom"]) ? $_POST["sfsi_plus_soundcloud_countsFrom"] : 'manual';
    $sfsi_plus_soundcloud_manualCounts   = isset($_POST["sfsi_plus_soundcloud_manualCounts"]) ?trim($_POST["sfsi_plus_soundcloud_manualCounts"]) : '';
    
    $sfsi_plus_yummly_countsDisplay       = isset($_POST["sfsi_plus_yummly_countsDisplay"]) ? $_POST["sfsi_plus_yummly_countsDisplay"] : 'no';
    $sfsi_plus_yummly_countsFrom          = isset($_POST["sfsi_plus_yummly_countsFrom"]) ? $_POST["sfsi_plus_yummly_countsFrom"] : 'manual';
    $sfsi_plus_yummly_manualCounts        = isset($_POST["sfsi_plus_yummly_manualCounts"]) ? trim($_POST["sfsi_plus_yummly_manualCounts"]) : '';
    
    $sfsi_plus_flickr_countsDisplay       = isset($_POST["sfsi_plus_flickr_countsDisplay"]) ? $_POST["sfsi_plus_flickr_countsDisplay"] : 'no';
    $sfsi_plus_flickr_countsFrom          = isset($_POST["sfsi_plus_flickr_countsFrom"]) ? $_POST["sfsi_plus_flickr_countsFrom"] : 'manual';
    $sfsi_plus_flickr_manualCounts        = isset($_POST["sfsi_plus_flickr_manualCounts"]) ? trim($_POST["sfsi_plus_flickr_manualCounts"]) : '';
    
    $sfsi_plus_reddit_countsDisplay       = isset($_POST["sfsi_plus_reddit_countsDisplay"]) ? $_POST["sfsi_plus_reddit_countsDisplay"] : 'no';
    $sfsi_plus_reddit_countsFrom          = isset($_POST["sfsi_plus_reddit_countsFrom"]) ? $_POST["sfsi_plus_reddit_countsFrom"] : 'manual';
    $sfsi_plus_reddit_manualCounts        = isset($_POST["sfsi_plus_reddit_manualCounts"]) ? trim($_POST["sfsi_plus_reddit_manualCounts"]) : '';
    
    $sfsi_plus_tumblr_countsDisplay       = isset($_POST["sfsi_plus_tumblr_countsDisplay"]) ? $_POST["sfsi_plus_tumblr_countsDisplay"] : 'no';
    $sfsi_plus_tumblr_countsFrom          = isset($_POST["sfsi_plus_tumblr_countsFrom"]) ? $_POST["sfsi_plus_tumblr_countsFrom"] : 'manual';
    $sfsi_plus_tumblr_manualCounts        = isset($_POST["sfsi_plus_tumblr_manualCounts"]) ? trim($_POST["sfsi_plus_tumblr_manualCounts"]) : '';
    
    $sfsi_plus_facebookPage_url          = isset($_POST["sfsi_plus_facebookPage_url"]) ? trim($_POST["sfsi_plus_facebookPage_url"]) : ''; 
    
    $sfsi_plus_min_display_counts        = isset($_POST["sfsi_plus_min_display_counts"]) ? trim($_POST["sfsi_plus_min_display_counts"]) : 1; 

    $sfsi_plus_fb_caching_interval       = isset($_POST["sfsi_plus_fb_caching_interval"]) ? trim($_POST["sfsi_plus_fb_caching_interval"]) : 1;

    $up_option4 = array(
       
       'sfsi_plus_display_counts'           => sanitize_text_field($sfsi_plus_display_counts),
            
       'sfsi_plus_email_countsDisplay'      => sanitize_text_field($sfsi_plus_email_countsDisplay),
       'sfsi_plus_email_countsFrom'         => sanitize_text_field($sfsi_plus_email_countsFrom),
       'sfsi_plus_email_manualCounts'       => intval($sfsi_plus_email_manualCounts),
       
       'sfsi_plus_rss_countsDisplay'        => sanitize_text_field($sfsi_plus_rss_countsDisplay),
       'sfsi_plus_rss_manualCounts'         => intval($sfsi_plus_rss_manualCounts),
       
       'sfsi_plus_facebook_countsDisplay'   => sanitize_text_field($sfsi_plus_facebook_countsDisplay),
       'sfsi_plus_facebook_countsFrom'      => sanitize_text_field($sfsi_plus_facebook_countsFrom),
       'sfsi_plus_fb_count_caching_active'  => sanitize_text_field($sfsi_plus_facebook_cachingActive),

       'sfsi_plus_facebook_countsFrom_blog' => sfsi_plus_sanitize_field($sfsi_plus_facebook_countsFrom_blog),
       'sfsi_plus_facebook_mypageCounts'    => sfsi_plus_sanitize_field($sfsi_plus_facebook_mypageCounts),
       'sfsi_plus_facebook_appid'           => sfsi_plus_sanitize_field($sfsi_plus_facebook_appid),
       'sfsi_plus_facebook_appsecret'       => sfsi_plus_sanitize_field($sfsi_plus_facebook_appsecret),
       'sfsi_plus_facebook_manualCounts'    => intval($sfsi_plus_facebook_manualCounts),
       //'sfsi_plus_facebook_PageLink'      => $sfsi_plus_facebook_PageLink,
       
       'sfsi_plus_twitter_countsDisplay'    => sanitize_text_field($sfsi_plus_twitter_countsDisplay),
       'sfsi_plus_twitter_countsFrom'       => sanitize_text_field($sfsi_plus_twitter_countsFrom),
       'sfsi_plus_tw_count_caching_active'  => sanitize_text_field($sfsi_plus_tw_cachingActive),

       'sfsi_plus_twitter_manualCounts'     => intval($sfsi_plus_twitter_manualCounts),
       'sfsiplus_tw_consumer_key'           => sfsi_plus_sanitize_field($sfsiplus_tw_consumer_key),     
       'sfsiplus_tw_consumer_secret'        => sfsi_plus_sanitize_field($sfsiplus_tw_consumer_secret),
       'sfsiplus_tw_oauth_access_token'     => sfsi_plus_sanitize_field($sfsiplus_tw_oauth_access_token),
       'sfsiplus_tw_oauth_access_token_secret'=> sfsi_plus_sanitize_field($sfsiplus_tw_oauth_access_token_secret),
            
       'sfsi_plus_google_countsDisplay'     => sanitize_text_field($sfsi_plus_google_countsDisplay),
       'sfsi_plus_google_countsFrom'        => sanitize_text_field($sfsi_plus_google_countsFrom),
       'sfsi_plus_google_manualCounts'      => intval($sfsi_plus_google_manualCounts),  
       'sfsi_plus_google_api_key'           => sfsi_plus_sanitize_field($sfsi_plus_google_api_key),
       
       /*'sfsi_plus_ln_company'             => $sfsi_plus_ln_company,
       'sfsi_plus_ln_api_key'               => $sfsi_plus_ln_api_key,
       'sfsi_plus_ln_secret_key'            => $sfsi_plus_ln_secret_key,
       'sfsi_plus_ln_oAuth_user_token'      => $sfsi_plus_ln_oAuth_user_token,*/     
       'sfsi_plus_linkedIn_countsDisplay'   => sanitize_text_field($sfsi_plus_linkedIn_countsDisplay),
       'sfsi_plus_linkedIn_countsFrom'      => sanitize_text_field($sfsi_plus_linkedIn_countsFrom),
       'sfsi_plus_linkedIn_manualCounts'    => intval($sfsi_plus_linkedIn_manualCounts),
       
       'sfsi_plus_youtube_countsDisplay'    => sanitize_text_field($sfsi_plus_youtube_countsDisplay),
       'sfsi_plus_youtube_countsFrom'       => sanitize_text_field($sfsi_plus_youtube_countsFrom),
       'sfsi_plus_youtube_manualCounts'     => intval($sfsi_plus_youtube_manualCounts),
       'sfsi_plus_youtube_user'             => sfsi_plus_sanitize_field($sfsi_plus_youtube_user),
       'sfsi_plus_youtube_channelId'        => sfsi_plus_sanitize_field($sfsi_plus_youtube_channelId),  
       
       'sfsi_plus_pinterest_countsDisplay'  => sanitize_text_field($sfsi_plus_pinterest_countsDisplay),
       'sfsi_plus_pinterest_countsFrom'     => sanitize_text_field($sfsi_plus_pinterest_countsFrom),
       'sfsi_plus_pinterest_manualCounts'   => intval($sfsi_plus_pinterest_manualCounts),

        'sfsi_plus_pinterest_appid'         => sanitize_text_field($sfsi_plus_pinterest_appid),
        'sfsi_plus_pinterest_appsecret'     => sanitize_text_field($sfsi_plus_pinterest_appsecret),
        'sfsi_plus_pinterest_appurl'        => sanitize_text_field($sfsi_plus_pinterest_appurl),

       'sfsi_plus_pinterest_access_token'   => sanitize_text_field($sfsi_plus_pinterest_access_token),
       'sfsi_plus_pinterest_user'           => sanitize_text_field($sfsi_plus_pinterest_user),     
       'sfsi_plus_pinterest_board_name'     => sanitize_text_field($sfsi_plus_pinterest_board),
       
       'sfsi_plus_instagram_countsFrom'     => sanitize_text_field($sfsi_plus_instagram_countsFrom),
       'sfsi_plus_instagram_countsDisplay'  => sanitize_text_field($sfsi_plus_instagram_countsDisplay),
       'sfsi_plus_instagram_manualCounts'   => intval($sfsi_plus_instagram_manualCounts),
       'sfsi_plus_instagram_User'           => sanitize_text_field($sfsi_plus_instagram_User),
       'sfsi_plus_instagram_clientid'       => sanitize_text_field($sfsi_plus_instagram_clientid),
       'sfsi_plus_instagram_appurl'         => sanitize_text_field($sfsi_plus_instagram_appurl),
       'sfsi_plus_instagram_token'          => sanitize_text_field($sfsi_plus_instagram_token),
       
       'sfsi_plus_shares_countsDisplay'     => sanitize_text_field($sfsi_plus_shares_countsDisplay),
       'sfsi_plus_shares_countsFrom'        => sanitize_text_field($sfsi_plus_shares_countsFrom),
       'sfsi_plus_shares_manualCounts'      => intval($sfsi_plus_shares_manualCounts),
       
       'sfsi_plus_houzz_countsDisplay'      => sanitize_text_field($sfsi_plus_houzz_countsDisplay),
       'sfsi_plus_houzz_countsFrom'         => sanitize_text_field($sfsi_plus_houzz_countsFrom),
       'sfsi_plus_houzz_manualCounts'       => intval($sfsi_plus_houzz_manualCounts),
       
       'sfsi_plus_snapchat_countsDisplay'   => sanitize_text_field($sfsi_plus_snapchat_countsDisplay),
       'sfsi_plus_snapchat_countsFrom'      => sanitize_text_field($sfsi_plus_snapchat_countsFrom),
       'sfsi_plus_snapchat_manualCounts'    => intval($sfsi_plus_snapchat_manualCounts),
       
       'sfsi_plus_whatsapp_countsDisplay'   => sanitize_text_field($sfsi_plus_whatsapp_countsDisplay),
       'sfsi_plus_whatsapp_countsFrom'      => sanitize_text_field($sfsi_plus_whatsapp_countsFrom),
       'sfsi_plus_whatsapp_manualCounts'    => intval($sfsi_plus_whatsapp_manualCounts),
       
       'sfsi_plus_skype_countsDisplay'      => sanitize_text_field($sfsi_plus_skype_countsDisplay),
       'sfsi_plus_skype_countsFrom'         => sanitize_text_field($sfsi_plus_skype_countsFrom),
       'sfsi_plus_skype_manualCounts'       => intval($sfsi_plus_skype_manualCounts),
       
       'sfsi_plus_vimeo_countsDisplay'      => sanitize_text_field($sfsi_plus_vimeo_countsDisplay),
       'sfsi_plus_vimeo_countsFrom'         => sanitize_text_field($sfsi_plus_vimeo_countsFrom),
       'sfsi_plus_vimeo_manualCounts'       => intval($sfsi_plus_vimeo_manualCounts),
       
       'sfsi_plus_soundcloud_countsDisplay' => sanitize_text_field($sfsi_plus_soundcloud_countsDisplay),
       'sfsi_plus_soundcloud_countsFrom'    => sanitize_text_field($sfsi_plus_soundcloud_countsFrom),
       'sfsi_plus_soundcloud_manualCounts'  => intval($sfsi_plus_soundcloud_manualCounts),
       
       'sfsi_plus_yummly_countsDisplay'     => sanitize_text_field($sfsi_plus_yummly_countsDisplay),
       'sfsi_plus_yummly_countsFrom'        => sanitize_text_field($sfsi_plus_yummly_countsFrom),
       'sfsi_plus_yummly_manualCounts'      => intval($sfsi_plus_yummly_manualCounts),
       
       'sfsi_plus_flickr_countsDisplay'     => sanitize_text_field($sfsi_plus_flickr_countsDisplay),
       'sfsi_plus_flickr_countsFrom'        => sanitize_text_field($sfsi_plus_flickr_countsFrom),
       'sfsi_plus_flickr_manualCounts'      => intval($sfsi_plus_flickr_manualCounts),
       
       'sfsi_plus_reddit_countsDisplay'     => sanitize_text_field($sfsi_plus_reddit_countsDisplay),
       'sfsi_plus_reddit_countsFrom'        => sanitize_text_field($sfsi_plus_reddit_countsFrom),
       'sfsi_plus_reddit_manualCounts'      => intval($sfsi_plus_reddit_manualCounts),
       
       'sfsi_plus_tumblr_countsDisplay'     => sanitize_text_field($sfsi_plus_tumblr_countsDisplay),
       'sfsi_plus_tumblr_countsFrom'        => sanitize_text_field($sfsi_plus_tumblr_countsFrom),
       'sfsi_plus_tumblr_manualCounts'      => intval($sfsi_plus_tumblr_manualCounts),
       'sfsi_plus_min_display_counts'       => intval($sfsi_plus_min_display_counts),
       'sfsi_plus_fb_caching_interval'      => intval($sfsi_plus_fb_caching_interval)
   );
   update_option('sfsi_premium_section4_options',serialize($up_option4));
   
   $new_counts = sfsi_plus_getCounts();

   header('Content-Type: application/json');
   echo  json_encode(array("res"=>"success",'counts'=>$new_counts));
   exit;
}

/* save settings for section 5 */ 
add_action('wp_ajax_plus_updateSrcn5','sfsi_plus_options_updater5');        
function sfsi_plus_options_updater5()
{
    if ( !wp_verify_nonce( $_POST['nonce'], "update_plus_step5")) {
      echo  json_encode(array("wrong_nonce")); exit;
    }
    $sfsi_plus_icons_size                = isset($_POST["sfsi_plus_icons_size"]) ? $_POST["sfsi_plus_icons_size"] : '51'; 
    $sfsi_plus_icons_spacing             = isset($_POST["sfsi_plus_icons_spacing"]) ? $_POST["sfsi_plus_icons_spacing"] : '2';
    $sfsi_plus_icons_verical_spacing     = isset($_POST["sfsi_plus_icons_verical_spacing"]) ? $_POST["sfsi_plus_icons_verical_spacing"] : '5';
    
    $sfsi_plus_mobile_icon_setting                      = isset($_POST["sfsi_plus_mobile_icon_setting"]) ? $_POST["sfsi_plus_mobile_icon_setting"] : 'no';
    $sfsi_plus_mobile_horizontal_verical_Alignment      = isset($_POST["sfsi_plus_mobile_horizontal_verical_Alignment"]) 
                                                            ? $_POST["sfsi_plus_mobile_horizontal_verical_Alignment"] 
                                                            : 'Horizontal';
    $sfsi_plus_mobile_icons_Alignment_via_widget        = isset($_POST["sfsi_plus_mobile_icons_Alignment_via_widget"]) 
                                                            ? $_POST["sfsi_plus_mobile_icons_Alignment_via_widget"] 
                                                            : 'left';
    $sfsi_plus_mobile_icons_Alignment_via_shortcode     = isset($_POST["sfsi_plus_mobile_icons_Alignment_via_shortcode"]) 
                                                            ? $_POST["sfsi_plus_mobile_icons_Alignment_via_shortcode"] 
                                                            : 'left';
    $sfsi_plus_mobile_icons_Alignment                   = isset($_POST["sfsi_plus_mobile_icons_Alignment"]) 
                                                            ? $_POST["sfsi_plus_mobile_icons_Alignment"] 
                                                            : 'left';
    $sfsi_plus_mobile_icons_perRow                      = (isset($_POST["sfsi_plus_mobile_icons_perRow"])  && !empty($_POST["sfsi_plus_mobile_icons_perRow"])) 
                                                            ? $_POST["sfsi_plus_mobile_icons_perRow"] 
                                                            : '5';
    $sfsi_plus_mobile_icon_alignment_setting            = isset($_POST["sfsi_plus_mobile_icon_alignment_setting"]) 
                                                            ? $_POST["sfsi_plus_mobile_icon_alignment_setting"] 
                                                            : 'no';
    
    $sfsi_plus_icons_mobilesize             = isset($_POST["sfsi_plus_icons_mobilesize"]) ? $_POST["sfsi_plus_icons_mobilesize"] : '50'; 
    $sfsi_plus_icons_mobilespacing          = isset($_POST["sfsi_plus_icons_mobilespacing"]) ? $_POST["sfsi_plus_icons_mobilespacing"] : '2';
    $sfsi_plus_icons_verical_mobilespacing  = isset($_POST["sfsi_plus_icons_verical_mobilespacing"])
                                                ? $_POST["sfsi_plus_icons_verical_mobilespacing"]
                                                : '5'; 
    $sfsi_plus_horizontal_verical_Alignment = isset($_POST["sfsi_plus_horizontal_verical_Alignment"]) 
                                                ? $_POST["sfsi_plus_horizontal_verical_Alignment"] 
                                                : 'Horizontal'; 
    $sfsi_plus_icons_Alignment_via_shortcode= isset($_POST["sfsi_plus_icons_Alignment_via_shortcode"]) 
                                                ? $_POST["sfsi_plus_icons_Alignment_via_shortcode"] 
                                                : 'left';
    $sfsi_plus_icons_Alignment_via_widget   = isset($_POST["sfsi_plus_icons_Alignment_via_widget"]) 
                                                ? $_POST["sfsi_plus_icons_Alignment_via_widget"] 
                                                : 'left';
    
    $sfsi_plus_icons_Alignment              = isset($_POST["sfsi_plus_icons_Alignment"]) ? $_POST["sfsi_plus_icons_Alignment"] : 'center'; 
    $sfsi_plus_icons_perRow                 = (isset($_POST["sfsi_plus_icons_perRow"]) && !empty($_POST["sfsi_plus_icons_perRow"]))
                                                ? $_POST["sfsi_plus_icons_perRow"] 
                                                : '5'; 
    
    $sfsi_plus_icons_language            = isset($_POST["sfsi_plus_icons_language"]) ? $_POST["sfsi_plus_icons_language"] : 'en_US'; 
    $sfsi_plus_icons_ClickPageOpen       = isset($_POST["sfsi_plus_icons_ClickPageOpen"]) ? $_POST["sfsi_plus_icons_ClickPageOpen"] : 'no'; 
    $sfsi_plus_icons_float               = isset($_POST["sfsi_plus_icons_float"]) ? $_POST["sfsi_plus_icons_float"] : 'no';
    $sfsi_plus_disable_floaticons        = isset($_POST["sfsi_plus_disable_floaticons"]) ? $_POST["sfsi_plus_disable_floaticons"] : 'no';
    $sfsi_plus_disable_viewport          = isset($_POST["sfsi_plus_disable_viewport"]) ? $_POST["sfsi_plus_disable_viewport"] : 'no'; 
    $sfsi_plus_icons_floatPosition       = isset($_POST["sfsi_plus_icons_floatPosition"]) ? $_POST["sfsi_plus_icons_floatPosition"] : 'center-right';
    $sfsi_plus_icons_stick               = isset($_POST["sfsi_plus_icons_stick"]) ? $_POST["sfsi_plus_icons_stick"] : 'no';
    $sfsi_plus_rss_MouseOverText         = isset($_POST["sfsi_plus_rss_MouseOverText"]) ? $_POST["sfsi_plus_rss_MouseOverText"] : '';
    $sfsi_plus_email_MouseOverText       = isset($_POST["sfsi_plus_email_MouseOverText"]) ? $_POST["sfsi_plus_email_MouseOverText"] : '';
    $sfsi_plus_twitter_MouseOverText     = isset($_POST["sfsi_plus_twitter_MouseOverText"]) ? $_POST["sfsi_plus_twitter_MouseOverText"] : '';
    $sfsi_plus_facebook_MouseOverText    = isset($_POST["sfsi_plus_facebook_MouseOverText"]) ? $_POST["sfsi_plus_facebook_MouseOverText"] : '';
    $sfsi_plus_google_MouseOverText      = isset($_POST["sfsi_plus_google_MouseOverText"]) ? $_POST["sfsi_plus_google_MouseOverText"] : '';
    $sfsi_plus_linkedIn_MouseOverText    = isset($_POST["sfsi_plus_linkedIn_MouseOverText"]) ? $_POST["sfsi_plus_linkedIn_MouseOverText"] : '';
    $sfsi_plus_pinterest_MouseOverText   = isset($_POST["sfsi_plus_pinterest_MouseOverText"]) ? $_POST["sfsi_plus_pinterest_MouseOverText"] : '';
    $sfsi_plus_instagram_MouseOverText   = isset($_POST["sfsi_plus_instagram_MouseOverText"]) ? $_POST["sfsi_plus_instagram_MouseOverText"] : '';
    $sfsi_plus_houzz_MouseOverText       = isset($_POST["sfsi_plus_houzz_MouseOverText"]) ? $_POST["sfsi_plus_houzz_MouseOverText"] : '';
    $sfsi_plus_youtube_MouseOverText     = isset($_POST["sfsi_plus_youtube_MouseOverText"]) ? $_POST["sfsi_plus_youtube_MouseOverText"] : '';
    $sfsi_plus_share_MouseOverText       = isset($_POST["sfsi_plus_share_MouseOverText"]) ? $_POST["sfsi_plus_share_MouseOverText"] : '';

    $option1                             =  unserialize(get_option('sfsi_premium_section1_options',false));
    
    ///////////////////////////// save desktop icons order //////////////////////////////

        $sfsi_order_icons_desktop = isset($_POST["sfsi_order_icons_desktop"]["data"]) ? $_POST["sfsi_order_icons_desktop"]["data"]: array();
        $sfsi_order_icons_desktop = serialize($sfsi_order_icons_desktop);
    
    ///////////////////////////// save desktop icons order //////////////////////////////


    ///////////////////////////// save mobile icons order //////////////////////////////

        $sfsi_order_icons_mobile = isset($_POST["sfsi_order_icons_mobile"]["data"]) ? $_POST["sfsi_order_icons_mobile"]["data"]: array();    
        $sfsi_order_icons_mobile = serialize($sfsi_order_icons_mobile);

    
    ///////////////////////////// save mobile icons order //////////////////////////////


    $sfsi_plus_mobile_icons_order_setting  = isset($_POST["sfsi_plus_mobile_icons_order_setting"]) ? sanitize_text_field($_POST["sfsi_plus_mobile_icons_order_setting"]) : 'no';


    $sfsi_plus_custom_MouseOverTexts     = isset($_POST["sfsi_plus_custom_MouseOverTexts"]) ? serialize($_POST["sfsi_plus_custom_MouseOverTexts"]):'';
    
    $sfsi_plus_follow_icons_language     =  isset($_POST["sfsi_plus_follow_icons_language"])
                                                ? $_POST["sfsi_plus_follow_icons_language"]
                                                : 'Follow_en_US';
    $sfsi_plus_facebook_icons_language   =  isset($_POST["sfsi_plus_facebook_icons_language"])
                                                ? $_POST["sfsi_plus_facebook_icons_language"]
                                                : 'Visit_us_en_US';
    $sfsi_plus_twitter_icons_language    =  isset($_POST["sfsi_plus_twitter_icons_language"])
                                                ? $_POST["sfsi_plus_twitter_icons_language"]
                                                : 'Visit_us_en_US';
    $sfsi_plus_google_icons_language     =  isset($_POST["sfsi_plus_google_icons_language"])
                                                ? $_POST["sfsi_plus_google_icons_language"]
                                                : 'Visit_us_en_US';
                                                
    $sfsi_plus_snapchat_MouseOverText   = isset($_POST["sfsi_plus_snapchat_MouseOverText"])? $_POST["sfsi_plus_snapchat_MouseOverText"] :'';
    $sfsi_plus_whatsapp_MouseOverText   = isset($_POST["sfsi_plus_whatsapp_MouseOverText"])? $_POST["sfsi_plus_whatsapp_MouseOverText"] : '';
    $sfsi_plus_skype_MouseOverText      = isset($_POST["sfsi_plus_skype_MouseOverText"]) ? $_POST["sfsi_plus_skype_MouseOverText"] : '';
    $sfsi_plus_vimeo_MouseOverText      = isset($_POST["sfsi_plus_vimeo_MouseOverText"]) ? $_POST["sfsi_plus_vimeo_MouseOverText"] : '';
    $sfsi_plus_soundcloud_MouseOverText = isset($_POST["sfsi_plus_soundcloud_MouseOverText"]) ? $_POST["sfsi_plus_soundcloud_MouseOverText"] : '';
    $sfsi_plus_yummly_MouseOverText     = isset($_POST["sfsi_plus_yummly_MouseOverText"]) ? $_POST["sfsi_plus_yummly_MouseOverText"] : '';
    $sfsi_plus_flickr_MouseOverText     = isset($_POST["sfsi_plus_flickr_MouseOverText"]) ? $_POST["sfsi_plus_flickr_MouseOverText"] : '';
    $sfsi_plus_reddit_MouseOverText     = isset($_POST["sfsi_plus_reddit_MouseOverText"]) ? $_POST["sfsi_plus_reddit_MouseOverText"] : '';
    $sfsi_plus_tumblr_MouseOverText     = isset($_POST["sfsi_plus_tumblr_MouseOverText"]) ? $_POST["sfsi_plus_tumblr_MouseOverText"] : '';

    $sfsi_plus_Facebook_linking           = isset($_POST["sfsi_plus_Facebook_linking"]) ? $_POST["sfsi_plus_Facebook_linking"] : 'facebookurl';
    $sfsi_plus_facebook_linkingcustom_url  = isset($_POST["sfsi_plus_facebook_linkingcustom_url"]) ? $_POST["sfsi_plus_facebook_linkingcustom_url"] : ''; 
    
    $sfsi_plus_tooltip_alighn       = isset($_POST["sfsi_plus_tooltip_alighn"]) ? $_POST["sfsi_plus_tooltip_alighn"] : 'Automatic';  
    $sfsi_plus_tooltip_Color        = isset($_POST["sfsi_plus_tooltip_Color"]) ? $_POST["sfsi_plus_tooltip_Color"]: '#FFF'; 
    $sfsi_plus_tooltip_border_Color = isset($_POST["sfsi_plus_tooltip_border_Color"]) ? $_POST["sfsi_plus_tooltip_border_Color"]: '#e7e7e7';

    $option2                          =  unserialize(get_option('sfsi_premium_section2_options',false));
    $sfsi_plus_twitter_followUserName = (isset($option2['sfsi_plus_twitter_followUserName']) && strlen($option2['sfsi_plus_twitter_followUserName'])) ? $option2['sfsi_plus_twitter_followUserName']:'';
    
    parse_str(urldecode($_POST['sfsi_custom_social_data_post_types_data']), $output);
    $sfsi_custom_social_data_post_types_data = isset($output['sfsi_custom_social_data_post_types']) && is_array($output['sfsi_custom_social_data_post_types']) ? serialize($output['sfsi_custom_social_data_post_types']) : serialize(array());   


    // *************************** Sharing texts & pictures STARTS **********************************//
     
     $sfsi_plus_social_sharing_options = isset($_POST["sfsi_plus_social_sharing_options"]) ? sanitize_text_field($_POST["sfsi_plus_social_sharing_options"]) : 'posttype';

     $sfsiSocialMediaImage          = isset($_POST["sfsiSocialMediaImage"])    ? sanitize_text_field($_POST["sfsiSocialMediaImage"]) : '';
     $sfsiSocialtTitleTxt           = isset($_POST["sfsiSocialtTitleTxt"])     ? sanitize_text_field($_POST["sfsiSocialtTitleTxt"]) : '';
     $sfsiSocialDescription         = isset($_POST["sfsiSocialDescription"])   ? sanitize_text_field($_POST["sfsiSocialDescription"]) : '';
     $sfsiSocialPinterestImage      = isset($_POST["sfsiSocialPinterestImage"])? sanitize_text_field($_POST["sfsiSocialPinterestImage"]) : '';
     $sfsiSocialPinterestDesc       = isset($_POST["sfsiSocialPinterestDesc"]) ? sanitize_text_field($_POST["sfsiSocialPinterestDesc"]) : '';
     $sfsiSocialTwitterDesc         = isset($_POST["sfsiSocialTwitterDesc"])   ? sanitize_text_field($_POST["sfsiSocialTwitterDesc"]) : '';
                    
    // *************************** Sharing texts & pictures CLOSES ************************************//

    $sfsi_plus_twitter_aboutPageText    = isset($_POST["sfsi_plus_twitter_aboutPageText"]) ? $_POST["sfsi_plus_twitter_aboutPageText"]: '${title} ${link}'; 
    $sfsi_plus_twitter_twtAddCard       = isset($_POST["sfsi_plus_twitter_twtAddCard"]) ? $_POST["sfsi_plus_twitter_twtAddCard"] : 'no';
    $sfsi_plus_twitter_twtCardType      = isset($_POST["sfsi_plus_twitter_twtCardType"]) ? $_POST["sfsi_plus_twitter_twtCardType"] : 'summary';

    $sfsi_plus_twitter_card_twitter_handle  = isset($_POST["sfsi_plus_twitter_card_twitter_handle"]) ? $_POST["sfsi_plus_twitter_card_twitter_handle"] : $sfsi_plus_twitter_followUserName; 


    parse_str(urldecode($_POST['sfsi_premium_url_shortner_icons_names_list']), $IconsListurlShortner);
    $sfsi_premium_url_shortner_icons_names_list = serialize($IconsListurlShortner['sfsi_premium_url_shortner_icons_names_list']);

    $sfsi_plus_url_shorting_api_type_setting    = isset($_POST["sfsi_plus_url_shorting_api_type_setting"]) ? $_POST["sfsi_plus_url_shorting_api_type_setting"]: 'no';                                            

    $sfsi_plus_url_shortner_bitly_key = isset($_POST["sfsi_plus_url_shortner_bitly_key"])? $_POST["sfsi_plus_url_shortner_bitly_key"]: '';             
    $sfsi_plus_url_shortner_google_key     = isset($_POST["sfsi_plus_url_shortner_google_key"]) ? $_POST["sfsi_plus_url_shortner_google_key"]: '';

    $sfsi_plus_disable_usm_og_meta_tags = isset($_POST["sfsi_plus_disable_usm_og_meta_tags"]) ? $_POST["sfsi_plus_disable_usm_og_meta_tags"]: "no";   
    
    if($sfsi_plus_horizontal_verical_Alignment == 'Vertical')
    {
        $sfsi_plus_icons_perRow = 1;
    }
    

    if($sfsi_plus_mobile_horizontal_verical_Alignment == 'Vertical')
    {
        $sfsi_plus_mobile_icons_perRow = 1;
    }

    $sfsi_plus_custom_css     = isset($_POST["sfsi_plus_custom_css"]) ? preg_replace('#(<.*?>)(.*?)(</.*?>)#','',$_POST["sfsi_plus_custom_css"]): "";     
    $sfsi_plus_custom_css     = str_replace("\\","", sfsi_sanitize_textarea_field($sfsi_plus_custom_css));
    $sfsi_plus_custom_css     = str_replace("'", "", str_replace('"', '', $sfsi_plus_custom_css));

    $sfsi_plus_custom_admin_css     = isset($_POST["sfsi_plus_custom_admin_css"]) ? preg_replace('#(<.*?>)(.*?)(</.*?>)#','',$_POST["sfsi_plus_custom_admin_css"]): "";     
    $sfsi_plus_custom_admin_css     = str_replace("\\","", sfsi_sanitize_textarea_field($sfsi_plus_custom_admin_css));
    $sfsi_plus_custom_admin_css     = str_replace("'", "", str_replace('"', '', $sfsi_plus_custom_admin_css));

    $sfsi_plus_facebook_cumulative_count_active = isset($_POST["sfsi_plus_facebook_cumulative_count_active"]) ? $_POST["sfsi_plus_facebook_cumulative_count_active"]: "no"; 
    $sfsi_plus_pinterest_cumulative_count_active = isset($_POST["sfsi_plus_pinterest_cumulative_count_active"]) ? $_POST["sfsi_plus_pinterest_cumulative_count_active"]: "no"; 

    $sfsi_plus_loadjquery = isset($_POST["sfsi_plus_loadjquery"]) ? sanitize_text_field($_POST["sfsi_plus_loadjquery"]): "yes";

    $sfsi_plus_icons_suppress_errors     = isset($_POST["sfsi_plus_icons_suppress_errors"]) ? $_POST["sfsi_plus_icons_suppress_errors"] : 'no';

    $sfsi_plus_nofollow_links     = isset($_POST["sfsi_plus_nofollow_links"]) ? $_POST["sfsi_plus_nofollow_links"] : 'no';

    /* size and spacing of icons */
    $up_option5=array(
        'sfsi_plus_icons_size'              => intval($sfsi_plus_icons_size),
        'sfsi_plus_icons_spacing'           => intval($sfsi_plus_icons_spacing),
        'sfsi_plus_icons_verical_spacing'   => intval($sfsi_plus_icons_verical_spacing),
        
        'sfsi_plus_mobile_icon_alignment_setting'           => sanitize_text_field($sfsi_plus_mobile_icon_alignment_setting),
        'sfsi_plus_mobile_horizontal_verical_Alignment'     => sanitize_text_field($sfsi_plus_mobile_horizontal_verical_Alignment),
        'sfsi_plus_mobile_icons_Alignment_via_widget'       => sanitize_text_field($sfsi_plus_mobile_icons_Alignment_via_widget),
        'sfsi_plus_mobile_icons_Alignment_via_shortcode'    => sanitize_text_field($sfsi_plus_mobile_icons_Alignment_via_shortcode),
        'sfsi_plus_mobile_icons_Alignment'                  => sanitize_text_field($sfsi_plus_mobile_icons_Alignment),
        'sfsi_plus_mobile_icons_perRow'                     => intval($sfsi_plus_mobile_icons_perRow),
        'sfsi_plus_mobile_icon_setting'                     => sanitize_text_field($sfsi_plus_mobile_icon_setting),
        'sfsi_plus_icons_mobilesize'                        => intval($sfsi_plus_icons_mobilesize),
        'sfsi_plus_icons_mobilespacing'                     => intval($sfsi_plus_icons_mobilespacing),
        'sfsi_plus_icons_verical_mobilespacing'             => intval($sfsi_plus_icons_verical_mobilespacing),
        
        'sfsi_plus_horizontal_verical_Alignment'    => sanitize_text_field($sfsi_plus_horizontal_verical_Alignment),
        'sfsi_plus_icons_Alignment_via_shortcode'   => sanitize_text_field($sfsi_plus_icons_Alignment_via_shortcode),
        'sfsi_plus_icons_Alignment_via_widget'      => sanitize_text_field($sfsi_plus_icons_Alignment_via_widget),
        
        'sfsi_plus_icons_Alignment'         => sanitize_text_field($sfsi_plus_icons_Alignment),
        'sfsi_plus_icons_perRow'            => intval($sfsi_plus_icons_perRow),
        'sfsi_plus_follow_icons_language'   => sanitize_text_field($sfsi_plus_follow_icons_language),
        'sfsi_plus_facebook_icons_language' => sanitize_text_field($sfsi_plus_facebook_icons_language),
        'sfsi_plus_twitter_icons_language'  => sanitize_text_field($sfsi_plus_twitter_icons_language),
        'sfsi_plus_google_icons_language'   => sanitize_text_field($sfsi_plus_google_icons_language),
        'sfsi_plus_icons_language'          => sanitize_text_field($sfsi_plus_icons_language),
        'sfsi_plus_icons_ClickPageOpen'     => sanitize_text_field($sfsi_plus_icons_ClickPageOpen),
        'sfsi_plus_icons_float'             => sanitize_text_field($sfsi_plus_icons_float),
        'sfsi_plus_disable_floaticons'      => sanitize_text_field($sfsi_plus_disable_floaticons),
        'sfsi_plus_disable_viewport'        => sanitize_text_field($sfsi_plus_disable_viewport),
        'sfsi_plus_icons_floatPosition'     => sanitize_text_field($sfsi_plus_icons_floatPosition),
        'sfsi_plus_icons_stick'             => sanitize_text_field($sfsi_plus_icons_stick),
        /* mouse over texts */
        'sfsi_plus_rss_MouseOverText'       => sanitize_text_field($sfsi_plus_rss_MouseOverText),
        'sfsi_plus_email_MouseOverText'     => sanitize_text_field($sfsi_plus_email_MouseOverText),
        'sfsi_plus_twitter_MouseOverText'   => sanitize_text_field($sfsi_plus_twitter_MouseOverText),
        'sfsi_plus_facebook_MouseOverText'  => sanitize_text_field($sfsi_plus_facebook_MouseOverText),
        'sfsi_plus_google_MouseOverText'    => sanitize_text_field($sfsi_plus_google_MouseOverText),
        'sfsi_plus_linkedIn_MouseOverText'  => sanitize_text_field($sfsi_plus_linkedIn_MouseOverText),
        'sfsi_plus_pinterest_MouseOverText' => sanitize_text_field($sfsi_plus_pinterest_MouseOverText),
        'sfsi_plus_youtube_MouseOverText'   => sanitize_text_field($sfsi_plus_youtube_MouseOverText),
        'sfsi_plus_share_MouseOverText'     => sanitize_text_field($sfsi_plus_share_MouseOverText),
        'sfsi_plus_instagram_MouseOverText' => sanitize_text_field($sfsi_plus_instagram_MouseOverText),
        'sfsi_plus_houzz_MouseOverText'     => sanitize_text_field($sfsi_plus_houzz_MouseOverText),
        'sfsi_plus_snapchat_MouseOverText'  => sanitize_text_field($sfsi_plus_snapchat_MouseOverText),        
        'sfsi_plus_whatsapp_MouseOverText'  => sanitize_text_field($sfsi_plus_whatsapp_MouseOverText),        
        'sfsi_plus_skype_MouseOverText'     => sanitize_text_field($sfsi_plus_skype_MouseOverText),        
        'sfsi_plus_vimeo_MouseOverText'     => sanitize_text_field($sfsi_plus_vimeo_MouseOverText),        
        'sfsi_plus_soundcloud_MouseOverText'=> sanitize_text_field($sfsi_plus_soundcloud_MouseOverText),        
        'sfsi_plus_yummly_MouseOverText'    => sanitize_text_field($sfsi_plus_yummly_MouseOverText),        
        'sfsi_plus_flickr_MouseOverText'    => sanitize_text_field($sfsi_plus_flickr_MouseOverText),        
        'sfsi_plus_reddit_MouseOverText'    => sanitize_text_field($sfsi_plus_reddit_MouseOverText),        
        'sfsi_plus_tumblr_MouseOverText'    => sanitize_text_field($sfsi_plus_tumblr_MouseOverText),        
        'sfsi_plus_custom_MouseOverTexts'   => $sfsi_plus_custom_MouseOverTexts,

        'sfsi_order_icons_desktop'                 => $sfsi_order_icons_desktop,
        'sfsi_order_icons_mobile'                  => $sfsi_order_icons_mobile,

        'sfsi_plus_mobile_icons_order_setting'     => $sfsi_plus_mobile_icons_order_setting,

        'sfsi_plus_Facebook_linking'             => sanitize_text_field($sfsi_plus_Facebook_linking),
        'sfsi_plus_facebook_linkingcustom_url'   => esc_url($sfsi_plus_facebook_linkingcustom_url),
        'sfsi_plus_tooltip_alighn'               => $sfsi_plus_tooltip_alighn,
        'sfsi_plus_tooltip_border_Color'         => sfsi_plus_sanitize_hex_color($sfsi_plus_tooltip_border_Color),
        'sfsi_plus_tooltip_Color'                => sfsi_plus_sanitize_hex_color($sfsi_plus_tooltip_Color),
        
        'sfsi_custom_social_data_post_types_data'=>$sfsi_custom_social_data_post_types_data,

        'sfsi_plus_social_sharing_options'  => $sfsi_plus_social_sharing_options,
        'sfsiSocialMediaImage'               => $sfsiSocialMediaImage,        
        'sfsiSocialtTitleTxt'                => $sfsiSocialtTitleTxt,       
        'sfsiSocialDescription'              => $sfsiSocialDescription,
        'sfsiSocialPinterestImage'           => $sfsiSocialPinterestImage,
        'sfsiSocialPinterestDesc'            => $sfsiSocialPinterestDesc,
        'sfsiSocialTwitterDesc'              => $sfsiSocialTwitterDesc,

        'sfsi_plus_twitter_aboutPageText'   => sanitize_text_field($sfsi_plus_twitter_aboutPageText),                
        'sfsi_plus_twitter_twtAddCard'      => sanitize_text_field($sfsi_plus_twitter_twtAddCard),
        'sfsi_plus_twitter_twtCardType'     => sanitize_text_field($sfsi_plus_twitter_twtCardType),
        'sfsi_plus_twitter_card_twitter_handle'  => sanitize_text_field($sfsi_plus_twitter_card_twitter_handle),

        'sfsi_premium_url_shortner_icons_names_list'=> $sfsi_premium_url_shortner_icons_names_list,                
        'sfsi_plus_url_shorting_api_type_setting'   => sanitize_text_field($sfsi_plus_url_shorting_api_type_setting),
        'sfsi_plus_url_shortner_bitly_key'  => sanitize_text_field($sfsi_plus_url_shortner_bitly_key),
        'sfsi_plus_url_shortner_google_key' => sanitize_text_field($sfsi_plus_url_shortner_google_key),
        'sfsi_plus_disable_usm_og_meta_tags'=> $sfsi_plus_disable_usm_og_meta_tags,
        'sfsi_plus_custom_css'              => serialize($sfsi_plus_custom_css),
        'sfsi_plus_custom_admin_css'        => serialize($sfsi_plus_custom_admin_css),
        'sfsi_plus_facebook_cumulative_count_active'=> $sfsi_plus_facebook_cumulative_count_active,
        'sfsi_plus_pinterest_cumulative_count_active'=> $sfsi_plus_pinterest_cumulative_count_active,
        'sfsi_plus_loadjquery'              => $sfsi_plus_loadjquery,
        'sfsi_plus_icons_suppress_errors'   => sanitize_text_field($sfsi_plus_icons_suppress_errors),
        'sfsi_plus_nofollow_links'          => sanitize_text_field($sfsi_plus_nofollow_links)
    );
    
    update_option('sfsi_premium_section5_options',serialize($up_option5));
    header('Content-Type: application/json');
    echo  json_encode(array("success")); exit;
}
/* save settings for section 6 */ 
add_action('wp_ajax_plus_updateSrcn6','sfsi_plus_options_updater6');        
function sfsi_plus_options_updater6()
{
    if ( !wp_verify_nonce( $_POST['nonce'], "update_plus_step6")) {
      echo  json_encode(array("wrong_nonce")); exit;
    }
    $sfsi_plus_show_Onposts                = isset($_POST["sfsi_plus_show_Onposts"]) ? $_POST["sfsi_plus_show_Onposts"] : 'no'; 
    $sfsi_plus_icons_postPositon           = isset($_POST["sfsi_plus_icons_postPositon"]) ? $_POST["sfsi_plus_icons_postPositon"] : ''; 
    $sfsi_plus_icons_alignment             = isset($_POST["sfsi_plus_icons_alignment"]) ? $_POST["sfsi_plus_icons_alignment"] : 'center-right'; 
    $sfsi_plus_textBefor_icons             = isset($_POST["sfsi_plus_textBefor_icons"]) ? $_POST["sfsi_plus_textBefor_icons"] : ''; 
    $sfsi_plus_icons_DisplayCounts         = isset($_POST["sfsi_plus_icons_DisplayCounts"]) ? $_POST["sfsi_plus_icons_DisplayCounts"] : 'no'; 
    /* post options */
    $up_option6=array(
        'sfsi_plus_show_Onposts'        => sanitize_text_field($sfsi_plus_show_Onposts),
        'sfsi_plus_icons_postPositon'   => sanitize_text_field($sfsi_plus_icons_postPositon),
        'sfsi_plus_icons_alignment'     => sanitize_text_field($sfsi_plus_icons_alignment),
        'sfsi_plus_textBefor_icons'     => sanitize_text_field(stripslashes($sfsi_plus_textBefor_icons)),
        'sfsi_plus_icons_DisplayCounts' => sanitize_text_field($sfsi_plus_icons_DisplayCounts),
    );
    update_option('sfsi_premium_section6_options',serialize($up_option6));
    header('Content-Type: application/json');
    echo  json_encode(array("success")); exit;
}
/* save settings for section 7 */ 
add_action('wp_ajax_plus_updateSrcn7','sfsi_plus_options_updater7');        
function sfsi_plus_options_updater7()
{   
    if ( !wp_verify_nonce( $_POST['nonce'], "update_plus_step7")) {
      echo  json_encode(array("wrong_nonce")); exit;
    }

    $sfsi_plus_popup_text     = isset($_POST["sfsi_plus_popup_text"]) ? stripslashes(sfsi_sanitize_textarea_field($_POST["sfsi_plus_popup_text"],true)) : "";     

    $sfsi_plus_popup_background_color        =  isset($_POST["sfsi_plus_popup_background_color"])
                                                    ? $_POST["sfsi_plus_popup_background_color"]
                                                    : '#fffff'; 
    $sfsi_plus_popup_border_color            =  isset($_POST["sfsi_plus_popup_border_color"])
                                                    ? $_POST["sfsi_plus_popup_border_color"]
                                                    : 'center-right'; 
    $sfsi_plus_popup_border_thickness        =  isset($_POST["sfsi_plus_popup_border_thickness"]) ? $_POST["sfsi_plus_popup_border_thickness"] : ''; 
    $sfsi_plus_popup_border_shadow           =  isset($_POST["sfsi_plus_popup_border_shadow"]) ? $_POST["sfsi_plus_popup_border_shadow"] : 'no'; 
    $sfsi_plus_popup_font                    =  isset($_POST["sfsi_plus_popup_font"]) ? $_POST["sfsi_plus_popup_font"] : ''; 
    $sfsi_plus_popup_fontSize                =  isset($_POST["sfsi_plus_popup_fontSize"]) ? $_POST["sfsi_plus_popup_fontSize"] : 'no'; 
    $sfsi_plus_popup_fontStyle               =  isset($_POST["sfsi_plus_popup_fontStyle"]) ? $_POST["sfsi_plus_popup_fontStyle"] : ''; 
    $sfsi_plus_popup_fontColor               =  isset($_POST["sfsi_plus_popup_fontColor"]) ? $_POST["sfsi_plus_popup_fontColor"] : 'no'; 
    $sfsi_plus_Show_popupOn                  =  isset($_POST["sfsi_plus_Show_popupOn"]) ? $_POST["sfsi_plus_Show_popupOn"] : '';

    $sfsi_plus_Show_popupOn_PageIDs          =  isset($_POST["sfsi_plus_Show_popupOn_PageIDs"])? serialize($_POST["sfsi_plus_Show_popupOn_PageIDs"]): '';
    $sfsi_plus_Show_popupOn_somepages_blogpage =  isset($_POST["sfsi_plus_Show_popupOn_somepages_blogpage"]) ? $_POST["sfsi_plus_Show_popupOn_somepages_blogpage"] : ''; 
    $sfsi_plus_Show_popupOn_somepages_selectedpage = isset($_POST["sfsi_plus_Show_popupOn_somepages_selectedpage"]) ? $_POST["sfsi_plus_Show_popupOn_somepages_selectedpage"] : ''; 

    $sfsi_plus_Shown_pop                     =  isset($_POST["sfsi_plus_Shown_pop"]) ? $_POST["sfsi_plus_Shown_pop"] : array(''); 
    $sfsi_plus_Shown_popupOnceTime           =  isset($_POST["sfsi_plus_Shown_popupOnceTime"]) ? $_POST["sfsi_plus_Shown_popupOnceTime"] : 'no'; 
    $sfsi_plus_Shown_popuplimitPerUserTime   =  isset($_POST["sfsi_plus_Shown_popuplimitPerUserTime"])
                                                    ? $_POST["sfsi_plus_Shown_popuplimitPerUserTime"]
                                                    : '';
    
    $sfsi_plus_popup_limit                   =  isset($_POST["sfsi_plus_popup_limit"]) ? $_POST["sfsi_plus_popup_limit"] : 'no';
    $sfsi_plus_popup_limit_count             =  isset($_POST["sfsi_plus_popup_limit_count"]) ? $_POST["sfsi_plus_popup_limit_count"] : '';
    $sfsi_plus_popup_limit_type              =  isset($_POST["sfsi_plus_popup_limit_type"]) ? $_POST["sfsi_plus_popup_limit_type"] : '';
    
    $sfsi_plus_popup_type_iconsOrForm        =  isset($_POST["sfsi_plus_popup_type_iconsOrForm"]) ? $_POST["sfsi_plus_popup_type_iconsOrForm"] : 'icons';

    $sfsi_plus_popup_show_on_desktop         = isset($_POST["sfsi_plus_popup_show_on_desktop"]) ? $_POST["sfsi_plus_popup_show_on_desktop"] : 'no';
    $sfsi_plus_popup_show_on_mobile          = isset($_POST["sfsi_plus_popup_show_on_mobile"]) ? $_POST["sfsi_plus_popup_show_on_mobile"] : 'no';

    $sfsi_plus_Hide_popupOnScroll            =  isset($_POST["sfsi_plus_Hide_popupOnScroll"]) ? $_POST["sfsi_plus_Hide_popupOnScroll"] : 'no'; 
    $sfsi_plus_Hide_popupOn_OutsideClick     =  isset($_POST["sfsi_plus_Hide_popupOn_OutsideClick"]) ? $_POST["sfsi_plus_Hide_popupOn_OutsideClick"] : 'no'; 

    
    /* icons pop options */
    $up_option7=array(  
        'sfsi_plus_popup_text'              => $sfsi_plus_popup_text,
        'sfsi_plus_popup_font'              => sanitize_text_field($sfsi_plus_popup_font),
        'sfsi_plus_popup_fontColor'         => sfsi_plus_sanitize_hex_color($sfsi_plus_popup_fontColor),
        'sfsi_plus_popup_fontSize'          => intval($sfsi_plus_popup_fontSize),
        'sfsi_plus_popup_fontStyle'         => sanitize_text_field($sfsi_plus_popup_fontStyle),
        'sfsi_plus_popup_background_color'  => sfsi_plus_sanitize_hex_color($sfsi_plus_popup_background_color),
        'sfsi_plus_popup_border_color'      => sfsi_plus_sanitize_hex_color($sfsi_plus_popup_border_color),
        'sfsi_plus_popup_border_thickness'  => intval($sfsi_plus_popup_border_thickness),
        'sfsi_plus_popup_border_shadow'     => sanitize_text_field($sfsi_plus_popup_border_shadow),
        'sfsi_plus_Show_popupOn'            => sanitize_text_field($sfsi_plus_Show_popupOn),
        'sfsi_plus_Show_popupOn_PageIDs'    => $sfsi_plus_Show_popupOn_PageIDs,

        'sfsi_plus_Show_popupOn_somepages_blogpage'    => $sfsi_plus_Show_popupOn_somepages_blogpage,
        'sfsi_plus_Show_popupOn_somepages_selectedpage'=> $sfsi_plus_Show_popupOn_somepages_selectedpage,

        'sfsi_plus_Shown_pop'               => $sfsi_plus_Shown_pop,
        'sfsi_plus_Shown_popupOnceTime'     => intval($sfsi_plus_Shown_popupOnceTime),

        'sfsi_plus_Hide_popupOnScroll'        => sanitize_text_field($sfsi_plus_Hide_popupOnScroll),
        'sfsi_plus_Hide_popupOn_OutsideClick' => sanitize_text_field($sfsi_plus_Hide_popupOn_OutsideClick),

        "sfsi_plus_popup_limit"             => sanitize_text_field($sfsi_plus_popup_limit),
        "sfsi_plus_popup_limit_count"       => intval($sfsi_plus_popup_limit_count),
        "sfsi_plus_popup_limit_type"        => sanitize_text_field($sfsi_plus_popup_limit_type),
        'sfsi_plus_popup_type_iconsOrForm'  => sanitize_text_field($sfsi_plus_popup_type_iconsOrForm),

        'sfsi_plus_popup_show_on_desktop'   => $sfsi_plus_popup_show_on_desktop,
        'sfsi_plus_popup_show_on_mobile'    => $sfsi_plus_popup_show_on_mobile        
        //'sfsi_plus_Shown_popuplimitPerUserTime'   => $sfsi_plus_Shown_popuplimitPerUserTime,
    );
    update_option('sfsi_premium_section7_options',serialize($up_option7)); 
    header('Content-Type: application/json');
    echo  json_encode(array('success')); exit;
}
/* save settings for section 3 */
add_action('wp_ajax_plus_updateSrcn8','sfsi_plus_options_updater8');        
function sfsi_plus_options_updater8()
{
    if ( !wp_verify_nonce( $_POST['nonce'], "update_plus_step8")) {
      echo  json_encode(array("wrong_nonce")); exit;
    }
    $sfsi_plus_show_via_widget      = isset($_POST["sfsi_plus_show_via_widget"]) ? $_POST["sfsi_plus_show_via_widget"] : 'no'; 
    $sfsi_plus_float_on_page        = isset($_POST["sfsi_plus_float_on_page"]) ? $_POST["sfsi_plus_float_on_page"] : 'no'; 
    $sfsi_plus_float_page_position  = isset($_POST["sfsi_plus_float_page_position"]) ? $_POST["sfsi_plus_float_page_position"] : 'no';
    $sfsi_plus_make_icon            = isset($_POST["sfsi_plus_make_icon"]) ? $_POST["sfsi_plus_make_icon"] : 'float';
    
    $sfsi_plus_icons_floatMargin_top     = isset($_POST["sfsi_plus_icons_floatMargin_top"]) ? $_POST["sfsi_plus_icons_floatMargin_top"] : '';
    $sfsi_plus_icons_floatMargin_bottom  = isset($_POST["sfsi_plus_icons_floatMargin_bottom"])? $_POST["sfsi_plus_icons_floatMargin_bottom"]:'';
    $sfsi_plus_icons_floatMargin_left    = isset($_POST["sfsi_plus_icons_floatMargin_left"]) ? $_POST["sfsi_plus_icons_floatMargin_left"] : '';
    $sfsi_plus_icons_floatMargin_right   = isset($_POST["sfsi_plus_icons_floatMargin_right"]) ? $_POST["sfsi_plus_icons_floatMargin_right"]:''; 
    
    $sfsi_plus_place_item_manually       = isset($_POST["sfsi_plus_place_item_manually"]) ? $_POST["sfsi_plus_place_item_manually"] : 'no';
    
    $sfsi_plus_shortcode_horizontal_verical_Alignment = isset($_POST['sfsi_plus_shortcode_horizontal_verical_Alignment']) ? $_POST['sfsi_plus_shortcode_horizontal_verical_Alignment'] : "Horizontal";
    $sfsi_plus_shortcode_mobile_horizontal_verical_Alignment = isset($_POST['sfsi_plus_shortcode_mobile_horizontal_verical_Alignment']) ? $_POST['sfsi_plus_shortcode_mobile_horizontal_verical_Alignment'] : "Horizontal";

    $sfsi_plus_widget_horizontal_verical_Alignment = isset($_POST['sfsi_plus_widget_horizontal_verical_Alignment']) ? $_POST['sfsi_plus_widget_horizontal_verical_Alignment'] : "Horizontal";
    $sfsi_plus_widget_mobile_horizontal_verical_Alignment = isset($_POST['sfsi_plus_widget_mobile_horizontal_verical_Alignment']) ? $_POST['sfsi_plus_widget_mobile_horizontal_verical_Alignment'] : "Horizontal";

    $sfsi_plus_float_horizontal_verical_Alignment = isset($_POST['sfsi_plus_float_horizontal_verical_Alignment']) ? $_POST['sfsi_plus_float_horizontal_verical_Alignment'] : "Horizontal";
    $sfsi_plus_float_mobile_horizontal_verical_Alignment = isset($_POST['sfsi_plus_float_mobile_horizontal_verical_Alignment']) ? $_POST['sfsi_plus_float_mobile_horizontal_verical_Alignment'] : "Horizontal";

    $sfsi_plus_beforeafterposts_horizontal_verical_Alignment = isset($_POST['sfsi_plus_beforeafterposts_horizontal_verical_Alignment']) ? $_POST['sfsi_plus_beforeafterposts_horizontal_verical_Alignment'] : "Horizontal";
    $sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment = isset($_POST['sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment']) ? $_POST['sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment'] : "Horizontal";

    //$sfsi_plus_place_rectangle_icons_item_manually  = isset($_POST["sfsi_plus_place_rectangle_icons_item_manually"]) ? $_POST["sfsi_plus_place_rectangle_icons_item_manually"] : 'no';

    $sfsi_plus_show_item_onposts    = isset($_POST["sfsi_plus_show_item_onposts"]) ? $_POST["sfsi_plus_show_item_onposts"] : 'no';
    $sfsi_plus_display_button_type  = isset($_POST["sfsi_plus_display_button_type"]) ? $_POST["sfsi_plus_display_button_type"] : 'no';
    
    $sfsi_plus_post_icons_size      = isset($_POST["sfsi_plus_post_icons_size"]) ? $_POST["sfsi_plus_post_icons_size"] : 40;
    $sfsi_plus_post_icons_spacing   = isset($_POST["sfsi_plus_post_icons_spacing"]) ? $_POST["sfsi_plus_post_icons_spacing"] : 5;
    $sfsi_plus_post_icons_vertical_spacing = isset($_POST["sfsi_plus_post_icons_vertical_spacing"]) ? $_POST["sfsi_plus_post_icons_vertical_spacing"] : 5;
    $sfsi_plus_show_Onposts         = isset($_POST["sfsi_plus_show_Onposts"]) ? $_POST["sfsi_plus_show_Onposts"] : 'no';
    $sfsi_plus_textBefor_icons      = isset($_POST["sfsi_plus_textBefor_icons"]) ? $_POST["sfsi_plus_textBefor_icons"] : 'Please follow and like us:';
    
    $sfsi_plus_icons_alignment      = isset($_POST["sfsi_plus_icons_alignment"]) ? $_POST["sfsi_plus_icons_alignment"] : 'center-right';
    $sfsi_plus_icons_DisplayCounts  = isset($_POST["sfsi_plus_icons_DisplayCounts"]) ? $_POST["sfsi_plus_icons_DisplayCounts"] : 'no'; 
    $sfsi_plus_display_before_posts = isset($_POST["sfsi_plus_display_before_posts"]) ? $_POST["sfsi_plus_display_before_posts"] : 'no'; 
    $sfsi_plus_display_after_posts  = isset($_POST["sfsi_plus_display_after_posts"]) ? $_POST["sfsi_plus_display_after_posts"] : 'no'; 
    
    $sfsi_plus_display_before_blogposts = isset($_POST["sfsi_plus_display_before_blogposts"]) ? $_POST["sfsi_plus_display_before_blogposts"] : 'no'; 
    $sfsi_plus_display_after_blogposts  = isset($_POST["sfsi_plus_display_after_blogposts"]) ? $_POST["sfsi_plus_display_after_blogposts"] : 'no';
    $sfsi_plus_rectsub                  = isset($_POST["sfsi_plus_rectsub"]) ? $_POST["sfsi_plus_rectsub"] : 'no';
    $sfsi_plus_rectfb                   = isset($_POST["sfsi_plus_rectfb"]) ? $_POST["sfsi_plus_rectfb"] : 'no';
    $sfsi_plus_rectgp                   = isset($_POST["sfsi_plus_rectgp"]) ? $_POST["sfsi_plus_rectgp"] : 'no';
    $sfsi_plus_rectshr                  = isset($_POST["sfsi_plus_rectshr"]) ? $_POST["sfsi_plus_rectshr"] : 'no';
    $sfsi_plus_recttwtr                 = isset($_POST["sfsi_plus_recttwtr"]) ? $_POST["sfsi_plus_recttwtr"] : 'no';
    $sfsi_plus_rectpinit                = isset($_POST["sfsi_plus_rectpinit"]) ? $_POST["sfsi_plus_rectpinit"] : 'no';
    $sfsi_plus_rectlinkedin             = isset($_POST["sfsi_plus_rectlinkedin"]) ? $_POST["sfsi_plus_rectlinkedin"] : 'no';
    $sfsi_plus_rectreddit               = isset($_POST["sfsi_plus_rectreddit"]) ? $_POST["sfsi_plus_rectreddit"] : 'no';
    $sfsi_plus_rectfbshare              = isset($_POST["sfsi_plus_rectfbshare"]) ? $_POST["sfsi_plus_rectfbshare"] : 'no';
    
    $sfsi_plus_marginAbove_postIcon     = isset($_POST["sfsi_plus_marginAbove_postIcon"]) ? $_POST["sfsi_plus_marginAbove_postIcon"] : '';
    $sfsi_plus_marginBelow_postIcon     = isset($_POST["sfsi_plus_marginBelow_postIcon"]) ? $_POST["sfsi_plus_marginBelow_postIcon"] : '';
    $sfsi_plus_display_after_pageposts  = isset($_POST["sfsi_plus_display_after_pageposts"]) ? $_POST["sfsi_plus_display_after_pageposts"] : 'no';
    $sfsi_plus_display_before_pageposts  = isset($_POST["sfsi_plus_display_before_pageposts"]) ? $_POST["sfsi_plus_display_before_pageposts"] : 'no';

    $sfsi_plus_choose_post_types        =  isset($_POST["sfsi_plus_choose_post_types"]) ? $_POST["sfsi_plus_choose_post_types"] : array();
    $sfsi_plus_choose_post_types        = is_string($sfsi_plus_choose_post_types) ? (array) $sfsi_plus_choose_post_types : $sfsi_plus_choose_post_types;
    $sfsi_plus_choose_post_types        = serialize($sfsi_plus_choose_post_types);

    $sfsi_plus_taxonomies_for_icons     =  isset($_POST["sfsi_plus_taxonomies_for_icons"]) ? $_POST["sfsi_plus_taxonomies_for_icons"] : array();
    $sfsi_plus_taxonomies_for_icons     = is_string($sfsi_plus_taxonomies_for_icons) ? (array) $sfsi_plus_taxonomies_for_icons : $sfsi_plus_taxonomies_for_icons;
    $sfsi_plus_taxonomies_for_icons     = serialize($sfsi_plus_taxonomies_for_icons);

    $sfsi_plus_widget_show_on_desktop   = isset($_POST["sfsi_plus_widget_show_on_desktop"]) ? $_POST["sfsi_plus_widget_show_on_desktop"] : 'no';
    $sfsi_plus_widget_show_on_mobile    = isset($_POST["sfsi_plus_widget_show_on_mobile"]) ? $_POST["sfsi_plus_widget_show_on_mobile"] : 'no';

    $sfsi_plus_float_show_on_desktop    = isset($_POST["sfsi_plus_float_show_on_desktop"]) ? $_POST["sfsi_plus_float_show_on_desktop"] : 'no';
    $sfsi_plus_float_show_on_mobile     = isset($_POST["sfsi_plus_float_show_on_mobile"]) ? $_POST["sfsi_plus_float_show_on_mobile"] : 'no';

    $sfsi_plus_shortcode_show_on_desktop= isset($_POST["sfsi_plus_shortcode_show_on_desktop"]) ? $_POST["sfsi_plus_shortcode_show_on_desktop"] : 'no';
    $sfsi_plus_shortcode_show_on_mobile = isset($_POST["sfsi_plus_shortcode_show_on_mobile"]) ? $_POST["sfsi_plus_shortcode_show_on_mobile"] : 'no';

    $sfsi_plus_beforeafterposts_show_on_desktop   = isset($_POST["sfsi_plus_beforeafterposts_show_on_desktop"]) ? $_POST["sfsi_plus_beforeafterposts_show_on_desktop"] : 'no';
    $sfsi_plus_beforeafterposts_show_on_mobile    = isset($_POST["sfsi_plus_beforeafterposts_show_on_mobile"]) ? $_POST["sfsi_plus_beforeafterposts_show_on_mobile"] : 'no';        

    $sfsi_plus_rectangle_icons_shortcode_show_on_desktop   = isset($_POST["sfsi_plus_rectangle_icons_shortcode_show_on_desktop"]) ? $_POST["sfsi_plus_rectangle_icons_shortcode_show_on_desktop"] : 'no';
    $sfsi_plus_rectangle_icons_shortcode_show_on_mobile    = isset($_POST["sfsi_plus_rectangle_icons_shortcode_show_on_mobile"]) ? $_POST["sfsi_plus_rectangle_icons_shortcode_show_on_mobile"] : 'no'; 


    $sfsi_plus_icons_rules              = isset($_POST["sfsi_plus_icons_rules"]) ? $_POST["sfsi_plus_icons_rules"]: 0;


    // **************************** Exclude rules STARTS ******************************* //
    
    $sfsi_plus_exclude_home             = isset($_POST["sfsi_plus_exclude_home"]) ? $_POST["sfsi_plus_exclude_home"] : 'no';
    $sfsi_plus_exclude_page             = isset($_POST["sfsi_plus_exclude_page"]) ? $_POST["sfsi_plus_exclude_page"] : 'no';
    $sfsi_plus_exclude_post             = isset($_POST["sfsi_plus_exclude_post"]) ? $_POST["sfsi_plus_exclude_post"] : 'no';
    $sfsi_plus_exclude_tag              = isset($_POST["sfsi_plus_exclude_tag"]) ? $_POST["sfsi_plus_exclude_tag"] : 'no';
    $sfsi_plus_exclude_category         = isset($_POST["sfsi_plus_exclude_category"]) ? $_POST["sfsi_plus_exclude_category"] : 'no';
    $sfsi_plus_exclude_date_archive     = isset($_POST["sfsi_plus_exclude_date_archive"]) ? $_POST["sfsi_plus_exclude_date_archive"] : 'no';
    $sfsi_plus_exclude_author_archive   = isset($_POST["sfsi_plus_exclude_author_archive"]) ? $_POST["sfsi_plus_exclude_author_archive"] : 'no';
    $sfsi_plus_exclude_search           = isset($_POST["sfsi_plus_exclude_search"]) ? $_POST["sfsi_plus_exclude_search"] : 'no';
    $sfsi_plus_exclude_url              = isset($_POST["sfsi_plus_exclude_url"]) ? $_POST["sfsi_plus_exclude_url"] : 'no';
    $sfsi_plus_urlKeywords              = isset($_POST["sfsi_plus_urlKeywords"]) ? $_POST["sfsi_plus_urlKeywords"] : array();
    
    // Exclude list for custom post types //
    
    $sfsi_plus_switch_exclude_custom_post_types  =  isset($_POST["sfsi_plus_switch_exclude_custom_post_types"]) ? $_POST["sfsi_plus_switch_exclude_custom_post_types"]: "no";

    parse_str(urldecode($_POST['sfsi_plus_list_exclude_custom_post_types']), $outputExPT);
    $sfsi_plus_list_exclude_custom_post_types    = isset($outputExPT['sfsi_plus_list_exclude_custom_post_types']) ? serialize($outputExPT['sfsi_plus_list_exclude_custom_post_types']) : serialize(array());

    //  Exclude list for custom post taxonomies //
    
    $sfsi_plus_switch_exclude_taxonomies  =  isset($_POST["sfsi_plus_switch_exclude_taxonomies"]) ? $_POST["sfsi_plus_switch_exclude_taxonomies"]: "no";

    parse_str(urldecode($_POST['sfsi_plus_list_exclude_taxonomies']), $outputExTax);
    $sfsi_plus_list_exclude_taxonomies    =  isset($outputExTax['sfsi_plus_list_exclude_taxonomies']) ? serialize($outputExTax['sfsi_plus_list_exclude_taxonomies']) : serialize(array());

    // **************************** Exclude rules CLOSES ******************************* //

    // **************************** Include rules STARTS ******************************* //

    $sfsi_plus_include_home             = isset($_POST["sfsi_plus_include_home"]) ? $_POST["sfsi_plus_include_home"] : 'no';
    $sfsi_plus_include_page             = isset($_POST["sfsi_plus_include_page"]) ? $_POST["sfsi_plus_include_page"] : 'no';
    $sfsi_plus_include_post             = isset($_POST["sfsi_plus_include_post"]) ? $_POST["sfsi_plus_include_post"] : 'no';
    $sfsi_plus_include_tag              = isset($_POST["sfsi_plus_include_tag"]) ? $_POST["sfsi_plus_include_tag"] : 'no';
    $sfsi_plus_include_category         = isset($_POST["sfsi_plus_include_category"]) ? $_POST["sfsi_plus_include_category"] : 'no';
    $sfsi_plus_include_date_archive     = isset($_POST["sfsi_plus_include_date_archive"]) ? $_POST["sfsi_plus_include_date_archive"] : 'no';
    $sfsi_plus_include_author_archive   = isset($_POST["sfsi_plus_include_author_archive"]) ? $_POST["sfsi_plus_include_author_archive"] : 'no';
    $sfsi_plus_include_search           = isset($_POST["sfsi_plus_include_search"]) ? $_POST["sfsi_plus_include_search"] : 'no';
    $sfsi_plus_include_url              = isset($_POST["sfsi_plus_include_url"]) ? $_POST["sfsi_plus_include_url"] : 'no';
    $sfsi_plus_include_urlKeywords      = isset($_POST["sfsi_plus_include_urlKeywords"]) ? $_POST["sfsi_plus_include_urlKeywords"] : array();
    
    // include list for custom post types //
    
    $sfsi_plus_switch_include_custom_post_types  =  isset($_POST["sfsi_plus_switch_include_custom_post_types"]) ? $_POST["sfsi_plus_switch_include_custom_post_types"]: "no";

    parse_str(urldecode($_POST['sfsi_plus_list_include_custom_post_types']), $outputInPT);
    $sfsi_plus_list_include_custom_post_types    = isset($outputInPT['sfsi_plus_list_include_custom_post_types']) ? serialize($outputInPT['sfsi_plus_list_include_custom_post_types']) : serialize(array());

    //  include list for custom post taxonomies //
    
    $sfsi_plus_switch_include_taxonomies  =  isset($_POST["sfsi_plus_switch_include_taxonomies"]) ? $_POST["sfsi_plus_switch_include_taxonomies"]: "no";

    parse_str(urldecode($_POST['sfsi_plus_list_include_taxonomies']), $outputInTax);
    $sfsi_plus_list_include_taxonomies    =  isset($outputInTax['sfsi_plus_list_include_taxonomies']) ? serialize($outputInTax['sfsi_plus_list_include_taxonomies']) : serialize(array());    

    // **************************** Include rules CLOSES ******************************* //

    $sfsi_plus_mobile_float                     = isset($_POST["sfsi_plus_mobile_float"])
                                                    ? $_POST["sfsi_plus_mobile_float"]
                                                    : 'no';
    $sfsi_plus_mobile_widget                    = isset($_POST["sfsi_plus_mobile_widget"])
                                                    ? $_POST["sfsi_plus_mobile_widget"]
                                                    : 'no';
    $sfsi_plus_mobile_shortcode                 = isset($_POST["sfsi_plus_mobile_shortcode"])
                                                    ? $_POST["sfsi_plus_mobile_shortcode"]
                                                    : 'no';
    $sfsi_plus_mobile_beforeafterposts              = isset($_POST["sfsi_plus_mobile_beforeafterposts"])
                                                    ? $_POST["sfsi_plus_mobile_beforeafterposts"]
                                                    : 'no';

    $sfsi_plus_float_page_mobileposition        = isset($_POST["sfsi_plus_float_page_mobileposition"])
                                                    ? $_POST["sfsi_plus_float_page_mobileposition"]
                                                    : '';
    $sfsi_plus_make_mobileicon                  = isset($_POST["sfsi_plus_make_mobileicon"])
                                                    ? $_POST["sfsi_plus_make_mobileicon"]
                                                    : 'float';
    $sfsi_plus_icons_floatMargin_mobiletop      = isset($_POST["sfsi_plus_icons_floatMargin_mobiletop"]) 
                                                    ? $_POST["sfsi_plus_icons_floatMargin_mobiletop"]
                                                    : '';
    $sfsi_plus_icons_floatMargin_mobilebottom   = isset($_POST["sfsi_plus_icons_floatMargin_mobilebottom"])
                                                    ? $_POST["sfsi_plus_icons_floatMargin_mobilebottom"]
                                                    :'';
    $sfsi_plus_icons_floatMargin_mobileleft     = isset($_POST["sfsi_plus_icons_floatMargin_mobileleft"])
                                                    ? $_POST["sfsi_plus_icons_floatMargin_mobileleft"]
                                                    : '';
    $sfsi_plus_icons_floatMargin_mobileright    = isset($_POST["sfsi_plus_icons_floatMargin_mobileright"])
                                                    ? $_POST["sfsi_plus_icons_floatMargin_mobileright"]
                                                    :'';

    $sfsi_plus_textBefor_icons_font_size    =   isset($_POST["sfsi_plus_textBefor_icons_font_size"])
                                                    ? $_POST["sfsi_plus_textBefor_icons_font_size"]
                                                    : '20';

    $sfsi_plus_textBefor_icons_font         =   isset($_POST["sfsi_plus_textBefor_icons_font"])
                                                    ? $_POST["sfsi_plus_textBefor_icons_font"]
                                                    : 'inherit';

    $sfsi_plus_textBefor_icons_fontcolor         =   isset($_POST["sfsi_plus_textBefor_icons_fontcolor"])
                                                    ? $_POST["sfsi_plus_textBefor_icons_fontcolor"]
                                                    : '#000000';

    $sfsi_plus_textBefor_icons_font_type    =   isset($_POST["sfsi_plus_textBefor_icons_font_type"])
                                                    ? $_POST["sfsi_plus_textBefor_icons_font_type"]
                                                    : 'normal';

    $up_option8 = array(
        'sfsi_plus_show_via_widget'         => sanitize_text_field($sfsi_plus_show_via_widget),
        'sfsi_plus_float_on_page'           => sanitize_text_field($sfsi_plus_float_on_page),
        'sfsi_plus_float_page_position'     => sanitize_text_field($sfsi_plus_float_page_position),
        'sfsi_plus_make_icon'               => sanitize_text_field($sfsi_plus_make_icon),
        'sfsi_plus_icons_floatMargin_top'   => intval($sfsi_plus_icons_floatMargin_top),
        'sfsi_plus_icons_floatMargin_bottom'=> intval($sfsi_plus_icons_floatMargin_bottom),
        'sfsi_plus_icons_floatMargin_left'  => intval($sfsi_plus_icons_floatMargin_left),
        'sfsi_plus_icons_floatMargin_right' => intval($sfsi_plus_icons_floatMargin_right),
        
        'sfsi_plus_place_item_manually'     => sanitize_text_field($sfsi_plus_place_item_manually),

        'sfsi_plus_mobile_float'                    => sanitize_text_field($sfsi_plus_mobile_float),
        'sfsi_plus_mobile_widget'                   => sanitize_text_field($sfsi_plus_mobile_widget), 
        'sfsi_plus_mobile_shortcode'                => sanitize_text_field($sfsi_plus_mobile_shortcode),
        'sfsi_plus_mobile_beforeafterposts'         => sanitize_text_field($sfsi_plus_mobile_beforeafterposts),
        
        'sfsi_plus_shortcode_horizontal_verical_Alignment'        => sanitize_text_field($sfsi_plus_shortcode_horizontal_verical_Alignment),
        'sfsi_plus_shortcode_mobile_horizontal_verical_Alignment' => sanitize_text_field($sfsi_plus_shortcode_mobile_horizontal_verical_Alignment),
        
        'sfsi_plus_widget_horizontal_verical_Alignment'         => sanitize_text_field($sfsi_plus_widget_horizontal_verical_Alignment),
        'sfsi_plus_widget_mobile_horizontal_verical_Alignment'  => sanitize_text_field($sfsi_plus_widget_mobile_horizontal_verical_Alignment),

        'sfsi_plus_float_horizontal_verical_Alignment'          => sanitize_text_field($sfsi_plus_float_horizontal_verical_Alignment),
        'sfsi_plus_float_mobile_horizontal_verical_Alignment'   => sanitize_text_field($sfsi_plus_float_mobile_horizontal_verical_Alignment),

        'sfsi_plus_beforeafterposts_horizontal_verical_Alignment'       => sanitize_text_field($sfsi_plus_beforeafterposts_horizontal_verical_Alignment),
        'sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment'=> sanitize_text_field($sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment),
        
        'sfsi_plus_show_item_onposts'       => sanitize_text_field($sfsi_plus_show_item_onposts),
        'sfsi_plus_display_button_type'     => sanitize_text_field($sfsi_plus_display_button_type),
        'sfsi_plus_post_icons_size'         => intval($sfsi_plus_post_icons_size),
        'sfsi_plus_post_icons_spacing'      => intval($sfsi_plus_post_icons_spacing),

        'sfsi_plus_post_icons_vertical_spacing'=> intval($sfsi_plus_post_icons_vertical_spacing),        
        'sfsi_plus_show_Onposts'            => sanitize_text_field($sfsi_plus_show_Onposts),
        'sfsi_plus_textBefor_icons'         => sanitize_text_field(stripslashes($sfsi_plus_textBefor_icons)),
        
        'sfsi_plus_textBefor_icons_font_size'=> intval($sfsi_plus_textBefor_icons_font_size),
        'sfsi_plus_textBefor_icons_fontcolor'=> sfsi_plus_sanitize_hex_color($sfsi_plus_textBefor_icons_fontcolor),
        'sfsi_plus_textBefor_icons_font'     => sanitize_text_field($sfsi_plus_textBefor_icons_font),
        'sfsi_plus_textBefor_icons_font_type'=> sanitize_text_field($sfsi_plus_textBefor_icons_font_type),
        
        'sfsi_plus_icons_alignment'         => sanitize_text_field($sfsi_plus_icons_alignment),
        'sfsi_plus_icons_DisplayCounts'     => sanitize_text_field($sfsi_plus_icons_DisplayCounts),
        'sfsi_plus_display_before_posts'    => sanitize_text_field($sfsi_plus_display_before_posts),
        'sfsi_plus_display_after_posts'     => sanitize_text_field($sfsi_plus_display_after_posts),
        'sfsi_plus_choose_post_types'           => $sfsi_plus_choose_post_types,
        'sfsi_plus_taxonomies_for_icons'        => $sfsi_plus_taxonomies_for_icons,

        'sfsi_plus_float_page_mobileposition'       => sanitize_text_field($sfsi_plus_float_page_mobileposition),
        'sfsi_plus_make_mobileicon'                 => sanitize_text_field($sfsi_plus_make_mobileicon),
        'sfsi_plus_icons_floatMargin_mobiletop'     => intval($sfsi_plus_icons_floatMargin_mobiletop),
        'sfsi_plus_icons_floatMargin_mobilebottom'  => intval($sfsi_plus_icons_floatMargin_mobilebottom),
        'sfsi_plus_icons_floatMargin_mobileleft'    => intval($sfsi_plus_icons_floatMargin_mobileleft),
        'sfsi_plus_icons_floatMargin_mobileright'   => intval($sfsi_plus_icons_floatMargin_mobileright),
        
        'sfsi_plus_display_before_blogposts'=> sanitize_text_field($sfsi_plus_display_before_blogposts),
        'sfsi_plus_display_after_blogposts' => sanitize_text_field($sfsi_plus_display_after_blogposts),
        'sfsi_plus_rectsub'                 => sanitize_text_field($sfsi_plus_rectsub),
        'sfsi_plus_rectfb'                  => sanitize_text_field($sfsi_plus_rectfb),
        'sfsi_plus_rectgp'                  => sanitize_text_field($sfsi_plus_rectgp),
        'sfsi_plus_rectshr'                 => sanitize_text_field($sfsi_plus_rectshr),
        'sfsi_plus_recttwtr'                => sanitize_text_field($sfsi_plus_recttwtr),
        'sfsi_plus_rectpinit'               => sanitize_text_field($sfsi_plus_rectpinit),
        'sfsi_plus_rectlinkedin'            => sanitize_text_field($sfsi_plus_rectlinkedin),
        'sfsi_plus_rectreddit'              => sanitize_text_field($sfsi_plus_rectreddit),
        'sfsi_plus_rectfbshare'             => sanitize_text_field($sfsi_plus_rectfbshare),
        
        'sfsi_plus_marginAbove_postIcon'      => intval($sfsi_plus_marginAbove_postIcon),
        'sfsi_plus_marginBelow_postIcon'      => intval($sfsi_plus_marginBelow_postIcon),
        'sfsi_plus_display_after_pageposts'   => sanitize_text_field($sfsi_plus_display_after_pageposts),
        'sfsi_plus_display_before_pageposts'   => sanitize_text_field($sfsi_plus_display_before_pageposts),
        
        'sfsi_plus_widget_show_on_desktop'    => sanitize_text_field($sfsi_plus_widget_show_on_desktop),
        'sfsi_plus_widget_show_on_mobile'     => sanitize_text_field($sfsi_plus_widget_show_on_mobile),

        'sfsi_plus_float_show_on_desktop'    => sanitize_text_field($sfsi_plus_float_show_on_desktop),
        'sfsi_plus_float_show_on_mobile'     => sanitize_text_field($sfsi_plus_float_show_on_mobile),

        'sfsi_plus_shortcode_show_on_desktop'=> sanitize_text_field($sfsi_plus_shortcode_show_on_desktop),
        'sfsi_plus_shortcode_show_on_mobile' => sanitize_text_field($sfsi_plus_shortcode_show_on_mobile),

        'sfsi_plus_rectangle_icons_shortcode_show_on_desktop'=> sanitize_text_field($sfsi_plus_rectangle_icons_shortcode_show_on_desktop),
        'sfsi_plus_rectangle_icons_shortcode_show_on_mobile' => sanitize_text_field($sfsi_plus_rectangle_icons_shortcode_show_on_mobile),

        'sfsi_plus_beforeafterposts_show_on_desktop'=> sanitize_text_field($sfsi_plus_beforeafterposts_show_on_desktop),
        'sfsi_plus_beforeafterposts_show_on_mobile' => sanitize_text_field($sfsi_plus_beforeafterposts_show_on_mobile),        

        'sfsi_plus_icons_rules'             => $sfsi_plus_icons_rules,         
        'sfsi_plus_exclude_home'            => sanitize_text_field($sfsi_plus_exclude_home),
        'sfsi_plus_exclude_page'            => sanitize_text_field($sfsi_plus_exclude_page),
        'sfsi_plus_exclude_post'            => sanitize_text_field($sfsi_plus_exclude_post),
        'sfsi_plus_exclude_tag'             => sanitize_text_field($sfsi_plus_exclude_tag),
        'sfsi_plus_exclude_category'        => sanitize_text_field($sfsi_plus_exclude_category),
        'sfsi_plus_exclude_date_archive'    => sanitize_text_field($sfsi_plus_exclude_date_archive),
        'sfsi_plus_exclude_author_archive'  => sanitize_text_field($sfsi_plus_exclude_author_archive),
        'sfsi_plus_exclude_search'          => sanitize_text_field($sfsi_plus_exclude_search),
        'sfsi_plus_exclude_url'             => sanitize_text_field($sfsi_plus_exclude_url),
        'sfsi_plus_urlKeywords'             => array_values(array_filter($sfsi_plus_urlKeywords)),

        'sfsi_plus_switch_exclude_custom_post_types' => $sfsi_plus_switch_exclude_custom_post_types,
        'sfsi_plus_list_exclude_custom_post_types' => $sfsi_plus_list_exclude_custom_post_types,

        'sfsi_plus_switch_exclude_taxonomies' => $sfsi_plus_switch_exclude_taxonomies,
        'sfsi_plus_list_exclude_taxonomies' => $sfsi_plus_list_exclude_taxonomies,

        'sfsi_plus_include_home'            => sanitize_text_field($sfsi_plus_include_home),
        'sfsi_plus_include_page'            => sanitize_text_field($sfsi_plus_include_page),
        'sfsi_plus_include_post'            => sanitize_text_field($sfsi_plus_include_post),
        'sfsi_plus_include_tag'             => sanitize_text_field($sfsi_plus_include_tag),
        'sfsi_plus_include_category'        => sanitize_text_field($sfsi_plus_include_category),
        'sfsi_plus_include_date_archive'    => sanitize_text_field($sfsi_plus_include_date_archive),
        'sfsi_plus_include_author_archive'  => sanitize_text_field($sfsi_plus_include_author_archive),
        'sfsi_plus_include_search'          => sanitize_text_field($sfsi_plus_include_search),
        'sfsi_plus_include_url'             => sanitize_text_field($sfsi_plus_include_url),
        'sfsi_plus_include_urlKeywords'     => array_values(array_filter($sfsi_plus_include_urlKeywords)),

        'sfsi_plus_switch_include_custom_post_types' => $sfsi_plus_switch_include_custom_post_types,
        'sfsi_plus_list_include_custom_post_types' => $sfsi_plus_list_include_custom_post_types,

        'sfsi_plus_switch_include_taxonomies' => $sfsi_plus_switch_include_taxonomies,
        'sfsi_plus_list_include_taxonomies' => $sfsi_plus_list_include_taxonomies                
    );    
    $success = update_option('sfsi_premium_section8_options',serialize($up_option8));
    $success = false != $success ? "success": "failure";

    header('Content-Type: application/json');
    echo  json_encode(array("success")); exit;
} 
/* save settings for section 8 */
add_action('wp_ajax_plus_updateSrcn9','sfsi_plus_options_updater9');        
function sfsi_plus_options_updater9()
{
    if ( !wp_verify_nonce( $_POST['nonce'], "update_plus_step9")) {
      echo  json_encode(array("wrong_nonce")); exit;
    }
    
    $sfsi_plus_form_adjustment      = isset($_POST["sfsi_plus_form_adjustment"]) ? $_POST["sfsi_plus_form_adjustment"] : 'yes';
    $sfsi_plus_form_height          = isset($_POST["sfsi_plus_form_height"]) ? $_POST["sfsi_plus_form_height"] : '180';
    $sfsi_plus_form_width           = isset($_POST["sfsi_plus_form_width"]) ? $_POST["sfsi_plus_form_width"] : '230';
    $sfsi_plus_form_border          = isset($_POST["sfsi_plus_form_border"]) ? $_POST["sfsi_plus_form_border"] : 'no';
    $sfsi_plus_form_border_thickness= isset($_POST["sfsi_plus_form_border_thickness"]) ? $_POST["sfsi_plus_form_border_thickness"] : '1';
    $sfsi_plus_form_border_color    = isset($_POST["sfsi_plus_form_border_color"]) ? $_POST["sfsi_plus_form_border_color"] : '#f3faf2';
    $sfsi_plus_form_background      = isset($_POST["sfsi_plus_form_background"]) ? $_POST["sfsi_plus_form_background"] : '#eff7f7';
    
    $sfsi_plus_form_heading_text       = isset($_POST["sfsi_plus_form_heading_text"]) ? $_POST["sfsi_plus_form_heading_text"] : '';
    $sfsi_plus_form_heading_font       = isset($_POST["sfsi_plus_form_heading_font"]) ? $_POST["sfsi_plus_form_heading_font"] : '';
    $sfsi_plus_form_heading_fontstyle  = isset($_POST["sfsi_plus_form_heading_fontstyle"]) ? $_POST["sfsi_plus_form_heading_fontstyle"] : '';
    $sfsi_plus_form_heading_fontcolor  = isset($_POST["sfsi_plus_form_heading_fontcolor"]) ? $_POST["sfsi_plus_form_heading_fontcolor"] : '';
    $sfsi_plus_form_heading_fontsize   = isset($_POST["sfsi_plus_form_heading_fontsize"]) ? $_POST["sfsi_plus_form_heading_fontsize"] : '22';
    $sfsi_plus_form_heading_fontalign  = isset($_POST["sfsi_plus_form_heading_fontalign"]) ? $_POST["sfsi_plus_form_heading_fontalign"] :'center';
    
    $sfsi_plus_form_field_text      = isset($_POST["sfsi_plus_form_field_text"]) ? $_POST["sfsi_plus_form_field_text"] : '';
    $sfsi_plus_form_field_font      = isset($_POST["sfsi_plus_form_field_font"]) ? $_POST["sfsi_plus_form_field_font"] : '';
    $sfsi_plus_form_field_fontstyle = isset($_POST["sfsi_plus_form_field_fontstyle"]) ? $_POST["sfsi_plus_form_field_fontstyle"] : '';
    $sfsi_plus_form_field_fontcolor = isset($_POST["sfsi_plus_form_field_fontcolor"]) ? $_POST["sfsi_plus_form_field_fontcolor"] : '';
    $sfsi_plus_form_field_fontsize  = isset($_POST["sfsi_plus_form_field_fontsize"]) ? $_POST["sfsi_plus_form_field_fontsize"] : '22';
    $sfsi_plus_form_field_fontalign = isset($_POST["sfsi_plus_form_field_fontalign"]) ? $_POST["sfsi_plus_form_field_fontalign"] :'center';
    
    $sfsi_plus_form_button_text       = isset($_POST["sfsi_plus_form_button_text"]) ? $_POST["sfsi_plus_form_button_text"] : 'Subscribe';
    $sfsi_plus_form_button_font       = isset($_POST["sfsi_plus_form_button_font"]) ? $_POST["sfsi_plus_form_button_font"] : '';
    $sfsi_plus_form_button_fontstyle  = isset($_POST["sfsi_plus_form_button_fontstyle"]) ? $_POST["sfsi_plus_form_button_fontstyle"] : '';
    $sfsi_plus_form_button_fontcolor  = isset($_POST["sfsi_plus_form_button_fontcolor"]) ? $_POST["sfsi_plus_form_button_fontcolor"] : '';
    $sfsi_plus_form_button_fontsize   = isset($_POST["sfsi_plus_form_button_fontsize"]) ? $_POST["sfsi_plus_form_button_fontsize"] : '22';
    $sfsi_plus_form_button_fontalign  = isset($_POST["sfsi_plus_form_button_fontalign"]) ? $_POST["sfsi_plus_form_button_fontalign"] :'center';
    $sfsi_plus_form_button_background = isset($_POST["sfsi_plus_form_button_background"]) ? $_POST["sfsi_plus_form_button_background"]:'#5a6570';

    $sfsi_plus_shall_display_privacy_notice       = isset($_POST["sfsi_plus_shall_display_privacy_notice"]) ? $_POST["sfsi_plus_shall_display_privacy_notice"] : 'no';

    $sfsi_plus_form_privacynotice_text       = isset($_POST["sfsi_plus_form_privacynotice_text"])     ? $_POST["sfsi_plus_form_privacynotice_text"] : 'We will treat your data confidentially';
    
    $sfsi_plus_form_privacynotice_font       = isset($_POST["sfsi_plus_form_privacynotice_font"])      ? $_POST["sfsi_plus_form_privacynotice_font"] : 'Helvetica,Arial,sans-serif';

    $sfsi_plus_form_privacynotice_fontstyle = isset($_POST["sfsi_plus_form_privacynotice_fontstyle"])      ? $_POST["sfsi_plus_form_privacynotice_fontstyle"] : 'center';

    $sfsi_plus_form_privacynotice_fontcolor  = isset($_POST["sfsi_plus_form_privacynotice_fontcolor"]) ? $_POST["sfsi_plus_form_privacynotice_fontcolor"] : '#000000';
    $sfsi_plus_form_privacynotice_fontsize   = isset($_POST["sfsi_plus_form_privacynotice_fontsize"])  ? $_POST["sfsi_plus_form_privacynotice_fontsize"] : '16';
    $sfsi_plus_form_privacynotice_fontalign  = isset($_POST["sfsi_plus_form_privacynotice_fontalign"]) ? $_POST["sfsi_plus_form_privacynotice_fontalign"] :'center';
    
    /* icons pop options */
    $up_option9 = array(    
        'sfsi_plus_form_adjustment'      => sanitize_text_field($sfsi_plus_form_adjustment),
        'sfsi_plus_form_height'          => intval($sfsi_plus_form_height),
        'sfsi_plus_form_width'           => intval($sfsi_plus_form_width),
        'sfsi_plus_form_border'          => sanitize_text_field($sfsi_plus_form_border),
        'sfsi_plus_form_border_thickness'=> intval($sfsi_plus_form_border_thickness),
        'sfsi_plus_form_border_color'    => sfsi_plus_sanitize_hex_color($sfsi_plus_form_border_color),
        'sfsi_plus_form_background'      => sfsi_plus_sanitize_hex_color($sfsi_plus_form_background),
        
        'sfsi_plus_form_heading_text'       => sanitize_text_field(stripslashes($sfsi_plus_form_heading_text)),
        'sfsi_plus_form_heading_font'       => sanitize_text_field($sfsi_plus_form_heading_font),
        'sfsi_plus_form_heading_fontstyle'  => sanitize_text_field($sfsi_plus_form_heading_fontstyle),
        'sfsi_plus_form_heading_fontcolor'  => sfsi_plus_sanitize_hex_color($sfsi_plus_form_heading_fontcolor),
        'sfsi_plus_form_heading_fontsize'   => intval($sfsi_plus_form_heading_fontsize),
        'sfsi_plus_form_heading_fontalign'  => sanitize_text_field($sfsi_plus_form_heading_fontalign),
        
        'sfsi_plus_form_field_text'         =>  sanitize_text_field(stripslashes($sfsi_plus_form_field_text)),
        'sfsi_plus_form_field_font'         =>  sanitize_text_field($sfsi_plus_form_field_font),
        'sfsi_plus_form_field_fontstyle'    =>  sanitize_text_field($sfsi_plus_form_field_fontstyle),
        'sfsi_plus_form_field_fontcolor'    =>  sfsi_plus_sanitize_hex_color($sfsi_plus_form_field_fontcolor),
        'sfsi_plus_form_field_fontsize'     =>  intval($sfsi_plus_form_field_fontsize),
        'sfsi_plus_form_field_fontalign'    =>  sanitize_text_field($sfsi_plus_form_field_fontalign),
        
        'sfsi_plus_form_button_text'        => sanitize_text_field(stripslashes($sfsi_plus_form_button_text)),
        'sfsi_plus_form_button_font'        => sanitize_text_field($sfsi_plus_form_button_font),
        'sfsi_plus_form_button_fontstyle'   => sanitize_text_field($sfsi_plus_form_button_fontstyle),
        'sfsi_plus_form_button_fontcolor'   => sfsi_plus_sanitize_hex_color($sfsi_plus_form_button_fontcolor),
        'sfsi_plus_form_button_fontsize'    => intval($sfsi_plus_form_button_fontsize),
        'sfsi_plus_form_button_fontalign'   => sanitize_text_field($sfsi_plus_form_button_fontalign),
        'sfsi_plus_form_button_background'  => sfsi_plus_sanitize_hex_color($sfsi_plus_form_button_background),

        'sfsi_plus_shall_display_privacy_notice' => sanitize_text_field($sfsi_plus_shall_display_privacy_notice),
        'sfsi_plus_form_privacynotice_text'      => trim(sfsi_premium_strip_tags_content(stripslashes($sfsi_plus_form_privacynotice_text))),
        'sfsi_plus_form_privacynotice_font'      => sanitize_text_field($sfsi_plus_form_privacynotice_font),
        'sfsi_plus_form_privacynotice_fontstyle' => sanitize_text_field($sfsi_plus_form_privacynotice_fontstyle),
        'sfsi_plus_form_privacynotice_fontcolor' => sfsi_plus_sanitize_hex_color($sfsi_plus_form_privacynotice_fontcolor),
        'sfsi_plus_form_privacynotice_fontsize'  => intval($sfsi_plus_form_privacynotice_fontsize),
        'sfsi_plus_form_privacynotice_fontalign' => sanitize_text_field($sfsi_plus_form_privacynotice_fontalign)        
    );
    
    update_option('sfsi_premium_section9_options',serialize($up_option9));
    header('Content-Type: application/json');
    echo  json_encode(array("success")); exit;
}
 
/* upload custom icons images */
/* get counts for admin section */        
function sfsi_plus_getCounts()
{
    $socialObj = new sfsi_plus_SocialHelper();
    $option4 = unserialize(get_option('sfsi_premium_section4_options',false));
    $sfsi_premium_section2_options = unserialize(get_option('sfsi_premium_section2_options',false));
    $scounts = array(
        'rss_count'=>'',
        'email_count'=>'',
        'fb_count'=>'',
        'twitter_count'=>'',
        'google_count'=>'',
        'linkedIn_count'=>'',
        'youtube_count'=>'',
        'pin_count'=>'',
        'share_count'=>''
    );

     $option4['sfsi_plus_email_countsFrom']          =   (isset($option4['sfsi_plus_email_countsFrom']))
                                                            ? sanitize_text_field($option4['sfsi_plus_email_countsFrom'])
                                                            : '';
    $option4['sfsi_plus_email_manualCounts']        =   (isset($option4['sfsi_plus_email_manualCounts']))
                                                            ? intval($option4['sfsi_plus_email_manualCounts'])
                                                            : '';
    $option4['sfsi_plus_rss_countsDisplay']         =   (isset($option4['sfsi_plus_rss_countsDisplay']))
                                                            ? sanitize_text_field($option4['sfsi_plus_rss_countsDisplay'])
                                                            : '';
    $option4['sfsi_plus_rss_manualCounts']          =   (isset($option4['sfsi_plus_rss_manualCounts']))
                                                            ? intval($option4['sfsi_plus_rss_manualCounts'])
                                                            : '';
    $option4['sfsi_plus_email_countsDisplay']       =   (isset($option4['sfsi_plus_email_countsDisplay']))
                                                            ? sanitize_text_field($option4['sfsi_plus_email_countsDisplay'])
                                                            : '';
    
    $option4['sfsi_plus_facebook_countsDisplay']    =   (isset($option4['sfsi_plus_facebook_countsDisplay']))
                                                            ? sanitize_text_field($option4['sfsi_plus_facebook_countsDisplay'])
                                                            : '';
    $option4['sfsi_plus_facebook_countsFrom']       =   (isset($option4['sfsi_plus_facebook_countsFrom']))
                                                            ? sanitize_text_field($option4['sfsi_plus_facebook_countsFrom'])
                                                            : '';
    $option4['sfsi_plus_facebook_mypageCounts']     =   (isset($option4['sfsi_plus_facebook_mypageCounts']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsi_plus_facebook_mypageCounts'])
                                                            : '';
    $option4['sfsi_plus_facebook_appid']            =   (isset($option4['sfsi_plus_facebook_appid']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsi_plus_facebook_appid'])
                                                            : '';
    $option4['sfsi_plus_facebook_appsecret']        =   (isset($option4['sfsi_plus_facebook_appsecret']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsi_plus_facebook_appsecret'])
                                                            : '';
    $option4['sfsi_plus_facebook_manualCounts']     =   (isset($option4['sfsi_plus_facebook_manualCounts']))
                                                            ? intval($option4['sfsi_plus_facebook_manualCounts'])
                                                            : '';
    $option4['sfsi_plus_facebook_countsFrom_blog']  =   (isset($option4['sfsi_plus_facebook_countsFrom_blog']))
                                                            ? ($option4['sfsi_plus_facebook_countsFrom_blog'])
                                                            : '';
    
    $option4['sfsi_plus_twitter_countsDisplay']     =   (isset($option4['sfsi_plus_twitter_countsDisplay']))
                                                            ? sanitize_text_field($option4['sfsi_plus_twitter_countsDisplay'])
                                                            : '';
    $option4['sfsi_plus_twitter_countsFrom']        =   (isset($option4['sfsi_plus_twitter_countsFrom']))
                                                            ? sanitize_text_field($option4['sfsi_plus_twitter_countsFrom'])
                                                            : '';
    $option4['sfsi_plus_twitter_manualCounts']      =   (isset($option4['sfsi_plus_twitter_manualCounts']))
                                                            ? intval($option4['sfsi_plus_twitter_manualCounts'])
                                                            : '';
    $option4['sfsiplus_tw_consumer_key']            =   (isset($option4['sfsiplus_tw_consumer_key']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsiplus_tw_consumer_key'])
                                                            : '';
    $option4['sfsiplus_tw_consumer_secret']         =   (isset($option4['sfsiplus_tw_consumer_secret']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsiplus_tw_consumer_secret'])
                                                            : '';
    $option4['sfsiplus_tw_oauth_access_token']      =   (isset($option4['sfsiplus_tw_oauth_access_token']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsiplus_tw_oauth_access_token'])
                                                            : '';
    $option4['sfsiplus_tw_oauth_access_token_secret']=  (isset($option4['sfsiplus_tw_oauth_access_token_secret']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsiplus_tw_oauth_access_token_secret'])
                                                            : '';
    
    
    $option4['sfsi_plus_google_countsFrom']         =   (isset($option4['sfsi_plus_google_countsFrom']))
                                                            ? sanitize_text_field($option4['sfsi_plus_google_countsFrom'])
                                                            : '';
    $option4['sfsi_plus_google_manualCounts']       =   (isset($option4['sfsi_plus_google_manualCounts']))
                                                            ? intval($option4['sfsi_plus_google_manualCounts'])
                                                            : '';
    $option4['sfsi_plus_google_api_key']            =   (isset($option4['sfsi_plus_google_api_key']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsi_plus_google_api_key'])
                                                            : '';
    $option4['sfsi_plus_google_countsDisplay']      =   (isset($option4['sfsi_plus_google_countsDisplay']))
                                                            ? sanitize_text_field($option4['sfsi_plus_google_countsDisplay'])
                                                            : '';
    
    $option4['sfsi_plus_youtube_countsDisplay']     =   (isset($option4['sfsi_plus_youtube_countsDisplay']))
                                                            ? sanitize_text_field($option4['sfsi_plus_youtube_countsDisplay'])
                                                            : '';
    $option4['sfsi_plus_youtube_countsFrom']        =   (isset($option4['sfsi_plus_youtube_countsFrom']))
                                                            ? sanitize_text_field($option4['sfsi_plus_youtube_countsFrom'])
                                                            : '';
    $option4['sfsi_plus_youtubeusernameorid']       =   (isset($option4['sfsi_plus_youtubeusernameorid']))
                                                            ? sanitize_text_field($option4['sfsi_plus_youtubeusernameorid'])
                                                            : '';
    $option4['sfsi_plus_youtube_manualCounts']      =   (isset($option4['sfsi_plus_youtube_manualCounts']))
                                                            ? intval($option4['sfsi_plus_youtube_manualCounts'])
                                                            : '';
    $option4['sfsi_plus_youtube_user']              =   (isset($option4['sfsi_plus_youtube_user']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsi_plus_youtube_user'])
                                                            : '';
    $option4['sfsi_plus_youtube_channelId']         =   (isset($option4['sfsi_plus_youtube_channelId']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsi_plus_youtube_channelId'])
                                                            : '';
    
    
    $option4['sfsi_plus_instagram_manualCounts']    =   (isset($option4['sfsi_plus_instagram_manualCounts']))
                                                            ? intval($option4['sfsi_plus_instagram_manualCounts'])
                                                            : '';
    $option4['sfsi_plus_instagram_User']            =   (isset($option4['sfsi_plus_instagram_User']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsi_plus_instagram_User'])
                                                            : '';
    $option4['sfsi_plus_instagram_clientid']        =   (isset($option4['sfsi_plus_instagram_clientid']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsi_plus_instagram_clientid'])
                                                            : '';
    $option4['sfsi_plus_instagram_appurl']          =   (isset($option4['sfsi_plus_instagram_appurl']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsi_plus_instagram_appurl'])
                                                            : '';
    $option4['sfsi_plus_instagram_token']           =   (isset($option4['sfsi_plus_instagram_token']))
                                                            ? sfsi_plus_sanitize_field($option4['sfsi_plus_instagram_token'])
                                                            : '';
    $option4['sfsi_plus_instagram_countsFrom']      =   (isset($option4['sfsi_plus_instagram_countsFrom']))
                                                            ? sanitize_text_field($option4['sfsi_plus_instagram_countsFrom'])
                                                            : '';
    $option4['sfsi_plus_instagram_countsDisplay']   =   (isset($option4['sfsi_plus_instagram_countsDisplay']))
                                                            ? sanitize_text_field($option4['sfsi_plus_instagram_countsDisplay'])
                                                            : '';
    
    $option4['sfsi_plus_linkedIn_countsFrom']        =   (isset($option4['sfsi_plus_linkedIn_countsFrom']))
                                                            ? sanitize_text_field($option4['sfsi_plus_linkedIn_countsFrom'])
                                                            : '';

    $option4['sfsi_plus_linkedIn_manualCounts']     =   (isset($option4['sfsi_plus_linkedIn_manualCounts']))
                                                            ? intval($option4['sfsi_plus_linkedIn_manualCounts'])
                                                            : '';
    $option4['sfsi_plus_houzz_manualCounts']        =   (isset($option4['sfsi_plus_houzz_manualCounts']))
                                                            ? intval($option4['sfsi_plus_houzz_manualCounts'])
                                                            : '';
                                                            
    $option4['sfsi_plus_pinterest_countsFrom']    =   (isset($option4['sfsi_plus_pinterest_countsFrom']))
                                                            ? intval($option4['sfsi_plus_pinterest_countsFrom'])
                                                            : '';                                                    
    $option4['sfsi_plus_pinterest_manualCounts']    =   (isset($option4['sfsi_plus_pinterest_manualCounts']))
                                                            ? intval($option4['sfsi_plus_pinterest_manualCounts'])
                                                            : '';
    $option4['sfsi_plus_shares_manualCounts']       =   (isset($option4['sfsi_plus_shares_manualCounts']))
                                                            ? intval($option4['sfsi_plus_shares_manualCounts'])
                                                            : '';
    
    $option4['sfsi_plus_snapchat_manualCounts']     =   (isset($option4['sfsi_plus_snapchat_manualCounts']))
                                                            ? intval($option4['sfsi_plus_snapchat_manualCounts'])
                                                            : ''; 
    $option4['sfsi_plus_whatsapp_manualCounts']     =   (isset($option4['sfsi_plus_whatsapp_manualCounts']))
                                                            ? intval($option4['sfsi_plus_whatsapp_manualCounts'])
                                                            : '';
    $option4['sfsi_plus_skype_manualCounts']        =   (isset($option4['sfsi_plus_skype_manualCounts']))
                                                            ? intval($option4['sfsi_plus_skype_manualCounts'])
                                                            : ''; 
    $option4['sfsi_plus_vimeo_manualCounts']        =   (isset($option4['sfsi_plus_vimeo_manualCounts']))
                                                            ? intval($option4['sfsi_plus_vimeo_manualCounts'])
                                                            : ''; 
    $option4['sfsi_plus_soundcloud_manualCounts']   =   (isset($option4['sfsi_plus_soundcloud_manualCounts']))
                                                            ? intval($option4['sfsi_plus_soundcloud_manualCounts'])
                                                            : '';                                                
    $option4['sfsi_plus_yummly_manualCounts']       =   (isset($option4['sfsi_plus_yummly_manualCounts']))
                                                            ? intval($option4['sfsi_plus_yummly_manualCounts'])
                                                            : ''; 
    $option4['sfsi_plus_flickr_manualCounts']       =   (isset($option4['sfsi_plus_flickr_manualCounts']))
                                                            ? intval($option4['sfsi_plus_flickr_manualCounts'])
                                                            : ''; 
    $option4['sfsi_plus_reddit_manualCounts']       =   (isset($option4['sfsi_plus_reddit_manualCounts']))
                                                            ? intval($option4['sfsi_plus_reddit_manualCounts'])
                                                            : ''; 
    $option4['sfsi_plus_tumblr_manualCounts']       =   (isset($option4['sfsi_plus_tumblr_manualCounts']))
                                                            ? intval($option4['sfsi_plus_tumblr_manualCounts'])
                                                            : '';
    /* get rss count */
    if(!empty($option4['sfsi_plus_rss_manualCounts']) )
    {
       $scounts['rss_count']=$option4['sfsi_plus_rss_manualCounts'];
    } 
    /* get email count */
    if($option4['sfsi_plus_email_countsFrom']=="source" )
    {
        $feed_id        = sanitize_text_field(get_option('sfsi_premium_feed_id',false));
        $feed_data      = $socialObj->SFSI_getFeedSubscriber($feed_id);
     
        $scounts['email_count']= $socialObj->format_num($feed_data);
        if(empty($scounts['email_count']))
        {
          $scounts['email_count']=(string) "0";
        }
    }
    else
    {
        $scounts['email_count']=$option4['sfsi_plus_email_manualCounts'];
        
    }    
   
    /* get fb count */
    if($option4['sfsi_plus_facebook_countsFrom']=="likes" )
    {
        $url=home_url();

        $fb_data = $socialObj->sfsi_get_fb($url);
       
        $fb_count = isset($fb_data['share_count']) && !empty($fb_data['share_count']) ? (int) $fb_data['share_count']: 0;

        $scounts['fb_count'] = $socialObj->format_num($fb_count);       
    }
    else if($option4['sfsi_plus_facebook_countsFrom']=="followers" )
    {
        $url=home_url();
        $fb_data=$socialObj->sfsi_get_fb($url);
        $scounts['fb_count']= format_num($fb_data['share_count']);
        if(empty($scounts['fb_count']))
        {
          $scounts['fb_count']=(string) "0";
        }
    }
    else if($option4['sfsi_plus_facebook_countsFrom']=="mypage" )
    {
       $url = $option4['sfsi_plus_facebook_mypageCounts'];
       $fb_data = $socialObj->sfsi_get_fb_pagelike($url);
       $scounts['fb_count']= $fb_data;
    }
    else
    {
        $scounts['fb_count']=$option4['sfsi_plus_facebook_manualCounts'];
    }
    /* get twitter counts */
    if($option4['sfsi_plus_twitter_countsFrom']=="source")
    {
        $twitter_user = $sfsi_premium_section2_options['sfsi_plus_twitter_followUserName'];
        $tw_settings = array(
            'sfsiplus_tw_consumer_key'=>$option4['sfsiplus_tw_consumer_key'],
            'sfsiplus_tw_consumer_secret'=> $option4['sfsiplus_tw_consumer_secret'],
            'sfsiplus_tw_oauth_access_token'=> $option4['sfsiplus_tw_oauth_access_token'],
            'sfsiplus_tw_oauth_access_token_secret'=> $option4['sfsiplus_tw_oauth_access_token_secret']
        );         
          
       $followers=$socialObj->sfsi_get_tweets($twitter_user,$tw_settings);
       $scounts['twitter_count']= $socialObj->format_num($followers);
    }
    else
    {
        $scounts['twitter_count']=$option4['sfsi_plus_twitter_manualCounts'];
    } 
    /* get google+ counts */
    if($option4['sfsi_plus_google_countsFrom']=="follower" )
    {   
      $url=$sfsi_premium_section2_options['sfsi_plus_google_pageURL'];
        $api_key=$option4['sfsi_plus_google_api_key'];
                         $followers=$socialObj->sfsi_get_google($url,$api_key);
                         if(!is_int($followers))
                         {
                             $followers=0;
                         }    
                         $counts=$followers;
       $scounts['google_count']= $socialObj->format_num($followers);
    }
    else if($option4['sfsi_plus_google_countsFrom']=="likes" )
    {   
        $url=home_url();
        $api_key = $option4['sfsi_plus_google_api_key'];
        $followers=$socialObj->sfsi_get_google($url,$api_key);
        if(!is_int($followers))
        {
            $followers=0;
        }    
        $counts=$followers;
        $scounts['google_count']= $socialObj->format_num($followers);
    }
    else
    {
        $scounts['google_count']=$option4['sfsi_plus_google_manualCounts'];
    }
    
    /* get linkedIn counts */
    if($option4['sfsi_plus_linkedIn_countsFrom']=="follower" )
    {   
        $linkedIn_compay=$sfsi_premium_section2_options['sfsi_plus_linkedin_followCompany']; 
        $linkedIn_compay=$option4['sfsi_plus_ln_company'];
        $ln_settings=array(
            'sfsi_plus_ln_api_key'          => $option4['sfsi_plus_ln_api_key'],
            'sfsi_plus_ln_secret_key'       => $option4['sfsi_plus_ln_secret_key'],
            'sfsi_plus_ln_oAuth_user_token' => $option4['sfsi_plus_ln_oAuth_user_token']
        );
       $followers=$socialObj->sfsi_getlinkedin_follower($linkedIn_compay,$ln_settings);
       $scounts['linkedIn_count']= $socialObj->format_num($followers);
    }
    else
    {
        $scounts['linkedIn_count']=$option4['sfsi_plus_linkedIn_manualCounts'];
    } 
    /* get youtube counts */
    if($option4['sfsi_plus_youtube_countsFrom']=="subscriber" )
    {      
        if(
            isset($option4['sfsi_plus_youtube_user'])
        )
        {
            $youtube_user = $option4['sfsi_plus_youtube_user'];
            
            $youtube_user = (
                isset($option4['sfsi_plus_youtube_user']) &&
                !empty($option4['sfsi_plus_youtube_user'])
            ) ? $option4['sfsi_plus_youtube_user'] : 'SpecificFeeds';
            
            $followers = $socialObj->sfsi_get_youtube($youtube_user);
            $scounts['youtube_count'] = $socialObj->format_num($followers);
        }
        else
        {
            $scounts['youtube_count'] = 01;
        }    
    } 
    else
    {
         $scounts['youtube_count']=$option4['sfsi_plus_youtube_manualCounts'];
    }
    /* get Pinterest counts */
    if($option4['sfsi_plus_pinterest_countsFrom']=="pins" )
    {   
       $url=home_url();
       $pins=$socialObj->sfsi_get_pinterest($url);
       $scounts['pin_count']= $socialObj->format_num($pins);
    } 
    else
    {
        $scounts['pin_count']=$option4['sfsi_plus_pinterest_manualCounts'];
    }
    /* get addthis share counts */
    if(isset($option4['sfsi_plus_shares_countsFrom']) && $option4['sfsi_plus_shares_countsFrom']=="shares" && isset($option4['sfsi_share_countsDisplay']) && $option4['sfsi_share_countsDisplay'] =="yes")
    {   
       $shares=$socialObj->sfsi_get_atthis();
       $scounts['share_count']= $socialObj->format_num($shares);
    } 
    else
    {
        $scounts['share_count']=$option4['sfsi_plus_shares_manualCounts'];
    }
    /* get instagram count */
    if($option4['sfsi_plus_instagram_countsFrom']=="followers" )
    {
        $iuser_name= $option4['sfsi_plus_instagram_User'];
        $counts = $socialObj->sfsi_get_instagramFollowers($iuser_name);
        if(empty($counts))
        {
            $scounts['instagram_count']=(string) "0";
        }
        else
        {
            $scounts['instagram_count']=$counts;
        }
    }
    else
    {
        $scounts['instagram_count'] = $option4['sfsi_plus_instagram_manualCounts'];
    }
    
    /* get houzz count */
    if(
        isset($option4['sfsi_plus_houzz_countsFrom']) &&
        $option4['sfsi_plus_houzz_countsFrom']=="manual"
    )
    {
        if(
            isset($option4['sfsi_plus_houzz_manualCounts'])
        )
        {
            $scounts['houzz_count'] =  $option4['sfsi_plus_houzz_manualCounts'];
        }
        else
        {
            $scounts['houzz_count'] = '20';
        }
    }
    elseif(!isset($option4['sfsi_plus_houzz_countsFrom']))
    {
        $scounts['houzz_count'] = '20';
    }
    
    /* get snapchat count */
    if(
        isset($option4['sfsi_plus_snapchat_countsFrom']) &&
        $option4['sfsi_plus_snapchat_countsFrom']=="manual"
    )
    {
        if(
            isset($option4['sfsi_plus_snapchat_manualCounts'])
        )
        {
            $scounts['snapchat_count'] =  $option4['sfsi_plus_snapchat_manualCounts'];
        }
        else
        {
            $scounts['snapchat_count'] = '20';
        }
    }
    elseif(!isset($option4['sfsi_plus_snapchat_countsFrom']))
    {
        $scounts['snapchat_count'] = '20';
    }
    
    /* get whatsapp count */
    if(
        isset($option4['sfsi_plus_whatsapp_countsFrom']) &&
        $option4['sfsi_plus_whatsapp_countsFrom']=="manual"
    )
    {
        if(
            isset($option4['sfsi_plus_whatsapp_manualCounts'])
        )
        {
            $scounts['whatsapp_count'] =  $option4['sfsi_plus_whatsapp_manualCounts'];
        }
        else
        {
            $scounts['whatsapp_count'] = '20';
        }
    }
    elseif(!isset($option4['sfsi_plus_whatsapp_countsFrom']))
    {
        $scounts['whatsapp_count'] = '20';
    }
    
    /* get skype count */
    if(
        isset($option4['sfsi_plus_skype_countsFrom']) &&
        $option4['sfsi_plus_skype_countsFrom']=="manual"
    )
    {
        if(
            isset($option4['sfsi_plus_skype_manualCounts'])
        )
        {
            $scounts['skype_count'] =  $option4['sfsi_plus_skype_manualCounts'];
        }
        else
        {
            $scounts['skype_count'] = '20';
        }
    }
    elseif(!isset($option4['sfsi_plus_skype_countsFrom']))
    {
        $scounts['skype_count'] = '20';
    }
    
    /* get vimeo count */
    if(
        isset($option4['sfsi_plus_vimeo_countsFrom']) &&
        $option4['sfsi_plus_vimeo_countsFrom']=="manual"
    )
    {
        if(
            isset($option4['sfsi_plus_vimeo_manualCounts'])
        )
        {
            $scounts['vimeo_count'] =  $option4['sfsi_plus_vimeo_manualCounts'];
        }
        else
        {
            $scounts['vimeo_count'] = '20';
        }
    }
    elseif(!isset($option4['sfsi_plus_vimeo_countsFrom']))
    {
        $scounts['vimeo_count'] = '20';
    }
    
    /* get soundcloud count */
    if(
        isset($option4['sfsi_plus_soundcloud_countsFrom']) &&
        $option4['sfsi_plus_soundcloud_countsFrom']=="manual"
    )
    {
        if(
            isset($option4['sfsi_plus_soundcloud_manualCounts'])
        )
        {
            $scounts['soundcloud_count'] =  $option4['sfsi_plus_soundcloud_manualCounts'];
        }
        else
        {
            $scounts['soundcloud_count'] = '20';
        }
    }
    elseif(!isset($option4['sfsi_plus_soundcloud_countsFrom']))
    {
        $scounts['soundcloud_count'] = '20';
    }
    
    /* get yummly count */
    if(
        isset($option4['sfsi_plus_yummly_countsFrom']) &&
        $option4['sfsi_plus_yummly_countsFrom']=="manual"
    )
    {
        if(
            isset($option4['sfsi_plus_yummly_manualCounts'])
        )
        {
            $scounts['yummly_count'] =  $option4['sfsi_plus_yummly_manualCounts'];
        }
        else
        {
            $scounts['yummly_count'] = '20';
        }
    }
    elseif(!isset($option4['sfsi_plus_yummly_countsFrom']))
    {
        $scounts['yummly_count'] = '20';
    }
    
    /* get flickr count */
    if(
        isset($option4['sfsi_plus_flickr_countsFrom']) &&
        $option4['sfsi_plus_flickr_countsFrom']=="manual"
    )
    {
        if(
            isset($option4['sfsi_plus_flickr_manualCounts'])
        )
        {
            $scounts['flickr_count'] =  $option4['sfsi_plus_flickr_manualCounts'];
        }
        else
        {
            $scounts['flickr_count'] = '20';
        }
    }
    elseif(!isset($option4['sfsi_plus_flickr_countsFrom']))
    {
        $scounts['flickr_count'] = '20';
    }
    
    /* get reddit count */
    if(
        isset($option4['sfsi_plus_reddit_countsFrom']) &&
        $option4['sfsi_plus_reddit_countsFrom']=="manual"
    )
    {
        if(
            isset($option4['sfsi_plus_reddit_manualCounts'])
        )
        {
            $scounts['reddit_count'] =  $option4['sfsi_plus_reddit_manualCounts'];
        }
        else
        {
            $scounts['reddit_count'] = '20';
        }
    }
    elseif(!isset($option4['sfsi_plus_reddit_countsFrom']))
    {
        $scounts['reddit_count'] = '20';
    }
    
    /* get tumblr count */
    if(
        isset($option4['sfsi_plus_tumblr_countsFrom']) &&
        $option4['sfsi_plus_tumblr_countsFrom']=="manual"
    )
    {
        if(
            isset($option4['sfsi_plus_tumblr_manualCounts'])
        )
        {
            $scounts['tumblr_count'] =  $option4['sfsi_plus_tumblr_manualCounts'];
        }
        else
        {
            $scounts['tumblr_count'] = '20';
        }
    }
    elseif(!isset($option4['sfsi_plus_tumblr_countsFrom']))
    {
        $scounts['tumblr_count'] = '20';
    }  
    return $scounts; exit;
}

/* activate and remove footer credit link */
add_action('wp_ajax_plus_activateFooter','sfsiplusActivateFooter');     
function sfsiplusActivateFooter()
{
    if ( !wp_verify_nonce( $_POST['nonce'], "active_plusfooter")) {
      echo  json_encode(array('res'=>'wrong_nonce')); exit;
    }
    update_option('sfsi_premium_footer_sec', 'yes');
    echo json_encode(array('res'=>'success'));exit;
}

add_action('wp_ajax_plus_removeFooter','sfsiplusremoveFooter');     
function sfsiplusremoveFooter()
{
    if ( !wp_verify_nonce( $_POST['nonce'], "remove_plusfooter")) {
      echo  json_encode(array('res'=>'wrong_nonce')); exit;
    }
    update_option('sfsi_premium_footer_sec', 'no');
    echo json_encode(array('res'=>'success'));exit;
}

add_action('wp_ajax_getIconPreview','sfsiPlusGetIconPreview');     
function sfsiPlusGetIconPreview()
{
    extract($_POST);
    echo '<img src="'.$iconname."/icon_".$iconValue.'.png" >';
    die;
}

add_action("wp_ajax_sfsiplus_curlerrornotification", "sfsiplus_curlerrornotification");
function sfsiplus_curlerrornotification()
{
    update_option("sfsi_premium_curlErrorNotices", "no");
    echo "success";
    die;
}

add_action('wp_ajax_getForm','sfsiPlusGetForm');     
function sfsiPlusGetForm()
{
    extract($_POST);
    ?>
    <xmp>
    <div class="sfsi_subscribe_Popinner">
    <form method="post">
    <h5><?php echo $heading; ?></h5>
    <div class="sfsi_subscription_form_field">
        <input type="email" name="subscribe_email" placeholder="<?php echo $placeholder; ?>" value="" />
    </div>
    <div class="sfsi_subscription_form_field">
        <input type="submit" name="subscribe" value="<?php echo $button; ?>" />
    </div>
    </form>
    </div>
    </xmp>
    <?php
    die;
}

function sfsi_plus_sanitize_field($value)
{
    return strip_tags(trim($value));
}
//Sanitize color code
if(@!function_exists("sfsi_plus_sanitize_hex_color"))
{
    function sfsi_plus_sanitize_hex_color( $color )
    {
        if ( '' === $color )
            return '';
     
        // 3 or 6 hex digits, or the empty string.
        if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
            return $color;
    }
}

add_action('wp_ajax_plus_update_disable_usm_ogtags_updater5','sfsi_plus_update_disable_usm_ogtags_updater5');        
function sfsi_plus_update_disable_usm_ogtags_updater5(){

    if(isset($_POST['sfsi_plus_disable_usm_og_meta_tags'])){
        $option5 =  unserialize(get_option('sfsi_premium_section5_options',false));
        $option5['sfsi_plus_disable_usm_og_meta_tags'] = $_POST['sfsi_plus_disable_usm_og_meta_tags'];
        update_option('sfsi_premium_section5_options', serialize($option5));
        echo _e('Settings updated',SFSI_PLUS_DOMAIN);
    }
    else{
        echo _e('Failed to update settings',SFSI_PLUS_DOMAIN);;
    }
    wp_die();   
}
?>
