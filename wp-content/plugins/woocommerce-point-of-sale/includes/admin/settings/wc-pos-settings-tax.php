<?php
/**
 * Point of Sale Tax Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_Tax', false ) ) {
	return new WC_POS_Admin_Settings_Tax();
}

/**
 * WC_POS_Admin_Settings_Tax.
 */
class WC_POS_Admin_Settings_Tax extends WC_POS_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'tax';
		$this->label = __( 'Tax', 'woocommerce-point-of-sale' );

		parent::__construct();
	}

	/**
	 * Add this page to settings.
	 *
	 * @param array $pages Current pages.
	 * @return array|mixed
	 */
	public function add_settings_page( $pages ) {
		return 'yes' === get_option( 'woocommerce_calc_taxes' ) ? parent::add_settings_page( $pages ) : $pages;
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {
		global $woocommerce;

		$class = 'wc-enhanced-select';

		if ( 'yes' !== get_option( 'woocommerce_calc_taxes', 'no' ) ) {
			update_option( 'wc_pos_tax_calculation', 'disabled' );
			$class = 'disabled_select';
		}

		$tax_calculation = array(
			'name'     => __( 'Tax Calculation', 'woocommerce-point-of-sale' ),
			'id'       => 'wc_pos_tax_calculation',
			'css'      => '',
			'desc_tip' => __( 'Enables the calculation of tax using the WooCommerce configurations.', 'woocommerce-point-of-sale' ),
			'std'      => '',
			'type'     => 'select',
			'class'    => $class,
			'options'  => array(
				'enabled'  => __( 'Enabled (using WooCommerce configurations)', 'woocommerce-point-of-sale' ),
				'disabled' => __( 'Disabled', 'woocommerce-point-of-sale' ),
			),
		);
		$tax_based_on    = array(
			'name'     => __( 'Calculate Tax Based On', 'woocommerce-point-of-sale' ),
			'id'       => 'wc_pos_calculate_tax_based_on',
			'css'      => '',
			'std'      => '',
			'class'    => 'wc-enhanced-select',
			'desc_tip' => __( 'This option determines which address used to calculate tax.', 'woocommerce-point-of-sale' ),
			'type'     => 'select',
			'default'  => 'outlet',
			'options'  => array(
				'default'  => __( 'Default WooCommerce', 'woocommerce-point-of-sale' ),
				'shipping' => __( 'Customer shipping address', 'woocommerce-point-of-sale' ),
				'billing'  => __( 'Customer billing address', 'woocommerce-point-of-sale' ),
				'base'     => __( 'Shop base address', 'woocommerce-point-of-sale' ),
				'outlet'   => __( 'Outlet address', 'woocommerce-point-of-sale' ),
			),
		);

		return apply_filters(
			'woocommerce_point_of_sale_tax_settings_fields',
			array(

				array(
					'title' => __( 'Tax Options', 'woocommerce-point-of-sale' ),
					'type'  => 'title',
					'desc'  => '',
					'id'    => 'tax_options',
				),
				$tax_calculation,
				$tax_based_on,
				array(
					'type' => 'sectionend',
					'id'   => 'tax_options',
				),

			)
		);
	}

	/**
	 * Save settings.
	 */
	public function save() {
		$settings = $this->get_settings();

		WC_POS_Admin_Settings::save_fields( $settings );
	}

}

return new WC_POS_Admin_Settings_Tax();
