<?php
/**
 * Template tags for Home v11
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v11_options() {
	$home_v11 = array(
		'sdr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'shortcode'			=> ''
		),
		'catl'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 20,
			'animation'			=> '',
			'section_title'			=> '',
			'category_args'			=> array(
				'orderby'				=> 'name',
				'order'					=> 'ASC',
				'hide_empty'			=> true,
				'number'				=> 8,
				'slugs'					=> '',
			),
			'child_category_args'	=> array(
				'echo' 					=> false,
				'title_li' 				=> '',
				'show_option_none' 		=> '',
				'number' 				=> 6,
				'depth'					=> 1,
				'hide_empty'			=> false
			)
		),
		'brs'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'br1'				=> array(
				'pre_title'		=> esc_html__( 'Only Branded Sportwear', 'techmarket' ),
				'title'			=> esc_html__( 'up to 30% off', 'techmarket' ),
				'action_text'	=> '',
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br2'				=> array(
				'pre_title'		=> esc_html__( 'The Worlds Best ', 'techmarket' ),
				'title'			=> esc_html__( 'Sport Bras', 'techmarket' ),
				'action_text'	=> wp_kses_post( __( 'Shop now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br3'				=> array(
				'pre_title'		=> esc_html__( 'Elevate your apparel game', 'techmarket' ),
				'title'			=> esc_html__( 'to new heights', 'techmarket' ),
				'action_text'	=> '',
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
		),
		'pct1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'section_title'		=> '',
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'New Arrivals', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'On Sale', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Best Rated', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 8,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 8
			)
		),
		'dpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'=> array(
					'per_page'		=> 8,
					'template'		=> 'content-sale-product-with-timer'
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 1,
				'dots'				=> 'no',
				'arrows'			=> 'yes',
				'slidesToScroll'	=> 1
			)
		),
		'pct2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Most Loved Basketball Products', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Clotching', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Jerseys', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Basketballs', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Hats', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Footwear', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'best_selling_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Accesories', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 8,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 8
			)
		),
		'pct3'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 70,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Best Running Wears for Beginners', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Ladies Running', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Mens Running', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Ladies Shoes', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Mens Shoes', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Running Accesories', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'best_selling_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 8,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 8
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

	return apply_filters( 'techmarket_get_default_home_v11_options', $home_v11 );
}

function techmarket_get_home_v11_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v11_options = get_post_meta( $post->ID, '_home_v11_options', true );
		$home_v11_options = maybe_unserialize( $clean_home_v11_options );

		if( ! is_array( $home_v11_options ) ) {
			$home_v11_options = json_decode( $clean_home_v11_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v11_options();
			$home_v11 = wp_parse_args( $home_v11_options, $default_options );
		} else {
			$home_v11 = $home_v11_options;
		}

		return apply_filters( 'techmarket_home_v11_meta', $home_v11, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_v11' ) ) {
	/**
	 * Displays Slider in Home v11
	 */
	function techmarket_revslider_v11() {

		$home_v11 	= techmarket_get_home_v11_meta();
		$sdr 		= $home_v11['sdr'];

		$is_enabled = isset( $sdr['is_enabled'] ) ? $sdr['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $sdr['animation'] ) ? $sdr['animation'] : '';
		$shortcode = !empty( $sdr['shortcode'] ) ? $sdr['shortcode'] : '[rev_slider alias="home-v11-slider"]';

		$section_class = 'home-v11-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_home_v11_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_product_categories_list_v11' ) ) {
	/**
	 * Display categories list
	 *
	 */
	function techmarket_product_categories_list_v11() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v11 	= techmarket_get_home_v11_meta();
			$catl_options = $home_v11['catl'];

			$is_enabled = isset( $catl_options['is_enabled'] ) ? $catl_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $catl_options['animation'] ) ? $catl_options['animation'] : '';

			$args = apply_filters( 'techmarket_product_categories_list_v11_args', array(
				'section_title'			=> '',
				'section_class'			=> '',
				'animation'				=> $animation,
				'category_args'			=> array(
					'orderby'				=> isset( $catl_options['category_args']['orderby'] ) ? $catl_options['category_args']['orderby'] : 'name',
					'order'					=> isset( $catl_options['category_args']['order'] ) ? $catl_options['category_args']['order'] : 'ASC',
					'hide_empty'			=> isset( $catl_options['category_args']['hide_empty'] ) ? filter_var( $catl_options['category_args']['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : true,
					'number'				=> isset( $catl_options['category_args']['number'] ) ? $catl_options['category_args']['number'] : 8,
					'hierarchical'			=> false,
					'slugs'					=> isset( $catl_options['category_args']['slugs'] ) ? $catl_options['category_args']['slugs'] : '',
				),
			) );

			techmarket_product_categories_list( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_3_column_banners_v11' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_3_column_banners_v11() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v11 	= techmarket_get_home_v11_meta();
			$brs_options = $home_v11['brs'];
			$br1_options = $brs_options['br1'];
			$br2_options = $brs_options['br2'];
			$br3_options = $brs_options['br3'];

			$is_enabled = isset( $brs_options['is_enabled'] ) ? $brs_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $brs_options['animation'] ) ? $brs_options['animation'] : '';

			$args = apply_filters( 'techmarket_3_column_banners_v11_args', array(
				'section_class'	=> 'banners-v1',
				'banners'		=> array(
					array(
						'animation'		=> $animation,
						'pre_title'		=> isset( $br1_options['pre_title'] ) ? $br1_options['pre_title'] : esc_html__( 'Only Branded Sportwear', 'techmarket' ),
						'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : esc_html__( 'up to 30% off', 'techmarket' ),
						'action_text'	=> isset( $br1_options['action_text'] ) ? $br1_options['action_text'] : '',
						'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
						'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '565', '174' ) ) : array( '//placehold.it/565x174', '565', '174' ),
						'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
						'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : '',
						'section_class'	=> 'text-in-right medium-banner'
					),
					array(
						'animation'		=> $animation,
						'pre_title'		=> isset( $br2_options['pre_title'] ) ? $br2_options['pre_title'] : esc_html__( 'The Worlds Best ', 'techmarket' ),
						'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : esc_html__( 'Sport Bras', 'techmarket' ),
						'action_text'	=> isset( $br2_options['action_text'] ) ? $br2_options['action_text'] : wp_kses_post( __( 'Shop now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
						'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
						'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '565', '174' ) ) : array( '//placehold.it/565x174', '565', '174' ),
						'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
						'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : '',
						'section_class'	=> 'text-in-left medium-banner'
					),
					array(
						'animation'		=> $animation,
						'pre_title'		=> isset( $br3_options['pre_title'] ) ? $br3_options['pre_title'] : esc_html__( 'Elevate your apparel game', 'techmarket' ),
						'title'			=> isset( $br3_options['title'] ) ? $br3_options['title'] : esc_html__( 'to new heights', 'techmarket' ),
						'action_text'	=> isset( $br3_options['action_text'] ) ? $br3_options['action_text'] : '',
						'action_link'	=> isset( $br3_options['action_link'] ) ? $br3_options['action_link'] : '#',
						'bg_image'		=> isset( $br3_options['bg_image'] ) && intval( $br3_options['bg_image'] ) ? wp_get_attachment_image_src( $br3_options['bg_image'], array( '565', '174' ) ) : array( '//placehold.it/565x174', '565', '174' ),
						'bg_choice'		=> isset( $br3_options['bg_choice'] ) ? $br3_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br3_options['bg_color'] ) ? $br3_options['bg_color'] : '',
						'bg_height' 	=> isset( $br3_options['bg_height'] ) ? $br3_options['bg_height'] : '',
						'section_class'	=> 'text-in-left medium-banner'
					)
				)
			) );

			techmarket_banners( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v11_1' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */
	function techmarket_products_carousel_tabs_v11_1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v11 	= techmarket_get_home_v11_meta();
			$pct1_options = $home_v11['pct1'];

			$is_enabled = isset( $pct1_options['is_enabled'] ) ? $pct1_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct1_options['animation'] ) ? $pct1_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v11_1_args', array(
				'animation'		=> $animation,
				'section_title'	=> '',
				'section_class'	=> 'section-tabs-with-product-carousel',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct1_options['tabs'][0]['title'] ) ? $pct1_options['tabs'][0]['title'] : esc_html__( 'New Arrivals', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][1]['title'] ) ? $pct1_options['tabs'][1]['title'] : esc_html__( 'On Sale', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][2]['title'] ) ? $pct1_options['tabs'][2]['title'] : esc_html__( 'Best Rated', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '8' )
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct1_options['carousel_args']['slidesToShow'] ) ? intval( $pct1_options['carousel_args']['slidesToShow'] ) : 8,
					'slidesToScroll'	=> isset( $pct1_options['carousel_args']['slidesToScroll'] ) ? intval( $pct1_options['carousel_args']['slidesToScroll'] ) : 8,
					'dots'				=> isset( $pct1_options['carousel_args']['dots'] ) ? filter_var( $pct1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct1_options['carousel_args']['arrows'] ) ? filter_var( $pct1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
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
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 6,
								'slidesToScroll'	=> 6
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_deals_cards_carousel_with_gallery_v11' ) ) {
	function techmarket_deals_cards_carousel_with_gallery_v11() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v11 	= techmarket_get_home_v11_meta();
			$dpc_options = $home_v11['dpc'];

			$is_enabled = isset( $dpc_options['is_enabled'] ) ? $dpc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $dpc_options['animation'] ) ? $dpc_options['animation'] : '';

			$args = apply_filters( 'techmarket_deals_cards_carousel_with_gallery_v11_args', array(
				'animation'			=> $animation,
				'section_class'		=> 'product-with-timer-gallery',
				'shortcode_tag'		=> isset( $dpc_options['shortcode_content']['shortcode'] ) ? $dpc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $dpc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $dpc_options['shortcode_content'] ) : array( 'per_page' => '8' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $dpc_options['carousel_args']['slidesToShow'] ) ? intval( $dpc_options['carousel_args']['slidesToShow'] ) : 1,
					'slidesToScroll'	=> isset( $dpc_options['carousel_args']['slidesToScroll'] ) ? intval( $dpc_options['carousel_args']['slidesToScroll'] ) : 1,
					'dots'				=> isset( $dpc_options['carousel_args']['dots'] ) ? filter_var( $dpc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
					'arrows'			=> isset( $dpc_options['carousel_args']['arrows'] ) ? filter_var( $dpc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $dpc_options['carousel_args']['prevArrow'] ) ? $dpc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $dpc_options['carousel_args']['nextArrow'] ) ? $dpc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>'
				)
			) );

			techmarket_deals_cards_carousel_with_gallery( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v11_2' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */
	function techmarket_products_carousel_tabs_v11_2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v11 	= techmarket_get_home_v11_meta();
			$pct2_options = $home_v11['pct2'];

			$is_enabled = isset( $pct2_options['is_enabled'] ) ? $pct2_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct2_options['animation'] ) ? $pct2_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v11_2_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $pct2_options['section_title'] ) ? $pct2_options['section_title'] : esc_html__( 'Most Loved Basketball Products', 'techmarket' ),
				'section_class'	=> '',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct2_options['tabs'][0]['title'] ) ? $pct2_options['tabs'][0]['title'] : esc_html__( 'Clotching', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][1]['title'] ) ? $pct2_options['tabs'][1]['title'] : esc_html__( 'Jerseys', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][2]['title'] ) ? $pct2_options['tabs'][2]['title'] : esc_html__( 'Basketballs', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][3]['title'] ) ? $pct2_options['tabs'][3]['title'] : esc_html__( 'Hats', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][4]['title'] ) ? $pct2_options['tabs'][4]['title'] : esc_html__( 'Footwear', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][4]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][5]['title'] ) ? $pct2_options['tabs'][5]['title'] : esc_html__( 'Accesories', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][5]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][5]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][5]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][5]['shortcode_content'] ) : array( 'columns' => '8' )
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct2_options['carousel_args']['slidesToShow'] ) ? intval( $pct2_options['carousel_args']['slidesToShow'] ) : 8,
					'slidesToScroll'	=> isset( $pct2_options['carousel_args']['slidesToScroll'] ) ? intval( $pct2_options['carousel_args']['slidesToScroll'] ) : 8,
					'dots'				=> isset( $pct2_options['carousel_args']['dots'] ) ? filter_var( $pct2_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct2_options['carousel_args']['arrows'] ) ? filter_var( $pct2_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
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
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 6,
								'slidesToScroll'	=> 6
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v11_3' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */
	function techmarket_products_carousel_tabs_v11_3() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v11 	= techmarket_get_home_v11_meta();
			$pct3_options = $home_v11['pct3'];

			$is_enabled = isset( $pct3_options['is_enabled'] ) ? $pct3_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct3_options['animation'] ) ? $pct3_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v11_3_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $pct3_options['section_title'] ) ? $pct3_options['section_title'] : esc_html__( 'Best Running Wears for Beginners', 'techmarket' ),
				'section_class'	=> '',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct3_options['tabs'][0]['title'] ) ? $pct3_options['tabs'][0]['title'] : esc_html__( 'Ladies Running', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct3_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct3_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct3_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct3_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct3_options['tabs'][1]['title'] ) ? $pct3_options['tabs'][1]['title'] : esc_html__( 'Mens Running', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct3_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct3_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct3_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct3_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct3_options['tabs'][2]['title'] ) ? $pct3_options['tabs'][2]['title'] : esc_html__( 'Ladies Shoes', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct3_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct3_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct3_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct3_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct3_options['tabs'][3]['title'] ) ? $pct3_options['tabs'][3]['title'] : esc_html__( 'Mens Shoes', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct3_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct3_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct3_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct3_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct3_options['tabs'][4]['title'] ) ? $pct3_options['tabs'][4]['title'] : esc_html__( 'Running Accesories', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct3_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $pct3_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $pct3_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct3_options['tabs'][4]['shortcode_content'] ) : array( 'columns' => '8' )
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct3_options['carousel_args']['slidesToShow'] ) ? intval( $pct3_options['carousel_args']['slidesToShow'] ) : 8,
					'slidesToScroll'	=> isset( $pct3_options['carousel_args']['slidesToScroll'] ) ? intval( $pct3_options['carousel_args']['slidesToScroll'] ) : 8,
					'dots'				=> isset( $pct3_options['carousel_args']['dots'] ) ? filter_var( $pct3_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct3_options['carousel_args']['arrows'] ) ? filter_var( $pct3_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
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
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 6,
								'slidesToScroll'	=> 6
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_brands_carousel_v11' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v11() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v11 	= techmarket_get_home_v11_meta();
			$bc_options = $home_v11['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v11_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v11_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_v11_carousel_args', array(
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

if( ! function_exists( 'techmarket_home_v11_hook_control' ) ) {
	function techmarket_home_v11_hook_control() {
		if( is_page_template( array( 'template-homepage-v11.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v11' );

			$home_v11 = techmarket_get_home_v11_meta();
			add_action( 'techmarket_homepage_v11', 'techmarket_init_structured_data',						5 );
			add_action( 'techmarket_homepage_v11', 'techmarket_revslider_v11',								isset( $home_v11['sdr']['priority'] ) ? intval( $home_v11['sdr']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v11', 'techmarket_product_categories_list_v11',				isset( $home_v11['catl']['priority'] ) ? intval( $home_v11['catl']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v11', 'techmarket_3_column_banners_v11',						isset( $home_v11['brs']['priority'] ) ? intval( $home_v11['brs']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v11', 'techmarket_products_carousel_tabs_v11_1',				isset( $home_v11['pct1']['priority'] ) ? intval( $home_v11['pct1']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v11', 'techmarket_deals_cards_carousel_with_gallery_v11',		isset( $home_v11['dpc']['priority'] ) ? intval( $home_v11['dpc']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v11', 'techmarket_products_carousel_tabs_v11_2',				isset( $home_v11['pct2']['priority'] ) ? intval( $home_v11['pct2']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v11', 'techmarket_products_carousel_tabs_v11_3',				isset( $home_v11['pct3']['priority'] ) ? intval( $home_v11['pct3']['priority'] ) : 70 );
			add_action( 'techmarket_homepage_v11', 'techmarket_brands_carousel_v11',						isset( $home_v11['bc']['priority'] ) ? intval( $home_v11['bc']['priority'] ) : 80 );
			add_action( 'techmarket_homepage_v11', 'techmarket_homepage_content',							200 );
		}
	}
}
