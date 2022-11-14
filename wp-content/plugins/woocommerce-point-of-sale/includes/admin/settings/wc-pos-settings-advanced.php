<?php
/**
 * Point of Sale Advanced Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_Advanced', false ) ) {
	return new WC_POS_Admin_Settings_Advanced();
}

/**
 * WC_POS_Admin_Settings_Advanced.
 */
class WC_POS_Admin_Settings_Advanced extends WC_POS_Settings_Page {
	private $force_updates = array(
		'3.2.1'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-3.2.1.php',
		'3.2.2.0'  => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-3.2.2.0.php',
		'4.0.0'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-4.0.0.php',
		'4.1.9'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-4.1.9.php',
		'4.1.9.10' => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-4.1.9.10.php',
		'4.3.6'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-4.3.6.php',
		'5.0.0'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.0.0.php',
		'5.1.3'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.1.3.php',
		'5.2.0'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.0.php',
		'5.2.2'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.2.php',
		'5.2.4'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.4.php',
		'5.2.5'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.5.php',
		'5.2.7'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.7.php',
		'5.2.8'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.8.php',
		'5.2.9'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.2.9.php',
		'5.3.0'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.3.0.php',
		'5.3.2'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.3.2.php',
		'5.3.3'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.3.3.php',
		'5.3.4'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.3.4.php',
		'5.3.5'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.3.5.php',
		'5.3.7'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.3.7.php',
		'5.3.6'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.3.6.php',
		'5.5.0'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.5.0.php',
		'5.5.2'    => WC_POS_ABSPATH . '/includes/updates/wc_pos-update-5.5.2.php',
	);

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'advanced';
		$this->label = __( 'Advanced', 'woocommerce-point-of-sale' );

		parent::__construct();

		add_action( 'woocommerce_admin_field_database_options', array( $this, 'output_database_options' ) );
	}

	/**
	 * Get settings array.
	 *
	 * @return array
	 */
	public function get_settings() {
		$settings = apply_filters(
			'wc_pos_advanced_settings',
			array(
				array(
					'title' => __( 'Advanced Options', 'woocommerce-point-of-sale' ),
					'type'  => 'title',
					'id'    => 'advanced_options',
				),
				array(
					'title'             => __( 'Maximum Concurrent Requests', 'woocommerce-point-of-sale' ),
					'desc'              => __( 'Set the maximum number of API requests to the same endpoint', 'woocommerce-point-of-sale' ),
					'desc_tip'          => __( 'Use the maximum value for a faster loading experience.', 'woocommerce-point-of-sale' ),
					'id'                => 'wc_pos_max_concurrent_requests',
					'default'           => '30',
					'type'              => 'number',
					'custom_attributes' => array(
						'min'  => '1',
						'max'  => '30',
						'step' => '1',
					),
				),
				array(
					'type' => 'sectionend',
					'id'   => 'advanced_options',
				),
				array(
					'title' => __( 'Database', 'woocommerce-point-of-sale' ),
					'type'  => 'title',
					'id'    => 'database_options',
				),
				array( 'type' => 'database_options' ),
				array(
					'type' => 'sectionend',
					'id'   => 'database_options',
				),
			)
		);

		return apply_filters( 'wc_pos_get_settings_' . $this->id, $settings );
	}

	/**
	 * Save settings.
	 */
	public function save() {
		$settings = $this->get_settings();
		WC_POS_Admin_Settings::save_fields( $settings );
	}

	/**
	 * Prints out database options.
	 *
	 * @todo Move to a view file.
	 */
	public function output_database_options() {
		include dirname( __FILE__ ) . '/views/html-admin-page-advanced-database.php';
	}
}

return new WC_POS_Admin_Settings_Advanced();
