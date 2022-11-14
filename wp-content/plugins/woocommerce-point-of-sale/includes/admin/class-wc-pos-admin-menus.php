<?php
/**
 * Admin Menus
 *
 * Handles Point of Sale menu in admin.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Menus', false ) ) {
	return new WC_POS_Admin_Menus();
}

/**
 * WC_POS_Admin_Menus.
 */
class WC_POS_Admin_Menus {

	/**
	 * Construct.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_filter( 'admin_menu', array( $this, 'add_dashboard_navigation' ) );
		add_filter( 'submenu_file', array( $this, 'submenu_file' ), 10, 2 );

		// Handle saving settings earlier than load-{page} hook to avoid race conditions in
		// conditional menus.
		add_action( 'wp_loaded', array( $this, 'save_settings' ) );
	}

	/**
	 * Add the menu.
	 */
	public function add_menu() {
		// Add the Point of Sale Menu.
		add_menu_page(
			__( 'Point of Sale', 'woocommerce-point-of-sale' ), // Page title.
			__( 'Point of Sale', 'woocommerce-point-of-sale' ), // Menu title.
			'manage_woocommerce_point_of_sale',
			WC_POS()->menu_slug,
			array( $this, 'registers_page' ),
			null,
			'55.8'
		);

		// Add barcodes page.
		add_submenu_page(
			WC_POS()->menu_slug,
			__( 'Barcodes', 'woocommerce-point-of-sale' ),
			__( 'Barcodes', 'woocommerce-point-of-sale' ),
			'manage_woocommerce_point_of_sale',
			WC_POS()->barcodes_page_slug,
			array( $this, 'barcodes_page' )
		);

		// Add stock controller page.
		add_submenu_page(
			WC_POS()->menu_slug,
			__( 'Stock', 'woocommerce-point-of-sale' ),
			__( 'Stock', 'woocommerce-point-of-sale' ),
			'manage_woocommerce_point_of_sale',
			WC_POS()->stock_controller_page_slug,
			array( $this, 'stock_controller_page' )
		);

		// Add settings page.
		add_submenu_page(
			WC_POS()->menu_slug,
			__( 'Settings', 'woocommerce-point-of-sale' ),
			__( 'Settings', 'woocommerce-point-of-sale' ),
			'manage_woocommerce_point_of_sale',
			WC_POS()->settings_page_slug,
			array( $this, 'settings_page' )
		);

		// Hide screen options on Point of Sale screens.
		if ( isset( $_GET['page'] ) ) {
			$curent_screen = substr( sanitize_key( $_GET['page'] ), 0, 7 );

			if ( 'wc_pos_' === $curent_screen ) {
				add_filter( 'screen_options_show_screen', '__return_false' );
			}
		}
	}

	/**
	 * Highlights the correct top level admin menu item for post type add screens.
	 *
	 * @param string $submenu_file
	 * @param string $parent_file
	 *
	 * @return string
	 */
	public function submenu_file( $submenu_file, $parent_file ) {
		global $post_type;

		switch ( $post_type ) {
			case 'pos_register':
				$submenu_file = 'edit.php?post_type=pos_register';
				break;
			case 'pos_outlet':
				$submenu_file = 'edit.php?post_type=pos_outlet';
				break;
			case 'pos_grid':
				$submenu_file = 'edit.php?post_type=pos_grid';
				break;
		}

		return $submenu_file;
	}

	/**
	 * Init the barcodes page.
	 */
	public function barcodes_page() {
		WC_POS()->barcode()->display_single_barcode_page();
	}

	/**
	 * Init the stock controller page.
	 */
	public function stock_controller_page() {
		WC_POS()->stock()->display_single_stocks_page();
	}

	/**
	 * Init the settings page.
	 */
	public function settings_page() {
		// Add any posted errors.
		if ( ! empty( $_GET['wc_error'] ) ) { // WPCS: input var okay, CSRF ok.
			WC_POS_Admin_Settings::add_error( wp_kses_post( wp_unslash( $_GET['wc_error'] ) ) ); // WPCS: input var okay, CSRF ok.
		}

		// Add any posted messages.
		if ( ! empty( $_GET['wc_message'] ) ) { // WPCS: input var okay, CSRF ok.
			WC_POS_Admin_Settings::add_message( wp_kses_post( wp_unslash( $_GET['wc_message'] ) ) ); // WPCS: input var okay, CSRF ok.
		}

		WC_POS_Admin_Settings::output();
	}

	/**
	 * Handle saving of settings.
	 */
	public function save_settings() {
		global $current_tab, $current_section;

		// We should only save on the settings page.
		if ( ! is_admin() || ! isset( $_GET['page'] ) || 'wc-pos-settings' !== $_GET['page'] ) { // phpcs:ignore WordPress.Security.NonceVerification.NoNonceVerification
			return;
		}

		// Include settings pages.
		WC_POS_Admin_Settings::get_settings_pages();

		// Get current tab/section.
		$current_tab     = empty( $_GET['tab'] ) ? 'general' : sanitize_title( wp_unslash( $_GET['tab'] ) );
		$current_section = empty( $_REQUEST['section'] ) ? '' : sanitize_title( wp_unslash( $_REQUEST['section'] ) );

		// Save settings if data has been posted.
		if ( '' !== $current_section && apply_filters( "wc_pos_save_settings_{$current_tab}_{$current_section}", ! empty( $_POST['save'] ) ) ) {
			check_admin_referer( 'wc-pos-settings' );
			WC_POS_Admin_Settings::save();
		} elseif ( '' === $current_section && apply_filters( "wc_pos_save_settings_{$current_tab}", ! empty( $_POST['save'] ) ) ) {
			check_admin_referer( 'wc-pos-settings' );
			WC_POS_Admin_Settings::save();
		}
	}

	/**
	 * Add plugin menu under WooCommerce dashoard navigation.
	 *
	 * @since 5.4.1
	 */
	public function add_dashboard_navigation() {
		if ( ! class_exists( '\Automattic\WooCommerce\Admin\Features\Navigation\Menu' ) ) {
			return;
		}

		// Point of Sale navigation.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_category(
			array(
				'id'         => 'woocommerce-point-of-sale',
				'parent'     => 'woocommerce',
				'order'      => 1,
				'title'      => __( 'Point of Sale', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
			)
		);

		// Registers.
		$pos_register_items = \Automattic\WooCommerce\Admin\Features\Navigation\Menu::get_post_type_items( 'pos_register', array( 'parent' => 'woocommerce-point-of-sale-pos_register' ) );
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_category(
			array(
				'id'         => 'woocommerce-point-of-sale-pos_register',
				'parent'     => 'woocommerce-point-of-sale',
				'order'      => 1,
				'title'      => __( 'Registers', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
			)
		);
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item( $pos_register_items['all'] );
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item( $pos_register_items['new'] );

		// Outlets.
		$pos_outlet_items = \Automattic\WooCommerce\Admin\Features\Navigation\Menu::get_post_type_items( 'pos_outlet', array( 'parent' => 'woocommerce-point-of-sale-pos_outlet' ) );
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_category(
			array(
				'id'         => 'woocommerce-point-of-sale-pos_outlet',
				'parent'     => 'woocommerce-point-of-sale',
				'order'      => 2,
				'title'      => __( 'Outlets', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
			)
		);
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item( $pos_outlet_items['all'] );
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item( $pos_outlet_items['new'] );

		// Grids.
		$pos_grid_items = \Automattic\WooCommerce\Admin\Features\Navigation\Menu::get_post_type_items( 'pos_grid', array( 'parent' => 'woocommerce-point-of-sale-pos_grid' ) );
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_category(
			array(
				'id'         => 'woocommerce-point-of-sale-pos_grid',
				'parent'     => 'woocommerce-point-of-sale',
				'order'      => 3,
				'title'      => __( 'Grids', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
			)
		);
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item( $pos_grid_items['all'] );
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item( $pos_grid_items['new'] );

		// Receipts.
		$pos_receipt_items = \Automattic\WooCommerce\Admin\Features\Navigation\Menu::get_post_type_items( 'pos_receipt', array( 'parent' => 'woocommerce-point-of-sale-pos_receipt' ) );
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_category(
			array(
				'id'         => 'woocommerce-point-of-sale-pos_receipt',
				'parent'     => 'woocommerce-point-of-sale',
				'order'      => 3,
				'title'      => __( 'Receipts', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
			)
		);
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item( $pos_receipt_items['all'] );
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item( $pos_receipt_items['new'] );

		// Barcodes.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item(
			array(
				'id'         => 'woocommerce-point-of-sale-barcodes',
				'parent'     => 'woocommerce-point-of-sale',
				'order'      => 5,
				'title'      => __( 'Barcodes', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
				'url'        => admin_url( 'admin.php?page=wc-pos-barcodes' ),
			)
		);

		// Stock.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item(
			array(
				'id'         => 'woocommerce-point-of-sale-stock',
				'parent'     => 'woocommerce-point-of-sale',
				'order'      => 6,
				'title'      => __( 'Stock', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
				'url'        => admin_url( 'admin.php?page=wc-pos-stock-controller' ),
			)
		);

		// Settings.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_category(
			array(
				'id'         => 'woocommerce-point-of-sale-settings',
				'parent'     => 'woocommerce-point-of-sale',
				'order'      => 7,
				'title'      => __( 'Settings', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
				// 'url'        => admin_url( 'admin.php?page=wc-pos-settings' ),
			)
		);

		// Settings > General.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item(
			array(
				'id'         => 'woocommerce-point-of-sale-settings-general',
				'parent'     => 'woocommerce-point-of-sale-settings',
				'order'      => 1,
				'title'      => __( 'General', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
				'url'        => admin_url( 'admin.php?page=wc-pos-settings&tab=general' ),
			)
		);

		// Settings > Register.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item(
			array(
				'id'         => 'woocommerce-point-of-sale-settings-register',
				'parent'     => 'woocommerce-point-of-sale-settings',
				'order'      => 2,
				'title'      => __( 'Register', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
				'url'        => admin_url( 'admin.php?page=wc-pos-settings&tab=register' ),
			)
		);

		// Settings > Tiles.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item(
			array(
				'id'         => 'woocommerce-point-of-sale-settings-tiles',
				'parent'     => 'woocommerce-point-of-sale-settings',
				'order'      => 3,
				'title'      => __( 'Tiles', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
				'url'        => admin_url( 'admin.php?page=wc-pos-settings&tab=tiles' ),
			)
		);

		// Settings > Orders.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item(
			array(
				'id'         => 'woocommerce-point-of-sale-settings-orders',
				'parent'     => 'woocommerce-point-of-sale-settings',
				'order'      => 4,
				'title'      => __( 'Orders', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
				'url'        => admin_url( 'admin.php?page=wc-pos-settings&tab=orders' ),
			)
		);

		// Settings > Customer.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item(
			array(
				'id'         => 'woocommerce-point-of-sale-settings-customer',
				'parent'     => 'woocommerce-point-of-sale-settings',
				'order'      => 5,
				'title'      => __( 'Customer', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
				'url'        => admin_url( 'admin.php?page=wc-pos-settings&tab=customer' ),
			)
		);

		// Settings > Tax.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item(
			array(
				'id'         => 'woocommerce-point-of-sale-settings-tax',
				'parent'     => 'woocommerce-point-of-sale-settings',
				'order'      => 6,
				'title'      => __( 'Tax', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
				'url'        => admin_url( 'admin.php?page=wc-pos-settings&tab=tax' ),
			)
		);

		// Settings > Reports.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item(
			array(
				'id'         => 'woocommerce-point-of-sale-settings-reports',
				'parent'     => 'woocommerce-point-of-sale-settings',
				'order'      => 7,
				'title'      => __( 'Reports', 'woocommerce-point-of-sale' ),
				'capability' => 'view_register',
				'url'        => admin_url( 'admin.php?page=wc-pos-settings&tab=reports' ),
			)
		);

		// Settings > Advanced.
		\Automattic\WooCommerce\Admin\Features\Navigation\Menu::add_plugin_item(
			array(
				'id'         => 'woocommerce-point-of-sale-settings-advanced',
				'parent'     => 'woocommerce-point-of-sale-settings',
				'order'      => 8,
				'title'      => __( 'Advanced', 'woocommerce-point-of-sale' ),
				'capability' => 'Menu:view_register',
				'url'        => admin_url( 'admin.php?page=wc-pos-settings&tab=advanced' ),
			)
		);
	}
}

return new WC_POS_Admin_Menus();

