<?php
/**
 * Techmarket Helper Class for WooCommerce
 */

class Techmarket_WC_Helper {

	public static function init() {

		add_action( 'wp_ajax_woocommerce_json_search_simple_products', 	array( 'Techmarket_WC_Helper', 'json_search_simple_products' ) );

		// Accessories Ajax Add to Cart for Variable Products
		add_action( 'wp_ajax_nopriv_techmarket_variable_add_to_cart',		array( 'Techmarket_WC_Helper', 'add_to_cart' ) );
		add_action( 'wp_ajax_techmarket_variable_add_to_cart',				array( 'Techmarket_WC_Helper', 'add_to_cart' ) );

		// Accessories Ajax Total Price Update
		add_action( 'wp_ajax_nopriv_techmarket_accessories_total_price',	array( 'Techmarket_WC_Helper', 'accessory_checked_total_price' ) );
		add_action( 'wp_ajax_techmarket_accessories_total_price',			array( 'Techmarket_WC_Helper', 'accessory_checked_total_price' ) );

		// Add options on General Tab
		add_action( 'woocommerce_product_options_general_product_data',	array( 'Techmarket_WC_Helper', 'product_options_general_product_data' ) );

		// Save options on General Tab
		add_action( 'woocommerce_process_product_meta_simple', 			array( 'Techmarket_WC_Helper', 'save_product_style_to_product_options' ) );
		add_action( 'woocommerce_process_product_meta_variable', 		array( 'Techmarket_WC_Helper', 'save_product_style_to_product_options' ) );
		add_action( 'woocommerce_process_product_meta_grouped', 		array( 'Techmarket_WC_Helper', 'save_product_style_to_product_options' ) );
		add_action( 'woocommerce_process_product_meta_external', 		array( 'Techmarket_WC_Helper', 'save_product_style_to_product_options' ) );

		// Add options on Inventry Tab
		// add_action( 'woocommerce_product_options_inventory_product_data',	array( 'Techmarket_WC_Helper', 'product_options_inventory_product_data' ) );

		// Save options on Inventry Tab
		// add_action( 'woocommerce_process_product_meta_simple', 			array( 'Techmarket_WC_Helper', 'save_total_stock_quantity_to_product_options' ) );
		// add_action( 'woocommerce_process_product_meta_variable', 		array( 'Techmarket_WC_Helper', 'save_total_stock_quantity_to_product_options' ) );
		// add_action( 'woocommerce_process_product_meta_grouped', 		array( 'Techmarket_WC_Helper', 'save_total_stock_quantity_to_product_options' ) );
		// add_action( 'woocommerce_process_product_meta_external', 		array( 'Techmarket_WC_Helper', 'save_total_stock_quantity_to_product_options' ) );

		// Add Accessories Tab
		add_action( 'woocommerce_product_write_panel_tabs',				array( 'Techmarket_WC_Helper', 'add_product_accessories_panel_tab' ) );
		add_action( 'woocommerce_product_data_panels',					array( 'Techmarket_WC_Helper', 'add_product_accessories_panel_data' ) );

		// Save Accessories Tab
		add_action( 'woocommerce_process_product_meta_simple',			array( 'Techmarket_WC_Helper',	'save_product_accessories_panel_data' ) );
		add_action( 'woocommerce_process_product_meta_variable',		array( 'Techmarket_WC_Helper',	'save_product_accessories_panel_data' ) );
		add_action( 'woocommerce_process_product_meta_grouped',			array( 'Techmarket_WC_Helper',	'save_product_accessories_panel_data' ) );
		add_action( 'woocommerce_process_product_meta_external',		array( 'Techmarket_WC_Helper',	'save_product_accessories_panel_data' ) );

		// Add Specification Tab
		add_action( 'woocommerce_product_write_panel_tabs',				array( 'Techmarket_WC_Helper', 'add_product_specification_panel_tab' ) );
		add_action( 'woocommerce_product_data_panels',					array( 'Techmarket_WC_Helper', 'add_product_specification_panel_data' ) );

		// Save Specification Tab
		add_action( 'woocommerce_process_product_meta_simple',			array( 'Techmarket_WC_Helper',	'save_product_specification_panel_data' ) );
		add_action( 'woocommerce_process_product_meta_variable',		array( 'Techmarket_WC_Helper',	'save_product_specification_panel_data' ) );
		add_action( 'woocommerce_process_product_meta_grouped',			array( 'Techmarket_WC_Helper',	'save_product_specification_panel_data' ) );
		add_action( 'woocommerce_process_product_meta_external',		array( 'Techmarket_WC_Helper',	'save_product_specification_panel_data' ) );

		add_filter( 'woocommerce_product_tabs',							array( __CLASS__, 'modify_product_tabs' ) );
		add_filter( 'comments_template',								array( __CLASS__, 'comments_template_loader' ), 20 );

	}

	/**
	 * Search for products and echo json.
	 *
	 * @param string $term (default: '')
	 * @param string $post_types (default: array('product'))
	 */
	public static function json_search_simple_products( $term = '', $include_variations = false ) {
		check_ajax_referer( 'search-products', 'security' );

		$term = wc_clean( empty( $term ) ? stripslashes( $_GET['term'] ) : $term );

		if ( empty( $term ) ) {
			wp_die();
		}

		$data_store = WC_Data_Store::load( 'product' );
		$ids        = $data_store->search_products( $term, '', (bool) $include_variations );

		if ( ! empty( $_GET['exclude'] ) ) {
			$ids = array_diff( $ids, (array) $_GET['exclude'] );
		}

		if ( ! empty( $_GET['include'] ) ) {
			$ids = array_intersect( $ids, (array) $_GET['include'] );
		}

		if ( ! empty( $_GET['limit'] ) ) {
			$ids = array_slice( $ids, 0, absint( $_GET['limit'] ) );
		}

		$product_objects = array_filter( array_map( 'wc_get_product', $ids ), 'wc_products_array_filter_editable' );
		$products        = array();

		foreach ( $product_objects as $product_object ) {
			if ( ! $product_object->is_type( 'simple' ) ) {
				continue;
			}
			$products[ $product_object->get_id() ] = rawurldecode( $product_object->get_formatted_name() );
		}

		wp_send_json( apply_filters( 'woocommerce_json_search_found_products', $products ) );
	}

	public static function product_options_general_product_data() {
		echo '<div class="options_group">';
			woocommerce_wp_select( array(
				'id' => '_product_layout',
				'label' => esc_html__( 'Product Layout', 'techmarket' ),
				'options' => array(
					''                    => esc_html__( 'Default', 'techmarket' ),
					'full-width'  	      => esc_html__( 'Full Width', 'techmarket' ),
					'left-sidebar'        => esc_html__( 'Left Sidebar', 'techmarket' ),
					'right-sidebar'       => esc_html__( 'Right Sidebar', 'techmarket' ),
				),
				'desc_tip' => true,
				'description' => esc_html__( 'Select product layout to display on product page.', 'techmarket' )
			) );
			woocommerce_wp_select( array(
				'id' => '_product_style',
				'label' => esc_html__( 'Product Style', 'techmarket' ),
				'options' => array(
					''         => esc_html__( 'Default', 'techmarket' ),
					'normal'   => esc_html__( 'Normal', 'techmarket' ),
					'extended' => esc_html__( 'Extended', 'techmarket' )
				),
				'desc_tip' => true,
				'description' => esc_html__( 'Select product style to display on product page. Extended will support only with fullwidth layout.', 'techmarket' )
			) );
			woocommerce_wp_textarea_input(  array(
				'id' => '_additional_info',
				'label' => esc_html__( 'Additional Info', 'techmarket' ),
				'desc_tip' => true,
				'description' => esc_html__( 'Enter additional information to display on product page.', 'techmarket' ),
			) );
		echo '</div>';
	}

	public static function save_product_style_to_product_options( $post_id ) {
		$product_layout = isset( $_POST['_product_layout'] ) ? wc_clean( $_POST['_product_layout'] ) : '' ;
		$product_style = isset( $_POST['_product_style'] ) ? wc_clean( $_POST['_product_style'] ) : '' ;
		$additional_info = isset( $_POST['_additional_info'] ) ? wp_kses_post( stripslashes( $_POST['_additional_info'] ) ) : '' ;
		update_post_meta( $post_id, '_product_layout', $product_layout );
		update_post_meta( $post_id, '_product_style', $product_style );
		update_post_meta( $post_id, '_additional_info', $additional_info );
	}

	public static function product_options_inventory_product_data() {
		echo '<div class="options_group">';
			woocommerce_wp_text_input(  array(
				'id' => '_total_stock_quantity',
				'label' => esc_html__( 'Total Stock Quantity', 'techmarket' ),
				'desc_tip' => 'true',
				'description' => esc_html__( 'Total Stock Quantity Available. This will be used to calculate prograss bar in onsale element.', 'techmarket' ),
				'type' => 'text'
			) );
		echo '</div>';
	}

	public static function save_total_stock_quantity_to_product_options( $post_id ) {
		$current_stock = isset( $_POST['_stock'] ) ? wc_clean( $_POST['_stock'] ) : get_post_meta( $post_id, '_stock', true ) ;
		$stock_quantity = isset( $_POST['_total_stock_quantity'] ) ? wc_clean( $_POST['_total_stock_quantity'] ) : '' ;
		if( empty( $stock_quantity ) && ! empty( $current_stock ) && round( $current_stock ) > 0 ) {
			$stock_quantity = round( $current_stock );
		}
		update_post_meta( $post_id, '_total_stock_quantity', $stock_quantity );
	}

	public static function add_product_accessories_panel_tab() {
		?>
		<li class="accessories_options accessories_tab show_if_simple show_if_variable">
			<a href="#accessories_product_data"><span><?php echo esc_html__( 'Accessories', 'techmarket' ); ?></span></a>
		</li>
		<?php
	}

	public static function add_product_accessories_panel_data() {
		global $post;
		?>
		<div id="accessories_product_data" class="panel woocommerce_options_panel">
			<div class="options_group">
				<p class="form-field">
					<label for="accessory_ids"><?php _e( 'Accessories', 'techmarket' ); ?></label>
					<select class="wc-product-search" multiple="multiple" style="width: 50%;" id="accessory_ids" name="accessory_ids[]" data-placeholder="<?php esc_attr_e( 'Search for a product&hellip;', 'techmarket' ); ?>" data-action="woocommerce_json_search_simple_products" data-exclude="<?php echo intval( $post->ID ); ?>">
						<?php
							$product_ids = array_filter( array_map( 'absint', (array) get_post_meta( $post->ID, '_accessory_ids', true ) ) );

							foreach ( $product_ids as $product_id ) {
								$product = wc_get_product( $product_id );
								if ( is_object( $product ) ) {
									echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . wp_kses_post( $product->get_formatted_name() ) . '</option>';
								}
							}
						?>
					</select> <?php echo wc_help_tip( esc_html__( 'Accessories are products which you recommend to be bought along with this product.', 'techmarket' ) ); ?>
				</p>
			</div>
		</div>
		<?php
	}

	public static function save_product_accessories_panel_data( $post_id ) {
		$accessories = isset( $_POST['accessory_ids'] ) ? array_map( 'intval', (array) $_POST['accessory_ids'] ) : array();
		update_post_meta( $post_id, '_accessory_ids', $accessories );
	}

	public static function get_accessories( $product ) {
		$product_id = $product->get_id();
		$accessory_ids = get_post_meta( $product_id, '_accessory_ids', true );
		return apply_filters( 'techmarket_product_accessory_ids', (array) maybe_unserialize( $accessory_ids ), $product );
	}

	public static function add_product_specification_panel_tab() {
		?>
		<li class="specification_options specification_tab">
			<a href="#specification_product_data"><span><?php echo esc_html__( 'Specifications', 'techmarket' ); ?></span></a>
		</li>
		<?php
	}

	public static function add_product_specification_panel_data() {
		global $post;
		?>
		<div id="specification_product_data" class="panel woocommerce_options_panel">
			<div class="options_group">
				<?php

					$display_attributes = get_post_meta( $post->ID, '_specifications_display_attributes', true );
					$attributes_style   = get_post_meta( $post->ID, '_specifications_attributes_style', true );
					$attributes_columns = get_post_meta( $post->ID, '_specifications_attributes_columns', true );

					$default_shop_attributes_columns  = apply_filters( 'techmarket_default_attr_col', '3' );
					$default_shop_attributes_style    = apply_filters( 'techmarket_default_attr_style', 'like_column' );

					$attributes_style  = $attributes_style ? $attributes_style : $default_shop_attributes_style;

					woocommerce_wp_checkbox( array(
						'id'          => '_specifications_display_attributes',
						'label'       => esc_html__( 'Display Attributes', 'techmarket' ),
						'desc_tip'    => 'true',
						'description' => esc_html__( 'Display Attributes for products in specifications tab.', 'techmarket' ),
						'value'       => $display_attributes ? $display_attributes : 'yes'
					) );

					woocommerce_wp_text_input(  array(
						'id'          => '_specifications_attributes_title',
						'label'       => esc_html__( 'Attributes Title', 'techmarket' ),
						'desc_tip'    => 'true',
						'description' => esc_html__( 'Attributes Title for products in specifications tab.', 'techmarket' ),
						'type'        => 'text'
					) );

					woocommerce_wp_radio( array(
						'id'          => '_specifications_attributes_style',
						'label'       => esc_html__( 'Attributes Style', 'techmarket' ),
						'value'       => $attributes_style,
						'options'     => array(
							'like_column' => esc_html__( 'Column View', 'techmarket' ),
							'like_table'  => esc_html__( 'Tabular view', 'techmarket' ),
						)
					) );

					woocommerce_wp_select( array(
						'id'            => '_specifications_attributes_columns',
						'label'         => esc_html__( 'Attributes Columns', 'techmarket' ),
						'desc_tip'      => 'true',
						'wrapper_class' => $attributes_style == 'like_table' ? 'hide' : '',
						'class'         => 'specs_attributes_columns',
						'description'   => esc_html__( 'Number of columns to display specifications', 'techmarket' ),
						'value'         => $attributes_columns ? $attributes_columns : $default_shop_attributes_columns,
						'options'       => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
							'5' => '5',
							'6' => '6'
						)
					) );
				?>
			</div>
			<div class="options_group specifications_options_group">
				<div class="form-field">
					<label for="_specifications"><?php echo esc_html__( 'Specifications', 'techmarket' ); ?></label>
					<div class="inside">
					<?php
						$specifications = get_post_meta( $post->ID, '_specifications', true );
						wp_editor(
							htmlspecialchars_decode( $specifications ),
							'_specifications',
							array(
								'media_buttons' => false,
								'textarea_rows' => 10,
								'editor_class'  => 'specifications_editor',
							)
						);
					?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	public static function save_product_specification_panel_data( $post_id ) {
		$display_attributes = isset( $_POST['_specifications_display_attributes'] ) ? 'yes' : 'no';
		update_post_meta( $post_id, '_specifications_display_attributes', $display_attributes );

		$attributes_title = isset( $_POST['_specifications_attributes_title'] ) ? $_POST['_specifications_attributes_title'] : '';
		update_post_meta( $post_id, '_specifications_attributes_title', $attributes_title );

		$attributes_style = isset( $_POST['_specifications_attributes_style'] ) ? $_POST['_specifications_attributes_style'] : '';
		update_post_meta( $post_id, '_specifications_attributes_style', $attributes_style );

		$attributes_columns = isset( $_POST['_specifications_attributes_columns'] ) ? $_POST['_specifications_attributes_columns'] : '';
		update_post_meta( $post_id, '_specifications_attributes_columns', $attributes_columns );

		$specifications = isset( $_POST['_specifications'] ) ? $_POST['_specifications'] : '';
		update_post_meta( $post_id, '_specifications', $specifications );
	}

	/**
	 * AJAX add to cart.
	 */
	public static function add_to_cart() {
		$product_id        = apply_filters( 'techmarket_add_to_cart_product_id', absint( $_POST['product_id'] ) );
		$quantity          = empty( $_POST['quantity'] ) ? 1 : wc_stock_amount( $_POST['quantity'] );
		$variation_id      = empty( $_POST['variation_id'] ) ? 0 : $_POST['variation_id'];
		$variation         = empty( $_POST['variation'] ) ? 0 : $_POST['variation'];
		$passed_validation = apply_filters( 'techmarket_add_to_cart_validation', true, $product_id, $quantity );
		$product_status    = get_post_status( $product_id );

		if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation ) && 'publish' === $product_status ) {

			do_action( 'woocommerce_ajax_added_to_cart', $product_id );

			if ( get_option( 'woocommerce_cart_redirect_after_add' ) == 'yes' ) {
				wc_add_to_cart_message( $product_id );
			}

			// Return fragments
			WC_AJAX::get_refreshed_fragments();

		} else {

			// If there was an error adding to the cart, redirect to the product page to show any errors
			$data = array(
				'error'       => true,
				'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id )
			);

			wp_send_json( $data );

		}

		die();
	}

	/**
	 * AJAX total price display.
	 */
	public static function accessory_checked_total_price() {
		global $woocommerce;
		$price = empty( $_POST['price'] ) ? 0 : $_POST['price'];

		if( $price ) {
			$price_html = wc_price( $price );
			echo wp_kses_post( $price_html );
		}

		die();
	}

	public static function modify_product_tabs( $tabs ) {

		global $product, $post;

		if( ! is_object( $product ) && function_exists( 'wc_get_product' ) ) {
			$product = wc_get_product();
		}

		if( ! $product ) {
			return $tabs;
		}

		$product_id = $product->get_id();

		if ( isset( $tabs['additional_information'] ) ) {
			unset( $tabs['additional_information'] );
		}

		$specifications = get_post_meta( $product_id, '_specifications', true );
		$specifications_display_attributes = get_post_meta( $product_id, '_specifications_display_attributes', true );

		// Specification tab - shows attributes
		if ( apply_filters( 'techmarket_enable_product_specification_tab', true ) && $product && ( !empty( $specifications ) || ( $specifications_display_attributes == 'yes' && ( $product->has_attributes() || ( apply_filters( 'wc_product_enable_dimensions_display', true ) && ( $product->has_dimensions() || $product->has_weight() ) ) ) ) ) ) {
			$tabs['specification'] = array(
				'title'    => esc_html__( 'Specification', 'techmarket' ),
				'priority' => 20,
				'callback' => 'techmarket_product_specification_tab',
				'ignore'   => true
			);
		}

		$accessories = Techmarket_WC_Helper::get_accessories( $product );

		if ( apply_filters( 'techmarket_enable_product_accessories_tab', true ) && sizeof( $accessories ) !== 0 && array_filter( $accessories ) && $product->is_type( array( 'simple', 'variable' ) ) ) {
			$tabs['accessories'] = array(
				'title'		=> esc_html__( 'Accessories', 'techmarket' ),
				'priority'	=> 5,
				'callback'	=> 'techmarket_product_accessories_tab',
				'ignore'    => true
			);
		}

		return $tabs;
	}

	public static function comments_template_loader( $template ) {

		if ( get_post_type() !== 'product' || ! apply_filters( 'techmarket_use_advanced_reviews', true ) ) {
			return $template;
		}

		$check_dirs = array(
			trailingslashit( get_stylesheet_directory() ) . 'templates/shop/',
			trailingslashit( get_template_directory() ) . 'templates/shop/',
			trailingslashit( get_stylesheet_directory() ) . WC()->template_path(),
			trailingslashit( get_template_directory() ) . WC()->template_path(),
			trailingslashit( get_stylesheet_directory() ),
			trailingslashit( get_template_directory() ),
			trailingslashit( WC()->plugin_path() ) . 'templates/'
		);

		if ( WC_TEMPLATE_DEBUG_MODE ) {
			$check_dirs = array( array_pop( $check_dirs ) );
		}

		foreach ( $check_dirs as $dir ) {
			if ( file_exists( trailingslashit( $dir ) . 'single-product-advanced-reviews.php' ) ) {
				return trailingslashit( $dir ) . 'single-product-advanced-reviews.php';
			}
		}

		return $template;
	}

	public static function get_ratings_counts( $product ) {
		global $wpdb;

		$product_id = $product->get_id();
		$counts     = array();
		$raw_counts = $wpdb->get_results( $wpdb->prepare("
				SELECT meta_value, COUNT( * ) as meta_value_count FROM $wpdb->commentmeta
				LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
				WHERE meta_key = 'rating'
				AND comment_post_ID = %d
				AND comment_approved = '1'
				AND meta_value > 0
				GROUP BY meta_value
			", $product_id ) );

		foreach ( $raw_counts as $count ) {
			$counts[ $count->meta_value ] = $count->meta_value_count;
		}

		return $counts;
	}
}

Techmarket_WC_Helper::init();
