<?php
/**
 * Creates a Features Block Widget which can be placed in sidebar
 *
 * @class       Techmarket_Features_Widget
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
	 * Techmarket Features Block widget class
	 *
	 * @since 1.0.0
	 */
	class Techmarket_Features_Widget extends WP_Widget {

		public $max_entries = 10;

		public function __construct() {
			$widget_ops = array( 'description' => esc_html__( 'Add features block widgets to your sidebar.', 'techmarket' ) );
			parent::__construct( 'techmarket_features_widget', esc_html__( 'Techmarket Features Block', 'techmarket' ), $widget_ops );

			add_action( 'admin_enqueue_scripts', array( $this, 'widget_scripts' ) );
		}

		public function widget_scripts() {
			global $techmarket_version;
		
			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

			wp_register_script( 'techmarket-admin-features-widget', get_template_directory_uri() . '/assets/js/admin/features-widget' . $suffix . '.js', array( 'jquery' ), $techmarket_version );
		}

		public function widget($args, $instance) {
			
			$features = array();
			for( $i =0; $i<$this->max_entries; $i++ ) {
				if( isset( $instance['block-' . $i] ) && $instance['block-' . $i] != "" ) {
					$icon_class = isset( $instance['icon_class-' . $i] ) ? $instance['icon_class-' . $i] : '';
					$feature = isset( $instance['feature-' . $i] ) ? $instance['feature-' . $i] : '';

					$features[] = array(
						'icon'		=> $icon_class,
						'label'		=> $feature
					);
				}
			}

			$atts =  array(
				'features' 		=> $features,
			);

			echo wp_kses_post( $args['before_widget'] );
			if( function_exists( 'techmarket_features_list' ) ) {
				techmarket_features_list( $atts );
			}
			echo wp_kses_post( $args['after_widget'] );
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			for( $i =0; $i<$this->max_entries; $i++ ) {
				if( $new_instance['block-' . $i] == 0 || $new_instance['block-' . $i] == "" ) {
					$instance['block-' . $i] = $new_instance['block-' . $i];
					if ( ! empty( $new_instance['icon_class-' . $i] ) ) {
						$instance['icon_class-' . $i] = strip_tags( stripslashes($new_instance['icon_class-' . $i]) );
					}
					if ( ! empty( $new_instance['feature-' . $i] ) ) {
						$instance['feature-' . $i] = $new_instance['feature-' . $i];
					}
				} else {
					$count = $new_instance['block-' . $i] - 1;
					$instance['block-' . $count] = $new_instance['block-' . $i];
					if ( ! empty( $new_instance['icon_class-' . $i] ) ) {
						$instance['icon_class-' . $count] = strip_tags( stripslashes($new_instance['icon_class-' . $i]) );
					}
					if ( ! empty( $new_instance['feature-' . $i] ) ) {
						$instance['feature-' . $count] = $new_instance['feature-' . $i];
					}
				}
			}
			return $instance;
		}

		public function form( $instance ) {
			global $wp_registered_sidebars;

			// If no sidebars exists.
			if ( !$wp_registered_sidebars ) {
				echo '<p>'. esc_html__('No sidebars are available.', 'techmarket' ) .'</p>';
				return;
			}

			$element_id = 'widget-features-block-container-' . uniqid();
			?>
			<div id="<?php echo esc_attr( $element_id ); ?>" class="widget-features-block-container" data-max_entries="<?php echo esc_attr( $this->max_entries ); ?>">
				<div class="widget-features-block-input-containers">
					<?php
					for( $i =0; $i<$this->max_entries; $i++ ) {
						$block = isset( $instance['block-' . $i] ) ? $instance['block-' . $i] : '';
						$icon_class = isset( $instance['icon_class-' . $i] ) ? $instance['icon_class-' . $i] : '';
						$feature = isset( $instance['feature-' . $i] ) ? $instance['feature-' . $i] : '';
						$el_class = isset( $instance['el_class-' . $i] ) ? $instance['el_class-' . $i] : '';
						
						$display = '';
						if( ! isset($instance['block-' . $i]) || ($instance['block-' . $i] == "") ) {
							$display = 'style="display:none;"';
							unset($instance);
						}
						?>
						<div id="features-input-block-<?php echo esc_attr( $i+1 ); ?>" class="features-input-block" <?php echo ( $display ); ?>>
							<h3 class="entry-title"><?php echo esc_html__( 'Block', 'techmarket' ); ?></h3>
							<div class="entry-desc">
								<input id="<?php echo esc_attr( $this->get_field_id('block-' . $i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('block-' . $i ) ); ?>" type="hidden" value="<?php echo esc_attr( $block ); ?>">
								<p>
									<label for="<?php echo esc_attr( $this->get_field_id('icon_class-' . $i) ); ?>"><?php esc_html_e( 'Icon Class:', 'techmarket' ) ?></label>
									<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('icon_class-' . $i) ); ?>" name="<?php echo esc_attr( $this->get_field_name('icon_class-' . $i) ); ?>" value="<?php echo esc_attr( $icon_class ); ?>" />
								</p>
								<p>
									<label for="<?php echo esc_attr( $this->get_field_id('feature-' . $i) ); ?>"><?php esc_html_e( 'Feature:', 'techmarket' ) ?></label>
									<textarea rows="1" cols="28" id="<?php echo esc_attr( $this->get_field_id('feature-' . $i) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name('feature-' . $i) ); ?>"><?php echo wp_kses_post( $feature ); ?></textarea>
								</p>
								<p><a href="#"><span class="delete-block"><?php esc_html_e( 'Delete', 'techmarket' ) ?></span></a></p>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<div class="message"><p><?php echo esc_html__( 'Reached the maximum block. Cannot add more block.', 'techmarket' ) ?></p></div>
				<div class="add-new-block" style="display:none;"><?php echo esc_html__( 'Add New Block', 'techmarket' ) ?></div>
			</div>
			<?php wp_enqueue_script( 'techmarket-admin-features-widget' ); ?>
			<?php
		}
	}
endif;