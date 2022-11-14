<?php

if ( ! function_exists( 'techmarket_banners_element' ) ) {

	function techmarket_banners_element( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'banners'			=> array(),
			'el_class'			=> '',
		), $atts));

		if( is_object( $banners ) || is_array( $banners ) ) {
			$banners = json_decode( json_encode( $banners ), true );
		} else {
			$banners = json_decode( urldecode( $banners ), true );
		}

		$args = array(
			'banners'			=> $banners,
			'section_class'		=> $el_class
		);

		$html = '';
		if( function_exists( 'techmarket_banners' ) ) {
			ob_start();
			techmarket_banners( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_banners' , 'techmarket_banners_element' );