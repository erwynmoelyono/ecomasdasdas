<?php
/**
 * Point of Sale General Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_General', false ) ) {
	return new WC_POS_Admin_Settings_General();
}

/**
 * WC_POS_Admin_Settings_General.
 */
class WC_POS_Admin_Settings_General extends WC_POS_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'general';
		$this->label = __( 'General', 'woocommerce-point-of-sale' );

		parent::__construct();

		add_filter( 'wc_pos_fulfilled_order_statuses', array( $this, 'fulfilled_order_statuses' ) );
		add_filter( 'wc_pos_parked_order_statuses', array( $this, 'parked_order_statuses' ) );
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
			'wc_pos_general_settings',
			array(
				array(
					'title' => __( 'General Options', 'woocommerce-point-of-sale' ),
					'type'  => 'title',
					'desc'  => '',
					'id'    => 'general_options',
				),
				array(
					'name'     => __( 'Filters', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Select which filters appear on the Orders page.', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_order_filters',
					'class'    => 'wc-enhanced-select',
					'type'     => 'multiselect',
					'default'  => array( 'register' ),
					'options'  => array(
						'registers' => __( 'Registers', 'woocommerce-point-of-sale' ),
						'outlets'   => __( 'Outlets', 'woocommerce-point-of-sale' ),
					),
					'autoload' => true,
				),
				array(
					'title'         => __( 'Front End Access', 'woocommerce-point-of-sale' ),
					'desc'          => __( 'Enable front-end access to assigned registers', 'woocommerce-point-of-sale' ),
					'desc_tip'      => __( 'Allows cashiers to access their assigned registers from their My Account page.', 'woocommerce-point-of-sale' ),
					'id'            => 'wc_pos_enable_frontend_access',
					'default'       => 'no',
					'type'          => 'checkbox',
					'checkboxgroup' => 'start',
				),
				array(
					'title'    => __( 'Auto Logout', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Choose whether to automatically exit the register screen after inactive time. This will not close the register.', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_auto_logout',
					'default'  => '0',
					'class'    => 'wc-enhanced-select',
					'type'     => 'select',
					'options'  => array(
						0   => __( 'Disable', 'woocommerce-point-of-sale' ),
						1   => __( '1 min', 'woocommerce-point-of-sale' ),
						5   => __( '5 min', 'woocommerce-point-of-sale' ),
						15  => __( '15 min', 'woocommerce-point-of-sale' ),
						30  => __( '30 mins', 'woocommerce-point-of-sale' ),
						60  => __( '1 hour', 'woocommerce-point-of-sale' ),
						120 => __( '2 hours', 'woocommerce-point-of-sale' ),
					),
				),
				array(
					'name'     => __( 'Tax Number', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_tax_number',
					'desc_tip' => __( 'Enter the tax number which is applied to this particular register. This will be printed on receipts if tax number is enabled on receipt template.', 'woocommerce-point-of-sale' ),
					'type'     => 'text',
				),
				array(
					'name'     => __( 'Transitions and Effects', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_disable_transitions_effects',
					'std'      => '',
					'type'     => 'checkbox',
					'desc'     => __( 'Disable transitions and effects', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Check this box to disable transitions and effects when using the register.', 'woocommerce-point-of-sale' ),
					'default'  => 'no',
					'autoload' => true,
				),
				array(
					'name'     => __( 'Dining', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_enable_dining',
					'std'      => '',
					'type'     => 'checkbox',
					'desc'     => __( 'Enable dining option', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Check this box to enable dining when using the register.', 'woocommerce-point-of-sale' ),
					'default'  => 'no',
					'autoload' => true,
				),
				array(
					'name'     => __( 'Refresh Data on Load', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_refresh_on_load',
					'std'      => '',
					'type'     => 'checkbox',
					'desc'     => __( 'Refresh data on load', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Enable this checkbox to force reload POS data (products, customers, orders, etc.) on register reload.', 'woocommerce-point-of-sale' ),
					'default'  => 'yes',
					'autoload' => true,
				),
				array(
					'type' => 'sectionend',
					'id'   => 'general_options',
				),
				array(
					'title' => __( 'Status Options', 'woocommerce-point-of-sale' ),
					'desc'  => __( 'The following options affect the status of the orders when using the register.', 'woocommerce-point-of-sale' ),
					'type'  => 'title',
					'id'    => 'status_options',
				),
				array(
					'name'     => __( 'Fulfilled Orders', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Select the order status of completed orders when using the register.', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_fulfilled_order_status',
					'css'      => '',
					'std'      => '',
					'class'    => 'wc-enhanced-select',
					'type'     => 'select',
					'options'  => apply_filters( 'wc_pos_fulfilled_order_statuses', $order_statuses ),
					'default'  => 'processing',
				),
				array(
					'name'     => __( 'Parked Orders', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Select the order status of saved orders when using the register.', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_parked_order_status',
					'type'     => 'select',
					'class'    => 'wc-enhanced-select',
					'options'  => apply_filters( 'wc_pos_parked_order_statuses', $order_statuses ),
					'default'  => 'pending',
				),
				array(
					'type' => 'sectionend',
					'id'   => 'status_options',
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

	/**
	 * Filter the list of options for the wc_pos_fulfilled_order_status option.
	 *
	 * @since 5.0.0
	 *
	 * @param array $statuses Order statuses.
	 * @return array
	 */
	public function fulfilled_order_statuses( $statuses ) {
		unset( $statuses['on-hold'] );
		unset( $statuses['pending'] );
		unset( $statuses['cancelled'] );
		unset( $statuses['refunded'] );
		unset( $statuses['failed'] );

		return $statuses;
	}

	/**
	 * Filter the list of options for the wc_pos_parked_order_status option.
	 *
	 * @since 5.0.0
	 *
	 * @param array $statuses Order statuses.
	 * @return array
	 */
	public function parked_order_statuses( $statuses ) {
		$remove = array_unique(
			array_merge(
				array(
					'cancelled',
					'refunded',
					'failed',
					'completed',
					'processing',
				),
				wc_get_is_paid_statuses()
			)
		);

		foreach ( $remove as $status ) {
			unset( $statuses[ $status ] );
		}

		return $statuses;
	}
}

return new WC_POS_Admin_Settings_General();
