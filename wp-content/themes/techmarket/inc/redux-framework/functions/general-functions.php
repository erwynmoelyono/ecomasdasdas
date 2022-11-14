<?php
/**
 * Filter functions for General Section of Theme Options
 */

if( ! function_exists( 'redux_toggle_logo_svg' ) ) {
	function redux_toggle_logo_svg() {
		global $techmarket_options;

		if( isset( $techmarket_options['logo_svg'] ) && $techmarket_options['logo_svg'] == '1' ) {
			$logo_svg = true;
		} else {
			$logo_svg = false;
		}

		return $logo_svg;
	}
}

if( ! function_exists( 'redux_toggle_scrollup' ) ) {
	function redux_toggle_scrollup() {
		global $techmarket_options;

		if( isset( $techmarket_options['scrollup'] ) && $techmarket_options['scrollup'] == '1' ) {
			$scrollup = true;
		} else {
			$scrollup = false;
		}

		return $scrollup;
	}
}

if( ! function_exists( 'redux_toggle_register_image_size' ) ) {
	function redux_toggle_register_image_size() {
		global $techmarket_options;

		if( isset( $techmarket_options['reg_image_size'] ) && $techmarket_options['reg_image_size'] == '1' ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}