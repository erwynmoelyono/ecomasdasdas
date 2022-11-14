<?php
/**
 * Point of Sale Products Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_Products', false ) ) {
	return new WC_POS_Admin_Settings_Products();
}

/**
 * WC_POS_Admin_Settings_Products.
 */
class WC_POS_Admin_Settings_Products extends WC_POS_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'products';
		$this->label = __( 'Products', 'woocommerce-point-of-sale' );

		parent::__construct();
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {
		global $current_section;

		$settings = apply_filters(
			'wc_pos_products_settings',
			array(
				array(
					'title' => __( 'Products', 'woocommerce-point-of-sale' ),
					'type'  => 'title',
					'desc'  => '',
					'id'    => 'products_options',
				),
				array(
					'type' => 'sectionend',
					'id'   => 'products_options',
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

return new WC_POS_Admin_Settings_Products();
