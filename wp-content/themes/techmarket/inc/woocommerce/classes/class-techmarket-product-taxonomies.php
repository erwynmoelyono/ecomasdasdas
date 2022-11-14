<?php
/**
 * Class to setup Taxonomies metabox customizations
 *
 * @package Techmarket/WooCommerce
 */

class Techmarket_Product_Taxonomies {

	public function __construct() {

		// Add scripts
		add_action( 'admin_enqueue_scripts',					array( $this, 'load_wp_media_files' ), 0 );

		// Add form
		add_action( "product_cat_add_form_fields",				array( $this, 'add_category_fields' ), 10 );
		add_action( "product_cat_edit_form_fields",				array( $this, 'edit_category_fields' ), 10, 2 );
		add_action( 'create_term',								array( $this, 'save_category_fields' ), 10, 3 );
		add_action( 'edit_term',								array( $this, 'save_category_fields' ), 10, 3 );

		$brand_taxonomy = techmarket_get_brand_taxonomy();
		if( ! empty( $brand_taxonomy ) ) {
			
			// Add form
			add_action( "{$brand_taxonomy}_add_form_fields",	array( $this, 'add_brand_fields' ), 10 );
			add_action( "{$brand_taxonomy}_edit_form_fields",	array( $this, 'edit_brand_fields' ), 10, 2 );
			add_action( 'create_term',							array( $this, 'save_brand_fields' ), 	10, 3 );
			add_action( 'edit_term',							array( $this, 'save_brand_fields' ), 	10, 3 );

			// Add columns
			add_filter( "manage_edit-{$brand_taxonomy}_columns",	array( $this, 'product_brand_columns' ) );
			add_filter( "manage_{$brand_taxonomy}_custom_column",	array( $this, 'product_brand_column' ), 10, 3 );
		}

		$label_taxonomy = techmarket_get_label_taxonomy();
		if( ! empty( $label_taxonomy ) ) {
			
			// Add form
			add_action( "{$label_taxonomy}_add_form_fields",	array( $this, 'add_label_fields' ), 10 );
			add_action( "{$label_taxonomy}_edit_form_fields",	array( $this, 'edit_label_fields' ), 10, 2 );
			add_action( 'create_term',							array( $this, 'save_label_fields' ), 	10, 3 );
			add_action( 'edit_term',							array( $this, 'save_label_fields' ), 	10, 3 );

			// Add columns
			add_filter( "manage_edit-{$label_taxonomy}_columns",	array( $this, 'product_label_columns' ) );
			add_filter( "manage_{$label_taxonomy}_custom_column",	array( $this, 'product_label_column' ), 10, 3 );
		}
	}

	/**
	 * Loads WP Media Files
	 *
	 * @return void
	 */
	public function load_wp_media_files() {
		global $techmarket_version;
		
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_media();
		wp_register_script( 'techmarket-admin-brand-metabox', get_template_directory_uri() . '/assets/js/admin/brand-metabox' . $suffix . '.js', array( 'jquery' ), $techmarket_version );

		$js_options = apply_filters( 'techmarket_admin_brand_metabox_localize_script_data', array(
			'media_title'			=> esc_html__( 'Choose an image', 'techmarket' ),
			'media_btn_text'		=> esc_html__( 'Use image', 'techmarket' ),
			'placeholder_img_src'	=> wc_placeholder_img_src()
		) );

		wp_localize_script( 'techmarket-admin-brand-metabox', 'techmarket_admin_brand_options', $js_options );
	}

	/**
	 * Product Category static block fields.
	 *
	 * @return void
	 */
	public function add_category_fields() {
		?>
		<div class="form-field">
			<?php 
				if( post_type_exists( 'static_block' ) ) :

					$args = array(
						'posts_per_page'	=> -1,
						'orderby'			=> 'title',
						'post_type'			=> 'static_block',
					);
					$static_blocks = get_posts( $args );
				endif;
			?>
			<div class="form-group">
				<label><?php _e( 'Jumbotron', 'techmarket' ); ?></label>
				<select id="procuct_cat_static_block_id" class="form-control" name="procuct_cat_static_block_id">
					<option><?php echo esc_html__( 'Select a Static Block', 'techmarket' ); ?></option>
				<?php if( !empty( $static_blocks ) ) : ?>
				<?php foreach( $static_blocks as $static_block ) : ?>
					<option value="<?php echo esc_attr( $static_block->ID ); ?>"><?php echo get_the_title( $static_block->ID ); ?></option>
				<?php endforeach; ?>
				<?php endif; ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>
		<?php
	}

	/**
	 * Edit Category static block fields.
	 *
	 * @param mixed $term Term (product_cat) being edited
	 * @param mixed $taxonomy Taxonomy of the term being edited
	 */
	public function edit_category_fields( $term, $taxonomy ) {

		$static_block_id 	= '';
		$static_block_id 	= absint( get_term_meta( $term->term_id, 'static_block_id', true ) );
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php _e( 'Jumbotron', 'techmarket' ); ?></label></th>
			<td>
				<?php 
					if( post_type_exists( 'static_block' ) ) :

						$args = array(
							'posts_per_page'	=> -1,
							'orderby'			=> 'title',
							'post_type'			=> 'static_block',
						);
						$static_blocks = get_posts( $args );
					endif;
				?>
				<div class="form-group">
					<select id="procuct_cat_static_block_id" class="form-control" name="procuct_cat_static_block_id">
						<option><?php echo esc_html__( 'Select a Static Block', 'techmarket' ); ?></option>
					<?php if( !empty( $static_blocks ) ) : ?>
					<?php foreach( $static_blocks as $static_block ) : ?>
						<option value="<?php echo esc_attr( $static_block->ID ); ?>" <?php echo ( $static_block_id == $static_block->ID  ? 'selected' : '' ); ?>><?php echo get_the_title( $static_block->ID ); ?></option>
					<?php endforeach; ?>
					<?php endif; ?>
					</select>
				</div>
				<div class="clear"></div>
			</td>
		</tr>
		<?php
	}

	/**
	 * Save Category static block fields.
	 *
	 * @param mixed $term_id Term ID being saved
	 * @param mixed $tt_id
	 * @param mixed $taxonomy Taxonomy of the term being saved
	 * @return void
	 */
	public function save_category_fields( $term_id, $tt_id, $taxonomy ) {

		if ( isset( $_POST['procuct_cat_static_block_id'] ) )
			update_woocommerce_term_meta( $term_id, 'static_block_id', absint( $_POST['procuct_cat_static_block_id'] ) );

		delete_transient( 'wc_term_counts' );
	}

	/**
	 * Brand thumbnail fields.
	 *
	 * @return void
	 */
	public function add_brand_fields() {
		?>
		<div class="form-field">
			<label><?php esc_html_e( 'Thumbnail', 'techmarket' ); ?></label>
			<div id="tm_add_br_product_brand_thumbnail" style="float:left;margin-right:10px;"><img src="<?php echo wc_placeholder_img_src(); ?>" width="60px" height="60px" alt="" /></div>
			<div style="line-height:60px;">
				<input type="hidden" id="tm_add_br_product_brand_thumbnail_id" name="product_brand_thumbnail_id" />
				<button type="button" class="tm_add_br_upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'techmarket' ); ?></button>
				<button type="button" class="tm_add_br_remove_image_button button"><?php esc_html_e( 'Remove image', 'techmarket' ); ?></button>
			</div>
			<?php wp_enqueue_script( 'techmarket-admin-brand-metabox' ); ?>
			<div class="clear"></div>
		</div>
		<?php
	}

	/**
	 * Edit brand thumbnail field.
	 *
	 * @param mixed $term Term (brand) being edited
	 * @param mixed $taxonomy Taxonomy of the term being edited
	 */
	public function edit_brand_fields( $term, $taxonomy ) {

		$image 			= '';
		$thumbnail_id 	= absint( get_term_meta( $term->term_id, 'thumbnail_id', true ) );
		if ( $thumbnail_id )
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		else
			$image = wc_placeholder_img_src();
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php esc_html_e( 'Thumbnail', 'techmarket' ); ?></label></th>
			<td>
				<div id="tm_edit_br_product_brand_thumbnail" style="float:left;margin-right:10px;"><img src="<?php echo esc_url( $image ); ?>" alt="" style="max-width: 150px; height: auto;" /></div>
				<div style="line-height:60px;">
					<input type="hidden" id="tm_edit_br_product_brand_thumbnail_id" name="product_brand_thumbnail_id" value="<?php echo esc_attr( $thumbnail_id ); ?>" />
					<button type="submit" class="tm_edit_br_upload_image_button button"><?php esc_html_e( 'Upload/Add image', 'techmarket' ); ?></button>
					<button type="submit" class="tm_edit_br_remove_image_button button"><?php esc_html_e( 'Remove image', 'techmarket' ); ?></button>
				</div>
				<?php wp_enqueue_script( 'techmarket-admin-brand-metabox' ); ?>
				<div class="clear"></div>
			</td>
		</tr>
		<?php
	}

	/**
	 * save_brand_fields function.
	 *
	 * @param mixed $term_id Term ID being saved
	 * @param mixed $tt_id
	 * @param mixed $taxonomy Taxonomy of the term being saved
	 * @return void
	 */
	public function save_brand_fields( $term_id, $tt_id, $taxonomy ) {

		if ( isset( $_POST['product_brand_thumbnail_id'] ) )
			update_woocommerce_term_meta( $term_id, 'thumbnail_id', absint( $_POST['product_brand_thumbnail_id'] ) );

		delete_transient( 'wc_term_counts' );
	}

	/**
	 * Thumbnail column added to brand admin.
	 *
	 * @param mixed $columns
	 * @return array
	 */
	public function product_brand_columns( $columns ) {
		$new_columns          = array();
		$new_columns['cb']    = $columns['cb'];
		$new_columns['thumb'] = esc_html__( 'Image', 'techmarket' );

		unset( $columns['cb'] );

		unset( $columns['description'] );

		return array_merge( $new_columns, $columns );
	}

	/**
	 * Thumbnail column value added to brand admin.
	 *
	 * @param mixed $columns
	 * @param mixed $column
	 * @param mixed $id
	 * @return array
	 */
	public function product_brand_column( $columns, $column, $id ) {

		if ( $column == 'thumb' ) {

			$image 			= '';
			$thumbnail_id 	= get_term_meta( $id, 'thumbnail_id', true );

			if ($thumbnail_id)
				$image = wp_get_attachment_thumb_url( $thumbnail_id );
			else
				$image = wc_placeholder_img_src();

			// Prevent esc_url from breaking spaces in urls for image embeds
			// Ref: http://core.trac.wordpress.org/ticket/23605
			$image = str_replace( ' ', '%20', $image );

			$columns .= '<img src="' . esc_url( $image ) . '" alt="Thumbnail" class="wp-post-image" style="max-width: 150px; height: auto;" />';

		}

		return $columns;
	}

	/**
	 * Label Background and Text Color.
	 *
	 * @access public
	 * @return void
	 */
	public function add_label_fields() {
		?>
		<div class="form-field">
			<label class="label_background_color"><?php _e( 'Background Color', 'techmarket' ); ?></label>
			<input name="label_background_color" id="label_background_color" type="text" value autocomplete="off">
			<p class="description"><?php echo esc_html__( 'Background color as a hex value. For example : #000000 is black and #FFFFFF is white', 'techmarket' ); ?></p>
		</div>
		<div class="form-field">
			<label class="label_text_color"><?php _e( 'Text Color', 'techmarket' ); ?></label>
			<input name="label_text_color" id="label_text_color" type="text" value autocomplete="off">
			<p class="description"><?php echo esc_html__( 'Text color as a hex value. For example : #000000 is black and #FFFFFF is white', 'techmarket' ); ?></p>
		</div>
		<?php
	}

	/**
	 * Edit label fields
	 *
	 * @access public
	 * @param mixed $term Term (brand) being edited
	 * @param mixed $taxonomy Taxonomy of the term being edited
	 */
	public function edit_label_fields( $term, $taxonomy ) {

		$background_color 	= get_term_meta( $term->term_id, 'background_color', true );
		$text_color 		= get_term_meta( $term->term_id, 'text_color', true );
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php _e( 'Background Color', 'techmarket' ); ?></label></th>
			<td>
				<input name="label_background_color" id="label_background_color" type="text" value="<?php echo esc_attr( $background_color ); ?>" autocomplete="off">
			</td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php _e( 'Text Color', 'techmarket' ); ?></label></th>
			<td>
				<input name="label_text_color" id="label_text_color" type="text" value="<?php echo esc_attr( $text_color ); ?>" autocomplete="off">
			</td>
		</tr>
		<?php
	}

	/**
	 * save_label_fields function.
	 *
	 * @access public
	 * @param mixed $term_id Term ID being saved
	 * @param mixed $tt_id
	 * @param mixed $taxonomy Taxonomy of the term being saved
	 * @return void
	 */
	public function save_label_fields( $term_id, $tt_id, $taxonomy ) {

		if ( isset( $_POST['label_background_color'] ) )
			update_woocommerce_term_meta( $term_id, 'background_color', $_POST['label_background_color'] );

		if ( isset( $_POST['label_text_color'] ) )
			update_woocommerce_term_meta( $term_id, 'text_color', $_POST['label_text_color'] );

		delete_transient( 'wc_term_counts' );
	}

	/**
	 * Background and Text Color column added to product label admin.
	 *
	 * @access public
	 * @param mixed $columns
	 * @return array
	 */
	public function product_label_columns( $columns ) {
		$new_columns          = array();
		$new_columns['background_color'] = esc_html__( 'BG Color', 'techmarket' );
		$new_columns['text_color'] = esc_html__( 'Text Color', 'techmarket' );

		unset( $columns['description'] );
		unset( $columns['cb'] );
		unset( $columns['posts'] );

		return array_merge( $columns, $new_columns);
	}

	/**
	 * Backgroudn and Text Color column value added to product label admin.
	 *
	 * @access public
	 * @param mixed $columns
	 * @param mixed $column
	 * @param mixed $id
	 * @return array
	 */
	public function product_label_column( $columns, $column, $id ) {

		if ( $column == 'background_color' ) {

			$background_color 	= get_term_meta( $id, 'background_color', true );

			$columns .= $background_color;

		} elseif ( $column == 'text_color' ) {

			$text_color 	= get_term_meta( $id, 'text_color', true );

			$columns .= $text_color;

		}

		return $columns;
	}
}

new Techmarket_Product_Taxonomies();