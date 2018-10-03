<?php
if ( ! class_exists( 'License_API_Manager') ) {
	
	abstract class License_API_Manager{

		public $apiurl;
		public $item_id;		
		public $siteurl;

		public function __construct($apiurl=false,$item_id=false,$siteurl=false){
			$this->apiurl       = trailingslashit($apiurl);
			$this->item_id      = $item_id;
			$this->siteurl 		= $siteurl;
		}

		public function get_apiurl(){
			return $this->apiurl;
		}
	 
		public function get_item_id(){
			return $this->item_id;
		}
	 
		public function get_siteurl(){
			return $this->siteurl;
		}

		abstract protected function activate_license($license_key);
		abstract protected function deactivate_license($license_key);
	}
}
?>