<?php
/**
 * Point of Sale Register Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_Register', false ) ) {
	return new WC_POS_Admin_Settings_Register();
}

/**
 * WC_POS_Admin_Settings_Register.
 */
class WC_POS_Admin_Settings_Register extends WC_POS_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'register';
		$this->label = __( 'Register', 'woocommerce-point-of-sale' );

		parent::__construct();

		add_action( 'woocommerce_admin_field_cash_denominations', array( $this, 'output_cash_denominations' ) );
		add_filter( 'wc_pos_scanning_fields', array( $this, 'filter_scanning_fields' ) );
	}

	/**
	 * Get sections.
	 *
	 * @return array
	 */
	public function get_sections() {
		$sections = array(
			''                => __( 'Register', 'woocommerce-point-of-sale' ),
			'cash-management' => __( 'Cash Management', 'woocommerce-point-of-sale' ),
		);

		return apply_filters( 'wc_pos_get_sections_' . $this->id, $sections );
	}

	/**
	 * Get settings array.
	 *
	 * @return array
	 */
	public function get_settings() {
		global $current_section;
		$order_statuses = wc_pos_get_order_statuses_no_prefix();

		if ( 'cash-management' === $current_section ) {
			$settings = apply_filters(
				'wc_pos_cash_management_settings',
				array(
					array(
						'title' => __( 'Cash Management Options', 'woocommerce-point-of-sale' ),
						'type'  => 'title',
						'desc'  => __( 'The following options affect the settings that are applied when using the cash management function.', 'woocommerce-point-of-sale' ),
						'id'    => 'cash_management_options',
					),
					array(
						'name'     => __( 'Order Status Criteria ', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Select the order statuses to be included to the cash management.', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_cash_management_order_statuses',
						'class'    => 'wc-enhanced-select',
						'type'     => 'multiselect',
						'options'  => apply_filters( 'wc_pos_cash_management_order_status', $order_statuses ),
						'default'  => array( 'processing' ),
					),
					array(
						'title'         => __( 'Currency Rounding', 'woocommerce-point-of-sale' ),
						'desc'          => __( 'Enable currency rounding', 'woocommerce-point-of-sale' ),
						'desc_tip'      => __( 'Rounds the total to the nearest value defined below. Used by some countries where not all denominations are available.', 'woocommerce-point-of-sale' ),
						'id'            => 'wc_pos_enable_currency_rounding',
						'default'       => 'no',
						'type'          => 'checkbox',
						'checkboxgroup' => 'start',
					),
					array(
						'title'    => __( 'Rounding Value', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Select the rounding value which you want the register to round nearest to.', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_currency_rounding_value',
						'default'  => 'no',
						'type'     => 'select',
						'class'    => 'wc-enhanced-select',
						'options'  => apply_filters(
							'wc_pos_currency_rounding_values',
							array(
								'0.01' => __( '0.01', 'woocommerce-point-of-sale' ),
								'0.05' => __( '0.05', 'woocommerce-point-of-sale' ),
								'0.10' => __( '0.10', 'woocommerce-point-of-sale' ),
								'0.50' => __( '0.50', 'woocommerce-point-of-sale' ),
								'1.00' => __( '1.00', 'woocommerce-point-of-sale' ),
								'5.00' => __( '5.00', 'woocommerce-point-of-sale' ),
							)
						),
					),
					array(
						'type' => 'sectionend',
						'id'   => 'cash_management_options',
					),
					array( 'type' => 'cash_denominations' ),
				)
			);
		} else {
			$attribute_taxonomies = wc_get_attribute_taxonomies();
			$product_attributes   = array();
			if ( ! empty( $attribute_taxonomies ) ) {
				foreach ( $attribute_taxonomies as $tax ) {
					$attribute_taxonomy_name = wc_attribute_taxonomy_name( $tax->attribute_name );
					$label                   = $tax->attribute_label ? $tax->attribute_label : $tax->attribute_name;

					$product_attributes[ $attribute_taxonomy_name ] = $label;
				}
			}

			// The already added custom attributes.
			foreach ( get_option( 'wc_pos_display_product_attributes', array() ) as $option ) {
				if ( ! isset( $product_attributes[ $option ] ) ) {
					$product_attributes[ $option ] = $option;
				}
			}

			return apply_filters(
				'wc_pos_register_settings',
				array(
					array(
						'title' => __( 'Register Options', 'woocommerce-point-of-sale' ),
						'type'  => 'title',
						'desc'  => __( 'The following options affect the settings that are applied when loading all registers.', 'woocommerce-point-of-sale' ),
						'id'    => 'register_options',
					),
					array(
						'name'              => __( 'Keypad Presets', 'woocommerce-point-of-sale' ),
						'desc_tip'          => __( 'Define the preset keys that appear when applying discounts in the register.', 'woocommerce-point-of-sale' ),
						'id'                => 'wc_pos_discount_presets',
						'class'             => 'wc-enhanced-select',
						'type'              => 'multiselect',
						'options'           => apply_filters(
							'wc_pos_discount_presets',
							array(
								'5'   => __( '5%', 'woocommerce-point-of-sale' ),
								'10'  => __( '10%', 'woocommerce-point-of-sale' ),
								'15'  => __( '15%', 'woocommerce-point-of-sale' ),
								'20'  => __( '20%', 'woocommerce-point-of-sale' ),
								'25'  => __( '25%', 'woocommerce-point-of-sale' ),
								'30'  => __( '30%', 'woocommerce-point-of-sale' ),
								'35'  => __( '35%', 'woocommerce-point-of-sale' ),
								'40'  => __( '40%', 'woocommerce-point-of-sale' ),
								'45'  => __( '45%', 'woocommerce-point-of-sale' ),
								'50'  => __( '50%', 'woocommerce-point-of-sale' ),
								'55'  => __( '55%', 'woocommerce-point-of-sale' ),
								'60'  => __( '60%', 'woocommerce-point-of-sale' ),
								'65'  => __( '65%', 'woocommerce-point-of-sale' ),
								'70'  => __( '70%', 'woocommerce-point-of-sale' ),
								'75'  => __( '75%', 'woocommerce-point-of-sale' ),
								'80'  => __( '80%', 'woocommerce-point-of-sale' ),
								'85'  => __( '85%', 'woocommerce-point-of-sale' ),
								'90'  => __( '90%', 'woocommerce-point-of-sale' ),
								'95'  => __( '95%', 'woocommerce-point-of-sale' ),
								'100' => __( '100%', 'woocommerce-point-of-sale' ),
							)
						),
						'default'           => array( '5', '10', '15', '20' ),
						'custom_attributes' => array( 'data-maximum-selection-length' => 4 ),
					),
					array(
						'title'    => __( 'Keyboard Shortcuts', 'woocommerce-point-of-sale' ),
						'desc'     => __( 'Enable keyboard shortcuts', 'woocommerce-point-of-sale' ),
						// translators: 1: opening anchor tag for the shortcuts link 2: closing anchor tag
						'desc_tip' => sprintf( __( 'Allows you to use keyboard shortcuts to execute popular and frequent actions. Click %1$shere%2$s for the list of keyboard shortcuts.', 'woocommerce-point-of-sale' ), '<a href="http://actualityextensions.com/woocommerce-point-of-sale/keyboard-shortcuts/" target="_blank">', '</a>' ),
						'id'       => 'wc_pos_keyboard_shortcuts',
						'default'  => 'no',
						'type'     => 'checkbox',
					),
					array(
						'name'              => __( 'Scanning Fields', 'woocommerce-point-of-sale' ),
						'desc_tip'          => __( 'Control what fields are used when using the scanner on the register. You can select multiple fields. Default is SKU.', 'woocommerce-point-of-sale' ),
						'id'                => 'wc_pos_scanning_fields',
						'class'             => 'wc-enhanced-select',
						'type'              => 'multiselect',
						'options'           => apply_filters(
							'wc_pos_scanning_fields',
							array( '_sku' => __( 'WooCommerce SKU', 'woocommerce-point-of-sale' ) )
						),
						'default'           => array( '_sku' ),
						'custom_attributes' => array( 'data-tags' => 'true' ),
					),

					array(
						'name'              => __( 'Search Includes', 'woocommerce-point-of-sale' ),
						'desc_tip'          => __( 'Select the fields to be used for the search.', 'woocommerce-point-of-sale' ),
						'id'                => 'wc_pos_search_includes',
						'class'             => 'wc-enhanced-select',
						'type'              => 'multiselect',
						'options'           => apply_filters(
							'wc_pos_search_includes',
							array(
								'title'      => __( 'Product Title', 'woocommerce-point-of-sale' ),
								'sku'        => __( 'Product SKU', 'woocommerce-point-of-sale' ),
								'content'    => __( 'Product Description', 'woocommerce-point-of-sale' ),
								'excerpt'    => __( 'Product Short Description', 'woocommerce-point-of-sale' ),
								'attributes' => __( 'Product Attributes', 'woocommerce-point-of-sale' ),
							)
						),
						'default'           => array( 'title', 'sku' ),
						'custom_attributes' => array( 'data-tags' => 'true' ),
					),
					array(
						'name'              => __( 'Display Product Attributes', 'woocommerce-point-of-sale' ),
						'desc'              => __( 'Select product attributes to display in the search dropdown.', 'woocommerce-point-of-sale' ),
						'desc_tip'          => __( 'Select pre-defined attributes or add custom ones.', 'woocommerce-point-of-sale' ),
						'id'                => 'wc_pos_display_product_attributes',
						'class'             => 'wc-enhanced-select',
						'type'              => 'multiselect',
						'options'           => apply_filters( 'wc_pos_display_product_attributes', $product_attributes ),
						'default'           => array(),
						'custom_attributes' => array( 'data-tags' => 'true' ),
					),
					array(
						'name'     => __( 'Required Product Fields', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_custom_product_required_fields',
						'type'     => 'multiselect',
						'class'    => 'wc-enhanced-select-required-fields',
						'desc_tip' => __( 'Select the fields that are required when creating a custom product through the register.', 'woocommerce-point-of-sale' ),
						'options'  => array(
							'sku' => __( 'SKU', 'woocommerce-point-of-sale' ),
						),
						'default'  => array(),
					),
					array(
						'title'         => __( 'Force Logout', 'woocommerce-point-of-sale' ),
						'desc'          => __( 'Enable taking over of registers', 'woocommerce-point-of-sale' ),
						'desc_tip'      => __( 'Allows shop managers to take over an already opened register.', 'woocommerce-point-of-sale' ),
						'id'            => 'wc_pos_force_logout',
						'default'       => 'no',
						'type'          => 'checkbox',
						'checkboxgroup' => 'start',
					),
					array(
						'title'    => __( 'Additional Payment Methods', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Select the number of Chip & PIN Gateways to show in WooCommerce > Payments.', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_number_chip_and_pin_gateways',
						'default'  => 'no',
						'type'     => 'select',
						'options'  => apply_filters(
							'wc_pos_number_chip_and_pin_gateways',
							array(
								1  => '1',
								2  => '2',
								3  => '3',
								4  => '4',
								5  => '5',
								6  => '6',
								7  => '7',
								8  => '8',
								9  => '9',
								10 => '10',
								11 => '11',
								12 => '12',
								13 => '13',
								14 => '14',
								15 => '15',
								16 => '16',
								17 => '17',
								18 => '18',
								19 => '19',
								20 => '20',
							)
						),
					),
					array(
						'title'         => __( 'Hide Tender Suggestions', 'woocommerce-point-of-sale' ),
						'desc'          => __( 'Hide tender suggestions', 'woocommerce-point-of-sale' ),
						'desc_tip'      => __( 'Check this to hide the suggested cash tender amounts.', 'woocommerce-point-of-sale' ),
						'id'            => 'wc_pos_hide_tender_suggestions',
						'default'       => 'no',
						'type'          => 'checkbox',
						'checkboxgroup' => 'start',
					),
					array(
						'type' => 'sectionend',
						'id'   => 'register_options',
					),
					array(
						'title' => __( 'Theme', 'woocommerce-point-of-sale' ),
						'type'  => 'title',
						'desc'  => __( 'The following options affect the layout of the register.', 'woocommerce-point-of-sale' ),
						'id'    => 'theme',
					),
					array(
						'title'    => __( 'Logo', 'woocommerce-point-of-sale' ),
						'desc'     => __( 'Register logo image.', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Upload an image to replace the default WooCommerce logo.', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_theme_logo',
						'type'     => 'media_upload',
					),
					array(
						'name'              => __( 'Primary Color', 'woocommerce-point-of-sale' ),
						'desc_tip'          => __( 'The primary color of the theme.', 'woocommerce-point-of-sale' ),
						'id'                => 'wc_pos_theme_primary_color',
						'class'             => 'color-pick',
						'custom_attributes' => array( 'data-default-color' => '#7f54b3' ),
						'type'              => 'text',
						'default'           => '#7f54b3',
					),
					array(
						'type' => 'sectionend',
						'id'   => 'theme',
					),
				)
			);
		}

		return apply_filters( 'wc_pos_get_settings_' . $this->id, $settings, $current_section );
	}

	/**
	 * Filter scanning fields.
	 *
	 * @param $fields Fields.
	 */
	public function filter_scanning_fields( $fields ) {
		global $wpdb;

		$product_meta_keys = get_transient( 'wc_pos_product_meta_keys' );

		if ( ! $product_meta_keys ) {
			// Get used meta keys from the database.
			$result            = $wpdb->get_results( "SELECT DISTINCT pm.meta_key FROM {$wpdb->postmeta} pm LEFT JOIN {$wpdb->posts} p ON pm.post_id = p.ID WHERE p.post_type = 'product'" );
			$product_meta_keys = array_map(
				function( $item ) {
					return $item->meta_key;
				},
				$result
			);
			set_transient( 'wc_pos_product_meta_keys', $product_meta_keys, 24 * HOUR_IN_SECONDS );
		}

		if ( $product_meta_keys ) {
			foreach ( $product_meta_keys as $key ) {
				// Filter known meta keys.
				switch ( $key ) {
					case 'total_sales':
					case '_edit_last':
					case '_edit_lock':
					case '_tax_status':
					case '_tax_class':
					case '_manage_stock':
					case '_backorders':
					case '_sold_individually':
					case '_virtual':
					case '_downloadable':
					case '_download_limit':
					case '_download_expiry':
					case '_wc_average_rating':
					case '_wc_review_count':
					case '_product_version':
					case '_wpcom_is_markdown':
					case '_wp_old_slug':
					case '_product_image_gallery':
					case '_thumbnail_id':
					case '_product_attributes':
					case '_price':
					case '_regular_price':
					case '_sale_price':
					case '_downloadable_files':
					case '_children':
					case '_product_url':
					case '_button_text':
					case '_stock':
					case '_stock_status':
					case '_variation_description':
					case '_sku':
					case '_pos_visibility':
					case '_wpm_gtin_code_label':
						continue 2;
					case 'hwp_product_gtin':
					case '_wpm_gtin_code':
						$label = __( 'GTIN', 'woocommerce-point-of-sale' );
						break;
					default:
						$label = $key;
				}

				$fields[ $key ] = $label;
			}
		}

		return $fields;
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
		if ( empty( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( wc_clean( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'wc-pos-settings' ) ) {
			return;
		}

		global $current_section;

		if ( 'cash-management' === $current_section ) {
			$denominations = ( isset( $_POST['wc_pos_cash_denominations'] ) ) ? array_map( 'wc_clean', (array) $_POST['wc_pos_cash_denominations'] ) : array();

			update_option( 'wc_pos_cash_denominations', array_values( $denominations ) );
		}

		$settings = $this->get_settings();
		WC_POS_Admin_Settings::save_fields( $settings );
	}

	public function output_cash_denominations( $field ) {
		$denominations = get_option( 'wc_pos_cash_denominations', array() );

		include_once dirname( __FILE__ ) . '/views/html-admin-page-register-denominations.php';
	}
}

return new WC_POS_Admin_Settings_Register();
