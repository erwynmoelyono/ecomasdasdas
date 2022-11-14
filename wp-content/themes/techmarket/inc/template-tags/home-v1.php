<?php
/**
 * Template tags for Home v1
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v1_options() {
	$home_v1 = array(
		'sdr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'shortcode'			=> ''
		),
		'fl'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 20,
			'animation'			=> '',
			'features'		=> array(
				array(
					'icon'		=> 'tm tm-free-delivery',
					'label'		=> sprintf( '<h5 class="mt-0">%s</h5><span>%s</span>', esc_html__( 'Free Delivery', 'techmarket' ), esc_html__( 'from $50', 'techmarket' ) ),
				),
				array(
					'icon'		=> 'tm tm-feedback',
					'label'		=> sprintf( '<h5 class="mt-0">%s</h5><span>%s</span>', esc_html__( '99% Customer', 'techmarket' ), esc_html__( 'Feedbacks', 'techmarket' ) ),
				),
				array(
					'icon'		=> 'tm tm-free-return',
					'label'		=> sprintf( '<h5 class="mt-0">%s</h5><span>%s</span>', esc_html__( '365 Days', 'techmarket' ), esc_html__( 'for free return', 'techmarket' ) ),
				),
				array(
					'icon'		=> 'tm tm-safe-payments',
					'label'		=> sprintf( '<h5 class="mt-0">%s</h5><span>%s</span>', esc_html__( 'Payment', 'techmarket' ), esc_html__( 'Secure System', 'techmarket' ) ),
				),
				array(
					'icon'		=> 'tm tm-best-brands',
					'label'		=> sprintf( '<h5 class="mt-0">%s</h5><span>%s</span>', esc_html__( 'Only Best', 'techmarket' ), esc_html__( 'Brands', 'techmarket' ) ),
				)
			)
		),
		'dwtc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'dc' 				=> array(
				'section_title' 	=> wp_kses_post( __( '<strong>Deals</strong> of the week', 'techmarket' ) ),
				'header_custom_nav'	=> 'yes',
				'shortcode_content'	=> array(
					'shortcode'			=> 'sale_products',
					'shortcode_atts'	=> array(
						'per_page'			=> 4,
					)
				)
			),
			'ptc' 				=> array(
				'tabs' 				=> array(
					array(
						'title'				=> esc_html__( 'New Arrivals', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'recent_products',
							'shortcode_atts'	=> array(
								'columns'		=> '5',
								'per_page'		=> '20'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'On Sale', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'		=> 'featured_products',
							'shortcode_atts'=> array(
								'columns'	=> '5',
								'per_page'	=> '20'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Best Rated', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'		=> 'sale_products',
							'shortcode_atts'=> array(
								'columns'	=> '5',
								'per_page'	=> '20'
							)
						)
					)
				),
				'carousel_args' 	=> array(
					'rows'					=> 2,
					'slidesPerRow'			=> 5,
					'slidesToShow'			=> 1,
					'slidesToScroll'		=> 1,
					'dots'					=> 'yes',
					'arrows'				=> 'no'
				)
			)
		),
		'ntc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'notice_info'		=> esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
		),
		'catc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'pre_title'			=> wp_kses_post( __( 'Featured', 'techmarket' ) ),
			'section_title'		=> wp_kses_post( __( 'Top categories <br>this week', 'techmarket' ) ),
			'header_custom_nav'	=> 'yes',
			'button_text'		=> esc_html__( 'Full Catalog', 'techmarket' ),
			'button_link'		=> '#',
			'number'			=> 12,
			'columns'			=> 5,
			'slugs'				=> '',
			'carousel_args' 	=> array(
				'slidesToShow'		=> 5,
				'slidesToScroll'	=> 1,
				'dots'				=> 'no',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'pcbg'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( '<strong>Power Audio &amp; Visual </strong>entertainment', 'techmarket' ) ),
			'shortcode_content'	=> array(
				'shortcode'			=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '2',
					'per_page'		=> '12',
					'template' 		=> 'content-landscape-product-card'
				)
			),
			'carousel_args'		=> array(
				'rows'				=> 2,
				'slidesPerRow'		=> 2,
				'slidesToShow'		=> 1,
				'slidesToScroll'	=> 1,
				'dots'				=> 'yes',
				'arrows'			=> 'no'
			)
		),
		'pct'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 70,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Hot Best Sellers', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Top 20', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'=> array(
							'columns'	=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'=> array(
							'columns'	=> '7'
						)
					)
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 7,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 7
			)
		),
		'brs'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 80,
			'animation'			=> '',
			'br1'				=> array(
				'title'			=> wp_kses_post( __( '<strong>Shop now</strong> to find savings on everything you need<br> for the big game.', 'techmarket' ) ),
				'action_text'	=> esc_html__( 'Browse', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br2'				=> array(
				'title'			=> wp_kses_post( __( '<strong>1000 mAh</strong> <br> Power Bank Pro.', 'techmarket' ) ),
				'price'			=> '$34.99',
				'action_text'	=> esc_html__( 'Buy Now', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
		),
		'lpc1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 90,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Video Cameras & Photography', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'=> array(
					'columns'		=> '4',
					'template' 		=> 'content-landscape-product'
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 4,
				'slidesToScroll'	=> 2,
				'dots'				=> 'yes',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'vpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 100,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( '<strong>Today Gadgets &amp; Mobile </strong> accessories', 'techmarket' ) ),
			'tabs' 			=> array(
				array(
					'title'				=> wp_kses_post( '<i class="tm tm-desktop-pc"></i> ' . esc_html__( 'Desktop PCs', 'techmarket' ) ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'		=> '6'
						)
					)
				),
				array(
					'title'				=> wp_kses_post( '<i class="tm tm-laptop"></i> ' . esc_html__( 'Ultrabooks', 'techmarket' ) ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'		=> '6'
						)
					)
				),
				array(
					'title'				=> wp_kses_post( '<i class="tm tm-smartphone"></i> ' . esc_html__( 'Smartphones', 'techmarket' ) ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'		=> '6'
						)
					)
				),
				array(
					'title'				=> wp_kses_post( '<i class="tm tm-digital-camera"></i> ' . esc_html__( 'Internet Cams', 'techmarket' ) ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'		=> '6'
						)
					)
				),
				array(
					'title'				=> wp_kses_post( '<i class="tm tm-accesories"></i> ' . esc_html__( 'Accessories', 'techmarket' ) ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'best_selling_products',
						'shortcode_atts'	=> array(
							'columns'		=> '6'
						)
					),
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 6,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 6
			)
		),
		'pcwfp'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 110,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Hot New Arrivals', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Top 20', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'		=> '6'
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
							'columns'		=> '6'
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
							'columns'		=> '6'
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
							'columns'		=> '6'
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
				'slidesPerRow'		=> 6,
				'slidesToShow'		=> 1,
				'slidesToScroll'	=> 1,
				'dots'				=> 'yes',
				'arrows'			=> 'no'
			)
		),
		'sbr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 120,
			'animation'			=> '',
			'title'				=> wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
			'sub_title'			=> esc_html__( 'Travel up to 22km in a single charge.', 'techmarket' ),
			'action_text'		=> wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'		=> '#',
			'bg_choice'			=> 'image'
		),
		'pcwsb'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 130,
			'animation'			=> '',
			'pct1'   			=> array(
				'section_title'	=> esc_html__( 'CES 2017 Arrivals', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'		=> 'recent_products',
							'shortcode_atts'	=> array(
								'columns'		=> '6'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'		=> 'featured_products',
							'shortcode_atts'	=> array(
								'columns'		=> '6'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'		=> 'sale_products',
							'shortcode_atts'	=> array(
								'columns'		=> '6'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'		=> 'top_rated_products',
							'shortcode_atts'	=> array(
								'columns'		=> '6'
							)
						)
					),
				),
				'carousel_args'			=> array(
					'slidesToShow'		=> 6,
					'slidesToScroll'	=> 6,
					'dots'				=> 'yes',
					'arrows'			=> 'no'
				)
			),
			'pct2'   			=> array(
				'section_title' => esc_html__( 'Virtual Reality Headsets', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> esc_html__( 'Best Choice', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'		=> 'recent_products',
							'shortcode_atts'	=> array(
								'columns'		=> '6'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Cardboards', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'		=> 'featured_products',
							'shortcode_atts'	=> array(
								'columns'		=> '6'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'For Android', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'		=> 'sale_products',
							'shortcode_atts'	=> array(
								'columns'		=> '6'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'For ios', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'		=> 'top_rated_products',
							'shortcode_atts'	=> array(
								'columns'		=> '6'
							)
						)
					),
				),
				'carousel_args'			=> array(
					'slidesToShow'		=> 6,
					'slidesToScroll'	=> 6,
					'dots'				=> 'yes',
					'arrows'			=> 'no'
				)
			),
			'br2'		=> array(
				'pre_title'		=> esc_html__( 'Best Gift Idea', 'techmarket' ),
				'title'			=> wp_kses_post( __( '<strong>Mini Two Wheel</strong> <br>Self Balancing<br> Scooter', 'techmarket' ) ),
				'price'			=> '<ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>339.99</span></ins> <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>689</span></del>',
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br1'		=> array(
				'title'			=> wp_kses_post( __( '<strong>20% Off Tech</strong> <br> at Ultrabooks, <br> Laptops, Tablets<br>Notebooks &<br>More', 'techmarket' ) ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br3'		=> array(
				'title'			=> wp_kses_post( __( 'New Arrivals<br> in <strong>Accessories</strong> <br> at Best Prices.', 'techmarket' ) ),
				'action_text'	=> esc_html__( 'View All', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			)
		),
		'lpc2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 140,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Recently viewed products', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '5',
					'template'		=> 'content-landscape-product'
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 5,
				'slidesToScroll'	=> 2,
				'dots'				=> 'yes',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'bc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 150,
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

	return apply_filters( 'techmarket_get_default_home_v1_options', $home_v1 );
}

function techmarket_get_home_v1_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v1_options = get_post_meta( $post->ID, '_home_v1_options', true );
		$home_v1_options = maybe_unserialize( $clean_home_v1_options );

		if( ! is_array( $home_v1_options ) ) {
			$home_v1_options = json_decode( $clean_home_v1_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v1_options();
			$home_v1 = wp_parse_args( $home_v1_options, $default_options );
		} else {
			$home_v1 = $home_v1_options;
		}

		return apply_filters( 'techmarket_home_v1_meta', $home_v1, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_v1' ) ) {
	/**
	 * Displays Slider in Home v1
	 */
	function techmarket_revslider_v1() {

		$home_v1 	= techmarket_get_home_v1_meta();
		$sdr 		= $home_v1['sdr'];

		$is_enabled = isset( $sdr['is_enabled'] ) ? $sdr['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $sdr['animation'] ) ? $sdr['animation'] : '';
		$shortcode = !empty( $sdr['shortcode'] ) ? $sdr['shortcode'] : '[rev_slider alias="home-v1-slider"]';

		$section_class = 'home-v1-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_home_v1_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_features_list_v1' ) ) {
	/**
	 *
	 */
	function techmarket_features_list_v1() {
		$home_v1 	= techmarket_get_home_v1_meta();
		$fl_options = $home_v1['fl'];

		$is_enabled = isset( $fl_options['is_enabled'] ) ? $fl_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' || empty( $fl_options['features'] ) ) {
			return;
		}

		$animation = isset( $fl_options['animation'] ) ? $fl_options['animation'] : '';

		$args = array(
			'animation'		=> $animation,
			'features'		=> array()
		);

		foreach ( $fl_options['features'] as $key => $feature ) {
			if( isset( $feature['icon'] ) && isset( $feature['label'] ) ) {
				$args['features'][] = array(
					'icon'		=> $feature['icon'],
					'label'		=> $feature['label']
				);
			}
		}

		$args = apply_filters( 'techmarket_features_list_v1_args', $args );

		techmarket_features_list( $args );
	}
}

if ( ! function_exists( 'techmarket_deals_carousel_and_products_carousel_tabs' ) ) {
	/**
	 *
	 */
	function techmarket_deals_carousel_and_products_carousel_tabs() {
		if( techmarket_is_woocommerce_activated() ) {

		$home_v1 	  = techmarket_get_home_v1_meta();
		$dc_options   = $home_v1['dwtc']['dc'];
		$ptc_options  = $home_v1['dwtc']['ptc'];

		$is_enabled = isset( $home_v1['dwtc']['is_enabled'] ) ? $home_v1['dwtc']['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $home_v1['dwtc']['animation'] ) ? $home_v1['dwtc']['animation'] : '';


		$deals_args = apply_filters( 'techmarket_dwtc_v1_deals_carousel_args', array(
			'animation'			=> $animation,
			'section_class'		=> 'column-1',
			'section_title'		=> isset( $dc_options['section_title'] ) ? $dc_options['section_title'] : wp_kses_post( __( '<strong>Deals</strong> of the week', 'techmarket' ) ),
			'header_custom_nav'	=> isset( $dc_options['header_custom_nav'] ) ? filter_var( $dc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
			'shortcode_tag'		=> isset( $dc_options['shortcode_content']['shortcode'] ) ? $dc_options['shortcode_content']['shortcode'] : 'sale_products',
			'shortcode_atts'	=> isset( $dc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $dc_options['shortcode_content'] ) : array( 'per_page' => 4 ),
			'carousel_args'		=> array(
				'slidesToShow'		=> isset( $dc_options['carousel_args']['slidesToShow'] ) ? intval( $dc_options['carousel_args']['slidesToShow'] ) : 1,
				'slidesToScroll'	=> isset( $dc_options['carousel_args']['slidesToScroll'] ) ? intval( $dc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'				=> isset( $dc_options['carousel_args']['dots'] ) ? filter_var( $dc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'			=> isset( $dc_options['carousel_args']['arrows'] ) ? filter_var( $dc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'prevArrow'			=> isset( $dc_options['carousel_args']['prevArrow'] ) ? $dc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> isset( $dc_options['carousel_args']['nextArrow'] ) ? $dc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
				'responsive'		=> array(
					array(
						'breakpoint'	=> 767,
						'settings'		=> array(
							'slidesToShow'		=> 1,
							'slidesToScroll'	=> 1
						)
					),
					array(
						'breakpoint'	=> 1023,
						'settings'		=> array(
							'slidesToShow'		=> 2,
							'slidesToScroll'	=> 2
						)
					)
				)
			)
		) );

		$tabs_args = apply_filters( 'techmarket_dwtc_v1_products_carousel_tabs_args', array(
			'animation'				=> $animation,
			'section_class'			=> 'column-2',
			'section_title'			=> '',
			'tabs' 					=> array(
				array(
					'title'			=> isset( $ptc_options['tabs'][0]['title'] ) ? $ptc_options['tabs'][0]['title'] : esc_html__( 'New Arrivals', 'techmarket' ),
					'shortcode_tag'	=> isset( $ptc_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $ptc_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
					'shortcode_atts'=> isset( $ptc_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ptc_options['tabs'][0]['shortcode_content'] ) : array('columns' => '5','per_page' => '20' )

				),
				array(
					'title'			=> isset( $ptc_options['tabs'][1]['title'] ) ? $ptc_options['tabs'][1]['title'] : esc_html__( 'On Sale', 'techmarket' ),
					'shortcode_tag'	=> isset( $ptc_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $ptc_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
					'shortcode_atts'=> isset( $ptc_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ptc_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '5','per_page' => '20' )
				),
				array(
					'title'			=> isset( $ptc_options['tabs'][2]['title'] ) ? $ptc_options['tabs'][2]['title'] : esc_html__( 'Best Rated', 'techmarket' ),
					'shortcode_tag'	=> isset( $ptc_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $ptc_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
					'shortcode_atts'=> isset( $ptc_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $ptc_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '5','per_page' => '20' )
				),
			),
			'carousel_args' 		=> array(
				'rows'				=> isset( $ptc_options['carousel_args']['rows'] ) ? intval( $ptc_options['carousel_args']['rows'] ) : 2,
				'slidesPerRow'		=> isset( $ptc_options['carousel_args']['slidesPerRow'] ) ? intval( $ptc_options['carousel_args']['slidesPerRow'] ) : 5,
				'slidesToShow'		=> isset( $ptc_options['carousel_args']['slidesToShow'] ) ? intval( $ptc_options['carousel_args']['slidesToShow'] ) : 1,
				'slidesToScroll'	=> isset( $ptc_options['carousel_args']['slidesToScroll'] ) ? intval( $ptc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'				=> isset( $ptc_options['carousel_args']['dots'] ) ? filter_var( $ptc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
				'arrows'			=> isset( $ptc_options['carousel_args']['arrows'] ) ? filter_var( $ptc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
				'responsive'		=> array(
					array(
						'breakpoint'	=> 1023,
						'settings'		=> array(
							'slidesPerRow'	=> 2
						)
					),
					array(
						'breakpoint'	=> 1169,
						'settings'		=> array(
							'slidesPerRow'	=> 4
						)
					),
					array(
						'breakpoint'	=> 1400,
						'settings'		=> array(
							'slidesPerRow'	=> 3
						)
					)
				)
			)
		) );

		?><div class="section-deals-carousel-and-products-carousel-tabs row">
			<?php techmarket_deals_carousel( $deals_args ); ?>
			<?php techmarket_products_carousel_tabs( $tabs_args ); ?>
		</div>
		<?php
		}
	}
}

if ( ! function_exists( 'techmarket_fullwidth_notice_v1' ) ) {
	function techmarket_fullwidth_notice_v1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$ntc_options = $home_v1['ntc'];

			$is_enabled = isset( $ntc_options['is_enabled'] ) ? $ntc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ntc_options['animation'] ) ? $ntc_options['animation'] : '';

			$args = apply_filters( 'techmarket_fullwidth_notice_v1_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'stretch-full-width',
				'notice_info'		=> isset( $ntc_options['notice_info'] ) ? $ntc_options['notice_info'] : esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
			) );

			techmarket_fullwidth_notice( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_product_categories_carousel_v1' ) ) {
	/**
	 *
	 */
	function techmarket_product_categories_carousel_v1() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$catc_options = $home_v1['catc'];

			$is_enabled = isset( $catc_options['is_enabled'] ) ? $catc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $catc_options['animation'] ) ? $catc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_product_categories_carousel_v1_section_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'section-top-categories',
				'pre_title'			=> isset( $catc_options['pre_title'] ) ? $catc_options['pre_title'] : wp_kses_post( __( 'Featured', 'techmarket' ) ),
				'section_title'		=> isset( $catc_options['section_title'] ) ? $catc_options['section_title'] : wp_kses_post( __( 'Top categories <br>this week', 'techmarket' ) ),
				'header_custom_nav'	=> isset( $catc_options['header_custom_nav'] ) ? filter_var( $catc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'button_text'		=> isset( $catc_options['button_text'] ) ? $catc_options['button_text'] : esc_html__( 'Full Catalog', 'techmarket' ),
				'button_link'		=> isset( $catc_options['button_link'] ) ? $catc_options['button_link'] : '#',
			) );

			$taxonomy_args = apply_filters( 'techmarket_product_categories_carousel_v1_taxonomy_args', array(
				'number'		=> isset( $catc_options['number'] ) ? $catc_options['number'] : 12,
				'columns'		=> isset( $catc_options['columns'] ) ? $catc_options['columns'] : 5,
				'slugs'			=> isset( $catc_options['slugs'] ) ? $catc_options['slugs'] : '',
			) );

			$carousel_args = apply_filters( 'techmarket_product_categories_carousel_v1_carousel_args', array(
				'slidesToShow'		=> isset( $catc_options['carousel_args']['slidesToShow'] ) ? intval( $catc_options['carousel_args']['slidesToShow'] ) : 5,
				'slidesToScroll'	=> isset( $catc_options['carousel_args']['slidesToScroll'] ) ? intval( $catc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'				=> isset( $catc_options['carousel_args']['dots'] ) ? filter_var( $catc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'			=> isset( $catc_options['carousel_args']['arrows'] ) ? filter_var( $catc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
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

if ( ! function_exists( 'techmarket_products_cards_carousel_with_bg_v1' ) ) {
	function techmarket_products_cards_carousel_with_bg_v1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$pcbg_options = $home_v1['pcbg'];

			$is_enabled = isset( $pcbg_options['is_enabled'] ) ? $pcbg_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcbg_options['animation'] ) ? $pcbg_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_cards_carousel_with_bg_v1_args', array(
				'animation'		    => $animation,
				'section_title'		=> isset( $pcbg_options['section_title'] ) ? $pcbg_options['section_title'] : wp_kses_post( __( '<strong>Power Audio &amp; Visual </strong>entertainment', 'techmarket' ) ),
				'section_class'		=> '',
				'bg_image'			=> isset( $pcbg_options['bg_image'] ) && intval( $pcbg_options['bg_image'] ) ? wp_get_attachment_image_src( $pcbg_options['bg_image'], array( '1920', '860' ) ) : array( '//placehold.it/1920x860', '1920', '860' ),
				'shortcode_tag'		=> isset( $pcbg_options['shortcode_content']['shortcode'] ) ? $pcbg_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pcbg_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcbg_options['shortcode_content'] ) : array( 'columns' => 2, 'per_page' => 12, 'template' => 'content-landscape-product-card' ),
				'carousel_args'		=> array(
					'rows'				=> isset( $pcbg_options['carousel_args']['rows'] ) ? intval( $pcbg_options['carousel_args']['rows'] ) : 2,
					'slidesPerRow'		=> isset( $pcbg_options['carousel_args']['slidesPerRow'] ) ? intval( $pcbg_options['carousel_args']['slidesPerRow'] ) : 2,
					'slidesToShow'		=> isset( $pcbg_options['carousel_args']['slidesToShow'] ) ? intval( $pcbg_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $pcbg_options['carousel_args']['slidesToScroll'] ) ? intval( $pcbg_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $pcbg_options['carousel_args']['dots'] ) ? filter_var( $pcbg_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcbg_options['carousel_args']['arrows'] ) ? filter_var( $pcbg_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 767,
							'settings'		=> array(
								'slidesPerRow'		=> 2,
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesPerRow'		=> 1,
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						)
					)
				)
			) );

			techmarket_products_cards_carousel_with_bg( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v1' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */
	function techmarket_products_carousel_tabs_v1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$pct_options = $home_v1['pct'];

			$is_enabled = isset( $pct_options['is_enabled'] ) ? $pct_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct_options['animation'] ) ? $pct_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v1_args', array(
				'animation'			=> $animation,
				'section_title'	=> isset( $pct_options['section_title'] ) ? $pct_options['section_title'] : esc_html__( 'Hot Best Sellers', 'techmarket' ),
				'section_class'	=> 'section-hot-new-arrivals',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct_options['tabs'][0]['title'] ) ? $pct_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][1]['title'] ) ? $pct_options['tabs'][1]['title'] : esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][2]['title'] ) ? $pct_options['tabs'][2]['title'] : esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][3]['title'] ) ? $pct_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '7' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct_options['carousel_args']['slidesToShow'] ) ? intval( $pct_options['carousel_args']['slidesToShow'] ) : 7,
					'slidesToScroll'	=> isset( $pct_options['carousel_args']['slidesToScroll'] ) ? intval( $pct_options['carousel_args']['slidesToScroll'] ) : 7,
					'dots'				=> isset( $pct_options['carousel_args']['dots'] ) ? filter_var( $pct_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct_options['carousel_args']['arrows'] ) ? filter_var( $pct_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 767,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 780,
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
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_2_column_banners_v1' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_2_column_banners_v1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$brs_options = $home_v1['brs'];
			$br1_options = $brs_options['br1'];
			$br2_options = $brs_options['br2'];

			$is_enabled = isset( $brs_options['is_enabled'] ) ? $brs_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $brs_options['animation'] ) ? $brs_options['animation'] : '';

			$args = apply_filters( 'techmarket_2_column_banners_v1_args', array(
				'banners'		=> array(
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __( '<strong>Shop now</strong> to find savings on everything you need<br> for the big game.', 'techmarket' ) ),
						'action_text'	=> isset( $br1_options['action_text'] ) ? $br1_options['action_text'] : esc_html__( 'Browse', 'techmarket' ),
						'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
						'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '1301', '259' ) ) : array( '//placehold.it/1301x259', '1301', '259' ),
						'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
						'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : '',
						'section_class'	=> 'banner-long text-in-right'
					),
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( '<strong>1000 mAh</strong> <br> Power Bank Pro.', 'techmarket' ) ),
						'price'			=> isset( $br2_options['price'] ) ? $br2_options['price'] : '$34.99',
						'action_text'	=> isset( $br2_options['action_text'] ) ? $br2_options['action_text'] : esc_html__( 'Buy Now', 'techmarket' ),
						'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
						'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '420', '259' ) ) : array( '//placehold.it/420x259', '420', '259' ),
						'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
						'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : '',
						'section_class'	=> 'banner-short text-in-left'
					)
				)
			) );

			techmarket_banners( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_vertical_tabs_v1' ) ) {
	/**
	 *
	 */
	function techmarket_products_carousel_vertical_tabs_v1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$vpc_options = $home_v1['vpc'];

			$is_enabled = isset( $vpc_options['is_enabled'] ) ? $vpc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $vpc_options['animation'] ) ? $vpc_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_vertical_tabs_v1_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $vpc_options['section_title'] ) ? $vpc_options['section_title'] : wp_kses_post( __( '<strong>Today Gadgets &amp; Mobile </strong> accessories', 'techmarket' ) ),
				'section_class'	=> 'stretch-full-width',
				'bg_image'		=> isset( $vpc_options['bg_image'] ) && intval( $vpc_options['bg_image'] ) ? wp_get_attachment_image_src( $vpc_options['bg_image'], array( '1616', '520' ) ) : array( '//placehold.it/1616x520', '1616', '520' ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $vpc_options['tabs'][0]['title'] ) ? $vpc_options['tabs'][0]['title'] : wp_kses_post( '<i class="tm tm-desktop-pc"></i> ' . esc_html__( 'Desktop PCs', 'techmarket' ) ),
						'shortcode_tag'		=> isset( $vpc_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $vpc_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $vpc_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $vpc_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '6' )
					),
					array(
						'title'				=> isset( $vpc_options['tabs'][1]['title'] ) ? $vpc_options['tabs'][1]['title'] : wp_kses_post( '<i class="tm tm-laptop"></i> ' . esc_html__( 'Ultrabooks', 'techmarket' ) ),
						'shortcode_tag'		=> isset( $vpc_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $vpc_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $vpc_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $vpc_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '6' )
					),
					array(
						'title'				=> isset( $vpc_options['tabs'][2]['title'] ) ? $vpc_options['tabs'][2]['title'] : wp_kses_post( '<i class="tm tm-smartphone"></i> ' . esc_html__( 'Smartphones', 'techmarket' ) ),
						'shortcode_tag'		=> isset( $vpc_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $vpc_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $vpc_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $vpc_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '6' )
					),
					array(
						'title'				=> isset( $vpc_options['tabs'][3]['title'] ) ? $vpc_options['tabs'][3]['title'] : wp_kses_post( '<i class="tm tm-digital-camera"></i> ' . esc_html__( 'Internet Cams', 'techmarket' ) ),
						'shortcode_tag'		=> isset( $vpc_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $vpc_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $vpc_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $vpc_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '6' )
					),
					array(
						'title'				=> isset( $vpc_options['tabs'][4]['title'] ) ? $vpc_options['tabs'][4]['title'] : wp_kses_post( '<i class="tm tm-accesories"></i> ' . esc_html__( 'Accessories', 'techmarket' ) ),
						'shortcode_tag'		=> isset( $vpc_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $vpc_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $vpc_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $vpc_options['tabs'][4]['shortcode_content'] ) : array( 'columns' => '6' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $vpc_options['carousel_args']['slidesToShow'] ) ? intval( $vpc_options['carousel_args']['slidesToShow'] ) : 6,
					'slidesToScroll'	=> isset( $vpc_options['carousel_args']['slidesToScroll'] ) ? intval( $vpc_options['carousel_args']['slidesToScroll'] ) : 6,
					'dots'				=> isset( $vpc_options['carousel_args']['dots'] ) ? filter_var( $vpc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $vpc_options['carousel_args']['arrows'] ) ? filter_var( $vpc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
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
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1600,
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

if ( ! function_exists( 'techmarket_products_carousel_tabs_with_featured_product_v1' ) ) {
	function techmarket_products_carousel_tabs_with_featured_product_v1() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$pcwfp_options = $home_v1['pcwfp'];

			$is_enabled = isset( $pcwfp_options['is_enabled'] ) ? $pcwfp_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcwfp_options['animation'] ) ? $pcwfp_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_with_featured_product_v1_args', array(
				'animation'		=> $animation,
				'section_class'		=> 'full-width',
				'section_title'	=> isset( $pcwfp_options['section_title'] ) ? $pcwfp_options['section_title'] : esc_html__( 'Hot New Arrivals', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'						=> isset( $pcwfp_options['tabs'][0]['title'] ) ? $pcwfp_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '6' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][0]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][0]['shortcode_content_featured']['shortcode'] : 'recent_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][0]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][0]['shortcode_content_featured'] ) : array()
					),
					array(
						'title'						=> isset( $pcwfp_options['tabs'][1]['title'] ) ? $pcwfp_options['tabs'][1]['title'] : esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '6' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][1]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][1]['shortcode_content_featured']['shortcode'] : 'featured_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][1]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][1]['shortcode_content_featured'] ) : array()
					),
					array(
						'title'						=> isset( $pcwfp_options['tabs'][2]['title'] ) ? $pcwfp_options['tabs'][2]['title'] : esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '6' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][2]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][2]['shortcode_content_featured']['shortcode'] : 'sale_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][2]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][2]['shortcode_content_featured'] ) : array()
					),
					array(
						'title'						=> isset( $pcwfp_options['tabs'][3]['title'] ) ? $pcwfp_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'				=> isset( $pcwfp_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pcwfp_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'			=> isset( $pcwfp_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '6' ),
						'shortcode_tag_featured'	=> isset( $pcwfp_options['tabs'][3]['shortcode_content_featured']['shortcode'] ) ? $pcwfp_options['tabs'][3]['shortcode_content_featured']['shortcode'] : 'top_rated_products',
						'shortcode_atts_featured'	=> isset( $pcwfp_options['tabs'][3]['shortcode_content_featured'] ) ? techmarket_get_atts_for_shortcode( $pcwfp_options['tabs'][3]['shortcode_content_featured'] ) : array()
					),
				),
				'carousel_args'	=> array(
					'rows'				=> isset( $pcwfp_options['carousel_args']['rows'] ) ? intval( $pcwfp_options['carousel_args']['rows'] ) : 2,
					'slidesPerRow'		=> isset( $pcwfp_options['carousel_args']['slidesPerRow'] ) ? intval( $pcwfp_options['carousel_args']['slidesPerRow'] ) : 6,
					'slidesToShow'		=> isset( $pcwfp_options['carousel_args']['slidesToShow'] ) ? intval( $pcwfp_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $pcwfp_options['carousel_args']['slidesToScroll'] ) ? intval( $pcwfp_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $pcwfp_options['carousel_args']['dots'] ) ? filter_var( $pcwfp_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcwfp_options['carousel_args']['arrows'] ) ? filter_var( $pcwfp_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(

						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesPerRow'		=> 2,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesPerRow'		=> 3,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 1599,
							'settings'		=> array(
								'slidesPerRow'		=> 4,
								'slidesToScroll'	=> 1
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs_with_featured_product( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_full_width_banner_v1' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_full_width_banner_v1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$sbr_options = $home_v1['sbr'];

			$is_enabled = isset( $sbr_options['is_enabled'] ) ? $sbr_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $sbr_options['animation'] ) ? $sbr_options['animation'] : '';

			$args = apply_filters( 'techmarket_full_width_banner_v1_args', array(
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

if ( ! function_exists( 'techmarket_products_carousel_block_v1_1' ) ) {
	function techmarket_products_carousel_block_v1_1() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$lpc1_options = $home_v1['lpc1'];

			$is_enabled = isset( $lpc1_options['is_enabled'] ) ? $lpc1_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $lpc1_options['animation'] ) ? $lpc1_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v1_1_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpc1_options['section_title'] ) ? $lpc1_options['section_title'] : esc_html__( 'Video Cameras & Photography', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-carousel',
				'header_custom_nav'	=> isset( $lpc1_options['header_custom_nav'] ) ? filter_var( $lpc1_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $lpc1_options['shortcode_content']['shortcode'] ) ? $lpc1_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $lpc1_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpc1_options['shortcode_content'] ) : array( 'columns' => '4', 'template' => 'content-landscape-product' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $lpc1_options['carousel_args']['slidesToShow'] ) ? intval( $lpc1_options['carousel_args']['slidesToShow'] ) : 4,
					'slidesToScroll'	=> isset( $lpc1_options['carousel_args']['slidesToScroll'] ) ? intval( $lpc1_options['carousel_args']['slidesToScroll'] ) : 2,
					'dots'				=> isset( $lpc1_options['carousel_args']['dots'] ) ? filter_var( $lpc1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $lpc1_options['carousel_args']['arrows'] ) ? filter_var( $lpc1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $lpc1_options['carousel_args']['prevArrow'] ) ? $lpc1_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $lpc1_options['carousel_args']['nextArrow'] ) ? $lpc1_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
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
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						)
					)
				)
			) );

			techmarket_products_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_with_banners' ) ) {
	function techmarket_products_carousel_with_banners() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$pct1_options = $home_v1['pcwsb']['pct1'];
			$pct2_options = $home_v1['pcwsb']['pct2'];
			$br1_options = $home_v1['pcwsb']['br1'];
			$br2_options = $home_v1['pcwsb']['br2'];
			$br3_options = $home_v1['pcwsb']['br3'];

			$is_enabled = isset( $home_v1['pcwsb']['is_enabled'] ) ? $home_v1['pcwsb']['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $home_v1['pcwsb']['animation'] ) ? $home_v1['pcwsb']['animation'] : '';

			$products_carousel_tabs_1_args = apply_filters( 'techmarket_pcwsb_v1_products_carousel_tabs_1_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $pct1_options['section_title'] ) ? $pct1_options['section_title'] : esc_html__( 'CES 2017 Arrivals', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct1_options['tabs'][0]['title'] ) ? $pct1_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '6' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][1]['title'] ) ? $pct1_options['tabs'][1]['title'] : esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '6' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][2]['title'] ) ? $pct1_options['tabs'][2]['title'] : esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '6' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][3]['title'] ) ? $pct1_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '6' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct1_options['carousel_args']['slidesToShow'] ) ? intval( $pct1_options['carousel_args']['slidesToShow'] ) : 6,
					'slidesToScroll'	=> isset( $pct1_options['carousel_args']['slidesToScroll'] ) ? intval( $pct1_options['carousel_args']['slidesToScroll'] ) : 6,
					'dots'				=> isset( $pct1_options['carousel_args']['dots'] ) ? filter_var( $pct1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct1_options['carousel_args']['arrows'] ) ? filter_var( $pct1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(

						array(
							'breakpoint'	=> 992,
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
							'breakpoint'	=> 1600,
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

			$products_carousel_tabs_2_args = apply_filters( 'techmarket_pcwsb_v1_products_carousel_tabs_2_args', array(
				'animation'		=> $animation,
				'section_title' => isset( $pct2_options['section_title'] ) ? $pct2_options['section_title'] : esc_html__( 'Virtual Reality Headsets', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct2_options['tabs'][0]['title'] ) ? $pct2_options['tabs'][0]['title'] : esc_html__( 'Best Choice', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '6' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][1]['title'] ) ? $pct2_options['tabs'][1]['title'] : esc_html__( 'Cardboards', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '6' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][2]['title'] ) ? $pct2_options['tabs'][2]['title'] : esc_html__( 'For Android', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '6' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][3]['title'] ) ? $pct2_options['tabs'][3]['title'] : esc_html__( 'For ios', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '6' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct2_options['carousel_args']['slidesToShow'] ) ? intval( $pct2_options['carousel_args']['slidesToShow'] ) : 6,
					'slidesToScroll'	=> isset( $pct2_options['carousel_args']['slidesToScroll'] ) ? intval( $pct2_options['carousel_args']['slidesToScroll'] ) : 6,
					'dots'				=> isset( $pct2_options['carousel_args']['dots'] ) ? filter_var( $pct2_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct2_options['carousel_args']['arrows'] ) ? filter_var( $pct2_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(

						array(
							'breakpoint'	=> 992,
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
							'breakpoint'	=> 1600,
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

			$banner_1_args = apply_filters( 'techmarket_pcwsb_v1_banner_1_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'text-in-left',
				'pre_title'		=> isset( $br2_options['pre_title'] ) ? $br2_options['pre_title'] : esc_html__( 'Best Gift Idea', 'techmarket' ),
				'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( '<strong>Mini Two Wheel</strong> <br>Self Balancing<br>  Scooter', 'techmarket' ) ),
				'price'			=> isset( $br2_options['price'] ) ? $br2_options['price'] : '<ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>339.99</span></ins> <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>689</span></del>',
				'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
				'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '414', '256' ) ) : array( '//placehold.it/414x256', '414', '256' ),
				'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
				'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
				'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : ''
			) );

			$banner_2_args = apply_filters( 'techmarket_pcwsb_v1_banner_2_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'text-in-left',
				'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __( '<strong>20% Off Tech</strong> <br> at Ultrabooks, <br> Laptops, Tablets<br>Notebooks &<br>More', 'techmarket' ) ),
				'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
				'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '414', '256' ) ) : array( '//placehold.it/414x256', '414', '256' ),
				'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
				'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
				'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : ''
			) );

			$banner_3_args = apply_filters( 'techmarket_pcwsb_v1_banner_3_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'small-banner text-in-left',
				'title'			=> isset( $br3_options['title'] ) ? $br3_options['title'] : wp_kses_post( __( 'New Arrivals<br> in <strong>Accessories</strong> <br> at Best Prices.', 'techmarket' ) ),
				'action_text'	=> isset( $br3_options['action_text'] ) ? $br3_options['action_text'] : esc_html__( 'View All', 'techmarket' ),
				'action_link'	=> isset( $br3_options['action_link'] ) ? $br3_options['action_link'] : '#',
				'bg_image'		=> isset( $br3_options['bg_image'] ) && intval( $br3_options['bg_image'] ) ? wp_get_attachment_image_src( $br3_options['bg_image'], array( '420', '259' ) ) : array( '//placehold.it/420x259', '420', '259' ),
				'bg_choice'		=> isset( $br3_options['bg_choice'] ) ? $br3_options['bg_choice'] : 'image',
				'bg_color' 		=> isset( $br3_options['bg_color'] ) ? $br3_options['bg_color'] : '',
				'bg_height' 	=> isset( $br3_options['bg_height'] ) ? $br3_options['bg_height'] : ''
			) );

			?><div class="product-carousel-with-banners stretch-full-width">
				<div class="col-full">
					<div class="row">
						<div class="products-carousel-tabs-block">
							<?php techmarket_products_carousel_tabs( $products_carousel_tabs_1_args ); ?>
							<?php techmarket_products_carousel_tabs( $products_carousel_tabs_2_args ); ?>
						</div>
						<div class="banners-block">
							<div class="side-banners">
								<?php techmarket_banner( $banner_1_args ); ?>
								<?php techmarket_banner( $banner_2_args ); ?>
								<?php techmarket_banner( $banner_3_args ); ?>
							</div>
						</div>
					</div>
				</div>
			</div><?php
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_block_v1_2' ) ) {
	function techmarket_products_carousel_block_v1_2() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$lpc2_options = $home_v1['lpc2'];

			$is_enabled = isset( $lpc2_options['is_enabled'] ) ? $lpc2_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $lpc2_options['animation'] ) ? $lpc2_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v1_2_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpc2_options['section_title'] ) ? $lpc2_options['section_title'] : esc_html__( 'Recently viewed products', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-carousel',
				'header_custom_nav'	=> isset( $lpc2_options['header_custom_nav'] ) ? filter_var( $lpc2_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $lpc2_options['shortcode_content']['shortcode'] ) ? $lpc2_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $lpc2_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpc2_options['shortcode_content'] ) : array( 'columns' => '5', 'template' => 'content-landscape-product' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $lpc2_options['carousel_args']['slidesToShow'] ) ? intval( $lpc2_options['carousel_args']['slidesToShow'] ) : 5,
					'slidesToScroll'	=> isset( $lpc2_options['carousel_args']['slidesToScroll'] ) ? intval( $lpc2_options['carousel_args']['slidesToScroll'] ) : 2,
					'dots'				=> isset( $lpc2_options['carousel_args']['dots'] ) ? filter_var( $lpc2_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $lpc2_options['carousel_args']['arrows'] ) ? filter_var( $lpc2_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $lpc2_options['carousel_args']['prevArrow'] ) ? $lpc2_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $lpc2_options['carousel_args']['nextArrow'] ) ? $lpc2_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 992,
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

if ( ! function_exists( 'techmarket_brands_carousel_v1' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v1() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v1 	= techmarket_get_home_v1_meta();
			$bc_options = $home_v1['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v1_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v1_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args 	= apply_filters( 'techmarket_brands_carousel_v1_carousel_args', array(
				'slidesToShow'	=> isset( $bc_options['carousel_args']['slidesToShow'] ) ? intval( $bc_options['carousel_args']['slidesToShow'] ) : 6,
				'slidesToScroll'=> isset( $bc_options['carousel_args']['slidesToScroll'] ) ? intval( $bc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'			=> isset( $bc_options['carousel_args']['dots'] ) ? filter_var( $bc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'		=> isset( $bc_options['carousel_args']['arrows'] ) ? filter_var( $bc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'responsive'	=> array(
					array(
						'breakpoint'	=> 400,
						'settings'		=> array(
							'slidesToShow'		=> 1,
							'slidesToScroll'	=> 1
						)
					),
					array(
						'breakpoint'	=> 800,
						'settings'		=> array(
							'slidesToShow'		=> 3,
							'slidesToScroll'	=> 3
						)
					),
					array(
						'breakpoint'	=> 992,
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

if( ! function_exists( 'techmarket_home_v1_hook_control' ) ) {
	function techmarket_home_v1_hook_control() {
		if( is_page_template( array( 'template-homepage-v1.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v1' );

			$home_v1 = techmarket_get_home_v1_meta();
			add_action( 'techmarket_homepage_v1', 'techmarket_init_structured_data',								5 );
			add_action( 'techmarket_homepage_v1', 'techmarket_revslider_v1',										isset( $home_v1['sdr']['priority'] ) ? intval( $home_v1['sdr']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v1', 'techmarket_features_list_v1',									isset( $home_v1['fl']['priority'] ) ? intval( $home_v1['fl']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v1', 'techmarket_deals_carousel_and_products_carousel_tabs',			isset( $home_v1['dwtc']['priority'] ) ? intval( $home_v1['dwtc']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v1', 'techmarket_fullwidth_notice_v1',									isset( $home_v1['ntc']['priority'] ) ? intval( $home_v1['ntc']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v1', 'techmarket_product_categories_carousel_v1',						isset( $home_v1['catc']['priority'] ) ? intval( $home_v1['catc']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v1', 'techmarket_products_cards_carousel_with_bg_v1',					isset( $home_v1['pcbg']['priority'] ) ? intval( $home_v1['pcbg']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_tabs_v1',							isset( $home_v1['pct']['priority'] ) ? intval( $home_v1['pct']['priority'] ) : 70 );
			add_action( 'techmarket_homepage_v1', 'techmarket_2_column_banners_v1',									isset( $home_v1['brs']['priority'] ) ? intval( $home_v1['brs']['priority'] ) : 80 );
			add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_block_v1_1',						isset( $home_v1['lpc1']['priority'] ) ? intval( $home_v1['lpc1']['priority'] ) : 90 );
			add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_vertical_tabs_v1',					isset( $home_v1['vpc']['priority'] ) ? intval( $home_v1['vpc']['priority'] ) : 100 );
			add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_tabs_with_featured_product_v1',		isset( $home_v1['pcwfp']['priority'] ) ? intval( $home_v1['pcwfp']['priority'] ) : 110 );
			add_action( 'techmarket_homepage_v1', 'techmarket_full_width_banner_v1',								isset( $home_v1['sbr']['priority'] ) ? intval( $home_v1['sbr']['priority'] ) : 120 );
			add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_with_banners',						isset( $home_v1['pcwsb']['priority'] ) ? intval( $home_v1['pcwsb']['priority'] ) : 130 );
			add_action( 'techmarket_homepage_v1', 'techmarket_products_carousel_block_v1_2',						isset( $home_v1['lpc2']['priority'] ) ? intval( $home_v1['lpc2']['priority'] ) : 140 );
			add_action( 'techmarket_homepage_v1', 'techmarket_brands_carousel_v1',									isset( $home_v1['bc']['priority'] ) ? intval( $home_v1['bc']['priority'] ) : 150 );
			add_action( 'techmarket_homepage_v1', 'techmarket_homepage_content',									200 );
		}
	}
}
