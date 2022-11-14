<?php
/**
 * Template tags for Home v5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v5_options() {
	$home_v5 = array(
		'swb'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'sdr_shortcode'		=> '',
			'br1'				=> array(
				'title'			=> wp_kses_post( __( '<strong>20% Off Tech</strong> <br> at Ultrabooks, <br> Laptops, Tablets<br>Notebooks &<br>More', 'techmarket' ) ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br2'				=> array(
				'pre_title'		=> esc_html__( 'Best Gift Idea', 'techmarket' ),
				'title'			=> wp_kses_post( __( 'Mini Two Wheel <br><strong>Self Balancing</strong> <br> Scooter', 'techmarket' ) ),
				'price'			=> '<ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>339.99</span></ins> <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>689</span></del>',
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			)
		),
		'catc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 20,
			'animation'			=> '',
			'pre_title'			=> wp_kses_post( __( 'Featured', 'techmarket' ) ),
			'section_title'		=> wp_kses_post( __( 'Top categories <br>this week', 'techmarket' ) ),
			'header_custom_nav'	=> 'yes',
			'button_text'		=> esc_html__( 'Full Catalog', 'techmarket' ),
			'button_link'		=> '#',
			'number'			=> 12,
			'columns'			=> 4,
			'slugs'				=> '',
			'carousel_args' 	=> array(
				'slidesToShow'		=> 4,
				'slidesToScroll'	=> 1,
				'dots'				=> 'no',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'pcwtc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'pc'				=> array(
				'section_title'		=> esc_html__( 'Trending Now', 'techmarket' ),
				'header_custom_nav'	=> 'yes',
				'shortcode_content'	=> array(
					'shortcode'		=> 'recent_products',
					'shortcode_atts'	=> array(
						'columns'		=> '1',
						'template'		=> 'content-product-with-rating'
					)
				),
				'carousel_args'		=> array(
					'slidesToShow'		=>  1,
					'slidesToScroll'	=>  1,
					'dots'				=>  'no',
					'arrows'			=>  'yes',
					'prevArrow'			=>  '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=>  '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			),
			'pct'	=> array(
				'section_title'		=> '',
				'tabs' 				=> array(
					array(
						'title'				=> esc_html__( 'New Arrivals', 'techmarket' ),
						'shortcode_content'	=> array(
						'shortcode'			=> 'recent_products',
							'shortcode_atts'	=> array(
								'columns'		=> '3',
								'template'		=> 'content-product-with-rating'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'On Sale', 'techmarket' ),
						'shortcode_content'	=> array(
						'shortcode'			=> 'featured_products',
							'shortcode_atts'	=> array(
								'columns'		=> '3',
								'template'		=> 'content-product-with-rating'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Best Rated', 'techmarket' ),
						'shortcode_content'	=> array(
						'shortcode'			=> 'sale_products',
							'shortcode_atts'	=> array(
								'columns'		=> '3',
								'template'		=> 'content-product-with-rating'
							)
						)
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> 3,
					'slidesToScroll'	=> 3,
					'dots'				=> 'no',
					'arrows'			=> 'yes',
					'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			)
		),
		'ntc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'notice_info'		=> esc_html__( 'Download our new app today! Easily reorder products, scan your rewards and shop with Apple Play.', 'techmarket' )
		),
		'dpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( '<strong>Daily deals!</strong> Get our best prices.', 'techmarket' ) ),
			'header_custom_nav'	=> 'yes',
			'header_timer'      => 'yes',
			'timer_value'		=> '',
			'shortcode_content'	=> array(
				'shortcode'			=> 'sale_products',
				'shortcode_atts'	=> array(
					'columns'			=> 2,
					'per_page'			=> 4,
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 2,
				'slidesToScroll'	=> 2,
				'dots'				=> 'yes',
				'arrows'			=> 'yes',
				'prevArrow'			=> is_rtl() ? '<a href="#" class="slider-next">' . esc_html__( 'Next deal', 'techmarket' ) . '<i class="tm tm-arrow-left"></i></a>' : '<a href="#" class="slider-prev"><i class="tm tm-arrow-left"></i>' . esc_html__( 'Previous deal', 'techmarket' ) . '</a>',
				'nextArrow'			=> is_rtl() ? '<a href="#" class="slider-prev"><i class="tm tm-arrow-right"></i>' . esc_html__( 'Previous deal', 'techmarket' ) . '</a>' : '<a href="#" class="slider-next">' . esc_html__( 'Next deal', 'techmarket' ) . '<i class="tm tm-arrow-right"></i></a>'
			)
		),
		'vpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( '<strong>2017 Gadgets &amp; Mobile </strong> accessories', 'techmarket' ) ),
			'tabs' 			=> array(
				array(
					'title'				=> wp_kses_post( '<i class="tm tm-desktop-pc"></i> ' . esc_html__( 'Desktop PCs', 'techmarket' ) ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'		=> '5'
						)
					)
				),
				array(
					'title'				=> wp_kses_post( '<i class="tm tm-laptop"></i> ' . esc_html__( 'Ultrabooks', 'techmarket' ) ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'		=> '5'
						)
					)
				),
				array(
					'title'				=> wp_kses_post( '<i class="tm tm-smartphone"></i> ' . esc_html__( 'Smartphones', 'techmarket' ) ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'		=> '5'
						)
					)
				),
				array(
					'title'				=> wp_kses_post( '<i class="tm tm-digital-camera"></i> ' . esc_html__( 'Internet Cams', 'techmarket' ) ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'		=> '5'
						)
					)
				),
				array(
					'title'				=> wp_kses_post( '<i class="tm tm-accesories"></i> ' . esc_html__( 'Accessories', 'techmarket' ) ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'best_selling_products',
						'shortcode_atts'	=> array(
							'columns'		=> '5'
						)
					),
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 5,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 5
			)
		),
		'sbr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 70,
			'animation'			=> '',
			'title'				=> wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
			'sub_title'			=> esc_html__( 'Travel up to 22km in a single charge.', 'techmarket' ),
			'action_text'		=> wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'		=> '#',
			'bg_choice'			=> 'image'
		),
		'pcwfp'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 80,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Bring on the New Year', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Top 20', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4'
						)
					),
					'shortcode_content_featured'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4'
						)
					),
					'shortcode_content_featured'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4'
						)
					),
					'shortcode_content_featured'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4'
						)
					),
					'shortcode_content_featured'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'	=> array()
					),
				)
			),
			'carousel_args'	=> array(
				'rows'				=> 2,
				'slidesPerRow'		=> 4,
				'slidesToShow'		=> 1,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 1
			)
		),
		'pcwb'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 90,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( 'Make <br>dreams <br><span>your reality.</span>', 'techmarket' ) ),
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '6',
				),
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 6,
				'slidesToScroll'	=> 6,
				'dots'				=> 'yes',
				'arrows'			=> 'no'
			)
		),
		'ltp'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 100,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Best Rated Sellers', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=>  esc_html__( 'Top 20', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'recent_products',
						'shortcode_atts'	=>  array(
							'columns'	 	=> 4,
							'per_page' 		=> 8,
							'template' 		=> 'content-landscape-product'
						)
					)
				),
				array(
					'title'				=>  esc_html__( 'Audio &amp; Video', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 4,
							'per_page' 		=> 8,
							'template' 		=> 'content-landscape-product'
						)
					)
				),
				array(
					'title'				=>  esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 4,
							'per_page'		=> 8,
							'template' 		=> 'content-landscape-product'
						)
					)
				),
				array(
					'title'				=>  esc_html__( 'Video Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 4,
							'per_page' 		=> 8,
							'template' 		=> 'content-landscape-product'
						)
					)
				)
			),
			'carousel_args'	=> array(
				'rows'				=> 2,
				'slidesPerRow'		=> 4,
				'slidesToShow'		=> 1,
				'slidesToScroll'	=> 1,
				'dots'				=> 'no',
				'arrows'			=> 'no'
			)
		),
		'bc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 110,
			'animation'			=> '',
			'orderby'			=> 'title',
			'order'				=> 'ASC',
			'number'			=> 12,
			'hide_empty'		=> 'no',
			'carousel_args'		=> array(
				'slidesToShow'	=> 6,
				'slidesToScroll'=> 1,
				'dots'			=> 'no',
				'arrows'		=> 'yes'
			)
		)
	);

	return apply_filters( 'techmarket_get_default_home_v5_options', $home_v5 );
}

function techmarket_get_home_v5_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v5_options = get_post_meta( $post->ID, '_home_v5_options', true );
		$home_v5_options = maybe_unserialize( $clean_home_v5_options );

		if( ! is_array( $home_v5_options ) ) {
			$home_v5_options = json_decode( $clean_home_v5_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v5_options();
			$home_v5 = wp_parse_args( $home_v5_options, $default_options );
		} else {
			$home_v5 = $home_v5_options;
		}

		return apply_filters( 'techmarket_home_v5_meta', $home_v5, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_v5' ) ) {
	/**
	 * Displays Slider in Home v5
	 */
	function techmarket_revslider_v5() {

		$home_v5 	= techmarket_get_home_v5_meta();

		$is_enabled = isset( $home_v5['swb']['is_enabled'] ) ? $home_v5['swb']['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $home_v5['swb']['animation'] ) ? $home_v5['swb']['animation'] : '';
		$shortcode = !empty( $home_v5['swb']['sdr_shortcode'] ) ? $home_v5['swb']['sdr_shortcode'] : '[rev_slider alias="home-v5-slider"]';

		$section_class = 'home-v5-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_home_v5_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_slider_with_banners_v5' ) ) {
	/**
	 *
	 */
	function techmarket_slider_with_banners_v5() {

		$home_v5 	= techmarket_get_home_v5_meta();
		$swb_options = $home_v5['swb'];
		$br1_options = $swb_options['br1'];
		$br2_options = $swb_options['br2'];

		$is_enabled = isset( $swb_options['is_enabled'] ) ? $swb_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $swb_options['animation'] ) ? $swb_options['animation'] : '';

		$banner_1_args = apply_filters( 'techmarket_slider_with_banners_v5_banner_1_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __( '<strong>20% Off Tech</strong> <br> at Ultrabooks, <br> Laptops, Tablets<br>Notebooks &<br>More', 'techmarket' ) ),
			'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
			'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '355', '204' ) ) : array( '//placehold.it/355x204', '355', '204' ),
			'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
			'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : ''
		) );

		$banner_2_args = apply_filters( 'techmarket_slider_with_banners_v5_banner_2_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'pre_title'		=> isset( $br2_options['pre_title'] ) ? $br2_options['pre_title'] : esc_html__( 'Best Gift Idea', 'techmarket' ),
			'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( 'Mini Two Wheel <br><strong>Self Balancing</strong> <br> Scooter', 'techmarket' ) ),
			'price'			=> isset( $br2_options['price'] ) ? $br2_options['price'] : '<ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>339.99</span></ins> <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>689</span></del>',
			'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
			'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '355', '204' ) ) : array( '//placehold.it/355x204', '355', '204' ),
			'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
			'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : ''
		) );

		?><div class="homev5-slider-with-banners row">
			<div class="slider-block column-1-slider-block">
				<?php techmarket_revslider_v5(); ?>
			</div>
			<div class="banners-block column-2-banners-block">
				<?php techmarket_banner( $banner_1_args ); ?>
				<?php techmarket_banner( $banner_2_args ); ?>
			</div>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_product_categories_carousel_v5' ) ) {
	/**
	 *
	 */
	function techmarket_product_categories_carousel_v5() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v5 	= techmarket_get_home_v5_meta();
			$catc_options = $home_v5['catc'];

			$is_enabled = isset( $catc_options['is_enabled'] ) ? $catc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $catc_options['animation'] ) ? $catc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_product_categories_carousel_v5_section_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'section-top-categories',
				'pre_title'			=> isset( $catc_options['pre_title'] ) ? $catc_options['pre_title'] : wp_kses_post( __( 'Featured', 'techmarket' ) ),
				'section_title'		=> isset( $catc_options['section_title'] ) ? $catc_options['section_title'] : wp_kses_post( __( 'Top categories <br>this week', 'techmarket' ) ),
				'header_custom_nav'	=> isset( $catc_options['header_custom_nav'] ) ? filter_var( $catc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'button_text'		=> isset( $catc_options['button_text'] ) ? $catc_options['button_text'] : esc_html__( 'Full Catalog', 'techmarket' ),
				'button_link'		=> isset( $catc_options['button_link'] ) ? $catc_options['button_link'] : '#',
			) );

			$taxonomy_args = apply_filters( 'techmarket_product_categories_carousel_v5_taxonomy_args', array(
				'number'		=> isset( $catc_options['number'] ) ? $catc_options['number'] : 12,
				'columns'		=> isset( $catc_options['columns'] ) ? $catc_options['columns'] : 4,
				'slugs'			=> isset( $catc_options['slugs'] ) ? $catc_options['slugs'] : '',
			) );

			$carousel_args = apply_filters( 'techmarket_product_categories_carousel_v5_carousel_args', array(
				'slidesToShow'		=> isset( $catc_options['carousel_args']['slidesToShow'] ) ? intval( $catc_options['carousel_args']['slidesToShow'] ) : 4,
				'slidesToScroll'	=> isset( $catc_options['carousel_args']['slidesToScroll'] ) ? intval( $catc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'				=> isset( $catc_options['carousel_args']['dots'] ) ? filter_var( $catc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'			=> isset( $catc_options['carousel_args']['arrows'] ) ? filter_var( $catc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'prevArrow'			=> isset( $catc_options['carousel_args']['prevArrow'] ) ? $catc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> isset( $catc_options['carousel_args']['nextArrow'] ) ? $catc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
				'responsive'		=> array(
					array(
						'breakpoint'	=> 750,
						'settings'		=> array(
							'slidesToShow'		=> 2,
							'slidesToScroll'	=> 2
						)
					),
					array(
						'breakpoint'	=> 1200,
						'settings'		=> array(
							'slidesToShow'		=> 3,
							'slidesToScroll'	=> 3
						)
					),
					array(
						'breakpoint'	=> 1400,
						'settings'		=> array(
							'slidesToShow'		=> 3,
							'slidesToScroll'	=> 3
						)
					)
				)
			) );

			techmarket_product_categories_carousel( $section_args , $taxonomy_args , $carousel_args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_with_tabs_carousel_v5' ) ) {
	function techmarket_products_carousel_with_tabs_carousel_v5() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v5 	 = techmarket_get_home_v5_meta();
			$pc_options  = $home_v5['pcwtc']['pc'];
			$pct_options = $home_v5['pcwtc']['pct'];

			$is_enabled  = isset( $home_v5['pcwtc']['is_enabled'] ) ? $home_v5['pcwtc']['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $home_v5['pcwtc']['animation'] ) ? $home_v5['pcwtc']['animation'] : '';

			$pc_args = apply_filters( 'techmarket_products_carousel_with_tabs_carousel_v5_pc_args', array(

				'section_title'		=> isset( $pc_options['section_title'] ) ? $pc_options['section_title'] : esc_html__( 'Trending Now', 'techmarket' ),
				'section_class'		=> 'column-1-single-carousel section-single-carousel',
				'header_custom_nav'	=> isset( $pc_options['header_custom_nav'] ) ? filter_var( $pc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $pc_options['shortcode_content']['shortcode'] ) ? $pc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pc_options['shortcode_content'] ) : array( 'columns' => '1', 'template' => 'content-product-with-rating' ),
				'carousel_args'		=> array(
					'slidesToShow'		=>  isset( $pc_options['carousel_args']['slidesToShow'] ) ? intval( $pc_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=>  isset( $pc_options['carousel_args']['slidesToScroll'] ) ? intval( $pc_options['carousel_args']['slidesToScroll'] ) : 2,
					'dots'				=>  isset( $pc_options['carousel_args']['dots'] ) ? filter_var( $pc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=>  isset( $pc_options['carousel_args']['arrows'] ) ? filter_var( $pc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=>  isset( $pc_options['carousel_args']['prevArrow'] ) ? $pc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=>  isset( $pc_options['carousel_args']['nextArrow'] ) ? $pc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						)
					)
				)
			) );

			$products_carousel_tabs_args = apply_filters( 'techmarket_products_carousel_with_tabs_carousel_v5_products_carousel_tabs_args', array(

				'section_title'		=> isset( $pct_options['section_title'] ) ? $pct_options['section_title'] : '',
				'section_class'		=> 'column-2',
				'tabs' 				=> array(
					array(
						'title'				=> isset( $pct_options['tabs'][0]['title'] ) ? $pct_options['tabs'][0]['title'] : esc_html__( 'New Arrivals', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '3', 'template' => 'content-product-with-rating' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][1]['title'] ) ? $pct_options['tabs'][1]['title'] : esc_html__( 'On Sale', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '3', 'template' => 'content-product-with-rating' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][2]['title'] ) ? $pct_options['tabs'][2]['title'] : esc_html__( 'Best Rated', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '3', 'template' => 'content-product-with-rating' )

					)
				),
				'carousel_args'			=> array(
					'slidesToShow'		=> isset( $pct_options['carousel_args']['slidesToShow'] ) ? intval( $pct_options['carousel_args']['slidesToShow'] ) : 3,
					'slidesToScroll'	=> isset( $pct_options['carousel_args']['slidesToScroll'] ) ? intval( $pct_options['carousel_args']['slidesToScroll'] ) : 3,
					'dots'				=> isset( $pct_options['carousel_args']['dots'] ) ? filter_var( $pct_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $pct_options['carousel_args']['arrows'] ) ? filter_var( $pct_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $pct_options['carousel_args']['prevArrow'] ) ? $pct_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $pct_options['carousel_args']['nextArrow'] ) ? $pct_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						)
					)
				)
			) );

			$has_atleast_one_tab = false;

			foreach( $products_carousel_tabs_args['tabs'] as $tab ) {
				if ( ! empty( $tab['title'] ) ) {
					$has_atleast_one_tab = true;
					break;
				}
			}

			if ( ! $has_atleast_one_tab ) {
				$pc_args['section_class'] = 'section-double-carousel';
			}

			?>
			<section class="section-single-carousel-with-tab-product type-2">
				<div class="row">
					<?php
						if ( ! empty( $pc_args['section_title'] ) ) {
							techmarket_products_carousel( $pc_args );
						} else {
							$products_carousel_tabs_args['section_class'] = '';
						}
					?>
					<?php
						if ( $has_atleast_one_tab ) {
							techmarket_products_carousel_tabs( $products_carousel_tabs_args );
						}
					?>
				</div>
			</section>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_fullwidth_notice_v5' ) ) {
	function techmarket_fullwidth_notice_v5() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v5 	= techmarket_get_home_v5_meta();
			$ntc_options = $home_v5['ntc'];

			$is_enabled = isset( $ntc_options['is_enabled'] ) ? $ntc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ntc_options['animation'] ) ? $ntc_options['animation'] : '';

			$args = apply_filters( 'techmarket_fullwidth_notice_v5_args', array(
				'animation'		    => $animation,
				'notice_info'		=> isset( $ntc_options['notice_info'] ) ? $ntc_options['notice_info'] : esc_html__( 'Download our new app today! Easily reorder products, scan your rewards and shop with Apple Play.', 'techmarket' )
			) );

			techmarket_fullwidth_notice( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_deals_carousel_v5' ) ) {
	/**
	 * Displays Deals Carousel
	 */
	function techmarket_deals_carousel_v5( $args = array() ) {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v5 	= techmarket_get_home_v5_meta();
			$dpc_options = $home_v5['dpc'];

			$is_enabled = isset( $dpc_options['is_enabled'] ) ? $dpc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $dpc_options['animation'] ) ? $dpc_options['animation'] : '';

			$default_prev_arrow = is_rtl() ? '<a href="#" class="slider-next">' . esc_html__( 'Next deal', 'techmarket' ) . '<i class="tm tm-arrow-left"></i></a>' : '<a href="#" class="slider-prev"><i class="tm tm-arrow-left"></i>' . esc_html__( 'Previous deal', 'techmarket' ) . '</a>';
			$default_next_arrow = is_rtl() ? '<a href="#" class="slider-prev"><i class="tm tm-arrow-right"></i>' . esc_html__( 'Previous deal', 'techmarket' ) . '</a>' : '<a href="#" class="slider-next">' . esc_html__( 'Next deal', 'techmarket' ) . '<i class="tm tm-arrow-right"></i></a>';

			$defaults = apply_filters( 'techmarket_deals_carousel_v5_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $dpc_options['section_title'] ) ? $dpc_options['section_title'] : wp_kses_post( __( '<strong>Daily deals!</strong> Get our best prices.', 'techmarket' ) ),
				'section_class'		=> 'home-5-deals-carousel',
				'header_custom_nav'	=> isset( $dpc_options['header_custom_nav'] ) ? filter_var( $dpc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'header_timer'      => isset( $dpc_options['header_timer'] ) ? filter_var( $dpc_options['header_timer'], FILTER_VALIDATE_BOOLEAN ) : true,
				'timer_value'		=> isset( $dpc_options['timer_value'] ) ? $dpc_options['timer_value'] : '',
				'shortcode_tag'		=> isset( $dpc_options['shortcode_content']['shortcode'] ) ? $dpc_options['shortcode_content']['shortcode'] : 'sale_products',
				'shortcode_atts'	=> isset( $dpc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $dpc_options['shortcode_content'] ) : array( 'columns' => 2, 'per_page' => 4 ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $dpc_options['carousel_args']['slidesToShow'] ) ? intval( $dpc_options['carousel_args']['slidesToShow'] ) : 2,
					'slidesToScroll'	=> isset( $dpc_options['carousel_args']['slidesToScroll'] ) ? intval( $dpc_options['carousel_args']['slidesToScroll'] ) : 2,
					'dots'				=> isset( $dpc_options['carousel_args']['dots'] ) ? filter_var( $dpc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $dpc_options['carousel_args']['arrows'] ) ? filter_var( $dpc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $dpc_options['carousel_args']['prevArrow'] ) ? $dpc_options['carousel_args']['prevArrow'] : $default_prev_arrow,
					'nextArrow'			=> isset( $dpc_options['carousel_args']['nextArrow'] ) ? $dpc_options['carousel_args']['nextArrow'] : $default_next_arrow,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 1590,
							'settings'		=> array(
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						)
					)
				)
			) );

			$args = wp_parse_args( $args, $defaults );

			techmarket_deals_cards_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_vertical_tabs_v5' ) ) {
	/**
	 *
	 */
	function techmarket_products_carousel_vertical_tabs_v5() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v5 	= techmarket_get_home_v5_meta();
			$vpc_options = $home_v5['vpc'];

			$is_enabled = isset( $vpc_options['is_enabled'] ) ? $vpc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $vpc_options['animation'] ) ? $vpc_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_vertical_tabs_v5_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $vpc_options['section_title'] ) ? $vpc_options['section_title'] : wp_kses_post( __( '<strong>2017 Gadgets &amp; Mobile </strong> accessories', 'techmarket' ) ),
				'section_class'	=> 'sidebar-version',
				'bg_image'		=> isset( $vpc_options['bg_image'] ) && intval( $vpc_options['bg_image'] ) ? wp_get_attachment_image_src( $vpc_options['bg_image'], array( '1322', '552' ) ) : array( '//placehold.it/1322x552', '1322', '552' ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $vpc_options['tabs'][0]['title'] ) ? $vpc_options['tabs'][0]['title'] : wp_kses_post( '<i class="tm tm-desktop-pc"></i> ' . esc_html__( 'Desktop PCs', 'techmarket' ) ),
						'shortcode_tag'		=> isset( $vpc_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $vpc_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $vpc_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $vpc_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '5' )
					),
					array(
						'title'				=> isset( $vpc_options['tabs'][1]['title'] ) ? $vpc_options['tabs'][1]['title'] : wp_kses_post( '<i class="tm tm-laptop"></i> ' . esc_html__( 'Ultrabooks', 'techmarket' ) ),
						'shortcode_tag'		=> isset( $vpc_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $vpc_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $vpc_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $vpc_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '5' )
					),
					array(
						'title'				=> isset( $vpc_options['tabs'][2]['title'] ) ? $vpc_options['tabs'][2]['title'] : wp_kses_post( '<i class="tm tm-smartphone"></i> ' . esc_html__( 'Smartphones', 'techmarket' ) ),
						'shortcode_tag'		=> isset( $vpc_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $vpc_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $vpc_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $vpc_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '5' )
					),
					array(
						'title'				=> isset( $vpc_options['tabs'][3]['title'] ) ? $vpc_options['tabs'][3]['title'] : wp_kses_post( '<i class="tm tm-digital-camera"></i> ' . esc_html__( 'Internet Cams', 'techmarket' ) ),
						'shortcode_tag'		=> isset( $vpc_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $vpc_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $vpc_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $vpc_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '5' )
					),
					array(
						'title'				=> isset( $vpc_options['tabs'][4]['title'] ) ? $vpc_options['tabs'][4]['title'] : wp_kses_post( '<i class="tm tm-accesories"></i> ' . esc_html__( 'Accessories', 'techmarket' ) ),
						'shortcode_tag'		=> isset( $vpc_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $vpc_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $vpc_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $vpc_options['tabs'][4]['shortcode_content'] ) : array( 'columns' => '5' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $vpc_options['carousel_args']['slidesToShow'] ) ? intval( $vpc_options['carousel_args']['slidesToShow'] ) : 5,
					'slidesToScroll'	=> isset( $vpc_options['carousel_args']['slidesToScroll'] ) ? intval( $vpc_options['carousel_args']['slidesToScroll'] ) : 5,
					'dots'				=> isset( $vpc_options['carousel_args']['dots'] ) ? filter_var( $vpc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $vpc_options['carousel_args']['arrows'] ) ? filter_var( $vpc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 4,
								'slidesToScroll'	=> 4
							)
						)
					)
				)
			) );

			techmarket_products_carousel_vertical_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_full_width_banner_v5' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_full_width_banner_v5() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v5 	= techmarket_get_home_v5_meta();
			$sbr_options = $home_v5['sbr'];

			$is_enabled = isset( $sbr_options['is_enabled'] ) ? $sbr_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $sbr_options['animation'] ) ? $sbr_options['animation'] : '';

			$args = apply_filters( 'techmarket_full_width_banner_v5_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'full-width-banner',
				'title'			=> isset( $sbr_options['title'] ) ? $sbr_options['title'] : wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
				'sub_title'		=> isset( $sbr_options['sub_title'] ) ? $sbr_options['sub_title'] : esc_html__( 'Travel upto 22km in a single charge.', 'techmarket' ),
				'action_text'	=> isset( $sbr_options['action_text'] ) ? $sbr_options['action_text'] : wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
				'action_link'	=> isset( $sbr_options['action_link'] ) ? $sbr_options['action_link'] : '#',
				'bg_image'		=> isset( $sbr_options['bg_image'] ) && intval( $sbr_options['bg_image'] ) ? wp_get_attachment_image_src( $sbr_options['bg_image'], array( '1450', '236' ) ) : array( '//placehold.it/1450x236', '1450', '236' ),
				'bg_choice'		=> isset( $sbr_options['bg_choice'] ) ? $sbr_options['bg_choice'] : 'image',
				'bg_color' 		=> isset( $sbr_options['bg_color'] ) ? $sbr_options['bg_color'] : '',
				'bg_height' 	=> isset( $sbr_options['bg_height'] ) ? $sbr_options['bg_height'] : ''
			) );

			techmarket_banner( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_with_featured_product_v5' ) ) {
	function techmarket_products_carousel_tabs_with_featured_product_v5() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v5 	= techmarket_get_home_v5_meta();
			$pcwfp_options = $home_v5['pcwfp'];

			$is_enabled = isset( $pcwfp_options['is_enabled'] ) ? $pcwfp_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcwfp_options['animation'] ) ? $pcwfp_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_with_featured_product_v5_args', array(
				'animation'			=> $animation,
				'section_class'		=> 'featured-product-left type-2',
				'section_title'		=> isset( $pcwfp_options['section_title'] ) ? $pcwfp_options['section_title'] : esc_html__( 'Bring on the New year', 'techmarket' ),
				'header_nav_align'	=> 'justify-content-center',
				'tabs' 				=> array(
					array(
						'title'						=> isset( $pcwfp_options['tabs'][0]['title'] ) ? $pcwfp_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '4' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][0]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][0]['shortcode_content_featured']['shortcode'] : 'recent_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][0]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][0]['shortcode_content_featured'] ) : array()

					),
					array(
						'title'						=> isset( $pcwfp_options['tabs'][1]['title'] ) ? $pcwfp_options['tabs'][1]['title'] : esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '4' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][1]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][1]['shortcode_content_featured']['shortcode'] : 'featured_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][1]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][1]['shortcode_content_featured'] ) : array()
					),
					array(
						'title'						=> isset( $pcwfp_options['tabs'][2]['title'] ) ? $pcwfp_options['tabs'][2]['title'] : esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '4' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][2]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][2]['shortcode_content_featured']['shortcode'] : 'sale_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][2]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][2]['shortcode_content_featured'] ) : array()
					),
					array(
						'title'						=> isset( $pcwfp_options['tabs'][3]['title'] ) ? $pcwfp_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '4' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][3]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][3]['shortcode_content_featured']['shortcode'] : 'top_rated_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][3]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][3]['shortcode_content_featured'] ) : array()
					),
				),
				'carousel_args'	=> array(
					'rows'				=> isset( $pcwfp_options['carousel_args']['rows'] ) ? intval( $pcwfp_options['carousel_args']['rows'] ) : 2,
					'slidesPerRow'		=> isset( $pcwfp_options['carousel_args']['slidesPerRow'] ) ? intval( $pcwfp_options['carousel_args']['slidesPerRow'] ) : 4,
					'slidesToShow'		=> isset( $pcwfp_options['carousel_args']['slidesToShow'] ) ? intval( $pcwfp_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $pcwfp_options['carousel_args']['slidesToScroll'] ) ? intval( $pcwfp_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $pcwfp_options['carousel_args']['dots'] ) ? filter_var( $pcwfp_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcwfp_options['carousel_args']['arrows'] ) ? filter_var( $pcwfp_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(

						array(
							'breakpoint'	=> 750,
							'settings'		=> array(
								'slidesPerRow'		=> 2,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesPerRow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesPerRow'		=> 3,
								'slidesToScroll'	=> 3
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs_with_featured_product( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_with_bg_v5' ) ) {
	/**
	 *
	 */
	function techmarket_products_carousel_with_bg_v5() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v5 	= techmarket_get_home_v5_meta();
			$pcwb_options = $home_v5['pcwb'];

			$is_enabled = isset( $pcwb_options['is_enabled'] ) ? $pcwb_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcwb_options['animation'] ) ? $pcwb_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_with_bg_v5_args', array(
				'animation'		    => $animation,
				'section_title'		=> isset( $pcwb_options['section_title'] ) ? $pcwb_options['section_title'] : wp_kses_post( __( 'Make <br>dreams <br><span>your reality</span>', 'techmarket' ) ),
				'section_class'		=> '',
				'image'				=> isset( $pcwb_options['image'] ) && intval( $pcwb_options['image'] ) ? wp_get_attachment_image_src( $pcwb_options['image'], array( '275', '174' ) ) : false,
				'shortcode_tag'		=> isset( $pcwb_options['shortcode_content']['shortcode'] ) ? $pcwb_options['shortcode_content']['shortcode'] :'recent_products',
				'shortcode_atts'	=> isset( $pcwb_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwb_options['shortcode_content'] ) : array( 'columns' => '6' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pcwb_options['carousel_args']['slidesToShow'] ) ? intval( $pcwb_options['carousel_args']['slidesToShow'] ) : 6,
					'slidesToScroll'	=> isset( $pcwb_options['carousel_args']['slidesToScroll'] ) ? intval( $pcwb_options['carousel_args']['slidesToScroll'] ) : 6,
					'dots'				=> isset( $pcwb_options['carousel_args']['dots'] ) ? filter_var( $pcwb_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcwb_options['carousel_args']['arrows'] ) ? filter_var( $pcwb_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 4,
								'slidesToScroll'	=> 4
							)
						)
					)
				)
			) );

			techmarket_products_carousel_with_bg( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v5' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */

	function techmarket_products_carousel_tabs_v5() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v5 	= techmarket_get_home_v5_meta();
			$ltp_options = $home_v5['ltp'];

			$is_enabled = isset( $ltp_options['is_enabled'] ) ? $ltp_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ltp_options['animation'] ) ? $ltp_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v5_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $ltp_options['section_title'] ) ? $ltp_options['section_title'] : esc_html__( 'Best Rated Sellers', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-carousel-tab',
				'tabs' 				=> array(
					array(
						'title'				=> isset( $ltp_options['tabs'][0]['title'] ) ? $ltp_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> isset( $ltp_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $ltp_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $ltp_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ltp_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => 4, 'per_page' => 8, 'template' => 'content-landscape-product'  )
					),
					array(
						'title'				=> isset( $ltp_options['tabs'][1]['title'] ) ? $ltp_options['tabs'][1]['title'] : esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $ltp_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $ltp_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $ltp_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ltp_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => 4, 'per_page' => 8, 'template' => 'content-landscape-product' )
					),
					array(
						'title'				=> isset( $ltp_options['tabs'][2]['title'] ) ? $ltp_options['tabs'][2]['title'] : esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $ltp_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $ltp_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $ltp_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ltp_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => 4, 'per_page' => 8, 'template' => 'content-landscape-product' )
					),
					array(
						'title'				=> isset( $ltp_options['tabs'][3]['title'] ) ? $ltp_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $ltp_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $ltp_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $ltp_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ltp_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => 4, 'per_page' => 8, 'template' => 'content-landscape-product' )
					),
				),
				'carousel_args'	=> array(
					'rows'				=> isset( $ltp_options['carousel_args']['rows'] ) ? intval( $ltp_options['carousel_args']['rows'] ) : 2,
					'slidesPerRow'		=> isset( $ltp_options['carousel_args']['slidesPerRow'] ) ? intval( $ltp_options['carousel_args']['slidesPerRow'] ) : 4,
					'slidesToShow'		=> isset( $ltp_options['carousel_args']['slidesToShow'] ) ? intval( $ltp_options['carousel_args']['slidesToShow'] ) : 4,
					'slidesToScroll'	=> isset( $ltp_options['carousel_args']['slidesToScroll'] ) ? intval( $ltp_options['carousel_args']['slidesToScroll'] ) : 4,
					'dots'				=> isset( $ltp_options['carousel_args']['dots'] ) ? filter_var( $ltp_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $ltp_options['carousel_args']['arrows'] ) ? filter_var( $ltp_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(

						array(
							'breakpoint'	=> 780,
							'settings'		=> array(
								'rows'				=> 2,
								'slidesPerRow'		=> 2,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'rows'				=> 2,
								'slidesPerRow'		=> 3,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'rows'				=> 2,
								'slidesPerRow'		=> 3,
								'slidesToScroll'	=> 1
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_brands_carousel_v5' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v5() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v5 	= techmarket_get_home_v5_meta();
			$bc_options = $home_v5['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v5_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v5_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_v5_carousel_args', array(
				'slidesToShow'	=> isset( $bc_options['carousel_args']['slidesToShow'] ) ? intval( $bc_options['carousel_args']['slidesToShow'] ) : 6,
				'slidesToScroll'=> isset( $bc_options['carousel_args']['slidesToScroll'] ) ? intval( $bc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'			=> isset( $bc_options['carousel_args']['dots'] ) ? filter_var( $bc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'		=> isset( $bc_options['carousel_args']['arrows'] ) ? filter_var( $bc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'responsive'	=> array(
					array(
						'breakpoint'	=> 380,
						'settings'		=> array(
							'slidesToShow'		=> 1,
							'slidesToScroll'	=> 1
						)
					),
					array(
						'breakpoint'	=> 480,
						'settings'		=> array(
							'slidesToShow'		=> 2,
							'slidesToScroll'	=> 2
						)
					),
					array(
						'breakpoint'	=> 750,
						'settings'		=> array(
							'slidesToShow'		=> 3,
							'slidesToScroll'	=> 3
						)
					),
					array(
						'breakpoint'	=> 1200,
						'settings'		=> array(
							'slidesToShow'		=> 4,
							'slidesToScroll'	=> 4
						)
					),
					array(
						'breakpoint'	=> 1400,
						'settings'		=> array(
							'slidesToShow'		=> 5,
							'slidesToScroll'	=> 5
						)
					)
				)
			) );

			techmarket_brands_carousel( $section_args , $taxonomy_args , $carousel_args );
		}
	}
}

if( ! function_exists( 'techmarket_home_v5_hook_control' ) ) {
	function techmarket_home_v5_hook_control() {
		if( is_page_template( array( 'template-homepage-v5.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v5' );

			$home_v5 = techmarket_get_home_v5_meta();
			add_action( 'techmarket_homepage_v5', 'techmarket_init_structured_data',								5 );
			add_action( 'techmarket_homepage_v5', 'techmarket_slider_with_banners_v5',								isset( $home_v5['swb']['priority'] ) ? intval( $home_v5['swb']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v5', 'techmarket_product_categories_carousel_v5',						isset( $home_v5['catc']['priority'] ) ? intval( $home_v5['catc']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v5', 'techmarket_products_carousel_with_tabs_carousel_v5',				isset( $home_v5['pcwtc']['priority'] ) ? intval( $home_v5['pcwtc']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v5', 'techmarket_fullwidth_notice_v5',									isset( $home_v5['ntc']['priority'] ) ? intval( $home_v5['ntc']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v5', 'techmarket_deals_carousel_v5',									isset( $home_v5['dpc']['priority'] ) ? intval( $home_v5['dpc']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v5', 'techmarket_products_carousel_vertical_tabs_v5',					isset( $home_v5['vpc']['priority'] ) ? intval( $home_v5['vpc']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v5', 'techmarket_full_width_banner_v5',								isset( $home_v5['sbr']['priority'] ) ? intval( $home_v5['sbr']['priority'] ) : 70 );
			add_action( 'techmarket_homepage_v5', 'techmarket_products_carousel_tabs_with_featured_product_v5',		isset( $home_v5['pcwfp']['priority'] ) ? intval( $home_v5['pcwfp']['priority'] ) : 80 );
			add_action( 'techmarket_homepage_v5', 'techmarket_products_carousel_with_bg_v5',						isset( $home_v5['pcwb']['priority'] ) ? intval( $home_v5['pcwb']['priority'] ) : 90 );
			add_action( 'techmarket_homepage_v5', 'techmarket_products_carousel_tabs_v5',							isset( $home_v5['ltp']['priority'] ) ? intval( $home_v5['ltp']['priority'] ) : 100 );
			add_action( 'techmarket_homepage_v5', 'techmarket_homepage_content',									200 );
		}
	}
}
