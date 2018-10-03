	<?php 
		
		$option8['sfsi_plus_widget_horizontal_verical_Alignment'] = (isset($option8['sfsi_plus_widget_horizontal_verical_Alignment'])) ? $option8['sfsi_plus_widget_horizontal_verical_Alignment']: "Horizontal";

		$classForWidgetAlignments = ($option8['sfsi_plus_show_via_widget']=='yes') ? "show" : "hide";

		$option8['sfsi_plus_widget_mobile_horizontal_verical_Alignment'] = (isset($option8['sfsi_plus_widget_mobile_horizontal_verical_Alignment'])) ? $option8['sfsi_plus_widget_mobile_horizontal_verical_Alignment']: "Horizontal";

		$option8['sfsi_plus_mobile_widget'] = (isset($option8['sfsi_plus_mobile_widget'])) ? $option8['sfsi_plus_mobile_widget']: "no";

		$classForMobileWidgetAlignments = ($option8['sfsi_plus_mobile_widget']=='no') ? "hide" : $classForWidgetAlignments;
	?>
    	
		<li class="sfsiplus_show_via_widget_li">
			
			<div class="radio_section tb_4_ck" onclick="checkforinfoslction(this);"><input name="sfsi_plus_show_via_widget" <?php echo ($option8['sfsi_plus_show_via_widget']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_show_via_widget" type="checkbox" value="yes" class="styled"  /></div>
			
			<div class="sfsiplus_right_info">
				<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Show them via a widget', SFSI_PLUS_DOMAIN ); ?>
                    </span><br>
                    
                    <?php
                    
                    $_widget_desktop_mobile_setting_style ='';

                    if($option8['sfsi_plus_show_via_widget']=='yes')
					{
						$label_style = 'style="display:block; font-size: 16px;"';
						$_widget_desktop_mobile_setting_style = 'display:block';
					}
					else
					{
						$label_style = 'style="font-size: 16px;"';
					}
					?>
					<label class="sfsiplus_sub-subtitle ckckslctn" <?php echo $label_style;?>>
                    	<?php  _e( 'Go to the widget area and drag & drop it where you want to have it!' , SFSI_PLUS_DOMAIN ); ?>
                    	<a href="<?php echo admin_url('widgets.php');?>">
                    		<?php  _e( 'Click here', SFSI_PLUS_DOMAIN ); ?>
                    	</a> 
                    </label>
				</p>

			    <div class="row sfsi_plus_widget_icons_alignment <?php echo $classForWidgetAlignments;?>">
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
									 <select name="sfsi_plus_widget_horizontal_verical_Alignment" id="sfsi_plus_widget_horizontal_verical_Alignment">
										<option value="Horizontal" <?php echo ($option8['sfsi_plus_widget_horizontal_verical_Alignment']=='Horizontal') ?  'selected="selected"' : '' ;?>>
											<?php  _e( 'Horizontally', SFSI_PLUS_DOMAIN ); ?>
										</option>
										<option value="Vertical" <?php echo ($option8['sfsi_plus_widget_horizontal_verical_Alignment']=='Vertical') ?  'selected="selected"' : '' ;?>>
											<?php  _e( 'Vertically', SFSI_PLUS_DOMAIN ); ?>
										</option>
									</select>    
								</div>	
							</li>
						</ul>
			        </div>
			    </div>

                <div class="sfsi_plus_alignments_mobile_widget <?php echo $classForWidgetAlignments;?>">
                    	<h4>
                       		<?php  _e( 'Need different selections for mobile?', SFSI_PLUS_DOMAIN ); ?> 
                        </h4>
                        <ul class="sfsi_plus_make_icons sfsi_plus_mobile_widget">
                            <li>
                                <input name="sfsi_plus_mobile_widget" <?php echo ( $option8['sfsi_plus_mobile_widget']=='no') ?  'checked="true"' : '' ;?> type="radio" value="no" class="styled"/>
                                <span class="sfsi_flicnsoptn3">
                           			<?php  _e( 'No', SFSI_PLUS_DOMAIN ); ?> 
                            	</span>
							</li>
                            <li>
                                <input name="sfsi_plus_mobile_widget" <?php echo ( $option8['sfsi_plus_mobile_widget']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  />
                                <span class="sfsi_flicnsoptn3">
                           			<?php  _e( 'Yes', SFSI_PLUS_DOMAIN ); ?>
                            	</span>
                            </li>
                        </ul>
                </div>

			    <div class="row sfsi_plus_widget_mobile_icons_alignment <?php echo $classForMobileWidgetAlignments;?>">
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
									 <select name="sfsi_plus_widget_mobile_horizontal_verical_Alignment" id="sfsi_plus_widget_mobile_horizontal_verical_Alignment">
										<option value="Horizontal" <?php echo ($option8['sfsi_plus_widget_mobile_horizontal_verical_Alignment']=='Horizontal') ?  'selected="selected"' : '' ;?>>
											<?php  _e( 'Horizontally', SFSI_PLUS_DOMAIN ); ?>
										</option>
										<option value="Vertical" <?php echo ($option8['sfsi_plus_widget_mobile_horizontal_verical_Alignment']=='Vertical') ?  'selected="selected"' : '' ;?>>
											<?php  _e( 'Vertically', SFSI_PLUS_DOMAIN ); ?>
										</option>
									</select>    
								</div>	
							</li>
						</ul>
			        </div>
			    </div>

				<div class="sfsiplus_show_desktop_mobile_setting_li widgetDesktopMobileLi" style="<?php echo esc_attr($_widget_desktop_mobile_setting_style);?>">
				
						<div class="sfsidesktopmbilelabel"><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Show on:', SFSI_PLUS_DOMAIN ); ?></span></div>

						<ul class="sfsiplus_icn_listing8 sfsi_plus_closerli">
						    	
						    	<li class="">
									
									<div class="radio_section tb_4_ck">
						            	<input name="sfsi_plus_widget_show_on_desktop" type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_widget_show_on_desktop']=='yes') ?  'checked="true"' : '' ;?>>
						            </div>
									
									<div class="sfsiplus_right_info">
										<p><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Desktop', SFSI_PLUS_DOMAIN ); ?></span></p>
									</div>
								</li>
						        
						        <li class="">
									
									<div class="radio_section tb_4_ck">
						            	<input name="sfsi_plus_widget_show_on_mobile"  type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_widget_show_on_mobile']=='yes') ?  'checked="true"' : '' ;?>>
						            </div>

									<div class="sfsiplus_right_info">
										<p><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Mobile', SFSI_PLUS_DOMAIN ); ?></span></p>
									</div>
								</li>
						    </ul>			
				</div>

			</div>

		</li>