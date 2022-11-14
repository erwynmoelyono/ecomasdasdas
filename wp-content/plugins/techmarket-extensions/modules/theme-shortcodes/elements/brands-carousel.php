<?php

if ( ! function_exists( 'techmarket_brands_carousel_element' ) ) {

	function techmarket_brands_carousel_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'title'				=> '',
			'limit'				=> '',
			'orderby' 			=> 'date',
			'order' 			=> 'desc',
			'include'			=> '',
			'hide_empty'		=> false,
			'ca_slidestoshow'	=> 6,
			'ca_slidestoscroll'	=> 6,
			'ca_responsive'		=> array()
		), $atts));

		$section_args = array(
			'section_title'		=> $title
		);

		$taxonomy_args = array(
			'orderby'			=> $orderby,
			'order'				=> $order,
			'number'			=> $limit,
			'hide_empty'		=> $hide_empty
		);

		if( ! empty( $include ) ) {
			$include = explode( ",", $include );
			$taxonomy_args['include'] = $include;
		}

		$carousel_args 	= array(
			'infinite'			=> false,
			'dots'				=> false,
			'arrows'			=> true,
			'slidesToShow'		=> intval( $ca_slidestoshow ),
			'slidesToScroll'	=> intval( $ca_slidestoscroll ),
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
		if( function_exists( 'techmarket_brands_carousel' ) ) {
			ob_start();
			techmarket_brands_carousel( $section_args, $taxonomy_args, $carousel_args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_brands_carousel' , 'techmarket_brands_carousel_element' );