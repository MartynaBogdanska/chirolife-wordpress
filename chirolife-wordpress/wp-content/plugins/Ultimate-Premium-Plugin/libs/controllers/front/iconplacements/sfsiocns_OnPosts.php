<?php
/* add fb like add this and google share to end of every post */
function sfsi_plus_social_buttons_below($content)
{
	global $post;
	$socialObj    = new sfsi_plus_SocialHelper();	
	$sfsi_section6=  unserialize(get_option('sfsi_premium_section6_options',false));
	$sfsi_section5=  unserialize(get_option('sfsi_premium_section5_options',false));
		 
	//new options that are added on the third questions
	//so in this function we are replacing all the past options 
	//that were saved under option6 by new settings saved under option8 
	$sfsi_section8=  unserialize(get_option('sfsi_premium_section8_options',false));
	$sfsi_plus_show_item_onposts = $sfsi_section8['sfsi_plus_show_item_onposts'];
	//new options that are added on the third questions
	
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
	if(!isset($sfsi_section8['sfsi_plus_rectlinkedin']))
	{
		$sfsi_section8['sfsi_plus_rectlinkedin'] = 'no';
	}
	if(!isset($sfsi_section8['sfsi_plus_rectreddit']))
	{
		$sfsi_section8['sfsi_plus_rectreddit'] = 'no';
	}
	//checking for standard icons
		
	$permalink 	  = $socialObj->sfsi_get_custom_share_link($post->ID);
	$title 		  = get_the_title();
	$sfsiLikeWith ="45px;";
    
    /* check for counter display */
	if($sfsi_section8['sfsi_plus_icons_DisplayCounts']=="yes")
	{
		$show_count=1;
		$sfsiLikeWith="75px;";
	}   
	else
	{
		$show_count=0;
	} 
        
	$txt 	=(isset($sfsi_section8['sfsi_plus_textBefor_icons']))? $sfsi_section8['sfsi_plus_textBefor_icons'] : "Please follow and like us:" ;
	$float	= $sfsi_section8['sfsi_plus_icons_alignment'];
	if($float == "center")
	{
		$style_parent= 'text-align: center;';
		$style = 'float:none; display: inline-block;';
	}
	else
	{
		$style_parent= 'text-align:'.$float.';';
		$style = 'float:'.$float.';';
	}

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
		$icons="<div class='sfsi_plus_Sicons ".$float."' style='".$style.$style_parent."'>
			<div style='display: inline-block;margin-bottom: 0; margin-left: 0; margin-right: 8px; margin-top: 0; vertical-align: middle;width: auto;'>
				<span>".$txt."</span>
			</div>";
	}
	if($sfsi_section8['sfsi_plus_rectsub'] == 'yes')
	{
		if($show_count){$sfsiLikeWithsub = "93px";}else{$sfsiLikeWithsub = "64px";}
		if(!isset($sfsiLikeWithsub)){$sfsiLikeWithsub = $sfsiLikeWith;}

		$icons.="<div class='sf_subscrbe' style='display: inline-block;vertical-align: middle;width: auto;'>".sfsi_plus_Subscribelike($permalink,$show_count)."</div>";
	}
	if($sfsi_section8['sfsi_plus_rectfb'] == 'yes')
	{
		if($show_count){}else{$sfsiLikeWithfb = "48px";}
		if(!isset($sfsiLikeWithfb)){$sfsiLikeWithfb = $sfsiLikeWith;}
        
        if($sfsi_section5['sfsi_plus_Facebook_linking'] == "facebookcustomurl")
        {
        	$userDefineLink = ($sfsi_section5['sfsi_plus_facebook_linkingcustom_url']);
        	$icons.="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".$socialObj->sfsi_plus_FBlike($userDefineLink,$show_count)."</div>";
        }
        else
        {
			$icons.="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".$socialObj->sfsi_plus_FBlike($permalink,$show_count)."</div>";
		}
	}
	if($sfsi_section8['sfsi_plus_rectfbshare'] == 'yes')
	{
		if($show_count){}else{$sfsiLikeWithfb = "48px";}
		$permalink = $socialObj->sfsi_get_custom_share_link('facebook');        	
		$icons.="<div class='sf_fb' style='display: inline-block;vertical-align: middle;width: auto;'>".$socialObj->sfsiFB_Share($permalink,$show_count)."</div>";
	}		
	if($sfsi_section8['sfsi_plus_recttwtr'] == 'yes')
	{
		if($show_count){$sfsiLikeWithtwtr = "77px";}else{$sfsiLikeWithtwtr = "56px";}
		if(!isset($sfsiLikeWithtwtr)){$sfsiLikeWithtwtr = $sfsiLikeWith;}
	
		$permalink = $socialObj->sfsi_get_custom_share_link('twitter');	
		$icons.="<div class='sf_twiter' style='display: inline-block;vertical-align: middle;width: auto;'>".sfsi_plus_twitterlike($permalink,$show_count)."</div>";	
	}
	if($sfsi_section8['sfsi_plus_rectpinit'] == 'yes')
	{
		if($show_count){$sfsiLikeWithpinit = "100px";}else{$sfsiLikeWithpinit = "auto";}
	 	$icons.="<div class='sf_pinit' style='display: inline-block;text-align:left;vertical-align: middle;width: ".$sfsiLikeWithpinit.";'>".sfsi_plus_pinitpinterest($permalink,$show_count)."</div>";
	}
	if($sfsi_section8['sfsi_plus_rectlinkedin'] == 'yes')
	{
		if($show_count){$sfsiLikeWithlinkedin = "100px";}else{$sfsiLikeWithlinkedin = "auto";}
		$icons.="<div class='sf_linkedin' style='display: inline-block;vertical-align: middle;text-align:left;width: ".$sfsiLikeWithlinkedin."'>".sfsi_LinkedInShare($permalink,$show_count)."</div>";
	}
	if($sfsi_section8['sfsi_plus_rectreddit'] == 'yes')
	{
		if($show_count){$sfsiLikeWithreddit = "auto";}else{$sfsiLikeWithreddit = "auto";}
		$icons.="<div class='sf_reddit' style='display: inline-block;vertical-align: middle;text-align:left;width: ".$sfsiLikeWithreddit."'>".sfsi_redditShareButton($permalink)."</div>";
	}
	if($sfsi_section8['sfsi_plus_rectgp'] == 'yes')
	{
		if($show_count){$sfsiLikeWithpingogl = "63px";}else{$sfsiLikeWithpingogl = "auto";}
		$icons.="<div class='sf_google' style='display: inline-block;vertical-align: middle; width:".$sfsiLikeWithpingogl.";'>".sfsi_plus_googlePlus($permalink,$show_count)."</div>";
	}
	if($sfsi_section8['sfsi_plus_rectshr'] == 'yes')
	{
		$icons.="<div class='sf_addthis'  style='display: inline-block;vertical-align: middle;width: auto;margin-top: 6px;'>".sfsi_plus_Addthis($show_count, $permalink, $title)."</div>";
	}
	$icons.="</div>";
    
	if(!is_feed() && !is_home())
	{
		$content =   $content .$icons;
	}
	
	return $content;
}

/*subscribe like*/
function sfsi_plus_Subscribelike($permalink, $show_count)
{
	global $socialObj;
	$socialObj = new sfsi_plus_SocialHelper();
	
	$sfsi_premium_section2_options=  unserialize(get_option('sfsi_premium_section2_options',false));
	$option4 = unserialize(get_option('sfsi_premium_section4_options',false));
	$sfsi_premium_section8_options=  unserialize(get_option('sfsi_premium_section8_options',false));
	$option5 =  unserialize(get_option('sfsi_premium_section5_options',false));
	
	$post_icons     = $option5['sfsi_plus_follow_icons_language'];
	$visit_icon1    = SFSI_PLUS_DOCROOT.'/images/visit_icons/Follow/icon_'.$post_icons.'.png';
	$visit_iconsUrl = SFSI_PLUS_PLUGURL."images/";
		   
	if(file_exists($visit_icon1))
	{
		$visit_icon = $visit_iconsUrl."visit_icons/Follow/icon_".$post_icons.".png";
	}
	else
	{
		$visit_icon = $visit_iconsUrl."follow_subscribe.png";
	}
	
	$url = (isset($sfsi_premium_section2_options['sfsi_plus_email_url'])) ? $sfsi_premium_section2_options['sfsi_plus_email_url'] : 'javascript:void(0);';
	
	if($option4['sfsi_plus_email_countsFrom']=="manual")
	{    
		$counts=$socialObj->format_num($option4['sfsi_plus_email_manualCounts']);
	}
	else
	{
		$counts= $socialObj->SFSI_getFeedSubscriber(sanitize_text_field(get_option('sfsi_premium_feed_id',false)));           
	}
	 
	if($sfsi_premium_section8_options['sfsi_plus_icons_DisplayCounts']=="yes")
	{
	 	$icon = '<a href="'.$url.'" target="_blank"><img src="'.$visit_icon.'" alt="onpost_follow" /></a>
		<span class="bot_no">'.$counts.'</span>';
	}
	else
	{
	 	$icon = '<a href="'.$url.'" target="_blank"><img src="'.$visit_icon.'" alt="onpost_follow" /></a>';
	}
	return $icon;
}
/*subscribe like*/

/*twitter like*/
function sfsi_plus_twitterlike($permalink, $show_count)
{
	global $socialObj;
	$socialObj = new sfsi_plus_SocialHelper();
	$twitter_text = '';
	$sfsi_premium_section5_options = unserialize(get_option('sfsi_premium_section5_options',false));
	$icons_language = $sfsi_premium_section5_options['sfsi_plus_icons_language'];
	
	$postid =  $socialObj->sfsi_get_the_ID();

	if(!empty($postid))
	{
		$twitter_text = $socialObj->sfsi_get_custom_tweet_title();
	}
	return $socialObj->sfsi_twitterSharewithcount($permalink,$twitter_text, $show_count, $icons_language);
}
/*twitter like*/

/* create google+ button */
function sfsi_plus_googlePlus($permalink,$show_count)
{
        $google_html = '<div class="g-plusone" data-href="' . $permalink . '" ';
        if($show_count) {
                $google_html .= 'data-size="large" ';
        } else {
                $google_html .= 'data-size="large" data-annotation="none" ';
        }
        $google_html .= '></div>';
        return $google_html;
}

/* create fb like button */
function sfsi_plus_FBlike($permalink,$show_count)
{
    $send = 'false';
	$width = 180;
	$option8=  unserialize(get_option('sfsi_premium_section8_options',false));
	$fb_like_html = '';

	if($option8['sfsi_plus_rectfbshare'] == 'yes' && $option8['sfsi_plus_rectfb'] == 'yes')
	{
		$fb_like_html .='<div class="fb-like" data-href="'.$permalink.'" data-action="like" data-share="true"';
	}
	else if($option8['sfsi_plus_rectfb'] == 'no' && $option8['sfsi_plus_rectfbshare'] == 'yes')
	{
		$fb_like_html .= '<div class="fb-share-button" data-href="'.$permalink.'" ';
	}
	else
	{
		$fb_like_html .= '<div class="fb-like" data-href="'.$permalink.'" data-action="like" data-share="false"';
	}
	if($show_count==1)
	{ 
		$fb_like_html .= ' data-layout="button_count"';
	}
	else
	{
		$fb_like_html .= ' data-layout="button"';
	}
	$fb_like_html .= ' ></div>';
	return $fb_like_html;
}


/* create pinit button */
function sfsi_plus_pinitpinterest($permalink,$show_count)
{
	//******************* Get custom meta data set in admin STARTS **************************************//
	$socialObj    = new sfsi_plus_SocialHelper();

	// $pin_it_html    = '<a data-pin-do="buttonPin" data-pin-save="true" href="https://www.pinterest.com/pin/create/button/?url='.$url.'&media='.$pinterest_img.'&description='.$pinterest_desc.'"></a>';

	$pinit_html = '<a href="https://www.pinterest.com/pin/create/button/?url='.$permalink.'&media='.$socialObj->sfsi_pinit_image().'&description='.$socialObj->sfsi_pinit_description().'" data-pin-do="buttonPin" data-pin-save="true"';
	if($show_count)
	{
		$pinit_html .= ' data-pin-count="beside"';
	}
	else
	{
		$pinit_html .= ' data-pin-count="none"';
	}
	$pinit_html .= '></a>';
	
	return $pinit_html;
}

/* create add this  button */
function sfsi_plus_Addthis($show_count, $permalink, $post_title)
{
   	$atiocn=' <script type="text/javascript">
		var addthis_config = {
			url: "'.$permalink.'",
			title: "'.$post_title.'"
		}
	</script>';

	if($show_count==1)
	{
		$atiocn.=' <div class="addthis_toolbox" addthis:url="'.$permalink.'" addthis:title="'.$post_title.'">
			<a class="addthis_counter addthis_pill_style share_showhide"></a>
		</div>';
		return $atiocn;
	}
	else
	{
		$atiocn.='<div class="addthis_toolbox addthis_default_style addthis_20x20_style" addthis:url="'.$permalink.'" addthis:title="'.$post_title.'"><a class="addthis_button_compact " href="#">  <img src="'.SFSI_PLUS_PLUGURL.'images/sharebtn.png"  border="0" alt="Share" /></a></div>';
		return $atiocn;
    }
}

function sfsi_plus_Addthis_blogpost($show_count, $permalink, $post_title)
{ 
	$atiocn=' <script type="text/javascript">
		var addthis_config = {
			 url: "'.$permalink.'",
			 title: "'.$post_title.'"
		}
	</script>';
	
	if($show_count==1)
	{
	   $atiocn.=' <div class="addthis_toolbox" addthis:url="'.$permalink.'" addthis:title="'.$post_title.'">
              <a class="addthis_counter addthis_pill_style share_showhide"></a>
	   </div>';
	    return $atiocn;
	}
	else
	{
		$atiocn.='<div class="addthis_toolbox addthis_default_style addthis_20x20_style" addthis:url="'.$permalink.'" addthis:title="'.$post_title.'"><a class="addthis_button_compact " href="#">  <img src="'.SFSI_PLUS_PLUGURL.'images/sharebtn.png"  border="0" alt="Share" /></a></div>';
		return $atiocn; 
    }
}

/* create linkedIn  share button */
function sfsi_LinkedInShare($url='', $count='')
{
	$url=(isset($url))? $url :  home_url();

	if($count == 1)
	{
		return  $ifollow='<script type="IN/Share" data-url="'.$url.'" data-counter="right"></script>';
	}
	else
	{
		return  $ifollow='<script type="IN/Share" data-url="'.$url.'" ></script>';
	}
}

/* create linkedIn  share button */
function sfsi_redditShareButton($url='')
{
	$url = (isset($url))? $url :  home_url();
	$url = "//www.reddit.com/submit?url=$url";
	$onclick = "javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=800');return false;";
	return  $ifollow='<a href="'.$url.'" onclick="'.$onclick.'"> <img src="//www.redditstatic.com/spreddit7.gif" alt="submit to reddit" style="border:0" /> </a>';
}
?>