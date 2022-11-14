<?php
/**
 * Home v10 Metabox
 *
 * Displays the home v10 meta box, tabbed, with several panels covering price, stock etc.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Meta_Box_Home_v10 Class.
 */
class Techmarket_Meta_Box_Home_v10 {

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

		if ( $template_file !== 'template-homepage-v10.php' ) {
			return;
		}

		self::output_home_v10( $post );
	}

	private static function output_home_v10( $post ) {

		$home_v10 = techmarket_get_home_v10_meta();

		?>
		<div class="panel-wrap meta-box-home">
			<ul class="home_data_tabs tm-tabs">
			<?php
				$product_data_tabs = apply_filters( 'techmarket_home_v10_data_tabs', array(
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
					'three_column_banners_1' => array(
						'label'  => esc_html__( '3 Column Banners 1', 'techmarket' ),
						'target' => 'three_column_banners_1',
						'class'  => array(),
					),
					'products_carousel_tabs_1' => array(
						'label'  => esc_html__( 'Products Carousel Tabs 1', 'techmarket' ),
						'target' => 'products_carousel_tabs_1',
						'class'  => array(),
					),
					'notice_block' => array(
						'label'  => esc_html__( 'Notice Block', 'techmarket' ),
						'target' => 'notice_block',
						'class'  => array(),
					),
					'banner_with_product_carousel' => array(
						'label'  => esc_html__( 'Banner With Product Carousel', 'techmarket' ),
						'target' => 'banner_with_product_carousel',
						'class'  => array(),
					),
					'products_carousel_tabs_2' => array(
						'label'  => esc_html__( 'Products Carousel Tabs 2', 'techmarket' ),
						'target' => 'products_carousel_tabs_2',
						'class'  => array(),
					),
					'three_column_banners_2' => array(
						'label'  => esc_html__( '3 Column Banners 2', 'techmarket' ),
						'target' => 'three_column_banners_2',
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

			<?php do_action( 'techmarket_home_v10_write_panel_tabs_before' ); ?>
			
			<div id="general_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_select( array(
						'id'		=> '_home_v10_header_style',
						'label'		=> esc_html__( 'Header Style', 'techmarket' ),
						'name'		=> '_home_v10[header_style]',
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
						'value'		=> isset( $home_v10['header_style'] ) ? $home_v10['header_style'] : '',
					) );
				?>
				</div>
				<div class="options_group">
					<?php 
						$home_v10_blocks = array(
							'sdr'	=> esc_html__( 'Slider', 'techmarket' ),
							'brs1'	=> esc_html__( '3 Column Banners 1', 'techmarket' ),
							'pct1'	=> esc_html__( 'Products Carousel Tabs 1', 'techmarket' ),
							'ntc'	=> esc_html__( 'Notice Block', 'techmarket' ),
							'brwpc'	=> esc_html__( 'Banner With Product Carousel', 'techmarket' ),
							'pct2'	=> esc_html__( 'Products Carousel Tabs 2', 'techmarket' ),
							'brs2'	=> esc_html__( '3 Column Banners 2', 'techmarket' ),
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
							<?php foreach( $home_v10_blocks as $key => $home_v10_block ) : ?>
							<tr>
								<td><?php echo esc_html( $home_v10_block ); ?></td>
								<td><?php techmarket_wp_animation_dropdown( array(  'id' => '_home_v10_' . $key . '_animation', 'label'=> '', 'name' => '_home_v10[' . $key . '][animation]', 'value' => isset( $home_v10['' . $key . '']['animation'] ) ? $home_v10['' . $key . '']['animation'] : '', )); ?></td>
								<td><?php techmarket_wp_text_input( array(  'id' => '_home_v10_' . $key . '_priority', 'label'=> '', 'name' => '_home_v10[' . $key . '][priority]', 'value' => isset( $home_v10['' . $key . '']['priority'] ) ? $home_v10['' . $key . '']['priority'] : 10, ) ); ?></td>
								<td><?php techmarket_wp_checkbox( array( 'id' => '_home_v10_' . $key . '_is_enabled', 'label' => '', 'name' => '_home_v10[' . $key . '][is_enabled]', 'value'=> isset( $home_v10['' . $key . '']['is_enabled'] ) ? $home_v10['' . $key . '']['is_enabled'] : '', ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php do_action( 'techmarket_home_v10_after_general_block' ) ?>

			</div><!-- /#general_block -->
			
			<div id="slider_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v10_sdr_shortcode', 
						'label' 		=> esc_html__( 'Shortcode', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the shorcode for your slider here', 'techmarket' ),
						'name'			=> '_home_v10[sdr][shortcode]',
						'value'			=> isset( $home_v10['sdr']['shortcode'] ) ? $home_v10['sdr']['shortcode'] : '',
					) );
				?>
				</div>
				<?php do_action( 'techmarket_home_v10_after_slider_block' ) ?>

			</div><!-- /#slider_block -->

			<div id="three_column_banners_1" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Banner 1', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v10_brs1_br1',
							'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
							'name'			=> '_home_v10[brs1][br1]',
							'value'			=> isset( $home_v10['brs1']['br1'] ) ? $home_v10['brs1']['br1'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 2', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v10_brs1_br2',
							'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
							'name'			=> '_home_v10[brs1][br2]',
							'value'			=> isset( $home_v10['brs1']['br2'] ) ? $home_v10['brs1']['br2'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 3', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v10_brs1_br3',
							'label'			=> esc_html__( 'Banner 3', 'techmarket' ),
							'name'			=> '_home_v10[brs1][br3]',
							'value'			=> isset( $home_v10['brs1']['br3'] ) ? $home_v10['brs1']['br3'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 4', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v10_brs1_br4',
							'label'			=> esc_html__( 'Banner 4', 'techmarket' ),
							'name'			=> '_home_v10[brs1][br4]',
							'value'			=> isset( $home_v10['brs1']['br4'] ) ? $home_v10['brs1']['br4'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v10_after_three_column_banners_1' ) ?>

			</div><!-- /#three_column_banners_1 -->

			<div id="products_carousel_tabs_1" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct1][section_title]',
						'value'			=> isset( $home_v10['pct1']['section_title'] ) ? $home_v10['pct1']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v10_pct1_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v10[pct1][carousel_args]',
						'value'			=> isset( $home_v10['pct1']['carousel_args'] ) ? $home_v10['pct1']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct1_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][0][title]',
						'value'			=> isset( $home_v10['pct1']['tabs'][0]['title'] ) ? $home_v10['pct1']['tabs'][0]['title'] : esc_html__( 'All Shoes', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct1_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v10[pct1][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v10['pct1']['tabs'][0]['shortcode_content'] ) ? $home_v10['pct1']['tabs'][0]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v10_pct1_tab_1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][0][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v10['pct1']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v10['pct1']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct1_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][1][title]',
						'value'			=> isset( $home_v10['pct1']['tabs'][1]['title'] ) ? $home_v10['pct1']['tabs'][1]['title'] : esc_html__( 'Men', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct1_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v10[pct1][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v10['pct1']['tabs'][1]['shortcode_content'] ) ? $home_v10['pct1']['tabs'][1]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v10_pct1_tab_2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v10['pct1']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v10['pct1']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct1_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][2][title]',
						'value'			=> isset( $home_v10['pct1']['tabs'][2]['title'] ) ? $home_v10['pct1']['tabs'][2]['title'] : esc_html__( 'Women', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct1_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v10[pct1][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v10['pct1']['tabs'][2]['shortcode_content'] ) ? $home_v10['pct1']['tabs'][2]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v10_pct1_tab_3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v10['pct1']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v10['pct1']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct1_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][3][title]',
						'value'			=> isset( $home_v10['pct1']['tabs'][3]['title'] ) ? $home_v10['pct1']['tabs'][3]['title'] : esc_html__( 'Boys', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct1_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v10[pct1][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v10['pct1']['tabs'][3]['shortcode_content'] ) ? $home_v10['pct1']['tabs'][3]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v10_pct1_tab_4_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][3][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v10['pct1']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v10['pct1']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct1_tab_5_title', 
						'label' 		=> esc_html__( 'Tab #5 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][4][title]',
						'value'			=> isset( $home_v10['pct1']['tabs'][4]['title'] ) ? $home_v10['pct1']['tabs'][4]['title'] : esc_html__( 'Girls', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct1_tab_5_shortcode_content',
						'label'			=> esc_html__( 'Tab #5 Content', 'techmarket' ),
						'default'		=> 'best_selling_products',
						'name'			=> '_home_v10[pct1][tabs][4][shortcode_content]',
						'value'			=> isset( $home_v10['pct1']['tabs'][4]['shortcode_content'] ) ? $home_v10['pct1']['tabs'][4]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v10_pct1_tab_5_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][4][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v10['pct1']['tabs'][4]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v10['pct1']['tabs'][4]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct1_tab_6_title', 
						'label' 		=> esc_html__( 'Tab #6 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][5][title]',
						'value'			=> isset( $home_v10['pct1']['tabs'][5]['title'] ) ? $home_v10['pct1']['tabs'][5]['title'] : esc_html__( 'Teens', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct1_tab_6_shortcode_content',
						'label'			=> esc_html__( 'Tab #6 Content', 'techmarket' ),
						'default'		=> 'best_selling_products',
						'name'			=> '_home_v10[pct1][tabs][5][shortcode_content]',
						'value'			=> isset( $home_v10['pct1']['tabs'][5]['shortcode_content'] ) ? $home_v10['pct1']['tabs'][5]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v10_pct1_tab_6_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v10[pct1][tabs][5][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v10['pct1']['tabs'][5]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v10['pct1']['tabs'][5]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v10_after_products_carousel_tabs_1' ) ?>

			</div><!-- /#products_carousel_tabs_1 -->

			<div id="notice_block" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v10_ntc_notice_info', 
						'label' 		=> esc_html__( 'Content', 'techmarket' ), 
						'name'			=> '_home_v10[ntc][notice_info]',
						'value'			=> isset( $home_v10['ntc']['notice_info'] ) ? $home_v10['ntc']['notice_info'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v10_after_notice_block' ) ?>

			</div><!-- /#notice_block -->

			<div id="banner_with_product_carousel" class="panel techmarket_options_panel">
				
				<?php techmarket_wp_legend( esc_html__( 'Banner', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v10_brwpc_br',
						'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
						'name'			=> '_home_v10[brwpc][br]',
						'value'			=> isset( $home_v10['brwpc']['br'] ) ? $home_v10['brwpc']['br'] : '',
						'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Products Carousel', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_brwpc_pc_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v10[brwpc][pc][shortcode_content]',
						'value'			=> isset( $home_v10['brwpc']['pc']['shortcode_content'] ) ? $home_v10['brwpc']['pc']['shortcode_content'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v10_brwpc_pc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v10[brwpc][pc][carousel_args]',
						'value'			=> isset( $home_v10['brwpc']['pc']['carousel_args'] ) ? $home_v10['brwpc']['pc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v10_brwpc_pc_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v10[brwpc][pc][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v10['brwpc']['pc']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v10['brwpc']['pc']['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v10_after_banner_with_product_carousel' ) ?>

			</div><!-- /#banner_with_product_carousel -->

			<div id="products_carousel_tabs_2" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct2][section_title]',
						'value'			=> isset( $home_v10['pct2']['section_title'] ) ? $home_v10['pct2']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v10_pct2_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v10[pct2][carousel_args]',
						'value'			=> isset( $home_v10['pct2']['carousel_args'] ) ? $home_v10['pct2']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots', 'rows', 'slidesPerRow' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct2_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct2][tabs][0][title]',
						'value'			=> isset( $home_v10['pct2']['tabs'][0]['title'] ) ? $home_v10['pct2']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct2_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v10[pct2][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v10['pct2']['tabs'][0]['shortcode_content'] ) ? $home_v10['pct2']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct2_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct2][tabs][1][title]',
						'value'			=> isset( $home_v10['pct2']['tabs'][1]['title'] ) ? $home_v10['pct2']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct2_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v10[pct2][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v10['pct2']['tabs'][1]['shortcode_content'] ) ? $home_v10['pct2']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct2_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct2][tabs][2][title]',
						'value'			=> isset( $home_v10['pct2']['tabs'][2]['title'] ) ? $home_v10['pct2']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct2_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v10[pct2][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v10['pct2']['tabs'][2]['shortcode_content'] ) ? $home_v10['pct2']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct2_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct2][tabs][3][title]',
						'value'			=> isset( $home_v10['pct2']['tabs'][3]['title'] ) ? $home_v10['pct2']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct2_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v10[pct2][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v10['pct2']['tabs'][3]['shortcode_content'] ) ? $home_v10['pct2']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_pct2_tab_5_title', 
						'label' 		=> esc_html__( 'Tab #5 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v10[pct2][tabs][4][title]',
						'value'			=> isset( $home_v10['pct2']['tabs'][4]['title'] ) ? $home_v10['pct2']['tabs'][4]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v10_pct2_tab_5_shortcode_content',
						'label'			=> esc_html__( 'Tab #5 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v10[pct2][tabs][4][shortcode_content]',
						'value'			=> isset( $home_v10['pct2']['tabs'][4]['shortcode_content'] ) ? $home_v10['pct2']['tabs'][4]['shortcode_content'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v10_after_products_carousel_tabs_2' ) ?>

			</div><!-- /#products_carousel_tabs_2 -->

			<div id="three_column_banners_2" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Banner 1', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v10_brs2_br1',
							'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
							'name'			=> '_home_v10[brs2][br1]',
							'value'			=> isset( $home_v10['brs2']['br1'] ) ? $home_v10['brs2']['br1'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 2', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v10_brs2_br2',
							'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
							'name'			=> '_home_v10[brs2][br2]',
							'value'			=> isset( $home_v10['brs2']['br2'] ) ? $home_v10['brs2']['br2'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 3', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v10_brs2_br3',
							'label'			=> esc_html__( 'Banner 3', 'techmarket' ),
							'name'			=> '_home_v10[brs2][br3]',
							'value'			=> isset( $home_v10['brs2']['br3'] ) ? $home_v10['brs2']['br3'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 4', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v10_brs2_br4',
							'label'			=> esc_html__( 'Banner 4', 'techmarket' ),
							'name'			=> '_home_v10[brs2][br4]',
							'value'			=> isset( $home_v10['brs2']['br4'] ) ? $home_v10['brs2']['br4'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v10_after_three_column_banners_2' ) ?>

			</div><!-- /#three_column_banners_2 -->

			<div id="brands_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_bc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v10[bc][number]',
						'value'			=> isset( $home_v10['bc']['number'] ) ? $home_v10['bc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_bc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v10[bc][orderby]',
						'value'			=> isset( $home_v10['bc']['orderby'] ) ? $home_v10['bc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v10_bc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v10[bc][order]',
						'value'			=> isset( $home_v10['bc']['order'] ) ? $home_v10['bc']['order'] : 'ASC',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_home_v10_bc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v10[bc][hide_empty]',
						'value'			=> isset( $home_v10['bc']['hide_empty'] ) ? $home_v10['bc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v10_bc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v10[bc][carousel_args]',
						'value'			=> isset( $home_v10['bc']['carousel_args'] ) ? $home_v10['bc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v10_after_brands_carousel' ) ?>

			</div> <!-- /#brands_carousel -->

			<?php do_action( 'techmarket_home_v10_write_panel_tabs_after' ); ?>

		</div>
		<?php
	}

	public static function save( $post_id, $post ) {
		if ( isset( $_POST['_home_v10'] ) ) {
			$clean_home_v10_options = techmarket_clean_kses_post( $_POST['_home_v10'] );
			update_post_meta( $post_id, '_home_v10_options',  serialize( $clean_home_v10_options ) );
		}	
	}
}