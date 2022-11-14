<?php
/**
 * Template tags used in home page v7
 *
 * @package techmarket
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v7_options() {
	$home_v7 = array(
		'dpi'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'pre_title'			=> esc_html__( 'Featured', 'techmarket' ),
			'section_title'		=> wp_kses_post( __( '<strong>Weekly Deals!</strong> <br>Get our best prices.', 'techmarket' ) ),
			'header_timer'		=> 'yes',
			'timer_title'		=> esc_html__( 'Hurry up! Offers ends in:', 'techmarket' ),
			'timer_value'		=> '',
			'action_text'		=> esc_html__( 'Browse More', 'techmarket' ),
			'action_link'		=> '#',
			'shortcode_content'	=> array(
				'shortcode'			=> 'recent_products',
				'shortcode_atts'	=> array(
					'per_page'			=> '13',
				),
			),
		),
		'ntc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 20,
			'animation'			=> '',
			'notice_info'		=> esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
		),
		'sbr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'title'				=> wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
			'sub_title'			=> esc_html__( 'Travel upto 22km in a single charge', 'techmarket' ),
			'action_text'		=> wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'		=> '#',
			'bg_choice'			=> 'image'
		),
		'catl'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'section_title'			=> esc_html__( 'Top Categories this Week', 'techmarket' ),
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
		'lpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Recently viewed products', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'			=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'			=> '5',
					'template'			=> 'content-landscape-product',
				),
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
			'priority'			=> 60,
			'animation'			=> '',
			'orderby'			=> 'title',
			'order'				=> 'ASC',
			'number'			=> 12,
			'hide_empty'		=> 'no',
			'carousel_args'		=> array(
				'slidesToShow'		=> 6,
				'slidesToScroll'	=> 1,
				'dots'				=> 'no',
				'arrows'			=> 'yes'
			)
		),
	);

	return apply_filters( 'techmarket_get_default_home_v7_options', $home_v7 );
}

function techmarket_get_home_v7_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v7_options = get_post_meta( $post->ID, '_home_v7_options', true );
		$home_v7_options = maybe_unserialize( $clean_home_v7_options );

		if( ! is_array( $home_v7_options ) ) {
			$home_v7_options = json_decode( $clean_home_v7_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v7_options();
			$home_v7 = wp_parse_args( $home_v7_options, $default_options );
		} else {
			$home_v7 = $home_v7_options;
		}

		return apply_filters( 'techmarket_home_v7_meta', $home_v7, $post );
	}
}

if ( ! function_exists( 'techmarket_deals_products_isotope_v7' ) ) {
	function techmarket_deals_products_isotope_v7() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v7 	= techmarket_get_home_v7_meta();
			$dpi_options = $home_v7['dpi'];

			$is_enabled = isset( $dpi_options['is_enabled'] ) ? $dpi_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $dpi_options['animation'] ) ? $dpi_options['animation'] : '';

			$args = apply_filters( 'techmarket_deals_products_isotope_v7_args', array(
				'section_class'		=> '',
				'animation'			=> $animation,
				'pre_title'			=> isset( $dpi_options['pre_title'] ) ? $dpi_options['pre_title'] : esc_html__( 'Featured', 'techmarket' ),
				'section_title'		=> isset( $dpi_options['section_title'] ) ? $dpi_options['section_title'] : wp_kses_post( __( '<strong>Weekly Deals!</strong> <br>Get our best prices.', 'techmarket' ) ),
				'header_timer'		=> isset( $dpi_options['header_custom_nav'] ) ? filter_var( $dpi_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'timer_title'		=> isset( $dpi_options['timer_title'] ) ? $dpi_options['timer_title'] : esc_html__( 'Hurry up! Offers ends in:', 'techmarket' ),
				'timer_value'		=> isset( $dpi_options['timer_value'] ) ? $dpi_options['timer_value'] : '',
				'action_text'		=> isset( $dpi_options['action_text'] ) ? $dpi_options['action_text'] : esc_html__( 'Browse More', 'techmarket' ),
				'action_link'		=> isset( $dpi_options['action_link'] ) ? $dpi_options['action_link'] : '#',
				'shortcode_tag'		=> isset( $dpi_options['shortcode_content']['shortcode'] ) ? $dpi_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $dpi_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $dpi_options['shortcode_content'] ) : array( 'per_page' => '13' ),
			) );

			techmarket_products_isotope( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_fullwidth_notice_v7' ) ) {
	function techmarket_fullwidth_notice_v7() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v7 	= techmarket_get_home_v7_meta();
			$ntc_options = $home_v7['ntc'];

			$is_enabled = isset( $ntc_options['is_enabled'] ) ? $ntc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ntc_options['animation'] ) ? $ntc_options['animation'] : '';

			$args = apply_filters( 'techmarket_fullwidth_notice_v7_args', array(
				'animation'		    => $animation,
				'section_class'		=> isset( $ntc_options['section_class'] ) ? $ntc_options['section_class'] :'stretch-full-width',
				'notice_info'		=> isset( $ntc_options['notice_info'] ) ? $ntc_options['notice_info'] : esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
			) );

			techmarket_fullwidth_notice( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_full_width_banner_v7' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_full_width_banner_v7() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v7 	= techmarket_get_home_v7_meta();
			$sbr_options = $home_v7['sbr'];

			$is_enabled = isset( $sbr_options['is_enabled'] ) ? $sbr_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $sbr_options['animation'] ) ? $sbr_options['animation'] : '';

			$args = apply_filters( 'techmarket_full_width_banner_v7_args', array(
				'animation'		=> $animation,
				'section_class'	=> isset( $sbr_options['section_class'] ) ? $sbr_options['section_class'] : 'full-width-banner',
				'title'			=> isset( $sbr_options['title'] ) ? $sbr_options['title'] : wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
				'sub_title'		=> isset( $sbr_options['sub_title'] ) ? $sbr_options['sub_title'] : esc_html__( 'Travel upto 22km in a single charge', 'techmarket' ),
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

if ( ! function_exists( 'techmarket_products_carousel_block_v7' ) ) {
	function techmarket_products_carousel_block_v7() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v7 	= techmarket_get_home_v7_meta();
			$lpc_options = $home_v7['lpc'];

			$is_enabled = isset( $lpc_options['is_enabled'] ) ? $lpc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $lpc_options['animation'] ) ? $lpc_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v7_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpc_options['section_title'] ) ? $lpc_options['section_title'] : esc_html__( 'Recently viewed products', 'techmarket' ),
				'section_class'		=> isset( $lpc_options['section_class'] ) ? $lpc_options['section_class'] : 'section-landscape-products-carousel',
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

if ( ! function_exists( 'techmarket_brands_carousel_v7' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v7() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v7 	= techmarket_get_home_v7_meta();
			$bc_options = $home_v7['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v7_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v7_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_v7_carousel_args', array(
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

if ( ! function_exists( 'techmarket_product_categories_list_v7' ) ) {
	/**
	 * Display categories list
	 *
	 */
	function techmarket_product_categories_list_v7() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v7 	= techmarket_get_home_v7_meta();
			$catl_options = $home_v7['catl'];

			$is_enabled = isset( $catl_options['is_enabled'] ) ? $catl_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $catl_options['animation'] ) ? $catl_options['animation'] : '';

			$args = apply_filters( 'techmarket_product_categories_list_v7_args', array(
				'section_title'			=> isset( $catl_options['section_title'] ) ? $catl_options['section_title'] : esc_html__( 'Top Categories this Week', 'techmarket' ),
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

if( ! function_exists( 'techmarket_home_v7_hook_control' ) ) {
	function techmarket_home_v7_hook_control() {
		if( is_page_template( array( 'template-homepage-v7.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v7' );

			$home_v7 = techmarket_get_home_v7_meta();
			add_action( 'techmarket_homepage_v7', 'techmarket_init_structured_data',			5 );
			add_action( 'techmarket_homepage_v7', 'techmarket_deals_products_isotope_v7',		isset( $home_v7['dpi']['priority'] ) ? intval( $home_v7['dpi']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v7', 'techmarket_fullwidth_notice_v7',				isset( $home_v7['ntc']['priority'] ) ? intval( $home_v7['ntc']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v7', 'techmarket_full_width_banner_v7',			isset( $home_v7['sbr']['priority'] ) ? intval( $home_v7['sbr']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v7', 'techmarket_product_categories_list_v7',		isset( $home_v7['catl']['priority'] ) ? intval( $home_v7['catl']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v7', 'techmarket_products_carousel_block_v7',		isset( $home_v7['lpc']['priority'] ) ? intval( $home_v7['lpc']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v7', 'techmarket_brands_carousel_v7',				isset( $home_v7['bc']['priority'] ) ? intval( $home_v7['bc']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v7', 'techmarket_homepage_content',				200 );
		}
	}
}
