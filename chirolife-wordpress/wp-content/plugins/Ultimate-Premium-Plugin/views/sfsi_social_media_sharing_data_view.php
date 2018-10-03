<?php
     // Fetch all saved data
     $post_id                 = get_the_ID();
     $post                    = get_post($post_id);     
     $noPicUrl                = SFSI_PLUS_PLUGURL."images/no-image.jpg";          
     $sfsiSocialMediaImage    = get_post_meta( $post_id,'sfsi-social-media-image',true);

     // Set Image for Preview
     $imgSfsiSocialMediaImage = ($sfsiSocialMediaImage!=null && isset($sfsiSocialMediaImage) && strlen($sfsiSocialMediaImage)>0) ? $sfsiSocialMediaImage: $noPicUrl;

     // Set value in input hidden field
     $valsfsiSocialMediaImage = ($sfsiSocialMediaImage!=null && isset($sfsiSocialMediaImage) && strlen($sfsiSocialMediaImage)>0 && $sfsiSocialMediaImage!=$noPicUrl) ? $sfsiSocialMediaImage: "";     

     $sfsiSocailTitleMaxLength = 95;
     $sfsiSocialTitle       = get_post_meta( $post_id,'sfsi-fbGLTw-title',true);
     $sfsiSocialTitle       = (isset($sfsiSocialTitle)) ? $sfsiSocialTitle: "";
     $remainsfsiSocialTitle = (isset($sfsiSocialTitle)) ? $sfsiSocailTitleMaxLength-strlen($sfsiSocialTitle): $sfsiSocailTitleMaxLength; 

     $sfsiSocailDescMaxLength = 297;     
     $sfsiSocialDesc        = get_post_meta( $post_id,'sfsi-fbGLTw-description',true);
     $sfsiSocialDesc        = (isset($sfsiSocialDesc)) ? $sfsiSocialDesc: "";
     $remainsfsiSocialDesc  = (isset($sfsiSocialDesc)) ? $sfsiSocailDescMaxLength-strlen($sfsiSocialDesc): $sfsiSocailDescMaxLength; 

    // Set Image for Preview
     $sfsiPinterestImage    = get_post_meta( $post_id,'sfsi-pinterest-media-image',true);
     $imgSfsiPinterestImage = ($sfsiPinterestImage!=null && isset($sfsiPinterestImage) && strlen($sfsiPinterestImage)>0 ) ? $sfsiPinterestImage: $noPicUrl;

    // Set value in input hidden field
     $valsfsiPinterestImage = ($sfsiPinterestImage!=null && isset($sfsiPinterestImage) && strlen($sfsiPinterestImage)>0 && $imgSfsiPinterestImage!=$noPicUrl) ? $sfsiPinterestImage: "";      

     $sfsiPinterestDesc      = get_post_meta( $post_id,'social-pinterest-description',true);
     $sfsiPinterestDesc      = (isset($sfsiPinterestDesc)) ? $sfsiPinterestDesc: "";

     $sfsiTwitterDescMaxLength = 106;
     $sfsiTwitterDesc       = get_post_meta( $post_id,'social-twitter-description',true);
     $sfsiTwitterDesc       = (isset($sfsiTwitterDesc)) ? $sfsiTwitterDesc: "";     
     $remainsfsiTwitterDesc = (isset($sfsiTwitterDesc)) ? $sfsiTwitterDescMaxLength-strlen($sfsiTwitterDesc): $sfsiTwitterDescMaxLength;    
    
     // Get settings from Question 6 if user wants to allow our plugins's meta tags to be added, if got value no then add meta tags 
     $option5 =  unserialize(get_option('sfsi_premium_section5_options',false)); 
     $sfsi_plus_disable_usm_og_meta_tags = (isset($option5['sfsi_plus_disable_usm_og_meta_tags'])) ? $option5['sfsi_plus_disable_usm_og_meta_tags']: "no";
    
 
     if($sfsi_plus_disable_usm_og_meta_tags=="yes") { ?>
        <div class="sfsi_disable_usm_ogtags_notice"><?php _e("<strong>Note:</strong> This section currently is not active (except the definition of the Tweet-text). Maybe this is because you also use another plugin (e.g. SEO plugin) which already places the required meta tags on your site to define which picture & text should get shared. If you want to enable our plugin to place the meta tags (instead of any other plugin) you can activate it by <a class='sfsi_disable_usm_ogtags_setting_change' href='javascript:void(0)'>clicking here</a>",SFSI_PLUS_DOMAIN); ?>
        </div>
    <?php } ?>

    <div class="social_data_container_first">

    <!--********************************** Image for Social Networks (Facebook ,Google, LinkedIn & Twitter) STARTS ***********************************************-->

        <div class="sfsi_custom_social_data_container">

            <div class="imgTopTxt"><?php _e('<strong>Picture </strong>(for social media sharing)',SFSI_PLUS_DOMAIN); ?></div>
            
            <div class="imgContainer imgpicker">
            
                <img  id="sfsi-social-media-image-preview" src="<?php echo esc_url($imgSfsiSocialMediaImage); ?>" />

                <?php
                
                $uploadBtnGTitle = 'Add Picture';
                $overLayGDisplay = "display:none";

                if($noPicUrl != $imgSfsiSocialMediaImage){ 

                    $uploadBtnGTitle = 'Change Picture';
                    $overLayGDisplay = "display:block";
                
                 } ?>
                    
                    <div class="usm-overlay"></div>
                    <a style="<?php echo $overLayGDisplay; ?>" data-noimageurl="<?php echo $noPicUrl; ?>" href="javascript:void(0)" class="usm-remove-media" title="Remove"><span class="dashicons dashicons-no-alt"></span></a>

            </div>
            
            <div class="imgUploadBtn"><input type="button" id="sfsi-social-media-image-button" class="button" value="<?php _e($uploadBtnGTitle,SFSI_PLUS_DOMAIN); ?>" /></div>
             
            <div class="imgTxt"><span><?php _e('The best size is a 1,200px X 630px image (aspect ratio 1.9:1).' , SFSI_PLUS_DOMAIN); ?></span></div>

             <input style="width:40%;" type="hidden" name="sfsi-social-media-image" id="sfsi-social-media-image" class="inpt_sfsi_social_media_image" value="<?php echo esc_url($valsfsiSocialMediaImage); ?>" />
        </div>

    <!--********************************** Image for Social Networks (Facebook ,Google, LinkedIn & Twitter) CLOSES ***********************************************-->


        <div class="sfsi_custom_social_titlePlusDescription">

             <div class="sfsi_titlePlusDescription">

        <!--********************************** TITLE for Social Networks (Facebook ,Google, LinkedIn & Twitter) STARTS ***********************************************-->

                <div class="sfsi_custom_social_data_title">
                
                    <div class="imgTopTxt"><?php _e('<strong>Title </strong>(leave blank to use the post title)',SFSI_PLUS_DOMAIN); ?></div>

                    <div class="social_title"><textarea name="social_fbGLTw_title_textarea" class="sfsi_textarea" id="social_fbGLTw_title_textarea" maxlength="<?php echo $sfsiSocailTitleMaxLength; ?>"><?php echo $sfsiSocialTitle; ?></textarea></div>

                    <div class="social_description">
                        <?php _e('This title will be used when shared on Facebook, Google+ or Linkedin. Leave it blank to use the post title. [Developers: this is used by the open graph meta tag «og:title»]',SFSI_PLUS_DOMAIN); ?>
                    </div>

                    <div class="remaining_char_box" id="remaining_char_title"><?php _e('<span id="sfsi_title_remaining_char">'.$remainsfsiSocialTitle.'</span> Characters Remaining',SFSI_PLUS_DOMAIN);?> </div>

                </div>

        <!--********************************** TITLE for Social Networks (Facebook ,Google, LinkedIn & Twitter) CLOSES ***********************************************-->

    <!--********************************** DESCRIPTION for Social Networks (Facebook ,Google, LinkedIn & Twitter) STARTS ***********************************************-->

                <div class="sfsi_custom_social_data_description"> 
                
                    <div class="imgTopTxt"><?php _e('<strong>Description </strong>(leave blank to use the post exerpt)',SFSI_PLUS_DOMAIN); ?></div>

                    <div class="social_description_container"><textarea name="social_fbGLTw_description_textarea" class="sfsi_textarea" id="social_fbGLTw_description_textarea" maxlength="<?php echo $sfsiSocailDescMaxLength; ?>"><?php echo $sfsiSocialDesc; ?></textarea></div>

                    <div class="social_description_hint">
                        <?php _e('This description will be used when shared on Facebook, Google+, Linkedin or Twitter (if you use ‘Twitter cards’). Leave it blank to use the post excerpt. [Developers: this is used by the open graph meta tag «og:description»]',SFSI_PLUS_DOMAIN); ?>
                    </div>

                    <div class="remaining_char_box" id="remaining_char_description"><?php _e('<span id="sfsi_desc_remaining_char">'.$remainsfsiSocialDesc.'</span> Characters Remaining',SFSI_PLUS_DOMAIN);?> </div>

                </div>

    <!--********************************** DESCRIPTION for Social Networks (Facebook ,Google, LinkedIn & Twitter) CLOSES ***********************************************-->        

             </div> 
        </div>
    </div>

    <div class="social_data_container_second">

   <!--********************************** Image for PINTEREST STARTS ***********************************************-->

        <div class="sfsi_custom_social_data_container">

            <div class="imgTopTxt"><?php _e('<strong>Pinterest image </strong>',SFSI_PLUS_DOMAIN); ?></div>
            
            <div class="imgContainer imgpicker">

                <img  id="sfsi-social-pinterest-image-preview" src="<?php echo esc_url($imgSfsiPinterestImage); ?>" />

                <?php
                
                $uploadBtnTitle = 'Add Picture';
                $overLayDisplay = "display:none";

                if($noPicUrl !=$imgSfsiPinterestImage){ 

                    $uploadBtnTitle = 'Change Picture';
                    $overLayDisplay = "display:block";
   
                 } ?>

                <div class="usm-overlay"></div>
                <a style="<?php echo $overLayDisplay; ?>" data-noimageurl="<?php echo $noPicUrl; ?>" href="javascript:void(0)" class="usm-remove-media" title="Remove"><span class="dashicons dashicons-no-alt"></span></a>

            </div>
            
            <div class="imgUploadBtn"><input type="button" id="sfsi-social-pinterest-image-button" class="button" value="<?php _e($uploadBtnTitle,SFSI_PLUS_DOMAIN); ?>" /></div>
             
            <div class="imgTxt"><span><?php _e('The best size is a 1,200px X 630px image (aspect ratio 1.9:1).' , SFSI_PLUS_DOMAIN); ?></span></div>

             <input style="width:40%;" type="hidden" name="sfsi-social-pinterest-image" id="sfsi-social-pinterest-image" placeholder="<?php _e('Enter image url or choose from media library',SFSI_PLUS_DOMAIN); ?>"  value="<?php echo esc_url($valsfsiPinterestImage); ?>" />
        </div>
   
   <!--********************************** Image for PINTEREST CLOSES ***********************************************-->

        <div class="sfsi_custom_social_titlePlusDescription">

             <div class="sfsi_titlePlusDescription">

     <!--********************************** DESCRIPTION for PINTEREST STARTS ***********************************************-->

                <div class="sfsi_custom_social_data_title"> 
                
                    <div class="imgTopTxt"><?php _e('<strong>Pinterest description </strong>(leave blank to use the post title)',SFSI_PLUS_DOMAIN); ?></div>

                    <div class="social_title"><textarea name="social_pinterest_description_textarea" class="sfsi_textarea" id="social_pinterest_description_textarea"><?php echo $sfsiPinterestDesc; ?></textarea></div>

                    <div class="social_description">
                        <?php _e('This description will be used when this post is shared on Pinterest. Leave it blank to use the post title.',SFSI_PLUS_DOMAIN); ?>
                    </div>

                </div>
     
     <!--********************************** DESCRIPTION for PINTEREST CLOSES ***********************************************-->

    <!--********************************** TITLE for Twitter STARTS ***********************************************-->

                <div class="sfsi_custom_social_data_description"> 
                
                    <div class="imgTopTxt"><?php _e('<strong>Tweet </strong>',SFSI_PLUS_DOMAIN); ?></div>

                    <div class="social_description_container"><textarea name="social_twitter_description_textarea" class="sfsi_textarea" id="social_twitter_description_textarea" maxlength="<?php echo $sfsiTwitterDescMaxLength; ?>"><?php echo $sfsiTwitterDesc; ?></textarea></div>

                    <div class="social_description_hint">
                        <?php _e('This will be used as tweet-text (the link which gets shared will be automatically added at the end). If you don’t enter anything here the tweet text will be used which you defined globally under question 6 on the plugin’s settings page. ',SFSI_PLUS_DOMAIN); ?>
                    </div>

                    <div class="remaining_char_box" id="remaining_twiter_char_description"><?php _e('<span id="sfsi_twitter_desc_remaining_char">'.$remainsfsiTwitterDesc.'</span> Characters Remaining',SFSI_PLUS_DOMAIN);?> </div>

                </div>              
    
    <!--********************************** TITLE for Twitter CLOSES ***********************************************-->
             </div> 
        </div>
    </div>