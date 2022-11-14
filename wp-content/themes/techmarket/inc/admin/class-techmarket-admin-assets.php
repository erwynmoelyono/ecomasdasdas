<?php
/**
 * Load assets
 *
 * @author      CheThemes
 * @category    Admin
 * @package     Techmarket/Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Techmarket_Admin_Assets' ) ) :

/**
 * Techmarket_Admin_Assets Class.
 */
class Techmarket_Admin_Assets {

	/**
	 * Hook in tabs.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function admin_styles() {
		global $wp_scripts, $techmarket_version;

		$screen         = get_current_screen();
		$screen_id      = $screen ? $screen->id : '';
		$jquery_version = isset( $wp_scripts->registered['jquery-ui-core']->ver ) ? $wp_scripts->registered['jquery-ui-core']->ver : '1.9.2';
		$fonts_url      = techmarket_get_fonts_url();

		// Register admin styles
		wp_register_style( 'techmarket_admin_styles', get_template_directory_uri() . '/assets/css/admin/admin.css', array(), $techmarket_version );
		wp_register_style( 'fontawesome', get_template_directory_uri() . '/assets/vendors/fontawesome/css/all.min.css', array(), $techmarket_version );

		wp_enqueue_style( 'techmarket-fonts', $fonts_url, array(), null );
		wp_enqueue_style( 'fontawesome' );
		wp_enqueue_style( 'techmarket_admin_styles' );
	}

	/**
	 * Enqueue scripts.
	 */
	public function admin_scripts() {
		global $wp_query, $post, $techmarket_version;

		$screen       = get_current_screen();
		$screen_id    = $screen ? $screen->id : '';
		$ec_screen_id = sanitize_title( esc_html__( 'Techmarket', 'techmarket' ) );
		$suffix       = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_register_script( 'techmarket-admin-meta-boxes', get_template_directory_uri() . '/assets/js/admin/meta-boxes' . $suffix . '.js', array( 'jquery', 'jquery-ui-datepicker', 'jquery-ui-sortable'), $techmarket_version );

		wp_enqueue_script( 'techmarket-admin-meta-boxes' );
	}
}
endif;

return new Techmarket_Admin_Assets();
