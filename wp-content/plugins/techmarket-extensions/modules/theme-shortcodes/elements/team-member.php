<?php

if ( ! function_exists( 'techmarket_team_member_element' ) ) {

	function techmarket_team_member_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'name'			=> '',
			'designation'	=> '',
			'image'			=> ''
		), $atts));

		$args = array(
			'name'			=> $name,
			'designation'	=> $designation,
			'image'			=> isset( $image ) && intval( $image ) ? wp_get_attachment_image_src( $image, 'full' ) : array( '//placehold.it/290x301', '290', '301' ),
		);

		$html = '';
		if( function_exists( 'techmarket_team_member' ) ) {
			ob_start();
			techmarket_team_member( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_team_member' , 'techmarket_team_member_element' );