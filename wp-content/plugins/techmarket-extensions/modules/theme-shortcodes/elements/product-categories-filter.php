<?php

if ( ! function_exists( 'techmarket_product_categories_filter_element' ) ) {

	function techmarket_product_categories_filter_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'title'				=> '',
			'per_page' 			=> 8,
			'columns'			=> 4,
			'orderby' 			=> 'date',
			'order' 			=> 'desc',
			'template'			=> 'content-product-featured',
			'cat_show_all_text'	=> esc_html__( 'All Categories', 'techmarket-extensions' ),
			'cat_hide_if_empty'	=> false,
			'cat_include'		=> '',
			'el_class'			=> ''
		), $atts));

		$args = array(
			'section_title'		=> $title,
			'category_args'		=> array(
				'show_option_all' 	=> $cat_show_all_text,
				'taxonomy' 			=> 'product_cat',
				'hide_if_empty'		=> $cat_hide_if_empty,
				'slugs'				=> $cat_include,
				'value_field'		=> 'slug',
				'class'				=> 'categories-dropdown'
			),
			'shortcode_atts'	=> array( 'per_page' => $per_page, 'columns' => $columns, 'order' => $order, 'orderby' => $orderby, 'template' => $template ),
			'section_class'		=> $el_class
		);

		$html = '';
		if( function_exists( 'techmarket_product_categories_filter' ) ) {
			ob_start();
			techmarket_product_categories_filter( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_product_categories_filter' , 'techmarket_product_categories_filter_element' );