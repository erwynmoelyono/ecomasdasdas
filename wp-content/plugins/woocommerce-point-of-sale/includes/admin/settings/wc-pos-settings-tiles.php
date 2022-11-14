<?php
/**
 * Point of Sale Tiles Settings
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Admin/Settings
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Admin_Settings_Tiles', false ) ) {
	return new WC_POS_Admin_Settings_Tiles();
}

/**
 * WC_POS_Admin_Settings_Tiles.
 */
class WC_POS_Admin_Settings_Tiles extends WC_POS_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'tiles';
		$this->label = __( 'Tiles', 'woocommerce-point-of-sale' );

		parent::__construct();
	}

	/**
	 * Get sections.
	 *
	 * @return array
	 */
	public function get_sections() {
		$sections = array(
			''                    => __( 'Tiles', 'woocommerce-point-of-sale' ),
			'unit-of-measurement' => __( 'Units of Measurement', 'woocommerce-point-of-sale' ),
		);

		return apply_filters( 'wc_pos_get_sections_' . $this->id, $sections );
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {
		global $woocommerce, $current_section;

		if ( 'unit-of-measurement' === $current_section ) {
			return apply_filters(
				'wc_pos_register_tiles_unit_of_measurement_settings',
				array(

					array(
						'title' => __( 'Unit of Measurement Options', 'woocommerce-point-of-sale' ),
						'type'  => 'title',
						'id'    => 'uom_options',
					),
					array(
						'title'    => __( 'Units of Measurement', 'woocommerce-point-of-sale' ),
						'desc'     => __( 'Enable decimal stock counts and change of unit of measurement.', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Allows you to sell your stock in decimal quantities and set the default unit of measurement of stock values. Useful for those who want to sell weight or linear based products.', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_decimal_quantities',
						'default'  => 'no',
						'type'     => 'checkbox',
					),
					array(
						'title'    => __( 'Embedded Barcodes', 'woocommerce-point-of-sale' ),
						'desc'     => __( 'Enable the use of price and weight embedded barcodes', 'woocommerce-point-of-sale' ),
						'desc_tip' => __( 'Price or weight-based barcodes can be scanned from the register. Supported formats are EAN-13 and UPC-A.', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_enable_weight_embedded_barcodes',
						'default'  => 'no',
						'type'     => 'checkbox',
					),
					array(
						'type' => 'sectionend',
						'id'   => 'tile_options',
					),
					array(
						'title' => __( 'Universal Product Code', 'woocommerce-point-of-sale' ),
						/* translators: %1$s code tag %2$s closing code tag */
						'desc'  => sprintf( __( 'Adjust how the scanned UPC-A barcodes are processed before adding to cart. UPC-A barcodes follow the pattern %1$s2IIIIICVVVVC%2$s, where %1$sI%2$s is the product identifier, %1$sC%2$s are check digits and %1$sV%2$s is the value of the barcode.', 'woocommerce-point-of-sale' ), '<code>', '</code>' ),
						'type'  => 'title',
						'id'    => 'upca_options',
					),
					array(
						'name'     => __( 'Middle Check Digit', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_upca_disable_middle_check_digit',
						'type'     => 'checkbox',
						'desc'     => __( 'Disable middle check digit', 'woocommerce-point-of-sale' ),
						/* translators: %1$s code tag %2$s closing code tag */
						'desc_tip' => sprintf( __( 'Replaces the middle check digit %1$sC%2$s for price or quantity value %1$sV%2$s of the barcode.', 'woocommerce-point-of-sale' ), '<code>', '</code>' ),
						'default'  => 'no',
						'autoload' => true,
					),
					array(
						'title'   => __( 'Barcode Type', 'woocommerce-point-of-sale' ),
						/* translators: %1$s code tag %2$s closing code tag */
						'desc'    => sprintf( __( 'Choose what the value %1$sV%2$s represents i.e. price or weight.', 'woocommerce-point-of-sale' ), '<code>', '</code>' ),
						'id'      => 'wc_pos_upca_type',
						'default' => 'price',
						'type'    => 'select',
						'options' => array(
							'price'  => 'Price',
							'weight' => 'Weight',
						),
					),
					array(
						'title'    => __( 'Multiplier', 'woocommerce-point-of-sale' ),
						/* translators: %1$s code tag %2$s closing code tag */
						'desc'     => sprintf( __( 'Choose how the value %1$sV%2$s is calculated.', 'woocommerce-point-of-sale' ), '<code>', '</code>' ),
						'desc_tip' => __( 'E.g. a multiplier of 10 means that the embdded value will be divided by 10 before adding to cart.', 'woocommerce-point-of-sale' ),
						'id'       => 'wc_pos_upca_multiplier',
						'default'  => '100',
						'type'     => 'select',
						'options'  => array(
							1   => '1',
							10  => '10',
							100 => '100',
						),
					),
					array(
						'type' => 'sectionend',
						'id'   => 'upca_options',
					),
				)
			);
		}

		return apply_filters(
			'wc_pos_register_tiles_settings',
			array(

				array(
					'title' => __( 'Tile Options', 'woocommerce-point-of-sale' ),
					'desc'  => __( 'The following options affect how the tiles appear on the product grid.', 'woocommerce-point-of-sale' ),
					'type'  => 'title',
					'id'    => 'tile_options',
				),
				array(
					'title'    => __( 'Default Tile Sorting', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'This controls the default sort order of the tile.', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_default_tile_orderby',
					'class'    => 'wc-enhanced-select',
					'css'      => 'min-width:300px;',
					'default'  => 'menu_order',
					'type'     => 'select',
					'options'  => apply_filters(
						'woocommerce_default_catalog_orderby_options',
						array(
							'menu_order' => __( 'Default sorting (custom ordering + name)', 'woocommerce-point-of-sale' ),
							'popularity' => __( 'Popularity (sales)', 'woocommerce-point-of-sale' ),
							'rating'     => __( 'Average Rating', 'woocommerce-point-of-sale' ),
							'date'       => __( 'Sort by most recent', 'woocommerce-point-of-sale' ),
							'price'      => __( 'Sort by price (asc)', 'woocommerce-point-of-sale' ),
							'price-desc' => __( 'Sort by price (desc)', 'woocommerce-point-of-sale' ),
							'title-asc'  => __( 'Name (asc)', 'woocommerce-point-of-sale' ),
						)
					),
				),
				array(
					'title'   => __( 'Image Resolution', 'woocommerce-point-of-sale' ),
					'desc'    => __( 'Select resolution for grid tiles.', 'woocommerce-point-of-sale' ),
					'id'      => 'wc_pos_image_resolution',
					'default' => 'thumbnail',
					'class'   => 'wc-enhanced-select',
					'type'    => 'select',
					'options' => array(
						'thumbnail' => __( 'Thumbnail', 'woocommerce-point-of-sale' ),
						'medium'    => __( 'Medium', 'woocommerce-point-of-sale' ),
						'large'     => __( 'Large', 'woocommerce-point-of-sale' ),
						'full'      => __( 'Full Size', 'woocommerce-point-of-sale' ),
					),
				),
				array(
					'name'     => __( 'Product Previews', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_show_product_preview',
					'type'     => 'checkbox',
					'desc'     => __( 'Enable product preview panels', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Shows a button on each tile for cashiers to view full product details.', 'woocommerce-point-of-sale' ),
					'default'  => 'no',
					'autoload' => true,
				),
				array(
					'name'     => __( 'Out of Stock', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_show_out_of_stock_products',
					'type'     => 'checkbox',
					'desc'     => __( 'Show out of stock products', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Display out of stock products in the product grid.', 'woocommerce-point-of-sale' ),
					'default'  => 'no',
					'autoload' => true,
				),
				array(
					'title'         => __( 'Product Visiblity', 'woocommerce-point-of-sale' ),
					'desc'          => __( 'Enable product visibility control', 'woocommerce-point-of-sale' ),
					'desc_tip'      => __( 'Allows you to show and hide products from either the POS, web or both shops.', 'woocommerce-point-of-sale' ),
					'id'            => 'wc_pos_visibility',
					'default'       => 'no',
					'type'          => 'checkbox',
					'checkboxgroup' => 'start',
				),
				array(
					'title'    => __( 'Add to Cart Behaviour', 'woocommerce-point-of-sale' ),
					'desc'     => __( 'Control what happens to the grid after a product is added to the basket.', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'Allows shop managers to choose the behaviour of grids when adding products to the cart.', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_after_add_to_cart_behavior',
					'default'  => 'home',
					'class'    => 'wc-enhanced-select',
					'type'     => 'select',
					'options'  => array(
						'product'  => __( 'Stay on the selected product', 'woocommerce-point-of-sale' ),
						'category' => __( 'Return to selected category', 'woocommerce-point-of-sale' ),
						'home'     => __( 'Return to home grid', 'woocommerce-point-of-sale' ),
					),
				),
				array(
					'title'    => __( 'Publish Product', 'woocommerce-point-of-sale' ),
					'desc'     => __( 'Toggle publishing of product by default', 'woocommerce-point-of-sale' ),
					'desc_tip' => __( 'User roles and capabilities are required to publish products.', 'woocommerce-point-of-sale' ),
					'id'       => 'wc_pos_publish_product_default',
					'default'  => 'yes',
					'type'     => 'checkbox',
				),
				array(
					'type' => 'sectionend',
					'id'   => 'tile_options',
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

return new WC_POS_Admin_Settings_Tiles();
