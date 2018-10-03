<?php
function DISPLAY_PREMIUM_RECTANGLE_ICONS(){

	if(false!= License_Manager::validate_license()){

		$socialObj    = new sfsi_plus_SocialHelper();
		$postid       = $socialObj->sfsi_get_the_ID();

		$icons = '';

		if($postid) {

			$sfsi_section5 =  unserialize(get_option('sfsi_premium_section5_options',false));
			$sfsi_section8 =  unserialize(get_option('sfsi_premium_section8_options',false));

			$permalink = $socialObj->sfsi_get_custom_share_link($postid);
			$title     = get_the_title($postid);

		////////// ------------------------ Get all settings for rectangle icons STARTS ------------------------------------------//// 

			$sfsiLikeWith = "45px;";
		    
		    /* check for counter display */
			if($sfsi_section8['sfsi_plus_icons_DisplayCounts']=="yes")
			{
				$show_count   = 1;
				$sfsiLikeWith = "75px;";
			}   
			else
			{
				$show_count  = 0;
			} 
			
			$float		 =  "left";
			$show_count  =  0;
			$style_parent= 'text-align:'.$float.';';
			$style 		 = 'float:'.$float.';';

			$icons="<div class='sfsi_plus_rectangle_icons_shortcode_container sfsi_plus_Sicons ".$float."' style='".$style.$style_parent."'>";

			////////// ------------------------ Get all settings for rectangle icons CLOSES ------------------------------------------////
			
			$txt 	  =(isset($sfsi_section8['sfsi_plus_textBefor_icons']))? $sfsi_section8['sfsi_plus_textBefor_icons'] : 'Please follow and like us:' ;
			$fontSize =(isset($sfsi_section8['sfsi_plus_textBefor_icons_font_size']) && $sfsi_section8['sfsi_plus_textBefor_icons_font_size']!=0)? $sfsi_section8['sfsi_plus_textBefor_icons_font_size'] : "inherit";

			$fontFamily =(isset($sfsi_section8['sfsi_plus_textBefor_icons_font']))? $sfsi_section8['sfsi_plus_textBefor_icons_font'] : "inherit";
			$fontColor =(isset($sfsi_section8['sfsi_plus_textBefor_icons_fontcolor']))? $sfsi_section8['sfsi_plus_textBefor_icons_fontcolor'] : "#000000";
			
				if($show_count){$sfsiLikeWithsub = "93px";}else{$sfsiLikeWithsub = "64px";}
				if(!isset($sfsiLikeWithsub)){$sfsiLikeWithsub = $sfsiLikeWith;}
				if(isset($sfsi_section8['sfsi_plus_rectsub'])&&('yes'===$sfsi_section8['sfsi_plus_rectsub']) ){ 
					$icons.="<div class='sf_subscrbe' style='display: inline-block;vertical-align: middle;width: auto;'>".sfsi_plus_Subscribelike($permalink,$show_count)."</div>";
				}
				if($show_count){}else{$sfsiLikeWithfb = "48px";}
				if(!isset($sfsiLikeWithfb)){$sfsiLikeWithfb = $sfsiLikeWith;}
				if($sfsi_section8['sfsi_plus_rectfbshare'] == 'yes' || $sfsi_section8['sfsi_plus_rectfb'] == 'yes'){ 
			        if($sfsi_section5['sfsi_plus_Facebook_linking'] == "facebookcustomurl")
			        {
			        	$userDefineLink = ($sfsi_section5['sfsi_plus_facebook_linkingcustom_url']);
			        	$icons.="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".sfsi_plus_FBlike($userDefineLink,$show_count)."</div>";
			        }
			        else
			        {
						$icons.="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".sfsi_plus_FBlike($permalink,$show_count)."</div>";
					}
				}
				if($show_count){$sfsiLikeWithtwtr = "77px";}else{$sfsiLikeWithtwtr = "56px";}
				if(!isset($sfsiLikeWithtwtr)){$sfsiLikeWithtwtr = $sfsiLikeWith;}
				if(isset($sfsi_section8['sfsi_plus_recttwtr'])&&('yes'===$sfsi_section8['sfsi_plus_recttwtr']) ){ 
					$icons.="<div class='sf_twiter' style='display: inline-block;vertical-align: middle;width: auto;'>".sfsi_plus_twitterlike($permalink,$show_count)."</div>";	
				}
				if($show_count){$sfsiLikeWithpinit = "100px";}else{$sfsiLikeWithpinit = "auto";}
				if(isset($sfsi_section8['sfsi_plus_rectpinit'])&&('yes'===$sfsi_section8['sfsi_plus_rectpinit']) ){
			 		$icons.="<div class='sf_pinit' style='display: inline-block;text-align:left;vertical-align: middle;width: ".$sfsiLikeWithpinit.";'>".sfsi_plus_pinitpinterest($permalink,$show_count)."</div>";
			 	}
				if($show_count){$sfsiLikeWithlinkedin = "100px";}else{$sfsiLikeWithlinkedin = "auto";}
				if(isset($sfsi_section8['sfsi_plus_rectlinkedin'])&&('yes'===$sfsi_section8['sfsi_plus_rectlinkedin']) ){
					$icons.="<div class='sf_linkedin' style='display: inline-block;vertical-align: middle;text-align:left;width: ".$sfsiLikeWithlinkedin."'>".sfsi_LinkedInShare($permalink,$show_count)."</div>";
				}
				if($show_count){$sfsiLikeWithreddit = "auto";}else{$sfsiLikeWithreddit = "auto";}
				if(isset($sfsi_section8['sfsi_plus_rectreddit'])&&('yes'===$sfsi_section8['sfsi_plus_rectreddit']) ){ 
					$icons.="<div class='sf_reddit' style='display: inline-block;vertical-align: middle;text-align:left;width: ".$sfsiLikeWithreddit."'>".sfsi_redditShareButton($permalink)."</div>";
				}
				if($show_count){$sfsiLikeWithgp = "auto";}else{$sfsiLikeWithgp = "auto";}
				if(isset($sfsi_section8['sfsi_plus_rectgp'])&&('yes'===$sfsi_section8['sfsi_plus_rectgp']) ){ 
					$icons.="<div class='sf_google' style='display: inline-block;vertical-align: middle;text-align:left;width: ".$sfsiLikeWithgp."'>".sfsi_plus_googlePlus($permalink,$show_count)."</div>";
				}
				
				if($show_count){$sfsiLikeWithpingogl = "63px";}else{$sfsiLikeWithpingogl = "auto";}

			$icons.="</div>";		
		}

			
			if (wp_is_mobile())
			{
				if(isset($sfsi_section8['sfsi_plus_rectangle_icons_shortcode_show_on_mobile']) && $sfsi_section8['sfsi_plus_rectangle_icons_shortcode_show_on_mobile'] == 'yes')
				{
					return $icons;
				}
			}
			else
			{
				if(isset($sfsi_section8['sfsi_plus_rectangle_icons_shortcode_show_on_desktop']) && $sfsi_section8['sfsi_plus_rectangle_icons_shortcode_show_on_desktop'] == 'yes')
				{
					return $icons;
				}
			}
		return $icons;
	}
}
add_shortcode('DISPLAY_PREMIUM_RECTANGLE_ICONS','DISPLAY_PREMIUM_RECTANGLE_ICONS');


function DISPLAY_ULTIMATE_PLUS($args = null, $content = null)
{
	if(sfsi_plus_shall_show_icons())
	{
		$instance = array("showf" => 1, "title" => '');
		
		$sfsi_premium_section8_options = unserialize(get_option("sfsi_premium_section8_options"));

		$sfsi_plus_place_item_manually = (isset($sfsi_premium_section8_options['sfsi_plus_place_item_manually'])) ? $sfsi_premium_section8_options['sfsi_plus_place_item_manually']: "no";

		if($sfsi_plus_place_item_manually == "yes")
		{
			$return = '';
			if(!isset($before_widget)): $before_widget =''; endif;
			if(!isset($after_widget)): $after_widget =''; endif;
			
			/*Our variables from the widget settings. */
			$title = apply_filters('widget_title', $instance['title'] );
			$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;
			global $is_floter;	      
			$return.= $before_widget;
				/* Display the widget title */
				if ( $title ) $return .= $before_title . $title . $after_title;
				$return .= '<div class="sfsi_plus_widget sfsi_plus_shortcode_container">';
					$return .= '<div id="sfsi_plus_wDiv"></div>';
					
					/* Link the main icons function */
					if (wp_is_mobile())
					{
						if(isset($sfsi_premium_section8_options['sfsi_plus_shortcode_show_on_mobile']) && $sfsi_premium_section8_options['sfsi_plus_shortcode_show_on_mobile'] == 'yes')
						{
							$return .= sfsi_plus_check_mobile_visiblity(0);
						}
					}
					else
					{
						if(isset($sfsi_premium_section8_options['sfsi_plus_shortcode_show_on_desktop']) && $sfsi_premium_section8_options['sfsi_plus_shortcode_show_on_desktop'] == 'yes')
						{
							$return .= sfsi_plus_check_visiblity(0);
						}
					}
					
					$return .= '<div style="clear: both;"></div>';
				$return .= '</div>';
			$return .= $after_widget;
			return $return;
		}
		else
		{
			return __('Kindly go to setting page and check the option "Place them manually"', SFSI_PLUS_DOMAIN);
		}
	}
}
add_shortcode("DISPLAY_ULTIMATE_PLUS", "DISPLAY_ULTIMATE_PLUS");
