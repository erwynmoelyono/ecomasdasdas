<?php
/**
 * Template tags used in home page v6
 *
 * @package techmarket
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v6_options() {
	$home_v6 = array(
		'swb'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'sdr_shortcode'		=> '',
			'br1' 				=> array(
				'title'			=> wp_kses_post( __( 'New Arrivals <br> in <strong>Accessories</strong> <br> at Best Prices', 'techmarket' ) ),
				'action_link'	=> '#',
				'price'			=> wp_kses_post( __( '<span class="start_price">from</span>$13.79', 'techmarket' ) ),
				'bg_choice'		=> 'image'
			),
			'br2'  				=> array(
				'pre_title'		=> esc_html__( 'Feat Category', 'techmarket' ),
				'title'			=> wp_kses_post( __( 'catch Best <br><strong>Deals</strong>on the <br> Curved TVs<br>Entertainment', 'techmarket' ) ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image',
			),
			'br3'  				=> array(
				'title'			=> wp_kses_post( __( '<strong>20% Off Tech</strong> <br> at Ultrabooks, <br> Laptops, Tablets<br>Notebooks &<br>More', 'techmarket' ) ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br4'  				=> array(
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
			'section_title'		=> wp_kses_post( __( 'Top<br> categories <br>this week', 'techmarket' ) ),
			'header_custom_nav'	=> 'yes',
			'number'			=> 12,
			'columns'			=> 6,
			'slugs'				=> '',
			'carousel_args' 	=> array(
				'slidesToShow'		=> 6,
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
						'columns'		=> '2'
					)
				),
				'carousel_args'		=> array(
					'slidesToShow'		=>  2,
					'slidesToScroll'	=>  2,
					'dots'				=>  'no',
					'arrows'			=>  'yes',
					'prevArrow'			=>  '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=>  '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			),
			'pct'	=> array(
				'section_title'		=> '',
				'header_custom_nav'	=> 'yes',
				'tabs' 				=> array(
					array(
						'title'				=> esc_html__( 'New Arrivals', 'techmarket' ),
						'shortcode_content'	=> array(
						'shortcode'			=> 'recent_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'On Sale', 'techmarket' ),
						'shortcode_content'	=> array(
						'shortcode'			=> 'featured_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Best Rated', 'techmarket' ),
						'shortcode_content'	=> array(
						'shortcode'			=> 'sale_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4'
							)
						)
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> 4,
					'slidesToScroll'	=> 4,
					'dots'				=> 'no',
					'arrows'			=> 'yes',
					'prevArrow'			=>  '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=>  '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			)
		),
		'pcwb'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( 'Today Deals <br><span>hurry up!</span>', 'techmarket' ) ),
			'header_timer'		=> 'yes',
			'timer_value'		=> '',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '6',
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 6,
				'slidesToScroll'	=> 6,
				'dots'				=> 'yes',
				'arrows'			=> 'no'
			)
		),
		'lfpc'  =>  array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'section_title'		=> esc_html__( '4K Ultra HD Televisions', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '2',
					'template' 		=> 'content-landscape-product-card-featured'
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 2,
				'slidesToScroll'	=> 2,
				'dots'				=> 'yes',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'pc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Cell Phones & Tablets', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'=> array(
					'columns'	=> '6',
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 6,
				'slidesToScroll'	=> 6,
				'dots'				=> 'yes',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'sbr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 70,
			'animation'			=> '',
			'title'				=> wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
			'sub_title'			=> esc_html__( 'Travel upto 22km in a single charge.', 'techmarket' ),
			'action_text'		=> wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'		=> '#',
			'bg_choice'			=> 'image'
		),
		'pct'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 80,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Wearable Gadgets 2017', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Best Choice', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'=> array(
							'columns'	=> '7',
							'per_page' 	=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Smartwatches', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '7',
							'per_page' 	=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Virtual Reality', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '7',
							'per_page' 	=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Accessories', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'=> array(
							'columns'	=> '7',
							'per_page' 	=> '7'
						)
					),
				),
			),
			'carousel_args'			=> array(
				'slidesToShow'		=> 7,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 7
			)
		),
		'ntc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 90,
			'animation'			=> '',
			'notice_info'		=> esc_html__( 'Download our new app today! Easily reorder products, scan your rewards and shop with Apple Play.', 'techmarket' )
		),
		'pcwfp'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 100,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Cameras &amp; Camcoders', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Top 20', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'		=> '5'
						)
					),
					'shortcode_content_featured'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'Digital Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'		=> '5'
						)
					),
					'shortcode_content_featured'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'Action Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'		=> '5'
						)
					),
					'shortcode_content_featured'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'Compacts', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'		=> '5'
						)
					),
					'shortcode_content_featured'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'	=> array()
					),
				)
			),
			'carousel_args'			=> array(
				'rows'				=> 2,
				'slidesPerRow'		=> 5,
				'slidesToShow'		=> 1,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 1
			)
		),
		'ltp'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 110,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Best Rated Sellers', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Top 20', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4',
							'per_page' 		=> '8',
							'template' 		=> 'content-landscape-product'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4',
							'per_page' 		=> '8',
							'template' 		=> 'content-landscape-product'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4',
							'per_page' 		=> '8',
							'template' 		=> 'content-landscape-product'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4',
							'per_page' 		=> '8',
							'template' 		=> 'content-landscape-product'
						)
					),
				),
			),
			'carousel_args'			=> array(
				'slidesToShow'		=> 4,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 4
			)
		),
		'bc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 120,
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
		),

	);

	return apply_filters( 'techmarket_get_default_home_v6_options', $home_v6 );
}

function techmarket_get_home_v6_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v6_options = get_post_meta( $post->ID, '_home_v6_options', true );
		$home_v6_options = maybe_unserialize( $clean_home_v6_options );

		if( ! is_array( $home_v6_options ) ) {
			$home_v6_options = json_decode( $clean_home_v6_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v6_options();
			$home_v6 = wp_parse_args( $home_v6_options, $default_options );
		} else {
			$home_v6 = $home_v6_options;
		}

		return apply_filters( 'techmarket_home_v6_meta', $home_v6, $post );
	}
}



if ( ! function_exists( 'techmarket_revslider_v6' ) ) {
	/**
	 * Displays Slider in Home v6
	 */
	function techmarket_revslider_v6() {

		$home_v6 	= techmarket_get_home_v6_meta();

		$is_enabled = isset( $home_v6['swb']['is_enabled'] ) ? $home_v6['swb']['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $home_v6['swb']['animation'] ) ? $home_v6['swb']['animation'] : '';
		$shortcode = !empty( $home_v6['swb']['sdr_shortcode'] ) ? $home_v6['swb']['sdr_shortcode'] : '[rev_slider alias="home-v6-slider"]';

		$section_class = 'home-v6-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_home_v6_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_slider_with_banners_v6' ) ) {
	/**
	 *
	 */
	function techmarket_slider_with_banners_v6() {

		$home_v6 	= techmarket_get_home_v6_meta();
		$swb_options = $home_v6['swb'];
		$br1_options = $swb_options['br1'];
		$br2_options = $swb_options['br2'];
		$br3_options = $swb_options['br3'];
		$br4_options = $swb_options['br4'];

		$is_enabled = isset( $swb_options['is_enabled'] ) ? $swb_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $swb_options['animation'] ) ? $swb_options['animation'] : '';

		$banner_1_args = apply_filters( 'techmarket_slider_with_banners_v6_banner_1_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __( 'New Arrivals <br> in <strong>Accessories</strong> <br> at Best Prices', 'techmarket' ) ),
			'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
			'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '300', '204' ) ) : array( '//placehold.it/300x204', '300', '204' ),
			'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
			'price'			=> isset( $br1_options['price'] ) ? $br1_options['price'] : wp_kses_post( __( '<span class="start_price">from</span>$13.79', 'techmarket' ) ),
			'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
			'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : ''
		) );

		$banner_2_args = apply_filters( 'techmarket_slider_with_banners_v6_banner_2_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'pre_title'		=> isset( $br2_options['pre_title'] ) ? $br2_options['pre_title'] : esc_html__( 'Feat Category', 'techmarket' ),
			'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( 'catch Best <br><strong>Deals</strong>on the <br> Curved TVs<br>Entertainment', 'techmarket' ) ),
			'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
			'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '300', '204' ) ) : array( '//placehold.it/300x204', '300', '204' ),
			'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
			'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : ''
		) );

		$banner_3_args = apply_filters( 'techmarket_slider_with_banners_v6_banner_3_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'title'			=> isset( $br3_options['title'] ) ? $br3_options['title'] : wp_kses_post( __( '<strong>20% Off Tech</strong> <br> at Ultrabooks, <br> Laptops, Tablets<br>Notebooks &<br>More', 'techmarket' ) ),
			'action_link'	=> isset( $br3_options['action_link'] ) ? $br3_options['action_link'] : '#',
			'bg_image'		=> isset( $br3_options['bg_image'] ) && intval( $br3_options['bg_image'] ) ? wp_get_attachment_image_src( $br3_options['bg_image'], array( '300', '204' ) ) : array( '//placehold.it/300x204', '300', '204' ),
			'bg_choice'		=> isset( $br3_options['bg_choice'] ) ? $br3_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br3_options['bg_color'] ) ? $br3_options['bg_color'] : '',
			'bg_height' 	=> isset( $br3_options['bg_height'] ) ? $br3_options['bg_height'] : ''
		) );

		$banner_4_args = apply_filters( 'techmarket_slider_with_banners_v6_banner_4_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'pre_title'		=> isset( $br4_options['pre_title'] ) ? $br4_options['pre_title'] : esc_html__( 'Best Gift Idea', 'techmarket' ),
			'title'			=> isset( $br4_options['title'] ) ? $br4_options['title'] : wp_kses_post( __( 'Mini Two Wheel <br><strong>Self Balancing</strong> <br> Scooter', 'techmarket' ) ),
			'price'			=> isset( $br4_options['price'] ) ? $br4_options['price'] : '<ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>339.99</span></ins> <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>689</span></del>',
			'action_link'	=> isset( $br4_options['action_link'] ) ? $br4_options['action_link'] : '#',
			'bg_image'		=> isset( $br4_options['bg_image'] ) && intval( $br4_options['bg_image'] ) ? wp_get_attachment_image_src( $br4_options['bg_image'], array( '300', '204' ) ) : array( '//placehold.it/300x204', '300', '204' ),
			'bg_choice'		=> isset( $br4_options['bg_choice'] ) ? $br4_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br4_options['bg_color'] ) ? $br4_options['bg_color'] : '',
			'bg_height' 	=> isset( $br4_options['bg_height'] ) ? $br4_options['bg_height'] : ''
		) );

		?><div class="homev6-slider-with-banners row">
			<div class="slider-block column-1">
				<?php techmarket_revslider_v6(); ?>
			</div>
			<div class="banners-block column-2">
				<?php techmarket_banner( $banner_1_args ); ?>
				<?php techmarket_banner( $banner_2_args ); ?>
				<?php techmarket_banner( $banner_3_args ); ?>
				<?php techmarket_banner( $banner_4_args ); ?>
			</div>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_product_categories_carousel_v6' ) ) {
	/**
	 *
	 */
	function techmarket_product_categories_carousel_v6() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v6 	= techmarket_get_home_v6_meta();
			$catc_options = $home_v6['catc'];

			$is_enabled = isset( $catc_options['is_enabled'] ) ? $catc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $catc_options['animation'] ) ? $catc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_product_categories_carousel_v6_section_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'section-top-categories',
				'section_title'		=> isset( $catc_options['section_title'] ) ? $catc_options['section_title'] : wp_kses_post( __( 'Top categories <br>this week', 'techmarket' ) ),
				'header_custom_nav'	=> isset( $catc_options['header_custom_nav'] ) ? filter_var( $catc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true
			) );

			$taxonomy_args = apply_filters( 'techmarket_product_categories_carousel_v6_taxonomy_args', array(
				'number'		=> isset( $catc_options['number'] ) ? $catc_options['number'] : 12,
				'columns'		=> isset( $catc_options['columns'] ) ? $catc_options['columns'] : 6,
				'slugs'			=> isset( $catc_options['slugs'] ) ? $catc_options['slugs'] : '',
			) );

			$carousel_args = apply_filters( 'techmarket_product_categories_carousel_v6_carousel_args', array(
				'slidesToShow'		=> isset( $catc_options['carousel_args']['slidesToShow'] ) ? intval( $catc_options['carousel_args']['slidesToShow'] ) : 6,
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
							'slidesToShow'		=> 4,
							'slidesToScroll'	=> 4
						)
					)
				)
			) );

			techmarket_product_categories_carousel( $section_args , $taxonomy_args , $carousel_args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_with_tabs_carousel_v6' ) ) {
	function techmarket_products_carousel_with_tabs_carousel_v6() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v6 	 = techmarket_get_home_v6_meta();
			$pc_options  = $home_v6['pcwtc']['pc'];
			$pct_options = $home_v6['pcwtc']['pct'];

			$is_enabled  = isset( $home_v6['pcwtc']['is_enabled'] ) ? $home_v6['pcwtc']['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $home_v6['pcwtc']['animation'] ) ? $home_v6['pcwtc']['animation'] : '';

			$pc_args = apply_filters( 'techmarket_pcwtc_v6_pc_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pc_options['section_title'] ) ? $pc_options['section_title'] : esc_html__( 'Trending Now', 'techmarket' ),
				'section_class'		=> 'column-1 section-double-carousel',
				'header_custom_nav'	=> isset( $pc_options['header_custom_nav'] ) ? filter_var( $pc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $pc_options['shortcode_content']['shortcode'] ) ? $pc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pc_options['shortcode_content'] ) : array( 'columns' => '2' ),
				'carousel_args'		=> array(
					'slidesToShow'		=>  isset( $pc_options['carousel_args']['slidesToShow'] ) ? intval( $pc_options['carousel_args']['slidesToShow'] ) : 2,
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
						),
						array(
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						)
					)
				)
			) );

			$products_carousel_tabs_args = apply_filters( 'techmarket_pcwtc_v6_products_carousel_tabs_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pct_options['section_title'] ) ? $pct_options['section_title'] : '',
				'section_class'		=> 'column-2',
				'tabs' 				=> array(
					array(
						'title'				=> isset( $pct_options['tabs'][0]['title'] ) ? $pct_options['tabs'][0]['title'] : esc_html__( 'New Arrivals', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '4' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][1]['title'] ) ? $pct_options['tabs'][1]['title'] : esc_html__( 'On Sale', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '4' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][2]['title'] ) ? $pct_options['tabs'][2]['title'] : esc_html__( 'Best Rated', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '4' )

					)
				),
				'carousel_args'			=> array(
					'slidesToShow'		=> isset( $pct_options['carousel_args']['slidesToShow'] ) ? intval( $pct_options['carousel_args']['slidesToShow'] ) : 4,
					'slidesToScroll'	=> isset( $pct_options['carousel_args']['slidesToScroll'] ) ? intval( $pct_options['carousel_args']['slidesToScroll'] ) : 4,
					'dots'				=> isset( $pct_options['carousel_args']['dots'] ) ? filter_var( $pct_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $pct_options['carousel_args']['arrows'] ) ? filter_var( $pct_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $pct_options['carousel_args']['prevArrow'] ) ? $pct_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $pct_options['carousel_args']['nextArrow'] ) ? $pct_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 800,
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

if ( ! function_exists( 'techmarket_products_carousel_with_bg_v6' ) ) {
	/**
	 *
	 */
	function techmarket_products_carousel_with_bg_v6() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v6 	= techmarket_get_home_v6_meta();
			$pcwb_options = $home_v6['pcwb'];

			$is_enabled = isset( $pcwb_options['is_enabled'] ) ? $pcwb_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcwb_options['animation'] ) ? $pcwb_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_with_bg_v6_args', array(
				'animation'		    => $animation,
				'section_title'		=> isset( $pcwb_options['section_title'] ) ? $pcwb_options['section_title'] : wp_kses_post( __( '<strong>Today Deals</strong> <br>hurry up!', 'techmarket' ) ),
				'section_class'		=> '',
				'image'				=> isset( $pcwb_options['image'] ) && intval( $pcwb_options['image'] ) ? wp_get_attachment_image_src( $pcwb_options['image'], array( '275', '174' ) ) : false,
				'shortcode_tag'		=> isset( $pcwb_options['shortcode_content']['shortcode'] ) ? $pcwb_options['shortcode_content']['shortcode'] :'recent_products',
				'shortcode_atts'	=> isset( $pcwb_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwb_options['shortcode_content'] ) : array( 'columns' => '6' ),
				'header_timer'      => isset( $pcwb_options['header_timer'] ) ? filter_var( $pcwb_options['header_timer'], FILTER_VALIDATE_BOOLEAN ) : true,
				'timer_value'		=> isset( $pcwb_options['timer_value'] ) ? $pcwb_options['timer_value'] : '',
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pcwb_options['carousel_args']['slidesToShow'] ) ? intval( $pcwb_options['carousel_args']['slidesToShow'] ) : 6,
					'slidesToScroll'	=> isset( $pcwb_options['carousel_args']['slidesToScroll'] ) ? intval( $pcwb_options['carousel_args']['slidesToScroll'] ) : 6,
					'dots'				=> isset( $pcwb_options['carousel_args']['dots'] ) ? filter_var( $pcwb_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcwb_options['carousel_args']['arrows'] ) ? filter_var( $pcwb_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 800,
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

if ( ! function_exists( 'techmarket_products_landscape_with_gallery_v6' ) ) {

	function techmarket_products_landscape_with_gallery_v6() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v6 	= techmarket_get_home_v6_meta();
			$lfpc_options = $home_v6['lfpc'];

			$is_enabled = isset( $lfpc_options['is_enabled'] ) ? $lfpc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $lfpc_options['animation'] ) ? $lfpc_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_landscape_with_gallery_v6_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lfpc_options['section_title'] ) ? $lfpc_options['section_title'] : esc_html__( '4K Ultra HD Televisions', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-carousel section-landscape-products-carousel-with-thumbnails',
				'header_custom_nav'	=> isset( $lfpc_options['header_custom_nav'] ) ? filter_var( $lfpc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $lfpc_options['shortcode_content']['shortcode'] ) ? $lfpc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $lfpc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lfpc_options['shortcode_content'] ) : array( 'columns' => '2' , 'template' => 'content-landscape-product-card-featured' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $lfpc_options['carousel_args']['slidesToShow'] ) ? intval( $lfpc_options['carousel_args']['slidesToShow'] ) : 2,
					'slidesToScroll'	=> isset( $lfpc_options['carousel_args']['slidesToScroll'] ) ? intval( $lfpc_options['carousel_args']['slidesToScroll'] ) : 2,
					'dots'				=> isset( $lfpc_options['carousel_args']['dots'] ) ? filter_var( $lfpc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $lfpc_options['carousel_args']['arrows'] ) ? filter_var( $lfpc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $lfpc_options['carousel_args']['prevArrow'] ) ? $lfpc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $lfpc_options['carousel_args']['nextArrow'] ) ? $lfpc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
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

			techmarket_products_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_block_v6_1' ) ) {

	function techmarket_products_carousel_block_v6_1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v6 	= techmarket_get_home_v6_meta();
			$pc_options = $home_v6['pc'];

			$is_enabled = isset( $pc_options['is_enabled'] ) ? $pc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pc_options['animation'] ) ? $pc_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v6_1_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pc_options['section_title'] ) ? $pc_options['section_title'] : esc_html__( 'Cell Phones & Tablets', 'techmarket' ),
				'section_class'		=> '',
				'header_custom_nav'	=> isset( $pc_options['header_custom_nav'] ) ? filter_var( $pc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $pc_options['shortcode_content']['shortcode'] ) ? $pc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pc_options['shortcode_content'] ) : array( 'columns' => '6' ),
				'carousel_args'		=>  array(
					'slidesToShow'		=> isset( $pc_options['carousel_args']['slidesToShow'] ) ? intval( $pc_options['carousel_args']['slidesToShow'] ) : 6,
					'slidesToScroll'	=> isset( $pc_options['carousel_args']['slidesToScroll'] ) ? intval( $pc_options['carousel_args']['slidesToScroll'] ) : 6,
					'dots'				=> isset( $pc_options['carousel_args']['dots'] ) ? filter_var( $pc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pc_options['carousel_args']['arrows'] ) ? filter_var( $pc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $pc_options['carousel_args']['prevArrow'] ) ? $pc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $pc_options['carousel_args']['nextArrow'] ) ? $pc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
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
								'slidesToShow'		=> 4,
								'slidesToScroll'	=> 4
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 5,
								'slidesToScroll'	=> 5
							)
						)
					)
				)
			) );

			techmarket_products_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_full_width_banner_v6' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_full_width_banner_v6() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v6 	= techmarket_get_home_v6_meta();
			$sbr_options = $home_v6['sbr'];

			$is_enabled = isset( $sbr_options['is_enabled'] ) ? $sbr_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $sbr_options['animation'] ) ? $sbr_options['animation'] : '';

			$args = apply_filters( 'techmarket_full_width_banner_v6_args', array(
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

if ( ! function_exists( 'techmarket_products_carousel_tabs_v6_1' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */

	function techmarket_products_carousel_tabs_v6_1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v6 	= techmarket_get_home_v6_meta();
			$pct_options = $home_v6['pct'];

			$is_enabled = isset( $pct_options['is_enabled'] ) ? $pct_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct_options['animation'] ) ? $pct_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v6_1_args', array(
				'animation'			=> $animation,
				'section_title'	=> isset( $pct_options['section_title'] ) ? $pct_options['section_title'] : esc_html__( 'Wearable Gadgets 2017', 'techmarket' ),
				'section_class'	=> 'section-hot-new-arrivals',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct_options['tabs'][0]['title'] ) ? $pct_options['tabs'][0]['title'] : esc_html__( 'Best Choice', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => 7, 'per_page' => 7 )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][1]['title'] ) ? $pct_options['tabs'][1]['title'] : esc_html__( 'Smartwatches', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => 7, 'per_page' => 7 )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][2]['title'] ) ? $pct_options['tabs'][2]['title'] : esc_html__( 'Virtual Reality', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => 7, 'per_page' => 7 )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][3]['title'] ) ? $pct_options['tabs'][3]['title'] : esc_html__( 'Accessories', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => 7, 'per_page' => 7 )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct_options['carousel_args']['slidesToShow'] ) ? intval( $pct_options['carousel_args']['slidesToShow'] ) : 7,
					'slidesToScroll'	=> isset( $pct_options['carousel_args']['slidesToScroll'] ) ? intval( $pct_options['carousel_args']['slidesToScroll'] ) : 7,
					'dots'				=> isset( $pct_options['carousel_args']['dots'] ) ? filter_var( $pct_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct_options['carousel_args']['arrows'] ) ? filter_var( $pct_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
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
								'slidesToShow'		=> 4,
								'slidesToScroll'	=> 4
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 5,
								'slidesToScroll'	=> 5
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_fullwidth_notice_v6' ) ) {
	function techmarket_fullwidth_notice_v6() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v6 	= techmarket_get_home_v6_meta();
			$ntc_options = $home_v6['ntc'];

			$is_enabled = isset( $ntc_options['is_enabled'] ) ? $ntc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ntc_options['animation'] ) ? $ntc_options['animation'] : '';

			$args = apply_filters( 'techmarket_fullwidth_notice_v6_args', array(
				'animation'		    => $animation,
				'notice_info'		=> isset( $ntc_options['notice_info'] ) ? $ntc_options['notice_info'] : esc_html__( 'Download our new app today! Easily reorder products, scan your rewards and shop with Apple Play.', 'techmarket' )
			) );

			techmarket_fullwidth_notice( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_with_featured_product_v6' ) ) {

	function techmarket_products_carousel_tabs_with_featured_product_v6() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v6 	= techmarket_get_home_v6_meta();
			$pcwfp_options = $home_v6['pcwfp'];

			$is_enabled = isset( $pcwfp_options['is_enabled'] ) ? $pcwfp_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcwfp_options['animation'] ) ? $pcwfp_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_with_featured_product_v6_args', array(
				'animation'			=> $animation,
				'section_class'		=> 'type-2',
				'section_title'		=> isset( $pcwfp_options['section_title'] ) ? $pcwfp_options['section_title'] : esc_html__( 'Cameras & Camcoders', 'techmarket' ),
				'header_nav_align'	=> 'justify-content-center',
				'tabs' 				=> array(
					array(
						'title'						=> isset( $pcwfp_options['tabs'][0]['title'] ) ? $pcwfp_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '5' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][0]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][0]['shortcode_content_featured']['shortcode'] : 'recent_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][0]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][0]['shortcode_content_featured'] ) : array()
					),
					array(
						'title'						=> isset( $pcwfp_options['tabs'][1]['title'] ) ? $pcwfp_options['tabs'][1]['title'] : esc_html__( 'Digital Cameras', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '5' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][1]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][1]['shortcode_content_featured']['shortcode'] : 'featured_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][1]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][1]['shortcode_content_featured'] ) : array()
					),
					array(
						'title'						=> isset( $pcwfp_options['tabs'][2]['title'] ) ? $pcwfp_options['tabs'][2]['title'] : esc_html__( 'Action Cameras', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '5' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][2]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][2]['shortcode_content_featured']['shortcode'] : 'sale_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][2]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][2]['shortcode_content_featured'] ) : array()
					),
					array(
						'title'						=> isset( $pcwfp_options['tabs'][3]['title'] ) ? $pcwfp_options['tabs'][3]['title'] : esc_html__( 'Compacts', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '5' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][3]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][3]['shortcode_content_featured']['shortcode'] : 'top_rated_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][3]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][3]['shortcode_content_featured'] ) : array()
					),
				),
				'carousel_args'	=> array(
					'rows'				=> isset( $pcwfp_options['carousel_args']['rows'] ) ? intval( $pcwfp_options['carousel_args']['rows'] ) : 2,
					'slidesPerRow'		=> isset( $pcwfp_options['carousel_args']['slidesPerRow'] ) ? intval( $pcwfp_options['carousel_args']['slidesPerRow'] ) : 5,
					'slidesToShow'		=> isset( $pcwfp_options['carousel_args']['slidesToShow'] ) ? intval( $pcwfp_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $pcwfp_options['carousel_args']['slidesToScroll'] ) ? intval( $pcwfp_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $pcwfp_options['carousel_args']['dots'] ) ? filter_var( $pcwfp_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcwfp_options['carousel_args']['arrows'] ) ? filter_var( $pcwfp_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								// 'rows'				=> 1,
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
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesPerRow'		=> 4,
								'slidesToScroll'	=> 4
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs_with_featured_product( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v6_2' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */

	function techmarket_products_carousel_tabs_v6_2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v6 	= techmarket_get_home_v6_meta();
			$ltp_options = $home_v6['ltp'];

			$is_enabled = isset( $ltp_options['is_enabled'] ) ? $ltp_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ltp_options['animation'] ) ? $ltp_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v6_2_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $ltp_options['section_title'] ) ? $ltp_options['section_title'] : esc_html__( 'Best Rated Sellers', 'techmarket' ),
				'section_class'	=> 'section-landscape-products-carousel-tab',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $ltp_options['tabs'][0]['title'] ) ? $ltp_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> isset( $ltp_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $ltp_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $ltp_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ltp_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => 4, 'per_page' => 4, 'template' => 'content-landscape-product' )
					),
					array(
						'title'				=> isset( $ltp_options['tabs'][1]['title'] ) ? $ltp_options['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $ltp_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $ltp_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $ltp_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ltp_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => 4, 'per_page' => 4, 'template' => 'content-landscape-product' )
					),
					array(
						'title'				=> isset( $ltp_options['tabs'][2]['title'] ) ? $ltp_options['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $ltp_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $ltp_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $ltp_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ltp_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => 4, 'per_page' => 4, 'template' => 'content-landscape-product' )
					),
					array(
						'title'				=> isset( $ltp_options['tabs'][3]['title'] ) ? $ltp_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $ltp_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $ltp_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $ltp_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ltp_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => 4, 'per_page' => 4, 'template' => 'content-landscape-product' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $ltp_options['carousel_args']['slidesToShow'] ) ? intval( $ltp_options['carousel_args']['slidesToShow'] ) : 4,
					'slidesToScroll'	=> isset( $ltp_options['carousel_args']['slidesToScroll'] ) ? intval( $ltp_options['carousel_args']['slidesToScroll'] ) : 4,
					'dots'				=> isset( $ltp_options['carousel_args']['dots'] ) ? filter_var( $ltp_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $ltp_options['carousel_args']['arrows'] ) ? filter_var( $ltp_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 900,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_brands_carousel_v6' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v6() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v6 	= techmarket_get_home_v6_meta();
			$bc_options = $home_v6['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v6_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v6_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_v6_carousel_args', array(
				'slidesToShow'	=> isset( $bc_options['carousel_args']['slidesToShow'] ) ? intval( $bc_options['carousel_args']['slidesToShow'] ) : 6,
				'slidesToScroll'=> isset( $bc_options['carousel_args']['slidesToScroll'] ) ? intval( $bc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'			=> isset( $bc_options['carousel_args']['dots'] ) ? filter_var( $bc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'		=> isset( $bc_options['carousel_args']['arrows'] ) ? filter_var( $bc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'responsive'		=> array(
					array(
						'breakpoint'	=> 480,
						'settings'		=> array(
							'slidesToShow'		=> 1,
							'slidesToScroll'	=> 1
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
					)
				)
			) );

			techmarket_brands_carousel( $section_args , $taxonomy_args , $carousel_args );
		}
	}
}

if( ! function_exists( 'techmarket_home_v6_hook_control' ) ) {
	function techmarket_home_v6_hook_control() {
		if( is_page_template( array( 'template-homepage-v6.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v6' );

			$home_v6 = techmarket_get_home_v6_meta();
			add_action( 'techmarket_homepage_v6', 'techmarket_init_structured_data',								5 );
			add_action( 'techmarket_homepage_v6', 'techmarket_slider_with_banners_v6',								isset( $home_v6['swb']['priority'] ) ? intval( $home_v6['swb']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v6', 'techmarket_product_categories_carousel_v6',						isset( $home_v6['catc']['priority'] ) ? intval( $home_v6['catc']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_with_tabs_carousel_v6',				isset( $home_v6['pcwtc']['priority'] ) ? intval( $home_v6['pcwtc']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_with_bg_v6',						isset( $home_v6['pcwb']['priority'] ) ? intval( $home_v6['pcwb']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v6', 'techmarket_products_landscape_with_gallery_v6',					isset( $home_v6['lfpc']['priority'] ) ? intval( $home_v6['lfpc']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_block_v6_1',						isset( $home_v6['pc']['priority'] ) ? intval( $home_v6['pc']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v6', 'techmarket_full_width_banner_v6',								isset( $home_v6['sbr']['priority'] ) ? intval( $home_v6['sbr']['priority'] ) : 70 );
			add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_tabs_v6_1',							isset( $home_v6['pct']['priority'] ) ? intval( $home_v6['pct']['priority'] ) : 80 );
			add_action( 'techmarket_homepage_v6', 'techmarket_fullwidth_notice_v6',									isset( $home_v6['ntc']['priority'] ) ? intval( $home_v6['ntc']['priority'] ) : 90 );
			add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_tabs_with_featured_product_v6',		isset( $home_v6['pcwfp']['priority'] ) ? intval( $home_v6['pcwfp']['priority'] ) : 100 );
			add_action( 'techmarket_homepage_v6', 'techmarket_products_carousel_tabs_v6_2',							isset( $home_v6['ltp']['priority'] ) ? intval( $home_v6['ltp']['priority'] ) : 110 );
			add_action( 'techmarket_homepage_v6', 'techmarket_homepage_content',									200 );
		}
	}
}
