<?php

if ( ! function_exists( 'techmarket_poster_element' ) ) {

	function techmarket_poster_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'bg_choice'		=> '',
			'bg_image'		=> '',
			'bg_color'		=> '',
			'bg_height'		=> '',
			'pre_title'		=> '',
			'title'			=> '',
			'sub_title'		=> '',
			'action_text'	=> '',
			'action_link'	=> '#',
			'condition'		=> '',
			'el_class'		=> ''
		), $atts));

		$args = array(
			'bg_choice'		=> isset( $bg_choice ) ? $bg_choice : 'image',
			'bg_color'		=> $bg_color,
			'bg_height'		=> $bg_height,
			'bg_image'		=> isset( $bg_image ) && intval( $bg_image ) ? wp_get_attachment_image_src( $bg_image, 'full' ) : '',
			'pre_title'		=> $pre_title,
			'title'			=> $title,
			'sub_title'		=> $sub_title,
			'action_text'	=> $action_text,
			'action_link'	=> $action_link,
			'condition'		=> $condition,
			'section_class'	=> $el_class,
		);

		$html = '';
		if( function_exists( 'techmarket_poster' ) ) {
			ob_start();
			techmarket_poster( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_poster' , 'techmarket_poster_element' );