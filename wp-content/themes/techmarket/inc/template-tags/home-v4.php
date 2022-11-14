<?php
/**
 * Template tags for Home v4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v4_options() {
	$home_v4 = array(
		'sdr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'shortcode'			=> ''
		),
		'brs1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 20,
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
						'template'      => 'content-product-featured'
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
				'header_custom_nav'	=> 'yes',
				'tabs' 				=> array(
					array(
						'title'				=> esc_html__( 'New Arrivals', 'techmarket' ),
						'shortcode_content'	=> array(
						'shortcode'			=> 'recent_products',
							'shortcode_atts'	=> array(
								'columns'		=> '3',
								'template'      => 'content-product-featured'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'On Sale', 'techmarket' ),
						'shortcode_content'	=> array(
						'shortcode'			=> 'featured_products',
							'shortcode_atts'	=> array(
								'columns'		=> '3',
								'template'      => 'content-product-featured'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Best Rated', 'techmarket' ),
						'shortcode_content'	=> array(
						'shortcode'			=> 'sale_products',
							'shortcode_atts'	=> array(
								'columns'		=> '3',
								'template'      => 'content-product-featured'
							)
						)
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> 3,
					'slidesToScroll'	=> 3,
					'dots'				=> 'no',
					'arrows'			=> 'yes',
					'prevArrow'			=>  '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=>  '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			)
		),
		'ntc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'notice_info'		=> esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
		),
		'fpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'pre_title'			=> esc_html__( 'Featured Product', 'techmarket' ),
			'section_title'		=> sprintf( '<strong>%s</strong><br>%s',  esc_html__( 'The features you want,', 'techmarket' ), esc_html__( 'all in one place', 'techmarket' ) ),
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'=> array(
					'per_page'		=> 8,
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 1,
				'dots'				=> 'no',
				'arrows'			=> 'yes',
				'slidesToScroll'	=> 1
			)
		),
		'brs2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
			'animation'			=> '',
			'br1'				=> array(
				'title'				=> wp_kses_post( __(  'Your Home <br> on every screen <br>imagination', 'techmarket' ) ),
				'action_text'		=> esc_html__( 'Check More', 'techmarket' ),
				'action_link'		=> '#',
				'bg_choice'			=> 'image'
			),
			'br2'				=> array(
				'title'				=> wp_kses_post( __( 'No worry anymore <br> with Fast Charge', 'techmarket' ) ),
				'sub_title'			=> esc_html__( 'Discover up to 6000mAh in one device', 'techmarket' ),
				'action_text'		=>  esc_html__( 'Buy Now', 'techmarket' ),
				'action_link'		=> '#',
				'bg_choice'			=> 'image'
			),
		),
		'pcwtb'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 70,
			'animation'			=> '',
			'lpcw'				=> array(
				'section_title'		=> esc_html__( 'Top Rated Products', 'techmarket' ),
				'header_custom_nav'	=> 'yes',
				'shortcode_content'	=> array(
					'shortcode'		=> 'recent_products',
					'shortcode_atts'	=> array(
						'columns'		=> 1,
						'per_page'		=> 4,
						'template'		=> 'content-landscape-product-widget'
					),
				),
				'carousel_args'		=> array(
					'rows'			=> 4,
					'slidesPerRow'	=> 1,
					'slidesToShow'	=> 1,
					'slidesToScroll'=> 1,
					'dots'			=> 'no',
					'arrows'		=> 'yes',
					'prevArrow'		=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'		=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			),
			'br'				=> array(
				'section_title' => esc_html__( 'Featured Brands', 'techmarket' ),
				'orderby'		=> 'title',
				'order'			=> 'ASC',
				'number'		=> 6,
				'hide_empty'	=> 'no'
			),
			'pcwt1'				=> array(
				'section_title'	=> esc_html__( 'CES 2017 Arrivals', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=>  esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'recent_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4',
								'template'		=> 'content-product-featured'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'featured_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4',
								'template'		=> 'content-product-featured'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'sale_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4',
								'template'		=> 'content-product-featured'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'top_rated_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4',
								'template'		=> 'content-product-featured'
							)
						)
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> 4,
					'slidesToScroll'	=> 4,
					'dots'				=> 'yes',
					'arrows'			=> 'no'
				)
			),
			'pcwt2'				=> array(
				'section_title' => esc_html__( 'Cell Phones & Tablets', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=>  esc_html__( 'Bestsellers', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'recent_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4',
								'template'		=> 'content-product-featured'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Phones', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'featured_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4',
								'template'		=> 'content-product-featured'
							)
						)
					),
					array(
						'title'				=>  esc_html__( 'Tablets', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'sale_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4',
								'template'		=> 'content-product-featured'
							)
						)
					),
					array(
						'title'				=> esc_html__( 'Phone Accessories', 'techmarket' ),
						'shortcode_content'	=> array(
							'shortcode'			=> 'top_rated_products',
							'shortcode_atts'	=> array(
								'columns'		=> '4',
								'template'		=> 'content-product-featured'
							)
						)
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=>  4,
					'slidesToScroll'	=>  4,
					'dots'				=> 'yes',
					'arrows'			=> 'no'
				)
			)
		),
		'lpct'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 80,
			'animation'			=> '',
			'section_title'	    => wp_kses_post( __('Hurry up! <span>Special Offers</span>', 'techmarket' ) ),
			'tabs'				=> array(
				array(
					'title'				=> esc_html__( 'Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 3,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Audio', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 3,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'GPS &amp; Navigation', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 3,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'TV &amp; Video', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 3,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Cell Phones', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'best_selling_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 3,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Computers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 3,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Accessories', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 3,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					),
				)
			),
			'carousel_args'	=> array(
				'rows'			=> 2,
				'slidesPerRow'	=> 3,
				'slidesToShow'	=> 1,
				'slidesToScroll'=> 1,
				'dots'			=> 'yes',
				'arrows'		=> 'no'
			)
		),
		'pcwt'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 90,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Hot Best Sellers', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Top 20', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'		=> '7'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Audio &amp; Video', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'		=> '7'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'		=> '7'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Video Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'		=> '7'
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
		'sbr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 100,
			'animation'			=> '',
			'title'				=> wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
			'sub_title'			=> esc_html__( 'Travel up to 22km in a single charge.', 'techmarket' ),
			'action_text'		=> wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'		=> '#',
			'bg_choice'			=> 'image'
		),
		'lpcw'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 110,
			'animation'			=> '',
			'lpcw1'				=> array(
				'section_title'		=> esc_html__( 'Best Rated Products', 'techmarket' ),
				'header_custom_nav'	=> 'yes',
				'shortcode_content'	=> array(
					'shortcode'		=> 'recent_products',
					'shortcode_atts'	=> array(
						'columns'		=> 1,
						'per_page'		=> 4,
						'template'		=> 'content-landscape-product-widget'
					),
				),
				'carousel_args'		=> array(
					'rows'			=> 4,
					'slidesPerRow'	=> 1,
					'slidesToShow'	=> 1,
					'slidesToScroll'=> 1,
					'dots'			=> 'no',
					'arrows'		=> 'yes',
				)
			),
			'lpcw2'				=> array(
				'section_title'		=> esc_html__( 'Virtual Reality Headsets', 'techmarket' ),
				'header_custom_nav'	=> 'yes',
				'shortcode_content'	=> array(
					'shortcode'		=> 'featured_products',
					'shortcode_atts'	=> array(
						'columns'		=> 1,
						'per_page'		=> 4,
						'template'		=> 'content-landscape-product-widget'
					),
				),
				'carousel_args'		=> array(
					'rows'			=> 4,
					'slidesPerRow'	=> 1,
					'slidesToShow'	=> 1,
					'slidesToScroll'=> 1,
					'dots'			=> 'no',
					'arrows'		=> 'yes',
				)
			),
			'lpcw3'				=> array(
				'section_title'		=> esc_html__( 'Deals of the Day', 'techmarket' ),
				'header_custom_nav'	=> 'yes',
				'shortcode_content'	=> array(
					'shortcode'		=> 'sale_products',
					'shortcode_atts'	=> array(
						'columns'		=> 1,
						'per_page'		=> 4,
						'template'		=> 'content-landscape-product-widget'
					),
				),
				'carousel_args'		=> array(
					'rows'			=> 4,
					'slidesPerRow'	=> 1,
					'slidesToShow'	=> 1,
					'slidesToScroll'=> 1,
					'dots'			=> 'no',
					'arrows'		=> 'yes',
				)
			),
			'lpcw4'				=> array(
				'section_title'		=> esc_html__( 'Video Cameras', 'techmarket' ),
				'header_custom_nav'	=> 'yes',
				'shortcode_content'	=> array(
					'shortcode'		=> 'top_rated_products',
					'shortcode_atts'	=> array(
						'columns'		=> 1,
						'per_page'		=> 4,
						'template'		=> 'content-landscape-product-widget'
					),
				),
				'carousel_args'		=> array(
					'rows'			=> 4,
					'slidesPerRow'	=> 1,
					'slidesToShow'	=> 1,
					'slidesToScroll'=> 1,
					'dots'			=> 'no',
					'arrows'		=> 'yes',
				)
			),
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
		)
	);

	return apply_filters( 'techmarket_get_default_home_v4_options', $home_v4 );
}

function techmarket_get_home_v4_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v4_options = get_post_meta( $post->ID, '_home_v4_options', true );
		$home_v4_options = maybe_unserialize( $clean_home_v4_options );

		if( ! is_array( $home_v4_options ) ) {
			$home_v4_options = json_decode( $clean_home_v4_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v4_options();
			$home_v4 = wp_parse_args( $home_v4_options, $default_options );
		} else {
			$home_v4 = $home_v4_options;
		}

		return apply_filters( 'techmarket_home_v4_meta', $home_v4, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_v4' ) ) {
	/**
	 * Displays Slider in Home v4
	 */
	function techmarket_revslider_v4() {

		$home_v4 	= techmarket_get_home_v4_meta();
		$sdr 		= $home_v4['sdr'];

		$is_enabled = isset( $sdr['is_enabled'] ) ? $sdr['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $sdr['animation'] ) ? $sdr['animation'] : '';
		$shortcode = !empty( $sdr['shortcode'] ) ? $sdr['shortcode'] : '[rev_slider alias="home-v4-slider"]';

		$section_class = 'home-v4-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_home_v4_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_3_column_banners_v4' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_3_column_banners_v4() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v4 	 = techmarket_get_home_v4_meta();
			$brs_options = $home_v4['brs1'];
			$br1_options = $brs_options['br1'];
			$br2_options = $brs_options['br2'];
			$br3_options = $brs_options['br3'];

			$is_enabled  = isset( $brs_options['is_enabled'] ) ? $brs_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $brs_options['animation'] ) ? $brs_options['animation'] : '';

			$args = apply_filters( 'techmarket_3_column_banners_v4_args', array(
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
						'bg_height' 		=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : '',
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

if ( ! function_exists( 'techmarket_products_carousel_with_tabs_carousel_v4' ) ) {
	function techmarket_products_carousel_with_tabs_carousel_v4() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v4 	 = techmarket_get_home_v4_meta();
			$pc_options  = $home_v4['pcwtc']['pc'];
			$pct_options = $home_v4['pcwtc']['pct'];

			$is_enabled  = isset( $home_v4['pcwtc']['is_enabled'] ) ? $home_v4['pcwtc']['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $home_v4['pcwtc']['animation'] ) ? $home_v4['pcwtc']['animation'] : '';

			$pc_args = apply_filters( 'techmarket_pcwtc_v4_pc_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pc_options['section_title'] ) ? $pc_options['section_title'] : esc_html__( 'Trending Now', 'techmarket' ),
				'section_class'		=> 'carousel-tabs-with-no-hover section-single-carousel column-1-single-carousel ',
				'header_custom_nav'	=> isset( $pc_options['header_custom_nav'] ) ? filter_var( $pc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $pc_options['shortcode_content']['shortcode'] ) ? $pc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pc_options['shortcode_content'] ) : array( 'columns' => '1', 'template' => 'content-product-featured' ),
				'carousel_args'		=> array(
					'slidesToShow'		=>  isset( $pc_options['carousel_args']['slidesToShow'] ) ? intval( $pc_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=>  isset( $pc_options['carousel_args']['slidesToScroll'] ) ? intval( $pc_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=>  isset( $pc_options['carousel_args']['dots'] ) ? filter_var( $pc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=>  isset( $pc_options['carousel_args']['arrows'] ) ? filter_var( $pc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=>  isset( $pc_options['carousel_args']['prevArrow'] ) ? $pc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=>  isset( $pc_options['carousel_args']['nextArrow'] ) ? $pc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 767,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 799,
							'settings'		=> array(
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 800,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						)
					)
				)
			) );

			$products_carousel_tabs_args = apply_filters( 'techmarket_pcwtc_v4_products_carousel_tabs_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pct_options['section_title'] ) ? $pct_options['section_title'] : '',
				'header_custom_nav'	=> isset( $pct_options['header_custom_nav'] ) ? filter_var( $pct_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'section_class'		=> 'carousel-tabs-with-no-hover column-2',
				'tabs' 				=> array(
					array(
						'title'				=> isset( $pct_options['tabs'][0]['title'] ) ? $pct_options['tabs'][0]['title'] : esc_html__( 'New Arrivals', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '3', 'template' => 'content-product-featured' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][1]['title'] ) ? $pct_options['tabs'][1]['title'] : esc_html__( 'On Sale', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '3', 'template' => 'content-product-featured' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][2]['title'] ) ? $pct_options['tabs'][2]['title'] : esc_html__( 'Best Rated', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '3', 'template' => 'content-product-featured' )
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
			<section class="section-single-carousel-with-tab-product">
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

if ( ! function_exists( 'techmarket_fullwidth_notice_v4' ) ) {
	function techmarket_fullwidth_notice_v4() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v4 	= techmarket_get_home_v4_meta();
			$ntc_options = $home_v4['ntc'];

			$is_enabled = isset( $ntc_options['is_enabled'] ) ? $ntc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ntc_options['animation'] ) ? $ntc_options['animation'] : '';

			$args = apply_filters( 'techmarket_fullwidth_notice_v4_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'stretch-full-width',
				'notice_info'		=> isset( $ntc_options['notice_info'] ) ? $ntc_options['notice_info'] : esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
			) );

			techmarket_fullwidth_notice( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_cards_carousel_block_v4' ) ) {
	function techmarket_products_cards_carousel_block_v4() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v4 	= techmarket_get_home_v4_meta();
			$fpc_options = $home_v4['fpc'];

			$is_enabled = isset( $fpc_options['is_enabled'] ) ? $fpc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $fpc_options['animation'] ) ? $fpc_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_cards_carousel_block_v4_args', array(
				'animation'			=> $animation,
				'pre_title'			=> isset( $fpc_options['pre_title'] ) ? $fpc_options['pre_title'] : esc_html__( 'Featured Product', 'techmarket' ),
				'section_title'		=> isset( $fpc_options['section_title'] ) ? $fpc_options['section_title'] : sprintf( '<strong>%s</strong><br>%s', esc_html__( 'The features you want,', 'techmarket' ), esc_html__( 'all in one place', 'techmarket' ) ),
				'section_class'		=> '',
				'shortcode_tag'		=> isset( $fpc_options['shortcode_content']['shortcode'] ) ? $fpc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $fpc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $fpc_options['shortcode_content'] ) : array( 'per_page' => '8' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $fpc_options['carousel_args']['slidesToShow'] ) ? intval( $fpc_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $fpc_options['carousel_args']['slidesToScroll'] ) ? intval( $fpc_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $fpc_options['carousel_args']['dots'] ) ? filter_var( $fpc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $fpc_options['carousel_args']['arrows'] ) ? filter_var( $fpc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $fpc_options['carousel_args']['prevArrow'] ) ? $fpc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $fpc_options['carousel_args']['nextArrow'] ) ? $fpc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			) );

			techmarket_product_card_carousel_with_gallery( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_2_column_banners_v4' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_2_column_banners_v4() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v4 	= techmarket_get_home_v4_meta();
			$brs_options = $home_v4['brs2'];
			$br1_options = $brs_options['br1'];
			$br2_options = $brs_options['br2'];

			$is_enabled = isset( $brs_options['is_enabled'] ) ? $brs_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $brs_options['animation'] ) ? $brs_options['animation'] : '';

			$args = apply_filters( 'techmarket_2_column_banners_v4_args', array(
				'section_class'	=> 'home4-banner techmarket-banner',
				'banners'		=> array(
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __(  'Your Home <br> on every screen <br>imagination', 'techmarket' )),
						'action_text'	=> isset( $br1_options['action_text'] ) ? $br1_options['action_text'] : esc_html__( 'Check More', 'techmarket' ),
						'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
						'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '870', '484' ) ) : array( '//placehold.it/870x484', '870', '484' ),
						'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
						'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : '',
						'section_class'	=> 'text-in-right'
					),
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( 'No worry anymore <br> with Fast Charge', 'techmarket' ) ),
						'sub_title'		=> isset( $br2_options['sub_title'] ) ? $br2_options['sub_title'] : esc_html__( 'Discover up to 6000mAh in one device', 'techmarket' ),
						'action_text'	=> isset( $br2_options['action_text'] ) ? $br2_options['action_text'] : esc_html__( 'Buy Now', 'techmarket' ),
						'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
						'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '870', '484' ) ) : array( '//placehold.it/870x484', '870', '484' ),
						'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
						'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : '',
						'section_class'	=> 'text-in-left'
					)
				)
			) );

			techmarket_banners( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_widget_with_tab_carousel' ) ) {
	function techmarket_products_widget_with_tab_carousel() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v4 		= techmarket_get_home_v4_meta();
			$pcwtb_options 	= $home_v4['pcwtb'];
			$lpcw_options 	= $pcwtb_options['lpcw'];
			$br_options 	= $pcwtb_options['br'];
			$pcwt1_options 	= $pcwtb_options['pcwt1'];
			$pcwt2_options 	= $pcwtb_options['pcwt2'];

			$is_enabled = isset( $pcwtb_options['is_enabled'] ) ? $pcwtb_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcwtb_options['animation'] ) ? $pcwtb_options['animation'] : '';

			$landscape_widget_args = apply_filters( 'techmarket_pcwtb_v4_landscape_widget_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpcw_options['section_title'] ) ? $lpcw_options['section_title'] : esc_html__( 'Top Rated Products', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-widget-carousel',
				'header_custom_nav'	=> isset( $lpcw_options['header_custom_nav'] ) ? filter_var( $lpcw_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : false,
				'shortcode_tag'		=> isset( $lpcw_options['shortcode_content']['shortcode'] ) ? $lpcw_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $lpcw_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpcw_options['shortcode_content'] ) : array( 'columns' => 1, 'per_page' => 4, 'template' => 'content-landscape-product-widget' ),
				'carousel_args'		=> array(
					'rows'				=> isset( $lpcw_options['carousel_args']['rows'] ) ? intval( $lpcw_options['carousel_args']['rows'] ) : 4,
					'slidesPerRow'		=> isset( $lpcw_options['carousel_args']['slidesPerRow'] ) ? intval( $lpcw_options['carousel_args']['slidesPerRow'] ) : 1,
					'slidesToShow'		=> isset( $lpcw_options['carousel_args']['slidesToShow'] ) ? intval( $lpcw_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $lpcw_options['carousel_args']['slidesToScroll'] ) ? intval( $lpcw_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $lpcw_options['carousel_args']['dots'] ) ? filter_var( $lpcw_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $lpcw_options['carousel_args']['arrows'] ) ? filter_var( $lpcw_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 580,
							'settings'		=> array(
								'rows'				=> 2,
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'rows'				=> 7,
								'slidesToShow'		=> 1,
								'slidesToScroll'	=> 1
							)
						)
					)
				)
			) );

			$brands_args = apply_filters( 'techmarket_pcwtb_v4_brands_args', array(
				'section_args' 	=> array(
					'animation'		=> $animation,
					'section_title' => isset( $br_options['section_title'] ) ? $br_options['section_title'] : esc_html__( 'Featured Brands', 'techmarket' ),
					'section_class'	=> 'columns-2',
				),
				'taxonomy_args'	=> array(
					'orderby'		=> isset( $br_options['orderby'] ) ? $br_options['orderby'] : 'title',
					'order'			=> isset( $br_options['order'] ) ? $br_options['order'] : 'ASC',
					'number'		=> isset( $br_options['number'] ) ? $br_options['number'] : 6,
					'hide_empty'	=> isset( $br_options['hide_empty'] ) ? filter_var( $br_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
				)
			) );

			$products_carousel_tabs_1_args = apply_filters( 'techmarket_pcwtb_v4_products_carousel_tabs_1_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'carousel-tabs-with-no-hover ',
				'section_title'	=> isset( $pcwt1_options['section_title'] ) ? $pcwt1_options['section_title'] : esc_html__( 'CES 2017 Arrivals', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pcwt1_options['tabs'][0]['title'] ) ? $pcwt1_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt1_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pcwt1_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pcwt1_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt1_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '4','template' => 'content-product-featured' )
					),
					array(
						'title'				=> isset( $pcwt1_options['tabs'][1]['title'] ) ? $pcwt1_options['tabs'][1]['title'] : esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt1_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pcwt1_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pcwt1_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt1_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '4','template' => 'content-product-featured' )
					),
					array(
						'title'				=> isset( $pcwt1_options['tabs'][2]['title'] ) ? $pcwt1_options['tabs'][2]['title'] : esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt1_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pcwt1_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pcwt1_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt1_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '4','template' => 'content-product-featured' )
					),
					array(
						'title'				=> isset( $pcwt1_options['tabs'][3]['title'] ) ? $pcwt1_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt1_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pcwt1_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pcwt1_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt1_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '4','template' => 'content-product-featured' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pcwt1_options['carousel_args']['slidesToShow'] ) ? intval( $pcwt1_options['carousel_args']['slidesToShow'] ) : 4,
					'slidesToScroll'	=> isset( $pcwt1_options['carousel_args']['slidesToScroll'] ) ? intval( $pcwt1_options['carousel_args']['slidesToScroll'] ) : 4,
					'dots'				=> isset( $pcwt1_options['carousel_args']['dots'] ) ? filter_var( $pcwt1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcwt1_options['carousel_args']['arrows'] ) ? filter_var( $pcwt1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
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
				)
			) );

			$products_carousel_tabs_2_args = apply_filters( 'techmarket_pcwtb_v4_products_carousel_tabs_2_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'carousel-tabs-with-no-hover',
				'section_title' => isset( $pcwt2_options['section_title'] ) ? $pcwt2_options['section_title'] : esc_html__( 'Cell Phones & Tablets', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pcwt2_options['tabs'][0]['title'] ) ? $pcwt2_options['tabs'][0]['title'] : esc_html__( 'Bestsellers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt2_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pcwt2_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pcwt2_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt2_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '4','template' => 'content-product-featured' )
					),
					array(
						'title'				=> isset( $pcwt2_options['tabs'][1]['title'] ) ? $pcwt2_options['tabs'][1]['title'] : esc_html__( 'Phones', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt2_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pcwt2_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pcwt2_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt2_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '4','template' => 'content-product-featured' )
					),
					array(
						'title'				=> isset( $pcwt2_options['tabs'][2]['title'] ) ? $pcwt2_options['tabs'][2]['title'] : esc_html__( 'Tablets', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt2_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pcwt2_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pcwt2_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt2_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '4','template' => 'content-product-featured' )
					),
					array(
						'title'				=> isset( $pcwt2_options['tabs'][3]['title'] ) ? $pcwt2_options['tabs'][3]['title'] : esc_html__( 'Phone Accessories', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt2_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pcwt2_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pcwt2_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt2_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '4','template' => 'content-product-featured' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pcwt2_options['carousel_args']['slidesToShow'] ) ? intval( $pcwt2_options['carousel_args']['slidesToShow'] ) : 4,
					'slidesToScroll'	=> isset( $pcwt2_options['carousel_args']['slidesToScroll'] ) ? intval( $pcwt2_options['carousel_args']['slidesToScroll'] ) : 4,
					'dots'				=> isset( $pcwt2_options['carousel_args']['dots'] ) ? filter_var( $pcwt2_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcwt2_options['carousel_args']['arrows'] ) ? filter_var( $pcwt2_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
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
				)
			) );

			?>
			<div class="row section-products-carousel-widget-with-tabs">
				<div class="products-carousel-with-brands">
					<?php techmarket_products_carousel( $landscape_widget_args ); ?>
					<?php techmarket_brands( $brands_args['section_args'], $brands_args['taxonomy_args'] ); ?>
				</div>
				<div class="products-carousel-tabs-block">
					<?php techmarket_products_carousel_tabs( $products_carousel_tabs_1_args ); ?>
					<?php techmarket_products_carousel_tabs( $products_carousel_tabs_2_args ); ?>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v4_1' ) ) {
	function techmarket_products_carousel_tabs_v4_1() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v4 		= techmarket_get_home_v4_meta();
			$lpct_options 	= $home_v4['lpct'];

			$is_enabled = isset( $lpct_options['is_enabled'] ) ? $lpct_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $lpct_options['animation'] ) ? $lpct_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v4_1_args', array(
				'animation'			=> $animation,
				'section_class'		=> 'section-product-cards-carousel-tabs stretch-full-width',
				'header_nav_align'	=> 'justify-content-center',
				'section_title'		=> isset( $lpct_options['section_title'] ) ? $lpct_options['section_title'] : wp_kses_post( __('Hurry up! <span>Special Offers</span>', 'techmarket' ) ),
				'tabs' 				=> array(
					array(
						'title'				=> isset( $lpct_options['tabs'][0]['title'] ) ? $lpct_options['tabs'][0]['title'] : esc_html__( 'Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => 3, 'per_page' => 12, 'template' => 'content-landscape-product-card' )
					),
					array(
						'title'				=> isset( $lpct_options['tabs'][1]['title'] ) ? $lpct_options['tabs'][1]['title'] : esc_html__( 'Audio', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => 3, 'per_page' => 12, 'template' => 'content-landscape-product-card' )
					),
					array(
						'title'				=> isset( $lpct_options['tabs'][2]['title'] ) ? $lpct_options['tabs'][2]['title'] : esc_html__( 'GPS &amp; Navigation', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => 3, 'per_page' => 12, 'template' => 'content-landscape-product-card' )
					),
					array(
						'title'				=> isset( $lpct_options['tabs'][3]['title'] ) ? $lpct_options['tabs'][3]['title'] : esc_html__( 'TV &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => 3, 'per_page' => 12, 'template' => 'content-landscape-product-card' )
					),
					array(
						'title'				=> isset( $lpct_options['tabs'][4]['title'] ) ? $lpct_options['tabs'][4]['title'] : esc_html__( 'Cell Phones', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][4]['shortcode_content'] ) : array( 'columns' => 3, 'per_page' => 12, 'template' => 'content-landscape-product-card' )
					),
					array(
						'title'				=> isset( $lpct_options['tabs'][5]['title'] ) ? $lpct_options['tabs'][5]['title'] : esc_html__( 'Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][5]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][5]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][5]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][5]['shortcode_content'] ) : array( 'columns' => 3, 'per_page' => 12, 'template' => 'content-landscape-product-card' )
					),
					array(
						'title'				=> isset( $lpct_options['tabs'][6]['title'] ) ? $lpct_options['tabs'][6]['title'] : esc_html__( 'Accessories', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][6]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][6]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][6]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][6]['shortcode_content'] ) : array( 'columns' => 3, 'per_page' => 12, 'template' => 'content-landscape-product-card' )
					)
				),
		        'carousel_args'	=> array(
					'rows'				=> isset( $lpct_options['carousel_args']['rows'] ) ? intval( $lpct_options['carousel_args']['rows'] ) : 2,
					'slidesPerRow'		=> isset( $lpct_options['carousel_args']['slidesPerRow'] ) ? intval( $lpct_options['carousel_args']['slidesPerRow'] ) : 3,
					'slidesToShow'		=> isset( $lpct_options['carousel_args']['slidesToShow'] ) ? intval( $lpct_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $lpct_options['carousel_args']['slidesToScroll'] ) ? intval( $lpct_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $lpct_options['carousel_args']['dots'] ) ? filter_var( $lpct_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $lpct_options['carousel_args']['arrows'] ) ? filter_var( $lpct_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 1160,
							'settings'		=> array(
								'slidesPerRow'	=> 2,
								'slidesToShow'=> 1
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v4_2' ) ) {
	function techmarket_products_carousel_tabs_v4_2() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v4 		= techmarket_get_home_v4_meta();
			$pcwt_options 	= $home_v4['pcwt'];

			$is_enabled = isset( $pcwt_options['is_enabled'] ) ? $pcwt_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcwt_options['animation'] ) ? $pcwt_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v4_2_args', array(
				'animation'		=> $animation,
				'section_class'	=> '',
				'section_title'	=> isset( $pcwt_options['section_title'] ) ? $pcwt_options['section_title'] : esc_html__( 'Hot Best Sellers', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pcwt_options['tabs'][0]['title'] ) ? $pcwt_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pcwt_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pcwt_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pcwt_options['tabs'][1]['title'] ) ? $pcwt_options['tabs'][1]['title'] : esc_html__( 'Audio &amp; Video', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pcwt_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pcwt_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pcwt_options['tabs'][2]['title'] ) ? $pcwt_options['tabs'][2]['title'] : esc_html__( 'Laptops &amp; Computers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pcwt_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pcwt_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pcwt_options['tabs'][3]['title'] ) ? $pcwt_options['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pcwt_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pcwt_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pcwt_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcwt_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '7' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pcwt_options['carousel_args']['slidesToShow'] ) ? intval( $pcwt_options['carousel_args']['slidesToShow'] ) : 7,
					'slidesToScroll'	=> isset( $pcwt_options['carousel_args']['slidesToScroll'] ) ? intval( $pcwt_options['carousel_args']['slidesToScroll'] ) : 4,
					'dots'				=> isset( $pcwt_options['carousel_args']['dots'] ) ? filter_var( $pcwt_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcwt_options['carousel_args']['arrows'] ) ? filter_var( $pcwt_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 700,
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

if ( ! function_exists( 'techmarket_full_width_banner_v4' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_full_width_banner_v4() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v4 	= techmarket_get_home_v4_meta();
			$sbr_options = $home_v4['sbr'];

			$is_enabled = isset( $sbr_options['is_enabled'] ) ? $sbr_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $sbr_options['animation'] ) ? $sbr_options['animation'] : '';

			$args = apply_filters( 'techmarket_full_width_banner_v4_args', array(
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

if ( ! function_exists( 'techmarket_products_4_column_widget' ) ) {
	function techmarket_products_4_column_widget() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v4 		= techmarket_get_home_v4_meta();
			$lpcw_options 	= $home_v4['lpcw'];
			$lpcw1_options 	= $lpcw_options['lpcw1'];
			$lpcw2_options 	= $lpcw_options['lpcw2'];
			$lpcw3_options 	= $lpcw_options['lpcw3'];
			$lpcw4_options 	= $lpcw_options['lpcw4'];

			$is_enabled = isset( $lpcw_options['is_enabled'] ) ? $lpcw_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $lpcw_options['animation'] ) ? $lpcw_options['animation'] : '';

			$landscape_widget_1_args = apply_filters( 'techmarket_products_4_column_widget_landscape_widget_1_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpcw1_options['section_title'] ) ? $lpcw1_options['section_title'] : esc_html__( 'Best Rated Products', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-widget-carousel type-3',
				'header_custom_nav'	=> isset( $lpcw1_options['header_custom_nav'] ) ? filter_var( $lpcw1_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : false,
				'shortcode_tag'		=> isset( $lpcw1_options['shortcode_content']['shortcode'] ) ? $lpcw1_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $lpcw1_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpcw1_options['shortcode_content'] ) : array( 'columns' => 1, 'per_page' => 4, 'template' => 'content-landscape-product-widget' ),
				'carousel_args'		=> array(
					'rows'				=> isset( $lpcw1_options['carousel_args']['rows'] ) ? intval( $lpcw1_options['carousel_args']['rows'] ) : 4,
					'slidesPerRow'		=> isset( $lpcw1_options['carousel_args']['slidesPerRow'] ) ? intval( $lpcw1_options['carousel_args']['slidesPerRow'] ) : 1,
					'slidesToShow'		=> isset( $lpcw1_options['carousel_args']['slidesToShow'] ) ? intval( $lpcw1_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $lpcw1_options['carousel_args']['slidesToScroll'] ) ? intval( $lpcw1_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $lpcw1_options['carousel_args']['dots'] ) ? filter_var( $lpcw1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $lpcw1_options['carousel_args']['arrows'] ) ? filter_var( $lpcw1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false
				)
			) );

			$landscape_widget_2_args = apply_filters( 'techmarket_products_4_column_widget_landscape_widget_2_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpcw2_options['section_title'] ) ? $lpcw2_options['section_title'] : esc_html__( 'Virtual Reality Headsets', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-widget-carousel type-3',
				'header_custom_nav'	=> isset( $lpcw2_options['header_custom_nav'] ) ? filter_var( $lpcw2_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : false,
				'shortcode_tag'		=> isset( $lpcw2_options['shortcode_content']['shortcode'] ) ? $lpcw2_options['shortcode_content']['shortcode'] : 'featured_products',
				'shortcode_atts'	=> isset( $lpcw2_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpcw2_options['shortcode_content'] ) : array( 'columns' => 1, 'per_page' => 4, 'template' => 'content-landscape-product-widget' ),
				'carousel_args'		=> array(
					'rows'				=> isset( $lpcw2_options['carousel_args']['rows'] ) ? intval( $lpcw2_options['carousel_args']['rows'] ) : 4,
					'slidesPerRow'		=> isset( $lpcw2_options['carousel_args']['slidesPerRow'] ) ? intval( $lpcw2_options['carousel_args']['slidesPerRow'] ) : 1,
					'slidesToShow'		=> isset( $lpcw2_options['carousel_args']['slidesToShow'] ) ? intval( $lpcw2_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $lpcw2_options['carousel_args']['slidesToScroll'] ) ? intval( $lpcw2_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $lpcw2_options['carousel_args']['dots'] ) ? filter_var( $lpcw2_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $lpcw2_options['carousel_args']['arrows'] ) ? filter_var( $lpcw2_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false
				)
			) );

			$landscape_widget_3_args = apply_filters( 'techmarket_products_4_column_widget_landscape_widget_3_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpcw3_options['section_title'] ) ? $lpcw3_options['section_title'] : esc_html__( 'Deals of the Day', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-widget-carousel type-3',
				'header_custom_nav'	=> isset( $lpcw3_options['header_custom_nav'] ) ? filter_var( $lpcw3_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : false,
				'shortcode_tag'		=> isset( $lpcw3_options['shortcode_content']['shortcode'] ) ? $lpcw3_options['shortcode_content']['shortcode'] : 'sale_products',
				'shortcode_atts'	=> isset( $lpcw3_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpcw3_options['shortcode_content'] ) : array( 'columns' => 1, 'per_page' => 4, 'template' => 'content-landscape-product-widget' ),
				'carousel_args'		=> array(
					'rows'				=> isset( $lpcw3_options['carousel_args']['rows'] ) ? intval( $lpcw3_options['carousel_args']['rows'] ) : 4,
					'slidesPerRow'		=> isset( $lpcw3_options['carousel_args']['slidesPerRow'] ) ? intval( $lpcw3_options['carousel_args']['slidesPerRow'] ) : 1,
					'slidesToShow'		=> isset( $lpcw3_options['carousel_args']['slidesToShow'] ) ? intval( $lpcw3_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $lpcw3_options['carousel_args']['slidesToScroll'] ) ? intval( $lpcw3_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $lpcw3_options['carousel_args']['dots'] ) ? filter_var( $lpcw3_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $lpcw3_options['carousel_args']['arrows'] ) ? filter_var( $lpcw3_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false
				)
			) );

			$landscape_widget_4_args = apply_filters( 'techmarket_products_4_column_widget_landscape_widget_4_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpcw4_options['section_title'] ) ? $lpcw4_options['section_title'] : esc_html__( 'Video Cameras', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-widget-carousel type-3',
				'header_custom_nav'	=> isset( $lpcw4_options['header_custom_nav'] ) ? filter_var( $lpcw4_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : false,
				'shortcode_tag'		=> isset( $lpcw4_options['shortcode_content']['shortcode'] ) ? $lpcw4_options['shortcode_content']['shortcode'] : 'top_rated_products',
				'shortcode_atts'	=> isset( $lpcw4_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpcw4_options['shortcode_content'] ) : array( 'columns' => 1, 'per_page' => 4, 'template' => 'content-landscape-product-widget' ),
				'carousel_args'		=> array(
					'rows'				=> isset( $lpcw4_options['carousel_args']['rows'] ) ? intval( $lpcw4_options['carousel_args']['rows'] ) : 4,
					'slidesPerRow'		=> isset( $lpcw4_options['carousel_args']['slidesPerRow'] ) ? intval( $lpcw4_options['carousel_args']['slidesPerRow'] ) : 1,
					'slidesToShow'		=> isset( $lpcw4_options['carousel_args']['slidesToShow'] ) ? intval( $lpcw4_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $lpcw4_options['carousel_args']['slidesToScroll'] ) ? intval( $lpcw4_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $lpcw4_options['carousel_args']['dots'] ) ? filter_var( $lpcw4_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $lpcw4_options['carousel_args']['arrows'] ) ? filter_var( $lpcw4_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false
				)
			) );
			?>

			<div class="products-4-column-widgets">
				<?php techmarket_products_carousel( $landscape_widget_1_args ); ?>
				<?php techmarket_products_carousel( $landscape_widget_2_args ); ?>
				<?php techmarket_products_carousel( $landscape_widget_3_args ); ?>
				<?php techmarket_products_carousel( $landscape_widget_4_args ); ?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_brands_carousel_v4' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v4() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v4 	= techmarket_get_home_v4_meta();
			$bc_options = $home_v4['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v4_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v4_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_v4_carousel_args', array(
				'slidesToShow'	=> isset( $bc_options['carousel_args']['slidesToShow'] ) ? intval( $bc_options['carousel_args']['slidesToShow'] ) : 6,
				'slidesToScroll'=> isset( $bc_options['carousel_args']['slidesToScroll'] ) ? intval( $bc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'			=> isset( $bc_options['carousel_args']['dots'] ) ? filter_var( $bc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'		=> isset( $bc_options['carousel_args']['arrows'] ) ? filter_var( $bc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'responsive'		=> array(
					array(
						'breakpoint'	=> 450,
						'settings'		=> array(
							'slidesToShow'		=> 1,
							'slidesToScroll'	=> 1
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
			) );

			techmarket_brands_carousel( $section_args , $taxonomy_args , $carousel_args );
		}
	}
}

if( ! function_exists( 'techmarket_home_v4_hook_control' ) ) {
	function techmarket_home_v4_hook_control() {
		if( is_page_template( array( 'template-homepage-v4.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v4' );

			$home_v4 = techmarket_get_home_v4_meta();
			add_action( 'techmarket_homepage_v4', 'techmarket_init_structured_data',						5 );
			add_action( 'techmarket_homepage_v4', 'techmarket_revslider_v4',								isset( $home_v4['sdr']['priority'] ) ? intval( $home_v4['sdr']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v4', 'techmarket_3_column_banners_v4',							isset( $home_v4['brs1']['priority'] ) ? intval( $home_v4['brs1']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v4', 'techmarket_products_carousel_with_tabs_carousel_v4',		isset( $home_v4['pcwtc']['priority'] ) ? intval( $home_v4['pcwtc']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v4', 'techmarket_fullwidth_notice_v4',							isset( $home_v4['ntc']['priority'] ) ? intval( $home_v4['ntc']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v4', 'techmarket_products_cards_carousel_block_v4',			isset( $home_v4['fpc']['priority'] ) ? intval( $home_v4['fpc']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v4', 'techmarket_2_column_banners_v4',							isset( $home_v4['brs2']['priority'] ) ? intval( $home_v4['brs2']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v4', 'techmarket_products_widget_with_tab_carousel',			isset( $home_v4['pcwtb']['priority'] ) ? intval( $home_v4['pcwtb']['priority'] ) : 70 );
			add_action( 'techmarket_homepage_v4', 'techmarket_products_carousel_tabs_v4_1',					isset( $home_v4['lpct']['priority'] ) ? intval( $home_v4['lpct']['priority'] ) : 80 );
			add_action( 'techmarket_homepage_v4', 'techmarket_products_carousel_tabs_v4_2',					isset( $home_v4['pcwt']['priority'] ) ? intval( $home_v4['pcwt']['priority'] ) : 90 );
			add_action( 'techmarket_homepage_v4', 'techmarket_full_width_banner_v4',						isset( $home_v4['sbr']['priority'] ) ? intval( $home_v4['sbr']['priority'] ) : 100 );
			add_action( 'techmarket_homepage_v4', 'techmarket_products_4_column_widget',					isset( $home_v4['lpcw']['priority'] ) ? intval( $home_v4['lpcw']['priority'] ) : 110 );
			add_action( 'techmarket_homepage_v4', 'techmarket_brands_carousel_v4',							isset( $home_v4['bc']['priority'] ) ? intval( $home_v4['bc']['priority'] ) : 120 );
			add_action( 'techmarket_homepage_v4', 'techmarket_homepage_content',							200 );
		}
	}
}
