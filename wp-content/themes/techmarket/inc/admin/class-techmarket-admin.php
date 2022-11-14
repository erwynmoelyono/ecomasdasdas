<?php
/**
 * Techmarket Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Admin class.
 */
class Techmarket_Admin {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'includes' ) );
		add_action( 'admin_menu', array( $this, 'add_custom_css_page' ) );
	}

	/**
	 * Include any classes we need within admin
	 */
	public function includes() {
		include_once get_template_directory() . '/inc/admin/techmarket-admin-functions.php';
		include_once get_template_directory() . '/inc/admin/techmarket-meta-box-functions.php';
		include_once get_template_directory() . '/inc/admin/class-techmarket-admin-meta-boxes.php';
		include_once get_template_directory() . '/inc/admin/class-techmarket-admin-assets.php';

		$this->load_meta_boxes();
	}

	public function load_meta_boxes() {
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v1.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v2.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v3.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v4.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v5.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v6.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v7.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v8.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v9.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v10.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v11.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-home-v12.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-landing-v1.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-landing-v2.php';
		include_once get_template_directory() . '/inc/admin/meta-boxes/class-techmarket-meta-box-page.php';
	}

	public function add_custom_css_page() {
		if ( apply_filters( 'techmarket_should_add_custom_css_page', false ) ) {
			add_theme_page( 'Custom Color CSS', 'Custom Color CSS', 'manage_options', 'custom-primary-color-css-page', 'techmarket_custom_primary_color_page' );
		}
	}
}

return new Techmarket_Admin();