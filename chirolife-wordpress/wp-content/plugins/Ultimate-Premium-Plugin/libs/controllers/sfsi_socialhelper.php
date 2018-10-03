<?php 
  class sfsi_plus_SocialHelper
  {
    private $url,$timeout=90;

    #---------------------------------------------------------------------------------------------------------------------------------------------------------
                                #region Twitter
    #---------------------------------------------------------------------------------------------------------------------------------------------------------
    /* get twitter followers */
    function sfsi_get_tweets($username,$tw_settings)
    {
      require_once(SFSI_PLUS_DOCROOT.'/helpers/twitteroauth/twiiterCount.php');
      return sfsi_premium_twitter_followers();
    }


  /******************************   Twitter sharing title & link functions STARTS  *******************************************/

    public function sfsi_get_custom_share_link($iconName=''){
      
      $url      = get_bloginfo('url');
      $post_id  = $this->sfsi_get_the_ID();

      $isSharingShortUrl= $this->sfsi_is_url_shortning_on_for_icon($iconName);

      if( !in_the_loop() && !is_front_page() ){
  
        if(is_author()){

            $url   = get_author_posts_url(get_the_author_meta('ID'));

        }      
        else if(is_archive()){

            try {
  
              $queryObj = get_queried_object();

              if(isset($queryObj) && !empty($queryObj) && is_object($queryObj) && isset($queryObj->term_id)){
                  $termId  = $queryObj->term_id;
                  $url     = get_term_link($termId);              
              }
              
            }
            catch (Exception $e) {
            }
        }

        else if(is_singular()){

             $shortlink    = $isSharingShortUrl? get_shortlink_from_db($post_id):null;
             $longlink     = get_permalink($post_id);                            
             $currentUrl   = urldecode(sfsi_plus_current_url());
             $longlink     = $currentUrl != $longlink ? $currentUrl: $longlink;
             $url          = ($isSharingShortUrl && $shortlink!=null && !empty($shortlink) ) ? $shortlink : trailingslashit($longlink);
        }
      
      }
      
      else if($post_id){
        
            if(!is_front_page()){
      
               $shortlink    = $isSharingShortUrl? get_shortlink_from_db($post_id):null;
               $longlink     = get_permalink($post_id);                            
               $currentUrl   = urldecode(sfsi_plus_current_url());
               $longlink     = $currentUrl != $longlink ? $currentUrl: $longlink;
               $url          =  ($isSharingShortUrl && $shortlink!=null && !empty($shortlink) ) ? $shortlink : trailingslashit($longlink);

            }
            else if(is_home()){
               $longlink     = get_permalink($post_id);                            
               $currentUrl   = urldecode(sfsi_plus_current_url());
               $longlink     = $currentUrl != $longlink ? $currentUrl: $longlink;
               $url          = trailingslashit($longlink);
            }
      }

      return $url;
    }

    public function sfsi_is_url_shortning_on_for_icon($iconName=''){

      $isUrlShortingOnForIcon = false;

      if(strlen($iconName)>0 && is_string($iconName)){
        
        $option5 =  unserialize(get_option('sfsi_premium_section5_options',false));
        
        $arrSelectedIcons   = (isset($option5['sfsi_premium_url_shortner_icons_names_list'])) ? unserialize($option5['sfsi_premium_url_shortner_icons_names_list']): array();
        
        if(!empty($arrSelectedIcons)):
          
          if(in_array($iconName, $arrSelectedIcons)):

            $isUrlShortingOnForIcon = true;

          endif;

        endif;
        
      }
      return $isUrlShortingOnForIcon;
    }

    public function sfsi_get_custom_tweet_title(){

      $title      = $this->sfsi_get_the_title();  
      $post_id    = $this->sfsi_get_the_ID();

      if($post_id){
        $custom_title = get_post_meta($post_id,'social-twitter-description',true);
        $title        = (isset($custom_title) && strlen($custom_title)>0 && $custom_title!=null) ? $custom_title: $title;   
      }

      return $title;
    }

    public function sfsi_get_custom_tweet_text(){

      $post_id    = $this->sfsi_get_the_ID();

      $sfsi_section5   = unserialize(get_option('sfsi_premium_section5_options',false));
      $sfsi_que6_tweet = (isset($sfsi_section5['sfsi_plus_twitter_aboutPageText']))? $sfsi_section5['sfsi_plus_twitter_aboutPageText']: '${title} ${link}';
      
      if($post_id){           
        
        $custom_title = get_post_meta($post_id,'social-twitter-description',true);
        $link  = $this->sfsi_get_custom_share_link('twitter');

        if(isset($sfsi_que6_tweet) && strlen($sfsi_que6_tweet)>0){
          $twitter_text = $sfsi_que6_tweet;     
          $twitter_text = stripslashes($twitter_text);//stripslashes(str_replace('"', "", str_replace("'", "", $twitter_text)));  
          $twitter_text = str_replace('${title}', $this->sfsi_get_the_title(), $twitter_text);
          $twitter_text = str_replace('${link}', $link, $twitter_text);
        }
        else if(isset($custom_title) && strlen($custom_title)>0 && $custom_title!=null){
          $twitter_text = $custom_title.' '.$link;
        }
        else{
          $twitter_text = $this->sfsi_get_the_title().' '.$link;
        }

      }
      else{
        $twitter_text = $sfsi_que6_tweet;     
        $twitter_text = stripslashes($twitter_text);//stripslashes(str_replace('"', "", str_replace("'", "", $twitter_text)));            
        $twitter_text = str_replace('${title}', $this->sfsi_get_the_title(), $twitter_text);
        $twitter_text = str_replace('${link}',  $this->sfsi_get_custom_share_link('twitter'), $twitter_text); 
      }
      
      $twitter_text = html_entity_decode(strip_tags($twitter_text), ENT_QUOTES,'UTF-8');    
      return $twitter_text; 
    }
    

    /* create on page twitter follow option */ 
    public function sfsi_twitterFollow($tw_username,$icons_language)
    {
        $twitter_html = '<a href="https://twitter.com/'.trim($tw_username).'" class="twitter-follow-button"  data-show-count="false" data-lang="'.$icons_language.'" data-show-screen-name="false"></a>';
      return $twitter_html;
    } 
   
    /* create on page twitter share icon */
    public function sfsi_twitterShare($permalink,$tweettext,$icons_language='')
    {
      $link         = $this->sfsi_get_custom_share_link('twitter');
      $tweettext    = $this->sfsi_get_custom_tweet_text();
      $option5      = unserialize(get_option('sfsi_premium_section5_options',false));

      preg_match_all('!https?://\S+!', $tweettext, $matches);
      $countUrl    = false;

      if(isset($matches[0]) && is_array($matches[0])){
        if(in_array(trailingslashit($link),$matches[0])){
          $countUrl = true;
        }
      }
      $dataUrl      = ($countUrl) ? ' ': $link;
      
      $forShortedUrl=  'no'===$option5['sfsi_plus_url_shorting_api_type_setting']?$dataUrl:' ';

      $twitter_html = '<a data-url="'.$forShortedUrl.'" rel="nofollow" href="http://twitter.com/share" data-count="none" class="sr-twitter-button twitter-share-button" data-lang="'.$icons_language.'" data-text="'.$tweettext.'" ></a>';
           
          return $twitter_html;
    } 
    
    /* create on page twitter share icon with count */
    public function sfsi_twitterSharewithcount($permalink,$tweettext, $show_count, $icons_language)
    {
      //$tweettext    = $this->sfsi_get_custom_tweet_title();
      $link         = $this->sfsi_get_custom_share_link('twitter');
      $tweettext    = $this->sfsi_get_custom_tweet_text();
      $option5      = unserialize(get_option('sfsi_premium_section5_options',false));
      
      preg_match_all('!https?://\S+!', $tweettext, $matches);
      $countUrl    = false;

      if(isset($matches[0]) && is_array($matches[0])){
        if(in_array(trailingslashit($link),$matches[0])){
          $countUrl = true;
        }
      }
      $dataUrl      = ($countUrl) ? ' ': $link;
      
      $forShortedUrl=  'no'===$option5['sfsi_plus_url_shorting_api_type_setting']?$dataUrl:' ';

      if($show_count)
      {
        $twitter_html = '<a href="http://twitter.com/share" class="sr-twitter-button twitter-share-button" data-lang="'.$icons_language.'" data-counturl="'.$link.'" data-url="'.$forShortedUrl.'" data-text="'.$tweettext.'" ></a>'; 
      }
      else
      {
        $twitter_html = '<a href="http://twitter.com/share" data-count="none" class="sr-twitter-button twitter-share-button" data-lang="'.$icons_language.'" data-url="'.$forShortedUrl.'" data-text="'.$tweettext.'" ></a>';
      }
        return $twitter_html;
    }


  /*************************************   Twitter sharing title & link functions CLOSES    ***********************************************/  

    /*twitter like*/  
    function sfsi_plus_twitterlike($permalink, $show_count)
    { 
      $twitter_text = '';
      return $this->sfsi_twitterShare($permalink,$twitter_text);
    }
    /*twitter like*/


    #---------------------------------------------------------------------------------------------------------------------------------------------------------
                                #region LinkedIn
    #---------------------------------------------------------------------------------------------------------------------------------------------------------

    /* get linkedIn counts */
    function sfsi_get_linkedin($url)
    {
      $json_string = $this->file_get_contents_curl(
        'https://www.linkedin.com/countserv/count/share?format=json&url='.$url
      );
      $json = json_decode($json_string, true);
      return isset($json['count'])? intval($json['count']):0;
    }

    /* get linkedIn follower */
    function sfsi_getlinkedin_follower($sfsi_plus_ln_company,$APIsettings)
    {      
       require_once(SFSI_PLUS_DOCROOT.'/helpers/linkedin-api/linkedin-api.php');

       // $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
       // $url = $scheme.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

       $url = urldecode(sfsi_plus_current_url());
       
       $linkedin = new Plus_LinkedIn(
        $APIsettings['sfsi_plus_ln_api_key'],
        $APIsettings['sfsi_plus_ln_secret_key'],
        $APIsettings['sfsi_plus_ln_oAuth_user_token'],
        $url
       );
       $followers = $linkedin->getCompanyFollowersByName($sfsi_plus_ln_company);
       if (strpos($followers, '404') === false)
       {   return  strip_tags($followers); }
       else
       {   return  0; }
    }
      
    /* create linkedIn  follow button */
    public function sfsi_LinkedInFollow($company_id)
    {
        return  $ifollow='<script type="IN/FollowCompany" data-id="'.$company_id.'" data-counter="none"></script>';
    }
    
      /* create linkedIn  recommend button */
    public function sfsi_LinkedInRecommend($company_name,$product_id)
    {
        return  $ifollow='<script type="IN/RecommendProduct" data-company="'.$company_name.'" data-product="'.$product_id.'"></script>';
    }


    /* create linkedIn  share button */
    public function sfsi_LinkedInShare($url='')
    {
        $url=(isset($url))? $url :  home_url();
          return  $ifollow='<script type="IN/Share" data-url="'.$url.'"></script>';
    }


    #---------------------------------------------------------------------------------------------------------------------------------------------------------
                                #region Facebook
    #---------------------------------------------------------------------------------------------------------------------------------------------------------


    function sfsi_get_fb($url)
    {                 
      
      $fbSocialHelper = new sfsiFacebookSocialHelper();

      $count  = 0;

      if(false != $fbSocialHelper->sfsi_isFbCachingActive()){
        
        $postId = sfsi_premium_url_to_postid($url);

        if(isset($postId) && !empty($postId)):

          $count  = $fbSocialHelper->sfsi_get_cached_fbcount_for_postId($postId);          

        else:

            $url          = trailingslashit($url);
            $homeHttpsUrl = trailingslashit( home_url() );

            if($url == $homeHttpsUrl):
            
              $count  = $fbSocialHelper->sfsi_get_home_page_cached_fb_count();                    
            
            else:

              $count = $fbSocialHelper->sfsi_get_fb_count_for_single_url_not_having_postid($url);        

            endif;

        endif;

      }

      else{

        $count = $fbSocialHelper->sfsi_get_uncachedfbcount($url);

      }

      return $count;

    }



    /* get facebook page likes */
    function sfsi_get_fb_pagelike($url)
    {
      $option4  =  unserialize(get_option('sfsi_premium_section4_options',false));
    
      $appid    = (isset($option4['sfsi_plus_facebook_appid']) && !empty($option4['sfsi_plus_facebook_appid']))
        ? $option4['sfsi_plus_facebook_appid']
        : '954871214567352';
        
        $appsecret  = (isset($option4['sfsi_plus_facebook_appsecret']) && !empty($option4['sfsi_plus_facebook_appsecret']))
        ? $option4['sfsi_plus_facebook_appsecret']
        : 'a780eb3d3687a084d6e5919585cc6a12';
        
        $json_url   = 'https://graph.facebook.com/'.$url.'?fields=fan_count&access_token='.$appid.'|'.$appsecret;
          $json_string= $this->file_get_contents_curl($json_url);
        $json     = json_decode($json_string, true);
      return isset($json['fan_count'])? $json['fan_count']:0;
    }


    /* create on page facebook links option */
    public function sfsi_plus_FBlike($permalink,$show_count='')
    {
      $send = 'false';
      $width = 180;
      $show_count=0;

      $permalink = trailingslashit($permalink);

      $fb_like_html = '<div class="fb-like" data-href="'.$permalink.'" ';

      if($show_count==1)
      { 
        $fb_like_html .= ' data-layout="button_count"';
      }
      else
      {
        $fb_like_html .= ' data-layout="button"';
      }
      $fb_like_html .= ' data-action="like"></div>';
      return $fb_like_html;exit;
    }


    /* create on page facebook share option */
    public function sfsiFB_Share($permalink,$show_count=false)
    {
      $fb_share_html = '<div class="fb-share-button" data-href="'.$permalink.'" data-share="true"';
      
      if($show_count==1)
      { 
        $fb_share_html .= ' data-layout="button_count"';
      }
      else
      {
        $fb_share_html .= ' data-layout="button"';
      }

      $fb_share_html .= '><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.trailingslashit($permalink).'&src=sdkpreparse"></a></div>';    
      return $fb_share_html;
    }
    
    /* create on page facebook follow option */
    public function sfsiFB_Follow($permalink)
    {
      $fb_share_html = '<div class="fb-follow" data-href="'.trailingslashit($permalink).'" data-layout="button" data-size="small" data-show-faces="true"></div>';
      return $fb_share_html;
    }

    #---------------------------------------------------------------------------------------------------------------------------------------------------------
                                #region Google+
    #---------------------------------------------------------------------------------------------------------------------------------------------------------

    /* get google+ follwers  */
    function sfsi_get_google($url,$google_api_key)
    {   
       if(filter_var($url, FILTER_VALIDATE_URL) && !empty($google_api_key))
       {
          $url = parse_url($url);
          $url_path=explode('/',$url['path']);

          if(isset($url_path))
          {  
             end($url_path);
             $key=key($url_path);
             $page_id = $url_path[$key];
          }
        
          if($this->sfsi_get_http_response_code("https://www.googleapis.com/plus/v1/people/".$page_id."?key=$google_api_key")!="404")
          {        
            $data = $this->file_get_contents_curl("https://www.googleapis.com/plus/v1/people/".$page_id."?key=$google_api_key");     
            $data = json_decode($data, true);
            
            return $this->format_num($data['circledByCount']); 
          }
          else
          {
            return 0;
          }    
       }
       else
       {
          return 0;
       }
    }

    /* get google+ likes */
    function sfsi_getPlus1($url)
    {
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
      $curl_results = curl_exec ($curl);
      curl_close ($curl);
      $json = json_decode($curl_results, true);
      
      return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
    }


    /* create on page google share option */      
    public function sfsi_Googlelike($permalink,$icons_language="en_US")
    {
      $show_count=0; 
      if ( function_exists( 'wp_add_inline_script' ) ){
        wp_add_inline_script('SFSIPLUSCustomJs',
          "window.___gcfg =" 
          ."{"
            ."lang:'".$icons_language."',parsetags: 'onload'"
          ."};",
          'after'
        );
      }
      $google_html = '<div class="g-plusone" data-href="' . $permalink . '" ';
      if($show_count)
      {
        $google_html .= 'data-size="bubble" ';
      }
      else
      {
        $google_html .= 'data-size="large" data-annotation="none" ';
      }
      $google_html .= '></div>';
      return $google_html;
    }      
      
    /* create on page google share option */      
    public function sfsi_GoogleShare($permalink,$icons_language="en_US")
    {
        $show_count=1;
        
        if ( function_exists( 'wp_add_inline_script' ) ){

          wp_add_inline_script('SFSIPLUSCustomJs',
            "window.___gcfg =" 
            ."{"
              ."lang:'".$icons_language."',parsetags: 'onload'"
            ."};",
            'after'
          );
        }

        $permalink = sfsi_premium_get_active_url();

        $google_html = '<div class="g-plus" data-action="share" data-annotation="none" data-height="24" data-href="'.$permalink.'"></div>';
        return $google_html;
    }
    
    /* create on page google follow option */      
      public function sfsi_GoogleFollow($permalink,$icons_language="en_US")
    {
      $show_count=1;
      if ( function_exists( 'wp_add_inline_script' ) ){
        wp_add_inline_script('SFSIPLUSCustomJs',
          "window.___gcfg =" 
          ."{"
            ."lang:'".$icons_language."',parsetags: 'onload'"
          ."};",
          'after'
        );
      }
      $google_html = '<div class="g-follow" data-annotation="none" data-height="24" data-href="'.$permalink.'" data-rel="author"></div>';
          return $google_html;
    }



    #---------------------------------------------------------------------------------------------------------------------------------------------------------
                                #region Youtube
    #---------------------------------------------------------------------------------------------------------------------------------------------------------

    /* get youtube subscribers  */
    function sfsi_get_youtube($user)
    {
      $option4 =  unserialize(get_option('sfsi_premium_section4_options',false));   
      
      if(isset($option4['sfsi_plus_youtube_channelId']) && !empty($option4['sfsi_plus_youtube_channelId'])){
        $channelId = $option4['sfsi_plus_youtube_channelId'];
        $xmlData   = $this->file_get_contents_curl('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channelId.'&key=AIzaSyA_SqAZGCpZ22vHzOUr3St5xf5XMy78oTY');
      }
      // if($user == 'SpecificFeeds')
      // {
      //  $option4 =  unserialize(get_option('sfsi_premium_section4_options',false));
      //  $user = (
      //    isset($option4['sfsi_plus_youtube_channelId']) &&
      //    !empty($option4['sfsi_plus_youtube_channelId'])
      //  ) ? $option4['sfsi_plus_youtube_channelId'] : 'UCYQyWnJPrY4XY3Avc7BU9aA';
        
      //  $xmlData = $this->file_get_contents_curl('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$user.'&key=AIzaSyA_SqAZGCpZ22vHzOUr3St5xf5XMy78oTY');
      // }
      else
      {
        $xmlData = $this->file_get_contents_curl('https://www.googleapis.com/youtube/v3/channels?part=statistics&forUsername='.$user.'&key=AIzaSyA_SqAZGCpZ22vHzOUr3St5xf5XMy78oTY');
      }
      
      if($xmlData)
      {   
        $xmlData = json_decode($xmlData);
        if(
          isset($xmlData->items) &&
          !empty($xmlData->items)
        )
        {
          $subs = $xmlData->items[0]->statistics->subscriberCount;
          $subs = $this->format_num($subs);
        }
        else
        {
          $subs=0;
        }

      }
      else
      {
        $subs=0;
      }    
      return $subs;
    }


    /* create on page youtube subscribe icon */       
    public function sfsi_YouTubeSub($yuser)
    {
      $option2=  unserialize(get_option('sfsi_premium_section2_options',false));
      $option4=  unserialize(get_option('sfsi_premium_section4_options',false));
      if(isset($option2['sfsi_plus_youtubeusernameorid']))
      {
        $sfsi_plus_youtubeusernameorid = $option2['sfsi_plus_youtubeusernameorid'];
        $sfsi_plus_ytube_chnlid = $option2['sfsi_plus_ytube_chnlid'];
      }
      elseif(isset($option4['sfsi_plus_youtubeusernameorid']))
      {
        $sfsi_plus_youtubeusernameorid = $option4['sfsi_plus_youtubeusernameorid'];
        $sfsi_plus_ytube_chnlid = $option4['sfsi_plus_ytube_chnlid'];
      }
      else
      {
        $sfsi_plus_youtubeusernameorid = '';
        $sfsi_plus_ytube_chnlid = '';
      }
      if($sfsi_plus_youtubeusernameorid == 'name')
      {
        $yuser = $option2['sfsi_plus_ytube_user'];
        $youtube_html = '<div class="g-ytsubscribe" data-channel="'.$yuser.'" data-layout="default" data-count="hidden"></div>';
      }
      else
      {
        $yuser = $sfsi_plus_ytube_chnlid;
        $youtube_html = '<div class="g-ytsubscribe" data-channelid="'.$yuser.'" data-layout="default" data-count="hidden"></div>';
      }
      return $youtube_html;
    } 
    #---------------------------------------------------------------------------------------------------------------------------------------------------------
                                #region AddThis (Share)
    #---------------------------------------------------------------------------------------------------------------------------------------------------------

    /* get addthis counts  */
    function sfsi_get_atthis()
    {
      // $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" :"http";
      // $url=$scheme.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
      $url = sfsi_plus_current_url();
      $url = trailingslashit($url);

      $json_string = $this->file_get_contents_curl('http://api-public.addthis.com/url/shares.json?url='.$url);
      $json = json_decode($json_string, true);
      return isset($json['shares'])? $this->format_num((int) $json['shares']):0;    
    }


    #---------------------------------------------------------------------------------------------------------------------------------------------------------
                                #region Pinterest
    #---------------------------------------------------------------------------------------------------------------------------------------------------------

    /* get pinit counts  */       
    function sfsi_get_pinterest($url)
    {
      $url = ( "html" == substr( parse_url($url,PHP_URL_PATH), -4 ) ) ? $url : trailingslashit($url);
      $count = 0;

      if(sfsi_is_ssl()){

        $option5  =  unserialize(get_option('sfsi_premium_section5_options',false));              
        $option4  =  unserialize(get_option('sfsi_premium_section4_options',false));

        $isPinterestCumulationActive = (isset($option5['sfsi_plus_pinterest_cumulative_count_active'])) ? $option5['sfsi_plus_pinterest_cumulative_count_active']: "no";

        if($isPinterestCumulationActive =="yes"){

          $httpUrl   = preg_replace("/^https:/i", "http:", $url);
          $httpsUrl  = $url;
          $cumuObj   = new sfsiCumulativeCount($httpUrl,$httpsUrl,"");
          $count     = $cumuObj->sfsi_pinterest_get_count();
        }
        else{
          $count = $this->get_pinit_counts($url);
        }       
      }
      else{
        $count = $this->get_pinit_counts($url);
      }

      return $count;
    }


    private function sfsi_get_board_pins(){

      $bcount    = 0;
      $option4   = unserialize(get_option('sfsi_premium_section4_options',false));

      $user_name = (isset($option4['sfsi_plus_pinterest_user']) && !empty($option4['sfsi_plus_pinterest_user'])) ? $option4['sfsi_plus_pinterest_user']: false;
      $board     = (isset($option4['sfsi_plus_pinterest_board_name']) && !empty($option4['sfsi_plus_pinterest_board_name'])) ? $option4['sfsi_plus_pinterest_board_name']: false; 

      if($user_name && $board){

        $boardSlug = sanitize_title_with_dashes($board);
        $query     = $user_name."/".$boardSlug;

        $burl       = 'https://pinterest.com/'.$query.'/';
        $board_respon = $this->sfsi_get_http_response_code($burl);

        if($board_respon!=404){
          $metas = get_meta_tags($burl);
          $bcount = (isset($metas['pinterestapp:pins'])) ? $metas['pinterestapp:pins']: 0;                        
        }     
      }
      return $bcount;
     }

    private function get_pinit_counts($pageurl){

      $pcount         = 0;
      $arrRespJson    = array();
      $url            = '';
      
      $option4        =  unserialize(get_option('sfsi_premium_section4_options',false));
      $getCountOf     =  trim($option4['sfsi_plus_pinterest_countsFrom']);

      if(isset($getCountOf) && !empty($getCountOf)){

        if($getCountOf == "manual"){
          $pcount   = $option4['sfsi_plus_pinterest_manualCounts'];
        }

        // Retrieve the number of Pinterest (+1) (on your blog)
        else if($getCountOf == "pins"){
          
          $return_data = $this->file_get_contents_curl('http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url='.$pageurl,true);
          $json_string = preg_replace('/^receiveCount\((.*)\)$/', "\\1", $return_data);
          $json        = json_decode($json_string, true);
          $pcount      = isset($json['count'])? intval($json['count']):0;
        }

        else if($getCountOf == "board"){
          $pcount = $this->sfsi_get_board_pins();
        }     
        
        else{

            $access_token = $option4['sfsi_plus_pinterest_access_token'];

            // Check if access token is set
            if(isset($access_token) && !empty($access_token)){ 

              // Get User data using acces token
              $urlUser  = "https://api.pinterest.com/v1/me/?access_token=".$access_token."&fields=counts,username";
            $url_respon = $this->sfsi_get_http_response_code($urlUser);

            if($url_respon!=404)
              {             
                $responseJson = $this->file_get_contents_curl($urlUser,true);
                $objUserData  = json_decode($responseJson);

                if(is_object($objUserData) && isset($objUserData->data)){
                  
                    $userData = $objUserData->data;

                    if(isset($userData->counts)){

                      $pcounts = $userData->counts;
                    
                    // Retrieve the number of pins from your pinterest account
                      if($getCountOf == "accountpins"){
                        $pcount = (isset($pcounts->pins)) ? $pcounts->pins : 0;
                      }
                      // Retrieve the number of pinterest followers
                      else if($getCountOf == "followers"){
                        $pcount = (isset($pcounts->followers)) ? $pcounts->followers : 0;
                      }
                    }
                }
              }       
            }
        }
      }

      $pcount = (strlen((string)$pcount)> 5) ? $this->format_num($pcount) : $pcount;    
      return $pcount;
     }


    public function sfsi_pinit_image(){

      $post_id = $this->sfsi_get_the_ID();

      $pinterest_img = '';

      $option5 =  unserialize(get_option('sfsi_premium_section5_options',false));
      
      $isGlobalSharingOn   = (isset($option5['sfsi_plus_social_sharing_options']) && !empty($option5['sfsi_plus_social_sharing_options']) && strtolower($option5['sfsi_plus_social_sharing_options']) == "global") ? true: false;

      if($isGlobalSharingOn){

        if(isset($option5['sfsiSocialPinterestImage']) && !empty($option5['sfsiSocialPinterestDesc'])){
          $pinterest_img = $option5['sfsiSocialPinterestImage'];
        }
      }
      else{

        $custom_pinit_img  = get_post_meta( $post_id,'sfsi-pinterest-media-image',true);      
        
        if(isset($custom_pinit_img) && !empty($custom_pinit_img)){
          $pinterest_img = $custom_pinit_img;
        }   
      }

      return $pinterest_img;
    }

    public function sfsi_pinit_description(){

      $post_id = $this->sfsi_get_the_ID();

      $pinterest_desc = '';

      $option5 =  unserialize(get_option('sfsi_premium_section5_options',false));
      
      $isGlobalSharingOn   = (isset($option5['sfsi_plus_social_sharing_options']) && !empty($option5['sfsi_plus_social_sharing_options']) && strtolower($option5['sfsi_plus_social_sharing_options']) == "global") ? true: false;

      if($isGlobalSharingOn){

        if(isset($option5['sfsiSocialPinterestDesc']) && !empty($option5['sfsiSocialPinterestDesc'])){
          $pinterest_desc = $option5['sfsiSocialPinterestDesc'];
        }
      }
      else{
        
        $custom_pinit_desc  = get_post_meta( $post_id,'social-pinterest-description',true);     
        
        if(isset($custom_pinit_desc) && !empty($custom_pinit_desc)){
          $pinterest_desc = $custom_pinit_desc;
        }
        else{
          $pinterest_desc = $this->sfsi_get_the_title();
        }
      }

      return $pinterest_desc;
    }


    /* create on page pinit button icon */      
    public function sfsi_PinIt($mouse_hover_effect='',$class='',$url='',$iconImg='')
    {
      $sfsi_premium_section2_options = unserialize(get_option('sfsi_premium_section2_options',false));

      $addCustomImgAttr = '';

      // Add custo
      if (false != isset($iconImg) && !empty($iconImg)) {
        $addCustomImgAttr = 'data-pin-custom="true"';
      }

      $media     = $this->sfsi_pinit_image();
      $description = $this->sfsi_pinit_description();


      $pin_it_html    = '<a class="'.$class.'" data-effect="'.$mouse_hover_effect.'" style="cursor:pointer" '.$addCustomImgAttr.' data-pin-do="buttonPin" data-pin-save="true" href="https://www.pinterest.com/pin/create/button/?url='.$url.'&media='.$media.'&description='.rawurlencode($description).'">'.$iconImg.'</a>';
      return $pin_it_html;
    }


    #---------------------------------------------------------------------------------------------------------------------------------------------------------
                                #region Instagram
    #---------------------------------------------------------------------------------------------------------------------------------------------------------
      
    /* get instragram followers */
    public function sfsi_get_instagramFollowers($user_name)
    {
      $sfsi_premium_instagram_sf_count = unserialize(get_option('sfsi_premium_instagram_sf_count',false));
      
      /*if date is empty (for decrease request count)*/
      if(empty($sfsi_premium_instagram_sf_count["date"]))
      {
        $sfsi_premium_instagram_sf_count["date"] = strtotime(date("Y-m-d"));
        $counts = $this->sfsi_plus_get_instagramFollowersCount($user_name);
        $sfsi_premium_instagram_sf_count["sfsi_plus_instagram_count"] = $counts;
        update_option('sfsi_premium_instagram_sf_count',  serialize($sfsi_premium_instagram_sf_count));
      }
      else
      {
        $phpVersion = phpVersion();
        if($phpVersion >= '5.3')
        {  
          $diff = date_diff(
            date_create(
              date("Y-m-d", $sfsi_premium_instagram_sf_count["date"])
            ),
            date_create(
              date("Y-m-d")
          ));
        } 
        if((isset($diff) && $diff->format("%a") < 1) || 1 == 1)
        {
          $sfsi_premium_instagram_sf_count["date"] = strtotime(date("Y-m-d"));
          $counts = $this->sfsi_plus_get_instagramFollowersCount($user_name);
          $sfsi_premium_instagram_sf_count["sfsi_plus_instagram_count"] = $counts;
          update_option('sfsi_premium_instagram_sf_count',  serialize($sfsi_premium_instagram_sf_count));
        }
        else
        {
          $counts = $sfsi_premium_instagram_sf_count["sfsi_plus_instagram_count"];
        }
      }
      return $counts;
    }
    
    /* get instragram followers count*/
    public function sfsi_plus_get_instagramFollowersCount($user_name)
    {
      $option4  = unserialize(get_option('sfsi_premium_section4_options',false));
      $token    = $option4['sfsi_plus_instagram_token'];
      
      $count    = 0;

      if(isset($token) && !empty($token)){

        $return_data = $this->get_content_curl('https://api.instagram.com/v1/users/self/?access_token='.$token);
        $objData   = json_decode($return_data);

        if(isset($objData) && isset($objData->data) && isset($objData->data->counts) && isset($objData->data->counts->followed_by)){
          $count   = $objData->data->counts->followed_by;
        }     
      }
      return $this->format_num($count,0);
    }
    

    #---------------------------------------------------------------------------------------------------------------------------------------------------------
                                #region Email
    #---------------------------------------------------------------------------------------------------------------------------------------------------------  

    /* get no of subscribers from specificfeeds for current blog */
    public function  SFSI_getFeedSubscriber($feedid)
    {
      $sfsi_premium_instagram_sf_count = unserialize(get_option('sfsi_premium_instagram_sf_count',false));
      
      /*if date is empty (for decrease request count)*/
      if(empty($sfsi_premium_instagram_sf_count["date"]))
      {
        $sfsi_premium_instagram_sf_count["date"] = strtotime(date("Y-m-d"));
        $counts = $this->sfsi_plus_getFeedSubscriberCount($feedid);
        $sfsi_premium_instagram_sf_count["sfsi_plus_sf_count"] = $counts;
        update_option('sfsi_premium_instagram_sf_count',  serialize($sfsi_premium_instagram_sf_count));
      }
      else
      {   
        $phpVersion = phpVersion();
        if($phpVersion >= '5.3')
        { 
          $diff = date_diff(
            date_create(
              date("Y-m-d", $sfsi_premium_instagram_sf_count["date"])
            ),
            date_create(
              date("Y-m-d")
          ));
        }  
        if((isset($diff) && $diff->format("%a") >= 1))
        {
          $sfsi_premium_instagram_sf_count["date"] = strtotime(date("Y-m-d"));
          $counts = $this->sfsi_plus_getFeedSubscriberCount($feedid);
          $sfsi_premium_instagram_sf_count["sfsi_plus_sf_count"] = $counts;
          update_option('sfsi_premium_instagram_sf_count',  serialize($sfsi_premium_instagram_sf_count));
        }
        else
        {
          $counts = $sfsi_premium_instagram_sf_count["sfsi_plus_sf_count"];
        }
      }
      
      if(empty($counts) || $counts == "O")
      {
        $counts = 0;
      }
      
      return $counts;
    }
    
    /* get no of subscribers from specificfeeds for current blog count*/
    public function  sfsi_plus_getFeedSubscriberCount($feedid)
    {
      $curl = curl_init();  
       
      curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL        => 'https://www.specificfeeds.com/wordpress/wpCountSubscriber',
        CURLOPT_USERAGENT      => 'sf rss request',
        CURLOPT_POST       => 1,
        CURLOPT_TIMEOUT      => 30,
        CURLOPT_POSTFIELDS => array(
          'feed_id' => $feedid,
          'v' => 'newplugincount'
        )
      ));
      /* Send the request & save response to $resp */
      $resp = curl_exec($curl);
      
      $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

      if($httpcode == 200){
        if(!empty($resp))
        {
          $resp=json_decode($resp);
          curl_close($curl);
          $feeddata = stripslashes_deep($resp->subscriber_count);
        }
        else{
          $sfsi_premium_instagram_sf_count = unserialize(get_option('sfsi_premium_instagram_sf_count',false));
          $feeddata = $sfsi_premium_instagram_sf_count["sfsi_plus_sf_count"];
        }
      }
      else{
        $sfsi_premium_instagram_sf_count = unserialize(get_option('sfsi_premium_instagram_sf_count',false));
        $feeddata = $sfsi_premium_instagram_sf_count["sfsi_plus_sf_count"];
      }
      return $this->format_num($feeddata);exit;
    }
      

    #---------------------------------------------------------------------------------------------------------------------------------------------------------
                                #region HELPER FUNCTIONS
    #--------------------------------------------------------------------------------------------------------------------------------------------------------- 

    /* send curl request   */
    private function file_get_contents_curl($url,$followlocation=false)
    {
      $ch=curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
      curl_setopt($ch, CURLOPT_FAILONERROR, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $followlocation);
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

    private function get_content_curl($url)
    {
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_HEADER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_HTTPGET, 1);
      curl_setopt($curl, CURLOPT_URL, $url );
      curl_setopt($curl, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
      curl_setopt($curl, CURLOPT_DNS_CACHE_TIMEOUT, 2 );
      $cont = curl_exec($curl);
    
      if(curl_error($curl))
      {
        //die(curl_error($ch));
      }
      return $cont;
    }

    /* convert no. to 2K,3M format   */
    function format_num( $n, $precision = 1 ) {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'k';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'm';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'b';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 't';
        }
      // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
      // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ( $precision > 0 ) {
            $dotzero = '.' . str_repeat( '0', $precision );
            $n_format = str_replace( $dotzero, '', $n_format );
        }
        return $n_format.$suffix;
    }
    
    /*
      This function returns 0 if post id not found    
    */
    public function sfsi_get_the_ID() {

        $post_id = false;

        try {
               if ( in_the_loop() ) {
                    $post_id = (get_the_ID())? get_the_ID(): sfsi_premium_url_to_postid( urldecode( sfsi_plus_current_url() ) );
                } else {
                  /** @var $wp_query wp_query */
                     global $wp_query;

                    if(isset($wp_query) && !empty($wp_query) && is_object($wp_query)){
                          $post_id = $wp_query->get_queried_object_id();                  
                    }
                }
        }

        //catch exception
        catch(Exception $e) {
          return false;

        }

         return $post_id;
    } 

    public function sfsi_get_the_title(){

      $title    = get_bloginfo('name');
      $title    = (isset($title) && strlen($title)>0) ? $title : get_bloginfo('url'); 
      $post_id  = $this->sfsi_get_the_ID();

      if($post_id){
        $post_title = (is_archive()) ? get_queried_object()->name : get_the_title($post_id);
        $title      = (isset($post_title) && strlen(trim($post_title))>0) ? $post_title : $title;
      }

      return wp_kses_post($title);    
    }

    /* check response from a url */
    private function sfsi_get_http_response_code($url)
    {
      $headers = get_headers($url);
      return substr(@$headers[0], 9, 3);
    }
}