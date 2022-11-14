<?php
/**
 * Additional functions used by the theme
 */

if ( ! function_exists( 'pr' ) ) {
	function pr( $var ) {
		echo '<pre>' . print_r( $var, 1 ) . '</pre>';
	}
}

if ( ! function_exists( 'tm_is_windows_7' ) ) {
	function tm_is_windows_7() {
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$windows_7  = '/windows nt 6.1/i';
		return preg_match( $windows_7, $user_agent );
	}
}