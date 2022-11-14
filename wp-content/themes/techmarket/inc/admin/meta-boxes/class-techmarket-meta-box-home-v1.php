<?php
/**
 * Home v1 Metabox
 *
 * Displays the home v1 meta box, tabbed, with several panels covering price, stock etc.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Meta_Box_Home_v1 Class.
 */
class Techmarket_Meta_Box_Home_v1 {

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

		if ( $template_file !== 'template-homepage-v1.php' ) {
			return;
		}

		self::output_home_v1( $post );
	}

	private static function output_home_v1( $post ) {

		$home_v1 = techmarket_get_home_v1_meta();

		?>
		<div class="panel-wrap meta-box-home">
			<ul class="home_data_tabs tm-tabs">
			<?php
				$product_data_tabs = apply_filters( 'techmarket_home_v1_data_tabs', array(
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
					'features_list' => array(
						'label'  => esc_html__( 'Features List', 'techmarket' ),
						'target' => 'features_list',
						'class'  => array(),
					),
					'deal_and_product_tabs' => array(
						'label'  => esc_html__( 'Deal and Product Carousel', 'techmarket' ),
						'target' => 'deal_and_product_tabs',
						'class'  => array(),
					),
					'notice_block' => array(
						'label'  => esc_html__( 'Notice Block', 'techmarket' ),
						'target' => 'notice_block',
						'class'  => array(),
					),
					'category_carousel' => array(
						'label'  => esc_html__( 'Category Carousel', 'techmarket' ),
						'target' => 'category_carousel',
						'class'  => array(),
					),
					'product_carousel_with_bg' => array(
						'label'  => esc_html__( 'Product Carousel With Image', 'techmarket' ),
						'target' => 'product_carousel_with_bg',
						'class'  => array(),
					),
					'products_carousel_tabs' => array(
						'label'  => esc_html__( 'Products Carousel Tabs', 'techmarket' ),
						'target' => 'products_carousel_tabs',
						'class'  => array(),
					),
					'two_column_banner' => array(
						'label'  => esc_html__( '2-Column banner', 'techmarket' ),
						'target' => 'two_column_banner',
						'class'  => array(),
					),
					'landscape_product_carousel_1' => array(
						'label'  => esc_html__( 'Landscape Product Carousel 1', 'techmarket' ),
						'target' => 'landscape_product_carousel_1',
						'class'  => array(),
					),
					'vertical_product_carousel' => array(
						'label'  => esc_html__( 'Vertical Product Carousel', 'techmarket' ),
						'target' => 'vertical_product_carousel',
						'class'  => array(),
					),
					'product_carousel_with_feature_product' => array(
						'label'  => esc_html__( 'Tabs Carousel With Feature Product', 'techmarket' ),
						'target' => 'product_carousel_with_feature_product',
						'class'  => array(),
					),
					'full_width_banner' => array(
						'label'  => esc_html__( 'Full Width Banner', 'techmarket' ),
						'target' => 'full_width_banner',
						'class'  => array(),
					),
					'product_carousel_with_banner' => array(
						'label'  => esc_html__( 'Product Carousel With Banner', 'techmarket' ),
						'target' => 'product_carousel_with_banner',
						'class'  => array(),
					),
					'landscape_product_carousel_2' => array(
						'label'  => esc_html__( 'Landscape Product Carousel 2', 'techmarket' ),
						'target' => 'landscape_product_carousel_2',
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
			
			<?php do_action( 'techmarket_home_v1_write_panel_tabs_before' ); ?>
			
			<div id="general_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_select( array(
						'id'		=> '_home_v1_header_style',
						'label'		=> esc_html__( 'Header Style', 'techmarket' ),
						'name'		=> '_home_v1[header_style]',
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
						'value'		=> isset( $home_v1['header_style'] ) ? $home_v1['header_style'] : '',
					) );
				?>
				</div>
				<div class="options_group">
					<?php 
						$home_v1_blocks = array(
							'sdr'	=> esc_html__( 'Slider', 'techmarket' ),
							'fl'	=> esc_html__( 'Features List', 'techmarket' ),
							'dwtc'	=> esc_html__( 'Deal and Product Carousel', 'techmarket' ),
							'ntc'	=> esc_html__( 'Notice Block', 'techmarket' ),
							'catc'	=> esc_html__( 'Category Carousel', 'techmarket' ),
							'pcbg'	=> esc_html__( 'Product Carousel With Image', 'techmarket' ),
							'pct'	=> esc_html__( 'Products Carousel Tabs', 'techmarket' ),
							'brs'	=> esc_html__( '2-Column banner', 'techmarket' ),
							'lpc1'	=> esc_html__( 'Landscape Product Carousel 1', 'techmarket' ),
							'vpc'	=> esc_html__( 'Vertical Product Carousel', 'techmarket' ),
							'pcwfp'	=> esc_html__( 'Tabs Carousel With Feature Product', 'techmarket' ),
							'sbr'	=> esc_html__( 'Full Width Banner', 'techmarket' ),
							'pcwsb'	=> esc_html__( 'Product Carousel With Banner', 'techmarket' ),
							'lpc2'	=> esc_html__( 'Landscape Product Carousel 2', 'techmarket' ),
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
							<?php foreach( $home_v1_blocks as $key => $home_v1_block ) : ?>
							<tr>
								<td><?php echo esc_html( $home_v1_block ); ?></td>
								<td><?php techmarket_wp_animation_dropdown( array(  'id' => '_home_v1_' . $key . '_animation', 'label'=> '', 'name' => '_home_v1[' . $key . '][animation]', 'value' => isset( $home_v1['' . $key . '']['animation'] ) ? $home_v1['' . $key . '']['animation'] : '', )); ?></td>
								<td><?php techmarket_wp_text_input( array(  'id' => '_home_v1_' . $key . '_priority', 'label'=> '', 'name' => '_home_v1[' . $key . '][priority]', 'value' => isset( $home_v1['' . $key . '']['priority'] ) ? $home_v1['' . $key . '']['priority'] : 10, ) ); ?></td>
								<td><?php techmarket_wp_checkbox( array( 'id' => '_home_v1_' . $key . '_is_enabled', 'label' => '', 'name' => '_home_v1[' . $key . '][is_enabled]', 'value'=> isset( $home_v1['' . $key . '']['is_enabled'] ) ? $home_v1['' . $key . '']['is_enabled'] : '', ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php do_action( 'techmarket_home_v1_after_general_block' ) ?>

			</div><!-- /#general_block -->
			
			<div id="slider_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v1_sdr_shortcode', 
						'label' 		=> esc_html__( 'Shortcode', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the shorcode for your slider here', 'techmarket' ),
						'name'			=> '_home_v1[sdr][shortcode]',
						'value'			=> isset( $home_v1['sdr']['shortcode'] ) ? $home_v1['sdr']['shortcode'] : '',
					) );
				?>
				</div>
				<?php do_action( 'techmarket_home_v1_after_slider_block' ) ?>

			</div><!-- /#slider_block -->

			<div id="features_list" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Feature 1', 'techmarket' ) ); ?>
				
				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v1_fl_1_icon',
						'label' 		=> esc_html__( 'Icon', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the icon for your features here', 'techmarket' ),
						'name'			=> '_home_v1[fl][features][0][icon]',
						'value'			=> isset( $home_v1['fl']['features'][0]['icon'] ) ? $home_v1['fl']['features'][0]['icon'] : 'tm tm-free-delivery',
					) );

					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v1_fl_1_label',
						'label' 		=> esc_html__( 'Text', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the text for your features here', 'techmarket' ),
						'name'			=> '_home_v1[fl][features][0][label]',
						'value'			=> isset( $home_v1['fl']['features'][0]['label'] ) ? $home_v1['fl']['features'][0]['label'] : sprintf( '<h4>%s</h4><p>%s</p>', esc_html__( 'Free Delivery', 'techmarket' ), esc_html__( 'from $50', 'techmarket' ) ),
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Feature 2', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v1_fl_2_icon',
						'label' 		=> esc_html__( 'Icon', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the icon for your features here', 'techmarket' ),
						'name'			=> '_home_v1[fl][features][1][icon]',
						'value'			=> isset( $home_v1['fl']['features'][1]['icon'] ) ? $home_v1['fl']['features'][1]['icon'] : 'tm tm-feedback',
					) );

					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v1_fl_2_label',
						'label' 		=> esc_html__( 'Text', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the text for your features here', 'techmarket' ),
						'name'			=> '_home_v1[fl][features][1][label]',
						'value'			=> isset( $home_v1['fl']['features'][1]['label'] ) ? $home_v1['fl']['features'][1]['label'] : sprintf( '<h4>%s</h4><p>%s</p>', esc_html__( '99% Customer', 'techmarket' ), esc_html__( 'Feedbacks', 'techmarket' ) ),
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Feature 3', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v1_fl_3_icon',
						'label' 		=> esc_html__( 'Icon', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the icon for your features here', 'techmarket' ),
						'name'			=> '_home_v1[fl][features][2][icon]',
						'value'			=> isset( $home_v1['fl']['features'][2]['icon'] ) ? $home_v1['fl']['features'][2]['icon'] : 'tm tm-free-return',
					) );

					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v1_fl_3_label',
						'label' 		=> esc_html__( 'Text', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the text for your features here', 'techmarket' ),
						'name'			=> '_home_v1[fl][features][2][label]',
						'value'			=> isset( $home_v1['fl']['features'][2]['label'] ) ? $home_v1['fl']['features'][2]['label'] : sprintf( '<h4>%s</h4><p>%s</p>', esc_html__( '365 Days', 'techmarket' ), esc_html__( 'for free return', 'techmarket' ) ),
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Feature 4', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v1_fl_4_icon',
						'label' 		=> esc_html__( 'Icon', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the icon for your features here', 'techmarket' ),
						'name'			=> '_home_v1[fl][features][3][icon]',
						'value'			=> isset( $home_v1['fl']['features'][3]['icon'] ) ? $home_v1['fl']['features'][3]['icon'] : 'tm-safe-payments',
					) );

					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v1_fl_4_label',
						'label' 		=> esc_html__( 'Text', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the text for your features here', 'techmarket' ),
						'name'			=> '_home_v1[fl][features][3][label]',
						'value'			=> isset( $home_v1['fl']['features'][3]['label'] ) ? $home_v1['fl']['features'][3]['label'] : sprintf( '<h4>%s</h4><p>%s</p>', esc_html__( 'Payment', 'techmarket' ), esc_html__( 'Secure System', 'techmarket' ) ),
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Feature 5', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v1_fl_5_icon',
						'label' 		=> esc_html__( 'Icon', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the icon for your features here', 'techmarket' ),
						'name'			=> '_home_v1[fl][features][4][icon]',
						'value'			=> isset( $home_v1['fl']['features'][4]['icon'] ) ? $home_v1['fl']['features'][4]['icon'] : 'tm-best-brands',
					) );

					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v1_fl_5_label',
						'label' 		=> esc_html__( 'Text', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the text for your features here', 'techmarket' ),
						'name'			=> '_home_v1[fl][features][4][label]',
						'value'			=> isset( $home_v1['fl']['features'][4]['label'] ) ? $home_v1['fl']['features'][4]['label'] : sprintf( '<h4>%s</h4><p>%s</p>', esc_html__( 'Only Best', 'techmarket' ), esc_html__( 'Brands', 'techmarket' ) ),
					) );
				?>
				</div>
				
				<?php do_action( 'techmarket_home_v1_after_features_list' ) ?>

			</div><!-- /#features_list -->

			<div id="deal_and_product_tabs" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Deal Product', 'techmarket' ) ); ?>
				
				<div class="options_group">
				<?php 
					
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v1_dwtc_dc_section_title', 
						'label' 		=> esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[dwtc][dc][section_title]',
						'value'			=> isset( $home_v1['dwtc']['dc']['section_title'] ) ? $home_v1['dwtc']['dc']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_dwtc_dc_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v1[dwtc][dc][shortcode_content]',
						'value'			=> isset( $home_v1['dwtc']['dc']['shortcode_content'] ) ? $home_v1['dwtc']['dc']['shortcode_content'] : '',
						'fields'		=> array( 'per_page' )
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Tab Products', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
				
					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_dwtc_ptc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[dwtc][ptc][carousel_args]',
						'value'			=> isset( $home_v1['dwtc']['ptc']['carousel_args'] ) ? $home_v1['dwtc']['ptc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'rows', 'slidesPerRow', 'dots' )
					) );
				?>
				</div>
				
				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_dwtc_ptc_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[dwtc][ptc][tabs][0][title]',
						'value'			=> isset( $home_v1['dwtc']['ptc']['tabs'][0]['title'] ) ? $home_v1['dwtc']['ptc']['tabs'][0]['title'] : esc_html__( 'New Arrivals', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_dwtc_ptc_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v1[dwtc][ptc][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v1['dwtc']['ptc']['tabs'][0]['shortcode_content'] ) ? $home_v1['dwtc']['ptc']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_dwtc_ptc_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[dwtc][ptc][tabs][1][title]',
						'value'			=> isset( $home_v1['dwtc']['ptc']['tabs'][1]['title'] ) ? $home_v1['dwtc']['ptc']['tabs'][1]['title'] : esc_html__( 'On Sale', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_dwtc_ptc_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v1[dwtc][ptc][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v1['dwtc']['ptc']['tabs'][1]['shortcode_content'] ) ? $home_v1['dwtc']['ptc']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_dwtc_ptc_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[dwtc][ptc][tabs][2][title]',
						'value'			=> isset( $home_v1['dwtc']['ptc']['tabs'][2]['title'] ) ? $home_v1['dwtc']['ptc']['tabs'][2]['title'] : esc_html__( 'Best Rated', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_dwtc_ptc_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v1[dwtc][ptc][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v1['dwtc']['ptc']['tabs'][2]['shortcode_content'] ) ? $home_v1['dwtc']['ptc']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_deal_and_product_tabs' ) ?>

			</div><!-- /#deal_and_product_tabs -->			

			<div id="notice_block" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v1_ntc_notice_info', 
						'label' 		=> esc_html__( 'Content', 'techmarket' ), 
						'name'			=> '_home_v1[ntc][notice_info]',
						'value'			=> isset( $home_v1['ntc']['notice_info'] ) ? $home_v1['ntc']['notice_info'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_notice_block' ) ?>

			</div><!-- /#notice_block -->

			<div id="category_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v1_catc_pre_title', 
						'label' 		=> esc_html__( 'Pre title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[catc][pre_title]',
						'value'			=> isset( $home_v1['catc']['pre_title'] ) ? $home_v1['catc']['pre_title'] : '',
					) );

					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v1_catc_section_title', 
						'label' 		=> esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[catc][section_title]',
						'value'			=> isset( $home_v1['catc']['section_title'] ) ? $home_v1['catc']['section_title'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_catc_buttom_text', 
						'label' 		=> esc_html__( 'Buttom title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[catc][button_text]',
						'value'			=> isset( $home_v1['catc']['button_text'] ) ? $home_v1['catc']['button_text'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_catc_buttom_link', 
						'label' 		=> esc_html__( 'Buttom link', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[catc][button_link]',
						'value'			=> isset( $home_v1['catc']['button_link'] ) ? $home_v1['catc']['button_link'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_catc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v1[catc][number]',
						'value'			=> isset( $home_v1['catc']['number'] ) ? $home_v1['catc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_catc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v1[catc][orderby]',
						'value'			=> isset( $home_v1['catc']['orderby'] ) ? $home_v1['catc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_catc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v1[catc][order]',
						'value'			=> isset( $home_v1['catc']['order'] ) ? $home_v1['catc']['order'] : 'ASC',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_catc_slugs', 
						'label' 		=> esc_html__( 'Slugs', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Slugs', 'techmarket' ),
						'name'			=> '_home_v1[catc][slugs]',
						'value'			=> isset( $home_v1['catc']['slugs'] ) ? $home_v1['catc']['slugs'] : '',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_home_v1_catc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v1[catc][hide_empty]',
						'value'			=> isset( $home_v1['catc']['hide_empty'] ) ? $home_v1['catc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_catc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[catc][carousel_args]',
						'value'			=> isset( $home_v1['catc']['carousel_args'] ) ? $home_v1['catc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_category_carousel' ) ?>

			</div> <!-- /#category_carousel -->

			<div id="product_carousel_with_bg" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v1_pcbg_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcbg][section_title]',
						'value'			=> isset( $home_v1['pcbg']['section_title'] ) ? $home_v1['pcbg']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcbg_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v1[pcbg][shortcode_content]',
						'value'			=> isset( $home_v1['pcbg']['shortcode_content'] ) ? $home_v1['pcbg']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v1_pcbg_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v1[pcbg][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v1['pcbg']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v1['pcbg']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );

					techmarket_wp_upload_image( array( 
							'id' 			=> '_home_v1_pcbg_bg_image',
							'label'			=> esc_html__( 'Image', 'techmarket' ),
							'name'			=> '_home_v1[pcbg][bg_image]',
							'value'			=> isset( $home_v1['pcbg']['bg_image']) ? $home_v1['pcbg']['bg_image'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_pcwtc_pcbg_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[pcbg][carousel_args]',
						'value'			=> isset( $home_v1['pcbg']['carousel_args'] ) ? $home_v1['pcbg']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'rows', 'slidesPerRow', 'dots' )
					) );
				?>
				</div>
				
				<?php do_action( 'techmarket_home_v1_after_product_carousel_with_bg' ) ?>

			</div> <!-- /#product_carousel_with_bg -->

			<div id="products_carousel_tabs" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pct_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pct][section_title]',
						'value'			=> isset( $home_v1['pct']['section_title'] ) ? $home_v1['pct']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_pct_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[pct][carousel_args]',
						'value'			=> isset( $home_v1['pct']['carousel_args'] ) ? $home_v1['pct']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pct_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pct][tabs][0][title]',
						'value'			=> isset( $home_v1['pct']['tabs'][0]['title'] ) ? $home_v1['pct']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pct_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v1[pct][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v1['pct']['tabs'][0]['shortcode_content'] ) ? $home_v1['pct']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pct_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pct][tabs][1][title]',
						'value'			=> isset( $home_v1['pct']['tabs'][1]['title'] ) ? $home_v1['pct']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pct_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v1[pct][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v1['pct']['tabs'][1]['shortcode_content'] ) ? $home_v1['pct']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pct_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pct][tabs][2][title]',
						'value'			=> isset( $home_v1['pct']['tabs'][2]['title'] ) ? $home_v1['pct']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pct_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v1[pct][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v1['pct']['tabs'][2]['shortcode_content'] ) ? $home_v1['pct']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pct_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pct][tabs][3][title]',
						'value'			=> isset( $home_v1['pct']['tabs'][3]['title'] ) ? $home_v1['pct']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pct_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v1[pct][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v1['pct']['tabs'][3]['shortcode_content'] ) ? $home_v1['pct']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_products_carousel_tabs' ) ?>

			</div><!-- /#products_carousel_tabs -->

			<div id="two_column_banner" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Banner 1', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v1_brs_br1',
							'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
							'name'			=> '_home_v1[brs][br1]',
							'value'			=> isset( $home_v1['brs']['br1'] ) ? $home_v1['brs']['br1'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 2', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v1_brs_br2',
							'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
							'name'			=> '_home_v1[brs][br2]',
							'value'			=> isset( $home_v1['brs']['br2'] ) ? $home_v1['brs']['br2'] : '',
							'fields'		=> array( 'title', 'price', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_two_column_banner' ) ?>

			</div><!-- /#two_column_banner -->

			<div id="landscape_product_carousel_1" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_lpc1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[lpc1][section_title]',
						'value'			=> isset( $home_v1['lpc1']['section_title'] ) ? $home_v1['lpc1']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_lpc1_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v1[lpc1][shortcode_content]',
						'value'			=> isset( $home_v1['lpc1']['shortcode_content'] ) ? $home_v1['lpc1']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v1_lpc1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v1[lpc1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v1['lpc1']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v1['lpc1']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_lpc1_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[lpc1][carousel_args]',
						'value'			=> isset( $home_v1['lpc1']['carousel_args'] ) ? $home_v1['lpc1']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_landscape_product_carousel_1' ) ?>

			</div> <!-- /#landscape_product_carousel_1 -->

			<div id="vertical_product_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v1_vpc_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[vpc][section_title]',
						'value'			=> isset( $home_v1['vpc']['section_title'] ) ? $home_v1['vpc']['section_title'] : '',
					) );

					techmarket_wp_upload_image( array( 
							'id' 			=> '_home_v1_vpc_bg_image',
							'label'			=> esc_html__( 'Image', 'techmarket' ),
							'name'			=> '_home_v1[vpc][bg_image]',
							'value'			=> isset( $home_v1['vpc']['bg_image']) ? $home_v1['vpc']['bg_image'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_vpc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[vpc][carousel_args]',
						'value'			=> isset( $home_v1['vpc']['carousel_args'] ) ? $home_v1['vpc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v1_vpc_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[vpc][tabs][0][title]',
						'value'			=> isset( $home_v1['vpc']['tabs'][0]['title'] ) ? $home_v1['vpc']['tabs'][0]['title'] : esc_html__( 'Desktop PCs', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_vpc_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v1[vpc][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v1['vpc']['tabs'][0]['shortcode_content'] ) ? $home_v1['vpc']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v1_vpc_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[vpc][tabs][1][title]',
						'value'			=> isset( $home_v1['vpc']['tabs'][1]['title'] ) ? $home_v1['vpc']['tabs'][1]['title'] : esc_html__( 'Ultrabooks', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_vpc_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v1[vpc][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v1['vpc']['tabs'][1]['shortcode_content'] ) ? $home_v1['vpc']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v1_vpc_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[vpc][tabs][2][title]',
						'value'			=> isset( $home_v1['vpc']['tabs'][2]['title'] ) ? $home_v1['vpc']['tabs'][2]['title'] : esc_html__( 'Smartphones', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_vpc_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v1[vpc][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v1['vpc']['tabs'][2]['shortcode_content'] ) ? $home_v1['vpc']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v1_vpc_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[vpc][tabs][3][title]',
						'value'			=> isset( $home_v1['vpc']['tabs'][3]['title'] ) ? $home_v1['vpc']['tabs'][3]['title'] : esc_html__( 'Internet Cams', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_vpc_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v1[vpc][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v1['vpc']['tabs'][3]['shortcode_content'] ) ? $home_v1['vpc']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v1_vpc_tab_5_title', 
						'label' 		=> esc_html__( 'Tab #5 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[vpc][tabs][4][title]',
						'value'			=> isset( $home_v1['vpc']['tabs'][4]['title'] ) ? $home_v1['vpc']['tabs'][4]['title'] : esc_html__( 'Accessories', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_vpc_tab_5_shortcode_content',
						'label'			=> esc_html__( 'Tab #5 Content', 'techmarket' ),
						'default'		=> 'best_selling_products',
						'name'			=> '_home_v1[vpc][tabs][4][shortcode_content]',
						'value'			=> isset( $home_v1['vpc']['tabs'][4]['shortcode_content'] ) ? $home_v1['vpc']['tabs'][4]['shortcode_content'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_vertical_product_carousel' ) ?>

			</div><!-- /#vertical_product_carousel -->

			<div id="product_carousel_with_feature_product" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwfp_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwfp][section_title]',
						'value'			=> isset( $home_v1['pcwfp']['section_title'] ) ? $home_v1['pcwfp']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_pcwfp_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[pcwfp][carousel_args]',
						'value'			=> isset( $home_v1['pcwfp']['carousel_args'] ) ? $home_v1['pcwfp']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'rows', 'slidesPerRow', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwfp_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwfp][tabs][0][title]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][0]['title'] ) ? $home_v1['pcwfp']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwfp_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v1[pcwfp][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][0]['shortcode_content'] ) ? $home_v1['pcwfp']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwfp_tab_1_shortcode_content_featured',
						'label'			=> esc_html__( 'Tab #1 Featured Product', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v1[pcwfp][tabs][0][shortcode_content_featured]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][0]['shortcode_content_featured'] ) ? $home_v1['pcwfp']['tabs'][0]['shortcode_content_featured'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwfp_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwfp][tabs][1][title]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][1]['title'] ) ? $home_v1['pcwfp']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwfp_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v1[pcwfp][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][1]['shortcode_content'] ) ? $home_v1['pcwfp']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwfp_tab_2_shortcode_content_featured',
						'label'			=> esc_html__( 'Tab #2 Featured Product', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v1[pcwfp][tabs][1][shortcode_content_featured]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][1]['shortcode_content_featured'] ) ? $home_v1['pcwfp']['tabs'][1]['shortcode_content_featured'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwfp_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwfp][tabs][2][title]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][2]['title'] ) ? $home_v1['pcwfp']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwfp_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v1[pcwfp][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][2]['shortcode_content'] ) ? $home_v1['pcwfp']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwfp_tab_3_shortcode_content_featured',
						'label'			=> esc_html__( 'Tab #3 Featured Product', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v1[pcwfp][tabs][2][shortcode_content_featured]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][2]['shortcode_content_featured'] ) ? $home_v1['pcwfp']['tabs'][2]['shortcode_content_featured'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwfp_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwfp][tabs][3][title]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][3]['title'] ) ? $home_v1['pcwfp']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwfp_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v1[pcwfp][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][3]['shortcode_content'] ) ? $home_v1['pcwfp']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwfp_tab_4_shortcode_content_featured',
						'label'			=> esc_html__( 'Tab #4 Featured Product', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v1[pcwfp][tabs][3][shortcode_content_featured]',
						'value'			=> isset( $home_v1['pcwfp']['tabs'][3]['shortcode_content_featured'] ) ? $home_v1['pcwfp']['tabs'][3]['shortcode_content_featured'] : '',
						'fields'		=> array()
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_product_carousel_with_feature_product' ) ?>

			</div><!-- /#product_carousel_with_feature_product -->

			<div id="full_width_banner" class="panel techmarket_options_panel">

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v1_sbr',
							'label'			=> esc_html__( 'Banner', 'techmarket' ),
							'name'			=> '_home_v1[sbr]',
							'value'			=> isset( $home_v1['sbr']) ? $home_v1['sbr'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_full_width_banner' ) ?>

			</div><!-- /#full_width_banner -->

			<div id="product_carousel_with_banner" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Tab Products 1', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwsb_pct1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct1][section_title]',
						'value'			=> isset( $home_v1['pcwsb']['pct1']['section_title'] ) ? $home_v1['pcwsb']['pct1']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_pcwsb_pct1_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct1][carousel_args]',
						'value'			=> isset( $home_v1['pcwsb']['pct1']['carousel_args'] ) ? $home_v1['pcwsb']['pct1']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwsb_pct1_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct1][tabs][0][title]',
						'value'			=> isset( $home_v1['pcwsb']['pct1']['tabs'][0]['title'] ) ? $home_v1['pcwsb']['pct1']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwsb_pct1_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v1[pcwsb][pct1][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v1['pcwsb']['pct1']['tabs'][0]['shortcode_content'] ) ? $home_v1['pcwsb']['pct1']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwsb_pct1_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct1][tabs][1][title]',
						'value'			=> isset( $home_v1['pcwsb']['pct1']['tabs'][1]['title'] ) ? $home_v1['pcwsb']['pct1']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwsb_pct1_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v1[pcwsb][pct1][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v1['pcwsb']['pct1']['tabs'][1]['shortcode_content'] ) ? $home_v1['pcwsb']['pct1']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwsb_pct1_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct1][tabs][2][title]',
						'value'			=> isset( $home_v1['pcwsb']['pct1']['tabs'][2]['title'] ) ? $home_v1['pcwsb']['pct1']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwsb_pct1_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v1[pcwsb][pct1][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v1['pcwsb']['pct1']['tabs'][2]['shortcode_content'] ) ? $home_v1['pcwsb']['pct1']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwsb_pct1_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct1][tabs][3][title]',
						'value'			=> isset( $home_v1['pcwsb']['pct1']['tabs'][3]['title'] ) ? $home_v1['pcwsb']['pct1']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwsb_pct1_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v1[pcwsb][pct1][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v1['pcwsb']['pct1']['tabs'][3]['shortcode_content'] ) ? $home_v1['pcwsb']['pct1']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div> <!-- /#carousel_with_tabs-tab-1 -->

				<?php techmarket_wp_legend( esc_html__( 'Tab Products 2', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwsb_pct2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct2][section_title]',
						'value'			=> isset( $home_v1['pcwsb']['pct2']['section_title'] ) ? $home_v1['pcwsb']['pct2']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_pcwsb_pct2_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct2][carousel_args]',
						'value'			=> isset( $home_v1['pcwsb']['pct2']['carousel_args'] ) ? $home_v1['pcwsb']['pct2']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwsb_pct2_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct2][tabs][0][title]',
						'value'			=> isset( $home_v1['pcwsb']['pct2']['tabs'][0]['title'] ) ? $home_v1['pcwsb']['pct2']['tabs'][0]['title'] : esc_html__( 'Best Choice', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwsb_pct2_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v1[pcwsb][pct2][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v1['pcwsb']['pct2']['tabs'][0]['shortcode_content'] ) ? $home_v1['pcwsb']['pct2']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwsb_pct2_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct2][tabs][1][title]',
						'value'			=> isset( $home_v1['pcwsb']['pct2']['tabs'][1]['title'] ) ? $home_v1['pcwsb']['pct2']['tabs'][1]['title'] : esc_html__( 'Action Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwsb_pct2_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v1[pcwsb][pct2][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v1['pcwsb']['pct2']['tabs'][1]['shortcode_content'] ) ? $home_v1['pcwsb']['pct2']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwsb_pct2_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct2][tabs][2][title]',
						'value'			=> isset( $home_v1['pcwsb']['pct2']['tabs'][2]['title'] ) ? $home_v1['pcwsb']['pct2']['tabs'][2]['title'] : esc_html__( 'Compacts', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwsb_pct2_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v1[pcwsb][pct2][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v1['pcwsb']['pct2']['tabs'][2]['shortcode_content'] ) ? $home_v1['pcwsb']['pct2']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_pcwsb_pct2_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][pct2][tabs][3][title]',
						'value'			=> isset( $home_v1['pcwsb']['pct2']['tabs'][3]['title'] ) ? $home_v1['pcwsb']['pct2']['tabs'][3]['title'] : esc_html__( 'DSLR Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_pcwsb_pct2_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v1[pcwsb][pct2][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v1['pcwsb']['pct2']['tabs'][3]['shortcode_content'] ) ? $home_v1['pcwsb']['pct2']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div><!-- /#carousel_with_tabs-tab-2 -->

				<?php techmarket_wp_legend( esc_html__( 'Banner 1', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v1_br2',
						'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][br2]',
						'value'			=> isset( $home_v1['pcwsb']['br2'] ) ? $home_v1['pcwsb']['br2'] : '',
						'fields'		=> array( 'pre_title','title', 'price', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 2', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v1_br1',
						'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][br1]',
						'value'			=> isset( $home_v1['pcwsb']['br1'] ) ? $home_v1['pcwsb']['br1'] : '',
						'fields'		=> array( 'title', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 3', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v1_br3',
						'label'			=> esc_html__( 'Banner 3', 'techmarket' ),
						'name'			=> '_home_v1[pcwsb][br3]',
						'value'			=> isset( $home_v1['pcwsb']['br3'] ) ? $home_v1['pcwsb']['br3'] : '',
						'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_product_carousel_with_banner' ) ?>

			</div><!-- /#product_carousel_with_banner -->

			<div id="landscape_product_carousel_2" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_lpc2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v1[lpc2][section_title]',
						'value'			=> isset( $home_v1['lpc2']['section_title'] ) ? $home_v1['lpc2']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v1_lpc2_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v1[lpc2][shortcode_content]',
						'value'			=> isset( $home_v1['lpc2']['shortcode_content'] ) ? $home_v1['lpc2']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v1_lpc2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v1[lpc2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v1['lpc2']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v1['lpc2']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_lpc2_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[lpc2][carousel_args]',
						'value'			=> isset( $home_v1['lpc2']['carousel_args'] ) ? $home_v1['lpc2']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_landscape_product_carousel_2' ) ?>

			</div> <!-- /#landscape_product_carousel_2 -->

			<div id="brands_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_bc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v1[bc][number]',
						'value'			=> isset( $home_v1['bc']['number'] ) ? $home_v1['bc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_bc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v1[bc][orderby]',
						'value'			=> isset( $home_v1['bc']['orderby'] ) ? $home_v1['bc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v1_bc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v1[bc][order]',
						'value'			=> isset( $home_v1['bc']['order'] ) ? $home_v1['bc']['order'] : 'ASC',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_home_v1_bc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v1[bc][hide_empty]',
						'value'			=> isset( $home_v1['bc']['hide_empty'] ) ? $home_v1['bc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v1_bc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v1[bc][carousel_args]',
						'value'			=> isset( $home_v1['bc']['carousel_args'] ) ? $home_v1['bc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v1_after_brands_carousel' ) ?>

			</div> <!-- /#brands_carousel -->

			<?php do_action( 'techmarket_home_v1_write_panel_tabs_after' ); ?>
		
		</div>
		<?php
	}

	public static function save( $post_id, $post ) {
		if ( isset( $_POST['_home_v1'] ) ) {
			$clean_home_v1_options = techmarket_clean_kses_post( $_POST['_home_v1'] );
			update_post_meta( $post_id, '_home_v1_options',  serialize( $clean_home_v1_options ) );
		}	
	}
}