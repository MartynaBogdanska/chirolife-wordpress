<!-- Loader Image section  -->
<div id="sfpluspageLoad" >  
    
</div>
<!-- END Loader Image section  -->

<!-- javascript error loader  -->
<div class="error" id="sfsi_onload_errors" style="margin-left: 60px;display: none;">  
    <p>
        <?php  _e('We found errors in your javascript which may cause the plugin to not work properly. Please fix the error:',SFSI_PLUS_DOMAIN ); ?>
    </p><p id="sfsi_jerrors"></p>
</div>
<!-- END javascript error loader  -->

<!-- START Admin view for plugin-->
<div class="wapper sfsi_mainContainer">
    
    <!-- Top content area of plugin -->
    <div class="main_contant">
        
        <div class="sfsi_plus_heading">
            <img src="<?php echo SFSI_PLUS_PLUGURL."/images/premium-logo.png"?>" width="35" height="35" />
            <h1>
                <?php  _e( 'Welcome to the Ultimate Social Media PREMIUM plugin!', SFSI_PLUS_DOMAIN ); ?>
            </h1>
        </div>
        
        <p>
            <?php  _e( 'Simply answer the questions below (at least the first 3) by clicking on them - that`s it!', SFSI_PLUS_DOMAIN ); ?>
        </p>    
        <p>
            <?php  _e( 'If you have questions, or something doesn`t work as it should, please raise a ticket ', SFSI_PLUS_DOMAIN ); ?>
            
            <!--<a href="https://goo.gl/MU6pTN#no-topic-0" target="_blank">
                <?php //_e(' Support Forum',SFSI_PLUS_DOMAIN); ?>
            </a>

            <?php //_e('.&nbsp;We\'ll try to respond quickly!.',SFSI_PLUS_DOMAIN); ?>-->

            <?php //_e('&nbsp;or, if your question is not answered in the FAQ, please contact us', SFSI_PLUS_DOMAIN );?>
             
            <!--<a href="<?php //echo License_Manager::supportLink();?>" target="_blank" class="lit_txt">-->
            <a href="<?php echo License_Manager::supportLink(); ?>" target="_blank">
                <?php  _e('Support Ticket', SFSI_PLUS_DOMAIN ); ?>
            </a>
        </p>

        <p>
        <?php  _e( "<a style='text-decoration:none;' href='javascript:void(0);'>New:</a> Share the plugin with friends and earn 40% of every sale you helped to generate! <a class='learnmore' href='javascript:void(0);'>Learn more</a>");?>

    </div>
    <!-- END Top content area of plugin -->
      
    <!-- step 1 end  here -->
    <div id="accordion">
        <h3><span>1</span>
            <?php  _e( 'Which icons do you want to show on your site?', SFSI_PLUS_DOMAIN ); ?>
        </h3>
        <!-- step 1 end  here -->
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view1.php'); ?>
        <!-- step 1 end here --> 
        
        <!-- step 2 start here -->
        <h3><span>2</span>
            <?php  _e( 'What do you want the icons to do?', SFSI_PLUS_DOMAIN ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view2.php'); ?>
        <!-- step 2 END here -->
        
        <!-- step new 3 start here -->
        <h3><span>3</span>
            <?php  _e( 'Where shall they be displayed?', SFSI_PLUS_DOMAIN ); ?> 
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view8.php'); ?>
    <!-- step new3 end here -->
    </div>
    <h2 class="optional">
        <?php  _e( 'Optional', SFSI_PLUS_DOMAIN ); ?>
    </h2>
    <div id="accordion1">
    <!-- step old 3 start here -->
        <h3><span>4</span>
            <?php  _e( 'What design and animation do you want to give your icons?', SFSI_PLUS_DOMAIN ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view3.php'); ?>
        <!-- step old 3 END here -->
    
        <!-- step old 4 Start here -->
        <h3><span>5</span>
            <?php  _e( 'Do you want to display "counts" next to your main icons?', SFSI_PLUS_DOMAIN ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view4.php'); ?>
        <!-- step old 4 END here -->
    
        <!-- step old 5 Start here -->
        <h3><span>6</span>
            <?php  _e( 'Any other wishes for your main icons?', SFSI_PLUS_DOMAIN ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view5.php'); ?>
        <!-- step old 5 END here -->
        
        <!-- step old 7 Start here -->
        <h3><span>7</span>
            <?php  _e( 'Do you want to display a pop-up, asking people to subscribe?', SFSI_PLUS_DOMAIN ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view7.php'); ?>
        <!-- step old 7 END here -->
    
        <!-- step old 8 Start here -->
        <h3><span>8</span>
            <?php  _e( 'Do you want to show a subscription form (increases sign ups)?', SFSI_PLUS_DOMAIN ); ?>
        </h3>
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_option_view9.php'); ?>
    <!-- step old 8 END here -->
    
    </div>
    <div class="tab10">
        <div class="save_button">
            <img src="<?php echo SFSI_PLUS_PLUGURL; ?>images/ajax-loader.gif" class="loader-img" />
            <a href="javascript:;" id="save_plus_all_settings" title="Save All Settings">
                <?php  _e( 'Save All Settings', SFSI_PLUS_DOMAIN ); ?>
            </a>
        </div>
        <p class="red_txt errorMsg" style="display:none"> </p>
        <p class="green_txt sucMsg" style="display:none"> </p>
        
        <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_affiliate_banner.php'); ?>

    </div>
 <!-- all pops of plugin under sfsi_pop_content.php file --> 
 <?php include(SFSI_PLUS_DOCROOT.'/views/sfsi_pop_content.php'); ?>
</div>