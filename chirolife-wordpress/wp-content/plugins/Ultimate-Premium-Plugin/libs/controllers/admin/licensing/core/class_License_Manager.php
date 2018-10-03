<?php
if ( ! class_exists( 'License_Manager') ) {
	
   class License_Manager {

		protected $license_page      	= '';
		protected $license_menu      	= '';
		protected $license_api_manager  = '';
		protected $license_renew_text	= '';	

		// name of network whose licensing system we are using i.e. ultimatelyscoial, sellcodes. This will be used as key to uniquely identification of licensing

		/**
		 * Class constructor.
		 *
		 * @uses trailingslashit()
		 * @param string  $_api_url      The URL pointing to the custom API endpoint.
		 * @param string  $item_id 		 Plugin's product id/name.
		 * @param string   $license_page  Optional data to send with API calls.
		 */
		public function __construct($license_page,$license_menu,$license_api_manager,$license_renew_text) {

			$this->license_page  	  = $license_page;
			$this->license_menu  	  = $license_menu;
			$this->license_api_manager= $license_api_manager;
			$this->license_renew_text = $license_renew_text;

			add_action('admin_init', array(&$this,'register_option'));
			add_action('admin_init', array(&$this,'activate_license'));
			add_action('admin_init', array(&$this,'deactivate_license'));
			add_action('admin_notices', array(&$this,'admin_license_notices'));								
		}

		public function sanitize_license($new){
			
			$license_api_name = get_sfsi_active_license_api_name();

			$old = get_option( $license_api_name.'_license_key' );
			
			if(isset($old) && !empty($old) && isset($new) && !empty($new) && $old != $new )
			{
				// new license has been entered, so must reactivate
				delete_option($license_api_name.'_license_status');
				delete_option($license_api_name.'_license_expiry');
			}
			return $new;
		}

		public function register_option()
		{			
			// creates our settings in the options table
			$license_api_name = get_sfsi_active_license_api_name();
			register_setting($license_api_name.'_license', $license_api_name.'_license_key', array($this, 'sanitize_license') );
		}


		public static function validate_license(){

			$isLicenseValid = false;
			
			$license = trim(get_option(get_sfsi_active_license_api_name().'_license_key'));

			if(isset($license) && !empty($license)){

				$licenseStatus = trim(get_option(get_sfsi_active_license_api_name().'_license_status'));

				if(isset($licenseStatus) && !empty($licenseStatus) && "valid" == strtolower($licenseStatus)){
					$isLicenseValid = true;
				}
			}

			return $isLicenseValid;
		}


		public function activate_license(){

			$license_api_name  = get_sfsi_active_license_api_name();
			$license_menu_slug = $this->license_menu->get_menu_slug();

			if( isset($_POST[$license_api_name.'_license_activate'] ) && !empty($_POST[$license_api_name.'_license_key']) )
			{
				update_option($license_api_name.'_license_key', trim($_POST[$license_api_name.'_license_key']) );
				
				// run a quick security check
			 	if( ! check_admin_referer( $license_api_name.'_nonce', $license_api_name.'_nonce' ) )
					return; // get out if we didn't click the Activate button

				// retrieve the license from the database
				$license_key = trim(get_option( $license_api_name.'_license_key' ) );
				$message = $this->license_api_manager->activate_license($license_key);

				//Check if anything passed on a message constituting a failure
				$base_url = admin_url( 'plugins.php?page='.$license_menu_slug);
				
				if (is_string($message) && !empty($message))
				{
					$redirect = add_query_arg( array( 'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );
					wp_redirect( $redirect );
					exit();
				}
				
				$redirect = add_query_arg( array( 'sl_activation' => 'true', 'message' => 'true'), $base_url );
				
				update_option( $license_api_name.'_license_status', $message->license );
				update_option( $license_api_name.'_license_activated', 'yes');
				update_option( $license_api_name.'_license_expiry', $message->expires);
						
				wp_redirect($redirect);
				exit();

			}
		}

		public function deactivate_license(){
		
			$license_api_name  = get_sfsi_active_license_api_name();
			$license_menu_slug = $this->license_menu->get_menu_slug();

			if( isset( $_POST[$license_api_name.'_license_deactivate'] ) && !empty($_POST[$license_api_name.'_license_key']) )
			{
				update_option($license_api_name.'_license_key', trim($_POST[$license_api_name.'_license_key']) );
				
				// run a quick security check
			 	if( ! check_admin_referer($license_api_name.'_nonce',$license_api_name.'_nonce' ) )
					return; // get out if we didn't click the Activate button

				// retrieve the license from the database
				$license_key = trim(get_option($license_api_name.'_license_key' ) );

				$message = $this->license_api_manager->deactivate_license($license_key);
				
				$base_url = admin_url( 'plugins.php?page='.$license_menu_slug);
				
				if (!empty($message))
				{
					$redirect = add_query_arg( array( 'sl_activation' => 'false', 'message' => urlencode($message) ), $base_url );
					wp_redirect( $redirect );
					exit();
				}
				else{

					delete_option($license_api_name.'_license_status');
					delete_option($license_api_name.'_license_activated');
					delete_option($license_api_name.'_license_expiry');

					$message = _('Your license is deactivated.');

					$redirect = add_query_arg( array('sl_activation' => 'success','message' => urlencode($message) ), $base_url );
					wp_redirect($redirect);
					exit();			
				}						
			}
		}

		public function admin_license_notices(){

			$license_api_name  = get_sfsi_active_license_api_name();

			if (isset($_GET['sl_activation']) && !empty($_GET['message']))
			{
				switch( $_GET['sl_activation'] )
				{
					case 'false':
						$message = urldecode( $_GET['message'] );
						?>
						<div class="error">
							<p><?php echo $message; ?></p>
						</div>
						<?php
					break;

					case 'true':					
						$link = '<a href="'.admin_url( 'admin.php?page=sfsi-plus-options').'">Click here</a>';
						$message = "Your license is activated now. Please go to the plugin's settings page to configure it: ".$link;
						?>
						<div class="notice notice-success">
							<p><?php echo $message; ?></p>
						</div>
						<?php
					break;

					case "success":
						$message = urldecode( $_GET['message'] );
						?>
						<div class="error">
							<p><?php echo $message; ?></p>
						</div>
						<?php					
				}
			}
			
			$expiration = get_option($license_api_name.'_license_expiry');
			
			$license = trim(get_option($license_api_name.'_license_key'));

			if(isset($expiration) && !empty($expiration) && "unlimited" !== strtolower($expiration))
			{
				$expiryDate 	= strtotime($expiration);
				$currentDate	= strtotime(date("Y-m-d H:i:s"));
				
				if($expiryDate < $currentDate)
				{
					echo '<div class="error sfsi_premium_error">
						<p>Your Ultimate Social Media Plugin license expired on '.date('d F Y', $expiryDate).'. Please renew it here: <a href="'.$this->renewLink().'" target="_blank">'.$this->license_renew_text.'</a></p>
					</div>';
				}
			}
		}

		public static function supportLink(){

		    $license_api_name = (false === get_option('sfsi_active_license_api_name')) ? ULTIMATELYSOCIAL_LICENSING: get_option('sfsi_active_license_api_name');
		    $license 		  = trim(get_option($license_api_name.'_license_key'));

		    $supportLink = 'javascript:void(0)';

		    if(ULTIMATELYSOCIAL_LICENSING === $license_api_name){
		    	$supportLink = 'https://www.ultimatelysocial.com?url='.get_bloginfo('url').'&license='.$license.'#supportRequest';
		    }
		    else if(SELLCODES_LICENSING === $license_api_name){
		    	$supportLink = 'https://www.ultimatelysocial.com?product_id='.SELLCODES_PRODUCT.'&url='.get_bloginfo('url').'&license='.$license.'#supportRequest';
		    } 
		    return $supportLink;   
		}

		private function renewLink(){

		    $license_api_name = (false === get_option('sfsi_active_license_api_name')) ? ULTIMATELYSOCIAL_LICENSING: get_option('sfsi_active_license_api_name');
		    $license 		  = trim(get_option($license_api_name.'_license_key'));

		    $renewLink = 'javascript:void(0)';

		    if(ULTIMATELYSOCIAL_LICENSING === $license_api_name){
		    	$renewLink = 'https://www.ultimatelysocial.com/checkout/?edd_license_key='.$license.'&download_id=150';
		    }
		    else if(SELLCODES_LICENSING === $license_api_name){
		    	$renewLink = 'https://sellcodes.com/XdHlrQnc';
		    } 
		    return $renewLink;   
		}				
  }

}
?>