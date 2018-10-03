<?php 
 /* show a pop on the as per user chose under section 7 */
function sfsi_plus_frontPopUp ()
{ 
	if(sfsi_is_icons_showing_on_front() && false!= License_Manager::validate_license()){
		
		$option7 	= 	unserialize(get_option('sfsi_premium_section7_options',false));
     
		if (wp_is_mobile())
		{
			if(isset($option7['sfsi_plus_popup_show_on_mobile']) && $option7['sfsi_plus_popup_show_on_mobile'] == 'yes')
			{
				ob_start();
				
				echo sfsi_plus_FrontPopupDiv();					

				echo $output=ob_get_clean();
			}
		}
		else
		{
			if(isset($option7['sfsi_plus_popup_show_on_desktop']) && $option7['sfsi_plus_popup_show_on_desktop'] == 'yes')
			{
				ob_start();

				echo sfsi_plus_FrontPopupDiv();					

				echo $output=ob_get_clean();
			}
		}     
	}
}
/* check where to be pop-shown */
function sfsi_plus_get_icon_show_cookie_expiration_time(){

	$popTime = false;

	$option7 = unserialize(get_option('sfsi_premium_section7_options',false));	

	if(isset($option7['sfsi_plus_popup_limit']) && "yes" == $option7['sfsi_plus_popup_limit']){
		$limit_count =  (isset($option7['sfsi_plus_popup_limit_count'])) ? $option7['sfsi_plus_popup_limit_count']: 1;
		$limit_type	 =  (isset($option7['sfsi_plus_popup_limit_type']) && "day" == $option7['sfsi_plus_popup_limit_type']) ? 				24*3600: 3600;
		// Get pop up cookie expiration Time
		$popTime = (int) $limit_count	* (int) $limit_type;
	}

	return $popTime;

}
function sfsi_plus_shallShowPopup(){

	$shallShowPopup = true;

	$popTime = sfsi_plus_get_icon_show_cookie_expiration_time();

	if(false != $popTime && isset($_COOKIE['sfsi_popup'])){
			
		$diff = ( (int) $_COOKIE['sfsi_popup'] - time() ) < $popTime;
		
		if($diff){
			$shallShowPopup =  false;
		}
	}

	return $shallShowPopup;
}


function sfsi_plus_check_PopUp($content)
{
	if(sfsi_is_icons_showing_on_front() && false!= License_Manager::validate_license()){

		global $post; global $wpdb;
		
		$option7 = unserialize(get_option('sfsi_premium_section7_options',false));

		$sfsi_plus_popup_limit_count	= 	(isset($option7['sfsi_plus_popup_limit_count']))
		 										? $option7['sfsi_plus_popup_limit_count']
												: 1;
		$sfsi_plus_popup_limit_type		=  (isset($option7['sfsi_plus_popup_limit_type']) &&
												$option7['sfsi_plus_popup_limit_type'] == "day")
		 										? (24*3600)
												: (3600);
												
		// Get pop up cookie expiration Time
		$popTime = (int) $sfsi_plus_popup_limit_count	* (int) $sfsi_plus_popup_limit_type;

		$isShowingPopup = false;

	    if("everypage"==$option7['sfsi_plus_Show_popupOn'])
		{
			$isShowingPopup = true;
		 	$content = sfsi_plus_frontPopUp().$content;
	    }
		
		else if("somepages" == $option7['sfsi_plus_Show_popupOn'])								
	    {   
	    	if("blogpage" == $option7['sfsi_plus_Show_popupOn_somepages_blogpage']){
			   	
			   	if(!is_feed() && !is_home() && !is_page())
				{
					$isShowingPopup = true;

				     $content=  sfsi_plus_frontPopUp().$content;
			    }	    		
	    	}

	    	if("selectedpage" == $option7['sfsi_plus_Show_popupOn_somepages_selectedpage']){
			 	
			 	if(!empty($post->ID) && !empty($option7['sfsi_plus_Show_popupOn_PageIDs']))
				{
					if(is_page() && in_array($post->ID,  unserialize($option7['sfsi_plus_Show_popupOn_PageIDs'])))
					{
						$isShowingPopup = true;
						$content=  sfsi_plus_frontPopUp().$content;
					}
				}	    		
	    	}
	    }
		
		if(false != $isShowingPopup){
			$sfsi_plus_Hide_popupOn_OutsideClick = $option7['sfsi_plus_Hide_popupOn_OutsideClick'];
			sfsi_plus_script_to_add_to_hide_popup($sfsi_plus_Hide_popupOn_OutsideClick,$option7);			
		}

	?>	
		<script type="text/javascript">

			var __limit 				  =  '<?php echo $option7['sfsi_plus_popup_limit']; ?>';

			function sfsi_plus_setCookie(name, value, time) {
			    var date = new Date();
			    date.setTime(date.getTime() + (time * 1000));
			    document.cookie = name + "=" + value + "; expires=" + date.toGMTString() + "; path=/";
			}

			function sfsi_plus_getCookie(name) {
			    var nameEQ = name + "=";
			    var ca = document.cookie.split(';');
			    for (var i = 0; i < ca.length; i++) {
			        var c = ca[i];
			        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length)
			    }
			    return null;
			}

			function sfsi_plus_eraseCookie(name) {
			    sfsi_plus_setCookie(name, null, -1)
			}

			// Returns timestamp in seconds
			function sfsi_plusGetCurrentUTCTimestamp(){
				var tmLoc = new Date();
	    		//The offset is in minutes -- convert it to ms
	    		var timeStamp = (tmLoc.getTime() + tmLoc.getTimezoneOffset() * 60000)/1000;
	    		return Math.floor(timeStamp);
			}

			function sfsi_plusGetCurrentTimestamp(){
				var tmLoc = new Date();
	    		//The offset is in minutes -- convert it to ms
	    		var timeStamp = (tmLoc.getTime())/1000;
	    		return Math.floor(timeStamp);
			}		

			function sfsi_plus_is_null_or_undefined(value){
			    
			    var type = Object.prototype.toString.call(value);

			    if("[object Null]" == type || "[object Undefined]" == type){
			        return true;
			    }

			    return false;
			}

			var __popTime = <?php echo $popTime; ?>;

			function sfsi_plusShallShowPopup(_popUpTime){

				var _popUpTime		  = parseInt(_popUpTime);
				var _currTimestamp    = parseInt(sfsi_plusGetCurrentTimestamp());
				var _sfsi_popupCookie = parseInt(sfsi_plus_getCookie('sfsi_popup'));

				_shallShowPopup = true;

				if(false != _popUpTime && typeof _sfsi_popupCookie != 'undefined' && _sfsi_popupCookie!=null){
						
					_diff = ( _sfsi_popupCookie - _currTimestamp ) < _popUpTime;
					
					if(_diff){
						_shallShowPopup =  false;
					}
				}

				return _shallShowPopup;

			}
			
			function sfsi_plus_hidemypopup()
			{
				SFSI(".sfsi_plus_FrntInner").fadeOut("fast");

				<?php if(in_array("leavePage", $option7['sfsi_plus_Shown_pop'])) { ?>popUpOnLeavePage = false;<?php } ?>

				 if(__limit == "yes") {				
				 	sfsi_plus_setCookie("sfsi_popup","yes",__popTime);
				}
			}
	    </script>
   	<?php

	    /* check for pop times */
	    if(isset($option7['sfsi_plus_Shown_pop']) && !empty($option7['sfsi_plus_Shown_pop'])){
	    	sfsi_plus_script_to_add_to_show_popup($option7['sfsi_plus_Shown_pop'],$option7);
	    }
	}	   
	return $content;
}

function sfsi_plus_script_to_add_to_hide_popup($sfsi_plus_Hide_popupOn_OutsideClick,$option7=false){ 

	ob_start(); 

	$option7 = false != $option7 ? $option7 :unserialize(get_option('sfsi_premium_section7_options',false));

	$option7['sfsi_plus_popup_limit'] = isset($option7['sfsi_plus_popup_limit']) && !empty($option7['sfsi_plus_popup_limit']) ? "yes" : "no";

	if("yes" != $option7['sfsi_plus_popup_limit']){
		unset($_COOKIE['sfsi_popup']);
		setcookie('sfsi_popup', null, time() - 3600, '/'); 
	}
	?>

	<script type="text/javascript">

	jQuery(document).ready(function(e) {

		var _Hide_popupOn_OutsideClick = '<?php echo $sfsi_plus_Hide_popupOn_OutsideClick; ?>';
		_Hide_popupOn_OutsideClick     = 0 == _Hide_popupOn_OutsideClick.length ? "no" : _Hide_popupOn_OutsideClick;

		if("yes" != __limit){
			sfsi_plus_eraseCookie('sfsi_popup');			
		}

		if("yes"==_Hide_popupOn_OutsideClick){

			jQuery(document).on("click",function(event){

				var cookieVal  = sfsi_plus_getCookie("sfsi_popup");
				
				if(sfsi_plus_is_null_or_undefined(cookieVal) && ("yes" == __limit))
				{
					sfsi_plus_setCookie("sfsi_popup","yes",__popTime);
				}
				if(
					e(event.target).parents('.sfsi_plus_outr_div').length==0
				){
					e('.sfsi_plus_outr_div').hide();
				};
			});
		}

	});
		</script>
	<?php
	
	echo $output=ob_get_clean();
}

function sfsi_plus_script_to_add_to_show_popup($popUpCondition,$option7=false){

	$option7 = false != $option7 ? $option7: unserialize(get_option('sfsi_premium_section7_options',false));

	$popTime = sfsi_plus_get_icon_show_cookie_expiration_time();

	if (in_array('once', $popUpCondition)){
		sfsi_plus_show_popup_once($option7,$popTime);
	}
	
	if (in_array('ETscroll', $popUpCondition)){
		sfsi_plus_show_popup_ETscroll($option7,$popTime);			
	}
	
	if (in_array('leavePage', $popUpCondition)){
		sfsi_plus_show_popup_Leavepage($option7,$popTime);
	}
}


function sfsi_plus_show_popup_once($option7,$popTime){

	if(isset($option7['sfsi_plus_Shown_popupOnceTime'])){

		$time_popUp = (int) $option7['sfsi_plus_Shown_popupOnceTime'];
		$time_popUp = $time_popUp*1000;
	 	ob_start();
		?>
	    <script>
			
			jQuery(document).ready(function($)
			{	
				if("yes" != __limit){
					sfsi_plus_eraseCookie('sfsi_popup');	
				}

				var cookieVal  = sfsi_plus_getCookie("sfsi_popup");

				if(sfsi_plus_is_null_or_undefined(cookieVal))
				{
					setTimeout(
						function()
						{	
							jQuery('.sfsi_plus_outr_div').css({'z-index':'1000000',opacity:1});
							jQuery('.sfsi_plus_outr_div').fadeIn();
							jQuery('.sfsi_plus_FrntInner').fadeIn(200);

							if("yes" == __limit){
								sfsi_plus_setCookie("sfsi_popup","yes",__popTime);									
							}

						},<?php echo $time_popUp; ?>
					);
				}
			});
	    </script>
	    <?php 
	 	echo $output=ob_get_clean();		
	}
}

function sfsi_plus_show_popup_ETscroll($option7,$popTime){
	
	ob_start();

	$sfsi_plus_Hide_popupOnScroll = $option7['sfsi_plus_Hide_popupOnScroll']; ?>
 	
 	<script>

 	if(typeof jQuery !== 'undefined'){

	    jQuery(document).ready(function($) {

			if("yes" != __limit){
				sfsi_plus_eraseCookie('sfsi_popup');		
			}

		    jQuery(document).scroll(function($)
			{
				var cookieVal = sfsi_plus_getCookie("sfsi_popup");
				
				if(sfsi_plus_is_null_or_undefined(cookieVal))
				{
					var y = jQuery(this).scrollTop();

					var _Hide_popupOnScroll = '<?php echo $sfsi_plus_Hide_popupOnScroll; ?>';
					_Hide_popupOnScroll     = 0 ==_Hide_popupOnScroll.length ? 'no' : _Hide_popupOnScroll;   

					if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
					{	 
						if(jQuery(window).scrollTop() + jQuery(window).height() >= jQuery(document).height()-100)
						{
						  jQuery('.sfsi_plus_outr_div').css({'z-index':'9996',opacity:1,top:jQuery(window).scrollTop()+"px",position:"absolute"});
						  jQuery('.sfsi_plus_outr_div').fadeIn(200);
						  jQuery('.sfsi_plus_FrntInner').fadeIn(200);

							if("yes" == __limit){
								sfsi_plus_setCookie("sfsi_popup","yes",__popTime);									
							}

						}
						else
						{
							if("yes" == _Hide_popupOnScroll){
								jQuery('.sfsi_plus_outr_div').fadeOut();
								jQuery('.sfsi_plus_FrntInner').fadeOut();										
							}
						}
					}
					else
					{
						if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height())
						{
							jQuery('.sfsi_plus_outr_div').css({'z-index':'9996',opacity:1,top:jQuery(window).scrollTop()+200+"px",position:"absolute"});
							jQuery('.sfsi_plus_outr_div').fadeIn(200);
							jQuery('.sfsi_plus_FrntInner').fadeIn(200);

							if("yes" == __limit){
								sfsi_plus_setCookie("sfsi_popup","yes",__popTime);									
							}

						}
						else
						{
							if("yes" == _Hide_popupOnScroll){
								jQuery('.sfsi_plus_outr_div').fadeOut();
								jQuery('.sfsi_plus_FrntInner').fadeOut();										
							}									
						}
					}					
				}
			});
		});
 	}	
	</script>
	<?php 
 	echo $output=ob_get_clean();
}

function sfsi_plus_show_popup_Leavepage($option7,$popTime){
	ob_start();?>
	<script>
		var popUpOnLeavePage = false;

		function addEvent(obj, evt, fn) {
			if (obj.addEventListener) {
				obj.addEventListener(evt, fn, false);
			}
			else if (obj.attachEvent) {
				obj.attachEvent("on" + evt, fn);
			}
		}
		addEvent(document, 'mousemove', function(evt) {

			var cookieVal = sfsi_plus_getCookie("sfsi_popup");
				
			if(sfsi_plus_is_null_or_undefined(cookieVal))
			{
				var popUpOnLeavePage = evt.clientY > 0 ? false :true;				

				if(popUpOnLeavePage){

					//var top = jQuery(window).scrollTop();

					var top = (jQuery(window).height() - jQuery('.sfsi_plus_outr_div').height() ) / 2 - 100 + "px";

					jQuery('.sfsi_plus_outr_div').css({
							'z-index':'9996',
							opacity:1,
							top:top,
							position:"absolute"
							//top:jQuery(window).scrollTop()+200+"px",
							//position:"fixed"
					});
					jQuery('.sfsi_plus_outr_div').fadeIn(200);
					jQuery('.sfsi_plus_FrntInner').fadeIn(200);

					if("yes" == __limit){
						sfsi_plus_setCookie("sfsi_popup","yes",__popTime);									
					}
				}				
			}

		});

		var SFSI = jQuery.noConflict();

	</script>
	<?php
	echo $output=ob_get_clean();
}

/* make front end pop div */
function sfsi_plus_FrontPopupDiv()
{
	if(false!= License_Manager::validate_license()){
	
		$icons = "";
		$option7 			= unserialize(get_option('sfsi_premium_section7_options',false));
	    $sfsi_section4 		= unserialize(get_option('sfsi_premium_section4_options',false)); 
	            
		//************************************** Get settings for popup STARTS ****************************************//
	    
	    /* calculate the width and icons display alignments */
	    $heading_text 		=	(isset($option7['sfsi_plus_popup_text'])) ? $option7['sfsi_plus_popup_text']
									: '';
									
	    $div_bgColor		= 	(isset($option7['sfsi_plus_popup_background_color']))
									? $option7['sfsi_plus_popup_background_color']." !important;"
									: '#fff !important';
									
	    $div_FontFamily 	= 	(isset($option7['sfsi_plus_popup_font']))
									? $option7['sfsi_plus_popup_font']." !important"
									: 'Arial !important;';
	    $div_BorderColor	= 	(isset($option7['sfsi_plus_popup_border_color']))
									? $option7['sfsi_plus_popup_border_color']." !important"
									: '#d3d3d3 !important;';
	    $div_Fonttyle		= 	(isset($option7['sfsi_plus_popup_fontStyle']))
									? $option7['sfsi_plus_popup_fontStyle']." !important"
									: 'normal !important;';
	    $div_FontColor		= 	(isset($option7['sfsi_plus_popup_fontColor']))
									? $option7['sfsi_plus_popup_fontColor']." !important"
									: '#000 !important;';
	    $div_FontSize		= 	(isset($option7['sfsi_plus_popup_fontSize']))
									? $option7['sfsi_plus_popup_fontSize']."px !important"
									: '26px !important';
	    $div_BorderTheekness= 	(isset($option7['sfsi_plus_popup_border_thickness']))
									? $option7['sfsi_plus_popup_border_thickness']
									: '1';
	    $div_Shadow			= 	(isset($option7['sfsi_plus_popup_border_shadow']) &&
								$option7['sfsi_plus_popup_border_shadow']=="yes")
									? $option7['sfsi_plus_popup_border_thickness']." !important;"
									: 'no !important;'; 
	    
	    $style = "background-color:".$div_bgColor.";border:".$div_BorderTheekness."px solid".$div_BorderColor."; font-style:".$div_Fonttyle.";color:".$div_FontColor;

	    if($option7['sfsi_plus_popup_border_shadow']=="yes")
	    {
	       $style.=";box-shadow:12px 30px 18px #CCCCCC;";
	    }    
	    
		$h_style="font-family:".$div_FontFamily.";font-style:".$div_Fonttyle.";color:".$div_FontColor.";font-size:".$div_FontSize;
	    
		//************************************* Get settings for popup CLOSES ****************************************//

	   
		$closeFunction = "sfsi_plus_hidemypopup();";

		//************************************* GENERATING FINAL HTML FOR POPUP starts ****************************************//

		$icons = '<div class="sfsi_plus_outr_div" > <div class="sfsi_plus_FrntInner" style="'.$style.'">';
		$icons.='<div class="sfsiclpupwpr" onclick="'.$closeFunction.'"><img src="'.SFSI_PLUS_PLUGURL.'images/close.png" alt="close" /></div>';
		
		if(!empty($heading_text))
		{
			$icons.='<h2 style="'.$h_style.'">'.sfsi_premium_nl2br($heading_text).'</h2>';
		}
	    
		$ulmargin="";
	    
	    if(isset($sfsi_section4['sfsi_plus_display_counts']) && $sfsi_section4['sfsi_plus_display_counts']=="no")
	    {
			$ulmargin="margin-bottom:0px";
	    }

	    if(isset($option7['sfsi_plus_popup_type_iconsOrForm']) && $option7['sfsi_plus_popup_type_iconsOrForm']=="form"){
	    	$icons.= sfsi_plus_get_subscriberForm($ulmargin);    		
	    }
	    else{
	    	$icons.= sfsi_plus_icons_html($ulmargin);    		    	
	    }

		$icons.='</div></div>';

		//*************************** GENERATING FINAL HTML FOR POPUP closes ****************************************/    
	    return $icons;
	}
}

function sfsi_plus_icons_html($ulmargin){
   
   $icons='';

   $option7 					  = unserialize(get_option('sfsi_premium_section7_options',false));
   $option1 					  = unserialize(get_option('sfsi_premium_section1_options',false));

   $sfsi_section5 				  = unserialize(get_option('sfsi_premium_section5_options',false));  
   $custom_i 					  = unserialize($option1['sfsi_custom_files']);
    
   	if(sfsi_premium_is_any_standard_icon_selected()){
	
	/* make icons with all settings saved in admin  */
	    
	    if (wp_is_mobile())
		{
			// Show on mobile yes
			if(isset($option7['sfsi_plus_popup_show_on_mobile']) && $option7['sfsi_plus_popup_show_on_mobile'] == 'yes')
			{
				$arrOrderIcons = sfsi_premium_get_icons_order($sfsi_section5,$option1);

		        if( !empty($arrOrderIcons) ){

	    			$icons.='<ul style="'.$ulmargin.'">';

					$arrData = sfsi_premium_get_icons_html($arrOrderIcons,$option1,true,true);

					$icons.= $arrData['html'];

					$icons.='</ul>';

	      		}
	      			
			}
		}
		else
		{
			if(isset($option7['sfsi_plus_popup_show_on_desktop']) && $option7['sfsi_plus_popup_show_on_desktop'] == 'yes')
			{
				$arrOrderIcons = sfsi_premium_get_icons_order($sfsi_section5,$option1);

		        if( !empty($arrOrderIcons) ){

	    			$icons.='<ul style="'.$ulmargin.'">';

					$arrData = sfsi_premium_get_icons_html($arrOrderIcons,$option1,true,true);

					$icons.= $arrData['html'];

					$icons.='</ul>';
		            
	      		}			

			}
		}

   	}

	return $icons;	        
}

function sfsi_plus_subscribe_form_html($ulmargin){
	$icons.='<ul style="'.$ulmargin.'">';
	$icons.= sfsi_plus_get_subscriberForm();
	$icons.= '</ul>';
	return  $icons;
}
?>