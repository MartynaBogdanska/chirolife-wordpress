<?php
class sfsiCumulativeCount
{
   private $urlHttp;
   private $urlHttps;
   private $access_token;

   public function __construct($urlHttp=false,$urlHttps=false,$access_token='') {
        $this->urlHttp      = $urlHttp;
        $this->urlHttps     = $urlHttps;
        $this->access_token = $access_token;        
    }

    public function sfsi_get_multi_curl($data, $options = array(),$outputTypeJson=false) {
     
        if(function_exists('curl_multi_select')){
          
          // array of curl handles
          $curly = array();
          // data to be returned
          $result = array();
         
          // multi handle
          $mh = curl_multi_init();

          // loop through $data and create curl handles
          // then add them to the multi-handle
          foreach ($data as $id => $d) {
         
            $curly[$id] = curl_init();

            $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;
         
            curl_setopt($curly[$id], CURLOPT_URL,            $url);
            curl_setopt($curly[$id], CURLOPT_HEADER,         0);
            curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
         
            // post?
            if (is_array($d)) {
              if (!empty($d['post'])) {
                curl_setopt($curly[$id], CURLOPT_POST,       1);
                curl_setopt($curly[$id], CURLOPT_POSTFIELDS, $d['post']);
              }
            }
         
            // extra options?
            if (!empty($options)) {
              curl_setopt_array($curly[$id], $options);
            }
         
            curl_multi_add_handle($mh, $curly[$id]);
          }
         
          // execute the handles
          $running = null;
          do {
            curl_multi_exec($mh, $running);
          } while($running > 0);
                  
          // get content and remove handles
          foreach($curly as $id => $c) {
            
            if(curl_errno($c)){
              $errno         = curl_errno($c);
              $error_message = curl_strerror($errno);
              $erroInfo      = array("Url" =>curl_getinfo($c, CURLINFO_EFFECTIVE_URL), "error" => curl_getinfo($c));
              $erroInfo['error']['message'] =  $error_message;
              $result[$id]   = ($outputTypeJson) ? json_encode($erroInfo) : $erroInfo;
            }
            else{
              $result[$id] = ($outputTypeJson) ? curl_multi_getcontent($c) : json_decode(curl_multi_getcontent($c));
            }

            curl_multi_remove_handle($mh, $c);                          
          }
         
          // all done
          curl_multi_close($mh);
     
          return $result;
       }

      return false;
    }

    /********************************** Methods to get facebook cumulatitve count STARTS **************************/

    public function sfsi_fb_api($apiType){

        $arrFbData = array();

        $apiUrl    = $this->sfsi_get_api_url($apiType);
        
        $request   = wp_remote_get($apiUrl);
        $response  = wp_remote_retrieve_body($request);

        if (200 == wp_remote_retrieve_response_code($request)){
          
          $arrFbData = array_values( json_decode($response,true) );
          $arrFbData = sfsi_premium_arrayToObject($arrFbData); 

        }

        return $arrFbData;          
    }

    private function sfsi_get_api_url($apiType,$urlArr=false){

        $urlArr    = empty($urlArr) ? array($this->urlHttp,$this->urlHttps) : $urlArr;        
        $arrJson   = json_encode($urlArr);

        $apiUrl    = 'https://graph.facebook.com/v3.0/?ids='.$arrJson.'&fields=engagement,og_object{id}&access_token='.$this->access_token;

        return $apiUrl;
    }

    private function sfsi_fb_cumulative_api_version_29(){

        $apiType = "app29";       
        
        $arrFbData = $this->sfsi_fb_api($this->sfsi_get_api_url($apiType));

        return $arrFbData;        ;
    }

    private function sfsi_get_fb_count_api_data(){

        $arrResp = array();

        $arrApi29Data = $this->sfsi_fb_cumulative_api_version_29();

        if(false == $this->sfsi_is_error_key_exists($arrApi29Data) && false != $this->sfsi_is_share_key_exists($arrApi29Data)):

          $arrResp = array( "api"=>"app29","data"=> $arrApi29Data );
      
       endif;

       return $arrResp;
    }

    private function sfsi_is_share_key_exists($arrFbData){

        $check = false;

        if(!empty($arrFbData)){

            foreach ($arrFbData as $fbData) {
                
                if(isset($fbData->share->share_count) || isset($fbData->engagement->share_count)){
                    $check = true;
                    break;
                }
            }
        }

        return $check;
    }

    private function sfsi_is_error_key_exists($arrFbData){

        $check = false;

        if(!empty($arrFbData)){

            foreach ($arrFbData as $fbData) {
                
                if(isset($fbData->error)){
                    $check = true;
                    break;
                }
            }
        }

        return $check;
    }

    public function sfsi_count_cumulative($arrFbData = false){

        $count = 0;

        $arrFbData = (false == $arrFbData) ? $this->sfsi_get_fb_count_api_data() : $arrFbData;

        if(!empty($arrFbData)){

            $arr = is_object($arrFbData['data']) ? array_values( (array) $arrFbData['data'] ) : $arrFbData['data'];
            
            $httpData  = isset($arr[0]) && !empty($arr[0]) ? $arr[0]: false;
            $httpsData = isset($arr[1]) && !empty($arr[1]) ? $arr[1]: false;
         
            if(isset($httpData->engagement->reaction_count)  && isset($httpData->engagement->comment_count)                    
                && isset($httpData->engagement->share_count)     && isset($httpData->engagement->comment_plugin_count)
                && isset($httpsData->engagement->reaction_count) && isset($httpsData->engagement->comment_count)
                && isset($httpsData->engagement->share_count)    && isset($httpsData->engagement->comment_plugin_count)
              ):
              
                $httpsCount =   $httpsData->engagement->reaction_count 
                              + $httpsData->engagement->comment_count 
                              + $httpsData->engagement->share_count 
                              + $httpsData->engagement->comment_plugin_count; 

                $httpCount  =   $httpData->engagement->reaction_count 
                              + $httpData->engagement->comment_count
                              + $httpData->engagement->share_count
                              + $httpData->engagement->comment_plugin_count; 
                
                if($httpCount == $httpsCount){

                   $count = $httpsCount; 

                }

                else{

                  $count = $httpCount > $httpsCount  ? $httpCount: $httpsCount;

                }

            endif;

        }
        return $count;
    }

    /********************************** Methods to get facebook cumulatitve count CLOSES **********************/

    public function sfsi_pinterest_get_count(){

        $arrRespData = array();
        $count = 0;

        $apiUrlArr = array(
            'http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url='.$this->urlHttp,
            'http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url='.$this->urlHttps
        );

        $arrRespData = $this->sfsi_get_multi_curl($apiUrlArr,array(),true); 

        if(!empty($arrRespData)){

            foreach ($arrRespData as $respJson) {
                  $json_string = preg_replace('/^receiveCount\((.*)\)$/', "\\1", $respJson);
                  $json        = json_decode($json_string, true);
                  $count       = $count + (isset($json['count'])? intval($json['count']):0);
            }
        }
        return $count;
    }   

}
?>