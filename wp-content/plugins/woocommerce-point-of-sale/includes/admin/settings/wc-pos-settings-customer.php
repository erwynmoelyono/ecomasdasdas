<?php
/**
 * Point of Sale Customer Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_Customer', false ) ) {
	return new WC_POS_Admin_Settings_Customer();
}

/**
 * WC_POS_Admin_Settings_Customer.
 */
class WC_POS_Admin_Settings_Customer extends WC_POS_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'customer';
		$this->label = __( 'Customer', 'woocommerce-point-of-sale' );

		parent::__construct();
	}

	/**
	 * Get sections.
	 *
	 * @return array
	 */
	public function get_sections() {
		$sections = array(
			''                => __( 'Customer', 'woocommerce-point-of-sale' ),
			'payment_methods' => __( 'End of Sale', 'woocommerce-point-of-sale' ),
		);

		return apply_filters( 'woocommerce_sections_' . $this->id, $sections );
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings( $current_section = '' ) {
		global $woocommerce;
		if ( 'payment_methods' === $current_section ) {
			return apply_filters(
				'woocommerce_point_of_sale_payment_methods_settings_fields',
				array(
					array(
						'title' => __( 'End of Sale Actions', 'woocommerce-point-of-sale' ),
						'desc'  => __( 'The following options affect the actions presented at the end of the checkout process.', 'woocommerce-point-of-sale' ),
						'type'  => 'title',
						'id'    => 'wc_settings_customer',
					),

					array(
						'title'         => __( 'Signature Capture', 'woocommerce-point-of-sale' ),
						'desc'          => __( 'Enable signature capture', 'woocommerce-point-of-sale' ),
						'desc_tip'      => __( 'Presents a modal window to capture the signature of user or customer.', 'woocommerce-point-of-sale' ),
						'id'            => 'wc_pos_signature',
						'default'       => 'no',
						'type'          => 'checkbox',
						'checkboxgroup' => 'start',
					),
					array(
						'title'         => __( 'Signature Required', 'woocommerce-point-of-sale' ),
						'desc'          => __( 'Enforce capturing of signature', 'woocommerce-point-of-sale' ),
						'desc_tip'      => __( 'Allows you to force user to enter signature before proceeding with register commands.', 'woocommerce-point-of-sale' ),
						'id'            => 'wc_pos_signature_required',
						'class'         => 'pos_signature',
						'default'       => 'no',
						'type'          => 'checkbox',
						'checkboxgroup' => 'start',
					),
					array(
						'title'    => __( 'Signature Commands', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Choose which commands would you like the signature panel to be shown for.', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_signature_required_on',
						'class'    => 'wc-enhanced-select pos_signature',
						'default'  => 'pay',
						'type'     => 'multiselect',
						'options'  => array(
							'pay'  => __( 'Pay', 'woocommerce-point-of-sale' ),
							'save' => __( 'Hold', 'woocommerce-point-of-sale' ),
						),
					),
					array(
						'type' => 'sectionend',
						'id'   => 'wc_settings_customer',
					),

				)
			);
		} else {
			return apply_filters(
				'woocommerce_point_of_sale_general_settings_fields',
				array(
					array(
						'title' => __( 'Customer Options', 'woocommerce-point-of-sale' ),
						'desc'  => __( 'The following options affect the account creation process when creating customers.', 'woocommerce-point-of-sale' ),
						'type'  => 'title',
						'id'    => 'wc_settings_customer_end_of_sale',
					),
					array(
						'name'     => __( 'Cache Customers', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_cache_customers',
						'type'     => 'checkbox',
						'desc'     => __( 'Enable caching of customer data', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Check this box to load all customer data onto the register upon initialisation.', 'woocommerce-point-of-sale' ),
						'default'  => 'no',
						'autoload' => true,
					),
					array(
						'title'    => __( 'Default Country', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Sets the default country for shipping and customer accounts.', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_default_country',
						'css'      => 'min-width:350px;',
						'default'  => 'GB',
						'type'     => 'single_select_country',
					),
					array(
						'name'     => __( 'Guest Checkout', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_guest_checkout',
						'type'     => 'checkbox',
						'desc'     => __( 'Enable guest checkout', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Allows register cashiers to process and fulfil an order without choosing a customer.', 'woocommerce-point-of-sale' ),
						'default'  => 'yes',
						'autoload' => true,
					),
					array(
						'title'         => __( 'Customer Cards', 'woocommerce-point-of-sale' ),
						'desc'          => __( 'Enable customer cards', 'woocommerce-point-of-sale' ),
						'desc_tip'      => __( 'Allow the ability to scan customers cards to load their account instantly.', 'woocommerce-point-of-sale' ),
						'id'            => 'wc_pos_enable_user_card',
						'default'       => 'no',
						'type'          => 'checkbox',
						'checkboxgroup' => 'start',
					),
					array(
						'name'     => __( 'Required Fields', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_customer_create_required_fields',
						'type'     => 'multiselect',
						'class'    => 'wc-enhanced-select-required-fields',
						'desc_tip' => __( 'Select the fields that are required when creating a customer through the register.', 'woocommerce-point-of-sale' ),
						'options'  => array(
							'billing_first_name'  => __( 'Billing First Name', 'woocommerce-point-of-sale' ),
							'billing_last_name'   => __( 'Billing Last Name', 'woocommerce-point-of-sale' ),
							'billing_email'       => __( 'Billing Email', 'woocommerce-point-of-sale' ),
							'billing_company'     => __( 'Billing Company', 'woocommerce-point-of-sale' ),
							'billing_address_1'   => __( 'Billing Address 1', 'woocommerce-point-of-sale' ),
							'billing_address_2'   => __( 'Billing Address 2', 'woocommerce-point-of-sale' ),
							'billing_city'        => __( 'Billing City', 'woocommerce-point-of-sale' ),
							'billing_state'       => __( 'Billing State', 'woocommerce-point-of-sale' ),
							'billing_postcode'    => __( 'Billing Postcode', 'woocommerce-point-of-sale' ),
							'billing_country'     => __( 'Billing Country', 'woocommerce-point-of-sale' ),
							'billing_phone'       => __( 'Billing Phone', 'woocommerce-point-of-sale' ),
							'shipping_first_name' => __( 'Shipping First Name', 'woocommerce-point-of-sale' ),
							'shipping_last_name'  => __( 'Shipping Last Name', 'woocommerce-point-of-sale' ),
							'shipping_company'    => __( 'Shipping Company', 'woocommerce-point-of-sale' ),
							'shipping_address_1'  => __( 'Shipping Address 1', 'woocommerce-point-of-sale' ),
							'shipping_address_2'  => __( 'Shipping Address 2', 'woocommerce-point-of-sale' ),
							'shipping_city'       => __( 'Shipping City', 'woocommerce-point-of-sale' ),
							'shipping_state'      => __( 'Shipping State', 'woocommerce-point-of-sale' ),
							'shipping_postcode'   => __( 'Shipping Postcode', 'woocommerce-point-of-sale' ),
							'shipping_country'    => __( 'Shipping Country', 'woocommerce-point-of-sale' ),
						),
						'default'  => array(
							'billing_first_name',
							'billing_last_name',
							'billing_email',
							'billing_address_1',
							'billing_city',
							'billing_state',
							'billing_postcode',
							'billing_country',
							'billing_phone',
						),
					),
					array(
						'name'     => __( 'Optional Fields', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_hide_not_required_fields',
						'type'     => 'checkbox',
						'desc'     => __( 'Hide optional fields when adding customer', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Optional fields will not be shown to make capturing of customer data easier for the cashier.', 'woocommerce-point-of-sale' ),
						'default'  => 'no',
						'autoload' => true,
					),
					array(
						'title'         => __( 'Save Customer', 'woocommerce-point-of-sale' ),
						'desc'          => __( 'Toggle save customer by default', 'woocommerce-point-of-sale' ),
						'desc_tip'      => __( 'Check this to turn on the Save Customer toggle by default.', 'woocommerce-point-of-sale' ),
						'id'            => 'wc_pos_save_customer_default',
						'default'       => 'no',
						'type'          => 'checkbox',
						'checkboxgroup' => 'start',
					),
					array(
						'type' => 'sectionend',
						'id'   => 'wc_settings_customer_end_of_sale',
					),

				)
			); // End general settings
		}
	}

	/**
	 * Output the settings.
	 */
	public function output() {
		global $current_section;
		$settings = $this->get_settings( $current_section );

		WC_POS_Admin_Settings::output_fields( $settings );
	}

	/**
	 * Save settings
	 */
	public function save() {
		global $current_section;
		$settings = $this->get_settings( $current_section );
		WC_POS_Admin_Settings::save_fields( $settings );
	}

	/**
	 * Output sections.
	 */
	public function output_sections() {
		global $current_section;

		$sections = $this->get_sections();

		if ( empty( $sections ) || 1 === count( $sections ) ) {
			return;
		}

		echo '<ul class="subsubsub">';

		$array_keys = array_keys( $sections );

		foreach ( $sections as $id => $label ) {
			echo '<li><a href="' . esc_url( admin_url( 'admin.php?page=wc-pos-settings&tab=' . $this->id . '&section=' . sanitize_title( $id ) ) ) . '" class="' . esc_attr( $current_section === $id ? 'current' : '' ) . '">' . esc_html( $label ) . '</a> ' . ( end( $array_keys ) === $id ? '' : '|' ) . ' </li>';
		}

		echo '</ul><br class="clear" />';
	}
}

return new WC_POS_Admin_Settings_Customer();
