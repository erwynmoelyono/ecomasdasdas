<?php

if ( ! function_exists( 'techmarket_terms_element' ) ) {

	function techmarket_terms_element( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'taxonomy'       => 'category',
			'orderby'        => 'name',
			'order'          => 'ASC',
			'hide_empty'     => 0,
			'include'        => '',
			'exclude'        => '',
			'number'         => 0,
			'offset'         => 0,
			'name'           => '',
			'slug'           => '',
			'hierarchical'   => true,
			'child_of'       => 0,
			'parent'         => '',
			'include_parent' => 1,
		), $atts, 'techmarket_terms' );

		// Unset empty optional args
		$optional_args = array( 'include', 'exclude', 'name', 'slug', 'parent' );

		foreach( $optional_args as $optional_arg ) {
			if ( empty ( $atts[ $optional_arg ] ) ) {
				unset( $atts[ $optional_arg ] );
			}
		}

		// Check for comma separated and convert into arrays
		$comma_separated_args = array( 'taxonomy', 'include', 'exclude', 'name', 'slug' );

		foreach ( $comma_separated_args as $comma_separated_arg ) {
			if ( !empty( $atts[ $comma_separated_arg ] ) ) {
				$atts[$comma_separated_arg] = explode( ',', $atts[$comma_separated_arg] );
			}
		}

		//Cast int or number
		$int_args = array( 'hide_empty', 'number', 'offset', 'hierarchical', 'child_of', 'include_parent', 'parent' );

		foreach ( $int_args as $int_arg ) {
			if ( !empty( $atts[ $int_arg ] ) ) {
				$atts[ $int_arg ] = (int) $atts[ $int_arg ];
			}
		}

		$terms = get_terms( $atts );

		$html = '';

		foreach ( $terms as $term ) {
			$html .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a></li>';
		}

		if ( $atts['include_parent'] && $atts['child_of'] ) {
			
			$parent_term = get_term( $atts['child_of'] );

			if ( $parent_term && ! is_wp_error( $parent_term ) ) {
				$parent_term_item = '<li class="nav-title"><a href="' . esc_url( get_term_link( $parent_term ) ) . '">' . $parent_term->name . '</a></li>';
				$html = $parent_term_item . $html;
			}
		}

		if ( ! empty( $html ) ) {
			$html = '<ul>' . $html . '</ul>';
		}

		return $html;
	}

}

add_shortcode( 'techmarket_terms' , 'techmarket_terms_element' );