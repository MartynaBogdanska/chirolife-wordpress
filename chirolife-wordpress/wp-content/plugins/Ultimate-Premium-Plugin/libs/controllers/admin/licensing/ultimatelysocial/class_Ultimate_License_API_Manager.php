<?php
class Ultimate_License_API_Manager extends License_API_Manager{

	public function activate_license($license_key){

			$message = '';

			// data to send in our API request
			$api_params = array(
				'edd_action' => 'activate_license',
				'license'    => $license_key,
				'item_name'  => urlencode($this->item_id), // the name of our product in EDD
				'url'        => $this->siteurl
			);
			
			// Call the custom API.
			$response = wp_remote_post( $this->apiurl, array( 'timeout' => 30, 'sslverify' => false, 'body' => $api_params ) );

			// make sure the response came back okay
			if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
				$getError = $response->get_error_message();
				$message =  ( is_wp_error( $response ) && ! empty($getError) ) ? $getError : __( 'An error occurred, please try again.' );
			}
			else
			{
				$license_data = json_decode(wp_remote_retrieve_body($response));

				if(false === $license_data->success)
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
							$message = __( 'Invalid license. Please check that you have selected the correct option (if you bought the plugin on Sellcodes or directly on Ultimatelysocial)');
						break;

						case 'invalid' :
						case 'site_inactive' :
							$message = __( 'Your license is not active for this URL.' );
						break;

						case 'item_name_mismatch' :
							$message = sprintf( __( 'This appears to be an invalid license key for %s.' ), $this->item_id );
						break;

						case 'no_activations_left':
							$message = __( 'Your license key has reached its activation limit.' );
						break;

						default :
							$message = __( 'An error occurred, please try again.' );
						break;
					}
				}
				else{
					$message = $license_data;
				}
			}
			return $message;
	}

	public function deactivate_license($license_key){

		$message = "";

		// data to send in our API request
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $license_key,
			'item_name'  => urlencode($this->item_id), // the name of our product in EDD
			'url'        => SITEURL
		);

		// Call the custom API.
		$response = wp_remote_post( $this->apiurl, array( 'timeout' => 30, 'sslverify' => false, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			$getError = $response->get_error_message();
			$message  = ( is_wp_error( $response ) && ! empty($getError) ) ? $getError : __( 'An error occurred, please try again.' );
		}
		else{
			
			$license_data = json_decode(wp_remote_retrieve_body($response));
			
			if(isset($license_data->license) && !empty($license_data->license) && strtolower($license_data->license) == 'deactivated' || strtolower($license_data->license) == 'failed') {
				$message = "";
			}
			else{
				$message = __( 'License key deactivation failed for your site.' );
			}
		}
		return $message;
	}

	public static function check_license(){

		$license_api_name = get_sfsi_active_license_api_name();
		$license 		  = get_option($license_api_name.'_license_key');

		$api_params = array(
			'edd_action' => 'check_license',
			'license'    => $license,
			'item_name'  => urlencode(ULTIMATELYSOCIAL_PRODUCT),
			'url'        => SITEURL
		);

		// Call the custom API.
		$response = wp_remote_post(ULTIMATELYSOCIAL_API_URL, array( 'timeout' => 30, 'sslverify' => false, 'body' => $api_params ) );
		if (is_wp_error($response))
			return false;

		$license_data = json_decode(wp_remote_retrieve_body($response));

		if('valid' == strtolower($license_data->license))
		{
			return true;
		}
		else
		{
			return false;
		}
	}		
}
?>