<?php

if ( ! function_exists( 'techmarket_media_single_banner_element' ) ) {

	function techmarket_media_single_banner_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'section_title'	=> '',
			'description'	=> '',
			'action_text'	=> '',
			'action_link'	=> '#',
			'image'			=> '',
			'media_align'	=> '',
			'el_class'		=> ''
		), $atts));

		$el_class = empty( $media_align ) ? $el_class : $media_align . ' ' . $el_class;

		$args = array(
			'section_title'	=> $section_title,
			'description'	=> $description,
			'action_text'	=> $action_text,
			'action_link'	=> $action_link,
			'image'			=> isset( $image ) && intval( $image ) ? wp_get_attachment_image_src( $image, 'full' ) : '',
			'section_class'	=> $el_class,
		);

		$html = '';
		if( function_exists( 'techmarket_media_single_banner' ) ) {
			ob_start();
			techmarket_media_single_banner( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_media_single_banner' , 'techmarket_media_single_banner_element' );