<?php
class Sellcodes_License_API_Manager extends License_API_Manager{
	
	public function activate_license($license_key){

		$message = '';

		// data to send in our API request
		$api_params = array(
			'product_id' 	=> $this->item_id,
			'license_key'   => $license_key,
			'baseurl'       => home_url()
		);


		// Call the custom API.
		$response = wp_remote_post( $this->apiurl."/activate", array( 'timeout' => 30, 'sslverify' => false, 'body' => $api_params ) );
		// make sure the response came back okay
		$httpCode = wp_remote_retrieve_response_code( $response );

		if ( 200 !== $httpCode) {

			switch ($httpCode) {				
				
				case 500:case 0;
				
					$message =  __( 'An error occurred, please try again.' );				
				
				break;

				case 400:
					
					$license_data = json_decode(str_replace("\xEF\xBB\xBF",'',wp_remote_retrieve_body($response)));

					if ( false === $license_data->success){
						$message = $license_data->message;
					}

				break;
			}			
		}
		else
		{
			$license_data = json_decode(str_replace("\xEF\xBB\xBF",'',wp_remote_retrieve_body($response)));

			if ( false === $license_data->success){
				$message = $license_data->message;
			}
			else{

				if(isset($license_data->License_key_valid) && false === $license_data->License_key_valid){
					$message = __( 'Your license key has been disabled.' );
				}

				if(isset($license_data->Activation_ok) && false === $license_data->Activation_ok){
					
					if($license_data->Activation_count == $license_data->Maximum_activations){

						$message = __( 'Your license key has reached its activation limit.' );
					}
				}

				if(empty($message)){
					$message = (object) $message;
					$message->license = "valid";
					$message->expires = "unlimited" === strtolower($license_data->Expiry_date) ? $license_data->Expiry_date: date('Y-m-d H:i:s', $license_data->Expiry_date);
				}				
			}
		}

		return $message;		

	}
	public function deactivate_license($license_key){

		$message = '';

        // data to send in our API request
        $api_params = array(
            'product_id'     => $this->item_id,
            'license_key'    => $license_key,
            'baseurl'        => home_url()
        );

        // Call the custom API.
        $response = wp_remote_post( $this->apiurl."/deactivate", array( 'timeout' => 30, 'sslverify' => false, 'body' => $api_params ) );
        
        // make sure the response came back okay
        if (200 !== wp_remote_retrieve_response_code($response)) {
            
            switch ($httpCode) {                
                
                case 500:case 0;
                
                    $message =  __( 'An error occurred, please try again.' );                
                
                break;

                case 400:
                    
                    $license_data = json_decode(str_replace("\xEF\xBB\xBF",'',wp_remote_retrieve_body($response)));

                    if ( false === $license_data->success){
                        $message = $license_data->message;
                    }

                break;
            }
        }
        else{

        	// decode the license data
        	$license_data = json_decode(str_replace("\xEF\xBB\xBF",'',wp_remote_retrieve_body($response)));

	        // $license_data->license will be either "deactivated" or "failed"
	        if(isset($license_data->success) && isset($license_data->license)) {

	            if(false != strtolower($license_data->success)){

	                if('deactivated' == strtolower($license_data->license)){
	                    $message  = "";                    
	                }
	            }
	            else{
	                if('site_inactive' == strtolower($license_data->license)){
	                    $message  = _('License is not active for the your site.');
	                }
	                if('revoked' == strtolower($license_data->license)){
	                    $message = __( 'Your license key has been disabled.' );
	                }                                                
	            }						
	        }
        }

        return $message;		

	}
	public static function check_license(){

		$license = trim( get_option( SELLCODES_LICENSING.'_license_key' ) );

		$check_api_url = SELLCODES_API_URL."/check_license";

		$api_params = array(
			'product_id'	=> SELLCODES_PRODUCT,
			'license_key' 	=> $license,
			'baseurl'       => SITEURL
		);

		$response = wp_remote_post( $check_api_url, array( 'timeout' => 30, 'sslverify' => false, 'body' => $api_params ) );
		
		$httpCode = wp_remote_retrieve_response_code($response);

		if ( 500 == $httpCode || 0 == $httpCode )
			return false;

		$license_data  = json_decode( str_replace("\xEF\xBB\xBF",'',wp_remote_retrieve_body($response)));

		$license_check = false;

		if(false != isset($license_data->license) && !empty($license_data->license) && strtolower($license_data->license) == 'valid'){

			// Check for updates only when offer is wordpress product & allowing automatic updates
			if(false != isset($license_data->is_wordpress_product)  && false != isset($license_data->offering_automatic_updates)){

				if(false != $license_data->is_wordpress_product && false != $license_data->offering_automatic_updates){
					$license_check = true;					
				}
			}
		}
		return $license_check;
	}	
}
?>