<?php
/**
 * Admin Settings
 *
 * Handles setting pages in admin.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Settings
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_POS_Admin_Settings.
 */
class WC_POS_Admin_Settings extends WC_Admin_Settings {

	/**
	 * Setting pages.
	 *
	 * @var array
	 */
	private static $settings = array();

	/**
	 * Error messages.
	 *
	 * @var array Error messages.
	 */
	private static $errors = array();

	/**
	 * Update messages.
	 *
	 * @var array
	 */
	private static $messages = array();

	/**
	 * Include the settings page classes.
	 */
	public static function get_settings_pages() {
		if ( empty( self::$settings ) ) {
			$settings = array();

			// Load WC_POS_Settings_Page.
			include_once WC_POS()->plugin_path() . '/includes/admin/settings/wc-pos-settings-page.php';

			$settings[] = include WC_POS()->plugin_path() . '/includes/admin/settings/wc-pos-settings-general.php';
			$settings[] = include WC_POS()->plugin_path() . '/includes/admin/settings/wc-pos-settings-register.php';
			$settings[] = include WC_POS()->plugin_path() . '/includes/admin/settings/wc-pos-settings-tiles.php';
			$settings[] = include WC_POS()->plugin_path() . '/includes/admin/settings/wc-pos-settings-orders.php';
			// $settings[] = include WC_POS()->plugin_path() . '/includes/admin/settings/wc-pos-settings-products.php';
			$settings[] = include WC_POS()->plugin_path() . '/includes/admin/settings/wc-pos-settings-customer.php';
			$settings[] = include WC_POS()->plugin_path() . '/includes/admin/settings/wc-pos-settings-tax.php';
			$settings[] = include WC_POS()->plugin_path() . '/includes/admin/settings/wc-pos-settings-reports.php';
			$settings[] = include WC_POS()->plugin_path() . '/includes/admin/settings/wc-pos-settings-advanced.php';

			self::$settings = apply_filters( 'wc_pos_get_settings_pages', $settings );
		}

		return self::$settings;
	}

	/**
	 * Save the settings
	 */
	public static function save() {
		global $current_tab;

		check_admin_referer( 'wc-pos-settings' );

		// Trigger actions.
		do_action( 'wc_pos_settings_save_' . $current_tab );
		do_action( 'wc_pos_update_options_' . $current_tab );
		do_action( 'wc_pos_update_options' );

		self::add_message( __( 'Your settings have been saved.', 'woocommerce-point-of-sale' ) );
		self::check_download_folder_protection();

		// Clear any unwanted data and flush rules.
		update_option( 'woocommerce_queue_flush_rewrite_rules', 'yes' );
		WC()->query->init_query_vars();
		WC()->query->add_endpoints();

		do_action( 'wc_pos_settings_saved' );
	}

	/**
	 * Settings page.
	 *
	 * Handles the display of the main settings page in admin.
	 */
	public static function output() {
		global $current_section, $current_tab;

		do_action( 'wc_pos_settings_start' );

		// Get tabs for the settings page.
		$tabs = apply_filters( 'wc_pos_settings_tabs_array', array() );

		include_once WC_POS()->plugin_path() . '/includes/admin/views/html-admin-settings.php';
	}
}
