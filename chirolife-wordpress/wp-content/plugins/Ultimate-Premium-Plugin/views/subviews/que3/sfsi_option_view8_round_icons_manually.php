	<?php 
		
		$option8['sfsi_plus_shortcode_horizontal_verical_Alignment'] = (isset($option8['sfsi_plus_shortcode_horizontal_verical_Alignment'])) ? $option8['sfsi_plus_shortcode_horizontal_verical_Alignment']: "Horizontal";

		$option8['sfsi_plus_shortcode_mobile_horizontal_verical_Alignment'] = (isset($option8['sfsi_plus_shortcode_mobile_horizontal_verical_Alignment'])) ? $option8['sfsi_plus_shortcode_mobile_horizontal_verical_Alignment']: "Horizontal";

		$option8['sfsi_plus_mobile_shortcode'] = (isset($option8['sfsi_plus_mobile_shortcode'])) ? $option8['sfsi_plus_mobile_shortcode']: "no";

		$classForShortCodeAlignments      = ($option8['sfsi_plus_place_item_manually']=="yes") ? "show" : "hide";

		$classForMobileShortCodeAlignments = ($option8['sfsi_plus_mobile_shortcode']=='no') ? "hide" : $classForShortCodeAlignments;

	?>

		<li class="sfsiplusplacethemanulywpr">
			
			<div class="radio_section tb_4_ck" onclick="checkforinfoslction(this);"><input name="sfsi_plus_place_item_manually" <?php echo ($option8['sfsi_plus_place_item_manually']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_place_item_manually" type="checkbox" value="yes" class="styled"  /></div>
			
			<div class="sfsiplus_right_info">
				<p>
					
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Place round icons manually', SFSI_PLUS_DOMAIN ); ?>
                    </span><br>
                    
                    <?php
					
					$_shortcode_desktop_mobile_setting_style = '';

                    if($option8['sfsi_plus_place_item_manually']=='yes')
					{
						$label_style = 'style="display:block; font-size: 15px;"';
						$_shortcode_desktop_mobile_setting_style = 'style="display:block;"';
					}
					else
					{
						$label_style = 'style="font-size: 15px;"';
					}
					?>
					<label class="sfsiplus_sub-subtitle ckckslctn" <?php echo $label_style;?>>
                    	<?php _e('Place the following string into your theme codes: ',SFSI_PLUS_DOMAIN);?> 
						
                        &lt;?php echo DISPLAY_ULTIMATE_PLUS(); ?&gt;
                        
						<?php _e('Or use the shortcode [DISPLAY_ULTIMATE_PLUS] to display them wherever you want.',SFSI_PLUS_DOMAIN); ?>
                    </label>
				</p>

			   <div class="row sfsi_plus_shortcode_icons_alignment <?php echo $classForShortCodeAlignments;?>">

			    	<h4 style="padding-top: 0;">
			        	<?php  _e( 'Alignments', SFSI_PLUS_DOMAIN ); ?>
			        </h4>
			        <div class="icons_size">
			        	
			        	<ul class="sfsi_plus_new_alignment_option">
							<li>
								
								<h3><?php  _e( 'Show icons', SFSI_PLUS_DOMAIN ); ?></h3>
								
								<div class="field">
									 <select name="sfsi_plus_shortcode_horizontal_verical_Alignment" id="sfsi_plus_shortcode_horizontal_verical_Alignment">
										<option value="Horizontal" <?php echo ($option8['sfsi_plus_shortcode_horizontal_verical_Alignment']=='Horizontal') ?  'selected="selected"' : '' ;?>>
											<?php  _e( 'Horizontally', SFSI_PLUS_DOMAIN ); ?>
										</option>
										<option value="Vertical" <?php echo ($option8['sfsi_plus_shortcode_horizontal_verical_Alignment']=='Vertical') ?  'selected="selected"' : '' ;?>>
											<?php  _e( 'Vertically', SFSI_PLUS_DOMAIN ); ?>
										</option>
									</select>    
								</div>	
							</li>
						</ul>
			        </div>
			    </div>

                <div class="sfsi_plus_alignments_mobile_shortcode <?php echo $classForShortCodeAlignments;?>">
                    	<h4>
                       		<?php  _e( 'Need different selections for mobile?', SFSI_PLUS_DOMAIN ); ?> 
                        </h4>
                        <ul class="sfsi_plus_make_icons sfsi_plus_mobile_shortcode">
                            <li>
                                <input name="sfsi_plus_mobile_shortcode" <?php echo ( $option8['sfsi_plus_mobile_shortcode']=='no') ?  'checked="true"' : '' ;?> type="radio" value="no" class="styled"/>
                                <span class="sfsi_flicnsoptn3">
                           			<?php  _e( 'No', SFSI_PLUS_DOMAIN ); ?> 
                            	</span>
							</li>
                            <li>
                                <input name="sfsi_plus_mobile_shortcode" <?php echo ( $option8['sfsi_plus_mobile_shortcode']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
                                <span class="sfsi_flicnsoptn3">
                           			<?php  _e( 'Yes', SFSI_PLUS_DOMAIN ); ?>
                            	</span>
                            </li>
                        </ul>
                </div>

			    <div class="row sfsi_plus_shortcode_mobile_icons_alignment <?php echo $classForMobileShortCodeAlignments;?>">
			    	<h4 style="padding-top: 0;">
			        	<?php  _e( 'Alignments', SFSI_PLUS_DOMAIN ); ?>
			        </h4>
			        <div class="icons_size">
			        	<ul class="sfsi_plus_new_alignment_option">
							<li>
								<span class="sfsi_plus_new_alignment_span" style="line-height: 48px;margin-top:0px !important;">
									<?php  _e( 'Show icons', SFSI_PLUS_DOMAIN ); ?>
								</span>
								<div class="field">
									 <select name="sfsi_plus_shortcode_mobile_horizontal_verical_Alignment" id="sfsi_plus_shortcode_mobile_horizontal_verical_Alignment">
										<option value="Horizontal" <?php echo ($option8['sfsi_plus_shortcode_mobile_horizontal_verical_Alignment']=='Horizontal') ?  'selected="selected"' : '' ;?>>
											<?php  _e( 'Horizontally', SFSI_PLUS_DOMAIN ); ?>
										</option>
										<option value="Vertical" <?php echo ($option8['sfsi_plus_shortcode_mobile_horizontal_verical_Alignment']=='Vertical') ?  'selected="selected"' : '' ;?>>
											<?php  _e( 'Vertically', SFSI_PLUS_DOMAIN ); ?>
										</option>
									</select>    
								</div>	
							</li>
						</ul>
			        </div>
			    </div>

				<div class="shortcodeDesktopMobileLi sfsiplus_show_desktop_mobile_setting_li" <?php echo $_shortcode_desktop_mobile_setting_style; ?>>
					
							<div class="sfsidesktopmbilelabel"><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Show on:', SFSI_PLUS_DOMAIN ); ?></span></div>

							<ul class="shortcodeDesktopMobileUl sfsiplus_icn_listing8 sfsi_plus_closerli">
							    	
							    	<li class="">
										
										<div class="radio_section tb_4_ck">
							            	<input name="sfsi_plus_shortcode_show_on_desktop" type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_shortcode_show_on_desktop']=='yes') ?  'checked="true"' : '' ;?>>
							            </div>
										
										<div class="sfsiplus_right_info">
											<p><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Desktop', SFSI_PLUS_DOMAIN ); ?></span></p>
										</div>
									</li>
							        
							        <li class="">
										
										<div class="radio_section tb_4_ck">
							            	<input name="sfsi_plus_shortcode_show_on_mobile"  type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_shortcode_show_on_mobile']=='yes') ?  'checked="true"' : '' ;?>>
							            </div>

										<div class="sfsiplus_right_info">
											<p><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Mobile', SFSI_PLUS_DOMAIN ); ?></span></p>
										</div>
									</li>
							    </ul>			
				</div>				
			</div>			
		</li>