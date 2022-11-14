<?php

if ( ! function_exists( 'techmarket_deals_cards_carousel_element' ) ) {

	function techmarket_deals_cards_carousel_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'title'				=> '',
			'shortcode_tag'		=> 'sale_products',
			'per_page' 			=> 10,
			'orderby' 			=> 'date',
			'order' 			=> 'desc',
			'product_id'		=> '',
			'category'			=> '',
			'header_custom_nav'	=> false,
			'header_timer'		=> false,
			'timer_value'		=> '',
			'ca_infinite'		=> false,
			'ca_slidestoshow'	=> 2,
			'ca_slidestoscroll'	=> 2,
			'ca_dots'			=> false,
			'ca_arrows'			=> false,
			'ca_prevarrow'		=> '<a href="#" class="slider-prev"><i class="tm tm-arrow-left"></i>' . esc_html__( 'Previous deal', 'techmarket-extensions' ) . '</a>',
			'ca_nextarrow'		=> '<a href="#" class="slider-next">' . esc_html__( 'Next deal', 'techmarket-extensions' ) . '<i class="tm tm-arrow-right"></i></a>',
			'ca_responsive'		=> array(),
			'el_class'			=> ''
		), $atts));

		$shortcode_atts = function_exists( 'techmarket_get_atts_for_shortcode' ) ? techmarket_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'products_choice' => 'ids', 'products_ids_skus' => $product_id ) ) : array();

		$args = array(
			'section_title'		=> $title,
			'shortcode_tag'		=> $shortcode_tag,
			'shortcode_atts'	=> wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'columns' => $ca_slidestoshow, 'per_page' => $per_page ) ),
			'header_custom_nav'	=> $header_custom_nav,
			'header_timer'		=> $header_timer,
			'timer_value'		=> $timer_value,
			'carousel_args'		=> array(
				'infinite'			=> filter_var( $ca_infinite, FILTER_VALIDATE_BOOLEAN ),
				'slidesToShow'		=> intval( $ca_slidestoshow ),
				'slidesToScroll'	=> intval( $ca_slidestoscroll ),
				'dots'				=> filter_var( $ca_dots, FILTER_VALIDATE_BOOLEAN ),
				'arrows'			=> filter_var( $ca_arrows, FILTER_VALIDATE_BOOLEAN ),
				'prevArrow'			=> $ca_prevarrow,
				'nextArrow'			=> $ca_nextarrow
			),
			'section_class'		=> $el_class
		);

		if( is_object( $ca_responsive ) || is_array( $ca_responsive ) ) {
			$ca_responsive = json_decode( json_encode( $ca_responsive ), true );
		} else {
			$ca_responsive = json_decode( urldecode( $ca_responsive ), true );
		}

		if( ! empty( $ca_responsive ) ) {
			$responsive_args = array();
			
			foreach ( $ca_responsive as $key => $responsive ) {

				extract(shortcode_atts(array(
					'ca_res_breakpoint'			=> 767,
					'ca_res_slidestoshow'		=> 1,
					'ca_res_slidestoscroll'		=> 1,
				), $responsive));

				$responsive_args[] = array(
					'breakpoint'	=> $ca_res_breakpoint,
					'settings'		=> array(
						'slidesToShow'		=> intval( $ca_res_slidestoshow ) > 0 ? intval( $ca_res_slidestoshow ) : 1,
						'slidesToScroll'	=> intval( $ca_res_slidestoscroll ) > 0 ? intval( $ca_res_slidestoscroll ) : 1,
					),
				);
			}

			$args['carousel_args']['responsive'] = $responsive_args;
		}

		$html = '';
		if( function_exists( 'techmarket_deals_cards_carousel' ) ) {
			ob_start();
			techmarket_deals_cards_carousel( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_deals_cards_carousel' , 'techmarket_deals_cards_carousel_element' );