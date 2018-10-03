<?php 

$rss_readmore_text='Note: Also if you already offer a newsletter it makes sense to offer this option too, because it will get you more readers, as expained here.';
$ress_readmore_button='Ok, keep it active for the time being,I want to see how it works';
$rss_readmore_text2='Deactivate it';

define('rss_readmore', $rss_readmore_text);
define('ress_readmore_button', $ress_readmore_button);
define('rss_readmore_text2', $rss_readmore_text2);

$feedId 		= sanitize_text_field(get_option('sfsi_premium_feed_id',false));
$connectToFeed 	= "http://www.specificfeeds.com/?".base64_encode("userprofile=wordpress&feed_id=".$feedId);
$connectFeedLgn	= "http://www.specificfeeds.com/?".base64_encode("userprofile=wordpress&feed_id=".$feedId."&logintype=login");
?>

<div class="pop-overlay read-overlay feedClaiming-overlay" >
    <div class="pop_up_box sfsi_pop_up sfsi_plus_pop_box"  >
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/newclose.png" id="close_popup" class="sfsicloseBtn" />
        <center>
            <form id="calimingOptimizationForm" method="get" action="https://www.specificfeeds.com/wpclaimfeeds/getFullAccess" target="_blank">
                <h1><?php  _e( 'Enter the email you want to use', SFSI_PLUS_DOMAIN ); ?></h1>
                <div class="form-field">
                    <input type="hidden" name="feed_id" value="<?php echo $feedId; ?>" />
                    <input type="email" name="email" value="<?php echo bloginfo('admin_email'); ?>" placeholder="Your email" style="color: #000 !important;" />
                </div>
                <div class="save_button">
                    <a href="javascript:;" id="getMeFullAccess" title="Give me access">
                        <?php  _e( 'Give me access!', SFSI_PLUS_DOMAIN ); ?>
                    </a>
                </div>
                <p>
                	<?php  _e( 'This will create your FREE acccount on ', SFSI_PLUS_DOMAIN ); ?><a target="_blank" href="<?php echo $connectToFeed?>"><?php  _e( 'SpecificFeeds', SFSI_PLUS_DOMAIN ); ?></a>. <?php  _e( 'We will treat your data (and your subscribers’ data!) highly confidentially, see our ', SFSI_PLUS_DOMAIN ); ?><a target="_blank" href="https://www.specificfeeds.com/page/privacy-policy "><?php  _e( 'Privacy Policy', SFSI_PLUS_DOMAIN ); ?></a>.
              </p>
                    
                <!-- <p><?php // _e( 'If you already have an account, please ', SFSI_PLUS_DOMAIN ); ?><a href="<?php // echo $connectFeedLgn?>" target="_blank"><?php //  _e( 'click here', SFSI_PLUS_DOMAIN ); ?></a>.</p> -->
            </form>
        </center>    
	</div>
</div>


<div class="pop-overlay read-overlay" >
    <div class="pop_up_box sfsi_pop_up"  >
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
        <h4 id="readmore_text">
        	Note: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </h4>
</div>
</div>

<!-- Custom icon upload  Pop-up {Change by Monad}-->
<div class="pop-overlay upload-overlay" >
     
    <form id="customIconFrm" method="post" action="<?php echo admin_url( 'admin-ajax.php?action=UploadIcons' ); ?>" enctype="multipart/form-data" >
        <div class="pop_up_box upload_pop_up" id="tab1" style="min-height: 100px;">
            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="close_Uploadpopup" class="sfsicloseBtn" />
	    <div class="sfsi_uploader">
            <div class="sfsi_popupcntnr">
            	<h3>
               		<?php  _e( 'Steps:', SFSI_PLUS_DOMAIN ); ?>
                </h3>
                <ul class="flwstep">
                	<li>
                    	1. <?php  _e( 'Click on << Upload >> below', SFSI_PLUS_DOMAIN ); ?>
                    </li>
                    <li>
                    	2. <?php  _e( 'Select or Upload the icon into the media gallery', SFSI_PLUS_DOMAIN ); ?>
                    </li>
					<li>
                    	3. <?php  _e( 'Click on << Use this media >> ', SFSI_PLUS_DOMAIN ); ?>
                   </li>
                </ul>    
                <div class="upldbtn"><input name=""  type="button" value="Upload" class="upload_butt" onclick="upload_image_icon_new(this)" /></div>
            </div>
        </div>
      
        <input type="hidden" name="total_cusotm_icons" value="<?php echo $count;?>" id="plus_total_cusotm_icons" class="mediam_txt" />
        <!--<a href="javascript:;" id="close_Uploadpopup" title="Done">Done</a>-->
	<label style="color:red" class="uperror"></label>
	</div>
	
   </form>
   
   <script type="text/javascript">
   function upload_image_icon(ref)
   {
	    formfield = jQuery(ref).attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		window.send_to_editor = function(html) {
			var url = jQuery('img',html).attr('src');
			if(url == undefined) 
			{
				var url = jQuery(html).attr('src');
			}
			tb_remove();
			plus_sfsi_newcustomicon_upload(url);
		}
		return false;
	}

  function upload_image_icon_new(ref){
          
          var send_attachment_bkp = wp.media.editor.send.attachment;
      
          var frame = wp.media({
            title: 'Select or Upload image for icon',
            button: {
              text: 'Use this media'
            },
            multiple: false  // Set to true to allow multiple files to be selected
          });

          frame.on( 'select', function() {
            
            // Get media attachment details from the frame state
              var attachment = frame.state().get('selection').first().toJSON();

              var url        = attachment.url.split("/");
              var fileName   = url[url.length-1];
              var fileArr    = fileName.split(".");
              var fileType   = fileArr[fileArr.length-1];

              if(fileType!=undefined && (fileType=='jpeg' || fileType=='jpg' || fileType=='png' || fileType=='gif')){
                  plus_sfsi_newcustomicon_upload(attachment.url);
                  wp.media.editor.send.attachment = send_attachment_bkp;                                
              }
              else{
                  alert("Only Images are allowed to upload");
                  frame.open();                
              }
          });

          // Finally, open the modal on click
          frame.open();
          return false;    
  }  
   </script>
   
</div><!-- Custom icon upload  Pop-up-->


<?php 
	 $active_theme=$option3['sfsi_plus_actvite_theme'];
     $icons_baseUrl=SFSI_PLUS_PLUGURL."/images/icons_theme/".$active_theme."/";
     $visit_iconsUrl= SFSI_PLUS_PLUGURL."/images/visit_icons/";
     $soicalObj=new sfsi_plus_SocialHelper();
     $twitetr_share=($option2['sfsi_plus_twitter_followUserName']!='') ?  "https://twitter.com/".$option2['sfsi_plus_twitter_followUserName'] : 'http://specificfeeds.com';
    $twitter_text=($option2['sfsi_plus_twitter_followUserName']!='') ?  $option5['sfsi_plus_twitter_aboutPageText'] : 'Create Your Perfect Newspaper for free';     
?>

<!-- Facebook  example pop up -->
<div class="fb-overlay read-overlay fbex-s2" >
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" >
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
	    <h4 id="readmore_text">
        	<?php  _e( 'Move over the Facebook-icon…', SFSI_PLUS_DOMAIN ); ?>
        </h4>
    
        <div class="adminTooltip" >
           <a href="javascript:">
		   		<img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUS_PLUGURL; ?>images/fb.png" title="facebook" alt="facebook" />
		   </a>
           <div class="sfsi_plus_tool_tip_2 sfsi_plus_tool_tip_2_inr sfsi_plus_fb_tool_bdr" style="width: 59px;margin-left: -48.5px;">
               <span class="bot_arow bot_fb_arow "></span>
               <div class="sfsi_plus_inside fbb">
                   <div class="fb_1"><img src="<?php echo $visit_iconsUrl."fb.png"; ?>" /></div>    
                   <div class="fb_2"><img src="<?php echo $visit_iconsUrl."fblike_bck.png"; ?>" /></div>
                   <div class="fb_3"><img src="<?php echo $visit_iconsUrl."fbshare_bck.png"; ?>" /></div>
               </div>    
           </div>
   		
        </div>
    </div>
</div><!-- END Facebook  example pop up -->

<!-- adthis example pop up -->
<div class="pop-overlay read-overlay athis-s1" >
    <div class="pop_up_box sfsi_pop_up adPopWidth"  >
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">
        	<?php
				_e( 'Move over the “+ icon” to see the sharing options',SFSI_PLUS_DOMAIN );
			?>
        </h4>
    	<div style="margin: 0px auto;">
			<script type="text/javascript">
				var addthis_config = {pubid: "YOUR-PROFILE-ID"}
			</script>
			<a href="http://www.addthis.com/bookmark.php?v=250" class="addthis_button">
            	<img width="51" class="sfsi_wicon" src="<?php echo $icons_baseUrl."/".$active_theme; ?>_share.png" title="share" alt="share" />
            </a>
    		<?php //echo sfsi_plus_Addthis(1); ?>
    	</div>
    </div>
</div><!-- END adthis example pop up -->

<?php
	  $twit_tolCls  = "100";
	  $twt_margin   = "63";  
	  $icons_space  = $option5['sfsi_plus_icons_spacing'];  
	  $twitter_user = isset($option2['sfsi_plus_twitter_followUserName']) ? $option2['sfsi_plus_twitter_followUserName']:'';
	  $twit_tolCls  = round(strlen($twitter_user)*4+100+20); 
    $main_margin  = round($icons_space)/2;
    $twt_margin   = round($twit_tolCls/2+$main_margin+6);
?>
<!-- twiiter example pop-up -->
<div class="pop-overlay read-overlay twex-s2" >
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" >
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">
        	<?php  _e( 'Move over the Twitter-icon…', SFSI_PLUS_DOMAIN ); ?>
        </h4>
    
        <div class="adminTooltip" >
        	<a href="javascript:">
            	<img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUS_PLUGURL; ?>images/twitter.png" title="Twitter" alt="Twitter" />
            </a>
            <div class="sfsi_plus_tool_tip_2 sfsi_plus_tool_tip_2_inr sfsi_plus_twt_tool_bdr" style="width: 59px;margin-left: -48.5px;">
           		<span class="bot_arow bot_twt_arow"></span>
           		<div class="sfsi_plus_inside" >
           			<div class="twt_3"><img src="<?php echo $visit_iconsUrl."twitter.png"; ?>" /></div>
                    <div class="twt_1"><img src="<?php echo $visit_iconsUrl."twfollow_bck.png"; ?>" /></div>
           			<div class="twt_2"><img src="<?php echo $visit_iconsUrl."twtweet_bck.png"; ?>" /></div>
          		</div>    
            </div>
   		</div>
    </div>
</div><!-- END twiiter example pop-up -->

<?php 
	$google_url=($option2['sfsi_plus_google_pageURL']!='') ?  $option2['sfsi_plus_google_pageURL'] : 'https://plus.google.com/117732335852724933053' ;
?>
<!-- Goolge+  example pop up -->
<div class="pop-overlay read-overlay googlex-s2"  style="display: block;z-index: -1;opacity: 0;">
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" style="display: block;" >
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">
        	<?php  _e( 'Move over the Google+ icon…', SFSI_PLUS_DOMAIN ); ?>
        </h4>
    
        <div class="adminTooltip" >
        	<a href="javascript:"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUS_PLUGURL; ?>images/google_plus.png" title="google+" alt="google"/></a>
            <div class="sfsi_plus_tool_tip_2 sfsi_plus_tool_tip_2_inr sfsi_plus_gpls_tool_bdr" style="display: block;  margin-left: -76.5px; margin-left: -55.5px;">
           		<span class="bot_arow bot_gpls_arow"></span>
           		<div class="sfsi_plus_inside">
           			<div class="gpls_visit"><img src="<?php echo $visit_iconsUrl."google.png"; ?>" /></div>    
           			<div class="gtalk_2"><img src="<?php echo $visit_iconsUrl."gplus_like.png"; ?>" /></div>
          	 		<div class="gtalk_3"><img src="<?php echo $visit_iconsUrl."gplus_share.png"; ?>" /></div>
           		</div>    
           </div>
       </div>
    </div>
</div><!-- END Goolge+  example pop up -->

<?php 
	$youtube_url=($option2['sfsi_plus_youtube_pageUrl']!='') ?  $option2['sfsi_plus_youtube_pageUrl'] : 'http://www.youtube.com/user/SpecificFeeds' ;
	$youtube_user=($option4['sfsi_plus_youtube_user']!='' && isset($option4['sfsi_plus_youtube_user']))?  $option4['sfsi_plus_youtube_user'] : 'SpecificFeeds' ;
?>
<!-- You tube  example pop up -->
<div class="pop-overlay read-overlay ytex-s2" >
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" >
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">
        	<?php  _e( 'Move over the YouTube-icon…', SFSI_PLUS_DOMAIN ); ?>
        </h4>
    	
        <div class="adminTooltip" >
        	<a href="javascript:"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUS_PLUGURL; ?>images/youtube.png" title="youtube" alt="youtube" /></a>
        	<div class="sfsi_plus_tool_tip_2 sfsi_plus_tool_tip_2_inr utube_tool_bdr"  style=" margin-left: -67px; width: 96px;" >
           		<span class="bot_arow bot_utube_arow"></span>
           		<div class="sfsi_plus_inside">
               		<div class="utub_visit"><img src="<?php echo $visit_iconsUrl."youtube.png"; ?>" /></div>
           			<div class="utub_2"><img src="<?php echo $visit_iconsUrl."youtube_bck.png"; ?>" /></div>
                </div>    
        	</div>
   		</div>
	</div>
</div><!-- END You tube  example pop up -->
<?php 
$pin_url=($option2['sfsi_plus_pinterest_pageUrl']!='') ?  $option2['sfsi_plus_pinterest_pageUrl'] : 'http://pinterest.com/specificfeeds' ;
?>
<!-- Pinterest  example pop up -->
<div class="pop-overlay read-overlay pinex-s2" >
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" >
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">
        	<?php  _e( 'Move over the Pinterest-icon…', SFSI_PLUS_DOMAIN ); ?>
        </h4>
    
     	<div class="adminTooltip" >
        <a href="javascript:">
        	<img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUS_PLUGURL; ?>images/pinterest.png" title="pinterest" alt="pinterest" />
        </a>
        <div class="sfsi_plus_tool_tip_2 sfsi_plus_tool_tip_2_inr sfsi_plus_printst_tool_bdr"  style=" width: 73px; margin-left: -55.5px;" >
           <span class="bot_arow bot_pintst_arow"></span>
           <div class="sfsi_plus_inside">
               <div class="prints_visit"><img src="<?php echo $visit_iconsUrl."pinterest.png"; ?>" /></div>
               <div class="prints_visit_1"><img src="<?php echo $visit_iconsUrl."pinit_bck.png"; ?>" /></div>
           </div>    
        </div>
   	</div>
  </div>
</div> <!-- END Pinterest  example pop up -->

<?php 
	$linnked_share=($option2['sfsi_plus_linkedin_pageURL']!='') ?  $option2['sfsi_plus_linkedin_pageURL'] : 'https://www.linkedin.com/' ;
	$linkedIncom=($option2['sfsi_plus_linkedin_followCompany']!='') ?  $option2['sfsi_plus_linkedin_followCompany'] : '904740' ;
	$ln_product=($option2['sfsi_plus_linkedin_recommendProductId']!='') ?  $option2['sfsi_plus_linkedin_recommendProductId'] : '201714' ;
?>
<!-- LinkedIn  example pop up -->
<div class="pop-overlay read-overlay linkex-s2" style="display: block;z-index: -1;opacity: 0;" >
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" >
    	<img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">
        	<?php  _e( 'Move over the LinkedIn-icon…', SFSI_PLUS_DOMAIN ); ?>
        </h4>
        <div class="adminTooltip" >
        	<a href="javascript:"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUS_PLUGURL;?>images/linked_in.png" title="LinkedIn" alt="LinkedIn"/></a>
        	<div class="sfsi_plus_tool_tip_2 sfsi_plus_tool_tip_2_inr sfsi_plus_linkedin_tool_bdr"  style=" width: 99px; margin-left: -68.5px;">
           		<span class="bot_arow bot_linkedin_arow"></span>
           		<div class="sfsi_plus_inside">
           		   <div style="margin:1px 5px;" class="linkin_1"><img src="<?php echo $visit_iconsUrl."linkedIn.png"; ?>" /></div>
                   <div class="linkin_2"><img src="<?php echo $visit_iconsUrl."linkinflw_bck.png"; ?>" /></div>
                   <div class="linkin_3"><img src="<?php echo $visit_iconsUrl."lnkdin_share_bck.png"; ?>" /></div>
                   <div class="linkin_4"><img src="<?php echo $visit_iconsUrl."lnkrecmd_bck.png"; ?>" /></div>
           		</div>    
        	</div>
   		</div>
  </div>
</div> <!-- END LinkedIn  example pop up -->

<!-- ADDTHIS ICON POP-UP -->
<div class="pop-overlay read-overlay share-s2" >
    <div class="pop_up_box sfsi_pop_up adPopWidth" >
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">
        	<?php _e('Move over the “+ icon” to see the sharing options',SFSI_PLUS_DOMAIN);?>
        </h4>
 	    <div style="float: right;opacity: 1;position: relative;right: 215px;top: 10px;width: 52px; text-align: center;" ><a alt="share"  href="http://www.addthis.com/bookmark.php?v=250"  effect="" class="addthis_button"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUS_PLUGURL; ?>images/share.png" title="share" alt="share" /></a>
    </div>
  </div>
</div><!-- END ADDTHIS ICON POP-UP -->



<!-- email deactivate pop-ups -->

<div class="pop-overlay read-overlay demail-1" >
    <div class="pop_up_box sfsi_pop_up sfsi_space_pop" >
       <h4>
       		 <?php _e('Note: Also if you already offer a newsletter it makes sense to offer this option too, because it will get you more readers as explained', SFSI_PLUS_DOMAIN ); ?>
           	(<a href="http://www.specificfeeds.com/rss" target="_new" style="color:#5A6570;display: inline;text-decoration:underline">
                <?php  _e( 'learn more', SFSI_PLUS_DOMAIN ); ?>
           	</a>). 
       </h4>
       <div class="button">
           <a href="javascript:;" class="hideemailpop" title="Ok, keep it active for the time being,I want to see how it works">
                <?php  _e( 'Ok, keep it active for the time being, I want to see how it works', SFSI_PLUS_DOMAIN ); ?>
            </a>
       </div>
       <a href="javascript:;" id="deac_email2" title="Deactivate it">
              <?php  _e( 'Deactivate it', SFSI_PLUS_DOMAIN ); ?>
       </a>
  </div>
</div>

<div class="pop-overlay read-overlay demail-2" >
    <div class="pop_up_box sfsi_pop_up sfsi_space_pop" >
       <h4 class="activate">
              <?php  _e( 'Ok, fine, however for using this plugin for FREE, please support us by activating a link back to our site:', SFSI_PLUS_DOMAIN ); ?>
       </h4>
		<?php $nonce = wp_create_nonce("active_plusfooter");?>
        <div class="button">
            <a href="javascript:;" class="sfsiplus_activate_footer activate" title="Ok, activate link" data-nonce="<?php echo $nonce;?>">
                <?php  _e( 'Ok, activate link', SFSI_PLUS_DOMAIN ); ?>
            </a>
        </div>
        <a href="javascript:;" id="deac_email3" title="Don’t activate link">
            <?php  _e( 'Don’t activate link', SFSI_PLUS_DOMAIN ); ?>
        </a>
  </div>
</div>

<div class="pop-overlay read-overlay demail-3" >
    <div class="pop_up_box sfsi_pop_up sfsi_space_pop" >
       <h4>
              <?php  _e( 'You’re a toughie. Last try: As a minimum, could you please review this plugin (with 5 stars)? It only takes a minute. Thank you!', SFSI_PLUS_DOMAIN ); ?>
       </h4>
        <div class="button">
            <a href="https://wordpress.org/support/view/plugin-reviews/ultimate-social-media-plus" target="_new" class="hidePop activate" title="Ok, Review it" >
                <?php  _e( 'Ok, Review it', SFSI_PLUS_DOMAIN ); ?>
            </a>
        </div>
        <a href="javascript:;" class="hidePop" title="Don’t review and exit">
            <?php  _e( 'Don’t review and exit', SFSI_PLUS_DOMAIN ); ?>
        </a>
      </div>
</div> <!-- END email deactivate pop-ups -->

<!--Custom Skin popup {Monad}-->
<div class="pop-overlay cstmskins-overlay" >
    <div class="cstmskin_popup" >
        <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/close.jpg" id="custmskin_clspop" class="sfsicloseBtn" />
        
        <div class="cstomskins_wrpr">
            <h3>
           		<?php  _e( 'Upload custom icons', SFSI_PLUS_DOMAIN ); ?>
            </h3>
            <div class="custskinmsg">
            	
              <?php  _e( 'Here you can upload custom icons which perform the same actions as the standard icons.', SFSI_PLUS_DOMAIN ); ?>
                <ul>
                    <li>
                		1. <?php  _e( 'Click on << Upload >> below', SFSI_PLUS_DOMAIN ); ?>
                    </li>
                    <li>
                    	2. <?php  _e( 'Upload the icon into the media gallery', SFSI_PLUS_DOMAIN ); ?>
                    </li>
                    <li>
                     	3. <?php  _e( 'Click on << Insert into post >>', SFSI_PLUS_DOMAIN ); ?>
					         </li>
                </ul>
            </div>

            <?php 

                          
              function sfsi_plus_custom_icons_html($iconLabel,$dbKeyName){ 
                ?>

                  <li>
                      <div class="cstm_icnname"><?php _e($iconLabel,SFSI_PLUS_DOMAIN ); ?></div>
                        <div class="cstmskins_btn">
                          <?php

                          if(get_option($dbKeyName))
                          {
                            $icon_skin = get_option($dbKeyName);
                            echo "<img src='".$icon_skin."' width='30px' height='30px' class='imgskin'>";
                            echo '<a href="javascript:" onclick="upload_image_new(this);" title="'.$dbKeyName.'" class="cstmskin_btn">Update</a>';
                            echo '<a style="display:block" href="javascript:" onclick="sfsiplus_deleteskin_icon(this);" title="'.$dbKeyName.'" data-nonce="'.wp_create_nonce("sfsi_plus_deleteCustomSkin").'" class="cstmskin_btn dlt_btn">Delete</a>';
                          }
                          else
                          {
                            echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
                            echo '<a href="javascript:" onclick="upload_image_new(this);" title="'.$dbKeyName.'" class="cstmskin_btn">Upload</a>';
                            echo '<a href="javascript:" onclick="sfsiplus_deleteskin_icon(this);" title="'.$dbKeyName.'" data-nonce="'.wp_create_nonce("sfsi_plus_deleteCustomSkin").'" class="cstmskin_btn dlt_btn">Delete</a>';
                          }
                        ?>
                        </div>
                    </li>

              <?php } ?>
            
            <ul class="cstmskin_iconlist">
            	
                  <?php 

                    $arrSkins = array(
                        'RSS'         => "plus_rss_skin",
                        'Email'       => "plus_email_skin",
                        'Facebook'    => "plus_facebook_skin",
                        'Twitter'     => "plus_twitter_skin",
                        'Google+'     => "plus_google_skin",
                        'Share'       => "plus_share_skin",
                        'Houzz'       => "plus_houzz_skin",
                        'Youtube'     => "plus_youtube_skin",
                        'Pinterest'   => "plus_pintrest_skin",
                        'Linkedin'    => "plus_linkedin_skin",
                        'Instagram'   => "plus_instagram_skin",
                        'WhatsApp'    => "plus_whatsapp_skin",
                        'Skype'       => "plus_skype_skin",
                        'Reddit'      => "plus_reddit_skin",
                        'Youtube'     => "plus_youtube_skin",
                        'Snapchat'    => "plus_snapchat_skin",
                        'Vimeo'       => "plus_vimeo_skin",
                        'Soundcloud'  => "plus_soundcloud_skin",
                        'Yummly'      => "plus_yummly_skin",
                        'Flickr'      => "plus_flickr_skin",
                        'Tumblr'      => "plus_tumblr_skin"
                    );

                    foreach ($arrSkins as $key => $value) {
                      sfsi_plus_custom_icons_html($key,$value);                                       
                    }
                    ?>
                
            </ul>
            <div class="cstmskins_sbmt">
            	<a href="javascript:" class="done_btn" onclick="SFSI_plus_done();">
                	<?php  _e( "I'm done!", SFSI_PLUS_DOMAIN ); ?>
                </a> 
            </div>
           
        </div>
    	<script type="text/javascript">
		   function upload_image(ref)
		   {
				var title = jQuery(ref).attr('title');
				tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
				window.send_to_editor = function(html) {
					var url = jQuery('img',html).attr('src');
					if(url == undefined) 
					{
						var url = jQuery(html).attr('src');
					}
					plus_sfsi_customskin_upload(title+'='+url, ref);
					tb_remove();
				}
				return false;
			}

      function upload_image_new(ref){
            
            var title = jQuery(ref).attr('title');
            var send_attachment_bkp = wp.media.editor.send.attachment;
        
            var frame = wp.media({
              title: 'Select or Upload image for icon',
              button: {
                text: 'Use this media'
              },
              multiple: false  // Set to true to allow multiple files to be selected
            });

            frame.on( 'select', function() {
              
              // Get media attachment details from the frame state
                var attachment = frame.state().get('selection').first().toJSON();

                var url        = attachment.url.split("/");
                var fileName   = url[url.length-1];
                var fileArr    = fileName.split(".");
                var fileType   = fileArr[fileArr.length-1];
                fileType       = fileType.toLowerCase();

                if(fileType!=undefined && (fileType=='jpeg' || fileType=='jpg' || fileType=='png' || fileType=='gif')){

                    plus_sfsi_customskin_upload(title+'='+attachment.url,ref);
                    wp.media.editor.send.attachment = send_attachment_bkp;                                
                }
                else{
                    alert("Only Images are allowed to upload");
                    frame.open();                
                }
            });

            // Finally, open the modal on click
            frame.open();
            return false;    
      }      
		 </script>
    </div>    
</div>        
