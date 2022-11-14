<?php

if ( ! function_exists( 'techmarket_products_isotope_element' ) ) {

	function techmarket_products_isotope_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'pre_title'			=> '',
			'title'				=> '',
			'style'				=> '',
			'shortcode_tag'		=> 'recent_products',
			'per_page' 			=> 14,
			'orderby' 			=> 'date',
			'order' 			=> 'desc',
			'product_id'		=> '',
			'category'			=> '',
			'header_timer'		=> false,
			'timer_title'		=> '',
			'timer_value'		=> '',
			'action_text'		=> '',
			'action_link'		=> '#',
			'el_class'			=> ''
		), $atts));

		$shortcode_atts = function_exists( 'techmarket_get_atts_for_shortcode' ) ? techmarket_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'products_choice' => 'ids', 'products_ids_skus' => $product_id ) ) : array();

		$args = array(
			'pre_title'			=> $pre_title,
			'section_title'		=> $title,
			'style'				=> $style,
			'shortcode_tag'		=> $shortcode_tag,
			'shortcode_atts'	=> wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'per_page' => $per_page ) ),
			'header_timer'		=> $header_timer,
			'timer_title'		=> $timer_title,
			'timer_value'		=> $timer_value,
			'action_text'		=> $action_text,
			'action_link'		=> $action_link,
			'section_class'		=> $el_class
		);

		$html = '';
		if( function_exists( 'techmarket_products_isotope' ) ) {
			ob_start();
			techmarket_products_isotope( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_products_isotope' , 'techmarket_products_isotope_element' );