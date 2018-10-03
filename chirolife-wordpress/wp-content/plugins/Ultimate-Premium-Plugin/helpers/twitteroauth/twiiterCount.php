<?php 

include_once "autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

include_once(SFSI_PLUS_DOCROOT.'/libs/controllers/socialHelper/twitter.php');

function sfsi_premium_twitter_followers(){

	$count = 0;

	$option4 =  unserialize(get_option('sfsi_premium_section4_options',false));		

	if(isset($option4['sfsiplus_tw_consumer_key'])       && isset($option4['sfsiplus_tw_consumer_secret']) 
	&& isset($option4['sfsiplus_tw_oauth_access_token']) && isset($option4['sfsiplus_tw_oauth_access_token_secret'])):

		$twitterHelper = new sfsiTwitterSocialHelper();

		if(false != $twitterHelper->sfsi_isTWCachingActive($option4) && false != $twitterHelper->shall_call_twcount_api() ):

			$count = get_twiiter_followers_count_api($option4);

			$twitterHelper->tw_api_update_call_log();

			$twitterHelper->save_twitter_followers_count($count);

			return $twitterHelper->get_cached_twitter_followers_count();

		else:

			$count = get_twiiter_followers_count_api($option4);

			return $count;

		endif;

	endif;

	return $count;
}

function get_twiiter_followers_count_api($option4){
    
    $connection = new TwitterOAuth($option4['sfsiplus_tw_consumer_key'], $option4['sfsiplus_tw_consumer_secret'], $option4['sfsiplus_tw_oauth_access_token'], $option4['sfsiplus_tw_oauth_access_token_secret']);

    $statuses = $connection->get('followers/ids');
    
    $count    = isset($statuses) && isset($statuses->ids) && sfsiIsArrayOrObject($statuses->ids) ? count($statuses->ids) : 0; 
    return $count;

  }

