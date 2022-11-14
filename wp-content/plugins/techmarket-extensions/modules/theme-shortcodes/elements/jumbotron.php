<?php

if ( ! function_exists( 'techmarket_jumbotron_element' ) ) {

	function techmarket_jumbotron_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'title'				=> '',
			'sub_title'			=> '',
			'image'				=> '',
		), $atts));

		$args = array(
			'title'			=> $title,
			'sub_title'		=> $sub_title,
			'image'			=> $image,
		);

		$html = '';
		if( function_exists( 'techmarket_jumbotron' ) ) {
			ob_start();
			techmarket_jumbotron( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_jumbotron' , 'techmarket_jumbotron_element' );