<?php

if ( ! function_exists( 'techmarket_features_list_element' ) ) {

	function techmarket_features_list_element( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'features'			=> array(),
			'el_class'			=> '',
		), $atts));

		if( is_object( $features ) || is_array( $features ) ) {
			$features = json_decode( json_encode( $features ), true );
		} else {
			$features = json_decode( urldecode( $features ), true );
		}

		$args = array(
			'features'			=> $features,
			'section_class'		=> $el_class
		);

		$html = '';
		if( function_exists( 'techmarket_features_list' ) ) {
			ob_start();
			techmarket_features_list( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_features_list' , 'techmarket_features_list_element' );