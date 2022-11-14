<?php

if ( ! function_exists( 'techmarket_product_categories_carousel_element' ) ) {

	function techmarket_product_categories_carousel_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'pre_title'			=> '',
			'section_title'		=> '',
			'header_custom_nav'	=> false,
			'button_text'		=> '',
			'button_link'		=> '',
			'limit'				=> '',
			'hide_empty'		=> false,
			'orderby' 			=> 'name',
			'order' 			=> 'ASC',
			'include'			=> '',
			'ca_slidestoshow'	=> 5,
			'ca_slidestoscroll'	=> 5,
			'ca_responsive'		=> array(),
			'el_class'			=> ''
		), $atts));

		$section_args = array(
			'pre_title'			=> $pre_title,
			'section_title'		=> $section_title,
			'header_custom_nav'	=> $header_custom_nav,
			'button_text'		=> $button_text,
			'button_link'		=> $button_link,
			'section_class'		=> $el_class
		);

		$category_args = array(
			'number'			=> $limit,
			'hide_empty'		=> $hide_empty,
			'orderby' 			=> $orderby,
			'order' 			=> $order,
			'slugs'				=> $include,
			'columns'			=> $ca_slidestoshow
		);

		$carousel_args = array(
			'infinite'			=> false,
			'dots'				=> false,
			'arrows'			=> filter_var( $header_custom_nav, FILTER_VALIDATE_BOOLEAN ),
			'slidesToShow'		=> intval( $ca_slidestoshow ),
			'slidesToScroll'	=> intval( $ca_slidestoscroll ),
			'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
			'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
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

			$carousel_args['responsive'] = $responsive_args;
		}

		$html = '';
		if( function_exists( 'techmarket_product_categories_carousel' ) ) {
			ob_start();
			techmarket_product_categories_carousel( $section_args, $category_args, $carousel_args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_product_categories_carousel' , 'techmarket_product_categories_carousel_element' );