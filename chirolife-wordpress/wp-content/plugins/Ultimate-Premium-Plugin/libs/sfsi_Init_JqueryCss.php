<?php 

function sfsi_is_rectangle_icons_shortcode_showing_on_front(){
	
	$sfsi_section8 = unserialize(get_option("sfsi_premium_section8_options"));

	$isDisplayingOnMobile  = (isset($sfsi_section8['sfsi_plus_rectangle_icons_shortcode_show_on_mobile']) && $sfsi_section8['sfsi_plus_rectangle_icons_shortcode_show_on_mobile'] == 'yes');
	$isDisplayingOnDesktop = (isset($sfsi_section8['sfsi_plus_rectangle_icons_shortcode_show_on_desktop']) && $sfsi_section8['sfsi_plus_rectangle_icons_shortcode_show_on_desktop'] == 'yes');
	
	$isDisplayingRectangleIconsOnFront = 	$isDisplayingOnDesktop || $isDisplayingOnMobile;

	return $isDisplayingRectangleIconsOnFront;
}

function sfsi_is_widget_showing_on_front(){

	$sfsi_section8 = unserialize(get_option("sfsi_premium_section8_options"));

	$isDisplayingOnMobile  = (isset($sfsi_section8['sfsi_plus_widget_show_on_mobile']) && $sfsi_section8['sfsi_plus_widget_show_on_mobile'] == 'yes');
	$isDisplayingOnDesktop = (isset($sfsi_section8['sfsi_plus_widget_show_on_desktop']) && $sfsi_section8['sfsi_plus_widget_show_on_desktop'] == 'yes');
	
	$isDisplayingWidgetIconsOnFront = 	$isDisplayingOnDesktop || $isDisplayingOnMobile;

	return $isDisplayingWidgetIconsOnFront;
}

function sfsi_is_floating_icons_showing_on_front(){

	$sfsi_section8 = unserialize(get_option("sfsi_premium_section8_options"));

	$isDisplayingOnMobile  = (isset($sfsi_section8['sfsi_plus_float_show_on_mobile']) && $sfsi_section8['sfsi_plus_float_show_on_mobile'] == 'yes');
	$isDisplayingOnDesktop = (isset($sfsi_section8['sfsi_plus_float_show_on_desktop']) && $sfsi_section8['sfsi_plus_float_show_on_desktop'] == 'yes');
	
	$isDisplayingFloatIconsOnFront = 	$isDisplayingOnDesktop || $isDisplayingOnMobile;

	return $isDisplayingFloatIconsOnFront;
}

function sfsi_is_shortcode_icons_showing_on_front(){

	$sfsi_section8 = unserialize(get_option("sfsi_premium_section8_options"));

	$isDisplayingOnMobile  = (isset($sfsi_section8['sfsi_plus_shortcode_show_on_mobile']) && $sfsi_section8['sfsi_plus_shortcode_show_on_mobile'] == 'yes');
	$isDisplayingOnDesktop = (isset($sfsi_section8['sfsi_plus_shortcode_show_on_desktop']) && $sfsi_section8['sfsi_plus_shortcode_show_on_desktop'] == 'yes');
	
	$isDisplayingShortCodeIconsOnFront = 	$isDisplayingOnDesktop || $isDisplayingOnMobile;

	return $isDisplayingShortCodeIconsOnFront;
}

function sfsi_is_beforeafterposts_icons_showing_on_front(){

	$sfsi_section8 = unserialize(get_option("sfsi_premium_section8_options"));

	$isDisplayingOnMobile  = (isset($sfsi_section8['sfsi_plus_beforeafterposts_show_on_mobile']) && $sfsi_section8['sfsi_plus_beforeafterposts_show_on_mobile'] == 'yes');
	$isDisplayingOnDesktop = (isset($sfsi_section8['sfsi_plus_beforeafterposts_show_on_desktop']) && $sfsi_section8['sfsi_plus_beforeafterposts_show_on_desktop'] == 'yes');
	
	$isDisplayingBeforeafterPostsIconsOnFront = 	$isDisplayingOnDesktop || $isDisplayingOnMobile;

	return $isDisplayingBeforeafterPostsIconsOnFront;
}


function sfsi_is_icons_showing_on_front(){

	$isIconsDisplayingOnFront = false;

	$options8 = unserialize(get_option("sfsi_premium_section8_options"));
	$options7 = unserialize(get_option("sfsi_premium_section7_options"));


	if((false != sfsi_is_widget_showing_on_front()) && (false != isset($options8['sfsi_plus_show_via_widget'])) && ("yes"== $options8['sfsi_plus_show_via_widget']) ){
		$isIconsDisplayingOnFront = true;
	} 

	if((false != sfsi_is_floating_icons_showing_on_front()) && (false != isset($options8['sfsi_plus_float_on_page'])) && ("yes"== $options8['sfsi_plus_float_on_page']) ){
		$isIconsDisplayingOnFront = true;
	} 

	if((false != sfsi_is_shortcode_icons_showing_on_front()) && (false != isset($options8['sfsi_plus_place_item_manually'])) && ("yes"== $options8['sfsi_plus_place_item_manually']) ){
		$isIconsDisplayingOnFront = true;
	} 

	if((false != sfsi_is_beforeafterposts_icons_showing_on_front()) && (false != isset($options8['sfsi_plus_show_item_onposts'])) && ("yes"== $options8['sfsi_plus_show_item_onposts']) ){
		$isIconsDisplayingOnFront = true;
	} 
			
	// Check if rectangle icons are displayed using shortcode on any location from Question 3
	 if(false != sfsi_is_rectangle_icons_shortcode_showing_on_front()){
		$isIconsDisplayingOnFront = true;
	 }	

	// Check if popup is displayed from Question 7
	if(false != isset($options7['sfsi_plus_Show_popupOn']) && "none" != $options7['sfsi_plus_Show_popupOn']){
		$isIconsDisplayingOnFront = true;
	}

	return $isIconsDisplayingOnFront;	
}

/*  instalation of javascript and css  */
function sfsiplus_plugin_back_enqueue_script()
{		
	if(isset($_GET['page']) && 'sfsi-plus-options' == $_GET['page'])
	{
		wp_enqueue_style('thickbox');
		wp_enqueue_style("SFSIPLUSmainCss", SFSI_PLUS_PLUGURL . 'css/sfsi-style.css' );
		
		wp_enqueue_style("SFSIPLUSJqueryCSS", SFSI_PLUS_PLUGURL . 'css/jquery-ui-1.10.4/jquery-ui-min.css' );
		wp_enqueue_style("wp-color-picker");

		wp_register_style( 'bootstrap.min', SFSI_PLUS_PLUGURL . 'css/bootstrap.min.css' );
		wp_enqueue_style('bootstrap.min');

		/* include CSS for backend */
		wp_enqueue_style("SFSIPLUSmainadminCss", SFSI_PLUS_PLUGURL . 'css/sfsi-admin-style.css' );


		wp_enqueue_script('jquery');
		wp_enqueue_script("jquery-migrate");
		
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		
		wp_enqueue_script("jquery-ui-accordion");	
		wp_enqueue_script("wp-color-picker");
		wp_enqueue_script("jquery-effects-core");
		wp_enqueue_script("jquery-ui-sortable");
			
		wp_enqueue_media();

		wp_register_script('SFSIPLUSJqueryFRM', SFSI_PLUS_PLUGURL . 'js/jquery.form-min.js', '', '', true);
		wp_enqueue_script("SFSIPLUSJqueryFRM");
		
		wp_register_script('SFSIPLUSCustomFormJs', SFSI_PLUS_PLUGURL . 'js/custom-form-min.js', '', '', true);
		wp_enqueue_script("SFSIPLUSCustomFormJs");
		
		wp_register_script('SFSIPLUSCustomJs', SFSI_PLUS_PLUGURL . 'js/custom-admin.js', '', '', true);

		//Bootstrap Scripts
		wp_register_script('bootstrap.min', SFSI_PLUS_PLUGURL.'js/bootstrap.min.js');
		wp_enqueue_script('bootstrap.min');

		
		// Localize the script with new data
		$translation_array = array(
			'Re_ad'                 => __('Read more',SFSI_PLUS_DOMAIN),
			'Sa_ve'                 => __('Save',SFSI_PLUS_DOMAIN),
			'Sav_ing'               => __('Saving',SFSI_PLUS_DOMAIN),
			'Sa_ved'                => __('Saved',SFSI_PLUS_DOMAIN)
		);
		$translation_array1 = array(
			'Coll_apse'             => __('Collapse',SFSI_PLUS_DOMAIN),
			'Save_All_Settings'     => __('Save All Settings',SFSI_PLUS_DOMAIN),
			'Upload_a'    			=> __('Upload a custom icon if you have other accounts/websites you want to link to.',SFSI_PLUS_DOMAIN),
			'It_depends'     		=> __('It depends',SFSI_PLUS_DOMAIN)
		);
		
		wp_localize_script( 'SFSIPLUSCustomJs', 'object_name', $translation_array );
		wp_localize_script( 'SFSIPLUSCustomJs', 'object_name1', $translation_array1 );
		wp_enqueue_script("SFSIPLUSCustomJs");
		
		wp_register_script('SFSIPLUSCustomValidateJs', SFSI_PLUS_PLUGURL . 'js/customValidate-min.js', '', '', true);
		wp_enqueue_script("SFSIPLUSCustomValidateJs");
		/* end cusotm js */
		
		/* initilaize the ajax url in javascript */
		wp_localize_script( 'SFSIPLUSCustomJs', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		wp_localize_script( 'SFSIPLUSCustomValidateJs', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ),'plugin_url'=> SFSI_PLUS_PLUGURL) );
	}
}
add_action( 'admin_enqueue_scripts', 'sfsiplus_plugin_back_enqueue_script' );

function sfsiplus_plugin_front_enqueue_script()
{
	if(sfsi_is_icons_showing_on_front() && false!= License_Manager::validate_license()){
		
		wp_enqueue_style("SFSIPLUSmainCss", SFSI_PLUS_PLUGURL . 'css/sfsi-style.css' );
		
		$option5 =  unserialize(get_option('sfsi_premium_section5_options',false));
		
		if($option5['sfsi_plus_disable_floaticons'] == 'yes')
		{
			wp_enqueue_style("disable_sfsiplus", SFSI_PLUS_PLUGURL . 'css/disable_sfsi.css' );
		}
		
		$sfsi_plus_loadjquery  = isset($option5['sfsi_plus_loadjquery']) && !empty($option5['sfsi_plus_loadjquery']) ? sanitize_text_field($option5['sfsi_plus_loadjquery']): "yes";

		if("yes" == $sfsi_plus_loadjquery){
			wp_enqueue_script('jquery');
	 		wp_enqueue_script("jquery-migrate");			
		}
		
		wp_enqueue_script('jquery-ui-core');	
		
		wp_register_script('SFSIPLUSjqueryModernizr', SFSI_PLUS_PLUGURL . 'js/shuffle/modernizr.custom.min.js', '','',true);
		wp_enqueue_script("SFSIPLUSjqueryModernizr");
		
		wp_register_script('SFSIPLUSjqueryShuffle', SFSI_PLUS_PLUGURL . 'js/shuffle/jquery.shuffle.min.js', '','',true);
		wp_enqueue_script("SFSIPLUSjqueryShuffle");
		
		wp_register_script('SFSIPLUSjqueryrandom-shuffle', SFSI_PLUS_PLUGURL . 'js/shuffle/random-shuffle-min.js', '','',true);
		wp_enqueue_script("SFSIPLUSjqueryrandom-shuffle");
		
		wp_register_script('SFSIPLUSCustomJs', SFSI_PLUS_PLUGURL . 'js/custom.js', '', '', true);
		wp_enqueue_script("SFSIPLUSCustomJs");
		/* end cusotm js */

		/* initilaize the ajax url in javascript */
		wp_localize_script( 'SFSIPLUSCustomJs', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ),'plugin_url'=> SFSI_PLUS_PLUGURL) );
	}
}
add_action( 'wp_enqueue_scripts', 'sfsiplus_plugin_front_enqueue_script' );

/* add all external javascript to wp_footer */        
function sfsi_plus_footer_script()
{
	$sfsi_section1=  unserialize(get_option('sfsi_premium_section1_options',false));
	$sfsi_section6=  unserialize(get_option('sfsi_premium_section6_options',false));
	$sfsi_section8=  unserialize(get_option('sfsi_premium_section8_options',false));
	$sfsi_premium_section5_options = unserialize(get_option('sfsi_premium_section5_options',false));
	
	if(
		isset($sfsi_premium_section5_options['sfsi_plus_icons_language']) &&
		!empty($sfsi_premium_section5_options['sfsi_plus_icons_language'])
	)
	{
		$icons_language = $sfsi_premium_section5_options['sfsi_plus_icons_language'];
	}
	else
	{
		$icons_language = "en_US";
	}

	if(!isset($sfsi_section6['sfsi_plus_show_item_onposts']))
	{
		$sfsi_section6['sfsi_plus_show_item_onposts'] = 'no';
	}
	if(!isset($sfsi_section8['sfsi_plus_show_item_onposts']))
	{
		$sfsi_section8['sfsi_plus_show_item_onposts'] = 'no';
	}		
	if(!isset($sfsi_section8['sfsi_plus_rectsub']))
	{
		$sfsi_section8['sfsi_plus_rectsub'] = 'no';
	}
	if(!isset($sfsi_section8['sfsi_plus_rectfb']))
	{
		$sfsi_section8['sfsi_plus_rectfb'] = 'yes';
	}
	if(!isset($sfsi_section8['sfsi_plus_rectgp']))
	{
		$sfsi_section8['sfsi_plus_rectgp'] = 'yes';
	}
	if(!isset($sfsi_section8['sfsi_plus_rectshr']))
	{
		$sfsi_section8['sfsi_plus_rectshr'] = 'yes';
	}
	if(!isset($sfsi_section8['sfsi_plus_recttwtr']))
	{
		$sfsi_section8['sfsi_plus_recttwtr'] = 'no';
	}
	if(!isset($sfsi_section8['sfsi_plus_rectpinit']))
	{
		$sfsi_section8['sfsi_plus_rectpinit'] = 'no';
	}
	if(!isset($sfsi_section8['sfsi_plus_rectfbshare']))
	{
		$sfsi_section8['sfsi_plus_rectfbshare'] = 'no';
	}
	
	if(
		$sfsi_section1['sfsi_plus_facebook_display']=="yes" || 
		($sfsi_section1['sfsi_plus_icons_onmobile']=="yes" && $sfsi_section1['sfsi_plus_facebook_mobiledisplay']=="yes") ||
		($sfsi_section8['sfsi_plus_rectfb'] == "yes" && $sfsi_section8['sfsi_plus_show_item_onposts'] == "yes" && $sfsi_section8['sfsi_plus_display_button_type'] == "standard_buttons") ||
		($sfsi_section8['sfsi_plus_rectfbshare'] == "yes" && $sfsi_section8['sfsi_plus_show_item_onposts'] == "yes" && $sfsi_section8['sfsi_plus_display_button_type'] == "standard_buttons") 
	)
	{?>
		<!--facebook like and share js -->                   
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/<?php echo $icons_language;?>/sdk.js#xfbml=1&version=v3.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
	<?php
	}
	
	if(
		$sfsi_section1['sfsi_plus_google_display']	== "yes" || 
		($sfsi_section1['sfsi_plus_icons_onmobile']=="yes" && $sfsi_section1['sfsi_plus_google_mobiledisplay']=="yes") ||
		$sfsi_section1['sfsi_plus_youtube_display']	== "yes" ||
		($sfsi_section1['sfsi_plus_icons_onmobile']=="yes" && $sfsi_section1['sfsi_plus_youtube_mobiledisplay']=="yes") ||
		($sfsi_section8['sfsi_plus_rectgp'] == "yes" && $sfsi_section8['sfsi_plus_show_item_onposts'] == "yes" && $sfsi_section8['sfsi_plus_display_button_type'] == "standard_buttons") 
	) { ?>
		<!--google share and  like and e js -->
		<script type="text/javascript">
			window.___gcfg = {
			  lang: '<?php echo $icons_language;?>'
			};
			(function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			})();
		</script>
	
        <!-- google share -->
        <script type="text/javascript">
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/platform.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>
        <?php
	}
	if($sfsi_section1['sfsi_plus_linkedin_display']=="yes" || ($sfsi_section1['sfsi_plus_icons_onmobile']=="yes" && $sfsi_section1['sfsi_plus_linkedin_mobiledisplay']=="yes") || ($sfsi_section8['sfsi_plus_rectlinkedin']=="yes" && $sfsi_section8['sfsi_plus_show_item_onposts'] == "yes" && $sfsi_section8['sfsi_plus_display_button_type'] == "standard_buttons"))
	{ 
		if($icons_language == 'ar_AR')
		{
			$icons_language = 'ar_AE';
		}
		?>	
        <!-- linkedIn share and  follow js -->
        <script src="//platform.linkedin.com/in.js" type="text/javascript">lang: <?php echo $icons_language;?></script>
	<?php
	}
	
	if($sfsi_section1['sfsi_plus_share_display']=="yes" || ($sfsi_section1['sfsi_plus_icons_onmobile']=="yes" && $sfsi_section1['sfsi_plus_share_mobiledisplay']=="yes") || ($sfsi_section6['sfsi_plus_show_item_onposts']=="yes" && $sfsi_section8['sfsi_plus_rectshr'] == "yes" && $sfsi_section8['sfsi_plus_display_button_type'] == "standard_buttons")) { ?>		
		<!-- Addthis js -->
        <script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-558ac14e7f79bff7"></script>
	<?php
	}
	if($sfsi_section1['sfsi_plus_pinterest_display']=="yes" || ($sfsi_section1['sfsi_plus_icons_onmobile']=="yes" && $sfsi_section1['sfsi_plus_pinterest_mobiledisplay']=="yes") || ($sfsi_section8['sfsi_plus_rectpinit'] == "yes" && $sfsi_section8['sfsi_plus_show_item_onposts'] == "yes" && $sfsi_section8['sfsi_plus_display_button_type'] == "standard_buttons" )) {?>
		<!--pinit js -->
		
		<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
	<?php
	}
	if($sfsi_section1['sfsi_plus_twitter_display']=="yes" || ($sfsi_section1['sfsi_plus_icons_onmobile']=="yes" && $sfsi_section1['sfsi_plus_twitter_mobiledisplay']=="yes") || ($sfsi_section8['sfsi_plus_recttwtr'] == "yes" && $sfsi_section8['sfsi_plus_show_item_onposts'] == "yes" && $sfsi_section8['sfsi_plus_display_button_type'] == "standard_buttons" )) {?>
		<!-- twitter JS End -->
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>	
	<?php
	}
	
	/* activate footer credit link */
	if(get_option('sfsi_premium_footer_sec')=="yes")
	{
	    if(!is_admin())
	    {
            $footer_link='<div class="sfsiplus_footerLnk" style="margin: 0 auto;z-index:1000; absolute; text-align: center;">Social media & sharing icons powered by  <a href="https://www.ultimatelysocial.com/" target="_new">UltimatelySocial</a> ';
	    	$footer_link.="</div>";
	    	echo $footer_link;
	    }
	}    
        
}

/* update footer for frontend and admin both */ 
if(!is_admin())
{
	if(false != sfsi_is_icons_showing_on_front()){		 
		global $post;
		add_action('wp_footer','sfsi_plus_footer_script' );	
		add_action('wp_footer','sfsi_plus_check_PopUp');
		add_action('wp_footer','sfsi_plus_frontFloter');		
	}	 	     
}
		 				    
if(is_admin() && isset($_GET['page']) && 'sfsi-plus-options' == $_GET['page'])
{
	//add_action('in_admin_footer', 'sfsi_plus_footer_script');	
}

?>