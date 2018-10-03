<?php
	/* unserialize all saved option for first options */
	$option1=  unserialize(get_option('sfsi_premium_section1_options',false));
	
	/**
	 * Sanitize, escape and validate values
	 */
	$option1['sfsi_plus_rss_display'] 		=	(isset($option1['sfsi_plus_rss_display']))
													? sanitize_text_field($option1['sfsi_plus_rss_display'])
													: '';
	$option1['sfsi_plus_email_display']		=	(isset($option1['sfsi_plus_email_display']))
													? sanitize_text_field($option1['sfsi_plus_email_display'])
													: '';
	$option1['sfsi_plus_facebook_display'] 	=	(isset($option1['sfsi_plus_facebook_display']))
													? sanitize_text_field($option1['sfsi_plus_facebook_display'])
													: '';
	$option1['sfsi_plus_twitter_display'] 	=	(isset($option1['sfsi_plus_twitter_display']))
													? sanitize_text_field($option1['sfsi_plus_twitter_display'])
													: '';
	$option1['sfsi_plus_google_display'] 	=	(isset($option1['sfsi_plus_google_display']))
													? sanitize_text_field($option1['sfsi_plus_google_display'])
													: '';
	$option1['sfsi_plus_share_display'] 	=	(isset($option1['sfsi_plus_share_display']))
													? sanitize_text_field($option1['sfsi_plus_share_display'])
													: '';
	$option1['sfsi_plus_youtube_display'] 	=	(isset($option1['sfsi_plus_youtube_display']))
													? sanitize_text_field($option1['sfsi_plus_youtube_display'])
													: '';
	$option1['sfsi_plus_pinterest_display'] =	(isset($option1['sfsi_plus_pinterest_display']))
													? sanitize_text_field($option1['sfsi_plus_pinterest_display'])
													: '';
	$option1['sfsi_plus_linkedin_display'] 	=	(isset($option1['sfsi_plus_linkedin_display']))
													? sanitize_text_field($option1['sfsi_plus_linkedin_display'])
													: '';
	$option1['sfsi_plus_instagram_display'] =	(isset($option1['sfsi_plus_instagram_display']))
													? sanitize_text_field($option1['sfsi_plus_instagram_display'])
													: '';
	$option1['sfsi_plus_houzz_display'] 	=	(isset($option1['sfsi_plus_houzz_display']))
													? sanitize_text_field($option1['sfsi_plus_houzz_display'])
													: '';
													
	$option1['sfsi_plus_snapchat_display'] 	=	(isset($option1['sfsi_plus_snapchat_display']))
													? sanitize_text_field($option1['sfsi_plus_snapchat_display'])
													: '';												
	$option1['sfsi_plus_whatsapp_display'] 	=	(isset($option1['sfsi_plus_whatsapp_display']))
													? sanitize_text_field($option1['sfsi_plus_whatsapp_display'])
													: '';
	$option1['sfsi_plus_skype_display'] 	=	(isset($option1['sfsi_plus_skype_display']))
													? sanitize_text_field($option1['sfsi_plus_skype_display'])
													: '';
	$option1['sfsi_plus_vimeo_display'] 	=	(isset($option1['sfsi_plus_vimeo_display']))
													? sanitize_text_field($option1['sfsi_plus_vimeo_display'])
													: '';
	$option1['sfsi_plus_soundcloud_display']=	(isset($option1['sfsi_plus_soundcloud_display']))
													? sanitize_text_field($option1['sfsi_plus_soundcloud_display'])
													: '';
	$option1['sfsi_plus_yummly_display'] 	=	(isset($option1['sfsi_plus_yummly_display']))
													? sanitize_text_field($option1['sfsi_plus_yummly_display'])
													: '';
	$option1['sfsi_plus_flickr_display'] 	=	(isset($option1['sfsi_plus_flickr_display']))
													? sanitize_text_field($option1['sfsi_plus_flickr_display'])
													: '';
	$option1['sfsi_plus_reddit_display'] 	=	(isset($option1['sfsi_plus_reddit_display']))
													? sanitize_text_field($option1['sfsi_plus_reddit_display'])
													: '';
	$option1['sfsi_plus_tumblr_display'] 	=	(isset($option1['sfsi_plus_tumblr_display']))
													? sanitize_text_field($option1['sfsi_plus_tumblr_display'])
													: '';
													
	$option1['sfsi_plus_rss_mobiledisplay']			=	(isset($option1['sfsi_plus_rss_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_rss_mobiledisplay'])
															: '';
	$option1['sfsi_plus_email_mobiledisplay']		=	(isset($option1['sfsi_plus_email_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_email_mobiledisplay'])
															: '';
	$option1['sfsi_plus_facebook_mobiledisplay'] 	=	(isset($option1['sfsi_plus_facebook_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_facebook_mobiledisplay'])
															: '';
	$option1['sfsi_plus_twitter_mobiledisplay'] 	=	(isset($option1['sfsi_plus_twitter_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_twitter_mobiledisplay'])
															: '';
	$option1['sfsi_plus_google_mobiledisplay'] 		=	(isset($option1['sfsi_plus_google_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_google_mobiledisplay'])
															: '';
	$option1['sfsi_plus_share_mobiledisplay'] 		=	(isset($option1['sfsi_plus_share_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_share_mobiledisplay'])
															: '';
	$option1['sfsi_plus_youtube_mobiledisplay'] 	=	(isset($option1['sfsi_plus_youtube_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_youtube_mobiledisplay'])
															: '';
	$option1['sfsi_plus_pinterest_mobiledisplay'] 	=	(isset($option1['sfsi_plus_pinterest_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_pinterest_mobiledisplay'])
															: '';
	$option1['sfsi_plus_linkedin_mobiledisplay'] 	=	(isset($option1['sfsi_plus_linkedin_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_linkedin_mobiledisplay'])
															: '';
	$option1['sfsi_plus_instagram_mobiledisplay'] 	=	(isset($option1['sfsi_plus_instagram_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_instagram_mobiledisplay'])
															: '';
	$option1['sfsi_plus_houzz_mobiledisplay'] 		=	(isset($option1['sfsi_plus_houzz_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_houzz_mobiledisplay'])
															: '';
													
	$option1['sfsi_plus_snapchat_mobiledisplay'] 	=	(isset($option1['sfsi_plus_snapchat_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_snapchat_mobiledisplay'])
															: '';												
	$option1['sfsi_plus_whatsapp_mobiledisplay'] 	=	(isset($option1['sfsi_plus_whatsapp_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_whatsapp_mobiledisplay'])
															: '';
	$option1['sfsi_plus_skype_mobiledisplay'] 		=	(isset($option1['sfsi_plus_skype_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_skype_mobiledisplay'])
															: '';
	$option1['sfsi_plus_vimeo_mobiledisplay'] 		=	(isset($option1['sfsi_plus_vimeo_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_vimeo_mobiledisplay'])
															: '';
	$option1['sfsi_plus_soundcloud_mobiledisplay']	=	(isset($option1['sfsi_plus_soundcloud_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_soundcloud_mobiledisplay'])
															: '';
	$option1['sfsi_plus_yummly_mobiledisplay'] 		=	(isset($option1['sfsi_plus_yummly_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_yummly_mobiledisplay'])
															: '';
	$option1['sfsi_plus_flickr_mobiledisplay'] 		=	(isset($option1['sfsi_plus_flickr_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_flickr_mobiledisplay'])
															: '';
	$option1['sfsi_plus_reddit_mobiledisplay'] 		=	(isset($option1['sfsi_plus_reddit_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_reddit_mobiledisplay'])
															: '';
	$option1['sfsi_plus_tumblr_mobiledisplay'] 		=	(isset($option1['sfsi_plus_tumblr_mobiledisplay']))
															? sanitize_text_field($option1['sfsi_plus_tumblr_mobiledisplay'])
															: '';
?>

<!-- Section 1 "Which icons do you want to show on your site? " main div Start -->
<div class="tab1" >

	<div id="sms-call-note-template" style="display:none">
		<p class="customIconNote"><?php _e('* Note: you can also give the icon a «call me» functionality be entering «tel:» and then the phone number, and give it a + before the country code, e.g. in the case of US (country code = 1) it could be «tel:+145054654654» (without quotes).', SFSI_PLUS_DOMAIN); ?></p>
		<p class="customIconNote"><?php _e('Or, give it a «Send me an SMS» functionality by entering «sms://» and then the mobile phone number as mentioned above, e.g. «sms://+145054654654» (without quotes).', SFSI_PLUS_DOMAIN); ?></p> 
	</div>

	<p class="top_txt">
    	<?php
			_e( 'In general, the more icons you offer the better because people have different preferences, and more options means that there’s something for everybody, increasing the chances that you get followed and/or shared.', SFSI_PLUS_DOMAIN);
		?>
    </p> 

 	<ul class="plus_icn_listing">
        <!-- RSS ICON -->
        <li class="gary_bg">
        	<div class="radio_section tb_4_ck">
        		<input name="sfsi_plus_rss_display" <?php echo ($option1['sfsi_plus_rss_display']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rss_display" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_rs_s">
            	RSS
            </span> 
            <div class="sfsiplus_right_info">
                <p>
                    <span>
                        <?php  _e( 'Strongly recommended', SFSI_PLUS_DOMAIN); ?>: 
                    </span> 
                    
                    <?php  _e( 'RSS is still popular, esp. among the tech-savvy crowd.', SFSI_PLUS_DOMAIN); ?>
                    
                    <label class="expanded-area" >
                        <?php  _e( 'RSS stands for Really Simply Syndication and is an easy way for people to read your content. ', SFSI_PLUS_DOMAIN); ?> 
                    	<a href="http://en.wikipedia.org/wiki/RSS" target="_new" title="Syndication">
                            <?php  _e( 'Learn more about RSS', SFSI_PLUS_DOMAIN); ?> 
                        </a>.
                    </label>
                </p>
                <a href="javascript:;" class="expand-area" ><?php  _e( 'Read more', SFSI_PLUS_DOMAIN); ?></a>
            </div>
        </li>
        <!-- END RSS ICON -->
        
        <!-- EMAIL ICON -->
        <li class="gary_bg">
        	<div class="radio_section tb_4_ck">
        		<input name="sfsi_plus_email_display" <?php echo ($option1['sfsi_plus_email_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_email_display" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_email">
            	Email
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span>
            			<?php  _e( 'Strongly recommended', SFSI_PLUS_DOMAIN); ?>:
            		</span> 
            		
					<?php  _e( 'Email is the most effective tool to build up a followership.', SFSI_PLUS_DOMAIN); ?>
            
            		<span style="float: right;margin-right: 13px; margin-top: -3px;">
						<?php if(get_option('sfsi_premium_footer_sec')=="yes") { $nonce = wp_create_nonce("remove_plusfooter"); ?> <a style="font-size:13px;margin-left:30px;color:#777777;" href="javascript:;" class="sfsiplus_removeFooter" data-nonce="<?php echo $nonce;?>"><?php  _e( 'Remove credit link', SFSI_PLUS_DOMAIN); ?></a>
                     	<?php } ?>
                   </span>
                	<label class="expanded-area" >
                		<?php  _e( 'Everybody uses email – that’s why it’s much more effective than social media to make people follow you', SFSI_PLUS_DOMAIN); ?> 
                		(<a href="http://www.entrepreneur.com/article/230949" target="_new">
                			<?php  _e( 'learn more', SFSI_PLUS_DOMAIN); ?>
                		</a>)
                		<?php  _e( 'Not offering an email subscription option means losing out on future traffic to your site.', SFSI_PLUS_DOMAIN); ?>
                	</label>
            	</p>
             	<a href="javascript:;" class="expand-area"><?php  _e( 'Read more', SFSI_PLUS_DOMAIN); ?></a>	 
            </div>
        </li>
        <!-- EMAIL ICON -->
        
        <!-- FACEBOOK ICON -->
        <li class="gary_bg">
        	<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_facebook_display" <?php echo ($option1['sfsi_plus_facebook_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_facebook_display" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_facebook">
            	Facebook
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
            		<span><?php  _e( 'Strongly recommended:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php  _e( 'Facebook is crucial, esp. for sharing.', SFSI_PLUS_DOMAIN); ?>
  
                    <label class="expanded-area" >
  				    	<?php  _e( 'Facebook is the giant in the social media world, and even if you don’t have a Facebook account yourself you should display this icon, so that Facebook users can share your site on Facebook.', SFSI_PLUS_DOMAIN); ?>
            		</label>
            	</p>
            	<a href="javascript:;" class="expand-area"><?php  _e( 'Read more', SFSI_PLUS_DOMAIN); ?></a>
            </div>
        </li>
        <!-- END FACEBOOK ICON -->
        
        <!-- TWITTER ICON -->
        <li class="gary_bg">
        	<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_twitter_display" <?php echo ($option1['sfsi_plus_twitter_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_twitter_display" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_twt">
            	Twitter
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'Strongly recommended:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php  _e( 'Can have a strong promotional effect.', SFSI_PLUS_DOMAIN); ?>
            		
                    <label class="expanded-area" >
            			<?php  _e( 'If you have a Twitter-account then adding this icon is a no-brainer. However, similar as with facebook, even if you don’t have one you should still show this icon so that Twitter-users can share your site.', SFSI_PLUS_DOMAIN); ?>
            		</label>
            	</p>
            	
                <a href="javascript:;" class="expand-area" ><?php  _e( 'Read more', SFSI_PLUS_DOMAIN); ?></a>
            </div>
        </li>
        <!-- END TWITTER ICON -->
       
        <!-- GOOGLE ICON -->
        <li class="gary_bg">
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_google_display" <?php echo ($option1['sfsi_plus_google_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_google_display" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_ggle_pls">
            	Google+
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'Strongly recommended:', SFSI_PLUS_DOMAIN); ?></span>
					<?php  _e( 'Increasingly important and beneficial for SEO.', SFSI_PLUS_DOMAIN); ?>
                	<label class="expanded-area" ></label>
            	</p>
            </div>
        </li>
        <!-- END GOOGLE ICON -->
    
        <!-- YOUTUBE ICON -->
        <li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_youtube_display" <?php echo ($option1['sfsi_plus_youtube_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_youtube_display" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_utube">
           		Youtube
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e( 'Show this icon if you have a youtube account (and you should set up one if you have video content – that can increase your traffic significantly).', SFSI_PLUS_DOMAIN); ?>
            	</p>
            </div>
       </li>
        <!-- END YOUTUBE ICON -->
       
        <!-- LINKEDIN ICON -->
        <li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_linkedin_display" <?php echo ($option1['sfsi_plus_linkedin_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_linkedin_display" type="checkbox" value="yes" class="styled" />
            </div>
            <span class="sfsicls_linkdin">
            	LinkedIn
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
					<span><?php	_e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php	_e( 'No.1 network for business purposes. Use this icon if you’re a LinkedInner.', SFSI_PLUS_DOMAIN); ?>
            	</p>
            </div>
       	</li>
       	<!-- END LINKEDIN ICON -->
       
       	<!-- PINTEREST ICON -->
       	<li>
       		<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_pinterest_display" <?php echo ($option1['sfsi_plus_pinterest_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_pinterest_display"  type="checkbox" value="yes" class="styled"  />
            </div>
        	<span class="sfsicls_pinterest">
        		Pinterest
        	</span> 
        	<div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you have a Pinterest account (and you should set up one if you publish new pictures regularly – that can increase your traffic significantly).', SFSI_PLUS_DOMAIN); ?>
            	</p>
        	</div>
       	</li>
        <!-- END PINTEREST ICON -->
       
        <!-- INSTAGRAM ICON -->
        <li>
            <div class="radio_section tb_4_ck"><input name="sfsi_plus_instagram_display" <?php echo ($option1['sfsi_plus_instagram_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_instagram_display"  type="checkbox" value="yes" class="styled"  /></div>
            <span class="sfsicls_instagram">
        	    Instagram
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you have an Instagram account.', SFSI_PLUS_DOMAIN); ?>
            	</p>
            </div>
        </li>
        <!-- END INSTAGRAM ICON -->
        
        <!-- SnapChat ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_snapchat_display" <?php echo (isset($option1['sfsi_plus_snapchat_display']) && $option1['sfsi_plus_snapchat_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_snapchat_display"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_snapchat">
            	Snapchat
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you have a Snapchat account.', SFSI_PLUS_DOMAIN); ?>
				</p>
            </div>
       	</li>
       	<!-- END SnapChat ICON -->
        
        <!-- WhatsApp ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_whatsapp_display" <?php echo (isset($option1['sfsi_plus_whatsapp_display']) && $option1['sfsi_plus_whatsapp_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_whatsapp_display"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_whatsapp">
            	WhatsApp or Phone
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you want to allow users to either a) send you a text-message via WhatsApp (mobile only) or b) allow users to call you with their standard calling application (mobile or desktop)', SFSI_PLUS_DOMAIN); ?>
				</p>
            </div>
       	</li>
       	<!-- END WhatsApp ICON -->
        
        <!-- Skype ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_skype_display" <?php echo (isset($option1['sfsi_plus_skype_display']) && $option1['sfsi_plus_skype_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_skype_display"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_skype">
            	Skype
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you want users to be able to call you via Skype with just a few clicks.', SFSI_PLUS_DOMAIN); ?>
				</p>
            </div>
       	</li>
       	<!-- END Skype ICON -->
        
        <!-- Vimeo ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_vimeo_display" <?php echo (isset($option1['sfsi_plus_vimeo_display']) && $option1['sfsi_plus_vimeo_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_vimeo_display"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_vimeo">
            	Vimeo
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you have a Vimeo account.', SFSI_PLUS_DOMAIN); ?>
				</p>
            </div>
       	</li>
       	<!-- END vimeo ICON -->
        
        <!-- SoundCloude ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_soundcloud_display" <?php echo (isset($option1['sfsi_plus_soundcloud_display']) && $option1['sfsi_plus_soundcloud_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_soundcloud_display"  type="checkbox" value="yes" class="styled"/>
            </div>
            <span class="sfsicls_soundcloud">
            	Soundcloud
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you have a SoundCloud account.', SFSI_PLUS_DOMAIN); ?>
				</p>
            </div>
       	</li>
       	<!-- END SoundCloude ICON -->
        
        <!-- Yummly ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_yummly_display" <?php echo (isset($option1['sfsi_plus_yummly_display']) && $option1['sfsi_plus_yummly_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_yummly_display"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_yummly">
            	Yummly
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you have a Yummly account.', SFSI_PLUS_DOMAIN); ?>
				</p>
            </div>
       	</li>
       	<!-- END Yummly ICON -->
        
        <!-- Flicker ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_flickr_display" <?php echo (isset($option1['sfsi_plus_flickr_display']) && $option1['sfsi_plus_flickr_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_flickr_display"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_flickr">
            	Flickr
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you have a Flickr account.', SFSI_PLUS_DOMAIN); ?>
				</p>
            </div>
       	</li>
       	<!-- END Flicker ICON -->
        
        <!-- Reddit ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_reddit_display" <?php echo (isset($option1['sfsi_plus_reddit_display']) && $option1['sfsi_plus_reddit_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_reddit_display"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_reddit">
            	Reddit
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you have a Reddit account.', SFSI_PLUS_DOMAIN); ?>
				</p>
            </div>
       	</li>
       	<!-- END Reditt ICON -->
        
        <!-- Tumblr ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_tumblr_display" <?php echo (isset($option1['sfsi_plus_tumblr_display']) && $option1['sfsi_plus_tumblr_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_tumblr_display"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_tumblr">
            	Tumblr
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you have a Tumblr account.', SFSI_PLUS_DOMAIN); ?>
				</p>
            </div>
       	</li>
       	<!-- END Tumbler ICON -->
        
        <!-- SHARE ICON --> 
        <li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_share_display" <?php echo ($option1['sfsi_plus_share_display']=='yes') ?  'checked="true"' : '' ;?> id=="sfsi_plus_share_display" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_share">
            	Share
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Third-party service AddThis allows your visitors to share via many other social networks, however it may also slow down your site a bit.', SFSI_PLUS_DOMAIN); ?>
                
                	<label class="expanded-area" >
                		<?php  _e( 'Everybody uses email – that’s why it’s', SFSI_PLUS_DOMAIN); ?>
                
                		<a href="http://www.entrepreneur.com/article/230949" target="_new">
                			<?php  _e( 'much more effective than social media', SFSI_PLUS_DOMAIN); ?>
               			</a> 
                
                		<?php  _e( 'to make people follow you. Not offering an email subscription option means losing out on future traffic to your site.', SFSI_PLUS_DOMAIN); ?>
               		</label>
                    <?php  _e( 'Check out their reviews:', SFSI_PLUS_DOMAIN); ?>
                    <a href="https://wordpress.org/support/view/plugin-reviews/addthis" target="_blank">
                    	<?php  _e( 'Click here', SFSI_PLUS_DOMAIN); ?>
                    </a>.
                	
            	</p>
            </div>
       </li>
        <!-- END SHARE ICON -->
       
       	<!-- Houzz ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_houzz_display" <?php echo (isset($option1['sfsi_plus_houzz_display']) && $option1['sfsi_plus_houzz_display']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_houzz_display"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_houzz">
            	Houzz
            </span> 
            <div class="sfsiplus_right_info">
            	<p>
                	<span><?php  _e( 'It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php _e('Show this icon if you have a Houzz account.', SFSI_PLUS_DOMAIN); ?>
					 
            <?php  _e( 'Houzz is the No.1 site & community in the world of architecture and interior design.', SFSI_PLUS_DOMAIN); ?>
			<a href="http://www.houzz.com/" target="_blank">
						<?php _e('Visit Houzz',SFSI_PLUS_DOMAIN); ?>
                    </a>
            	</p>
            </div>
       	</li>
       	<!-- END Houzz ICON -->
        
        <!-- Custom icon section start here -->
       	<?php

			$icons  = ($option1['sfsi_custom_files']) ? unserialize($option1['sfsi_custom_files']) : array();

			$activeDesktopicons  = isset($option1['sfsi_custom_desktop_icons']) && !empty($option1['sfsi_custom_desktop_icons'])? unserialize($option1['sfsi_custom_desktop_icons']) : array();

			$total_icons= is_array($icons) ? count($icons): 0;
			end($icons);
			$endkey = key($icons);
			$endkey = (isset($endkey)) ? $endkey :0;
			reset($icons);
			$first_key = key($icons);  
			$first_key = (isset($first_key)) ? $first_key :0;
			$new_element=0;
			
			if($total_icons>0)
			{
				$new_element=$endkey+1;
			}     
       	?>
       	<!-- Display all custom icons  -->
       	<?php $count=1; for($i=$first_key; $i<=$endkey; $i++) : ?> 

       	<?php if(!empty( $icons[$i]) ) : ?>

			<!--element-type="sfsiplus-cusotm-icon"-->
            
            <li id="plus_c<?php echo $i; ?>" class="plus_custom plus_custom<?php echo $i; ?>">

                <div class="radio_section tb_4_ck">
					<input element-ctype='sfsiplus-cusotm-icon' element-id="<?php echo $i; ?>" name="plussfsiICON_<?php echo $i; ?>" <?php echo in_array($icons[$i],$activeDesktopicons) ? 'checked="true"' : ''; ?>" type="checkbox" value="yes" class="styled" />
                </div>
                <span class="plus_custom-img">
					<img data-key="<?php echo $i; ?>" class="plus_sfcm" src="<?php echo (!empty($icons[$i]))? esc_url($icons[$i]) : SFSI_PLUS_PLUGURL.'images/custom.png';?>" id="plus_CImg_<?php echo $i;?>"/>
                </span> 
                <span class="custom sfsiplus_custom-txt">
                    <?php  _e( 'Custom', SFSI_PLUS_DOMAIN); ?>  
                    <?php echo $count;?> 
                </span> 
                
                <a name="plussfsiICON_<?php echo $i; ?>" class="deleteCustomIcon" title="Delete custom icon" alt="Delete custom icon">Delete</a>

                <div class="sfsiplus_right_info">
                    <p>
					<span><?php  _e('It depends:', SFSI_PLUS_DOMAIN); ?></span> 
					<?php  _e('Upload a custom icon if you have other accounts/websites you want to link to.', SFSI_PLUS_DOMAIN); ?>
                   </p>
                </div>
            </li>

        <?php $count++; endif; endfor; ?>
        
        <!-- Create a custom icon if total uploaded icons are less than 5 -->
        <?php if($count <=10) : ?>
            <li id="plus_c<?php echo $new_element; ?>" class="plus_custom bdr_btm_non">
                <div class="radio_section tb_4_ck">
                    <input name="plussfsiICON_<?php echo $new_element;?>"  type="checkbox" value="yes" class="styled" element-type="sfsiplus-cusotm-icon" ele-type='new'/>
                </div>
                
                <span class="plus_custom-img">
                    <img src="<?php echo SFSI_PLUS_PLUGURL.'images/custom.png';?>" id="plus_CImg_<?php echo $new_element; ?>"  />
                </span> 
                
                <span class="custom sfsiplus_custom-txt">
                    <?php  _e( 'Custom', SFSI_PLUS_DOMAIN); ?>
                    <?php echo $count; ?>
                </span> 

                <div class="sfsiplus_right_info">
                    <p>
                        <span><?php	_e('It depends:', SFSI_PLUS_DOMAIN); ?></span> 
                        <?php	_e('Upload a custom icon if you have other accounts/websites you want to link to.', SFSI_PLUS_DOMAIN); ?>
                    </p>
                </div>
            </li>
        <?php endif; ?>
        <!-- END Custom icon section here -->
	</ul>
 	
 	<p>
 		For other platforms (StumbleUpon, Telegram, VK, Twitch etc.) please <a style="text-decoration: underline;" href="https://www.ultimatelysocial.com?license=<?php echo trim(get_option("ultimate_license_key")); ?>#supportRequest" target="_blank" class="lit_txt">contact us</a> so that we can send the icons to you (please tell us for which design). You can then upload them as custom icons. We didn’t include them into the plugin because it would blow up the size of the plugin.
 	</p>

    <div class="sfsi_premium_mobile_section">
    	<h3><?php _e("Want to show different icons for mobile?", SFSI_PLUS_DOMAIN); ?></h3>
        <ul>
        	<li>
            	<?php
					$check = (isset($option1['sfsi_plus_icons_onmobile']) && $option1['sfsi_plus_icons_onmobile'] == 'yes')
						? 'checked="checked"'
						: '';
				?>
            	<input type="radio" name="sfsi_plus_icons_onmobile" value="yes" class="styled" <?php echo $check; ?>/>
				<label><?php _e("Yes", SFSI_PLUS_DOMAIN); ?></label>
            </li>
            <li>
            	<?php
					$check = (isset($option1['sfsi_plus_icons_onmobile']) && $option1['sfsi_plus_icons_onmobile'] == 'no')
						? 'checked="checked"'
						: '';
				?>
            	<input type="radio" name="sfsi_plus_icons_onmobile" value="no" class="styled" <?php echo $check; ?>/>
				<label><?php _e("No", SFSI_PLUS_DOMAIN); ?></label>
            </li>
        </ul>
    </div>
    
    <ul class="sfsi_premium_mobile_icon_listing" style="<?php echo (isset($option1['sfsi_plus_icons_onmobile']) && $option1['sfsi_plus_icons_onmobile'] == 'yes')? 'display:block' : 'display:none'; ?>">
        
        <!-- RSS ICON -->
        <li>
        	<div class="radio_section tb_4_ck">
        		<input name="sfsi_plus_rss_mobiledisplay" <?php echo ($option1['sfsi_plus_rss_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rss_mobiledisplay" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_rs_s">
            	RSS
            </span> 
        </li>
        <!-- END RSS ICON -->
        
        <!-- EMAIL ICON -->
        <li>
        	<div class="radio_section tb_4_ck">
        		<input name="sfsi_plus_email_mobiledisplay" <?php echo ($option1['sfsi_plus_email_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_email_mobiledisplay" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_email">
            	Email
            </span>
        </li>
        <!-- EMAIL ICON -->
        
        <!-- FACEBOOK ICON -->
        <li>
        	<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_facebook_mobiledisplay" <?php echo ($option1['sfsi_plus_facebook_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_facebook_mobiledisplay" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_facebook">
            	Facebook
            </span> 
        </li>
        <!-- END FACEBOOK ICON -->
        
        <!-- TWITTER ICON -->
        <li>
        	<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_twitter_mobiledisplay" <?php echo ($option1['sfsi_plus_twitter_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_twitter_mobiledisplay" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_twt">
            	Twitter
            </span> 
        </li>
        <!-- END TWITTER ICON -->
       
        <!-- GOOGLE ICON -->
        <li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_google_mobiledisplay" <?php echo ($option1['sfsi_plus_google_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_google_mobiledisplay" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_ggle_pls">
            	Google+
            </span> 
        </li>
        <!-- END GOOGLE ICON -->
    
        <!-- YOUTUBE ICON -->
        <li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_youtube_mobiledisplay" <?php echo ($option1['sfsi_plus_youtube_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_youtube_mobiledisplay" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_utube">
           		Youtube
            </span> 
       </li>
        <!-- END YOUTUBE ICON -->
       
        <!-- LINKEDIN ICON -->
        <li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_linkedin_mobiledisplay" <?php echo ($option1['sfsi_plus_linkedin_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_linkedin_mobiledisplay" type="checkbox" value="yes" class="styled" />
            </div>
            <span class="sfsicls_linkdin">
            	LinkedIn
            </span> 
       	</li>
       	<!-- END LINKEDIN ICON -->
       
       	<!-- PINTEREST ICON -->
       	<li>
       		<div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_pinterest_mobiledisplay" <?php echo ($option1['sfsi_plus_pinterest_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_pinterest_mobiledisplay"  type="checkbox" value="yes" class="styled"  />
            </div>
        	<span class="sfsicls_pinterest">
        		Pinterest
        	</span> 
       	</li>
        <!-- END PINTEREST ICON -->
       
        <!-- INSTAGRAM ICON -->
        <li>
            <div class="radio_section tb_4_ck"><input name="sfsi_plus_instagram_mobiledisplay" <?php echo ($option1['sfsi_plus_instagram_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_instagram_mobiledisplay"  type="checkbox" value="yes" class="styled"  /></div>
            <span class="sfsicls_instagram">
        	    Instagram
            </span> 
        </li>
        <!-- END INSTAGRAM ICON -->
        
        <!-- SnapChat ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_snapchat_mobiledisplay" <?php echo (isset($option1['sfsi_plus_snapchat_mobiledisplay']) && $option1['sfsi_plus_snapchat_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_snapchat_mobiledisplay"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_snapchat">
            	Snapchat
            </span> 
       	</li>
       	<!-- END SnapChat ICON -->
        
        <!-- WhatsApp ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_whatsapp_mobiledisplay" <?php echo (isset($option1['sfsi_plus_whatsapp_mobiledisplay']) && $option1['sfsi_plus_whatsapp_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_whatsapp_mobiledisplay"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_whatsapp">
            	WhatsApp or Phone
            </span> 
       	</li>
       	<!-- END WhatsApp ICON -->
        
        <!-- Skype ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_skype_mobiledisplay" <?php echo (isset($option1['sfsi_plus_skype_mobiledisplay']) && $option1['sfsi_plus_skype_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_skype_mobiledisplay"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_skype">
            	Skype
            </span> 
       	</li>
       	<!-- END Skype ICON -->
        
        <!-- Vimeo ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_vimeo_mobiledisplay" <?php echo (isset($option1['sfsi_plus_vimeo_mobiledisplay']) && $option1['sfsi_plus_vimeo_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_vimeo_mobiledisplay"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_vimeo">
            	Vimeo
            </span> 
       	</li>
       	<!-- END vimeo ICON -->
        
        <!-- SoundCloude ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_soundcloud_mobiledisplay" <?php echo (isset($option1['sfsi_plus_soundcloud_mobiledisplay']) && $option1['sfsi_plus_soundcloud_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_soundcloud_mobiledisplay"  type="checkbox" value="yes" class="styled"/>
            </div>
            <span class="sfsicls_soundcloud">
            	Soundcloud
            </span> 
       	</li>
       	<!-- END SoundCloude ICON -->
        
        <!-- Yummly ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_yummly_mobiledisplay" <?php echo (isset($option1['sfsi_plus_yummly_mobiledisplay']) && $option1['sfsi_plus_yummly_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_yummly_mobiledisplay"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_yummly">
            	Yummly
            </span> 
       	</li>
       	<!-- END Yummly ICON -->
        
        <!-- Flicker ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_flickr_mobiledisplay" <?php echo (isset($option1['sfsi_plus_flickr_mobiledisplay']) && $option1['sfsi_plus_flickr_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_flickr_mobiledisplay"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_flickr">
            	Flickr
            </span> 
       	</li>
       	<!-- END Flicker ICON -->
        
        <!-- Reddit ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_reddit_mobiledisplay" <?php echo (isset($option1['sfsi_plus_reddit_mobiledisplay']) && $option1['sfsi_plus_reddit_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_reddit_mobiledisplay"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_reddit">
            	Reddit
            </span> 
       	</li>
       	<!-- END Reditt ICON -->
        
        <!-- Tumblr ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_tumblr_mobiledisplay" <?php echo (isset($option1['sfsi_plus_tumblr_mobiledisplay']) && $option1['sfsi_plus_tumblr_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_tumblr_mobiledisplay"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_tumblr">
            	Tumblr
            </span> 
       	</li>
       	<!-- END Tumbler ICON -->
        
        <!-- SHARE ICON --> 
        <li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_share_mobiledisplay" <?php echo ($option1['sfsi_plus_share_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id=="sfsi_plus_share_mobiledisplay" type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_share">
            	Share
            </span> 
       </li>
        <!-- END SHARE ICON -->
       
       	<!-- Houzz ICON -->
		<li>
            <div class="radio_section tb_4_ck">
            	<input name="sfsi_plus_houzz_mobiledisplay" <?php echo (isset($option1['sfsi_plus_houzz_mobiledisplay']) && $option1['sfsi_plus_houzz_mobiledisplay']=='yes') ?  'checked="true"' : '' ;?> id="sfsi_plus_houzz_mobiledisplay"  type="checkbox" value="yes" class="styled"  />
            </div>
            <span class="sfsicls_houzz">
            	Houzz
            </span> 
       	</li>
       	<!-- END Houzz ICON -->

		<?php $micons = (isset($option1['sfsi_custom_mobile_icons'])) ? unserialize($option1['sfsi_custom_mobile_icons']) : array(); 
			  $mkeys  = is_array($micons) ? array_keys($micons) : array();
	   
	   ?>

       	<!-- Display all custom icons  -->
       	<?php $count=1; for($i=$first_key; $i<=$endkey; $i++) : ?> 
       	
       	<?php if(!empty( $icons[$i])) :        			
       			$checked = (in_array($i, $mkeys)) ? 'checked=true' : '';
		?> 
           

            <li id="plus_c<?php echo $i; ?>" class="plus_custom">
                
                <div class="radio_section tb_4_ck">
					<input element-type='sfsiplus-cusotm-mobile-icon' data-key="<?php echo $i; ?>" name="plussfsiICON_<?php echo $i; ?>" <?php echo $checked; ?> type="checkbox" value="yes" class="styled"  />
                </div>
                
                <span class="plus_custom-img">
					<img data-key="<?php echo $i; ?>" class="plus_sfcm" src="<?php echo (!empty($icons[$i]))? esc_url($icons[$i]) : SFSI_PLUS_PLUGURL.'images/custom.png';?>" id="plus_CImg_<?php echo $i;?>"/>
                </span> 

                <span class="custom sfsiplus_custom-txt">
                    <?php  _e( 'Custom', SFSI_PLUS_DOMAIN); ?>  
                    <?php echo $count;?> 
                </span> 
            </li>
        <?php $count++; endif; endfor; ?>        
    </ul>
    
    <input type="hidden" value="<?php echo SFSI_PLUS_PLUGURL ?>" id="plugin_url" />
 	<input type="hidden" value=""  id="upload_id" />
  	

    <!-- SAVE BUTTON SECTION   -->
 	<div class="save_button tab_1_sav">
   		<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/ajax-loader.gif" class="loader-img" />
   		<?php  $nonce = wp_create_nonce("update_plus_step1"); ?>
   		<a href="javascript:;" id="sfsi_plus_save1" title="Save" data-nonce="<?php echo $nonce;?>">
    		<?php  _e( 'Save', SFSI_PLUS_DOMAIN); ?>
        </a>
 	</div>
    <!-- END SAVE BUTTON SECTION   -->
 	
    <a class="sfsiColbtn closeSec" href="javascript:;" >
    	<?php _e( 'Collapse area', SFSI_PLUS_DOMAIN); ?>
    </a>
 	
    <!-- ERROR AND SUCCESS MESSAGE AREA-->
 	<p class="red_txt errorMsg" style="display:none"> </p>
 	<p class="green_txt sucMsg" style="display:none"> </p>
    
</div>
<!-- END Section 1 "Which icons do you want to show on your site? " main div-->