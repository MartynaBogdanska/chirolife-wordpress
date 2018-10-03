<?php
class sfsiTwitterSocialHelper{
   
  private $url,$timeout=90;

  public function __construct(){
  
  }
  
  public function sfsi_isTWCachingActive($option4=false){
      
      $isTwCachingActive  = false;

      $option4      =  (false != $option4 && is_array($option4)) ? $option4 : unserialize(get_option('sfsi_premium_section4_options',false));

      $option1      =  unserialize(get_option('sfsi_premium_section1_options',false));

      $condOpt1Disp = ( isset($option1['sfsi_plus_twitter_display']) && !empty($option1['sfsi_plus_twitter_display']) 
                        && "yes" == $option1['sfsi_plus_twitter_display'] ) 
                          || 
                      (isset($option1['sfsi_plus_icons_onmobile']) && !empty($option1['sfsi_plus_icons_onmobile'])  && "yes"== $option1['sfsi_plus_icons_onmobile'] 
                      && isset($option1['sfsi_plus_twitter_mobiledisplay']) && !empty($option1['sfsi_plus_twitter_mobiledisplay']) && "yes" == $option1['sfsi_plus_twitter_mobiledisplay']
                      );

      if( $condOpt1Disp && "yes" == $option4['sfsi_plus_display_counts'] && isset($option4['sfsi_plus_display_counts']) && !empty($option4['sfsi_plus_display_counts']) && "yes" == $option4['sfsi_plus_twitter_countsDisplay'] && isset($option4['sfsi_plus_twitter_countsDisplay']) && !empty($option4['sfsi_plus_twitter_countsDisplay']) ){

         $isTwCachingActive  = (isset($option4['sfsi_plus_tw_count_caching_active']) && !empty($option4['sfsi_plus_tw_count_caching_active']))? $option4['sfsi_plus_tw_count_caching_active']: 'no';

         $isTwCachingActive =  "yes" == strtolower($isTwCachingActive) ? true : false;

      }
 
      return $isTwCachingActive;        
  }

  public function get_tw_api_last_call_log(){

      $data = get_option('sfsi_premium_tw_api_last_call_log',false);

      $arrApiCallData = is_string($data) ? (object) unserialize($data) : false;
      
      return isset($arrApiCallData) && !empty($arrApiCallData) ? (object) $arrApiCallData: false;
  }

  public function tw_api_update_call_log(){
      
      $arrApiCallData = $this->get_tw_api_last_call_log();
      
      $fbApiCounter  = 1;

      if(isset($arrApiCallData) && !empty($arrApiCallData) && isset($arrApiCallData->apicount) && !empty($arrApiCallData->apicount)){
        $fbApiCounter = intval($arrApiCallData->apicount) + 1;
      }

      $apidata = array(
          "apicount"    => $fbApiCounter,
          "lastapicall" => time()
      );

      update_option('sfsi_premium_tw_api_last_call_log',serialize($apidata));
  }

  public function shall_call_twcount_api(){
      
      $shallCallFbCountApi = false;

      if(false != $this->sfsi_isTWCachingActive()):
        
        $arrApiCallData       = $this->get_tw_api_last_call_log();

        $lastapicallTimestamp = isset($arrApiCallData->lastapicall) && !empty($arrApiCallData->lastapicall) ? $arrApiCallData->lastapicall : false;

        if(false == $lastapicallTimestamp){

          $shallCallFbCountApi = true;

        }

        else{

            $diff                = (time() - $lastapicallTimestamp)/ 3600; // 1 hr
            $shallCallFbCountApi = ($diff >= 0.25) ? true :false;

        }

      endif;

      return $shallCallFbCountApi;  
  }


  public function save_twitter_followers_count($count){

    if(0 != $count){
      update_option('sfsi_premium_twitter_followers_count',$count);      
    }

  }

  public function get_cached_twitter_followers_count(){
      return  get_option('sfsi_premium_twitter_followers_count',false);    
  }

}
?>