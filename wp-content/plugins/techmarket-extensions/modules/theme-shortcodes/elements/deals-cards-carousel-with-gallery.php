<?php

if ( ! function_exists( 'techmarket_deals_cards_carousel_with_gallery_element' ) ) {

	function techmarket_deals_cards_carousel_with_gallery_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'shortcode_tag'		=> 'sale_products',
			'per_page' 			=> 12,
			'orderby' 			=> 'date',
			'order' 			=> 'desc',
			'product_id'		=> '',
			'category'			=> '',
			'ca_infinite'		=> false,
			'ca_slidestoshow'	=> 1,
			'ca_slidestoscroll'	=> 1,
			'ca_dots'			=> false,
			'ca_arrows'			=> false,
			'ca_prevarrow'		=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
			'ca_nextarrow'		=> '<a href="#"><i class="tm tm-arrow-right"></i></a>',
			'ca_responsive'		=> array(),
			'el_class'			=> ''
		), $atts));

		$shortcode_atts = function_exists( 'techmarket_get_atts_for_shortcode' ) ? techmarket_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'products_choice' => 'ids', 'products_ids_skus' => $product_id ) ) : array();

		$args = array(
			'shortcode_tag'		=> $shortcode_tag,
			'shortcode_atts'	=> wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'columns' => $ca_slidestoshow, 'per_page' => $per_page ) ),
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
		if( function_exists( 'techmarket_deals_cards_carousel_with_gallery' ) ) {
			ob_start();
			techmarket_deals_cards_carousel_with_gallery( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_deals_cards_carousel_with_gallery' , 'techmarket_deals_cards_carousel_with_gallery_element' );