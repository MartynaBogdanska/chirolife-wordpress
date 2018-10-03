<?php
/* make icons float icons even widget is not active  */
function sfsi_plus_frontFloter ($content)
{
	//if(!sfsi_plus_icon_exclude() && false!= License_Manager::validate_license())
	if(sfsi_plus_shall_show_icons())
	{
		$sfsi_section8=  unserialize(get_option('sfsi_premium_section8_options',false));

		if(isset($sfsi_section8['sfsi_plus_float_on_page']) && $sfsi_section8['sfsi_plus_float_on_page']=="yes") :
			
			ob_start();
			/* call the all icons function under sfsi_plus_widget.php file */
			if (wp_is_mobile())
			{
				if(isset($sfsi_section8['sfsi_plus_float_show_on_mobile']) && $sfsi_section8['sfsi_plus_float_show_on_mobile'] == 'yes')
				{
					echo sfsi_plus_check_mobile_visiblity(1);
				}
			}
			else
			{
				if(isset($sfsi_section8['sfsi_plus_float_show_on_desktop']) && $sfsi_section8['sfsi_plus_float_show_on_desktop'] == 'yes')
				{
					echo sfsi_plus_check_visiblity(1);
				}
			}         
			echo $output=ob_get_clean();			
			$res= $content.$output;
			return $res; exit;
		endif;
	}
}

?>