<?php
/**
 * Home v9 Metabox
 *
 * Displays the home v9 meta box, tabbed, with several panels covering price, stock etc.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Meta_Box_Home_v9 Class.
 */
class Techmarket_Meta_Box_Home_v9 {

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

		if ( $template_file !== 'template-homepage-v9.php' ) {
			return;
		}

		self::output_home_v9( $post );
	}

	private static function output_home_v9( $post ) {

		$home_v9 = techmarket_get_home_v9_meta();

		?>
		<div class="panel-wrap meta-box-home">
			<ul class="home_data_tabs tm-tabs">
			<?php
				$product_data_tabs = apply_filters( 'techmarket_home_v9_data_tabs', array(
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
					'product_tabs' => array(
						'label'  => esc_html__( 'Product Tabs', 'techmarket' ),
						'target' => 'product_tabs',
						'class'  => array(),
					),
					'full_width_banner_1' => array(
						'label'  => esc_html__( 'Full Width Banner 1', 'techmarket' ),
						'target' => 'full_width_banner_1',
						'class'  => array(),
					),
					'two_column_banner' => array(
						'label'  => esc_html__( '2-Column banner', 'techmarket' ),
						'target' => 'two_column_banner',
						'class'  => array(),
					),
					'full_width_banner_2' => array(
						'label'  => esc_html__( 'Full Width Banner 2', 'techmarket' ),
						'target' => 'full_width_banner_2',
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

			<?php do_action( 'techmarket_home_v9_write_panel_tabs_before' ); ?>
			
			<div id="general_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_select( array(
						'id'		=> '_home_v9_header_style',
						'label'		=> esc_html__( 'Header Style', 'techmarket' ),
						'name'		=> '_home_v9[header_style]',
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
						'value'		=> isset( $home_v9['header_style'] ) ? $home_v9['header_style'] : '',
					) );
				?>
				</div>
				<div class="options_group">
					<?php 
						$home_v9_blocks = array(
							'sdr'	=> esc_html__( 'Slider', 'techmarket' ),
							'pt'	=> esc_html__( 'Product Tabs', 'techmarket' ),
							'sbr1'	=> esc_html__( 'Full Width Banner 1', 'techmarket' ),
							'brs'	=> esc_html__( '2 Column Banners', 'techmarket' ),							
							'sbr2'	=> esc_html__( 'Full Width Banner 2', 'techmarket' ),
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
							<?php foreach( $home_v9_blocks as $key => $home_v9_block ) : ?>
							<tr>
								<td><?php echo esc_html( $home_v9_block ); ?></td>
								<td><?php techmarket_wp_animation_dropdown( array(  'id' => '_home_v9_' . $key . '_animation', 'label'=> '', 'name' => '_home_v9[' . $key . '][animation]', 'value' => isset( $home_v9['' . $key . '']['animation'] ) ? $home_v9['' . $key . '']['animation'] : '', )); ?></td>
								<td><?php techmarket_wp_text_input( array(  'id' => '_home_v9_' . $key . '_priority', 'label'=> '', 'name' => '_home_v9[' . $key . '][priority]', 'value' => isset( $home_v9['' . $key . '']['priority'] ) ? $home_v9['' . $key . '']['priority'] : 10, ) ); ?></td>
								<td><?php techmarket_wp_checkbox( array( 'id' => '_home_v9_' . $key . '_is_enabled', 'label' => '', 'name' => '_home_v9[' . $key . '][is_enabled]', 'value'=> isset( $home_v9['' . $key . '']['is_enabled'] ) ? $home_v9['' . $key . '']['is_enabled'] : '', ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php do_action( 'techmarket_home_v9_after_general_block' ) ?>

			</div><!-- /#general_block -->
			
			<div id="slider_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v9_sdr_shortcode', 
						'label' 		=> esc_html__( 'Shortcode', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the shorcode for your slider here', 'techmarket' ),
						'name'			=> '_home_v9[sdr][shortcode]',
						'value'			=> isset( $home_v9['sdr']['shortcode'] ) ? $home_v9['sdr']['shortcode'] : '',
					) );
				?>
				</div>
				<?php do_action( 'techmarket_home_v9_after_slider_block' ) ?>

			</div><!-- /#slider_block -->

			<div id="product_tabs" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v9_pt_section_title', 
						'label' 		=> esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v9[pt][section_title]',
						'value'			=> isset( $home_v9['pt']['section_title'] ) ? $home_v9['pt']['section_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v9_pt_action_text', 
						'label' 		=> esc_html__( 'Action Text', 'techmarket' ),
						'name'			=> '_home_v9[pt][action_text]',
						'value'			=> isset( $home_v9['pt']['action_text'] ) ? $home_v9['pt']['action_text'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v9_pt_action_link', 
						'label' 		=> esc_html__( 'Action Link', 'techmarket' ),
						'name'			=> '_home_v9[pt][action_link]',
						'value'			=> isset( $home_v9['pt']['action_link'] ) ? $home_v9['pt']['action_link'] : '',
					) );
				?>
				</div>
				
				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v9_pt_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v9[pt][tabs][0][title]',
						'value'			=> isset( $home_v9['pt']['tabs'][0]['title'] ) ? $home_v9['pt']['tabs'][0]['title'] : esc_html__( 'All Glasses', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v9_pt_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v9[pt][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v9['pt']['tabs'][0]['shortcode_content'] ) ? $home_v9['pt']['tabs'][0]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v9_pt_tab_1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v9[pt][tabs][0][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v9['pt']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v9['pt']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v9_pt_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v9[pt][tabs][1][title]',
						'value'			=> isset( $home_v9['pt']['tabs'][1]['title'] ) ? $home_v9['pt']['tabs'][1]['title'] : esc_html__( 'Sunglasses', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v9_pt_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v9[pt][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v9['pt']['tabs'][1]['shortcode_content'] ) ? $home_v9['pt']['tabs'][1]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v9_pt_tab_2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v9[pt][tabs][1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v9['pt']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v9['pt']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v9_pt_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v9[pt][tabs][2][title]',
						'value'			=> isset( $home_v9['pt']['tabs'][2]['title'] ) ? $home_v9['pt']['tabs'][2]['title'] : esc_html__( 'Eyeglasses', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v9_pt_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v9[pt][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v9['pt']['tabs'][2]['shortcode_content'] ) ? $home_v9['pt']['tabs'][2]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v9_pt_tab_3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v9[pt][tabs][2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v9['pt']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v9['pt']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v9_pt_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v9[pt][tabs][3][title]',
						'value'			=> isset( $home_v9['pt']['tabs'][3]['title'] ) ? $home_v9['pt']['tabs'][3]['title'] : esc_html__( 'Special Collections', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v9_pt_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v9[pt][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v9['pt']['tabs'][3]['shortcode_content'] ) ? $home_v9['pt']['tabs'][3]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v9_pt_tab_4_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v9[pt][tabs][3][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v9['pt']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v9['pt']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v9_after_product_tabs' ) ?>

			</div><!-- /#product_tabs -->

			<div id="full_width_banner_1" class="panel techmarket_options_panel">

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v9_sbr1',
							'label'			=> esc_html__( 'Banner', 'techmarket' ),
							'name'			=> '_home_v9[sbr1]',
							'value'			=> isset( $home_v9['sbr1']) ? $home_v9['sbr1'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v9_after_full_width_banner_1' ) ?>

			</div><!-- /#full_width_banner_1 -->

			<div id="two_column_banner" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Banner 1', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v9_brs_br1',
							'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
							'name'			=> '_home_v9[brs][br1]',
							'value'			=> isset( $home_v9['brs']['br1'] ) ? $home_v9['brs']['br1'] : '',
							'fields'		=> array( 'pre_title', 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 2', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v9_brs_br2',
							'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
							'name'			=> '_home_v9[brs][br2]',
							'value'			=> isset( $home_v9['brs']['br2'] ) ? $home_v9['brs']['br2'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v9_after_two_column_banner' ) ?>

			</div><!-- /#two_column_banner -->

			<div id="full_width_banner_2" class="panel techmarket_options_panel">

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v9_sbr2',
							'label'			=> esc_html__( 'Banner', 'techmarket' ),
							'name'			=> '_home_v9[sbr2]',
							'value'			=> isset( $home_v9['sbr2']) ? $home_v9['sbr2'] : '',
							'fields'		=> array( 'pre_title','title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v9_after_full_width_banner_2' ) ?>

			</div><!-- /#full_width_banner_2 -->

			<div id="brands_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v9_bc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v9[bc][number]',
						'value'			=> isset( $home_v9['bc']['number'] ) ? $home_v9['bc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v9_bc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v9[bc][orderby]',
						'value'			=> isset( $home_v9['bc']['orderby'] ) ? $home_v9['bc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v9_bc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v9[bc][order]',
						'value'			=> isset( $home_v9['bc']['order'] ) ? $home_v9['bc']['order'] : 'ASC',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_home_v9_bc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v9[bc][hide_empty]',
						'value'			=> isset( $home_v9['bc']['hide_empty'] ) ? $home_v9['bc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v9_bc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v9[bc][carousel_args]',
						'value'			=> isset( $home_v9['bc']['carousel_args'] ) ? $home_v9['bc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v9_after_brands_carousel' ) ?>

			</div> <!-- /#brands_carousel -->

			<?php do_action( 'techmarket_home_v9_write_panel_tabs_after' ); ?>
		
		</div>
		<?php
	}

	public static function save( $post_id, $post ) {
		if ( isset( $_POST['_home_v9'] ) ) {
			$clean_home_v9_options = techmarket_clean_kses_post( $_POST['_home_v9'] );
			update_post_meta( $post_id, '_home_v9_options',  serialize( $clean_home_v9_options ) );
		}	
	}
}