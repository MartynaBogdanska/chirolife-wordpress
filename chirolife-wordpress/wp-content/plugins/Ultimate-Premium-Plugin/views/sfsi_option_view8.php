<?php
     /* unserialize all saved option for Eight options */
    $option8=  unserialize(get_option('sfsi_premium_section8_options',false));
	if(!isset($option8['sfsi_plus_rectsub']))
	{
		$option8['sfsi_plus_rectsub'] = 'no';
	}
	if(!isset($option8['sfsi_plus_rectfb']))
	{
		$option8['sfsi_plus_rectfb'] = 'yes';
	}
	if(!isset($option8['sfsi_plus_rectgp']))
	{
		$option8['sfsi_plus_rectgp'] = 'yes';
	}
	if(!isset($option8['sfsi_plus_rectshr']))
	{
		$option8['sfsi_plus_rectshr'] = 'yes';
	}
	if(!isset($option8['sfsi_plus_recttwtr']))
	{
		$option8['sfsi_plus_recttwtr'] = 'no';
	}
	if(!isset($option8['sfsi_plus_rectpinit']))
	{
		$option8['sfsi_plus_rectpinit'] = 'no';
	}
	if(!isset($option8['sfsi_plus_rectfbshare']))
	{
		$option8['sfsi_plus_rectfbshare'] = 'no';
	}
	if(!isset($option8['sfsi_plus_rectlinkedin']))
	{
		$option8['sfsi_plus_rectlinkedin'] = 'no';
	}
	if(!isset($option8['sfsi_plus_rectreddit']))
	{
		$option8['sfsi_plus_rectreddit'] = 'no';
	}
	
	/**
	 * Sanitize, escape and validate values
	 */

	$arrIconPlacePositionsKey = array(
		'sfsi_plus_show_via_widget',
		'sfsi_plus_float_on_page',
		'sfsi_plus_place_item_manually',
		'sfsi_plus_place_rectangle_icons_item_manually',
		'sfsi_plus_show_item_onposts'
	);

	foreach ($arrIconPlacePositionsKey as $pKeyName) {
		$option8[$pKeyName] = sfsi_premium_get_option($option8,$pKeyName,'');
	}

	$option8['sfsi_plus_make_icon'] 		 = sfsi_premium_get_option($option8,'sfsi_plus_make_icon','');
	$option8['sfsi_plus_float_page_position']= sfsi_premium_get_option($option8,'sfsi_plus_float_page_position','');

	$arrMarginsKey = array(
		'sfsi_plus_icons_floatMargin_top',
		'sfsi_plus_icons_floatMargin_bottom',
		'sfsi_plus_icons_floatMargin_left',
		'sfsi_plus_icons_floatMargin_right'
	); 

	foreach ($arrMarginsKey as $dbKeyName) {
		$option8[$dbKeyName] = sfsi_premium_get_option($option8,$dbKeyName,'','intval');
	}

	$option8['sfsi_plus_mobile_float'] 		= sfsi_premium_get_option($option8,'sfsi_plus_mobile_float','no');
	$option8['sfsi_plus_make_mobileicon'] 	= sfsi_premium_get_option($option8,'sfsi_plus_make_mobileicon','');
	$option8['sfsi_plus_float_page_mobileposition'] = sfsi_premium_get_option($option8,'sfsi_plus_float_page_mobileposition','');

	$arrMobileMarginsKey = array(
		'sfsi_plus_icons_floatMargin_mobiletop',
		'sfsi_plus_icons_floatMargin_mobilebottom',
		'sfsi_plus_icons_floatMargin_mobileleft',
		'sfsi_plus_icons_floatMargin_mobileright'
	); 

	foreach ($arrMobileMarginsKey as $dbKeyVal) {
		$option8[$dbKeyVal] = sfsi_premium_get_option($option8,$dbKeyVal,'','intval');
	}

	$option8['sfsi_plus_display_button_type']= sfsi_premium_get_option($option8,'sfsi_plus_display_button_type','');

	$arrSizeSpacingKey = array(
		'sfsi_plus_post_icons_size',
		'sfsi_plus_post_icons_spacing',
		'sfsi_plus_post_icons_vertical_spacing'
	);

	foreach ($arrSizeSpacingKey as $keyVal) {
		$option8[$keyVal] = sfsi_premium_get_option($option8,$keyVal,'','intval');
	}
	
	$option8['sfsi_plus_icons_alignment'] = sfsi_premium_get_option($option8,'sfsi_plus_icons_alignment','');
	$option8['sfsi_plus_icons_DisplayCounts'] = sfsi_premium_get_option($option8,'sfsi_plus_icons_DisplayCounts','');	

	// 
	 $keyGroup = 'sfsi_plus_textBefor_icons_';
	$option8[$keyGroup] 			= sfsi_premium_get_option($option8,$keyGroup,'');
	$option8[$keyGroup.'font_type']	= sfsi_premium_get_option($option8,$keyGroup.'font_type','normal');
	$option8[$keyGroup.'font_size']	= sfsi_premium_get_option($option8,$keyGroup.'font_size','20','intval');
	$option8[$keyGroup.'font']		= sfsi_premium_get_option($option8,$keyGroup.'font','inherit');
	$option8[$keyGroup.'fontcolor']	= (isset($option8[$keyGroup.'fontcolor']))? $option8[$keyGroup.'fontcolor']: '#000000';


	$arrRectKeys = array(
		'sfsi_plus_rectsub',
		'sfsi_plus_rectfb',
		'sfsi_plus_rectgp',
		'sfsi_plus_rectshr',
		'sfsi_plus_recttwtr',
		'sfsi_plus_rectpinit',
		'sfsi_plus_rectfbshare',
		'sfsi_plus_rectlinkedin',
		'sfsi_plus_rectreddit'
	);

	$arrPlacementDesktopMobileKeys = array(
		'sfsi_plus_widget_show_on_desktop',
		'sfsi_plus_widget_show_on_mobile',
		'sfsi_plus_float_show_on_desktop',
		'sfsi_plus_float_show_on_mobile',
		'sfsi_plus_shortcode_show_on_desktop',
		'sfsi_plus_shortcode_show_on_mobile',
		'sfsi_plus_beforeafterposts_show_on_desktop',
		'sfsi_plus_beforeafterposts_show_on_mobile',
		'sfsi_plus_rectangle_icons_shortcode_show_on_desktop',
		'sfsi_plus_rectangle_icons_shortcode_show_on_mobile'
	);

	$arrAllKeys = array($arrRectKeys,$arrPlacementDesktopMobileKeys);

	foreach ($arrAllKeys as $arr) {
		foreach ($arr as $dbKey) :
			$option8[$dbKey] = sfsi_premium_get_option($option8,$dbKey,'');		
		endforeach;
	}

	$arrInExCheckBoxKeys = array('home','page','post','tag','category','date_archive','author_archive','search','url','custom_post_types','taxonomies');

	foreach ($arrInExCheckBoxKeys as $dbkey) {

		switch ($dbkey) {

			case 'custom_post_types': case 'taxonomies':
				$dbExSwkey = 'sfsi_plus_switch_exclude_'.$dbkey;
				$option8[$dbExSwkey] = sfsi_premium_get_option($option8,$dbExSwkey,'no');

				$dbInSwkey = 'sfsi_plus_switch_include_'.$dbkey;
				$option8[$dbInSwkey] = sfsi_premium_get_option($option8,$dbInSwkey,'no');	
				break;
			
			default:
				$dbExkey = 'sfsi_plus_exclude_'.$dbkey;
				$option8[$dbExkey] = sfsi_premium_get_option($option8,$dbExkey,'');

				$dbInkey = 'sfsi_plus_include_'.$dbkey;
				$option8[$dbInkey] = sfsi_premium_get_option($option8,$dbInkey,'');		
			break;
		}	
	}

	$option8['sfsi_plus_list_exclude_custom_post_types'] = 	(isset($option8['sfsi_plus_list_exclude_custom_post_types']))
															? unserialize($option8['sfsi_plus_list_exclude_custom_post_types'])
															: array();
	$option8['sfsi_plus_list_exclude_taxonomies'] = 	(isset($option8['sfsi_plus_list_exclude_taxonomies']))
															? unserialize($option8['sfsi_plus_list_exclude_taxonomies'])
															: array();


	$option8['sfsi_plus_list_include_custom_post_types'] = 	(isset($option8['sfsi_plus_list_include_custom_post_types']))
															? unserialize($option8['sfsi_plus_list_include_custom_post_types'])
															: array();

	$option8['sfsi_plus_list_include_taxonomies'] = 	(isset($option8['sfsi_plus_list_include_taxonomies']))
															? unserialize($option8['sfsi_plus_list_include_taxonomies'])
															: array();	

	$option8['sfsi_plus_marginAbove_postIcon'] 	= sfsi_premium_get_option($option8,'sfsi_plus_marginAbove_postIcon','','intval');
	$option8['sfsi_plus_marginBelow_postIcon'] 	= sfsi_premium_get_option($option8,'sfsi_plus_marginBelow_postIcon','','intval');


    $option8['sfsi_plus_display_after_pageposts'] = sfsi_premium_get_option($option8,'sfsi_plus_display_after_pageposts','');
    $option8['sfsi_plus_display_before_pageposts'] = sfsi_premium_get_option($option8,'sfsi_plus_display_before_pageposts','');
	
	$_icons_rules 	= sfsi_premium_get_option($option8,'sfsi_plus_icons_rules',0);

	$_inclusionSectionClass = (1 == $_icons_rules) ? "show" : "hide"; 	 
	$_exclusionSectionClass = (2 == $_icons_rules) ? "show" : "hide";

	$allListTaxonomies  = sfsi_premium_get_all_taxonomies();
	$custom_post_types  = sfsi_premium_get_custom_post_types();

?>

<div class="tab8">
		
    <ul class="sfsiplus_icn_listing8">

    	<!--**********************  Show them via a widget section **************************************-->
		
			<?php @include(SFSI_PLUS_DOCROOT.'/views/subviews/que3/sfsi_option_view8_icons_widget.php'); ?>
        
    	<!--**********************  Define the location on the page **************************************-->

			<?php @include(SFSI_PLUS_DOCROOT.'/views/subviews/que3/sfsi_option_view8_icons_float.php'); ?>
        
        <!--**********************  Place round icons manually *******************************************-->
			
			<?php @include(SFSI_PLUS_DOCROOT.'/views/subviews/que3/sfsi_option_view8_round_icons_manually.php'); ?>
			
        
        <!--**********************  Show them before or after post****************************************-->
			
			<?php @include(SFSI_PLUS_DOCROOT.'/views/subviews/que3/sfsi_option_view8_icons_before_after_posts.php'); ?>

	</ul>
		
    <!--  ************************ Place rectangle icons manually STARTS here *****************************-->
           
           <?php @include(SFSI_PLUS_DOCROOT.'/views/subviews/que3/sfsi_option_view8_rectangle_icons_manually.php'); ?>

    <!--  ************************ Place rectangle icons manually CLOSES here *****************************-->	

     <div class='row sfsi_plus_include_exclude_wrapper'>
    	
    	<h1>
            <?php  _e( 'Include or exclude pages where icons should show', SFSI_PLUS_DOMAIN ); ?>
        </h1>

        <div class="sfsi_plus_include_exclude_div">
        	<p class="sfsi_rules_note">
        	    <?php  _e( 'These selections do not apply for icons you decided to place before/after posts.', SFSI_PLUS_DOMAIN ); ?>
            </p>
            <ul class="sfsi_plus_include_exclude_container">
				<li>
					<div class="sfsiplusIncludeExcludeRules">
						<input name="sfsi_plus_icons_rules" <?php echo (0 == $_icons_rules) ?  'checked="checked"' : '' ;?> type="radio" value="0" class="styled" />
						<p>
							<?php  _e('No restrictions', SFSI_PLUS_DOMAIN); ?>
	                    </p>						
					</div>

				</li>
				<li>
					<div class="sfsiplusIncludeExcludeRules">
						<input name="sfsi_plus_icons_rules" <?php echo (1 == $_icons_rules) ?  'checked="checked"' : '' ;?> type="radio" value="1" class="styled" />
						<p>
							<?php
	                    		_e('Only on certain pages (Inclusion rules)', SFSI_PLUS_DOMAIN);
	                    	?>
	                    </p>						
					</div>

   					 <?php @include(SFSI_PLUS_DOCROOT.'/views/subviews/que3/sfsi_option_view8_include_icons_onpages.php'); ?>

				</li>

				<li>
					<div class="sfsiplusIncludeExcludeRules">
						<input name="sfsi_plus_icons_rules" <?php echo (2 == $_icons_rules) ?  'checked="checked"' : '' ;?> type="radio" value="2" class="styled" />
						<p>
							<?php
	                    		_e('On all except the following pages (Exclusion rules)', SFSI_PLUS_DOMAIN);
	                    	?>
	                    </p>						
					</div>

   					 <?php @include(SFSI_PLUS_DOCROOT.'/views/subviews/que3/sfsi_option_view8_exclude_icons_onpages.php'); ?>

				</li>				
			</ul>	
        
        </div>
    	
    </div>


	<!-- SAVE BUTTON SECTION   --> 
	<div class="save_button">
       <img src="<?php echo SFSI_PLUS_PLUGURL ?>images/ajax-loader.gif" class="loader-img" />
       <?php  $nonce = wp_create_nonce("update_plus_step8"); ?>
        <a  href="javascript:;" id="sfsi_plus_save8" title="Save" data-nonce="<?php echo $nonce;?>">
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

<?php
function sfsi_premium_isSeletcted($givenVal, $value)
{
	if($givenVal == $value)
		return 'selected="true"';
	else
		return '';
}
?>