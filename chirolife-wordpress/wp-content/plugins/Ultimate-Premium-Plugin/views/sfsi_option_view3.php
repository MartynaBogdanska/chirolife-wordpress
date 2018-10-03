<?php
	/* unserialize all saved option for second section options */
    $option3=  unserialize(get_option('sfsi_premium_section3_options',false));
	
	/*
	 * Sanitize, escape and validate values
	 */
	$option3['sfsi_plus_actvite_theme'] 		= 	(isset($option3['sfsi_plus_actvite_theme']))
														? sanitize_text_field($option3['sfsi_plus_actvite_theme'])
														: '';
	$option3['sfsi_plus_mouseOver'] 			= 	(isset($option3['sfsi_plus_mouseOver']))
														? sanitize_text_field($option3['sfsi_plus_mouseOver'])
														: '';
	$option3['sfsi_plus_mouseOver_effect'] 		= 	(isset($option3['sfsi_plus_mouseOver_effect']))
														? sanitize_text_field($option3['sfsi_plus_mouseOver_effect'])
														: '';
	$option3['sfsi_plus_shuffle_icons'] 		= 	(isset($option3['sfsi_plus_shuffle_icons']))
														? sanitize_text_field($option3['sfsi_plus_shuffle_icons'])
														: '';
	$option3['sfsi_plus_shuffle_Firstload'] 	= 	(isset($option3['sfsi_plus_shuffle_Firstload']))
														? sanitize_text_field($option3['sfsi_plus_shuffle_Firstload'])
														: '';
	$option3['sfsi_plus_shuffle_interval'] 		= 	(isset($option3['sfsi_plus_shuffle_interval']))
														? sanitize_text_field($option3['sfsi_plus_shuffle_interval'])
														: '';
	$option3['sfsi_plus_shuffle_intervalTime'] 	=	(isset($option3['sfsi_plus_shuffle_intervalTime']))
														? intval($option3['sfsi_plus_shuffle_intervalTime'])
														: '';
?>
<!-- Section 3 "What design & animation do you want to give your icons?" main div Start -->
<div class="tab3">
	<!--Content of 4-->
    <div class="row mouse_txt sfsiplusmousetxt tab3">
    	<p>
        	<?php _e('A good & well-fitting design is not only nice to look at, but it increases chances that people will subscribe and/or share your site with friends:', SFSI_PLUS_DOMAIN ); ?>
        </p>
    	<ul class="tab_3_list">
        	<li>
            	<?php  _e( 'It comes across as more professional and gives your site more “credit”', SFSI_PLUS_DOMAIN ); ?>
            </li>
            <li>
            	<?php  _e( 'A smart automatic animation can make your visitors aware of your icons in an unintrusive manner', SFSI_PLUS_DOMAIN ); ?>
            </li> 
       	</ul>
        
        <p style="padding:0px;">
        	<?php  _e( 'The icons have been compressed by Shortpixel.com for faster loading of your site. Thank you Shortpixel!', SFSI_PLUS_DOMAIN ); ?>
        </p>
        
        <div class="row">
    		<h3>
				<?php  _e( 'Design options', SFSI_PLUS_DOMAIN ); ?>
        	</h3>
            
        	<!--icon themes section start -->
        	<ul class="sfsiplus_tab_3_icns">
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='default') ?  'checked="true"' : '' ;?> type="radio" value="default" class="styled"  />
                    <label>
                        <?php  _e( 'Default', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                	<div class="sfsiplus_icns_tab_3">
                    	<span class="sfsiplus_row_1_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_1_2 sfsiplus_email_section"></span><span class="sfsiplus_row_1_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_1_4 sfsiplus_google_section"></span><span class="sfsiplus_row_1_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_1_6 sfsiplus_share_section"></span><span class="sfsiplus_row_1_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_1_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_1_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_1_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_1_11 sfsiplus_houzz_section"></span>
                        <span class="sfsiplus_row_1_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_1_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_1_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_1_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_1_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_1_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_1_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_1_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_1_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_1_11 sf_section"></span>-->
                    </div>
                </li>
                
              	<li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='flat') ?  'checked="true"' : '' ;?>  type="radio" value="flat" class="styled" />
                	<label>
                		<?php  _e( 'Flat', SFSI_PLUS_DOMAIN ); ?>
                	</label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_2_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_2_2 sfsiplus_email_section"></span><span class="sfsiplus_row_2_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_2_4 sfsiplus_google_section"></span><span class="sfsiplus_row_2_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_2_6 sfsiplus_share_section"></span><span class="sfsiplus_row_2_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_2_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_2_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_2_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_2_11 sfsiplus_houzz_section"></span>
                    <span class="sfsiplus_row_2_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_2_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_2_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_2_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_2_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_2_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_2_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_2_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_2_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_2_11 sf_section"></span>-->
                    </div>
                </li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='thin') ?  'checked="true"' : '' ;?>  type="radio" value="thin" class="styled"  />
                	<label>
                 		<?php  _e( 'Thin', SFSI_PLUS_DOMAIN ); ?>
                 	</label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_3_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_3_2 sfsiplus_email_section"></span><span class="sfsiplus_row_3_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_3_4 sfsiplus_google_section"></span><span class="sfsiplus_row_3_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_3_6 sfsiplus_share_section"></span><span class="sfsiplus_row_3_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_3_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_3_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_3_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_3_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_3_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_3_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_3_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_3_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_3_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_3_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_3_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_3_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_3_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_3_11 sf_section"></span>-->
                 	</div>
                </li>
                 
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='cute') ?  'checked="true"' : '' ;?> type="radio" value="cute" class="styled" />
                	<label>
                		<?php  _e( 'Cute', SFSI_PLUS_DOMAIN ); ?>
                	</label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_4_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_4_2 sfsiplus_email_section"></span><span class="sfsiplus_row_4_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_4_4 sfsiplus_google_section"></span><span class="sfsiplus_row_4_5  sfsiplus_twitter_section"></span><span class="sfsiplus_row_4_6 sfsiplus_share_section"></span><span class="sfsiplus_row_4_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_4_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_4_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_4_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_4_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_4_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_4_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_4_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_4_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_4_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_4_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_4_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_4_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_4_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_4_11 sf_section"></span>-->
                	</div>
                </li>
                
                <!--start next four -->
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='cubes') ?  'checked="true"' : '' ;?> type="radio" value="cubes" class="styled"  />
                    <label><?php  _e( 'Cubes', SFSI_PLUS_DOMAIN ); ?></label>
                    
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_5_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_5_2 sfsiplus_email_section"></span><span class="sfsiplus_row_5_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_5_4 sfsiplus_google_section"></span><span class="sfsiplus_row_5_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_5_6 sfsiplus_share_section"></span><span class="sfsiplus_row_5_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_5_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_5_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_5_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_5_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_5_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_5_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_5_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_5_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_5_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_5_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_5_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_5_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_5_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_5_11 sf_section"></span>-->
                	</div>
                </li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='chrome_blue') ?  'checked="true"' : '' ;?>  type="radio" value="chrome_blue" class="styled" />
                    <label><?php  _e( 'Chrome Blue', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_6_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_6_2 sfsiplus_email_section"></span><span class="sfsiplus_row_6_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_6_4 sfsiplus_google_section"></span><span class="sfsiplus_row_6_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_6_6 sfsiplus_share_section"></span><span class="sfsiplus_row_6_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_6_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_6_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_6_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_6_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_6_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_6_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_6_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_6_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_6_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_6_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_6_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_6_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_6_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_6_11 sf_section"></span>-->
                	</div>
                </li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='chrome_grey') ?  'checked="true"' : '' ;?>  type="radio" value="chrome_grey" class="styled"  />
                    <label><?php  _e( 'Chrome Grey', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_7_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_7_2 sfsiplus_email_section"></span><span class="sfsiplus_row_7_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_7_4 sfsiplus_google_section"></span><span class="sfsiplus_row_7_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_7_6 sfsiplus_share_section"></span><span class="sfsiplus_row_7_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_7_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_7_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_7_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_7_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_7_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_7_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_7_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_7_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_7_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_7_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_7_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_7_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_7_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_7_11 sf_section"></span>-->
                	</div>
                </li>
                 
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='splash') ?  'checked="true"' : '' ;?> type="radio" value="splash" class="styled" />
                    <label><?php  _e( 'Splash', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_8_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_8_2 sfsiplus_email_section"></span><span class="sfsiplus_row_8_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_8_4 sfsiplus_google_section"></span><span class="sfsiplus_row_8_5  sfsiplus_twitter_section"></span><span class="sfsiplus_row_8_6 sfsiplus_share_section"></span><span class="sfsiplus_row_8_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_8_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_8_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_8_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_8_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_8_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_8_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_8_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_8_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_8_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_8_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_8_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_8_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_8_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_8_11 sf_section"></span>-->
                	</div>
                </li>
                
                
                <!--------------------start second four------------------------>
                
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='orange') ?  'checked="true"' : '' ;?> type="radio" value="orange" class="styled"  />
                    <label><?php  _e( 'Orange', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_9_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_9_2 sfsiplus_email_section"></span><span class="sfsiplus_row_9_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_9_4 sfsiplus_google_section"></span><span class="sfsiplus_row_9_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_9_6 sfsiplus_share_section"></span><span class="sfsiplus_row_9_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_9_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_9_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_9_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_9_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_9_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_9_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_9_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_9_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_9_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_9_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_9_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_9_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_9_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_9_11 sf_section"></span>-->
                	</div>
               	</li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='crystal') ?  'checked="true"' : '' ;?>  type="radio" value="crystal" class="styled" />
                	<label><?php  _e( 'Crystal', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_10_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_10_2 sfsiplus_email_section"></span><span class="sfsiplus_row_10_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_10_4 sfsiplus_google_section"></span><span class="sfsiplus_row_10_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_10_6 sfsiplus_share_section"></span><span class="sfsiplus_row_10_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_10_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_10_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_10_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_10_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_10_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_10_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_10_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_10_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_10_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_10_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_10_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_10_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_10_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_10_11 sf_section"></span>-->
                	</div>
               	</li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='glossy') ?  'checked="true"' : '' ;?>  type="radio" value="glossy" class="styled"  />
                    <label><?php  _e( 'Glossy', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_11_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_11_2 sfsiplus_email_section"></span><span class="sfsiplus_row_11_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_11_4 sfsiplus_google_section"></span><span class="sfsiplus_row_11_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_11_6 sfsiplus_share_section"></span><span class="sfsiplus_row_11_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_11_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_11_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_11_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_11_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_11_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_11_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_11_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_11_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_11_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_11_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_11_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_11_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_11_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_11_11 sf_section"></span>-->
                	</div>
                </li>
                 
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='black') ?  'checked="true"' : '' ;?> type="radio" value="black" class="styled" />
                    <label><?php  _e( 'Black', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_12_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_12_2 sfsiplus_email_section"></span><span class="sfsiplus_row_12_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_12_4 sfsiplus_google_section"></span><span class="sfsiplus_row_12_5  sfsiplus_twitter_section"></span><span class="sfsiplus_row_12_6 sfsiplus_share_section"></span><span class="sfsiplus_row_12_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_12_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_12_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_12_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_12_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_12_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_12_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_12_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_12_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_12_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_12_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_12_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_12_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_12_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_12_11 sf_section"></span>-->
                	</div>
                </li>
                
                
                <!--------------------start last four------------------------>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='silver') ?  'checked="true"' : '' ;?> type="radio" value="silver" class="styled"  />
                    <label><?php  _e( 'Silver', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_13_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_13_2 sfsiplus_email_section"></span><span class="sfsiplus_row_13_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_13_4 sfsiplus_google_section"></span><span class="sfsiplus_row_13_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_13_6 sfsiplus_share_section"></span><span class="sfsiplus_row_13_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_13_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_13_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_13_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_13_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_13_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_13_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_13_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_13_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_13_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_13_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_13_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_13_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_13_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_13_11 sf_section"></span>-->
                	</div>
                </li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='shaded_dark') ?  'checked="true"' : '' ;?>  type="radio" value="shaded_dark" class="styled" />
                    <label><?php  _e( 'Shaded Dark', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_14_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_14_2 sfsiplus_email_section"></span><span class="sfsiplus_row_14_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_14_4 sfsiplus_google_section"></span><span class="sfsiplus_row_14_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_14_6 sfsiplus_share_section"></span><span class="sfsiplus_row_14_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_14_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_14_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_14_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_14_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_14_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_14_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_14_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_14_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_14_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_14_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_14_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_14_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_14_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_14_11 sf_section"></span>-->
                	</div>
                </li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='shaded_light') ?  'checked="true"' : '' ;?>  type="radio" value="shaded_light" class="styled"  />
                	<label><?php  _e( 'Shaded Light', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_15_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_15_2 sfsiplus_email_section"></span><span class="sfsiplus_row_15_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_15_4 sfsiplus_google_section"></span><span class="sfsiplus_row_15_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_15_6 sfsiplus_share_section"></span><span class="sfsiplus_row_15_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_15_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_15_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_15_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_15_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_15_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_15_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_15_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_15_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_15_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_15_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_15_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_15_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_15_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_15_11 sf_section"></span>--></div>
               	</li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ($option3['sfsi_plus_actvite_theme']=='cool') ? 'checked="true"' : '' ;?>  type="radio" value="cool" class="styled"  />
                	<label><?php  _e( 'Cool', SFSI_PLUS_DOMAIN ); ?></label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_23_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_23_2 sfsiplus_email_section"></span><span class="sfsiplus_row_23_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_23_4 sfsiplus_google_section"></span><span class="sfsiplus_row_23_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_23_6 sfsiplus_share_section"></span><span class="sfsiplus_row_23_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_23_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_23_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_23_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_23_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_23_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_23_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_23_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_23_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_23_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_23_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_23_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_23_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_23_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_23_11 sf_section"></span>--></div>
               	</li>
                 
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='transparent') ?  'checked="true"' : '' ;?> type="radio" value="transparent" class="styled" />
                    <label style="line-height:20px !important;margin-top:15px;  ">
						<?php  _e( 'Transparent', SFSI_PLUS_DOMAIN ); ?> <br/>
                        <span style="font-size: 9px;">(<?php _e( 'for dark backgrounds', SFSI_PLUS_DOMAIN )?>)</span>
                    </label>
                    <div class="sfsiplus_icns_tab_3 trans_bg"><span class="sfsiplus_row_16_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_16_2 sfsiplus_email_section"></span><span class="sfsiplus_row_16_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_16_4 sfsiplus_google_section"></span><span class="sfsiplus_row_16_5  sfsiplus_twitter_section"></span><span class="sfsiplus_row_16_6 sfsiplus_share_section"></span><span class="sfsiplus_row_16_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_16_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_16_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_16_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_16_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_16_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_16_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_16_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_16_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_16_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_16_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_16_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_16_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_16_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_16_11 sf_section"></span>--></div>
                </li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='yellow') ?  'checked="true"' : '' ;?> type="radio" value="yellow" class="styled" />
                    <label style="line-height:20px !important;margin-top:15px;  ">
						<?php  _e( 'Yellow', SFSI_PLUS_DOMAIN ); ?> <br/>
                    </label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_18_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_18_2 sfsiplus_email_section"></span><span class="sfsiplus_row_18_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_18_4 sfsiplus_google_section"></span><span class="sfsiplus_row_18_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_18_6 sfsiplus_share_section"></span><span class="sfsiplus_row_18_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_18_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_18_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_18_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_18_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_18_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_18_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_18_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_18_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_18_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_18_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_18_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_18_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_18_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_18_11 sf_section"></span>--></div>
                </li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='glossyblack') ?  'checked="true"' : '' ;?> type="radio" value="glossyblack" class="styled" />
                    <label style="line-height:20px !important;margin-top:15px;  ">
						<?php  _e( 'Glossy Black', SFSI_PLUS_DOMAIN ); ?> <br/>
                    </label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_19_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_19_2 sfsiplus_email_section"></span><span class="sfsiplus_row_19_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_19_4 sfsiplus_google_section"></span><span class="sfsiplus_row_19_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_19_6 sfsiplus_share_section"></span><span class="sfsiplus_row_19_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_19_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_19_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_19_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_19_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_19_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_19_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_19_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_19_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_19_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_19_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_19_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_19_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_19_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_19_11 sf_section"></span>--></div>
                </li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='blackgrunge') ?  'checked="true"' : '' ;?> type="radio" value="blackgrunge" class="styled" />
                    <label style="line-height:20px !important;margin-top:15px;  ">
						<?php  _e( 'Black Grunge', SFSI_PLUS_DOMAIN ); ?> <br/>
                    </label>
                    <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_20_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_20_2 sfsiplus_email_section"></span><span class="sfsiplus_row_20_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_20_4 sfsiplus_google_section"></span><span class="sfsiplus_row_20_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_20_6 sfsiplus_share_section"></span><span class="sfsiplus_row_20_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_20_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_20_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_20_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_20_11 sfsiplus_houzz_section"></span>
                     <span class="sfsiplus_row_20_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_20_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_20_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_20_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_20_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_20_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_20_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_20_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_20_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_20_11 sf_section"></span>--></div>
                </li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='waxedwood') ?  'checked="true"' : '' ;?> type="radio" value="waxedwood" class="styled" />
                    <label style="line-height:20px !important;margin-top:15px;  ">
						<?php  _e( 'Waxed Wood', SFSI_PLUS_DOMAIN ); ?> <br/>
                    </label>
                     <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_21_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_21_2 sfsiplus_email_section"></span><span class="sfsiplus_row_21_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_21_4 sfsiplus_google_section"></span><span class="sfsiplus_row_21_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_21_6 sfsiplus_share_section"></span><span class="sfsiplus_row_21_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_21_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_21_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_21_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_21_11 sfsiplus_houzz_section"></span>
                      <span class="sfsiplus_row_21_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_21_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_21_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_21_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_21_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_21_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_21_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_21_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_21_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_21_11 sf_section"></span>--></div>
                </li>
                
                <li>
                	<input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='black2') ?  'checked="true"' : '' ;?> type="radio" value="black2" class="styled" />
                    <label style="line-height:20px !important;margin-top:15px;  ">
						<?php  _e( 'Black 2', SFSI_PLUS_DOMAIN ); ?> <br/>
                    </label>
                     <div class="sfsiplus_icns_tab_3"><span class="sfsiplus_row_22_1 sfsiplus_rss_section"></span><span class="sfsiplus_row_22_2 sfsiplus_email_section"></span><span class="sfsiplus_row_22_3 sfsiplus_facebook_section"></span><span class="sfsiplus_row_22_4 sfsiplus_google_section"></span><span class="sfsiplus_row_22_5 sfsiplus_twitter_section"></span><span class="sfsiplus_row_22_6 sfsiplus_share_section"></span><span class="sfsiplus_row_22_7 sfsiplus_youtube_section"></span><span class="sfsiplus_row_22_8 sfsiplus_pinterest_section"></span><span class="sfsiplus_row_22_9 sfsiplus_linkedin_section"></span><span class="sfsiplus_row_22_10 sfsiplus_instagram_section"></span><span class="sfsiplus_row_22_11 sfsiplus_houzz_section"></span>
                      <span class="sfsiplus_row_22_12 sfsiplus_snapchat_section"></span><span class="sfsiplus_row_22_13 sfsiplus_whatsapp_section"></span><span class="sfsiplus_row_22_14 sfsiplus_skype_section"></span><span class="sfsiplus_row_22_15 sfsiplus_vimeo_section"></span><span class="sfsiplus_row_22_16 sfsiplus_soundcloud_section"></span><span class="sfsiplus_row_22_17 sfsiplus_yummly_section"></span><span class="sfsiplus_row_22_18 sfsiplus_flickr_section"></span><span class="sfsiplus_row_22_19 sfsiplus_reddit_section"></span><span class="sfsiplus_row_22_20 sfsiplus_tumblr_section"></span><!--<span class="sfsiplus_row_22_11 sf_section"></span>--></div>
                </li>
                
                <!--Custom Icon Support {Monad}-->
                <li class="cstomskins_upload">
                    <input name="sfsi_plus_actvite_theme" <?php echo ( $option3['sfsi_plus_actvite_theme']=='custom_support') ?  'checked="true"' : '' ;?> type="radio" value="custom_support" class="styled" />
                    <label style="line-height:20px !important;margin-top:15px;  ">
                    	<?php  _e( 'Custom Icons', SFSI_PLUS_DOMAIN ); ?>
                    	<br/>
                    </label>
                    <div class="sfsiplus_icns_tab_3">
                         <?php
                         if(get_option("plus_rss_skin"))
                         {
                            $icon = get_option("plus_rss_skin");
                            echo '<span class="sfsiplus_row_17_1 sfsiplus_rss_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_1 sfsiplus_rss_section" style="background-position:-3px 6px;"></span>';
                         }
                         
                         if(get_option("plus_email_skin"))
                         {
                            $icon = get_option("plus_email_skin");
                            echo '<span class="sfsiplus_row_17_2 sfsiplus_email_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_2 sfsiplus_email_section" style="background-position:-51px 6px;"></span>';
                         }
                         
						 if(get_option("plus_facebook_skin"))
                         {
                            $icon = get_option("plus_facebook_skin");
                            echo '<span class="sfsiplus_row_17_3 sfsiplus_facebook_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_3 sfsiplus_facebook_section" style="background-position:-98px 6px;"></span>';
                         }
                         
                         if(get_option("plus_google_skin"))
                         {
                            $icon = get_option("plus_google_skin");
                            echo '<span class="sfsiplus_row_17_4 sfsiplus_google_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_4 sfsiplus_google_section" style="background-position:-145px 6px;"></span>';
                         }
                         
                         if(get_option("plus_twitter_skin"))
                         {
                            $icon = get_option("plus_twitter_skin");
                            echo '<span class="sfsiplus_row_17_5 sfsiplus_twitter_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_5 sfsiplus_twitter_section" style="background-position:-192px 6px;"></span>';
                         }
                         
                         if(get_option("plus_share_skin"))
                         {
                            $icon = get_option("plus_share_skin");
                            echo '<span class="sfsiplus_row_17_6 sfsiplus_share_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_6 sfsiplus_share_section" style="background-position:-238px 6px;"></span>';
                         }
                         
                         if(get_option("plus_youtube_skin"))
                         {
                            $icon = get_option("plus_youtube_skin");
                            echo '<span class="sfsiplus_row_17_7 sfsiplus_youtube_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_7 sfsiplus_youtube_section" style="background-position:-285px 6px;"></span>';
                         }
                         
                         if(get_option("plus_pintrest_skin"))
                         {
                            $icon = get_option("plus_pintrest_skin");
                            echo '<span class="sfsiplus_row_17_8 sfsiplus_pinterest_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_8 sfsiplus_pinterest_section" style="background-position:-332px 6px;"></span>';
                         }
                         
                         if(get_option("plus_linkedin_skin"))
                         {
                            $icon = get_option("plus_linkedin_skin");
                            echo '<span class="sfsiplus_row_17_9 sfsiplus_linkedin_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_9 sfsiplus_linkedin_section" style="background-position:-379px 6px;"></span>';
                         }
                         
                         if(get_option("plus_instagram_skin"))
                         {
                            $icon = get_option("plus_instagram_skin");
                            echo '<span class="sfsiplus_row_17_10 sfsiplus_instagram_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_10 sfsiplus_instagram_section" style="background-position:-426px 6px;"></span>';
                         }
						  
						 if(get_option("plus_houzz_skin"))
                         {
                            $icon = get_option("plus_houzz_skin");
                            echo '<span class="sfsiplus_row_17_11 sfsiplus_houzz_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_11 sfsiplus_houzz_section" style="background-position:-566px 6px;"></span>';
                         }
						 
						 if(get_option("plus_snapchat_skin"))
                         {
                            $icon = get_option("plus_snapchat_skin");
                            echo '<span class="sfsiplus_row_17_12 sfsiplus_snapchat_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_12 sfsiplus_snapchat_section" style="background-position:-613px 6px;"></span>';
                         }
						 
						 if(get_option("plus_whatsapp_skin"))
                         {
                            $icon = get_option("plus_whatsapp_skin");
                            echo '<span class="sfsiplus_row_17_13 sfsiplus_whatsapp_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_13 sfsiplus_whatsapp_section" style="background-position:-660px 6px;"></span>';
                         }
						 
						 if(get_option("plus_skype_skin"))
                         {
                            $icon = get_option("plus_skype_skin");
                            echo '<span class="sfsiplus_row_17_14 sfsiplus_skype_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_14 sfsiplus_skype_section" style="background-position:-706px 6px;"></span>';
                         }
						 
						 if(get_option("plus_vimeo_skin"))
                         {
                            $icon = get_option("plus_vimeo_skin");
                            echo '<span class="sfsiplus_row_17_15 sfsiplus_vimeo_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_15 sfsiplus_vimeo_section" style="background-position:-752px 6px;"></span>';
                         }
						 
						 if(get_option("plus_soundcloud_skin"))
                         {
                            $icon = get_option("plus_soundcloud_skin");
                            echo '<span class="sfsiplus_row_17_16 sfsiplus_soundcloud_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_16 sfsiplus_soundcloud_section" style="background-position:-799px 6px;"></span>';
                         }
						 
						 if(get_option("plus_yummly_skin"))
                         {
                            $icon = get_option("plus_yummly_skin");
                            echo '<span class="sfsiplus_row_17_17 sfsiplus_yummly_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_17 sfsiplus_yummly_section" style="background-position:-845px 6px;"></span>';
                         }
						 
						 if(get_option("plus_flickr_skin"))
                         {
                            $icon = get_option("plus_flickr_skin");
                            echo '<span class="sfsiplus_row_17_18 sfsiplus_flickr_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_18 sfsiplus_flickr_section" style="background-position:-892px 6px;"></span>';
                         }
						 
						 if(get_option("plus_reddit_skin"))
                         {
                            $icon = get_option("plus_reddit_skin");
                            echo '<span class="sfsiplus_row_17_19 sfsiplus_reddit_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_19 sfsiplus_reddit_section" style="background-position:-940px 6px;"></span>';
                         }
						 
						 if(get_option("plus_tumblr_skin"))
                         {
                            $icon = get_option("plus_tumblr_skin");
                            echo '<span class="sfsiplus_row_17_20 sfsiplus_tumblr_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat;margin-top:6px;"></span>';
                         }
						 else
                         {
                             echo '<span class="sfsiplus_row_17_20 sfsiplus_tumblr_section" style="background-position:-986px 6px;"></span>';
                         }
						 ?>
                        
                    </div>
               	</li>
                
            </ul>
            <!--icon themes section start -->
            
            <!--icon Animation section   start -->
            <div class="sfsi_premium_themeSection" style="margin-left: 0px;">
            	
                <p><?php _e("If you are interested in themed icons, please <a href='https://www.ultimatelysocial.com?license=".trim(get_option('ultimate_license_key'))."#supportRequest' target='_blank' class='lit_txt'>contact us</a> and let us know which specific theme of icons you want. We will then send it to you. We didn't include all themed icons here as it would blow up the size of the plugin.",SFSI_PLUS_DOMAIN ); ?>
                
                <!--<h3>
                	<?php _e('Theme & topic icons', SFSI_PLUS_DOMAIN ); ?>
                </h3>
                
                <p><?php _e('We also offer icons which match certain website themes', SFSI_PLUS_DOMAIN ); ?>, e.g.:</p>
                
                <div class="sfsi_premium_themedicon">
                	<img src="<?php echo SFSI_PLUS_PLUGURL."/images/themed-icons.png"; ?>" />
                </div>
                
                <p><?php _e('To see which icons are currently available and how to use them', SFSI_PLUS_DOMAIN ); ?>: <a href="https://www.ultimatelysocial.com/themed-icons/" target="_blank"><b><?php _e('Click here', SFSI_PLUS_DOMAIN ); ?></b></a></p>-->

            </div>
              
            <!--icon Animation section   start -->
            <div class="sub_row stand sec_new" style="margin-left: 0px;">
            	<h3>
                	<?php  _e( 'Animate them (your main icons)', SFSI_PLUS_DOMAIN ); ?>
                </h3>
                
                <p class="radio_section tab_3_option">
                	<input name="sfsi_plus_mouseOver" <?php echo ( $option3['sfsi_plus_mouseOver']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                    <label>
                    	<?php  _e( 'Mouse-Over effects', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                    <div class="drop_lsts">
                    	<select name="sfsi_plus_mouseOver_effect"  id="sfsi_plus_mouseOver_effect" class="styled"> 
                        	<option value="fade_in" <?php echo ( $option3['sfsi_plus_mouseOver_effect']=='fade_in') ?  'selected="true"' : '' ;?>>
                        		<?php  _e( 'Fade In', SFSI_PLUS_DOMAIN ); ?>
                        	</option>
                            <option value="scale" <?php echo ( $option3['sfsi_plus_mouseOver_effect']=='scale') ?  'selected="true"' : '' ;?>>
								<?php  _e( 'Scale', SFSI_PLUS_DOMAIN ); ?>
							</option>
							<option value="combo" <?php echo ( $option3['sfsi_plus_mouseOver_effect']=='combo') ?  'selected="true"' : '' ;?>>
                        		<?php  _e( 'Combo', SFSI_PLUS_DOMAIN ); ?>
                        	</option>
                    	</select>
                    </div>
                </p>
                
                <div class="Shuffle_auto">
                	<p class="radio_section tab_3_option">
                    	<input name="sfsi_plus_shuffle_icons" <?php echo ( $option3['sfsi_plus_shuffle_icons']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                        <label>
                        	<?php  _e( 'Shuffle them automatically', SFSI_PLUS_DOMAIN ); ?>
                        </label>
                    </p>
                	<div class="sub_sub_box shuffle_sub"  >
                		<p class="radio_section tab_3_option">
                        	<input name="sfsi_plus_shuffle_Firstload" <?php echo ( $option3['sfsi_plus_shuffle_Firstload']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                            <label>
                            	<?php  _e( 'When site is first loaded', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                        </p>
                		<p class="radio_section tab_3_option">
                        	<input name="sfsi_plus_shuffle_interval" <?php echo ( $option3['sfsi_plus_shuffle_interval']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                            <label>
                            	<?php  _e( 'Every', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                            <input class="smal_inpt" type="text" name="sfsi_plus_shuffle_intervalTime" value="<?php echo ( $option3['sfsi_plus_shuffle_intervalTime']!='') ?   $option3['sfsi_plus_shuffle_intervalTime'] : '' ;?>">
                            <label>
                            	<?php  _e( 'seconds', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                        </p>
                	</div>
                </div>
            </div>
            <!--END icon Animation section   start -->
                      
    	</div>
    </div>
    <!--Content of 4-->    
    
	<!-- SAVE BUTTON SECTION   --> 
	<div class="save_button tab_3_sav">
	     <img src="<?php echo SFSI_PLUS_PLUGURL ?>images/ajax-loader.gif" class="loader-img" />
         <?php  $nonce = wp_create_nonce("update_plus_step3"); ?>
	     <a href="javascript:;" id="sfsi_plus_save3" title="Save" data-nonce="<?php echo $nonce;?>">
         	<?php  _e( 'Save', SFSI_PLUS_DOMAIN ); ?>
         </a>
	</div>   <!-- END SAVE BUTTON SECTION   --> 
	
    <a class="sfsiColbtn closeSec" href="javascript:;">
    	<?php  _e( 'Collapse area', SFSI_PLUS_DOMAIN ); ?>
    </a>
    <label class="closeSec"></label>
	<!-- ERROR AND SUCCESS MESSAGE AREA-->
	<p class="red_txt errorMsg" style="display:none"> </p>
	<p class="green_txt sucMsg" style="display:none"> </p>
</div><!-- END Section 3 "What design & animation do you want to give your icons?" main div  -->