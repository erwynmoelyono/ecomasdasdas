<?php

if ( ! function_exists( 'techmarket_brands_element' ) ) {

	function techmarket_brands_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'title'				=> '',
			'limit'				=> '',
			'orderby' 			=> 'date',
			'order' 			=> 'desc',
			'include'			=> '',
			'hide_empty'		=> false,
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

		$html = '';
		if( function_exists( 'techmarket_brands' ) ) {
			ob_start();
			techmarket_brands( $section_args, $taxonomy_args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_brands' , 'techmarket_brands_element' );