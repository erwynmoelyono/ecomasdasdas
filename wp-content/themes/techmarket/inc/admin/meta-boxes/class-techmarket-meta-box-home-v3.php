<?php
/**
 * Home v3 Metabox
 *
 * Displays the home v3 meta box, tabbed, with several panels covering price, stock etc.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Meta_Box_Home_v3 Class.
 */
class Techmarket_Meta_Box_Home_v3 {

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

		if ( $template_file !== 'template-homepage-v3.php' ) {
			return;
		}

		self::output_home_v3( $post );
	}

	private static function output_home_v3( $post ) {

		$home_v3 = techmarket_get_home_v3_meta();

		?>
		<div class="panel-wrap meta-box-home">
			<ul class="home_data_tabs tm-tabs">
			<?php
				$product_data_tabs = apply_filters( 'techmarket_home_v3_data_tabs', array(
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
					'features_list' => array(
						'label'  => esc_html__( 'Features List', 'techmarket' ),
						'target' => 'features_list',
						'class'  => array(),
					),
					'category_carousel_1' => array(
						'label'  => esc_html__( 'Category Carousel 1', 'techmarket' ),
						'target' => 'category_carousel_1',
						'class'  => array(),
					),
					'notice_block' => array(
						'label'  => esc_html__( 'Notice Block', 'techmarket' ),
						'target' => 'notice_block',
						'class'  => array(),
					),
					'products_carousel_1' => array(
						'label'  => esc_html__( 'Products Carousel 1', 'techmarket' ),
						'target' => 'products_carousel_1',
						'class'  => array(),
					),
					'products_carousel_2' => array(
						'label'  => esc_html__( 'Products Carousel 2', 'techmarket' ),
						'target' => 'products_carousel_2',
						'class'  => array(),
					),
					'two_column_banner' => array(
						'label'  => esc_html__( '2-Column banner', 'techmarket' ),
						'target' => 'two_column_banner',
						'class'  => array(),
					),
					'products_carousel_tabs_1' => array(
						'label'  => esc_html__( 'Products Carousel Tabs 1', 'techmarket' ),
						'target' => 'products_carousel_tabs_1',
						'class'  => array(),
					),
					'products_carousel_3' => array(
						'label'  => esc_html__( 'Products Carousel 3', 'techmarket' ),
						'target' => 'products_carousel_3',
						'class'  => array(),
					),
					'product_carousel_with_bg' => array(
						'label'  => esc_html__( 'Product Carousel With Image', 'techmarket' ),
						'target' => 'product_carousel_with_bg',
						'class'  => array(),
					),
					'landscape_product_carousel_tabs' => array(
						'label'  => esc_html__( 'Landscape Product Carousel Tabs', 'techmarket' ),
						'target' => 'landscape_product_carousel_tabs',
						'class'  => array(),
					),
					'banner_with_product_carousel' => array(
						'label'  => esc_html__( 'Banner With Product Carousel', 'techmarket' ),
						'target' => 'banner_with_product_carousel',
						'class'  => array(),
					),
					'full_width_banner' => array(
						'label'  => esc_html__( 'Full Width Banner', 'techmarket' ),
						'target' => 'full_width_banner',
						'class'  => array(),
					),
					'category_carousel_2' => array(
						'label'  => esc_html__( 'Category Carousel 2', 'techmarket' ),
						'target' => 'category_carousel_2',
						'class'  => array(),
					),
					'products_carousel_tabs_2' => array(
						'label'  => esc_html__( 'Products Carousel Tabs 2', 'techmarket' ),
						'target' => 'products_carousel_tabs_2',
						'class'  => array(),
					),
					'landscape_product_carousel' => array(
						'label'  => esc_html__( 'Landscape Product Carousel', 'techmarket' ),
						'target' => 'landscape_product_carousel',
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

			<?php do_action( 'techmarket_home_v3_write_panel_tabs_before' ); ?>

			<div id="general_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_select( array(
						'id'		=> '_home_v3_header_style',
						'label'		=> esc_html__( 'Header Style', 'techmarket' ),
						'name'		=> '_home_v3[header_style]',
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
						'value'		=> isset( $home_v3['header_style'] ) ? $home_v3['header_style'] : '',
					) );
				?>
				</div>
				<div class="options_group">
					<?php 
						$home_v3_blocks = array(
							'swb'	=> esc_html__( 'Slider with Banner', 'techmarket' ),
							'fl'	=> esc_html__( 'Features List', 'techmarket' ),
							'catc1'	=> esc_html__( 'Category Carousel 1', 'techmarket' ),
							'ntc'	=> esc_html__( 'Notice Block', 'techmarket' ),
							'pc1'	=> esc_html__( 'Products Carousel 1', 'techmarket' ),
							'pc2'	=> esc_html__( 'Products Carousel 2', 'techmarket' ),
							'brs'	=> esc_html__( '2-Column banner', 'techmarket' ),
							'pct1'	=> esc_html__( 'Products Carousel Tabs 1', 'techmarket' ),
							'pc3'	=> esc_html__( 'Products Carousel 3', 'techmarket' ),
							'pcbg'	=> esc_html__( 'Product Carousel With Image', 'techmarket' ),
							'lpct'	=> esc_html__( 'Landscape Product Carousel Tabs', 'techmarket' ),
							'brwpc'	=> esc_html__( 'Banner With Product Carousel', 'techmarket' ),
							'sbr'	=> esc_html__( 'Full Width Banner', 'techmarket' ),
							'catc2'	=> esc_html__( 'Category Carousel 2', 'techmarket' ),
							'pct2'	=> esc_html__( 'Products Carousel Tabs 2', 'techmarket' ),
							'lpc'	=> esc_html__( 'Landscape Product Carousel', 'techmarket' ),
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
							<?php foreach( $home_v3_blocks as $key => $home_v3_block ) : ?>
							<tr>
								<td><?php echo esc_html( $home_v3_block ); ?></td>
								<td><?php techmarket_wp_animation_dropdown( array(  'id' => '_home_v3_' . $key . '_animation', 'label'=> '', 'name' => '_home_v3[' . $key . '][animation]', 'value' => isset( $home_v3['' . $key . '']['animation'] ) ? $home_v3['' . $key . '']['animation'] : '', )); ?></td>
								<td><?php techmarket_wp_text_input( array(  'id' => '_home_v3_' . $key . '_priority', 'label'=> '', 'name' => '_home_v3[' . $key . '][priority]', 'value' => isset( $home_v3['' . $key . '']['priority'] ) ? $home_v3['' . $key . '']['priority'] : 10, ) ); ?></td>
								<td><?php techmarket_wp_checkbox( array( 'id' => '_home_v3_' . $key . '_is_enabled', 'label' => '', 'name' => '_home_v3[' . $key . '][is_enabled]', 'value'=> isset( $home_v3['' . $key . '']['is_enabled'] ) ? $home_v3['' . $key . '']['is_enabled'] : '', ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php do_action( 'techmarket_home_v3_after_general_block' ) ?>

			</div><!-- /#general_block -->
			
			<div id="slider_banner" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Slider', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v3_swb_sdr_shortcode', 
						'label' 		=> esc_html__( 'Shortcode', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the shorcode for your slider here', 'techmarket' ),
						'name'			=> '_home_v3[swb][sdr_shortcode]',
						'value'			=> isset( $home_v3['swb']['sdr_shortcode'] ) ? $home_v3['swb']['sdr_shortcode'] : '',
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v3_swb_br1',
						'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
						'name'			=> '_home_v3[swb][br1]',
						'value'			=> isset( $home_v3['swb']['br1'] ) ? $home_v3['swb']['br1'] : '',
						'fields'		=> array( 'title', 'price', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v3_swb_br2',
						'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
						'name'			=> '_home_v3[swb][br2]',
						'value'			=> isset( $home_v3['swb']['br2'] ) ? $home_v3['swb']['br2'] : '',
						'fields'		=> array( 'pre_title', 'title', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v3_swb_br3',
						'label'			=> esc_html__( 'Banner 3', 'techmarket' ),
						'name'			=> '_home_v3[swb][br3]',
						'value'			=> isset( $home_v3['swb']['br3'] ) ? $home_v3['swb']['br3'] : '',
						'fields'		=> array( 'title', 'price', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v3_swb_br4',
						'label'			=> esc_html__( 'Banner 4', 'techmarket' ),
						'name'			=> '_home_v3[swb][br4]',
						'value'			=> isset( $home_v3['swb']['br4'] ) ? $home_v3['swb']['br4'] : '',
						'fields'		=> array( 'title', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v3_swb_br5',
						'label'			=> esc_html__( 'Banner 5', 'techmarket' ),
						'name'			=> '_home_v3[swb][br5]',
						'value'			=> isset( $home_v3['swb']['br5'] ) ? $home_v3['swb']['br5'] : '',
						'fields'		=> array( 'pre_title', 'title', 'price', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v3_swb_br6',
						'label'			=> esc_html__( 'Banner 6', 'techmarket' ),
						'name'			=> '_home_v3[swb][br6]',
						'value'			=> isset( $home_v3['swb']['br6'] ) ? $home_v3['swb']['br6'] : '',
						'fields'		=> array( 'title', 'price', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_slider_banner' ) ?>

			</div><!-- /#slider_banner -->

			<div id="features_list" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Feature 1', 'techmarket' ) ); ?>
				
				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v3_fl_1_icon',
						'label' 		=> esc_html__( 'Icon', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the icon for your features here', 'techmarket' ),
						'name'			=> '_home_v3[fl][features][0][icon]',
						'value'			=> isset( $home_v3['fl']['features'][0]['icon'] ) ? $home_v3['fl']['features'][0]['icon'] : 'tm tm-free-delivery',
					) );

					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v3_fl_1_label',
						'label' 		=> esc_html__( 'Text', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the text for your features here', 'techmarket' ),
						'name'			=> '_home_v3[fl][features][0][label]',
						'value'			=> isset( $home_v3['fl']['features'][0]['label'] ) ? $home_v3['fl']['features'][0]['label'] : sprintf( '<h4>%s</h4><p>%s</p>', esc_html__( 'Free Delivery', 'techmarket' ), esc_html__( 'from $50', 'techmarket' ) ),
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Feature 2', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v3_fl_2_icon',
						'label' 		=> esc_html__( 'Icon', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the icon for your features here', 'techmarket' ),
						'name'			=> '_home_v3[fl][features][1][icon]',
						'value'			=> isset( $home_v3['fl']['features'][1]['icon'] ) ? $home_v3['fl']['features'][1]['icon'] : 'tm tm-feedback',
					) );

					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v3_fl_2_label',
						'label' 		=> esc_html__( 'Text', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the text for your features here', 'techmarket' ),
						'name'			=> '_home_v3[fl][features][1][label]',
						'value'			=> isset( $home_v3['fl']['features'][1]['label'] ) ? $home_v3['fl']['features'][1]['label'] : sprintf( '<h4>%s</h4><p>%s</p>', esc_html__( '99% Customer', 'techmarket' ), esc_html__( 'Feedbacks', 'techmarket' ) ),
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Feature 3', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v3_fl_3_icon',
						'label' 		=> esc_html__( 'Icon', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the icon for your features here', 'techmarket' ),
						'name'			=> '_home_v3[fl][features][2][icon]',
						'value'			=> isset( $home_v3['fl']['features'][2]['icon'] ) ? $home_v3['fl']['features'][2]['icon'] : 'tm tm-free-return',
					) );

					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v3_fl_3_label',
						'label' 		=> esc_html__( 'Text', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the text for your features here', 'techmarket' ),
						'name'			=> '_home_v3[fl][features][2][label]',
						'value'			=> isset( $home_v3['fl']['features'][2]['label'] ) ? $home_v3['fl']['features'][2]['label'] : sprintf( '<h4>%s</h4><p>%s</p>', esc_html__( '365 Days', 'techmarket' ), esc_html__( 'for free return', 'techmarket' ) ),
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Feature 4', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v3_fl_4_icon',
						'label' 		=> esc_html__( 'Icon', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the icon for your features here', 'techmarket' ),
						'name'			=> '_home_v3[fl][features][3][icon]',
						'value'			=> isset( $home_v3['fl']['features'][3]['icon'] ) ? $home_v3['fl']['features'][3]['icon'] : 'tm-safe-payments',
					) );

					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v3_fl_4_label',
						'label' 		=> esc_html__( 'Text', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the text for your features here', 'techmarket' ),
						'name'			=> '_home_v3[fl][features][3][label]',
						'value'			=> isset( $home_v3['fl']['features'][3]['label'] ) ? $home_v3['fl']['features'][3]['label'] : sprintf( '<h4>%s</h4><p>%s</p>', esc_html__( 'Payment', 'techmarket' ), esc_html__( 'Secure System', 'techmarket' ) ),
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Feature 5', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id' 			=> '_home_v3_fl_5_icon',
						'label' 		=> esc_html__( 'Icon', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the icon for your features here', 'techmarket' ),
						'name'			=> '_home_v3[fl][features][4][icon]',
						'value'			=> isset( $home_v3['fl']['features'][4]['icon'] ) ? $home_v3['fl']['features'][4]['icon'] : 'tm-best-brands',
					) );

					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v3_fl_5_label',
						'label' 		=> esc_html__( 'Text', 'techmarket' ), 
						'placeholder' 	=> esc_html__( 'Enter the text for your features here', 'techmarket' ),
						'name'			=> '_home_v3[fl][features][4][label]',
						'value'			=> isset( $home_v3['fl']['features'][4]['label'] ) ? $home_v3['fl']['features'][4]['label'] : sprintf( '<h4>%s</h4><p>%s</p>', esc_html__( 'Only Best', 'techmarket' ), esc_html__( 'Brands', 'techmarket' ) ),
					) );
				?>
				</div>
				
				<?php do_action( 'techmarket_home_v3_after_features_list' ) ?>

			</div><!-- /#features_list -->

			<div id="category_carousel_1" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v3_catc1_section_title', 
						'label' 		=> esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[catc1][section_title]',
						'value'			=> isset( $home_v3['catc1']['section_title'] ) ? $home_v3['catc1']['section_title'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_catc1_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v3[catc1][number]',
						'value'			=> isset( $home_v3['catc1']['number'] ) ? $home_v3['catc1']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_catc1_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v3[catc1][orderby]',
						'value'			=> isset( $home_v3['catc1']['orderby'] ) ? $home_v3['catc1']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_catc1_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v3[catc1][order]',
						'value'			=> isset( $home_v3['catc1']['order'] ) ? $home_v3['catc1']['order'] : 'ASC',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_catc1_slugs', 
						'label' 		=> esc_html__( 'Slugs', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Slugs', 'techmarket' ),
						'name'			=> '_home_v3[catc1][slugs]',
						'value'			=> isset( $home_v3['catc1']['slugs'] ) ? $home_v3['catc1']['slugs'] : '',
					) );


					techmarket_wp_checkbox( array(
						'id'			=> '_home_v3_catc1_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v3[catc1][hide_empty]',
						'value'			=> isset( $home_v3['catc1']['hide_empty'] ) ? $home_v3['catc1']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_catc1_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[catc1][carousel_args]',
						'value'			=> isset( $home_v3['catc1']['carousel_args'] ) ? $home_v3['catc1']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_category_carousel_1' ) ?>

			</div> <!-- /#category_carousel_1 -->

			<div id="notice_block" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v3_ntc_notice_info', 
						'label' 		=> esc_html__( 'Content', 'techmarket' ), 
						'name'			=> '_home_v3[ntc][notice_info]',
						'value'			=> isset( $home_v3['ntc']['notice_info'] ) ? $home_v3['ntc']['notice_info'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_notice_block' ) ?>

			</div><!-- /#notice_block -->

			<div id="products_carousel_1" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pc1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pc1][section_title]',
						'value'			=> isset( $home_v3['pc1']['section_title'] ) ? $home_v3['pc1']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pc1_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v3[pc1][shortcode_content]',
						'value'			=> isset( $home_v3['pc1']['shortcode_content'] ) ? $home_v3['pc1']['shortcode_content'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_pc1_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[pc1][carousel_args]',
						'value'			=> isset( $home_v3['pc1']['carousel_args'] ) ? $home_v3['pc1']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_products_carousel_1' ) ?>

			</div> <!-- /#products_carousel_1 -->

			<div id="products_carousel_2" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pc2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pc2][section_title]',
						'value'			=> isset( $home_v3['pc2']['section_title'] ) ? $home_v3['pc2']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pc2_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v3[pc2][shortcode_content]',
						'value'			=> isset( $home_v3['pc2']['shortcode_content'] ) ? $home_v3['pc2']['shortcode_content'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_pc2_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[pc2][carousel_args]',
						'value'			=> isset( $home_v3['pc2']['carousel_args'] ) ? $home_v3['pc2']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_products_carousel_2' ) ?>

			</div> <!-- /#products_carousel_2 -->

			<div id="two_column_banner" class="panel techmarket_options_panel">

				<?php techmarket_wp_legend( esc_html__( 'Banner 1', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v3_brs_br1',
							'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
							'name'			=> '_home_v3[brs][br1]',
							'value'			=> isset( $home_v3['brs']['br1'] ) ? $home_v3['brs']['br1'] : '',
							'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Banner 2', 'techmarket' ) ); ?>

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v3_brs_br2',
							'label'			=> esc_html__( 'Banner 2', 'techmarket' ),
							'name'			=> '_home_v3[brs][br2]',
							'value'			=> isset( $home_v3['brs']['br2'] ) ? $home_v3['brs']['br2'] : '',
							'fields'		=> array( 'title', 'price', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_two_column_banner' ) ?>

			</div><!-- /#two_column_banner -->

			<div id="products_carousel_tabs_1" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct1_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct1][section_title]',
						'value'			=> isset( $home_v3['pct1']['section_title'] ) ? $home_v3['pct1']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_pct1_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[pct1][carousel_args]',
						'value'			=> isset( $home_v3['pct1']['carousel_args'] ) ? $home_v3['pct1']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct1_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct1][tabs][0][title]',
						'value'			=> isset( $home_v3['pct1']['tabs'][0]['title'] ) ? $home_v3['pct1']['tabs'][0]['title'] : esc_html__( 'Bestsellers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pct1_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v3[pct1][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v3['pct1']['tabs'][0]['shortcode_content'] ) ? $home_v3['pct1']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct1_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct1][tabs][1][title]',
						'value'			=> isset( $home_v3['pct1']['tabs'][1]['title'] ) ? $home_v3['pct1']['tabs'][1]['title'] : esc_html__( 'Android Phones', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pct1_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v3[pct1][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v3['pct1']['tabs'][1]['shortcode_content'] ) ? $home_v3['pct1']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct1_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct1][tabs][2][title]',
						'value'			=> isset( $home_v3['pct1']['tabs'][2]['title'] ) ? $home_v3['pct1']['tabs'][2]['title'] : esc_html__( 'IOS Phones', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pct1_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v3[pct1][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v3['pct1']['tabs'][2]['shortcode_content'] ) ? $home_v3['pct1']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct1_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct1][tabs][3][title]',
						'value'			=> isset( $home_v3['pct1']['tabs'][3]['title'] ) ? $home_v3['pct1']['tabs'][3]['title'] : esc_html__( 'Tablets', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pct1_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v3[pct1][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v3['pct1']['tabs'][3]['shortcode_content'] ) ? $home_v3['pct1']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct1_tab_5_title', 
						'label' 		=> esc_html__( 'Tab #5 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct1][tabs][4][title]',
						'value'			=> isset( $home_v3['pct1']['tabs'][4]['title'] ) ? $home_v3['pct1']['tabs'][4]['title'] : esc_html__( 'Accessories', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pct1_tab_5_shortcode_content',
						'label'			=> esc_html__( 'Tab #5 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v3[pct1][tabs][4][shortcode_content]',
						'value'			=> isset( $home_v3['pct1']['tabs'][4]['shortcode_content'] ) ? $home_v3['pct1']['tabs'][4]['shortcode_content'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_products_carousel_tabs_1' ) ?>

			</div><!-- /#products_carousel_tabs_1 -->

			<div id="products_carousel_3" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pc3_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pc3][section_title]',
						'value'			=> isset( $home_v3['pc3']['section_title'] ) ? $home_v3['pc3']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pc3_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v3[pc3][shortcode_content]',
						'value'			=> isset( $home_v3['pc3']['shortcode_content'] ) ? $home_v3['pc3']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v3_pc3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v3[pc3][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v3['pc3']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v3['pc3']['shortcode_content']['shortcode_atts']['template'] : 'content-product-with-rating',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_pc3_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[pc3][carousel_args]',
						'value'			=> isset( $home_v3['pc3']['carousel_args'] ) ? $home_v3['pc3']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_products_carousel_3' ) ?>

			</div> <!-- /#products_carousel_3 -->

			<div id="product_carousel_with_bg" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v3_pcbg_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pcbg][section_title]',
						'value'			=> isset( $home_v3['pcbg']['section_title'] ) ? $home_v3['pcbg']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pcbg_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v3[pcbg][shortcode_content]',
						'value'			=> isset( $home_v3['pcbg']['shortcode_content'] ) ? $home_v3['pcbg']['shortcode_content'] : '',
					) );

					techmarket_wp_upload_image( array( 
						'id' 			=> '_home_v3_pcbg_image',
						'label'			=> esc_html__( 'Image', 'techmarket' ),
						'name'			=> '_home_v3[pcbg][image]',
						'value'			=> isset( $home_v3['pcbg']['image']) ? $home_v3['pcbg']['image'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_pcwtc_pcbg_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[pcbg][carousel_args]',
						'value'			=> isset( $home_v3['pcbg']['carousel_args'] ) ? $home_v3['pcbg']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>
				
				<?php do_action( 'techmarket_home_v3_after_product_carousel_with_bg' ) ?>

			</div> <!-- /#product_carousel_with_bg -->

			<div id="landscape_product_carousel_tabs" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_lpct_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[lpct][section_title]',
						'value'			=> isset( $home_v3['lpct']['section_title'] ) ? $home_v3['lpct']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_lpct_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[lpct][carousel_args]',
						'value'			=> isset( $home_v3['lpct']['carousel_args'] ) ? $home_v3['lpct']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_lpct_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[lpct][tabs][0][title]',
						'value'			=> isset( $home_v3['lpct']['tabs'][0]['title'] ) ? $home_v3['lpct']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_lpct_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v3[lpct][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v3['lpct']['tabs'][0]['shortcode_content'] ) ? $home_v3['lpct']['tabs'][0]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v3_lpct_tab_1_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v3[lpct][tabs][0][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v3['lpct']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v3['lpct']['tabs'][0]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_lpct_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[lpct][tabs][1][title]',
						'value'			=> isset( $home_v3['lpct']['tabs'][1]['title'] ) ? $home_v3['lpct']['tabs'][1]['title'] : esc_html__( '4K Ultra HD', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_lpct_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v3[lpct][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v3['lpct']['tabs'][1]['shortcode_content'] ) ? $home_v3['lpct']['tabs'][1]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v3_lpct_tab_2_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v3[lpct][tabs][1][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v3['lpct']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v3['lpct']['tabs'][1]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_lpct_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[lpct][tabs][2][title]',
						'value'			=> isset( $home_v3['lpct']['tabs'][2]['title'] ) ? $home_v3['lpct']['tabs'][2]['title'] : esc_html__( 'QLED Tvs', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_lpct_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v3[lpct][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v3['lpct']['tabs'][2]['shortcode_content'] ) ? $home_v3['lpct']['tabs'][2]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v3_lpct_tab_3_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v3[lpct][tabs][2][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v3['lpct']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v3['lpct']['tabs'][2]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );

				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_lpct_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[lpct][tabs][3][title]',
						'value'			=> isset( $home_v3['lpct']['tabs'][3]['title'] ) ? $home_v3['lpct']['tabs'][3]['title'] : esc_html__( 'SUHD Tvs', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_lpct_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v3[lpct][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v3['lpct']['tabs'][3]['shortcode_content'] ) ? $home_v3['lpct']['tabs'][3]['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v3_lpct_tab_4_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v3[lpct][tabs][3][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v3['lpct']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] ) ? $home_v3['lpct']['tabs'][3]['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product-card',
					) );

				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_landscape_product_carousel_tabs' ) ?>

			</div><!-- /#landscape_product_carousel_tabs -->

			<div id="banner_with_product_carousel" class="panel techmarket_options_panel">
				
				<?php techmarket_wp_legend( esc_html__( 'Banner', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php
					techmarket_wp_banner_options( array( 
						'id' 			=> '_home_v3_brwpc_br',
						'label'			=> esc_html__( 'Banner 1', 'techmarket' ),
						'name'			=> '_home_v3[brwpc][br]',
						'value'			=> isset( $home_v3['brwpc']['br'] ) ? $home_v3['brwpc']['br'] : '',
						'fields'		=> array( 'title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
					) );
				?>
				</div>

				<?php techmarket_wp_legend( esc_html__( 'Products Carousel', 'techmarket' ) ); ?>

				<div class="options_group">
				<?php 

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pc_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v3[brwpc][pc][shortcode_content]',
						'value'			=> isset( $home_v3['brwpc']['pc']['shortcode_content'] ) ? $home_v3['brwpc']['pc']['shortcode_content'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_pc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[brwpc][pc][carousel_args]',
						'value'			=> isset( $home_v3['brwpc']['pc']['carousel_args'] ) ? $home_v3['brwpc']['pc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_banner_with_product_carousel' ) ?>

			</div><!-- /#banner_with_product_carousel -->
			
			<div id="full_width_banner" class="panel techmarket_options_panel">

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v3_sbr',
							'label'			=> esc_html__( 'Banner', 'techmarket' ),
							'name'			=> '_home_v3[sbr]',
							'value'			=> isset( $home_v3['sbr']) ? $home_v3['sbr'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_full_width_banner' ) ?>

			</div><!-- /#full_width_banner -->

			<div id="category_carousel_2" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id'			=> '_home_v3_catc2_section_title', 
						'label' 		=> esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[catc2][section_title]',
						'value'			=> isset( $home_v3['catc2']['section_title'] ) ? $home_v3['catc2']['section_title'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_catc2_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v3[catc2][number]',
						'value'			=> isset( $home_v3['catc2']['number'] ) ? $home_v3['catc2']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_catc2_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v3[catc2][orderby]',
						'value'			=> isset( $home_v3['catc2']['orderby'] ) ? $home_v3['catc2']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_catc2_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v3[catc2][order]',
						'value'			=> isset( $home_v3['catc2']['order'] ) ? $home_v3['catc2']['order'] : 'ASC',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_catc2_slugs', 
						'label' 		=> esc_html__( 'Slugs', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Slugs', 'techmarket' ),
						'name'			=> '_home_v3[catc2][slugs]',
						'value'			=> isset( $home_v3['catc2']['slugs'] ) ? $home_v3['catc2']['slugs'] : '',
					) );


					techmarket_wp_checkbox( array(
						'id'			=> '_home_v3_catc2_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v3[catc2][hide_empty]',
						'value'			=> isset( $home_v3['catc2']['hide_empty'] ) ? $home_v3['catc2']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_catc2_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[catc2][carousel_args]',
						'value'			=> isset( $home_v3['catc2']['carousel_args'] ) ? $home_v3['catc2']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_category_carousel_2' ) ?>

			</div> <!-- /#category_carousel_2 -->

			<div id="products_carousel_tabs_2" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct2_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct2][section_title]',
						'value'			=> isset( $home_v3['pct2']['section_title'] ) ? $home_v3['pct2']['section_title'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_pct2_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[pct2][carousel_args]',
						'value'			=> isset( $home_v3['pct2']['carousel_args'] ) ? $home_v3['pct2']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<div class="options_group">
				<?php	
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct2_tab_1_title', 
						'label' 		=> esc_html__( 'Tab #1 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct2][tabs][0][title]',
						'value'			=> isset( $home_v3['pct2']['tabs'][0]['title'] ) ? $home_v3['pct2']['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pct2_tab_1_shortcode_content',
						'label'			=> esc_html__( 'Tab #1 Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v3[pct2][tabs][0][shortcode_content]',
						'value'			=> isset( $home_v3['pct2']['tabs'][0]['shortcode_content'] ) ? $home_v3['pct2']['tabs'][0]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct2_tab_2_title', 
						'label' 		=> esc_html__( 'Tab #2 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct2][tabs][1][title]',
						'value'			=> isset( $home_v3['pct2']['tabs'][1]['title'] ) ? $home_v3['pct2']['tabs'][1]['title'] : esc_html__( 'Audio & Video', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pct2_tab_2_shortcode_content',
						'label'			=> esc_html__( 'Tab #2 Content', 'techmarket' ),
						'default'		=> 'featured_products',
						'name'			=> '_home_v3[pct2][tabs][1][shortcode_content]',
						'value'			=> isset( $home_v3['pct2']['tabs'][1]['shortcode_content'] ) ? $home_v3['pct2']['tabs'][1]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct2_tab_3_title', 
						'label' 		=> esc_html__( 'Tab #3 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct2][tabs][2][title]',
						'value'			=> isset( $home_v3['pct2']['tabs'][2]['title'] ) ? $home_v3['pct2']['tabs'][2]['title'] : esc_html__( 'Laptops & Computers', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pct2_tab_3_shortcode_content',
						'label'			=> esc_html__( 'Tab #3 Content', 'techmarket' ),
						'default'		=> 'sale_products',
						'name'			=> '_home_v3[pct2][tabs][2][shortcode_content]',
						'value'			=> isset( $home_v3['pct2']['tabs'][2]['shortcode_content'] ) ? $home_v3['pct2']['tabs'][2]['shortcode_content'] : '',
					) );
				?>
				</div>

				<div class="options_group">
				<?php
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_pct2_tab_4_title', 
						'label' 		=> esc_html__( 'Tab #4 Title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[pct2][tabs][3][title]',
						'value'			=> isset( $home_v3['pct2']['tabs'][3]['title'] ) ? $home_v3['pct2']['tabs'][3]['title'] : esc_html__( 'Video Cameras', 'techmarket' ),
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_pct2_tab_4_shortcode_content',
						'label'			=> esc_html__( 'Tab #4 Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v3[pct2][tabs][3][shortcode_content]',
						'value'			=> isset( $home_v3['pct2']['tabs'][3]['shortcode_content'] ) ? $home_v3['pct2']['tabs'][3]['shortcode_content'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_products_carousel_tabs_2' ) ?>

			</div><!-- /#products_carousel_tabs_2 -->

			<div id="landscape_product_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_lpc_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v3[lpc][section_title]',
						'value'			=> isset( $home_v3['lpc']['section_title'] ) ? $home_v3['lpc']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v3_lpc_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'recent_products',
						'name'			=> '_home_v3[lpc][shortcode_content]',
						'value'			=> isset( $home_v3['lpc']['shortcode_content'] ) ? $home_v3['lpc']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v3_lpc_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v3[lpc][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v3['lpc']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v3['lpc']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_lpc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[lpc][carousel_args]',
						'value'			=> isset( $home_v3['lpc']['carousel_args'] ) ? $home_v3['lpc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_landscape_product_carousel' ) ?>

			</div> <!-- /#landscape_product_carousel -->

			<div id="brands_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_bc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v3[bc][number]',
						'value'			=> isset( $home_v3['bc']['number'] ) ? $home_v3['bc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_bc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v3[bc][orderby]',
						'value'			=> isset( $home_v3['bc']['orderby'] ) ? $home_v3['bc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v3_bc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v3[bc][order]',
						'value'			=> isset( $home_v3['bc']['order'] ) ? $home_v3['bc']['order'] : 'ASC',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_home_v3_bc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v3[bc][hide_empty]',
						'value'			=> isset( $home_v3['bc']['hide_empty'] ) ? $home_v3['bc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v3_bc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v3[bc][carousel_args]',
						'value'			=> isset( $home_v3['bc']['carousel_args'] ) ? $home_v3['bc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v3_after_brands_carousel' ) ?>

			</div> <!-- /#brands_carousel -->
		
			<?php do_action( 'techmarket_home_v3_write_panel_tabs_after' ); ?>

		</div>
		<?php
	}

	public static function save( $post_id, $post ) {
		if ( isset( $_POST['_home_v3'] ) ) {
			$clean_home_v3_options = techmarket_clean_kses_post( $_POST['_home_v3'] );
			update_post_meta( $post_id, '_home_v3_options',  serialize( $clean_home_v3_options ) );
		}	
	}
}