<?php
	/* unserialize all saved option for  section 5 options */
	$option1 =  unserialize(get_option('sfsi_premium_section1_options',false)); 	
	$option2 =  unserialize(get_option('sfsi_premium_section2_options',false));    
	$option3 =  unserialize(get_option('sfsi_premium_section3_options',false));
	$option5 =  unserialize(get_option('sfsi_premium_section5_options',false));

	/*
	 * Sanitize, escape and validate values
	 */
	$option5['sfsi_plus_icons_size'] 			= 	(isset($option5['sfsi_plus_icons_size']))
														? intval($option5['sfsi_plus_icons_size'])
														: '';
	$option5['sfsi_plus_icons_spacing'] 		= 	(isset($option5['sfsi_plus_icons_spacing']))
														? intval($option5['sfsi_plus_icons_spacing'])
														: '';
	$option5['sfsi_plus_icons_verical_spacing']	= 	(isset($option5['sfsi_plus_icons_verical_spacing']))
														? intval($option5['sfsi_plus_icons_verical_spacing'])
														: '';
	$option5['sfsi_plus_mobile_icon_alignment_setting'] 		= 	(isset($option5['sfsi_plus_mobile_icon_alignment_setting']))
														? sanitize_text_field($option5['sfsi_plus_mobile_icon_alignment_setting'])
	  													: 'no';	
	$option5['sfsi_plus_mobile_horizontal_verical_Alignment']	= 	(isset($option5['sfsi_plus_mobile_horizontal_verical_Alignment']))
														? sanitize_text_field($option5['sfsi_plus_mobile_horizontal_verical_Alignment'])
														: '';
	$option5['sfsi_plus_mobile_icons_Alignment_via_widget']	= 	(isset($option5['sfsi_plus_mobile_icons_Alignment_via_widget']))
														? sanitize_text_field($option5['sfsi_plus_mobile_icons_Alignment_via_widget'])
														: '';													
    $option5['sfsi_plus_mobile_icons_Alignment_via_shortcode']	= 	(isset($option5['sfsi_plus_mobile_icons_Alignment_via_shortcode']))
														? sanitize_text_field($option5['sfsi_plus_mobile_icons_Alignment_via_shortcode'])
														: '';
	$option5['sfsi_plus_mobile_icons_Alignment']	= 	(isset($option5['sfsi_plus_mobile_icons_Alignment']))
														? sanitize_text_field($option5['sfsi_plus_mobile_icons_Alignment'])
														: '';
														
	$option5['sfsi_plus_mobile_icons_perRow'] 		= 	(isset($option5['sfsi_plus_mobile_icons_perRow']))
														? intval($option5['sfsi_plus_mobile_icons_perRow'])
														: '';																										
	$option5['sfsi_plus_mobile_icon_setting'] 		= 	(isset($option5['sfsi_plus_mobile_icon_setting']))
														? sanitize_text_field($option5['sfsi_plus_mobile_icon_setting'])
														: 'no';													
	$option5['sfsi_plus_icons_mobilesize'] 			= 	(isset($option5['sfsi_plus_icons_mobilesize']))
														? intval($option5['sfsi_plus_icons_mobilesize'])
														: '';
	$option5['sfsi_plus_icons_mobilespacing'] 		= 	(isset($option5['sfsi_plus_icons_mobilespacing']))
														? intval($option5['sfsi_plus_icons_mobilespacing'])
														: '';
	$option5['sfsi_plus_icons_verical_mobilespacing']= 	(isset($option5['sfsi_plus_icons_verical_mobilespacing']))
														? intval($option5['sfsi_plus_icons_verical_mobilespacing'])
														: '';
	$option5['sfsi_plus_horizontal_verical_Alignment']	= 	(isset($option5['sfsi_plus_horizontal_verical_Alignment']))
														? sanitize_text_field($option5['sfsi_plus_horizontal_verical_Alignment'])
														: '';
	$option5['sfsi_plus_icons_Alignment_via_shortcode']	= 	(isset($option5['sfsi_plus_icons_Alignment_via_shortcode']))
														? sanitize_text_field($option5['sfsi_plus_icons_Alignment_via_shortcode'])
														: '';
	$option5['sfsi_plus_icons_Alignment_via_widget']	= 	(isset($option5['sfsi_plus_icons_Alignment_via_widget']))
														? sanitize_text_field($option5['sfsi_plus_icons_Alignment_via_widget'])
														: '';
	$option5['sfsi_plus_icons_Alignment'] 		= 	(isset($option5['sfsi_plus_icons_Alignment']))
														? sanitize_text_field($option5['sfsi_plus_icons_Alignment'])
														: '';
	$option5['sfsi_plus_icons_perRow'] 			= 	(isset($option5['sfsi_plus_icons_perRow']))
														? intval($option5['sfsi_plus_icons_perRow'])
														: '';
	$option5['sfsi_plus_follow_icons_language'] = 	(isset($option5['sfsi_plus_follow_icons_language']))
														? sanitize_text_field($option5['sfsi_plus_follow_icons_language'])
														: '';
	$option5['sfsi_plus_facebook_icons_language']= 	(isset($option5['sfsi_plus_facebook_icons_language']))
														? sanitize_text_field($option5['sfsi_plus_facebook_icons_language'])
														: '';
	$option5['sfsi_plus_twitter_icons_language']= 	(isset($option5['sfsi_plus_twitter_icons_language']))
														? sanitize_text_field($option5['sfsi_plus_twitter_icons_language'])
														: '';
	$option5['sfsi_plus_google_icons_language'] = 	(isset($option5['sfsi_plus_google_icons_language']))
														? sanitize_text_field($option5['sfsi_plus_google_icons_language'])
														: '';
	$option5['sfsi_plus_icons_ClickPageOpen']	= 	(isset($option5['sfsi_plus_icons_ClickPageOpen']))
														? sanitize_text_field($option5['sfsi_plus_icons_ClickPageOpen'])
														: 'no';
	$option5['sfsi_plus_disable_floaticons'] 	= 	(isset($option5['sfsi_plus_disable_floaticons']))
														? sanitize_text_field($option5['sfsi_plus_disable_floaticons'])
														: '';
	$option5['sfsi_plus_icons_stick'] 			= 	(isset($option5['sfsi_plus_icons_stick']))
														? sanitize_text_field($option5['sfsi_plus_icons_stick'])
														: '';
														
	$option5['sfsi_plus_rss_MouseOverText'] 	= 	(isset($option5['sfsi_plus_rss_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_rss_MouseOverText'])
														: '';
	$option5['sfsi_plus_email_MouseOverText'] 	= 	(isset($option5['sfsi_plus_email_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_email_MouseOverText'])
														: '';
	$option5['sfsi_plus_twitter_MouseOverText'] = 	(isset($option5['sfsi_plus_twitter_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_twitter_MouseOverText'])
														: '';
	$option5['sfsi_plus_facebook_MouseOverText']= 	(isset($option5['sfsi_plus_facebook_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_facebook_MouseOverText'])
														: '';
	$option5['sfsi_plus_google_MouseOverText'] 	= 	(isset($option5['sfsi_plus_google_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_google_MouseOverText'])
														: '';
	$option5['sfsi_plus_linkedIn_MouseOverText']= 	(isset($option5['sfsi_plus_linkedIn_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_linkedIn_MouseOverText'])
														: '';
	$option5['sfsi_plus_pinterest_MouseOverText']= 	(isset($option5['sfsi_plus_pinterest_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_pinterest_MouseOverText'])
														: '';
	$option5['sfsi_plus_youtube_MouseOverText'] = 	(isset($option5['sfsi_plus_youtube_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_youtube_MouseOverText'])
														: '';
	$option5['sfsi_plus_share_MouseOverText'] 	= 	(isset($option5['sfsi_plus_share_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_share_MouseOverText'])
														: '';
	$option5['sfsi_plus_instagram_MouseOverText']= 	(isset($option5['sfsi_plus_instagram_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_instagram_MouseOverText'])
														: '';
	$option5['sfsi_plus_houzz_MouseOverText']	= 	(isset($option5['sfsi_plus_houzz_MouseOverText']))
														? sanitize_text_field($option5['sfsi_plus_houzz_MouseOverText'])
														: '';
	
	$option5['sfsi_plus_snapchat_MouseOverText']	= 	(isset($option5['sfsi_plus_snapchat_MouseOverText']))
															? sanitize_text_field($option5['sfsi_plus_snapchat_MouseOverText'])
															: '';
	$option5['sfsi_plus_whatsapp_MouseOverText']	= 	(isset($option5['sfsi_plus_whatsapp_MouseOverText']))
															? sanitize_text_field($option5['sfsi_plus_whatsapp_MouseOverText'])
															: '';
	$option5['sfsi_plus_skype_MouseOverText']		= 	(isset($option5['sfsi_plus_skype_MouseOverText']))
															? sanitize_text_field($option5['sfsi_plus_skype_MouseOverText'])
															: '';
	$option5['sfsi_plus_vimeo_MouseOverText']		= 	(isset($option5['sfsi_plus_vimeo_MouseOverText']))
															? sanitize_text_field($option5['sfsi_plus_vimeo_MouseOverText'])
															: '';
	$option5['sfsi_plus_soundcloud_MouseOverText']	= 	(isset($option5['sfsi_plus_soundcloud_MouseOverText']))
															? sanitize_text_field($option5['sfsi_plus_soundcloud_MouseOverText'])
															: '';
	$option5['sfsi_plus_yummly_MouseOverText']		= 	(isset($option5['sfsi_plus_yummly_MouseOverText']))
															? sanitize_text_field($option5['sfsi_plus_yummly_MouseOverText'])
															: '';																									
	$option5['sfsi_plus_flickr_MouseOverText']		= 	(isset($option5['sfsi_plus_flickr_MouseOverText']))
															? sanitize_text_field($option5['sfsi_plus_flickr_MouseOverText'])
															: '';
	$option5['sfsi_plus_reddit_MouseOverText']		= 	(isset($option5['sfsi_plus_reddit_MouseOverText']))
															? sanitize_text_field($option5['sfsi_plus_reddit_MouseOverText'])
															: '';
	$option5['sfsi_plus_tumblr_MouseOverText']		= 	(isset($option5['sfsi_plus_tumblr_MouseOverText']))
															? sanitize_text_field($option5['sfsi_plus_tumblr_MouseOverText'])
															: '';
    $option5['sfsi_plus_Facebook_linking'] 			= 	(isset($option5['sfsi_plus_Facebook_linking']))
															? sanitize_text_field($option5['sfsi_plus_Facebook_linking'])
															: '';
	$option5['sfsi_plus_facebook_linkingcustom_url']=	(isset($option5['sfsi_plus_facebook_linkingcustom_url']))
															? sanitize_text_field($option5['sfsi_plus_facebook_linkingcustom_url'])
															: '';													
	$option5['sfsi_plus_tooltip_alighn']			= 	(isset($option5['sfsi_plus_tooltip_alighn']))
															? sanitize_text_field($option5['sfsi_plus_tooltip_alighn'])
															: '';														
	$option5['sfsi_plus_tooltip_Color'] 			=	(isset($option5['sfsi_plus_tooltip_Color']))
															? sfsi_plus_sanitize_hex_color($option5['sfsi_plus_tooltip_Color'])
															: '';

	$option5['sfsi_plus_tooltip_border_Color'] 		=	(isset($option5['sfsi_plus_tooltip_border_Color']))
															? sfsi_plus_sanitize_hex_color($option5['sfsi_plus_tooltip_border_Color'])
															: '';

	// $option5['sfsi_plus_url_shortner_setting']         = (isset($option5['sfsi_plus_url_shortner_setting']))
	// 														? sanitize_text_field($option5['sfsi_plus_url_shortner_setting'])
	// 														: 'no';

	$option5['sfsi_plus_url_shorting_api_type_setting']         = (isset($option5['sfsi_plus_url_shorting_api_type_setting']))
															? sanitize_text_field($option5['sfsi_plus_url_shorting_api_type_setting'])
															: 'no';

	// $option5['sfsi_premium_url_shortner_icons_names_list']   = (isset($option5['sfsi_premium_url_shortner_icons_names_list'])) ? unserialize(unserialize($option5['sfsi_premium_url_shortner_icons_names_list'])): array();


	$option5['sfsi_plus_url_shortner_bitly_key']         = (isset($option5['sfsi_plus_url_shortner_bitly_key']))
															? sanitize_text_field($option5['sfsi_plus_url_shortner_bitly_key'])
															: '';																					
	$option5['sfsi_plus_url_shortner_google_key']         = (isset($option5['sfsi_plus_url_shortner_google_key']))
															? sanitize_text_field($option5['sfsi_plus_url_shortner_google_key'])
															: '';									
	$option5['sfsi_custom_social_data_post_types_data']    = (isset($option5['sfsi_custom_social_data_post_types_data']))
															? unserialize(sanitize_text_field($option5['sfsi_custom_social_data_post_types_data']))
															: array();														

	$option5['sfsi_plus_twitter_aboutPageText'] 	  =	(isset($option5['sfsi_plus_twitter_aboutPageText'])) ? sanitize_text_field($option5['sfsi_plus_twitter_aboutPageText']) :'${title} ${link}';	
	$option5['sfsi_plus_twitter_twtAddCard']    	  =	(isset($option5['sfsi_plus_twitter_twtAddCard'])) ? sanitize_text_field($option5['sfsi_plus_twitter_twtAddCard']): 'no';
	$option5['sfsi_plus_twitter_twtCardType']   	  =	(isset($option5['sfsi_plus_twitter_twtCardType'])) ? sanitize_text_field($option5['sfsi_plus_twitter_twtCardType']): 'summary';
	$option5['sfsi_plus_twitter_card_twitter_handle'] =	(isset($option5['sfsi_plus_twitter_card_twitter_handle'])) ? sanitize_text_field($option5['sfsi_plus_twitter_card_twitter_handle']): '';

	$sfsi_plus_facebook_cumulative_count_active 	  = (isset($option5['sfsi_plus_facebook_cumulative_count_active'])) ? $option5['sfsi_plus_facebook_cumulative_count_active'] :'no';
	
	$sfsi_plus_pinterest_cumulative_count_active 	  = (isset($option5['sfsi_plus_pinterest_cumulative_count_active'])) ? $option5['sfsi_plus_pinterest_cumulative_count_active'] :'no';

	$option5['sfsi_plus_social_sharing_options']      = (isset($option5['sfsi_plus_social_sharing_options'])) ? sanitize_text_field($option5['sfsi_plus_social_sharing_options']): 'posttype';

	$sfsi_plus_loadjquery  = isset($option5['sfsi_plus_loadjquery']) && !empty($option5['sfsi_plus_loadjquery']) ? sanitize_text_field($option5['sfsi_plus_loadjquery']): "yes";


	$sfsi_plus_suppress_errors = (isset($option5['sfsi_plus_icons_suppress_errors']) && !empty($option5['sfsi_plus_icons_suppress_errors'])) ? sanitize_text_field($option5['sfsi_plus_icons_suppress_errors']): 'no';	

	$sfsi_plus_nofollow_links = (isset($option5['sfsi_plus_nofollow_links']) && !empty($option5['sfsi_plus_nofollow_links'])) ? sanitize_text_field($option5['sfsi_plus_nofollow_links']): 'no';	


	$sfsi_plus_disable_viewport = (isset($option5['sfsi_plus_disable_viewport']) && !empty($option5['sfsi_plus_disable_viewport'])) ? sanitize_text_field($option5['sfsi_plus_disable_viewport']): 'no';


	$sfsi_plus_mobile_icons_order_setting = (isset($option5['sfsi_plus_mobile_icons_order_setting']) && !empty($option5['sfsi_plus_mobile_icons_order_setting'])) ? sanitize_text_field($option5['sfsi_plus_mobile_icons_order_setting']): 'no';

	$visit_iconsUrl = SFSI_PLUS_PLUGURL."images/visit_icons/";
  
    $isSetDifferentIconsForMobile = "no";

    if(isset($option1['sfsi_plus_icons_onmobile']) && !empty($option1['sfsi_plus_icons_onmobile']))
    {       
      $isSetDifferentIconsForMobile = $option1['sfsi_plus_icons_onmobile'];
    }

	function selectoption($name, $follow, $visitme)
	{	
		$visit_iconsUrl = SFSI_PLUS_PLUGURL."images/visit_icons/"; 
		if($name == "sfsi_plus_follow_icons_language")
		{
			$visit_icon = $visit_iconsUrl."Follow";
		}
		elseif($name == "sfsi_plus_facebook_icons_language")
		{
			$visit_icon = $visit_iconsUrl."Visit_us_fb";
		}
		elseif($name == "sfsi_plus_twitter_icons_language")
		{
			$visit_icon = $visit_iconsUrl."Visit_us_twitter";
		}
		elseif($name == "sfsi_plus_google_icons_language")
		{
			$visit_icon = $visit_iconsUrl."Visit_us_google";
		}
					
		$option5 =  unserialize(get_option('sfsi_premium_section5_options',false)); ?>

			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>" data-iconUrl="<?php echo $visit_icon; ?>" class="<?php echo $name; ?>-preview lanOnchange">
				<option value="<?php echo $follow; ?>_ar" <?php echo ($option5[$name]== $follow.'_ar') ?  'selected="selected"' : '' ; ?>>
					العربية<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_ar" <?php echo ($option5[$name]== $visitme.'_ar') ?  'selected="selected"' : '' ; ?>>
					العربية<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_bg_BG" <?php echo ($option5[$name]== $follow.'_bg_BG') ?  'selected="selected"' : '' ; ?>>
					Български<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_bg_BG" <?php echo ($option5[$name]== $visitme.'_bg_BG') ?  'selected="selected"' : '' ; ?>>
					Български<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_zh_CN" <?php echo ($option5[$name]== $follow.'_zh_CN') ?  'selected="selected"' : '' ; ?>>
					简体中文<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_zh_CN" <?php echo ($option5[$name]== $visitme.'_zh_CN') ?  'selected="selected"' : '' ; ?>>
					简体中文<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_cs_CZ" <?php echo ($option5[$name]== $follow.'_cs_CZ') ?  'selected="selected"' : '' ; ?>>
					Čeština‎<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_cs_CZ" <?php echo ($option5[$name]== $visitme.'_cs_CZ') ?  'selected="selected"' : '' ; ?>>
					Čeština‎<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_da_DK" <?php echo ($option5[$name]== $follow.'_da_DK') ?  'selected="selected"' : '' ; ?>>
					Dansk<span> - << </span><span><?php echo $follow ?></span><span> >> </span>	
				</option>
				<option value="<?php echo $visitme; ?>_da_DK" <?php echo ($option5[$name]== $visitme.'_da_DK') ?  'selected="selected"' : '' ; ?>>
					Dansk<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_nl_NL" <?php echo ($option5[$name]== $follow.'_nl_NL') ?  'selected="selected"' : '' ; ?>>
					Nederlands<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_nl_NL" <?php echo ($option5[$name]== $visitme.'_nl_NL') ?  'selected="selected"' : '' ; ?>>
					Nederlands<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_fi" <?php echo ($option5[$name]== $follow.'_fi') ?  'selected="selected"' : '' ; ?>>
					Suomi<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_fi" <?php echo ($option5[$name]== $visitme.'_fi') ?  'selected="selected"' : '' ; ?>>
					Suomi<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_fr_FR" <?php echo ($option5[$name]== $follow.'_fr_FR') ?  'selected="selected"' : '' ; ?>>
					Français<span> - << </span><span><?php echo $follow ?></span><span> >> </span>	
				</option>
				<option value="<?php echo $visitme; ?>_fr_FR" <?php echo ($option5[$name]== $visitme.'_fr_FR') ?  'selected="selected"' : '' ; ?>>
					Français<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_de_DE" <?php echo ($option5[$name]== $follow.'_de_DE') ?  'selected="selected"' : '' ; ?>>
					Deutsch<span> - << </span><span><?php echo $follow ?></span><span> >> </span>	
				</option>
				<option value="<?php echo $visitme; ?>_de_DE" <?php echo ($option5[$name]== $visitme.'_de_DE') ?  'selected="selected"' : '' ; ?>>
					Deutsch<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_en_US" <?php echo ($option5[$name]== $follow.'_en_US') ? 'selected="selected"' : '' ; ?>>
					English<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_en_US" <?php echo ($option5[$name]== $visitme.'_en_US') ?  'selected="selected"' : '' ; ?>>
					English<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>	
				</option>
				
				<option value="<?php echo $follow; ?>_el" <?php echo ($option5[$name]== $follow.'_el') ?  'selected="selected"' : '' ; ?>>
					Ελληνικά<span> - << </span><span><?php echo $follow ?></span><span> >> </span>	
				</option>
				<option value="<?php echo $visitme; ?>_el" <?php echo ($option5[$name]== $visitme.'_el') ?  'selected="selected"' : '' ; ?>>
					Ελληνικά<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_hu_HU" <?php echo ($option5[$name]==$follow.'_hu_HU') ?  'selected="selected"' : '' ; ?>>
					Magyar<span> - << </span><span><?php echo $follow ?></span><span> >> </span>	
				</option>
				<option value="<?php echo $visitme; ?>_hu_HU" <?php echo ($option5[$name]== $visitme.'_hu_HU') ?  'selected="selected"' : '' ; ?>>
					Magyar<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_id_ID" <?php echo ($option5[$name]== $follow.'_id_ID') ?  'selected="selected"' : '' ; ?>>
					Bahasa Indonesia<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_id_ID" <?php echo ($option5[$name]== $visitme.'_id_ID') ?  'selected="selected"' : '' ; ?>>
					Bahasa Indonesia<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_it_IT" <?php echo ($option5[$name]== $follow.'_it_IT') ?  'selected="selected"' : '' ; ?>>
					Italiano<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_it_IT" <?php echo ($option5[$name]== $visitme.'_it_IT') ?  'selected="selected"' : '' ; ?>>
					Italiano<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_ja" <?php echo ($option5[$name]== $follow.'_ja') ?  'selected="selected"' : '' ; ?>>
					日本語<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_ja" <?php echo ($option5[$name]== $visitme.'_ja') ?  'selected="selected"' : '' ; ?>>
					日本語<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_ko_KR" <?php echo ($option5[$name]== $follow.'_ko_KR') ?  'selected="selected"' : '' ; ?>>
					한국어<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_ko_KR" <?php echo ($option5[$name]== $visitme.'_ko_KR') ?  'selected="selected"' : '' ; ?>>
					한국어<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_nb_NO" <?php echo ($option5[$name]== $follow.'_nb_NO') ?  'selected="selected"' : '' ; ?>>
					Norsk bokmål<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_nb_NO" <?php echo ($option5[$name]== $visitme.'_nb_NO') ?  'selected="selected"' : '' ; ?>>
					Norsk bokmål<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_fa_IR" <?php echo ($option5[$name]== $follow.'_fa_IR') ?  'selected="selected"' : '' ; ?>>
					فارسی<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_fa_IR" <?php echo ($option5[$name]== $visitme.'_fa_IR') ?  'selected="selected"' : '' ; ?>>
					فارسی<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_pl_PL" <?php echo ($option5[$name]== $follow.'_pl_PL') ?  'selected="selected"' : '' ; ?>>
					Polski<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_pl_PL" <?php echo ($option5[$name]== $visitme.'_pl_PL') ?  'selected="selected"' : '' ; ?>>
					Polski<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_pt_PT" <?php echo ($option5[$name]== $follow.'_pt_PT') ?  'selected="selected"' : '' ; ?>>
					Português<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_pt_PT" <?php echo ($option5[$name]== $visitme.'_pt_PT') ?  'selected="selected"' : '' ; ?>>
					Português<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_ro_RO" <?php echo ($option5[$name]== $follow.'_ro_RO') ?  'selected="selected"' : '' ; ?>>
					Română<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_ro_RO" <?php echo ($option5[$name]== $visitme.'_ro_RO') ?  'selected="selected"' : '' ; ?>>
					Română<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_ru_RU" <?php echo ($option5[$name]== $follow.'_ru_RU') ?  'selected="selected"' : '' ; ?>>
					Русский<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_ru_RU" <?php echo ($option5[$name]== $visitme.'_ru_RU') ?  'selected="selected"' : '' ; ?>>
					Русский<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_sk_SK" <?php echo ($option5[$name]== $follow.'_sk_SK') ?  'selected="selected"' : '' ; ?>>
					Slovenčina<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_sk_SK" <?php echo ($option5[$name]== $visitme.'_sk_SK') ?  'selected="selected"' : '' ; ?>>
					Slovenčina<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_es_ES" <?php echo ($option5[$name]== $follow.'_es_ES') ?  'selected="selected"' : '' ; ?>>
					Español<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_es_ES" <?php echo ($option5[$name]== $visitme.'_es_ES') ?  'selected="selected"' : '' ; ?>>
					Español<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_sv_SE" <?php echo ($option5[$name]== $follow.'_sv_SE') ?  'selected="selected"' : '' ; ?>>
					Svenska<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_sv_SE" <?php echo ($option5[$name]== $visitme.'_sv_SE') ?  'selected="selected"' : '' ; ?>>
					Svenska<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_th" <?php echo ($option5[$name]== $follow.'_th') ?  'selected="selected"' : '' ; ?>>
					ไทย<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_th" <?php echo ($option5[$name]== $visitme.'_th') ?  'selected="selected"' : '' ; ?>>
					ไทย<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_tr_TR" <?php echo ($option5[$name]== $follow.'_tr_TR') ?  'selected="selected"' : '' ; ?>>
					Türkçe<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_tr_TR" <?php echo ($option5[$name]== $visitme.'_tr_TR') ?  'selected="selected"' : '' ; ?>>
					Türkçe<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
				
				<option value="<?php echo $follow; ?>_vi" <?php echo ($option5[$name]== $follow.'_vi') ?  'selected="selected"' : '' ; ?>>
					Tiếng Việt<span> - << </span><span><?php echo $follow ?></span><span> >> </span>
				</option>
				<option value="<?php echo $visitme; ?>_vi" <?php echo ($option5[$name]== $visitme.'_vi') ?  'selected="selected"' : '' ; ?>>
					Tiếng Việt<span> - << </span><span><?php echo $visitme ?></span><span> >> </span>
				</option>
			</select>
		<?php
	}

?>


<!-- Section 5 "Any other wishes for your main icons?" main div Start -->
<div class="tab5">
	
	<div class="row zerotopmargin zerotoppadding notopborder">

		<h4>
			<?php  _e( 'Order of your icons', SFSI_PLUS_DOMAIN ); ?>
	    </h4>

	    <!-- icon drag drop  section start here -->	
	    <ul class="plus_share_icon_order desktop_icons_order">


	    <?php 			

		    $desktopIconOrder = sfsi_premium_desktop_icons_order($option5,$option1);

			$customIcons = isset($option1['sfsi_custom_files']) && !empty($option1['sfsi_custom_files']) && 
			is_string($option1['sfsi_custom_files']) ? unserialize($option1['sfsi_custom_files']) : array();

			$activeDcustomIcons = isset($option1['sfsi_custom_desktop_icons']) && !empty($option1['sfsi_custom_desktop_icons']) && is_string($option1['sfsi_custom_desktop_icons']) ? unserialize($option1['sfsi_custom_desktop_icons']) : array();

			foreach ($desktopIconOrder as $index => $iconData) { 

					$iconData    = (object) $iconData;
					$iconName    = isset($iconData->iconName) && !empty($iconData->iconName) ? $iconData->iconName : false;
					$iconOrder   = $iconData->index;

					if(false != $iconName){

						if('custom' != $iconName){ 

	            			$iDisplay = "yes" == $isSetDifferentIconsForMobile ? sfsi_shallDisplayIcon($iconName,false) : sfsi_shallDisplayIcon($iconName);

							$iconDisplay = false != filter_var($iDisplay, FILTER_VALIDATE_BOOLEAN) ? 'display:block' : 'display:none';

							?>

			            	 <li style="<?php echo $iconDisplay; ?>" class="sfsiplus_<?php echo $iconName; ?>_section" data-icon="<?php echo $iconName; ?>" data-index="<?php echo $iconOrder; ?>" id="sfsi_plus_<?php echo $iconName; ?>Icon_order">

			                	<a href="#" title="<?php echo $iconName; ?>">
			                		<img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/<?php echo $iconName; ?>.png" alt="<?php echo $iconName; ?>" />
			                	</a>

			                 </li>

		                 <?php } 

		                 else{

		                 	if( !empty($customIcons) && isset($iconData->customElementIndex)){
		                 		
		                 		$customElementIndex = $iconData->customElementIndex;
		                 		$iconImagePath      = isset($customIcons[$customElementIndex]) && !empty($customIcons[$customElementIndex]) ? $customIcons[$customElementIndex]: false;;

				          		if(isset($iconImagePath) && !empty($iconImagePath) && filter_var($iconImagePath, FILTER_VALIDATE_URL) ){ ?>

					          		<li class="sfsiplus_custom_iconOrder sfsiICON_<?php echo $customElementIndex; ?>" data-icon="custom" data-index="<?php echo $iconOrder; ?>" element-id="<?php echo $customElementIndex; ?>" >
					                	
					                	<a href="#" title="Custom Icon">
					                		<img src="<?php echo $iconImagePath; ?>" alt="" class="sfcm" />
					                	</a>
					                </li>

				                <?php } 		                 		
		                 	}
                 	
		                 }						
					}
			}

			$arrSavedOrderForDCustomIcons = array_column($desktopIconOrder, 'customElementIndex');

			foreach ($customIcons as $i => $iconImagePath) {

				if(!empty($arrSavedOrderForDCustomIcons) && !in_array($i,$arrSavedOrderForDCustomIcons)){ 

	          		if(isset($iconImagePath) && !empty($iconImagePath) && filter_var($iconImagePath, FILTER_VALIDATE_URL) ){ 

	          			?>

		          		<li class="sfsiplus_custom_iconOrder sfsiICON_<?php echo $i; ?>" data-icon="custom" data-index="" element-id="<?php echo $i; ?>" >
		                	
		                	<a href="#" title="Custom Icon">
		                		<img src="<?php echo $iconImagePath; ?>" alt="" class="sfcm" />
		                	</a>
		                </li>

	                <?php } 
            	}
			}

		?> 
	     
	    </ul>
	    <!-- END icon drag drop section start here -->

	    <span class="sfsi_plus_drag_drp">
	    	(<?php  _e( 'Drag and Drop', SFSI_PLUS_DOMAIN); ?>)
	    </span>
    
    </div>

	<?php
		$nocheck    = ('no'  == $sfsi_plus_mobile_icons_order_setting)  ? 'checked="checked"' : '';
		$yescheck   = ('yes' == $sfsi_plus_mobile_icons_order_setting)  ? 'checked="checked"' : '';
		$orderClass = ('yes' == $sfsi_plus_mobile_icons_order_setting)  ? 'show' : 'hide';
	?>
    
    <div class="row sfsi_plus_mobile_icons_setting sfsi_plus_mobile_icons_order_setting">

    	<div class="sfsi_plus_mobile_section_heading"><?php _e("Need different selections for mobile?", SFSI_PLUS_DOMAIN); ?></div>

        <ul class="sfsi_plus_mobile_selection">
        	
        	<li>
            	<input type="radio" name="sfsi_plus_mobile_icons_order_setting" class="styled" value="no" <?php echo $nocheck; ?>/>
                <label><?php _e("No", SFSI_PLUS_DOMAIN); ?></label>
            </li>
            
            <li>
            	<?php
				?>
            	<input type="radio" name="sfsi_plus_mobile_icons_order_setting" class="styled" value="yes" <?php echo $yescheck	; ?>/>
                <label><?php _e("Yes", SFSI_PLUS_DOMAIN); ?></label>
            </li>

        </ul>
        
    </div>

    <div class="row zerotoppadding notopborder <?php echo $orderClass; ?>">
		
		<h4>
			<?php  _e( 'Order of your icons', SFSI_PLUS_DOMAIN ); ?>
	    </h4>
	    
	    <!-- icon drag drop  section start here -->	
	     <ul class="plus_share_icon_mobile_order mobile_icons_order">

		     <?php 

				$mobileIconOrder = sfsi_premium_mobile_icons_order($option5,$option1);

				$arrSavedOrderForCustomIcons = array_column($mobileIconOrder, 'customElementIndex');

				foreach ($mobileIconOrder as $index => $iconData) { 

					$iconData    = (object) $iconData;
					$iconName    = isset($iconData->iconName) && !empty($iconData->iconName) ? $iconData->iconName : false;

					if(false != $iconName){

						$iconOrder  = $iconData->index;

						if('custom' != $iconName){ 

	            			$iDisplay = "yes" == $isSetDifferentIconsForMobile ? sfsi_shallDisplayIcon($iconName,false) : sfsi_shallDisplayIcon($iconName);

							$iconDisplay = false != filter_var($iDisplay, FILTER_VALIDATE_BOOLEAN) ? 'display:block' : 'display:none';

							?>

			            	 <li style="<?php echo $iconDisplay; ?>" class="sfsiplus_<?php echo $iconName; ?>_mobilesection" data-icon="<?php echo $iconName; ?>" data-index="<?php echo $iconOrder; ?>" id="sfsi_plus_<?php echo $iconName; ?>Icon_order">

			                	<a href="#" title="<?php echo $iconName; ?>">
			                		<img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/<?php echo $iconName; ?>.png" alt="<?php echo $iconName; ?>" />
			                	</a>

			                 </li>

		                 <?php } 

		                 else{
		                 	
		                 	if( !empty($customIcons) && isset($iconData->customElementIndex) ){
		                 		
		                 		$customElementIndex = $iconData->customElementIndex;
		                 		$iconImagePath      = isset($customIcons[$customElementIndex]) && !empty($customIcons[$customElementIndex]) ? $customIcons[$customElementIndex]: false;;

				          		if(isset($iconImagePath) && !empty($iconImagePath) && filter_var($iconImagePath, FILTER_VALIDATE_URL) ){ ?>

					          		<li class="sfsiplus_custom_mobilesection sfsiplus_custom_icon_mobileOrder sfsiICON_<?php echo $customElementIndex; ?>" data-icon="custom" data-index="<?php echo $iconOrder; ?>" element-id="<?php echo $customElementIndex; ?>" >
					                	
					                	<a href="#" title="Custom Icon">
					                		<img src="<?php echo $iconImagePath; ?>" alt="" class="sfcm" />
					                	</a>
					                </li>

				                <?php } 		                 		
		                 	}

		                 }

					}

				}

				if( !empty($customIcons)) {

					foreach ($customIcons as $index => $iconMImagePath): 

						if(!in_array($index,$arrSavedOrderForCustomIcons)){ ?>
	          		
			          		<li class="sfsiplus_custom_mobilesection sfsiplus_custom_icon_mobileOrder sfsiICON_<?php echo $index; ?>" data-icon="custom" data-index="" element-id="<?php echo $index; ?>" >
			                	
			                	<a href="#" title="Custom Icon">
			                		<img src="<?php echo $iconMImagePath; ?>" alt="" class="sfcm" />
			                	</a>
			                </li>

	            		<?php }

	            	endforeach;

            	} ?>
		
		</ul>
	    <!-- END icon drag drop section start here -->
	    
	    <ul style="width:0px !important;" class="dbMobileOrder hide">
	    	
		     <?php 

				foreach ($mobileIconOrder as $index => $iconData) { 

					$iconData    = (object) $iconData;
					$iconName    = isset($iconData->iconName) && !empty($iconData->iconName) ? $iconData->iconName : false;

					if(false != $iconName){

						$iconOrder  = $iconData->index;

						if('custom' != $iconName){ 

	            			$iDisplay = "yes" == $isSetDifferentIconsForMobile ? sfsi_shallDisplayIcon($iconName,false) : sfsi_shallDisplayIcon($iconName);

							$iconDisplay = false != filter_var($iDisplay, FILTER_VALIDATE_BOOLEAN) ? 'display:block' : 'display:none';

							?>

			            	 <li style="<?php echo $iconDisplay; ?>" class="sfsiplus_<?php echo $iconName; ?>_mobilesection" data-icon="<?php echo $iconName; ?>" data-index="<?php echo $iconOrder; ?>" id="sfsi_plus_<?php echo $iconName; ?>Icon_order">

			                	<a href="#" title="<?php echo $iconName; ?>">
			                		<img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/<?php echo $iconName; ?>.png" alt="<?php echo $iconName; ?>" />
			                	</a>

			                 </li>

		                 <?php } 

		                 else{
		                 	
		                 	if( !empty($customIcons) && isset($iconData->customElementIndex) ){
		                 		
		                 		$customElementIndex = $iconData->customElementIndex;
		                 		$iconImagePath      = isset($customIcons[$customElementIndex]) && !empty($customIcons[$customElementIndex]) ? $customIcons[$customElementIndex]: false;;

				          		if(isset($iconImagePath) && !empty($iconImagePath) && filter_var($iconImagePath, FILTER_VALIDATE_URL) ){ ?>

					          		<li class="sfsiplus_custom_mobilesection sfsiplus_custom_icon_mobileOrder sfsiICON_<?php echo $customElementIndex; ?>" data-icon="custom" data-index="<?php echo $iconOrder; ?>" element-id="<?php echo $customElementIndex; ?>" >
					                	
					                	<a href="#" title="Custom Icon">
					                		<img src="<?php echo $iconImagePath; ?>" alt="" class="sfcm" />
					                	</a>
					                </li>

				                <?php } 		                 		
		                 	}

		                 }

					}

				}

				if( !empty($customIcons)) {

					foreach ($customIcons as $index => $iconMImagePath): 

						if(!in_array($index,$arrSavedOrderForCustomIcons)){ ?>
	          		
			          		<li class="sfsiplus_custom_mobilesection sfsiplus_custom_icon_mobileOrder sfsiICON_<?php echo $index; ?>" data-icon="custom" data-index="" element-id="<?php echo $index; ?>" >
			                	
			                	<a href="#" title="Custom Icon">
			                		<img src="<?php echo $iconMImagePath; ?>" alt="" class="sfcm" />
			                	</a>
			                </li>

	            		<?php }

	            	endforeach;

            	} ?>

	    </ul>

	    <span class="sfsi_plus_drag_drp">
	    	(<?php  _e( 'Drag and Drop', SFSI_PLUS_DOMAIN); ?>)
	    </span>    	
    </div>

    <!-- icons size and spacing section start here -->	
    <div class="row">
        <h4>
        	<?php  _e( 'Size and spacing of your icons', SFSI_PLUS_DOMAIN ); ?>
        </h4>
        <div class="icons_size">
        	<div class="sfsi_plus_colone">
                <span>
                    <?php  _e( 'Size:', SFSI_PLUS_DOMAIN ); ?>
                </span>
                <input name="sfsi_plus_icons_size" value="<?php echo ($option5['sfsi_plus_icons_size']!='') ?  $option5['sfsi_plus_icons_size'] : '' ;?>" type="text" />
                <ins>
                    <?php  _e( 'pixels wide and tall', SFSI_PLUS_DOMAIN ); ?>
                </ins>
            </div>
            
            <div class="sfsi_plus_colone">
                <span>
                    <?php  _e( 'Horizontal spacing between icons:', SFSI_PLUS_DOMAIN ); ?>
                </span>
                <input name="sfsi_plus_icons_spacing" type="text" value="<?php echo ($option5['sfsi_plus_icons_spacing']!='') ?  $option5['sfsi_plus_icons_spacing'] : '' ;?>" />
                <ins>
                    <?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                </ins>
            </div>
            
            <div class="sfsi_plus_colone">
                <div>
                    <span><?php  _e( 'Vertical spacing between icons:', SFSI_PLUS_DOMAIN ); ?></span>
                    <!--<p>
                        <?php  _e( '(E.g. if you selected «1 icon per row» below, i.e. have a vertical alignment of icons, this field allows you define the space between the icons)', SFSI_PLUS_DOMAIN ); ?>
                    </p> -->
                </div>
                <input name="sfsi_plus_icons_verical_spacing" type="text" value="<?php echo ($option5['sfsi_plus_icons_verical_spacing']!='') ?  $option5['sfsi_plus_icons_verical_spacing'] : '' ;?>" />
                <ins>
                    <?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                </ins>
            </div>
            
    	</div>
    </div>
    
    <div class="row sfsi_plus_mobile_icons_setting">
    	<div class="sfsi_plus_mobile_section_heading"><?php _e("Need different selections for mobile?", SFSI_PLUS_DOMAIN); ?></div>
        <ul class="sfsi_plus_mobile_selection">
        	<li>
            	<?php
					$check = (isset($option5['sfsi_plus_mobile_icon_setting']) && $option5['sfsi_plus_mobile_icon_setting'] == 'no')
						? 'checked="checked"'
						: '';
				?>
            	<input type="radio" name="sfsi_plus_mobile_icon_setting" class="styled" value="no" <?php echo $check; ?>/>
                <label><?php _e("No", SFSI_PLUS_DOMAIN); ?></label>
            </li>
            <li>
            	<?php
					$check = (isset($option5['sfsi_plus_mobile_icon_setting']) && $option5['sfsi_plus_mobile_icon_setting'] == 'yes')
						? 'checked="checked"'
						: '';
				?>
            	<input type="radio" name="sfsi_plus_mobile_icon_setting" class="styled" value="yes" <?php echo $check; ?>/>
                <label><?php _e("Yes", SFSI_PLUS_DOMAIN); ?></label>
            </li>
        </ul>
        
        <div class="icons_size sfsi_plus_mobile_icons_setting_wrpr" style="<?php echo (isset($option5['sfsi_plus_mobile_icon_setting']) && $option5['sfsi_plus_mobile_icon_setting'] == 'yes')? 'display:block' : 'display:none'; ?>">
        	<div class="sfsi_plus_colone">
                <span>
                    <?php  _e( 'Size:', SFSI_PLUS_DOMAIN ); ?>
                </span>
                <input name="sfsi_plus_icons_mobilesize" value="<?php echo ($option5['sfsi_plus_icons_mobilesize']!='') ?  $option5['sfsi_plus_icons_mobilesize'] : '' ;?>" type="text" />
                <ins>
                    <?php  _e( 'pixels wide and tall', SFSI_PLUS_DOMAIN ); ?>
                </ins>
            </div>
            
            <div class="sfsi_plus_colone">
                <span>
                    <?php  _e( 'Horizontal spacing between icons:', SFSI_PLUS_DOMAIN ); ?>
                </span>
                <input name="sfsi_plus_icons_mobilespacing" type="text" value="<?php echo ($option5['sfsi_plus_icons_mobilespacing']!='') ?  $option5['sfsi_plus_icons_mobilespacing'] : '' ;?>" />
                <ins>
                    <?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                </ins>
            </div>
            
            <div class="sfsi_plus_colone">
                <div>
                    <span><?php  _e( 'Vertical spacing between icons:', SFSI_PLUS_DOMAIN ); ?></span>
                    <!--<p>
                        <?php  _e( '(E.g. if you selected «1 icon per row» below, i.e. have a vertical alignment of icons, this field allows you define the space between the icons)', SFSI_PLUS_DOMAIN ); ?>
                    </p> -->
                </div>
                <input name="sfsi_plus_icons_verical_mobilespacing" type="text" value="<?php echo ($option5['sfsi_plus_icons_verical_mobilespacing']!='') ?  $option5['sfsi_plus_icons_verical_mobilespacing'] : '' ;?>" />
                <ins>
                    <?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                </ins>
            </div>
            
    	</div>
    </div>

    <div class="row">
    	<h4 style="padding-top: 0;">
        	<?php  _e( 'Alignments', SFSI_PLUS_DOMAIN ); ?>
        </h4>
        <div class="icons_size">
        	<ul class="sfsi_plus_new_alignment_option">
				<!--<li>
					<span class="sfsi_plus_new_alignment_span" style="line-height: 48px;">
						<?php  _e( 'Show icons', SFSI_PLUS_DOMAIN ); ?>
					</span>
					<div class="field">
						 <select name="sfsi_plus_horizontal_verical_Alignment" id="sfsi_plus_horizontal_verical_Alignment" class="styled">
							<option value="Horizontal" <?php echo ($option5['sfsi_plus_horizontal_verical_Alignment']=='Horizontal') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Horizontally', SFSI_PLUS_DOMAIN ); ?>
							</option>
							<option value="Vertical" <?php echo ($option5['sfsi_plus_horizontal_verical_Alignment']=='Vertical') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Vertically', SFSI_PLUS_DOMAIN ); ?>
							</option>
						</select>    
					</div>	
				</li>-->

				<li class="sfsi_plus_horiZontal_slideup">
					<span>
						<?php  _e( 'Icons per row:', SFSI_PLUS_DOMAIN ); ?>
					</span>
					
					<input name="sfsi_plus_icons_perRow" type="text" value="<?php echo ($option5['sfsi_plus_icons_perRow']!='') ?  $option5['sfsi_plus_icons_perRow'] : '' ;?>" />
					
					<ins class="leave_empty">
						<span><?php  _e( 'Leave empty if you dont want to define this', SFSI_PLUS_DOMAIN ); ?></span>
					</ins>
				</li>
				<li class="sfsi_plus_new_alignment_li">
					<div class="sfsi_plus_new_align_div">
						<span class="sfsi_plus_new_alignment_span">
							<?php  _e( 'Alignment of icons within a widget:', SFSI_PLUS_DOMAIN ); ?>
						</span>
						<div class="field">
							<select name="sfsi_plus_icons_Alignment_via_widget" id="sfsi_plus_icons_Alignment_via_widget" class="styled">
								<option value="center" <?php echo ($option5['sfsi_plus_icons_Alignment_via_widget']=='center') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Centered', SFSI_PLUS_DOMAIN ); ?>
								</option>
								<option value="right" <?php echo ($option5['sfsi_plus_icons_Alignment_via_widget']=='right') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Right', SFSI_PLUS_DOMAIN ); ?>
								</option>
								<option value="left" <?php echo ($option5['sfsi_plus_icons_Alignment_via_widget']=='left') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Left', SFSI_PLUS_DOMAIN ); ?>
								</option>
							</select>
						</div> 	
				    </div>
				    <div>
					    <span class="sfsi_plus_new_alignment_span">
							<?php  _e( 'Alignment of icons if placed via shortcode', SFSI_PLUS_DOMAIN ); ?>
						</span>
						<div class="field">
							<select name="sfsi_plus_icons_Alignment_via_shortcode" id="sfsi_plus_icons_Alignment_via_shortcode" class="styled">
								<option value="center" <?php echo ($option5['sfsi_plus_icons_Alignment_via_shortcode']=='center') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Centered', SFSI_PLUS_DOMAIN ); ?>
								</option>
								<option value="right" <?php echo ($option5['sfsi_plus_icons_Alignment_via_shortcode']=='right') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Right', SFSI_PLUS_DOMAIN ); ?>
								</option>
								<option value="left" <?php echo ($option5['sfsi_plus_icons_Alignment_via_shortcode']=='left') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Left', SFSI_PLUS_DOMAIN ); ?>
								</option>
							</select>
						</div>
					</div>	
				</li>
				<li>
					<span class="sfsi_plus_new_alignment_span">
						
						<?php _e( 'Alignment of icons In second row ', SFSI_PLUS_DOMAIN ); ?>
						<p><?php  _e( '(with respect to icons in first row; only relevant if your icons show in two or more rows):', SFSI_PLUS_DOMAIN ); ?></p>
					</span>
					<div class="field">
						<select name="sfsi_plus_icons_Alignment" id="sfsi_plus_icons_Alignment" class="styled">
							<option value="center" <?php echo ($option5['sfsi_plus_icons_Alignment']=='center') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Centered', SFSI_PLUS_DOMAIN ); ?>
							</option>
							<option value="right" <?php echo ($option5['sfsi_plus_icons_Alignment']=='right') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Right', SFSI_PLUS_DOMAIN ); ?>
							</option>
							<option value="left" <?php echo ($option5['sfsi_plus_icons_Alignment']=='left') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Left', SFSI_PLUS_DOMAIN ); ?>
							</option>
						</select>
					</div> 	
				</li>
			</ul>
        </div>
    </div>

    <div class="row sfsi_plus_mobile_iconsalign_setting">
    	<div class="sfsi_plus_mobile_section_heading_align"><?php _e("Need different selections for mobile?", SFSI_PLUS_DOMAIN); ?></div>
        <ul class="sfsi_plus_mobile_selection_alignment">
        	<li>
            	<?php
					$check = (isset($option5['sfsi_plus_mobile_icon_alignment_setting']) && $option5['sfsi_plus_mobile_icon_alignment_setting'] == 'no')
						? 'checked="checked"'
						: '';
				?>
            	<input type="radio" name="sfsi_plus_mobile_icon_alignment_setting" class="styled" value="no" <?php echo $check; ?>/>
                <label><?php _e("No", SFSI_PLUS_DOMAIN); ?></label>
            </li>
            <li>
            	<?php
					$check = (isset($option5['sfsi_plus_mobile_icon_alignment_setting']) && $option5['sfsi_plus_mobile_icon_alignment_setting'] == 'yes')
						? 'checked="checked"'
						: '';
				?>
            	<input type="radio" name="sfsi_plus_mobile_icon_alignment_setting" class="styled" value="yes" <?php echo $check; ?>/>
                <label><?php _e("Yes", SFSI_PLUS_DOMAIN); ?></label>
            </li>
        </ul>
        
        <div class="icons_size sfsi_plus_mobile_icons_alignment_setting_wrpr" style="<?php echo (isset($option5['sfsi_plus_mobile_icon_alignment_setting']) && $option5['sfsi_plus_mobile_icon_alignment_setting'] == 'yes')? 'display:block' : 'display:none'; ?>">
        	<div class="mobile_icons_size">
        	<ul class="sfsi_plus_new_alignment_mobile_option">
				<!--<li>
					<span class="sfsi_plus_new_alignment_mobilespan" style="line-height: 48px;">
						<?php  _e( 'Show icons', SFSI_PLUS_DOMAIN ); ?>
					</span>
					<div class="field">
						 <select name="sfsi_plus_mobile_horizontal_verical_Alignment" id="sfsi_plus_mobile_horizontal_verical_Alignment" class="styled">
							<option value="Horizontal" <?php echo ($option5['sfsi_plus_mobile_horizontal_verical_Alignment']=='Horizontal') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Horizontally', SFSI_PLUS_DOMAIN ); ?>
							</option>
							<option value="Vertical" <?php echo ($option5['sfsi_plus_mobile_horizontal_verical_Alignment']=='Vertical') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Vertically', SFSI_PLUS_DOMAIN ); ?>
							</option>
						</select>    
					</div>	
				</li>-->

				<li class="sfsi_plus_horiZontal_mobile_slideup">
					<span>
						<?php  _e( 'Icons per row:', SFSI_PLUS_DOMAIN ); ?>
					</span>
					
					<input name="sfsi_plus_mobile_icons_perRow" type="text" value="<?php echo ($option5['sfsi_plus_mobile_icons_perRow']!='') ?  $option5['sfsi_plus_mobile_icons_perRow'] : '' ;?>" />
					
					<ins class="leave_empty">
						<span><?php  _e( 'Leave empty if you dont want to define this', SFSI_PLUS_DOMAIN ); ?></span>
					</ins>
				</li>
				<li class="sfsi_plus_new_alignment_li_mobile">
					<div class="sfsi_plus_new_align_mobile_div">
						<span class="sfsi_plus_new_alignment_mobilespan">
							<?php  _e( 'Alignment of icons within a widget:', SFSI_PLUS_DOMAIN ); ?>
						</span>
						<div class="field">
							<select name="sfsi_plus_mobile_icons_Alignment_via_widget" id="sfsi_plus_mobile_icons_Alignment_via_widget" class="styled">
								<option value="center" <?php echo ($option5['sfsi_plus_mobile_icons_Alignment_via_widget']=='center') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Centered', SFSI_PLUS_DOMAIN ); ?>
								</option>
								<option value="right" <?php echo ($option5['sfsi_plus_mobile_icons_Alignment_via_widget']=='right') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Right', SFSI_PLUS_DOMAIN ); ?>
								</option>
								<option value="left" <?php echo ($option5['sfsi_plus_mobile_icons_Alignment_via_widget']=='left') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Left', SFSI_PLUS_DOMAIN ); ?>
								</option>
							</select>
						</div> 	
				    </div>
				    <div>
					    <span class="sfsi_plus_new_alignment_mobilespan">
							<?php  _e( 'Alignment of icons if placed via shortcode', SFSI_PLUS_DOMAIN ); ?>
						</span>
						<div class="field">
							<select name="sfsi_plus_mobile_icons_Alignment_via_shortcode" id="sfsi_plus_mobile_icons_Alignment_via_shortcode" class="styled">
								<option value="center" <?php echo ($option5['sfsi_plus_mobile_icons_Alignment_via_shortcode']=='center') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Centered', SFSI_PLUS_DOMAIN ); ?>
								</option>
								<option value="right" <?php echo ($option5['sfsi_plus_mobile_icons_Alignment_via_shortcode']=='right') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Right', SFSI_PLUS_DOMAIN ); ?>
								</option>
								<option value="left" <?php echo ($option5['sfsi_plus_mobile_icons_Alignment_via_shortcode']=='left') ?  'selected="selected"' : '' ;?>>
									<?php  _e( 'Left', SFSI_PLUS_DOMAIN ); ?>
								</option>
							</select>
						</div>
					</div>	
				</li>
				<li>
					<span class="sfsi_plus_new_alignment_mobilespan">
						
						<?php _e( 'Alignment of icons In second row ', SFSI_PLUS_DOMAIN ); ?>
						<p><?php  _e( '(with respect to icons in first row; only relevant if your icons show in two or more rows):', SFSI_PLUS_DOMAIN ); ?></p>
					</span>
					<div class="field">
						<select name="sfsi_plus_mobile_icons_Alignment" id="sfsi_plus_mobile_icons_Alignment" class="styled">
							<option value="center" <?php echo ($option5['sfsi_plus_mobile_icons_Alignment']=='center') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Centered', SFSI_PLUS_DOMAIN ); ?>
							</option>
							<option value="right" <?php echo ($option5['sfsi_plus_mobile_icons_Alignment']=='right') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Right', SFSI_PLUS_DOMAIN ); ?>
							</option>
							<option value="left" <?php echo ($option5['sfsi_plus_mobile_icons_Alignment']=='left') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Left', SFSI_PLUS_DOMAIN ); ?>
							</option>
						</select>
					</div> 	
				</li>
			</ul>
        </div>
            
    	</div>
    </div>

    <!-- Sharing Text & Pictures section STARTS  here -->
        <?php include(SFSI_PLUS_DOCROOT.'/views/subviews/que6/sfsi_option_view6_sharing_text_pictures.php'); ?>
    <!-- Sharing Text & Pictures section CLOSES  here -->

    
<!-- ********************************* url shortner STARTS *********************************************************** -->

		<div class="row sfsi_plus_mobile_icons_setting sfsi_url_shortner_section">
			    <div class="sfsi_custom_social_data_section_heading"><?php _e("URL Shortening", SFSI_PLUS_DOMAIN); ?></div>      
			</div>

		<div class="row sfsi_plus_url_shorting_api_type_setting">
			
		    	<p><?php _e('The URL Shortener will change your shared urls into shorter urls. This is especially important for Twitter (due to the 140 character limit) but also for other sharing your content will look less clunky.', SFSI_PLUS_DOMAIN); ?>
		    	<br/>
		    	
		    	<h4>A) <?php _e('Which URL Shortener do you want to use?',SFSI_PLUS_DOMAIN); ?></h4>
		        
		        <ul class="sfsi_plus_mobile_selection">        
		        	<li>
		            	<?php
							$scheck = (isset($option5['sfsi_plus_url_shorting_api_type_setting']) && $option5['sfsi_plus_url_shorting_api_type_setting'] == 'no')
								? 'checked="checked"'
								: '';
						?>
		            	<input type="radio" name="sfsi_plus_url_shorting_api_type_setting" class="styled" value="no" <?php echo $scheck; ?>/>
		                <label><?php _e("None", SFSI_PLUS_DOMAIN); ?></label>
		            </li>
		            <li>
		            	<?php
							$bcheck = (isset($option5['sfsi_plus_url_shorting_api_type_setting']) && $option5['sfsi_plus_url_shorting_api_type_setting'] == 'bitly')
								? 'checked="checked"'
								: '';
						?>
		            	<input type="radio" name="sfsi_plus_url_shorting_api_type_setting" class="styled" value="bitly" <?php echo $bcheck; ?>/>
		                <label><?php _e("Bitly", SFSI_PLUS_DOMAIN); ?></label>
		            </li>
		            <li>
		            	<?php
							$gcheck = (isset($option5['sfsi_plus_url_shorting_api_type_setting']) && $option5['sfsi_plus_url_shorting_api_type_setting'] == 'google')
								? 'checked="checked"'
								: '';
						?>
		            	<input type="radio" name="sfsi_plus_url_shorting_api_type_setting" class="styled" value="google" <?php echo $gcheck; ?>/>
		                <label><?php _e("Google API", SFSI_PLUS_DOMAIN); ?></label>
		            </li>            
		        </ul>

		        <?php 
		        	if(isset($option5['sfsi_plus_url_shorting_api_type_setting']) && $option5['sfsi_plus_url_shorting_api_type_setting'] == 'bitly'){
		        			$bcheckDisplay = "display:block";
		        			$gcheckDisplay = "display:none";
		        	}
		        	else if(isset($option5['sfsi_plus_url_shorting_api_type_setting']) && $option5['sfsi_plus_url_shorting_api_type_setting'] == 'google'){
		        			$bcheckDisplay = "display:none";
		        			$gcheckDisplay = "display:block";
		        	}
		        	else{
		        			$bcheckDisplay = "display:none";
		        			$gcheckDisplay = "display:none";		        		
		        	}
		        ?>

		        <div class="sfsi_plus_bitly_access_token" style="<?php echo $bcheckDisplay; ?>">
		        	<label><?php _e('Enter your (free) bitly access token:',SFSI_PLUS_DOMAIN); ?><br/>
		        		<?php _e("(You can get it <a target='_blank' href='https://bitly.com/a/oauth_apps'>here</a>)",SFSI_PLUS_DOMAIN); ?>
		        	</label>
		        	<input type="text" name="sfsi_plus_url_shortner_bitly_key" value="<?php echo $option5['sfsi_plus_url_shortner_bitly_key']; ?>" style="width:40%;min-height: 40px;">
		        </div>

		        <div class="sfsi_plus_google_key"  style="<?php echo $gcheckDisplay; ?>">
		        	<label><?php _e('Enter your Google API key:',SFSI_PLUS_DOMAIN); ?></label>
		        	<input type="text" name="sfsi_plus_url_shortner_google_key" value="<?php echo $option5['sfsi_plus_url_shortner_google_key']; ?>" style="width:40%;min-height: 40px;">
		        </div>


				<div class="sfsi_premium_url_shortner_icons_list">
					
			    	<h4>B) <?php _e("Use url shortner for sharing with:", SFSI_PLUS_DOMAIN); ?></h4>

					<?php 
						$arrAllIcons 	= array('twitter','facebook','email');
						$aCount			= count($arrAllIcons); 

						$arrSelectedIcons   = unserialize($option5['sfsi_premium_url_shortner_icons_names_list']);
						$sCount 	= is_array($arrSelectedIcons) ? count($arrSelectedIcons) : 0;
					?>

					<ul>

 						<?php if($aCount>0):
 						
							foreach($arrAllIcons as $value) { 

								$ichecked = "";
								
								if($sCount>0){
									if(in_array($value, $arrSelectedIcons)){
										$ichecked = "checked=true";
									}
								}
								?>
			               		<li>
									<div class="radio_section tb_4_ck">
									<input <?php echo $ichecked; ?> data-usl="sfsi_premium_url_shortner_icons_names_list" name="sfsi_premium_url_shortner_icons_names_list[]" type="checkbox" value="<?php echo esc_attr($value); ?>" class="styled"  />
										<label class="cstmdsplsub"><?php echo ucfirst($value); ?></label>
									</div>						
								</li>
							<?php }

						endif;?>

					</ul>	
				</div>

			</div>

<!-- ***************************** url shortner CLOSES ************************************************************************* -->
    
	<!-- icon's select language optins start here -->
    <div class="row">
		<h4>
    	    <?php  _e( 'Language & Button-text', SFSI_PLUS_DOMAIN ); ?>
    	</h4>
		<!-- Follow button start here -->
		<div class="icons_size">
        	<div class="follows-btn">
				<span><?php  _e( 'Follow-button:', SFSI_PLUS_DOMAIN ); ?></span>
        	</div>
			<div class="field language-field">
				 <?php selectoption("sfsi_plus_follow_icons_language" , "Follow" , "Subscribe"); ?>
			</div>
			<div class="preview-btn">
        		<span><?php  _e( 'Preview:', SFSI_PLUS_DOMAIN ); ?></span>
			</div>
			<?php
				$follow_icons = $option5['sfsi_plus_follow_icons_language'];
				$visit_icon = SFSI_PLUS_PLUGURL."images/visit_icons/Follow/icon_".$follow_icons.".png";
				if(isset($follow_icons) && !empty($follow_icons))
				{
					?>
					<div class="social-img-link"><img src="<?php echo $visit_icon; ?>" alt=""  /></div>
			<?php } ?>
		</div>
		
		<!-- Facebook «Visit»-icon start here -->
		<div class="icons_size">
        	<div class="follows-btn">
        		<span><?php  _e( 'Facebook «Visit»-icon:', SFSI_PLUS_DOMAIN ); ?></span>
			</div>
			<div class="field language-field">
				<?php selectoption("sfsi_plus_facebook_icons_language" , "Visit_us" , "Visit_me"); ?>
			</div>
			<div class="preview-btn">
        		<span><?php  _e( 'Preview:', SFSI_PLUS_DOMAIN ); ?></span>
        	</div>
			<?php
				$facebook_icons_lang = $option5['sfsi_plus_facebook_icons_language'];
				$visit_icon = $visit_iconsUrl."Visit_us_fb/icon_".$facebook_icons_lang.".png";
				if(isset($facebook_icons_lang) && !empty($facebook_icons_lang))
				{
					?>
					<div class="social-img-link"><img src="<?php echo $visit_icon; ?>" alt=""  /></div>
			<?php } ?>			
		</div>
		
		<!-- Twitter «Visit»-icon start here -->
		<div class="icons_size">
        	<div class="follows-btn">
        		<span><?php  _e( 'Twitter «Visit»-icon:', SFSI_PLUS_DOMAIN ); ?></span>
        	</div>
			<div class="field language-field">
				 <?php selectoption("sfsi_plus_twitter_icons_language" , "Visit_us" , "Visit_me"); ?>
			</div>
			<div class="preview-btn">
        		<span><?php  _e( 'Preview:', SFSI_PLUS_DOMAIN ); ?></span>
        	</div>
			<?php
				$twitter_icons_lang = $option5['sfsi_plus_twitter_icons_language'];
				$visit_icon = $visit_iconsUrl."Visit_us_twitter/icon_".$twitter_icons_lang.".png";
				if(isset($twitter_icons_lang) && !empty($twitter_icons_lang))
				{
					?>					
					<div class="social-img-link"><img src="<?php echo $visit_icon; ?>" alt=""  /></div>
			<?php } ?>
		</div>
		
		<!-- Google+ «Visit»-icon start here -->
		<div class="icons_size">
        	<div class="follows-btn">
        		<span><?php  _e( 'Google+ «Visit»-icon:', SFSI_PLUS_DOMAIN ); ?></span>
        	</div>
			<div class="field language-field">
				<?php selectoption("sfsi_plus_google_icons_language" , "Visit_us" , "Visit_me"); ?>
			</div>
			<div class="preview-btn">
        		<span><?php  _e( 'Preview:', SFSI_PLUS_DOMAIN ); ?></span>
        	</div>
			<?php
				$google_icons_lang = $option5['sfsi_plus_google_icons_language'];
				$visit_icon = $visit_iconsUrl."Visit_us_google/icon_".$google_icons_lang.".png";
				if(isset($google_icons_lang) && !empty($google_icons_lang))
				{
					?>					
					<div class="social-img-link"><img src="<?php echo $visit_icon; ?>" alt=""  /></div>
			<?php } ?>
		</div>

		<!-- Like & Share buttons (Facebook, Twitter, Google+) start here -->
		<div class="icons_size">
        	<span>
        		<?php  _e( 'Language for Like & Share buttons (Facebook, Twitter, Google+):', SFSI_PLUS_DOMAIN ); ?>
        	</span>
			<div class="language_field">
				<select name="sfsi_plus_icons_language" id="sfsi_plus_icons_language" class="language">
					<option value="ar_AR" <?php echo ($option5['sfsi_plus_icons_language']=='ar_AR') ?  'selected="selected"' : '' ;?>>
						العربية 
					</option>
					<option value="az_AZ" <?php echo ($option5['sfsi_plus_icons_language']=='az_AZ') ?  'selected="selected"' : '' ;?>>
						Azərbaycan dili
					</option>
					<option value="af_ZA" <?php echo ($option5['sfsi_plus_icons_language']=='af_ZA') ?  'selected="selected"' : '' ;?>>
						Afrikaans
					<option value="bg_BG" <?php echo ($option5['sfsi_plus_icons_language']=='bg_BG') ?  'selected="selected"' : '' ;?>>
						Български
					</option>
					<option value="ms_MY" <?php echo ($option5['sfsi_plus_icons_language']=='ms_MY') ?  'selected="selected"' : '' ;?>>
						Bahasa Melayu‎
					</option>
					<option value="bn_IN" <?php echo ($option5['sfsi_plus_icons_language']=='bn_IN') ?  'selected="selected"' : '' ;?>>
						বাংলা
					</option>
					<option value="bs_BA" <?php echo ($option5['sfsi_plus_icons_language']=='bs_BA') ?  'selected="selected"' : '' ;?>>
						Bosanski
					</option>
					<option value="ca_ES" <?php echo ($option5['sfsi_plus_icons_language']=='ca_ES') ?  'selected="selected"' : '' ;?>>
						Català
					</option>
					<option value="cy_GB" <?php echo ($option5['sfsi_plus_icons_language']=='cy_GB') ?  'selected="selected"' : '' ;?>>
						Cymraeg
					</option>
					<option value="da_DK" <?php echo ($option5['sfsi_plus_icons_language']=='da_DK') ?  'selected="selected"' : '' ;?>>
						Dansk
					</option>
					<option value="de_DE" <?php echo ($option5['sfsi_plus_icons_language']=='de_DE') ?  'selected="selected"' : '' ;?>>
						Deutsch
					</option>
					<option value="en_US" <?php echo ($option5['sfsi_plus_icons_language']=='en_US') ?  'selected="selected"' : '' ;?>>
						English (United States)
					</option>
					<option value="el_GR" <?php echo ($option5['sfsi_plus_icons_language']=='el_GR') ?  'selected="selected"' : '' ;?>>
						Ελληνικά
					</option>
					<option value="eo_EO" <?php echo ($option5['sfsi_plus_icons_language']=='eo_EO') ?  'selected="selected"' : '' ;?>>
						Esperanto
					</option>
					<option value="es_ES" <?php echo ($option5['sfsi_plus_icons_language']=='es_ES') ?  'selected="selected"' : '' ;?>>
						Español
					</option>
					<option value="et_EE" <?php echo ($option5['sfsi_plus_icons_language']=='et_EE') ?  'selected="selected"' : '' ;?>>
						Eesti
					</option>
					<option value="eu_ES" <?php echo ($option5['sfsi_plus_icons_language']=='eu_ES') ?  'selected="selected"' : '' ;?>>
						Euskara
					</option>
					<option value="fa_IR" <?php echo ($option5['sfsi_plus_icons_language']=='fa_IR') ?  'selected="selected"' : '' ;?>>
						فارسی
					</option>
					<option value="fi_FI" <?php echo ($option5['sfsi_plus_icons_language']=='fi_FI') ?  'selected="selected"' : '' ;?>>
						Suomi
					</option>
					<option value="fr_FR" <?php echo ($option5['sfsi_plus_icons_language']=='fr_FR') ?  'selected="selected"' : '' ;?>>
						Français
					</option>
					<option value="gl_ES" <?php echo ($option5['sfsi_plus_icons_language']=='gl_ES') ?  'selected="selected"' : '' ;?>>
						Galego
					</option>
					<option value="he_IL" <?php echo ($option5['sfsi_plus_icons_language']=='he_IL') ?  'selected="selected"' : '' ;?>>
						עִבְרִית
					</option>
					<option value="hi_IN" <?php echo ($option5['sfsi_plus_icons_language']=='hi_IN') ?  'selected="selected"' : '' ;?>>
						हिन्दी
					</option>
					<option value="hr_HR" <?php echo ($option5['sfsi_plus_icons_language']=='hr_HR') ?  'selected="selected"' : '' ;?>>
						Hrvatski
					</option>
					<option value="hu_HU" <?php echo ($option5['sfsi_plus_icons_language']=='hu_HU') ?  'selected="selected"' : '' ;?>>
						Magyar
					</option>
					<option value="hy_AM" <?php echo ($option5['sfsi_plus_icons_language']=='hy_AM') ?  'selected="selected"' : '' ;?>>
						Հայերեն
					</option>
					<option value="id_ID" <?php echo ($option5['sfsi_plus_icons_language']=='id_ID') ?  'selected="selected"' : '' ;?>>
						Bahasa Indonesia
					</option>
					<option value="is_IS" <?php echo ($option5['sfsi_plus_icons_language']=='is_IS') ?  'selected="selected"' : '' ;?>>
						Íslenska
					</option>
					<option value="it_IT" <?php echo ($option5['sfsi_plus_icons_language']=='it_IT') ?  'selected="selected"' : '' ;?>>
						Italiano
					</option>
					<option value="ja_JP" <?php echo ($option5['sfsi_plus_icons_language']=='ja_JP') ?  'selected="selected"' : '' ;?>>
						日本語
					</option>
					<option value="ko_KR" <?php echo ($option5['sfsi_plus_icons_language']=='ko_KR') ?  'selected="selected"' : '' ;?>>
						한국어
					</option>
					<option value="lt_LT" <?php echo ($option5['sfsi_plus_icons_language']=='lt_LT') ?  'selected="selected"' : '' ;?>>
						Lietuvių kalba
					</option>
					<option value="my_MM" <?php echo ($option5['sfsi_plus_icons_language']=='my_MM') ?  'selected="selected"' : '' ;?>>
						ဗမာစာ
					</option>
					<option value="nl_NL" <?php echo ($option5['sfsi_plus_icons_language']=='nl_NL') ?  'selected="selected"' : '' ;?>>
						Nederlands
					</option>
					<option value="nn_NO" <?php echo ($option5['sfsi_plus_icons_language']=='nn_NO') ?  'selected="selected"' : '' ;?>>
						Norsk nynorsk
					</option>
					<option value="pl_PL" <?php echo ($option5['sfsi_plus_icons_language']=='pl_PL') ?  'selected="selected"' : '' ;?>>
						Polski
					</option>
					<option value="ps_AF" <?php echo ($option5['sfsi_plus_icons_language']=='ps_AF') ?  'selected="selected"' : '' ;?>>
						پښتو
					</option>
					<option value="pt_BR" <?php echo ($option5['sfsi_plus_icons_language']=='pt_BR') ?  'selected="selected"' : '' ;?>>
						Português do Brasil
					</option>
					<option value="ro_RO" <?php echo ($option5['sfsi_plus_icons_language']=='ro_RO') ?  'selected="selected"' : '' ;?>>
						Română
					</option>
					<option value="ru_RU" <?php echo ($option5['sfsi_plus_icons_language']=='ru_RU') ?  'selected="selected"' : '' ;?>>
						Русский
					</option>
					<option value="sk_SK" <?php echo ($option5['sfsi_plus_icons_language']=='sk_SK') ?  'selected="selected"' : '' ;?>>
						Slovenčina
					</option>
					<option value="sl_SI" <?php echo ($option5['sfsi_plus_icons_language']=='sl_SI') ?  'selected="selected"' : '' ;?>>
						Slovenščina
					</option>
					<option value="sq_AL" <?php echo ($option5['sfsi_plus_icons_language']=='sq_AL') ?  'selected="selected"' : '' ;?>>
						Shqip
					</option>
					<option value="sr_RS" <?php echo ($option5['sfsi_plus_icons_language']=='sr_RS') ?  'selected="selected"' : '' ;?>>
						Српски језик
					</option>
					<option value="sv_SE" <?php echo ($option5['sfsi_plus_icons_language']=='sv_SE') ?  'selected="selected"' : '' ;?>>
						Svenska
					</option>
					<option value="th_TH" <?php echo ($option5['sfsi_plus_icons_language']=='th_TH') ?  'selected="selected"' : '' ;?>>
						ไทย
					</option>
					<option value="tl_PH" <?php echo ($option5['sfsi_plus_icons_language']=='tl_PH') ?  'selected="selected"' : '' ;?>>
						Tagalog
					</option>
					<option value="tr_TR" <?php echo ($option5['sfsi_plus_icons_language']=='tr_TR') ?  'selected="selected"' : '' ;?>>
						Türkçe
					</option>
					<option value="ug_CN" <?php echo ($option5['sfsi_plus_icons_language']=='ug_CN') ?  'selected="selected"' : '' ;?>>
						Uyƣurqə
					</option>
					<option value="uk_UA" <?php echo ($option5['sfsi_plus_icons_language']=='uk_UA') ?  'selected="selected"' : '' ;?>>
						Українська
					</option>
					<option value="vi_VN" <?php echo ($option5['sfsi_plus_icons_language']=='vi_VN') ?  'selected="selected"' : '' ;?>>
						Tiếng Việt
					</option>
					<option value="zh_CN" <?php echo ($option5['sfsi_plus_icons_language']=='zh_CN') ?  'selected="selected"' : '' ;?>>
						简体中文
					</option>
					<option value="cs_CZ" <?php echo ($option5['sfsi_plus_icons_language']=='cs_CZ') ?  'selected="selected"' : '' ;?>>
						Čeština
					</option>
					<option value="ur_PK" <?php echo ($option5['sfsi_plus_icons_language']=='ur_PK') ?  'selected="selected"' : '' ;?>>
						اردو‎
					</option>
				</select>
			</div>
		</div>
	</div>

    <div class="row new_wind">
    	        
        <h4>
			<?php  _e( 'If user clicks on your icons, where do you want to open the page?', SFSI_PLUS_DOMAIN ); ?>
        </h4>
        
        <div class="sfsiplus_row_onl">

        	<?php $key_db = 'sfsi_plus_icons_ClickPageOpen' ; ?>

            <ul class="enough_waffling">
                
                <li>
                    <input name="sfsi_plus_icons_ClickPageOpen" <?php echo ( 'no' == $option5[$key_db]) ?  'checked="checked"' : '' ;?> type="radio" value="no" class="styled"  />
                    <label>
                    	<?php  _e( 'Current Tab', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
                
                <li>
                    <input name="sfsi_plus_icons_ClickPageOpen" <?php echo ( 'window' == $option5[$key_db]) ?  'checked="checked"' : '' ;?> type="radio" value="window" class="styled"  />
                    <label>
                    	<?php  _e( 'New Window', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>

                <li>
                    <input name="sfsi_plus_icons_ClickPageOpen" <?php echo ('tab' == $option5[$key_db]) ?  'checked="checked"' : '' ;?> type="radio" value="tab" class="styled" />
                    <label>
                    	<?php  _e( 'New Tab', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>

            </ul>

      	</div>
    </div>
   <!-- END icon's size and spacing section -->
   
     <!-- icon's floating and stick section start here -->	
    <div class="row sticking">
    	<h4>
            <?php  _e( 'Disable auto-scaling on mobile', SFSI_PLUS_DOMAIN ); ?>
        </h4>
        <p>
            <?php  _e( 'If you decided to show your icons via a widget, you can add the effect that when the user scrolls down, the icons will stick at the  top of the screen so that they are still displayed even if the user scrolled all the way down. Do you want to do that?', SFSI_PLUS_DOMAIN ); ?>
        </p>
		<div class="space">
        	<!--<p class="list">Make icons stick?</p>-->	
            <ul class="enough_waffling">
            	<li>
                	<input name="sfsi_plus_icons_stick" <?php echo ($option5['sfsi_plus_icons_stick']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
                    <label>
                    	<?php  _e( 'Yes', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
                <li>
                	<input name="sfsi_plus_icons_stick" <?php echo ($option5['sfsi_plus_icons_stick']=='no') ?  'checked="true"' : '' ;?>  type="radio" value="no" class="styled" />
                    <label>
                    	<?php  _e( 'No', SFSI_PLUS_DOMAIN ); ?>
                    </label>
               	</li>
            </ul>
    	</div>
  	
    	<!--disable float icons-->
  		<!--<div class="space disblfltonmbl">
            <p class="list">
            	<?php // _e( 'Disable float icons on mobile devices', SFSI_PLUS_DOMAIN ); ?>
            </p>	
            <ul class="enough_waffling">
                <li>
                	<input name="sfsi_plus_disable_floaticons" <?php //echo ($option5['sfsi_plus_disable_floaticons']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
                    <label>
                    	<?php  //_e( 'Yes', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
                <li>
                    <input name="sfsi_plus_disable_floaticons" <?php //echo ($option5['sfsi_plus_disable_floaticons']=='no') ?  'checked="true"' : '' ;?>  type="radio" value="no" class="styled" />
                    <label>
                    	<?php //_e( 'No', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
            </ul>
  		</div>-->
  		<!--disable float icons-->
  	
    	<!--disabling view port meta tag-->
  		<div class="space disblfltonmbl">
            <p class="list">
                <?php  _e( 'Disable auto-scaling feature for mobile devices ("viewport" meta tag)', SFSI_PLUS_DOMAIN ); ?>
            </p>	
            <ul class="enough_waffling">
            	<li>
                    <input name="sfsi_plus_disable_viewport" <?php echo ($sfsi_plus_disable_viewport=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
                    <label>
                    	<?php  _e( 'Yes', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
                <li>
                    <input name="sfsi_plus_disable_viewport" <?php echo ($sfsi_plus_disable_viewport=='no') ?  'checked="true"' : '' ;?>  type="radio" value="no" class="styled" />
                    <label>
                    	<?php  _e( 'No', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
            </ul>
  		</div>
  		<!--disabling view port meta tag-->
	</div>
	<!-- END icon's floating and stick section -->
 
	<!-- mouse over text section start here -->
	<div class="row mouse_txt">
        <h4>
            <?php  _e( 'Mouseover text', SFSI_PLUS_DOMAIN ); ?>
        </h4>
        <p>
            <?php  _e('If you’ve given your icon only one function (i.e. no pop-up where user can perform different actions) then you can define here what text will be displayed if a user moves his mouse over the icon:', SFSI_PLUS_DOMAIN ); ?>
        </p>
		
        <div class="space">
			<div class="clear"></div>
			<div class="mouseover_field sfsiplus_rss_section">
                <label>
                    RSS:
                </label>
            	<input name="sfsi_plus_rss_MouseOverText" value="<?php echo ($option5['sfsi_plus_rss_MouseOverText']!='') ?  $option5['sfsi_plus_rss_MouseOverText'] : '' ;?>" type="text" />
			</div>
            <div class="mouseover_field sfsiplus_email_section">
                <label>
                   Email:
                </label>
                <input name="sfsi_plus_email_MouseOverText" value="<?php echo ($option5['sfsi_plus_email_MouseOverText']!='') ?  $option5['sfsi_plus_email_MouseOverText'] : '' ;?>" type="text" />
            </div>
            <div class="clear">
            	<div class="mouseover_field sfsiplus_twitter_section">
                	<label>
                        Twitter:
                    </label>
                    <input name="sfsi_plus_twitter_MouseOverText" value="<?php echo ($option5['sfsi_plus_twitter_MouseOverText']!='') ?  $option5['sfsi_plus_twitter_MouseOverText'] : '' ;?>" type="text" />
                </div>
                <div class="mouseover_field sfsiplus_fb_section">
                    <label>
                        Facebook:
                    </label>
                    <input name="sfsi_plus_facebook_MouseOverText" value="<?php echo ($option5['sfsi_plus_facebook_MouseOverText']!='') ?  $option5['sfsi_plus_facebook_MouseOverText'] : '' ;?>" type="text" />
                </div>
            </div>
        
			<div class="clear">
                <div class="mouseover_field sfsiplus_google_section">
                    <label>
                        Google:
                    </label>
                    <input name="sfsi_plus_google_MouseOverText" value="<?php echo ($option5['sfsi_plus_google_MouseOverText']!='') ?  $option5['sfsi_plus_google_MouseOverText'] : '' ;?>"  type="text" />
                </div>
                <div class="mouseover_field sfsiplus_linkedin_section">
                    <label>
                        LinkedIn:
                    </label>
                    <input name="sfsi_plus_linkedIn_MouseOverText" value="<?php echo ($option5['sfsi_plus_linkedIn_MouseOverText']!='') ?  $option5['sfsi_plus_linkedIn_MouseOverText'] : '' ;?>"  type="text" />
                </div>
			</div>
		
        	<div class="clear">
                <div class="mouseover_field sfsiplus_pinterest_section">
                    <label>
                        Pinterest:
                    </label>
                    <input name="sfsi_plus_pinterest_MouseOverText" value="<?php echo ($option5['sfsi_plus_pinterest_MouseOverText']!='') ?  $option5['sfsi_plus_pinterest_MouseOverText'] : '' ;?>" type="text" />
                </div>
                <div class="mouseover_field sfsiplus_youtube_section">
                    <label>
                        Youtube:
                    </label>
                    <input name="sfsi_plus_youtube_MouseOverText" value="<?php echo ($option5['sfsi_plus_youtube_MouseOverText']!='') ?  $option5['sfsi_plus_youtube_MouseOverText'] : '' ;?>" type="text" />
                </div>
			</div>
		
        	<div class="clear">
                <div class="mouseover_field sfsiplus_instagram_section">
                    <label>
                        Instagram:
                    </label>
                    <input name="sfsi_plus_instagram_MouseOverText" value="<?php echo ($option5['sfsi_plus_instagram_MouseOverText']!='') ?  $option5['sfsi_plus_instagram_MouseOverText'] : '' ;?>" type="text" />
                </div>
                <div class="mouseover_field sfsiplus_houzz_section">
                    <label>
                        Houzz:
                    </label>
                    <input name="sfsi_plus_houzz_MouseOverText" value="<?php echo (isset($option5['sfsi_plus_houzz_MouseOverText']) && $option5['sfsi_plus_houzz_MouseOverText']!='') ?  $option5['sfsi_plus_houzz_MouseOverText'] : 'Houzz' ;?>" type="text" />
                </div>
			</div>
            
            <div class="clear">
                <div class="mouseover_field sfsiplus_snapchat_section">
                    <label>
                        Snapchat:
                    </label>
                    <input name="sfsi_plus_snapchat_MouseOverText" value="<?php echo ($option5['sfsi_plus_snapchat_MouseOverText']!='') ?  $option5['sfsi_plus_snapchat_MouseOverText'] : 'Snapchat' ;?>" type="text" />
                </div>
                <div class="mouseover_field sfsiplus_whatsapp_section">
                    <label>
                        WhatsApp:
                    </label>
                    <input name="sfsi_plus_whatsapp_MouseOverText" value="<?php echo (isset($option5['sfsi_plus_whatsapp_MouseOverText']) && $option5['sfsi_plus_whatsapp_MouseOverText']!='') ?  $option5['sfsi_plus_whatsapp_MouseOverText'] : 'Whatsapp' ;?>" type="text" />
                </div>
			</div>
            
            <div class="clear">
                <div class="mouseover_field sfsiplus_skype_section">
                    <label>
                        Skype:
                    </label>
                    <input name="sfsi_plus_skype_MouseOverText" value="<?php echo ($option5['sfsi_plus_skype_MouseOverText']!='') ?  $option5['sfsi_plus_skype_MouseOverText'] : 'Skype' ;?>" type="text" />
                </div>
                <div class="mouseover_field sfsiplus_vimeo_section">
                    <label>
                        Vimeo:
                    </label>
                    <input name="sfsi_plus_vimeo_MouseOverText" value="<?php echo (isset($option5['sfsi_plus_vimeo_MouseOverText']) && $option5['sfsi_plus_vimeo_MouseOverText']!='') ?  $option5['sfsi_plus_vimeo_MouseOverText'] : 'Vimeo' ;?>" type="text" />
                </div>
			</div>
            
            <div class="clear">
                <div class="mouseover_field sfsiplus_soundcloud_section">
                    <label>
                        Soundcloud:
                    </label>
                    <input name="sfsi_plus_soundcloud_MouseOverText" value="<?php echo ($option5['sfsi_plus_soundcloud_MouseOverText']!='') ?  $option5['sfsi_plus_soundcloud_MouseOverText'] : 'Soundcloud' ;?>" type="text" />
                </div>
                <div class="mouseover_field sfsiplus_yummly_section">
                    <label>
                        Yummly:
                    </label>
                    <input name="sfsi_plus_yummly_MouseOverText" value="<?php echo (isset($option5['sfsi_plus_yummly_MouseOverText']) && $option5['sfsi_plus_yummly_MouseOverText']!='') ?  $option5['sfsi_plus_yummly_MouseOverText'] : 'Yummly' ;?>" type="text" />
                </div>
			</div>
            
            <div class="clear">
                <div class="mouseover_field sfsiplus_flickr_section">
                    <label>
                        Flickr:
                    </label>
                    <input name="sfsi_plus_flickr_MouseOverText" value="<?php echo ($option5['sfsi_plus_flickr_MouseOverText']!='') ?  $option5['sfsi_plus_flickr_MouseOverText'] : 'Flickr' ;?>" type="text" />
                </div>
                <div class="mouseover_field sfsiplus_reddit_section">
                    <label>
                        Reddit:
                    </label>
                    <input name="sfsi_plus_reddit_MouseOverText" value="<?php echo (isset($option5['sfsi_plus_reddit_MouseOverText']) && $option5['sfsi_plus_reddit_MouseOverText']!='') ?  $option5['sfsi_plus_reddit_MouseOverText'] : 'Reddit' ;?>" type="text" />
                </div>
			</div>
            
            <div class="clear">
                <div class="mouseover_field sfsiplus_tumblr_section">
                    <label>
                        Tumblr:
                    </label>
                    <input name="sfsi_plus_tumblr_MouseOverText" value="<?php echo ($option5['sfsi_plus_tumblr_MouseOverText']!='') ?  $option5['sfsi_plus_tumblr_MouseOverText'] : 'Tumblr' ;?>" type="text" />
                </div>
            </div>
            
        	<div class="clear"> </div>
        	<div class="plus_custom_m">
				<?php 
                    $sfsiMouseOverTexts =  unserialize($option5['sfsi_plus_custom_MouseOverTexts']);
                    $count=1; for($i=$first_key; $i<=$endkey; $i++) :
                ?> 
            	<?php if(!empty( $icons[$i])) : ?>
                    
                    <div class="mouseover_field sfsiplus_custom_section sfsiICON_<?php echo $i; ?>">
                        <label>
                            <?php  _e( 'Custom', SFSI_PLUS_DOMAIN ); ?>
                            <?php echo $count; ?>:
                        </label>
                        <input name="sfsi_plus_custom_MouseOverTexts[]" value="<?php echo (isset($sfsiMouseOverTexts[$i]) && $sfsiMouseOverTexts[$i]!='') ?  sanitize_text_field($sfsiMouseOverTexts[$i]) : '' ;?>" type="text" file-id="<?php echo $i; ?>" />
                    </div>
                	<?php if($count%2==0): ?>
                		<div class="clear"></div>  
					<?php endif; ?>
            		<?php $count++; 
				endif; endfor; ?>
			</div>
		</div>
	</div>
    <!-- END mouse over text section -->
     <!--  Facebook liking section start -->
    
    <div class='row'>
    	<h4>
            <?php  _e( 'Facebook liking & sharing', SFSI_PLUS_DOMAIN ); ?>
        </h4>
        <div class="sfsi_plus_facebook_linking_div">
        	<p>
        	    <?php  _e( 'If a user clicks on the Facebook «Like»-button, then:', SFSI_PLUS_DOMAIN ); ?>
            </p>
            <ul class="sfsi_plus_Facebook_linking_container">
				<li>
					<div class="sfsiplusFacebook_linking">
						<input name="sfsi_plus_Facebook_linking" <?php echo ($option5['sfsi_plus_Facebook_linking']=='facebookurl') ?  'checked="checked"' : '' ;?> type="radio" value="facebookurl" class="styled" />
					</div>
					<p>
						<?php  _e('The page where the button appears should be liked', SFSI_PLUS_DOMAIN); ?>
                    </p>
				</li>
				<li>
					<div class="sfsiplusFacebook_linking">
						<input name="sfsi_plus_Facebook_linking" <?php echo ($option5['sfsi_plus_Facebook_linking']=='facebookcustomurl') ?  'checked="checked"' : '' ;?> type="radio" value="facebookcustomurl" class="styled" />
					</div>
					<p class="sfsi_plus_facebooklinking_paragraph">
						<?php
                    		_e('A specific page should be liked (e.g. your Facebook fanpage):', SFSI_PLUS_DOMAIN);
                    	?>
                    </p>
                    <div class="sfsi_plus_facebook_custom_url_field">
                		<input type="text" name="sfsi_plus_facebook_linkingcustom_url" class="add" placeholder="http://"
                		value="<?php echo (isset($option5['sfsi_plus_facebook_linkingcustom_url'])) ? $option5['sfsi_plus_facebook_linkingcustom_url'] : '' ;?>">

                    </div>
				</li>
			</ul>	
        
        </div>
    	
    </div>

    <div class="row">
    	
    	<h4>
            <?php  _e( 'Aggregation of counts on http and https', SFSI_PLUS_DOMAIN ); ?>
        </h4>

        <div class="sfsi_fb_cumulative_note">
        	<p><?php _e('This is useful if you switched your site from http to https. The Facebook share/like counts, as well as the Pinterest counts, are per url, so if the url changes (e.g. because you switched to https) then it is considered a completely new page, and starts counting again from 0. If you select «Yes» below, then we show the cumulative number of shares from your http and https pages, so that the correct count is displayed.',SFSI_PLUS_DOMAIN ); ?> 
        	</p>
		</div>

        <div class="sfsi_plus_facebook_cumulative_count sfsiCumulatateSection">

			<label><?php _e('Aggregate Facebook counts?', SFSI_PLUS_DOMAIN);?></label>

            <ul class="sfsi_plus_cumulativecount_ul">

				<li>
					<div class="sfsi_plus_cumulative_count_radio">
						<input name="sfsi_plus_facebook_cumulative_count_active" <?php echo ($sfsi_plus_facebook_cumulative_count_active=='no') ?  'checked="checked"' : '' ;?> type="radio" value="no" class="styled" />
					</div>

					<label><?php  _e('No', SFSI_PLUS_DOMAIN); ?></label>
				</li>
				<li>
					<div class="sfsi_plus_cumulative_count_radio">
						<input name="sfsi_plus_facebook_cumulative_count_active" <?php echo ($sfsi_plus_facebook_cumulative_count_active=='yes') ?  'checked="checked"' : '' ;?> type="radio" value="yes" class="styled" />
					</div>

					<label><?php  _e('Yes', SFSI_PLUS_DOMAIN); ?></label>

				</li>
			</ul>				        
        	
        </div>

		<div class="sfsi_plus_pinterest_cumulative_count sfsiCumulatateSection">

				<label><?php _e('Aggregate Pinterest counts?', SFSI_PLUS_DOMAIN);?></label>

	            <ul class="sfsi_plus_cumulativecount_ul">

					<li>
						<div class="sfsi_plus_cumulative_count_radio">
							<input name="sfsi_plus_pinterest_cumulative_count_active" <?php echo ($sfsi_plus_pinterest_cumulative_count_active=='no') ?  'checked="checked"' : '' ;?> type="radio" value="no" class="styled" />
						</div>

						<label><?php  _e('No', SFSI_PLUS_DOMAIN); ?></label>
					</li>
					<li>
						<div class="sfsi_plus_cumulative_count_radio">
							<input name="sfsi_plus_pinterest_cumulative_count_active" <?php echo ($sfsi_plus_pinterest_cumulative_count_active=='yes') ?  'checked="checked"' : '' ;?> type="radio" value="yes" class="styled" />
						</div>

						<label><?php  _e('Yes', SFSI_PLUS_DOMAIN); ?></label>

					</li>
				</ul>	
		 </div>


    </div> 

    <!--  tooltip section start -->
    <div class='row'>
    	<h4>
            <?php  _e( 'Tooltips', SFSI_PLUS_DOMAIN ); ?>
        </h4>
        <div class="icons_size">
        	<ul class="sfsi_plus_new_tooltip_option">
				<li>
					<span class="sfsi_plus_new_tooltip_span">
						<?php  _e( 'Tooltip direction:', SFSI_PLUS_DOMAIN ); ?>
					</span>
					<div class="field">
						<select name="sfsi_plus_tooltip_alighn" id="sfsi_plus_tooltip_alighn" class="styled">
							
							<option value="Automatic" <?php echo ($option5['sfsi_plus_tooltip_alighn']=='Automatic') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Automatic', SFSI_PLUS_DOMAIN ); ?>
							</option>
							<option value="up" <?php echo ($option5['sfsi_plus_tooltip_alighn']=='up') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Up', SFSI_PLUS_DOMAIN ); ?>
							</option>
							<option value="down" <?php echo ($option5['sfsi_plus_tooltip_alighn']=='down') ?  'selected="selected"' : '' ;?>>
								<?php  _e( 'Down', SFSI_PLUS_DOMAIN ); ?>
							</option>

						</select>
					</div>
				</li>
				<p class="sfsi_plus_tooltip_para"><?php   _e( '(If you’ve given your icon several functions a tooltip / «pop-up» will show. Here you can define into which direction they should show):', SFSI_PLUS_DOMAIN ); ?></p>
				<li class="sfsi_plus_new_tooltip_li">
					<div class="sfsi_plus_new_tooltip_div">
						<span class="sfsi_plus_new_tooltip_span">
							<?php  _e( 'Tooltip background color :', SFSI_PLUS_DOMAIN ); ?></span>
						<div class="field"> 
			            	<input name="sfsi_plus_tooltip_Color" data-default-color="#FFF" id="sfsi_plus_tooltip_Color" type="text" value="<?php echo ($option5['sfsi_plus_tooltip_Color']!='') ?  $option5['sfsi_plus_tooltip_Color'] : '' ;?>" />
			        	</div>    
					</div>
				</li>
				<li class="sfsi_plus_new_tooltip_li">
					<div class="sfsi_plus_new_tooltip_div">
						<span class="sfsi_plus_new_tooltip_span"><?php  _e( 'Tooltip border color :', SFSI_PLUS_DOMAIN ); ?></span>
						<div class="field">
				            <input name="sfsi_plus_tooltip_border_Color" data-default-color="#e7e7e7" id="sfsi_plus_tooltip_border_Color" type="text" value="<?php echo ($option5['sfsi_plus_tooltip_border_Color']!='') ?  $option5['sfsi_plus_tooltip_border_Color'] : '' ;?>" />
				        </div>    
					</div>
				</li>
			</ul>
		</div>	

    </div>
    
    <!-- Custom CSS (front end) section STARTS  here -->
        <?php include(SFSI_PLUS_DOCROOT.'/views/subviews/que6/sfsi_custom_css.php'); ?>
    <!-- Custom CSS (front end) section CLOSES  here -->

    <!-- Custom CSS (plugin setting page) section STARTS  here -->
        <?php include(SFSI_PLUS_DOCROOT.'/views/subviews/que6/sfsi_custom_admin_css.php'); ?>
    <!-- Custom CSS (plugin setting page) section CLOSES  here -->

    <div class="row new_wind">
    	<h4>
            <?php  _e( 'Disable jquery', SFSI_PLUS_DOMAIN ); ?>
        </h4>    	
        <p>
			<?php  _e( 'Here you can disable our plugin from loading jQuery (which can prevent conflicts if other plugins are also loading jQuery)', SFSI_PLUS_DOMAIN ); ?>
        </p>
        <div class="sfsiplus_row_onl" <?php echo $sfsi_plus_loadjquery; ?>>

            <ul class="enough_waffling">
                <li>
                    <input name="sfsi_plus_loadjquery" <?php echo ($sfsi_plus_loadjquery=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
                    <label>
                    	<?php  _e( 'Enable', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
                <li>
                    <input name="sfsi_plus_loadjquery" <?php echo ($sfsi_plus_loadjquery=='no') ?  'checked="true"' : '' ;?> type="radio" value="no" class="styled" />
                    <label>
                    	<?php  _e( 'Disable', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
            </ul>
      	</div>
    </div>

    <div class="row new_wind">
        <h4>
			<?php  _e( 'Error reporting', SFSI_PLUS_DOMAIN ); ?>
        </h4>
        <div class="sfsiplus_row_onl">
        	<p>
				<?php
					_e( 'Suppress error messages?',SFSI_PLUS_DOMAIN ); ?>
        	</p>
            <ul class="enough_waffling">
                <li>
                    <input name="sfsi_plus_icons_suppress_errors" <?php echo ($sfsi_plus_suppress_errors=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
                    <label>
                    	<?php  _e( 'Yes', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
                <li>
                    <input name="sfsi_plus_icons_suppress_errors" <?php echo ($sfsi_plus_suppress_errors=='no') ?  'checked="true"' : '' ;?> type="radio" value="no" class="styled" />
                    <label>
                    	<?php  _e( 'No', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
            </ul>
      	</div>
    </div>

    <div class="row new_wind">
        
        <h4>
			<?php  _e( 'Do you want the links to be nofollow?', SFSI_PLUS_DOMAIN ); ?>
        </h4>
        
        <div class="sfsiplus_row_onl">

            <ul class="enough_waffling">

                <li>
                    
                    <input name="sfsi_plus_nofollow_links" <?php echo ($sfsi_plus_nofollow_links=='yes') ?  'checked="true"' : '' ; ?> type="radio" value="yes" class="styled"  />
                    
                    <label>
                    	<?php  _e( 'Yes', SFSI_PLUS_DOMAIN ); ?>
                    </label>

                </li>

                <li>
                    
                    <input name="sfsi_plus_nofollow_links" <?php echo ($sfsi_plus_nofollow_links=='no') ?  'checked="true"' : '' ; ?> type="radio" value="no" class="styled" />

                    <label>
                    	<?php  _e( 'No', SFSI_PLUS_DOMAIN ); ?>
                    </label>

                </li>

            </ul>

      	</div>

    </div>


    <!-- SAVE BUTTON SECTION   --> 
    <div class="save_button">
        <img src="<?php echo SFSI_PLUS_PLUGURL ?>images/ajax-loader.gif" class="loader-img" />
        <?php  $nonce = wp_create_nonce("update_plus_step5"); ?>
        <a href="javascript:;" id="sfsi_plus_save5" title="Save" data-nonce="<?php echo $nonce;?>"><?php  _e( 'Save', SFSI_PLUS_DOMAIN ); ?></a>
    </div>
    <!-- END SAVE BUTTON SECTION   -->
    
    <a class="sfsiColbtn closeSec section6sfsiColbtn" href="javascript:;" >
  		<?php  _e( 'Collapse area', SFSI_PLUS_DOMAIN ); ?>
    </a>
    <label class="closeSec"></label>
    
    <!-- ERROR AND SUCCESS MESSAGE AREA-->
    <p class="red_txt errorMsg" style="display:none"> </p>
    <p class="green_txt sucMsg" style="display:none"> </p>
    <div class="clear"></div>
</div>
<!-- END Section 5 "Any other wishes for your main icons?"-->