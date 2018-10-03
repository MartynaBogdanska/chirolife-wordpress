<?php
add_action('wp_ajax_mailchimpSubscription','sfsi_plus_mailchimpSubscription'); 
add_action('wp_ajax_nopriv_mailchimpSubscription','sfsi_plus_mailchimpSubscription');        
function sfsi_plus_mailchimpSubscription()
{
	$apikey = '98aed08a6e1374c449ad0479f04bf6e1-us13';
	$auth = base64_encode( 'user:'.$apikey );

	$data = array(
		'apikey'        => $apikey,
		'email_address' => "deepak@monadinfotech.com",
		'status'        => 'subscribed',
		'merge_fields'  => array(
			'FNAME' 		=> "deepak",
			'LNAME' 		=> "Joshi",
		)
	);
	$json_data = json_encode($data);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://us13.api.mailchimp.com/3.0/lists/8d57733824/members/');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.$auth));
	curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);                                                                                                                  

	$result = curl_exec($ch);

	print_r(json_decode($result));
}
?>