<?php 
	
	$rectStyle = ($option8['sfsi_plus_show_item_onposts']=="yes")? 'display:block': '';
?>

<ul class="sfsiplus_icn_listing8 sfsi_rectangle_ul" style="<?php echo $rectStyle ;?>">

	<li class="sfsiplusplacethemanulywpr">
			
<!-- 			<div class="radio_section tb_4_ck" onclick="checkforinfoslction(this);"><input name="sfsi_plus_place_rectangle_icons_item_manually" <?php echo ($option8['sfsi_plus_place_rectangle_icons_item_manually']=='yes') ?  'checked="true"' : '' ;?>  id="sfsi_plus_place_rectangle_icons_item_manually" type="checkbox" value="yes" class="styled"  /></div> -->
			
			<div class="sfsiplus_right_info">

					<p>
					<span class="sfsiplus_toglepstpgspn">
                    	<?php  _e( 'Placing the rectangle icons via shortcode', SFSI_PLUS_DOMAIN ); ?>
                    </span>
                    
					<p class="sfsiplus_sub-subtitle ckckslctn"><?php _e('You can also place the rectangle icons not only before/after posts, but anywhere you want. ' ,SFSI_PLUS_DOMAIN);?></p>

                    <p class="sfsiplus_sub-subtitle ckckslctn"><?php _e('For that, please place the following string into your theme codes: ',SFSI_PLUS_DOMAIN);?> 						
                        &lt;?php echo DISPLAY_PREMIUM_RECTANGLE_ICONS(); ?&gt;
                    </p>

					<p class="sfsiplus_sub-subtitle ckckslctn">	<?php _e('Or use the shortcode [DISPLAY_PREMIUM_RECTANGLE_ICONS]',SFSI_PLUS_DOMAIN); ?></p>

					</p>
				<div class="shortcodeDesktopMobileLi sfsiplus_show_desktop_mobile_setting_li" style="<?php echo $rectStyle ;?>">
					
							<div class="sfsidesktopmbilelabel"><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Show on:', SFSI_PLUS_DOMAIN ); ?></span></div>

							<ul class="shortcodeDesktopMobileUl sfsiplus_icn_listing8 sfsi_plus_closerli">
							    	
							    	<li class="">
										
										<div class="radio_section tb_4_ck">
							            	<input name="sfsi_plus_rectangle_icons_shortcode_show_on_desktop" type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_rectangle_icons_shortcode_show_on_desktop']=='yes') ?  'checked="true"' : '' ;?>>
							            </div>
										
										<div class="sfsiplus_right_info">
											<p><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Desktop', SFSI_PLUS_DOMAIN ); ?></span></p>
										</div>
									</li>
							        
							        <li class="">
										
										<div class="radio_section tb_4_ck">
							            	<input name="sfsi_plus_rectangle_icons_shortcode_show_on_mobile"  type="checkbox" value="yes" class="styled" <?php echo ($option8['sfsi_plus_rectangle_icons_shortcode_show_on_mobile']=='yes') ?  'checked="true"' : '' ;?>>
							            </div>

										<div class="sfsiplus_right_info">
											<p><span class="sfsiplus_toglepstpgspn"><?php  _e( 'Mobile', SFSI_PLUS_DOMAIN ); ?></span></p>
										</div>
									</li>
							    </ul>			
				</div>				
			</div>			
		</li>
</ul>