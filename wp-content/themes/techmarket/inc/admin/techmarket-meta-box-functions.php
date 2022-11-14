<?php
/**
 * Techmarket Meta Box Functions
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Output a text input box.
 *
 * @param array $field
 */
function techmarket_wp_text_input( $field ) {
	global $thepostid, $post;

	$thepostid              = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['placeholder']   = isset( $field['placeholder'] ) ? $field['placeholder'] : '';
	$field['class']         = isset( $field['class'] ) ? $field['class'] : 'short';
	$field['style']         = isset( $field['style'] ) ? $field['style'] : '';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value']         = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
	$field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['type']          = isset( $field['type'] ) ? $field['type'] : 'text';
	$data_type              = empty( $field['data_type'] ) ? '' : $field['data_type'];

	switch ( $data_type ) {
		case 'url' :
			$field['class'] .= ' techmarket_input_url';
			$field['value']  = esc_url( $field['value'] );
			break;

		default :
			break;
	}

	// Custom attribute handling
	$custom_attributes = array();

	if ( ! empty( $field['custom_attributes'] ) && is_array( $field['custom_attributes'] ) ) {

		foreach ( $field['custom_attributes'] as $attribute => $value ){
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $value ) . '"';
		}
	}

	echo '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label><input type="' . esc_attr( $field['type'] ) . '" class="' . esc_attr( $field['class'] ) . '" style="' . esc_attr( $field['style'] ) . '" name="' . esc_attr( $field['name'] ) . '" id="' . esc_attr( $field['id'] ) . '" value="' . esc_attr( $field['value'] ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '" ' . implode( ' ', $custom_attributes ) . ' /> ';

	if ( ! empty( $field['description'] ) ) {

		if ( isset( $field['desc_tip'] ) && false !== $field['desc_tip'] ) {
			echo techmarket_help_tip( $field['description'] );
		} else {
			echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
		}
	}
	echo '</p>';
}

/**
 * Output a hidden input box.
 *
 * @param array $field
 */
function techmarket_wp_hidden_input( $field ) {
	global $thepostid, $post;

	$thepostid = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['name']  = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['value'] = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
	$field['class'] = isset( $field['class'] ) ? $field['class'] : '';

	echo '<input type="hidden" class="' . esc_attr( $field['class'] ) . '" name="' . esc_attr( $field['name'] ) . '" id="' . esc_attr( $field['id'] ) . '" value="' . esc_attr( $field['value'] ) .  '" /> ';
}

/**
 * Output a textarea input box.
 *
 * @param array $field
 */
function techmarket_wp_textarea_input( $field ) {
	global $thepostid, $post;

	$thepostid              = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['placeholder']   = isset( $field['placeholder'] ) ? $field['placeholder'] : '';
	$field['class']         = isset( $field['class'] ) ? $field['class'] : 'short';
	$field['style']         = isset( $field['style'] ) ? $field['style'] : '';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['value']         = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );

	// Custom attribute handling
	$custom_attributes = array();

	if ( ! empty( $field['custom_attributes'] ) && is_array( $field['custom_attributes'] ) ) {

		foreach ( $field['custom_attributes'] as $attribute => $value ){
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $value ) . '"';
		}
	}

	echo '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label><textarea class="' . esc_attr( $field['class'] ) . '" style="' . esc_attr( $field['style'] ) . '"  name="' . esc_attr( $field['name'] ) . '" id="' . esc_attr( $field['id'] ) . '" placeholder="' . esc_attr( $field['placeholder'] ) . '" rows="2" cols="20" ' . implode( ' ', $custom_attributes ) . '>' . esc_textarea( $field['value'] ) . '</textarea> ';

	if ( ! empty( $field['description'] ) ) {

		if ( isset( $field['desc_tip'] ) && false !== $field['desc_tip'] ) {
			echo techmarket_help_tip( $field['description'] );
		} else {
			echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
		}
	}
	echo '</p>';
}

/**
 * Output a checkbox input box.
 *
 * @param array $field
 */
function techmarket_wp_checkbox( $field ) {
	global $thepostid, $post;

	$thepostid              = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['class']         = isset( $field['class'] ) ? $field['class'] : 'checkbox';
	$field['style']         = isset( $field['style'] ) ? $field['style'] : '';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value']         = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
	$field['cbvalue']       = isset( $field['cbvalue'] ) ? $field['cbvalue'] : 'yes';
	$field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];

	// Custom attribute handling
	$custom_attributes = array();

	if ( ! empty( $field['custom_attributes'] ) && is_array( $field['custom_attributes'] ) ) {

		foreach ( $field['custom_attributes'] as $attribute => $value ){
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $value ) . '"';
		}
	}

	echo '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label><input type="checkbox" class="' . esc_attr( $field['class'] ) . '" style="' . esc_attr( $field['style'] ) . '" name="' . esc_attr( $field['name'] ) . '" id="' . esc_attr( $field['id'] ) . '" value="' . esc_attr( $field['cbvalue'] ) . '" ' . checked( $field['value'], $field['cbvalue'], false ) . '  ' . implode( ' ', $custom_attributes ) . '/> ';

	if ( ! empty( $field['description'] ) ) {

		if ( isset( $field['desc_tip'] ) && false !== $field['desc_tip'] ) {
			echo techmarket_help_tip( $field['description'] );
		} else {
			echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
		}
	}

	echo '</p>';
}

/**
 * Output a select input box.
 *
 * @param array $field
 */
function techmarket_wp_select( $field ) {
	global $thepostid, $post;

	$thepostid              = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['class']         = isset( $field['class'] ) ? $field['class'] : 'select short';
	$field['style']         = isset( $field['style'] ) ? $field['style'] : '';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['value']         = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );

	if ( empty( $field['value'] ) && isset( $field['default'] ) ) {
		$field['value'] = $field['default'];
	}

	// Custom attribute handling
	$custom_attributes = array();

	if ( ! empty( $field['custom_attributes'] ) && is_array( $field['custom_attributes'] ) ) {

		foreach ( $field['custom_attributes'] as $attribute => $value ){
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $value ) . '"';
		}
	}

	echo '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label><select id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['name'] ) . '" class="' . esc_attr( $field['class'] ) . '" style="' . esc_attr( $field['style'] ) . '" ' . implode( ' ', $custom_attributes ) . '>';

	foreach ( $field['options'] as $key => $value ) {
		echo '<option value="' . esc_attr( $key ) . '" ' . selected( esc_attr( $field['value'] ), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
	}

	echo '</select> ';

	if ( ! empty( $field['description'] ) ) {

		if ( isset( $field['desc_tip'] ) && false !== $field['desc_tip'] ) {
			echo techmarket_help_tip( $field['description'] );
		} else {
			echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
		}
	}
	echo '</p>';
}

/**
 * Output a radio input box.
 *
 * @param array $field
 */
function techmarket_wp_radio( $field ) {
	global $thepostid, $post;

	$thepostid              = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['class']         = isset( $field['class'] ) ? $field['class'] : 'select short';
	$field['style']         = isset( $field['style'] ) ? $field['style'] : '';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['value']         = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
	$field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];

	echo '<fieldset class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><legend>' . wp_kses_post( $field['label'] ) . '</legend><ul class="ec-radios">';

	foreach ( $field['options'] as $key => $value ) {

		echo '<li><label><input
				name="' . esc_attr( $field['name'] ) . '"
				value="' . esc_attr( $key ) . '"
				type="radio"
				class="' . esc_attr( $field['class'] ) . '"
				style="' . esc_attr( $field['style'] ) . '"
				' . checked( esc_attr( $field['value'] ), esc_attr( $key ), false ) . '
				/> ' . esc_html( $value ) . '</label>
		</li>';
	}
	echo '</ul>';

	if ( ! empty( $field['description'] ) ) {

		if ( isset( $field['desc_tip'] ) && false !== $field['desc_tip'] ) {
			echo techmarket_help_tip( $field['description'] );
		} else {
			echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
		}
	}

	echo '</fieldset>';
}

/**
 * Output input fields to choose a WooCommerce Shortcode
 */
function techmarket_wp_wc_shortcode( $field ) {
	global $thepostid, $post;

	$thepostid          = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['name']      = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['default']	= isset( $field['default'] ) ? $field['default'] : '';
	$field['value'] 	= isset( $field['value'] ) ? $field['value'] : '';
	$field['fields']	= isset( $field['fields'] ) ? $field['fields'] : array( 'per_page', 'columns' );

	echo '<div class="techmarket-wc-shortcode">';

	techmarket_wp_select( array(
		'id'		=> $field['name'],
		'label'		=> $field['label'],
		'default'	=> $field['default'],
		'options'	=> array(
			'recent_products'		=> esc_html__( 'Recent Products', 'techmarket' ),
			'featured_products'		=> esc_html__( 'Featured Products', 'techmarket' ),
			'sale_products'			=> esc_html__( 'Sale Products', 'techmarket' ),
			'best_selling_products'	=> esc_html__( 'Best Selling Products', 'techmarket' ),
			'top_rated_products'	=> esc_html__( 'Top Rated Products', 'techmarket' ),
			'product_category'		=> esc_html__( 'Product Category', 'techmarket' ),
			'products'				=> esc_html__( 'Products', 'techmarket' ),
		),
		'class'		=> 'wc_shortcode_select show_hide_select',
		'name'		=> $field['name'] . '[shortcode]',
		'value'		=> isset( $field['value']['shortcode'] ) ? $field['value']['shortcode'] : $field['default'],
	) );

	techmarket_wp_text_input( array(
		'id'			=> $field['name'] . '_product_category_slug',
		'label'			=> esc_html__( 'Product Category Slug', 'techmarket' ),
		'class'			=> 'wc_shortcode_product_category_slug',
		'wrapper_class'	=> 'show_if_product_category hide',
		'name'			=> $field['name'] . '[product_category_slug]',
		'value'			=> isset( $field['value']['product_category_slug'] ) ? $field['value']['product_category_slug'] : '',
	) );

	techmarket_wp_select( array(
		'id'	=> $field['name'] . '_products_choice',
		'label'	=> esc_html__( 'Show Products by:', 'techmarket' ),
		'options'	=> array(
			'ids'	=> esc_html__( 'IDs', 'techmarket' ),
			'skus'	=> esc_html__( 'SKUs', 'techmarket' )
		),
		'wrapper_class'	=> 'show_if_products hide',
		'class'			=> 'skus_or_ids',
		'name'			=> $field['name'] . '[products_choice]',
		'value'			=> isset( $field['value']['products_choice'] ) ? $field['value']['products_choice'] : 'ids',
	) );

	techmarket_wp_text_input( array(
		'id'			=> $field['name'] . '_products_ids_skus',
		'label'			=> esc_html__( 'Product IDs or SKUs', 'techmarket' ),
		'placeholder'	=> esc_html__( 'Enter IDs or SKUs separated by comma', 'techmarket' ),
		'wrapper_class'	=> 'show_if_products hide',
		'name'			=> $field['name'] . '[products_ids_skus]',
		'value'			=> isset( $field['value']['products_ids_skus'] ) ? $field['value']['products_ids_skus'] : '',
	) );

	echo '</div>';

	techmarket_wp_wc_shortcode_atts( array( 
		'id'			=> $field['name'] . '_shortcode_atts',
		'label'			=> esc_html__( 'Shortcode Atts', 'techmarket' ),
		'name'			=> $field['name'] . '[shortcode_atts]',
		'value'			=> isset( $field['value']['shortcode_atts'] ) ? $field['value']['shortcode_atts'] : '',
		'fields'		=> $field['fields']
	) );
}

/**
 * Output input fields to choose a WooCommerce Shortcode Atts
 */
function techmarket_wp_wc_shortcode_atts( $field ) {
	global $thepostid, $post;

	$thepostid          = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['name']      = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['default']	= isset( $field['default'] ) ? $field['default'] : '';
	$field['value'] 	= isset( $field['value'] ) ? $field['value'] : '';
	$field['fields']	= isset( $field['fields'] ) ? $field['fields'] : array( 'per_page', 'columns' );

	echo '<div class="techmarket-wc-shortcode-atts">';

	if( isset( $field['fields'] ) && in_array( 'per_page', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_per_page',
			'label'			=> esc_html__( 'per_page', 'techmarket' ),
			'name'			=> $field['name'] . '[per_page]',
			'value'			=> isset( $field['value']['per_page'] ) ? $field['value']['per_page'] : 12,
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'columns', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_columns',
			'label'			=> esc_html__( 'columns', 'techmarket' ),
			'name'			=> $field['name'] . '[columns]',
			'value'			=> isset( $field['value']['columns'] ) ? $field['value']['columns'] : 4,
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'orderby', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_orderby',
			'label'			=> esc_html__( 'orderby', 'techmarket' ),
			'name'			=> $field['name'] . '[orderby]',
			'value'			=> isset( $field['value']['orderby'] ) ? $field['value']['orderby'] : 'date',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'order', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_order',
			'label'			=> esc_html__( 'order', 'techmarket' ),
			'name'			=> $field['name'] . '[order]',
			'value'			=> isset( $field['value']['order'] ) ? $field['value']['order'] : 'desc',
		) );
	}

	echo '</div>';
}

/**
 * Outputs Legend for Fieldsets
 */
function techmarket_wp_legend( $title ) {
	?>
	<h4 class="tm-legend"><?php echo wp_kses_post( $title ); ?></h4>
	<?php
}

/**
 * Outputs Legend for Fieldsets
 */
function techmarket_wp_legend_sub( $title ) {
	?>
	<h6 class="tm-legend-sub"><?php echo wp_kses_post( $title ); ?></h6>
	<?php
}

function techmarket_wp_upload_image( $field ) {
	global $thepostid, $post;

	$thepostid              = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['name']      	= isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['value']         = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['placeholder']	= isset( $field['placeholder'] ) ? $field['placeholder'] : false;

	if ( absint( $field['value'] ) ) {
		$image = wp_get_attachment_thumb_url( $field['value'] );
	} elseif ( $field['placeholder'] ) {
		$image = wc_placeholder_img_src();
	} else {
		$image = '';
	}

	echo '<p id="' . esc_attr( $field['id'] ) . '_field" class="form-field media-option ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label>';
	?>
		<?php if ( isset ( $image ) ) : ?>
		<img src="<?php echo esc_attr( $image ); ?>" class="upload_image_preview" data-placeholder-src="<?php echo esc_attr( wc_placeholder_img_src() ); ?>" alt="" />
		<?php endif; ?>
		<input type="hidden" name="<?php echo esc_attr( $field['name'] ); ?>" class="upload_image_id" value="<?php echo esc_attr( $field['value'] ); ?>" />
		<a href="#" class="button tm_upload_image_button tips"><?php echo esc_html__( 'Upload/Add image', 'techmarket' ); ?></a>
		<a href="#" class="button tm_remove_image_button tips"><?php echo esc_html__( 'Remove this image', 'techmarket' ); ?></a>
	</p>
	<?php
}

function techmarket_wp_animation_dropdown( $field ) {
	
	techmarket_wp_select( array(
		'id'		=> $field['id'] . '_products_choice',
		'label'		=> '',
		'class'		=> 'animation_dropdown',
		'name'		=> isset( $field['name'] ) ? $field['name'] : $field['id'],
		'value'		=> isset( $field['value'] ) ? $field['value'] : '',
		'options'	=> array(
			'' => esc_html__( 'No Animation', 'techmarket' ),
			'bounce' => 'bounce',
			'flash' => 'flash',
			'pulse' => 'pulse',
			'rubberBand' => 'rubberBand',
			'shake' => 'shake',
			'swing' => 'swing',
			'tada' => 'tada',
			'wobble' => 'wobble',
			'jello' => 'jello',
			'bounceIn' => 'bounceIn',
			'bounceInDown' => 'bounceInDown',
			'bounceInLeft' => 'bounceInLeft',
			'bounceInRight' => 'bounceInRight',
			'bounceInUp' => 'bounceInUp',
			'bounceOut' => 'bounceOut',
			'bounceOutDown' => 'bounceOutDown',
			'bounceOutLeft' => 'bounceOutLeft',
			'bounceOutRight' => 'bounceOutRight',
			'bounceOutUp' => 'bounceOutUp',
			'fadeIn' => 'fadeIn',
			'fadeInDown' => 'fadeInDown',
			'fadeInDownBig' => 'fadeInDownBig',
			'fadeInLeft' => 'fadeInLeft',
			'fadeInLeftBig' => 'fadeInLeftBig',
			'fadeInRight' => 'fadeInRight',
			'fadeInRightBig' => 'fadeInRightBig',
			'fadeInUp' => 'fadeInUp',
			'fadeInUpBig' => 'fadeInUpBig',
			'fadeOut' => 'fadeOut',
			'fadeOutDown' => 'fadeOutDown',
			'fadeOutDownBig' => 'fadeOutDownBig',
			'fadeOutLeft' => 'fadeOutLeft',
			'fadeOutLeftBig' => 'fadeOutLeftBig',
			'fadeOutRight' => 'fadeOutRight',
			'fadeOutRightBig' => 'fadeOutRightBig',
			'fadeOutUp' => 'fadeOutUp',
			'fadeOutUpBig' => 'fadeOutUpBig',
			'flip' => 'flip',
			'flipInX' => 'flipInX',
			'flipInY' => 'flipInY',
			'flipOutX' => 'flipOutX',
			'flipOutY' => 'flipOutY',
			'lightSpeedIn' => 'lightSpeedIn',
			'lightSpeedOut' => 'lightSpeedOut',
			'rotateIn' => 'rotateIn',
			'rotateInDownLeft' => 'rotateInDownLeft',
			'rotateInDownRight' => 'rotateInDownRight',
			'rotateInUpLeft' => 'rotateInUpLeft',
			'rotateInUpRight' => 'rotateInUpRight',
			'rotateOut' => 'rotateOut',
			'rotateOutDownLeft' => 'rotateOutDownLeft',
			'rotateOutDownRight' => 'rotateOutDownRight',
			'rotateOutUpLeft' => 'rotateOutUpLeft',
			'rotateOutUpRight' => 'rotateOutUpRight',
			'slideInUp' => 'slideInUp',
			'slideInDown' => 'slideInDown',
			'slideInLeft' => 'slideInLeft',
			'slideInRight' => 'slideInRight',
			'slideOutUp' => 'slideOutUp',
			'slideOutDown' => 'slideOutDown',
			'slideOutLeft' => 'slideOutLeft',
			'slideOutRight' => 'slideOutRight',
			'zoomIn' => 'zoomIn',
			'zoomInDown' => 'zoomInDown',
			'zoomInLeft' => 'zoomInLeft',
			'zoomInRight' => 'zoomInRight',
			'zoomInUp' => 'zoomInUp',
			'zoomOut' => 'zoomOut',
			'zoomOutDown' => 'zoomOutDown',
			'zoomOutLeft' => 'zoomOutLeft',
			'zoomOutRight' => 'zoomOutRight',
			'zoomOutUp' => 'zoomOutUp',
			'hinge' => 'hinge',
			'rollIn' => 'rollIn',
			'rollOut' => 'rollOut',
		),
	) );
}

/**
 * Output input fields to choose a Slick Carousel Options
 */
function techmarket_wp_slick_carousel_options( $field ) {
	global $thepostid, $post;

	$thepostid          = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['name']      = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['default']	= isset( $field['default'] ) ? $field['default'] : '';
	$field['value'] 	= isset( $field['value'] ) ? $field['value'] : '';
	$field['fields']	= isset( $field['fields'] ) ? $field['fields'] : array( 'slidesToShow', 'slidesToScroll', 'dots', 'arrows' );

	echo '<div class="techmarket-slick-carousel-options">';

	if( isset( $field['label'] ) ) {
		techmarket_wp_legend_sub( $field['label'] );
	}

	if( isset( $field['fields'] ) && in_array( 'slidesToShow', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_slidesToShow',
			'label'			=> esc_html__( 'slidesToShow', 'techmarket' ),
			'name'			=> $field['name'] . '[slidesToShow]',
			'value'			=> isset( $field['value']['slidesToShow'] ) ? $field['value']['slidesToShow'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'slidesToScroll', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_slidesToScroll',
			'label'			=> esc_html__( 'slidesToScroll', 'techmarket' ),
			'name'			=> $field['name'] . '[slidesToScroll]',
			'value'			=> isset( $field['value']['slidesToScroll'] ) ? $field['value']['slidesToScroll'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'rows', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_rows',
			'label'			=> esc_html__( 'rows', 'techmarket' ),
			'name'			=> $field['name'] . '[rows]',
			'value'			=> isset( $field['value']['rows'] ) ? $field['value']['rows'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'slidesPerRow', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_slidesPerRow',
			'label'			=> esc_html__( 'slidesPerRow', 'techmarket' ),
			'name'			=> $field['name'] . '[slidesPerRow]',
			'value'			=> isset( $field['value']['slidesPerRow'] ) ? $field['value']['slidesPerRow'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'dots', $field['fields'] )  ) {
		techmarket_wp_checkbox( array(
			'id'			=> $field['id'] . '_dots',
			'label'			=> esc_html__( 'dots', 'techmarket' ),
			'name'			=> $field['name'] . '[dots]',
			'value'			=> isset( $field['value']['dots'] ) ? $field['value']['dots'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'arrows', $field['fields'] )  ) {
		techmarket_wp_checkbox( array(
			'id'			=> $field['id'] . '_arrows',
			'label'			=> esc_html__( 'arrows', 'techmarket' ),
			'name'			=> $field['name'] . '[arrows]',
			'value'			=> isset( $field['value']['arrows'] ) ? $field['value']['arrows'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'prevArrow', $field['fields'] )  ) {
		techmarket_wp_textarea_input( array(
			'id'			=> $field['id'] . '_prevArrow',
			'label'			=> esc_html__( 'prevArrow', 'techmarket' ),
			'name'			=> $field['name'] . '[prevArrow]',
			'value'			=> isset( $field['value']['prevArrow'] ) ? $field['value']['prevArrow'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'nextArrow', $field['fields'] )  ) {
		techmarket_wp_textarea_input( array(
			'id'			=> $field['id'] . '_nextArrow',
			'label'			=> esc_html__( 'nextArrow', 'techmarket' ),
			'name'			=> $field['name'] . '[nextArrow]',
			'value'			=> isset( $field['value']['nextArrow'] ) ? $field['value']['nextArrow'] : '',
		) );
	}

	echo '</div>';
}

/**
 * Output input fields to choose a Banner Options
 */
function techmarket_wp_banner_options( $field ) {
	global $thepostid, $post;

	$thepostid          = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['name']      = isset( $field['name'] ) ? $field['name'] : $field['id'];
	$field['default']	= isset( $field['default'] ) ? $field['default'] : '';
	$field['value'] 	= isset( $field['value'] ) ? $field['value'] : '';
	$field['fields']	= isset( $field['fields'] ) ? $field['fields'] : array( 'title', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' );

	echo '<div class="techmarket-slick-carousel-options">';

	if( isset( $field['label'] ) ) {
		techmarket_wp_legend_sub( $field['label'] );
	}

	if( isset( $field['fields'] ) && in_array( 'pre_title', $field['fields'] )  ) {
		techmarket_wp_textarea_input( array(
			'id'			=> $field['id'] . '_pre_title',
			'label'			=> esc_html__( 'Pre Title', 'techmarket' ),
			'name'			=> $field['name'] . '[pre_title]',
			'value'			=> isset( $field['value']['pre_title'] ) ? $field['value']['pre_title'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'title', $field['fields'] )  ) {
		techmarket_wp_textarea_input( array(
			'id'			=> $field['id'] . '_title',
			'label'			=> esc_html__( 'Title', 'techmarket' ),
			'name'			=> $field['name'] . '[title]',
			'value'			=> isset( $field['value']['title'] ) ? $field['value']['title'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'sub_title', $field['fields'] )  ) {
		techmarket_wp_textarea_input( array(
			'id'			=> $field['id'] . '_sub_title',
			'label'			=> esc_html__( 'Sub Title', 'techmarket' ),
			'name'			=> $field['name'] . '[sub_title]',
			'value'			=> isset( $field['value']['sub_title'] ) ? $field['value']['sub_title'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'price', $field['fields'] )  ) {
		techmarket_wp_textarea_input( array(
			'id'			=> $field['id'] . '_price',
			'label'			=> esc_html__( 'Price', 'techmarket' ),
			'name'			=> $field['name'] . '[price]',
			'value'			=> isset( $field['value']['price'] ) ? $field['value']['price'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'action_text', $field['fields'] )  ) {
		techmarket_wp_textarea_input( array(
			'id'			=> $field['id'] . '_action_text',
			'label'			=> esc_html__( 'Action Text', 'techmarket' ),
			'name'			=> $field['name'] . '[action_text]',
			'value'			=> isset( $field['value']['action_text'] ) ? $field['value']['action_text'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'action_link', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_action_link',
			'label'			=> esc_html__( 'Action Link', 'techmarket' ),
			'name'			=> $field['name'] . '[action_link]',
			'value'			=> isset( $field['value']['action_link'] ) ? $field['value']['action_link'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'bg_choice', $field['fields'] )  ) {
		techmarket_wp_select( array(
			'id'			=> $field['id'] . '_bg_choice',
			'label'			=> esc_html__( 'Background Choice', 'techmarket' ),
			'name'			=> $field['name'] . '[bg_choice]',
			'options'		=> array(
				'image'	=> esc_html__( 'Image', 'techmarket' ),
				'color'	=> esc_html__( 'Color', 'techmarket' ),
			),
			'class'			=> 'show_hide_select',
			'value'			=> isset( $field['value']['bg_choice'] ) ? $field['value']['bg_choice'] : 'image',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'bg_image', $field['fields'] )  ) {
		techmarket_wp_upload_image( array(
			'id'			=> $field['id'] . '_bg_image',
			'label'			=> esc_html__( 'Background Image', 'techmarket' ),
			'wrapper_class'	=> 'show_if_image hide',
			'name'			=> $field['name'] . '[bg_image]',
			'value'			=> isset( $field['value']['bg_image'] ) ? $field['value']['bg_image'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'bg_color', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_bg_color',
			'label'			=> esc_html__( 'Background Color', 'techmarket' ),
			'wrapper_class'	=> 'show_if_color hide',
			'name'			=> $field['name'] . '[bg_color]',
			'value'			=> isset( $field['value']['bg_color'] ) ? $field['value']['bg_color'] : '',
		) );
	}

	if( isset( $field['fields'] ) && in_array( 'bg_height', $field['fields'] )  ) {
		techmarket_wp_text_input( array(
			'id'			=> $field['id'] . '_bg_height',
			'label'			=> esc_html__( 'Background Height', 'techmarket' ),
			'wrapper_class'	=> 'show_if_color hide',
			'name'			=> $field['name'] . '[bg_height]',
			'value'			=> isset( $field['value']['bg_height'] ) ? $field['value']['bg_height'] : '',
		) );
	}

	echo '</div>';
}