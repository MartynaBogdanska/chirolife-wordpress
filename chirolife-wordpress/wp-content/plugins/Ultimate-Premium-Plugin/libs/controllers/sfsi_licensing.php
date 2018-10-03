<?php
/**
 * cREATE MENU FOR LICENSE
 */
function ultimate_license_menu()
{
	add_plugins_page( 'USM Plugin License', 'USM Plugin License', 'manage_options', ULTIMATE_PLUGIN_LICENSE_PAGE, 'ultimate_license_page' );
}
add_action('admin_menu', 'ultimate_license_menu');

/**
 * sETTING PAGE FOR LICENSE ACTIVATION
 */
function ultimate_license_page()
{
	$license = get_option( 'ultimate_license_key' );
	$status  = get_option( 'ultimate_license_status' );
	?>
	<div class="wrap">
		<h2><?php _e('Please enter your license key'); ?></h2>
		<form method="post" action="options.php">

			<?php settings_fields('ultimate_license'); ?>

			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row" valign="top">
							<?php _e('License Key'); ?>
						</th>
						<td>
							<input id="ultimate_license_key" name="ultimate_license_key" type="text" class="regular-text" 
                            	value="<?php esc_attr_e( $license ); ?>" />
						</td>
					</tr>
				</tbody>
			</table>
			
			<?php //submit_button("Check license key"); ?>
            
            <table class="form-table">
            	<?php if( false !== $license ) { ?>
                    <tr valign="middle">
                        <th scope="row">
                            <?php _e('Activate License'); ?>
                        </th>
                        <td>
                            <?php if( $status !== false && $status == 'valid' ) { ?>
                            
                                <span style="color:green; vertical-align:middle"><?php _e('Active'); ?></span>
                                
                                <?php wp_nonce_field( 'ultimate_nonce', 'ultimate_nonce' ); ?>
                                <input type="submit" class="button-secondary" name="ultimate_license_deactivate" 
                                    value="<?php _e('Deactivate License'); ?>"/>
                            
							<?php } else {
                                
								wp_nonce_field( 'ultimate_nonce', 'ultimate_nonce' ); ?>
                                <input type="submit" class="button-secondary" name="ultimate_license_activate" 
                                    value="<?php _e('Activate License'); ?>"/>
                            
							<?php } ?>
                        </td>
                    </tr>
                <?php } else { ?>
                	
                    <tr valign="top">
                        <th scope="row">
                            <?php _e('Activate License'); ?>
                        </th>
                        <td>
                            <?php wp_nonce_field( 'ultimate_nonce', 'ultimate_nonce' ); ?>
                            <input type="submit" class="button-secondary" name="ultimate_license_activate" value="<?php _e('Activate License'); ?>"/>
                        </td>
                    </tr>
                    
				<?php } ?>
            </table>
		</form>
	<?php
}

/**
 * iF KEY IS UPDATE THEN NEED TO ACTVATE AGAIN
 */
function ultimate_register_option()
{
	// creates our settings in the options table
	register_setting('ultimate_license', 'ultimate_license_key', 'ultimate_sanitize_license' );
}
add_action('admin_init', 'ultimate_register_option');

function ultimate_sanitize_license( $new )
{
	$old = get_option( 'ultimate_license_key' );
	
	if( $old && $old != $new )
	{
		// new license has been entered, so must reactivate
		delete_option('ultimate_license_status');
		delete_option('ultimate_license_expiry');
	}
	return $new;
}

/**
 * hANDLE ACTIVATION ACTION
 */
function ultimate_activate_license()
{
	// listen for our activate button to be clicked
	if( isset( $_POST['ultimate_license_activate'] ) && !empty($_POST['ultimate_license_key']) )
	{
		update_option( 'ultimate_license_key', trim($_POST['ultimate_license_key']) );
		
		// run a quick security check
	 	if( ! check_admin_referer( 'ultimate_nonce', 'ultimate_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'ultimate_license_key' ) );

		// data to send in our API request
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
			'item_name'  => urlencode( ULTIMATE_ITEM_NAME ), // the name of our product in EDD
			'url'        => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( ULTIMATE_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			$getError = $response->get_error_message();
			$message =  ( is_wp_error( $response ) && ! empty($getError) ) ? $getError : __( 'An error occurred, please try again.' );

		}
		else
		{
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );
			
			if ( false === $license_data->success )
			{
				switch( $license_data->error )
				{
					case 'expired' :
						$message = sprintf(
							__( 'Your license key expired on %s.' ),
							date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
						);
					break;

					case 'revoked' :
						$message = __( 'Your license key has been disabled.' );
					break;

					case 'missing' :
						$message = __( 'Invalid license.' );
					break;

					case 'invalid' :
					case 'site_inactive' :
						$message = __( 'Your license is not active for this URL.' );
					break;

					case 'item_name_mismatch' :
						$message = sprintf( __( 'This appears to be an invalid license key for %s.' ), ULTIMATE_ITEM_NAME );
					break;

					case 'no_activations_left':
						$message = __( 'Your license key has reached its activation limit.' );
					break;

					default :
						$message = __( 'An error occurred, please try again.' );
					break;
				}

			}

		}

		// Check if anything passed on a message constituting a failure
		$base_url = admin_url( 'plugins.php?page=' . ULTIMATE_PLUGIN_LICENSE_PAGE );
		if (!empty( $message ))
		{
			$redirect = add_query_arg( array( 'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );
			wp_redirect( $redirect );
			exit();
		}

		
		$redirect = add_query_arg( array( 'sl_activation' => 'true', 'message' => 'true'), $base_url );
		
		update_option( 'ultimate_license_status', $license_data->license );
		update_option( 'ultimate_license_activated', 'yes');
		update_option( 'ultimate_license_expiry', $license_data->expires);
				
		wp_redirect( $redirect  );
		exit();
	}
}
add_action('admin_init', 'ultimate_activate_license');

/**
 * hANDLE DEACTIVATE ACTION
 */
function ultimate_deactivate_license()
{
	// listen for our activate button to be clicked
	if( isset( $_POST['ultimate_license_deactivate'] ) )
	{
		// run a quick security check
	 	if( ! check_admin_referer( 'ultimate_nonce', 'ultimate_nonce' ) )
			return; // get out if we didn't click the Activate button

		// retrieve the license from the database
		$license = trim( get_option( 'ultimate_license_key' ) );

		// data to send in our API request
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $license,
			'item_name'  => urlencode(ULTIMATE_ITEM_NAME), // the name of our product in EDD
			'url'        => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( ULTIMATE_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );
		
		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			
			$getError = $response->get_error_message();
			$message =  ( is_wp_error( $response ) && ! empty($getError) ) ? $getError : __( 'An error occurred, please try again.' );

			$base_url = admin_url( 'plugins.php?page='.ULTIMATE_PLUGIN_LICENSE_PAGE);
			$redirect = add_query_arg( array( 'sl_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			wp_redirect( $redirect );
			exit();
		}

		// decode the license data
		$license_data = json_decode(wp_remote_retrieve_body($response));

		// $license_data->license will be either "deactivated" or "failed"
		if(isset($license_data->license) && !empty($license_data->license) && strtolower($license_data->license) == 'deactivated' || strtolower($license_data->license) == 'failed') {
			delete_option('ultimate_license_status');
			delete_option('ultimate_license_activated');
			delete_option('ultimate_license_expiry');
		}

		wp_redirect( admin_url( 'plugins.php?page=' . ULTIMATE_PLUGIN_LICENSE_PAGE ) );
		exit();
	}
}
add_action('admin_init', 'ultimate_deactivate_license');

/**
 * lICENSE CHECK
 */
function ultimate_check_license()
{
	global $wp_version;

	$license = trim( get_option( 'ultimate_license_key' ) );

	$api_params = array(
		'edd_action' => 'check_license',
		'license'    => $license,
		'item_name'  => urlencode( ULTIMATE_ITEM_NAME ),
		'url'        => home_url()
	);

	// Call the custom API.
	$response = wp_remote_post( ULTIMATE_STORE_URL, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

	if ( is_wp_error( $response ) )
		return false;

	$license_data = json_decode( wp_remote_retrieve_body( $response ) );

	if( $license_data->license == 'valid' )
	{
		return true;
		// this license is still valid
	}
	else
	{
		return false;
		// this license is no longer valid
	}
}

/**
 * dISPLAY MESSAGE ON ACTIVATION
 */
function ultimate_admin_notices()
{
	if (
		isset($_GET['sl_activation']) && 
		!empty($_GET['message'])
	)
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
			default:
				$link = '<a href="'.admin_url( 'admin.php?page=sfsi-plus-options').'">Click here</a>';
				$message = "Your license is activated now. Please go to the plugin's settings page to configure it: ".$link;
				?>
				<div class="notice notice-success ">
					<p><?php echo $message; ?></p>
				</div>
				<?php
			break;
		}
	}
	
	$expiration = get_option('ultimate_license_expiry');
	
	$license = trim(get_option('ultimate_license_key'));

	if(isset($expiration) && !empty($expiration))
	{
		$expiryDate 	= strtotime($expiration);
		$currentDate	= strtotime(date("Y-m-d H:i:s"));
		
		if($expiryDate < $currentDate)
		{
			echo '<div class="error sfsi_premium_error">
				<p>Your Ultimate Social Media Plugin license expired on '.date('d F Y', $expiryDate).'. Please renew it here: <a href="https://www.ultimatelysocial.com/checkout/?edd_license_key='.$license.'&download_id=150" target="_blank">UltimatelySocial</a></p>
			</div>';
		}
	}
}
add_action( 'admin_notices', 'ultimate_admin_notices');


function sfsi_validate_license(){

	$isLicenseValid = false;
	
	$license = trim(get_option('ultimate_license_key'));

	if(isset($license) && !empty($license)){

		$licenseStatus = trim(get_option('ultimate_license_status'));

		if(isset($licenseStatus) && !empty($licenseStatus) && "valid" == strtolower($licenseStatus)){
			$isLicenseValid = true;
		}
	}

	return $isLicenseValid;
}
?>