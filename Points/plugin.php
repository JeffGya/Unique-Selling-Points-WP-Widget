<?php
/*
 * This plugin/widget is based of the WPbeginner custom widget tutorial: http://www.wpbeginner.com/wp-tutorials/how-to-create-a-custom-wordpress-widget/
 * 
 * @package   point_widget
 * @author    Jeffrey Gyamfi <Jeffrey@jgyamfi.nl>
 * @link      jgyamfi.nl
 *
 * @wordpress-plugin
 * Plugin Name:       Points
 * Plugin URI:        #
 * Description:       Unique selling points & customer service widget.  
 * Version:           1.0.0
 * Author:            Jeffrey Gyamfi
 * Author URI:        jgyamfi.nl
 * Text Domain:       point_widget
 * GitHub Plugin URI: https://github.com/JeffGya/Unique-Selling-Points-WP-Widget
*/

/* Start Adding Functions Below this Line */

// Creating the widget 
class point_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'point_widget', 

		// Widget name will appear in UI
		__('Points', 'point_widget_domain'), 

		// Widget description
		array( 'description' => __( 'Unique selling points widget', 'point_widget_domain' ), ) 
		);

		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {

		$sellingpoint1 = apply_filters('widget_sellingpoint', $instance['sellingpoint1'] );
		$sellingpoint2 = apply_filters('widget_sellingpoint', $instance['sellingpoint2'] );
		$sellingpoint3 = apply_filters('widget_sellingpoint', $instance['sellingpoint3'] );
		$sellingpoint4 = apply_filters('widget_sellingpoint', $instance['sellingpoint4'] );
		$sellingpoint5 = apply_filters('widget_sellingpoint', $instance['sellingpoint5'] );
		$sellingpoint6 = apply_filters('widget_sellingpoint', $instance['sellingpoint6'] );
		$number = apply_filters('widget_number', $instance['number'] );
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

			// This is where you run the code and display the output
		?> 

		<div id="sellingPoints">
			<div id="points">
				<ul>
					<li class="<?php if ( empty( $sellingpoint1 ) ) echo 'no-display' ?>" ><p><img src="<?php echo plugins_url( 'points/images/glyphicons_206_ok_2.png');?>" alt="checkmark"><?php echo $sellingpoint1 ?></p></li>
					<li class="<?php if ( empty( $sellingpoint2 ) ) echo 'no-display' ?>" ><p><img src="<?php echo plugins_url( 'points/images/glyphicons_206_ok_2.png');?>" alt="checkmark"><?php echo $sellingpoint2 ?></p></li>
					<li class="<?php if ( empty( $sellingpoint3 ) ) echo 'no-display' ?>" ><p><img src="<?php echo plugins_url( 'points/images/glyphicons_206_ok_2.png');?>" alt="checkmark"><?php echo $sellingpoint3 ?></p></li>
					<li class="<?php if ( empty( $sellingpoint4 ) ) echo 'no-display' ?>" ><p><img src="<?php echo plugins_url( 'points/images/glyphicons_206_ok_2.png');?>" alt="checkmark"><?php echo $sellingpoint4 ?></p></li>
					<li class="<?php if ( empty( $sellingpoint5 ) ) echo 'no-display' ?>" ><p><img src="<?php echo plugins_url( 'points/images/glyphicons_206_ok_2.png');?>" alt="checkmark"><?php echo $sellingpoint5 ?></p></li>
					<li class="<?php if ( empty( $sellingpoint6 ) ) echo 'no-display' ?>" ><p><img src="<?php echo plugins_url( 'points/images/glyphicons_206_ok_2.png');?>" alt="checkmark"><?php echo $sellingpoint6 ?></p></li>
				</ul>
			</div>
			<div class="<?php if ( empty( $number ) ) echo 'no-display' ?>" id="serviceContact">
				<p>Klantenservice:</p>
				<p id="number"><?php echo $number ?></p>
			</div>
		</div>
	 	
	 	<?php
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {

		( isset( $instance[ 'sellingpoint1'] ) ) ? $sellingpoint1 = $instance['sellingpoint1'] : $sellingpoint1 = __( 'Alle leveranciers', 'point_widget_domain' );
		( isset( $instance[ 'sellingpoint2'] ) ) ? $sellingpoint2 = $instance['sellingpoint2'] : $sellingpoint2 = __( 'Beste aanbiedingen', 'point_widget_domain' );
		( isset( $instance[ 'sellingpoint3'] ) ) ? $sellingpoint3 = $instance['sellingpoint3'] : $sellingpoint3 = __( '100% onafhankelijk', 'point_widget_domain' );
		( isset( $instance[ 'sellingpoint4'] ) ) ? $sellingpoint4 = $instance['sellingpoint4'] : $sellingpoint4 = __( 'Nooit zonder gas en licht', 'point_widget_domain' );
		( isset( $instance[ 'sellingpoint5'] ) ) ? $sellingpoint5 = $instance['sellingpoint5'] : $sellingpoint5 = __( 'Bespaar tot €434', 'point_widget_domain' );
		( isset( $instance[ 'sellingpoint6'] ) ) ? $sellingpoint6 = $instance['sellingpoint6'] : $sellingpoint6 = __( '14 dagen bedenktijd', 'point_widget_domain' );
		( isset( $instance[ 'number'] ) ) ? $number = $instance['number'] : $number = __( '020 – 531 76 70', 'point_widget_domain' );

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'sellingpoint1' ); ?>"><?php _e( 'Selling Point 1:' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'sellingpoint1' ); ?>" name="<?php echo $this->get_field_name( 'sellingpoint1' ); ?>" type="text" value="<?php echo esc_attr( $sellingpoint1 ); ?>" />
			<br />
			<label for="<?php echo $this->get_field_id( 'sellingpoint2' ); ?>"><?php _e( 'Selling Point 2:' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'sellingpoint1' ); ?>" name="<?php echo $this->get_field_name( 'sellingpoint2' ); ?>" type="text" value="<?php echo esc_attr( $sellingpoint2 ); ?>" />
			<br />
			<label for="<?php echo $this->get_field_id( 'sellingpoint3' ); ?>"><?php _e( 'Selling Point 3:' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'sellingpoint3' ); ?>" name="<?php echo $this->get_field_name( 'sellingpoint3' ); ?>" type="text" value="<?php echo esc_attr( $sellingpoint3 ); ?>" />
			<br />
			<label for="<?php echo $this->get_field_id( 'sellingpoint4' ); ?>"><?php _e( 'Selling Point 4:' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'sellingpoint4' ); ?>" name="<?php echo $this->get_field_name( 'sellingpoint4' ); ?>" type="text" value="<?php echo esc_attr( $sellingpoint4 ); ?>" />
			<br />
			<label for="<?php echo $this->get_field_id( 'sellingpoint5' ); ?>"><?php _e( 'Selling Point 5:' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'sellingpoint5' ); ?>" name="<?php echo $this->get_field_name( 'sellingpoint5' ); ?>" type="text" value="<?php echo esc_attr( $sellingpoint5 ); ?>" />
			<br />
			<label for="<?php echo $this->get_field_id( 'sellingpoint6' ); ?>"><?php _e( 'Selling Point 6:' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'sellingpoint6' ); ?>" name="<?php echo $this->get_field_name( 'sellingpoint6' ); ?>" type="text" value="<?php echo esc_attr( $sellingpoint6 ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Customer Service Number:' ); ?></label> 
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="tel" value="<?php echo esc_attr( $number ); ?>" />
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
			$instance['sellingpoint1'] = ( ! empty( $new_instance['sellingpoint1'] ) ) ? strip_tags( $new_instance['sellingpoint1'] ) : '';
			$instance['sellingpoint2'] = ( ! empty( $new_instance['sellingpoint2'] ) ) ? strip_tags( $new_instance['sellingpoint2'] ) : '';
			$instance['sellingpoint3'] = ( ! empty( $new_instance['sellingpoint3'] ) ) ? strip_tags( $new_instance['sellingpoint3'] ) : '';
			$instance['sellingpoint4'] = ( ! empty( $new_instance['sellingpoint4'] ) ) ? strip_tags( $new_instance['sellingpoint4'] ) : '';
			$instance['sellingpoint5'] = ( ! empty( $new_instance['sellingpoint5'] ) ) ? strip_tags( $new_instance['sellingpoint5'] ) : '';
			$instance['sellingpoint6'] = ( ! empty( $new_instance['sellingpoint6'] ) ) ? strip_tags( $new_instance['sellingpoint6'] ) : '';
			$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? strip_tags( $new_instance['number'] ) : '';
		return $instance;
	}

	public function register_widget_styles() {

		wp_enqueue_style( 'widget-styles', plugins_url( 'css/widget.css', __FILE__ ) );

	} // end register_widget_styles

} // Class point_widget ends here


// Register and load the widget
function wpb_load_widget() {
	register_widget( 'point_widget' );
}

add_action( 'widgets_init', 'wpb_load_widget' );

/* Stop Adding Functions Below this Line */
?>

