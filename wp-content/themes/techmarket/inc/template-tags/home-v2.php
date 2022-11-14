<?php
/**
 * Template tags used in home page v2
 *
 * @package techmarket
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v2_options() {
	$home_v2 = array(
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
			'section_title'		=> wp_kses_post( __( 'Top <br>categories <br>this week', 'techmarket' ) ),
			'button_text'		=> esc_html__( 'Full Catalog', 'techmarket' ),
			'button_link'		=> '#',
			'number'			=> 7,
			'columns'			=> 7,
			'slugs'				=> '',
			'carousel_args'		=> array(
				'slidesToShow'		=> 7,
				'dots'				=> 'no',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 7
			)
		),
		'sost'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( 'Daily Deals! <span>Get our best prices.</span>', 'techmarket' ) ),
			'tabs' 				=> array(
				array(
					'title'		=> '-30%',
					'shortcode_content'	=> array(
						'shortcode'			=> 'recent_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> '-50%',
					'shortcode_content'	=> array(
						'shortcode'			=> 'sale_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> '-70%',
					'shortcode_content'	=> array(
						'shortcode'			=> 'featured_products',
						'shortcode_atts'	=> array()
					),
				)
			)
		),
		'ntc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'notice_info'		=> esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
		),
		'brs'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'br1'				=> array(
				'title'			=> wp_kses_post( __( 'New Arrivals<br> in <strong>Accessories</strong> <br> at Best Prices.', 'techmarket' ) ),
				'action_text'	=> esc_html__( 'View all', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br2'				=> array(
				'title'			=> wp_kses_post( __( 'Catch Hottest<br> <strong>Deals</strong> on the <br> Curved Soundbars.', 'techmarket' ) ),
				'action_text'	=> esc_html__( 'Browse', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br3'				=> array(
				'title'			=> wp_kses_post( __( '<strong>1000 mAh</strong> <br> Power Bank Pro', 'techmarket' ) ),
				'price'			=> '$34.99',
				'action_text'	=> esc_html__( 'Buy Now', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
		),
		'pct1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Hot New Arrivals', 'techmarket' ),
			'tabs' 			=> array(
				array(
					'title'				=> esc_html__( 'Top 20', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'			=> '7'
						)
					),
				),
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 7,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 7
			)
		),
		'ttot'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 70,
			'animation'			=> '',
			'section_title'	    => wp_kses_post( __('Hurry up! <span>Special Offers</span>', 'techmarket' ) ),
			'tabs' 			=> array(
				array(
					'title'				=> esc_html__( 'Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'recent_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'Audio', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'featured_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'GPS &amp; Navigation', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'sale_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'TV &amp; Video', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'top_rated_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'Cell Phones', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'best_selling_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'Computers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'recent_products',
						'shortcode_atts'	=> array()
					),
				),
				array(
					'title'				=> esc_html__( 'Accessories', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'sale_products',
						'shortcode_atts'	=> array()
					),
				)
			)
		),
		'pct2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 80,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Trending Now', 'techmarket' ),
			'tabs' 			=> array(
				array(
					'title'				=> esc_html__( 'Top 20', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'		=> '8'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'		=> '8'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'		=> '8'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'			=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'		=> '8'
						)
					),
				),
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 8,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 8
			)
		),
		'sbr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 90,
			'animation'			=> '',
			'title'				=> wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
			'sub_title'			=> esc_html__( 'Travel up to 22km in a single charge.', 'techmarket' ),
			'action_text'		=> wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'		=> '#',
			'bg_choice'			=> 'image'
		),
		'pcwb'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 100,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( 'Make <br>dreams <br><span>your reality.</span>', 'techmarket' ) ),
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '7',
				),
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 7,
				'slidesToScroll'	=> 7,
				'dots'				=> 'yes',
				'arrows'			=> 'no'
			)
		),
		'pcwtc'	=> array(
			'is_enabled'			=> 'yes',
			'priority'				=> 110,
			'animation'				=> '',
			'lpcw'					=> array(
				'section_title'		=> esc_html__( 'Hand picked for you', 'techmarket' ),
				'header_custom_nav'	=> 'yes',
				'shortcode_content'	=> array(
					'shortcode'		=> 'recent_products',
					'shortcode_atts'	=> array(
						'columns'		=> 2,
						'per_page'		=> 24,
						'template'		=> 'content-landscape-product-widget'
					),
				),
				'carousel_args'		=> array(
					'rows'			=> 6,
					'slidesPerRow'	=> 2,
					'slidesToShow'	=> 1,
					'slidesToScroll'=> 1,
					'dots'			=> 'no',
					'arrows'		=> 'yes',
					'prevArrow'		=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'		=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			),
			'pct1'				=> array(
				'section_title'	=> esc_html__( 'CES 2017 Arrivals', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'recent_products',
							'shortcode_atts'	=> array(
								'columns'			=> '5'
							)
						),
					),
					array(
						'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'featured_products',
							'shortcode_atts'	=> array(
								'columns'			=> '5'
							)
						),
					),
					array(
						'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'sale_products',
							'shortcode_atts'	=> array(
								'columns'			=> '5'
							)
						),
					),
					array(
						'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'top_rated_products',
							'shortcode_atts'	=> array(
								'columns'			=> '5'
							)
						),
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> 5,
					'slidesToScroll'	=> 5,
					'dots'				=> 'yes',
					'arrows'			=> 'no'
				)
			),
			'pct2'				=> array(
				'section_title' => esc_html__( 'Video Cameras', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> esc_html__( 'Best Choice', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'recent_products',
							'shortcode_atts'	=> array(
								'columns'			=> '5'
							)
						),
					),
					array(
						'title'				=> esc_html__( 'Action Cameras', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'featured_products',
							'shortcode_atts'	=> array(
								'columns'			=> '5'
							)
						),
					),
					array(
						'title'				=> esc_html__( 'Compacts', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'sale_products',
							'shortcode_atts'	=> array(
								'columns'			=> '5'
							)
						),
					),
					array(
						'title'				=> esc_html__( 'DSLR Cameras', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'top_rated_products',
							'shortcode_atts'	=> array(
								'columns'			=> '5'
							)
						),
					),
				),
				'carousel_args' => array(
					'slidesToShow'		=> 5,
					'slidesToScroll'	=> 5,
					'dots'				=> 'yes',
					'arrows'			=> 'no'
				)
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
		'lpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 130,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Recently viewed products', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '5',
					'template'		=> 'content-landscape-product',
				),
			),
			'carousel_args'		=> array(
				'slidesToShow'	=> 5,
				'slidesToScroll'=> 2,
				'dots'			=> 'yes',
				'arrows'		=> 'yes',
				'prevArrow'		=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'		=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		)
	);

	return apply_filters( 'techmarket_get_default_home_v2_options', $home_v2 );
}

function techmarket_get_home_v2_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v2_options = get_post_meta( $post->ID, '_home_v2_options', true );
		$home_v2_options = maybe_unserialize( $clean_home_v2_options );

		if( ! is_array( $home_v2_options ) ) {
			$home_v2_options = json_decode( $clean_home_v2_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v2_options();
			$home_v2 = wp_parse_args( $home_v2_options, $default_options );
		} else {
			$home_v2 = $home_v2_options;
		}

		return apply_filters( 'techmarket_home_v2_meta', $home_v2, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_v2' ) ) {
	/**
	 * Displays Slider in Home v2
	 */
	function techmarket_revslider_v2() {

		$home_v2 	= techmarket_get_home_v2_meta();

		$is_enabled = isset( $home_v2['swb']['is_enabled'] ) ? $home_v2['swb']['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $home_v2['swb']['animation'] ) ? $home_v2['swb']['animation'] : '';
		$shortcode = !empty( $home_v2['swb']['sdr_shortcode'] ) ? $home_v2['swb']['sdr_shortcode'] : '[rev_slider alias="home-v2-slider"]';

		$section_class = 'home-v2-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_home_v2_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_slider_with_banners_v2' ) ) {
	/**
	 *
	 */
	function techmarket_slider_with_banners_v2() {

		$home_v2 	= techmarket_get_home_v2_meta();
		$swb_options = $home_v2['swb'];
		$br1_options = $swb_options['br1'];
		$br2_options = $swb_options['br2'];

		$is_enabled = isset( $swb_options['is_enabled'] ) ? $swb_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $swb_options['animation'] ) ? $swb_options['animation'] : '';

		$banner_1_args = apply_filters( 'techmarket_slider_with_banners_v2_banner_1_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __( '<strong>20% Off Tech</strong> <br> at Ultrabooks, <br> Laptops, Tablets<br>Notebooks &<br>More', 'techmarket' ) ),
			'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
			'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '414', '256' ) ) : array( '//placehold.it/414x256', '414', '256' ),
			'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
			'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : ''
		) );

		$banner_2_args = apply_filters( 'techmarket_slider_with_banners_v2_banner_2_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'pre_title'		=> isset( $br2_options['pre_title'] ) ? $br2_options['pre_title'] : esc_html__( 'Best Gift Idea', 'techmarket' ),
			'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( 'Mini Two Wheel <br><strong>Self Balancing</strong> <br> Scooter', 'techmarket' ) ),
			'price'			=> isset( $br2_options['price'] ) ? $br2_options['price'] : '<ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>339.99</span></ins> <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>689</span></del>',
			'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
			'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '414', '256' ) ) : array( '//placehold.it/414x256', '414', '256' ),
			'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
			'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : ''
		) );

		?><div class="slider-with-banners row">
			<div class="slider-block column-1-slider-block">
				<?php techmarket_revslider_v2(); ?>
			</div>
			<div class="banners-block column-2-banners-block">
				<?php techmarket_banner( $banner_1_args ); ?>
				<?php techmarket_banner( $banner_2_args ); ?>
			</div>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_fullwidth_notice_v2' ) ) {
	function techmarket_fullwidth_notice_v2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$ntc_options = $home_v2['ntc'];

			$is_enabled = isset( $ntc_options['is_enabled'] ) ? $ntc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ntc_options['animation'] ) ? $ntc_options['animation'] : '';

			$args = apply_filters( 'techmarket_fullwidth_notice_v2_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'stretch-full-width',
				'notice_info'		=> isset( $ntc_options['notice_info'] ) ? $ntc_options['notice_info'] : esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
			) );

			techmarket_fullwidth_notice( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_full_width_banner_v2' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_full_width_banner_v2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$sbr_options = $home_v2['sbr'];

			$is_enabled = isset( $sbr_options['is_enabled'] ) ? $sbr_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $sbr_options['animation'] ) ? $sbr_options['animation'] : '';

			$args = apply_filters( 'techmarket_fullwidth_notice_v2_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'full-width-banner',
				'title'			=> isset( $sbr_options['title'] ) ? $sbr_options['title'] : wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
				'sub_title'		=> isset( $sbr_options['sub_title'] ) ? $sbr_options['sub_title'] : esc_html__( 'Travel upto 22km in a single charge.', 'techmarket' ),
				'action_text'	=> isset( $sbr_options['action_text'] ) ? $sbr_options['action_text'] : wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
				'action_link'	=> isset( $sbr_options['action_link'] ) ? $sbr_options['action_link'] : '#',
				'bg_image'		=> isset( $sbr_options['bg_image'] ) && intval( $sbr_options['bg_image'] ) ? wp_get_attachment_image_src( $sbr_options['bg_image'], array( '1740', '236' ) ) : array( '//placehold.it/1740x236', '1740', '236' ),
				'bg_choice'		=> isset( $sbr_options['bg_choice'] ) ? $sbr_options['bg_choice'] : 'image',
				'bg_color' 		=> isset( $sbr_options['bg_color'] ) ? $sbr_options['bg_color'] : '',
				'bg_height' 	=> isset( $sbr_options['bg_height'] ) ? $sbr_options['bg_height'] : ''
			) );

			techmarket_banner( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_6_1_6_tabs_with_deals_v2' ) ) {
	function techmarket_6_1_6_tabs_with_deals_v2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$sost_options = $home_v2['sost'];

			$is_enabled = isset( $sost_options['is_enabled'] ) ? $sost_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $sost_options['animation'] ) ? $sost_options['animation'] : '';

			$args = apply_filters( 'techmarket_6_1_6_tabs_with_deals_v2_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $sost_options['section_title'] ) ? $sost_options['section_title'] : wp_kses_post( __( 'Daily Deals! <span>Get our best prices.</span>', 'techmarket' ) ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $sost_options['tabs'][0]['title'] ) ? $sost_options['tabs'][0]['title'] : '-30%',
						'shortcode_tag'		=> isset( $sost_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $sost_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $sost_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $sost_options['tabs'][0]['shortcode_content'] ) : array(),
					),
					array(
						'title'				=> isset( $sost_options['tabs'][1]['title'] ) ? $sost_options['tabs'][1]['title'] : '-50%',
						'shortcode_tag'		=> isset( $sost_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $sost_options['tabs'][1]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $sost_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $sost_options['tabs'][1]['shortcode_content'] ) : array(),
					),
					array(
						'title'				=> isset( $sost_options['tabs'][2]['title'] ) ? $sost_options['tabs'][2]['title'] : '-70%',
						'shortcode_tag'		=> isset( $sost_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $sost_options['tabs'][2]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $sost_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $sost_options['tabs'][2]['shortcode_content'] ) : array(),
					),
				),
			) );

			techmarket_6_1_6_tabs_with_deals( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_3_column_banners_v2' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_3_column_banners_v2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$brs_options = $home_v2['brs'];
			$br1_options = $brs_options['br1'];
			$br2_options = $brs_options['br2'];
			$br3_options = $brs_options['br3'];

			$is_enabled = isset( $brs_options['is_enabled'] ) ? $brs_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $brs_options['animation'] ) ? $brs_options['animation'] : '';

			$args = apply_filters( 'techmarket_3_column_banners_v2_args', array(
				'banners'		=> array(
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __( 'New Arrivals<br> in <strong>Accessories</strong> <br> at Best Prices.', 'techmarket' ) ),
						'action_text'	=> isset( $br1_options['action_text'] ) ? $br1_options['action_text'] : esc_html__( 'View all', 'techmarket' ),
						'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
						'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '420', '259' ) ) : array( '//placehold.it/420x259', '420', '259' ),
						'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
						'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : '',
						'section_class'	=> 'small-banner text-in-left'
					),
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( 'Catch Hottest<br> <strong>Deals</strong> on the <br> Curved Soundbars.', 'techmarket' ) ),
						'action_text'	=> isset( $br2_options['action_text'] ) ? $br2_options['action_text'] : esc_html__( 'Browse', 'techmarket' ),
						'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
						'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '860', '259' ) ) : array( '//placehold.it/860x259', '860', '259' ),
						'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
						'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : '',
						'section_class'	=> 'large-banner text-in-right'
					),
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br3_options['title'] ) ? $br3_options['title'] : wp_kses_post( __( '<strong>1000 mAh</strong> <br> Power Bank Pro', 'techmarket' ) ),
						'price'			=> isset( $br3_options['price'] ) ? $br3_options['price'] : '$34.99',
						'action_text'	=> isset( $br3_options['action_text'] ) ? $br3_options['action_text'] : esc_html__( 'Buy Now', 'techmarket' ),
						'action_link'	=> isset( $br3_options['action_link'] ) ? $br3_options['action_link'] : '#',
						'bg_image'		=> isset( $br3_options['bg_image'] ) && intval( $br3_options['bg_image'] ) ? wp_get_attachment_image_src( $br3_options['bg_image'], array( '420', '259' ) ) : array( '//placehold.it/420x259', '420', '259' ),
						'bg_choice'		=> isset( $br3_options['bg_choice'] ) ? $br3_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br3_options['bg_color'] ) ? $br3_options['bg_color'] : '',
						'bg_height' 	=> isset( $br3_options['bg_height'] ) ? $br3_options['bg_height'] : '',
						'section_class'	=> 'small-banner text-in-left'
					)
				)
			) );

			techmarket_banners( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_with_bg_v2' ) ) {
	/**
	 *
	 */
	function techmarket_products_carousel_with_bg_v2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$pcwb_options = $home_v2['pcwb'];

			$is_enabled = isset( $pcwb_options['is_enabled'] ) ? $pcwb_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcwb_options['animation'] ) ? $pcwb_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_with_bg_v2_args', array(
				'animation'		    => $animation,
				'section_title'		=> isset( $pcwb_options['section_title'] ) ? $pcwb_options['section_title'] : wp_kses_post( __( 'Make <br>dreams <br><span>your reality</span>', 'techmarket' ) ),
				'section_class'		=> 'stretch-full-width',
				'image'				=> isset( $pcwb_options['image'] ) && intval( $pcwb_options['image'] ) ? wp_get_attachment_image_src( $pcwb_options['image'], array( '275', '174' ) ) : array( '//placehold.it/275x174', '275', '174' ),
				'shortcode_tag'		=> isset( $pcwb_options['shortcode_content']['shortcode'] ) ? $pcwb_options['shortcode_content']['shortcode'] :'recent_products',
				'shortcode_atts'	=> isset( $pcwb_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwb_options['shortcode_content'] ) : array( 'columns' => '7' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pcwb_options['carousel_args']['slidesToShow'] ) ? intval( $pcwb_options['carousel_args']['slidesToShow'] ) : 7,
					'slidesToScroll'	=> isset( $pcwb_options['carousel_args']['slidesToScroll'] ) ? intval( $pcwb_options['carousel_args']['slidesToScroll'] ) : 7,
					'dots'				=> isset( $pcwb_options['carousel_args']['dots'] ) ? filter_var( $pcwb_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcwb_options['carousel_args']['arrows'] ) ? filter_var( $pcwb_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 780,
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
							'breakpoint'	=> 1201,
							'settings'		=> array(
								'slidesToShow'		=> 5,
								'slidesToScroll'	=> 5
							)
						),
						array(
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesToShow'		=> 5,
								'slidesToScroll'	=> 5
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 6,
								'slidesToScroll'	=> 6
							)
						)
					)
				)
			) );

			techmarket_products_carousel_with_bg( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_landscape_with_tab_carousel' ) ) {
	function techmarket_products_landscape_with_tab_carousel() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$lpcw_options = $home_v2['pcwtc']['lpcw'];
			$pct1_options = $home_v2['pcwtc']['pct1'];
			$pct2_options = $home_v2['pcwtc']['pct2'];

			$is_enabled = isset( $home_v2['pcwtc']['is_enabled'] ) ? $home_v2['pcwtc']['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $home_v2['pcwtc']['animation'] ) ? $home_v2['pcwtc']['animation'] : '';

			$landscape_widget_args = apply_filters( 'techmarket_pcwtc_v2_landscape_widget_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpcw_options['section_title'] ) ? $lpcw_options['section_title'] : esc_html__( 'Hand picked for you', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-widget-carousel type-2',
				'header_custom_nav'	=> isset( $lpcw_options['header_custom_nav'] ) ? filter_var( $lpcw_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $lpcw_options['shortcode_content']['shortcode'] ) ? $lpcw_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $lpcw_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpcw_options['shortcode_content'] ) : array( 'columns' => 2, 'per_page' => 24, 'template' => 'content-landscape-product-widget' ),
				'carousel_args'		=> array(
					'rows'				=> isset( $lpcw_options['carousel_args']['rows'] ) ? intval( $lpcw_options['carousel_args']['rows'] ) : 6,
					'slidesPerRow'		=> isset( $lpcw_options['carousel_args']['slidesPerRow'] ) ? intval( $lpcw_options['carousel_args']['slidesPerRow'] ) : 2,
					'slidesToShow'		=> isset( $lpcw_options['carousel_args']['slidesToShow'] ) ? intval( $lpcw_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $lpcw_options['carousel_args']['slidesToScroll'] ) ? intval( $lpcw_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $lpcw_options['carousel_args']['dots'] ) ? filter_var( $lpcw_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $lpcw_options['carousel_args']['arrows'] ) ? filter_var( $lpcw_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $lpcw_options['carousel_args']['prevArrow'] ) ? $lpcw_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $lpcw_options['carousel_args']['nextArrow'] ) ? $lpcw_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 480,
							'settings'		=> array(
								'slidesPerRow'		=> 1,
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 750,
							'settings'		=> array(
								'slidesPerRow'		=> 1,
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 1190,
							'settings'		=> array(
								'rows'				=> 8,
								'slidesPerRow'		=> 1,
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesPerRow'		=> 1,
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						)
					)
				)
			) );

			$products_carousel_tabs_1_args = apply_filters( 'techmarket_pcwtc_v2_products_carousel_tabs_1_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $pct1_options['section_title'] ) ? $pct1_options['section_title'] : esc_html__( 'CES 2017 Arrivals', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct1_options['tabs'][0]['title'] ) ? $pct1_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '5' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][1]['title'] ) ? $pct1_options['tabs'][1]['title'] : esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '5' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][2]['title'] ) ? $pct1_options['tabs'][2]['title'] : esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '5' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][3]['title'] ) ? $pct1_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '5' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct1_options['carousel_args']['slidesToShow'] ) ? intval( $pct1_options['carousel_args']['slidesToShow'] ) : 5,
					'slidesToScroll'	=> isset( $pct1_options['carousel_args']['slidesToScroll'] ) ? intval( $pct1_options['carousel_args']['slidesToScroll'] ) : 5,
					'dots'				=> isset( $pct1_options['carousel_args']['dots'] ) ? filter_var( $pct1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct1_options['carousel_args']['arrows'] ) ? filter_var( $pct1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(

						array(
							'breakpoint'	=> 1000,
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
				)
			) );

			$products_carousel_tabs_2_args = apply_filters( 'techmarket_pcwtc_v2_products_carousel_tabs_2_args', array(
				'animation'		=> $animation,
				'section_title' => isset( $pct2_options['section_title'] ) ? $pct2_options['section_title'] : esc_html__( 'Video Cameras', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct2_options['tabs'][0]['title'] ) ? $pct2_options['tabs'][0]['title'] : esc_html__( 'Best Choice', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '5' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][1]['title'] ) ? $pct2_options['tabs'][1]['title'] : esc_html__( 'Action Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '5' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][2]['title'] ) ? $pct2_options['tabs'][2]['title'] : esc_html__( 'Compacts', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '5' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][3]['title'] ) ? $pct2_options['tabs'][3]['title'] : esc_html__( 'DSLR Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '5' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct2_options['carousel_args']['slidesToShow'] ) ? intval( $pct2_options['carousel_args']['slidesToShow'] ) : 5,
					'slidesToScroll'	=> isset( $pct2_options['carousel_args']['slidesToScroll'] ) ? intval( $pct2_options['carousel_args']['slidesToScroll'] ) : 5,
					'dots'				=> isset( $pct2_options['carousel_args']['dots'] ) ? filter_var( $pct2_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct2_options['carousel_args']['arrows'] ) ? filter_var( $pct2_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 1000,
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
				)
			) );

			?><div class="row section-products-carousel-widget-with-tabs">
				<div class="landscape-products-widget-block">
					<?php techmarket_products_carousel( $landscape_widget_args ); ?>
				</div>
				<div class="products-carousel-tabs-block">
					<?php techmarket_products_carousel_tabs( $products_carousel_tabs_1_args ); ?>
					<?php techmarket_products_carousel_tabs( $products_carousel_tabs_2_args ); ?>
				</div>
			</div><?php
		}
	}
}

if ( ! function_exists( 'techmarket_product_categories_carousel_v2' ) ) {
	/**
	 *
	 */
	function techmarket_product_categories_carousel_v2() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$catc_options = $home_v2['catc'];

			$is_enabled = isset( $catc_options['is_enabled'] ) ? $catc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $catc_options['animation'] ) ? $catc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_product_categories_carousel_v2_section_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'section-top-categories',
				'section_title'		=> isset( $catc_options['section_title'] ) ? $catc_options['section_title'] : wp_kses_post( __( 'Top <br>categories <br>this week', 'techmarket' ) ),
				'button_text'		=> isset( $catc_options['button_text'] ) ? $catc_options['button_text'] : esc_html__( 'Full Catalog', 'techmarket' ),
				'button_link'		=> isset( $catc_options['button_link'] ) ? $catc_options['button_link'] : '#'
			) );

			$taxonomy_args = apply_filters( 'techmarket_product_categories_carousel_v2_taxonomy_args', array(
				'number'			=> isset( $catc_options['number'] ) ? $catc_options['number'] : 7,
				'columns'			=> isset( $catc_options['columns'] ) ? $catc_options['columns'] : 7,
				'slugs'				=> isset( $catc_options['slugs'] ) ? $catc_options['slugs'] : '',
			) );

			$carousel_args = apply_filters( 'techmarket_product_categories_carousel_v2_carousel_args', array(
				'slidesToShow'		=> isset( $catc_options['carousel_args']['slidesToShow'] ) ? intval( $catc_options['carousel_args']['slidesToShow'] ) : 7,
				'slidesToScroll'	=> isset( $catc_options['carousel_args']['slidesToScroll'] ) ? intval( $catc_options['carousel_args']['slidesToScroll'] ) : 7,
				'dots'				=> isset( $catc_options['carousel_args']['dots'] ) ? filter_var( $catc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'			=> isset( $catc_options['carousel_args']['arrows'] ) ? filter_var( $catc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
				'prevArrow'			=> isset( $catc_options['carousel_args']['prevArrow'] ) ? $catc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> isset( $catc_options['carousel_args']['nextArrow'] ) ? $catc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
				'responsive'		=> array(
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
							'slidesToShow'		=> 5,
							'slidesToScroll'	=> 5
						)
					),
					array(
						'breakpoint'	=> 1700,
						'settings'		=> array(
							'slidesToShow'		=> 6,
							'slidesToScroll'	=> 6
						)
					)
				)
			) );

			techmarket_product_categories_carousel( $section_args , $taxonomy_args , $carousel_args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v2_1' ) ) {
	function techmarket_products_carousel_tabs_v2_1() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$pct1_options = $home_v2['pct1'];

			$is_enabled = isset( $pct1_options['is_enabled'] ) ? $pct1_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct1_options['animation'] ) ? $pct1_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v2_1_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $pct1_options['section_title'] ) ? $pct1_options['section_title'] : esc_html__( 'Hot New Arrivals', 'techmarket' ),
				'section_class'	=> 'section-hot-new-arrivals',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct1_options['tabs'][0]['title'] ) ? $pct1_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][1]['title'] ) ? $pct1_options['tabs'][1]['title'] : esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][2]['title'] ) ? $pct1_options['tabs'][2]['title'] : esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][3]['title'] ) ? $pct1_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '7' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct1_options['carousel_args']['slidesToShow'] ) ? intval( $pct1_options['carousel_args']['slidesToShow'] ) : 7,
					'slidesToScroll'	=> isset( $pct1_options['carousel_args']['slidesToScroll'] ) ? intval( $pct1_options['carousel_args']['slidesToScroll'] ) : 7,
					'dots'				=> isset( $pct1_options['carousel_args']['dots'] ) ? filter_var( $pct1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct1_options['carousel_args']['arrows'] ) ? filter_var( $pct1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 1000,
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

if ( ! function_exists( 'techmarket_products_carousel_tabs_v2_2' ) ) {
	function techmarket_products_carousel_tabs_v2_2() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$pct2_options = $home_v2['pct2'];

			$is_enabled = isset( $pct2_options['is_enabled'] ) ? $pct2_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct2_options['animation'] ) ? $pct2_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v2_2_args', array(
				'animation'			=> $animation,
				'section_title'	=> isset( $pct2_options['section_title'] ) ? $pct2_options['section_title'] : esc_html__( 'Trending Now', 'techmarket' ),
				'section_class'	=> 'section-trending-noe',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct2_options['tabs'][0]['title'] ) ? $pct2_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][1]['title'] ) ? $pct2_options['tabs'][1]['title'] : esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][2]['title'] ) ? $pct2_options['tabs'][2]['title'] : esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][3]['title'] ) ? $pct2_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '8' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct2_options['carousel_args']['slidesToShow'] ) ? intval( $pct2_options['carousel_args']['slidesToShow'] ) : 8,
					'slidesToScroll'	=> isset( $pct2_options['carousel_args']['slidesToScroll'] ) ? intval( $pct2_options['carousel_args']['slidesToScroll'] ) : 8,
					'dots'				=> isset( $pct2_options['carousel_args']['dots'] ) ? filter_var( $pct2_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct2_options['carousel_args']['arrows'] ) ? filter_var( $pct2_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 1000,
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

if ( ! function_exists( 'techmarket_brands_carousel_v2' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v2() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$bc_options = $home_v2['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v2_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v2_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_v2_carousel_args', array(
				'slidesToShow'	=> isset( $bc_options['carousel_args']['slidesToShow'] ) ? intval( $bc_options['carousel_args']['slidesToShow'] ) : 6,
				'slidesToScroll'=> isset( $bc_options['carousel_args']['slidesToScroll'] ) ? intval( $bc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'			=> isset( $bc_options['carousel_args']['dots'] ) ? filter_var( $bc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'		=> isset( $bc_options['carousel_args']['arrows'] ) ? filter_var( $bc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'responsive'		=> array(
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

if ( ! function_exists( 'techmarket_products_carousel_block_v2' ) ) {
	function techmarket_products_carousel_block_v2() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$lpc_options = $home_v2['lpc'];

			$is_enabled = isset( $lpc_options['is_enabled'] ) ? $lpc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $lpc_options['animation'] ) ? $lpc_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v2_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpc_options['section_title'] ) ? $lpc_options['section_title'] : esc_html__( 'Recently viewed products', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-carousel',
				'header_custom_nav'	=> isset( $lpc_options['header_custom_nav'] ) ? filter_var( $lpc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $lpc_options['shortcode_content']['shortcode'] ) ? $lpc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $lpc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpc_options['shortcode_content'] ) : array( 'columns' => '5', 'template' => 'content-landscape-product' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $lpc_options['carousel_args']['slidesToShow'] ) ? intval( $lpc_options['carousel_args']['slidesToShow'] ) : 5,
					'slidesToScroll'	=> isset( $lpc_options['carousel_args']['slidesToScroll'] ) ? intval( $lpc_options['carousel_args']['slidesToScroll'] ) : 2,
					'dots'				=> isset( $lpc_options['carousel_args']['dots'] ) ? filter_var( $lpc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $lpc_options['carousel_args']['arrows'] ) ? filter_var( $lpc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $lpc_options['carousel_args']['prevArrow'] ) ? $lpc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $lpc_options['carousel_args']['nextArrow'] ) ? $lpc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 1000,
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

			techmarket_products_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_3_2_3_product_cards_tab_with_featured_product_v2' ) ) {
	function techmarket_3_2_3_product_cards_tab_with_featured_product_v2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v2 	= techmarket_get_home_v2_meta();
			$ttot_options = $home_v2['ttot'];

			$is_enabled = isset( $ttot_options['is_enabled'] ) ? $ttot_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ttot_options['animation'] ) ? $ttot_options['animation'] : '';

			$args = apply_filters( 'techmarket_3_2_3_product_cards_tab_with_featured_product_v2_args', array(
				'section_title'	=> isset( $ttot_options['section_title'] ) ? $ttot_options['section_title'] : wp_kses_post( __('Hurry up! <span>Special Offers</span>', 'techmarket' ) ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $ttot_options['tabs'][0]['title'] ) ? $ttot_options['tabs'][0]['title'] : esc_html__( 'Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $ttot_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $ttot_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $ttot_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ttot_options['tabs'][0]['shortcode_content'] ) : array()
					),
					array(
						'title'				=> isset( $ttot_options['tabs'][1]['title'] ) ? $ttot_options['tabs'][1]['title'] : esc_html__( 'Audio', 'techmarket' ),
						'shortcode_tag'		=> isset( $ttot_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $ttot_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $ttot_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ttot_options['tabs'][1]['shortcode_content'] ) : array()
					),
					array(
						'title'				=> isset( $ttot_options['tabs'][2]['title'] ) ? $ttot_options['tabs'][2]['title'] : esc_html__( 'GPS &amp; Navigation', 'techmarket' ),
						'shortcode_tag'		=> isset( $ttot_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $ttot_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $ttot_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ttot_options['tabs'][2]['shortcode_content'] ) : array()
					),
					array(
						'title'				=> isset( $ttot_options['tabs'][3]['title'] ) ? $ttot_options['tabs'][3]['title'] : esc_html__( 'TV &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $ttot_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $ttot_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $ttot_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ttot_options['tabs'][3]['shortcode_content'] ) : array()
					),
					array(
						'title'				=> isset( $ttot_options['tabs'][4]['title'] ) ? $ttot_options['tabs'][4]['title'] : esc_html__( 'Cell Phones', 'techmarket' ),
						'shortcode_tag'		=> isset( $ttot_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $ttot_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $ttot_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ttot_options['tabs'][4]['shortcode_content'] ) : array()
					),
					array(
						'title'				=> isset( $ttot_options['tabs'][5]['title'] ) ? $ttot_options['tabs'][5]['title'] : esc_html__( 'Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $ttot_options['tabs'][5]['shortcode_content']['shortcode'] ) ? $ttot_options['tabs'][5]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $ttot_options['tabs'][5]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ttot_options['tabs'][5]['shortcode_content'] ) : array()
					),
					array(
						'title'				=> isset( $ttot_options['tabs'][6]['title'] ) ? $ttot_options['tabs'][6]['title'] : esc_html__( 'Accessories', 'techmarket' ),
						'shortcode_tag'		=> isset( $ttot_options['tabs'][6]['shortcode_content']['shortcode'] ) ? $ttot_options['tabs'][6]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $ttot_options['tabs'][6]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ttot_options['tabs'][6]['shortcode_content'] ) : array()
					)
				)
			) );

			techmarket_3_2_3_product_cards_tab_with_featured_product( $args );
		}
	}
}

if( ! function_exists( 'techmarket_home_v2_hook_control' ) ) {
	function techmarket_home_v2_hook_control() {
		if( is_page_template( array( 'template-homepage-v2.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v2' );

			$home_v2 = techmarket_get_home_v2_meta();
			add_action( 'techmarket_homepage_v2', 'techmarket_init_structured_data',								5 );
			add_action( 'techmarket_homepage_v2', 'techmarket_slider_with_banners_v2',								isset( $home_v2['swb']['priority'] ) ? intval( $home_v2['swb']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v2', 'techmarket_product_categories_carousel_v2',						isset( $home_v2['catc']['priority'] ) ? intval( $home_v2['catc']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v2', 'techmarket_6_1_6_tabs_with_deals_v2',							isset( $home_v2['sost']['priority'] ) ? intval( $home_v2['sost']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v2', 'techmarket_fullwidth_notice_v2',									isset( $home_v2['ntc']['priority'] ) ? intval( $home_v2['ntc']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v2', 'techmarket_3_column_banners_v2',									isset( $home_v2['brs']['priority'] ) ? intval( $home_v2['brs']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v2', 'techmarket_products_carousel_tabs_v2_1',							isset( $home_v2['pct1']['priority'] ) ? intval( $home_v2['pct1']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v2', 'techmarket_3_2_3_product_cards_tab_with_featured_product_v2',	isset( $home_v2['ttot']['priority'] ) ? intval( $home_v2['ttot']['priority'] ) : 70 );
			add_action( 'techmarket_homepage_v2', 'techmarket_products_carousel_tabs_v2_2',							isset( $home_v2['pct2']['priority'] ) ? intval( $home_v2['pct2']['priority'] ) : 80 );
			add_action( 'techmarket_homepage_v2', 'techmarket_full_width_banner_v2',								isset( $home_v2['sbr']['priority'] ) ? intval( $home_v2['sbr']['priority'] ) : 90 );
			add_action( 'techmarket_homepage_v2', 'techmarket_products_carousel_with_bg_v2',						isset( $home_v2['pcwb']['priority'] ) ? intval( $home_v2['pcwb']['priority'] ) : 100 );
			add_action( 'techmarket_homepage_v2', 'techmarket_products_landscape_with_tab_carousel',				isset( $home_v2['pcwtc']['priority'] ) ? intval( $home_v2['pcwtc']['priority'] ) : 110 );
			add_action( 'techmarket_homepage_v2', 'techmarket_brands_carousel_v2',									isset( $home_v2['bc']['priority'] ) ? intval( $home_v2['bc']['priority'] ) : 120 );
			add_action( 'techmarket_homepage_v2', 'techmarket_products_carousel_block_v2',							isset( $home_v2['lpc']['priority'] ) ? intval( $home_v2['lpc']['priority'] ) : 130 );
			add_action( 'techmarket_homepage_v2', 'techmarket_homepage_content',									200 );
		}
	}
}
