<?php
/**
 * Filter functions for Header Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_header_style' ) ) {
	function redux_apply_header_style( $header_style ) {
		global $techmarket_options;

		if( ! empty( $techmarket_options['header_style'] ) ) {
			$header_style = $techmarket_options['header_style'];
		}

		return $header_style;
	}
}

if( ! function_exists( 'redux_toggle_sticky_header' ) ) {
	function redux_toggle_sticky_header() {
		global $techmarket_options;

		if( isset( $techmarket_options['sticky_header'] ) && $techmarket_options['sticky_header'] == '1' ) {
			$sticky_header = true;
		} else {
			$sticky_header = false;
		}

		return $sticky_header;
	}
}

if ( ! function_exists( 'redux_toggle_header_topbar' ) ) {
	function redux_toggle_header_topbar( $enable ) {
		global $techmarket_options;

		if( isset( $techmarket_options['show_header_topbar'] ) && $techmarket_options['show_header_topbar'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_apply_header_departments_menu_title' ) ) {
	function redux_apply_header_departments_menu_title( $title ) {
		global $techmarket_options;

		if( isset( $techmarket_options['header_departments_menu_title'] ) ) {
			$title = $techmarket_options['header_departments_menu_title'];
		}

		return $title;
	}
}

if ( ! function_exists( 'redux_apply_header_departments_menu_icon' ) ) {
	function redux_apply_header_departments_menu_icon( $icon ) {
		global $techmarket_options;

		if( isset( $techmarket_options['header_departments_menu_icon'] ) ) {
			$icon = $techmarket_options['header_departments_menu_icon'];
		}

		return $icon;
	}
}

if ( ! function_exists( 'redux_apply_header_search_placeholder_text' ) ) {
	function redux_apply_header_search_placeholder_text( $text ) {
		global $techmarket_options;

		if( isset( $techmarket_options['header_search_placeholder_text'] ) ) {
			$text = $techmarket_options['header_search_placeholder_text'];
		}

		return $text;
	}
}

if ( ! function_exists( 'redux_apply_header_search_dropdown_text' ) ) {
	function redux_apply_header_search_dropdown_text( $text ) {
		global $techmarket_options;

		if( isset( $techmarket_options['header_search_dropdown_text'] ) ) {
			$text = $techmarket_options['header_search_dropdown_text'];
		}

		return $text;
	}
}

if ( ! function_exists( 'redux_apply_header_search_button_text' ) ) {
	function redux_apply_header_search_button_text( $text ) {
		global $techmarket_options;

		if( isset( $techmarket_options['header_search_button_text'] ) ) {
			$text = $techmarket_options['header_search_button_text'];
		}

		return $text;
	}
}

if( ! function_exists( 'redux_toggle_header_live_search' ) ) {
	function redux_toggle_header_live_search() {
		global $techmarket_options;

		if( isset( $techmarket_options['header_live_search'] ) && $techmarket_options['header_live_search'] == '1' ) {
			$sticky_header = true;
		} else {
			$sticky_header = false;
		}

		return $sticky_header;
	}
}

if ( ! function_exists( 'redux_apply_header_action_button_args' ) ) {
	function redux_apply_header_action_button_args( $args ) {
		global $techmarket_options;

		if( isset( $techmarket_options['header_action_btn_text'] ) ) {
			$args['text'] = $techmarket_options['header_action_btn_text'];
		}

		if( isset( $techmarket_options['header_action_btn_link'] ) ) {
			$args['url'] = $techmarket_options['header_action_btn_link'];
		}

		if( isset( $techmarket_options['header_action_btn_icon'] ) ) {
			$args['icon'] = $techmarket_options['header_action_btn_icon'];
		}

		return $args;
	}
}