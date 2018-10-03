<?php
/*
Plugin Name: USM Premium
Plugin URI: https://www.ultimatelysocial.com
Description: The best social media plugin on the market. Allows you to add social media & share icons to your blog (esp. Facebook, Twitter, Email, RSS, Pinterest, Instagram, Google+, LinkedIn, Share-button). It offers a wide range of design options and other features. 
Author: UltimatelySocial
Text Domain: usm-premium-icons
Domain Path: /languages
Author URI: https://www.ultimatelysocial.com
Version: 9.5
License: GPLv2
*/

//************************************** Setting error reporting STARTS ****************************************//
function sfsi_plus_error_reporting(){

	$option5 = unserialize(get_option('sfsi_premium_section5_options',false));

	if(isset($option5['sfsi_plus_icons_suppress_errors']) 

		&& !empty($option5['sfsi_plus_icons_suppress_errors'])

		&& "yes" == $option5['sfsi_plus_icons_suppress_errors']){
		
		error_reporting(0);
		@ini_set('display_errors', 0);

	}
}
//************************************** Setting error reporting CLOSES ****************************************//

sfsi_plus_error_reporting();

global $wpdb;

define('SFSI_PLUS_DOCROOT',    dirname(__FILE__));

$scheme = (is_ssl() || (stripos(get_option('siteurl'), 'https://') === 0) || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && 'https' == $_SERVER['HTTP_X_FORWARDED_PROTO']) ) ? "https" : "http";

$plugurl = ("https" === $scheme) ? str_replace('http://', 'https://', plugin_dir_url(__FILE__)) : plugin_dir_url(__FILE__);

define('SFSI_PLUS_PLUGURL',    $plugurl);
define('SFSI_PLUS_WEBROOT',    str_replace(getcwd(), home_url(), dirname(__FILE__)));
define('SFSI_PLUS_PLUGINFILE', plugin_basename( __FILE__ ));
define('SFSI_PLUS_DOMAIN',	   'usm-premium-icons');
define('SFSI_PLUS_LICENSING',  SFSI_PLUS_DOCROOT.'/libs/controllers/admin/licensing/');

define('ULTIMATELYSOCIAL_LICENSING',"ultimate");
define('ULTIMATELYSOCIAL_API_URL',"https://www.ultimatelysocial.com");
define('ULTIMATELYSOCIAL_PRODUCT',"USM Premium Plugin");

define('SELLCODES_LICENSING',"sellcodes_usm");
define('SELLCODES_API_URL',"https://api.sellcodes.com/v1/licenses");
define('SELLCODES_PRODUCT',"XdHlrQnc");

define('SITEURL',home_url());
define('PLUGIN_CURRENT_VERSION',"9.5");
define('PLUGIN_ADMIN_SETTING_PAGE','sfsi-license');


/* load all files  */
include(SFSI_PLUS_DOCROOT.'/libs/controllers/sfsi_wordpresshelper.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/sfsi_include_exclude_rules.php');
include(SFSI_PLUS_DOCROOT.'/libs/sfsi_Init_JqueryCss.php');

include(SFSI_PLUS_DOCROOT.'/libs/controllers/class.sfsiCumulativeCount.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/class.sfsiJobQueue.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/socialHelper/facebook.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/sfsi_socialhelper.php');

include(SFSI_PLUS_DOCROOT.'/libs/sfsi_install_uninstall.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/admin/sfsi_buttons_controller.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/admin/sfsi_iconsUpload_contoller.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/admin/sfsi_custom_social_sharing_data.php');

include(SFSI_PLUS_DOCROOT.'/libs/iconsfactory/iconsFactory.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/sfsi_css_settings.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/sfsi_notices.php');
include(SFSI_PLUS_DOCROOT.'/libs/sfsi_newsletterSubscription.php');
include(SFSI_PLUS_DOCROOT.'/libs/sfsi_urlShortner.php');

include(SFSI_PLUS_DOCROOT.'/libs/controllers/front/iconplacements/sfsi_widget.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/front/iconplacements/sfsi_floater_icons.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/front/iconplacements/sfsiocns_OnPosts.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/front/iconplacements/sfsi_shortcodes.php');

include(SFSI_PLUS_DOCROOT.'/libs/controllers/front/iconplacements/sfsi_frontpopUp.php');
include(SFSI_PLUS_DOCROOT.'/libs/controllers/front/iconplacements/sfsi_plus_subscribe_widget.php');

include(SFSI_PLUS_DOCROOT.'/libs/controllers/sfsi_metatags.php');

/* plugin install and uninstall hooks */ 
register_activation_hook(__FILE__, 'sfsi_premium_activate_plugin' );
register_deactivation_hook(__FILE__, 'sfsi_plus_deactivate_plugin');
register_uninstall_hook(__FILE__, 'sfsi_plus_Unistall_plugin');

/*Plugin version setup*/
$oldVersion = get_option('sfsi_premium_pluginVersion',false);

if(false == $oldVersion || sfsi_premium_version_compare($oldVersion, PLUGIN_CURRENT_VERSION, '<')){

	add_action("init", "sfsi_plus_update_plugin");
}

include(SFSI_PLUS_LICENSING.'sfsi_licensing_setup.php');

//Get verification code
if(is_admin())
{	
	$code 		= sanitize_text_field(get_option('sfsi_premium_verificatiom_code'));
	$feed_id 	= sanitize_text_field(get_option('sfsi_premium_feed_id'));
	
	if(empty($code) && !empty($feed_id))
	{
		add_action("init", "sfsi_plus_getverification_code");
	}
}

function sfsi_plus_getverification_code()
{
	$feed_id = sanitize_text_field(get_option('sfsi_premium_feed_id'));
	$curl = curl_init();  
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/wordpress/getVerifiedCode_plugin',
        CURLOPT_USERAGENT => 'sf get verification',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            'feed_id' => $feed_id
        )
    ));
    
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	$resp = json_decode($resp);
	update_option('sfsi_premium_verificatiom_code', $resp->code);
	curl_close($curl);
}

function sfsi_get_before_posts_icons(){

	$icons_before  = '';

	$socialObj    = new sfsi_plus_SocialHelper();
	$postid       = $socialObj->sfsi_get_the_ID();
		
	if($postid){

		$sfsi_section8 =  unserialize(get_option('sfsi_premium_section8_options',false));
		$sfsi_section5 =  unserialize(get_option('sfsi_premium_section5_options',false));

		$lineheight = $sfsi_section8['sfsi_plus_post_icons_size'];
		$lineheight = sfsi_plus_getlinhght($lineheight);

		$sfsi_plus_display_button_type = $sfsi_section8['sfsi_plus_display_button_type'];
		$sfsi_plus_show_item_onposts   = $sfsi_section8['sfsi_plus_show_item_onposts'];

		$post         = get_post($postid);
		$permalink    = get_permalink($postid);
		$post_title   = $post->post_title;
		$sfsiLikeWith = "45px;";

			if($sfsi_section8['sfsi_plus_icons_DisplayCounts']=="yes")
			{
				$show_count=1;
				$sfsiLikeWith="75px;";
			}   
			else
			{
				$show_count=0;
			} 
			
			//checking for standard icons
			if(!isset($sfsi_section8['sfsi_plus_rectsub']))
			{
				$sfsi_section8['sfsi_plus_rectsub'] = 'no';
			}
			if(!isset($sfsi_section8['sfsi_plus_rectfb']))
			{
				$sfsi_section8['sfsi_plus_rectfb'] = 'yes';
			}
			if(!isset($sfsi_section8['sfsi_plus_rectgp']))
			{
				$sfsi_section8['sfsi_plus_rectgp'] = 'yes';
			}
			if(!isset($sfsi_section8['sfsi_plus_rectshr']))
			{
				$sfsi_section8['sfsi_plus_rectshr'] = 'yes';
			}
			if(!isset($sfsi_section8['sfsi_plus_recttwtr']))
			{
				$sfsi_section8['sfsi_plus_recttwtr'] = 'no';
			}
			if(!isset($sfsi_section8['sfsi_plus_rectpinit']))
			{
				$sfsi_section8['sfsi_plus_rectpinit'] = 'no';
			}
			if(!isset($sfsi_section8['sfsi_plus_rectfbshare']))
			{
				$sfsi_section8['sfsi_plus_rectfbshare'] = 'no';
			}
			
			//checking for standard icons
			$txt=(isset($sfsi_section8['sfsi_plus_textBefor_icons']))? $sfsi_section8['sfsi_plus_textBefor_icons'] : "Please follow and like us:" ;
			
			$float = $sfsi_section8['sfsi_plus_icons_alignment'];
			if($float == "center")
			{
				$style_parent= 'text-align: center;';
				$style = 'float:none; display: inline-block;';
			}
			else
			{
				$style_parent= 'text-align:'.$float;
				$style = 'float:'.$float;
			}

			//icon selection
			$icons_before .= "<div class='sfsibeforpstwpr' style='".$style_parent."'>";
				
				$icons_before .= "<div class='sfsi_plus_Sicons ".$float."' style='".$style."'>";
					
					if($sfsi_plus_display_button_type == 'standard_buttons')
					{
							if(
								$sfsi_section8['sfsi_plus_rectsub']		== 'yes' ||
								$sfsi_section8['sfsi_plus_rectfb']		== 'yes' ||
								$sfsi_section8['sfsi_plus_rectgp']		== 'yes' ||
								$sfsi_section8['sfsi_plus_rectshr'] 	== 'yes' ||
								$sfsi_section8['sfsi_plus_recttwtr'] 	== 'yes' ||
								$sfsi_section8['sfsi_plus_rectpinit'] 	== 'yes' ||
								$sfsi_section8['sfsi_plus_rectlinkedin']== 'yes' ||
								$sfsi_section8['sfsi_plus_rectreddit'] 	== 'yes' ||
								$sfsi_section8['sfsi_plus_rectfbshare'] == 'yes' 
							)
							{
								$icons_before .= "<div style='display: inline-block;margin-bottom: 0; margin-left: 0; margin-right: 8px; margin-top: 0; vertical-align: middle;width: auto;'><span>".$txt."</span></div>";
							}
							if($sfsi_section8['sfsi_plus_rectsub'] == 'yes')
							{
								if($show_count){$sfsiLikeWithsub = "93px";}else{$sfsiLikeWithsub = "64px";}
								if(!isset($sfsiLikeWithsub)){$sfsiLikeWithsub = $sfsiLikeWith;}
								$icons_before.="<div class='sf_subscrbe' style='display: inline-block;vertical-align: middle;width: auto;'>".sfsi_plus_Subscribelike($permalink,$show_count)."</div>";
							}

							if($sfsi_section8['sfsi_plus_rectfb'] == 'yes')
							{
								if($show_count){}else{$sfsiLikeWithfb = "48px";}
								if(!isset($sfsiLikeWithfb)){$sfsiLikeWithfb = $sfsiLikeWith;}
						        
						        if($sfsi_section5['sfsi_plus_Facebook_linking'] == "facebookcustomurl")
						        {
						        	$userDefineLink = ($sfsi_section5['sfsi_plus_facebook_linkingcustom_url']);
						        	$icons_before .="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".$socialObj->sfsi_plus_FBlike($userDefineLink,$show_count)."</div>";
						        }
						        else
						        {
									$icons_before .="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".$socialObj->sfsi_plus_FBlike($permalink,$show_count)."</div>";
								}
							}

							if($sfsi_section8['sfsi_plus_rectfbshare'] == 'yes')
							{
								if($show_count){}else{$sfsiLikeWithfb = "48px";}
								$permalink = $socialObj->sfsi_get_custom_share_link('facebook');        	
								$icons_before .="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".$socialObj->sfsiFB_Share($permalink,$show_count)."</div>";
							}

							if($sfsi_section8['sfsi_plus_recttwtr'] == 'yes')
							{
								if($show_count){$sfsiLikeWithtwtr = "77px";}else{$sfsiLikeWithtwtr = "56px";}
								if(!isset($sfsiLikeWithtwtr)){$sfsiLikeWithtwtr = $sfsiLikeWith;}

								$permalink = $socialObj->sfsi_get_custom_share_link('twitter');
								$icons_before.="<div class='sf_twiter' style='display: inline-block;vertical-align: middle;width: auto;'>".$socialObj->sfsi_plus_twitterlike($permalink,$show_count)."</div>";
							}
							if($sfsi_section8['sfsi_plus_rectpinit'] == 'yes')
							{
								if($show_count){$sfsiLikeWithpinit = "100px";}else{$sfsiLikeWithpinit = "auto";}
								$icons_before.="<div class='sf_pinit' style='display: inline-block;vertical-align: middle;text-align:left;width: ".$sfsiLikeWithpinit."'>".sfsi_plus_pinitpinterest($permalink,$show_count)."</div>";
							}
							if($sfsi_section8['sfsi_plus_rectlinkedin'] == 'yes')
							{
								if($show_count){$sfsiLikeWithlinkedin = "100px";}else{$sfsiLikeWithlinkedin = "auto";}
								$icons_before.="<div class='sf_linkedin' style='display: inline-block;vertical-align: middle;text-align:left;width: ".$sfsiLikeWithlinkedin."'>".sfsi_LinkedInShare($permalink,$show_count)."</div>";
							}
							if($sfsi_section8['sfsi_plus_rectreddit'] == 'yes')
							{
								if($show_count){$sfsiLikeWithreddit = "auto";}else{$sfsiLikeWithreddit = "auto";}
								$icons_before.="<div class='sf_reddit' style='display: inline-block;vertical-align: middle;text-align:left;width: ".$sfsiLikeWithreddit."'>".sfsi_redditShareButton($permalink)."</div>";
							}
							if($sfsi_section8['sfsi_plus_rectgp'] == 'yes')
							{
								if($show_count){$sfsiLikeWithpingogl = "63px";}else{$sfsiLikeWithpingogl = "auto";}
								$icons_before .= "<div class='sf_google'  style='display: inline-block;vertical-align: middle;width: ".$sfsiLikeWithpingogl.";'>".sfsi_plus_googlePlus($permalink,$show_count)."</div>";
							}
							if($sfsi_section8['sfsi_plus_rectshr'] == 'yes')
							{
								$icons_before .= "<div class='sf_addthis'  style='display: inline-block;vertical-align: middle;width: auto;margin-top: 6px;'>".sfsi_plus_Addthis_blogpost($show_count, $permalink, $post_title)."</div>";
							}
					}
					else if( sfsi_premium_is_any_standard_icon_selected() )
					{
						$icons_before .= "<div style='float:left;margin:0 0px; line-height:".$lineheight."px'><span>".$txt."</span></div>";
						$icons_before .= sfsi_plus_check_posts_visiblity(0 , "yes");
					}

				$icons_before .= "</div>";

			$icons_before .= "</div>";
	}
	return $icons_before;	
}

function sfsi_get_after_posts_icons(){

	$icons_after   = '';
		
	$socialObj    = new sfsi_plus_SocialHelper();
	$postid       = $socialObj->sfsi_get_the_ID();

	if($postid){

			$sfsi_section8 =  unserialize(get_option('sfsi_premium_section8_options',false));
			$sfsi_section5 =  unserialize(get_option('sfsi_premium_section5_options',false));

			$lineheight = $sfsi_section8['sfsi_plus_post_icons_size'];
			$lineheight = sfsi_plus_getlinhght($lineheight);

			$sfsi_plus_display_button_type = $sfsi_section8['sfsi_plus_display_button_type'];
			$sfsi_plus_show_item_onposts   = $sfsi_section8['sfsi_plus_show_item_onposts'];

			$post         = get_post($postid);
			$permalink    = get_permalink($postid);
			$post_title   = $post->post_title;
			$sfsiLikeWith = "45px;";

			if($sfsi_section8['sfsi_plus_icons_DisplayCounts']=="yes")
			{
				$show_count=1;
				$sfsiLikeWith="75px;";
			}   
			else
			{
				$show_count=0;
			} 
			
			//checking for standard icons
			if(!isset($sfsi_section8['sfsi_plus_rectsub']))
			{
				$sfsi_section8['sfsi_plus_rectsub'] = 'no';
			}
			if(!isset($sfsi_section8['sfsi_plus_rectfb']))
			{
				$sfsi_section8['sfsi_plus_rectfb'] = 'yes';
			}
			if(!isset($sfsi_section8['sfsi_plus_rectgp']))
			{
				$sfsi_section8['sfsi_plus_rectgp'] = 'yes';
			}
			if(!isset($sfsi_section8['sfsi_plus_rectshr']))
			{
				$sfsi_section8['sfsi_plus_rectshr'] = 'yes';
			}
			if(!isset($sfsi_section8['sfsi_plus_recttwtr']))
			{
				$sfsi_section8['sfsi_plus_recttwtr'] = 'no';
			}
			if(!isset($sfsi_section8['sfsi_plus_rectpinit']))
			{
				$sfsi_section8['sfsi_plus_rectpinit'] = 'no';
			}
			if(!isset($sfsi_section8['sfsi_plus_rectfbshare']))
			{
				$sfsi_section8['sfsi_plus_rectfbshare'] = 'no';
			}
			
			//checking for standard icons
			$txt=(isset($sfsi_section8['sfsi_plus_textBefor_icons']))? $sfsi_section8['sfsi_plus_textBefor_icons'] : "Please follow and like us:" ;
			
			$float = $sfsi_section8['sfsi_plus_icons_alignment'];
			if($float == "center")
			{
				$style_parent= 'text-align: center;';
				$style = 'float:none; display: inline-block;';
			}
			else
			{
				$style_parent= 'text-align:'.$float;
				$style = 'float:'.$float;
			}
			
			//icon selection
			$icons_after .= "<div class='sfsiaftrpstwpr' style='".$style_parent."'>";
					
					$icons_after .= "<div class='sfsi_plus_Sicons ".$float."' style='".$style."'>";
						
						if($sfsi_plus_display_button_type == 'standard_buttons')
						{
							if(
								$sfsi_section8['sfsi_plus_rectsub'] 	== 'yes' ||
								$sfsi_section8['sfsi_plus_rectfb'] 		== 'yes' ||
								$sfsi_section8['sfsi_plus_rectgp'] 		== 'yes' ||
								$sfsi_section8['sfsi_plus_rectshr'] 	== 'yes' ||
								$sfsi_section8['sfsi_plus_recttwtr'] 	== 'yes' ||
								$sfsi_section8['sfsi_plus_rectpinit'] 	== 'yes' ||
								$sfsi_section8['sfsi_plus_rectlinkedin']== 'yes' ||
								$sfsi_section8['sfsi_plus_rectreddit'] 	== 'yes' ||
								$sfsi_section8['sfsi_plus_rectfbshare'] == 'yes' 
							)
							{
								$icons_after .= "<div style='display: inline-block;margin-bottom: 0; margin-left: 0; margin-right: 8px; margin-top: 0; vertical-align: middle;width: auto;'><span>".$txt."</span></div>";
							}
							if($sfsi_section8['sfsi_plus_rectsub'] == 'yes')
							{
								if($show_count){$sfsiLikeWithsub = "93px";}else{$sfsiLikeWithsub = "64px";}
								if(!isset($sfsiLikeWithsub)){$sfsiLikeWithsub = $sfsiLikeWith;}
								$icons_after.="<div class='sf_subscrbe' style='display: inline-block;vertical-align: middle; width: auto;'>".sfsi_plus_Subscribelike($permalink,$show_count)."</div>";
							}
							
							if($sfsi_section8['sfsi_plus_rectfb'] == 'yes')
							{
								if($show_count){}else{$sfsiLikeWithfb = "48px";}
								if(!isset($sfsiLikeWithfb)){$sfsiLikeWithfb = $sfsiLikeWith;}
						        
						        if($sfsi_section5['sfsi_plus_Facebook_linking'] == "facebookcustomurl")
						        {
						        	$userDefineLink = ($sfsi_section5['sfsi_plus_facebook_linkingcustom_url']);
						        	$icons_after .="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".$socialObj->sfsi_plus_FBlike($userDefineLink,$show_count)."</div>";
						        }
						        else
						        {
									$icons_after .="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".$socialObj->sfsi_plus_FBlike($permalink,$show_count)."</div>";
								}
							}
							if($sfsi_section8['sfsi_plus_rectfbshare'] == 'yes')
							{
								if($show_count){}else{$sfsiLikeWithfb = "48px";}
								$permalink = $socialObj->sfsi_get_custom_share_link('facebook');        	
								$icons_after .="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".$socialObj->sfsiFB_Share($permalink,$show_count)."</div>";
							}							
							if($sfsi_section8['sfsi_plus_recttwtr'] == 'yes')
							{
								if($show_count){$sfsiLikeWithtwtr = "77px";}else{$sfsiLikeWithtwtr = "56px";}
								if(!isset($sfsiLikeWithtwtr)){$sfsiLikeWithtwtr = $sfsiLikeWith;}

								$permalink = $socialObj->sfsi_get_custom_share_link('twitter');
								$icons_after.="<div class='sf_twiter' style='display: inline-block;vertical-align: middle;width: auto;'>".sfsi_plus_twitterlike($permalink,$show_count)."</div>";
							}
							if($sfsi_section8['sfsi_plus_rectpinit'] == 'yes')
							{
								if($show_count){$sfsiLikeWithpinit = "100px";}else{$sfsiLikeWithpinit = "auto";}
							 	$icons_after.="<div class='sf_pinit' style='display: inline-block;text-align:left;vertical-align: middle;width: ".$sfsiLikeWithpinit."'>".sfsi_plus_pinitpinterest($permalink,$show_count)."</div>";
							}
							if($sfsi_section8['sfsi_plus_rectlinkedin'] == 'yes')
							{
								if($show_count){$sfsiLikeWithlinkedin = "100px";}else{$sfsiLikeWithlinkedin = "auto";}
								$icons_after.="<div class='sf_linkedin' style='display: inline-block;vertical-align: middle;text-align:left;width: ".$sfsiLikeWithlinkedin."'>".sfsi_LinkedInShare($permalink,$show_count)."</div>";
							}
							if($sfsi_section8['sfsi_plus_rectreddit'] == 'yes')
							{
								if($show_count){$sfsiLikeWithreddit = "auto";}else{$sfsiLikeWithreddit = "auto";}
								$icons_after.="<div class='sf_reddit' style='display: inline-block;vertical-align: middle;text-align:left;width: ".$sfsiLikeWithreddit."'>".sfsi_redditShareButton($permalink)."</div>";
							}
							if($sfsi_section8['sfsi_plus_rectgp'] == 'yes')
							{
								if($show_count){$sfsiLikeWithpingogl = "63px";}else{$sfsiLikeWithpingogl = "auto";}
								$icons_after .= "<div class='sf_google' style='display: inline-block;vertical-align: middle;width: ".$sfsiLikeWithpingogl.";'>".sfsi_plus_googlePlus($permalink,$show_count)."</div>";
							}
							if($sfsi_section8['sfsi_plus_rectshr'] == 'yes')
							{
								$icons_after .= "<div class='sf_addthis'  style='display: inline-block;vertical-align: middle;width: auto;margin-top: 6px;'>".sfsi_plus_Addthis_blogpost($show_count, $permalink, $post_title)."</div>";
							}
						}
						else if(sfsi_premium_is_any_standard_icon_selected() )
						{
							$icons_after .= "<div style='float:left;margin:0 0px; line-height:".$lineheight."px'><span>".$txt."</span></div>";
							$icons_after .= sfsi_plus_check_posts_visiblity(0 , "yes");
						}
					$icons_after .= "</div>";
			$icons_after .= "</div>";
	}
	return $icons_after;		
}

//functionality for before and after single posts
add_filter('the_content','sfsi_plus_beforaftereposts');
function sfsi_plus_beforaftereposts($content)
{
	if(false!= License_Manager::validate_license()){

		$org_content  = $content;
		$icons_before = '';
		$icons_after  = '';

		global $post;
		$current_post_type = isset($post->post_type) && !empty($post->post_type) ? $post->post_type : false;

		$option8 =  unserialize(get_option('sfsi_premium_section8_options',false));

		$select  =  (isset($option8['sfsi_plus_choose_post_types'])) ? unserialize($option8['sfsi_plus_choose_post_types']) :array(); 
		$select  =  (is_array($select))? $select:array($select); 

		if(!in_array("post", $select)){
			array_push($select,"post");
		}
				
		if(!empty($select)){
			$cond = is_single() && in_array($current_post_type,$select);
		}

		if($cond)
		{
			$option8	=  unserialize(get_option('sfsi_premium_section8_options',false));
			$lineheight = $option8['sfsi_plus_post_icons_size'];
			$lineheight = sfsi_plus_getlinhght($lineheight);
			$sfsi_plus_display_button_type = $option8['sfsi_plus_display_button_type'];
			$txt 		= (isset($option8['sfsi_plus_textBefor_icons']))? $option8['sfsi_plus_textBefor_icons'] : "Please follow and like us:" ;
			$float 		= $option8['sfsi_plus_icons_alignment'];
			
			if($float == "center")
			{
				$style_parent= 'text-align: center;';
				$style = 'float:none; display: inline-block;';
			}
			else
			{
				$style_parent = '';
				$style 		  = 'float:'.$float;
			}
			
			if($option8['sfsi_plus_display_before_posts'] == "yes" && $option8['sfsi_plus_show_item_onposts'] == "yes")
			{
				$icons_before .= '<div class="sfsibeforpstwpr" style="'.$style_parent.'">';

				if($sfsi_plus_display_button_type == 'standard_buttons')
				{
					$icons_before .= sfsi_plus_social_buttons_below($content = null);
				}
				else if( sfsi_premium_is_any_standard_icon_selected() )
				{
					$icons_before .= "<div class='sfsi_plus_Sicons' style='".$style."'>";
					$icons_before .= "<div style='float:left;margin:0 0px; line-height:".$lineheight."px'><span>".$txt."</span></div>";
					$icons_before .= sfsi_plus_check_posts_visiblity(0 , "yes");
					$icons_before .= "</div>";
				}

				$icons_before .= '</div>';
			}

			if($option8['sfsi_plus_display_after_posts'] == "yes" && $option8['sfsi_plus_show_item_onposts'] == "yes")
			{
				$icons_after .= '<div class="sfsiaftrpstwpr"  style="'.$style_parent.'">';
				
				if($sfsi_plus_display_button_type == 'standard_buttons')
				{
					$icons_after .= sfsi_plus_social_buttons_below($content = null);
				}
				else if( sfsi_premium_is_any_standard_icon_selected() )

				{
					$icons_after .= "<div class='sfsi_plus_Sicons' style='".$style."'>";
						$icons_after .= "<div style='float:left;margin:0 0px; line-height:".$lineheight."px'><span>".$txt."</span></div>";
						$icons_after .= sfsi_plus_check_posts_visiblity(0 , "yes");
					$icons_after .= "</div>";
				}
				$icons_after .= '</div>';
			}

			if (wp_is_mobile())
			{
				if(isset($option8['sfsi_plus_beforeafterposts_show_on_mobile']) && $option8['sfsi_plus_beforeafterposts_show_on_mobile'] == 'yes'){
					$content = $icons_before.$org_content.$icons_after;
				}
				else{
					$content = $org_content;
				}
			}
			else{
				if(isset($option8['sfsi_plus_beforeafterposts_show_on_desktop']) && $option8['sfsi_plus_beforeafterposts_show_on_desktop'] == 'yes'){
					$content = $icons_before.$org_content.$icons_after;	
				}
				else{
					$content = $org_content;
				}									
			}		
		}		
	}
	return $content;	
}

add_filter( 'get_the_excerpt', 'sfsi_plus_excerpt_filter' );

function sfsi_plus_excerpt_filter( $excerpt ){
  if( !defined( 'USED_EXCERPT' ) ){
    define( 'USED_EXCERPT', "true");
  }
  return $excerpt;
}

//showing before and after blog posts
add_filter( 'the_excerpt', 'sfsi_plus_beforeafterblogposts',1);
add_filter( 'the_content', 'sfsi_plus_content_beforeafterblogposts',1);

function sfsi_plus_content_beforeafterblogposts($content){
	
	if( !defined('USED_EXCERPT') || is_archive()){
		return sfsi_plus_beforeafterblogposts($content);
	}
	return $content;
}

function sfsi_plus_beforeafterblogposts( $content )
{
	if(false != License_Manager::validate_license()){	

		$org_content   = $content;	
		$icons_before  = '';
		$icons_after   = '';

		$sfsi_section8 =  unserialize(get_option('sfsi_premium_section8_options',false));	
		$select  	   =  (isset($sfsi_section8['sfsi_plus_choose_post_types'])) ? unserialize($sfsi_section8['sfsi_plus_choose_post_types']) :array(); 
		$select  	   =  (is_array($select))? $select:array($select); 

		if(!in_array("post", $select)){
			array_push($select,"post");
		}

		// Check if it is Category page for selected taxonomies
		if(is_archive()){

			if(isset($sfsi_section8['sfsi_plus_show_item_onposts']) && $sfsi_section8['sfsi_plus_show_item_onposts'] == "yes"){

				$arrSfsi_plus_taxonomies_for_icons = (isset($sfsi_section8['sfsi_plus_taxonomies_for_icons'])) ? unserialize($sfsi_section8['sfsi_plus_taxonomies_for_icons']) : array();


				$arrTax = is_array($arrSfsi_plus_taxonomies_for_icons) ? array_filter($arrSfsi_plus_taxonomies_for_icons) : array();

				if(!empty($arrTax)){
					
					$termData = get_queried_object();
					
					if(in_array($termData->taxonomy, $arrTax)) {
						
						if($sfsi_section8['sfsi_plus_display_before_blogposts'] == "yes"){
							$icons_before  = sfsi_get_before_posts_icons();
						}
						if($sfsi_section8['sfsi_plus_display_after_blogposts'] == "yes"){
							$icons_after   = sfsi_get_after_posts_icons();
						}												
					}
				}
			}
		}
		// Check if it is default index page or posts page or custom loop of any post type in page
		else if(false != sfsi_premium_is_blog_page() || (false === is_single() && in_array(get_post_type(),$select) ) ){

			if(isset($sfsi_section8['sfsi_plus_show_item_onposts']) && $sfsi_section8['sfsi_plus_show_item_onposts'] == "yes"){
				
				if($sfsi_section8['sfsi_plus_display_before_blogposts'] == "yes"){
					$icons_before  = sfsi_get_before_posts_icons();
				}

				if($sfsi_section8['sfsi_plus_display_after_blogposts'] == "yes"){
					$icons_after  = sfsi_get_after_posts_icons();
				}										
			}
		}		

		if (wp_is_mobile())
		{
			if(isset($sfsi_section8['sfsi_plus_beforeafterposts_show_on_mobile']) && $sfsi_section8['sfsi_plus_beforeafterposts_show_on_mobile'] == 'yes'){
				$content = $icons_before.$org_content.$icons_after;
			}
			else{
				$content = $org_content;
			}		
		}
		else{
			if(isset($sfsi_section8['sfsi_plus_beforeafterposts_show_on_desktop']) && $sfsi_section8['sfsi_plus_beforeafterposts_show_on_desktop'] == 'yes'){
				$content = $icons_before.$org_content.$icons_after;	
			}
			else{
				$content = $org_content;
			}		
		}
	}	
	return $content;			
}

//showing icons after blog pagespost
add_filter( 'the_excerpt', 'sfsi_plus_afterepages',1);
add_filter( 'the_content', 'sfsi_plus_afterepages',1);
function sfsi_plus_afterepages( $content )
{
	if(false!= License_Manager::validate_license()){

		$org_content = $content;
		$icons_before = '';
		$icons_after = '';

		if("page" === get_post_type())
		{    
			$option8    =  unserialize(get_option('sfsi_premium_section8_options',false));
			$lineheight = $option8['sfsi_plus_post_icons_size'];
			$lineheight = sfsi_plus_getlinhght($lineheight);
			$sfsi_plus_display_button_type = $option8['sfsi_plus_display_button_type'];
			$txt 		= (isset($option8['sfsi_plus_textBefor_icons']))? $option8['sfsi_plus_textBefor_icons'] : "Please follow and like us:" ;
			$float 		= $option8['sfsi_plus_icons_alignment'];

			if($float == "center")
			{
				$style_parent = 'text-align: center;';
				$style        = 'float:none; display: inline-block;';
			}
			else
			{
				$style_parent = '';
				$style 		  = 'float:'.$float;
			}
			
			if($option8['sfsi_plus_display_after_pageposts'] == "yes" && $option8['sfsi_plus_show_item_onposts'] == "yes")
			{
				/*$icons_after .= '</br>';*/
				$icons_after .= '<div class="sfsiaftrpstwpr"  style="'.$style_parent.'">';
				if($sfsi_plus_display_button_type == 'standard_buttons')
				{
					$icons_after .= sfsi_plus_social_buttons_below($content = null);
				}
				else if(sfsi_premium_is_any_standard_icon_selected())
				{
					$icons_after .= "<div class='sfsi_plus_Sicons' style='".$style."'>";
						$icons_after .= "<div style='float:left;margin:0 0px; line-height:".$lineheight."px'><span>".$txt."</span></div>";
						$icons_after .= sfsi_plus_check_posts_visiblity(0 , "yes");
					$icons_after .= "</div>";
				}
				$icons_after .= '</div>';
			}
			if($option8['sfsi_plus_display_before_pageposts'] == "yes" && $option8['sfsi_plus_show_item_onposts'] == "yes")
			{
				/*$icons_after .= '</br>';*/
				$icons_before .= '<div class="sfsiaftrpstwpr"  style="'.$style_parent.'">';
				if($sfsi_plus_display_button_type == 'standard_buttons')
				{
					$icons_before .= sfsi_plus_social_buttons_below($content = null);
				}
				else if(sfsi_premium_is_any_standard_icon_selected())
								{
					$icons_before .= "<div class='sfsi_plus_Sicons' style='".$style."'>";
						$icons_before .= "<div style='float:left;margin:0 0px; line-height:".$lineheight."px'><span>".$txt."</span></div>";
						$icons_before .= sfsi_plus_check_posts_visiblity(0 , "yes");
					$icons_before .= "</div>";
				}
				$icons_before .= '</div>';
			}
		}

		if (wp_is_mobile())
		{
			if(isset($option8['sfsi_plus_beforeafterposts_show_on_mobile']) && $option8['sfsi_plus_beforeafterposts_show_on_mobile'] == 'yes'){
				$content = $icons_before.$org_content.$icons_after;
			}
			else{
				$content = $org_content;
			}				
		}
		else{
			if(isset($option8['sfsi_plus_beforeafterposts_show_on_desktop']) && $option8['sfsi_plus_beforeafterposts_show_on_desktop'] == 'yes'){
				$content = $icons_before.$org_content.$icons_after;
			}
			else{
				$content = $org_content;
			}								
		}	
	}
	return $content;	
}

add_action('plugins_loaded', 'sfsi_plus_load_domain',1);
function sfsi_plus_load_domain() 
{
	$plugin_dir = basename(dirname(__FILE__)).'/languages';
	load_plugin_textdomain( 'ultimate-social-media-plus', false, $plugin_dir );
}


/* plugin action link*/
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'sfsi_plus_action_links', -10 );
function sfsi_plus_action_links ( $mylinks )
{
	$mylinks[] = '<a href="'.admin_url("/admin.php?page=sfsi-plus-options").'">Settings</a>';
	return $mylinks;
}

/* redirect setting page hook */

add_action('admin_init', 'sfsi_plus_plugin_redirect');
function sfsi_plus_plugin_redirect()
{
    if (get_option('sfsi_premium_plugin_do_activation_redirect', false))
    {
        delete_option('sfsi_premium_plugin_do_activation_redirect');
        wp_redirect(admin_url('admin.php?page=sfsi-plus-options'));
    }
}

function sfsi_add_css_for_menu(){ ?>
	
	<style type="text/css">
		#adminmenu #toplevel_page_sfsi-plus-options div.wp-menu-name {
		    padding: 14px 0;
		}
		a.wp-not-current-submenu.menu-top.toplevel_page_sfsi-plus-options.menu-top-first {
		    padding: 0 0 0 38px;
		}
	</style>

<?php }

add_action('admin_head','sfsi_add_css_for_menu');

function sfsi_premium_setup_jobqueue(){

 	// don't run on ajax calls
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        return;
    }

	// only run on front-end
    if( is_admin() ) {
        return;
    }

	$sfsi_job_queue = sfsiJobQueue::getInstance();

	$jobQueueInstalled = get_option('sfsi_premium_job_queue_installed',false);

	if(false != $jobQueueInstalled){
		$sfsi_job_queue->remove_unfinished_jobs(129600);	
	}	
}

sfsi_premium_setup_jobqueue();

function sfsi_premium_wp_loaded_fbcount_api_call(){
 	
 	// don't run on ajax calls
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        return;
    }

	// only run on front-end
    if( is_admin() ) {
        return;
    }

	if(empty($GLOBALS['socialhelper']) && class_exists('sfsi_plus_SocialHelper')){
		 $GLOBALS['socialhelper'] = new sfsi_plus_SocialHelper();
	}
	
	global $socialhelper;

	$fbSocialHelper = new sfsiFacebookSocialHelper();

	$fbSocialHelper->sfsi_fbcount_inbatch_api();
}

add_action('wp_loaded', 'sfsi_premium_wp_loaded_fbcount_api_call');