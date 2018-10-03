<?php
if ( ! class_exists( 'License_Page') ) {

	class License_Page {
	 
	 public function __construct(){

		add_action('admin_head',array($this,'script'));
        	add_action( 'wp_ajax_changeLicenseForm', array($this,'change_license_form')); 
	 }

	 public function change_license_form(){

		$license_api_name = sanitize_text_field($_POST['license_api_name']);

		if(isset($license_api_name) && !empty($license_api_name)){
			set_site_transient( 'update_plugins', null );
			update_option('sfsi_active_license_api_name',$license_api_name);			
		}

		echo $this->form();
	 	wp_die();
	 }

	 public function script(){ ?>

	 	<style type="text/css">
	 		.license_api_name{ margin: 0px 40px 0px 0px; }
	 		.license_api_containter{ margin: 12px 0 10px 0px;float: left;width: 100%;}
	 		.license_api_containter input[type="radio"] {    float: left; margin-top: 1px;}
			.license_api_name {margin: 0px 40px 0px 6px;float: left;font-size: 15px;width: 157px;}
			#loader {width: 30%;display: none;position: absolute;top: 103px;left: -8px;background: url(<?php echo SFSI_PLUS_PLUGURL.'images/ajax-loader.gif';?>) no-repeat 40% #f9f9f9;padding: 71px 15px 40px 80px;opacity: 0.9;}	 			
	 	</style>

	 	<script type="text/javascript">

	 		jQuery(document).ready(function(){
	 			
	 			jQuery('.license_api_name').on("click",function(){
	 				jQuery(this).prev().trigger("change");
	 				jQuery(this).prev().attr("checked",true);
	 			});

	 			jQuery('input[type=radio][name=license_api_name]').on("change",function(){
	 				
	 				var error  = jQuery("#licenseFormContainer").parent().find(".error");
	 				var notice = jQuery("#licenseFormContainer").parent().find(".notice");

	 				if(typeof error != "undefined"){
	 					error.remove();
	 				} 				

	 				if(typeof notice != "undefined"){
	 					notice.remove();
	 				} 				

					var license_api_name = jQuery.trim(jQuery(this).val());

					var data = {'action': 'changeLicenseForm','license_api_name': license_api_name};

					jQuery.ajax({
					    type: "POST",
					    url: ajaxurl,
					    data: data,
					    timeout: 20000,
					    beforeSend: function() { 
					      jQuery("#loader").show();
					    },
					    success:function(response){
					    	jQuery("#loader").hide();
							jQuery("#licenseFormContainer").html(response);
					    },
					    error:function(response){
					    	window.location.reload();
					    }
					  });

	 			});

				jQuery("#license_form").on("submit",function(event) {

				  var licensing_setting_name = jQuery("input[name=option_page]").val();
				  var licensekey = jQuery.trim(jQuery("#"+licensing_setting_name+"_key").val());

				  if(licensekey.length == 0){
				  	alert( "Please enter license key");
				  	jQuery("#"+licensing_setting_name+"_key").focus();
				  	event.preventDefault();				  	
				  }

					jQuery('input[type=radio][name=license_api_name]').on("change",function(ev){
				        revent.preventDefault();	
				    });
				});
	 		});

	 	</script>

	 <?php }

	 public function render(){  

	 	?>
	 
	 	<div class='wrap'>

	 		<h2><?php _e('Please enter your license key'); ?></h2>

			<?php $license_api = get_sfsi_active_license_api_name();?>


	 		<div class="license_api_containter"> 
	 			<input type="radio" <?php echo strtolower($license_api) == "sellcodes_usm" ? "checked=true" : "" ?> name="license_api_name" value="sellcodes_usm"><label class="license_api_name" for="license_api_name">Sellcodes</label>
	 			<input type="radio" <?php echo strtolower($license_api) == "ultimate" ? "checked=true" : "" ?> name="license_api_name" value="ultimate"><label class="license_api_name" for="license_api_name">Ultimatelysocial</label>	 			
	 		</div>

			<div id="loader"></div>	 		
	 		<div id="licenseFormContainer"><?php $this->form();?></div>

	 	</div>
	 
	 <?php }

	 public function form() {

		$license_api_name = get_sfsi_active_license_api_name();
		$license 		  = get_option($license_api_name.'_license_key');
		$status  		  = get_option($license_api_name.'_license_status');		
		
		?>
		
			<form method="post" action="options.php" id="license_form">
			<?php settings_fields($license_api_name.'_license'); ?>

				<table class="form-table">
					<tbody>
						<tr valign="top">
							<th scope="row" valign="top">
								<?php _e('License Key'); ?>
							</th>
							<td>
								<input required id="<?php echo $license_api_name; ?>_license_key" name="<?php echo $license_api_name; ?>_license_key" type="text" class="regular-text" 
	                            	value="<?php esc_attr_e( $license ); ?>" />
							</td>
						</tr>
					</tbody>
				</table>
				
				<?php //submit_button("Check license key"); ?>
	            
	            <table class="form-table">
	            	
	            	<?php if( false !== $license ) { ?>
	                    
	                    <tr valign="middle">
	                        <th scope="row">
	                            <?php _e('Activate License'); ?>
	                        </th>
	                        <td>
	                            <?php if( $status !== false && $status == 'valid' ) { ?>
	                            
	                                <span style="color:green; vertical-align:middle"><?php _e('Active'); ?></span>
	                                
	                                <?php wp_nonce_field( $license_api_name.'_nonce', $license_api_name.'_nonce' ); ?>
	                                <input type="submit" class="button-secondary" name="<?php echo $license_api_name; ?>_license_deactivate" 
	                                    value="<?php _e('Deactivate License'); ?>"/>
	                            
								<?php } else { ?>
	                                
									<?php wp_nonce_field( $license_api_name.'_nonce', $license_api_name.'_nonce' ); ?>

	                                <input type="submit" class="button-secondary" name="<?php echo $license_api_name;?>_license_activate" 
	                                    value="<?php _e('Activate License'); ?>"/>
	                            
								<?php } ?>
	                        </td>
	                    </tr>

	                <?php } else { ?>
	                	
	                    <tr valign="top">
	                        <th scope="row">
	                            <?php _e('Activate License'); ?>
	                        </th>
	                        <td>
	                            <?php wp_nonce_field( $license_api_name.'_nonce', $license_api_name.'_nonce' ); ?>
	                            <input type="submit" class="button-secondary" name="<?php echo $license_api_name; ?>_license_activate" value="<?php _e('Activate License'); ?>"/>
	                        </td>
	                    </tr>
	                    
					<?php } ?>
	            </table>
			</form>
		
		<?php

	    }
	}
}