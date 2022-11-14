<?php
/**
 * Home v7 Metabox
 *
 * Displays the home v7 meta box, tabbed, with several panels covering price, stock etc.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Meta_Box_Home_v7 Class.
 */
class Techmarket_Meta_Box_Home_v7 {

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

		if ( $template_file !== 'template-homepage-v7.php' ) {
			return;
		}

		self::output_home_v7( $post );
	}

	private static function output_home_v7( $post ) {

		$home_v7 = techmarket_get_home_v7_meta();

		?>
		<div class="panel-wrap meta-box-home">
			<ul class="home_data_tabs tm-tabs">
			<?php
				$product_data_tabs = apply_filters( 'techmarket_home_v7_data_tabs', array(
					'general' => array(
						'label'  => esc_html__( 'General', 'techmarket' ),
						'target' => 'general_block',
						'class'  => array(),
					),
					'product_isotope' => array(
						'label'  => esc_html__( 'Product Isotope', 'techmarket' ),
						'target' => 'product_isotope',
						'class'  => array(),
					),
					'notice_block' => array(
						'label'  => esc_html__( 'Notice Block', 'techmarket' ),
						'target' => 'notice_block',
						'class'  => array(),
					),
					'full_width_banner' => array(
						'label'  => esc_html__( 'Full Width Banner', 'techmarket' ),
						'target' => 'full_width_banner',
						'class'  => array(),
					),
					'category_list' => array(
						'label'  => esc_html__( 'Category List', 'techmarket' ),
						'target' => 'category_list',
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

			<?php do_action( 'techmarket_home_v5_write_panel_tabs_before' ); ?>
			
			<div id="general_block" class="panel techmarket_options_panel">
				<div class="options_group">
				<?php 
					techmarket_wp_select( array(
						'id'		=> '_home_v7_header_style',
						'label'		=> esc_html__( 'Header Style', 'techmarket' ),
						'name'		=> '_home_v7[header_style]',
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
						'value'		=> isset( $home_v7['header_style'] ) ? $home_v7['header_style'] : '',
					) );
				?>
				</div>
				<div class="options_group">
					<?php 
						$home_v7_blocks = array(
							'dpi'	=> esc_html__( 'Product Isotope', 'techmarket' ),
							'ntc'	=> esc_html__( 'Notice Block', 'techmarket' ),
							'sbr'	=> esc_html__( 'Full Width Banner', 'techmarket' ),
							'catl'	=> esc_html__( 'Category List', 'techmarket' ),
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
							<?php foreach( $home_v7_blocks as $key => $home_v7_block ) : ?>
							<tr>
								<td><?php echo esc_html( $home_v7_block ); ?></td>
								<td><?php techmarket_wp_animation_dropdown( array(  'id' => '_home_v7_' . $key . '_animation', 'label'=> '', 'name' => '_home_v7[' . $key . '][animation]', 'value' => isset( $home_v7['' . $key . '']['animation'] ) ? $home_v7['' . $key . '']['animation'] : '', )); ?></td>
								<td><?php techmarket_wp_text_input( array(  'id' => '_home_v7_' . $key . '_priority', 'label'=> '', 'name' => '_home_v7[' . $key . '][priority]', 'value' => isset( $home_v7['' . $key . '']['priority'] ) ? $home_v7['' . $key . '']['priority'] : 10, ) ); ?></td>
								<td><?php techmarket_wp_checkbox( array( 'id' => '_home_v7_' . $key . '_is_enabled', 'label' => '', 'name' => '_home_v7[' . $key . '][is_enabled]', 'value'=> isset( $home_v7['' . $key . '']['is_enabled'] ) ? $home_v7['' . $key . '']['is_enabled'] : '', ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php do_action( 'techmarket_home_v7_after_general_block' ) ?>

			</div><!-- /#general_block -->
			
			<div id="product_isotope" class="panel techmarket_options_panel">

				<div class="options_group">
					<?php
						techmarket_wp_text_input( array( 
							'id'			=> '_home_v7_dpi_pre_title', 
							'label' 		=>  esc_html__( 'Pre title', 'techmarket' ),
							'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
							'name'			=> '_home_v7[dpi][pre_title]',
							'value'			=> isset( $home_v7['dpi']['pre_title'] ) ? $home_v7['dpi']['pre_title'] : '',
						) );

						techmarket_wp_textarea_input( array( 
							'id'			=> '_home_v7_dpi_section_title', 
							'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
							'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
							'name'			=> '_home_v7[dpi][section_title]',
							'value'			=> isset( $home_v7['dpi']['section_title'] ) ? $home_v7['dpi']['section_title'] : '',
						) );

						techmarket_wp_text_input( array( 
							'id'			=> '_home_v7_dpi_timer_title', 
							'label' 		=>  esc_html__( 'Timer Title', 'techmarket' ),
							'name'			=> '_home_v7[dpi][timer_title]',
							'value'			=> isset( $home_v7['dpi']['timer_title'] ) ? $home_v7['dpi']['timer_title'] : '',
						) );

						techmarket_wp_checkbox( array(
							'id'			=> '_home_v7_dpi_header_timer', 
							'label' 		=>  esc_html__( 'Show Timer', 'techmarket' ),
							'name'			=> '_home_v7[dpi][header_timer]',
							'value'			=> isset( $home_v7['dpi']['header_timer'] ) ? $home_v7['dpi']['header_timer'] : '',
						) );

						techmarket_wp_text_input( array( 
							'id'			=> '_home_v7_dpi_timer_value', 
							'label' 		=>  esc_html__( 'Timer Value', 'techmarket' ),
							'name'			=> '_home_v7[dpi][timer_value]',
							'value'			=> isset( $home_v7['dpi']['timer_value'] ) ? $home_v7['dpi']['timer_value'] : '',
						) );

						techmarket_wp_text_input( array( 
							'id'			=> '_home_v7_dpi_action_text', 
							'label' 		=>  esc_html__( 'Action Text', 'techmarket' ),
							'name'			=> '_home_v7[dpi][action_text]',
							'value'			=> isset( $home_v7['dpi']['action_text'] ) ? $home_v7['dpi']['action_text'] : '',
						) );

						techmarket_wp_text_input( array( 
							'id'			=> '_home_v7_dpi_action_link', 
							'label' 		=>  esc_html__( 'Action Link', 'techmarket' ),
							'name'			=> '_home_v7[dpi][action_link]',
							'value'			=> isset( $home_v7['dpi']['action_link'] ) ? $home_v7['dpi']['action_link'] : '',
						) );

						techmarket_wp_wc_shortcode( array( 
							'id' 			=> '_home_v7_dpi_shortcode_content',
							'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
							'default'		=> 'recent_products',
							'name'			=> '_home_v7[dpi][shortcode_content]',
							'value'			=> isset( $home_v7['dpi']['shortcode_content'] ) ? $home_v7['dpi']['shortcode_content'] : '',
							'fields'		=> array()
						) );						
					?>
				</div>

				<?php do_action( 'techmarket_home_v7_after_product_isotope' ) ?>

			</div><!-- /#product_isotope -->
	
			<div id="notice_block" class="panel techmarket_options_panel">

				<div class="options_group">
				<?php 
					techmarket_wp_textarea_input( array( 
						'id' 			=> '_home_v7_ntc_notice_info', 
						'label' 		=> esc_html__( 'Content', 'techmarket' ), 
						'name'			=> '_home_v7[ntc][notice_info]',
						'value'			=> isset( $home_v7['ntc']['notice_info'] ) ? $home_v7['ntc']['notice_info'] : '',
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v7_after_notice_block' ) ?>

			</div><!-- /#notice_block -->

			<div id="full_width_banner" class="panel techmarket_options_panel">

				<div class="options_group">
					<?php
						techmarket_wp_banner_options( array( 
							'id' 			=> '_home_v7_sbr_br2',
							'label'			=> esc_html__( 'Banner', 'techmarket' ),
							'name'			=> '_home_v7[sbr]',
							'value'			=> isset( $home_v7['sbr']) ? $home_v7['sbr'] : '',
							'fields'		=> array( 'title', 'sub_title', 'action_text', 'action_link', 'bg_choice', 'bg_image', 'bg_color', 'bg_height' )
						) );
					?>
				</div>

				<?php do_action( 'techmarket_home_v7_after_full_width_banner' ) ?>

			</div><!-- /#full_width_banner -->

			<div id="category_list" class="panel techmarket_options_panel">

				<div class="options_group">
					<?php
						techmarket_wp_text_input( array( 
							'id'			=> '_home_v7_catl_section_title', 
							'label' 		=> esc_html__( 'Section title', 'techmarket' ),
							'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
							'name'			=> '_home_v7[catl][section_title]',
							'value'			=> isset( $home_v7['catl']['section_title'] ) ? $home_v7['catl']['section_title'] : '',
						) );

						techmarket_wp_text_input( array( 
							'id'			=> '_home_v7_catl_category_args_orderby', 
							'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
							'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
							'name'			=> '_home_v7[catl][category_args][orderby]',
							'value'			=> isset( $home_v7['catl']['category_args']['orderby'] ) ? $home_v7['catl']['category_args']['orderby'] : 'name',
						) );

						techmarket_wp_text_input( array( 
							'id'			=> '_home_v7_catl_category_args_order', 
							'label' 		=>  esc_html__( 'Order', 'techmarket' ),
							'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
							'name'			=> '_home_v7[catl][category_args][order]',
							'value'			=> isset( $home_v7['catl']['category_args']['order'] ) ? $home_v7['catl']['category_args']['order'] : 'ASC',
						) );

						techmarket_wp_text_input( array( 
							'id'			=> '_home_v7_catl_category_args_slugs', 
							'label' 		=> esc_html__( 'Slugs', 'techmarket' ),
							'placeholder' 	=> esc_html__( 'Enter the Slugs', 'techmarket' ),
							'name'			=> '_home_v7[catl][category_args][slugs]',
							'value'			=> isset( $home_v7['catl']['category_args']['slugs'] ) ? $home_v7['catl']['category_args']['slugs'] : '',
						) );

						techmarket_wp_checkbox( array(
							'id'			=> '_home_v7_catl_category_args_hide_empty', 
							'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
							'name'			=> '_home_v7[catl][category_args][hide_empty]',
							'value'			=> isset( $home_v7['catl']['category_args']['hide_empty'] ) ? $home_v7['catl']['category_args']['hide_empty'] : '',
						) );

					?>
				</div>

				<?php do_action( 'techmarket_home_v7_after_category_list' ) ?>

			</div><!-- /#category_list -->			

			<div id="landscape_product_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v7_lpc_section_title', 
						'label' 		=>  esc_html__( 'Section title', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the title', 'techmarket' ),
						'name'			=> '_home_v7[lpc][section_title]',
						'value'			=> isset( $home_v7['lpc']['section_title'] ) ? $home_v7['lpc']['section_title'] : '',
					) );

					techmarket_wp_wc_shortcode( array( 
						'id' 			=> '_home_v7_lpc_shortcode_content',
						'label'			=> esc_html__( 'Shortcode Content', 'techmarket' ),
						'default'		=> 'top_rated_products',
						'name'			=> '_home_v7[lpc][shortcode_content]',
						'value'			=> isset( $home_v7['lpc']['shortcode_content'] ) ? $home_v7['lpc']['shortcode_content'] : '',
					) );

					techmarket_wp_hidden_input( array( 
						'id' 			=> '_home_v7_lpc_shortcode_content_shortcode_atts_template',
						'label' 		=>  esc_html__( 'SC Template Attr', 'techmarket' ),
						'name'			=> '_home_v7[lpc][shortcode_content][shortcode_atts][template]',
						'value'			=> isset( $home_v7['lpc']['shortcode_content']['shortcode_atts']['template'] ) ? $home_v7['lpc']['shortcode_content']['shortcode_atts']['template'] : 'content-landscape-product',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v7_pcwtc_lpc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v7[lpc][carousel_args]',
						'value'			=> isset( $home_v7['lpc']['carousel_args'] ) ? $home_v7['lpc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'dots' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v7_after_landscape_product_carousel' ) ?>

			</div> <!-- /#landscape_product_carousel -->

			<div id="brands_carousel" class="panel techmarket_options_panel">
				
				<div class="options_group">
				<?php 
					techmarket_wp_text_input( array( 
						'id'			=> '_home_v7_bc_number', 
						'label' 		=>  esc_html__( 'Limit', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the limit', 'techmarket' ),
						'name'			=> '_home_v7[bc][number]',
						'value'			=> isset( $home_v7['bc']['number'] ) ? $home_v7['bc']['number'] : '',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v7_bc_orderby', 
						'label' 		=>  esc_html__( 'Order By', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the order by', 'techmarket' ),
						'name'			=> '_home_v7[bc][orderby]',
						'value'			=> isset( $home_v7['bc']['orderby'] ) ? $home_v7['bc']['orderby'] : 'title',
					) );

					techmarket_wp_text_input( array( 
						'id'			=> '_home_v7_bc_order', 
						'label' 		=>  esc_html__( 'Order', 'techmarket' ),
						'placeholder' 	=> esc_html__( 'Enter the Order', 'techmarket' ),
						'name'			=> '_home_v7[bc][order]',
						'value'			=> isset( $home_v7['bc']['order'] ) ? $home_v7['bc']['order'] : 'ASC',
					) );

					techmarket_wp_checkbox( array(
						'id'			=> '_home_v7_bc_hide_empty', 
						'label' 		=>  esc_html__( 'Hide Empty?', 'techmarket' ),
						'name'			=> '_home_v7[bc][hide_empty]',
						'value'			=> isset( $home_v7['bc']['hide_empty'] ) ? $home_v7['bc']['hide_empty'] : '',
					) );

					techmarket_wp_slick_carousel_options( array( 
						'id' 			=> '_home_v7_bc_carousel_args',
						'label'			=> esc_html__( 'Carousel Args', 'techmarket' ),
						'name'			=> '_home_v7[bc][carousel_args]',
						'value'			=> isset( $home_v7['bc']['carousel_args'] ) ? $home_v7['bc']['carousel_args'] : '',
						'fields'		=> array( 'slidesToShow', 'slidesToScroll', 'arrows' )
					) );
				?>
				</div>

				<?php do_action( 'techmarket_home_v7_after_brands_carousel' ) ?>

			</div> <!-- /#brands_carousel -->

			<?php do_action( 'techmarket_home_v7_write_panel_tabs_after' ); ?>

		</div>
		<?php
	}

	public static function save( $post_id, $post ) {
		if ( isset( $_POST['_home_v7'] ) ) {
			$clean_home_v7_options = techmarket_clean_kses_post( $_POST['_home_v7'] );
			update_post_meta( $post_id, '_home_v7_options',  serialize( $clean_home_v7_options ) );
		}	
	}
}