<?php
/**
 * Class Techmarket Page Meta Box
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'Techmarket_Meta_Box_Page' ) ) {
	/** 
	 * Techmarket_Meta_Box_Page
	 */
	class Techmarket_Meta_Box_Page {

		private static $meta_box_id = '_techmarket_page_metabox';

		private static function get_meta_box_fields() {
			$page_meta_box_fields = apply_filters( 'techmarket_page_meta_box_fields', array( 
				array(
					'name'		=> esc_html__( 'Site Header Style', 'techmarket' ),
					'desc'		=> esc_html__( 'Choose a site header style for this page', 'techmarket' ),
					'id'		=> 'site_header_style',
					'type'		=> 'select',
					'options'	=> array(
						''			=> esc_html__( 'Default Header', 'techmarket' ),
						'v1'		=> esc_html__( 'Header v1', 'techmarket' ),
						'v2'		=> esc_html__( 'Header v2', 'techmarket' ),
						'v3'		=> esc_html__( 'Header v3', 'techmarket' ),
						'v4'		=> esc_html__( 'Header v4', 'techmarket' ),
						'v5'		=> esc_html__( 'Header v5', 'techmarket' ),
						'v6'		=> esc_html__( 'Header v6', 'techmarket' ),
						'v7'		=> esc_html__( 'Header v7', 'techmarket' ),
						'v8'		=> esc_html__( 'Header v8', 'techmarket' ),
						'v9'		=> esc_html__( 'Header v9', 'techmarket' ),
						'v10'		=> esc_html__( 'Header v10', 'techmarket' ),
					),
				),
				
				array(
					'name' 		=> esc_html__( 'Hide Page Header', 'techmarket' ),
					'desc' 		=> esc_html__( 'Check this if you want to hide page header that contains page title and subtitle.', 'techmarket' ),
					'id' 		=> 'hide_page_header',
					'type' 		=> 'checkbox',
				),

				array(
					'name' 		=> esc_html__( 'Page Title', 'techmarket' ),
					'desc' 		=> esc_html__( 'Add a custom page title or leave empty if you want the page title to be the same as the page name', 'techmarket' ),
					'id' 		=> 'page_title',
					'type' 		=> 'text',
				),

				array(
					'name' 		=> esc_html__( 'Page Subtitle', 'techmarket' ),
					'desc' 		=> esc_html__( 'Add a subtitle to the page', 'techmarket' ),
					'id' 		=> 'page_subtitle',
					'type' 		=> 'text',
				),
				
				array(
					'name' 		=> esc_html__( 'Hide Breadcrumb', 'techmarket' ),
					'desc' 		=> esc_html__( 'Check this if you want to hide breadcrumb.', 'techmarket' ),
					'id' 		=> 'hide_breadcrumb',
					'type' 		=> 'checkbox',
				),

				array(
					'name' 		=> esc_html__( 'Additional Body Classes', 'techmarket' ),
					'desc' 		=> esc_html__( 'Add custom classes to page <body>', 'techmarket' ),
					'id' 		=> 'body_classes',
					'type' 		=> 'text',
				)
			) );

			return $page_meta_box_fields;
		}

		/**
		 * Save the meta when the post is saved.
		 *
		 * @param int $post_id The ID of the post being saved.
		 */
		public static function save( $post_id, $post ) {
	 
			$meta_box_id 		= self::$meta_box_id;
			$meta_box_fields 	= self::get_meta_box_fields();
			$meta_data 			= get_post_meta( $post_id, $meta_box_id, true );

			if( ! is_array( $meta_data ) ) {
				$meta_data 	= array();
			}
		 
			foreach ( $meta_box_fields as $field ) {
				$old = isset( $meta_data[$field['id']] ) ? $meta_data[$field['id']] : '';
				$new = isset( $_POST[$field['id']] ) ? $_POST[$field['id']] : '';
		 
				if ( ! empty( $new ) ) {
					$meta_data[$field['id']] = $new;
				} elseif( isset( $meta_data[$field['id']] ) && '' == $new ) {
					unset( $meta_data[$field['id']] );
				}
			}

			if( ! empty( $meta_data ) ) {
				update_post_meta( $post_id, $meta_box_id, $meta_data );
			} else {
				delete_post_meta( $post_id, $meta_box_id );
			}
		}


		/**
		 * Render Meta Box content.
		 *
		 * @param WP_Post $post The post object.
		 */
		public static function output( $post ) {

			$meta_box_id 		= self::$meta_box_id;
			$meta_box_fields 	= self::get_meta_box_fields();
			$meta_array 		= get_post_meta( $post->ID, $meta_box_id, true );
			
			if( ! is_array( $meta_array ) ) {
				$meta_array 	= array();
			}
		  
		  	$increment = 0;

		  	wp_nonce_field( 'techmarket_save_data', 'techmarket_meta_nonce' );

			foreach ( $meta_box_fields as $field ) {
				// get current post meta data
				$meta = '';
				if( isset( $meta_array[$field['id']] ) ) {
					$meta = $meta_array[$field['id']];
				}

				switch ( $field['type'] ) {

					//If radio array
					case 'radio':

						echo '<div class="metaField_field_wrapper metaField_field_' . esc_attr( $field['id'] ) . '">';
						echo '<p><label for="' . esc_attr( $field['id'] ) . '"><strong>' . $field['name'] . '</strong></label></p>';

						$count = 0;
						foreach ( $field['options'] as $key => $label ) {
							$checked = ( $meta == $key || (!$meta && !$count) ) ? 'checked="checked"' : '';
							echo '<label class="metaField_radio" style="display: block; padding: 2px 0;"><input class="metaField_radio" type="radio" name="' . esc_attr( $field['id'] ) . '" value="' .esc_attr( $key ) . '" ' . $checked . '> ' . $label . '</label>';
							$count++;
						}
						
						echo '<p class="metaField_caption" style="color:#999">' . $field['desc'] . '</p>';
						echo '</div>';

					break;

					//If select array
					case 'select':

						echo '<div class="metaField_field_wrapper metaField_field_' . esc_attr( $field['id'] ) . '">';
						echo '<p><label for="' . esc_attr( $field['id'] ) . '"><strong>' . $field['name'] . '</strong></label></p>';

						echo '<select class="metaField_select" name="'. esc_attr( $field['id'] ) .'">';
						foreach ($field['options'] as $key => $label) {
							$selected = $meta == $key ? 'selected' : '';
							echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . $label . '</option>';
						}
						echo '</select>';
						
						echo '<p class="metaField_caption" style="color:#999">' . $field['desc'] . '</p>';
						echo '</div>';

					break;

					//If checkbox array
					case 'checkbox':

						echo '<div class="metaField_field_wrapper metaField_field_' . esc_attr( $field['id'] ) . '">';

						$checked = $meta ? 'checked="checked"' : '';
						echo '<label class="metaField_checkbox" style="display: block; padding: 2px 0;"><input class="metaField_checkbox" type="checkbox" name="'.esc_attr( $field['id'] ).'" value="1" ' . $checked . '> ' . $field['name'] . '</label>';
						
						echo '<p class="metaField_caption" style="color:#999">' . $field['desc'] . '</p>';
						echo '</div>';
					
					break;

					//If text array
					case 'text':

						echo '<div class="metaField_field_wrapper metaField_field_' . esc_attr( $field['id'] ) . '">';
						echo '<p><label for="' . esc_attr( $field['id'] ) . '"><strong>' . $field['name'] . '</strong></label></p>';

						echo '<input class="metaField_text" type="text" name="' . esc_attr( $field['id'] ) . '" value="' . esc_attr( $meta ) . '" style="width:100%;">';
						
						echo '<p class="metaField_caption" style="color:#999">' . $field['desc'] . '</p>';
						echo '</div>';
					
					break;
					
				}

				$increment++;
			}
		}
	}
}