<?php
include_once(SFSI_PLUS_LICENSING.'core/class_License_Page.php');
include_once(SFSI_PLUS_LICENSING.'core/class_License_Menu.php');
include_once(SFSI_PLUS_LICENSING.'core/class_License_API_Manager.php');
include_once(SFSI_PLUS_LICENSING.'core/class_License_Manager.php');

include_once(SFSI_PLUS_LICENSING.'ultimatelysocial/class_Ultimate_License_API_Manager.php');
include_once(SFSI_PLUS_LICENSING.'sellcodes/class_Sellcodes_License_API_Manager.php');


function get_sfsi_active_license_api_name(){	
	$license_api_name = (false === get_option('sfsi_active_license_api_name')) ? ULTIMATELYSOCIAL_LICENSING: get_option('sfsi_active_license_api_name');	
	return $license_api_name;
}

function plugin_updater()
{
	// retrieve our license key from the DB
	$license_key = trim( get_option( get_sfsi_active_license_api_name().'_license_key' ) );

	if(ULTIMATELYSOCIAL_LICENSING === get_sfsi_active_license_api_name()){

		if( !class_exists( 'Ultimate_Plugin_Updater' ) ) {

			include(SFSI_PLUS_LICENSING.'ultimatelysocial/ultimate_plugin_updater.php');			
		}

		new Ultimate_Plugin_Updater( 'https://www.ultimatelysocial.com', SFSI_PLUS_PLUGINFILE, array(
				'version'   => PLUGIN_CURRENT_VERSION,		    // current version number
				'license'   => $license_key,        // license key (used get_option above to retrieve from DB)
				'item_name' => ULTIMATELYSOCIAL_PRODUCT,  // name of this plugin
				'author'    => 'UltimatelySocial'  // author of this plugin
			)
		);
	}
	else if(SELLCODES_LICENSING === get_sfsi_active_license_api_name()){

		if( !class_exists( 'Sellcodes_Plugin_Updater' ) ) {

			include(SFSI_PLUS_LICENSING.'sellcodes/sellcodes_plugin_updater.php');			
		}

		new Sellcodes_Plugin_Updater( SELLCODES_API_URL, SFSI_PLUS_PLUGINFILE, array(
				'version'    => PLUGIN_CURRENT_VERSION,			  // current version number
				'license'  	 => $license_key,      // license key (used get_option above to retrieve from DB)
				'item_name'  => SELLCODES_PRODUCT  // offer id of this plugin
		 	)
		);
	}
}
add_action('admin_init', 'plugin_updater',PHP_INT_MAX);


function sfsi_license_setup(){

	$license_page         = new License_Page();
	$license_menu         = new License_Menu('USM Plugin License','USM Plugin License','manage_options',"sfsi-license",$license_page);
	$renew_text           = "UltimatelySocial";

	if(ULTIMATELYSOCIAL_LICENSING === get_sfsi_active_license_api_name()){

		$license_api_manager  = new Ultimate_License_API_Manager(ULTIMATELYSOCIAL_API_URL,ULTIMATELYSOCIAL_PRODUCT);

	}
	else if(SELLCODES_LICENSING === get_sfsi_active_license_api_name()){

		$license_api_manager  = new Sellcodes_License_API_Manager(SELLCODES_API_URL,SELLCODES_PRODUCT);
		$renew_text           = "Sellcodes";	
	}		

	$license_manager    = new License_Manager($license_page,$license_menu,$license_api_manager,$renew_text);		
}

if(is_admin()){
	sfsi_license_setup();	
}


?>