<?php
	/* unserialize all saved option for  section 7 options */
    $option7=  unserialize(get_option('sfsi_premium_section7_options',false));
	
	/**
	 * Sanitize, escape and validate values
	 */
	$option7['sfsi_plus_popup_text'] 				=	isset($option7['sfsi_plus_popup_text']) && !empty($option7['sfsi_plus_popup_text']) ? $option7['sfsi_plus_popup_text'] : '';

	$option7['sfsi_plus_popup_background_color']	=	(isset($option7['sfsi_plus_popup_background_color']))
															? sfsi_plus_sanitize_hex_color($option7['sfsi_plus_popup_background_color'])
															: '';
	$option7['sfsi_plus_popup_border_color'] 		=	(isset($option7['sfsi_plus_popup_border_color']))
															? sfsi_plus_sanitize_hex_color($option7['sfsi_plus_popup_border_color'])
															: '';
	$option7['sfsi_plus_popup_border_thickness'] 	=	(isset($option7['sfsi_plus_popup_border_thickness']))
															? intval($option7['sfsi_plus_popup_border_thickness'])
															: '';
	$option7['sfsi_plus_popup_border_shadow'] 		=	(isset($option7['sfsi_plus_popup_border_shadow']))
															? sanitize_text_field($option7['sfsi_plus_popup_border_shadow'])
															: '';
	$option7['sfsi_plus_popup_font'] 				=	(isset($option7['sfsi_plus_popup_font']))
															? sanitize_text_field($option7['sfsi_plus_popup_font'])
															: '';
	$option7['sfsi_plus_popup_fontSize'] 			=	(isset($option7['sfsi_plus_popup_fontSize']))
															? intval($option7['sfsi_plus_popup_fontSize'])
															: '';
	$option7['sfsi_plus_popup_fontStyle'] 			=	(isset($option7['sfsi_plus_popup_fontStyle']))
															? sanitize_text_field($option7['sfsi_plus_popup_fontStyle'])
															: '';
	$option7['sfsi_plus_popup_fontColor'] 			=	(isset($option7['sfsi_plus_popup_fontColor']))
															? sfsi_plus_sanitize_hex_color($option7['sfsi_plus_popup_fontColor'])
															: '';
	$option7['sfsi_plus_Show_popupOn'] 				=	(isset($option7['sfsi_plus_Show_popupOn']))
															? sanitize_text_field($option7['sfsi_plus_Show_popupOn'])
															: '';
    $option7['sfsi_plus_Show_popupOn_somepages_blogpage']  =   (isset($option7['sfsi_plus_Show_popupOn_somepages_blogpage']))
                                                            ? sanitize_text_field($option7['sfsi_plus_Show_popupOn_somepages_blogpage'])
                                                            : '';
    $option7['sfsi_plus_Show_popupOn_somepages_selectedpage'] =  (isset($option7['sfsi_plus_Show_popupOn_somepages_selectedpage']))
                                                            ? sanitize_text_field($option7['sfsi_plus_Show_popupOn_somepages_selectedpage'])
                                                            : '';                                                                                                                        
	$option7['sfsi_plus_Shown_pop'] 				=	(isset($option7['sfsi_plus_Shown_pop']))
															? $option7['sfsi_plus_Shown_pop']
															: array('ETscroll');
	$option7['sfsi_plus_Shown_popupOnceTime'] 		=	(isset($option7['sfsi_plus_Shown_popupOnceTime']))
															? intval($option7['sfsi_plus_Shown_popupOnceTime'])
															: '';
    $option7['sfsi_plus_popup_type_iconsOrForm']    =   (isset($option7['sfsi_plus_popup_type_iconsOrForm']))
                                                            ? $option7['sfsi_plus_popup_type_iconsOrForm']
                                                            : 'icons';

    $option7['sfsi_plus_popup_show_on_desktop']    =   (isset($option7['sfsi_plus_popup_show_on_desktop']))
                                                            ? sanitize_text_field($option7['sfsi_plus_popup_show_on_desktop'])
                                                            : '';
    $option7['sfsi_plus_popup_show_on_mobile']     =   (isset($option7['sfsi_plus_popup_show_on_mobile']))
                                                            ? sanitize_text_field($option7['sfsi_plus_popup_show_on_mobile'])
                                                            : '';

    $iconsDisplay = ($option7['sfsi_plus_popup_type_iconsOrForm']=="icons") ? 'style="display:block"': 'style="display:none"';
    $iconsForm    = ($option7['sfsi_plus_popup_type_iconsOrForm']=="form") ? 'style="display:block"': 'style="display:none"';

    $sfsi_plus_Hide_popupOnScroll                   =   (isset($option7['sfsi_plus_Hide_popupOnScroll']))
                                                            ? sanitize_text_field($option7['sfsi_plus_Hide_popupOnScroll'])
                                                            : 'no';
    $sfsi_plus_Hide_popupOn_OutsideClick            =   (isset($option7['sfsi_plus_Hide_popupOn_OutsideClick']))
                                                            ? sanitize_text_field($option7['sfsi_plus_Hide_popupOn_OutsideClick'])
                                                            : 'no';

?>
<!-- Section 7 "Do you want to display a pop-up, asking people to subscribe?" main div Start -->
<div class="tab7">
	<p>
    	<?php  _e( 'You can increase chances that people share or follow you by displaying a pop-up asking them to. You can define the design and layout below:', SFSI_PLUS_DOMAIN  ); ?>
    </p>
<!-- icons preview section -->
<div class="like_pop_box">

	<div class="sfsi_plus_Popinner">

	<h2>
		<?php  !empty($option7['sfsi_plus_popup_text']) ? _e( sfsi_premium_nl2br($option7['sfsi_plus_popup_text']), SFSI_PLUS_DOMAIN ) : '' ; ?>
	</h2>
	<ul class="like_icon plus_sfsi_sample_icons" <?php echo $iconsDisplay; ?>>
    	 <li class="sfsiplus_rss_section">
         	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/rss.png" alt="RSS" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_rss_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_email_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/<?php echo $email_image; ?>" alt="Email" class="icon_img" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_email_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_fb_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/fb.png" alt="Facebook" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_facebook_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_google_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/google_plus.png" alt="Google Plus" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_google_countsDisplay">12k</span>
           	</div>
        </li>
        <li class="sfsiplus_twitter_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/twitter.png" alt="Twitter" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_twitter_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_share_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/share.png" alt="Share" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_shares_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_youtube_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/youtube.png" alt="YouTube" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_youtube_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_pinterest_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/pinterest.png" alt="Pinterest" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_pinterest_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_linkedin_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/linked_in.png" alt="Linked In" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_linkedIn_countsDisplay">12k</span>
            </div>
        </li>
		<li class="sfsiplus_instagram_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/instagram.png" alt="Instagram" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_instagram_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_houzz_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/houzz.png" alt="Houzz" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_houzz_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_snapchat_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/snapchat.png" alt="snapchat" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_snapchat_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_whatsapp_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/whatsapp.png" alt="whatsapp" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_whatsapp_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_skype_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/skype.png" alt="skype" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_skype_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_vimeo_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/vimeo.png" alt="vimeo" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_vimeo_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_soundcloud_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/soundcloud.png" alt="soundcloud" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_soundcloud_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_yummly_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/yummly.png" alt="yummly" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_yummly_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_flickr_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/flickr.png" alt="flickr" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_flickr_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_reddit_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/reddit.png" alt="reddit" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_reddit_countsDisplay">12k</span>
            </div>
        </li>
        <li class="sfsiplus_tumblr_section">
        	<div>
            	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/tumblr.png" alt="tumblr" />
                <span class="sfsi_Cdisplay" id="sfsi_plus_tumblr_countsDisplay">12k</span>
            </div>
        </li>
		<?php
		if(isset($icons) && !empty($icons))
		{
			if(is_array($icons))
			{
				foreach($icons as $icn =>$img)
				{
					echo '<li class="sfsiplus_custom_section sfsiICON_'.$icn.'"  element-id="'.$icn.'" ><div><img src="'.$img.'" alt="Custom Icon" class="sfcm" /><span class="sfsi_Cdisplay">12k</span></div></li>';
				}
			}
		}
		?>
	</ul>

    <ul class="like_icon plus_sfsi_subscribe_form" <?php echo $iconsForm; ?>>
        <?php echo do_shortcode("[USM_plus_form]");?>
    </ul>      
</div>
</div>
<!-- END icons preview section -->

<div class="row">

    <h4><?php  _e( 'Content of Popup:', SFSI_PLUS_DOMAIN ); ?></h4>

    <ul class="sfsi_plus_cl_popup_type_iconsOrForm">
        <li>
         <input name="sfsi_plus_popup_type_iconsOrForm" <?php echo ($option7['sfsi_plus_popup_type_iconsOrForm']=='icons') ?  'checked="true"' : '' ;?> type="radio" value="icons" class="styled"  />
         <label> 
            <?php  _e( 'Social Media Icons', SFSI_PLUS_DOMAIN ); ?>
        </label>
        </li>

         <li>
            <input name="sfsi_plus_popup_type_iconsOrForm" <?php echo ($option7['sfsi_plus_popup_type_iconsOrForm']=='form') ?  'checked="true"' : '' ;?>  type="radio" value="form" class="styled" />
            <label>
                <?php  _e( 'Subscription form (see Question 8)', SFSI_PLUS_DOMAIN ); ?>
            </label>
        </li>
    </ul>    
</div>

<!-- icons controllers section -->
<div class="space">
	
    <h4><?php  _e( 'Text and Design', SFSI_PLUS_DOMAIN ); ?></h4>
	
    <div class="text_options">
		
        <h3><?php  _e( 'Text Options', SFSI_PLUS_DOMAIN ); ?></h3>
		
        <div class="sfsiplus_row_tab">
            <label><?php  _e( 'Text:', SFSI_PLUS_DOMAIN ); ?></label>
<!--                     <input class="mkPop" name="sfsi_plus_popup_text" type="text" value="<?php //echo ($option7['sfsi_plus_popup_text']!='') ?  $option7['sfsi_plus_popup_text'] : '' ;?>" /> -->

            <textarea name="sfsi_plus_popup_text" id="sfsi_plus_popup_text" type="text" class="medium" placeholder="Enjoy this blog? Please spread the word :)"><?php echo !empty($option7['sfsi_plus_popup_text']) ?  trim($option7['sfsi_plus_popup_text']) : 'Enjoy this blog? Please spread the word :)'; ?></textarea>

		</div>
		<div class="sfsiplus_row_tab">
			<label><?php  _e( 'Font:', SFSI_PLUS_DOMAIN ); ?></label>
			<div class="field">
				<select name="sfsi_plus_popup_font" id="sfsi_plus_popup_font" class="styled">
					<option value="Arial, Helvetica, sans-serif" <?php echo ($option7['sfsi_plus_popup_font']=='Arial, Arial, Helvetica, sans-serif') ?  'selected="true"' : '' ;?>>
						Arial
					</option>
					<option value="Arial Black, Gadget, sans-serif" <?php echo ($option7['sfsi_plus_popup_font']=='Arial Black, Gadget, sans-serif') ?  'selected="true"' : '' ;?>>
						Arial Black
					</option>
					<option value="Calibri" <?php echo ($option7['sfsi_plus_popup_font']=='Calibri') ?  'selected="true"' : '' ;?>>
						Calibri
					</option>
					<option value="Comic Sans MS" <?php echo ($option7['sfsi_plus_popup_font']=='Comic Sans MS') ?  'selected="true"' : '' ;?>>
						Comic Sans MS
					</option>
					<option value="Courier New" <?php echo ($option7['sfsi_plus_popup_font']=='Courier New') ?  'selected="true"' : '' ;?>>
						Courier New
					</option>
					<option value="Georgia" <?php echo ($option7['sfsi_plus_popup_font']=='Georgia') ?  'selected="true"' : '' ;?>>
						Georgia
					</option>
					<option value="Helvetica,Arial,sans-serif" <?php echo ($option7['sfsi_plus_popup_font']=='Helvetica,Arial,sans-serif') ?  'selected="true"' : '' ;?>>
						Helvetica
					</option>
					<option value="Impact" <?php echo ($option7['sfsi_plus_popup_font']=='Impact') ?  'selected="true"' : '' ;?>>
						Impact
					</option>
					<option value="Lucida Console" <?php echo ($option7['sfsi_plus_popup_font']=='Lucida Console') ?  'selected="true"' : '' ;?>>
						Lucida Console
					</option>
					<option value="Tahoma,Geneva" <?php echo ($option7['sfsi_plus_popup_font']=='Tahoma,Geneva') ?  'selected="true"' : '' ;?>>
						Tahoma
					</option>
					<option value="Times New Roman" <?php echo ($option7['sfsi_plus_popup_font']=='Times New Roman') ?  'selected="true"' : '' ;?>>
						Times New Roman
					</option>
					<option value="Trebuchet MS" <?php echo ($option7['sfsi_plus_popup_font']=='Trebuchet MS') ?  'selected="true"' : '' ;?>>
						Trebuchet MS
					</option>
					<option value="Verdana" <?php echo ($option7['sfsi_plus_popup_font']=='Verdana') ?  'selected="true"' : '' ;?>>
						Verdana
					</option>
				</select>
			</div>
		</div>
		<div class="sfsiplus_row_tab">
			<label><?php  _e( 'Font style:', SFSI_PLUS_DOMAIN ); ?></label>
			<div class="field">
				<select name="sfsi_plus_popup_fontStyle" id="sfsi_plus_popup_fontStyle" class="styled">
					<option value="normal" <?php echo ($option7['sfsi_plus_popup_fontStyle']=='normal') ?  'selected="true"' : '' ;?>>
						Normal
					</option>
					<option value="inherit" <?php echo ($option7['sfsi_plus_popup_fontStyle']=='inherit') ?  'selected="true"' : '' ;?>>
						Inherit
					</option>
					<option value="oblique" <?php echo ($option7['sfsi_plus_popup_fontStyle']=='oblique') ?  'selected="true"' : '' ;?>>
						Oblique
					</option>
					<option value="italic" <?php echo ($option7['sfsi_plus_popup_fontStyle']=='italic') ?  'selected="true"' : '' ;?>>
						Italic
					</option>
				</select>
			</div>
		</div>
		<div class="sfsiplus_row_tab">
			<label><?php  _e( 'Font color:', SFSI_PLUS_DOMAIN ); ?></label>
            <input name="sfsi_plus_popup_fontColor" data-default-color="#b5b5b5" id="sfsi_plus_popup_fontColor" type="text" value="<?php echo ($option7['sfsi_plus_popup_fontColor']!='') ?  $option7['sfsi_plus_popup_fontColor'] : '' ;?>" />
		</div>
		<div class="sfsiplus_row_tab">
			<label>
            	<?php  _e( 'Font size:', SFSI_PLUS_DOMAIN ); ?>
            </label>
            <input min="16" name="sfsi_plus_popup_fontSize" type="number" value="<?php echo ($option7['sfsi_plus_popup_fontSize']!='') ?  $option7['sfsi_plus_popup_fontSize'] : '' ;?>" class="small" />
		</div>
	</div>
	<div class="text_options layout">
		<h3>
        	<?php  _e( 'Icon Box Layout', SFSI_PLUS_DOMAIN ); ?>
        </h3>
		<div class="sfsiplus_row_tab">
			<label>
            	<?php  _e( 'Background Color:', SFSI_PLUS_DOMAIN ); ?>
			</label>
            <input name="sfsi_plus_popup_background_color" data-default-color="#b5b5b5" id="sfsi_plus_popup_background_color" type="text" value="<?php echo ($option7['sfsi_plus_popup_background_color']!='') ?  $option7['sfsi_plus_popup_background_color'] : '' ;?>" />
		</div>
		<div class="sfsiplus_row_tab">
			<label class="border">
           		<?php  _e( 'Border Color:', SFSI_PLUS_DOMAIN ); ?>
            </label>
			<input name="sfsi_plus_popup_border_color" data-default-color="#b5b5b5" id="sfsi_plus_popup_border_color" type="text" value="<?php echo ($option7['sfsi_plus_popup_border_color']!='') ?  $option7['sfsi_plus_popup_border_color'] : '' ;?>"  />
		</div>
		<div class="sfsiplus_row_tab">
			<label>
            	<?php  _e( 'Border thickness:', SFSI_PLUS_DOMAIN ); ?>
			</label>
			<div class="field">
            	<input min="0" name="sfsi_plus_popup_border_thickness" type="number" value="<?php echo ($option7['sfsi_plus_popup_border_thickness']!='') ?  $option7['sfsi_plus_popup_border_thickness'] : '' ;?>" class="small" />
			</div>
		</div>
		<div class="sfsiplus_row_tab">
			<label>
             	<?php  _e( 'Border Shadow:', SFSI_PLUS_DOMAIN ); ?>
            </label>
			<ul class="border_shadow">
  				<li>
                	<input name="sfsi_plus_popup_border_shadow" <?php echo ($option7['sfsi_plus_popup_border_shadow']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
    				<label> 
						<?php  _e( 'On', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
    			<li>
                	<input name="sfsi_plus_popup_border_shadow" <?php echo ($option7['sfsi_plus_popup_border_shadow']=='no') ?  'checked="true"' : '' ;?>  type="radio" value="no" class="styled" />
                    <label>
                        <?php  _e( 'Off', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>
  			</ul>
		</div>
	</div>
</div>

<div class="row">
	<h4>
    	<?php  _e( 'Where shall the pop-up be shown?', SFSI_PLUS_DOMAIN ); ?>
    </h4>
	<div class="pop_up_show">
    	<input name="sfsi_plus_Show_popupOn" <?php echo ($option7['sfsi_plus_Show_popupOn']=='none') ?  'checked="true"' : '' ;?> type="radio" value="none" class="styled" />
        <label>
        	<?php  _e( 'Nowhere', SFSI_PLUS_DOMAIN ); ?>
        </label>
    </div>
	<div class="pop_up_show">
    	<input name="sfsi_plus_Show_popupOn" <?php echo ($option7['sfsi_plus_Show_popupOn']=='everypage') ?  'checked="true"' : '' ;?> type="radio" value="everypage" class="styled" />
        <label>
            <?php  _e( 'On all pages', SFSI_PLUS_DOMAIN ); ?>
        </label>
    </div>
    <div class="pop_up_show">
        
        <div class="popup_somepages">
            <input name="sfsi_plus_Show_popupOn" <?php echo ($option7['sfsi_plus_Show_popupOn']=='somepages') ?  'checked="true"' : '' ;?> type="radio" value="somepages" class="styled"/>
            <label>
                <?php  _e( 'On some pages', SFSI_PLUS_DOMAIN ); ?>
            </label>            
        </div>

        <div class="popup_containter" style="<?php echo ($option7['sfsi_plus_Show_popupOn']=='somepages') ?  'display:block;' : 'display:none;' ;?>">

            <div class="pop_up_show">
                <input name="sfsi_plus_Show_popupOn_somepages_blogpage" <?php echo ($option7['sfsi_plus_Show_popupOn_somepages_blogpage']=='blogpage') ?  'checked="true"' : '' ;?> type="checkbox" value="blogpage" class="styled"/>
                <label>
                    <?php  _e( 'All blog posts', SFSI_PLUS_DOMAIN ); ?>
                </label>        
            </div>
                
            <div class="pop_up_show">
                <input name="sfsi_plus_Show_popupOn_somepages_selectedpage" <?php echo ($option7['sfsi_plus_Show_popupOn_somepages_selectedpage']=='selectedpage') ?  'checked="true"' : '' ;?>  type="checkbox" value="selectedpage" class="styled"/>
                <label>
                    <?php  _e( 'Selected pages', SFSI_PLUS_DOMAIN ); ?>
                </label>
                <div class="field" style="width:50%">
                    <select multiple="multiple" name="sfsi_plus_Show_popupOn_PageIDs" id="sfsi_plus_Show_popupOn_PageIDs" style="width:60%;min-height: 150px;">
                    <?php
                    $select=  (isset($option7['sfsi_plus_Show_popupOn_PageIDs'])) ? unserialize($option7['sfsi_plus_Show_popupOn_PageIDs']) :array();
                    
                    $get_pages = get_pages( array( 
                        'offset'        => 1,
                        'hierarchical'  => 1,     
                        'sort_order'    => 'DESC', 
                        'sort_column'   => 'post_date', 
                        'posts_per_page'=> -1, 
                        'post_status'   => 'publish' 
                    )); 
                    if($get_pages)
                    {
                        foreach($get_pages as $page)
                        {
                            $selected_box = '';
                            $class = '';

                            if(!empty($select))
                            {
                                if( in_array( $page->ID, $select) )
                                {
                                    $selected_box = 'selected="selected"';
                                    $class = 'class="sel-active"';
                                }
                            }
                            echo '<option value="'.$page->ID.'" style="margin-bottom: 3px;" '.$selected_box.' '.$class.'>'.$page->post_title.'</option>';
                        }
                       
                    }
                    ?>   
                    </select><br/>
                    <?php  _e( 'Please hold CTRL key to select multiple pages', SFSI_PLUS_DOMAIN ); ?>.
                </div>
            </div>
            
        </div>

    </div>    

    <div class="pop_up_show">
        
        <?php  $popupDesktopMobile = ($option7['sfsi_plus_Show_popupOn']!='none') ? 'display:block': '';?>

        <div class="sfsiplus_show_desktop_mobile_setting_li popupDesktopMobileLi" style="<?php echo esc_attr($popupDesktopMobile);?>">
                    
            <div class="sfsidesktopmbilelabel"><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Show on:', SFSI_PLUS_DOMAIN ); ?></span></div>

                <ul class="sfsiplus_icn_listing8 sfsi_plus_closerli popupDesktopMobileUl">
                                    
                     <li class="">
                                        
                        <div class="radio_section tb_4_ck">
                             <input name="sfsi_plus_popup_show_on_desktop" type="checkbox" value="yes" class="styled" <?php echo ($option7['sfsi_plus_popup_show_on_desktop']=='yes') ?  'checked="true"' : '' ;?>>
                         </div>
                                        
                        <div class="sfsiplus_right_info">
                            <p><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Desktop', SFSI_PLUS_DOMAIN ); ?></span></p>
                        </div>

                    </li>
                                    
                    <li class="">
                                        
                        <div class="radio_section tb_4_ck">
                             <input name="sfsi_plus_popup_show_on_mobile"  type="checkbox" value="yes" class="styled" <?php echo ($option7['sfsi_plus_popup_show_on_mobile']=='yes') ?  'checked="true"' : '' ;?>>
                        </div>

                        <div class="sfsiplus_right_info">
                            <p><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Mobile', SFSI_PLUS_DOMAIN ); ?></span></p>
                        </div>
                    </li>
                    
                </ul>           
        </div>

</div>



</div>
<div class="row">
	<h4>
    	<?php  _e( 'When shall the pop-up be shown?', SFSI_PLUS_DOMAIN ); ?>
    </h4>
	<div class="pop_up_show">
    	<input name="sfsi_plus_Shown_pop[]" type="checkbox" value="once" class="styled"
        	<?php echo (in_array('once', $option7['sfsi_plus_Shown_pop'])) ? 'checked="true"' : ''; ?>/>
        <label>
            <?php  _e( 'Once', SFSI_PLUS_DOMAIN ); ?> 
            <input name="sfsi_plus_Shown_popupOnceTime" min="0" type="number" class="seconds" 
            	value="<?php echo ($option7['sfsi_plus_Shown_popupOnceTime']!='') ?  $option7['sfsi_plus_Shown_popupOnceTime'] : '' ;?>"/> 
            <?php  _e( 'seconds after the user arrived on the page', SFSI_PLUS_DOMAIN ); ?>
        </label>
    </div>
	<div class="pop_up_show">
    	<input name="sfsi_plus_Shown_pop[]" type="checkbox" value="ETscroll" class="styled"
        	<?php echo (in_array('ETscroll', $option7['sfsi_plus_Shown_pop'])) ? 'checked="true"' : ''; ?> />
        <label>
            <?php  _e( 'Every time user scrolls to the end of the page', SFSI_PLUS_DOMAIN ); ?>
        </label>
    </div>
    <div class="pop_up_show">
    	<input name="sfsi_plus_Shown_pop[]" type="checkbox" value="leavePage" class="styled"
        	<?php echo (in_array('leavePage', $option7['sfsi_plus_Shown_pop'])) ? 'checked="true"' : ''; ?> />
        <label>
            <?php  _e( 'When user leaves the page (i.e. moves over the top part in their browser)', SFSI_PLUS_DOMAIN ); ?>
        </label>
    </div>        
</div>


<div class="row">
    
    <h4>
        <?php  _e( 'After showing the pop-up, when shall it disappear again?', SFSI_PLUS_DOMAIN ); ?>
    </h4>

    <div class="pop_up_show">
    
        <input name="sfsi_plus_Hide_popupOnScroll" <?php echo ($sfsi_plus_Hide_popupOnScroll=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="<?php echo $sfsi_plus_Hide_popupOnScroll; ?>" class="styled" />
        <label>
            <?php  _e( 'When user scrolls', SFSI_PLUS_DOMAIN ); ?>
        </label>
    </div>

    <div class="pop_up_show">
    
        <input name="sfsi_plus_Hide_popupOn_OutsideClick" <?php echo ($sfsi_plus_Hide_popupOn_OutsideClick=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="<?php echo $sfsi_plus_Hide_popupOn_OutsideClick; ?>" class="styled" />
        <label>
            <?php  _e( 'When user clicks outside of the pop-up area', SFSI_PLUS_DOMAIN ); ?>
        </label>
    </div>

</div>

<div class="row">
	<h4>
    	<?php  _e( 'Do you want to set a limit how often the pop-up is shown?', SFSI_PLUS_DOMAIN ); ?>
    </h4>
	<div class="pop_up_show sfsi_plus_popup_timelimit_radioCheck">
    	<input name="sfsi_plus_popup_limit" type="radio" value="no" class="styled" id="sfsi_popup_limit_no"
        	<?php echo ($option7['sfsi_plus_popup_limit'] == 'no') ? 'checked="true"' : ''; ?>/>
        <label>
            <?php  _e( 'No', SFSI_PLUS_DOMAIN ); ?> 
        </label>
    </div>
	<div class="pop_up_show sfsi_plus_popup_timelimit_radioCheck">
    	<input name="sfsi_plus_popup_limit" type="radio" value="yes" class="styled" id="sfsi_popup_limit_yes"
        	<?php echo ($option7['sfsi_plus_popup_limit'] == 'yes') ? 'checked="true"' : ''; ?>/>
        <label>
            <?php  _e( 'Yes', SFSI_PLUS_DOMAIN ); ?> 
        </label>
    </div>
    <div class="pop_up_show sfsi_plus_popup_timelimit"
    	style="display:<?php echo ($option7['sfsi_plus_popup_limit']=='yes') ?  'block' : 'none';?>">
    	<p>
			<?php _e('Show the popup to the same user max once per', SFSI_PLUS_DOMAIN ); ?>
        </p>
        
        <input min="1" name="sfsi_plus_popup_limit_count" type="number" class="seconds" 
            	value="<?php echo ($option7['sfsi_plus_popup_limit_count']!='') ?  $option7['sfsi_plus_popup_limit_count'] : '' ;?>"/> 
        
        <div class="field">
        	<select class="styled" name="sfsi_plus_popup_limit_type">
                <option value="day" <?php echo ($option7['sfsi_plus_popup_limit_type']=='day') ?  'selected="selected"' : '' ?> >Day(s)</option>
                <option value="hour" <?php echo ($option7['sfsi_plus_popup_limit_type']=='hour') ?  'selected="selected"' : '' ?> >Hour(s)</option>
            </select>
       </div>
       
       <div class="sfsi_plus_limitpop_note">(<?php _e('this applies across entire website, not only selected pages', SFSI_PLUS_DOMAIN ); ?>)</div>
       
    </div>        
</div>


<!-- SAVE BUTTON SECTION   --> 
<div class="save_button">
	<img src="<?php echo SFSI_PLUS_PLUGURL ?>images/ajax-loader.gif" class="loader-img" />
    <?php  $nonce = wp_create_nonce("update_plus_step7"); ?>
    <a href="javascript:;" id="sfsi_plus_save7" title="Save" data-nonce="<?php echo $nonce;?>">
        <?php  _e( 'Save', SFSI_PLUS_DOMAIN ); ?>
    </a>
</div>

<!-- END SAVE BUTTON SECTION   -->
<a class="sfsiColbtn closeSec" href="javascript:;">
    <?php  _e( 'Collapse area', SFSI_PLUS_DOMAIN ); ?>
</a>
<label class="closeSec"></label>

<!-- ERROR AND SUCCESS MESSAGE AREA-->
<p class="red_txt errorMsg" style="display:none"> </p>
<p class="green_txt sucMsg" style="display:none"> </p>
<div class="clear"></div>

</div>
<!-- END Section 7 "Do you want to display a pop-up, asking people to subscribe?" main div Start -->