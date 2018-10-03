<!-- ********************************************* Set custom social sharing data STARTS ******************************************************* -->
<?php wp_enqueue_media();?>

<div class="row sfsi_custom_social_data_setting" id="custom_social_data_setting">

	<div class="row noborder noMariginPaddintTop sfsi_custom_social_data_section_heading"><?php _e("Sharing texts & pictures", SFSI_PLUS_DOMAIN); ?></div>

	<div class="container-fluid">


		<div class="row noborder noMariginPaddintTop">
			<p><?php _e('You have two options: either you define the sharing texts & pics individually per page/post, or globally, i.e. then the same text & picture will
gets shared across all the pages of your domain.',SFSI_PLUS_DOMAIN);?></p>
		</div>

		<div class="row noborder top25 noMariginPaddintTop">

		    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-4 noleftrightpadding">
		        <label class="radio-inline"><?php _e('Set it per post/page',SFSI_PLUS_DOMAIN);?></label>	            
		        <input name="sfsi_plus_social_sharing_options" type="radio" value="posttype" <?php if($option5['sfsi_plus_social_sharing_options']=="posttype") { echo 'checked="true"';}?> class="styled" data-target="#sharePostType" data-toggle="tab">
		    </div>

			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-4 noleftrightpadding">
				<label class="radio-inline"><?php _e('Set global text & picture',SFSI_PLUS_DOMAIN);?></label>
				<input name="sfsi_plus_social_sharing_options" type="radio" value="global" <?php if($option5['sfsi_plus_social_sharing_options']=="global") { echo 'checked="true"';}?> class="styled" data-target="#shareGlobal" data-toggle="tab">				
			</div>

		</div>		

	</div>

	<div class="row noborder noMariginPaddintTop">

		<div class="tab-content">

			<div class="social_data_post_types tab-pane <?php if($option5['sfsi_plus_social_sharing_options']=="posttype") { echo 'active';}?>" id="sharePostType">

						
						<p class="sfsi_post_info"><?php _e("On the pages where you edit your posts / pages you’ll see a (new) section where you can define which pictures & text should be shared. This extra section is displayed on the following:", SFSI_PLUS_DOMAIN); ?> </p>
						<?php
		               	 	$args 			   = array( '_builtin' => false,'public'   => true );
							$postTypes         = array();
							$post_types 	   = get_post_types($args,'names');
							$default_post_types= array("page","post");
							$custom_post_types = array_values($post_types);

							$final_post_types  = !empty($custom_post_types) ? array_merge($default_post_types,$custom_post_types):$default_post_types;

							$selectedPostTypes    = array();
							$arrselectedPostTypes = array();
							$serselectedPostTypes = array();

							$arrselectedPostTypes = (isset($option5['sfsi_custom_social_data_post_types_data']))? $option5['sfsi_custom_social_data_post_types_data']:$arrselectedPostTypes;
							$serselectedPostTypes = (isset($option5['sfsi_custom_social_data_post_types_data'][0]))? $option5['sfsi_custom_social_data_post_types_data'][0]:$serselectedPostTypes;

							if(isset($arrselectedPostTypes) && is_array($arrselectedPostTypes) && count($arrselectedPostTypes)>0){
								$selectedPostTypes = $arrselectedPostTypes;
							}
							else if(isset($serselectedPostTypes) && is_array($serselectedPostTypes) && count($serselectedPostTypes)>0){
								$selectedPostTypes = $serselectedPostTypes;
								$option5['sfsi_custom_social_data_post_types_data'] = serialize($selectedPostTypes);
								update_option('sfsi_premium_section5_options',$option5);// CODE TO REMOVE FOR VERSION 2.8
							}
							
							$selectedPostTypes = (count($selectedPostTypes)>0)? $selectedPostTypes:array();													
					?>	

		         <ul>
		             <?php foreach($final_post_types as $postname) {
		                				
		                				$checked = '';

		                				if(is_array($selectedPostTypes) && count($selectedPostTypes)>0 && $selectedPostTypes!=null){
											$checked = (in_array($postname,$selectedPostTypes)) ? 'checked=true': $checked;                				                			
		                				}

		                				$pt = get_post_type_object( $postname );
		                				$postDisplayName = $pt->labels->singular_name;							
		                			?>
		                		<li>
									<div class="radio_section tb_4_ck">
										<input data-cl="sfsi_premium_custom_social_data_post_types" name="sfsi_custom_social_data_post_types[]" type="checkbox" value="<?php echo $postname; ?>" <?php echo esc_attr($checked); ?> class="styled"  />
										<label class="cstmdsplsub"><?php echo ucfirst($postDisplayName) ;?></label>
									</div>
								</li>
		              <?php } ?>
		          </ul>
		    </div>

		    <div class="tab-pane <?php if($option5['sfsi_plus_social_sharing_options']=="global") { echo 'active'; }?>" id="shareGlobal">
		        <!-- Sharing Text & Pictures section STARTS  here -->
        			<?php include(SFSI_PLUS_DOCROOT.'/views/subviews/que6/sfsi_option_view6_global_shared_social_network_data.php'); ?>
    			<!-- Sharing Text & Pictures section CLOSES  here -->
		    </div>

		</div>

	</div>


<!-- ********************************************* Set custom social sharing data CLOSES ******************************************************* -->

                <?php
                	$sfsi_radio_usm_og_tags_val = (isset($option5['sfsi_plus_disable_usm_og_meta_tags'])) ? $option5['sfsi_plus_disable_usm_og_meta_tags']: "no";
                ?>

                <div class="sfsi_disable_usm_for_ogtags">

                	<p><span><?php _e("Special case:", SFSI_PLUS_DOMAIN ); ?></span> <?php _e("If you are using another plugin which also places the meta tags on your site (required to define which text & picture get shared), such as an SEO plugin, then our plugin overwrites those values (only for the cases where you actually specified a picture or text in our plugin on the edit post/page area – otherwise there is no conflict). If you don’t want that, then you can disable this.", SFSI_PLUS_DOMAIN ); ?></p>

                	<p class="sfsi_disable_usm_meta_text"><?php _e("Disable Ultimate Social Media Plugin to set the meta tags to define which picture and text gets shared?",SFSI_PLUS_DOMAIN); ?></p>

					<ul class="sfsi_plus_disable_usm_og_meta_tags_ul">
        				<li>
            	            <input type="radio" name="sfsi_plus_disable_usm_og_meta_tags" class="styled" value="no" <?php if($sfsi_radio_usm_og_tags_val=="no") echo'checked="checked"' ;?>>
                			<label><?php _e("No",SFSI_PLUS_DOMAIN ); ?></label>
            			</li>
            			<li>
            	            <input type="radio" name="sfsi_plus_disable_usm_og_meta_tags" class="styled" value="yes" <?php if($sfsi_radio_usm_og_tags_val=="yes") echo'checked="checked"' ;?>>
                			<label><?php _e("Yes",SFSI_PLUS_DOMAIN ); ?></label>
            			</li>
        			</ul>                		
                </div>

<!--******************************************************** Twitter Setting STARTS **************************************************************-->
	
	<?php $displayTwtSetting =  ($option2['sfsi_plus_twitter_aboutPage']=='yes') ? 'display:block' : 'display:none'; 

		$sfsi_plus_twitter_aboutPageText = isset($option5['sfsi_plus_twitter_aboutPageText']) && !empty($option5['sfsi_plus_twitter_aboutPageText']) ? $option5['sfsi_plus_twitter_aboutPageText']: "";		
	?>

	<div id="twitterSettingContainer" style="<?php echo $displayTwtSetting; ?>">

			<div class="radio_section twitterHeading" style="margin-top: 70px;"><?php  _e( 'Twitter:', SFSI_PLUS_DOMAIN ); ?></div>

	 		<div class="radio_section fb_url twt_fld_2 social_twitter" style="margin-top: 15px;">
	             	             	
	             	<label>
	             		<?php  _e( 'Default Tweet text:', SFSI_PLUS_DOMAIN ); ?>
	             	</label>

	                <textarea name="sfsi_plus_twitter_aboutPageText" id="sfsi_plus_twitter_aboutPageText" type="text" class="add_txt" placeholder="Hey, check out this cool site I found: www.yourname.com #Topic via@my_twitter_name" /><?php echo $sfsi_plus_twitter_aboutPageText; ?></textarea>


	                <p style="margin-left: 237px;">
	                	<?php _e('In the tweet-text above, insert ${title} where you want the title of the story to get displayed, and ${link} where you want the link to the article to appear.',SFSI_PLUS_DOMAIN); ?>
	                </p>
	                <p style="margin-left: 237px;">
	                	<?php _e('Any other text you enter will always be used as you entered it. Maybe you also want to use #Hashtags or @your_twitter_handle.',SFSI_PLUS_DOMAIN); ?>
	                </p>

	                
	                <?php
						$display = ($option2['sfsi_plus_twitter_aboutPage']=='yes')? "display:block;": "display:none;";       
					?>         	

		     <div class="contTwitterCard" style="<?php echo $display;?>">

	             	<label>
	             		<?php  _e( 'Twitter Cards:', SFSI_PLUS_DOMAIN ); ?>
	             	</label>

		      		<p style="margin-left: 237px;padding-top: 7px!important;"><?php _e('Do you want to include pictures and snippets in the tweets?', SFSI_PLUS_DOMAIN);?></p>

					<ul class="tab_2_email_sec sfsi_plus_mobile_selection">
		                <li>
			             		<input name="sfsi_plus_twitter_twtAddCard"  <?php echo ($option5['sfsi_plus_twitter_twtAddCard']=='no') ?  'checked="true"' : '' ;?> type="radio" value="no" class="styled"  />
								<label>
		                    		<?php  _e( 'No', SFSI_PLUS_DOMAIN); ?>
		                    	</label> 
		                </li>
		                <li>
			             		<input name="sfsi_plus_twitter_twtAddCard"  <?php echo ($option5['sfsi_plus_twitter_twtAddCard']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
								<label>
		                    		<?php  _e( 'Yes', SFSI_PLUS_DOMAIN); ?>
		                    	</label>
		                </li>
		            </ul>	             

		            <p style="margin-left: 237px;float: left;clear: both;"><?php _e("If you select «Yes» then if people Tweet about your page, an image and text snippet will be included in the Tweet, increasing chances that the Tweet will get seen by your sharer’s followers. This feature is called ‘Twitter cards’ and you can read more about it here: <a target='_blank' href='https://dev.twitter.com/cards/overview'>Twitter cards</a>. The picture which will get taken is the one you defined as ‘featured image’ on the respective page (where the Tweet-button appears.)", SFSI_PLUS_DOMAIN);?>	            	
		            </p>

		            <?php 
		            	$cardDisplay 	 = (isset($option5['sfsi_plus_twitter_twtAddCard']) && $option5['sfsi_plus_twitter_twtAddCard']=='yes')? 'display:block;': 'display:none;';

		            	$cardTwitterHandle = $option5['sfsi_plus_twitter_card_twitter_handle'];
						$dbtwitterHandle   = $option2['sfsi_plus_twitter_followUserName'];

						$twitterHandle   = (strlen($cardTwitterHandle)>0) ? $cardTwitterHandle:$dbtwitterHandle;
						//$placeholder	 = (strlen($twitterHandle)>0) ? " ":"@your_twitter_handle":	            	            	
		            ?>


		            <div class="cardDataContainer" style="<?php echo $cardDisplay;?>">

		            	<!-- Twiiter handle --> 
						<div class="sfsiplusicnsdvwrp cardWrapper cardTwitterHandle">
		                	
		                	<label>
		              			<?php  _e( 'Your Twitter Handle:', SFSI_PLUS_DOMAIN); ?> 
		             		</label>

						<input name="sfsi_plus_twitter_card_twitter_handle" type="text" value="<?php echo $twitterHandle; ?>" placeholder="" class="add section6_twitter_handle_input">	             		
		             	</div>

		            	<!-- Twiiter card type --> 	             	
		             	<div class="sfsiplusicnsdvwrp cardWrapper cardTypeSelector">		

		               		 <label>
		              			<?php  _e( 'Choose Card Type:', SFSI_PLUS_DOMAIN); ?> 
		             		</label>

							<select class="form-control" id="twitterCardType">
						    	<option value="summary" <?php echo ($option5['sfsi_plus_twitter_twtCardType']=='summary') ?  'selected' : '' ;?>>Summary</option>
						   	 <option value="summary_large_image" <?php echo ($option5['sfsi_plus_twitter_twtCardType']=='summary_large_image') ?  'selected' : '' ;?>>Summary with large image</option>
						 	 </select>

						  </div>

		             	</div>

		             </div></div>

	</div>
<!--************************ Twitter Setting CLOSES *************************-->
	

</div><!-- #custom_social_data_setting closes -->

<!-- ****************************************************************** Set custom social sharing data CLOSES *************************************************************** -->
