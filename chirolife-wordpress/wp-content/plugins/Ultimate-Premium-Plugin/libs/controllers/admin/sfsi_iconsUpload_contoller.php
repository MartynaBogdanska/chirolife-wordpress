<?php
/* upload custom Skins {Monad}*/
add_action('wp_ajax_plus_UploadSkins','sfsi_plus_UploadSkins');
function sfsi_plus_UploadSkins()
{
	extract($_REQUEST);
	$upload_dir = wp_upload_dir();
	
	$ThumbSquareSize 		= 100; //Thumbnail will be 57X57
	$Quality 				= 90; //jpeg quality
	$DestinationDirectory   = $upload_dir['path'].'/'; //specify upload directory ends with / (slash)
	$AcceessUrl             = $upload_dir['url'].'/';
	$ThumbPrefix			= "cmicon_";
	
	$data = $_REQUEST["custom_imgurl"];
	$params = array();
	parse_str($data, $params);
	
	foreach($params as $key => $value)
	{
		$custom_imgurl = $value;
		if(!empty($custom_imgurl))
		{
			$sfsi_custom_files[] = $custom_imgurl;
			
			$imgData = wp_get_attachment_metadata(attachment_url_to_postid($custom_imgurl));
			$custom_imgurl    = trailingslashit($upload_dir['basedir']).$imgData['file'];

			list($CurWidth, $CurHeight) = getimagesize($custom_imgurl);
		
			$info = explode("/", $custom_imgurl);
			$iconName = array_pop($info);
			$ImageExt = substr($iconName, strrpos($iconName, '.'));
			$ImageExt = str_replace('.','',$ImageExt);
			
			$iconName = str_replace(' ','-',strtolower($iconName)); // get image name
			$ImageType = 'image/'.$ImageExt;
			
			 switch(strtolower($ImageType))
			 {
					case 'image/png':
							// Create a new image from file 
							$CreatedImage =  imagecreatefrompng($custom_imgurl);
							break;
					case 'image/gif':
							$CreatedImage =  imagecreatefromgif($custom_imgurl);
							break;
					case 'image/jpg':
							$CreatedImage = imagecreatefromjpeg($custom_imgurl);
							break;					
					case 'image/jpeg':
					case 'image/pjpeg':
							$CreatedImage = imagecreatefromjpeg($custom_imgurl);
							break;
					default:
							 die(json_encode(array('res'=>'type_error'))); //output error and exit
			}
	
			
			$ImageName = preg_replace("/\\.[^.\\s]{3,4}$/", "", $iconName);
			
			$NewIconName = "custom_icon".$key.'.'.$ImageExt;
			$iconPath 	= $DestinationDirectory.$NewIconName; //Thumbnail name with destination directory
			
			//Create a square Thumbnail right after, this time we are using sfsiplus_cropImage() function
			if(sfsiplus_cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$iconPath,$CreatedImage,$Quality,$ImageType))
			{
				//update database information 
				$AccressImagePath=$AcceessUrl.$NewIconName;                                        
				update_option($key,$AccressImagePath);
				die(json_encode(array('res'=>'success')));
		   }
		   else
		   {        
			   die(json_encode(array('res'=>'thumb_error')));
		   }
			
		}	
	}
}

/* Delete custom Skins {Monad}*/
add_action('wp_ajax_plus_DeleteSkin','sfsi_plus_DeleteSkin');
function sfsi_plus_DeleteSkin()
{
	if ( !wp_verify_nonce( $_POST['nonce'], "sfsi_plus_deleteCustomSkin")) {
		echo  json_encode(array('res'=>"error")); exit;
	} 
	
	$upload_dir = wp_upload_dir();
	
	if($_POST['action'] == 'plus_DeleteSkin' && isset($_POST['iconname']) && !empty($_POST['iconname']) && current_user_can('manage_options'))
	{		
		if(get_option($_POST['iconname']))
		{
			$imgurl = get_option( $_POST['iconname'] );
			$path   = parse_url($imgurl, PHP_URL_PATH);
		   
			if(is_file($_SERVER['DOCUMENT_ROOT'].$path) && file_exists($_SERVER['DOCUMENT_ROOT'].$path))
			{
				unlink($_SERVER['DOCUMENT_ROOT'] . $path);
			}
		   
			delete_option( $_POST['iconname'] );
			die(json_encode(array('res'=>'success')));
		}
		else
		{
			die(json_encode(array('res'=>'error')));
		}
	}
	else
	{
		die(json_encode(array('res'=>'error')));
	}	
}

/* add ajax action for custom skin done & save{Monad}*/
add_action('wp_ajax_plus_Iamdone','sfsi_plus_Iamdone');
function sfsi_plus_Iamdone()
{
	$return = '';
	
	$addTimeStampToStopImageCaching = "?".strtotime("now");

	if(get_option("plus_rss_skin"))
	{
		$icon = get_option("plus_rss_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_1 sfsiplus_rss_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;">		
		</span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_1 sfsiplus_rss_section" style="background-position:-3px 6px;"></span>';
	}
	
	if(get_option("plus_email_skin"))
	{
		$icon = get_option("plus_email_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_2 sfsiplus_email_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_2 sfsiplus_email_section" style="background-position:-51px 6px;"></span>';
	}
	
	if(get_option("plus_facebook_skin"))
	{
		$icon = get_option("plus_facebook_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_3 sfsiplus_facebook_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_3 sfsiplus_facebook_section" style="background-position:-98px 6px;"></span>';
	}
	
	if(get_option("plus_google_skin"))
	{
		$icon = get_option("plus_google_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_4 sfsiplus_google_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_4 sfsiplus_google_section" style="background-position:-145px 6px;"></span>';
	}
	
	if(get_option("plus_twitter_skin"))
	{
		$icon = get_option("plus_twitter_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_5 sfsiplus_twitter_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_5 sfsiplus_twitter_section" style="background-position:-192px 6px;"></span>';
	}
	
	if(get_option("plus_share_skin"))
	{
		$icon = get_option("plus_share_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_6 sfsiplus_share_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_6 sfsiplus_share_section" style="background-position:-238px 6px;"></span>';
	}
	
	if(get_option("plus_youtube_skin"))
	{
		$icon = get_option("plus_youtube_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_7 sfsiplus_youtube_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_7 sfsiplus_youtube_section" style="background-position:-285px 6px;"></span>';
	}
	
	if(get_option("plus_pintrest_skin"))
	{
		$icon = get_option("plus_pintrest_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_8 sfsiplus_pinterest_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_8 sfsiplus_pinterest_section" style="background-position:-332px 6px;"></span>';
	}
	
	if(get_option("plus_linkedin_skin"))
	{
		$icon = get_option("plus_linkedin_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_9 sfsiplus_linkedin_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_9 sfsiplus_linkedin_section" style="background-position:-379px 6px;"></span>';
	}
	
	if(get_option("plus_instagram_skin"))
	{
		$icon = get_option("plus_instagram_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_10 sfsiplus_instagram_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_10 sfsiplus_instagram_section" style="background-position:-426px 6px;"></span>';
	}

	if(get_option("plus_houzz_skin"))
	{
		$icon = get_option("plus_houzz_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_11 sfsiplus_houzz_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_11 sfsiplus_houzz_section" style="background-position:-566px 6px;"></span>';
	}
	
	if(get_option("plus_snapchat_skin"))
	{
		$icon = get_option("plus_snapchat_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_12 sfsiplus_snapchat_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_12 sfsiplus_snapchat_section" style="background-position:-613px 6px;"></span>';
	}
	
	if(get_option("plus_whatsapp_skin"))
	{
		$icon = get_option("plus_whatsapp_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_13 sfsiplus_whatsapp_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_13 sfsiplus_whatsapp_section" style="background-position:-660px 6px;"></span>';
	}
	
	if(get_option("plus_skype_skin"))
	{
		$icon = get_option("plus_skype_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_14 sfsiplus_skype_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_14 sfsiplus_skype_section" style="background-position:-706px 6px;"></span>';
	}
	
	if(get_option("plus_vimeo_skin"))
	{
		$icon = get_option("plus_vimeo_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_15 sfsiplus_vimeo_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_15 sfsiplus_vimeo_section" style="background-position:-752px 6px;"></span>';
	}
	
	if(get_option("plus_soundcloud_skin"))
	{
		$icon = get_option("plus_soundcloud_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_16 sfsiplus_soundcloud_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_16 sfsiplus_soundcloud_section" style="background-position:-799px 6px;"></span>';
	}
	
	if(get_option("plus_yummly_skin"))
	{
		$icon = get_option("plus_yummly_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_17 sfsiplus_yummly_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_17 sfsiplus_yummly_section" style="background-position:-845px 6px;"></span>';
	}
	
	if(get_option("plus_flickr_skin"))
	{
		$icon = get_option("plus_flickr_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_18 sfsiplus_flickr_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_18 sfsiplus_flickr_section" style="background-position:-892px 6px;"></span>';
	}
	
	if(get_option("plus_reddit_skin"))
	{
		$icon = get_option("plus_reddit_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_19 sfsiplus_reddit_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_19 sfsiplus_reddit_section" style="background-position:-940px 6px;"></span>';
	}
	
	if(get_option("plus_tumblr_skin"))
	{
		$icon = get_option("plus_tumblr_skin").$addTimeStampToStopImageCaching;
		$return .= '<span class="sfsiplus_row_17_20 sfsiplus_tumblr_section sfsi_plus-bgimage" style="background: url('.$icon.') no-repeat; margin-top: 6px;"></span>';
	}
	else
	{
		$return .= '<span class="sfsiplus_row_17_20 sfsiplus_tumblr_section" style="background-position:-986px 6px;"></span>';
	}
	die($return);
}

/* add ajax action for custom icons upload {Monad}*/
add_action('wp_ajax_plus_UploadIcons','sfsi_plus_UploadIcons');

/* uplaod custom icon {change by monad}*/
function sfsi_plus_UploadIcons()
{
	extract($_POST);
	
	$upload_dir	= wp_upload_dir();
	$ThumbSquareSize 		= 100; //Thumbnail will be 57X57
	$Quality 			    = 90; //jpeg quality
	$DestinationDirectory   = $upload_dir['path'].'/'; //specify upload directory ends with / (slash)
	$AcceessUrl             = $upload_dir['url'].'/';
	$ThumbPrefix			= "cmicon_";
	
   if(!empty($custom_imgurl))
	{
		$sfsi_custom_files[] = $custom_imgurl;	

		$imgData = wp_get_attachment_metadata(attachment_url_to_postid($custom_imgurl));
		$custom_imgurl    = trailingslashit($upload_dir['basedir']).$imgData['file'];

		list($CurWidth, $CurHeight) = getimagesize($custom_imgurl);
	
		$info 	  = explode("/", $custom_imgurl);
		$iconName = array_pop($info);
		$ImageExt = substr($iconName, strrpos($iconName, '.'));
		$ImageExt = str_replace('.','',$ImageExt);
		
		$iconName  = str_replace(' ','-',strtolower($iconName)); // get image name
		$ImageType = 'image/'.$ImageExt;
		
		 switch(strtolower($ImageType))
		 {
			 	case 'image/png':
						// Create a new image from file 
						$CreatedImage =  imagecreatefrompng($custom_imgurl);
						break;
				case 'image/gif':
						$CreatedImage =  imagecreatefromgif($custom_imgurl);
						break;
				case 'image/jpg':
						$CreatedImage = imagecreatefromjpeg($custom_imgurl);
						break;					
				case 'image/jpeg':
				case 'image/pjpeg':
						$CreatedImage = imagecreatefromjpeg($custom_imgurl);
						break;
				default:
						 die(json_encode(array('res'=>'type_error'))); //output error and exit
		}
		
		$ImageName = preg_replace("/\\.[^.\\s]{3,4}$/", "", $iconName);
		
		$sec_options= (get_option('sfsi_premium_section1_options',false)) ? unserialize(get_option('sfsi_premium_section1_options',false)) : '' ;
        		
		$icons = (is_array(unserialize($sec_options['sfsi_custom_files']))) ? unserialize($sec_options['sfsi_custom_files']) : array();

       		$dicons  = (is_array(unserialize($sec_options['sfsi_custom_desktop_icons']))) ? unserialize($sec_options['sfsi_custom_desktop_icons']) : array();

		$micons = (is_array(unserialize($sec_options['sfsi_custom_mobile_icons']))) ? unserialize($sec_options['sfsi_custom_mobile_icons']) : array();
				
		if(empty($icons))
		{   
			end($icons);
			$new = 0;
		}    
		else {
			end($icons);
			$cnt = key($icons);
			$new = $cnt+1;
		}

		$NewIconName = "plus_custom_icon".$new.'.'.$ImageExt;
        $iconPath 	 = $DestinationDirectory.$NewIconName; //Thumbnail name with destination directory
		
		//Create a square Thumbnail right after, this time we are using sfsiplus_cropImage() function
		if(sfsiplus_cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$iconPath,$CreatedImage,$Quality,$ImageType))
		{
		 	//update database information 
			$AccressImagePath=$AcceessUrl.$NewIconName;                                        
			
			$icons  = array_filter($icons);
			$dicons = array_filter($dicons);
			$micons = array_filter($micons);

			$icons[]  = $AccressImagePath;
			$dicons[] = $AccressImagePath;
			$micons[] = $AccressImagePath;

			$sec_options['sfsi_custom_files'] 		  = serialize($icons);
			$sec_options['sfsi_custom_desktop_icons'] = serialize($dicons);
			$sec_options['sfsi_custom_mobile_icons']  = serialize($micons);

			$total_uploads = count($icons); end($icons); $key = key($icons);

			update_option('sfsi_premium_section1_options',serialize($sec_options));

			// Updating order of icons in Quesiton 6
			sfsi_plus_add_custom_icon_in_order_desktop_and_mobile($key);

			die(json_encode(array('res'=>'success','img_path'=>$AccressImagePath,'element'=>$total_uploads,'key'=>$key)));
	   }
	   else
	   {        
		   die(json_encode(array('res'=>'thumb_error')));
	   }
		
	}
}
/* delete uploaded icons */
add_action('wp_ajax_plus_deleteIcons','sfsi_plus_deleteIcons'); 

function sfsi_plus_deleteIcons()
{
   if(isset($_POST['icon_name']) && !empty($_POST['icon_name']))
   {
       /* get icons details to delete it from plugin folder */ 
       $custom_icon = explode('_',$_POST['icon_name']);  
       
       $sec_options1= (get_option('sfsi_premium_section1_options',false)) ? unserialize(get_option('sfsi_premium_section1_options',false)) : array() ;
       $sec_options2= (get_option('sfsi_premium_section2_options',false)) ? unserialize(get_option('sfsi_premium_section2_options',false)) : array() ;

       $up_icons  = (is_array(unserialize($sec_options1['sfsi_custom_files']))) ? unserialize($sec_options1['sfsi_custom_files']) : array();

       $up_dicons  = (is_array(unserialize($sec_options1['sfsi_custom_desktop_icons']))) ? unserialize($sec_options1['sfsi_custom_desktop_icons']) : array();
       $up_micons = (is_array(unserialize($sec_options1['sfsi_custom_mobile_icons']))) ? unserialize($sec_options1['sfsi_custom_mobile_icons']) : array();

       $icons_links= (is_array(unserialize($sec_options2['sfsi_plus_CustomIcon_links']))) ? unserialize($sec_options2['sfsi_plus_CustomIcon_links']) : array();

       if(isset($up_icons[$custom_icon[1]]) && !empty($up_icons[$custom_icon[1]])){
	       
	       $deleteIndex  =  $custom_icon[1];

	       $icon_path = $up_icons[$deleteIndex];  
	       $path      = pathinfo($icon_path);      
	      
		   // Changes By {Monad}
		   $imgpath = parse_url($icon_path, PHP_URL_PATH);
		   
		    if(is_file($_SERVER['DOCUMENT_ROOT'] . $imgpath))
		    {
	        	unlink($_SERVER['DOCUMENT_ROOT'] . $imgpath);
	        }
		   	   
	         unset($up_icons[$deleteIndex]);
	         unset($up_dicons[$deleteIndex]);         
	         unset($up_micons[$deleteIndex]);         
	         unset($icons_links[$deleteIndex]);
		     sfsi_plus_remove_custom_icon_in_order_desktop_and_mobile($deleteIndex);

		     /* update database after delete */
			 $sec_options1['sfsi_custom_files']         = serialize($up_icons);
			 $sec_options1['sfsi_custom_desktop_icons'] = serialize($up_dicons);	 
			 $sec_options1['sfsi_custom_mobile_icons']  = serialize($up_micons);	 
		     $sec_options2['sfsi_plus_CustomIcon_links']= serialize($icons_links);
		         
		     end($up_icons);

		     $key = (key($up_icons))? key($up_icons) :$custom_icon[1] ;

		     $total_uploads = count($up_icons);
		         
		     update_option('sfsi_premium_section1_options',serialize($sec_options1));
		     update_option('sfsi_premium_section2_options',serialize($sec_options2));
		     

		     die(json_encode(array('res'=>'success','last_index'=> $key,'total_up'=>$total_uploads)));       	
       }

       else{
		     die(json_encode(array('res'=>'fail')));       	
       }
   }    
}

function sfsi_plus_add_custom_icon_in_order_desktop_and_mobile($key){
	
	if(isset($key) && false !== $key){

		$option5= (get_option('sfsi_premium_section5_options',false)) ? unserialize(get_option('sfsi_premium_section5_options',false)) : '' ;

		$desktopIconOrder = (is_array(unserialize($option5['sfsi_order_icons_desktop']))) ? unserialize($option5['sfsi_order_icons_desktop']) : array();

		$mobileIconOrder = (is_array(unserialize($option5['sfsi_order_icons_mobile']))) ? unserialize($option5['sfsi_order_icons_mobile']) : array();

	    $iconDesktopData = array();
	    $iconDesktopData['iconName']           = 'custom';
	    $iconDesktopData['display']            = true;
	    $iconDesktopData['customElementIndex'] = $key;

	    $iconMobileData = array();
	    $iconMobileData['iconName']           = 'custom';
	    $iconMobileData['display']            = true;
	    $iconMobileData['customElementIndex'] = $key;

	    $iconDesktopData['index']   = key(array_slice($desktopIconOrder, -1, true))+1;
	    $iconMobileData['index']    = key(array_slice($mobileIconOrder, -1,  true))+1;

	    $desktopIconOrder[] = $iconDesktopData;
	    $mobileIconOrder[]  = $iconMobileData;

		$option5['sfsi_order_icons_desktop'] = serialize($desktopIconOrder);
		$option5['sfsi_order_icons_mobile']  = serialize($mobileIconOrder);

		update_option('sfsi_premium_section5_options',serialize($option5));

	}

}

function sfsi_plus_remove_custom_icon_in_order($arrData,$customElementIndexToMatch){

	if( isset($arrData) && !empty($arrData) && is_array($arrData) ){
		
		$arrIndexKey = array();

		foreach ($arrData as $index => $iconData):
			
			if('custom'== $iconData['iconName'] && isset($iconData['customElementIndex']) 

				&& $iconData['customElementIndex'] == $customElementIndexToMatch ){

				array_push($arrIndexKey, $index); 
			}

		endforeach;

		if(!empty($arrIndexKey)){

			foreach ($arrIndexKey as $value):
				
				unset($arrData[$value]);

			endforeach;
		}

		$arrData = array_values($arrData);

		return $arrData;

	}
}

function sfsi_plus_remove_custom_icon_in_order_desktop_and_mobile($key){
	
	if(isset($key) && false !== $key){

		$option5= (get_option('sfsi_premium_section5_options',false)) ? unserialize(get_option('sfsi_premium_section5_options',false)) : '' ;

		$desktopIconOrder = (is_array(unserialize($option5['sfsi_order_icons_desktop']))) ? unserialize($option5['sfsi_order_icons_desktop']) : array();

		$mobileIconOrder = (is_array(unserialize($option5['sfsi_order_icons_mobile']))) ? unserialize($option5['sfsi_order_icons_mobile']) : array();

		$desktopIconOrder = sfsi_plus_remove_custom_icon_in_order($desktopIconOrder,$key);
		$mobileIconOrder  = sfsi_plus_remove_custom_icon_in_order($mobileIconOrder,$key);

		$option5['sfsi_order_icons_desktop'] = serialize($desktopIconOrder);
		$option5['sfsi_order_icons_mobile']  = serialize($mobileIconOrder);

		update_option('sfsi_premium_section5_options',serialize($option5));
	}	
}


/*  This function will proportionally resize image */
function sfsiplusresizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{
	/* Check Image size is not 0 */
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	/* Construct a proportional size of new image */
	$ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
	$NewWidth  			= ceil($ImageScale*$CurWidth);
	$NewHeight 			= ceil($ImageScale*$CurHeight);
	$NewCanves 			= imagecreatetruecolor($NewWidth, $NewHeight);
	
	/* Resize Image */
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
	{
		return $ImageType;
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	/* Destroy image, frees memory	*/
	if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	return true;
	}

}

/* This function corps image to create exact square images, no matter what its original size! */
function sfsiplus_cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{	 
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	if($CurWidth>$CurHeight)
	{
		$y_offset = 0;
		$x_offset = ($CurWidth - $CurHeight) / 2;
		$square_size 	= $CurWidth - ($x_offset * 2);
	}else{
		$x_offset = 0;
		$y_offset = ($CurHeight - $CurWidth) / 2;
		$square_size = $CurHeight - ($y_offset * 2);
	}
	
	$NewCanves 	= imagecreatetruecolor($iSize, $iSize);
	imagealphablending($NewCanves, false);
	imagesavealpha($NewCanves,true);
	$white = imagecolorallocate($NewCanves, 255, 255, 255);
	$alpha_channel = imagecolorallocatealpha($NewCanves, 255, 255, 255, 127); 
        imagecolortransparent($NewCanves, $alpha_channel); 
	$maketransparent = imagecolortransparent($NewCanves,$white);
	imagefill($NewCanves, 0, 0, $maketransparent);
	
	/*
	 * Change offset for increase image quality ($x_offset, $y_offset)
	 * imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size)
	 */
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $iSize, $iSize, $square_size, $square_size))
	{
		imagesavealpha($NewCanves,true); 
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;	
			case 'image/jpg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
		
		/* Destroy image, frees memory	*/
		if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
		return true;
	}
	else
	{
		return false;
	}
}

add_action('wp_ajax_sfsi_plus_feedbackForm','sfsi_plus_feedbackForm');
function sfsi_plus_feedbackForm()
{
	if(!empty($_POST["msg"]))
	{
		$useremail	= "uninstall@ultimatelysocial.com";
		$subject 	= "Feedback from Ultimate Social Media Premium ".get_option('sfsi_premium_pluginVersion')." user";
		$from    	= $_POST["email"];
		$message    = $_POST["msg"];
		$sitename 	= get_bloginfo("name");
	
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text;charset=iso-8859-1" . "\r\n";
		$headers .= sprintf('From: %s <%s>', $sitename, $from). "\r\n";
		$headers .= "X-Mailer: PHP/" . phpversion();
		
		mail($useremail,$subject,$message,$headers);
	}
	die;
}
?>