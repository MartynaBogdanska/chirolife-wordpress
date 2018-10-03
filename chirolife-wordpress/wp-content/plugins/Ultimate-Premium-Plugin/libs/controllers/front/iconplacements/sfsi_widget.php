<?php 
/* create SFSI widget */
class Sfsi_Plus_Widget extends WP_Widget
{
	function __construct()
	{
        $widget_ops = array( 'classname' => 'sfsi_plus sfsi_plus_widget_main_container', 'description' => 'Ultimate Social Media PLUS widgets');
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sfsi-plus-widget' );
        
		parent::__construct(
			// Base ID of your widget
			'sfsi-plus-widget', 
	
			// Widget name will appear in UI
			'Ultimate Premium', 
	
			// Widget description
			$widget_ops,
			
			$control_ops
		);
	}
	
	function widget( $args, $instance )
	{
		if(sfsi_plus_shall_show_icons() && sfsi_premium_is_any_standard_icon_selected() )
		{
			extract( $args );
			
			//if show via widget is checked
			$sfsi_premium_section8_options = get_option("sfsi_premium_section8_options");
			$sfsi_premium_section8_options = unserialize($sfsi_premium_section8_options);

			$sfsi_plus_show_via_widget = $sfsi_premium_section8_options['sfsi_plus_show_via_widget'];
			
			if($sfsi_plus_show_via_widget == "yes")
			{
				/*Our variables from the widget settings. */
				$title     = isset($instance['title']) ? apply_filters('widget_title', $instance['title'] ) : '';
				$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;
				global $is_floter;	      
				
				echo $before_widget;

				/* Display the widget title */
				if ( $title ) echo $before_title . $title . $after_title;				
				?>
					<div class="sfsi_plus_widget sfsi_plus_widget_sub_container" data-position="widget">

						<div id='sfsi_plus_wDiv'></div>
							<?php 
								/* Link the main icons function */
								if (wp_is_mobile())
								{
									if(isset($sfsi_premium_section8_options['sfsi_plus_widget_show_on_mobile']) && $sfsi_premium_section8_options['sfsi_plus_widget_show_on_mobile'] == 'yes')
									{
										echo sfsi_plus_check_mobile_visiblity(0);
									}
								}
								else
								{
									if(isset($sfsi_premium_section8_options['sfsi_plus_widget_show_on_desktop']) && $sfsi_premium_section8_options['sfsi_plus_widget_show_on_desktop'] == 'yes')
									{
										echo sfsi_plus_check_visiblity(0);
									}
								} 
							?>
						<div style="clear: both;"></div>
					</div>
					<?php
				
				if ( is_active_widget( false, false, $this->id_base, true ) ) { }
				echo $after_widget;
			}
			else
			{
				//echo 'Kindly go to setting page and check the option "show them via a widget"';
			}
		}
	}
	
	/*Update the widget */ 
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		if($new_instance['showf']==0)
		{
		    $instance['showf']=1;
		}
		else
		{
		     $instance['showf']=0;
		}
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	
	/* Set up some default widget settings. */
	function form( $instance )
	{
		$defaults = array( 'title' =>"" );
		$instance = wp_parse_args( (array) $instance, $defaults );

		if(isset($instance['showf']))
		{
			if( $instance['showf'] == 0 && empty($instance['title']))
			{
				$instance['title']='Please follow & like us :)';
			}
			else
			{
				$instance['title'];
			}
		}
		else
		{
			$instance['title']='Please follow & like us :)';
		}
		?>
		<p>
		    <label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e('Title', SFSI_PLUS_DOMAIN); ?>:
            </label>
		    <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		    <input type="hidden" value="<?php echo isset($instance['showf']) && !empty($instance['showf']) ? $instance['showf'] : ''; ?>" id="<?php echo $this->get_field_id( 'showf' ); ?>" name="<?php echo $this->get_field_name( 'showf' ); ?>" />
		</p>
		<p>
			<?php	_e('Please go to the plugin page to set your preferences:',SFSI_PLUS_DOMAIN); ?>
			<a href="admin.php?page=sfsi-plus-options"><?php _e('Click here', SFSI_PLUS_DOMAIN); ?></a>
		</p>
	<?php
	}
}
/* END OF widget Class */

/* register widget to wordpress */
function register_sfsi_plus_widgets()
{
	if(false!= License_Manager::validate_license()){
    	register_widget( 'sfsi_plus_widget' );		
	}
}
add_action( 'widgets_init', 'register_sfsi_plus_widgets' );
?>