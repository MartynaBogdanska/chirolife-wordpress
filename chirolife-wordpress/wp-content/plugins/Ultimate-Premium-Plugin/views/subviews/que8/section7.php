<div class="sfsi_plus_tab8_subcontainer">
	
	<h5 class="sfsi_plus_section_subtitle">
    	<?php  _e( 'Privacy Notice', SFSI_PLUS_DOMAIN ); ?>
    </h5>
    
    <!--Left Section-->
    <div class="sfsi_plus_left_container">
    	<?php get_sfsi_plus_SubscriptionForm("privacynotice"); ?>
    </div>
    
    <!--Right Section-->
    <div class="sfsi_plus_right_container">
    	
        <div class="row_tab privacyrow">
                
            <label class="sfsi_plus_heding privacyHeading">
                <?php  _e( 'Do you want to show a privacy notice?', SFSI_PLUS_DOMAIN ); ?>
            </label>
            
            <ul class="border_shadow ulPrivacyDisplay">
                
                <li>
                    <input type="radio" class="styled" value="yes" name="sfsi_plus_shall_display_privacy_notice"
                        <?php echo sfsi_plus_isChecked($privacynotice_display, 'yes'); ?> >
                    <label>
                        <?php  _e( 'Yes', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>

                <li>
                    <input type="radio" class="styled" value="no" name="sfsi_plus_shall_display_privacy_notice"
                        <?php echo sfsi_plus_isChecked($privacynotice_display, 'no'); ?> >
                    <label>
                        <?php  _e( 'No', SFSI_PLUS_DOMAIN ); ?>
                    </label>
                </li>

            </ul>

        </div>

        <?php

            $privacynotice_section_display_class = "yes" == $privacynotice_display ? "show" : "hide";

        ?>
            
    	<div class="row_tab <?php echo $privacynotice_section_display_class; ?>">

            <label class="sfsi_plus_heding fixwidth sfsi_plus_same_width privacyLabel">
            	<?php  _e( 'Enter text to show below Subscribe button:', SFSI_PLUS_DOMAIN ); ?>
            </label>

            <div class="sfsi_plus_field">

                <input type="text" class="small new-inp" name="sfsi_plus_form_privacynotice_text"
                    value="<?php echo ($privacynotice_text!='')
								? $privacynotice_text : '' ;
							?>"/>
            </div>           
        </div>

        <div class="row_tab <?php echo $privacynotice_section_display_class; ?>">
            <p>If you want to enter links: Put the text you want to link in curly brackets, followed by the url in curly brackets, e.g. {Privacy Policy} {https://www.ultimatelysocial.com/privacy}</a> will turn the text «Privacy Policy» into a link (and underlined)</p>
        </div>

        <!--Row Section-->
        <div class="row_tab <?php echo $privacynotice_section_display_class; ?>">

        	<div class="sfsi_plus_field">

            	<label class="sfsi_plus_same_width">
                	<?php  _e( 'Font:', SFSI_PLUS_DOMAIN ); ?>
                </label>

                <?php sfsi_plus_get_font("sfsi_plus_form_privacynotice_font", $privacynotice_font); ?>

            </div>

            <div class="sfsi_plus_field">

            	<label>
                	<?php  _e( 'Font style:', SFSI_PLUS_DOMAIN ); ?>
                </label>

                <?php sfsi_plus_get_fontstyle("sfsi_plus_form_privacynotice_fontstyle", $privacynotice_fontstyle); ?>

            </div>

        </div>

        <!--Row Section-->
        <div class="row_tab <?php echo $privacynotice_section_display_class; ?>">

        	<div class="sfsi_plus_field">

            	<label class="sfsi_plus_same_width">
                	<?php  _e( 'Font color', SFSI_PLUS_DOMAIN ); ?>
                </label>

                <input type="text" name="sfsi_plus_form_privacynotice_fontcolor" data-default-color="#000000" id="sfsi_plus_form_privacynotice_fontcolor" value="<?php echo ($privacynotice_fontcolor!='')
								? $privacynotice_fontcolor : '' ;
							?>">
            </div>
            <div class="sfsi_plus_field">

            	<label>
                	<?php  _e( 'Font size', SFSI_PLUS_DOMAIN ); ?>
                </label>

                <input min="12" type="number" class="small rec-inp" name="sfsi_plus_form_privacynotice_fontsize"
                	value="<?php echo ($privacynotice_fontsize!='')
								? $privacynotice_fontsize : '' ;?>"/>

                <span class="pix">
                	<?php  _e( 'pixels', SFSI_PLUS_DOMAIN ); ?>
                </span>

            </div>
        </div>
        
        <!--Row Section-->
        <div class="row_tab <?php echo $privacynotice_section_display_class; ?>">
        
        	<div class="sfsi_plus_field">

            	<label class="sfsi_plus_same_width">
                	<?php  _e( 'Alignment:', SFSI_PLUS_DOMAIN ); ?>
                </label>

                <?php sfsi_plus_get_alignment("sfsi_plus_form_privacynotice_fontalign", $privacynotice_fontalign); ?>

            </div>

        </div>
           
        <!--End Section-->
    </div>
    
</div>