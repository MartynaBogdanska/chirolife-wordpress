<?php
function sfsi_plus_get_icon_image($icon_name,$iconImgName=false){

	$icon = false;

	$option3 = unserialize(get_option('sfsi_premium_section3_options',false));

	if(isset($option3['sfsi_plus_actvite_theme']) && !empty($option3['sfsi_plus_actvite_theme'])){

		$active_theme = $option3['sfsi_plus_actvite_theme'];

		$icons_baseUrl  = SFSI_PLUS_PLUGURL."images/icons_theme/".$active_theme."/";
		$visit_iconsUrl = SFSI_PLUS_PLUGURL."images/visit_icons/";  

		if(isset($icon_name) && !empty($icon_name)):

			if($active_theme == 'custom_support')
			{
				$custom_icon_name = "pinterest" == strtolower($icon_name) ? "pintrest": $icon_name;
				
				$key = "plus_".$custom_icon_name."_skin"; 

				$skin = get_option($key,false);

				$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";

				if($skin)
				{
					$skin_url = parse_url($skin);
					if($skin_url['scheme']==='http' && $scheme==='https'){
						$icon = str_replace('http','https',$skin);
					}else if($skin_url['scheme']==='https' && $scheme==='http'){
						$icon = str_replace('https','http',$skin);
					}else{
						$icon = $skin;
					}
				}
				else
				{
					$active_theme = 'default';
					$icons_baseUrl = SFSI_PLUS_PLUGURL."images/icons_theme/default/";

					$iconImgName = false != $iconImgName ? $iconImgName: $icon_name; 
					$icon = $icons_baseUrl.$active_theme."_".$iconImgName.".png";
				}
			}
			else
			{
				$iconImgName = false != $iconImgName ? $iconImgName: $icon_name;
				$icon = $icons_baseUrl.$active_theme."_".$iconImgName.".png";
			}

		endif;		

	}

	return $icon;
}

function sfsi_plus_get_icon_mouseover_text($icon_name){

	if(isset($icon_name) && !empty($icon_name)){

		$icon_name = strtolower($icon_name);
		$alt_text = strtoupper($icon_name);

		$key = 'sfsi_plus_'.$icon_name.'_MouseOverText';

		$option5 = unserialize(get_option('sfsi_premium_section5_options',false));		

		if(isset($option5[$key]) && !empty($option5[$key]))
		{
			$alt_text = $option5[$key];
		}
	}

	return $alt_text;	
}

function sfsi_plus_get_no_follow_attr($option5=false){

	$str_no_follow = '';

 	$option5  =  (false != $option5 && is_array($option5)) ? $option5 : unserialize(get_option('sfsi_premium_section5_options',false));

 	if(isset($option5['sfsi_plus_nofollow_links']) && !empty($option5['sfsi_plus_nofollow_links'])
 		&& "yes" == strtolower($option5['sfsi_plus_nofollow_links'])){

 		$str_no_follow = "rel='nofollow'";
 	}

 	return $str_no_follow;
}

function sfsi_plus_get_style_margin_for_floating_icons($mobileFloat=false,$sfsi_section8=false){

	$sfsi_section8 	= false != $sfsi_section8 ? $sfsi_section8 : unserialize(get_option('sfsi_premium_section8_options',false));

	$keyToAdd = "";

	if(false != $mobileFloat){
		$keyToAdd = "mobile";
	}

    $iconFloatPosition = $sfsi_section8['sfsi_plus_float_page_'.$keyToAdd.'position']; 		

	$styleMargin = '';

	switch ($iconFloatPosition) {

		case "top-left": case "center-top":
		
			$styleMargin = "margin-top:".$sfsi_section8['sfsi_plus_icons_floatMargin_'.$keyToAdd.'top']."px;margin-left:".$sfsi_section8['sfsi_plus_icons_floatMargin_'.$keyToAdd.'left']."px;";
		break;

		case "top-right":

			$styleMargin = "margin-top:".$sfsi_section8['sfsi_plus_icons_floatMargin_'.$keyToAdd.'top']."px;margin-right:".$sfsi_section8['sfsi_plus_icons_floatMargin_'.$keyToAdd.'right']."px;";
		break;

		case "center-left":	

			$styleMargin = "margin-left:".$sfsi_section8['sfsi_plus_icons_floatMargin_'.$keyToAdd.'left']."px;";
		
		break;

		case "center-right":

			$styleMargin = "margin-right:".$sfsi_section8['sfsi_plus_icons_floatMargin_'.$keyToAdd.'right']."px;";				
		
		break;

		case "bottom-left": case "center-bottom":

			$styleMargin = "margin-bottom:".$sfsi_section8['sfsi_plus_icons_floatMargin_'.$keyToAdd.'bottom']."px;margin-left:".$sfsi_section8['sfsi_plus_icons_floatMargin_'.$keyToAdd.'left']."px;";

			break;

		case "bottom-right":

			$styleMargin = "margin-bottom:".$sfsi_section8['sfsi_plus_icons_floatMargin_'.$keyToAdd.'bottom']."px;margin-right:".$sfsi_section8['sfsi_plus_icons_floatMargin_'.$keyToAdd.'right']."px;";

			break;		
	}

	return $styleMargin;

}

function sfsi_plus_get_float_position_alignment($iconPosition){

	$objPosition = new StdClass();

	$position = "";
	$top 	  = "";

	switch($iconPosition)
	{
		case "top-left" :
			if(is_admin_bar_showing())
			{
				$position .= "left:30px;top:35px;"; $top="35";
			}
			else
			{
				$position .= "left:10px;top:10px;"; $top="10";
			}                                                
		break;
		case "top-right" :
			if(is_admin_bar_showing())
			{
				$position .= "right:30px;top:35px;"; $top="35";
			}else
			{
				$position .= "right:10px;top:10px;"; $top="10";
			}                       
		break;
		case "center-right" :
			$position .= "right:30px;top:50%"; $top="center";
		break;
		case "center-left" :
			$position .= "left:30px;top:50%"; $top="center";  
		break;
		case "center-top" :
			if(is_admin_bar_showing())
			{
				$position .= "left:50%;top:35px;"; $top="35";
			}
			else
			{
				$position .= "left:50%;top:10px;"; $top="10";
			} 
		break;
		case "center-bottom" :
			$position .= "left:50%;bottom:0px"; $top="bottom";  
		break;				
		case "bottom-right" :
			$position .= "right:30px;bottom:0px"; $top="bottom"; 
		break;
		case "bottom-left" :
			$position .= "left:30px;bottom:0px"; $top="bottom"; 
		break;
	}

	$objPosition->position = $position;
	$objPosition->top 	   = $top;

	return $objPosition;
}

function sfsi_plus_get_float_position_script($iconPosition,$top,$isMobileFloat=false,$sfsi_section8=false){

	$sfsi_section8 	= false != $sfsi_section8 ? $sfsi_section8 : unserialize(get_option('sfsi_premium_section8_options',false));

	$jquery = "";

	$keyMobile = "";

	if(false != $isMobileFloat){
	
		$keyMobile = "mobile";
	}

 	$condFloat = 'float' == $sfsi_section8['sfsi_plus_make_'.$keyMobile.'icon'];

	if('center-right' == $iconPosition || 'center-left' == $iconPosition)
	{
		$jquery.="jQuery( document ).ready(function( $ )
				  {
					var topalign = ( jQuery(window).height() - jQuery('#sfsi_plus_floater').height() ) / 2;
					jQuery('#sfsi_plus_floater').css('top',topalign);";
					
					if($condFloat)
					{
						$jquery.="sfsi_plus_float_widget('".$top."');";
					}

		$jquery.= "sfsi_plus_align_icons_center_orientation('".$iconPosition."');";

		$jquery.="});";
	}

	else if('center-top' == $iconPosition || 'center-bottom' == $iconPosition)
	{
		$jquery.="jQuery( document ).ready(function( $ )
				  {
					var leftalign = ( jQuery(window).width() - jQuery('#sfsi_plus_floater').width() ) / 2;
					jQuery('#sfsi_plus_floater').css('left',leftalign);";

					if($condFloat)
					{
						$jquery.="sfsi_plus_float_widget('".$top."');";
					}
		
		$jquery.= "sfsi_plus_align_icons_center_orientation('".$iconPosition."');";

		$jquery.="});";
	}

	else if($condFloat)
	{
		$jquery.="jQuery( document ).ready(function( $ ) { sfsi_plus_float_widget('".$top."')});";
	}

	return $jquery;

}
/* check the icons visiblity for desktop */
function sfsi_plus_check_visiblity($isFloter=0)
{
  	global $wpdb;
    /* Access the saved settings in database  */
    $sfsi_section1  = unserialize(get_option('sfsi_premium_section1_options',false));
    $sfsi_section3 	= unserialize(get_option('sfsi_premium_section3_options',false));
    $sfsi_section5 	= unserialize(get_option('sfsi_premium_section5_options',false));
    
	//options that are added on the third question
	$sfsi_section8 	= unserialize(get_option('sfsi_premium_section8_options',false));
	   
    /* calculate the width and icons display alignments */
    $icons_space 	= $sfsi_section5['sfsi_plus_icons_spacing'];
    $icons_size 	= $sfsi_section5['sfsi_plus_icons_size'];
    $icons_per_row 	= ($sfsi_section5['sfsi_plus_icons_perRow'])? $sfsi_section5['sfsi_plus_icons_perRow'] : '';
    
    $icons_alignment = $sfsi_section5['sfsi_plus_icons_Alignment'];
	$position 	= 'position:absolute;';
    $position1 	= 'position:absolute;';
    $jquery		= '<script>';
	
	$jquery 	.= 'jQuery(".sfsi_plus_widget").each(function( index ) {
		if(jQuery(this).attr("data-position") == "widget")
		{
			var wdgt_hght = jQuery(this).children(".sfsiplus_norm_row.sfsi_plus_wDiv").height();
			var title_hght = jQuery(this).parent(".widget.sfsi_plus").children(".widget-title").height();
			var totl_hght = parseInt( title_hght ) + parseInt( wdgt_hght );
			jQuery(this).parent(".widget.sfsi_plus").css("min-height", totl_hght+"px");
		}
	});';
    
	/* check if icons shuffling is activated in admin or not */
    if($sfsi_section5['sfsi_plus_icons_stick']=="yes")
	{
	    if(is_admin_bar_showing())
		{
		    $Ictop="30px";
	    }
	    else
		{
			$Ictop="0";   
	    }
		$jquery.='var s = jQuery(".sfsi_plus_widget");
			var pos = s.position();            
			jQuery(window).scroll(function(){      
			sfsi_plus_stick_widget("'.$Ictop.'");
		}); ';
    }
	
    /* check if icons floating  is activated in admin */
	/*settings under third question*/
	
	$pagePosition = $sfsi_section8['sfsi_plus_float_page_position'];
    
    if(isset($sfsi_section8['sfsi_plus_float_on_page']) && "yes" == $sfsi_section8['sfsi_plus_float_on_page'])
	{
		$top="15";
		
		$position = "position:absolute;";

		if($sfsi_section8['sfsi_plus_make_icon'] == 'stay_same_place')
		{
			$position = "position:fixed;";
		}
		
		$objPosition = sfsi_plus_get_float_position_alignment($pagePosition); 
		$position 	.= $objPosition->position;
		$top 		 = $objPosition->top;
		
		$jquery.= sfsi_plus_get_float_position_script($pagePosition,$top,false,$sfsi_section8);

    }
	  
    $extra=0;

    /* built the main widget div */
    $icons="";

	$iconsCount= 0;    

    if(sfsi_premium_is_any_standard_icon_selected()){

		$newDesktopIconOrder = sfsi_premium_desktop_icons_order($sfsi_section5,$sfsi_section1);
		$arrData       		 = sfsi_premium_get_icons_html($newDesktopIconOrder,$sfsi_section1);

		$icons.= $arrData['html'];
		$iconsCount = $arrData['count'];
   	}

	$sfsi_section8["sfsi_plus_icons_total_displaying_desktop_icons"] = $iconsCount;
	update_option("sfsi_premium_section8_options",serialize($sfsi_section8));   

	if(isset($sfsi_section8["sfsi_plus_icons_total_displaying_desktop_icons"]) && !empty($sfsi_section8["sfsi_plus_icons_total_displaying_desktop_icons"]))
	{
		$totalDisplayingIcons = (int) $sfsi_section8["sfsi_plus_icons_total_displaying_desktop_icons"];

		if($icons_per_row > $totalDisplayingIcons){
			$icons_per_row = $totalDisplayingIcons;
		}
	}

    if("yes" == $sfsi_section3['sfsi_plus_shuffle_icons'] && $icons_per_row >1)
    {
    	$shuffleFirstLoad = $sfsi_section3['sfsi_plus_shuffle_Firstload'];
    	$shuffleInterval  = $sfsi_section3['sfsi_plus_shuffle_interval'];

	    $shuffle_time 	  = (isset($sfsi_section3['sfsi_plus_shuffle_intervalTime'])) ? $sfsi_section3['sfsi_plus_shuffle_intervalTime'] : 3;
		$shuffle_time 	  = (int) $shuffle_time * 1000;

       if("yes" == $shuffleFirstLoad && "yes" == $shuffleInterval)
	   {
			$jquery.="jQuery( document ).ready(function( $ ) { jQuery('.sfsi_plus_wDiv').each(function(){ new window.Manipulator( jQuery(this)); });  setTimeout(function(){  jQuery('#sfsi_plus_wDiv').each(function(){ jQuery(this).click(); })},2000);  setInterval(function(){  jQuery('#sfsi_plus_wDiv').each(function(){ jQuery(this).click(); })},".$shuffle_time."); });";
       }

	   else if("no" == $shuffleFirstLoad && "yes" == $shuffleInterval)
       {   
		   $jquery.="jQuery( document ).ready(function( $ ) {  jQuery('.sfsi_plus_wDiv').each(function(){ new window.Manipulator( jQuery(this)); });  setInterval(function(){  jQuery('#sfsi_plus_wDiv').each(function(){ jQuery(this).click(); })},".$shuffle_time."); });";
        }
        else
        {
            $jquery.="jQuery( document ).ready(function( $ ) {  jQuery('.sfsi_plus_wDiv').each(function(){ new window.Manipulator( jQuery(this)); });  setTimeout(function(){  jQuery('#sfsi_plus_wDiv').each(function(){ jQuery(this).click(); })},2000); });";
        }    
    }
    $jquery.="</script>";


   	/* calculate the total width of widget according to icons  */
   	if(!empty($icons_per_row))
   	{
		$width 		= ((int)$icons_space + (int)$icons_size)*(int)$icons_per_row;
		$main_width = $width = $width+$extra;
		$main_width = $main_width."px";
   	}
   	else
   	{
		$main_width="35%";
   	}

    $margin=$width+11;

	
    /* if floating of icons is active create a floater div */
    $icons_float = '';
	$styleMargin = '';

	if(1 == $isFloter)
    {
    	if("yes" == $sfsi_section8['sfsi_plus_float_on_page']){
			
			$styleMargin = sfsi_plus_get_style_margin_for_floating_icons(false,$sfsi_section8);
		
			$icons_float = '<style type="text/css">#sfsi_plus_floater { '.$styleMargin.' }</style>';
			$icons_float .= '<div class="sfsiplus_norm_row sfsi_plus_wDiv" id="sfsi_plus_floater"  style="z-index: 9999;width:'.$main_width.';text-align:'.$icons_alignment.';'.$position.'">';
		  	$icons_float .= $icons;
		  	$icons_float .= "<input type='hidden' id='sfsi_plus_floater_sec' value='".$sfsi_section8['sfsi_plus_float_page_position']."' />";
		  	$icons_float .= "</div>".$jquery;
	    }
    
    }
    
    else{
    	
    	$icons_float='<div class="sfsiplus_norm_row sfsi_plus_wDiv"  style="width:'.$main_width.';text-align:'.$icons_alignment.';'.$position1.'">';
    	$icons_float .= $icons; 	
    	$icons_float .='</div >';

    	$icons_float.='<div id="sfsi_holder" class="sfsi_plus_holders" style="position: relative; float: left;width:100%;z-index:-1;"></div >'.$jquery;		
    }
    
    $icons_data = $icons_float;

    return $icons_data;
}

/* check the icons visiblity for mobile */
function sfsi_plus_check_mobile_visiblity($isFloter=0)
{
  	global $wpdb;
    /* Access the saved settings in database  */
    $sfsi_premium_section1_options =  unserialize(get_option('sfsi_premium_section1_options',false));
    $sfsi_section3 	= unserialize(get_option('sfsi_premium_section3_options',false));
    $sfsi_section5 	= unserialize(get_option('sfsi_premium_section5_options',false));
    
	//options that are added on the third question
	$sfsi_section8 	= unserialize(get_option('sfsi_premium_section8_options',false));
	   
    /* calculate the width and icons display alignments */
    if($sfsi_section5['sfsi_plus_mobile_icon_setting'] == 'yes')
	{
	    $icons_space 	= 	(!empty($sfsi_section5['sfsi_plus_icons_mobilespacing']))
								? $sfsi_section5['sfsi_plus_icons_mobilespacing']
								: 5;
	    $icons_size 	= 	(!empty($sfsi_section5['sfsi_plus_icons_mobilesize']))
								? $sfsi_section5['sfsi_plus_icons_mobilesize']
								: 30;
	}
	else
	{
		$icons_space 	= 	(!empty($sfsi_section5['sfsi_plus_icons_spacing']))
								? $sfsi_section5['sfsi_plus_icons_spacing']
								: 5;
	    $icons_size 	= 	(!empty($sfsi_section5['sfsi_plus_icons_size']))
								? $sfsi_section5['sfsi_plus_icons_size']
								: 30;	
	}
	
	if($sfsi_section5['sfsi_plus_mobile_icon_alignment_setting'] == 'yes')
	{
		$icons_per_row 	= 	($sfsi_section5['sfsi_plus_mobile_icons_perRow'])? $sfsi_section5['sfsi_plus_mobile_icons_perRow']: '';
	}
	else
	{
		$icons_per_row 	= 	($sfsi_section5['sfsi_plus_icons_perRow']) ? $sfsi_section5['sfsi_plus_icons_perRow']: '';
	}
	
    $icons_alignment = $sfsi_section5['sfsi_plus_icons_Alignment'];
	$position 	= 'position:absolute;';
    $position1 	= 'position:absolute;';
    $jquery		= '<script>';
	
	$jquery 	.= 'jQuery(".sfsi_plus_widget").each(function( index ) {
		if(jQuery(this).attr("data-position") == "widget")
		{
			var wdgt_hght = jQuery(this).children(".sfsiplus_norm_row.sfsi_plus_wDiv").height();
			var title_hght = jQuery(this).parent(".widget.sfsi_plus").children(".widget-title").height();
			var totl_hght = parseInt( title_hght ) + parseInt( wdgt_hght );
			jQuery(this).parent(".widget.sfsi_plus").css("min-height", totl_hght+"px");
		}
	});';
    
	/* check if icons shuffling is activated in admin or not */
    if($sfsi_section5['sfsi_plus_icons_stick']=="yes")
	{
	    if(is_admin_bar_showing())
		{
		    $Ictop="30px";
	    }
	    else
		{
			$Ictop="0";   
	    }
		$jquery.='var s = jQuery(".sfsi_plus_widget");
			var pos = s.position();            
			jQuery(window).scroll(function(){      
			sfsi_plus_stick_widget("'.$Ictop.'");
		}); ';
    }
	
    /* check if icons floating  is activated in admin */
	/*settings under third question*/
    if($sfsi_section8['sfsi_plus_float_on_page']=="yes")
	{
		$top="15";
		
		if($sfsi_section8['sfsi_plus_mobile_float'] == 'yes')
		{
			$position = "position:absolute;";

			if('stay_same_place' == $sfsi_section8['sfsi_plus_make_mobileicon'])
			{
				$position = "position:fixed;";
			}

			$iconMPosition = $sfsi_section8['sfsi_plus_float_page_mobileposition'];
			
			$objPosition   = sfsi_plus_get_float_position_alignment($iconMPosition); 
			$position 	  .= $objPosition->position;
			$top 		   = $objPosition->top;

			$jquery.= sfsi_plus_get_float_position_script($iconMPosition,$top,true,$sfsi_section8);
			
		}
		else
		{
			$position = "position:absolute;";

			if('stay_same_place' == $sfsi_section8['sfsi_plus_make_icon'])
			{
				$position = "position:fixed;";
			}
			
			$iconPosition = $sfsi_section8['sfsi_plus_float_page_position'];

			$objPosition = sfsi_plus_get_float_position_alignment($iconPosition); 
			$position 	.= $objPosition->position;
			$top 		 = $objPosition->top;

			$jquery.= sfsi_plus_get_float_position_script($iconPosition,$top,false,$sfsi_section8);
			
		}
	}
	  
    $extra=0;

    if("yes" == $sfsi_section3['sfsi_plus_shuffle_icons'])
    {
       if($sfsi_section3['sfsi_plus_shuffle_Firstload']=="yes" && $sfsi_section3['sfsi_plus_shuffle_interval']=="yes")
	   {
	     	$shuffle_time=(isset($sfsi_section3['sfsi_plus_shuffle_intervalTime'])) ? $sfsi_section3['sfsi_plus_shuffle_intervalTime'] : 3;
			$shuffle_time=$shuffle_time*1000;
			$jquery.="jQuery( document ).ready(function( $ ) {  jQuery('.sfsi_plus_wDiv').each(function(){ new window.Manipulator( jQuery(this)); });  setTimeout(function(){  jQuery('#sfsi_plus_wDiv').each(function(){ jQuery(this).click(); })},2000);  setInterval(function(){  jQuery('#sfsi_plus_wDiv').each(function(){ jQuery(this).click(); })},".$shuffle_time."); });";
       }
	   else if($sfsi_section3['sfsi_plus_shuffle_Firstload']=="no" && $sfsi_section3['sfsi_plus_shuffle_interval']=="yes")
       {   
		   $shuffle_time=(isset($sfsi_section3['sfsi_plus_shuffle_intervalTime'])) ? $sfsi_section3['sfsi_plus_shuffle_intervalTime'] : 3;
		   $shuffle_time=$shuffle_time*1000; 
		   $jquery.="jQuery( document ).ready(function( $ ) {  jQuery('.sfsi_plus_wDiv').each(function(){ new window.Manipulator( jQuery(this)); });  setInterval(function(){  jQuery('#sfsi_plus_wDiv').each(function(){ jQuery(this).click(); })},".$shuffle_time."); });";
        }
        else
        {
            $jquery.="jQuery( document ).ready(function( $ ) {  jQuery('.sfsi_plus_wDiv').each(function(){ new window.Manipulator( jQuery(this)); });  setTimeout(function(){  jQuery('#sfsi_plus_wDiv').each(function(){ jQuery(this).click(); })},2000); });";
        }    
    }
    $jquery		.= "</script>";

	
	$icons = "";
    $iconsCount = 0;

    if(sfsi_premium_is_any_standard_icon_selected()){

		$arrOrderIcons = sfsi_premium_get_icons_order($sfsi_section5,$sfsi_premium_section1_options);
		$arrData       = sfsi_premium_get_icons_html($arrOrderIcons,$sfsi_premium_section1_options);

		$icons.= $arrData['html'];
		$iconsCount = $arrData['count'];

	}

	$final_total_icons = ($icons_per_row > $iconsCount) ? $iconsCount : $icons_per_row;
	$sfsi_section8["sfsi_plus_icons_total_displaying_mobile_icons"] = $final_total_icons;		
	update_option("sfsi_premium_section8_options",serialize($sfsi_section8));

	if(isset($sfsi_section8["sfsi_plus_icons_total_displaying_mobile_icons"]) && !empty($sfsi_section8["sfsi_plus_icons_total_displaying_mobile_icons"]))
	{
		$totalDisplayingIcons = (int) $sfsi_section8["sfsi_plus_icons_total_displaying_mobile_icons"];

		if($icons_per_row > $totalDisplayingIcons){
			$icons_per_row = $totalDisplayingIcons;
		}
	}

	/* calculate the total width of widget according to icons  */
   	if(!empty($icons_per_row))
   	{
		$width = ((int)$icons_space+(int)$icons_size)*(int)$icons_per_row;
		$main_width = $width = $width+$extra;
		$main_width = $main_width."px";
   	}
   	else
   	{
		$main_width="35%";
   	}

	/* built the main widget div */
    $margin		= $width+11;
	
    /* if floating of icons is active create a floater div */
    $icons_float='';

	if("yes" == $sfsi_section8['sfsi_plus_float_on_page'] && $isFloter ==1)
    {
		if($sfsi_section8['sfsi_plus_mobile_float'] == 'yes')
		{
    		$mPagePosition = $sfsi_section8['sfsi_plus_float_page_mobileposition']; 

			$styleMargin = '';

			$styleMargin = sfsi_plus_get_style_margin_for_floating_icons(true,$sfsi_section8);
			
			$icons_float = '<style type="text/css">#sfsi_plus_floater { '.(isset($styleMargin)?$styleMargin:'').' }</style>';

			$icons_float .= '<div class="sfsiplus_norm_row sfsi_plus_wDiv" id="sfsi_plus_floater"  style="z-index: 999999;width:'.$main_width.';text-align:'.$icons_alignment.';'.$position.'">';
			$icons_float .= $icons;
			$icons_float .= "<input type='hidden' id='sfsi_plus_floater_sec' value='".$sfsi_section8['sfsi_plus_float_page_mobileposition']."' />";
			$icons_float .= "</div>".$jquery;
		}
		else
		{

			$styleMargin = '';
			$styleMargin = sfsi_plus_get_style_margin_for_floating_icons(false);
				
			$icons_float = '<style type="text/css">#sfsi_plus_floater { '.(isset($styleMargin)?$styleMargin:'').' }</style>';
			$icons_float .= '<div class="sfsiplus_norm_row sfsi_plus_wDiv sfsi_plus_mobile_floater" id="sfsi_plus_floater"  style="z-index: 999999;width:'.$main_width.';text-align:'.$icons_alignment.';'.$position.'">';
			$icons_float .= $icons;
			$icons_float .= "<input type='hidden' id='sfsi_plus_floater_sec' value='".$sfsi_section8['sfsi_plus_float_page_position']."' />";
			$icons_float .= "</div>".$jquery;
		}
    }
    else{
    	
    	$icons_float='<div class="sfsiplus_norm_row sfsi_plus_wDiv"  style="width:'.$main_width.';text-align:'.$icons_alignment.';'.$position1.'">';
    	$icons_float .= $icons; 	
    	$icons_float .='</div >';

    	$icons_float.='<div id="sfsi_holder" class="sfsi_plus_holders" style="position: relative; float: left;width:100%;z-index:-1;"></div >'.$jquery;		
    }

    $icons_data = $icons_float;
    return $icons_data;
}

/* make all icons with saved settings in admin */
function sfsi_plus_prepairIcons($icon_name,$is_front=0, $onpost="no", $fromPost = NULL)
{	 
    global $wpdb; global $socialObj;global $post;
    
	$socialObj = new sfsi_plus_SocialHelper(); /* global object to access 3rd party icon's actions */	

    $mouse_hover_effect 			= ''; 
    $active_theme 					= 'official';
    $sfsi_plus_shuffle_Firstload 	= 'no';
    $sfsi_plus_display_counts 		= "no";
    
	$icon = $url = $alt_text = $new_window = $class = '';
    
    /* access  all saved settings in admin */
    $option1 = unserialize(get_option('sfsi_premium_section1_options',false));
    $option2 = unserialize(get_option('sfsi_premium_section2_options',false));
    $option3 = unserialize(get_option('sfsi_premium_section3_options',false));
    $option4 = unserialize(get_option('sfsi_premium_section4_options',false));
    $option5 = unserialize(get_option('sfsi_premium_section5_options',false));
    $option6 = unserialize(get_option('sfsi_premium_section6_options',false));
    $option7 = unserialize(get_option('sfsi_premium_section7_options',false));
	$option8 = unserialize(get_option('sfsi_premium_section8_options',false));

	$customIcons = array();

	if(isset($option1['sfsi_custom_files']) && !empty($option1['sfsi_custom_files']) && is_string($option1['sfsi_custom_files']) )
	{
		$customIcons = unserialize($option1['sfsi_custom_files']);
		$customIcons = is_array($customIcons) ? array_filter($customIcons) : $customIcons;
	}

	$minCountToDisplayCountBox = isset($option4['sfsi_plus_min_display_counts']) ? $option4['sfsi_plus_min_display_counts'] : 1;

	/* get active theme */
	$border_radius = '';
	$active_theme  = $option3['sfsi_plus_actvite_theme'];
    
    
    /* shuffle effect */   
    if($option3['sfsi_plus_shuffle_icons']=='yes')
	{
	    $sfsi_plus_shuffle_Firstload = $option3["sfsi_plus_shuffle_Firstload"];
        
        if($option3["sfsi_plus_shuffle_interval"]=="yes")
		{
            $sfsi_plus_shuffle_interval = $option3["sfsi_plus_shuffle_intervalTime"];
        }
    }
	
	/* define the main url for icon access */ 
	$icons_baseUrl  = SFSI_PLUS_PLUGURL."images/icons_theme/".$active_theme."/";
	$visit_iconsUrl = SFSI_PLUS_PLUGURL."images/visit_icons/";   

	$hoverSHow = 0;
   
   	/* check is icon is a custom icon or default icon */  
   	if(is_numeric($icon_name)) { 
   		$icon_n   = $icon_name; 
   		$icon_name= "custom" ; 
   	} 

    $counts 	 ='';
    $twit_tolCls = "";
    $twt_margin  = "";
    $icons_space = $option5['sfsi_plus_icons_spacing'];
    $padding_top = '';

    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
	//$current_url = $scheme.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	
	$post_id = $socialObj->sfsi_get_the_ID();

	if($fromPost == 'yes' && !empty($post_id))
	{
		$current_url = get_permalink($post_id);
	}
	else
	{
		$current_url = urldecode(sfsi_plus_current_url());
	}

	$url 		= "";
    $cmcls 		= '';
    $toolClass  = '';
    $icons_language = $option5['sfsi_plus_icons_language'];


	switch($icon_name)
    {
        case "rss" :
			$url = ($option2['sfsi_plus_rss_url'])? $option2['sfsi_plus_rss_url'] : 'javascript:';
			$toolClass = "rss_tool_bdr";
			$hoverdiv = '';
			$arsfsiplus_row_class = "bot_rss_arow";
			
			/* fecth no of counts if active in admin section */
			if(
			 	$option4['sfsi_plus_rss_countsDisplay']=="yes" &&
				$option4['sfsi_plus_display_counts']=="yes"
			)
			{
				$counts=$socialObj->format_num($option4['sfsi_plus_rss_manualCounts']);
			}
			
			
			$alt_text = sfsi_plus_get_icon_mouseover_text("rss");

			//Custom Skin Support {Monad}
			$icon = sfsi_plus_get_icon_image("rss");

        break;
        
		case "email" :
			$hoverdiv 	= '';

			if(isset($option2['sfsi_plus_email_icons_functions']) && $option2['sfsi_plus_email_icons_functions'] == 'sf')
			{
				$url = (isset($option2['sfsi_plus_email_url']))
					? $option2['sfsi_plus_email_url']
					: 'javascript:';	
			}
			elseif(isset($option2['sfsi_plus_email_icons_functions']) && $option2['sfsi_plus_email_icons_functions'] == 'contact')
			{
				$url = (isset($option2['sfsi_plus_email_icons_contact']) && !empty($option2['sfsi_plus_email_icons_contact']))
					? "mailto:".$option2['sfsi_plus_email_icons_contact']
					: 'javascript:';	
			}
			elseif(isset($option2['sfsi_plus_email_icons_functions']) && $option2['sfsi_plus_email_icons_functions'] == 'page')
			{
				$url = (isset($option2['sfsi_plus_email_icons_pageurl']) && !empty($option2['sfsi_plus_email_icons_pageurl']))
					? $option2['sfsi_plus_email_icons_pageurl']
					: 'javascript:';	
			}
			elseif(isset($option2['sfsi_plus_email_icons_functions']) && $option2['sfsi_plus_email_icons_functions'] == 'share_email')
			{
				$subject = stripslashes($option2['sfsi_plus_email_icons_subject_line']);
				$subject = str_replace('${title}', $socialObj->sfsi_get_the_title(), $subject);
				$subject = str_replace('"', '', str_replace("'", '', $subject));
				$subject = html_entity_decode(strip_tags($subject), ENT_QUOTES,'UTF-8');
				$subject = str_replace("%26%238230%3B", "...", $subject);				
				$subject = rawurlencode($subject);

			    $body = stripslashes($option2['sfsi_plus_email_icons_email_content']);
				$body = str_replace('${title}', $socialObj->sfsi_get_the_title(), $body);	
				$body = str_replace('${link}',  trailingslashit($socialObj->sfsi_get_custom_share_link('email')), $body);
				$body = str_replace('"', '', str_replace("'", '', $body));
				$body = html_entity_decode(strip_tags($body), ENT_QUOTES,'UTF-8');
				$body = str_replace("%26%238230%3B", "...", $body);
				$body = rawurlencode($body);				
				$url = "mailto:?subject=$subject&body=$body";
			}
			else
			{
				$url = (isset($option2['sfsi_plus_email_url']))
					? $option2['sfsi_plus_email_url']
					: 'javascript:';	
			}
			
			/*elseif(isset($option2['sfsi_plus_email_icons_functions']) && $option2['sfsi_plus_email_icons_functions'] == 'newsletter')
			{
				$url = 'javascript:';
				$newsletterSubscription = 'mailchimp';
			}*/
			
				
			 $toolClass 	= "email_tool_bdr";
			$arsfsiplus_row_class = "bot_eamil_arow";
		       
			/* fecth no of counts if active in admin section */
			if(
				$option4['sfsi_plus_email_countsDisplay']=="yes" &&
				$option4['sfsi_plus_display_counts']=="yes"
			)
			{
				if($option4['sfsi_plus_email_countsFrom']=="manual")
			 	{    
					$counts=$socialObj->format_num($option4['sfsi_plus_email_manualCounts']);
			 	}
			 	else
			 	{
					$counts= $socialObj->SFSI_getFeedSubscriber(sanitize_text_field(get_option('sfsi_premium_feed_id',false)));           
			 	}  
				$counts = (string) $counts;
			}
			

			$alt_text = sfsi_plus_get_icon_mouseover_text("email");
					  
			//Custom Skin Support {Monad}	 
			if($active_theme == 'custom_support')
			{
				if(get_option("plus_email_skin"))
				{
					$icon = get_option("plus_email_skin");
				}
				else
				{
					$active_theme = 'default';
					$icons_baseUrl = SFSI_PLUS_PLUGURL."images/icons_theme/default/";
	
					if($option2['sfsi_plus_rss_icons']=="sfsi")
					{
						$icon = $icons_baseUrl.$active_theme."_sf.png";
					}
					elseif($option2['sfsi_plus_rss_icons']=="email")
					{
						$icon = $icons_baseUrl.$active_theme."_email.png";
					}
					else
					{
						$icon = $icons_baseUrl.$active_theme."_subscribe.png";
					}
				}
			}
			else
			{
				if($option2['sfsi_plus_rss_icons']=="sfsi")
				{
					$icon = $icons_baseUrl.$active_theme."_sf.png";
				}
				elseif($option2['sfsi_plus_rss_icons']=="email")
				{
					$icon = $icons_baseUrl.$active_theme."_email.png";
				}
				else
				{
					$icon = $icons_baseUrl.$active_theme."_subscribe.png";
				}
			}
        break;
        
		case "facebook" :
			$width 		= 62;
		    $totwith 	= $width+28+$icons_space;
		    $twt_margin = $totwith/2;
		    $toolClass 	= "sfsi_plus_fb_tool_bdr";
		    $arsfsiplus_row_class = "bot_fb_arow";
		   
			/* check for the over section */
			$alt_text = sfsi_plus_get_icon_mouseover_text("facebook");
			
			$facebook_icons_lang = $option5['sfsi_plus_facebook_icons_language'];
		   	$visit_icon = SFSI_PLUS_DOCROOT.'/images/visit_icons/Visit_us_fb/icon_'.$facebook_icons_lang.'.png';
			
			if(file_exists($visit_icon))
			{
				$visit_icon = $visit_iconsUrl."Visit_us_fb/icon_".$facebook_icons_lang.".png";
			}
			else
			{
				$visit_icon = $visit_iconsUrl."fb.png";
			}
			
			$url = ("yes" == $option2['sfsi_plus_facebookPage_option'] && $option2['sfsi_plus_facebookPage_url']) ? $option2['sfsi_plus_facebookPage_url'] : '';

            // Start facbook options count
			$fbOptionsCount = 0;

			$fbOptionsCount = "yes" == $option2['sfsi_plus_facebookPage_option']   ? $fbOptionsCount+1 : $fbOptionsCount;
			$fbOptionsCount = "yes" == $option2['sfsi_plus_facebookLike_option']   ? $fbOptionsCount+1 : $fbOptionsCount;
			//$fbOptionsCount = "yes" == $option2['sfsi_plus_facebookFollow_option'] ? $fbOptionsCount+1 : $fbOptionsCount;
			$fbOptionsCount = "yes" == $option2['sfsi_plus_facebookShare_option']  ? $fbOptionsCount+1 : $fbOptionsCount;

			if(1 == $fbOptionsCount){

				// Only single option is active, dont's show tooltip For Visit, Follow & Share

				if("yes" == $option2['sfsi_plus_facebookPage_option']){
					$customShare =  true;
					$shareUrl 	 =	($option2['sfsi_plus_facebookPage_url'])    ? $option2['sfsi_plus_facebookPage_url'] : '';
				}
				// if("yes" == $option2['sfsi_plus_facebookFollow_option']){
				// 	$customShare =  true;
				// 	$shareUrl 	 =	($option2['sfsi_plus_facebookProfile_url']) ? $option2['sfsi_plus_facebookProfile_url']: '';
				// }
				if("yes" == $option2['sfsi_plus_facebookShare_option']){

				 	/*$hoverSHow	= 1;
				 	$hoverdiv	= '';

					$current_url = $socialObj->sfsi_get_custom_share_link('facebook');
					$hoverdiv.="<div  class='icon3'>".$socialObj->sfsiFB_Share($current_url)."</div>";*/

					$customShare =  true;
					$current_url = $socialObj->sfsi_get_custom_share_link('facebook');
					$shareUrl 	 =	"https://www.facebook.com/sharer/sharer.php?u=".trailingslashit($current_url);
				}

				// Show facebook option in tooltip
				if("yes" == $option2['sfsi_plus_facebookLike_option']){
				 	
				 	
				 	$hoverSHow	= 1;
				 	$hoverdiv	= '';
				 	
				 	if($option5['sfsi_plus_Facebook_linking'] == "facebookcustomurl")
			        {
			        	$userDefineLink = ($option5['sfsi_plus_facebook_linkingcustom_url']);
			        	$hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_plus_FBlike($userDefineLink)."</div>";
			        }
			        else
			        {
						$current_url = $socialObj->sfsi_get_custom_share_link('facebook');				        	
			        	$hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_plus_FBlike($current_url)."</div>";
			        }				 	



				}								
			}
			// fb option count is greater than two, show options in tooltip
			else{

				 $hoverSHow	= 1;
				 $hoverdiv	= '';
				 
				 if($option2['sfsi_plus_facebookPage_option'] == "yes")
				 {
					 $hoverdiv.="<div  class='icon1'><a href='".$url."' ".sfsi_plus_checkNewWindow($url)."><img width='auto' height='auto' alt='".$alt_text."' title='".$alt_text."' src='".$visit_icon."'  /></a></div>";
				 }  
				 if($option2['sfsi_plus_facebookLike_option'] == "yes")
				 {
				 	if($option5['sfsi_plus_Facebook_linking'] == "facebookcustomurl")
			        {
			        	$userDefineLink = ($option5['sfsi_plus_facebook_linkingcustom_url']);
			        	$hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_plus_FBlike($userDefineLink)."</div>";
			        }
			        else
			        {
						$current_url = $socialObj->sfsi_get_custom_share_link('facebook');				        	
			        	$hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_plus_FBlike($current_url)."</div>";
			        }
					 
				 }    
				 if($option2['sfsi_plus_facebookShare_option'] == "yes")
				 {
					 $current_url = $socialObj->sfsi_get_custom_share_link('facebook');
					 $hoverdiv.="<div  class='icon3'>".$socialObj->sfsiFB_Share($current_url)."</div>";
				 }

				 // if($option2['sfsi_plus_facebookFollow_option'] == "yes")
				 // {
					// //  $hoverdiv.="<div  class='icon4'>".$socialObj->sfsiFB_Follow($profileUrl)."</div>";
					// $url = ($option2['sfsi_plus_facebookProfile_url'])    ? $option2['sfsi_plus_facebookProfile_url'] : '';					
				 // }
			}


			 	if($option4['sfsi_plus_facebook_countsDisplay']=="yes" && $option4['sfsi_plus_display_counts']=="yes")
			 	{
					if($option4['sfsi_plus_facebook_countsFrom']=="manual")
					{    
						$counts = $socialObj->format_num($option4['sfsi_plus_facebook_manualCounts']);
					}
					else if($option4['sfsi_plus_facebook_countsFrom']=="likes")
					{
						$fb_data=$socialObj->sfsi_get_fb($current_url);   
						$counts=$socialObj->format_num($fb_data);
						
						if(empty($counts))
						{
						   $counts=(string) "0";
						}
					 }
					 else if($option4['sfsi_plus_facebook_countsFrom']=="followers")
					 {
						 $fb_data=$socialObj->sfsi_get_fb($current_url);
						 $counts=$socialObj->format_num($fb_data);
					 }
					 else if($option4['sfsi_plus_facebook_countsFrom']=="mypage")
					 {   
						 $current_url = $option4['sfsi_plus_facebook_mypageCounts'];
						 $fb_data=$socialObj->sfsi_get_fb_pagelike($current_url);
						 $counts=$socialObj->format_num($fb_data);
					 }
			 	}
			
			//Custom Skin Support {Monad}	 
			$icon = sfsi_plus_get_icon_image("facebook","fb");

        break;
		
        case "google" :
			$toolClass 				= "sfsi_plus_gpls_tool_bdr";
			$arsfsiplus_row_class 	= "bot_gpls_arow";
			$width 					= 76;
			$totwith 				= $width+28+$icons_space;
			$twt_margin 			= $totwith/2;
				
			$alt_text = sfsi_plus_get_icon_mouseover_text("google");

			$google_icons_lang = $option5['sfsi_plus_google_icons_language'];
			$visit_icon = SFSI_PLUS_DOCROOT.'/images/visit_icons/Visit_us_google/icon_'.$google_icons_lang.'.png';
			if(file_exists($visit_icon))
			{
				$visit_icon = $visit_iconsUrl."Visit_us_google/icon_".$google_icons_lang.".png";
			}
			else
			{
				$visit_icon = $visit_iconsUrl."google.png";
			}
				
			$url =	($option2['sfsi_plus_google_pageURL'])? $option2['sfsi_plus_google_pageURL']: '';
			
			/* check for icons to display */     
			if(	
				$option2['sfsi_plus_google_page']			!=	"yes" &&
				$option2['sfsi_plus_googleLike_option']	!=	"yes" &&
				$option2['sfsi_plus_googleFollow_option']	!=	"yes" &&
				$option2['sfsi_plus_googleShare_option']	==	"yes"
			)
			{
				$customShare	= true;
				$shareUrl 		= "https://plus.google.com/share?url=".$current_url;
			}
			elseif(
				$option2['sfsi_plus_googleLike_option']	== "yes" ||
				$option2['sfsi_plus_googleShare_option']	== "yes" ||
				$option2['sfsi_plus_googleFollow_option']	== "yes"
			)
			{
				 $hoverSHow	= 1;
				 $hoverdiv	= '';
				 if($option2['sfsi_plus_google_page']=="yes")
				 {
					  $hoverdiv.="<div  class='icon1'><a href='".$url."' ".sfsi_plus_checkNewWindow($url)."><img alt='".$alt_text."' title='".$alt_text."' src='".$visit_icon."'  /></a></div>";  
				 }
				 if($option2['sfsi_plus_googleLike_option']=="yes")
				 {
					 $hoverdiv.="<div class='icon2'>".$socialObj->sfsi_Googlelike($current_url,$icons_language)."</div>";  
				 }
				 if($option2['sfsi_plus_googleShare_option']=="yes")
				 {
					 $hoverdiv.="<div class='icon3'>".$socialObj->sfsi_GoogleShare($current_url,$icons_language)."</div>"; 
				 }
				 if($option2['sfsi_plus_googleFollow_option']=="yes")
				 {
					 $hoverdiv.="<div class='icon4'>".$socialObj->sfsi_GoogleFollow($url,$icons_language)."</div>"; 
				 }
			 }

			/* fecth no of counts if active in admin section */
			if(
				$option4['sfsi_plus_google_countsDisplay']=="yes" &&
				$option4['sfsi_plus_display_counts']=="yes"
			)
			{
				 if($option4['sfsi_plus_google_countsFrom']=="manual")
				 {    
					$counts = $socialObj->format_num($option4['sfsi_plus_google_manualCounts']);
				 }
				 else if($option4['sfsi_plus_google_countsFrom']=="likes")
				 {
					$api_key=$option4['sfsi_plus_google_api_key'];
					$followers=$socialObj->sfsi_getPlus1($current_url);
					$counts=$socialObj->format_num($followers);
					if(empty($counts))
					{
						$counts = (string) "0";
					}
				 }
				 else if($option4['sfsi_plus_google_countsFrom']=="follower")
				 {
					$api_key   = $option4['sfsi_plus_google_api_key'];
					$followers = $socialObj->sfsi_get_google($url,$api_key);

					$counts    = $followers;

					if(empty($counts))
					{
						$counts = (string) "0";
					}
				 }   
			} 
				
			//Custom Skin Support {Monad}	 
			$icon = sfsi_plus_get_icon_image("google");		 

        break;
        
		case "twitter" :
			$toolClass	= "sfsi_plus_twt_tool_bdr";
			$arsfsiplus_row_class = "bot_twt_arow";
			
			$url = ($option2['sfsi_plus_twitter_pageURL'])? $option2['sfsi_plus_twitter_pageURL']: '';
			
			// changes aboutPageText get from question 6
			$option5 	  =  unserialize(get_option('sfsi_premium_section5_options',false));
			$option2 	  =  unserialize(get_option('sfsi_premium_section2_options',false));

			$twitter_user = $option2['sfsi_plus_twitter_followUserName'];
			$twitter_text = $option5['sfsi_plus_twitter_aboutPageText'];
						
			$twitter_text = $socialObj->sfsi_get_custom_tweet_text();
			
			$width = 59;
			$totwith = $width+28+$icons_space;
			$twt_margin = $totwith/2;
            
			/* check for icons to display */
			$hoverdiv='';
			
			$twitter_icons_lang = $option5['sfsi_plus_twitter_icons_language'];
			$visit_icon = SFSI_PLUS_DOCROOT.'/images/visit_icons/Visit_us_twitter/icon_'.$twitter_icons_lang.'.png';
			
			if(file_exists($visit_icon))
			{
				$visit_icon = $visit_iconsUrl."Visit_us_twitter/icon_".$twitter_icons_lang.".png";
			}
			else
			{
				$visit_icon = $visit_iconsUrl."twitter.png";
			}
				
			if($icons_language == 'nn_NO')
			{
				$icons_language = 'no';
			}

			// **************** Get value tweetAboutPage from Question 2  STARTS *****************//
			$tweetAboutPage = 'no';

			if(isset($option2['sfsi_plus_twitter_aboutPage'])){
				$tweetAboutPage = sanitize_text_field($option2['sfsi_plus_twitter_aboutPage']);
			}

			// **************** Get value tweetAboutPage from Question 2 CLOSES *****************//

			if(	
				$option2['sfsi_plus_twitter_page']		!=	"yes" &&
				$option2['sfsi_plus_twitter_followme']	!=	"yes" && $tweetAboutPage ==	"yes"				
			)
			{
				$customShare	= true;
				$twitter_text 	= urlencode($twitter_text);
				$shareUrl 		= "https://twitter.com/intent/tweet?text=".$twitter_text."&url=";
			}
			elseif(
				$option2['sfsi_plus_twitter_followme']	== "yes" ||
				$tweetAboutPage	==	"yes"				
			)
			{
				 $hoverSHow=1;
				 //Visit twitter page {Monad}	 
				 if($option2['sfsi_plus_twitter_page']=="yes")
				 {
					  $hoverdiv.="<div  class='cstmicon1'><a href='".$url."' ".sfsi_plus_checkNewWindow($url)."><img width='auto' height='auto' alt='Visit Us' title='Visit Us' src='".$visit_icon."'  /></a></div>";  
				 }
				 if($option2['sfsi_plus_twitter_followme']=="yes" && !empty($twitter_user))
				 {
					 $hoverdiv.="<div  class='icon1'>".$socialObj->sfsi_twitterFollow($twitter_user,$icons_language)."</div>";
				 } 
				 if($tweetAboutPage	== "yes")
				 {
					 $hoverdiv.="<div class='icon2'>".$socialObj->sfsi_twitterShare($current_url,$twitter_text,$icons_language)."</div>";
				 }				 
			}
		      	 
			/* fecth no of counts if active in admin section */
			if($option4['sfsi_plus_twitter_countsDisplay'] == "yes" && $option4['sfsi_plus_display_counts'] == "yes")
			{
				if($option4['sfsi_plus_twitter_countsFrom']=="manual")
				{    
					$counts=$socialObj->format_num($option4['sfsi_plus_twitter_manualCounts']);
				}
				else if($option4['sfsi_plus_twitter_countsFrom']=="source")
				{
					$tw_settings=array(
						'sfsiplus_tw_consumer_key'=>$option4['sfsiplus_tw_consumer_key'],
					   	'sfsiplus_tw_consumer_secret'=> $option4['sfsiplus_tw_consumer_secret'],
					   	'sfsiplus_tw_oauth_access_token'=> $option4['sfsiplus_tw_oauth_access_token'],
					   	'sfsiplus_tw_oauth_access_token_secret'=> $option4['sfsiplus_tw_oauth_access_token_secret']
					);
									   
					$followers=$socialObj->sfsi_get_tweets($twitter_user,$tw_settings);
					$counts=$socialObj->format_num($followers);
					if(empty($counts))
					{
						$counts=(string) "0";
					}
				}
			} 
			 
			//Giving alternative text to image 	 
			$alt_text = sfsi_plus_get_icon_mouseover_text("twitter");			
			 
			//Custom Skin Support {Monad}	 
			$icon = sfsi_plus_get_icon_image("twitter");	

        break;
        
		case "share" :
			$url 		= "";//"http://www.addthis.com/bookmark.php?v=250";
			$class 		= "addthis_button";
			
			/*fecth no of counts if active in admin section */
			if($option4['sfsi_plus_shares_countsDisplay']=="yes" && $option4['sfsi_plus_display_counts']=="yes")
			{
				if($option4['sfsi_plus_shares_countsFrom']=="manual")
				{
					$counts = $socialObj->format_num($option4['sfsi_plus_shares_manualCounts']);
				}
				else if($option4['sfsi_plus_shares_countsFrom']=="shares")
				{
					$shares=$socialObj->sfsi_get_atthis();
					$counts=$socialObj->format_num($shares);
					if(empty($counts))
					{
						$counts=(string) "0";
					}
				}
			}
			
			//Giving alternative text to image
			if(!empty($option5['sfsi_plus_share_MouseOverText']))
			{	
				$alt_text = $option5['sfsi_plus_share_MouseOverText'];
			}
			else
			{
				$alt_text = "SHARE";
			}

			$alt_text = sfsi_plus_get_icon_mouseover_text("share");			 
			//Custom Skin Support {Monad}	 
			$icon = sfsi_plus_get_icon_image("share");	

		break;
        
		case "youtube" :
				$toolClass = "utube_tool_bdr";
				$arsfsiplus_row_class = "bot_utube_arow";

				$width 			= 96;
				$totwith 		= $width+28+$icons_space;
				$twt_margin 	= $totwith/2;
				$youtube_user 	= (isset($option4['sfsi_plus_youtube_user']) && !empty($option4['sfsi_plus_youtube_user'])) ? $option4['sfsi_plus_youtube_user'] : 'SpecificFeeds';
				$visit_icon = $visit_iconsUrl."youtube.png";
				
				$url = ($option2['sfsi_plus_youtube_pageUrl'])? $option2['sfsi_plus_youtube_pageUrl'] : '';
				
				//Giving alternative text to image
				$alt_text = sfsi_plus_get_icon_mouseover_text("youtube");	

				/* check for icons to display */
				$hoverdiv="";
				if($option2['sfsi_plus_youtube_follow']=="yes" )
				{
					$hoverSHow=1;
					
					if($option2['sfsi_plus_youtube_page']=="yes")
					{ 
						  $hoverdiv.="<div  class='icon1'><a href='".$url."'  ".sfsi_plus_checkNewWindow($url)."><img alt='".$alt_text."' title='".$alt_text."' src='".$visit_icon."'  /></a></div>";  
					} 
					if($option2['sfsi_plus_youtube_follow']=="yes")
					{
						 $hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_YouTubeSub($youtube_user)."</div>";
					}    
				 }
                 
				 /* fecth no of counts if active in admin section */  
                 if($option4['sfsi_plus_youtube_countsDisplay']=="yes" && $option4['sfsi_plus_display_counts']=="yes")
                 {
                      if($option4['sfsi_plus_youtube_countsFrom']=="manual")
                      {    
                         $counts=$socialObj->format_num($option4['sfsi_plus_youtube_manualCounts']);
                      }
                      else if($option4['sfsi_plus_youtube_countsFrom']=="subscriber")
                      {
						  	$followers=$socialObj->sfsi_get_youtube($youtube_user);
                             $counts=$socialObj->format_num($followers);
                             if(empty($counts))
							 {
							   $counts=(string) "0";
							 }
                       }
                  }
			
				//Custom Skin Support {Monad}	 
				$icon = sfsi_plus_get_icon_image("youtube");	

       break;
       
	   case "pinterest" :
				$width = 73;
				$totwith = $width+28+$icons_space;
				$twt_margin = $totwith/2;
				$toolClass = "sfsi_plus_printst_tool_bdr";
				$arsfsiplus_row_class = "bot_pintst_arow";
				
				$pinterest_user 	= 	(isset($option4['sfsi_plus_pinterest_user']))
											? $option4['sfsi_plus_pinterest_user'] : '';
				
				$pinterest_board 	= 	(isset($option4['sfsi_plus_pinterest_board']))
											? $option4['sfsi_plus_pinterest_board'] : '';
									
				$visit_icon = $visit_iconsUrl."pinterest.png";
				
		        $url = (isset($option2['sfsi_plus_pinterest_pageUrl'])) ? $option2['sfsi_plus_pinterest_pageUrl'] : '';
                
				//Giving alternative text to image				
				$alt_text = sfsi_plus_get_icon_mouseover_text("pinterest");

				/* check for icons to display */  
                $hoverdiv="";
			    
			    if($option2['sfsi_plus_pinterest_pingBlog']=="yes" && $option2['sfsi_plus_pinterest_page']=="yes")  
			    {
					$hoverSHow = 1;

					$hoverdiv.="<div  class='icon1'><a href='".$url."' ".sfsi_plus_checkNewWindow($url)."><img alt='".$alt_text."' title='".$alt_text."' src='".$visit_icon."'  /></a></div>";

					$hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_PinIt( $mouse_hover_effect,'',$current_url )."</div>";
			   } 
			   /* fecth no of counts if active in admin section */   
		   	   	if($option4['sfsi_plus_pinterest_countsDisplay']=="yes" && $option4['sfsi_plus_display_counts']=="yes")
               	{
					$pins  = $socialObj->sfsi_get_pinterest($current_url);
					$counts= (empty($pins)) ? (string) "0": $pins;
                }
				
				//Custom Skin Support {Monad}	 
				$icon = sfsi_plus_get_icon_image("pinterest");                
        break;
		
		case "instagram" :
				$toolClass = "instagram_tool_bdr";
				$arsfsiplus_row_class = "bot_pintst_arow";
				$url = (isset($option2['sfsi_plus_instagram_pageUrl'])) ? $option2['sfsi_plus_instagram_pageUrl'] : '';
				$instagram_user_name = $option4['sfsi_plus_instagram_User'];
				     
		     	$hoverdiv="";
                /* fecth no of counts if active in admin section */ 
				if($option4['sfsi_plus_instagram_countsDisplay']=="yes" && $option4['sfsi_plus_display_counts']=="yes")
				{
					if($option4['sfsi_plus_instagram_countsFrom']=="manual")
					{    
						$counts = $socialObj->format_num($option4['sfsi_plus_instagram_manualCounts']);
					}
					else if($option4['sfsi_plus_instagram_countsFrom']=="followers")
					{
						$counts=$socialObj->sfsi_get_instagramFollowers($instagram_user_name);
						if(empty($counts))
						{
						   $counts=(string) "0";
						}
					 }      
				 }

				$alt_text = sfsi_plus_get_icon_mouseover_text("instagram");

            	//Custom Skin Support {Monad}	 
				$icon = sfsi_plus_get_icon_image("instagram"); 

        break;
        
		case "houzz" :
		     $url = ($option2['sfsi_plus_houzz_pageUrl'])? $option2['sfsi_plus_houzz_pageUrl'] : '';
             $toolClass = "rss_tool_bdr";
		     $hoverdiv = '';
		     $arsfsiplus_row_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if(
			 	isset($option4['sfsi_plus_houzz_countsDisplay']) &&
				$option4['sfsi_plus_houzz_countsDisplay'] == "yes" &&
				$option4['sfsi_plus_display_counts'] == "yes"
			 )
			 {
				 $counts=$socialObj->format_num($option4['sfsi_plus_houzz_manualCounts']);
			 }
			 			 
			 $alt_text = sfsi_plus_get_icon_mouseover_text("houzz");

			 //Custom Skin Support {Monad}	 
			 $icon = sfsi_plus_get_icon_image("houzz"); 

        break;
		
		case "snapchat" :
		     $url = ($option2['sfsi_plus_snapchat_pageUrl'])? $option2['sfsi_plus_snapchat_pageUrl'] : '';
             $toolClass = "rss_tool_bdr";
		     $hoverdiv = '';
		     $arsfsiplus_row_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if(
			 	isset($option4['sfsi_plus_snapchat_countsDisplay']) &&
				$option4['sfsi_plus_snapchat_countsDisplay'] == "yes" &&
				$option4['sfsi_plus_display_counts'] == "yes"
			 )
			 {
				 $counts=$socialObj->format_num($option4['sfsi_plus_snapchat_manualCounts']);
			 }
			 
			 
			 $alt_text = sfsi_plus_get_icon_mouseover_text("snapchat");

			 //Custom Skin Support {Monad}	 
			 $icon = sfsi_plus_get_icon_image("snapchat"); 

        break;
		
		case "whatsapp" :
		
			if(($option2['sfsi_plus_whatsapp_url_type'] == 'message') && ($option2['sfsi_plus_my_whatsapp_number'] == ''))
			{  
			    $msg  = stripslashes($option2['sfsi_plus_whatsapp_message']);
				$msg  = str_replace('${title}', $socialObj->sfsi_get_the_title(), $msg);	
				$msg  = str_replace('${link}',  trailingslashit(get_permalink($post->ID)), $msg);
				$msg  = str_replace('"', '', str_replace("'", '', $msg));
				$msg  = html_entity_decode(strip_tags($msg), ENT_QUOTES,'UTF-8');
				$msg  = rawurlencode($msg);
				$msg  = str_replace("%26%238230%3B", "...", $msg);					
				$url = 'whatsapp://send?text='.$msg;
			}
			elseif($option2['sfsi_plus_whatsapp_url_type'] == 'message')
			{
			    $msg  = stripslashes($option2['sfsi_plus_whatsapp_message']);
				$msg  = str_replace('${title}', $socialObj->sfsi_get_the_title(), $msg);	
				$msg  = str_replace('${link}',  trailingslashit(get_permalink($post->ID)), $msg);
				$msg  = str_replace('"', '', str_replace("'", '', $msg));
				$msg  = html_entity_decode(strip_tags($msg), ENT_QUOTES,'UTF-8');
				$msg  = rawurlencode($msg);
				$msg  = str_replace("%26%238230%3B", "...", $msg);				
				$url  = 'whatsapp://send?text='.$msg.'&phone='.$option2['sfsi_plus_my_whatsapp_number'];
			}
			elseif($option2['sfsi_plus_whatsapp_url_type'] == 'call')
			{
				$url = 'tel:'.$option2['sfsi_plus_whatsapp_number'];
			}
			elseif($option2['sfsi_plus_whatsapp_url_type'] == 'share_page')
			{
				$url = stripslashes($option2['sfsi_plus_whatsapp_share_page']);
				$url = str_replace('${title}',get_the_title($post->ID),$url);
			   	$url = str_replace('${link}',get_permalink($post->ID),$url);
			   	$url = str_replace("'", '', str_replace('"', '', $url));
				
				$url = 'whatsapp://send?text='.$url;
			}
			else
			{
				$url = '';
			}
				
            $toolClass = "rss_tool_bdr";
		    $hoverdiv = '';
		    $arsfsiplus_row_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if(
			 	isset($option4['sfsi_plus_whatsapp_countsDisplay']) &&
				$option4['sfsi_plus_whatsapp_countsDisplay'] == "yes" &&
				$option4['sfsi_plus_display_counts'] == "yes"
			 )
			 {
				 $counts=$socialObj->format_num($option4['sfsi_plus_whatsapp_manualCounts']);
			 }
			 

			 $alt_text = sfsi_plus_get_icon_mouseover_text("whatsapp");

			 //Custom Skin Support {Monad}	 
			 $icon = sfsi_plus_get_icon_image("whatsapp"); 

        break;
		
		case "skype" :
			 		     
		     $url = 'javascript:';

			 if($option2['sfsi_plus_skype_options']=="call" && isset($option2['sfsi_plus_skype_pageUrl'])){
				$url = "skype:".$option2['sfsi_plus_skype_pageUrl']."?call";
			 }
			 else if($option2['sfsi_plus_skype_options']=="chat" && isset($option2['sfsi_plus_skype_pageUrl'])){
				$url = "skype:".$option2['sfsi_plus_skype_pageUrl']."?chat";
			 }
				
             $toolClass = "rss_tool_bdr";
		     $hoverdiv = '';
		     $arsfsiplus_row_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if(
			 	isset($option4['sfsi_plus_skype_countsDisplay']) &&
				$option4['sfsi_plus_skype_countsDisplay'] == "yes" &&
				$option4['sfsi_plus_display_counts'] == "yes"
			 )
			 {
				 $counts=$socialObj->format_num($option4['sfsi_plus_skype_manualCounts']);
			 }
			 
			 
 			 $alt_text = sfsi_plus_get_icon_mouseover_text("skype");

			 //Custom Skin Support {Monad}	 
			 $icon = sfsi_plus_get_icon_image("skype"); 

        break;
		
		case "vimeo" :

		     $url = ($option2['sfsi_plus_vimeo_pageUrl'])? $option2['sfsi_plus_vimeo_pageUrl'] : '';
             $toolClass = "rss_tool_bdr";
		     $hoverdiv = '';
		     $arsfsiplus_row_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if(
			 	isset($option4['sfsi_plus_vimeo_countsDisplay']) &&
				$option4['sfsi_plus_vimeo_countsDisplay'] == "yes" &&
				$option4['sfsi_plus_display_counts'] == "yes"
			 )
			 {
				 $counts=$socialObj->format_num($option4['sfsi_plus_vimeo_manualCounts']);
			 }
			 
			 
			$alt_text = sfsi_plus_get_icon_mouseover_text("vimeo");

			 //Custom Skin Support {Monad}	 
			$icon = sfsi_plus_get_icon_image("vimeo"); 

        break;
		
		case "soundcloud" :
		     $url = ($option2['sfsi_plus_soundcloud_pageUrl'])? $option2['sfsi_plus_soundcloud_pageUrl'] : '';
             $toolClass = "rss_tool_bdr";
		     $hoverdiv = '';
		     $arsfsiplus_row_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if(
			 	isset($option4['sfsi_plus_soundcloud_countsDisplay']) &&
				$option4['sfsi_plus_soundcloud_countsDisplay'] == "yes" &&
				$option4['sfsi_plus_display_counts'] == "yes"
			 )
			 {
				 $counts=$socialObj->format_num($option4['sfsi_plus_soundcloud_manualCounts']);
			 }
			 
			$alt_text = sfsi_plus_get_icon_mouseover_text("soundcloud");
			 
			 //Custom Skin Support {Monad}	 
			$icon = sfsi_plus_get_icon_image("soundcloud"); 

        break;
		
		case "yummly" :
		     $url = ($option2['sfsi_plus_yummly_pageUrl'])? $option2['sfsi_plus_yummly_pageUrl'] : '';
             $toolClass = "rss_tool_bdr";
		     $hoverdiv = '';
		     $arsfsiplus_row_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if(
			 	isset($option4['sfsi_plus_yummly_countsDisplay']) &&
				$option4['sfsi_plus_yummly_countsDisplay'] == "yes" &&
				$option4['sfsi_plus_display_counts'] == "yes"
			 )
			 {
				 $counts=$socialObj->format_num($option4['sfsi_plus_yummly_manualCounts']);
			 }
			 

			$alt_text = sfsi_plus_get_icon_mouseover_text("yummly");

			 //Custom Skin Support {Monad}	 

			$icon = sfsi_plus_get_icon_image("yummly"); 

        break;
		
		case "flickr" :
		     $url = ($option2['sfsi_plus_flickr_pageUrl'])? $option2['sfsi_plus_flickr_pageUrl'] : '';
             $toolClass = "rss_tool_bdr";
		     $hoverdiv = '';
		     $arsfsiplus_row_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if(
			 	isset($option4['sfsi_plus_flickr_countsDisplay']) &&
				$option4['sfsi_plus_flickr_countsDisplay'] == "yes" &&
				$option4['sfsi_plus_display_counts'] == "yes"
			 )
			 {
				 $counts=$socialObj->format_num($option4['sfsi_plus_flickr_manualCounts']);
			 }
			 			 
			 $alt_text = sfsi_plus_get_icon_mouseover_text("flickr");

			//Custom Skin Support {Monad}
			$icon = sfsi_plus_get_icon_image("flickr"); 

        break;
		
		case "reddit" :
		    
			 if($option2['sfsi_plus_reddit_url_type'] == 'share')
			 {
			 	$url = 'https://www.reddit.com/submit?dest='.$current_url;
			 }
			 elseif($option2['sfsi_plus_reddit_url_type'] == 'url')
			 {
				 $url = $option2['sfsi_plus_reddit_pageUrl'];
			 }
			 else
			 {
				$url = '';
			 }
			 
             $toolClass = "rss_tool_bdr";
		     $hoverdiv = '';
		     $arsfsiplus_row_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if(
			 	isset($option4['sfsi_plus_reddit_countsDisplay']) &&
				$option4['sfsi_plus_reddit_countsDisplay'] == "yes" &&
				$option4['sfsi_plus_display_counts'] == "yes"
			 )
			 {
				 $counts=$socialObj->format_num($option4['sfsi_plus_reddit_manualCounts']);
			 }
			 

			 $alt_text = sfsi_plus_get_icon_mouseover_text("reddit");
			 
			 //Custom Skin Support {Monad}	 
			 $icon = sfsi_plus_get_icon_image("reddit"); 

        break;
		
		case "tumblr" :
		     $url = ($option2['sfsi_plus_tumblr_pageUrl'])? $option2['sfsi_plus_tumblr_pageUrl'] : '';
             $toolClass = "rss_tool_bdr";
		     $hoverdiv = '';
		     $arsfsiplus_row_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if(
			 	isset($option4['sfsi_plus_tumblr_countsDisplay']) &&
				$option4['sfsi_plus_tumblr_countsDisplay'] == "yes" &&
				$option4['sfsi_plus_display_counts'] == "yes"
			 )
			 {
				 $counts=$socialObj->format_num($option4['sfsi_plus_tumblr_manualCounts']);
			 }
			 			 
			 $alt_text = sfsi_plus_get_icon_mouseover_text("tumblr");

			 //Custom Skin Support {Monad}	 
			 $icon = sfsi_plus_get_icon_image("tumblr"); 

        break;
		
		case "linkedin" :
				$width = 66;
				$toolClass = "sfsi_plus_linkedin_tool_bdr";
				$arsfsiplus_row_class = "bot_linkedin_arow";                
				$linkedIn_compayId = $option2['sfsi_plus_linkedin_followCompany'];
				$linkedIn_compay = $option2['sfsi_plus_linkedin_followCompany']; 
				$linkedIn_ProductId = $option2['sfsi_plus_linkedin_recommendProductId'];
				$visit_icon = $visit_iconsUrl."linkedIn.png";
				
				/*check for icons to display */     
				$url=($option2['sfsi_plus_linkedin_pageURL'])? $option2['sfsi_plus_linkedin_pageURL'] : '';         
		     	
				if(	
					$option2['sfsi_plus_linkedin_page']				!=	"yes" &&
					$option2['sfsi_plus_linkedin_follow']			!=	"yes" &&
					$option2['sfsi_plus_linkedin_recommendBusines']	!=	"yes" &&					
					$option2['sfsi_plus_linkedin_SharePage']			==	"yes"
				)
				{
					$customShare	= true;
					$shareUrl 		= "http://www.linkedin.com/shareArticle?mini=true&url=".$current_url;
				}
				elseif(
					$option2['sfsi_plus_linkedin_follow']=="yes" ||
					$option2['sfsi_plus_linkedin_SharePage']=="yes" ||
					$option2['sfsi_plus_linkedin_recommendBusines']=="yes" )
                {
			 		 $hoverSHow=1;
					 $hoverdiv='';
					 if($option2['sfsi_plus_linkedin_page']=="yes")
					 {
						  $hoverdiv.="<div  class='icon4'><a href='".$url."' ".sfsi_plus_checkNewWindow($url)."><img alt='".$alt_text."' title='".$alt_text."' src='".$visit_icon."'  /></a></div>";  
					 } 
					 if($option2['sfsi_plus_linkedin_follow']=="yes")
					 {
						 $hoverdiv.="<div  class='icon1'>".$socialObj->sfsi_LinkedInFollow($linkedIn_compayId)."</div>";  
					 }    
					 if($option2['sfsi_plus_linkedin_SharePage']=="yes")
					 {
						 $hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_LinkedInShare($current_url)."</div>";  
					 }
					 if($option2['sfsi_plus_linkedin_recommendBusines']=="yes")
					 {
						 $hoverdiv.="<div  class='icon3'>".$socialObj->sfsi_LinkedInRecommend($linkedIn_compay,$linkedIn_ProductId)."</div>";  
						 $width=99;
					 }
                }
				  
                /* fecth no of counts if active in admin section */ 
				/*if(	
					$fromPost == 'yes' && !empty($post) &&
					$option4['sfsi_plus_linkedIn_countsDisplay']=="yes" &&
					$option4['sfsi_plus_display_counts']=="yes"
				)
				{
					$followers=$socialObj->sfsi_get_linkedin($current_url);
					$counts=$socialObj->format_num($followers);
					if(empty($counts))
					{
						$counts = (string) "0";
					}
				}
				else
				{ */
					if(
					 	$option4['sfsi_plus_linkedIn_countsDisplay']=="yes" &&
					 	$option4['sfsi_plus_display_counts']=="yes"
					)
					{
						 if($option4['sfsi_plus_linkedIn_countsFrom']=="manual")
						 {    
							$counts = $socialObj->format_num($option4['sfsi_plus_linkedIn_manualCounts']);
						 }
						 else if($option4['sfsi_plus_linkedIn_countsFrom']=="follower")
						 {
							 $linkedIn_compay=$option4['sfsi_plus_ln_company'];
							 $ln_settings = array(
							 	'sfsi_plus_ln_api_key'			=> $option4['sfsi_plus_ln_api_key'],
							 	'sfsi_plus_ln_secret_key'		=> $option4['sfsi_plus_ln_secret_key'],
							 	'sfsi_plus_ln_oAuth_user_token'	=> $option4['sfsi_plus_ln_oAuth_user_token']
							 );
											  
							 $followers=$socialObj->sfsi_getlinkedin_follower($linkedIn_compay,$ln_settings);
							 (int) $followers;
							 $counts=$socialObj->format_num($followers);
							 if(empty($counts))
							 {
								$counts = (string) "0";
							 }
						 }
				 	}
				/*}*/

		     	 $totwith = $width+28+$icons_space;
		     	 $twt_margin = $totwith/2;
                 
			    //Giving alternative text to image
				if(!empty($option5['sfsi_plus_linkedIn_MouseOverText']))
				{	
				 	$alt_text = $option5['sfsi_plus_linkedIn_MouseOverText'];
				}
				else
				{
					 $alt_text = "LINKEDIN";
				}
			    
				//Custom Skin Support {Monad}	  
				$icon = sfsi_plus_get_icon_image("linkedin");

           break;   
           
		   default:

				if( !empty($customIcons) ){

			      	$border_radius = "";
			      	$cmcls 		   = "cmcls";      
			      	$padding_top   = "";	
					
					$custom_icon_urls = unserialize($option2['sfsi_plus_CustomIcon_links']);
					
					$url = (isset($custom_icon_urls[$icon_n]) && !empty($custom_icon_urls[$icon_n])) ? do_shortcode($custom_icon_urls[$icon_n]) :''; 

					$toolClass = "custom_lkn";
					$arsfsiplus_row_class = "";
					$custom_icons_hoverTxt = unserialize($option5['sfsi_plus_custom_MouseOverTexts']);
					
					$icon  = $customIcons[$icon_n]; 
					
					//Giving alternative text to image
					if(!empty($custom_icons_hoverTxt[$icon_n]))
					{	
					 	$alt_text = $custom_icons_hoverTxt[$icon_n];
					}
					else
					{
						 $alt_text = "SOCIALICON";
					}

				}
            break;    
    }
    
    $icons="";
    
	/* apply size of icon */
    if(wp_is_mobile() && $option5['sfsi_plus_mobile_icon_setting'] == 'yes')
	{
		if($is_front==0)
		{
			$icons_size = $option5['sfsi_plus_icons_mobilesize'];
		}
		else
		{
			$icons_size = 51;
		}
		
		/* spacing and no of icons per row */
		$icons_space 	= '';
		$icons_space 	= $option5['sfsi_plus_icons_mobilespacing'];
		$icon_width		= (int)$icons_size;
	}
	else
	{
		if($is_front==0)
		{
			$icons_size = $option5['sfsi_plus_icons_size'];
		}
		else
		{
			$icons_size = 51;
		}
		
		/* spacing and no of icons per row */
		$icons_space 	= '';
		$icons_space 	= $option5['sfsi_plus_icons_spacing'];
		$icon_width		= (int)$icons_size;
	}

    
    /* check for mouse hover effect */
    $icon_opacity	= "1";
    
	if($option3['sfsi_plus_mouseOver']=='yes')
    {
		 $mouse_hover_effect=$option3["sfsi_plus_mouseOver_effect"];
		 if($mouse_hover_effect == "fade_in" || $mouse_hover_effect == "combo")
		 {    
			$icon_opacity = "0.6";
		 }
    }
    
	$toolT_cls='';
    if((int) $icon_width <= 49 && (int) $icon_width >= 30)
	{
		$bt_class="";
	  	$toolT_cls="sfsi_plus_Tlleft";
    }
	else if((int) $icon_width <=20)
    {
 	  $bt_class="sfsiSmBtn";
	  $toolT_cls="sfsi_plus_Tlleft";
    }
	else
    {
      $bt_class="";
	  $toolT_cls="sfsi_plus_Tlleft";
    }
    
	if($toolClass=="rss_tool_bdr" || $toolClass=="custom_lkn" ||   $toolClass=="instagram_tool_bdr" )
    {
    	$new_window = sfsi_plus_checkNewWindow();
     	$url = $url;
    }
    elseif ($toolClass =='email_tool_bdr' && $option2['sfsi_plus_email_icons_functions'] == 'contact'){
    	$url = $url;
    }
    elseif ($toolClass =='email_tool_bdr' && $option2['sfsi_plus_email_icons_functions'] == 'share_email'){
    	$url = $url;
    }
    else if($hoverSHow)
    {
		if(!wp_is_mobile())
		{
			$new_window = sfsi_plus_checkNewWindow();
			$url = $url;
		}
		else
		{
			$new_window = '';
			$url = "";
		}
	}
    else
    {
	 	$new_window = sfsi_plus_checkNewWindow();
	 	$url = $url;
    }
    
	if(wp_is_mobile() && $option5['sfsi_plus_mobile_icon_setting'] == 'yes')
	{
		$margin_bot = $option5['sfsi_plus_icons_verical_mobilespacing'];
	}
	else
	{
		$margin_bot = $option5['sfsi_plus_icons_verical_spacing'];
	}
	if($option4['sfsi_plus_display_counts'] == "yes")
	{
		$margin_bot = "30";
    }
    
	if(isset($icon) && !empty($icon) && filter_var($icon, FILTER_VALIDATE_URL))
	{
		if(isset($customShare) && $customShare == true)
		{
			$url 		= $shareUrl;
			// $new_window = "javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;";
			// $new_window = 'onclick="'.$new_window.'"';
		}

		if(isset($newsletterSubscription) && $newsletterSubscription == 'mailchimp')
		{
			$class .= " mailchimpSubscription";
			$new_window = '';
		}

		$sfsi_whatsapp_url_type        = $option2['sfsi_plus_whatsapp_url_type'];


		$no_follow_attr = sfsi_plus_get_no_follow_attr($option5);

		//Main div wrpr
		$icons.= "<div style='width:".$icon_width."px; height:".$icon_width."px;margin-left:".$icons_space."px;margin-bottom:".$margin_bot."px;' class='sfsi_plus_wicons shuffeldiv ".$cmcls."'>";
		
			$icons.= "<div class='sfsiplus_inerCnt'>";
				
				if($icon_name=="whatsapp" && isset($sfsi_whatsapp_url_type) && $sfsi_whatsapp_url_type=='share_page') {
					
					$addClass= (strlen($class)>0)? 'clWhatsapp ".$class." sficn':'clWhatsapp sficn';

					$socialObj = new sfsi_plus_SocialHelper();
					$link      = $socialObj->sfsi_get_custom_share_link('whatsapp');
					$title     = $socialObj->sfsi_get_the_title();

					$custom_whatsapp_txt = stripslashes($option2['sfsi_plus_whatsapp_share_page']);

					$icons.= "<a class='".$addClass."' data-customtxt='".$custom_whatsapp_txt."' data-url='".$link."' data-text='".$title."' data-effect='".$mouse_hover_effect."' $new_window ".(isset($url) && $url!=""?$new_window:'')."  style='cursor:pointer;opacity:".$icon_opacity."' ".$no_follow_attr.">";      
						
					$icons.= "<img alt='".$alt_text."' title='".$alt_text."' src='".$icon."' height='".$icons_size."' width='".$icons_size."' style='".$border_radius.$padding_top."' class='sfcm sfsi_wicon' data-effect='".$mouse_hover_effect."' />"; 
					
					$icons.= '</a>';			
				}
				else if($icon_name=="pinterest" &&  (false != isset($option2['sfsi_plus_pinterest_page']))     && ("yes" != $option2['sfsi_plus_pinterest_page']) &&  (false != isset($option2['sfsi_plus_pinterest_pingBlog'])) && ("yes"== $option2['sfsi_plus_pinterest_pingBlog'])) {

					$addClass = $class.'sficn';

					$iconImg  = "<img alt='".$alt_text."' title='".$alt_text."' src='".$icon."' height='".$icons_size."' width='".$icons_size."' style='".$border_radius.$padding_top."' class='sfcm sfsi_wicon' data-effect='".$mouse_hover_effect."' />";

					$icons.= $socialObj->sfsi_PinIt($mouse_hover_effect,$addClass,$current_url,$iconImg);
				}
				else if($icon_name =="facebook"){

					$window = $new_window;

					$fbOpcount  = 0;
					$fbOpcount  = $option2['sfsi_plus_facebookPage_option']	 ==	"yes" ? $fbOpcount + 1 : $fbOpcount;
					$fbOpcount  = $option2['sfsi_plus_facebookLike_option']	 ==	"yes" ? $fbOpcount + 1 : $fbOpcount;
					$fbOpcount  = $option2['sfsi_plus_facebookShare_option'] ==	"yes" ? $fbOpcount + 1 : $fbOpcount;

					if(1 !== $fbOpcount){
						// if Visit, Like and share options are active,  don't open icons link in new tab 
						if(	$option2['sfsi_plus_facebookPage_option']	==	"yes" || $option2['sfsi_plus_facebookLike_option'] ==	"yes" || $option2['sfsi_plus_facebookShare_option']	==	"yes"){
							$window = "";
						}						
					}

					$icons.= "<a class='".$class." sficn' data-effect='".$mouse_hover_effect."' $window  href='".(isset($url) && $url!=""?$url:'javascript:void(0);')."' ".(isset($url) && $url!=""?$new_window:'')." style='opacity:".$icon_opacity."' ".$no_follow_attr.">";

					$icons.= "<img alt='".$alt_text."' title='".$alt_text."' src='".$icon."' height='".$icons_size."' width='".$icons_size."' style='".$border_radius.$padding_top."' class='sfcm sfsi_wicon' data-effect='".$mouse_hover_effect."' />"; 					
					$icons.= '</a>';
				}															
				else{
					
					$icons.= "<a class='".$class." sficn' data-effect='".$mouse_hover_effect."' $new_window  href='".(isset($url) && $url!=""?$url:'javascript:void(0);')."' ".(isset($url) && $url!=""?$new_window:'')." style='opacity:".$icon_opacity."' ".$no_follow_attr.">";     						
					
					$icons.= "<img alt='".$alt_text."' title='".$alt_text."' src='".$icon."' height='".$icons_size."' width='".$icons_size."' style='".$border_radius.$padding_top."' class='sfcm sfsi_wicon' data-effect='".$mouse_hover_effect."' />"; 					
					$icons.= '</a>';					
				}	

			   if(isset($counts) && $counts!='' && intval($counts) >=$minCountToDisplayCountBox && $onpost == "no")
			   {
				   $icons.= '<span class="bot_no '.$bt_class.'">'.$counts.'</span>';  
			   }
		 
			   if($hoverSHow && !empty($hoverdiv))
			   {	$tooltip_background_color = $option5['sfsi_plus_tooltip_Color'];
			   		$tooltip_border_color = $option5['sfsi_plus_tooltip_border_Color'];
					$icons.= '<div id="sfsiplusid_'.$icon_name.'" class="sfsi_plus_tool_tip_2 '.$toolClass.' '.$toolT_cls.'" style="width:'.$width.'px; background:'.$tooltip_background_color.'; border:1px solid '.$tooltip_border_color.'; opacity:0;z-index:-1;">';
					$icons.= '<span class="bot_arow '.$arsfsiplus_row_class.'"></span>';
					$icons.= '<div class="sfsi_plus_inside">'.$hoverdiv."</div>";
					$icons.= "</div>";
			   }
			   
			$icons.="</div>";
	   
		$icons.="</div>";
	}
	return  $icons;       
}


/* make url for new window */
function sfsi_plus_checkNewWindow()
{		
	$option5 =  unserialize(get_option('sfsi_premium_section5_options',false));
	
	if($option5['sfsi_plus_icons_ClickPageOpen']=="window")
	{
		return $new_window ="onclick='sfsi_plus_new_window_popup(event)'";
	}
	elseif($option5['sfsi_plus_icons_ClickPageOpen']=="tab")
	{
		return $new_window="target='_blank'";
	}
	else
	{
	    return ''; 
	}
}

function sfsi_plus_check_posts_visiblity($isFloter=0 , $fromPost = NULL)
{
	if(sfsi_premium_is_any_standard_icon_selected()){

	  	global $wpdb;
	    /* Access the saved settings in database  */
	    $sfsi_premium_section1_options=  unserialize(get_option('sfsi_premium_section1_options',false));
	    $sfsi_section3 =  unserialize(get_option('sfsi_premium_section3_options',false));
	    $sfsi_section5 =  unserialize(get_option('sfsi_premium_section5_options',false));
	    
		//options that are added on the third question
		$sfsi_section8 =  unserialize(get_option('sfsi_premium_section8_options',false));
		   
	    /* calculate the width and icons display alignments */
	    $icons_space = $sfsi_section8['sfsi_plus_post_icons_spacing'];

		$icons_space_vertical = (isset($sfsi_section8['sfsi_plus_post_icons_vertical_spacing']) && !empty($sfsi_section8['sfsi_plus_post_icons_vertical_spacing'])) ? $sfsi_section8['sfsi_plus_post_icons_vertical_spacing']: 5;    

	    $icons_size = $sfsi_section8['sfsi_plus_post_icons_size'];	  
	    $extra      = 0;
	    
	    /* built the main widget div */
	    $icons_main ='<div class="sfsiplus_norm_row sfsi_plus_wDivothr" id="sfsi_plus_wDivothrWid">';

	    $icons="";
		$icons .= '<style type="text/css">.sfsibeforpstwpr .sfsiplus_norm_row.sfsi_plus_wDivothr .sfsi_plus_wicons:nth-child(2) {margin-left: 5px !important;} .sfsibeforpstwpr .sfsiplus_norm_row.sfsi_plus_wDivothr .sfsi_plus_wicons, .sfsiaftrpstwpr .sfsiplus_norm_row.sfsi_plus_wDivothr .sfsi_plus_wicons{width: '.$icons_size.'px !important;height: '.$icons_size.'px !important; margin-left: '.$icons_space.'px !important;margin-bottom: '.$icons_space_vertical.'px !important;}</style>';
	    
		/* loop through icons and bulit the icons with all settings applied in admin */
		if (wp_is_mobile() && 'yes' == $sfsi_section8['sfsi_plus_beforeafterposts_show_on_mobile'])
		{
			// Show on mobile yes
				$arrOrderIcons = sfsi_premium_get_icons_order($sfsi_section5,$sfsi_premium_section1_options);
				$arrData       = sfsi_premium_get_icons_html($arrOrderIcons,$sfsi_premium_section1_options);
				$icons 		  .= $arrData['html'];
		}
		else if($sfsi_section8['sfsi_plus_beforeafterposts_show_on_desktop'] == 'yes')
		{
				$arrOrderIcons = sfsi_premium_get_icons_order($sfsi_section5,$sfsi_premium_section1_options);
				$arrData       = sfsi_premium_get_icons_html($arrOrderIcons,$sfsi_premium_section1_options);
				$icons 		  .= $arrData['html'];    	
		}
		 
	    $icons.='</div >';
	    $icons_main.=$icons;
	    
		/* if floating of icons is active create a floater div */
	    $icons_float='';
	    $icons_data=$icons_main.$icons_float;
	    return $icons_data;
	}
}
?>