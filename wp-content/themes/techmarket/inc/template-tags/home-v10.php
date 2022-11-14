<?php
/**
 * Template tags for Home v10
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v10_options() {
	$home_v10 = array(
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
				'title'			=> esc_html__( 'Women', 'techmarket' ),
				'sub_title'		=> esc_html__( 'New Collection', 'techmarket' ),
				'action_text'	=> '',
				'action_link'	=> '#',
				'section_class'	=> 'large-banner text-in-center',
				'bg_choice'		=> 'image'
			),
			'br2'				=> array(
				'title'			=> esc_html__( 'Babys', 'techmarket' ),
				'sub_title'		=> esc_html__( 'New Collection', 'techmarket' ),
				'action_text'	=> '',
				'action_link'	=> '#',
				'section_class'	=> 'small-banner text-in-center',
			),
			'br3'				=> array(
				'title'			=> esc_html__( 'Kids & Young', 'techmarket' ),
				'sub_title'		=> esc_html__( 'New Collection', 'techmarket' ),
				'action_text'	=> '',
				'action_link'	=> '#',
				'section_class'	=> 'small-banner text-in-center',
			),
			'br4'				=> array(
				'title'			=> esc_html__( 'Men', 'techmarket' ),
				'sub_title'		=> esc_html__( 'New Collection', 'techmarket' ),
				'action_text'	=> '',
				'action_link'	=> '#',
				'section_class'	=> 'large-banner text-in-center',
			)
		),
		'pct1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Shop New Arrivals 2017', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'All Shoes', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'=> array(
							'columns'	=> '5',
							'template'  => 'content-product-with-rating'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Men', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '5',
							'template'  => 'content-product-with-rating'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Women', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '5',
							'template'  => 'content-product-with-rating'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Boys', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'=> array(
							'columns'	=> '5',
							'template'  => 'content-product-with-rating'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Girls', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'best_selling_products',
						'shortcode_atts'=> array(
							'columns'	=> '5',
							'template'  => 'content-product-with-rating'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Teens', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'best_selling_products',
						'shortcode_atts'=> array(
							'columns'	=> '5',
							'template'  => 'content-product-with-rating'
						)
					)
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 5,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 5
			)
		),
		'ntc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'notice_info'		=> esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
		),
		'brwpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'br'				=> array(
				'title'			=> esc_html__( 'Be Active', 'techmarket' ),
				'action_text'	=> '',
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'pc'				=> array(
				'shortcode_content'	=> array(
					'shortcode'		=> 'recent_products',
					'shortcode_atts'=> array(
						'columns'	=> '2',
						'template'      => 'content-product-with-rating'
					)
				),
				'carousel_args'		=> array(
					'slidesToShow'	=> 2,
					'slidesToScroll'=> 2,
					'dots'			=> 'yes',
					'arrows'		=> 'no'
				)
			)
		),
		'pct2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Men Bestsellers Shoes', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'All Shoes', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'=> array(
							'columns'	=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Lifestyle', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Running', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Training & Gym', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'=> array(
							'columns'	=> '7'
						)
					),
				),
				array(
					'title'				=> esc_html__( 'Softball', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'best_selling_products',
						'shortcode_atts'=> array(
							'columns'	=> '5'
						)
					)
				)
			),
			'carousel_args'	=> array(
				'rows'					=> 2,
				'slidesPerRow'			=> 7,
				'slidesToShow'			=> 1,
				'slidesToScroll'		=> 1,
				'dots'					=> 'yes',
				'arrows'				=> 'no'
			)
		),
		'brs2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 70,
			'animation'			=> '',
			'br1'				=> array(
				'title'			=> wp_kses_post( __(  'Be Nicer <br>For Yourself', 'techmarket' ) ),
				'sub_title'		=> '',
				'action_text'	=> wp_kses_post( __( 'Check Now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
				'action_link'	=> '#',
				'section_class'	=> 'large-banner text-in-center',
				'bg_choice'		=> 'image'
			),
			'br2'				=> array(
				'title'			=>'&nbsp;',
				'sub_title'		=> '',
				'action_text'	=> '',
				'action_link'	=> '#',
				'section_class'	=> 'small-banner text-in-center',
			),
			'br3'				=> array(
				'title'			=>'&nbsp;',
				'sub_title'		=> '',
				'action_text'	=> '',
				'action_link'	=> '#',
				'section_class'	=> 'small-banner text-in-center',
			),
			'br4'				=> array(
				'title'			=>'&nbsp;',
				'sub_title'		=> '',
				'action_text'	=> '',
				'action_link'	=> '#',
				'section_class'	=> 'large-banner text-in-center',
			)
		),
		'bc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 80,
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

	return apply_filters( 'techmarket_get_default_home_v10_options', $home_v10 );
}

function techmarket_get_home_v10_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v10_options = get_post_meta( $post->ID, '_home_v10_options', true );
		$home_v10_options = maybe_unserialize( $clean_home_v10_options );

		if( ! is_array( $home_v10_options ) ) {
			$home_v10_options = json_decode( $clean_home_v10_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v10_options();
			$home_v10 = wp_parse_args( $home_v10_options, $default_options );
		} else {
			$home_v10 = $home_v10_options;
		}

		return apply_filters( 'techmarket_home_v10_meta', $home_v10, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_v10' ) ) {
	/**
	 * Displays Slider in Home v10
	 */
	function techmarket_revslider_v10() {

		$home_v10 	= techmarket_get_home_v10_meta();
		$sdr 		= $home_v10['sdr'];

		$is_enabled = isset( $sdr['is_enabled'] ) ? $sdr['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $sdr['animation'] ) ? $sdr['animation'] : '';
		$shortcode = !empty( $sdr['shortcode'] ) ? $sdr['shortcode'] : '[rev_slider alias="home-v10-slider"]';

		$section_class = 'home-v10-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_home_v10_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_3_column_banners_v10_1' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_3_column_banners_v10_1() {

		$home_v10 	= techmarket_get_home_v10_meta();
		$brs_options = $home_v10['brs1'];
		$br1_options = $brs_options['br1'];
		$br2_options = $brs_options['br2'];
		$br3_options = $brs_options['br3'];
		$br4_options = $brs_options['br4'];

		$is_enabled = isset( $brs_options['is_enabled'] ) ? $brs_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $brs_options['animation'] ) ? $brs_options['animation'] : '';

		$args = apply_filters( 'techmarket_3_column_banners_v10_1_args', array(
			'section_class'	=> 'techmarket-banner techmarket-grid-banner-1',
			'banners'		=> array(
				array(
					'animation'		=> $animation,
					'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : esc_html__( 'Women', 'techmarket' ),
					'sub_title'		=> isset( $br1_options['sub_title'] ) ? $br1_options['sub_title'] : esc_html__( 'New Collection', 'techmarket' ),
					'action_text'	=> isset( $br1_options['action_text'] ) ? $br1_options['action_text'] : '',
					'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
					'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '546', '566' ) ) : array( '//placehold.it/546x566', '546', '566' ),
					'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : '',
					'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
					'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : '',
					'section_class'	=> 'large-banner text-in-center'
				),
				array(
					'animation'		=> $animation,
					'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : esc_html__( 'Babys', 'techmarket' ),
					'sub_title'		=> isset( $br2_options['sub_title'] ) ? $br2_options['sub_title'] : esc_html__( 'New Collection', 'techmarket' ),
					'action_text'	=> isset( $br2_options['action_text'] ) ? $br2_options['action_text'] : '',
					'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
					'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '546', '273' ) ) : array( '//placehold.it/546x273', '546', '273' ),
					'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
					'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
					'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : '',
					'section_class'	=> 'small-banner text-in-center'
				),
				array(
					'animation'		=> $animation,
					'title'			=> isset( $br3_options['title'] ) ? $br3_options['title'] : esc_html__( 'Kids & Young', 'techmarket' ),
					'sub_title'		=> isset( $br3_options['sub_title'] ) ? $br3_options['sub_title'] : esc_html__( 'New Collection', 'techmarket' ),
					'action_text'	=> isset( $br3_options['action_text'] ) ? $br3_options['action_text'] : '',
					'action_link'	=> isset( $br3_options['action_link'] ) ? $br3_options['action_link'] : '#',
					'bg_image'		=> isset( $br3_options['bg_image'] ) && intval( $br3_options['bg_image'] ) ? wp_get_attachment_image_src( $br3_options['bg_image'], array( '546', '273' ) ) : array( '//placehold.it/546x273', '546', '273' ),
					'bg_choice'		=> isset( $br3_options['bg_choice'] ) ? $br3_options['bg_choice'] : '',
					'bg_color' 		=> isset( $br3_options['bg_color'] ) ? $br3_options['bg_color'] : '',
					'bg_height' 	=> isset( $br3_options['bg_height'] ) ? $br3_options['bg_height'] : '',
					'section_class'	=> 'small-banner text-in-center'
				),
				array(
					'animation'		=> $animation,
					'title'			=> isset( $br4_options['title'] ) ? $br4_options['title'] : esc_html__( 'Men', 'techmarket' ),
					'sub_title'		=> isset( $br4_options['sub_title'] ) ? $br4_options['sub_title'] : esc_html__( 'New Collection', 'techmarket' ),
					'action_text'	=> isset( $br4_options['action_text'] ) ? $br4_options['action_text'] : '',
					'action_link'	=> isset( $br4_options['action_link'] ) ? $br4_options['action_link'] : '#',
					'bg_image'		=> isset( $br4_options['bg_image'] ) && intval( $br4_options['bg_image'] ) ? wp_get_attachment_image_src( $br4_options['bg_image'], array( '546', '566' ) ) : array( '//placehold.it/546x566', '546', '566' ),
					'bg_choice'		=> isset( $br4_options['bg_choice'] ) ? $br4_options['bg_choice'] : 'image',
					'bg_color' 		=> isset( $br4_options['bg_color'] ) ? $br4_options['bg_color'] : '',
					'bg_height' 	=> isset( $br4_options['bg_height'] ) ? $br4_options['bg_height'] : '',
					'section_class'	=> 'large-banner text-in-center'
				)
			)
		) );

		techmarket_banners( $args );
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v10_1' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */
	function techmarket_products_carousel_tabs_v10_1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v10 	= techmarket_get_home_v10_meta();
			$pct_options = $home_v10['pct1'];

			$is_enabled = isset( $pct_options['is_enabled'] ) ? $pct_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct_options['animation'] ) ? $pct_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v10_1_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pct_options['section_title'] ) ? $pct_options['section_title'] : esc_html__( 'Shop New Arrivals 2017', 'techmarket' ),
				'section_class'		=> 'tab-wrap',
				'header_nav_align'	=> 'justify-content-center',
				'tabs' 				=> array(
					array(
						'title'				=> isset( $pct_options['tabs'][0]['title'] ) ? $pct_options['tabs'][0]['title'] : esc_html__( 'All Shoes', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '5', 'template' => 'content-product-with-rating' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][1]['title'] ) ? $pct_options['tabs'][1]['title'] : esc_html__( 'Men', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '5', 'template' => 'content-product-with-rating' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][2]['title'] ) ? $pct_options['tabs'][2]['title'] : esc_html__( 'Women', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '5', 'template' => 'content-product-with-rating' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][3]['title'] ) ? $pct_options['tabs'][3]['title'] : esc_html__( 'Boys', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '5', 'template' => 'content-product-with-rating' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][4]['title'] ) ? $pct_options['tabs'][4]['title'] : esc_html__( 'Girls', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][4]['shortcode_content'] ) : array( 'columns' => '5', 'template' => 'content-product-with-rating' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][5]['title'] ) ? $pct_options['tabs'][5]['title'] : esc_html__( 'Teens', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][5]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][5]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][5]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][5]['shortcode_content'] ) : array( 'columns' => '5', 'template' => 'content-product-with-rating' )
					),
				),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pct_options['carousel_args']['slidesToShow'] ) ? intval( $pct_options['carousel_args']['slidesToShow'] ) : 5,
					'slidesToScroll'	=> isset( $pct_options['carousel_args']['slidesToScroll'] ) ? intval( $pct_options['carousel_args']['slidesToScroll'] ) : 5,
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

if ( ! function_exists( 'techmarket_fullwidth_notice_v10' ) ) {
	function techmarket_fullwidth_notice_v10() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v10 	= techmarket_get_home_v10_meta();
			$ntc_options = $home_v10['ntc'];

			$is_enabled = isset( $ntc_options['is_enabled'] ) ? $ntc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ntc_options['animation'] ) ? $ntc_options['animation'] : '';

			$args = apply_filters( 'techmarket_fullwidth_notice_v10_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'stretch-full-width',
				'notice_info'		=> isset( $ntc_options['notice_info'] ) ? $ntc_options['notice_info'] : esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
			) );

			techmarket_fullwidth_notice( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_banner_with_products_carousel_v10' ) ) {
	function techmarket_banner_with_products_carousel_v10() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v10 	= techmarket_get_home_v10_meta();
			$br_options = $home_v10['brwpc']['br'];
			$pc_options = $home_v10['brwpc']['pc'];


			$is_enabled = isset( $home_v10['brwpc']['is_enabled'] ) ? $home_v10['brwpc']['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $home_v10['brwpc']['animation'] ) ? $home_v10['brwpc']['animation'] : '';

			$banner_args = apply_filters( 'techmarket_brwpc_v10_banner_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'column-1',
				'title'			=> isset( $br_options['title'] ) ? $br_options['title'] : esc_html__( 'Be Active', 'techmarket' ),
				'action_text'	=> isset( $br_options['action_text'] ) ? $br_options['action_text'] : '',
				'action_link'	=> isset( $br_options['action_link'] ) ? $br_options['action_link'] : '#',
				'bg_image'		=> isset( $br_options['bg_image'] ) && intval( $br_options['bg_image'] ) ? wp_get_attachment_image_src( $br_options['bg_image'], array( '957', '724' ) ) : array( '//placehold.it/957x724', '957', '724' ),
				'bg_choice'		=> isset( $br_options['bg_choice'] ) ? $br_options['bg_choice'] : 'image',
				'bg_color' 		=> isset( $br_options['bg_color'] ) ? $br_options['bg_color'] : '',
				'bg_height' 	=> isset( $br_options['bg_height'] ) ? $br_options['bg_height'] : ''
			) );

			$pc_args = apply_filters( 'techmarket_brwpc_v10_pc_args', array(
				'animation'			=> $animation,
				'section_class'		=> 'section-products-carousel column-2',
				'header_custom_nav'	=> false,
				'section_title'		=> isset( $pc_options['section_title'] ) ? $pc_options['section_title'] : '',
				'shortcode_tag'		=> isset( $pc_options['shortcode_content']['shortcode'] ) ? $pc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pc_options['shortcode_content'] ) : array( 'columns' => '2', 'template' => 'content-product-with-rating' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pc_options['carousel_args']['slidesToShow'] ) ? intval( $pc_options['carousel_args']['slidesToShow'] ) : 2,
					'slidesToScroll'	=> isset( $pc_options['carousel_args']['slidesToScroll'] ) ? intval( $pc_options['carousel_args']['slidesToScroll'] ) : 2,
					'dots'				=> isset( $pc_options['carousel_args']['dots'] ) ? filter_var( $pc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pc_options['carousel_args']['arrows'] ) ? filter_var( $pc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
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
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						)
					)
				)
			) );
			?>
			<div class="home-v10-banner-with-products-carousel row stretch-full-width">
				<?php techmarket_banner( $banner_args ); ?>
				<?php techmarket_products_carousel( $pc_args ); ?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v10_2' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */
	function techmarket_products_carousel_tabs_v10_2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v10 	= techmarket_get_home_v10_meta();
			$pct_options = $home_v10['pct2'];

			$is_enabled = isset( $pct_options['is_enabled'] ) ? $pct_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct_options['animation'] ) ? $pct_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v10_2_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $pct_options['section_title'] ) ? $pct_options['section_title'] : esc_html__( 'Men Bestsellers Shoes', 'techmarket' ),
				'section_class'	=> '',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct_options['tabs'][0]['title'] ) ? $pct_options['tabs'][0]['title'] : esc_html__( 'All Shoes', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][1]['title'] ) ? $pct_options['tabs'][1]['title'] : esc_html__( 'Lifestyle', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][2]['title'] ) ? $pct_options['tabs'][2]['title'] : esc_html__( 'Running', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][3]['title'] ) ? $pct_options['tabs'][3]['title'] : esc_html__( 'Training & Gym', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '7' )
					),
					array(
						'title'				=> isset( $pct_options['tabs'][4]['title'] ) ? $pct_options['tabs'][4]['title'] : esc_html__( 'Softball', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $pct_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $pct_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct_options['tabs'][4]['shortcode_content'] ) : array( 'columns' => '5' )
					),
				),
				'carousel_args'	=> array(
					'rows'				=> isset( $pct_options['carousel_args']['rows'] ) ? intval( $pct_options['carousel_args']['rows'] ) : 2,
					'slidesPerRow'		=> isset( $pct_options['carousel_args']['slidesPerRow'] ) ? intval( $pct_options['carousel_args']['slidesPerRow'] ) : 7,
					'slidesToShow'		=> isset( $pct_options['carousel_args']['slidesToShow'] ) ? intval( $pct_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $pct_options['carousel_args']['slidesToScroll'] ) ? intval( $pct_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $pct_options['carousel_args']['dots'] ) ? filter_var( $pct_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct_options['carousel_args']['arrows'] ) ? filter_var( $pct_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 767,
							'settings'		=> array(
								'slidesPerRow'	=> 2
							)
						),
						array(
							'breakpoint'	=> 780,
							'settings'		=> array(
								'slidesPerRow'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesPerRow'	=> 4
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesPerRow'	=> 5
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_3_column_banners_v10_2' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_3_column_banners_v10_2() {

		$home_v10 	= techmarket_get_home_v10_meta();
		$brs_options = $home_v10['brs2'];
		$br1_options = $brs_options['br1'];
		$br2_options = $brs_options['br2'];
		$br3_options = $brs_options['br3'];
		$br4_options = $brs_options['br4'];

		$is_enabled = isset( $brs_options['is_enabled'] ) ? $brs_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $brs_options['animation'] ) ? $brs_options['animation'] : '';

		$args = apply_filters( 'techmarket_3_column_banners_v10_2_args', array(
			'section_class'	=> 'techmarket-banner techmarket-grid-banner-2',
			'banners'		=> array(
				array(
					'animation'		=> $animation,
					'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __(  'Be Nicer <br>For Yourself', 'techmarket' ) ),
					'sub_title'		=> isset( $br2_options['sub_title'] ) ? $br2_options['sub_title'] : '',
					'action_text'	=> isset( $br1_options['action_text'] ) ? $br1_options['action_text'] : wp_kses_post( __( 'Check Now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
					'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
					'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '819', '566' ) ) : array( '//placehold.it/819x566', '819', '566' ),
					'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : '',
					'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
					'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : '',
					'section_class'	=> 'large-banner text-in-center'
				),
				array(
					'animation'		=> $animation,
					'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : '',
					'sub_title'		=> isset( $br2_options['sub_title'] ) ? $br2_options['sub_title'] : '',
					'action_text'	=> isset( $br2_options['action_text'] ) ? $br2_options['action_text'] : '',
					'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
					'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '273', '273' ) ) : array( '//placehold.it/273x273', '273', '273' ),
					'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
					'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
					'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : '',
					'section_class'	=> 'small-banner text-in-center'
				),
				array(
					'animation'		=> $animation,
					'title'			=> isset( $br3_options['title'] ) ? $br3_options['title'] : '',
					'sub_title'		=> isset( $br2_options['sub_title'] ) ? $br2_options['sub_title'] : '',
					'action_text'	=> isset( $br3_options['action_text'] ) ? $br3_options['action_text'] : '',
					'action_link'	=> isset( $br3_options['action_link'] ) ? $br3_options['action_link'] : '#',
					'bg_image'		=> isset( $br3_options['bg_image'] ) && intval( $br3_options['bg_image'] ) ? wp_get_attachment_image_src( $br3_options['bg_image'], array( '273', '273' ) ) : array( '//placehold.it/273x273', '273', '273' ),
					'bg_choice'		=> isset( $br3_options['bg_choice'] ) ? $br3_options['bg_choice'] : '',
					'bg_color' 		=> isset( $br3_options['bg_color'] ) ? $br3_options['bg_color'] : '',
					'bg_height' 	=> isset( $br3_options['bg_height'] ) ? $br3_options['bg_height'] : '',
					'section_class'	=> 'small-banner text-in-center'
				),
				array(
					'animation'		=> $animation,
					'title'			=> isset( $br4_options['title'] ) ? $br4_options['title'] : '',
					'sub_title'		=> isset( $br2_options['sub_title'] ) ? $br2_options['sub_title'] : '',
					'action_text'	=> isset( $br4_options['action_text'] ) ? $br4_options['action_text'] : '',
					'action_link'	=> isset( $br4_options['action_link'] ) ? $br4_options['action_link'] : '#',
					'bg_image'		=> isset( $br4_options['bg_image'] ) && intval( $br4_options['bg_image'] ) ? wp_get_attachment_image_src( $br4_options['bg_image'], array( '546', '566' ) ) : array( '//placehold.it/546x566', '546', '566' ),
					'bg_choice'		=> isset( $br4_options['bg_choice'] ) ? $br4_options['bg_choice'] : 'image',
					'bg_color' 		=> isset( $br4_options['bg_color'] ) ? $br4_options['bg_color'] : '',
					'bg_height' 	=> isset( $br4_options['bg_height'] ) ? $br4_options['bg_height'] : '',
					'section_class'	=> 'large-banner text-in-center'
				)
			)
		) );

		techmarket_banners( $args );
	}
}

if ( ! function_exists( 'techmarket_brands_carousel_v10' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v10() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v10 	= techmarket_get_home_v10_meta();
			$bc_options = $home_v10['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v10_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v10_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_v10_carousel_args', array(
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

if( ! function_exists( 'techmarket_home_v10_hook_control' ) ) {
	function techmarket_home_v10_hook_control() {
		if( is_page_template( array( 'template-homepage-v10.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v10' );

			$home_v10 = techmarket_get_home_v10_meta();
			add_action( 'techmarket_homepage_v10', 'techmarket_init_structured_data',					5 );
			add_action( 'techmarket_homepage_v10', 'techmarket_revslider_v10',							isset( $home_v10['sdr']['priority'] ) ? intval( $home_v10['sdr']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v10', 'techmarket_3_column_banners_v10_1',					isset( $home_v10['brs1']['priority'] ) ? intval( $home_v10['brs1']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v10', 'techmarket_products_carousel_tabs_v10_1',			isset( $home_v10['pct1']['priority'] ) ? intval( $home_v10['pct1']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v10', 'techmarket_fullwidth_notice_v10',					isset( $home_v10['ntc']['priority'] ) ? intval( $home_v10['ntc']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v10', 'techmarket_banner_with_products_carousel_v10',		isset( $home_v10['brwpc']['priority'] ) ? intval( $home_v10['brwpc']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v10', 'techmarket_products_carousel_tabs_v10_2',			isset( $home_v10['pct2']['priority'] ) ? intval( $home_v10['pct2']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v10', 'techmarket_3_column_banners_v10_2',					isset( $home_v10['brs2']['priority'] ) ? intval( $home_v10['brs2']['priority'] ) : 70 );
			add_action( 'techmarket_homepage_v10', 'techmarket_brands_carousel_v10',					isset( $home_v10['bc']['priority'] ) ? intval( $home_v10['bc']['priority'] ) : 80 );
			add_action( 'techmarket_homepage_v10', 'techmarket_homepage_content',						200 );
		}
	}
}
