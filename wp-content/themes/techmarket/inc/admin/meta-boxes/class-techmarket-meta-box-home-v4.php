<?php
/**
 * Home v4 Metabox
 *
 * Displays the home v4 meta box, tabbed, with several panels covering price, stock etc.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Meta_Box_Home_v4 Class.
 */
class Techmarket_Meta_Box_Home_v4 {

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

		if ( $template_file !== 'template-homepage-v4.php' ) {
			return;
		}

		self::output_home_v4( $post );
	}

	private static function output_home_v4( $post ) {

		$home_v4 = techmarket_get_home_v4_meta();

		?>
		<div class="panel-wrap meta-box-home">
			<ul class="home_data_tabs tm-tabs">
			<?php
				$product_data_tabs = apply_filters( 'techmarket_home_v4_data_tabs', array(
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
					'three_column_banner' => array(
						'label'  => esc_html__( '3 Column Banners', 'techmarket' ),
						'target' => 'three_column_banner',
						'class'  => array(),
					),
					'products_carousel_with_tabs_block' => array(
						'label'  => esc_html__( 'Products Carousel with Tabs Block', 'techmarket' ),
						'target' => 'products_carousel_with_tabs_block',
						'class'  => array(),
					),
					'notice_block' => array(
						'label'  => esc_html__( 'Notice Block', 'techmarket' ),
						'target' => 'notice_block',
						'class'  => array(),
					),
					'featured_products_carousel' => array(
						'label'  => esc_html__( 'Featured Products Carousel', 'techmarket' ),
						'target' => 'featured_products_carousel',
						'class'  => array(),
					),
					'two_column_banner' => array(
						'label'  => esc_html__( '2-Column banner', 'techmarket' ),
						'target' => 'two_column_banner',
						'class'  => array(),
					),
					'products_tabs_carousel_with_widgets_brands' => array(
						'label'  => esc_html__( 'Products Tabs Carousel with Widgets and Brands', 'techmarket' ),
						'target' => 'products_tabs_carousel_with_widgets_brands',
						'class'  => array(),
					),
					'products_carousel_tabs_1' => array(
						'label'  => esc_html__( 'Landscape Product Carousel Tabs', 'techmarket' ),
						'target' => 'products_carousel_tabs_1',
						'class'  => array(),
					),
					'products_carousel_tabs_2' => array(
						'label'  => esc_html__( 'Products Carousel Tabs', 'techmarket' ),
						'target' => 'products_carousel_tabs_2',
						'class'  => array(),
					),
					'full_width_banner' => array(
						'label'  => esc_html__( 'Full Width Banner', 'techmarket' ),
						'target' => 'full_width_banner',
						'class'  => array(),
					),
					'landscape_product_widgets' => array(
						'label'  => esc_html__( 'Landscape Product Widgets Block', 'techmarket' ),
						'target' => 'landscape_product_widgets',
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
			
			<?php do_action( 'techmarket_home_v4_write_panel_tabs_before' ); ?>

			<div id="general_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_select( array(
						'id'		=> '_home_v4_header_style',
						'label'		=> esc_html__( 'Header Style', 'techmarket' ),
						'name'		=> '_home_v4[header_style]',
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
						'value'		=> isset( $home_v4['header_style'] ) ? $home_v4['header_style'] : '',
					) );
				?>
				</div>
				<div class="options_group">
					<?php 
						$home_v4_blocks = array(
							'sdr'	=> esc_html__( 'Slider', 'techmarket' ),
							'brs1'	=> esc_html__( '3 Column Banners', 'techmarket' ),
							'pcwtc'	=> esc_html__( 'Products Carousel with Tabs Block', 'techmarket' ),
							'ntc'	=> esc_html__( 'Notice Block', 'techmarket' ),
							'fpc'	=> esc_html__( 'Featured Products Carousel', 'techmarket' ),
							'brs2'	=> esc_html__( '2 Column Banners', 'techmarket' ),
							'pcwtb'	=> esc_html__( 'Products Tabs Carousel with Widgets and Brands', 'techmarket' ),
							'lpct'	=> esc_html__( 'Landscape Product Carousel Tabs', 'techmarket' ),
							'pcwt'	=> esc_html__( 'Products Carousel Tabs', 'techmarket' ),
							'sbr'	=> esc_html__( 'Full Width Banner', 'techmarket' ),
							'lpcw'	=> esc_html__( 'Landscape Product Widgets Block', 'techmarket' ),
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
							<?php foreach( $home_v4_blocks as $key => $home_v4_block ) : ?>
							<tr>
								<td><?php echo esc_html( $home_v4_block ); ?></td>
								<td><?php techmarket_wp_animation_dropdown( array(  'id' => '_home_v4_' . $key . '_animation', 'label'=> '', 'name' => '_home_v4[' . $key . '][animation]', 'value' => isset( $home_v4['' . $key . '']['animation'] ) ? $home_v4['' . $key . '']['animation'] : '', )); ?></td>
								<td><?php techmarket_wp_text_input( array(  'id' => '_home_v4_' . $key . '_priority', 'label'=> '', 'name' => '_home_v4[' . $key . '][priority]', 'value' => isset( $home_v4['' . $key . '']['priority'] ) ? $home_v4['' . $key . '']['priority'] : 10, ) ); ?></td>
								<td><?php techmarket_wp_checkbox( array( 'id' => '_home_v4_' . $key . '_is_enabled', 'label' => '', 'name' => '_home_v4[' . $key . '][is_enabled]', 'value'=> isset( $home_v4['' . $key . '']['is_enabled'] ) ? $home_v4['' . $key . '']['is_enabled'] : '', ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			
				<?php do_action( 'techmarket_home_v4_after_general_block' ) ?>

			</div><!-- /#general_block -->
			
			<div id="slider_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v4_sdr_shortcode', 
						'label' 		=> esc_html__( 'Shortcode', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the shorcode for your slider here', 'techmarket' ),
						'name'			=> '_home_v4[sdr][shortcode]',
						'value'			=> isset( $home_v4['sdr']['shortcode'] ) ? $home_v4['sdr']['shortcode'] : '',
					) );
				?>
				</div>
			
				<?php do_action( 'techmarket_home_v4_after_slider_block' ) ?>

			</div><!-- /#slider_block -->

			<div id="three_column_banner" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Banner 1', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v4_brs1_br1',
							'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
							'name'			=> '_home_v4[brs1][br1]',
							'value'			=> isset( $home_v4['brs1']['br1'] ) ? $home_v4['brs1']['br1'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 2', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v4_brs1_br2',
							'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
							'name'			=> '_home_v4[brs1][br2]',
							'value'			=> isset( $home_v4['brs1']['br2'] ) ? $home_v4['brs1']['br2'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 3', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v4_brs1_br3',
							'label'			=> esc_html__( 'Banner 3', 'techmarket' ),
							'name'			=> '_home_v4[brs1][br3]',
							'value'			=> isset( $home_v4['brs1']['br3'] ) ? $home_v4['brs1']['br3'] : '',
							'fields'		=> array( 'title', 'price', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

			
				<?php do_action( 'techmarket_home_v4_after_three_column_banner' ) ?>

			</div><!-- /#three_column_banner -->

			<div id="products_carousel_with_tabs_block" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Single Product Carousel', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtc_pc_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtc][pc][section_title]',
						'value'			=> isset( $home_v4['pcwtc']['pc']['section_title'] ) ? $home_v4['pcwtc']['pc']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtc_pc_shortcode_content',
						'label'			=> esc_html__( 'Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v4[pcwtc][pc][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtc']['pc']['shortcode_content'] ) ? $home_v4['pcwtc']['pc']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtc_pc_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtc][pc][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtc']['pc']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtc']['pc']['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_pcwtc_pc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[pcwtc][pc][carousel_args]',
						'value'			=> isset( $home_v4['pcwtc']['pc']['carousel_args'] ) ? $home_v4['pcwtc']['pc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Tab Products', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					
					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_pcwtc_pct_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[pcwtc][pct][carousel_args]',
						'value'			=> isset( $home_v4['pcwtc']['pct']['carousel_args'] ) ? $home_v4['pcwtc']['pct']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
					
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtc_pct_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtc][pct][tabs][0][title]',
						'value'			=> isset( $home_v4['pcwtc']['pct']['tabs'][0]['title'] ) ? $home_v4['pcwtc']['pct']['tabs'][0]['title'] : esc_html__( 'New Arrivals', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtc_pct_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v4[pcwtc][pct][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtc']['pct']['tabs'][0]['shortcode_content'] ) ? $home_v4['pcwtc']['pct']['tabs'][0]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtc_pct_tab_1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtc][pct][tabs][0][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtc']['pct']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtc']['pct']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );
					
				?>
				</div>			

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtc_pct_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtc][pct][tabs][1][title]',
						'value'			=> isset( $home_v4['pcwtc']['pct']['tabs'][1]['title'] ) ? $home_v4['pcwtc']['pct']['tabs'][1]['title'] : esc_html__( 'On Sale', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtc_pct_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v4[pcwtc][pct][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtc']['pct']['tabs'][1]['shortcode_content'] ) ? $home_v4['pcwtc']['pct']['tabs'][1]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtc_pct_tab_2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtc][pct][tabs][1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtc']['pct']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtc']['pct']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtc_pct_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtc][pct][tabs][2][title]',
						'value'			=> isset( $home_v4['pcwtc']['pct']['tabs'][2]['title'] ) ? $home_v4['pcwtc']['pct']['tabs'][2]['title'] : esc_html__( 'Best Rated', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtc_pct_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v4[pcwtc][pct][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtc']['pct']['tabs'][2]['shortcode_content'] ) ? $home_v4['pcwtc']['pct']['tabs'][2]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtc_pct_tab_3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtc][pct][tabs][2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtc']['pct']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtc']['pct']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );

				?>
				</div>

			
				<?php do_action( 'techmarket_home_v4_after_products_carousel_with_tabs_block' ) ?>

			</div><!-- /#products_carousel_with_tabs_block -->

			<div id="notice_block" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v4_ntc_notice_info', 
						'label' 		=> esc_html__( 'Content', 'techmarket' ), 
						'name'			=> '_home_v4[ntc][notice_info]',
						'value'			=> isset( $home_v4['ntc']['notice_info'] ) ? $home_v4['ntc']['notice_info'] : '',
					) );
				?>
				</div>

			
				<?php do_action( 'techmarket_home_v4_after_notice_block' ) ?>

			</div><!-- /#notice_block -->

			<div id="featured_products_carousel" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v4_fpc_pre_title', 
						'label' 		=>  esc_html__( 'Pre title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[fpc][pre_title]',
						'value'			=> isset( $home_v4['fpc']['pre_title'] ) ? $home_v4['fpc']['pre_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v4_fpc_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[fpc][section_title]',
						'value'			=> isset( $home_v4['fpc']['section_title'] ) ? $home_v4['fpc']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_fpc_shortcode_content',
						'label'			=> esc_html__( 'Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v4[fpc][shortcode_content]',
						'value'			=> isset( $home_v4['fpc']['shortcode_content'] ) ? $home_v4['fpc']['shortcode_content'] : '',
						'fields'		=> array( 'per_page' )
					) );
				?>
				</div>

			
				<?php do_action( 'techmarket_home_v4_after_featured_products_carousel' ) ?>

			</div><!-- /#featured_products_carousel -->

			<div id="two_column_banner" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Banner 1', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v4_brs2_br1',
							'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
							'name'			=> '_home_v4[brs2][br1]',
							'value'			=> isset( $home_v4['brs2']['br1'] ) ? $home_v4['brs2']['br1'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 2', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v4_brs2_br2',
							'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
							'name'			=> '_home_v4[brs2][br2]',
							'value'			=> isset( $home_v4['brs2']['br2'] ) ? $home_v4['brs2']['br2'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

			
				<?php do_action( 'techmarket_home_v4_after_two_column_banner' ) ?>

			</div><!-- /#two_column_banner -->

			<div id="products_tabs_carousel_with_widgets_brands" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Landscape Product Widget', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_lpcw_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][lpcw][section_title]',
						'value'			=> isset( $home_v4['pcwtb']['lpcw']['section_title'] ) ? $home_v4['pcwtb']['lpcw']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtb_lpcw_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v4[pcwtb][lpcw][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtb']['lpcw']['shortcode_content'] ) ? $home_v4['pcwtb']['lpcw']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtb_lpcw_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][lpcw][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtb']['lpcw']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtb']['lpcw']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-widget',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_pcwtb_lpcw_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][lpcw][carousel_args]',
						'value'			=> isset( $home_v4['pcwtb']['lpcw']['carousel_args'] ) ? $home_v4['pcwtb']['lpcw']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Brands Widget', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_br_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][br][number]',
						'value'			=> isset( $home_v4['pcwtb']['br']['number'] ) ? $home_v4['pcwtb']['br']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_br_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][br][orderby]',
						'value'			=> isset( $home_v4['pcwtb']['br']['orderby'] ) ? $home_v4['pcwtb']['br']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_br_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][br][order]',
						'value'			=> isset( $home_v4['pcwtb']['br']['order'] ) ? $home_v4['pcwtb']['br']['order'] : 'ASC',
					) );										
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Tab Products 1', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_pcwt1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt1][section_title]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['section_title'] ) ? $home_v4['pcwtb']['pcwt1']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt1_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt1][carousel_args]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['carousel_args'] ) ? $home_v4['pcwtb']['pcwt1']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_pcwt1_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][0][title]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][0]['title'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt1_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][0]['shortcode_content'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][0]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt1_tab_1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][0][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_pcwt1_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][1][title]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][1]['title'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt1_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][1]['shortcode_content'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][1]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt1_tab_2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_pcwt1_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][2][title]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][2]['title'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt1_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][2]['shortcode_content'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][2]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt1_tab_3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_pcwt1_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][3][title]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][3]['title'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt1_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][3]['shortcode_content'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][3]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt1_tab_4_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt1][tabs][3][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt1']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtb']['pcwt1']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );

				?>
				</div> <!-- /#carousel_with_tabs-tab-1 -->

				<?php techmarket_wp_legend( esc_html__( 'Tab Products 2', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_pcwt2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt2][section_title]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['section_title'] ) ? $home_v4['pcwtb']['pcwt2']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt2_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt2][carousel_args]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['carousel_args'] ) ? $home_v4['pcwtb']['pcwt2']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_pcwt2_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][0][title]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][0]['title'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][0]['title'] : esc_html__( 'Bestsellers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt2_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][0]['shortcode_content'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][0]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt2_tab_1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][0][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_pcwt2_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][1][title]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][1]['title'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][1]['title'] : esc_html__( 'Phones', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt2_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][1]['shortcode_content'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][1]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt2_tab_2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_pcwt2_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][2][title]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][2]['title'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][2]['title'] : esc_html__( 'Tablets', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt2_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][2]['shortcode_content'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][2]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt2_tab_3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwtb_pcwt2_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][3][title]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][3]['title'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][3]['title'] : esc_html__( 'Phone Accessories', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt2_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][3]['shortcode_content'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][3]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_pcwtb_pcwt2_tab_4_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[pcwtb][pcwt2][tabs][3][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['pcwtb']['pcwt2']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['pcwtb']['pcwt2']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] : 'content-product-featured',
					) );

				?>
				</div> <!-- /#carousel_with_tabs-tab-2 -->
			
				<?php do_action( 'techmarket_home_v4_after_products_tabs_carousel_with_widgets_brands' ) ?>

			</div><!-- /#products_tabs_carousel_with_widgets_brands -->

			<div id="products_carousel_tabs_1" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpct_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpct][section_title]',
						'value'			=> isset( $home_v4['lpct']['section_title'] ) ? $home_v4['lpct']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_lpct_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[lpct][carousel_args]',
						'value'			=> isset( $home_v4['lpct']['carousel_args'] ) ? $home_v4['lpct']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots', 'rows', 'slidesPerRow' )
					) );
					
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpct_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][0][title]',
						'value'			=> isset( $home_v4['lpct']['tabs'][0]['title'] ) ? $home_v4['lpct']['tabs'][0]['title'] : esc_html__( 'Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpct_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v4[lpct][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v4['lpct']['tabs'][0]['shortcode_content'] ) ? $home_v4['lpct']['tabs'][0]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpct_tab_1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][0][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpct']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpct']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpct_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][1][title]',
						'value'			=> isset( $home_v4['lpct']['tabs'][1]['title'] ) ? $home_v4['lpct']['tabs'][1]['title'] : esc_html__( 'Audio', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpct_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v4[lpct][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v4['lpct']['tabs'][1]['shortcode_content'] ) ? $home_v4['lpct']['tabs'][1]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpct_tab_2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpct']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpct']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpct_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][2][title]',
						'value'			=> isset( $home_v4['lpct']['tabs'][2]['title'] ) ? $home_v4['lpct']['tabs'][2]['title'] : esc_html__( 'GPS &amp; Navigation', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpct_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v4[lpct][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v4['lpct']['tabs'][2]['shortcode_content'] ) ? $home_v4['lpct']['tabs'][2]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpct_tab_3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpct']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpct']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpct_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][3][title]',
						'value'			=> isset( $home_v4['lpct']['tabs'][3]['title'] ) ? $home_v4['lpct']['tabs'][3]['title'] : esc_html__( 'TV &amp; Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpct_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v4[lpct][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v4['lpct']['tabs'][3]['shortcode_content'] ) ? $home_v4['lpct']['tabs'][3]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpct_tab_4_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][3][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpct']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpct']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpct_tab_5_title', 
						'label' 		=> esc_html__( 'Tab #5 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][4][title]',
						'value'			=> isset( $home_v4['lpct']['tabs'][4]['title'] ) ? $home_v4['lpct']['tabs'][4]['title'] : esc_html__( 'Cell Phones', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpct_tab_5_shortcode_content',
						'label'			=> esc_html__( 'Tab #5 Content', 'techmarket' ),
						'default'		=> 'best_selling_products',
						'name'			=> '_home_v4[lpct][tabs][4][shortcode_content]',
						'value'			=> isset( $home_v4['lpct']['tabs'][4]['shortcode_content'] ) ? $home_v4['lpct']['tabs'][4]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpct_tab_5_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][4][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpct']['tabs'][4]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpct']['tabs'][4]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpct_tab_6_title', 
						'label' 		=> esc_html__( 'Tab #6 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][5][title]',
						'value'			=> isset( $home_v4['lpct']['tabs'][5]['title'] ) ? $home_v4['lpct']['tabs'][5]['title'] : esc_html__( 'Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpct_tab_6_shortcode_content',
						'label'			=> esc_html__( 'Tab #6 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v4[lpct][tabs][5][shortcode_content]',
						'value'			=> isset( $home_v4['lpct']['tabs'][5]['shortcode_content'] ) ? $home_v4['lpct']['tabs'][5]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpct_tab_6_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][5][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpct']['tabs'][5]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpct']['tabs'][5]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpct_tab_7_title', 
						'label' 		=> esc_html__( 'Tab #7 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][6][title]',
						'value'			=> isset( $home_v4['lpct']['tabs'][6]['title'] ) ? $home_v4['lpct']['tabs'][6]['title'] : esc_html__( 'Accessories', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpct_tab_7_shortcode_content',
						'label'			=> esc_html__( 'Tab #7 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v4[lpct][tabs][6][shortcode_content]',
						'value'			=> isset( $home_v4['lpct']['tabs'][6]['shortcode_content'] ) ? $home_v4['lpct']['tabs'][6]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpct_tab_7_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpct][tabs][6][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpct']['tabs'][6]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpct']['tabs'][6]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );
				?>
				</div>

			
				<?php do_action( 'techmarket_home_v4_after_products_carousel_tabs_1' ) ?>

			</div><!-- /#products_carousel_tabs_1 -->

			<div id="products_carousel_tabs_2" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwt_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwt][section_title]',
						'value'			=> isset( $home_v4['pcwt']['section_title'] ) ? $home_v4['pcwt']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_pcwt_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[pcwt][carousel_args]',
						'value'			=> isset( $home_v4['pcwt']['carousel_args'] ) ? $home_v4['pcwt']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwt_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwt][tabs][0][title]',
						'value'			=> isset( $home_v4['pcwt']['tabs'][0]['title'] ) ? $home_v4['pcwt']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwt_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v4[pcwt][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v4['pcwt']['tabs'][0]['shortcode_content'] ) ? $home_v4['pcwt']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwt_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwt][tabs][1][title]',
						'value'			=> isset( $home_v4['pcwt']['tabs'][1]['title'] ) ? $home_v4['pcwt']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwt_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v4[pcwt][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v4['pcwt']['tabs'][1]['shortcode_content'] ) ? $home_v4['pcwt']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwt_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwt][tabs][2][title]',
						'value'			=> isset( $home_v4['pcwt']['tabs'][2]['title'] ) ? $home_v4['pcwt']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwt_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v4[pcwt][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v4['pcwt']['tabs'][2]['shortcode_content'] ) ? $home_v4['pcwt']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_pcwt_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[pcwt][tabs][3][title]',
						'value'			=> isset( $home_v4['pcwt']['tabs'][3]['title'] ) ? $home_v4['pcwt']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_pcwt_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v4[pcwt][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v4['pcwt']['tabs'][3]['shortcode_content'] ) ? $home_v4['pcwt']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

			
				<?php do_action( 'techmarket_home_v4_after_products_carousel_tabs_2' ) ?>

			</div><!-- /#products_carousel_tabs_2 -->

			<div id="full_width_banner" class="panel techmarket_options_panel">

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v4_sbr',
							'label'			=> esc_html__( 'Banner', 'techmarket' ),
							'name'			=> '_home_v4[sbr]',
							'value'			=> isset( $home_v4['sbr']) ? $home_v4['sbr'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

			
				<?php do_action( 'techmarket_home_v4_after_full_width_banner' ) ?>

			</div><!-- /#full_width_banner -->

			<div id="landscape_product_widgets" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Landscape Product Widget 1 ', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpcw_lpcw1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw1][section_title]',
						'value'			=> isset( $home_v4['lpcw']['lpcw1']['section_title'] ) ? $home_v4['lpcw']['lpcw1']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpcw_lpcw1_shortcode_content',
						'label'			=> esc_html__( 'Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v4[lpcw][lpcw1][shortcode_content]',
						'value'			=> isset( $home_v4['lpcw']['lpcw1']['shortcode_content'] ) ? $home_v4['lpcw']['lpcw1']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpcw_lpcw1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpcw']['lpcw1']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpcw']['lpcw1']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-widget',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_lpcw_lpcw1_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw1][carousel_args]',
						'value'			=> isset( $home_v4['lpcw']['lpcw1']['carousel_args'] ) ? $home_v4['lpcw']['lpcw1']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
				?>
				</div><!-- /#landscape_product_widget 1 -->

				<?php techmarket_wp_legend( esc_html__( 'Landscape Product Widget 2 ', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpcw_lpcw2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw2][section_title]',
						'value'			=> isset( $home_v4['lpcw']['lpcw2']['section_title'] ) ? $home_v4['lpcw']['lpcw2']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpcw_lpcw2_shortcode_content',
						'label'			=> esc_html__( 'Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v4[lpcw][lpcw2][shortcode_content]',
						'value'			=> isset( $home_v4['lpcw']['lpcw2']['shortcode_content'] ) ? $home_v4['lpcw']['lpcw2']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpcw_lpcw2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpcw']['lpcw2']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpcw']['lpcw2']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-widget',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_lpcw_lpcw2_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw2][carousel_args]',
						'value'			=> isset( $home_v4['lpcw']['lpcw2']['carousel_args'] ) ? $home_v4['lpcw']['lpcw2']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
				?>
				</div><!-- /#landscape_product_widget 2 -->

				<?php techmarket_wp_legend( esc_html__( 'Landscape Product Widget 3 ', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpcw_lpcw3_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw3][section_title]',
						'value'			=> isset( $home_v4['lpcw']['lpcw3']['section_title'] ) ? $home_v4['lpcw']['lpcw3']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpcw_lpcw3_shortcode_content',
						'label'			=> esc_html__( 'Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v4[lpcw][lpcw3][shortcode_content]',
						'value'			=> isset( $home_v4['lpcw']['lpcw3']['shortcode_content'] ) ? $home_v4['lpcw']['lpcw3']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpcw_lpcw3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw3][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpcw']['lpcw3']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpcw']['lpcw3']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-widget',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_lpcw_lpcw3_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw3][carousel_args]',
						'value'			=> isset( $home_v4['lpcw']['lpcw3']['carousel_args'] ) ? $home_v4['lpcw']['lpcw3']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
				?>
				</div><!-- /#landscape_product_widget 3 -->

				<?php techmarket_wp_legend( esc_html__( 'Landscape Product Widget 4 ', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_lpcw_lpcw4_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw4][section_title]',
						'value'			=> isset( $home_v4['lpcw']['lpcw4']['section_title'] ) ? $home_v4['lpcw']['lpcw4']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v4_lpcw_lpcw4_shortcode_content',
						'label'			=> esc_html__( 'Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v4[lpcw][lpcw4][shortcode_content]',
						'value'			=> isset( $home_v4['lpcw']['lpcw4']['shortcode_content'] ) ? $home_v4['lpcw']['lpcw4']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v4_lpcw_lpcw4_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw4][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v4['lpcw']['lpcw4']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v4['lpcw']['lpcw4']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-widget',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_lpcw_lpcw4_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[lpcw][lpcw4][carousel_args]',
						'value'			=> isset( $home_v4['lpcw']['lpcw4']['carousel_args'] ) ? $home_v4['lpcw']['lpcw4']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
				?>
				</div><!-- /#landscape_product_widget 4 -->

			
				<?php do_action( 'techmarket_home_v4_after_landscape_product_widgets' ) ?>

			</div><!-- /#landscape_product_widgets -->

			<div id="brands_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_bc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v4[bc][number]',
						'value'			=> isset( $home_v4['bc']['number'] ) ? $home_v4['bc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_bc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v4[bc][orderby]',
						'value'			=> isset( $home_v4['bc']['orderby'] ) ? $home_v4['bc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v4_bc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v4[bc][order]',
						'value'			=> isset( $home_v4['bc']['order'] ) ? $home_v4['bc']['order'] : 'ASC',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_home_v4_bc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v4[bc][hide_empty]',
						'value'			=> isset( $home_v4['bc']['hide_empty'] ) ? $home_v4['bc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v4_bc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v4[bc][carousel_args]',
						'value'			=> isset( $home_v4['bc']['carousel_args'] ) ? $home_v4['bc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v4_after_brands_carousel' ) ?>

			</div> <!-- /#brands_carousel -->

			<?php do_action( 'techmarket_home_v4_write_panel_tabs_after' ); ?>
		
		</div>
		<?php
	}

	public static function save( $post_id, $post ) {
		if ( isset( $_POST['_home_v4'] ) ) {
			$clean_home_v4_options = techmarket_clean_kses_post( $_POST['_home_v4'] );
			update_post_meta( $post_id, '_home_v4_options',  serialize( $clean_home_v4_options ) );
		}	
	}
}