<?php
/**
 * Landing v1 Metabox
 *
 * Displays the landing v1 meta box, tabbed, with several panels covering price, stock etc.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Meta_Box_Landing_v1 Class.
 */
class Techmarket_Meta_Box_Landing_v1 {

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

		if ( $template_file !== 'template-landingpage-v1.php' ) {
			return;
		}

		self::output_landing_v1( $post );
	}

	private static function output_landing_v1( $post ) {

		$landing_v1 = techmarket_get_landing_v1_meta();

		?>
		<div class="panel-wrap meta-box-landing">
			<ul class="landing_data_tabs tm-tabs">
			<?php
				$product_data_tabs = apply_filters( 'techmarket_landing_v1_data_tabs', array(
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
					'recent_posts' => array(
						'label'  => esc_html__( 'Recent Posts', 'techmarket' ),
						'target' => 'recent_posts',
						'class'  => array(),
					),
					'products_block_1' => array(
						'label'  => esc_html__( 'Products Block 1', 'techmarket' ),
						'target' => 'products_block_1',
						'class'  => array(),
					),
					'products_block_2' => array(
						'label'  => esc_html__( 'Products Block 2', 'techmarket' ),
						'target' => 'products_block_2',
						'class'  => array(),
					),
					'products_block_3' => array(
						'label'  => esc_html__( 'Products Block 3', 'techmarket' ),
						'target' => 'products_block_3',
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

			<?php do_action( 'techmarket_landing_v1_write_panel_tabs_before' ); ?>

			<div id="general_block" class="panel techmarket_options_panel">
				<div class="options_group">
					<?php 
						$landing_v1_blocks = array(
							'sdr'	=> esc_html__( 'Slider', 'techmarket' ),
							'rpwc'	=> esc_html__( 'Recent Posts', 'techmarket' ),
							'pwi1'	=> esc_html__( 'Products Block 1', 'techmarket' ),
							'pwi2'	=> esc_html__( 'Products Block 2', 'techmarket' ),
							'pwi3'	=> esc_html__( 'Products Block 3', 'techmarket' ),
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
							<?php foreach( $landing_v1_blocks as $key => $landing_v1_block ) : ?>
							<tr>
								<td><?php echo esc_html( $landing_v1_block ); ?></td>
								<td><?php techmarket_wp_animation_dropdown( array(  'id' => '_landing_v1_' . $key . '_animation', 'label'=> '', 'name' => '_landing_v1[' . $key . '][animation]', 'value' => isset( $landing_v1['' . $key . '']['animation'] ) ? $landing_v1['' . $key . '']['animation'] : '', )); ?></td>
								<td><?php techmarket_wp_text_input( array(  'id' => '_landing_v1_' . $key . '_priority', 'label'=> '', 'name' => '_landing_v1[' . $key . '][priority]', 'value' => isset( $landing_v1['' . $key . '']['priority'] ) ? $landing_v1['' . $key . '']['priority'] : 10, ) ); ?></td>
								<td><?php techmarket_wp_checkbox( array( 'id' => '_landing_v1_' . $key . '_is_enabled', 'label' => '', 'name' => '_landing_v1[' . $key . '][is_enabled]', 'value'=> isset( $landing_v1['' . $key . '']['is_enabled'] ) ? $landing_v1['' . $key . '']['is_enabled'] : '', ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php do_action( 'techmarket_landing_v1_after_general_block' ) ?>

			</div><!-- /#general_block -->
			
			<div id="slider_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id' 			=> '_landing_v1_sdr_shortcode', 
						'label' 		=> esc_html__( 'Shortcode', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the shorcode for your slider here', 'techmarket' ),
						'name'			=> '_landing_v1[sdr][shortcode]',
						'value'			=> isset( $landing_v1['sdr']['shortcode'] ) ? $landing_v1['sdr']['shortcode'] : '',
					) );
				?>
				</div>
				<?php do_action( 'techmarket_landing_v1_after_slider_block' ) ?>

			</div><!-- /#slider_block -->

			<div id="recent_posts" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v1_rpwc_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_landing_v1[rpwc][section_title]',
						'value'			=> isset( $landing_v1['rpwc']['section_title'] ) ? $landing_v1['rpwc']['section_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v1_rpwc_description', 
						'label' 		=>  esc_html__( 'Desctiption', 'techmarket' ),
						'name'			=> '_landing_v1[rpwc][description]',
						'value'			=> isset( $landing_v1['rpwc']['description'] ) ? $landing_v1['rpwc']['description'] : '',
					) );

					techmarket_wp_select( array(
						'id'			=> '_landing_v1_rpwc_post_choice',
						'label'			=> esc_html__( 'Post Choice', 'techmarket' ),
						'options'		=> array(
							'random'	=> esc_html__( 'Random Posts', 'techmarket' ),
							'recent'	=> esc_html__( 'Most Recent Posts', 'techmarket' ),
							'specific'	=> esc_html__( 'Specify by ID', 'techmarket' ),
						),
						'class'			=> 'show_hide_select',
						'name'			=> '_landing_v1[rpwc][post_choice]',
						'value'			=> isset( $landing_v1['rpwc']['post_choice'] ) ? $landing_v1['rpwc']['post_choice'] : 'recent',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v1_rpwc_post_id', 
						'label' 		=>  esc_html__( 'Post IDs', 'techmarket' ),
						'wrapper_class'	=> 'show_if_specific hide',
						'name'			=> '_landing_v1[rpwc][post_id]',
						'value'			=> isset( $landing_v1['rpwc']['post_id'] ) ? $landing_v1['rpwc']['post_id'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v1_rpwc_limit', 
						'label' 		=>  esc_html__( 'Post Limit', 'techmarket' ),
						'name'			=> '_landing_v1[rpwc][limit]',
						'value'			=> isset( $landing_v1['rpwc']['limit'] ) ? $landing_v1['rpwc']['limit'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v1_rpwc_category_args_number', 
						'label' 		=>  esc_html__( 'Category Limit', 'techmarket' ),
						'name'			=> '_landing_v1[rpwc][category_args][number]',
						'value'			=> isset( $landing_v1['rpwc']['category_args']['number'] ) ? $landing_v1['rpwc']['category_args']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v1_rpwc_category_args_slugs', 
						'label' 		=>  esc_html__( 'Category Slugs', 'techmarket' ),
						'name'			=> '_landing_v1[rpwc][category_args][slugs]',
						'value'			=> isset( $landing_v1['rpwc']['category_args']['slugs'] ) ? $landing_v1['rpwc']['category_args']['slugs'] : '',
					) );
				?>
				</div>
				<?php do_action( 'techmarket_landing_v1_after_recent_posts' ) ?>

			</div><!-- /#recent_posts -->

			<div id="products_block_1" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v1_pwi1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_landing_v1[pwi1][section_title]',
						'value'			=> isset( $landing_v1['pwi1']['section_title'] ) ? $landing_v1['pwi1']['section_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v1_pwi1_description', 
						'label' 		=>  esc_html__( 'Desctiption', 'techmarket' ),
						'name'			=> '_landing_v1[pwi1][description]',
						'value'			=> isset( $landing_v1['pwi1']['description'] ) ? $landing_v1['pwi1']['description'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_landing_v1_pwi1_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_landing_v1[pwi1][shortcode_content]',
						'value'			=> isset( $landing_v1['pwi1']['shortcode_content'] ) ? $landing_v1['pwi1']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_landing_v1_pwi1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_landing_v1[pwi1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $landing_v1['pwi1']['shortcode_content']['shortcode_atts']['template'] ) ? $landing_v1['pwi1']['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v1_pwi1_action_text', 
						'label' 		=>  esc_html__( 'Action Text', 'techmarket' ),
						'name'			=> '_landing_v1[pwi1][action_text]',
						'value'			=> isset( $landing_v1['pwi1']['action_text'] ) ? $landing_v1['pwi1']['action_text'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v1_pwi1_action_link', 
						'label' 		=>  esc_html__( 'Action Link', 'techmarket' ),
						'name'			=> '_landing_v1[pwi1][action_link]',
						'value'			=> isset( $landing_v1['pwi1']['action_link'] ) ? $landing_v1['pwi1']['action_link'] : '',
					) );

					techmarket_wp_upload_image( array( 
						'id'			=> '_landing_v1_pwi1_image',
						'label'			=> esc_html__( 'Image', 'techmarket' ),
						'name'			=> '_landing_v1[pwi1][image]',
						'value'			=> isset( $landing_v1['pwi1']['image']) ? $landing_v1['pwi1']['image'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_landing_v1_after_products_block_1' ) ?>

			</div> <!-- /#products_block_1 -->

			<div id="products_block_2" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v1_pwi2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_landing_v1[pwi2][section_title]',
						'value'			=> isset( $landing_v1['pwi2']['section_title'] ) ? $landing_v1['pwi2']['section_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v1_pwi2_description', 
						'label' 		=>  esc_html__( 'Desctiption', 'techmarket' ),
						'name'			=> '_landing_v1[pwi2][description]',
						'value'			=> isset( $landing_v1['pwi2']['description'] ) ? $landing_v1['pwi2']['description'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_landing_v1_pwi2_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_landing_v1[pwi2][shortcode_content]',
						'value'			=> isset( $landing_v1['pwi2']['shortcode_content'] ) ? $landing_v1['pwi2']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_landing_v1_pwi2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_landing_v1[pwi2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $landing_v1['pwi2']['shortcode_content']['shortcode_atts']['template'] ) ? $landing_v1['pwi2']['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v1_pwi2_action_text', 
						'label' 		=>  esc_html__( 'Action Text', 'techmarket' ),
						'name'			=> '_landing_v1[pwi2][action_text]',
						'value'			=> isset( $landing_v1['pwi2']['action_text'] ) ? $landing_v1['pwi2']['action_text'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v1_pwi2_action_link', 
						'label' 		=>  esc_html__( 'Action Link', 'techmarket' ),
						'name'			=> '_landing_v1[pwi2][action_link]',
						'value'			=> isset( $landing_v1['pwi2']['action_link'] ) ? $landing_v1['pwi2']['action_link'] : '',
					) );

					techmarket_wp_upload_image( array( 
						'id'			=> '_landing_v1_pwi2_image',
						'label'			=> esc_html__( 'Image', 'techmarket' ),
						'name'			=> '_landing_v1[pwi2][image]',
						'value'			=> isset( $landing_v1['pwi2']['image']) ? $landing_v1['pwi2']['image'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_landing_v1_after_products_block_2' ) ?>

			</div> <!-- /#products_block_2 -->

			<div id="products_block_3" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v1_pwi3_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_landing_v1[pwi3][section_title]',
						'value'			=> isset( $landing_v1['pwi3']['section_title'] ) ? $landing_v1['pwi3']['section_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_landing_v1_pwi3_description', 
						'label' 		=>  esc_html__( 'Desctiption', 'techmarket' ),
						'name'			=> '_landing_v1[pwi3][description]',
						'value'			=> isset( $landing_v1['pwi3']['description'] ) ? $landing_v1['pwi3']['description'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_landing_v1_pwi3_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_landing_v1[pwi3][shortcode_content]',
						'value'			=> isset( $landing_v1['pwi3']['shortcode_content'] ) ? $landing_v1['pwi3']['shortcode_content'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v1_pwi3_action_text', 
						'label' 		=>  esc_html__( 'Action Text', 'techmarket' ),
						'name'			=> '_landing_v1[pwi3][action_text]',
						'value'			=> isset( $landing_v1['pwi3']['action_text'] ) ? $landing_v1['pwi3']['action_text'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_landing_v1_pwi3_action_link', 
						'label' 		=>  esc_html__( 'Action Link', 'techmarket' ),
						'name'			=> '_landing_v1[pwi3][action_link]',
						'value'			=> isset( $landing_v1['pwi3']['action_link'] ) ? $landing_v1['pwi3']['action_link'] : '',
					) );

					techmarket_wp_upload_image( array( 
						'id'			=> '_landing_v1_pwi3_image',
						'label'			=> esc_html__( 'Image', 'techmarket' ),
						'name'			=> '_landing_v1[pwi3][image]',
						'value'			=> isset( $landing_v1['pwi3']['image']) ? $landing_v1['pwi3']['image'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_landing_v1_after_products_block_3' ) ?>

			</div> <!-- /#products_block_3 -->

			<?php do_action( 'techmarket_landing_v1_write_panel_tabs_after' ); ?>
		
		</div>
		<?php
	}

	public static function save( $post_id, $post ) {
		if ( isset( $_POST['_landing_v1'] ) ) {
			$clean_landing_v1_options = techmarket_clean_kses_post( $_POST['_landing_v1'] );
			update_post_meta( $post_id, '_landing_v1_options',  serialize( $clean_landing_v1_options ) );
		}	
	}
}