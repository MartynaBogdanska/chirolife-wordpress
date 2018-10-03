<?php
        $option8['sfsi_plus_beforeafterposts_horizontal_verical_Alignment'] = (isset($option8['sfsi_plus_beforeafterposts_horizontal_verical_Alignment'])) ? $option8['sfsi_plus_beforeafterposts_horizontal_verical_Alignment']: "Horizontal";

        $option8['sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment'] = (isset($option8['sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment'])) ? $option8['sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment']: "Horizontal";

        $option8['sfsi_plus_mobile_beforeafterposts'] = (isset($option8['sfsi_plus_mobile_beforeafterposts'])) ? $option8['sfsi_plus_mobile_beforeafterposts']: "no";

        $classForMobileIconsAlignments = ($option8['sfsi_plus_mobile_beforeafterposts']=="yes" && $option8['sfsi_plus_display_button_type']=='normal_button') ? "show" :"hide";
?>
		<li class="sfsi_plus_place_beforeAfterPosts">
			
			<div class="radio_section tb_4_ck" onclick="sfsiplus_toggleflotpage(this);"><input name="sfsi_plus_show_item_onposts" <?php echo ($option8['sfsi_plus_show_item_onposts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_show_item_onposts" type="checkbox" value="yes" class="styled"  /></div>
			
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show them before or after posts', SFSI_PLUS_DOMAIN ); ?>
                    </span>
                    <br>
                    <?php
					if($option8['sfsi_plus_show_item_onposts'] != "yes")
					{
						$style_float = "style='font-size: 15px; display: none;'";
					}
					else
					{
						$style_float = "style='font-size: 15px;'";
					}
					?>
                    <label class="sfsiplus_sub-subtitle sfsiplus_toglpstpgsbttl" <?php echo $style_float;?>>
                    	<?php  _e( 'Here you have two options:', SFSI_PLUS_DOMAIN ); ?>
                    </label>
				</p>
				
				<ul class="sfsiplus_tab_3_icns sfsiplus_shwthmbfraftr" <?php echo ($option8['sfsi_plus_show_item_onposts'] != "yes")? 'style="display: none";' : '' ;?>>
					
                    <li onclick="sfsiplus_togglbtmsection('sfsiplus_toggleonlystndrshrng', 'sfsiplus_toggledsplyitemslctn', this);" class="clckbltglcls">
						<input name="sfsi_plus_display_button_type" <?php echo ( $option8['sfsi_plus_display_button_type']=='standard_buttons') ?  'checked="true"' : '' ;?> type="radio" value="standard_buttons" class="styled"  />
						<label class="labelhdng4">
                        	<?php  _e( 'Display rectangle icons', SFSI_PLUS_DOMAIN ); ?>
                        </label>
                    </li>
                    <li onclick="sfsiplus_togglbtmsection('sfsiplus_toggledsplyitemslctn', 'sfsiplus_toggleonlystndrshrng', this);" class="clckbltglcls">
						<input name="sfsi_plus_display_button_type" <?php echo ( $option8['sfsi_plus_display_button_type']=='normal_button') ?  'checked="true"' : '' ;?> type="radio" value="normal_button" class="styled"  />
						<label class="labelhdng4">
                        	<?php  _e( 'Display the icons I selected above', SFSI_PLUS_DOMAIN ); ?>
                        </label>
                    </li>

                    <?php if ($option8['sfsi_plus_display_button_type']=='standard_buttons'): $display = "display:block"; else:  $display = "display:none"; endif;?>
					
                    <li class="sfsiplus_toggleonlystndrshrng" style="<?php echo $display; ?>">                    							
                        <div class="radiodisplaysection">

                            <div class="cstmdisplaysharingtxt cstmdisextrpdng">
                            	<p><?php  _e( 'Rectangle icons spell out the «call to action» which increases chances that visitors do it.', SFSI_PLUS_DOMAIN ); ?></p>
                                <p><?php  _e( 'Select the icons you want to show:', SFSI_PLUS_DOMAIN ); ?></p>
                            </div>
							

                            <div class="social_icon_like1 cstmdsplyulwpr">
                                <ul>
                                    <li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_rectsub" <?php echo ($option8['sfsi_plus_rectsub']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectsub" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="Subscribe Follow" class="cstmdsplsub">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/follow_subscribe.png" alt="Subscribe Follow" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
									<li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_rectfb" <?php echo ($option8['sfsi_plus_rectfb']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectfb" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="Facebook Like" class="cstmdspllke">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/like.jpg" alt="Facebook Like" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
									<li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_rectfbshare" <?php echo ($option8['sfsi_plus_rectfbshare']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectfbshare" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="Facebook Share" class="cstmdsplfbshare">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/fbshare.png" alt="Facebook Share" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
                                    <li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_recttwtr" <?php echo ($option8['sfsi_plus_recttwtr']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_recttwtr" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="twitter" class="cstmdspltwtr">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/twiiter.png" alt="Twitter like" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
									<li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_rectpinit" <?php echo ($option8['sfsi_plus_rectpinit']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectpinit" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="Pinit" class="cstmdsplpinit">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/pinit.png" alt="Pinit" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
									<li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_rectlinkedin" <?php echo ($option8['sfsi_plus_rectlinkedin']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectlinkedin" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="Linkedin" class="cstmdsplggpls">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/linkedin-share.png" alt="Linkedin" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
                                    <li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_rectreddit" <?php echo ($option8['sfsi_plus_rectreddit']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectreddit" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="Linkedin" class="cstmdsplggpls">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/reddit-share.jpg" alt="Reddit" style="height: 23px" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
									<li>
										<div class="radio_section tb_4_ck"><input name="sfsi_plus_rectgp" <?php echo ($option8['sfsi_plus_rectgp']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectgp" type="checkbox" value="yes" class="styled"  /></div>
                                        <a href="#" title="Google Plus" class="cstmdsplggpls">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/google_plus1.jpg" alt="Google Plus" /><span style="display: none;">18k</span>
                                        </a>
                                    </li>
                                    <li>
										<div class="radio_section tb_4_ck">
                                        	<input name="sfsi_plus_rectshr" <?php echo ($option8['sfsi_plus_rectshr']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_rectshr" type="checkbox" value="yes" class="styled"  />
                                        </div>
                                        <a href="#" title="Share" class="cstmdsplshr">
                                            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/share1.jpg" alt="Share" />
                                            <span style="display: none;">18k</span>
                                        </a>
                                        <p style="width:auto;float:left;padding: 0px!important;border:0px !important;">
                                        	
                                           (<?php  _e( 'may impact loading speed', SFSI_PLUS_DOMAIN ); ?>)
                                        </p>
                                    </li>
								</ul>	
                            </div>
						
                            <!--<p class="clear">Those are usually all you need: </p>
                            <ul class="usually" style="color:#5a6570">
                                <li>1. Facebook is No.1 in liking, so it’s a must have</li>
                                <li>2. Google+ is also important due to SEO reasons, so important to have as well</li>
                                <li>3. Share-button covers all other platforms for sharing</li>
                            </ul>-->
                            <div class="options sfsi_show_counts">
                                <label>
                                	<?php  _e( 'Do you want to display the counts?', SFSI_PLUS_DOMAIN ); ?>
                                </label><div class="field">
                                <select name="sfsi_plus_icons_DisplayCounts" id="sfsi_plus_icons_DisplayCounts" class="styled"><option value="yes" <?php echo ($option8['sfsi_plus_icons_DisplayCounts']=='yes') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'YES', SFSI_PLUS_DOMAIN ); ?>
                                </option><option value="no" <?php echo ($option8['sfsi_plus_icons_DisplayCounts']=='no') ?  'selected="true"' : '' ;?>>
                                	<?php  _e( 'NO', SFSI_PLUS_DOMAIN ); ?>
                                </option></select></div>
                            </div>
					  </div>
                    </li>

                    <?php if ($option8['sfsi_plus_display_button_type']=='normal_button'): $adisplay = "display:block"; else:  $adisplay = "display:none"; endif;?>
					
					<li class="sfsiplus_toggledsplyitemslctn">
                    							
                        <div class="row radiodisplaysection sfsi_size_spacing_container" style="<?php echo $adisplay; ?>">

                            <h4><?php  _e( 'Size and spacing of your icons', SFSI_PLUS_DOMAIN ); ?></h4>

                            <div class="icons_size">
                                
                                <div class="sfsi_plus_post_icons_size_alignments">

                                  <div class="sfsi_plus_post_icons_size_alignments_element">
                                    <span><?php  _e( 'Size:', SFSI_PLUS_DOMAIN ); ?></span>
                                    <input name="sfsi_plus_post_icons_size" value="<?php echo ($option8['sfsi_plus_post_icons_size']!='') ?  $option8['sfsi_plus_post_icons_size'] : '' ;?>" type="text" />
                                    <ins><?php  _e( 'pixels wide and tall', SFSI_PLUS_DOMAIN ); ?></ins>                                      
                                  </div>

                                  <div class="sfsi_plus_post_icons_size_alignments_element">
                                    <span class="last"><?php  _e( 'Horizontal spacing between icons:', SFSI_PLUS_DOMAIN ); ?></span>
                                    <input name="sfsi_plus_post_icons_spacing" type="text" value="<?php echo ($option8['sfsi_plus_post_icons_spacing']!='') ?  $option8['sfsi_plus_post_icons_spacing'] : '' ;?>" />
                                    <ins><?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?></ins>
                                 </div>

                                 <div class="sfsi_plus_post_icons_size_alignments_element">
                                    <span class="last"><?php  _e( 'Vertical spacing between icons:', SFSI_PLUS_DOMAIN ); ?></span>
                                    <input name="sfsi_plus_post_icons_vertical_spacing" type="text" value="<?php echo ($option8['sfsi_plus_post_icons_vertical_spacing']!='') ?  $option8['sfsi_plus_post_icons_vertical_spacing'] : '' ;?>" />
                                    <ins><?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?></ins>
                                </div>

                                </div>

                            </div>

    					</div>


                       <div class="row sfsi_plus_beforeafterposts_icons_alignment" style="<?php echo $adisplay; ?>">

                            <h4 style="padding-top: 0;">
                                <?php  _e( 'Alignments', SFSI_PLUS_DOMAIN ); ?>
                            </h4>
                            <div class="icons_size">
                                
                                <ul class="sfsi_plus_new_alignment_option">
                                    <li>

                                        <span class="sfsi_plus_new_alignment_span" style="line-height: 48px;"><?php  _e( 'Show icons', SFSI_PLUS_DOMAIN ); ?></span>
                                        
                                        <div class="field">
                                             <select name="sfsi_plus_beforeafterposts_horizontal_verical_Alignment" id="sfsi_plus_beforeafterposts_horizontal_verical_Alignment">
                                                <option value="Horizontal" <?php echo ($option8['sfsi_plus_beforeafterposts_horizontal_verical_Alignment']=='Horizontal') ?  'selected="selected"' : '' ;?>>
                                                    <?php  _e( 'Horizontally', SFSI_PLUS_DOMAIN ); ?>
                                                </option>
                                                <option value="Vertical" <?php echo ($option8['sfsi_plus_beforeafterposts_horizontal_verical_Alignment']=='Vertical') ?  'selected="selected"' : '' ;?>>
                                                    <?php  _e( 'Vertically', SFSI_PLUS_DOMAIN ); ?>
                                                </option>
                                            </select>    
                                        </div>  
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="sfsi_plus_alignments_mobile_beforeafterposts" style="<?php echo $adisplay; ?>">
                                <h4>
                                    <?php  _e( 'Need different selections for mobile?', SFSI_PLUS_DOMAIN ); ?> 
                                </h4>
                                <ul class="sfsi_plus_make_icons sfsi_plus_mobile_beforeafterposts">
                                    <li>
                                        <input name="sfsi_plus_mobile_beforeafterposts" <?php echo ($option8['sfsi_plus_mobile_beforeafterposts']=='no') ?  'checked="true"' : '' ;?> type="radio" value="no" class="styled"/>
                                        <span class="sfsi_flicnsoptn3">
                                            <?php  _e( 'No', SFSI_PLUS_DOMAIN ); ?> 
                                        </span>
                                    </li>
                                    <li>
                                        <input name="sfsi_plus_mobile_beforeafterposts" <?php echo ( $option8['sfsi_plus_mobile_beforeafterposts']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
                                        <span class="sfsi_flicnsoptn3">
                                            <?php  _e( 'Yes', SFSI_PLUS_DOMAIN ); ?>
                                        </span>
                                    </li>
                                </ul>
                        </div>

                        <div class="row sfsi_plus_beforeafterposts_mobile_icons_alignment <?php echo $classForMobileIconsAlignments; ?>">
                            <h4 style="padding-top: 0;">
                                <?php  _e( 'Alignments', SFSI_PLUS_DOMAIN ); ?>
                            </h4>
                            <div class="icons_size">
                                <ul class="sfsi_plus_new_alignment_option">
                                    <li>
                                        <span class="sfsi_plus_new_alignment_span" style="line-height: 48px;">
                                            <?php  _e( 'Show icons', SFSI_PLUS_DOMAIN ); ?>
                                        </span>
                                        <div class="field">
                                             <select name="sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment" id="sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment">
                                                <option value="Horizontal" <?php echo ($option8['sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment']=='Horizontal') ?  'selected="selected"' : '' ;?>>
                                                    <?php  _e( 'Horizontally', SFSI_PLUS_DOMAIN ); ?>
                                                </option>
                                                <option value="Vertical" <?php echo ($option8['sfsi_plus_beforeafterposts_mobile_horizontal_verical_Alignment']=='Vertical') ?  'selected="selected"' : '' ;?>>
                                                    <?php  _e( 'Vertically', SFSI_PLUS_DOMAIN ); ?>
                                                </option>
                                            </select>    
                                        </div>  
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </li>
                      
                  	<li class="row sfsiplus_PostsSettings_section">
                    
                        <label class="first chcklbl">
                                <?php  _e( 'Display them:', SFSI_PLUS_DOMAIN ); ?>
                        </label>

                    	<!--Display them options-->
                        <div class="options sfsipluspstvwpr">
                            <label class="seconds chcklbl labelhdng4">
                                <?php  _e( 'On Single Post Pages', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                            <div class="chckwpr">
                                <div class="snglchckcntr">
                                    <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_before_posts" <?php echo ($option8['sfsi_plus_display_before_posts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_before_posts" type="checkbox" value="yes" class="styled"  /></div>
                                    <div class="sfsiplus_right_info">
                                        <?php  _e( 'Before posts', SFSI_PLUS_DOMAIN ); ?>
                                    </div>
                                </div>
                                <div class="snglchckcntr">
                                    <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_after_posts" <?php echo ($option8['sfsi_plus_display_after_posts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_after_posts" type="checkbox" value="yes" class="styled"  /></div>
                                    <div class="sfsiplus_right_info">
                                        <?php  _e( 'After posts', SFSI_PLUS_DOMAIN ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="options sfsipluspstvwpr">
                            <label class="seconds chcklbl labelhdng4">
                                <?php  _e( 'On Blog Pages', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                            <div class="chckwpr">
                                <div class="snglchckcntr">
                                    <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_before_blogposts" <?php echo ($option8['sfsi_plus_display_before_blogposts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_before_blogposts" type="checkbox" value="yes" class="styled"  /></div>
                                    <div class="sfsiplus_right_info">
                                        <?php  _e( 'Before posts', SFSI_PLUS_DOMAIN ); ?>
                                    </div>
                                </div>
                                <div class="snglchckcntr">
                                    <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_after_blogposts" <?php echo ($option8['sfsi_plus_display_after_blogposts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_after_blogposts" type="checkbox" value="yes" class="styled"  /></div>
                                    <div class="sfsiplus_right_info">
                                        <?php  _e( 'After posts', SFSI_PLUS_DOMAIN ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    	<!--Display them options-->
                    	<div class="options shareicontextfld">
                            <label class="first">
                                <?php  _e( 'Text to appear before the sharing icons:', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                            <input name="sfsi_plus_textBefor_icons" type="text" 
                                value="<?php echo ($option8['sfsi_plus_textBefor_icons']!='') ?  $option8['sfsi_plus_textBefor_icons'] : '' ; ?>" />
                        </div>
                        
                        <div class="options sfsi_plus_selectSec">
                            <label class="first">
                                <?php  _e( 'Font', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                            <select name="sfsi_plus_textBefor_icons_font" class="select-same">
                               <option value="inherit" 
									<?php echo sfsi_premium_isSeletcted("inherit", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Inherit
                                </option>                            
                                <option value="Arial, Helvetica, sans-serif" 
									<?php echo sfsi_premium_isSeletcted("Arial, Helvetica, sans-serif", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Arial
                                </option>
                                <option value="Arial Black, Gadget, sans-serif" 
									<?php echo sfsi_premium_isSeletcted("Arial Black, Gadget, sans-serif", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Arial Black
                                </option>
                                <option value="Calibri" 
									<?php echo sfsi_premium_isSeletcted("Calibri", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Calibri
                                </option>
                                <option value="Comic Sans MS" 
									<?php echo sfsi_premium_isSeletcted("Comic Sans MS", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Comic Sans MS
                                </option>
                                <option value="Courier New" <?php echo sfsi_premium_isSeletcted("Courier New", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Courier New
                                </option>
                                <option value="Georgia" <?php echo sfsi_premium_isSeletcted("Georgia", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Georgia
                                </option>
                                <option value="Helvetica,Arial,sans-serif" <?php echo sfsi_premium_isSeletcted("Helvetica,Arial,sans-serif", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Helvetica,Arial,sans-serif
                                </option>
                                <option value="Impact" <?php echo sfsi_premium_isSeletcted("Impact", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Impact
                                </option>
                                <option value="Lucida Console" <?php echo sfsi_premium_isSeletcted("Lucida Console", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Lucida Console
                                </option>
                                <option value="Tahoma,Geneva" <?php echo sfsi_premium_isSeletcted("Tahoma,Geneva", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Tahoma
                                </option>
                                <option value="Times New Roman" <?php echo sfsi_premium_isSeletcted("Times New Roman", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Times New Roman
                                </option>
                                <option value="Trebuchet MS" <?php echo sfsi_premium_isSeletcted("Trebuchet MS", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Trebuchet MS
                                </option>
                                 <option value="Verdana" <?php echo sfsi_premium_isSeletcted("Verdana", $option8['sfsi_plus_textBefor_icons_font']) ?> >
                                    Verdana
                                </option>                                
                            </select>
                        </div>

                        <div class="options sfsi_plus_selectSec">
                            <label class="first">
                                <?php  _e( 'Font style', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                            <select name="sfsi_plus_textBefor_icons_font_type" class="select-same">
                                <option value="normal" 
									<?php echo sfsi_premium_isSeletcted("normal", $option8['sfsi_plus_textBefor_icons_font_type']) ?> >
                                    Normal
                                </option>
                                <option value="inherit" 
									<?php echo sfsi_premium_isSeletcted("inherit", $option8['sfsi_plus_textBefor_icons_font_type']) ?> >
                                    Inherit
                                </option>
                                <option value="oblique" 
									<?php echo sfsi_premium_isSeletcted("oblique", $option8['sfsi_plus_textBefor_icons_font_type']) ?> >
                                    Oblique
                                </option>
                                <option value="italic" 
									<?php echo sfsi_premium_isSeletcted("italic", $option8['sfsi_plus_textBefor_icons_font_type']) ?> >
                                    Italic
                                </option>
                                <option value="bold" <?php echo sfsi_premium_isSeletcted("bold", $option8['sfsi_plus_textBefor_icons_font_type']) ?> >
                                    Bold
                                </option>
                            </select>
                        </div>
                        
                        <div class="options  sfsi_plus_inputSec">
                            <label class="first">
                                <?php  _e( 'Font size', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                            <input name="sfsi_plus_textBefor_icons_font_size" type="text" value="<?php 
								echo ($option8['sfsi_plus_textBefor_icons_font_size']!='') 
									? $option8['sfsi_plus_textBefor_icons_font_size'] 
									: '';?>" />
                            <span>px</span>
                        </div>
                        
                        <div class="options sfsi_plus_inputSec textBefor_icons_fontcolor">
                            <label class="first">
                                <?php  _e( 'Font Color', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                            <input name="sfsi_plus_textBefor_icons_fontcolor" id="sfsi_plus_textBefor_icons_fontcolor" data-default-color="#000000" type="text" value="<?php 
								echo ($option8['sfsi_plus_textBefor_icons_fontcolor']!='') 
									? $option8['sfsi_plus_textBefor_icons_fontcolor'] 
									: '#000000';?>" />
                        </div>
                        

                        <div class="options">
                            <label class="first">
                                <?php  _e( 'Margins:', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                            <ul class="sfsi_plus_postIconMargin">
                                <li>
                                    <label>Above Icon</label>
                                    <input name="sfsi_plus_marginAbove_postIcon" type="text" 
                                        value="<?php echo ($option8['sfsi_plus_marginAbove_postIcon']!='') ?
                                            $option8['sfsi_plus_marginAbove_postIcon']
                                            : '' ;?>"/>
                                    <label>px</label>
                                </li>
                                <li>
                                    <label>Below Icon</label>
                                    <input name="sfsi_plus_marginBelow_postIcon" type="text" 
                                        value="<?php echo ($option8['sfsi_plus_marginBelow_postIcon']!='') ? 
                                            $option8['sfsi_plus_marginBelow_postIcon'] :
                                            '' ; ?>"/>
                                    <label>px</label>
                                </li>
                            </ul>
                        </div>
                    
                        <div class="options">
                            <label>
                                <?php  _e( 'Alignment of share icons:', SFSI_PLUS_DOMAIN ); ?>
                            </label>
                            <div class="field">
	                            <select name="sfsi_plus_icons_alignment" id="sfsi_plus_icons_alignment" class="styled">
	                                <option value="left" <?php echo ($option8['sfsi_plus_icons_alignment']=='left') ?  'selected="selected"' : '' ;?>>
	                                    <?php  _e( 'Left', SFSI_PLUS_DOMAIN ); ?>
	                                </option>
	                                <option value="right" <?php echo ($option8['sfsi_plus_icons_alignment']=='right') ?  'selected="selected"' : '' ;?>>
	                                    <?php  _e( 'Right', SFSI_PLUS_DOMAIN ); ?>
	                                </option>
	                                <option value="center" <?php echo ($option8['sfsi_plus_icons_alignment']=='center') ?  'selected="selected"' : '' ;?>>
	                                    <?php  _e( 'Center', SFSI_PLUS_DOMAIN ); ?>
	                                </option>
	                            </select>
	                        </div>
                        </div>
                       
                    	<!--<div class="options">
                        	<label>Do you want to display the counts?</label><div class="field"><select name="sfsi_plus_icons_DisplayCounts" id="sfsi_plus_icons_DisplayCounts" class="styled"><option value="yes" <?php //echo ($option8['sfsi_plus_icons_DisplayCounts']=='yes') ?  'selected="true"' : '' ;?>>YES</option><option value="no" <?php //echo ($option8['sfsi_plus_icons_DisplayCounts']=='no') ?  'selected="true"' : '' ;?>>NO</option></select></div>
                    	</div>-->	

                    	<div class="options sfsi_options">
                    		<label>
						   		<?php  _e( 'Also show icons at pages?', SFSI_PLUS_DOMAIN ); ?>
						    </label>
						  	<div class="sfsi_plus_show_icons_end_pages">
                                <div class="chckwpr">
                                    <div class="snglchckcntr">
                                        <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_before_pageposts" <?php echo ($option8['sfsi_plus_display_before_pageposts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_before_pageposts" type="checkbox" value="yes" class="styled"  /></div>
                                        <div class="sfsiplus_right_info">
                                            <?php  _e( 'At top of pages', SFSI_PLUS_DOMAIN ); ?>
                                        </div>
                                    </div>
                                    <div class="snglchckcntr">
                                        <div class="radio_section tb_4_ck"><input name="sfsi_plus_display_after_pageposts" <?php echo ($option8['sfsi_plus_display_after_pageposts']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_display_after_pageposts" type="checkbox" value="yes" class="styled"  /></div>
                                        <div class="sfsiplus_right_info">
                                            <?php  _e( 'At bottom of pages', SFSI_PLUS_DOMAIN ); ?>
                                        </div>
                                    </div>
                                </div>	
						  	</div>
                    	</div>


					<?php
							
							$select=  (isset($option8['sfsi_plus_choose_post_types'])) ? unserialize($option8['sfsi_plus_choose_post_types']) :array();

        					$args = array( '_builtin' => false,'public'   => true );

							$postTypes         = array();
							$post_types 	   = get_post_types($args,'names');
							$custom_post_types = array_values($post_types);
							$count 			   = count($custom_post_types);

						
							if($count>0){ 
								$mul    =  ($count!=1)? 'multiple="multiple"':"";
							?>

							    <div class="options sfsi_plus_choose_post_types_section">                   	
        							
        						  <div class="sfsi_plus_choose_post_type_wrap">
		                    		
		                    		<label>
								   		<p><?php  _e( 'Do you also want to show the icons on custom post pages? Select all where you want them to show:', SFSI_PLUS_DOMAIN ); ?></p>
								    </label> 

        							<select <?php echo $mul;?> name="sfsi_plus_choose_post_types" id="sfsi_plus_choose_post_types">
									
										<option value=""><?php _e('------------- Choose Post types -------------', SFSI_PLUS_DOMAIN); ?></option>

										<?php 
										foreach ($custom_post_types as $post):

    											$pt = get_post_type_object( $post );
    											$postDisplayName = $pt->labels->singular_name;	

                                                $selected_box = '';
												
                                                if(!empty($select))
												{
													if( in_array( $post, $select) )
													{
														$selected_box = 'selected="selected"';
													}
												}

										?>
								        
                                        <option <?php echo $selected_box; ?>  value="<?php echo $post; ?>">
                                            <?php _e(ucfirst($postDisplayName),SFSI_PLUS_DOMAIN); ?> 
                                        </option>

									<?php endforeach; ?>

								</select>
        						
        						<div class="sfsi_ctrl_instruct cposttype"><?php  _e( 'Please hold CTRL key to select multiple post types.', SFSI_PLUS_DOMAIN ); ?></div>

        					</div>
        				</div>
							 <?php }
						?>                    	

                  	</li>	
					
                  	<!-- Taxnomies selection dropdown STARTS  here -->
        			<?php include(SFSI_PLUS_DOCROOT.'/views/subviews/que3/sfsi_option_view8_select_taxonomies.php'); ?>
                  	<!-- Taxnomies selection dropdown CLOSES  here -->

                    <li style="margin-left: 61px;">

                             <div class="sfsidesktopmbilelabel"><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Show on:', SFSI_PLUS_DOMAIN ); ?></span></div>

                                <ul class="sfsiplus_icn_listing8 sfsi_plus_closerli bfreAftrPostsDesktopMobileUl">
                                        
                                        <li class="">
                                            
                                            <div class="radio_section tb_4_ck">
                                                <input name="sfsi_plus_beforeafterposts_show_on_desktop" type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_beforeafterposts_show_on_desktop']=='yes') ?  'checked="true"' : '' ;?>>
                                            </div>
                                            
                                            <div class="sfsiplus_right_info"><?php  _e( 'Desktop', SFSI_PLUS_DOMAIN ); ?></div>
                                        </li>
                                        
                                        <li class="">
                                            
                                            <div class="radio_section tb_4_ck">
                                                <input name="sfsi_plus_beforeafterposts_show_on_mobile"  type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_beforeafterposts_show_on_mobile']=='yes') ?  'checked="true"' : '' ;?>>
                                            </div>

                                            <div class="sfsiplus_right_info"><?php  _e( 'Mobile', SFSI_PLUS_DOMAIN ); ?></div>
                                        </li>
                                    </ul>                    
                    </li>

				</ul>
			</div>
		</li>