<?php
/**
 * Home v2 Metabox
 *
 * Displays the home v2 meta box, tabbed, with several panels covering price, stock etc.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Meta_Box_Home_v2 Class.
 */
class Techmarket_Meta_Box_Home_v2 {

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

		if ( $template_file !== 'template-homepage-v2.php' ) {
			return;
		}

		self::output_home_v2( $post );
	}

	private static function output_home_v2( $post ) {

		$home_v2 = techmarket_get_home_v2_meta();

		?>
		<div class="panel-wrap meta-box-home">
			<ul class="home_data_tabs tm-tabs">
			<?php
				$product_data_tabs = apply_filters( 'techmarket_home_v2_data_tabs', array(
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
					'six_one_six_tabs' => array(
						'label'  => esc_html__( '6-1-6 Tabs', 'techmarket' ),
						'target' => 'six_one_six_tabs',
						'class'  => array(),
					),
					'notice_block' => array(
						'label'  => esc_html__( 'Notice Block', 'techmarket' ),
						'target' => 'notice_block',
						'class'  => array(),
					),
					'three_column_banner' => array(
						'label'  => esc_html__( '3-Column banner', 'techmarket' ),
						'target' => 'three_column_banner',
						'class'  => array(),
					),
					'products_carousel_tabs_1' => array(
						'label'  => esc_html__( 'Products Carousel Tabs 1', 'techmarket' ),
						'target' => 'products_carousel_tabs_1',
						'class'  => array(),
					),
					'three_two_three_tabs' => array(
						'label'  => esc_html__( '3-2-3 Tabs', 'techmarket' ),
						'target' => 'three_two_three_tabs',
						'class'  => array(),
					),
					'products_carousel_tabs_2' => array(
						'label'  => esc_html__( 'Products Carousel Tabs 2', 'techmarket' ),
						'target' => 'products_carousel_tabs_2',
						'class'  => array(),
					),
					'full_width_banner' => array(
						'label'  => esc_html__( 'Full Width Banner', 'techmarket' ),
						'target' => 'full_width_banner',
						'class'  => array(),
					),
					'products_carousel_with_image' => array(
						'label'  => esc_html__( 'Products Carousel With Image', 'techmarket' ),
						'target' => 'products_carousel_with_image',
						'class'  => array(),
					),
					'carousel_with_tabs' => array(
						'label'  => esc_html__( 'Carousel With Tabs', 'techmarket' ),
						'target' => 'carousel_with_tabs',
						'class'  => array(),
					),
					'brands_carousel' => array(
						'label'  => esc_html__( 'Brands Carousel', 'techmarket' ),
						'target' => 'brands_carousel',
						'class'  => array(),
					),
					'landscape_product_carousel' => array(
						'label'  => esc_html__( 'Landscape Product Carousel', 'techmarket' ),
						'target' => 'landscape_product_carousel',
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
			
			<?php do_action( 'techmarket_home_v2_write_panel_tabs_before' ); ?>

			<div id="general_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_select( array(
						'id'		=> '_home_v2_header_style',
						'label'		=> esc_html__( 'Header Style', 'techmarket' ),
						'name'		=> '_home_v2[header_style]',
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
						'value'		=> isset( $home_v2['header_style'] ) ? $home_v2['header_style'] : '',
					) );
				?>
				</div>
				<div class="options_group">
					<?php 
						$home_v2_blocks = array(
							'swb'	=> esc_html__( 'Slider with Banner', 'techmarket' ),
							'catc'	=> esc_html__( 'Category Carousel', 'techmarket' ),
							'sost'	=> esc_html__( '6-1-6 Tabs', 'techmarket' ),
							'ntc'	=> esc_html__( 'Notice Block', 'techmarket' ),
							'brs'	=> esc_html__( '3-Column banner', 'techmarket' ),
							'pct1'	=> esc_html__( 'Products Carousel Tabs 1', 'techmarket' ),
							'ttot'	=> esc_html__( '3-2-3 Tabs', 'techmarket' ),
							'pct2'	=> esc_html__( 'Products Carousel Tabs 2', 'techmarket' ),
							'sbr'	=> esc_html__( 'Full Width Banner', 'techmarket' ),
							'pcwb'	=> esc_html__( 'Products Carousel With Image', 'techmarket' ),
							'pcwtc'	=> esc_html__( 'Carousel With Tabs', 'techmarket' ),
							'bc'	=> esc_html__( 'Brands Carousel', 'techmarket' ),
							'lpc'	=> esc_html__( 'Landscape Product Carousel', 'techmarket' )
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
							<?php foreach( $home_v2_blocks as $key => $home_v2_block ) : ?>
							<tr>
								<td><?php echo esc_html( $home_v2_block ); ?></td>
								<td><?php techmarket_wp_animation_dropdown( array(  'id' => '_home_v2_' . $key . '_animation', 'label'=> '', 'name' => '_home_v2[' . $key . '][animation]', 'value' => isset( $home_v2['' . $key . '']['animation'] ) ? $home_v2['' . $key . '']['animation'] : '', )); ?></td>
								<td><?php techmarket_wp_text_input( array(  'id' => '_home_v2_' . $key . '_priority', 'label'=> '', 'name' => '_home_v2[' . $key . '][priority]', 'value' => isset( $home_v2['' . $key . '']['priority'] ) ? $home_v2['' . $key . '']['priority'] : 10, ) ); ?></td>
								<td><?php techmarket_wp_checkbox( array( 'id' => '_home_v2_' . $key . '_is_enabled', 'label' => '', 'name' => '_home_v2[' . $key . '][is_enabled]', 'value'=> isset( $home_v2['' . $key . '']['is_enabled'] ) ? $home_v2['' . $key . '']['is_enabled'] : '', ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php do_action( 'techmarket_home_v2_after_general_block' ) ?>

			</div><!-- /#general_block -->
			
			<div id="slider_banner" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Slider', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v2_swb_sdr_shortcode', 
						'label' 		=> esc_html__( 'Shortcode', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the shorcode for your slider here', 'techmarket' ),
						'name'			=> '_home_v2[swb][sdr_shortcode]',
						'value'			=> isset( $home_v2['swb']['sdr_shortcode'] ) ? $home_v2['swb']['sdr_shortcode'] : '',
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v2_swb_br1',
						'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
						'name'			=> '_home_v2[swb][br1]',
						'value'			=> isset( $home_v2['swb']['br1'] ) ? $home_v2['swb']['br1'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v2_swb_br2',
						'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
						'name'			=> '_home_v2[swb][br2]',
						'value'			=> isset( $home_v2['swb']['br2'] ) ? $home_v2['swb']['br2'] : '',
						'fields'		=> array( 'pre_title', 'title', 'price', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_slider_banner' ) ?>

			</div><!-- /#slider_banner -->

			<div id="category_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_catc_section_title', 
						'label' 		=> esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[catc][section_title]',
						'value'			=> isset( $home_v2['catc']['section_title'] ) ? $home_v2['catc']['section_title'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_catc_button_text', 
						'label' 		=> esc_html__( 'Button title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[catc][button_text]',
						'value'			=> isset( $home_v2['catc']['button_text'] ) ? $home_v2['catc']['button_text'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_catc_button_link', 
						'label' 		=> esc_html__( 'Button link', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[catc][button_link]',
						'value'			=> isset( $home_v2['catc']['button_link'] ) ? $home_v2['catc']['button_link'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_catc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v2[catc][number]',
						'value'			=> isset( $home_v2['catc']['number'] ) ? $home_v2['catc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_catc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v2[catc][orderby]',
						'value'			=> isset( $home_v2['catc']['orderby'] ) ? $home_v2['catc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_catc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v2[catc][order]',
						'value'			=> isset( $home_v2['catc']['order'] ) ? $home_v2['catc']['order'] : 'ASC',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_catc_slugs', 
						'label' 		=> esc_html__( 'Slugs', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Slugs', 'techmarket' ),
						'name'			=> '_home_v2[catc][slugs]',
						'value'			=> isset( $home_v2['catc']['slugs'] ) ? $home_v2['catc']['slugs'] : '',
					) );


					techmarket_wp_checkbox( array(
						'id'			=> '_home_v2_catc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v2[catc][hide_empty]',
						'value'			=> isset( $home_v2['catc']['hide_empty'] ) ? $home_v2['catc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v2_catc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v2[catc][carousel_args]',
						'value'			=> isset( $home_v2['catc']['carousel_args'] ) ? $home_v2['catc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll')
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_category_carousel' ) ?>

			</div> <!-- /#category_carousel -->

			<div id="six_one_six_tabs" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v2_sost_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[sost][section_title]',
						'value'			=> isset( $home_v2['sost']['section_title'] ) ? $home_v2['sost']['section_title'] : '',
					) );
				?>
				</div>
				
				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_sost_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[sost][tabs][0][title]',
						'value'			=> isset( $home_v2['sost']['tabs'][0]['title'] ) ? $home_v2['sost']['tabs'][0]['title'] : esc_html__( '-30%', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_sost_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v2[sost][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v2['sost']['tabs'][0]['shortcode_content'] ) ? $home_v2['sost']['tabs'][0]['shortcode_content'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_sost_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[sost][tabs][1][title]',
						'value'			=> isset( $home_v2['sost']['tabs'][1]['title'] ) ? $home_v2['sost']['tabs'][1]['title'] : esc_html__( '-50%', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_sost_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v2[sost][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v2['sost']['tabs'][1]['shortcode_content'] ) ? $home_v2['sost']['tabs'][1]['shortcode_content'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_sost_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[sost][tabs][2][title]',
						'value'			=> isset( $home_v2['sost']['tabs'][2]['title'] ) ? $home_v2['sost']['tabs'][2]['title'] : esc_html__( '-70%', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_sost_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v2[sost][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v2['sost']['tabs'][2]['shortcode_content'] ) ? $home_v2['sost']['tabs'][2]['shortcode_content'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_six_one_six_tabs' ) ?>

			</div><!-- /#six_one_six_tabs -->

			<div id="notice_block" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v2_ntc_notice_info', 
						'label' 		=> esc_html__( 'Content', 'techmarket' ), 
						'name'			=> '_home_v2[ntc][notice_info]',
						'value'			=> isset( $home_v2['ntc']['notice_info'] ) ? $home_v2['ntc']['notice_info'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_notice_block' ) ?>

			</div><!-- /#notice_block -->

			<div id="three_column_banner" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Banner 1', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v2_brs_br1',
							'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
							'name'			=> '_home_v2[brs][br1]',
							'value'			=> isset( $home_v2['brs']['br1'] ) ? $home_v2['brs']['br1'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 2', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v2_brs_br2',
							'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
							'name'			=> '_home_v2[brs][br2]',
							'value'			=> isset( $home_v2['brs']['br2'] ) ? $home_v2['brs']['br2'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 3', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v2_brs_br3',
							'label'			=> esc_html__( 'Banner 3', 'techmarket' ),
							'name'			=> '_home_v2[brs][br3]',
							'value'			=> isset( $home_v2['brs']['br3'] ) ? $home_v2['brs']['br3'] : '',
							'fields'		=> array( 'title', 'price', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_three_column_banner' ) ?>

			</div><!-- /#three_column_banner -->
			
			<div id="products_carousel_tabs_1" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pct1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pct1][section_title]',
						'value'			=> isset( $home_v2['pct1']['section_title'] ) ? $home_v2['pct1']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v2_pct1_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v2[pct1][carousel_args]',
						'value'			=> isset( $home_v2['pct1']['carousel_args'] ) ? $home_v2['pct1']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots', )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pct1_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pct1][tabs][0][title]',
						'value'			=> isset( $home_v2['pct1']['tabs'][0]['title'] ) ? $home_v2['pct1']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pct1_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v2[pct1][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v2['pct1']['tabs'][0]['shortcode_content'] ) ? $home_v2['pct1']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pct1_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pct1][tabs][1][title]',
						'value'			=> isset( $home_v2['pct1']['tabs'][1]['title'] ) ? $home_v2['pct1']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pct1_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'best_selling_products',
						'name'			=> '_home_v2[pct1][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v2['pct1']['tabs'][1]['shortcode_content'] ) ? $home_v2['pct1']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pct1_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pct1][tabs][2][title]',
						'value'			=> isset( $home_v2['pct1']['tabs'][2]['title'] ) ? $home_v2['pct1']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pct1_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v2[pct1][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v2['pct1']['tabs'][2]['shortcode_content'] ) ? $home_v2['pct1']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pct1_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pct1][tabs][3][title]',
						'value'			=> isset( $home_v2['pct1']['tabs'][3]['title'] ) ? $home_v2['pct1']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pct1_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v2[pct1][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v2['pct1']['tabs'][3]['shortcode_content'] ) ? $home_v2['pct1']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_products_carousel_tabs_1' ) ?>

			</div><!-- /#products_carousel_tabs_1 -->

			<div id="three_two_three_tabs" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v2_ttot_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[ttot][section_title]',
						'value'			=> isset( $home_v2['ttot']['section_title'] ) ? $home_v2['ttot']['section_title'] : '',
					) );
				?>
				</div>
				
				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_ttot_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[ttot][tabs][0][title]',
						'value'			=> isset( $home_v2['ttot']['tabs'][0]['title'] ) ? $home_v2['ttot']['tabs'][0]['title'] : esc_html__( 'Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_ttot_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v2[ttot][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v2['ttot']['tabs'][0]['shortcode_content'] ) ? $home_v2['ttot']['tabs'][0]['shortcode_content'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_ttot_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[ttot][tabs][1][title]',
						'value'			=> isset( $home_v2['ttot']['tabs'][1]['title'] ) ? $home_v2['ttot']['tabs'][1]['title'] : esc_html__( 'Audio', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_ttot_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v2[ttot][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v2['ttot']['tabs'][1]['shortcode_content'] ) ? $home_v2['ttot']['tabs'][1]['shortcode_content'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_ttot_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[ttot][tabs][2][title]',
						'value'			=> isset( $home_v2['ttot']['tabs'][2]['title'] ) ? $home_v2['ttot']['tabs'][2]['title'] : esc_html__( 'GPS &amp; Navigation', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_ttot_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v2[ttot][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v2['ttot']['tabs'][2]['shortcode_content'] ) ? $home_v2['ttot']['tabs'][2]['shortcode_content'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_ttot_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[ttot][tabs][3][title]',
						'value'			=> isset( $home_v2['ttot']['tabs'][3]['title'] ) ? $home_v2['ttot']['tabs'][3]['title'] : esc_html__( 'TV &amp; Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_ttot_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v2[ttot][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v2['ttot']['tabs'][3]['shortcode_content'] ) ? $home_v2['ttot']['tabs'][3]['shortcode_content'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_ttot_tab_5_title', 
						'label' 		=> esc_html__( 'Tab #5 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[ttot][tabs][4][title]',
						'value'			=> isset( $home_v2['ttot']['tabs'][4]['title'] ) ? $home_v2['ttot']['tabs'][4]['title'] : esc_html__( 'Cell Phones', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_ttot_tab_5_shortcode_content',
						'label'			=> esc_html__( 'Tab #5 Content', 'techmarket' ),
						'default'		=> 'best_selling_products',
						'name'			=> '_home_v2[ttot][tabs][4][shortcode_content]',
						'value'			=> isset( $home_v2['ttot']['tabs'][4]['shortcode_content'] ) ? $home_v2['ttot']['tabs'][4]['shortcode_content'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_ttot_tab_6_title', 
						'label' 		=> esc_html__( 'Tab #6 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[ttot][tabs][5][title]',
						'value'			=> isset( $home_v2['ttot']['tabs'][5]['title'] ) ? $home_v2['ttot']['tabs'][5]['title'] : esc_html__( 'Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_ttot_tab_6_shortcode_content',
						'label'			=> esc_html__( 'Tab #6 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v2[ttot][tabs][5][shortcode_content]',
						'value'			=> isset( $home_v2['ttot']['tabs'][5]['shortcode_content'] ) ? $home_v2['ttot']['tabs'][5]['shortcode_content'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_ttot_tab_7_title', 
						'label' 		=> esc_html__( 'Tab #7 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[ttot][tabs][6][title]',
						'value'			=> isset( $home_v2['ttot']['tabs'][6]['title'] ) ? $home_v2['ttot']['tabs'][6]['title'] : esc_html__( 'Accessories', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_ttot_tab_7_shortcode_content',
						'label'			=> esc_html__( 'Tab #7 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v2[ttot][tabs][6][shortcode_content]',
						'value'			=> isset( $home_v2['ttot']['tabs'][6]['shortcode_content'] ) ? $home_v2['ttot']['tabs'][6]['shortcode_content'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_three_two_three_tab' ) ?>

			</div><!-- /#three_two_three_tab -->

			<div id="products_carousel_tabs_2" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pct2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pct2][section_title]',
						'value'			=> isset( $home_v2['pct2']['section_title'] ) ? $home_v2['pct2']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v2_pct2_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v2[pct2][carousel_args]',
						'value'			=> isset( $home_v2['pct2']['carousel_args'] ) ? $home_v2['pct2']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll','dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pct2_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pct2][tabs][0][title]',
						'value'			=> isset( $home_v2['pct2']['tabs'][0]['title'] ) ? $home_v2['pct2']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pct2_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v2[pct2][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v2['pct2']['tabs'][0]['shortcode_content'] ) ? $home_v2['pct2']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pct2_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pct2][tabs][1][title]',
						'value'			=> isset( $home_v2['pct2']['tabs'][1]['title'] ) ? $home_v2['pct2']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pct2_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'best_selling_products',
						'name'			=> '_home_v2[pct2][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v2['pct2']['tabs'][1]['shortcode_content'] ) ? $home_v2['pct2']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pct2_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pct2][tabs][2][title]',
						'value'			=> isset( $home_v2['pct2']['tabs'][2]['title'] ) ? $home_v2['pct2']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pct2_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v2[pct2][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v2['pct2']['tabs'][2]['shortcode_content'] ) ? $home_v2['pct2']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pct2_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pct2][tabs][3][title]',
						'value'			=> isset( $home_v2['pct2']['tabs'][3]['title'] ) ? $home_v2['pct2']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pct2_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v2[pct2][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v2['pct2']['tabs'][3]['shortcode_content'] ) ? $home_v2['pct2']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_products_carousel_tabs_2' ) ?>

			</div><!-- /#products_carousel_tabs_2 -->

			<div id="full_width_banner" class="panel techmarket_options_panel">

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v2_sbr_br2',
							'label'			=> esc_html__( 'Banner', 'techmarket' ),
							'name'			=> '_home_v2[sbr]',
							'value'			=> isset( $home_v2['sbr']) ? $home_v2['sbr'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_full_width_banner' ) ?>

			</div><!-- /#full_width_banner -->

			<div id="products_carousel_with_image" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v2_pcwb_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwb][section_title]',
						'value'			=> isset( $home_v2['pcwb']['section_title'] ) ? $home_v2['pcwb']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pcwb_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v2[pcwb][shortcode_content]',
						'value'			=> isset( $home_v2['pcwb']['shortcode_content'] ) ? $home_v2['pcwb']['shortcode_content'] : '',
					) );

					techmarket_wp_upload_image( array( 
							'id' 			=> '_home_v2_pcwb_image',
							'label'			=> esc_html__( 'Image', 'techmarket' ),
							'name'			=> '_home_v2[pcwb][image]',
							'value'			=> isset( $home_v2['pcwb']['image']) ? $home_v2['pcwb']['image'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v2_pcwb_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v2[pcwb][carousel_args]',
						'value'			=> isset( $home_v2['pcwb']['carousel_args'] ) ? $home_v2['pcwb']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>
				
				<?php do_action( 'techmarket_home_v2_after_products_carousel_with_image' ) ?>

			</div> <!-- /#products_carousel_with_image -->

			<div id="carousel_with_tabs" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Products Carousel', 'techmarket' ) ); ?>
			
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_lpcw_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][lpcw][section_title]',
						'value'			=> isset( $home_v2['pcwtc']['lpcw']['section_title'] ) ? $home_v2['pcwtc']['lpcw']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pcwtc_lpcw_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v2[pcwtc][lpcw][shortcode_content]',
						'value'			=> isset( $home_v2['pcwtc']['lpcw']['shortcode_content'] ) ? $home_v2['pcwtc']['lpcw']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id'			=> '_home_v2_pcwtc_lpcw_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][lpcw][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v2['pcwtc']['lpcw']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v2['pcwtc']['lpcw']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-widget',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v2_pcwtc_lpcw_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][lpcw][carousel_args]',
						'value'			=> isset( $home_v2['pcwtc']['lpcw']['carousel_args'] ) ? $home_v2['pcwtc']['lpcw']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'rows', 'slidesPerRow' )
					) );
				?>
				</div> <!-- /#carousel_with_tabs-carousel -->

				<?php techmarket_wp_legend( esc_html__( 'Tab Products 1', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_pct1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct1][section_title]',
						'value'			=> isset( $home_v2['pcwtc']['pct1']['section_title'] ) ? $home_v2['pcwtc']['pct1']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v2_pcwtc_pct1_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct1][carousel_args]',
						'value'			=> isset( $home_v2['pcwtc']['pct1']['carousel_args'] ) ? $home_v2['pcwtc']['pct1']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_pct1_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct1][tabs][0][title]',
						'value'			=> isset( $home_v2['pcwtc']['pct1']['tabs'][0]['title'] ) ? $home_v2['pcwtc']['pct1']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pcwtc_pct1_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v2[pcwtc][pct1][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v2['pcwtc']['pct1']['tabs'][0]['shortcode_content'] ) ? $home_v2['pcwtc']['pct1']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_pct1_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct1][tabs][1][title]',
						'value'			=> isset( $home_v2['pcwtc']['pct1']['tabs'][1]['title'] ) ? $home_v2['pcwtc']['pct1']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pcwtc_pct1_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v2[pcwtc][pct1][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v2['pcwtc']['pct1']['tabs'][1]['shortcode_content'] ) ? $home_v2['pcwtc']['pct1']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_pct1_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct1][tabs][2][title]',
						'value'			=> isset( $home_v2['pcwtc']['pct1']['tabs'][2]['title'] ) ? $home_v2['pcwtc']['pct1']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pcwtc_pct1_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v2[pcwtc][pct1][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v2['pcwtc']['pct1']['tabs'][2]['shortcode_content'] ) ? $home_v2['pcwtc']['pct1']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_pct1_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct1][tabs][3][title]',
						'value'			=> isset( $home_v2['pcwtc']['pct1']['tabs'][3]['title'] ) ? $home_v2['pcwtc']['pct1']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pcwtc_pct1_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v2[pcwtc][pct1][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v2['pcwtc']['pct1']['tabs'][3]['shortcode_content'] ) ? $home_v2['pcwtc']['pct1']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div> <!-- /#carousel_with_tabs-tab-1 -->

				<?php techmarket_wp_legend( esc_html__( 'Tab Products 2', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_pct2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct2][section_title]',
						'value'			=> isset( $home_v2['pcwtc']['pct2']['section_title'] ) ? $home_v2['pcwtc']['pct2']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v2_pcwtc_pct2_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct2][carousel_args]',
						'value'			=> isset( $home_v2['pcwtc']['pct2']['carousel_args'] ) ? $home_v2['pcwtc']['pct2']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_pct2_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct2][tabs][0][title]',
						'value'			=> isset( $home_v2['pcwtc']['pct2']['tabs'][0]['title'] ) ? $home_v2['pcwtc']['pct2']['tabs'][0]['title'] : esc_html__( 'Best Choice', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pcwtc_pct2_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v2[pcwtc][pct2][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v2['pcwtc']['pct2']['tabs'][0]['shortcode_content'] ) ? $home_v2['pcwtc']['pct2']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_pct2_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct2][tabs][1][title]',
						'value'			=> isset( $home_v2['pcwtc']['pct2']['tabs'][1]['title'] ) ? $home_v2['pcwtc']['pct2']['tabs'][1]['title'] : esc_html__( 'Action Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pcwtc_pct2_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v2[pcwtc][pct2][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v2['pcwtc']['pct2']['tabs'][1]['shortcode_content'] ) ? $home_v2['pcwtc']['pct2']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_pct2_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct2][tabs][2][title]',
						'value'			=> isset( $home_v2['pcwtc']['pct2']['tabs'][2]['title'] ) ? $home_v2['pcwtc']['pct2']['tabs'][2]['title'] : esc_html__( 'Compacts', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pcwtc_pct2_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v2[pcwtc][pct2][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v2['pcwtc']['pct2']['tabs'][2]['shortcode_content'] ) ? $home_v2['pcwtc']['pct2']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_pcwtc_pct2_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[pcwtc][pct2][tabs][3][title]',
						'value'			=> isset( $home_v2['pcwtc']['pct2']['tabs'][3]['title'] ) ? $home_v2['pcwtc']['pct2']['tabs'][3]['title'] : esc_html__( 'DSLR Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_pcwtc_pct2_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v2[pcwtc][pct2][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v2['pcwtc']['pct2']['tabs'][3]['shortcode_content'] ) ? $home_v2['pcwtc']['pct2']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div><!-- /#carousel_with_tabs-tab-2 -->

				<?php do_action( 'techmarket_home_v2_after_carousel_with_tabs' ) ?>

			</div><!-- /#carousel_with_tabs -->

			<div id="brands_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_bc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v2[bc][number]',
						'value'			=> isset( $home_v2['bc']['number'] ) ? $home_v2['bc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_bc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v2[bc][orderby]',
						'value'			=> isset( $home_v2['bc']['orderby'] ) ? $home_v2['bc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_bc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v2[bc][order]',
						'value'			=> isset( $home_v2['bc']['order'] ) ? $home_v2['bc']['order'] : 'ASC',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_home_v2_bc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v2[bc][hide_empty]',
						'value'			=> isset( $home_v2['bc']['hide_empty'] ) ? $home_v2['bc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v2_bc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v2[bc][carousel_args]',
						'value'			=> isset( $home_v2['bc']['carousel_args'] ) ? $home_v2['bc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_brands_carousel' ) ?>

			</div> <!-- /#brands_carousel -->

			<div id="landscape_product_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v2_lpc_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v2[lpc][section_title]',
						'value'			=> isset( $home_v2['lpc']['section_title'] ) ? $home_v2['lpc']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v2_lpc_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v2[lpc][shortcode_content]',
						'value'			=> isset( $home_v2['lpc']['shortcode_content'] ) ? $home_v2['lpc']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v2_lpc_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v2[lpc][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v2['lpc']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v2['lpc']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v2_pcwtc_lpc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v2[lpc][carousel_args]',
						'value'			=> isset( $home_v2['lpc']['carousel_args'] ) ? $home_v2['lpc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v2_after_landscape_product_carousel' ) ?>

			</div> <!-- /#landscape_product_carousel -->

			<?php do_action( 'techmarket_home_v2_write_panel_tabs_after' ); ?>

		</div>
		<?php
	}

	public static function save( $post_id, $post ) {
		if ( isset( $_POST['_home_v2'] ) ) {
			$clean_home_v2_options = techmarket_clean_kses_post( $_POST['_home_v2'] );
			update_post_meta( $post_id, '_home_v2_options',  serialize( $clean_home_v2_options ) );
		}	
	}
}