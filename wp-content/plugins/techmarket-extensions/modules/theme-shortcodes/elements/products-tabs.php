<?php

if ( ! function_exists( 'techmarket_products_tabs_element' ) ) {

	function techmarket_products_tabs_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'tabs'				=> array(),
			'section_title'		=> '',
			'header_nav_align'	=> '',
			'action_link'		=> '#',
			'action_text'		=> '',
			'el_class'			=> ''
		), $atts));

		if( is_object( $tabs ) || is_array( $tabs ) ) {
			$tabs = json_decode( json_encode( $tabs ), true );
		} else {
			$tabs = json_decode( urldecode( $tabs ), true );
		}

		$tabs_args = array();
		
		if( is_array( $tabs ) ) {
			foreach ( $tabs as $key => $tab ) {

				extract(shortcode_atts(array(
					'title'				=> '',
					'shortcode_tag'		=> 'recent_products',
					'per_page' 			=> 12,
					'columns'			=> 4,
					'orderby' 			=> 'date',
					'order' 			=> 'desc',
					'template'			=> 'content-product',
					'product_id'		=> '',
					'category'			=> '',
				), $tab));
				
				$shortcode_atts = function_exists( 'techmarket_get_atts_for_shortcode' ) ? techmarket_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'products_choice' => 'ids', 'products_ids_skus' => $product_id ) ) : array();

				$tabs_args[] = array(
					'title'				=> $title,
					'shortcode_tag'		=> $shortcode_tag,
					'shortcode_atts'	=> wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby, 'columns' => $columns, 'per_page' => $per_page, 'template' => $template ) ),
				);
			}
		}

		$args = array(
			'section_title'		=> $section_title,
			'section_class'		=> $el_class,
			'header_nav_align'	=> $header_nav_align,
			'tabs' 				=> $tabs_args,
			'action_link' 		=> $action_link,
			'action_text' 		=> $action_text,
		);

		$html = '';
		if( function_exists( 'techmarket_products_tabs' ) ) {
			ob_start();
			techmarket_products_tabs( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_products_tabs' , 'techmarket_products_tabs_element' );