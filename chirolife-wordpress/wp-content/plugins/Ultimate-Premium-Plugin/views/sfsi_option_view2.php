<?php
	/* unserialize all saved option for second section options */
	$option4=  unserialize(get_option('sfsi_premium_section4_options',false));
	$option2=  unserialize(get_option('sfsi_premium_section2_options',false));
	
	/*
	 * Sanitize, escape and validate values
	 */
	$option2['sfsi_plus_rss_url'] 				=	(isset($option2['sfsi_plus_rss_url']))
														? esc_url($option2['sfsi_plus_rss_url'])
														: '';

	$option2['sfsi_plus_email_icons_functions'] 		=	(isset($option2['sfsi_plus_email_icons_functions']))
																? sanitize_text_field($option2['sfsi_plus_email_icons_functions'])
																: '';
	$option2['sfsi_plus_email_icons_contact'] 			=	(isset($option2['sfsi_plus_email_icons_contact']))
																? sanitize_text_field($option2['sfsi_plus_email_icons_contact'])
																: '';													
	$option2['sfsi_plus_email_icons_pageurl'] 			=	(isset($option2['sfsi_plus_email_icons_pageurl']))
																? sanitize_text_field($option2['sfsi_plus_email_icons_pageurl'])
																: '';
	$option2['sfsi_plus_email_icons_mailchimp_apikey'] 	=	(isset($option2['sfsi_plus_email_icons_mailchimp_apikey']))
																? sanitize_text_field($option2['sfsi_plus_email_icons_mailchimp_apikey'])
																: '';
	$option2['sfsi_plus_email_icons_mailchimp_listid'] 	=	(isset($option2['sfsi_plus_email_icons_mailchimp_listid']))
																? sanitize_text_field($option2['sfsi_plus_email_icons_mailchimp_listid'])
																: '';

	$option2['sfsi_plus_email_icons_subject_line'] 		=	(isset($option2['sfsi_plus_email_icons_subject_line']))
																? stripslashes(sanitize_text_field($option2['sfsi_plus_email_icons_subject_line']))
																: '${title}';
	$option2['sfsi_plus_email_icons_email_content'] 	=	(isset($option2['sfsi_plus_email_icons_email_content']))
																? stripslashes(sanitize_text_field($option2['sfsi_plus_email_icons_email_content']))
																: 'Check out this article «${title}»: ${link}';

	$option2['sfsi_plus_rss_icons'] 			=	(isset($option2['sfsi_plus_rss_icons']))
														? sanitize_text_field($option2['sfsi_plus_rss_icons'])
														: '';
	$option2['sfsi_plus_email_url']				=	(isset($option2['sfsi_plus_email_url']))
														? sanitize_text_field(	$option2['sfsi_plus_email_url'])
														: '';
	
	$option2['sfsi_plus_facebookPage_option']	=	(isset($option2['sfsi_plus_facebookPage_option']))
														? sanitize_text_field($option2['sfsi_plus_facebookPage_option'])
														: '';
	$option2['sfsi_plus_facebookPage_url'] 		=	(isset($option2['sfsi_plus_facebookPage_url']))
														? esc_url($option2['sfsi_plus_facebookPage_url'])
														: '';
	$option2['sfsi_plus_facebookLike_option']	=	(isset($option2['sfsi_plus_facebookLike_option']))
														? sanitize_text_field($option2['sfsi_plus_facebookLike_option'])
														: ' ';
	$option2['sfsi_plus_facebookShare_option'] 	=	(isset($option2['sfsi_plus_facebookShare_option']))
														? sanitize_text_field($option2['sfsi_plus_facebookShare_option'])
														: '';
	$option2['sfsi_plus_facebookFollow_option'] =	(isset($option2['sfsi_plus_facebookFollow_option']))
														? sanitize_text_field($option2['sfsi_plus_facebookFollow_option'])
														: 'no';
	$option2['sfsi_plus_facebookProfile_url']	=	(isset($option2['sfsi_plus_facebookProfile_url']))
														? esc_url($option2['sfsi_plus_facebookProfile_url'])
														: '';
														
	
	$option2['sfsi_plus_twitter_followme'] 		=	(isset($option2['sfsi_plus_twitter_followme']))
														? sanitize_text_field($option2['sfsi_plus_twitter_followme'])
														: '';
	$option2['sfsi_plus_twitter_followUserName']=	(isset($option2['sfsi_plus_twitter_followUserName']))
														? sanitize_text_field($option2['sfsi_plus_twitter_followUserName'])
														: '';
	$option2['sfsi_plus_twitter_aboutPage'] 	=	(isset($option2['sfsi_plus_twitter_aboutPage']))
														? sanitize_text_field($option2['sfsi_plus_twitter_aboutPage'])
														: 'no';

	$option2['sfsi_plus_twitter_page'] 			=	(isset($option2['sfsi_plus_twitter_page']))
														? sanitize_text_field($option2['sfsi_plus_twitter_page'])
														: '';
	$option2['sfsi_plus_twitter_pageURL'] 		=	(isset($option2['sfsi_plus_twitter_pageURL']))
														? esc_url($option2['sfsi_plus_twitter_pageURL'])
														: '';
	
	$option2['sfsi_plus_google_page'] 			=	(isset($option2['sfsi_plus_google_page']))
														? sanitize_text_field($option2['sfsi_plus_google_page'])
														: '';
	$option2['sfsi_plus_google_pageURL'] 		=	(isset($option2['sfsi_plus_google_pageURL']))
														? esc_url($option2['sfsi_plus_google_pageURL'])
														: '';
	$option2['sfsi_plus_googleLike_option'] 	=	(isset($option2['sfsi_plus_googleLike_option']))
														? sanitize_text_field($option2['sfsi_plus_googleLike_option'])
														: '';
	$option2['sfsi_plus_googleShare_option'] 	=	(isset($option2['sfsi_plus_googleShare_option']))
														? sanitize_text_field($option2['sfsi_plus_googleShare_option'])
														: '';
	$option2['sfsi_plus_googleFollow_option'] 	=	(isset($option2['sfsi_plus_googleFollow_option']))
														? sanitize_text_field($option2['sfsi_plus_googleFollow_option'])
														: 'no';
														
														
	$option2['sfsi_plus_youtube_pageUrl'] 		=	(isset($option2['sfsi_plus_youtube_pageUrl']))
														? esc_url($option2['sfsi_plus_youtube_pageUrl'])
														: '';
	$option2['sfsi_plus_youtube_page'] 			=	(isset($option2['sfsi_plus_youtube_page']))
														? sanitize_text_field($option2['sfsi_plus_youtube_page'])
														: '';
	$option2['sfsi_plus_youtube_follow'] 		=	(isset($option2['sfsi_plus_youtube_follow']))
														? sanitize_text_field($option2['sfsi_plus_youtube_follow'])
														: '';
	$option2['sfsi_plus_ytube_user'] 			=	(isset($option2['sfsi_plus_ytube_user']))
														? sanitize_text_field($option2['sfsi_plus_ytube_user'])
														: '';
	
	$option2['sfsi_plus_pinterest_page'] 		=	(isset($option2['sfsi_plus_pinterest_page']))
														? sanitize_text_field($option2['sfsi_plus_pinterest_page'])
														: '';
	$option2['sfsi_plus_pinterest_pageUrl']		=	(isset($option2['sfsi_plus_pinterest_pageUrl']))
														? esc_url($option2['sfsi_plus_pinterest_pageUrl'])
														: '';
	$option2['sfsi_plus_pinterest_pingBlog'] 	=	(isset($option2['sfsi_plus_pinterest_pingBlog']))
														? sanitize_text_field($option2['sfsi_plus_pinterest_pingBlog'])
														: '';
	
	$option2['sfsi_plus_instagram_pageUrl']		=	(isset($option2['sfsi_plus_instagram_pageUrl']))
														? esc_url($option2['sfsi_plus_instagram_pageUrl'])
														: '';
	
	$option2['sfsi_plus_linkedin_page'] 		=	(isset($option2['sfsi_plus_linkedin_page']))
														? sanitize_text_field($option2['sfsi_plus_linkedin_page'])
														: '';
	$option2['sfsi_plus_linkedin_pageURL'] 		=	(isset($option2['sfsi_plus_linkedin_pageURL']))
														? esc_url($option2['sfsi_plus_linkedin_pageURL'])
														: '';
	$option2['sfsi_plus_linkedin_follow'] 		= 	(isset($option2['sfsi_plus_linkedin_follow']))
														? sanitize_text_field($option2['sfsi_plus_linkedin_follow'])
														: '';
	$option2['sfsi_plus_linkedin_followCompany']=	(isset($option2['sfsi_plus_linkedin_followCompany']))
														? intval($option2['sfsi_plus_linkedin_followCompany'])
														: '';
	$option2['sfsi_plus_linkedin_SharePage'] 	= 	(isset($option2['sfsi_plus_linkedin_SharePage']))
														? sanitize_text_field($option2['sfsi_plus_linkedin_SharePage'])
														: '';
	$option2['sfsi_plus_linkedin_recommendBusines']		= 	(isset($option2['sfsi_plus_linkedin_recommendBusines']))
																? sanitize_text_field($option2['sfsi_plus_linkedin_recommendBusines'])
																: '';
	$option2['sfsi_plus_linkedin_recommendCompany'] 	= 	(isset($option2['sfsi_plus_linkedin_recommendCompany']))
																? sanitize_text_field($option2['sfsi_plus_linkedin_recommendCompany'])
																: '';
	$option2['sfsi_plus_linkedin_recommendProductId'] 	= 	(isset($option2['sfsi_plus_linkedin_recommendProductId']))
																? intval($option2['sfsi_plus_linkedin_recommendProductId'])
																: '';
	
	$option2['sfsi_plus_houzz_pageUrl'] 		= 	(isset($option2['sfsi_plus_houzz_pageUrl']))
														? esc_url($option2['sfsi_plus_houzz_pageUrl'])
														: '';
	$option4['sfsi_plus_youtubeusernameorid'] 	= 	(isset($option4['sfsi_plus_youtubeusernameorid'])) 
														? sanitize_text_field($option4['sfsi_plus_youtubeusernameorid'])
														: '';
	$option4['sfsi_plus_ytube_chnlid'] 			= 	(isset($option4['sfsi_plus_ytube_chnlid']))
														? strip_tags(trim($option4['sfsi_plus_ytube_chnlid']))
														: '';
	
	$option2['sfsi_plus_snapchat_pageUrl'] 		= 	(isset($option2['sfsi_plus_snapchat_pageUrl']))
														? esc_url($option2['sfsi_plus_snapchat_pageUrl'])
														: '';
	$option2['sfsi_plus_whatsapp_message'] 		= 	(isset($option2['sfsi_plus_whatsapp_message']))
														? stripslashes(sanitize_text_field($option2['sfsi_plus_whatsapp_message']))
														: '';
	$option2['sfsi_plus_my_whatsapp_number'] 		= 	(isset($option2['sfsi_plus_my_whatsapp_number']))
														? ($option2['sfsi_plus_my_whatsapp_number'])
														: '';										
	$option2['sfsi_plus_whatsapp_number'] 		= 	(isset($option2['sfsi_plus_whatsapp_number']))
														? ($option2['sfsi_plus_whatsapp_number'])
														: '';
	$option2['sfsi_plus_whatsapp_share_page'] 	=	(isset($option2['sfsi_plus_whatsapp_share_page']))
														? stripslashes(sanitize_text_field($option2['sfsi_plus_whatsapp_share_page']))
														: '${title} ${link}';

	$option2['sfsi_plus_skype_options'] 		= 	(isset($option2['sfsi_plus_skype_options'])) ? sanitize_text_field($option2['sfsi_plus_skype_options']): 'call';


	$option2['sfsi_plus_skype_pageUrl'] 		= 	(isset($option2['sfsi_plus_skype_pageUrl']))
														? sanitize_text_field($option2['sfsi_plus_skype_pageUrl'])
														: '';
	$option2['sfsi_plus_vimeo_pageUrl'] 		= 	(isset($option2['sfsi_plus_vimeo_pageUrl']))
														? esc_url($option2['sfsi_plus_vimeo_pageUrl'])
														: '';
	$option2['sfsi_plus_soundcloud_pageUrl'] 	= 	(isset($option2['sfsi_plus_soundcloud_pageUrl']))
														? esc_url($option2['sfsi_plus_soundcloud_pageUrl'])
														: '';
	$option2['sfsi_plus_yummly_pageUrl'] 		= 	(isset($option2['sfsi_plus_yummly_pageUrl']))
														? esc_url($option2['sfsi_plus_yummly_pageUrl'])
														: '';
	$option2['sfsi_plus_flickr_pageUrl'] 		= 	(isset($option2['sfsi_plus_flickr_pageUrl']))
														? esc_url($option2['sfsi_plus_flickr_pageUrl'])
														: '';
	$option2['sfsi_plus_reddit_pageUrl'] 		= 	(isset($option2['sfsi_plus_reddit_pageUrl']))
														? esc_url($option2['sfsi_plus_reddit_pageUrl'])
														: '';
	$option2['sfsi_plus_tumblr_pageUrl'] 		= 	(isset($option2['sfsi_plus_tumblr_pageUrl']))
														? esc_url($option2['sfsi_plus_tumblr_pageUrl'])
														: '';

	// As in new setting Tweet about my page was set in Question 5, moving back to Question 2, so getting setting from question 5
	$tweetAboutPage = 'no';

	if(isset($option2['sfsi_plus_twitter_aboutPage'])){
		$tweetAboutPage = sanitize_text_field($option2['sfsi_plus_twitter_aboutPage']);
	}
	

	$classToAddSfsi_navigate_to_question6 = ($tweetAboutPage=='yes') ? 'addCss':'removeCss';
    $checked = ($tweetAboutPage=='yes') ?  'checked="true"' : '' ;	
?>

<!-- Section 2 "What do you want the icons to do?" main div Start -->
<div class="tab2">
    <!-- RSS ICON -->
    <div class="row bdr_top sfsiplus_rss_section">
    	<h2 class="sfsicls_rs_s">
        	RSS
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'When clicked on, users can subscribe via RSS', SFSI_PLUS_DOMAIN); ?>
            </p>
            <div class="rss_url_row">
                <h4>
               		RSS URL
                </h4>
                <input name="sfsi_plus_rss_url"  id="sfsi_plus_rss_url" class="add" type="url" value="<?php echo ($option2['sfsi_plus_rss_url']!='') ?  $option2['sfsi_plus_rss_url'] : '' ;?>" placeholder="E.g http://www.yoursite.com/feed" />
                <span class="sfrsTxt" >
                	<?php  _e( 'For most blogs it’s http://blogname.com/feed', SFSI_PLUS_DOMAIN); ?>  
                </span>
            </div>
        </div>    
    </div>
    <!-- END RSS ICON -->
    
    <!-- EMAIL ICON -->
    <?php
		$feedId 		= sanitize_text_field(get_option('sfsi_premium_feed_id',false));
		$connectToFeed 	= "http://www.specificfeeds.com/?".base64_encode("userprofile=wordpress&feed_id=".$feedId);
	?>
    <div class="row sfsiplus_email_section">
        <h2 class="sfsicls_email">
        	Email
        </h2>
        <?php sfsi_plus_curl_error_notification();  ?>

        <div class="inr_cont">
			<p>
				<?php _e('Which action should the email icon perform?', SFSI_PLUS_DOMAIN ); ?>
			</p>

			<ul class="sfsi_plus_email_functions_container">
				<li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_email_icons_functions" <?php echo ($option2['sfsi_plus_email_icons_functions']=='sf') ?  'checked="true"' : '' ;?> type="radio" value="sf" class="styled" />
					</div>
					<p>
						<b><?php  _e('Automatic updates for subscribers: ', SFSI_PLUS_DOMAIN); ?></b>
                    	<?php
                    		_e('If people subscribe they will receive your new posts automatically by email. The service is FREE and you get full access to your subscriber’s emails and interesting statistics: ', SFSI_PLUS_DOMAIN);
                    	?> 
                    	<a class="pop-up" href="javascript:" data-id="feedClaiming-overlay">
							<?php _e('Get full access now.', SFSI_PLUS_DOMAIN ); ?>
						</a>
						
						<?php  _e('It also makes sense if you already offer an email newsletter. ', SFSI_PLUS_DOMAIN); ?>
						
						<a href="http://specificfeeds.com/rss" target="_new">
							<?php _e('Learn more.', SFSI_PLUS_DOMAIN ); ?>
						</a>
                    </p>
				</li>
				<li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_email_icons_functions" <?php echo ($option2['sfsi_plus_email_icons_functions']=='contact') ?  'checked="true"' : '' ;?> type="radio" value="contact" class="styled" />
					</div>
					<p>
						<b><?php  _e('Contact me: ', SFSI_PLUS_DOMAIN); ?></b>
                    	<?php
                    		_e('If people click on the icon an email will open with your email address already entered. This makes sense to use if you don’t offer a contact option anywhere else.', SFSI_PLUS_DOMAIN);
                    	?>
                    </p>
                    <div class="sfsi_plus_field">
                    	<label>Your Email:</label>
                    	<input type="text" name="sfsi_plus_email_icons_contact" 
                    		value="<?php echo (isset($option2['sfsi_plus_email_icons_contact'])) ? $option2['sfsi_plus_email_icons_contact'] : '' ;?>">
                    </div>
				</li>
				<li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_email_icons_functions" <?php echo ($option2['sfsi_plus_email_icons_functions']=='page') ?  'checked="true"' : '' ;?> type="radio" value="page" class="styled" />
					</div>
					<p>
						<b><?php  _e('Link it to a certain page ', SFSI_PLUS_DOMAIN); ?></b>
                    	<?php
                    		_e('(e.g. contact us or subscription page)', SFSI_PLUS_DOMAIN);
                    	?>
                    </p>
                    <div class="sfsi_plus_field">
                    	<label>URL:</label>
                    	<input type="text" name="sfsi_plus_email_icons_pageurl" placeholder="http://"
                    		value="<?php echo (isset($option2['sfsi_plus_email_icons_pageurl'])) ? $option2['sfsi_plus_email_icons_pageurl'] : '' ;?>">
                    </div>
				</li>
				<li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_email_icons_functions" <?php echo ($option2['sfsi_plus_email_icons_functions']=='share_email') ?  'checked="true"' : '' ;?> type="radio" value="share_email" class="styled" />
					</div>
					<p>
						<b><?php  _e('<b>Share by email</b>', SFSI_PLUS_DOMAIN); ?></b>
                    </p>
                    <div class="sfsi_plus_field">
                    	<label>Subject line:</label>
                    	<input type="text" name="sfsi_plus_email_icons_subject_line" placeholder="http://" value="<?php echo (isset($option2['sfsi_plus_email_icons_subject_line'])) ? $option2['sfsi_plus_email_icons_subject_line'] : '${title}' ;?>">
                    </div>
                    <div class="sfsi_plus_field">
                    	<label>Email content:</label> 
                    	<div class="sfsi_plus_email_icons_content" >
                    		<textarea name="sfsi_plus_email_icons_email_content" id="sfsi_plus_email_icons_email_content" type="text" class="add_txt" placeholder="" /><?php echo (isset($option2['sfsi_plus_email_icons_email_content']) && $option2['sfsi_plus_email_icons_email_content']!='') ?  stripslashes($option2['sfsi_plus_email_icons_email_content']) : 'Check out this article «${title}»: ${link}' ;?></textarea>
                            <p>
								<?php 
									_e('In the fields above, insert ${title} where you want the title of the story to get displayed, and ${link} where you want the link to the article to appear.',  SFSI_PLUS_DOMAIN);
								?>
							</p>
							<p>
								<?php _e('Any other text you enter will always be used as you entered it.',  SFSI_PLUS_DOMAIN); ?>
							</p>	
						</div>
                    </div>
				</li>
				<!-- <li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_email_icons_functions" <?php echo ($option2['sfsi_plus_email_icons_functions']=='newsletter') ?  'checked="true"' : '' ;?> type="radio" value="newsletter" class="styled" />
					</div>
					<p>
						<b><?php  _e('Subscribe to my existing Newsletter: ', SFSI_PLUS_DOMAIN); ?></b>
                    	<?php
                    		_e('If you already have mailchimp as newsletter provider, enter', SFSI_PLUS_DOMAIN);
                    	?>
                    </p>
                    <div class="sfsi_plus_field">
                    	<label>API Key:</label>
                    	<input type="text" name="sfsi_plus_email_icons_mailchimp_apikey"
                    		value="<?php echo (isset($option2['sfsi_plus_email_icons_mailchimp_apikey'])) ? $option2['sfsi_plus_email_icons_mailchimp_apikey'] : '' ;?>">
                    </div>
                    <div class="sfsi_plus_field">
                    	<label>ListId:</label>
                    	<input type="text" name="sfsi_plus_email_icons_mailchimp_listid"
                    		value="<?php echo (isset($option2['sfsi_plus_email_icons_mailchimp_listid'])) ? $option2['sfsi_plus_email_icons_mailchimp_listid'] : '' ;?>">
                    </div>
				</li> -->
			</ul>

           	<p><?php _e( 'Pick which icon you want to use:', SFSI_PLUS_DOMAIN); ?></p>
            
            <ul class="tab_2_email_sec">
                <li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_rss_icons" <?php echo ($option2['sfsi_plus_rss_icons']=='email') ?  'checked="true"' : '' ;?> type="radio" value="email" class="styled" /><span class="email_icn"></span>
					</div>
					<label>
                    	<?php  _e( 'Email icon', SFSI_PLUS_DOMAIN); ?>
                    </label>
                </li>
				<li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_rss_icons" <?php echo ($option2['sfsi_plus_rss_icons']=='subscribe') ?  'checked="true"' : '' ;?> type="radio" value="subscribe" class="styled" /><span class="subscribe_icn"></span>
					</div>
					<label>
                    	<?php  _e( 'Follow icon', SFSI_PLUS_DOMAIN); ?>
                    	<span class="sfplsdesc"> 
                    		(<?php  _e( 'increases sign-ups', SFSI_PLUS_DOMAIN); ?>)
                    	</span>
                    </label>
                </li>
				<li>
					<div class="sfsiplusicnsdvwrp">
						<input name="sfsi_plus_rss_icons" <?php echo ($option2['sfsi_plus_rss_icons']=='sfsi') ?  'checked="true"' : '' ;?> type="radio" value="sfsi" class="styled"  /><span class="sf_arow"></span>
					</div>
					<label>
                    	<?php _e( 'SpecificFeeds icon', SFSI_PLUS_DOMAIN); ?>
                    	<span class="sfplsdesc"> 
                    		(<?php _e( 'provider of the service', SFSI_PLUS_DOMAIN); ?>)
                    	</span>
                    </label>
                </li>
            </ul>
             <p><?php _e( 'The service offers many (more) advantages:', SFSI_PLUS_DOMAIN); ?></p>  
            <div class='sfsi_plus_service_row'>
            	<div class='sfsi_plus_service_column'>
            		<ul>
            			<li><span><?php _e( 'More people come back', SFSI_PLUS_DOMAIN); ?></span><?php _e( ' to your site', SFSI_PLUS_DOMAIN); ?></li>
            			<li><?php _e( 'See your ', SFSI_PLUS_DOMAIN); ?><span><?php _e( 'subscribers’ emails', SFSI_PLUS_DOMAIN); ?></span><?php _e( ' & ', SFSI_PLUS_DOMAIN); ?><span><?php _e( 'interesting statistics', SFSI_PLUS_DOMAIN); ?></span></li>
            			<li><?php _e( 'Automatically post on ', SFSI_PLUS_DOMAIN); ?><span><?php _e( 'Facebook & Twitter', SFSI_PLUS_DOMAIN); ?></span></li>
	            	</ul>
            	</div>
                <div class='sfsi_plus_service_column'>
                	<ul>
		                <li><span><?php _e( 'Get more traffic', SFSI_PLUS_DOMAIN); ?></span><?php _e( ' by being listed in the SF directory', SFSI_PLUS_DOMAIN); ?></li>
		                <li><span><?php _e( 'Get alerts', SFSI_PLUS_DOMAIN); ?></span><?php _e( ' when people subscribe or unsubscribe', SFSI_PLUS_DOMAIN); ?></li>
		                <li><span><?php _e( 'Tailor the sender name & subject line', SFSI_PLUS_DOMAIN); ?></span><?php _e( ' of the emails', SFSI_PLUS_DOMAIN); ?></li>
	                </ul> 
	            </div>
            </div>

            <form id="calimingOptimizationForm" method="get" action="https://www.specificfeeds.com/wpclaimfeeds/getFullAccess" target="_blank">
	            <div class="sfsi_plus_inputbtn">
	            	<input type="hidden" name="feed_id" value="<?php echo sanitize_text_field(get_option('sfsi_premium_feed_id',false)); ?>" />
	            	<input type="email" name="email" value="<?php echo bloginfo('admin_email'); ?>"  />
	            </div>
	           	<div class='sfsi_plus_more_services_link'>
	                <a class="pop-up" href="javascript:" id="getMeFullAccess" title="Give me access">
	                	<?php  _e('Click here to benefit from all advantages >', SFSI_PLUS_DOMAIN ); ?>
					</a> 
	            </div>
      		</form>

            <p class='sfsi_plus_email_last_paragraph'>
            	<?php _e( 'This will create your FREE account on SpecificFeeds, using above email. ', SFSI_PLUS_DOMAIN); ?><br>
            	<?php _e( 'All data will be treated highly confidentially, see the', SFSI_PLUS_DOMAIN); ?>
				<a href="https://www.specificfeeds.com/page/privacy-policy" target="_new">
					<?php  _e('Privacy Policy.', SFSI_PLUS_DOMAIN ); ?>
				</a>
			</p>

        </div>
    </div>
    <!-- END EMAIL ICON -->
    
    <!-- FACEBOOK ICON -->
    <div class="row sfsiplus_facebook_section">
    	<h2 class="sfsicls_facebook">
        	Facebook
        </h2>
        <div class="inr_cont">
            <p>
            	<?php _e( 'The facebook icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do', SFSI_PLUS_DOMAIN); ?>
            	<a class="rit_link pop-up" href="javascript:;"  data-id="fbex-s2">
	                (<?php  _e( 'see an example', SFSI_PLUS_DOMAIN); ?>).
            	</a>
            </p>
            <p>
            	<?php  _e( 'The facebook icon should allow users to...', SFSI_PLUS_DOMAIN); ?>
            </p> 
            
            <p class="radio_section fb_url">
			<input name="sfsi_plus_facebookPage_option" <?php echo ($option2['sfsi_plus_facebookPage_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
            
            <label>
            	<?php  _e( 'Visit my Facebook page at:', SFSI_PLUS_DOMAIN); ?>
            </label>
            
            <input class="add" name="sfsi_plus_facebookPage_url" type="url" value="<?php echo ($option2['sfsi_plus_facebookPage_url']!='') ?  $option2['sfsi_plus_facebookPage_url'] : '' ;?>" placeholder="E.g https://www.facebook.com/your_page_name" /></p>
            
            <p class="radio_section fb_url extra_sp">
            	<input name="sfsi_plus_facebookLike_option" <?php echo ($option2['sfsi_plus_facebookLike_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Like my blog on Facebook (+1)', SFSI_PLUS_DOMAIN); ?>
            	</label>
            </p>
            
            <p class="radio_section fb_url extra_sp">
            	<input name="sfsi_plus_facebookShare_option" <?php echo ($option2['sfsi_plus_facebookShare_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"/>
                
                <label>
            		<?php  _e( 'Share my blog with friends (on Facebook)', SFSI_PLUS_DOMAIN); ?> 
            	</label>
            </p>
            
            <!--<p class="radio_section fb_url extra_sp sfsi_plus_profile_check_section">
            	<input name="sfsi_plus_facebookFollow_option" <?php echo ($option2['sfsi_plus_facebookFollow_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"/>
                
                <label>
            		<?php  _e( 'Follow via facebook (allow user to follow you with one click, while still on your page)', SFSI_PLUS_DOMAIN); ?>
            	</label>
            </p>
            
            <p class="radio_section fb_url sfsi_plus_profile_url_section" 
				style="<?php echo ($option2['sfsi_plus_facebookFollow_option']=='yes') ? 'display:block' : 'display:none' ;?>">
                
            	<label><?php  _e( 'Your facebook profile URL:', SFSI_PLUS_DOMAIN); ?></label>
                <input class="add" name="sfsi_plus_facebookProfile_url" type="url" value="<?php echo ($option2['sfsi_plus_facebookProfile_url']!='') ?  $option2['sfsi_plus_facebookProfile_url'] : '' ;?>" placeholder="E.g https://www.facebook.com/your_profile" />
            </p>-->
            
        </div>
    </div>
    <!-- END FACEBOOK ICON -->
    
    <!-- TWITTER ICON -->
    <div class="row sfsiplus_twitter_section">
    	<h2 class="sfsicls_twt">
        	Twitter
        </h2>
        
        <div class="inr_cont twt_tab_2">
             <p>
              <?php
              	_e( 'The Twitter icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do', SFSI_PLUS_DOMAIN);
				?>
             	<a class="rit_link pop-up" href="javascript:;"  data-id="twex-s2">
             		(<?php  _e( 'see an example', SFSI_PLUS_DOMAIN); ?>).
             	</a>
             </p> 
             <p>
             	<?php  _e( 'The Twitter icon should allow users to...', SFSI_PLUS_DOMAIN); ?>
             </p> 
         	 <p class="radio_section fb_url">
             	<input name="sfsi_plus_twitter_page" <?php echo ($option2['sfsi_plus_twitter_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Visit me on Twitter:', SFSI_PLUS_DOMAIN); ?> 
            	</label>
                <input name="sfsi_plus_twitter_pageURL" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_plus_twitter_pageURL']!='') ?  $option2['sfsi_plus_twitter_pageURL'] : '' ;?>" class="add" />
             </p>
             
             <div class="radio_section fb_url twt_fld">
             	<input name="sfsi_plus_twitter_followme"  <?php echo ($option2['sfsi_plus_twitter_followme']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
             	
                <label>
              		<?php  _e( 'Follow me on Twitter:', SFSI_PLUS_DOMAIN); ?> 
             	</label>
                
                <input name="sfsi_plus_twitter_followUserName" type="text" value="<?php echo ($option2['sfsi_plus_twitter_followUserName']!='') ?  $option2['sfsi_plus_twitter_followUserName'] : '' ;?>" placeholder="my_twitter_name" class="add" />
             </div>
            
            <div class="radio_section fb_url twt_fld_2">
             	 <input name="sfsi_plus_twitter_aboutPage" type="checkbox" value="yes" <?php echo $checked; ?> class="styled"  /> 
             	<label>
             		<?php  _e( 'Tweet about my page:', SFSI_PLUS_DOMAIN ); ?>
             	</label>

                <a class="sfsi_navigate_to_question6 <?php echo $classToAddSfsi_navigate_to_question6; ?>" id="navigate_to_question6" href="#custom_social_data_setting" style="float: left;margin-left: 18px;margin-top:23px;color:#1a1d20;"><?php _e("To define what will be tweeted, please make the selections under question 6.",SFSI_PLUS_DOMAIN); ?></a>  
            </div>
                          
        </div>
    </div>
    <!-- END TWITTER ICON -->
    
    <!-- GOOGLE ICON -->
    <div class="row sfsiplus_google_section">
    	<h2 class="sfsicls_ggle_pls">Google+</h2>
        <div class="inr_cont google_in">
            <p>
            	<?php  _e( 'The Google+ icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do', SFSI_PLUS_DOMAIN ); ?>
            	<a class="rit_link pop-up" href="javascript:;"  data-id="googlex-s2">
                	(<?php  _e( 'see an example', SFSI_PLUS_DOMAIN ); ?>).
                </a>
			</p>
            <p>
            	<?php  _e( 'The Google+ icon should allow users to...', SFSI_PLUS_DOMAIN ); ?>
            </p> 
            <p class="radio_section fb_url">
            	<input name="sfsi_plus_google_page" <?php echo ($option2['sfsi_plus_google_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	
                <label>
            		<?php  _e( 'Visit my Google+ page at:', SFSI_PLUS_DOMAIN ); ?>
            	</label>
            	
                <input name="sfsi_plus_google_pageURL" type="url" placeholder="E.g https://plus.google.com/[pageid]" value="<?php echo ($option2['sfsi_plus_google_pageURL']!='') ?  $option2['sfsi_plus_google_pageURL'] : '' ;?>" class="add" />
            
            </p>
            <p class="radio_section fb_url">
            	<input name="sfsi_plus_googleLike_option" <?php echo ($option2['sfsi_plus_googleLike_option']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Like my blog on Google+ (+1)', SFSI_PLUS_DOMAIN ); ?>
            	</label>
            </p> 
            <p class="radio_section fb_url">
            	<input name="sfsi_plus_googleShare_option" <?php echo ($option2['sfsi_plus_googleShare_option']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	
                <label>
            		<?php  _e( 'Share my blog with friends (on Google+)', SFSI_PLUS_DOMAIN ); ?>
            	</label>
            </p>
            
            <p class="radio_section fb_url">
            	<input name="sfsi_plus_googleFollow_option" <?php echo ($option2['sfsi_plus_googleFollow_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                
                <label>
            		<?php  _e( 'Follow via google (allow user to follow you with one click, While still on your page)', SFSI_PLUS_DOMAIN); ?> 
            	</label>
            </p>
            
        </div>
    </div>
    <!-- END GOOGLE ICON -->
    
    <!-- YOUTUBE ICON -->
    <div class="row sfsiplus_youtube_section">
    	<h2 class="sfsicls_utube">
        	Youtube
        </h2>
        <div class="inr_cont utube_inn">
            <p>
            	<?php  _e( 'The Youtube icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do', SFSI_PLUS_DOMAIN ); ?>
            	<a class="rit_link pop-up" href="javascript:;"  data-id="ytex-s2">
            		(<?php  _e( 'see an example', SFSI_PLUS_DOMAIN ); ?>).
            	</a>
            </p> 
            <p>
            	<?php  _e( 'The youtube icon should allow users to...', SFSI_PLUS_DOMAIN ); ?>
            </p> 
            <p class="radio_section fb_url"><input name="sfsi_plus_youtube_page" <?php echo ($option2['sfsi_plus_youtube_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Visit my Youtube page at:', SFSI_PLUS_DOMAIN ); ?>
            	</label>
                <input name="sfsi_plus_youtube_pageUrl" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_plus_youtube_pageUrl']!='') ?  $option2['sfsi_plus_youtube_pageUrl'] : '' ;?>" class="add" />
            </p>
            <p class="radio_section fb_url"><input name="sfsi_plus_youtube_follow" <?php echo ($option2['sfsi_plus_youtube_follow']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Subscribe to me on Youtube', SFSI_PLUS_DOMAIN ); ?>
            		<span>
            			<?php  _e( '(allows people to subscribe to you directly, without leaving your blog)', SFSI_PLUS_DOMAIN ); ?>
            		</span>
                </label>
            </p>
        	<!--Adding Code for Channel Id and Channel Name-->
        	<?php
				if(!isset($option2['sfsi_plus_youtubeusernameorid']))
				{
					$sfsi_plus_youtubeusernameorid = '';
				}
				else
				{
					$sfsi_plus_youtubeusernameorid = $option2['sfsi_plus_youtubeusernameorid'];
				}
			?>
       	 
         <div class="cstmutbewpr">
            <ul class="enough_waffling">
               <li onclick="showhideutube(this);"><input name="sfsi_plus_youtubeusernameorid" <?php echo ($sfsi_plus_youtubeusernameorid=='name') ?  'checked="true"' : '' ;?> type="radio" value="name" class="styled"  />
               <label>
               		<?php  _e( 'User Name', SFSI_PLUS_DOMAIN ); ?>
               </label>
               </li>
               <li onclick="showhideutube(this);"><input name="sfsi_plus_youtubeusernameorid" <?php echo ($sfsi_plus_youtubeusernameorid=='id') ?  'checked="true"' : '' ;?> type="radio" value="id" class="styled"  />
               <label>
               		<?php  _e( 'Channel Id', SFSI_PLUS_DOMAIN ); ?>
               </label></li>
            </ul>
            <div class="cstmutbtxtwpr">
            	<div class="cstmutbchnlnmewpr" <?php if($sfsi_plus_youtubeusernameorid != 'id'){echo 'style="display: block;"';}?>>
                	<p class="extra_pp">
                    	<label><?php  _e( 'UserName:', SFSI_PLUS_DOMAIN ); ?></label>
                        <input name="sfsi_plus_ytube_user" type="url" value="<?php echo (isset($option2['sfsi_plus_ytube_user']) && $option2['sfsi_plus_ytube_user']!='') ?  $option2['sfsi_plus_ytube_user'] : '' ;?>" placeholder="Youtube username" class="add" />
                    </p>
                    <div class="utbe_instruction">
                    	<?php _e( 'To find your User ID/Channel ID, login to your YouTube account, click the user icon at the top right corner and select "Settings", then click "Advanced" under "Name" and you will find both your "Channel ID" and "User ID" under "Account Information".', SFSI_PLUS_DOMAIN ); ?>
                    </div>
                </div>
                <div class="cstmutbchnlidwpr" <?php if($sfsi_plus_youtubeusernameorid == 'id'){echo 'style="display: block"';}?>>
                	<p class="extra_pp">
                    	<label>
                       		<?php  _e( 'Channel Id:', SFSI_PLUS_DOMAIN ); ?>
                        </label>
                        <input name="sfsi_plus_ytube_chnlid" type="text" value="<?php echo (isset($option2['sfsi_plus_ytube_chnlid']) && $option2['sfsi_plus_ytube_chnlid']!='') ?  $option2['sfsi_plus_ytube_chnlid'] : '' ;?>" placeholder="youtube_channel_id" class="add" />
                    </p>
                    <div class="utbe_instruction">
                    	<?php  _e( 'To find your User ID/Channel ID, login to your YouTube account, click the user icon at the top right corner and select "Settings", then click "Advanced" under "Name" and you will find both your "Channel ID" and "User ID" under "Account Information".', SFSI_PLUS_DOMAIN ); ?>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </div>
    <!-- END YOUTUBE ICON -->
    
    <!-- PINTEREST ICON -->
    <div class="row sfsiplus_pinterest_section">
    	<h2 class="sfsicls_pinterest">Pinterest</h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'The Pinterest icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do', SFSI_PLUS_DOMAIN ); ?>
				<a class="rit_link pop-up" href="javascript:;"  data-id="pinex-s2">
            		(<?php  _e( 'see an example', SFSI_PLUS_DOMAIN ); ?>).
            	</a>
            </p> 
            <p>
            	<?php  _e( 'The Pinterest icon should allow users to...', SFSI_PLUS_DOMAIN ); ?>
            </p> 
            <p class="radio_section fb_url">
            	<input name="sfsi_plus_pinterest_page" <?php echo ($option2['sfsi_plus_pinterest_page']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                <label>
            		<?php  _e( 'Visit my Pinterest page at:', SFSI_PLUS_DOMAIN ); ?>
            	</label>
                <input name="sfsi_plus_pinterest_pageUrl" type="url" placeholder="http://"  value="<?php echo ($option2['sfsi_plus_pinterest_pageUrl']!='') ?  $option2['sfsi_plus_pinterest_pageUrl'] : '' ;?>" class="add" />
            </p>
            <div class="pint_url">
            	<p class="radio_section fb_url">
                	<input name="sfsi_plus_pinterest_pingBlog" <?php echo ($option2['sfsi_plus_pinterest_pingBlog']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
            		<label>
           				<?php  _e( 'Pin my blog on Pinterest (+1)', SFSI_PLUS_DOMAIN); ?>
            		</label>
            	</p>
            </div>
        </div>
    </div>
    <!-- END PINTEREST ICON -->
    
    <!-- INSTAGRAM ICON -->
    <div class="row sfsiplus_instagram_section">
    	<h2 class="sfsicls_instagram">
        	Instagram
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'When clicked on, users will get directed to your Instagram page', SFSI_PLUS_DOMAIN ); ?>.
            </p> 
            <p class="radio_section fb_url  cus_link instagram_space" >
            	<label>
            		URL
            	</label>
                <input name="sfsi_plus_instagram_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_instagram_pageUrl']) && $option2['sfsi_plus_instagram_pageUrl']!='') ?  $option2['sfsi_plus_instagram_pageUrl'] : '' ;?>" placeholder="http://" class="add"  />
            </p>
        </div>
    </div>
    <!-- END INSTAGRAM ICON -->
    
    <!-- LINKEDIN ICON -->
    <div class="row sfsiplus_linkedin_section">
    	<h2 class="sfsicls_linkdin">
        	LinkedIn
        </h2>
        <div class="inr_cont linked_tab_2 link_in">
            <p>
              	<?php  _e( 'The LinkedIn icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do', SFSI_PLUS_DOMAIN ); ?>
            	<a class="rit_link pop-up" href="javascript:;"  data-id="linkex-s2">
	            	(<?php  _e( 'see an example', SFSI_PLUS_DOMAIN); ?>).
            	</a>
            </p> 
            <p>
            	<?php  _e( 'You find your ID in the link of your profile page, e.g. https://www.linkedin.com/profile/view?id=<b>8539887</b>&trk=nav_responsive_tab_profile_pic', SFSI_PLUS_DOMAIN ); ?>
           </p>
            <p>
            	 <?php  _e( 'The LinkedIn icon should allow users to...', SFSI_PLUS_DOMAIN ); ?>
            </p> 
            <div class="radio_section fb_url link_1">
            	<input name="sfsi_plus_linkedin_page" <?php echo ($option2['sfsi_plus_linkedin_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
              		<?php _e( 'Visit my Linkedin page at:', SFSI_PLUS_DOMAIN ); ?>
            	</label>
                <input name="sfsi_plus_linkedin_pageURL" type="text" placeholder="http://" value="<?php echo ($option2['sfsi_plus_linkedin_pageURL']!='') ?  $option2['sfsi_plus_linkedin_pageURL'] : '' ;?>" class="add" />
            </div>
            
            <div class="radio_section fb_url link_2">
            	<input name="sfsi_plus_linkedin_follow" <?php echo ($option2['sfsi_plus_linkedin_follow']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	
                <label>
           			<?php  _e( 'Follow me on Linkedin:', SFSI_PLUS_DOMAIN ); ?>
            	</label>
                
                <input name="sfsi_plus_linkedin_followCompany" type="text" value="<?php echo ($option2['sfsi_plus_linkedin_followCompany']!='') ?  $option2['sfsi_plus_linkedin_followCompany'] : '' ;?>" class="add" placeholder="Enter company ID, e.g. 123456" />
            </div>
            
            <div class="radio_section fb_url link_3">
            	<input name="sfsi_plus_linkedin_SharePage" <?php echo ($option2['sfsi_plus_linkedin_SharePage']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
            	<label>
            		<?php  _e( 'Share my page on LinkedIn', SFSI_PLUS_DOMAIN ); ?>
            	</label>
            </div>
            
            <div class="radio_section fb_url link_4">
            	<input name="sfsi_plus_linkedin_recommendBusines" <?php echo ($option2['sfsi_plus_linkedin_recommendBusines']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  />
                <label class="anthr_labl">
            		<?php  _e( 'Recommend my business or product on Linkedin', SFSI_PLUS_DOMAIN ); ?>
            	</label>
                <input name="sfsi_plus_linkedin_recommendProductId" type="text" value="<?php echo ($option2['sfsi_plus_linkedin_recommendProductId']!='') ?  $option2['sfsi_plus_linkedin_recommendProductId'] : '' ;?>" class="add link_dbl" placeholder="Enter Product ID, e.g. 1441" /> <input name="sfsi_plus_linkedin_recommendCompany" type="text" value="<?php echo ($option2['sfsi_plus_linkedin_recommendCompany']!='') ?  $option2['sfsi_plus_linkedin_recommendCompany'] : '' ;?>" class="add" placeholder="Enter company name, e.g. Google”" />
            </div>
            <div class="lnkdin_instruction">
                <?php  _e( 'To find your Product or Company ID, you can use their ID lookup tool at', SFSI_PLUS_DOMAIN ); ?>
                <a target="_blank" href="https://developer.linkedin.com/apply-getting-started#company-lookup">
                	https://developer.linkedin.com/apply-getting-started#company-lookup
                </a>
                . <?php  _e( 'You need to be logged in to Linkedin to be able to use it.', SFSI_PLUS_DOMAIN ); ?>
            </div>
        </div>
    </div>
    <!-- END LINKEDIN ICON -->
    
    <!-- SNAPCHAT ICON -->
    <div class="row sfsiplus_snapchat_section">
    	<h2 class="sfsicls_snapchat">
        	Snapchat
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'When clicked on, users will get directed to your Snapchat page.', SFSI_PLUS_DOMAIN ); ?>  
            </p> 
            <p class="radio_section fb_url  cus_link instagram_space" >
            	<label>
            	    URL
                </label>
                <input name="sfsi_plus_snapchat_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_snapchat_pageUrl']) && $option2['sfsi_plus_snapchat_pageUrl']!='') ?  $option2['sfsi_plus_snapchat_pageUrl'] : '' ;?>" placeholder="http://" class="add" />
            </p>        
        </div>
    </div>
    <!-- SNAPCHAT ICON -->
    
    <!-- Whatapp ICON -->
    <div class="row sfsiplus_whatsapp_section">
    	<h2 class="sfsicls_whatsapp">
        	WhatsApp or Phone
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'Here you have two options:', SFSI_PLUS_DOMAIN ); ?>  
            </p> 
            <div class="radio_section fb_url  cus_link instagram_space" >
            	<ul>
                	<li>
                    	<p class="sfsi_plus_pageurl_type">
                    		<input class="styled" type="radio" value="message" name="sfsi_plus_whatsapp_url_type" <?php echo ($option2['sfsi_plus_whatsapp_url_type']=='message') ?  'checked="true"' : '' ;?>>
							<label><?php _e("Allow users to send me a WhatsApp-message (Only works on mobile phones)", SFSI_PLUS_DOMAIN); ?></label>
                        </p>
                        <div class="tab2 .inr_cont">
							<label>Pre-filled message:</label>
							<input name="sfsi_plus_whatsapp_message" type="text" value="<?php echo (isset($option2['sfsi_plus_whatsapp_message']) && $option2['sfsi_plus_whatsapp_message']!='') ?  $option2['sfsi_plus_whatsapp_message'] : '' ;?>" placeholder="Hey, i like your website." class="add" />
                         </div>
						<div class="tab2 .inr_cont">
								<label>My Whatsapp number</label>
								<input name="sfsi_plus_my_whatsapp_number" type="text" value="<?php echo (isset($option2['sfsi_plus_my_whatsapp_number']) && $option2['sfsi_plus_my_whatsapp_number']!='') ?  $option2['sfsi_plus_my_whatsapp_number'] : '' ;?>" placeholder="" class="add" />
                       </div>
						<div class="inr_cont_div">
							<label><?php _e("Start with + and then country code, e.g. +1 for US" , SFSI_PLUS_DOMAIN);?></label>
						</div>
                    </li>
                       
                    <li>
                    	<p class="sfsi_plus_pageurl_type">
                    		<input class="styled" type="radio" value="call" name="sfsi_plus_whatsapp_url_type" <?php echo ($option2['sfsi_plus_whatsapp_url_type']=='call') ?  'checked="true"' : '' ;?>>
							<label><?php _e("Allow users to call me via their mobile or standard desktop application (doesn’t have anything to do with WhatsApp)", SFSI_PLUS_DOMAIN); ?></label>
                        </p>
                        <label>My phone number:</label>
						<div class="sfsi_plus_whatsapp_number_container">
                        	<input name="sfsi_plus_whatsapp_number" type="text" value="<?php echo (isset($option2['sfsi_plus_whatsapp_number']) && $option2['sfsi_plus_whatsapp_number']!='') ?  $option2['sfsi_plus_whatsapp_number'] : '' ;?>" placeholder="" class="add" />
                            
                            <label><?php _e("Start with + and then country code, e.g. +1 for US", SFSI_PLUS_DOMAIN);?></label>
                        </div>
                    </li>
                    <li>
                    	<p class="sfsi_plus_pageurl_type">
                    		<input class="styled" type="radio" value="share_page" name="sfsi_plus_whatsapp_url_type" <?php echo ($option2['sfsi_plus_whatsapp_url_type']=='share_page') ?  'checked="true"' : '' ;?>>
							<label><?php _e("Allow users to share the page via WhatsApp ", SFSI_PLUS_DOMAIN); ?></label>
                        </p>
                        <div class= "sfsi_plus_whatsapp_share_page_container">    
							<textarea name="sfsi_plus_whatsapp_share_page" id="sfsi_plus_whatsapp_share_page" type="text" class="add_txt" placeholder="" /><?php echo (isset($option2['sfsi_plus_whatsapp_share_page']) && $option2['sfsi_plus_whatsapp_share_page']!='') ?  stripslashes($option2['sfsi_plus_whatsapp_share_page']) : '${title} ${link}' ;?></textarea>
							<label>
								<p>
								    <?php _e('In the field above, insert ${title} where you want the title of the story to get displayed, and ${link} where you want the link to the article to appear.', SFSI_PLUS_DOMAIN);?>
	                            </p>
	                            <p>
									<?php _e("Any other text you enter will always be used as you entered it.",  SFSI_PLUS_DOMAIN); ?>
								</p>							
							</label>
						</div>	
                    </li>
               </ul>
            </div>        
        </div>
    </div>
    <!-- Whatapp ICON -->
    
    <!-- Skype ICON -->
    <div class="row sfsiplus_skype_section">

		<h2 class="sfsicls_skype">Skype</h2>

		<div class="container">

			<div class="row noborder">
				<p><?php _e('What shall happen if visitors click on this icon', SFSI_PLUS_DOMAIN); ?></p>
			</div>

			<div class="row noborder gutter-5">

	            <div class="col-sm-6 col-md-3 col-lg-2">
	            	<label class="radio-inline"><?php _e('Call me',SFSI_PLUS_DOMAIN);?></label>	            
	            	<input name="sfsi_plus_skype_options" type="radio" value="call" <?php if($option2['sfsi_plus_skype_options']=="call") { echo 'checked="true"';}?> class="styled">
	            </div>

				<div class="col-sm-6 col-md-3 col-lg-2">
					<label class="radio-inline"><?php _e('Open skype chat',SFSI_PLUS_DOMAIN);?></label>
					<input name="sfsi_plus_skype_options" type="radio" value="chat" <?php if($option2['sfsi_plus_skype_options']=="chat") { echo 'checked="true"';}?> class="styled">				
				</div>

			</div>

			<div class="row noborder">

				<div class="tab-content">
				    
				    <div id="sfsi_plus_skype_call" class="tab-pane active">
					    <p class="radio_section fb_url  cus_link instagram_space" >
		            	<label>
		            	    Your Skype username
		                </label>
		                <input name="sfsi_plus_skype_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_skype_pageUrl']) && $option2['sfsi_plus_skype_pageUrl']!='') ?  $option2['sfsi_plus_skype_pageUrl'] : '' ;?>" placeholder="http://" class="add" />
		            	</p> 
	            	</div>

				    <div id="sfsi_plus_skype_chat" class="tab-pane active">
				    	
				    </div>

				</div>
			</div>

		</div>

    </div>
    <!-- Skype ICON -->
    
    <!-- vimeo ICON -->
    <div class="row sfsiplus_vimeo_section">
    	<h2 class="sfsicls_vimeo">
        	Vimeo
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'When clicked on, users will get directed to your Vimeo page.', SFSI_PLUS_DOMAIN ); ?>  
            </p> 
            <p class="radio_section fb_url  cus_link instagram_space" >
            	<label>
            	    URL
                </label>
                <input name="sfsi_plus_vimeo_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_vimeo_pageUrl']) && $option2['sfsi_plus_vimeo_pageUrl']!='') ?  $option2['sfsi_plus_vimeo_pageUrl'] : '' ;?>" placeholder="http://" class="add" />
            </p>        
        </div>
    </div>
    <!-- vimeo ICON -->
    
    <!-- Soundcloud ICON -->
    <div class="row sfsiplus_soundcloud_section">
    	<h2 class="sfsicls_soundcloud">
        	Soundcloud
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'When clicked on, users will get directed to your Soundcloud page.', SFSI_PLUS_DOMAIN ); ?>  
            </p> 
            <p class="radio_section fb_url  cus_link instagram_space" >
            	<label>
            	    URL
                </label>
                <input name="sfsi_plus_soundcloud_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_soundcloud_pageUrl']) && $option2['sfsi_plus_soundcloud_pageUrl']!='') ?  $option2['sfsi_plus_soundcloud_pageUrl'] : '' ;?>" placeholder="http://" class="add" />
            </p>        
        </div>
    </div>
    <!-- Soundcloud ICON -->
    
    <!-- Yummly ICON -->
    <div class="row sfsiplus_yummly_section">
    	<h2 class="sfsicls_yummly">
        	Yummly
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'When clicked on, users will get directed to your Yummly page.', SFSI_PLUS_DOMAIN ); ?>  
            </p> 
            <p class="radio_section fb_url  cus_link instagram_space" >
            	<label>
            	    URL
                </label>
                <input name="sfsi_plus_yummly_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_yummly_pageUrl']) && $option2['sfsi_plus_yummly_pageUrl']!='') ?  $option2['sfsi_plus_yummly_pageUrl'] : '' ;?>" placeholder="http://" class="add" />
            </p>        
        </div>
    </div>
    <!-- Yummly ICON -->
    
    <!-- Flickr ICON -->
    <div class="row sfsiplus_flickr_section">
    	<h2 class="sfsicls_flickr">
        	Flickr
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'When clicked on, users will get directed to your Flickr page.', SFSI_PLUS_DOMAIN ); ?>  
            </p> 
            <p class="radio_section fb_url  cus_link instagram_space" >
            	<label>
            	    URL
                </label>
                <input name="sfsi_plus_flickr_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_flickr_pageUrl']) && $option2['sfsi_plus_flickr_pageUrl']!='') ?  $option2['sfsi_plus_flickr_pageUrl'] : '' ;?>" placeholder="http://" class="add" />
            </p>        
        </div>
    </div>
    <!-- Flickr ICON -->
    
    <!-- Reddit ICON -->
    <div class="row sfsiplus_reddit_section">
    	<h2 class="sfsicls_reddit">
        	Reddit
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'Here you have two options:', SFSI_PLUS_DOMAIN ); ?>  
            </p> 
            <div class="radio_section fb_url  cus_link instagram_space" >
            	<ul>
                	<li>
                    	<p class="sfsi_plus_pageurl_type">
                    		<input class="styled" type="radio" value="share" name="sfsi_plus_reddit_url_type" <?php echo ($option2['sfsi_plus_reddit_url_type']=='share') ?  'checked="true"' : '' ;?>>
							<label><?php _e("Allow users to share the page on Reddit", SFSI_PLUS_DOMAIN); ?></label>
                        </p>
                    </li>
                    <li>
                    	<p class="sfsi_plus_pageurl_type">
                    		<input class="styled" type="radio" value="url" name="sfsi_plus_reddit_url_type" <?php echo ($option2['sfsi_plus_reddit_url_type']=='url') ?  'checked="true"' : '' ;?>>
							<label><?php _e("Allow users to visit my reddit page", SFSI_PLUS_DOMAIN); ?></label>
                        </p>
                        <label>URL</label>
                        <input name="sfsi_plus_reddit_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_reddit_pageUrl']) && $option2['sfsi_plus_reddit_pageUrl']!='') ?  $option2['sfsi_plus_reddit_pageUrl'] : '' ;?>" placeholder="http://" class="add" />
                    </li>
               </ul>
                
            </div>        
        </div>
    </div>
    <!-- Reddit ICON -->
    
    <!-- Tumblr ICON -->
    <div class="row sfsiplus_tumblr_section">
    	<h2 class="sfsicls_tumblr">
        	Tumblr
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'When clicked on, users will get directed to your Tumblr page.', SFSI_PLUS_DOMAIN ); ?>  
            </p> 
            <p class="radio_section fb_url  cus_link instagram_space" >
            	<label>
            	    URL
                </label>
                <input name="sfsi_plus_tumblr_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_tumblr_pageUrl']) && $option2['sfsi_plus_tumblr_pageUrl']!='') ?  $option2['sfsi_plus_tumblr_pageUrl'] : '' ;?>" placeholder="http://" class="add" />
            </p>        
        </div>
    </div>
    <!-- Tumblr ICON -->
    
    <!-- share button -->
    <div class="row sfsiplus_share_section">
   		<h2 class="sfsicls_share">
        	Share
        </h2>
        <div class="inr_cont">
        	<p>
            	<?php  _e( 'Nothing needs to be done here – your visitors to share your site via «all the other» social media sites.', SFSI_PLUS_DOMAIN ); ?>
            	<a class="rit_link pop-up" href="javascript:;"  data-id="share-s2">
            		(<?php  _e( 'see an example', SFSI_PLUS_DOMAIN ); ?>).
            	</a>
            </p> 
        </div>
    </div>
    <!-- share end -->
    
    <!-- HOUZZ ICON -->
    <div class="row sfsiplus_houzz_section">
    	<h2 class="sfsicls_houzz">
        	Houzz
        </h2>
        <div class="inr_cont">
            <p>
            	<?php  _e( 'Please provide the url to your Houzz profile (e.g. http://www.houzz.com/user/your_username).', SFSI_PLUS_DOMAIN ); ?>  
            </p> 
            <p class="radio_section fb_url  cus_link instagram_space" >
            	<label>
            	    URL
                </label>
                <input name="sfsi_plus_houzz_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_plus_houzz_pageUrl']) && $option2['sfsi_plus_houzz_pageUrl']!='') ?  $option2['sfsi_plus_houzz_pageUrl'] : '' ;?>" placeholder="http://" class="add" />
            </p>        
        </div>
    </div>
    <!-- HOUZZ ICON -->
    
    <!-- Custom icon section start here -->
    <div class="plus_custom-links sfsiplus_custom_section">
	<?php 
	  	$costom_links = unserialize($option2['sfsi_plus_CustomIcon_links']);
	  	$count = 1;
		for($i = $first_key; $i <= $endkey; $i++) :
		if(!empty( $icons[$i])) :
			?>
           	<div class="row  sfsiICON_<?php echo $i; ?> cm_lnk">
               	<h2 class="custom">
               		<span class="customstep2-img">
                    	<img src="<?php echo (!empty($icons[$i])) ?  esc_url($icons[$i]) : SFSI_PLUS_PLUGURL.'images/custom.png';?>" id="CImg_<?php echo $new_element; ?>" style="border-radius:48%"  />
                    </span>
                    <span class="sfsiCtxt">
               			<?php  _e( 'Custom', SFSI_PLUS_DOMAIN ); ?>
			   			<?php echo $count; ?>
                    </span>
                </h2>
               	<div class="inr_cont ">
                   	<p>
                	   <?php  _e( 'Where do you want this icon to link to?', SFSI_PLUS_DOMAIN ); ?>
                   	</p> 	

                   	<p class="radio_section fb_url sfsiplus_custom_section cus_link " >

                   		<label>
                   			<?php  _e( 'Link:', SFSI_PLUS_DOMAIN ); ?>
                   		</label>
                        <input name="sfsi_plus_CustomIcon_links[]" type="text" value="<?php echo (isset($costom_links[$i]) && $costom_links[$i]!='') ?  sanitize_text_field($costom_links[$i]) : '' ;?>" placeholder="http://" class="add" file-id="<?php echo $i; ?>" />
                    </p>
                    
                   	<p class="customIconNote">
                   		<?php _e('* Note: you can also give the icon a «call me» functionality be entering «tel:» and then the phone number, and give it a + before the country code, e.g. in the case of US (country code = 1) it could be «tel:+145054654654» (without quotes). '); ?>
                   	</p>

                   	<p class="customIconNote">
                   		<?php _e(' Or, give it a «Send me an SMS» functionality by entering «sms://» and then the mobile phone number as mentioned above, e.g. «sms://+145054654654» (without quotes).'); ?>
                   	</p>                   	

        		</div>
           	</div>
	 		<?php
			$count++;
		endif; endfor;
	?>
    </div> 
   
    <!-- END Custom icon section here -->

    <!-- SAVE BUTTON SECTION --> 
    <div class="save_button tab_2_sav">
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/ajax-loader.gif" class="loader-img" />
        
		<?php  $nonce = wp_create_nonce("update_plus_step2"); ?>
        
        <a href="javascript:;" id="sfsi_plus_save2" title="Save" data-nonce="<?php echo $nonce;?>">
        	<?php  _e( 'Save', SFSI_PLUS_DOMAIN ); ?>
        </a>
    </div>
    <!-- END SAVE BUTTON SECTION   -->
    <a class="sfsiColbtn closeSec section2sfsiColbtn" href="javascript:;">
    	<?php  _e( 'Collapse area', SFSI_PLUS_DOMAIN ); ?>
    </a>
    
    <label class="closeSec"></label>
    
    <!-- ERROR AND SUCCESS MESSAGE AREA-->
    <p class="red_txt errorMsg" style="display:none"> </p>
    <p class="green_txt sucMsg" style="display:none"> </p>

</div>
<!-- END Section 2 "What do you want the icons to do?" main div -->
