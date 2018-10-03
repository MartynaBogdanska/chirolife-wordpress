<?php
if (!function_exists('array_column')) {
    /**
     * Returns the values from a single column of the input array, identified by
     * the $columnKey.
     *
     * Optionally, you may provide an $indexKey to index the values in the returned
     * array by the values from the $indexKey column in the input array.
     *
     * @param array $input A multi-dimensional array (record set) from which to pull
     *                     a column of values.
     * @param mixed $columnKey The column of values to return. This value may be the
     *                         integer key of the column you wish to retrieve, or it
     *                         may be the string key name for an associative array.
     * @param mixed $indexKey (Optional.) The column to use as the index/keys for
     *                        the returned array. This value may be the integer key
     *                        of the column, or it may be the string key name.
     * @return array
     */
    function array_column($input = null, $columnKey = null, $indexKey = null)
    {
        // Using func_get_args() in order to check for proper number of
        // parameters and trigger errors exactly as the built-in array_column()
        // does in PHP 5.5.
        $argc = func_num_args();
        $params = func_get_args();

        if ($argc < 2) {
            trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);
            return null;
        }

        if (!is_array($params[0])) {
            trigger_error(
                'array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given',
                E_USER_WARNING
            );
            return null;
        }

        if (!is_int($params[1])
            && !is_float($params[1])
            && !is_string($params[1])
            && $params[1] !== null
            && !(is_object($params[1]) && method_exists($params[1], '__toString'))
        ) {
            trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
            return false;
        }

        if (isset($params[2])
            && !is_int($params[2])
            && !is_float($params[2])
            && !is_string($params[2])
            && !(is_object($params[2]) && method_exists($params[2], '__toString'))
        ) {
            trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
            return false;
        }

        $paramsInput = $params[0];
        $paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;

        $paramsIndexKey = null;
        if (isset($params[2])) {
            if (is_float($params[2]) || is_int($params[2])) {
                $paramsIndexKey = (int) $params[2];
            } else {
                $paramsIndexKey = (string) $params[2];
            }
        }

        $resultArray = array();

        foreach ($paramsInput as $row) {
            $key = $value = null;
            $keySet = $valueSet = false;

            if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
                $keySet = true;
                $key = (string) $row[$paramsIndexKey];
            }

            if ($paramsColumnKey === null) {
                $valueSet = true;
                $value = $row;
            } elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
                $valueSet = true;
                $value = $row[$paramsColumnKey];
            }

            if ($valueSet) {
                if ($keySet) {
                    $resultArray[$key] = $value;
                } else {
                    $resultArray[] = $value;
                }
            }

        }

        return $resultArray;
    }
}

if (!function_exists('sfsi_premium_version_compare')) {
    function sfsi_premium_version_compare($ver1, $ver2, $operator = null) {
        $p = '#(\.0+)+($|-)#';
        $ver1 = preg_replace($p, '', $ver1);
        $ver2 = preg_replace($p, '', $ver2);
        return isset($operator) ? version_compare($ver1, $ver2, $operator) : version_compare($ver1, $ver2);
    }
}

if (!function_exists('sfsi_premium_get_client_ip')) {

    function sfsi_premium_get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}

function sfsi_premium_is_ssl(){
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
    return $scheme;
}
//getting line height for the icons
function sfsi_plus_getlinhght($lineheight)
{
    if( $lineheight < 16)
    {
        $lineheight = $lineheight*2;
        return $lineheight;
    }
    elseif( $lineheight >= 16 && $lineheight < 20 )
    {
        $lineheight = $lineheight+10;
        return $lineheight;
    }
    elseif( $lineheight >= 20 && $lineheight < 28 )
    {
        $lineheight = $lineheight+3;
        return $lineheight;
    }
    elseif( $lineheight >= 28 && $lineheight < 40 )
    {
        $lineheight = $lineheight+4;
        return $lineheight;
    }
    elseif( $lineheight >= 40 && $lineheight < 50 )
    {
        $lineheight = $lineheight+5;
        return $lineheight;
    }
    $lineheight = $lineheight+6;
    return $lineheight;
}

function sfsi_premium_is_blog_page(){
    
    // Default home page, take settings from "On Blog pages"
    if ( is_front_page() && is_home() ) {
        return true;        
        //echo "Default homepage";
    }
    // Default home page, take settings from "Also show icons at the end of pages?"
    elseif ( is_front_page()){
        return false;
        //echo "Static homepage";
    } 
    // Posts page take settings from "On Blog pages"
    elseif ( is_home()){
        return true;
        //echo "Blog page";
    }
    // Default home page, take settings from "Also show icons at the end of pages?"
    else{
        return false;
        //echo "everything else";
    }
}

function sfsi_strpos_all($string,$searchStr,$replaceStr) {

    $offset = 0;

    while (($pos = strpos($string, $searchStr, $offset)) !== FALSE) {
        $offset   = $pos + 1;
        $string = substr_replace($string,$replaceStr,$pos,strlen($searchStr));        
    }
    return $string;
}

function sfsi_get_description($postid)
{
    $post = get_post($postid);
    $desc = trim(get_the_excerpt($postid));

    if(strlen($desc)==0){
        $desc = $post->post_content;
        $desc = str_replace(']]>',']]&gt;', $desc);
        $desc = strip_shortcodes( $desc );
    }

    $desc   = strip_tags( $desc );
    $desc   = esc_attr($desc);
    $desc   = trim(preg_replace("/\s+/", " ", $desc));
    $desc   = sfsi_sub_string($desc, 400);
    return $desc;
}

function sfsi_filter_text($desc)
{
    if(strlen($desc)>0){
        $desc   = str_replace(']]>',']]&gt;', $desc);
        $desc   = strip_shortcodes( $desc );
        $desc   = strip_tags( $desc );
        $desc   = esc_attr($desc);
        $desc   = trim(preg_replace("/\s+/", " ", $desc));
    }
    return $desc;
}

function sfsi_sub_string($text, $charlength=200) {
    $charlength++;
    $retext="";
    if ( mb_strlen( $text ) > $charlength ) {
        $subex = mb_substr( $text, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            $retext .= mb_substr( $subex, 0, $excut );
        } else {
            $retext .= $subex;
        }
        $retext .= '[...]';
    } else {
        $retext .= $text;
    }
    
    return $retext;
}

/**
 * Get an attachment ID given a URL.
 * 
 * @param string $url
 *
 * @return int Attachment ID on success, 0 on failure
 */
function sfsi_get_attachment_id( $url ) { 
    $attachment_id = false;
    global $wpdb; $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $url ));
    $attachment_id = (isset($attachment[0]) && !empty($attachment[0])) ? $attachment[0]:$attachment_id; 
    return $attachment[0]; 
}

//sanitizing values
function sfsi_plus_string_sanitize($s) {
    $result = preg_replace("/[^a-zA-Z0-9]+/", " ", html_entity_decode($s, ENT_QUOTES));
    return $result;
}

function sfsi_plus_get_bloginfo($url)
{
    $web_url = get_bloginfo($url);
    
    //Block to use feedburner url
    if (preg_match("/(feedburner)/im", $web_url, $match))
    {
        $web_url = site_url()."/feed";
    }
    return $web_url;
}

function sfsi_premium_strip_tags_content($text, $tags = '', $invert = FALSE) { 

  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags); 
  $tags = array_unique($tags[1]); 

  if(is_array($tags) && count($tags) > 0) { 
    if($invert == FALSE) { 
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
    } 
    else { 
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text); 
    } 
  } 
  elseif($invert == FALSE) { 
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text); 
  }

  $text = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $text);

  return $text; 
} 

function sfsi_plus_current_url()
{
    global $post, $wp;

    if(empty($wp)){
        $GLOBALS['wp'] = new WP();
    }

    if (!empty($wp)) {
        $url = home_url(add_query_arg(array(),$wp->request));
    }
    elseif(!empty($post))
    {
        $url = get_permalink($post->ID);
    }
    else{
        
        $protocol = false != sfsi_is_ssl() ? "https" :"http";

        $url = $protocol."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $url = urldecode($url);
        $url = sfsi_premium_strip_tags_content($url);
    }    

    $url = urlencode($url);

    return $url;
}
add_shortcode("usm_premium_shared_current_url","sfsi_plus_current_url");


/**
   * Filters a sanitized textarea field string.
   *
   * @param string $filtered The sanitized string.
   * @param string $str      The string prior to being sanitized.
 */

function sfsi_sanitize_textarea_field($str, $keep_newlines = false){

    $filtered = wp_check_invalid_utf8( $str );
 
    if ( strpos($filtered, '<') !== false ) {
        
        $filtered = wp_pre_kses_less_than( $filtered );
        
        // This will strip extra whitespace for us.
        $filtered = wp_strip_all_tags( $filtered, false );
 
        // Use html entities in a special case to make sure no later
        // newline stripping stage could lead to a functional tag
        $filtered = str_replace("<\n", "&lt;\n", $filtered);
    }
 
    if ( ! $keep_newlines ) {
        $filtered = preg_replace( '/[\r\n\t ]+/', ' ', $filtered );
    }
    $filtered = trim( $filtered );
 
    $found = false;
    while ( preg_match('/%[a-f0-9]{2}/i', $filtered, $match) ) {
        $filtered = str_replace($match[0], '', $filtered);
        $found = true;
    }
 
    if ( $found ) {
        // Strip out the whitespace that may now exist after removing the octets.
        $filtered = trim( preg_replace('/ +/', ' ', $filtered) );
    }
 
    return $filtered;
}

function sfsi_is_ssl(){
    
    $isssl = false;

    $server_opts = array(
            "HTTP_CLOUDFRONT_FORWARDED_PROTO"   => "https",
            "HTTP_CF_VISITOR"                   => "https",
            "HTTP_X_FORWARDED_PROTO"            => "https",
            "HTTP_X_FORWARDED_SSL"              => "on",
            "HTTP_X_FORWARDED_SSL"              => "1"
    );

    foreach( $server_opts as $option => $value ) {

        if ((isset($_ENV["HTTPS"]) && ( "on" == $_ENV["HTTPS"] ))       
            
            || (isset( $_SERVER[ $option ] ) && ( strpos( $_SERVER[ $option ], $value ) !== false ))

            || (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) 

        ) {

            $_SERVER[ "HTTPS" ] = "on";
            $isssl = true;
            break;
        }
    }

    return $isssl;  
}

/**
 * Sort a 2 dimensional array based on 1 or more indexes.
 * 
 * msort() can be used to sort a rowset like array on one or more
 * 'headers' (keys in the 2th array).
 * 
 * @param array        $array      The array to sort.
 * @param string|array $key        The index(es) to sort the array on.
 * @param int          $sort_flags The optional parameter to modify the sorting 
 *                                 behavior. This parameter does not work when 
 *                                 supplying an array in the $key parameter. 
 * 
 * @return array The sorted array.
 */
function sfsi_premium_msort($array, $key, $sort_flags = SORT_REGULAR) {
    
    if (is_array($array) && count($array) > 0) {
        if (!empty($key)) {
            $mapping = array();
            foreach ($array as $k => $v) {
                $sort_key = '';
                if (!is_array($key)) {
                    $sort_key = $v[$key];
                } else {
                    // @TODO This should be fixed, now it will be sorted as string
                    foreach ($key as $key_key) {
                        $sort_key .= $v[$key_key];
                    }
                    $sort_flags = SORT_STRING;
                }
                $mapping[$k] = $sort_key;
            }
            asort($mapping, $sort_flags);
            $sorted = array();
            foreach ($mapping as $k => $v) {
                $sorted[] = $array[$k];
            }
            return $sorted;
        }
    }
    return $array;
}

/**
 * Searches an element in an array 
 *
 * @params (mixed)  $searchValue: value to be searched
 * @params (array)  $arrhaystack: Array in which search will be performed
 * @params (string) $compare: function name to be used for comparision 
 * @params (int)    $high : Highest index of array
 * @params (low)    $low :  Lowest  index of array
 * @params (bool)   $containsDuplicates : if array might contain duplicates

 * @returns(int | bool) $key:  if element, found returns key of element otherwise returns false 
 *

Example usage:

$emails = [ array of emails ];
$searchEmail = 'wkeeling@gmail.com';
$key = sfsi_premium_array_binarySearch($searchEmail, $emails, 'strcmp', count($emails) - 1, 0, true);

 */

function sfsi_premium_array_binarySearch($searchValue, $arrhaystack, $compare, $high, $low = 0, $containsDuplicates = false)
{

    $key = (0 == $high) ? 0 : false;

    // Whilst we have a range. If not, then that match was not found.
    while ($high > $low) {

            // Find the middle of the range.
            $mid = (int)floor(($high + $low) / 2);
            // Compare the middle of the range with the needle. This should return <0 if it's in the first part of the range,
            // or >0 if it's in the second part of the range. It will return 0 if there is a match.
            $cmp = call_user_func($compare, $searchValue, $arrhaystack[$mid]);
            
            // Adjust the range based on the above logic, so the next loop iteration will use the narrowed range
            if ($cmp < 0) {
                $high = $mid - 1;
            } elseif ($cmp > 0) {
                $low = $mid + 1;
            } else {

                // We've found a match
                if ($containsDuplicates) {
                    // Find the first item, if there is a possibility our data set contains duplicates by comparing the
                    // previous item with the current item ($mid).
                    while ($mid > 0 && call_user_func($compare, $arrhaystack[($mid - 1)], $arrhaystack[$mid]) === 0) {
                        $mid--;
                    }
                }
                $key = (int) $mid;
                break;
            }
    }
    return $key;
}


/**
 * Converts an array to an object
 *
 * @params Array $array the array to be converted to an object
 * @params bool $recursive Whether or not to convert child arrays to child objects
 * @returns Object $object
 */
function sfsi_premium_arrayToObject($array, $recursive=true) {
  
  $object = new stdClass;
  
  foreach($array as $k => $v) {
    
    if($recursive && is_array($v)) {
      $object->{$k} = sfsi_premium_arrayToObject($v, $recursive);
    } else {
      $object->{$k} = $v;
    }
  }
  return $object;
}

function sfsi_premium_key_match_array($key,$arr){

    $keyExists = isset($arr) && !empty($arr) && isset($arr[$key]) ? true : false;

    return $keyExists;
}

function sfsi_premium_js_str($s)
{
    return '"' . addcslashes($s, "\0..\37\"\\") . '"';
}

function sfsi_premium_json_array($array)
{
    $temp = array_map('sfsi_premium_js_str', $array);
    return '[' . implode(',', $temp) . ']';
}

function sfsi_premium_get_all_site_urls(){

    global $wp_rewrite;

    if(empty($wp_rewrite)){
        $GLOBALS['wp_rewrite'] = new WP_Rewrite();
    } 

    $args       = array( '_builtin' => false,'public'   => true );
    $post_types = get_post_types($args,'names');

    array_push($post_types,"post","page");

    $arrPosts = get_posts(array(
        'fields'          => 'ids', // Only get post IDs
        'posts_per_page'  => -1,
        'post_status'     => 'publish',
        'post_type'       => $post_types
    ));

    $arrUrl     = array();
    
    // Add home page link
    $homeHttpsUrl = trailingslashit( home_url() );

    array_push($arrUrl, $homeHttpsUrl);

    // Get all urls
    if(isset($arrPosts) && !empty($arrPosts)){
        
     foreach ($arrPosts as $postId):

         if(isset($postId) && !empty($postId)):
                
             $url = trailingslashit( get_the_permalink($postId) );       
                
             array_push( $arrUrl, $url );

         endif;

     endforeach;
    }

    // Get taxonomies urls
    // $turls  = sfsi_premium_get_all_taxonomies_urls();
    // $arrUrl = false != $turls ? array_merge( $arrUrl, $turls ) : $arrUrl;

    return $arrUrl;
}

function sfsi_premium_get_permalinks($arrPostids){

    $arrUrls = array();

    if(isset($arrPostids) && !empty($arrPostids) && is_array($arrPostids)){
        
     foreach ($arrPostids as $postId):

         if(isset($postId) && !empty($postId)):
                
             $url = trailingslashit( get_the_permalink($postId) );       
                
             array_push( $arrUrls, $url );

         endif;

     endforeach;
    }

    return $arrUrls;
}

function sfsi_premium_get_urls_for_taxonomy($taxonomy){

    $urls = array();

    // get the terms of taxonomy
    $terms = get_terms(     
        $args = array(
        'taxonomy' => $taxonomy
    ));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){                

            // loop through all terms
            foreach( $terms as $term ) {

                if( $term->count > 0 )

                    // display link to term archive
                    $url = trailingslashit(get_term_link($term->term_id));

                    array_push($urls, $url);
            }
    }

    $urls = empty($urls) ? false : $urls;

    return $urls;
}

function sfsi_premium_get_all_taxonomies_urls(){

    $allUrls = array();

    $allTaxonomies = get_taxonomies(array('public'=>true,'show_ui'=>true),'objects','and');

    if(isset($allTaxonomies) && !empty($allTaxonomies)):

        foreach ($allTaxonomies as $taxonomy):
            
            $urls = sfsi_premium_get_urls_for_taxonomy($taxonomy->name);

            if(false != $urls){

                $allUrls = array_merge($allUrls,$urls);
            }

        endforeach;

    endif;

    $allUrls = empty($allUrls) ? false : $allUrls;

    return $allUrls;
}

function sfsi_premium_url_to_postid( $url ) {

    global $wp_rewrite;
    global $wp;

    if(empty($wp_rewrite)){
        $GLOBALS['wp_rewrite'] = new WP_Rewrite();
    }

    if(empty($wp)){
        $GLOBALS['wp'] = new WP();
    }
 
    /**
     * Filters the URL to derive the post ID from.
     *
     * @since 2.2.0
     *
     * @param string $url The URL to derive the post ID from.
     */
    $url = apply_filters( 'url_to_postid', $url );
 
    $url_host      = str_replace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
    $home_url_host = str_replace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
 
    // Bail early if the URL does not belong to this site.
    if ( $url_host && $url_host !== $home_url_host ) {
        return 0;
    }
 
    // First, check to see if there is a 'p=N' or 'page_id=N' to match against
    if ( preg_match('#[?&](p|page_id|attachment_id)=(\d+)#', $url, $values) )   {
        $id = absint($values[2]);
        if ( $id )
            return $id;
    }
 
    // Get rid of the #anchor
    $url_split = explode('#', $url);
    $url = $url_split[0];
 
    // Get rid of URL ?query=string
    $url_split = explode('?', $url);
    $url = $url_split[0];
 
    // Set the correct URL scheme.
    $scheme = parse_url( home_url(), PHP_URL_SCHEME );
    $url = set_url_scheme( $url, $scheme );
 
    // Add 'www.' if it is absent and should be there
    if ( false !== strpos(home_url(), '://www.') && false === strpos($url, '://www.') )
        $url = str_replace('://', '://www.', $url);
 
    // Strip 'www.' if it is present and shouldn't be
    if ( false === strpos(home_url(), '://www.') )
        $url = str_replace('://www.', '://', $url);
 
    if ( trim( $url, '/' ) === home_url() && 'page' == get_option( 'show_on_front' ) ) {
        $page_on_front = get_option( 'page_on_front' );
 
        if ( $page_on_front && get_post( $page_on_front ) instanceof WP_Post ) {
            return (int) $page_on_front;
        }
    }
 
    // Check to see if we are using rewrite rules
    $rewrite = $wp_rewrite->wp_rewrite_rules();
 
    // Not using rewrite rules, and 'p=N' and 'page_id=N' methods failed, so we're out of options
    if ( empty($rewrite) )
        return 0;
 
    // Strip 'index.php/' if we're not using path info permalinks
    if ( !$wp_rewrite->using_index_permalinks() )
        $url = str_replace( $wp_rewrite->index . '/', '', $url );
 
    if ( false !== strpos( trailingslashit( $url ), home_url( '/' ) ) ) {
        // Chop off http://domain.com/[path]
        $url = str_replace(home_url(), '', $url);
    } else {
        // Chop off /path/to/blog
        $home_path = parse_url( home_url( '/' ) );
        $home_path = isset( $home_path['path'] ) ? $home_path['path'] : '' ;
        $url = preg_replace( sprintf( '#^%s#', preg_quote( $home_path ) ), '', trailingslashit( $url ) );
    }
 
    // Trim leading and lagging slashes
    $url = trim($url, '/');
 
    $request = $url;
    $post_type_query_vars = array();
 
    foreach ( get_post_types( array() , 'objects' ) as $post_type => $t ) {
        if ( ! empty( $t->query_var ) )
            $post_type_query_vars[ $t->query_var ] = $post_type;
    }
 
    // Look for matches.
    $request_match = $request;
    foreach ( (array)$rewrite as $match => $query) {
 
        // If the requesting file is the anchor of the match, prepend it
        // to the path info.
        if ( !empty($url) && ($url != $request) && (strpos($match, $url) === 0) )
            $request_match = $url . '/' . $request;
 
        if ( preg_match("#^$match#", $request_match, $matches) ) {
 
            if ( $wp_rewrite->use_verbose_page_rules && preg_match( '/pagename=\$matches\[([0-9]+)\]/', $query, $varmatch ) ) {
                // This is a verbose page match, let's check to be sure about it.
                $page = get_page_by_path( $matches[ $varmatch[1] ] );
                if ( ! $page ) {
                    continue;
                }
 
                $post_status_obj = get_post_status_object( $page->post_status );
                if ( ! $post_status_obj->public && ! $post_status_obj->protected
                    && ! $post_status_obj->private && $post_status_obj->exclude_from_search ) {
                    continue;
                }
            }
 
            // Got a match.
            // Trim the query of everything up to the '?'.
            $query = preg_replace("!^.+\?!", '', $query);
 
            // Substitute the substring matches into the query.
            $query = addslashes(WP_MatchesMapRegex::apply($query, $matches));
 
            // Filter out non-public query vars
            parse_str( $query, $query_vars );
            $query = array();
            foreach ( (array) $query_vars as $key => $value ) {
                if ( in_array( $key, $wp->public_query_vars ) ){
                    $query[$key] = $value;
                    if ( isset( $post_type_query_vars[$key] ) ) {
                        $query['post_type'] = $post_type_query_vars[$key];
                        $query['name'] = $value;
                    }
                }
            }
 
            // Resolve conflicts between posts with numeric slugs and date archive queries.
            $query = wp_resolve_numeric_slug_conflicts( $query );
 
            // Do the query
            $query = new WP_Query( $query );
            if ( ! empty( $query->posts ) && $query->is_singular )
                return $query->post->ID;
            else
                return 0;
        }
    }
    return 0;
}
function sfsi_premium_get_option($array,$textkey,$valueToReturnOnFailOrNotExist,$functionToUse=false){
    
    $valueToReturnOnFailOrNotExist = isset($valueToReturnOnFailOrNotExist) ? $valueToReturnOnFailOrNotExist: false;

    if(is_array($array) && isset($array) && !empty($array) && isset($textkey) && !empty($textkey)){

        if(isset($array[$textkey])){

            $value = $array[$textkey];

            if(false != $functionToUse && function_exists($functionToUse)){
                return call_user_func_array($functionToUse, array($value));   
            }
            else {
                return $array[$textkey];                
            }
        }    
    }

    return $valueToReturnOnFailOrNotExist;
}

function sfsi_premium_get_custom_post_types(){
    $args               = array( '_builtin' => false,'public'   => true );
    $custom_post_types  = get_post_types($args,'names');
    $custom_post_types  = array_values($custom_post_types);
    return $custom_post_types;
}

function sfsi_premium_get_all_taxonomies(){
    $allListTaxonomies = get_taxonomies(array('_builtin' => false,'public'=>true,'show_ui'=>true),'objects','and');
    return $allListTaxonomies;
}

function sfsi_premium_get_section_data($sectionNumber){
 
    $dbKey  = 'sfsi_premium_section'.$sectionNumber.'_options';
    $option = unserialize(get_option($dbKey,false));
    $option = isset($option) && !empty($option) ? $option : array();

    return $option;
}

function sfsi_premium_nl2br($string) { 
    $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string); 
   return $string; 
}

function sfsiIsArrayOrObject($value){

    $isArrayOrObject = false;

    if(is_array($value) || is_object($value)){
        $isArrayOrObject = true;
    }

    return $isArrayOrObject;
}

if(!function_exists('wp_scripts')){
    function wp_scripts() {
        global $wp_scripts;
        if ( ! ( $wp_scripts instanceof WP_Scripts ) ) {
            $wp_scripts = new WP_Scripts();
        }
        return $wp_scripts;
    }
}
if(!function_exists(('wp_add_inline_script'))){

    function wp_add_inline_script( $handle, $data, $position = 'after' ) {
        $wp_scripts=wp_scripts();
        if ( ! $data ) {
            return false;
        }
 
        if ( 'after' !== $position ) {
            $position = 'before';
        }
 
        $script   = (array) $wp_scripts->get_data( $handle, $position );
        $script[] = $data;
 
        return $wp_scripts->add_data( $handle, $position, $script );
    }
}

if(!function_exists(('sfsi_premium_get_the_ID'))){

    function sfsi_premium_get_the_ID() {

        $post_id = false;

        if ( in_the_loop() ) {
            $post_id = (get_the_ID())? get_the_ID(): sfsi_premium_url_to_postid( urldecode( sfsi_plus_current_url() ) );
        } else {
          /** @var $wp_query wp_query */
           global $wp_query;
           $post_id = $wp_query->get_queried_object_id();
        }
        return $post_id;
    } 
}

if(!function_exists(('sfsi_premium_get_active_url'))){

    function sfsi_premium_get_active_url(){

        $url      = get_bloginfo('url');
        $post_id  = sfsi_premium_get_the_ID();

        if(!in_the_loop()){

          if(is_author()){

              $url   = get_author_posts_url(get_the_author_meta('ID'));
              
          }      
          else if(is_archive()){

              $url   = get_term_link(get_queried_object()->term_id);
          }

          else if(is_singular()){
             $url  =  get_permalink($post_id);
             return $url;
          }
        
        }
        else if($post_id){
              $url  =  get_permalink($post_id);
        }

        if(is_string($url)){
            return $url;
        }else{
            return get_bloginfo('url');
        }

    }

}

/////////////////////////////////////// ADMIN VIEW HELPER FUNCTIONS ///////////////////////////////////////////

if(!function_exists('sfsi_shallDisplayIcon')){

    function sfsi_shallDisplayIcon($iconName,$isDesktop=true,$option1=false){

        $display = false;

        if(isset($iconName) && !empty($iconName)){
    
            $option1  =  false != $option1 ? $option1: unserialize(get_option('sfsi_premium_section1_options',false)); 

            if("fb" == $iconName){
                $iconName = "facebook";
            }

            $key      = false != $isDesktop ? 'sfsi_plus_'.$iconName.'_display': 'sfsi_plus_'.$iconName.'_mobiledisplay';
            $display  = isset($option1[$key]) && !empty($option1[$key]) && "yes" == $option1[$key] ? true : false;

        }

        return $display;
    }
}  

if(!function_exists('sfsi_shallDisplayCustomIconOnMobile')){

    function sfsi_shallDisplayCustomIconOnMobile($customElementIndex,$option1=false){

        $display = false;
    
        $option1  =  false != $option1 ? $option1: unserialize(get_option('sfsi_premium_section1_options',false)); 

        $customMIcons = isset($option1['sfsi_custom_mobile_icons'])  && !empty($option1['sfsi_custom_mobile_icons']) ? unserialize($option1['sfsi_custom_mobile_icons']) : false;

        $display = false != $customMIcons ? in_array($customMIcons[$customElementIndex],$customMIcons) : false;

        return $display;
    }
}  

if(!function_exists('sfsi_getOldDesktopIconOrder')){

    function sfsi_getOldDesktopIconOrder($iconName,$defaultIndex,$option5){

        $oldOrder = $defaultIndex;

        if(isset($iconName) && !empty($iconName)){

            $option5 = false != $option5 ? $option5 : unserialize(get_option('sfsi_premium_section5_options',false));

            $key = ("fb"== $iconName) ? 'sfsi_plus_facebookIcon_order': 'sfsi_plus_'.$iconName.'Icon_order';

            $oldOrder = isset($option5[$key]) && !empty($option5[$key]) ? intval($option5[$key]) : $defaultIndex;

        }

        return $oldOrder;
    }
}

if(!function_exists('sfsi_premium_admin_default_icons_order')){

    function sfsi_premium_admin_default_icons_order($option1=false,$isDesktop=true){

        $option1 = false != $option1 ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));
        
        $arrDefaultIconsOrder = array(

        array("iconName" => "rss",       "index"  => 1),
        array("iconName" => "email",     "index"  => 2), 
        array("iconName" => "fb",        "index"  => 3),
        array("iconName" => "google" ,   "index"  => 4),
        array("iconName" => "twitter" ,  "index"  => 5),
        array("iconName" => "share"   ,  "index"  => 6),
        array("iconName" => "youtube"  , "index"  => 7),
        array("iconName" => "pinterest", "index"  => 8),
        array("iconName" => "linkedin" , "index"  => 9),
        array("iconName" => "instagram", "index"  => 10),
        array("iconName" => "houzz"    , "index"  => 11),
        array("iconName" => "snapchat" , "index"  => 12),
        array("iconName" => "whatsapp" , "index"  => 13),
        array("iconName" => "skype"    , "index"  => 14),
        array("iconName" => "vimeo"    , "index"  => 15),
        array("iconName" => "soundcloud","index"  => 16),
        array("iconName" => "yummly"  ,  "index"  => 17),
        array("iconName" => "flickr"  ,  "index"  => 18),
        array("iconName" => "reddit"  ,  "index"  => 19),
        array("iconName" => "tumblr"  ,  "index"  => 20)
      
      );

      return $arrDefaultIconsOrder;

    }
}  

if(!function_exists('sfsi_premium_desktop_icons_order')){

    function sfsi_premium_desktop_icons_order($option5=false,$option1=false){

        $option5 = false != $option5 ? $option5 : unserialize(get_option('sfsi_premium_section5_options',false));
        $option1 = false != $option1 ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));

        $customIcons   = array();
        $customDIcons  = array();

        // Get all custom icons

        if(isset($option1['sfsi_custom_files']) && !empty($option1['sfsi_custom_files']) ){

            $sfsi_custom_files = $option1['sfsi_custom_files'];

            if( is_string($sfsi_custom_files) ){
                $customIcons = unserialize($sfsi_custom_files);
            }

            else if( is_array($sfsi_custom_files) ){
                $customIcons = $sfsi_custom_files;
            }
        } 

        $customIcons = array_filter($customIcons);

        // Get active custom icons for desktop
        if( isset($option1['sfsi_custom_desktop_icons'])  && !empty($option1['sfsi_custom_desktop_icons']) ){

            $sfsi_custom_desktop_icons = $option1['sfsi_custom_desktop_icons'];

            if( is_array($sfsi_custom_desktop_icons) ){
                $customDIcons = $sfsi_custom_desktop_icons;
            }
        
            else if( is_string($sfsi_custom_desktop_icons) ){
                $customDIcons = unserialize($sfsi_custom_desktop_icons);
            }

        } 

        $customDIcons = array_filter($customDIcons);

        $desktopIconOrder   = array();

        if(isset($option5['sfsi_order_icons_desktop'])  && !empty($option5['sfsi_order_icons_desktop']) ){

            $sfsi_order_icons_desktop = $option5['sfsi_order_icons_desktop'];

            if( is_string($sfsi_order_icons_desktop) ){
                $desktopIconOrder = unserialize($sfsi_order_icons_desktop);
            }

            else if( is_array($sfsi_order_icons_desktop) ){
                $desktopIconOrder = $sfsi_order_icons_desktop;
            }
        } 

        if(isset($desktopIconOrder) && !empty($desktopIconOrder)){

            $arrSavedOrderForDCustomIcons = array_column($desktopIconOrder, 'customElementIndex');

                if(isset($customIcons) && !empty($customIcons)){

                    foreach ($customIcons as $key => $value) {

                        if(!empty($arrSavedOrderForDCustomIcons) && !in_array($key,$arrSavedOrderForDCustomIcons)){ 
                        
                            if(!empty($customDIcons) && isset($customDIcons[$key]) && !empty($customDIcons[$key]) 
                                && $customDIcons[$key] == $value){
                                $iconData = array();
                                $iconData['iconName']           = 'custom';
                                $iconData['index']              = count($desktopIconOrder)+1;
                                $iconData['customElementIndex'] = $key;
                                $desktopIconOrder[] = $iconData;
                            }
                        }
                    }
                }

            array_multisort(array_column($desktopIconOrder, 'index'), SORT_ASC, $desktopIconOrder);

        }

        else{

            $desktopIconOrder = sfsi_premium_admin_default_icons_order($option1);

            if(isset($customIcons) && !empty($customIcons)){

                foreach ($customIcons as $key => $value) {
                    
                    $iconData = array();

                    $iconData['iconName']           = 'custom';
                    $iconData['index']              = count($desktopIconOrder)+1;
                    $iconData['customElementIndex'] = $key;

                    $desktopIconOrder[] = $iconData;

                }

            }

            array_multisort(array_column($desktopIconOrder, 'index'), SORT_ASC, $desktopIconOrder);            
        }

        return $desktopIconOrder;

    }
}   

if(!function_exists('sfsi_premium_mobile_icons_order')){

    function sfsi_premium_mobile_icons_order($option5=false,$option1=false,$returnCustomOrder=true){

        $option5 = false != $option5 ? $option5 : unserialize(get_option('sfsi_premium_section5_options',false));
        $option1 = false != $option1 ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));
       
        $customMIcons   = array();

        // Get active custom icons for mobile
        if( isset($option1['sfsi_custom_mobile_icons'])  && !empty($option1['sfsi_custom_mobile_icons']) ){

            $sfsi_custom_mobile_icons = $option1['sfsi_custom_mobile_icons'];

            if( is_array($sfsi_custom_mobile_icons) ){
                $customMIcons = $sfsi_custom_mobile_icons;
            }
        
            else if( is_string($sfsi_custom_mobile_icons) ){
                $customMIcons = unserialize($sfsi_custom_mobile_icons);
            }

        } 

        $customMIcons = array_filter($customMIcons);

        $mobileIconOrder = array();
        
        // Get saved custom order of icons        
        if(isset($option5['sfsi_order_icons_mobile'])  && !empty($option5['sfsi_order_icons_mobile']) ){

            $sfsi_order_icons_mobile = $option5['sfsi_order_icons_mobile'];

            if( is_array($sfsi_order_icons_mobile) ){
                $mobileIconOrder = $sfsi_order_icons_mobile;
            }

            else if( is_string($sfsi_order_icons_mobile) ) {
                $mobileIconOrder = unserialize($sfsi_order_icons_mobile);
            }

        }

        if(false != $returnCustomOrder && isset($mobileIconOrder) && !empty($mobileIconOrder)){

            array_multisort(array_column($mobileIconOrder, 'index'), SORT_ASC, $mobileIconOrder);

        }
        // Get saved default order of icons        
        else{

            $mobileIconOrder = sfsi_premium_admin_default_icons_order($option1,false);

            if(isset($customMIcons) && !empty($customMIcons)){

                foreach ($customMIcons as $key => $value) {
                    
                    $iconData = array();

                    $iconData['iconName']           = 'custom';
                    $iconData['index']              = count($mobileIconOrder)+1;
                    $iconData['customElementIndex'] = $key;

                    $mobileIconOrder[] = $iconData;

                }

            }

            array_multisort(array_column($mobileIconOrder, 'index'), SORT_ASC, $mobileIconOrder);  
        }

        return $mobileIconOrder;

    }
} 

if(!function_exists('sfsi_premium_get_icons_order')){

    function sfsi_premium_get_icons_order($option5=false,$option1=false){

        $option5 = false != $option5 ? $option5 : unserialize(get_option('sfsi_premium_section5_options',false));
        $option1 = false != $option1 ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));

        $isSetDifferentOrderForMobile = "no";

        if(isset($option5['sfsi_plus_mobile_icons_order_setting']) && !empty($option5['sfsi_plus_mobile_icons_order_setting']))
        {       
          $isSetDifferentOrderForMobile = $option5['sfsi_plus_mobile_icons_order_setting'];
        }

        $isSetDifferentIconsForMobile = "no";

        if(isset($option1['sfsi_plus_icons_onmobile']) && !empty($option1['sfsi_plus_icons_onmobile']))
        {       
          $isSetDifferentIconsForMobile = $option1['sfsi_plus_icons_onmobile'];
        }

        $arrOrderIcons = array();

        // Default load Desktop icons
        $arrOrderIcons = sfsi_premium_desktop_icons_order($option5,$option1);   

        if(wp_is_mobile()){

            $arrOrderIcons = sfsi_premium_mobile_icons_order($option5,$option1);            

            if('yes' == $isSetDifferentIconsForMobile && "no" == $isSetDifferentOrderForMobile) 
            {
                // Load default icons order of mobile icons 
                $arrOrderIcons = sfsi_premium_mobile_icons_order($option5,$option1,false);          
            }
        }

        return $arrOrderIcons;
         
    }
}

if(!function_exists('sfsi_premium_get_icons_html')){

    function sfsi_premium_get_icons_html($arrOrderIcons,$option1=false,$addLiMarkup=false,$is_front=0){

        $option1 = false != $option1 ? $option1 : unserialize(get_option('sfsi_premium_section1_options',false));
        $option5 = unserialize(get_option('sfsi_premium_section5_options',false));

        $isSetDifferentIconsForMobile = "no";

        if(isset($option1['sfsi_plus_icons_onmobile']) && !empty($option1['sfsi_plus_icons_onmobile']))
        {       
          $isSetDifferentIconsForMobile = $option1['sfsi_plus_icons_onmobile'];
        }

        $isSetDifferentOrderForMobile = "no";

        if(isset($option5['sfsi_plus_mobile_icons_order_setting']) && !empty($option5['sfsi_plus_mobile_icons_order_setting']))
        {       
          $isSetDifferentOrderForMobile = $option5['sfsi_plus_mobile_icons_order_setting'];
        }

        $icons      = "";
        $iconsCount = 0;

        if( !empty($arrOrderIcons) ){

            foreach($arrOrderIcons  as $index => $icn):

                if(!empty($icn['index'])):                                        

                    $iconName = $icn['iconName'];

                    if("fb" == $iconName){
                        $iconName = "facebook";
                    }

                    elseif("custom" == $iconName){
                        $iconName = $icn['customElementIndex'];             
                    }           

                    $iconsHtml = "";
                    
                    if(!is_numeric($iconName)){

                         if(wp_is_mobile()){

                            switch ($isSetDifferentIconsForMobile) {

                                case 'yes':
                                    
                                    if("yes" == $option1['sfsi_plus_'.$iconName.'_mobiledisplay']){
                                        $iconsHtml  = sfsi_plus_prepairIcons($iconName,$is_front);
                                        $iconsCount = $iconsCount + 1;
                                    }

                                break;
                                
                                case 'no':
                                    
                                    if("yes" == $option1['sfsi_plus_'.$iconName.'_display']){
                                        $iconsHtml= sfsi_plus_prepairIcons($iconName,$is_front);
                                        $iconsCount = $iconsCount + 1;        
                                    }

                                break;
                            }
                         }

                         else{

                                if("yes" == $option1['sfsi_plus_'.$iconName.'_display']){
                                    $iconsHtml= sfsi_plus_prepairIcons($iconName,$is_front);
                                    $iconsCount = $iconsCount + 1;        
                                }
                         }

                    }
                    else{                    
                        $iconsHtml = sfsi_plus_prepairIcons($iconName,$is_front);
                        $iconsCount = $iconsCount + 1;
                    }

                    if(!empty($iconsHtml)){
                        $icons.= (false != $addLiMarkup) ? "<li>".$iconsHtml."</li>" : $iconsHtml;                    
                    }

                endif;

            endforeach;
        }

        return array("count" => $iconsCount, "html" => $icons);
        //return $icons;        
    }
}

if(!function_exists('sfsi_premium_is_any_standard_icon_selected')){

    function sfsi_premium_is_any_standard_icon_selected(){

        $option1       = unserialize(get_option('sfsi_premium_section1_options',false));
        $sfsi_section5 = unserialize(get_option('sfsi_premium_section5_options',false));  

        $custom_i      = array();

        $isSetDifferentIconsForMobile = "no";

        if(isset($option1['sfsi_plus_icons_onmobile']) && !empty($option1['sfsi_plus_icons_onmobile']))
        {       
          $isSetDifferentIconsForMobile = $option1['sfsi_plus_icons_onmobile'];
        }

        if(isset($option1['sfsi_custom_files']) && !empty($option1['sfsi_custom_files'])){
            $custom_i   = unserialize($option1['sfsi_custom_files']);
            $custom_i   = is_array($custom_i) ? $custom_i : array();
        }
    
        $arrIcons = array("rss","email","facebook","twitter","google","share","youtube","pinterest","instagram","houzz","snapchat","whatsapp","skype","vimeo","soundcloud","yummly","flickr","reddit","tumblr","linkedin");

        $is_any_standard_icon_selected = false;

        foreach ($arrIcons as $iconName):

            $keyName = wp_is_mobile() && "yes" == $isSetDifferentIconsForMobile ? 'sfsi_plus_'.$iconName.'_mobiledisplay' : 'sfsi_plus_'.$iconName.'_display';

            $cond = isset($option1[$keyName]) && !empty($option1[$keyName]) && "yes" == $option1[$keyName];

            if($cond){
                
                $is_any_standard_icon_selected = true;
                break;
            }

        endforeach;


        if(!empty($custom_i)){
            $is_any_standard_icon_selected = true;
        }

        return $is_any_standard_icon_selected;
    }
}
?>