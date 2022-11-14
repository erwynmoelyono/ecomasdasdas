<?php
/**
 * Home v5 Metabox
 *
 * Displays the home v5 meta box, tabbed, with several panels covering price, stock etc.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Meta_Box_Home_v5 Class.
 */
class Techmarket_Meta_Box_Home_v5 {

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

		if ( $template_file !== 'template-homepage-v5.php' ) {
			return;
		}

		self::output_home_v5( $post );
	}

	private static function output_home_v5( $post ) {

		$home_v5 = techmarket_get_home_v5_meta();

		?>
		<div class="panel-wrap meta-box-home">
			<ul class="home_data_tabs tm-tabs">
			<?php
				$product_data_tabs = apply_filters( 'techmarket_home_v5_data_tabs', array(
					'general' => array(
						'label'  => esc_html__( 'General', 'techmarket' ),
						'target' => 'general_block',
						'class'  => array(),
					),
					'slider_banner' => array(
						'label'  => esc_html__( 'Slider with Banner', 'techmarket' ),
						'target' => 'slider_banner',
						'class'  => array(),
					),
					'category_carousel' => array(
						'label'  => esc_html__( 'Category Carousel', 'techmarket' ),
						'target' => 'category_carousel',
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
					'deal_product_carousel' => array(
						'label'  => esc_html__( 'Deal Product Carousel', 'techmarket' ),
						'target' => 'deal_product_carousel',
						'class'  => array(),
					),
					'vertical_product_carousel' => array(
						'label'  => esc_html__( 'Vertical Product Carousel', 'techmarket' ),
						'target' => 'vertical_product_carousel',
						'class'  => array(),
					),
					'full_width_banner' => array(
						'label'  => esc_html__( 'Full Width Banner', 'techmarket' ),
						'target' => 'full_width_banner',
						'class'  => array(),
					),
					'product_carousel_with_feature_product' => array(
						'label'  => esc_html__( 'Tabs Carousel With Feature Product', 'techmarket' ),
						'target' => 'product_carousel_with_feature_product',
						'class'  => array(),
					),
					'products_carousel_with_image' => array(
						'label'  => esc_html__( 'Products Carousel With Image', 'techmarket' ),
						'target' => 'products_carousel_with_image',
						'class'  => array(),
					),
					'landscape_product_tabs' => array(
						'label'  => esc_html__( 'Landscape Product Tabs', 'techmarket' ),
						'target' => 'landscape_product_tabs',
						'class'  => array(),
					),
					'brands_carousel' => array(
						'label'  => esc_html__( 'Brands Carousel', 'techmarket' ),
						'target' => 'brands_carousel',
						'class'  => array(),
					)
				) );
				foreach ( $product_data_tabs as $key => $tab ) {
					?><li class="<?php echo esc_attr( $key ); ?>_options <?php echo esc_attr( $key ); ?>_tab <?php echo implode( ' ' , $tab['class'] ); ?>">
						<a href="#<?php echo esc_attr( $tab['target'] ); ?>"><?php echo esc_html( $tab['label'] ); ?></a>
					</li><?php
				}
			?>
			</ul>
			
			<?php do_action( 'techmarket_home_v5_write_panel_tabs_before' ); ?>

			<div id="general_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_select( array(
						'id'		=> '_home_v5_header_style',
						'label'		=> esc_html__( 'Header Style', 'techmarket' ),
						'name'		=> '_home_v5[header_style]',
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
						'value'		=> isset( $home_v5['header_style'] ) ? $home_v5['header_style'] : '',
					) );
				?>
				</div>
				<div class="options_group">
					<?php 
						$home_v5_blocks = array(
							'swb'	=> esc_html__( 'Slider with Banner', 'techmarket' ),
							'catc'	=> esc_html__( 'Category Carousel', 'techmarket' ),
							'pcwtc'	=> esc_html__( 'Products Carousel with Tabs Block', 'techmarket' ),
							'ntc'	=> esc_html__( 'Notice Block', 'techmarket' ),
							'dpc'	=> esc_html__( 'Deal Product Carousel', 'techmarket' ),
							'vpc'	=> esc_html__( 'Vertical Product Carousel', 'techmarket' ),
							'sbr'	=> esc_html__( 'Full Width Banner', 'techmarket' ),
							'pcwfp'	=> esc_html__( 'Tabs Carousel With Feature Product', 'techmarket' ),
							'pcwb'	=> esc_html__( 'Products Carousel With Image', 'techmarket' ),
							'ltp'	=> esc_html__( 'Landscape Product Tabs', 'techmarket' ),
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
							<?php foreach( $home_v5_blocks as $key => $home_v5_block ) : ?>
							<tr>
								<td><?php echo esc_html( $home_v5_block ); ?></td>
								<td><?php techmarket_wp_animation_dropdown( array(  'id' => '_home_v5_' . $key . '_animation', 'label'=> '', 'name' => '_home_v5[' . $key . '][animation]', 'value' => isset( $home_v5['' . $key . '']['animation'] ) ? $home_v5['' . $key . '']['animation'] : '', )); ?></td>
								<td><?php isset( $key ) && ( $key == 'bc' ) ? '' : techmarket_wp_text_input( array(  'id' => '_home_v5_' . $key . '_priority', 'label'=> '', 'name' => '_home_v5[' . $key . '][priority]', 'value' => isset( $home_v5['' . $key . '']['priority'] ) ? $home_v5['' . $key . '']['priority'] : 10, ) ); ?></td>
								<td><?php techmarket_wp_checkbox( array( 'id' => '_home_v5_' . $key . '_is_enabled', 'label' => '', 'name' => '_home_v5[' . $key . '][is_enabled]', 'value'=> isset( $home_v5['' . $key . '']['is_enabled'] ) ? $home_v5['' . $key . '']['is_enabled'] : '', ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php do_action( 'techmarket_home_v5_after_general_block' ) ?>

			</div><!-- /#general_block -->
			
			<div id="slider_banner" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Slider', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v5_swb_sdr_shortcode', 
						'label' 		=> esc_html__( 'Shortcode', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the shorcode for your slider here', 'techmarket' ),
						'name'			=> '_home_v5[swb][sdr_shortcode]',
						'value'			=> isset( $home_v5['swb']['sdr_shortcode'] ) ? $home_v5['swb']['sdr_shortcode'] : '',
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v5_swb_br1',
						'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
						'name'			=> '_home_v5[swb][br1]',
						'value'			=> isset( $home_v5['swb']['br1'] ) ? $home_v5['swb']['br1'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v5_swb_br2',
						'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
						'name'			=> '_home_v5[swb][br2]',
						'value'			=> isset( $home_v5['swb']['br2'] ) ? $home_v5['swb']['br2'] : '',
						'fields'		=> array( 'pre_title', 'title', 'price', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v5_after_slider_banner' ) ?>

			</div><!-- /#slider_banner -->

			<div id="category_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_catc_pre_title', 
						'label' 		=> esc_html__( 'Pre title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[catc][pre_title]',
						'value'			=> isset( $home_v5['catc']['pre_title'] ) ? $home_v5['catc']['pre_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_catc_section_title', 
						'label' 		=> esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[catc][section_title]',
						'value'			=> isset( $home_v5['catc']['section_title'] ) ? $home_v5['catc']['section_title'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_catc_button_text', 
						'label' 		=> esc_html__( 'Button title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[catc][button_text]',
						'value'			=> isset( $home_v5['catc']['button_text'] ) ? $home_v5['catc']['button_text'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_catc_button_link', 
						'label' 		=> esc_html__( 'Button link', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[catc][button_link]',
						'value'			=> isset( $home_v5['catc']['button_link'] ) ? $home_v5['catc']['button_link'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_catc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v5[catc][number]',
						'value'			=> isset( $home_v5['catc']['number'] ) ? $home_v5['catc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_catc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v5[catc][orderby]',
						'value'			=> isset( $home_v5['catc']['orderby'] ) ? $home_v5['catc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_catc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v5[catc][order]',
						'value'			=> isset( $home_v5['catc']['order'] ) ? $home_v5['catc']['order'] : 'ASC',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_catc_slugs', 
						'label' 		=> esc_html__( 'Slugs', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Slugs', 'techmarket' ),
						'name'			=> '_home_v5[catc][slugs]',
						'value'			=> isset( $home_v5['catc']['slugs'] ) ? $home_v5['catc']['slugs'] : '',
					) );


					techmarket_wp_checkbox( array(
						'id'			=> '_home_v5_catc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v5[catc][hide_empty]',
						'value'			=> isset( $home_v5['catc']['hide_empty'] ) ? $home_v5['catc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v5_catc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v5[catc][carousel_args]',
						'value'			=> isset( $home_v5['catc']['carousel_args'] ) ? $home_v5['catc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v5_after_category_carousel' ) ?>

			</div> <!-- /#category_carousel -->

			<div id="products_carousel_with_tabs_block" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Single Product Carousel', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_pcwtc_pc_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[pcwtc][pc][section_title]',
						'value'			=> isset( $home_v5['pcwtc']['pc']['section_title'] ) ? $home_v5['pcwtc']['pc']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwtc_pc_shortcode_content',
						'label'			=> esc_html__( 'Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v5[pcwtc][pc][shortcode_content]',
						'value'			=> isset( $home_v5['pcwtc']['pc']['shortcode_content'] ) ? $home_v5['pcwtc']['pc']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v5_pcwtc_pc_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v5[pcwtc][pc][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v5['pcwtc']['pc']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v5['pcwtc']['pc']['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v5_pcwtc_pc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v5[pcwtc][pc][carousel_args]',
						'value'			=> isset( $home_v5['pcwtc']['pc']['carousel_args'] ) ? $home_v5['pcwtc']['pc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Tab Products', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					
					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v5_pcwtc_pct_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v5[pcwtc][pct][carousel_args]',
						'value'			=> isset( $home_v5['pcwtc']['pct']['carousel_args'] ) ? $home_v5['pcwtc']['pct']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
					
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_pcwtc_pct_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[pcwtc][pct][tabs][0][title]',
						'value'			=> isset( $home_v5['pcwtc']['pct']['tabs'][0]['title'] ) ? $home_v5['pcwtc']['pct']['tabs'][0]['title'] : esc_html__( 'New Arrivals', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwtc_pct_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v5[pcwtc][pct][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v5['pcwtc']['pct']['tabs'][0]['shortcode_content'] ) ? $home_v5['pcwtc']['pct']['tabs'][0]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v5_pcwtc_pct_tab_1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v5[pcwtc][pct][tabs][0][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v5['pcwtc']['pct']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v5['pcwtc']['pct']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
					
				?>
				</div>			

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_pcwtc_pct_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[pcwtc][pct][tabs][1][title]',
						'value'			=> isset( $home_v5['pcwtc']['pct']['tabs'][1]['title'] ) ? $home_v5['pcwtc']['pct']['tabs'][1]['title'] : esc_html__( 'On Sale', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwtc_pct_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v5[pcwtc][pct][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v5['pcwtc']['pct']['tabs'][1]['shortcode_content'] ) ? $home_v5['pcwtc']['pct']['tabs'][1]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v5_pcwtc_pct_tab_2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v5[pcwtc][pct][tabs][1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v5['pcwtc']['pct']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v5['pcwtc']['pct']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_pcwtc_pct_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[pcwtc][pct][tabs][2][title]',
						'value'			=> isset( $home_v5['pcwtc']['pct']['tabs'][2]['title'] ) ? $home_v5['pcwtc']['pct']['tabs'][2]['title'] : esc_html__( 'Best Rated', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwtc_pct_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v5[pcwtc][pct][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v5['pcwtc']['pct']['tabs'][2]['shortcode_content'] ) ? $home_v5['pcwtc']['pct']['tabs'][2]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v5_pcwtc_pct_tab_3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v5[pcwtc][pct][tabs][2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v5['pcwtc']['pct']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v5['pcwtc']['pct']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );

				?>
				</div>

				<?php do_action( 'techmarket_home_v5_after_products_carousel_with_tabs_block' ) ?>

			</div><!-- /#products_carousel_with_tabs_block -->

			<div id="notice_block" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v5_ntc_notice_info', 
						'label' 		=> esc_html__( 'Content', 'techmarket' ), 
						'name'			=> '_home_v5[ntc][notice_info]',
						'value'			=> isset( $home_v5['ntc']['notice_info'] ) ? $home_v5['ntc']['notice_info'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v5_after_notice_block' ) ?>

			</div><!-- /#notice_block -->
	
			<div id="deal_product_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_dpc_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[dpc][section_title]',
						'value'			=> isset( $home_v5['dpc']['section_title'] ) ? $home_v5['dpc']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_dpc_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v5[dpc][shortcode_content]',
						'value'			=> isset( $home_v5['dpc']['shortcode_content'] ) ? $home_v5['dpc']['shortcode_content'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v5_dpc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v5[dpc][carousel_args]',
						'value'			=> isset( $home_v5['dpc']['carousel_args'] ) ? $home_v5['dpc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_home_v5_dpc_header_timer', 
						'label' 		=>  esc_html__( 'Show Timer', 'techmarket' ),
						'name'			=> '_home_v5[dpc][header_timer]',
						'value'			=> isset( $home_v5['dpc']['header_timer'] ) ? $home_v5['dpc']['header_timer'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_dpc_timer_value', 
						'label' 		=>  esc_html__( 'Timer Value', 'techmarket' ),
						'name'			=> '_home_v5[dpc][timer_value]',
						'value'			=> isset( $home_v5['dpc']['timer_value'] ) ? $home_v5['dpc']['timer_value'] : '',
					) );

				?>
				</div>				

				<?php do_action( 'techmarket_home_v5_after_deal_product_carousel' ) ?>

			</div><!-- /#deal_product_carousel -->

			<div id="vertical_product_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_vpc_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[vpc][section_title]',
						'value'			=> isset( $home_v5['vpc']['section_title'] ) ? $home_v5['vpc']['section_title'] : '',
					) );

					techmarket_wp_upload_image( array( 
							'id' 			=> '_home_v5_vpc_bg_image',
							'label'			=> esc_html__( 'Image', 'techmarket' ),
							'name'			=> '_home_v5[vpc][bg_image]',
							'value'			=> isset( $home_v5['vpc']['bg_image']) ? $home_v5['vpc']['bg_image'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v5_vpc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v5[vpc][carousel_args]',
						'value'			=> isset( $home_v5['vpc']['carousel_args'] ) ? $home_v5['vpc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_vpc_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[vpc][tabs][0][title]',
						'value'			=> isset( $home_v5['vpc']['tabs'][0]['title'] ) ? $home_v5['vpc']['tabs'][0]['title'] : esc_html__( 'Desktop PCs', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_vpc_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v5[vpc][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v5['vpc']['tabs'][0]['shortcode_content'] ) ? $home_v5['vpc']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_vpc_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[vpc][tabs][1][title]',
						'value'			=> isset( $home_v5['vpc']['tabs'][1]['title'] ) ? $home_v5['vpc']['tabs'][1]['title'] : esc_html__( 'Ultrabooks', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_vpc_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v5[vpc][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v5['vpc']['tabs'][1]['shortcode_content'] ) ? $home_v5['vpc']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_vpc_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[vpc][tabs][2][title]',
						'value'			=> isset( $home_v5['vpc']['tabs'][2]['title'] ) ? $home_v5['vpc']['tabs'][2]['title'] : esc_html__( 'Smartphones', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_vpc_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v5[vpc][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v5['vpc']['tabs'][2]['shortcode_content'] ) ? $home_v5['vpc']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_vpc_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[vpc][tabs][3][title]',
						'value'			=> isset( $home_v5['vpc']['tabs'][3]['title'] ) ? $home_v5['vpc']['tabs'][3]['title'] : esc_html__( 'Internet Cams', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_vpc_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v5[vpc][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v5['vpc']['tabs'][3]['shortcode_content'] ) ? $home_v5['vpc']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_vpc_tab_5_title', 
						'label' 		=> esc_html__( 'Tab #5 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[vpc][tabs][4][title]',
						'value'			=> isset( $home_v5['vpc']['tabs'][4]['title'] ) ? $home_v5['vpc']['tabs'][4]['title'] : esc_html__( 'Accessories', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_vpc_tab_5_shortcode_content',
						'label'			=> esc_html__( 'Tab #5 Content', 'techmarket' ),
						'default'		=> 'best_selling_products',
						'name'			=> '_home_v5[vpc][tabs][4][shortcode_content]',
						'value'			=> isset( $home_v5['vpc']['tabs'][4]['shortcode_content'] ) ? $home_v5['vpc']['tabs'][4]['shortcode_content'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v5_after_vertical_product_carousel' ) ?>

			</div><!-- /#vertical_product_carousel -->

			<div id="full_width_banner" class="panel techmarket_options_panel">

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v5_sbr',
							'label'			=> esc_html__( 'Banner', 'techmarket' ),
							'name'			=> '_home_v5[sbr]',
							'value'			=> isset( $home_v5['sbr']) ? $home_v5['sbr'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v5_after_full_width_banner' ) ?>

			</div><!-- /#full_width_banner -->

			<div id="product_carousel_with_feature_product" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_pcwfp_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[pcwfp][section_title]',
						'value'			=> isset( $home_v5['pcwfp']['section_title'] ) ? $home_v5['pcwfp']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v5_pcwfp_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v5[pcwfp][carousel_args]',
						'value'			=> isset( $home_v5['pcwfp']['carousel_args'] ) ? $home_v5['pcwfp']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'rows', 'slidesPerRow', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_pcwfp_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[pcwfp][tabs][0][title]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][0]['title'] ) ? $home_v5['pcwfp']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwfp_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v5[pcwfp][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][0]['shortcode_content'] ) ? $home_v5['pcwfp']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwfp_tab_1_shortcode_content_featured',
						'label'			=> esc_html__( 'Tab #1 Featured Product', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v5[pcwfp][tabs][0][shortcode_content_featured]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][0]['shortcode_content_featured'] ) ? $home_v5['pcwfp']['tabs'][0]['shortcode_content_featured'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_pcwfp_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[pcwfp][tabs][1][title]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][1]['title'] ) ? $home_v5['pcwfp']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwfp_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v5[pcwfp][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][1]['shortcode_content'] ) ? $home_v5['pcwfp']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwfp_tab_2_shortcode_content_featured',
						'label'			=> esc_html__( 'Tab #2 Featured Product', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v5[pcwfp][tabs][1][shortcode_content_featured]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][1]['shortcode_content_featured'] ) ? $home_v5['pcwfp']['tabs'][1]['shortcode_content_featured'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_pcwfp_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[pcwfp][tabs][2][title]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][2]['title'] ) ? $home_v5['pcwfp']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwfp_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v5[pcwfp][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][2]['shortcode_content'] ) ? $home_v5['pcwfp']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwfp_tab_3_shortcode_content_featured',
						'label'			=> esc_html__( 'Tab #3 Featured Product', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v5[pcwfp][tabs][2][shortcode_content_featured]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][2]['shortcode_content_featured'] ) ? $home_v5['pcwfp']['tabs'][2]['shortcode_content_featured'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_pcwfp_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[pcwfp][tabs][3][title]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][3]['title'] ) ? $home_v5['pcwfp']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwfp_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v5[pcwfp][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][3]['shortcode_content'] ) ? $home_v5['pcwfp']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwfp_tab_4_shortcode_content_featured',
						'label'			=> esc_html__( 'Tab #4 Featured Product', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v5[pcwfp][tabs][3][shortcode_content_featured]',
						'value'			=> isset( $home_v5['pcwfp']['tabs'][3]['shortcode_content_featured'] ) ? $home_v5['pcwfp']['tabs'][3]['shortcode_content_featured'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v5_after_product_carousel_with_feature_product' ) ?>

			</div><!-- /#product_carousel_with_feature_product -->

			<div id="products_carousel_with_image" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_pcwb_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[pcwb][section_title]',
						'value'			=> isset( $home_v5['pcwb']['section_title'] ) ? $home_v5['pcwb']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_pcwb_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v5[pcwb][shortcode_content]',
						'value'			=> isset( $home_v5['pcwb']['shortcode_content'] ) ? $home_v5['pcwb']['shortcode_content'] : '',
					) );

					techmarket_wp_upload_image( array( 
							'id' 			=> '_home_v5_pcwb_image',
							'label'			=> esc_html__( 'Image', 'techmarket' ),
							'name'			=> '_home_v5[pcwb][image]',
							'value'			=> isset( $home_v5['pcwb']['image']) ? $home_v5['pcwb']['image'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v5_pcwb_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v5[pcwb][carousel_args]',
						'value'			=> isset( $home_v5['pcwb']['carousel_args'] ) ? $home_v5['pcwb']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>
				
				<?php do_action( 'techmarket_home_v5_after_products_carousel_with_image' ) ?>

			</div> <!-- /#products_carousel_with_image -->

			<div id="landscape_product_tabs" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v5_ltp_section_title', 
						'label' 		=> esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[ltp][section_title]',
						'value'			=> isset( $home_v5['ltp']['section_title'] ) ? $home_v5['ltp']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v5_ltp_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v5[ltp][carousel_args]',
						'value'			=> isset( $home_v5['ltp']['carousel_args'] ) ? $home_v5['ltp']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'rows', 'slidesPerRow' )
					) );;					
					
				?>
				</div>
					
				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_ltp_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[ltp][tabs][0][title]',
						'value'			=> isset( $home_v5['ltp']['tabs'][0]['title'] ) ? $home_v5['ltp']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_ltp_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v5[ltp][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v5['ltp']['tabs'][0]['shortcode_content'] ) ? $home_v5['ltp']['tabs'][0]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v5_ltp_tab_1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v5[ltp][tabs][0][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v5['ltp']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v5['ltp']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_ltp_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[ltp][tabs][1][title]',
						'value'			=> isset( $home_v5['ltp']['tabs'][1]['title'] ) ? $home_v5['ltp']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_ltp_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v5[ltp][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v5['ltp']['tabs'][1]['shortcode_content'] ) ? $home_v5['ltp']['tabs'][1]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v5_ltp_tab_2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v5[ltp][tabs][1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v5['ltp']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v5['ltp']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_ltp_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[ltp][tabs][2][title]',
						'value'			=> isset( $home_v5['ltp']['tabs'][2]['title'] ) ? $home_v5['ltp']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_ltp_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v5[ltp][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v5['ltp']['tabs'][2]['shortcode_content'] ) ? $home_v5['ltp']['tabs'][2]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v5_ltp_tab_3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v5[ltp][tabs][2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v5['ltp']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v5['ltp']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_ltp_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v5[ltp][tabs][3][title]',
						'value'			=> isset( $home_v5['ltp']['tabs'][3]['title'] ) ? $home_v5['ltp']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v5_ltp_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v5[ltp][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v5['ltp']['tabs'][3]['shortcode_content'] ) ? $home_v5['ltp']['tabs'][3]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v5_ltp_tab_4_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v5[ltp][tabs][3][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v5['ltp']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v5['ltp']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product',
					) );

				?>
				</div>
				
				<?php do_action( 'techmarket_home_v5_after_landscape_product_tabs' ) ?>

			</div> <!-- /#landscape_product_tabs -->		

			<div id="brands_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_bc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v5[bc][number]',
						'value'			=> isset( $home_v5['bc']['number'] ) ? $home_v5['bc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_bc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v5[bc][orderby]',
						'value'			=> isset( $home_v5['bc']['orderby'] ) ? $home_v5['bc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v5_bc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v5[bc][order]',
						'value'			=> isset( $home_v5['bc']['order'] ) ? $home_v5['bc']['order'] : 'ASC',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_home_v5_bc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v5[bc][hide_empty]',
						'value'			=> isset( $home_v5['bc']['hide_empty'] ) ? $home_v5['bc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v5_bc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v5[bc][carousel_args]',
						'value'			=> isset( $home_v5['bc']['carousel_args'] ) ? $home_v5['bc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v5_after_brands_carousel' ) ?>

			</div> <!-- /#brands_carousel -->

			<?php do_action( 'techmarket_home_v5_write_panel_tabs_after' ); ?>
		
		</div>
		<?php
	}

	public static function save( $post_id, $post ) {
		if ( isset( $_POST['_home_v5'] ) ) {
			$clean_home_v5_options = techmarket_clean_kses_post( $_POST['_home_v5'] );
			update_post_meta( $post_id, '_home_v5_options',  serialize( $clean_home_v5_options ) );
		}	
	}
}