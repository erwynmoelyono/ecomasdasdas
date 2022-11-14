<?php
/**
 * Point of Sale Orders Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_Orders', false ) ) {
	return new WC_POS_Admin_Settings_Orders();
}

/**
 * WC_POS_Admin_Settings_Orders.
 */
class WC_POS_Admin_Settings_Orders extends WC_POS_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'orders';
		$this->label = __( 'Orders', 'woocommerce-point-of-sale' );

		parent::__construct();
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {
		global $current_section;

		$order_statuses = wc_pos_get_order_statuses_no_prefix();

		$settings = apply_filters(
			'wc_pos_orders_settings',
			array(
				array(
					'title' => __( 'Orders', 'woocommerce-point-of-sale' ),
					'type'  => 'title',
					'desc'  => '',
					'id'    => 'orders_options',
				),
				array(
					'name'     => __( 'Display Orders', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_display_orders_for_logged_in_user',
					'std'      => '',
					'type'     => 'checkbox',
					'desc'     => __( 'Display orders for logged in user', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Check this box to display orders for the logged in user only.', 'woocommerce-point-of-sale' ),
					'default'  => 'yes',
					'autoload' => true,
				),
				array(
					'name'     => __( 'Fetch Orders ', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Select the order statuses of loaded orders when using the register.', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_fetch_order_statuses',
					'class'    => 'wc-enhanced-select',
					'type'     => 'multiselect',
					'options'  => apply_filters( 'wc_pos_fetch_order_statuses', $order_statuses ),
					'default'  => array( 'pending', 'on-hold' ),
				),
				array(
					'name'     => __( 'Website Orders ', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_load_website_orders',
					'std'      => '',
					'type'     => 'checkbox',
					'desc'     => __( 'Load website orders', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Loads orders placed through the web store.', 'woocommerce-point-of-sale' ),
					'default'  => 'no',
					'autoload' => true,
				),
				array(
					'type' => 'sectionend',
					'id'   => 'orders_options',
				),
			)
		);

		return apply_filters( 'wc_pos_get_settings_' . $this->id, $settings, $current_section );
	}

	/**
	 * Output the settings.
	 */
	public function output() {
		$settings = $this->get_settings();
		WC_POS_Admin_Settings::output_fields( $settings );
	}

	/**
	 * Save settings.
	 */
	public function save() {
		$settings = $this->get_settings();
		WC_POS_Admin_Settings::save_fields( $settings );
	}
}

return new WC_POS_Admin_Settings_Orders();
