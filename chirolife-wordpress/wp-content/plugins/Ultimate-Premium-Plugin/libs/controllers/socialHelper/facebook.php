<?php 
class sfsiFacebookSocialHelper{
   
  private $url,$timeout=90;

  public function __construct(){

  }

  public function sfsi_isFbCachingActive($option4=false){
      
      $isFbCachingActive  = false;

      $option4      =  (false != $option4 && is_array($option4)) ? $option4 : unserialize(get_option('sfsi_premium_section4_options',false));

      $option1      =  unserialize(get_option('sfsi_premium_section1_options',false));

      if(isset($option1['sfsi_plus_facebook_display']) && !empty($option1['sfsi_plus_facebook_display'])
        && isset($option4['sfsi_plus_display_counts']) && !empty($option4['sfsi_plus_display_counts']) 
        && isset($option4['sfsi_plus_facebook_countsDisplay']) && !empty($option4['sfsi_plus_facebook_countsDisplay'])
        && "yes" == $option1['sfsi_plus_facebook_display'] && "yes" == $option4['sfsi_plus_display_counts'] && "yes" == $option4['sfsi_plus_facebook_countsDisplay']){

        $isFbCachingActive  = (isset($option4['sfsi_plus_fb_count_caching_active']) && !empty($option4['sfsi_plus_fb_count_caching_active']))? $option4['sfsi_plus_fb_count_caching_active']: 'no';

        $isFbCachingActive =  "yes" == strtolower($isFbCachingActive) ? true : false;

      }
 
      return $isFbCachingActive;        
  }

  public function sfsi_get_fb_access_token($option4=false){
   
      $access_token = '';

      $option4      =  (false != $option4 && is_array($option4)) ? $option4 : unserialize(get_option('sfsi_premium_section4_options',false)) ;

      $appid        = (isset($option4['sfsi_plus_facebook_appid']) && !empty($option4['sfsi_plus_facebook_appid']))? $option4['sfsi_plus_facebook_appid']: '954871214567352';

      $appsecret    = (isset($option4['sfsi_plus_facebook_appsecret']) && !empty($option4['sfsi_plus_facebook_appsecret']))? $option4['sfsi_plus_facebook_appsecret']: 'a780eb3d3687a084d6e5919585cc6a12';

      $access_token= $appid.'|'.$appsecret;

      return $access_token;
  }

  public function sfsi_isfbCumulationCountOn(){

      $isfbCumulationCountOn = false;

      $option5    = unserialize(get_option('sfsi_premium_section5_options',false));        

      if(isset($option5['sfsi_plus_facebook_cumulative_count_active']) 
        
        && !empty($option5['sfsi_plus_facebook_cumulative_count_active']) 
        
        && $option5['sfsi_plus_facebook_cumulative_count_active']=="yes"){

        $isfbCumulationCountOn = true;
      }

      //return $isfbCumulationCountOn;
      return $isfbCumulationCountOn && sfsi_is_ssl();
  }

  public function sfsi_get_fb_caching_interval($option4=false){
   
      $caching_interval = 1;

      $option4      =  (false != $option4 && is_array($option4)) ? $option4 : unserialize(get_option('sfsi_premium_section4_options',false)) ;

      if($this->sfsi_isFbCachingActive($option4) && isset($option4['sfsi_plus_fb_caching_interval']) && !empty($option4['sfsi_plus_fb_caching_interval'])){

        $caching_interval  = $option4['sfsi_plus_fb_caching_interval'];

      }

      return $caching_interval;
  }

  private function sfsi_parse_fb_api_response($apiType,$apiresponseObj){

      $responseObj = new stdClass;

      $responseObj->url     = isset($apiresponseObj->id) && !empty($apiresponseObj->id) ? $apiresponseObj->id : '';
      $responseObj->count   = 0;
      $responseObj->og_object = isset($apiresponseObj->og_object) && !empty($apiresponseObj->og_object) ? (is_object($apiresponseObj->og_object) ? $apiresponseObj->og_object->id: $apiresponseObj->og_object['id']) : '';
      
      switch ($apiType) {

        case "app29": case "app27":

          if (isset($apiresponseObj->engagement)){
            
            $apiresponseObj->engagement = is_object($apiresponseObj->engagement) ? $apiresponseObj->engagement: (object) $apiresponseObj->engagement;


            $responseObj->count = $apiresponseObj->engagement->reaction_count + $apiresponseObj->engagement->comment_count
                      + $apiresponseObj->engagement->share_count + $apiresponseObj->engagement->comment_plugin_count;
          }

          break;

        default:
          
          if (isset($apiresponseObj->share) && isset($apiresponseObj->share['share_count'])){

            $responseObj->count = $apiresponseObj->share['share_count'];

          }

        break;
      }

      return $responseObj;
  }

  private function sfsi_get_all_siteurls(){

      $arrUrl  = array_unique(sfsi_premium_get_all_site_urls());

      if($this->sfsi_isfbCumulationCountOn() && !empty($arrUrl) ){

        $arrCumulativeUrls = array();

        foreach ($arrUrl as $key => $url):
                    
            if("https" == parse_url($url, PHP_URL_SCHEME)){

                $httpsUrl = $url;
                $httpUrl  = preg_replace("/^https:/i", "http:", $url);

                array_push($arrCumulativeUrls,$httpUrl,$httpsUrl);
            } 

        endforeach;

        $arrCumulativeUrls = empty($arrCumulativeUrls) ? $arrUrl : $arrCumulativeUrls;

        return $arrCumulativeUrls;

      }

      return $arrUrl;
  }

  public function sfsi_premium_get_fb_api_last_call_log(){

      $arrApiCallData =  unserialize(get_option('sfsi_premium_fb_batch_api_last_call_log',false));
      
      return isset($arrApiCallData) && !empty($arrApiCallData) ? (object) $arrApiCallData: false;
  }

  private function sfsi_premium_fb_api_update_call_log(){
      
      $arrApiCallData = $this->sfsi_premium_get_fb_api_last_call_log();
      
      $fbApiCounter  = 99;

      if(isset($arrApiCallData) && !empty($arrApiCallData) && isset($arrApiCallData->apicount) && !empty($arrApiCallData->apicount)){
        $fbApiCounter = $arrApiCallData->apicount+99;
      }

      $apidata = array(
          "apicount"    => $fbApiCounter,
          "lastapicall" => time()
      );
      update_option('sfsi_premium_fb_batch_api_last_call_log',serialize($apidata));
  }

  private function sfsi_save_facebook_count_for_caching($apiType,$json_response,$isResponseArr=false){
                    
      if($isResponseArr){
        $responseArr  = $json_response;
        $responseObj  = (object) $json_response;
      }
      else{
        $responseArr  = isset($json_response) && !empty($json_response) ? json_decode($json_response,true) :  array();
        $responseObj  = (object) $responseArr;          
      }    

     if(isset($responseArr) && !empty($responseArr)):

      $isfbCumulationCountOn = $this->sfsi_isfbCumulationCountOn();

      foreach ($responseArr as $url => $singleRespArr):
        
        $singleRespObj = (object) $singleRespArr;

        if(!isset($singleRespObj->error)):

          if(false != $isfbCumulationCountOn){
    
              if("http" == parse_url($url, PHP_URL_SCHEME)):
                
                $httpsUrl = preg_replace("/^http:/i", "https:", $url);
                
                $httpUrlCountDataObj  = sfsi_premium_arrayToObject($responseArr[$url]);

                $data = array($httpUrlCountDataObj);

                if(isset($responseArr[$httpsUrl])){

                  $httpsUrlCountDataObj = sfsi_premium_arrayToObject($responseArr[$httpsUrl]);
                  $data                 = array($httpUrlCountDataObj,$httpsUrlCountDataObj);
                }

                $arrResp = array(
                      "api" => $apiType,
                      "data"=> $data
                );

                $cumulativeObj        = new sfsiCumulativeCount($url,$httpsUrl);         
                $count                = $cumulativeObj->sfsi_count_cumulative($arrResp);
                
                $objCumulative        = new stdClass;
                $objCumulative->url   = $httpsUrl;
                $objCumulative->count = $count;

                $this->sfsi_save_cumulative_facebook_count_for_caching($objCumulative);

              endif;
          }

          else{
            
              $singleRespObj = sfsi_premium_arrayToObject($singleRespArr);

              $objUnCumulative = $this->sfsi_parse_fb_api_response($apiType,$singleRespObj);

              $this->sfsi_save_uncumulative_facebook_count_for_caching($objUnCumulative);
          }

        endif;

      endforeach;

    endif;

  }

  private function sfsi_save_multiple_url_facebook_count_for_caching($apiType,$arrJsonResponse){

      if(isset($arrJsonResponse) && !empty($arrJsonResponse) && is_array($arrJsonResponse)){

        $arrFinalResponse = array();

         foreach($arrJsonResponse as $json_response):
            
           if(isset($json_response) && !empty($json_response)){
             
             $responseArr      = json_decode($json_response,true); 

             $arrFinalResponse = array_merge($arrFinalResponse, $responseArr);
           
           }

         endforeach;
    
         $this->sfsi_save_facebook_count_for_caching($apiType,$arrFinalResponse,true);
      }
  }


  private function sfsi_save_uncumulative_facebook_count_for_caching($objFbCount){

    if(isset($objFbCount->count) && isset($objFbCount->url) && !empty($objFbCount->url)):

      $postID = sfsi_premium_url_to_postid($objFbCount->url);

      if(isset($postID) && !empty($postID)):
        
        update_post_meta($postID,'sfsi-premium-fb-uncumulative-cached-count',$objFbCount->count); 

        else:

          // Save count for home page
          $homeHttpsUrl = trailingslashit( home_url() );

          if($objFbCount->url == $homeHttpsUrl){

            update_option('sfsi-premium-homepage-fb-uncumulative-cached-count',$objFbCount->count);

          }

          else{

            $this->sfsi_save_fb_count_for_url_not_having_postid($objFbCount->url,$objFbCount->count);
          }          

      endif;

    endif;
  }

  private function sfsi_save_cumulative_facebook_count_for_caching($objFbCount){
    
    if(isset($objFbCount->count) && isset($objFbCount->url) && !empty($objFbCount->url)):

      $postID = sfsi_premium_url_to_postid($objFbCount->url);

      if(isset($postID) && !empty($postID)):

        update_post_meta($postID,'sfsi-premium-fb-cumulative-cached-count',$objFbCount->count); 

      else:

            // Save count for home page
             $homeHttpsUrl = trailingslashit( home_url() );

             if($objFbCount->url == $homeHttpsUrl){

              update_option('sfsi-premium-homepage-fb-cumulative-cached-count',$objFbCount->count);

             }
             else{

                  $this->sfsi_save_fb_count_for_url_not_having_postid($objFbCount->url,$objFbCount->count);
             }

       endif;

    endif;
  }


  public function sfsi_get_fb_count_for_urls_not_having_postid(){

      $keyName = $this->get_db_key_for_save_fb_count_for_url();

      $json_data = get_option($keyName,false);

      if(false != $json_data):

        $arrOptionFbUrlCount = json_decode($json_data,true);

        if (JSON_ERROR_NONE === json_last_error()):

            return $arrOptionFbUrlCount;

        endif;

      else:

        return false;

      endif;
  }

  public function sfsi_save_fb_count_for_url_not_having_postid($url,$count){

      $arrOptionFbUrlCount = $this->sfsi_get_fb_count_for_urls_not_having_postid();

      $keyName = $this->get_db_key_for_save_fb_count_for_url();

      $arrToSave = array( $url => $count);

      if (false != $arrOptionFbUrlCount):

            ksort($arrOptionFbUrlCount);

            $key = sfsi_premium_array_binarySearch($url, $arrOptionFbUrlCount, 'sfsi_premium_key_match_array', count($arrOptionFbUrlCount)-1, 0, true);

            if(false !== $key ):

                $arrOptionFbUrlCount[$key] = $arrToSave;
           
            else:
                
                array_push($arrOptionFbUrlCount,$arrToSave);              

            endif;

      else:
          
          $arrOptionFbUrlCount = array();
          
          array_push($arrOptionFbUrlCount,$arrToSave);

          update_option($keyName, json_encode($arrOptionFbUrlCount) );                

      endif;

  }

  public function sfsi_get_fb_count_for_single_url_not_having_postid($url){

    $count  = 0;

    $url = trailingslashit($url);

    $arrOptionFbUrlCount = $this->sfsi_get_fb_count_for_urls_not_having_postid();

    if (false != $arrOptionFbUrlCount):

          ksort($arrOptionFbUrlCount);

          $key = sfsi_premium_array_binarySearch($url, $arrOptionFbUrlCount, 'sfsi_premium_key_match_array', count($arrOptionFbUrlCount)-1, 0, true);

          if(false !== $key):

              $arrData = $arrOptionFbUrlCount[$key];

              $count   = $arrData[$url];

          endif;

    endif;

    return $count;          

  }

  public function get_db_key_for_save_fb_count_for_url(){

    $keyName   = false != $this->sfsi_isfbCumulationCountOn() ? 'sfsi-premium-cumulative-fb-count-for-url-not-having-postid' : 'sfsi-premium-uncumulative-fb-count-for-url-not-having-postid';  

    return $keyName;
  }

  public function sfsi_fbcount_inbatch_api(){
        
      try {
        
        if(false != $this->sfsi_shall_call_fbcount_batch_api()):

            $arrUrl         = $this->sfsi_get_all_siteurls();
            $access_token   = $this->sfsi_get_fb_access_token();

            $sfsi_job_queue = sfsiJobQueue::getInstance();

            // Call for remaining urls for pending api calls            
            $arrPendingJobs = $sfsi_job_queue->get_pending_jobs();

            if(isset($arrPendingJobs) && !empty($arrPendingJobs)){

                 $getTopJob = $arrPendingJobs[0];

                 if(isset($getTopJob) && !empty($getTopJob) && false == $getTopJob->status):

                   $arrUrls = json_decode($getTopJob->urls,true);

                   if(JSON_ERROR_NONE === json_last_error()):

                     $jobId = $getTopJob->id;

                     $sfsi_job_queue->job_start($jobId);
                    
                      //$countJobUrls = count($arrUrls);

                      // if($countJobUrls<4950){
                          
                      //     $countOfUrlstoAdd = 4950 - $countJobUrls;

                      //     $newUrlsToAdd = array_slice($arrUrl, 0, $countOfUrlstoAdd);

                      //     $arrUrls = array_merge($arrUrls,$newUrlsToAdd);
                      // }

                     $this->sfsi_fbcount_multiple_batch_api($jobId,$arrUrls,$access_token);

                   endif;

               endif;
            }

            else if(isset($arrUrl) && !empty($arrUrl)):
            
                $count = count($arrUrl);

                //if($count>1){
                if($count>50){

                  //if($count>1 && $count <=500):
                  if($count>4950 && $count <=40000):
                      
                      //call api for first 4950 urls & put others in queue to be called in next hour 
                       $arrChunked = array_chunk($arrUrl, 4950);
                       //$arrChunked = array_chunk($arrUrl, 2);

                       // Add remmaining job with not started status
                       $sfsi_job_queue->add_multiple_jobs(1,$arrChunked);

                  else:

                       // Create job
                        $jsonUrls = json_encode($arrUrl);

                        if (JSON_ERROR_NONE === json_last_error()){
                          
                          $jobId = $sfsi_job_queue->add_single_job(1,$jsonUrls);
                          
                          if(isset($jobId) && !empty($jobId)):

                            $sfsi_job_queue->job_start($jobId);

                            $this->sfsi_fbcount_multiple_batch_api($jobId,$arrUrl,$access_token);

                          endif;

                        }
                  
                  endif;

                }
            
                else{

                    $this->sfsi_fbcount_single_batch_api($arrUrl,$access_token);          
                }

            endif; // arr url count >0

        endif;
      
      }      
      //catch exception
      catch(Exception $e) {
          update_option('sfsi_premium_fb_batch_api_issue',$e->getMessage());
      }

  }   

  public function sfsi_get_api_url_array_multiple_batch_api($arrUrl,$access_token){

       $arrUrl = array_chunk($arrUrl, 50);

       $arrApiUrl =  array();

       foreach($arrUrl as $arrData):

        $arrJsonn    = json_encode($arrData);
        $apiUrl      = 'https://graph.facebook.com/v3.0/?ids='.$arrJsonn.'&fields=engagement,og_object{id}&access_token='.$access_token;
        array_push($arrApiUrl,$apiUrl);

       endforeach;

       return $arrApiUrl;
  }

  public function sfsi_fbcount_multiple_batch_api($jobId,$arrUrl,$access_token){

      $arrApiUrl = $this->sfsi_get_api_url_array_multiple_batch_api($arrUrl,$access_token);

      $sfsiCumulativeCount = new sfsiCumulativeCount();

      $resp     = $sfsiCumulativeCount->sfsi_get_multi_curl($arrApiUrl,array(),true);

      if(isset($resp) && !empty($resp)){

       $sfsi_job_queue = sfsiJobQueue::getInstance();

        // Update call log, last call time & increase counter
        $this->sfsi_premium_fb_api_update_call_log();

        $sfsi_job_queue->remove_finished_job($jobId);
        
        $respObj  = json_decode($resp[0]);

        if(!isset($respObj->error)){

            $this->sfsi_save_multiple_url_facebook_count_for_caching("app29",$resp);

            update_option('sfsi_premium_fb_batch_api_issue','');

        }
        else{
          
            update_option('sfsi_premium_fb_batch_api_issue',$respObj->error->message);
        }

      }
  }

  public function sfsi_fbcount_single_batch_api($arrUrl,$access_token){
       
     $arrJson  = json_encode($arrUrl);

     $apiUrl   = 'https://graph.facebook.com/v3.0/?ids='.$arrJson.'&fields=engagement,og_object{id}&access_token='.$access_token;

     $request  = wp_remote_get( $apiUrl );
     $response = wp_remote_retrieve_body( $request );
    
     if (200 == wp_remote_retrieve_response_code($request)):

       $this->sfsi_save_facebook_count_for_caching("app29",$response); 

       update_option('sfsi_premium_fb_batch_api_issue','');

     endif;

     // Update call log, last call time & increase counter
     $this->sfsi_premium_fb_api_update_call_log();       

  }

  public function sfsi_shall_call_fbcount_batch_api(){

      $shallCallFbCountApi = false;

      if(false != $this->sfsi_isFbCachingActive()):
        
        $data = get_option('sfsi_premium_fb_batch_api_last_call_log',false);

        $arrApiCallData = is_string($data)? (object) unserialize($data) : false;

        $lastapicallTimestamp = isset($arrApiCallData->lastapicall) && !empty($arrApiCallData->lastapicall) ? $arrApiCallData->lastapicall : false;

        if(false == $lastapicallTimestamp){
          $shallCallFbCountApi = true;
        }
        else{
          
          $setInterval = $this->sfsi_get_fb_caching_interval();
          $setInterval = isset($setInterval) && !empty($setInterval) ? $setInterval: 1;

          $diff        = (time() - $lastapicallTimestamp)/ 3600; // 1 hr
          //$diff = (time() - $lastapicallTimestamp)/ 86400; // 24 hrs
          //$diff = time() - $lastapicallTimestamp;

          $shallCallFbCountApi = ($diff >= $setInterval) ? true :false;

        }

      endif;

      return $shallCallFbCountApi;    
  }

  public function sfsi_get_home_page_cached_fb_count(){

      $key   = false!= $this->sfsi_isfbCumulationCountOn() ? 
              'sfsi-premium-homepage-fb-cumulative-cached-count':
              'sfsi-premium-homepage-fb-uncumulative-cached-count';

      $count = get_option($key,false);

      return $count;
  }

    /*
      Parameters: (3) -> (int) $postId Post ID.Required: Yes
      Returns:    -> (int) On success will return cached fb count Default: 0
    */

  public function sfsi_get_cached_fbcount_for_postId($postId){
    
      $count = 0;

      if(isset($postId) && !empty($postId)){

        $key   = false!= $this->sfsi_isfbCumulationCountOn() ? 'sfsi-premium-fb-cumulative-cached-count': 'sfsi-premium-fb-uncumulative-cached-count';

        $count = get_post_meta($postId,$key,true);

        $count = isset($count) && !empty($count) ? $count : 0; 

      }
      
      return $count;
  }

  public function sfsi_get_uncachedfbcount($url){
      
      $count = 0;

       if($this->sfsi_isfbCumulationCountOn()):

        $count = $this->sfsi_get_uncached_cumulative_fb($url);
       
       else:
        
        $count = $this->sfsi_get_uncached_uncumulative_fb($url);
      
      endif;

      return $count;  
  }

  /* get facebook likes */
  public function sfsi_get_uncached_cumulative_fb($url){            

    $httpUrl        = preg_replace("/^https:/i", "http:", $url);

    $httpsUrl       = $url;

    $access_token   = $this->sfsi_get_fb_access_token();

    $objCumulative  = new sfsiCumulativeCount($httpUrl,$httpsUrl,$access_token);

    return $objCumulative->sfsi_count_cumulative();                 
  }

  public function sfsi_get_uncached_uncumulative_fb($url){   
   
      $url   = trailingslashit($url);
      $count = 0;

      $access_token   = $this->sfsi_get_fb_access_token();

      $json_29_string = $this->file_get_contents_curl('https://graph.facebook.com/v3.0/?id='.$url.'&fields=engagement&access_token='.$access_token);

      $json   = json_decode($json_29_string, true);     

      $count  = (isset($json['engagement'])) ? 
                    $json['engagement']['reaction_count'] 
                  + $json['engagement']['comment_count']
                  + $json['engagement']['share_count']
                  + $json['engagement']['comment_plugin_count']:0;
    return $count;
  }


  /* send curl request   */
  private function file_get_contents_curl($url)
  {
      $ch=curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
      curl_setopt($ch, CURLOPT_FAILONERROR, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $cont = curl_exec($ch);
    
      if(curl_error($ch))
      {
        //die(curl_error($ch));
      }
      return $cont;
  }

}
?>