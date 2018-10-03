<?php
//Add Subscriber form css
// Creating the widget 
class sfsiPlus_subscriber_widget extends WP_Widget {

	function __construct()
	{
		parent::__construct(
			// Base ID of your widget
			'sfsiPlus_subscriber_widget', 
	
			// Widget name will appear in UI
			'Ultimate Premium Subscribe Form', 
	
			// Widget description
			array( 'description' => 'Ultimate Social Plus Subscribe Form') 
		);
	}

	public function widget( $args, $instance )
	{
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		if ( ! empty( $title ) )
		{
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// Call subscriber form
		echo do_shortcode("[USM_plus_form]");
		
		echo $args['after_widget'];
	}
		
	// Widget Backend 
	public function form( $instance )
	{
		if ( isset( $instance[ 'title' ] ))
		{
			$title = $instance[ 'title' ];
		}
		else
		{
			$title = '';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?>:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $newInstance, $oldInstance )
	{
		$instance = array();
		$instance['title'] = ( ! empty( $newInstance['title'] ) ) ? strip_tags( $newInstance['title'] ) : '';
		return $instance;
	}
}
// Class wpb_widget ends here

// Register and load the widget
function sfsiPlus_subscriber_load_widget()
{
	if(false!= License_Manager::validate_license()){
		register_widget('sfsiPlus_subscriber_widget');
	}
}
add_action( 'widgets_init', 'sfsiPlus_subscriber_load_widget' );

add_shortcode("USM_plus_form", "sfsi_plus_get_subscriberForm");
function sfsi_plus_get_subscriberForm()
{
	if(false!= License_Manager::validate_license()){
		
		$option9 			= unserialize(get_option('sfsi_premium_section9_options',false));
		$sfsi_plus_feediid 	= sanitize_text_field(get_option('sfsi_premium_feed_id'));
		$url = "https://www.specificfeeds.com/widgets/subscribeWidget/";

		$privacyNotice = '';
		
		$privacytxt   = $option9['sfsi_plus_form_privacynotice_text'];
		
		preg_match_all('/{(.*?)}/', $privacytxt, $matches);

		if(isset($matches[1]) && !empty($matches[1]) && is_array($matches[1])){

			$arr = $matches[1];

			$arr = array_chunk($arr, 2);

			foreach ($arr as $key => $value) {

				$linkTxt  = $value[0];
				$linkHref = $value[1];

				$linkStr  = '<a target="_blank" style="box-shadow: 0 1px 0 0 currentColor;" href="'.$linkHref.'">'.$linkTxt.'</a>';

				$privacytxt = sfsi_strpos_all($privacytxt,'{'.$linkTxt.'}',$linkStr);
				$privacytxt = str_replace('{'.$linkHref.'}', '', $privacytxt);				
			}

		}

		$keyA  ='sfsi_plus_form_privacynotice_fontalign';
		$align = isset($option9[$keyA]) && !empty($option9[$keyA]) ? $option9[$keyA] : '';

		$keyC  ='sfsi_plus_form_privacynotice_fontcolor';
		$color = isset($option9[$keyC]) && !empty($option9[$keyC]) ? $option9[$keyC] : '';

		$keyS  ='sfsi_plus_form_privacynotice_fontsize';
		$size = isset($option9[$keyS]) && !empty($option9[$keyS]) ? $option9[$keyS] : '';

		$keyD  ='sfsi_plus_shall_display_privacy_notice';
		$disp  = isset($option9[$keyD]) && !empty($option9[$keyD]) ? $option9[$keyD] : '';

		$style = 'style="text-align: '.$align.'; color: '.$color.'; font-size: '.$size.'px;"';

		if("yes" == $disp){
			$privacyNotice = '<div class="sfsi_plus_subscription_form_field">
    			<div class="sfsi_plus_privacy_notice" '.$style.'>'.$privacytxt.'</div>
			</div>';				
		}

		$return = '';
		$url    = $url.$sfsi_plus_feediid.'/8/';	
		$return .= '<div class="sfsi_plus_subscribe_Popinner">
						<form method="post" onsubmit="return sfsi_plus_processfurther(this);" target="popupwindow" action="'.$url.'">
							<h5>'.trim($option9['sfsi_plus_form_heading_text']).'</h5>
							<div class="sfsi_plus_subscription_form_field">
								<input type="email" name="data[Widget][email]" value="" placeholder="'.trim($option9['sfsi_plus_form_field_text']).'"/>
							</div>
							<div class="sfsi_plus_subscription_form_field">
								<input type="hidden" name="data[Widget][feed_id]" value="'.$sfsi_plus_feediid.'">
								<input type="hidden" name="data[Widget][feedtype]" value="8">
								<input type="submit" name="subscribe" value="'.$option9['sfsi_plus_form_button_text'].'" />
							</div>
							'.$privacyNotice.'						
						</form>
					</div>';
		return $return;
	}
}
?>