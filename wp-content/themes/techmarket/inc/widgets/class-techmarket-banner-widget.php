<?php
/**
 * Creates a Banner Widget which can be placed in sidebar
 *
 * @class       Techmarket_Banner_Widget
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
	 * Techmarket Banner Widget class
	 *
	 * @since 1.0.0
	 */
	class Techmarket_Banner_Widget extends WP_Widget {

		public function __construct() {
			$widget_ops = array( 'description' => esc_html__( 'Add banner widget to your sidebar.', 'techmarket' ) );
			parent::__construct( 'techmarket_banner_widget', esc_html__( 'Techmarket Banner', 'techmarket' ), $widget_ops );
		}

		public function widget($args, $instance) {

			$pre_title = isset( $instance['pre_title'] ) ? $instance['pre_title'] : '';
			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			$sub_title = isset( $instance['sub_title'] ) ? $instance['sub_title'] : '';
			$action_link = isset( $instance['action_link'] ) ? $instance['action_link'] : '';
			$action_text = isset( $instance['action_text'] ) ? $instance['action_text'] : '';
			$bg_image = isset( $instance['bg_image'] ) && intval( $instance['bg_image'] ) ? wp_get_attachment_image_src( $instance['bg_image'], 'full' ) : array( '//placehold.it/260x209', '260', '209' );
			$price = isset( $instance['price'] ) ? $instance['price'] : '';
			$section_class = isset( $instance['section_class'] ) ? $instance['section_class'] : '';

			$atts = apply_filters( 'techmarket_banner_widget_args', array(
				'section_class'	=> $section_class,
				'pre_title'		=> $pre_title,
				'title'			=> $title,
				'sub_title'		=> $sub_title,
				'action_link'	=> $action_link,
				'action_text'	=> $action_text,
				'bg_image'		=> $bg_image,
				'price'			=> $price,
				'bg_choice'		=> 'image'
			) );
			
			echo wp_kses_post( $args['before_widget'] );
			if( function_exists( 'techmarket_banner' ) ) {
				techmarket_banner( $atts );
			}
			echo wp_kses_post( $args['after_widget'] );
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			if ( ! empty( $new_instance['pre_title'] ) ) {
				$instance['pre_title'] = $new_instance['pre_title'];
			}
			if ( ! empty( $new_instance['title'] ) ) {
				$instance['title'] = $new_instance['title'];
			}
			if ( ! empty( $new_instance['sub_title'] ) ) {
				$instance['sub_title'] = $new_instance['sub_title'];
			}
			if ( ! empty( $new_instance['action_link'] ) ) {
				$instance['action_link'] = strip_tags( stripslashes($new_instance['action_link']) );
			}
			if ( ! empty( $new_instance['action_text'] ) ) {
				$instance['action_text'] = strip_tags( stripslashes($new_instance['action_text']) );
			}
			if ( ! empty( $new_instance['bg_image'] ) ) {
				$instance['bg_image'] = strip_tags( stripslashes($new_instance['bg_image']) );
			}
			if ( ! empty( $new_instance['price'] ) ) {
				$instance['price'] = $new_instance['price'];
			}
			if ( ! empty( $new_instance['section_class'] ) ) {
				$instance['section_class'] = strip_tags( stripslashes($new_instance['section_class']) );
			}
			return $instance;
		}

		public function form( $instance ) {
			global $wp_registered_sidebars;

			$pre_title = isset( $instance['pre_title'] ) ? $instance['pre_title'] : '';
			$sub_title = isset( $instance['sub_title'] ) ? $instance['sub_title'] : '';
			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			$action_link = isset( $instance['action_link'] ) ? $instance['action_link'] : '';
			$action_text = isset( $instance['action_text'] ) ? $instance['action_text'] : '';
			$bg_image = isset( $instance['bg_image'] ) ? $instance['bg_image'] : '';
			$price = isset( $instance['price'] ) ? $instance['price'] : '';
			$section_class = isset( $instance['section_class'] ) ? $instance['section_class'] : '';

			// If no sidebars exists.
			if ( !$wp_registered_sidebars ) {
				echo '<p>'. esc_html__('No sidebars are available.', 'techmarket' ) .'</p>';
				return;
			}
			wp_enqueue_script( 'techmarket-admin-meta-boxes' );
			?>
			<div class="options_group">
				<div class="product-options">
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('pre_title') ); ?>"><?php esc_html_e( 'Pre Title:', 'techmarket' ) ?></label>
						<textarea rows="1" cols="28" id="<?php echo esc_attr( $this->get_field_id('pre_title') ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name('pre_title') ); ?>"><?php echo wp_kses_post( $pre_title ); ?></textarea>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:', 'techmarket' ) ?></label>
						<textarea rows="1" cols="28" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>"><?php echo wp_kses_post( $title ); ?></textarea>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('sub_title') ); ?>"><?php esc_html_e( 'Sub Title:', 'techmarket' ) ?></label>
						<textarea rows="1" cols="28" id="<?php echo esc_attr( $this->get_field_id('sub_title') ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name('sub_title') ); ?>"><?php echo wp_kses_post( $sub_title ); ?></textarea>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('action_link') ); ?>"><?php esc_html_e( 'Link:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('action_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('action_link') ); ?>" value="<?php echo esc_attr( $action_link ); ?>" />
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('action_text') ); ?>"><?php esc_html_e( 'Button Text:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('action_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('action_text') ); ?>" value="<?php echo esc_attr( $action_text ); ?>" />
					</p>
					<p id="<?php echo esc_attr( $this->get_field_id( 'bg_image' ) ); ?>_field" class="form-field media-option">
						<label for="<?php echo esc_attr( $this->get_field_name( 'bg_image' ) ); ?>"><?php esc_html_e( 'Image:', 'techmarket' ); ?></label>
						<?php $img_src = absint( $bg_image ) ? wp_get_attachment_thumb_url( $bg_image ) : ''; ?>
						<?php if ( ! empty( $img_src ) ) : ?>
							<img src="<?php echo esc_attr( $img_src ); ?>" class="upload_image_preview" data-placeholder-src="" alt="" width="150" height="150" style="display: block; margin-bottom: 5px;" />
						<?php endif; ?>
						<input name="<?php echo esc_attr( $this->get_field_name( 'bg_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'bg_image' ) ); ?>" class="widefat upload_image_id" type="hidden" value="<?php echo esc_attr( $bg_image ); ?>" />
						<a href="#" class="button tm_upload_image_button tips"><?php echo esc_html__( 'Upload/Add image', 'techmarket' ); ?></a>
						<a href="#" class="button tm_remove_image_button tips"><?php echo esc_html__( 'Remove this image', 'techmarket' ); ?></a>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('price') ); ?>"><?php esc_html_e( 'Price:', 'techmarket' ) ?></label>
						<textarea rows="1" cols="28" id="<?php echo esc_attr( $this->get_field_id('price') ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name('price') ); ?>"><?php echo wp_kses_post( $price ); ?></textarea>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('section_class') ); ?>"><?php esc_html_e( 'Extra Class:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('section_class') ); ?>" name="<?php echo esc_attr( $this->get_field_name('section_class') ); ?>" value="<?php echo esc_attr( $section_class ); ?>" />
					</p>
				</div>
			</div>
			<?php
		}
	}
endif;