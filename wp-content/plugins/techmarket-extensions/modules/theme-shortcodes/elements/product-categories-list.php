<?php

if ( ! function_exists( 'techmarket_product_categories_list_element' ) ) {

	function techmarket_product_categories_list_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'section_title'		=> '',
			'limit'				=> '',
			'hide_empty'		=> false,
			'orderby' 			=> 'name',
			'order' 			=> 'ASC',
			'include'			=> '',
			'parent'			=> '',
			'hierarchical'		=> false
		), $atts));

		$category_args = array(
			'number'			=> $limit,
			'hide_empty'		=> $hide_empty,
			'orderby' 			=> $orderby,
			'order' 			=> $order,
			'slugs'				=> $include,
			'parent' 			=> $parent,
			'hierarchical' 		=> $hierarchical
		);

		$args = array(
			'section_title'		=> $section_title,
			'category_args'		=> $category_args,
		);

		$html = '';
		if( function_exists( 'techmarket_product_categories_list' ) ) {
			ob_start();
			techmarket_product_categories_list( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_product_categories_list' , 'techmarket_product_categories_list_element' );