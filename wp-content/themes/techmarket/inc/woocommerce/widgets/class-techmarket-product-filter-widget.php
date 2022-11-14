<?php
/**
 * Creates a Products Filter Widget which can be placed in sidebar
 *
 * @class       Techmarket_Products_Filter_Widget
 * @version     1.0.0
 * @package     Widgets
 * @category    Class
 * @author      Transvelo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if( class_exists( 'WP_Widget' ) ) :
	/**
	 * Techmarket Products Filter widget class
	 *
	 * @since 1.0.0
	 */
	 class Techmarket_Products_Filter_Widget extends WP_Widget {

		public function __construct() {
			$widget_ops = array( 'description' => esc_html__( 'Add products filter sidebar widgets to your sidebar.', 'techmarket' ) );
			parent::__construct( 'techmarket_products_filter', esc_html__( 'Techmarket Product Filter', 'techmarket' ), $widget_ops );
		}

		public function widget($args, $instance) {

			global $techmarket_version;

			if ( ! woocommerce_products_will_display() ) {
				return;
			}
			
			wp_enqueue_script( 'hidemaxlistitem-js', get_template_directory_uri() . '/assets/js/hidemaxlistitem.min.js', array( 'jquery' ), $techmarket_version, true );

			$instance['title'] = apply_filters( 'techmarket_products_filter_widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			echo wp_kses_post( $args['before_widget'] );

			if ( ! empty($instance['title']) )
				echo wp_kses_post( $args['before_title'] . $instance['title'] . $args['after_title'] );

			if ( ! is_active_sidebar( 'product-filters-1' ) ) {
				if ( function_exists( 'techmarket_default_product_filter_widgets' ) ) {
					techmarket_default_product_filter_widgets();
				}
			} else {
				dynamic_sidebar( 'product-filters-1' );
			}

			if( apply_filters( 'techmarket_products_filter_widget_hidemaxlistitem', true ) ) {
				ob_start(); ?>
				jQuery( document ).ready( function(){
					jQuery('.widget_techmarket_products_filter .widget .widget-title + ul').hideMaxListItems({
						'max': 5,
						'speed': 500,
						'moreText': "<?php echo esc_attr( esc_html__( '+ Show more', 'techmarket' ) ); ?>",
						'lessText': "<?php echo esc_attr( esc_html__( '- Show less', 'techmarket' ) ); ?>",
					});
					if( jQuery('.widget_techmarket_products_filter > .widget').length == 0 ) {
						jQuery('.widget_techmarket_products_filter').hide();
					}
				} );
				<?php
				$custom_script = ob_get_clean();
				wp_add_inline_script( 'techmarket-scripts', $custom_script );
			}

			echo wp_kses_post( $args['after_widget'] );
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			if ( ! empty( $new_instance['title'] ) ) {
				$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
			}
			return $instance;
		}

		public function form( $instance ) {
			global $wp_registered_sidebars;

			$title = isset( $instance['title'] ) ? $instance['title'] : '';

			// If no sidebars exists.
			if ( !$wp_registered_sidebars ) {
				echo '<p>'. esc_html__('No sidebars are available.', 'techmarket' ) .'</p>';
				return;
			}
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:', 'techmarket' ) ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php
		}
	}
endif;