<?php
add_action('admin_notices', 'sfsi_plus_admin_versionerror', 10);
function sfsi_plus_admin_versionerror()
{   
	if(isset($_GET['page']) && $_GET['page'] == "sfsi-plus-options")
	{
		$style = "overflow: hidden; margin:12px 3px 0px;";
	}
	else
	{
		$style = "overflow: hidden;"; 
	}
	$phpVersion = phpVersion();
	if($phpVersion <= '5.4')
	{
		if(get_option("sfsi_premium_serverphpVersionnotification") == "yes")
		{

		?>
         	<style type="text/css">
			.sfsi_plus_show_phperror_notification {
			   	color: #fff;
			   	text-decoration: underline;
			}
			form.sfsi_plus_phperrorNoticeDismiss {
			    display: inline-block;
			    margin: 5px 0 0;
			    vertical-align: middle;
			}
			.sfsi_plus_phperrorNoticeDismiss input[type='submit']
			{
				background-color: transparent;
			    border: medium none;
			    color: #fff;
			    margin: 0;
			    padding: 0;
			    cursor: pointer;
			}
			.sfsi_plus_show_phperror_notification p{line-height: 22px;}
			p.sfsi_plus_show_notifictaionpragraph{padding: 0 !important;}
		</style>
	     <div class="updated sfsi_plus_show_phperror_notification" style="<?php echo $style; ?>background-color: #D22B2F; color: #fff; font-size: 18px;float:left;border-left-color: #D22B2F;">
			<div class="alignleft" style="margin: 9px 0;">
				<p class="sfsi_plus_show_notifictaionpragraph">
					<?php _e( 'We noticed you are running your site on a PHP version older than 5.4. Please upgrade to a more recent version. This is not only important for running the Ultimate Social Media Plugin, but also for security reasons in general.', SFSI_PLUS_DOMAIN); ?>
					<br>
					<?php _e('If you do not know how to do the upgrade, please ask your server team or hosting company to do it for you.', SFSI_PLUS_DOMAIN); ?>
                </p>
		
			</div>
			<div class="alignright">
				<form method="post" class="sfsi_plus_phperrorNoticeDismiss">
					<input type="hidden" name="sfsi-plus_dismiss-phperrorNotice" value="true">
					<input type="submit" name="dismiss" value="Dismiss" />
				</form>
			</div>
		</div>      
            
		<?php
		}
	}

	sfsi_plus_error_reporting_notice();
}	

add_action('admin_init', 'sfsi_plus_dismiss_admin_notice');
function sfsi_plus_dismiss_admin_notice()
{
	if ( isset($_REQUEST['sfsi-plus_dismiss-phperrorNotice']) && $_REQUEST['sfsi-plus_dismiss-phperrorNotice'] == 'true' )
	{
		update_option( 'sfsi_premium_serverphpVersionnotification', "no" );
	}
}


function sfsi_plus_curl_error_notification()
{   
	if(get_option("sfsi_premium_curlErrorNotices") == "yes")
    {   ?>
        <script type="text/javascript">
			jQuery(document).ready(function(e) {
	            jQuery(".sfsi_plus_curlerror_cross").click(function(){
					SFSI.ajax({
						url:ajax_object.ajax_url,
						type:"post",
						data: {action: "sfsiplus_curlerrornotification"},
						success:function(msg){
							if(msg == 'success')
							{
								jQuery(".sfsiplus_curlerror").hide("fast");
							}
						}
					});
				});
	        });
		</script>
        <div class="sfsiplus_curlerror">
        	<?php _e('We noticed that your site returns a cURL error («Error:', SFSI_PLUS_DOMAIN ); ?>
            <?php echo ucfirst(get_option("sfsi_premium_curlErrorMessage")); ?>
            <?php _e('»). This means that it cannot send a notification to SpecificFeeds.com when a new post is published. Therefore this email-feature doesn’t work. However there are several solutions for this, please visit our FAQ to see the solutions («Perceived bugs» => «cURL error messages»): ', SFSI_PLUS_DOMAIN ); ?>

            <a href="https://www.ultimatelysocial.com/faq/" target="_new">
				<?php _e('www.ultimatelysocial.com/faq', SFSI_PLUS_DOMAIN ); ?>
			</a>
           <div class="sfsi_plus_curlerror_cross"><?php _e('Dismiss', SFSI_PLUS_DOMAIN ); ?></div>
        </div>
        <?php 
    } 
}

// ********************************* Link to support forum left of every Save button STARTS *******************************//

function sfsi_premium_ask_for_help($viewNumber){ ?>

    <div class="sfsi_askforhelp askhelpInview<?php echo $viewNumber; ?>">
	
		<img src="<?php echo SFSI_PLUS_PLUGURL."images/questionmark.png"?>"/>
		
		<span><?php  _e( 'Questions?', SFSI_PLUS_DOMAIN); ?> <a target="_blank" href="https://goo.gl/7TuSZX"><b><?php  _e( 'Ask us', SFSI_PLUS_DOMAIN); ?></b></a><?php  _e( ' — we will respond asap!', SFSI_PLUS_DOMAIN); ?></span>

	</div>

<?php }

// ********************************* Link to support forum left of every Save button CLOSES *******************************//

// ********************************* Notice for error reporting STARTS *******************************//

function sfsi_plus_error_reporting_notice(){

    if (is_admin()) : 
        
        $isDismissed   =  get_option('sfsi_plus_error_reporting_notice_dismissed',false);

        $option5 	   = unserialize(get_option('sfsi_premium_section5_options',false));

		$suppress_errors = isset($option5['sfsi_plus_icons_suppress_errors']) && !empty($option5['sfsi_plus_icons_suppress_errors']) ? $option5['sfsi_plus_icons_suppress_errors'] : false;

        if(isset($isDismissed) && false == $isDismissed && defined('WP_DEBUG') && false != WP_DEBUG && "yes"== $suppress_errors)
        { 
        	?>
                    
            <div style="padding: 10px;margin-left: 0px;position: relative;" id="sfsi_plus_error_reporting_notice" class="error notice">

                <p><?php _e('We noticed that you have set error reporting to "yes" in wp-config. Our plugin (Ultimate Social Media PREMIUM) switches this to "off" so that no errors are displayed (which may also impact error messages from your theme or other plugins). If you don\'t want that, please select the respective option under question 6 (at the bottom).', SFSI_PLUS_DOMAIN); ?></p>

                <button type="button" class="sfsi_plus_error_reporting_notice-dismiss notice-dismiss"></button>

            </div>

            <script type="text/javascript">

				if(typeof jQuery != 'undefined'){

				    (function sfsi_plus_dismiss_notice(btnClass,ajaxAction){
				        
				        var btnClass = "."+btnClass;

						var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

				        jQuery(document).on("click", btnClass, function(){
				            
				            jQuery.ajax({
				                url:ajaxurl,
				                type:"post",
				                data:{action: ajaxAction},
				                success:function(e) {
				                    if(false != e){
				                        jQuery(btnClass).parent().remove();
				                    }
				                }
				            });

				        });

				    }("sfsi_plus_error_reporting_notice-dismiss","sfsi_plus_dismiss_error_reporting_notice"));
				}            	
            </script>

        <?php } 

    endif;	
}

function sfsi_plus_dismiss_error_reporting_notice(){
	echo (string) update_option('sfsi_plus_error_reporting_notice_dismissed',true);
	die;
}
add_action( 'wp_ajax_sfsi_plus_dismiss_error_reporting_notice', 'sfsi_plus_dismiss_error_reporting_notice' );
?>