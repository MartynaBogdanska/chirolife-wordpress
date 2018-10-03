<?php
//Check exclude from url or not
function sfsi_plus_is_current_url_contain_keyword($keywords)
{   
    global $wp;
    $current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ));
    $current_url = $current_url."/";

    if(false != isset($keywords) && is_array($keywords)){
    
        $count = count($keywords);

            for($i = 0; $i < $count; $i++)
            {
                if (strpos(strtolower($current_url), strtolower($keywords[$i]))) {
                    return true;
                }
            }           
    }
}

function sfsi_plus_url_rule_check($urlSetting,$urlkeywords){
   if($urlSetting == 'yes')
    {
        return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
    }
}

function sfsi_plus_is_any_rules_settingActive($ruleType,$option8=false){

    $isSettingActive = false;

    $option8 = false != $option8 ? $option8: unserialize(get_option('sfsi_premium_section8_options',false));

    $keys = array('tag','category','date_archive','author_archive','post','page','home','search');

    foreach ($keys as $value) {
        
        $value = 'sfsi_plus_'.$ruleType.'_'.$value;

        if(isset($option8[$value]) && !empty($option8[$value]) && "yes" == strtolower($option8[$value])){
            $isSettingActive = true;
            break;
        }
    }

    $isSettingActive = $isSettingActive || (isset($option8['sfsi_plus_switch_'.$ruleType.'_taxonomies']) && !empty($option8['sfsi_plus_switch_'.$ruleType.'_taxonomies']) && "yes" == $option8['sfsi_plus_switch_'.$ruleType.'_taxonomies']) 
        || (isset($option8['sfsi_plus_switch_'.$ruleType.'_custom_post_types']) && !empty($option8['sfsi_plus_switch_'.$ruleType.'_custom_post_types']) && "yes" == $option8['sfsi_plus_switch_'.$ruleType.'_custom_post_types']);

    return $isSettingActive;
}

//Check page excluded or not
function sfsi_plus_icon_exclude()
{ 
    $option8 = unserialize(get_option('sfsi_premium_section8_options',false));
 
    $urlKeywords = isset($option8['sfsi_plus_urlKeywords']) && !empty($option8['sfsi_plus_urlKeywords']) ? $option8['sfsi_plus_urlKeywords'] : array();

    $switchExclude = isset($option8['sfsi_plus_exclude_url']) && !empty($option8['sfsi_plus_exclude_url']) ? $option8['sfsi_plus_exclude_url'] : "no";

    $anySettingSelected = sfsi_plus_is_any_rules_settingActive('exclude',$option8);

    if($anySettingSelected){

        if(is_archive()){

            if (is_tag()){
                if($option8['sfsi_plus_exclude_tag'] == 'yes'){ return true; }
            }
            else if (is_category()){
                if($option8['sfsi_plus_exclude_category'] == 'yes'){ return true; }
            }
            else if (is_date()){
                if($option8['sfsi_plus_exclude_date_archive'] == 'yes'){ return true; }
            }
            else if (is_author()){
                if($option8['sfsi_plus_exclude_author_archive'] == 'yes'){ return true; }
            }
            else if(isset($option8['sfsi_plus_switch_exclude_taxonomies']) && $option8['sfsi_plus_switch_exclude_taxonomies']=="yes"){

                $arrSfsi_plus_list_exclude_taxonomies = (isset($option8['sfsi_plus_list_exclude_taxonomies'])) ? unserialize($option8['sfsi_plus_list_exclude_taxonomies']) : array();

                $arrExcludeTax = array_filter($arrSfsi_plus_list_exclude_taxonomies);

                if(!empty($arrExcludeTax)){
                    
                    $termData = get_queried_object();
                    
                    if(in_array($termData->taxonomy, $arrExcludeTax)) {
                        return true;            
                    }
                    else
                    {
                        if($switchExclude == 'yes')
                        {
                            return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
                        }
                    }               
                }
                else
                {
                    if($switchExclude == 'yes')
                    {
                        return sfsi_plus_is_current_url_contain_keyword($option8['sfsi_plus_urlKeywords']);
                    }
                }
            }                       
            else{
                    if($switchExclude == 'yes')
                    {
                        return sfsi_plus_is_current_url_contain_keyword($option8['sfsi_plus_urlKeywords']);
                    }           
            }
        } 
        else if (is_single())
        {
            if($option8['sfsi_plus_exclude_post'] == 'yes'){ return true; }

            else if(isset($option8['sfsi_plus_switch_exclude_custom_post_types']) && $option8['sfsi_plus_switch_exclude_custom_post_types']=="yes")
            {

                $arrSfsi_plus_list_exclude_custom_post_types = (isset($option8['sfsi_plus_list_exclude_custom_post_types'])) ? unserialize($option8['sfsi_plus_list_exclude_custom_post_types']) : array();

                $arrExcludePostTypes = array_filter($arrSfsi_plus_list_exclude_custom_post_types);

                if(!empty($arrExcludePostTypes)){

                    $socialObj      = new sfsi_plus_SocialHelper();
                    $post_id        = $socialObj->sfsi_get_the_ID();
                    $curr_post_type = get_post_type($post_id);

                    if($post_id && in_array($curr_post_type, $arrExcludePostTypes)){ 
                        return true;            
                    }
                    else
                    {
                        if($switchExclude == 'yes')
                        {
                            return sfsi_plus_is_current_url_contain_keyword($option8['sfsi_plus_urlKeywords']);
                        }
                    }                                   
                }
                else
                {
                    if($switchExclude == 'yes')
                    {
                        return sfsi_plus_is_current_url_contain_keyword($option8['sfsi_plus_urlKeywords']);
                    }
                }       
            }       
            else
            {
                if($switchExclude == 'yes')
                {
                    return sfsi_plus_is_current_url_contain_keyword($option8['sfsi_plus_urlKeywords']);
                }
            }
        }
        else if (is_singular() && !is_front_page())
        {
            if($option8['sfsi_plus_exclude_page'] == 'yes'){ return true; }
            else
            {
                if($switchExclude == 'yes')
                {
                    return sfsi_plus_is_current_url_contain_keyword($option8['sfsi_plus_urlKeywords']);
                }
            }
        }
        else if (is_front_page())
        {
            if($option8['sfsi_plus_exclude_home'] == 'yes'){ return true; }
            else
            {
                if($option8['sfsi_plus_exclude_url'] == 'yes')
                {
                    return sfsi_plus_is_current_url_contain_keyword($option8['sfsi_plus_urlKeywords']);
                }
            }
        }
        else if (is_search())
        {
            if($option8['sfsi_plus_exclude_search'] == 'yes'){ return true; }
            else
            {
                if($option8['sfsi_plus_exclude_url'] == 'yes')
                {
                    return sfsi_plus_is_current_url_contain_keyword($option8['sfsi_plus_urlKeywords']);
                }
            }
        }
        else
        {
            if($option8['sfsi_plus_exclude_url'] == 'yes')
            {
                return sfsi_plus_is_current_url_contain_keyword($option8['sfsi_plus_urlKeywords']);
            }
        }


    }else if('yes' == $switchExclude){

        return sfsi_plus_is_current_url_contain_keyword($urlKeywords);

    }else{

        return false; // No setting is selected, returning false here because we are negating this value when in use

    }
}

function sfsi_plus_icon_include()
{
    $option8 = unserialize(get_option('sfsi_premium_section8_options',false));
 
    $urlKeywords = isset($option8['sfsi_plus_include_urlKeywords']) && !empty($option8['sfsi_plus_include_urlKeywords']) ? $option8['sfsi_plus_include_urlKeywords'] : array();

    $switchInclude = isset($option8['sfsi_plus_include_url']) && !empty($option8['sfsi_plus_include_url']) ? $option8['sfsi_plus_include_url'] : "no";

    $anySettingSelected = sfsi_plus_is_any_rules_settingActive('include',$option8);

    if($anySettingSelected){

        if(is_archive()){

            if (is_tag()){
                if($option8['sfsi_plus_include_tag'] == 'yes'){ return true; }
            }
            else if (is_category()){
                if($option8['sfsi_plus_include_category'] == 'yes'){ return true; }
            }
            else if (is_date()){
                if($option8['sfsi_plus_include_date_archive'] == 'yes'){ return true; }
            }
            else if (is_author()){
                if($option8['sfsi_plus_include_author_archive'] == 'yes'){ return true; }
            }
            else if(isset($option8['sfsi_plus_switch_include_taxonomies']) && $option8['sfsi_plus_switch_include_taxonomies']=="yes"){

                $arrSfsi_plus_list_include_taxonomies = (isset($option8['sfsi_plus_list_include_taxonomies'])) ? unserialize($option8['sfsi_plus_list_include_taxonomies']) : array();

                $arrIncludeTx = array_filter($arrSfsi_plus_list_include_taxonomies);

                if(!empty($arrIncludeTx)){
                    
                    $termData = get_queried_object();
                    
                    if(in_array($termData->taxonomy, $arrIncludeTx)) {
                        return true;            
                    }
                    else
                    {
                        if($switchInclude == 'yes')
                        {
                            return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
                        }
                    }               
                }
                else
                {
                    if($switchInclude == 'yes')
                    {
                        return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
                    }
                }
            }                       
            else{
                    if($switchInclude == 'yes' && !empty($urlKeywords))
                    {
                        return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
                    }           
            }
        } 
        else if (is_single())
        {
            if($option8['sfsi_plus_include_post'] == 'yes'){ return true; }

            else if(isset($option8['sfsi_plus_switch_include_custom_post_types']) && $option8['sfsi_plus_switch_include_custom_post_types']=="yes")
            {

                $arrSfsi_plus_list_include_custom_post_types = (isset($option8['sfsi_plus_list_include_custom_post_types'])) ? unserialize($option8['sfsi_plus_list_include_custom_post_types']) : array();

                $arrIncludePostTypes = array_filter($arrSfsi_plus_list_include_custom_post_types);

                if(!empty($arrIncludePostTypes)){

                    $socialObj      = new sfsi_plus_SocialHelper();
                    $post_id        = $socialObj->sfsi_get_the_ID();
                    $curr_post_type = get_post_type($post_id);

                    if($post_id && in_array($curr_post_type, $arrIncludePostTypes)){ 
                        return true;            
                    }
                    else
                    {
                        if($switchInclude == 'yes')
                        {
                            return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
                        }
                    }                                   
                }
                else
                {
                    if($switchInclude == 'yes')
                    {
                        return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
                    }
                }       
            }       
            else
            {
                if($switchInclude == 'yes')
                {
                    return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
                }
            }
        }
        else if (is_singular() && !is_front_page())
        {
            if($option8['sfsi_plus_include_page'] == 'yes'){ return true; }
            else
            {
                if($switchInclude == 'yes')
                {
                    return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
                }
            }
        }
        else if (is_front_page())
        {
            if($option8['sfsi_plus_include_home'] == 'yes'){ return true; }
            else
            {
                if($switchInclude == 'yes')
                {
                    return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
                }
            }
        }
        else if (is_search())
        {
            if($option8['sfsi_plus_include_search'] == 'yes'){ return true; }
            else
            {
                if($switchInclude == 'yes')
                {
                    return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
                }
            }
        }
        else
        {
            if($switchInclude == 'yes')
            {
                return sfsi_plus_is_current_url_contain_keyword($urlKeywords);
            }
        }

    }else if('yes' == $switchInclude){

        return sfsi_plus_is_current_url_contain_keyword($urlKeywords);

    }else{

        return true;
    }
}

// add_action( 'template_redirect', 'sfsi_plus_icon_include');
// add_action( 'template_redirect', 'sfsi_plus_icon_exclude');

function sfsi_plus_icon_get_active_rule_type(){

	$activeRule = 0;

    $option8    = unserialize(get_option('sfsi_premium_section8_options',false));
    
    $activeRule = isset($option8['sfsi_plus_icons_rules']) ? intval($option8['sfsi_plus_icons_rules']) : 0;

    return $activeRule;
}

function sfsi_plus_shall_show_icons(){

	$shallDisplayIcons = true;

	$activeRule = sfsi_plus_icon_get_active_rule_type();

	switch($activeRule) {

		case 1:
		
			$shallDisplayIcons = sfsi_plus_icon_include();
		
		break;

		case 2:

            // Exclusion rules setting active for current page, so don't display icons
			if(false != sfsi_plus_icon_exclude() ){
                $shallDisplayIcons =  false;
            }
            else{
                $shallDisplayIcons =  true;
            }

		break;	
	}

	$shallDisplayIcons = $shallDisplayIcons && sfsi_is_icons_showing_on_front() && false!= License_Manager::validate_license();

	return $shallDisplayIcons;
}
?>
