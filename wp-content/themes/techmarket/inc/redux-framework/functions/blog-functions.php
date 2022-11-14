<?php
/**
 * Filter functions for Blog Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_blog_page_view' ) ) {
	function redux_apply_blog_page_view( $blog_view ) {
		global $techmarket_options;

		if( isset( $techmarket_options['blog_view'] ) ) {
			$blog_view = $techmarket_options['blog_view'];
		}

		return $blog_view;
	}
}

if ( ! function_exists( 'redux_apply_blog_page_layout' ) ) {
	function redux_apply_blog_page_layout( $blog_layout ) {
		global $techmarket_options;

		if( isset( $techmarket_options['blog_layout'] ) ) {
			$blog_layout = $techmarket_options['blog_layout'];
		}

		return $blog_layout;
	}
}

if ( ! function_exists( 'redux_toggle_post_placeholder_img' ) ) {
	function redux_toggle_post_placeholder_img( $enable_placeholder_img ) {
		global $techmarket_options;

		if( isset( $techmarket_options['post_placeholder_img'] ) ) {
			$enable_placeholder_img = $techmarket_options['post_placeholder_img'];
		}

		return $enable_placeholder_img;
	}
}

if ( ! function_exists( 'redux_toggle_post_force_excerpt' ) ) {
	function redux_toggle_post_force_excerpt( $enable_excerpt ) {
		global $techmarket_options;

		if( isset( $techmarket_options['post_force_excerpt'] ) ) {
			$enable_excerpt = $techmarket_options['post_force_excerpt'];
		}

		return $enable_excerpt;
	}
}

if ( ! function_exists( 'redux_apply_single_post_layout' ) ) {
	function redux_apply_single_post_layout( $single_post_layout ) {
		global $techmarket_options;

		if( isset( $techmarket_options['single_post_layout'] ) ) {
			$single_post_layout = $techmarket_options['single_post_layout'];
		}

		return $single_post_layout;
	}
}