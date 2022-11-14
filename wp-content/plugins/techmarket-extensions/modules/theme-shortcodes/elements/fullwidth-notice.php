<?php

if ( ! function_exists( 'techmarket_fullwidth_notice_element' ) ) {

	function techmarket_fullwidth_notice_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'notice_info'	=> '',
			'el_class'		=> ''
		), $atts));

		$args = array(
			'notice_info'	=> $notice_info,
			'section_class'	=> $el_class,
		);

		$html = '';
		if( function_exists( 'techmarket_fullwidth_notice' ) ) {
			ob_start();
			techmarket_fullwidth_notice( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_fullwidth_notice' , 'techmarket_fullwidth_notice_element' );