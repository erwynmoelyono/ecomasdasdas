<?php
/**
 * Landing v2 Metabox
 *
 * Displays the landing v2 meta box, tabbed, with several panels covering price, stock etc.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Meta_Box_Landing_v2 Class.
 */
class Techmarket_Meta_Box_Landing_v2 {

	/**
	 * Output the metabox.
	 *
	 * @param WP_Post $post
	 */
	public static function output( $post ) {
		global $post, $thepostid;

		wp_nonce_field( 'techmarket_save_data', 'techmarket_meta_nonce' );

		$thepostid 		= $post->ID;
		$template_file 	= get_post_meta( $thepostid, '_wp_page_template', true );

		if ( $template_file !== 'template-landingpage-v2.php' ) {
			return;
		}

		self::output_landing_v2( $post );
	}

	private static function output_landing_v2( $post ) {

		$landing_v2 = techmarket_get_landing_v2_meta();

		?>
		<div class="panel-wrap meta-box-landing">
			<ul class="landing_data_tabs tm-tabs">
			<?php
				$product_data_tabs = apply_filters( 'techmarket_landing_v2_data_tabs', array(
					'general' => array(
						'label'  => esc_html__( 'General', 'techmarket' ),
						'target' => 'general_block',
						'class'  => array(),
					),
					'slider' => array(
						'label'  => esc_html__( 'Slider', 'techmarket' ),
						'target' => 'slider_block',
						'class'  => array(),
					),
					'page_header' => array(
						'label'  => esc_html__( 'Page Header', 'techmarket' ),
						'target' => 'page_header',
						'class'  => array(),
					),
					'media_single_banner_1' => array(
						'label'  => esc_html__( 'Media Single Banner 1', 'techmarket' ),
						'target' => 'media_single_banner_1',
						'class'  => array(),
					),
					'media_single_banner_2' => array(
						'label'  => esc_html__( 'Media Single Banner 2', 'techmarket' ),
						'target' => 'media_single_banner_2',
						'class'  => array(),
					),	
					'media_single_banner_3' => array(
						'label'  => esc_html__( 'Media Single Banner 3', 'techmarket' ),
						'target' => 'media_single_banner_3',
						'class'  => array(),
					),
					'product_category_filter' => array(
						'label'  => esc_html__( 'Product Category Filter', 'techmarket' ),
						'target' => 'product_category_filter',
						'class'  => array(),
					),
					'brands_carousel' => array(
						'label'  => esc_html__( 'Brands Carousel', 'techmarket' ),
						'target' => 'brands_carousel',
						'class'  => array(),
					),			
				) );
				foreach ( $product_data_tabs as $key => $tab ) {
					?><li class="<?php echo esc_attr( $key ); ?>_options <?php echo esc_attr( $key ); ?>_tab <?php echo implode( ' ' , $tab['class'] ); ?>">
						<a href="#<?php echo esc_attr( $tab['target'] ); ?>"><?php echo esc_html( $tab['label'] ); ?></a>
					</li><?php
				}
			?>
			</ul>

			<?php do_action( 'techmarket_landing_v2_write_panel_tabs_before' ); ?>
			
			<div id="general_block" class="panel techmarket_options_panel">
				<div class="options_group">
					<?php 
						$landing_v2_blocks = array(
							'sdr'	=> esc_html__( 'Slider', 'techmarket' ),
							'hdr'	=> esc_html__( 'Page Header', 'techmarket' ),
							'msb1'	=> esc_html__( 'Media Single Banner 1', 'techmarket' ),
							'msb2'	=> esc_html__( 'Media Single Banner 2', 'techmarket' ),
							'msb3'	=> esc_html__( 'Media Single Banner 3', 'techmarket' ),
							'pcf'	=> esc_html__( 'Product Category Filter', 'techmarket' ),
							'bc'	=> esc_html__( 'Brands Carousel', 'techmarket' )
						);
					?>
					<table class="general-blocks-table widefat striped">
						<thead>
							<tr>
								<th><?php echo esc_html__( 'Block', 'techmarket' ); ?></th>
								<th><?php echo esc_html__( 'Animation', 'techmarket' ); ?></th>
								<th><?php echo esc_html__( 'Priority', 'techmarket' ); ?></th>
								<th><?php echo esc_html__( 'Enabled ?', 'techmarket' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach( $landing_v2_blocks as $key => $landing_v2_block ) : ?>
							<tr>
								<td><?php echo esc_html( $landing_v2_block ); ?></td>
								<td><?php techmarket_wp_animation_dropdown( array(  'id' => '_landing_v2_' . $key . '_animation', 'label'=> '', 'name' => '_landing_v2[' . $key . '][animation]', 'value' => isset( $landing_v2['' . $key . '']['animation'] ) ? $landing_v2['' . $key . '']['animation'] : '', )); ?></td>
								<td><?php techmarket_wp_text_input( array(  'id' => '_landing_v2_' . $key . '_priority', 'label'=> '', 'name' => '_landing_v2[' . $key . '][priority]', 'value' => isset( $landing_v2['' . $key . '']['priority'] ) ? $landing_v2['' . $key . '']['priority'] : 10, ) ); ?></td>
								<td><?php techmarket_wp_checkbox( array( 'id' => '_landing_v2_' . $key . '_is_enabled', 'label' => '', 'name' => '_landing_v2[' . $key . '][is_enabled]', 'value'=> isset( $landing_v2['' . $key . '']['is_enabled'] ) ? $landing_v2['' . $key . '']['is_enabled'] : '', ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php do_action( 'techmarket_landing_v2_after_general_block' ) ?>

			</div><!-- /#general_block -->
			
			<div id="slider_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id' 			=> '_landing_v2_sdr_shortcode', 
						'label' 		=> esc_html__( 'Shortcode', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the shorcode for your slider here', 'techmarket' ),
						'name'			=> '_landing_v2[sdr][shortcode]',
						'value'			=> isset( $landing_v2['sdr']['shortcode'] ) ? $landing_v2['sdr']['shortcode'] : '',
					) );
				?>
				</div>
				<?php do_action( 'techmarket_landing_v2_after_slider_block' ) ?>

			</div><!-- /#slider_block -->

			<div id="page_header" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v2_hdr_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_landing_v2[hdr][section_title]',
						'value'			=> isset( $landing_v2['hdr']['section_title'] ) ? $landing_v2['hdr']['section_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v2_hdr_description', 
						'label' 		=>  esc_html__( 'Desctiption', 'techmarket' ),
						'name'			=> '_landing_v2[hdr][description]',
						'value'			=> isset( $landing_v2['hdr']['description'] ) ? $landing_v2['hdr']['description'] : '',
					) );					
				?>
				</div>
				<?php do_action( 'techmarket_landing_v2_after_page_header' ) ?>

			</div><!-- /#page_header -->

			<div id="media_single_banner_1" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v2_msb1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_landing_v2[msb1][section_title]',
						'value'			=> isset( $landing_v2['msb1']['section_title'] ) ? $landing_v2['msb1']['section_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v2_msb1_description', 
						'label' 		=>  esc_html__( 'Desctiption', 'techmarket' ),
						'name'			=> '_landing_v2[msb1][description]',
						'value'			=> isset( $landing_v2['msb1']['description'] ) ? $landing_v2['msb1']['description'] : '',
					) );	

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v2_msb1_action_text', 
						'label' 		=>  esc_html__( 'Action Text', 'techmarket' ),
						'name'			=> '_landing_v2[msb1][action_text]',
						'value'			=> isset( $landing_v2['msb1']['action_text'] ) ? $landing_v2['msb1']['action_text'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v2_msb1_action_link', 
						'label' 		=>  esc_html__( 'Action Link', 'techmarket' ),
						'name'			=> '_landing_v2[msb1][action_link]',
						'value'			=> isset( $landing_v2['msb1']['action_link'] ) ? $landing_v2['msb1']['action_link'] : '',
					) );

					techmarket_wp_upload_image( array( 
						'id'			=> '_landing_v2_msb1_image',
						'label'			=> esc_html__( 'Image', 'techmarket' ),
						'name'			=> '_landing_v2[msb1][image]',
						'value'			=> isset( $landing_v2['msb1']['image']) ? $landing_v2['msb1']['image'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_landing_v2_after_media_single_banner_1' ) ?>

			</div> <!-- /#media_single_banner_1 -->

			<div id="media_single_banner_2" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v2_msb2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_landing_v2[msb2][section_title]',
						'value'			=> isset( $landing_v2['msb2']['section_title'] ) ? $landing_v2['msb2']['section_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v2_msb2_description', 
						'label' 		=>  esc_html__( 'Desctiption', 'techmarket' ),
						'name'			=> '_landing_v2[msb2][description]',
						'value'			=> isset( $landing_v2['msb2']['description'] ) ? $landing_v2['msb2']['description'] : '',
					) );	

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v2_msb2_action_text', 
						'label' 		=>  esc_html__( 'Action Text', 'techmarket' ),
						'name'			=> '_landing_v2[msb2][action_text]',
						'value'			=> isset( $landing_v2['msb2']['action_text'] ) ? $landing_v2['msb2']['action_text'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v2_msb2_action_link', 
						'label' 		=>  esc_html__( 'Action Link', 'techmarket' ),
						'name'			=> '_landing_v2[msb2][action_link]',
						'value'			=> isset( $landing_v2['msb2']['action_link'] ) ? $landing_v2['msb2']['action_link'] : '',
					) );

					techmarket_wp_upload_image( array( 
						'id'			=> '_landing_v2_msb2_image',
						'label'			=> esc_html__( 'Image', 'techmarket' ),
						'name'			=> '_landing_v2[msb2][image]',
						'value'			=> isset( $landing_v2['msb2']['image']) ? $landing_v2['msb2']['image'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_landing_v2_after_media_single_banner_2' ) ?>

			</div> <!-- /#media_single_banner_2 -->

			<div id="media_single_banner_3" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v2_msb3_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_landing_v2[msb3][section_title]',
						'value'			=> isset( $landing_v2['msb3']['section_title'] ) ? $landing_v2['msb3']['section_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v2_msb3_description', 
						'label' 		=>  esc_html__( 'Desctiption', 'techmarket' ),
						'name'			=> '_landing_v2[msb3][description]',
						'value'			=> isset( $landing_v2['msb3']['description'] ) ? $landing_v2['msb3']['description'] : '',
					) );	

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v2_msb3_action_text', 
						'label' 		=>  esc_html__( 'Action Text', 'techmarket' ),
						'name'			=> '_landing_v2[msb3][action_text]',
						'value'			=> isset( $landing_v2['msb3']['action_text'] ) ? $landing_v2['msb3']['action_text'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v2_msb3_action_link', 
						'label' 		=>  esc_html__( 'Action Link', 'techmarket' ),
						'name'			=> '_landing_v2[msb3][action_link]',
						'value'			=> isset( $landing_v2['msb3']['action_link'] ) ? $landing_v2['msb3']['action_link'] : '',
					) );

					techmarket_wp_upload_image( array( 
						'id'			=> '_landing_v2_msb3_image',
						'label'			=> esc_html__( 'Image', 'techmarket' ),
						'name'			=> '_landing_v2[msb3][image]',
						'value'			=> isset( $landing_v2['msb3']['image']) ? $landing_v2['msb3']['image'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_landing_v2_after_media_single_banner_3' ) ?>

			</div> <!-- /#media_single_banner_3 -->

			<div id="product_category_filter" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v2_pcf_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_landing_v2[pcf][section_title]',
						'value'			=> isset( $landing_v2['pcf']['section_title'] ) ? $landing_v2['pcf']['section_title'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_landing_v2_pcf_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_landing_v2[pcf][shortcode_atts][template]',
						'value'			=> isset( $landing_v2['pcf']['shortcode_atts']['template'] ) ? $landing_v2['pcf']['shortcode_atts']['template'] : 'content-product-featured',
					) );

					techmarket_wp_wc_shortcode_atts( array( 
						'id' 			=> '_landing_v2_pcf_shortcode_atts',
						'label'			=> esc_html__( 'Shortcode Atts', 'techmarket' ),
						'name'			=> '_landing_v2[pcf][shortcode_atts]',
						'value'			=> isset( $landing_v2['pcf']['shortcode_atts'] ) ? $landing_v2['pcf']['shortcode_atts'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id' 			=> '_landing_v2_pcf_category_args_show_option_all', 
						'label' 		=> esc_html__( 'Category option title', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'All Categories', 'techmarket' ),
						'name'			=> '_landing_v2[pcf][category_args][show_option_all]',
						'value'			=> isset( $landing_v2['pcf']['category_args']['show_option_all'] ) ? $landing_v2['pcf']['category_args']['show_option_all'] : '',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_landing_v2_pcf_category_args_hide_if_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_landing_v2[pcf][category_args][hide_if_empty]',
						'value'			=> isset( $landing_v2['pcf']['category_args']['hide_if_empty'] ) ? $landing_v2['pcf']['category_args']['hide_if_empty'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v2_pcf_category_args_slugs', 
						'label' 		=> esc_html__( 'Slugs', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Slugs', 'techmarket' ),
						'name'			=> '_landing_v2[pcf][category_args][slugs]',
						'value'			=> isset( $landing_v2['pcf']['category_args']['slugs'] ) ? $landing_v2['pcf']['category_args']['slugs'] : '',
					) );

				?>
				</div>

				<?php do_action( 'techmarket_landing_v2_after_product_category_filter' ) ?>

			</div> <!-- /#product_category_filter -->

			<div id="brands_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v2_bc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_landing_v2[bc][number]',
						'value'			=> isset( $landing_v2['bc']['number'] ) ? $landing_v2['bc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v2_bc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_landing_v2[bc][orderby]',
						'value'			=> isset( $landing_v2['bc']['orderby'] ) ? $landing_v2['bc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v2_bc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_landing_v2[bc][order]',
						'value'			=> isset( $landing_v2['bc']['order'] ) ? $landing_v2['bc']['order'] : 'ASC',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_landing_v2_bc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_landing_v2[bc][hide_empty]',
						'value'			=> isset( $landing_v2['bc']['hide_empty'] ) ? $landing_v2['bc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_landing_v2_bc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_landing_v2[bc][carousel_args]',
						'value'			=> isset( $landing_v2['bc']['carousel_args'] ) ? $landing_v2['bc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_landing_v2_after_brands_carousel' ) ?>

			</div> <!-- /#brands_carousel -->

			<?php do_action( 'techmarket_landing_v2_write_panel_tabs_after' ); ?>

		</div>
		<?php
	}

	public static function save( $post_id, $post ) {
		if ( isset( $_POST['_landing_v2'] ) ) {
			$clean_landing_v2_options = techmarket_clean_kses_post( $_POST['_landing_v2'] );
			update_post_meta( $post_id, '_landing_v2_options',  serialize( $clean_landing_v2_options ) );
		}	
	}
}