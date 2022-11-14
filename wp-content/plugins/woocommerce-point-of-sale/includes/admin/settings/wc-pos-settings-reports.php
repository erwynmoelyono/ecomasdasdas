<?php
/**
 * Point of Sale Reports Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_Reports', false ) ) {
	return new WC_POS_Admin_Settings_Reports();
}

/**
 * WC_POS_Admin_Settings_Reports.
 */
class WC_POS_Admin_Settings_Reports extends WC_POS_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'reports';
		$this->label = __( 'Reports', 'woocommerce-point-of-sale' );

		parent::__construct();
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {
		global $woocommerce;

		$order_statuses = wc_pos_get_order_statuses_no_prefix();

		return apply_filters(
			'woocommerce_point_of_sale_general_settings_fields',
			array(

				array(
					'title' => __( 'Report Options', 'woocommerce-point-of-sale' ),
					'desc'  => __( 'The following options affect the reports that are displayed when closing the register.', 'woocommerce-point-of-sale' ),
					'type'  => 'title',
					'id'    => 'wc_pos_settings_reports',
				),
				array(
					'title'         => __( 'Closing Reports', 'woocommerce-point-of-sale' ),
					'desc'          => __( 'Display end of day report when closing register', 'woocommerce-point-of-sale' ),
					'desc_tip'      => __( 'End of day report displayed with total sales when register closes.', 'woocommerce-point-of-sale' ),
					'id'            => 'wc_pos_display_end_of_day_report',
					'default'       => 'no',
					'type'          => 'checkbox',
					'checkboxgroup' => 'start',
				),
				array(
					'title'             => __( 'Report Orders', 'woocommerce-point-of-sale' ),
					'desc_tip'          => __( 'Select which order statuses to include in the final counts displayed in the end of day report.', 'woocommerce-point-of-sale' ),
					'id'                => 'wc_pos_end_of_day_order_statuses',
					'class'             => 'wc-enhanced-select',
					'type'              => 'multiselect',
					'custom_attributes' => array( 'required' => 'required' ),
					'default'           => 'processing',
					'options'           => $order_statuses,
				),
				array(
					'type' => 'sectionend',
					'id'   => 'wc_pos_settings_reports',
				),
				array(
					'title' => __( 'End of Day Email', 'woocommerce-point-of-sale' ),
					/* translators: %1$s opening anchor tag %2$s closing anchor tag */
					'desc'  => sprintf( __( 'The end of day email notification can be customized in %1$sWooCommerce &gt; Emails%2$s.', 'woocommerce-point-of-sale' ), '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=email&section=wc_pos_email_end_of_day_report' ) . '">', '</a>' ),
					'type'  => 'title',
					'id'    => 'end_of_day_email',
				),
				array(
					'type' => 'sectionend',
					'id'   => 'status_options',
				),
			)
		);
	}

	/**
	 * Save settings
	 */
	public function save() {
		$settings = $this->get_settings();

		WC_POS_Admin_Settings::save_fields( $settings );
	}
}

return new WC_POS_Admin_Settings_Reports();
