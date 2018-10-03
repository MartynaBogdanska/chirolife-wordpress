    <?php 
        
        $option8['sfsi_plus_float_horizontal_verical_Alignment'] = (isset($option8['sfsi_plus_float_horizontal_verical_Alignment'])) ? $option8['sfsi_plus_float_horizontal_verical_Alignment']: "Horizontal";

        $classForFloatAlignments = ($option8['sfsi_plus_float_on_page']=='yes') ? "show" : "hide";

        $option8['sfsi_plus_float_mobile_horizontal_verical_Alignment'] = (isset($option8['sfsi_plus_float_mobile_horizontal_verical_Alignment'])) ? $option8['sfsi_plus_float_mobile_horizontal_verical_Alignment']: "Horizontal";

    ?>
		<li class="sfsiplusLocationli">

            <div class="radio_section tb_4_ck cstmfltonpgstck" onclick="sfsiplus_toggleflotpage(this);">
                <input name="sfsi_plus_float_on_page" <?php echo ($option8['sfsi_plus_float_on_page']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_float_on_page" type="checkbox" value="yes" class="styled" />
            </div>

			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Define the location on the page', SFSI_PLUS_DOMAIN ); ?>
                    </span>
				</p>

                <?php $style =  ($option8['sfsi_plus_float_on_page'] == "yes") ? 'display: block;' : "display: none;";?>


                <div class="sfsiplus_tab_3_icns"  <?php echo 'style="'.$style.'"';?>>
					<ul class="sfsiplus_tab_3_icns flthmonpg">
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='top-left') ?  'checked="true"' : '' ;?> type="radio" value="top-left" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptntl">
                           		<?php  _e( 'Top left', SFSI_PLUS_DOMAIN ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/top_left.png" /></label>
                        </li>
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='center-top') ?  'checked="true"' : '' ;?> type="radio" value="center-top" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptncl">
                            	<?php  _e( 'Center top', SFSI_PLUS_DOMAIN ); ?>
                            </span>
                            <label class="sfsi_float_position_icon_label"><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/float_position_icon.png" /></label>
                        </li>                        
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='top-right') ?  'checked="true"' : '' ;?> type="radio" value="top-right" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptntr">
                            	<?php  _e( 'Top right', SFSI_PLUS_DOMAIN ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/top_right.png" /></label>
                        </li>
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='center-left') ?  'checked="true"' : '' ;?> type="radio" value="center-left" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptncl">
                            	<?php  _e( 'Center left', SFSI_PLUS_DOMAIN ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/center_left.png" /></label>
                        </li>
                        <li></li>
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='center-right') ?  'checked="true"' : '' ;?> type="radio" value="center-right" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptncr">
                            	<?php  _e( 'Center right', SFSI_PLUS_DOMAIN ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/center_right.png" /></label>
                        </li>
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='bottom-left') ?  'checked="true"' : '' ;?> type="radio" value="bottom-left" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptnbl">
                            	<?php  _e( 'Bottom left', SFSI_PLUS_DOMAIN ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/bottom_left.png" /></label>
                        </li>                        
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='center-bottom') ?  'checked="true"' : '' ;?> type="radio" value="center-bottom" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptncr">
                            	<?php  _e( 'Center bottom', SFSI_PLUS_DOMAIN ); ?>
                            </span>
                            <label class="sfsi_float_position_icon_label sfsi_center_botttom"><img class="sfsi_img_center_bottom" src="<?php echo SFSI_PLUS_PLUGURL;?>images/float_position_icon.png" /></label>
                        </li>                        
                        <li>
                            <input name="sfsi_plus_float_page_position" <?php echo ( $option8['sfsi_plus_float_page_position']=='bottom-right') ?  'checked="true"' : '' ;?> type="radio" value="bottom-right" class="styled"  />
                            <span class="sfsi_flicnsoptn3 sfsioptnbr">
                            	<?php  _e( 'Bottom right', SFSI_PLUS_DOMAIN ); ?>
                            </span>
                            <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/bottom_right.png" /></label>
                        </li>
                    </ul>
                    
                    <div style="width: 88%; float: left; margin:25px 0 0 47px">
                    	<h4>
                       		<?php  _e( 'Margin From:', SFSI_PLUS_DOMAIN ); ?> 
                        </h4>
                        <ul class="sfsi_plus_floaticon_margin_sec">
                            <li>
                                <label>
                                	<?php  _e( 'Top:', SFSI_PLUS_DOMAIN ); ?> 
                                </label>
                                <input name="sfsi_plus_icons_floatMargin_top" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_top']!='') ?  $option8['sfsi_plus_icons_floatMargin_top'] : '' ;?>" />
                                <ins>
                                	<?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                                </ins>
                            </li>
                            <li>
                                <label>
                                	<?php  _e( 'Bottom:', SFSI_PLUS_DOMAIN ); ?> 
                                </label>
                                <input name="sfsi_plus_icons_floatMargin_bottom" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_bottom'] != '') ?  $option8['sfsi_plus_icons_floatMargin_bottom'] : '' ;?>" />
                                <ins>
                                	<?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                                </ins>
                            </li>
                            <li>
                                <label>
                             		<?php  _e( 'Left:', SFSI_PLUS_DOMAIN ); ?> 
                                </label>
                                <input name="sfsi_plus_icons_floatMargin_left" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_left']!='') ?  $option8['sfsi_plus_icons_floatMargin_left'] : '' ;?>" />
                                <ins>
                              		<?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                                </ins>
                            </li>
                            <li>
                                <label>
                                	<?php  _e( 'Right:', SFSI_PLUS_DOMAIN ); ?> 
                                </label>
                                <input name="sfsi_plus_icons_floatMargin_right" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_right']!='') ?  $option8['sfsi_plus_icons_floatMargin_right'] : '' ;?>" />
                                <ins>
                                	<?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                                </ins>
                            </li>
                        </ul>
                    </div>
                    
                    <div style="width: 100%; float: left; margin:25px 0 0 47px">
                    	<h4>
                       		<?php  _e( 'Make icons…', SFSI_PLUS_DOMAIN ); ?> 
                        </h4>
                        <ul class="sfsi_plus_make_icons sfsi_premium_makeIcons_container">
                            <li>
                                <input name="sfsi_plus_make_icon" <?php echo ( $option8['sfsi_plus_make_icon']=='float') ?  'checked="true"' : '' ;?> type="radio" value="float" class="styled"/>
                                <span class="sfsi_flicnsoptn3">
                           			<?php  _e( 'Float', SFSI_PLUS_DOMAIN ); ?> 
                            	</span>
							</li>
                            <li>
                                <input name="sfsi_plus_make_icon" <?php echo ( $option8['sfsi_plus_make_icon']=='stay') ?  'checked="true"' : '' ;?> type="radio" value="stay" class="styled"  />
                                <span class="sfsi_flicnsoptn3">
                           			<?php  _e( 'Stay at the same place A', SFSI_PLUS_DOMAIN ); ?>
                           			<h5><?php  _e( '(not visible if user scrolls down)', SFSI_PLUS_DOMAIN ); ?></h5>
                            	</span>
                            </li>
                            <li>
								<input name="sfsi_plus_make_icon" type="radio" value="stay_same_place" class="styled" 
									<?php echo ( $option8['sfsi_plus_make_icon']=='stay_same_place') ?  'checked="true"' : '' ;?>/>
                                <span class="sfsi_flicnsoptn3">
                           			<?php  _e( 'Stay at the same place B', SFSI_PLUS_DOMAIN ); ?>
                           			<h5><?php  _e( '(still visible if user scrolls down)', SFSI_PLUS_DOMAIN ); ?></h5>
                           		</span>
                           	</li>
                        </ul>
                    </div>
                    
                    <div class="row sfsi_plus_float_icons_alignment <?php echo $classForFloatAlignments;?>">
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
                                         <select name="sfsi_plus_float_horizontal_verical_Alignment" id="sfsi_plus_float_horizontal_verical_Alignment">
                                            <option value="Horizontal" <?php echo ($option8['sfsi_plus_float_horizontal_verical_Alignment']=='Horizontal') ?  'selected="selected"' : '' ;?>>
                                                <?php  _e( 'Horizontally', SFSI_PLUS_DOMAIN ); ?>
                                            </option>
                                            <option value="Vertical" <?php echo ($option8['sfsi_plus_float_horizontal_verical_Alignment']=='Vertical') ?  'selected="selected"' : '' ;?>>
                                                <?php  _e( 'Vertically', SFSI_PLUS_DOMAIN ); ?>
                                            </option>
                                        </select>    
                                    </div>  
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div style="width: 88%; float: left; margin:25px 0 0 47px">
                    	<h4>
                       		<?php  _e( 'Need different selections for mobile?', SFSI_PLUS_DOMAIN ); ?> 
                        </h4>
                        <ul class="sfsi_plus_make_icons sfsi_plus_mobile_float">
                            <li>
                                <input name="sfsi_plus_mobile_float" <?php echo ( $option8['sfsi_plus_mobile_float']=='no') ?  'checked="true"' : '' ;?> type="radio" value="no" class="styled"/>
                                <span class="sfsi_flicnsoptn3">
                           			<?php  _e( 'No', SFSI_PLUS_DOMAIN ); ?> 
                            	</span>
							</li>
                            <li>
                                <input name="sfsi_plus_mobile_float" <?php echo ( $option8['sfsi_plus_mobile_float']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
                                <span class="sfsi_flicnsoptn3">
                           			<?php  _e( 'Yes', SFSI_PLUS_DOMAIN ); ?>
                            	</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="sfsi_plus_mobile_float_section" style="<?php echo (isset($option8['sfsi_plus_mobile_float']) && $option8['sfsi_plus_mobile_float'] == 'yes')? 'display:block' : 'display:none'; ?>">
                    	<ul class="sfsiplus_tab_3_icns flthmonpg" style="overflow: visible;">
                            <li>
                                <input name="sfsi_plus_float_page_mobileposition" <?php echo ( $option8['sfsi_plus_float_page_mobileposition']=='top-left') ?  'checked="true"' : '' ;?> type="radio" value="top-left" class="styled"  />
                                <span class="sfsi_flicnsoptn3 sfsioptntl">
                                    <?php  _e( 'Top left', SFSI_PLUS_DOMAIN ); ?>
                                </span>
                                <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/top_left.png" /></label>
                            </li>
	                       <li>
	                            <input name="sfsi_plus_float_page_mobileposition" <?php echo ( $option8['sfsi_plus_float_page_mobileposition']=='center-top') ?  'checked="true"' : '' ;?> type="radio" value="center-top" class="styled"  />
	                            <span class="sfsi_flicnsoptn3 sfsioptncl">
	                            	<?php  _e( 'Center top', SFSI_PLUS_DOMAIN ); ?>
	                            </span>
	                            <label class="sfsi_float_position_icon_label"><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/float_position_icon.png" /></label>
	                        </li>                            
                            <li>
                                <input name="sfsi_plus_float_page_mobileposition" <?php echo ( $option8['sfsi_plus_float_page_mobileposition']=='top-right') ?  'checked="true"' : '' ;?> type="radio" value="top-right" class="styled"  />
                                <span class="sfsi_flicnsoptn3 sfsioptntr">
                                    <?php  _e( 'Top right', SFSI_PLUS_DOMAIN ); ?>
                                </span>
                                <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/top_right.png" /></label>
                            </li>
                            <li>
                                <input name="sfsi_plus_float_page_mobileposition" <?php echo ( $option8['sfsi_plus_float_page_mobileposition']=='center-left') ?  'checked="true"' : '' ;?> type="radio" value="center-left" class="styled"  />
                                <span class="sfsi_flicnsoptn3 sfsioptncl">
                                    <?php  _e( 'Center left', SFSI_PLUS_DOMAIN ); ?>
                                </span>
                                <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/center_left.png" /></label>
                            </li>
                            <li></li>
                            <li>
                                <input name="sfsi_plus_float_page_mobileposition" <?php echo ( $option8['sfsi_plus_float_page_mobileposition']=='center-right') ?  'checked="true"' : '' ;?> type="radio" value="center-right" class="styled"  />
                                <span class="sfsi_flicnsoptn3 sfsioptncr">
                                    <?php  _e( 'Center right', SFSI_PLUS_DOMAIN ); ?>
                                </span>
                                <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/center_right.png" /></label>
                            </li>
                            <li>
                                <input name="sfsi_plus_float_page_mobileposition" <?php echo ( $option8['sfsi_plus_float_page_mobileposition']=='bottom-left') ?  'checked="true"' : '' ;?> type="radio" value="bottom-left" class="styled"  />
                                <span class="sfsi_flicnsoptn3 sfsioptnbl">
                                    <?php  _e( 'Bottom left', SFSI_PLUS_DOMAIN ); ?>
                                </span>
                                <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/bottom_left.png" /></label>
                            </li>
	                        <li>
	                            <input name="sfsi_plus_float_page_mobileposition" <?php echo ( $option8['sfsi_plus_float_page_mobileposition']=='center-bottom') ?  'checked="true"' : '' ;?> type="radio" value="center-bottom" class="styled"  />
	                            <span class="sfsi_flicnsoptn3 sfsioptncr">
	                            	<?php  _e( 'Center bottom', SFSI_PLUS_DOMAIN ); ?>
	                            </span>
	                            <label class="sfsi_float_position_icon_label sfsi_center_botttom"><img class="sfsi_img_center_bottom" src="<?php echo SFSI_PLUS_PLUGURL;?>images/float_position_icon.png" /></label>
	                        </li>                              
                            <li>
                                <input name="sfsi_plus_float_page_mobileposition" <?php echo ( $option8['sfsi_plus_float_page_mobileposition']=='bottom-right') ?  'checked="true"' : '' ;?> type="radio" value="bottom-right" class="styled"  />
                                <span class="sfsi_flicnsoptn3 sfsioptnbr">
                                    <?php  _e( 'Bottom right', SFSI_PLUS_DOMAIN ); ?>
                                </span>
                                <label><img src="<?php echo SFSI_PLUS_PLUGURL;?>images/bottom_right.png" /></label>
                            </li>
                        </ul>
                    
                        <div style="width: 88%; float: left; margin:25px 0 0 47px">
                            <h4>
                                <?php  _e( 'Margin From:', SFSI_PLUS_DOMAIN ); ?> 
                            </h4>
                            <ul class="sfsi_plus_floaticon_margin_sec">
                                <li>
                                    <label>
                                        <?php  _e( 'Top:', SFSI_PLUS_DOMAIN ); ?> 
                                    </label>
                                    <input name="sfsi_plus_icons_floatMargin_mobiletop" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_mobiletop']!='') ?  $option8['sfsi_plus_icons_floatMargin_mobiletop'] : '' ;?>" />
                                    <ins>
                                        <?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                                    </ins>
                                </li>
                                <li>
                                    <label>
                                        <?php  _e( 'Bottom:', SFSI_PLUS_DOMAIN ); ?> 
                                    </label>
                                    <input name="sfsi_plus_icons_floatMargin_mobilebottom" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_mobilebottom'] != '') ?  $option8['sfsi_plus_icons_floatMargin_mobilebottom'] : '' ;?>" />
                                    <ins>
                                        <?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                                    </ins>
                                </li>
                                <li>
                                    <label>
                                        <?php  _e( 'Left:', SFSI_PLUS_DOMAIN ); ?> 
                                    </label>
                                    <input name="sfsi_plus_icons_floatMargin_mobileleft" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_mobileleft']!='') ?  $option8['sfsi_plus_icons_floatMargin_mobileleft'] : '' ;?>" />
                                    <ins>
                                        <?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                                    </ins>
                                </li>
                                <li>
                                    <label>
                                        <?php  _e( 'Right:', SFSI_PLUS_DOMAIN ); ?> 
                                    </label>
                                    <input name="sfsi_plus_icons_floatMargin_mobileright" type="text" value="<?php echo ($option8['sfsi_plus_icons_floatMargin_mobileright']!='') ?  $option8['sfsi_plus_icons_floatMargin_mobileright'] : '' ;?>" />
                                    <ins>
                                        <?php  _e( 'Pixels', SFSI_PLUS_DOMAIN ); ?>
                                    </ins>
                                </li>
                            </ul>
                        </div>
                    
                        <div style="width: 100%; float: left; margin:25px 0 0 47px">
                            <h4>
                                <?php  _e( 'Make icons…', SFSI_PLUS_DOMAIN ); ?> 
                            </h4>
                            <ul class="sfsi_plus_make_icons sfsi_premium_makeIcons_container">
                                <li>
                                    <input name="sfsi_plus_make_mobileicon" <?php echo ( $option8['sfsi_plus_make_mobileicon']=='float') ?  'checked="true"' : '' ;?> type="radio" value="float" class="styled"/>
                                    <span class="sfsi_flicnsoptn3">
                                        <?php  _e( 'Float', SFSI_PLUS_DOMAIN ); ?> 
                                    </span>
                                </li>
                                <li>
                                    <input name="sfsi_plus_make_mobileicon" <?php echo ( $option8['sfsi_plus_make_mobileicon']=='stay') ?  'checked="true"' : '' ;?> type="radio" value="stay" class="styled"  />
                                    <span class="sfsi_flicnsoptn3">
                                        <?php  _e( 'Stay at the same place A', SFSI_PLUS_DOMAIN ); ?>
                                        <h5><?php  _e( '(not visible if user scrolls down)', SFSI_PLUS_DOMAIN ); ?></h5>
                                    </span>
                                </li>
                                <li>
									<input name="sfsi_plus_make_mobileicon" type="radio" value="stay_same_place" class="styled" 
										<?php echo ( $option8['sfsi_plus_make_mobileicon']=='stay_same_place') ?  'checked="true"' : '' ;?>/>
	                                <span class="sfsi_flicnsoptn3">
	                           			<?php  _e( 'Stay at the same place B', SFSI_PLUS_DOMAIN ); ?>
	                           			<h5><?php  _e( '(still visible if user scrolls down)', SFSI_PLUS_DOMAIN ); ?></h5>
	                           		</span>
	                           	</li>
                            </ul>
                        </div>

                        <div class="row sfsi_plus_float_icons_alignment">
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
                                             <select name="sfsi_plus_float_mobile_horizontal_verical_Alignment" id="sfsi_plus_float_mobile_horizontal_verical_Alignment">
                                                <option value="Horizontal" <?php echo ($option8['sfsi_plus_float_mobile_horizontal_verical_Alignment']=='Horizontal') ?  'selected="selected"' : '' ;?>>
                                                    <?php  _e( 'Horizontally', SFSI_PLUS_DOMAIN ); ?>
                                                </option>
                                                <option value="Vertical" <?php echo ($option8['sfsi_plus_float_mobile_horizontal_verical_Alignment']=='Vertical') ?  'selected="selected"' : '' ;?>>
                                                    <?php  _e( 'Vertically', SFSI_PLUS_DOMAIN ); ?>
                                                </option>
                                            </select>    
                                        </div>  
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    
                </div>

				<div class="sfsiplus_show_desktop_mobile_setting_li floatDesktopMobileLi" style="<?php echo esc_attr($style); ?>">
				
						<div class="sfsidesktopmbilelabel"><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Show on:', SFSI_PLUS_DOMAIN ); ?></span></div>

						<ul class="sfsiplus_icn_listing8 sfsi_plus_closerli floatDesktopMobileul">
						    	
						    	<li class="">
									
									<div class="radio_section tb_4_ck">
						            	<input name="sfsi_plus_float_show_on_desktop" type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_float_show_on_desktop']=='yes') ?  'checked="true"' : '' ;?>>
						            </div>
									
									<div class="sfsiplus_right_info">
										<p>
											<span class="sfsiplus_toglepstpgspn"><?php  _e( 'Desktop', SFSI_PLUS_DOMAIN ); ?></span></p>
									</div>
								</li>
						        
						        <li class="">
									
									<div class="radio_section tb_4_ck">
						            	<input name="sfsi_plus_float_show_on_mobile"  type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_float_show_on_mobile']=='yes') ?  'checked="true"' : '' ;?>>
						            </div>

									<div class="sfsiplus_right_info">
										<p><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Mobile', SFSI_PLUS_DOMAIN ); ?></span></p>
									</div>
								</li>
						    </ul>			
				</div>


			</div>
		</li>