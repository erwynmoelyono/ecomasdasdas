<?php

if ( ! function_exists( 'techmarket_6_1_6_tabs_with_deals_element' ) ) {

	function techmarket_6_1_6_tabs_with_deals_element( $atts, $content = null ){

		extract(shortcode_atts(array(
			'tabs'				=> array(),
			'section_title'		=> '',
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
					'shortcode_tag'		=> 'sale_products',
					'orderby' 			=> 'date',
					'order' 			=> 'desc',
					'product_id'		=> '',
					'category'			=> '',
				), $tab));
				
				$shortcode_atts = function_exists( 'techmarket_get_atts_for_shortcode' ) ? techmarket_get_atts_for_shortcode( array( 'shortcode' => $shortcode_tag, 'product_category_slug' => $category, 'products_choice' => 'ids', 'products_ids_skus' => $product_id ) ) : array();

				$tabs_args[] = array(
					'title'				=> $title,
					'shortcode_tag'		=> $shortcode_tag,
					'shortcode_atts'	=> wp_parse_args( $shortcode_atts, array( 'order' => $order, 'orderby' => $orderby ) ),
				);
			}
		}

		$args = array(
			'section_title'		=> $section_title,
			'section_class'		=> $el_class,
			'tabs' 				=> $tabs_args
		);

		$html = '';
		if( function_exists( 'techmarket_6_1_6_tabs_with_deals' ) ) {
			ob_start();
			techmarket_6_1_6_tabs_with_deals( $args );
			$html = ob_get_clean();
		}

		return $html;
	}

}

add_shortcode( 'techmarket_6_1_6_tabs_with_deals' , 'techmarket_6_1_6_tabs_with_deals_element' );