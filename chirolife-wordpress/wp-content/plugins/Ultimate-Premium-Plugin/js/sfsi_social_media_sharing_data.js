jQuery(document).ready(function(){

    jQuery('.sfsi_disable_usm_ogtags_setting_change').on('click',function(){

    var data = {
        action:"plus_update_disable_usm_ogtags_updater5",
        sfsi_plus_disable_usm_og_meta_tags:"no"
    };
    jQuery.post(ajaxurl, data, function(response) {
                    if(response){
                        alert('Settings updated');
                        jQuery('.sfsi_disable_usm_ogtags_notice').remove();                        
                    }
        });
    });

    // ******************** Image Picker handling STARTS here ***********************//

    var noImgUrl = jQuery(".usm-remove-media").attr('data-noimageurl');

    jQuery('.imgpicker').hover(function(){

        var imgSrc = jQuery(this).children('img').attr('src'); 

        if(noImgUrl != imgSrc){
            jQuery(this).children(".usm-remove-media").show();
            jQuery(this).children(".usm-overlay").show();            
        }

    }, function(){
        
        var imgSrc = jQuery(this).children('img').attr('src'); 

        if(noImgUrl != imgSrc){
            jQuery(this).children(".usm-remove-media").hide();
            jQuery(this).children(".usm-overlay").hide();            
        }
    });

    jQuery('.usm-remove-media').click(function(){

        // Hide overlay & remove link
        jQuery(this).prev().hide();
        jQuery(this).hide();

        // Set image value empty
        jQuery(this).parent().next().next().next().val("");

        // Set no image in image preview
        var noImgUrl = jQuery(this).attr("data-noimageurl");
        jQuery(this).prev().prev().attr("src",noImgUrl);

        jQuery(this).parent().next().children('.button').val("Add Picture");

    });

    // ******************** Image Picker handling CLOSES here ***********************//    
});

function open_save_image(btnUploadID,inputImageName,previewDivId){

        jQuery('#'+btnUploadID).click(function() {
     
        var send_attachment_bkp = wp.media.editor.send.attachment;
    
        var frame = wp.media({
          title: 'Select or Upload Media for Social Media',
          button: {
            text: 'Use this media'
          },
          multiple: false  // Set to true to allow multiple files to be selected
        });

        frame.on( 'select', function() {
          
          // Get media attachment details from the frame state
          var attachment = frame.state().get('selection').first().toJSON();
            
            var url = attachment.url.split("/");
            var fileName = url[url.length-1];
            var fileArr  = fileName.split(".");
            var fileType = fileArr[fileArr.length-1];

            if(fileType!=undefined && (fileType=='jpeg' || fileType=='jpg' || fileType=='png')){
                
                jQuery('#'+inputImageName).val(attachment.url);
                jQuery('#'+previewDivId).attr('src',attachment.url);

                jQuery('#'+btnUploadID).val("Change Picture");

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
    });    
}

function remaining_char_display(textareaId,remaincharBoxId){
        jQuery('#'+textareaId).keyup(function(){
            var txtareaVal     = jQuery.trim(jQuery('#'+textareaId).val());
            var remaining_max  = jQuery(this).attr("maxlength");
            var remaining_char = remaining_max - txtareaVal.length;
            jQuery("#"+remaincharBoxId).text(remaining_char);
  });
}

open_save_image('sfsi-social-media-image-button','sfsi-social-media-image','sfsi-social-media-image-preview');
open_save_image('sfsi-social-pinterest-image-button','sfsi-social-pinterest-image','sfsi-social-pinterest-image-preview');

remaining_char_display('social_fbGLTw_title_textarea','sfsi_title_remaining_char');
remaining_char_display('social_fbGLTw_description_textarea','sfsi_desc_remaining_char');
remaining_char_display('social_twitter_description_textarea','sfsi_twitter_desc_remaining_char');