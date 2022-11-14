<?php

if ( ! function_exists( 'techmarket_products_with_image_element' ) ) {

	function techmarket_products_with_image_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'title'				=> '',
			'shortcode_tag'		=> 'recent_products',
			'per_page' 			=> 14,
			'orderby' 			=> 'date',
			'order' 			=> 'desc',
			'columns'			=> 5,
			'template'			=> 'content-product',
			'product_id'		=> '',
			'category'			=> '',
			'action_text'		=> '',
			'action_link'		=> '#',
			'description'		=> '',
			'image'				=> '',
			'el_class'			=> ''
		), $atts));

		$shortcode_atts = function_exists( 'techmarket_get_atts_for_shortcode' ) ? techmarket_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'products_choice' => 'ids', 'products_ids_skus' => $product_id ) ) : array();

		$args = array(
			'section_title'		=> $title,
			'shortcode_tag'		=> $shortcode_tag,
			'shortcode_atts'	=> wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'columns' => $columns, 'per_page' => $per_page, 'template' => $template ) ),
			'action_text'		=> $action_text,
			'action_link'		=> $action_link,
			'description'		=> $description,
			'image'				=> isset( $image ) && intval( $image ) ? wp_get_attachment_image_src( $image, 'full' ) : '',
			'section_class'		=> $el_class
		);

		$html = '';
		if( function_exists( 'techmarket_products_with_image' ) ) {
			ob_start();
			techmarket_products_with_image( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_products_with_image' , 'techmarket_products_with_image_element' );