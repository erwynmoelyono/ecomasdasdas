<?php
/**
 * All Dokan Related functions
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'techmarket_dokan_scripts' ) ) {
	/**
	 * Enqueue Dokan Scripts
	 */
	function techmarket_dokan_scripts() {
		global $techmarket_version;
		wp_enqueue_style( 'techmarket-dokan-style', get_template_directory_uri() . '/assets/css/dokan/dokan.css', '', $techmarket_version );
	}
}

if ( ! function_exists( 'techmarket_dokan_store_layout' ) ) {
	/**
	 * Dokan Store Layout
	 */
	function techmarket_dokan_store_layout() {
		$layout = apply_filters( 'techmarket_dokan_store_layout', 'full-width' );

		return $layout;
	}
}

if ( ! function_exists( 'techmarket_dokan_shop_layout' ) ) {
	/**
	 * Dokan Store Layout
	 */
	function techmarket_dokan_shop_layout( $layout ) {
		if( dokan_is_store_page() ) {
			$layout = techmarket_dokan_store_layout();
		}

		return $layout;
	}
}

if( ! function_exists( 'techmarket_dokan_body_classes' ) ) {
	function techmarket_dokan_body_classes( $classes ) {
		if( dokan_is_store_page() ) {
			$blog_layout = techmarket_get_blog_layout();
			if( ( $key = array_search( $blog_layout, $classes ) ) !== false ) {
				unset($classes[$key]);
			}

			$classes[] = techmarket_dokan_store_layout();
		}

		return $classes;
	}
}

if ( ! function_exists( 'techmarket_dokan_product_edit_add_specifications' ) ) {
	function techmarket_dokan_product_edit_add_specifications( $post, $post_id ) {
		?>
		<div class="dokan-product-specifications dokan-edit-row">
			<div class="dokan-section-heading" data-togglehandler="dokan_product_specifications">
				<h2><i class="fas fa-cog" aria-hidden="true"></i> <?php _e( 'Specifications', 'techmarket' ); ?></h2>
				<p><?php _e( 'Manage specifications for this product.', 'techmarket' ); ?></p>
				<a href="#" class="dokan-section-toggle">
					<i class="fas fa-sort-down fa-flip-vertical" aria-hidden="true"></i>
				</a>
				<div class="dokan-clearfix"></div>
			</div>

			<div class="dokan-section-content">

				<?php
					$display_attributes = get_post_meta( $post_id, '_specifications_display_attributes', true );
					$specifications = get_post_meta( $post_id, '_specifications', true );
				?>

				<div class="content-half-part dokan-form-group">
					<label class="" for="_specifications_display_attributes">
						<input name="_specifications_display_attributes" id="_specifications_display_attributes" value="yes" type="checkbox" <?php checked( $display_attributes, 'yes' ); ?>>
						<?php esc_html_e( 'Display Attributes', 'techmarket' ) ?>
					</label>
				</div>

				<div class="content-half-part dokan-form-group">
					<label for="_specifications_attributes_title" class="form-label"><?php esc_html_e( 'Attributes Title', 'techmarket' ); ?></label>
					<?php dokan_post_input_box( $post_id, '_specifications_attributes_title' ); ?>
				</div>

				<div class="dokan-clearfix"></div>

				<div class="content-half-part dokan-form-group">
					<label for="_specifications_attributes_style" class="form-label"><?php esc_html_e( 'Attributes Style', 'techmarket' ); ?></label>

					<?php dokan_post_input_box( $post_id, '_specifications_attributes_style', array( 'options' => array(
						'like_column'	=> esc_html__( 'Column View', 'techmarket' ),
						'like_table'	=> esc_html__( 'Tabular view', 'techmarket' ),
					) ), 'select' ); ?>
				</div>

				<div class="content-half-part dokan-form-group">
					<label for="_specifications_attributes_columns" class="form-label"><?php esc_html_e( 'Attributes Columns (Only works with Column View.)', 'techmarket' ); ?></label>

					<?php dokan_post_input_box( $post_id, '_specifications_attributes_columns', array( 'options' => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6'
					) ), 'select' ); ?>
				</div>

				<div class="dokan-clearfix"></div>

				<?php wp_editor( htmlspecialchars_decode( $specifications ) , '_specifications', array('editor_height' => 50, 'quicktags' => false, 'media_buttons' => false, 'teeny' => true, 'editor_class' => 'post_content') ); ?>

			</div><!-- .dokan-side-right -->
		</div><!-- .dokan-product-specifications -->
		<?php
	}
}
