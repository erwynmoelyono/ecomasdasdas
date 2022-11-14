<?php
/**
 * Creates a Products Carousel Widget which can be placed in sidebar
 *
 * @class       Techmarket_Products_Carousel_Widget
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
	 * Techmarket Products Carousel widget class
	 *
	 * @since 1.0.0
	 */
	class Techmarket_Products_Carousel_Widget extends WP_Widget {

		public function __construct() {
			$widget_ops = array( 'description' => esc_html__( 'Add products carousel widgets to your sidebar.', 'techmarket' ) );
			parent::__construct( 'techmarket_products_carousel_widget', esc_html__( 'Techmarket Products Carousel', 'techmarket' ), $widget_ops );
		}

		public function widget($args, $instance) {

			$title = !empty( $instance['title'] ) ? $instance['title'] : '';
			$shortcode_tag = !empty( $instance['shortcode_tag'] ) ? $instance['shortcode_tag'] : 'recent_products';
			$limit = !empty( $instance['limit'] ) ? $instance['limit'] : 10;
			$columns = !empty( $instance['columns'] ) ? $instance['columns'] : 1;
			$template = isset( $instance['template'] ) ? $instance['template'] : '';
			$product_id = isset( $instance['product_id'] ) ? $instance['product_id'] : '';
			$category = !empty( $instance['category'] ) ? $instance['category'] : '';
			$show_custom_nav = !empty( $instance['show_custom_nav'] ) ? $instance['show_custom_nav'] : false;
			$section_class = isset( $instance['section_class'] ) ? $instance['section_class'] : '';
			$rows = !empty( $instance['rows'] ) ? $instance['rows'] : 1;
			$slidesPerRow = !empty( $instance['slidesPerRow'] ) ? $instance['slidesPerRow'] : 1;
			$slidesToShow = !empty( $instance['slidesToShow'] ) ? $instance['slidesToShow'] : 1;
			$slidesToScroll = !empty( $instance['slidesToScroll'] ) ? $instance['slidesToScroll'] : 1;
			$dots = !empty( $instance['dots'] ) ? $instance['dots'] : false;
			$arrows = !empty( $instance['arrows'] ) ? $instance['arrows'] : false;

			$slidesToShow = !empty( $instance['slidesToShow'] ) ? $instance['slidesToShow'] : 1;

			$shortcode_args = array(
				'template' => $template,
				'columns' => $columns,
				'per_page' => $limit,
			);

			if( ! empty( $category ) && $shortcode_tag == 'product_category' ) {
				$shortcode_args['category'] = $category;
			} elseif( ! empty( $product_id ) && $shortcode_tag == 'products' ) {
				$shortcode_args['ids'] = $product_id;
				$shortcode_args['orderby'] = 'post__in';
			}

			$carousel_args = array(
				'rows'				=> intval( $rows ),
				'slidesPerRow'		=> intval( $slidesPerRow ),
				'slidesToShow'		=> intval( $slidesToShow ),
				'slidesToScroll'	=> intval( $slidesToScroll ),
				'dots'				=> filter_var( $dots, FILTER_VALIDATE_BOOLEAN ),
				'arrows'			=> filter_var( $arrows, FILTER_VALIDATE_BOOLEAN ),
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			);

			if ( empty( $template ) || in_array( $template, array( 'content-product', 'content-product.php' ) ) ) {
				$carousel_args['responsive'] = array(
					array(
						'breakpoint'	=> 750,
						'settings'		=> array(
							'slidesToShow'		=> $rows == 1 ? 2 : 1,
							'slidesToScroll'	=> $rows == 1 ? 2 : 1,
						)
					)
				);
			}

			$atts = apply_filters( 'techmarket_products_carousel_widget_args', array(
				'section_title'		=> $title,
				'section_class'		=> $section_class,
				'header_custom_nav'	=> $show_custom_nav,
				'shortcode_tag'		=> $shortcode_tag,
				'shortcode_atts'	=> $shortcode_args,
				'carousel_args'		=> $carousel_args
			) );

			echo wp_kses_post( $args['before_widget'] );
				if( function_exists( 'techmarket_products_carousel' ) ) {
					techmarket_products_carousel( $atts );
				}
			echo wp_kses_post( $args['after_widget'] );
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			if ( ! empty( $new_instance['title'] ) ) {
				$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
			}
			if ( ! empty( $new_instance['shortcode_tag'] ) ) {
				$instance['shortcode_tag'] = strip_tags( stripslashes($new_instance['shortcode_tag']) );
			}
			if ( ! empty( $new_instance['limit'] ) ) {
				$instance['limit'] = strip_tags( stripslashes($new_instance['limit']) );
			}
			if ( ! empty( $new_instance['columns'] ) ) {
				$instance['columns'] = strip_tags( stripslashes($new_instance['columns']) );
			}
			if ( ! empty( $new_instance['template'] ) ) {
				$instance['template'] = strip_tags( stripslashes($new_instance['template']) );
			}
			if ( ! empty( $new_instance['product_id'] ) ) {
				$instance['product_id'] = strip_tags( stripslashes($new_instance['product_id']) );
			}
			if ( ! empty( $new_instance['category'] ) ) {
				$instance['category'] = strip_tags( stripslashes($new_instance['category']) );
			}
			if ( ! empty( $new_instance['show_custom_nav'] ) ) {
				$instance['show_custom_nav'] = strip_tags( stripslashes($new_instance['show_custom_nav']) );
			}
			if ( ! empty( $new_instance['section_class'] ) ) {
				$instance['section_class'] = strip_tags( stripslashes($new_instance['section_class']) );
			}
			if ( ! empty( $new_instance['rows'] ) ) {
				$instance['rows'] = strip_tags( stripslashes($new_instance['rows']) );
			}
			if ( ! empty( $new_instance['slidesPerRow'] ) ) {
				$instance['slidesPerRow'] = strip_tags( stripslashes($new_instance['slidesPerRow']) );
			}
			if ( ! empty( $new_instance['slidesToShow'] ) ) {
				$instance['slidesToShow'] = strip_tags( stripslashes($new_instance['slidesToShow']) );
			}
			if ( ! empty( $new_instance['slidesToScroll'] ) ) {
				$instance['slidesToScroll'] = strip_tags( stripslashes($new_instance['slidesToScroll']) );
			}
			if ( ! empty( $new_instance['dots'] ) ) {
				$instance['dots'] = strip_tags( stripslashes($new_instance['dots']) );
			}
			if ( ! empty( $new_instance['arrows'] ) ) {
				$instance['arrows'] = strip_tags( stripslashes($new_instance['arrows']) );
			}
			return $instance;
		}

		public function form( $instance ) {
			global $wp_registered_sidebars;

			$shortcode_tags_list = array(
				'featured_products'		=> esc_html__( 'Featured Products', 'techmarket' ),
				'sale_products'			=> esc_html__( 'On Sale Products', 'techmarket' ),
				'top_rated_products'	=> esc_html__( 'Top Rated Products', 'techmarket' ),
				'recent_products'		=> esc_html__( 'Recent Products', 'techmarket' ),
				'best_selling_products'	=> esc_html__( 'Best Selling Products', 'techmarket' ),
				'products'				=> esc_html__( 'Products by Ids', 'techmarket' ),
				'product_category'		=> esc_html__( 'Product Category', 'techmarket' ),
			);

			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			$shortcode_tag = isset( $instance['shortcode_tag'] ) ? $instance['shortcode_tag'] : '';
			$limit = isset( $instance['limit'] ) ? $instance['limit'] : '';
			$columns = isset( $instance['columns'] ) ? $instance['columns'] : '';
			$template = isset( $instance['template'] ) ? $instance['template'] : '';
			$product_id = isset( $instance['product_id'] ) ? $instance['product_id'] : '';
			$category = isset( $instance['category'] ) ? $instance['category'] : '';
			$show_custom_nav = isset( $instance['show_custom_nav'] ) ? $instance['show_custom_nav'] : false;
			$section_class = isset( $instance['section_class'] ) ? $instance['section_class'] : '';
			$rows = !empty( $instance['rows'] ) ? $instance['rows'] : 1;
			$slidesPerRow = !empty( $instance['slidesPerRow'] ) ? $instance['slidesPerRow'] : 1;
			$slidesToShow = !empty( $instance['slidesToShow'] ) ? $instance['slidesToShow'] : 1;
			$slidesToScroll = !empty( $instance['slidesToScroll'] ) ? $instance['slidesToScroll'] : 1;
			$dots = !empty( $instance['dots'] ) ? $instance['dots'] : false;
			$arrows = !empty( $instance['arrows'] ) ? $instance['arrows'] : false;

			// If no sidebars exists.
			if ( !$wp_registered_sidebars ) {
				echo '<p>'. esc_html__('No sidebars are available.', 'techmarket' ) .'</p>';
				return;
			}
			wp_enqueue_script( 'techmarket-admin-meta-boxes' );
			?>

			<div class="options_group">
				<div class="product-options">
					<h2><?php esc_html_e( 'Product Options', 'techmarket' ) ?></h2>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $title ); ?>" />
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'shortcode_tag' ) ); ?>"><?php esc_html_e( 'Product Shortcode:', 'techmarket' ) ?></label>
						<select class="widefat show_hide_select" id="<?php echo esc_attr( $this->get_field_id( 'shortcode_tag' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'shortcode_tag' ) ); ?>">
							<?php foreach ( $shortcode_tags_list as $option_key => $option_value ) : ?>
								<option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $option_key, $shortcode_tag ); ?>><?php echo esc_html( $option_value ); ?></option>
							<?php endforeach; ?>
						</select>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('limit') ); ?>"><?php esc_html_e( 'Limit:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('limit') ); ?>" name="<?php echo esc_attr( $this->get_field_name('limit') ); ?>" value="<?php echo esc_attr( $limit ); ?>" />
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('columns') ); ?>"><?php esc_html_e( 'Columns:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('columns') ); ?>" name="<?php echo esc_attr( $this->get_field_name('columns') ); ?>" value="<?php echo esc_attr( $columns ); ?>" />
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('template') ); ?>"><?php esc_html_e( 'Template:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('template') ); ?>" name="<?php echo esc_attr( $this->get_field_name('template') ); ?>" value="<?php echo esc_attr( $template ); ?>" />
					</p>
					<p class="show_if_products hide">
						<label for="<?php echo esc_attr( $this->get_field_id('product_id') ); ?>"><?php esc_html_e( 'Product ID:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('product_id') ); ?>" name="<?php echo esc_attr( $this->get_field_name('product_id') ); ?>" value="<?php echo esc_attr( $product_id ); ?>" />
					</p>
					<p class="show_if_product_category hide">
						<label for="<?php echo esc_attr( $this->get_field_id('category') ); ?>"><?php esc_html_e( 'Category Slug:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('category') ); ?>" name="<?php echo esc_attr( $this->get_field_name('category') ); ?>" value="<?php echo esc_attr( $category ); ?>" />
					</p>
					<p>
						<input id="<?php echo esc_attr( $this->get_field_id( 'show_custom_nav' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_custom_nav' ) ); ?>" type="checkbox" value="1" <?php checked( $show_custom_nav, 1 ); ?> />
						<label for="<?php echo esc_attr( $this->get_field_id( 'show_custom_nav' ) ); ?>"><?php esc_html_e( 'Show Custom Navigation:', 'techmarket' ) ?></label>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('section_class') ); ?>"><?php esc_html_e( 'Extra Class:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('section_class') ); ?>" name="<?php echo esc_attr( $this->get_field_name('section_class') ); ?>" value="<?php echo esc_attr( $section_class ); ?>" />
					</p>
				</div>
				<div class="carousel-options">
					<h2><?php esc_html_e( 'Carousel Options', 'techmarket' ) ?></h2>
					<p>
						<input id="<?php echo esc_attr( $this->get_field_id( 'arrows' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'arrows' ) ); ?>" type="checkbox" value="1" <?php checked( $arrows, 1 ); ?> />
						<label for="<?php echo esc_attr( $this->get_field_id( 'arrows' ) ); ?>"><?php esc_html_e( 'Show Navigation:', 'techmarket' ) ?></label>
					</p>
					<p>
						<input id="<?php echo esc_attr( $this->get_field_id( 'dots' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dots' ) ); ?>" type="checkbox" value="1" <?php checked( $dots, 1 ); ?> />
						<label for="<?php echo esc_attr( $this->get_field_id( 'dots' ) ); ?>"><?php esc_html_e( 'Show Dots:', 'techmarket' ) ?></label>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('slidesToShow') ); ?>"><?php esc_html_e( 'slidesToShow:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('slidesToShow') ); ?>" name="<?php echo esc_attr( $this->get_field_name('slidesToShow') ); ?>" value="<?php echo esc_attr( $slidesToShow ); ?>" />
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('slidesToScroll') ); ?>"><?php esc_html_e( 'slidesToScroll:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('slidesToScroll') ); ?>" name="<?php echo esc_attr( $this->get_field_name('slidesToScroll') ); ?>" value="<?php echo esc_attr( $slidesToScroll ); ?>" />
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('rows') ); ?>"><?php esc_html_e( 'rows:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('rows') ); ?>" name="<?php echo esc_attr( $this->get_field_name('rows') ); ?>" value="<?php echo esc_attr( $rows ); ?>" />
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id('slidesPerRow') ); ?>"><?php esc_html_e( 'slidesPerRow:', 'techmarket' ) ?></label>
						<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('slidesPerRow') ); ?>" name="<?php echo esc_attr( $this->get_field_name('slidesPerRow') ); ?>" value="<?php echo esc_attr( $slidesPerRow ); ?>" />
					</p>
				</div>
			</div>
			<?php
		}
	}
endif;
