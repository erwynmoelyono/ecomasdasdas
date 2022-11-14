<?php
/**
 * Template tags for Home v12
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v12_options() {
	$home_v12 = array(
		'swb'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'sdr_shortcode'		=> '',
			'br1' 				=> array(
				'title'			=> wp_kses_post( __( '<strong>Top 100 Deals</strong><br> for Womens<br> Fashion', 'techmarket' ) ),
				'action_link'	=> '#',
				'price'			=> wp_kses_post( __( '<span class="start_price">Starting at</span><br>$69.99', 'techmarket' ) ),
				'bg_choice'		=> 'image'
			),
			'br2'  				=> array(
				'title'			=> wp_kses_post( __( 'Billboard<br> Music Albums<br> <strong>Carnival</strong> time ', 'techmarket' ) ),
				'sub_title'		=> esc_html__( 'Buy 3 Get 10% off', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image',
			),
			'br3'  				=> array(
				'title'			=> wp_kses_post( __( '<strong>20% Off Tech</strong><br> at Smartphones,<br> Power banks, <br>Accesories &<br> More', 'techmarket' ) ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br4'  				=> array(
				'pre_title'		=> esc_html__( 'Kids Day', 'techmarket' ),
				'title'			=> wp_kses_post( __( 'Limited Free<br> <strong> 2-Day Shipping</strong><br> on Kids products', 'techmarket' ) ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			)
		),
		'pc1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 20,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Hot New Arrivals You might Like', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'=> array(
					'columns'		=> '8',
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 8,
				'slidesToScroll'	=> 8,
				'dots'				=> 'yes',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'pct1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Save on Clothing for Her', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Bestsellers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Dresses', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Tops', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Sweaters', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Activewear', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'best_selling_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Shorts', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 8,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 8
			)
		),
		'catc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( 'Top <br>categories <br>this week', 'techmarket' ) ),
			'header_custom_nav'	=> 'yes',
			'number'			=> 14,
			'columns'			=> 7,
			'slugs'				=> '',
			'carousel_args'		=> array(
				'slidesToShow'		=> 7,
				'dots'				=> 'no',
				'arrows'			=> 'yes',
				'slidesToScroll'	=> 7,
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'brs'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'br1'				=> array(
				'title'			=> wp_kses_post( __( 'Get rid of<br><strong> Mosquitoes</strong> <br>in best way', 'techmarket' ) ),
				'action_text'	=> esc_html__( 'Shop Now', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br2'				=> array(
				'title'			=> wp_kses_post( __( '<span><span class="offer-amount">70<span class="offer-symbol">%<span class="offer-text">off</span></span></span>Live with Style <br> in kitchen </span>', 'techmarket' ) ),
				'sub_title'		=> wp_kses_post( __( '<ul><li>CERAMICS</li><li>CUTLERY</li><li>ACCESORIES</li><li>CHAIRS</li></ul>', 'techmarket' ) ),
				'action_text'	=> esc_html__( 'Browse', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br3'				=> array(
				'title'			=> wp_kses_post( __( '<strong> Led Lamp</strong><br> Smart 4 light profiles', 'techmarket' ) ),
				'price'			=> '$34.99',
				'action_text'	=> esc_html__( 'Buy Now', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
		),
		'pc2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Best Value Perfumes & Beauty', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'=> array(
					'columns'		=> '8',
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 8,
				'slidesToScroll'	=> 8,
				'dots'				=> 'yes',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'pct2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 70,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Easy Basics for Sports & Fitness', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Bestsellers', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Treadmills', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Weights', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Benches', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Exercise Bikes', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'best_selling_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Yoga', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'		=> 8,
				'dots'				=> 'yes',
				'arrows'			=> 'no',
				'slidesToScroll'	=> 8
			)
		),
		'sbr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 80,
			'animation'			=> '',
			'title'				=> wp_kses_post( __( '<strong>Seamless entertainment</strong> <br> from start to end', 'techmarket' ) ),
			'sub_title'			=> esc_html__( 'Discover a world of content', 'techmarket' ),
			'action_text'		=> wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'		=> '#',
			'bg_choice'			=> 'image'
		),
		'lpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 90,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Recently viewed products', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '5',
					'template'		=> 'content-landscape-product',
				),
			),
			'carousel_args'		=> array(
				'slidesToShow'	=> 5,
				'slidesToScroll'=> 2,
				'dots'			=> 'yes',
				'arrows'		=> 'yes',
				'prevArrow'		=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'		=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'bc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 100,
			'animation'			=> '',
			'orderby'			=> 'title',
			'order'				=> 'ASC',
			'number'			=> 12,
			'hide_empty'		=> 'no',
			'carousel_args'		=> array(
				'slidesToShow'	=> 6,
				'slidesToScroll'=> 1,
				'dots'			=> 'no',
				'arrows'		=> 'yes'
			)
		)
	);

	return apply_filters( 'techmarket_get_default_home_v12_options', $home_v12 );
}

function techmarket_get_home_v12_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v12_options = get_post_meta( $post->ID, '_home_v12_options', true );
		$home_v12_options = maybe_unserialize( $clean_home_v12_options );

		if( ! is_array( $home_v12_options ) ) {
			$home_v12_options = json_decode( $clean_home_v12_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v12_options();
			$home_v12 = wp_parse_args( $home_v12_options, $default_options );
		} else {
			$home_v12 = $home_v12_options;
		}

		return apply_filters( 'techmarket_home_v12_meta', $home_v12, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_v12' ) ) {
	/**
	 * Displays Slider in Home v12
	 */
	function techmarket_revslider_v12() {

		$home_v12 	= techmarket_get_home_v12_meta();

		$is_enabled = isset( $home_v12['swb']['is_enabled'] ) ? $home_v12['swb']['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $home_v12['swb']['animation'] ) ? $home_v12['swb']['animation'] : '';
		$shortcode = !empty( $home_v12['swb']['sdr_shortcode'] ) ? $home_v12['swb']['sdr_shortcode'] : '[rev_slider alias="home-v12-slider"]';

		$section_class = 'home-v12-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_home_v12_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_slider_with_banners_v12' ) ) {
	/**
	 *
	 */
	function techmarket_slider_with_banners_v12() {

		$home_v12 	= techmarket_get_home_v12_meta();
		$swb_options = $home_v12['swb'];
		$br1_options = $swb_options['br1'];
		$br2_options = $swb_options['br2'];
		$br3_options = $swb_options['br3'];
		$br4_options = $swb_options['br4'];

		$is_enabled = isset( $swb_options['is_enabled'] ) ? $swb_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $swb_options['animation'] ) ? $swb_options['animation'] : '';

		$banner_1_args = apply_filters( 'techmarket_slider_with_banners_v12_banner_1_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __( '<strong>Top 100 Deals</strong><br> for Womens<br> Fashion', 'techmarket' ) ),
			'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
			'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '300', '210' ) ) : array( '//placehold.it/300x210', '300', '210' ),
			'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
			'price'			=> isset( $br1_options['price'] ) ? $br1_options['price'] : wp_kses_post( __( '<span class="start_price">Starting at</span><br>$69.99', 'techmarket' ) ),
			'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
			'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : ''
		) );

		$banner_2_args = apply_filters( 'techmarket_slider_with_banners_v12_banner_2_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( 'Billboard<br> Music Albums<br> <strong>Carnival</strong> time', 'techmarket' ) ),
			'sub_title'		=> isset( $br2_options['sub_title'] ) ? $br2_options['sub_title'] : esc_html__( 'Buy 3 Get 10% off', 'techmarket' ),
			'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
			'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '300', '210' ) ) : array( '//placehold.it/300x210', '300', '210' ),
			'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
			'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : ''
		) );

		$banner_3_args = apply_filters( 'techmarket_slider_with_banners_v12_banner_3_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'title'			=> isset( $br3_options['title'] ) ? $br3_options['title'] : wp_kses_post( __( '<strong>20% Off Tech</strong><br> at Smartphones,<br> Power banks, <br>Accesories &<br> More', 'techmarket' ) ),
			'action_link'	=> isset( $br3_options['action_link'] ) ? $br3_options['action_link'] : '#',
			'bg_image'		=> isset( $br3_options['bg_image'] ) && intval( $br3_options['bg_image'] ) ? wp_get_attachment_image_src( $br3_options['bg_image'], array( '300', '210' ) ) : array( '//placehold.it/300x210', '300', '210' ),
			'bg_choice'		=> isset( $br3_options['bg_choice'] ) ? $br3_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br3_options['bg_color'] ) ? $br3_options['bg_color'] : '',
			'bg_height' 	=> isset( $br3_options['bg_height'] ) ? $br3_options['bg_height'] : ''
		) );

		$banner_4_args = apply_filters( 'techmarket_slider_with_banners_v12_banner_4_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'pre_title'		=> isset( $br4_options['pre_title'] ) ? $br4_options['pre_title'] : esc_html__( 'Kids Day', 'techmarket' ),
			'title'			=> isset( $br4_options['title'] ) ? $br4_options['title'] : wp_kses_post( __( 'Limited Free<br> <strong> 2-Day Shipping</strong><br> on Kids products', 'techmarket' ) ),
			'action_link'	=> isset( $br4_options['action_link'] ) ? $br4_options['action_link'] : '#',
			'bg_image'		=> isset( $br4_options['bg_image'] ) && intval( $br4_options['bg_image'] ) ? wp_get_attachment_image_src( $br4_options['bg_image'], array( '300', '210' ) ) : array( '//placehold.it/300x210', '300', '210' ),
			'bg_choice'		=> isset( $br4_options['bg_choice'] ) ? $br4_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br4_options['bg_color'] ) ? $br4_options['bg_color'] : '',
			'bg_height' 	=> isset( $br4_options['bg_height'] ) ? $br4_options['bg_height'] : ''
		) );

		?><div class="homev12-slider-with-banners row">
			<div class="slider-block column-1">
				<?php techmarket_revslider_v12(); ?>
			</div>
			<div class="banners-block column-2">
				<?php techmarket_banner( $banner_1_args ); ?>
				<?php techmarket_banner( $banner_2_args ); ?>
				<?php techmarket_banner( $banner_3_args ); ?>
				<?php techmarket_banner( $banner_4_args ); ?>
			</div>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_products_carousel_block_v12_1' ) ) {
	function techmarket_products_carousel_block_v12_1() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v12 	= techmarket_get_home_v12_meta();
			$pc1_options = $home_v12['pc1'];

			$is_enabled = isset( $pc1_options['is_enabled'] ) ? $pc1_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pc1_options['animation'] ) ? $pc1_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v12_1_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pc1_options['section_title'] ) ? $pc1_options['section_title'] : esc_html__( 'Hot New Arrivals You might Like', 'techmarket' ),
				'section_class'		=> '',
				'header_custom_nav'	=> isset( $pc1_options['header_custom_nav'] ) ? filter_var( $pc1_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $pc1_options['shortcode_content']['shortcode'] ) ? $pc1_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pc1_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pc1_options['shortcode_content'] ) : array( 'columns' => '8' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pc1_options['carousel_args']['slidesToShow'] ) ? intval( $pc1_options['carousel_args']['slidesToShow'] ) : 8,
					'slidesToScroll'	=> isset( $pc1_options['carousel_args']['slidesToScroll'] ) ? intval( $pc1_options['carousel_args']['slidesToScroll'] ) : 8,
					'dots'				=> isset( $pc1_options['carousel_args']['dots'] ) ? filter_var( $pc1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pc1_options['carousel_args']['arrows'] ) ? filter_var( $pc1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $pc1_options['carousel_args']['prevArrow'] ) ? $pc1_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $pc1_options['carousel_args']['nextArrow'] ) ? $pc1_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 780,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesToShow'		=> 4,
								'slidesToScroll'	=> 4
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 6,
								'slidesToScroll'	=> 6
							)
						)
					)
				)
			) );

			techmarket_products_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v12_1' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */
	function techmarket_products_carousel_tabs_v12_1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v12 	= techmarket_get_home_v12_meta();
			$pct1_options = $home_v12['pct1'];

			$is_enabled = isset( $pct1_options['is_enabled'] ) ? $pct1_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct1_options['animation'] ) ? $pct1_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v12_1_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $pct1_options['section_title'] ) ? $pct1_options['section_title'] : esc_html__( 'Save on Clothing for Her', 'techmarket' ),
				'section_class'	=> '',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct1_options['tabs'][0]['title'] ) ? $pct1_options['tabs'][0]['title'] : esc_html__( 'Bestsellers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][1]['title'] ) ? $pct1_options['tabs'][1]['title'] : esc_html__( 'Dresses', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][2]['title'] ) ? $pct1_options['tabs'][2]['title'] : esc_html__( 'Tops', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][3]['title'] ) ? $pct1_options['tabs'][3]['title'] : esc_html__( 'Sweaters', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][4]['title'] ) ? $pct1_options['tabs'][4]['title'] : esc_html__( 'Activewear', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][4]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][5]['title'] ) ? $pct1_options['tabs'][5]['title'] : esc_html__( 'Shorts', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][5]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][5]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][5]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][5]['shortcode_content'] ) : array( 'columns' => '8' )
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct1_options['carousel_args']['slidesToShow'] ) ? intval( $pct1_options['carousel_args']['slidesToShow'] ) : 8,
					'slidesToScroll'	=> isset( $pct1_options['carousel_args']['slidesToScroll'] ) ? intval( $pct1_options['carousel_args']['slidesToScroll'] ) : 8,
					'dots'				=> isset( $pct1_options['carousel_args']['dots'] ) ? filter_var( $pct1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct1_options['carousel_args']['arrows'] ) ? filter_var( $pct1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 780,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesToShow'		=> 4,
								'slidesToScroll'	=> 4
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 6,
								'slidesToScroll'	=> 6
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_product_categories_carousel_v12' ) ) {
	/**
	 *
	 */
	function techmarket_product_categories_carousel_v12() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v12 	= techmarket_get_home_v12_meta();
			$catc_options = $home_v12['catc'];

			$is_enabled = isset( $catc_options['is_enabled'] ) ? $catc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $catc_options['animation'] ) ? $catc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_product_categories_carousel_v12_section_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'section-top-categories section-categories-carousel-v1',
				'section_title'		=> isset( $catc_options['section_title'] ) ? $catc_options['section_title'] : wp_kses_post( __( 'Top <br>categories <br>this week', 'techmarket' ) ),
				'header_custom_nav'	=> isset( $catc_options['header_custom_nav'] ) ? filter_var( $catc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true
			) );

			$taxonomy_args = apply_filters( 'techmarket_product_categories_carousel_v12_taxonomy_args', array(
				'number'			=> isset( $catc_options['number'] ) ? $catc_options['number'] : 14,
				'columns'			=> isset( $catc_options['columns'] ) ? $catc_options['columns'] : 7,
				'slugs'				=> isset( $catc_options['slugs'] ) ? $catc_options['slugs'] : '',
			) );

			$carousel_args = apply_filters( 'techmarket_product_categories_carousel_v12_carousel_args', array(
				'slidesToShow'		=> isset( $catc_options['carousel_args']['slidesToShow'] ) ? intval( $catc_options['carousel_args']['slidesToShow'] ) : 7,
				'slidesToScroll'	=> isset( $catc_options['carousel_args']['slidesToScroll'] ) ? intval( $catc_options['carousel_args']['slidesToScroll'] ) : 7,
				'dots'				=> isset( $catc_options['carousel_args']['dots'] ) ? filter_var( $catc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'			=> isset( $catc_options['carousel_args']['arrows'] ) ? filter_var( $catc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'prevArrow'			=> isset( $catc_options['carousel_args']['prevArrow'] ) ? $catc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> isset( $catc_options['carousel_args']['nextArrow'] ) ? $catc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
				'responsive'		=> array(
					array(
						'breakpoint'	=> 1200,
						'settings'		=> array(
							'slidesToShow'		=> 2,
							'slidesToScroll'	=> 2
						)
					),
					array(
						'breakpoint'	=> 1700,
						'settings'		=> array(
							'slidesToShow'		=> 5,
							'slidesToScroll'	=> 5
						)
					)
				)
			) );

			techmarket_product_categories_carousel( $section_args , $taxonomy_args , $carousel_args );
		}
	}
}

if ( ! function_exists( 'techmarket_3_column_banners_v12' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_3_column_banners_v12() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v12 	= techmarket_get_home_v12_meta();
			$brs_options = $home_v12['brs'];
			$br1_options = $brs_options['br1'];
			$br2_options = $brs_options['br2'];
			$br3_options = $brs_options['br3'];

			$is_enabled = isset( $brs_options['is_enabled'] ) ? $brs_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $brs_options['animation'] ) ? $brs_options['animation'] : '';

			$args = apply_filters( 'techmarket_3_column_banners_v12_args', array(
				'section_class'	=> 'banners-v2',
				'banners'		=> array(
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __( 'Get rid of<br><strong> Mosquitoes</strong> <br>in best way', 'techmarket' ) ),
						'action_text'	=> isset( $br1_options['action_text'] ) ? $br1_options['action_text'] : esc_html__( 'Shop Now', 'techmarket' ),
						'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
						'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '420', '259' ) ) : array( '//placehold.it/420x259', '420', '259' ),
						'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
						'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : '',
						'section_class'	=> 'small-banner text-in-left'
					),
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( '<span><span class="offer_amount">70<span class="offer_symbol">%<span class="offer_text">off</span></span></span>Live with Style <br> in kitchen</span>', 'techmarket' ) ),
						'sub_title'		=> isset( $br2_options['sub_title'] ) ? $br2_options['sub_title'] : wp_kses_post( __( '<ul><li>CERAMICS |</li><li>CUTLERY |</li><li>ACCESORIES |</li><li>CHAIRS</li></ul>', 'techmarket' ) ),
						'action_text'	=> isset( $br2_options['action_text'] ) ? $br2_options['action_text'] : esc_html__( 'Browse', 'techmarket' ),
						'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
						'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '860', '259' ) ) : array( '//placehold.it/860x259', '860', '259' ),
						'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
						'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : '',
						'section_class'	=> 'large-banner large-banner-v1 text-in-left'
					),
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br3_options['title'] ) ? $br3_options['title'] : wp_kses_post( __( '<strong> Led Lamp</strong><br> Smart 4 light profiles', 'techmarket' ) ),
						'price'			=> isset( $br3_options['price'] ) ? $br3_options['price'] : '$34.99',
						'action_text'	=> isset( $br3_options['action_text'] ) ? $br3_options['action_text'] : esc_html__( 'Buy Now', 'techmarket' ),
						'action_link'	=> isset( $br3_options['action_link'] ) ? $br3_options['action_link'] : '#',
						'bg_image'		=> isset( $br3_options['bg_image'] ) && intval( $br3_options['bg_image'] ) ? wp_get_attachment_image_src( $br3_options['bg_image'], array( '420', '259' ) ) : array( '//placehold.it/420x259', '420', '259' ),
						'bg_choice'		=> isset( $br3_options['bg_choice'] ) ? $br3_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br3_options['bg_color'] ) ? $br3_options['bg_color'] : '',
						'bg_height' 	=> isset( $br3_options['bg_height'] ) ? $br3_options['bg_height'] : '',
						'section_class'	=> 'small-banner text-in-left'
					)
				)
			) );

			techmarket_banners( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_block_v12_2' ) ) {
	function techmarket_products_carousel_block_v12_2() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v12 	= techmarket_get_home_v12_meta();
			$pc2_options = $home_v12['pc2'];

			$is_enabled = isset( $pc2_options['is_enabled'] ) ? $pc2_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pc2_options['animation'] ) ? $pc2_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v12_2_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pc2_options['section_title'] ) ? $pc2_options['section_title'] : esc_html__( 'Best Value Perfumes & Beauty', 'techmarket' ),
				'section_class'		=> '',
				'header_custom_nav'	=> isset( $pc2_options['header_custom_nav'] ) ? filter_var( $pc2_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $pc2_options['shortcode_content']['shortcode'] ) ? $pc2_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pc2_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pc2_options['shortcode_content'] ) : array( 'columns' => '8' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pc2_options['carousel_args']['slidesToShow'] ) ? intval( $pc2_options['carousel_args']['slidesToShow'] ) : 8,
					'slidesToScroll'	=> isset( $pc2_options['carousel_args']['slidesToScroll'] ) ? intval( $pc2_options['carousel_args']['slidesToScroll'] ) : 8,
					'dots'				=> isset( $pc2_options['carousel_args']['dots'] ) ? filter_var( $pc2_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pc2_options['carousel_args']['arrows'] ) ? filter_var( $pc2_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $pc2_options['carousel_args']['prevArrow'] ) ? $pc2_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $pc2_options['carousel_args']['nextArrow'] ) ? $pc2_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 780,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesToShow'		=> 4,
								'slidesToScroll'	=> 4
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 6,
								'slidesToScroll'	=> 6
							)
						)
					)
				)
			) );

			techmarket_products_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v12_2' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */
	function techmarket_products_carousel_tabs_v12_2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v12 	= techmarket_get_home_v12_meta();
			$pct2_options = $home_v12['pct2'];

			$is_enabled = isset( $pct2_options['is_enabled'] ) ? $pct2_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct2_options['animation'] ) ? $pct2_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v12_2_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $pct2_options['section_title'] ) ? $pct2_options['section_title'] : esc_html__( 'Easy Basics for Sports & Fitness', 'techmarket' ),
				'section_class'	=> '',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct2_options['tabs'][0]['title'] ) ? $pct2_options['tabs'][0]['title'] : esc_html__( 'Bestsellers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][1]['title'] ) ? $pct2_options['tabs'][1]['title'] : esc_html__( 'Treadmills', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][2]['title'] ) ? $pct2_options['tabs'][2]['title'] : esc_html__( 'Weights', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][3]['title'] ) ? $pct2_options['tabs'][3]['title'] : esc_html__( 'Benches', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][4]['title'] ) ? $pct2_options['tabs'][4]['title'] : esc_html__( 'Exercise Bikes', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][4]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][5]['title'] ) ? $pct2_options['tabs'][5]['title'] : esc_html__( 'Yoga', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][5]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][5]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][5]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][5]['shortcode_content'] ) : array( 'columns' => '8' )
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct2_options['carousel_args']['slidesToShow'] ) ? intval( $pct2_options['carousel_args']['slidesToShow'] ) : 8,
					'slidesToScroll'	=> isset( $pct2_options['carousel_args']['slidesToScroll'] ) ? intval( $pct2_options['carousel_args']['slidesToScroll'] ) : 8,
					'dots'				=> isset( $pct2_options['carousel_args']['dots'] ) ? filter_var( $pct2_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct2_options['carousel_args']['arrows'] ) ? filter_var( $pct2_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 750,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 780,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesToShow'		=> 4,
								'slidesToScroll'	=> 4
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 6,
								'slidesToScroll'	=> 6
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_full_width_banner_v12' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_full_width_banner_v12() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v12 	= techmarket_get_home_v12_meta();
			$sbr_options = $home_v12['sbr'];

			$is_enabled = isset( $sbr_options['is_enabled'] ) ? $sbr_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $sbr_options['animation'] ) ? $sbr_options['animation'] : '';

			$args = apply_filters( 'techmarket_full_width_banner_v12_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'full-width-banner text-in-left banners-v2',
				'title'			=> isset( $sbr_options['title'] ) ? $sbr_options['title'] : wp_kses_post( __( '<strong>Seamless entertainment</strong> <br> from start to end', 'techmarket' ) ),
				'sub_title'		=> isset( $sbr_options['sub_title'] ) ? $sbr_options['sub_title'] : esc_html__( 'Discover a world of content', 'techmarket' ),
				'action_text'	=> isset( $sbr_options['action_text'] ) ? $sbr_options['action_text'] : wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
				'action_link'	=> isset( $sbr_options['action_link'] ) ? $sbr_options['action_link'] : '#',
				'bg_image'		=> isset( $sbr_options['bg_image'] ) && intval( $sbr_options['bg_image'] ) ? wp_get_attachment_image_src( $sbr_options['bg_image'], array( '1740', '236' ) ) : array( '//placehold.it/1740x236', '1740', '236' ),
				'bg_choice'		=> isset( $sbr_options['bg_choice'] ) ? $sbr_options['bg_choice'] : 'image',
				'bg_color' 		=> isset( $sbr_options['bg_color'] ) ? $sbr_options['bg_color'] : '',
				'bg_height' 	=> isset( $sbr_options['bg_height'] ) ? $sbr_options['bg_height'] : ''
			) );

			techmarket_banner( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_block_v12_3' ) ) {
	function techmarket_products_carousel_block_v12_3() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v12 	= techmarket_get_home_v12_meta();
			$lpc_options = $home_v12['lpc'];

			$is_enabled = isset( $lpc_options['is_enabled'] ) ? $lpc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $lpc_options['animation'] ) ? $lpc_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v12_3_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpc_options['section_title'] ) ? $lpc_options['section_title'] : esc_html__( 'Recently viewed products', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-carousel',
				'header_custom_nav'	=> isset( $lpc_options['header_custom_nav'] ) ? filter_var( $lpc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $lpc_options['shortcode_content']['shortcode'] ) ? $lpc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $lpc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpc_options['shortcode_content'] ) : array( 'columns' => '5', 'template' => 'content-landscape-product' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $lpc_options['carousel_args']['slidesToShow'] ) ? intval( $lpc_options['carousel_args']['slidesToShow'] ) : 5,
					'slidesToScroll'	=> isset( $lpc_options['carousel_args']['slidesToScroll'] ) ? intval( $lpc_options['carousel_args']['slidesToScroll'] ) : 2,
					'dots'				=> isset( $lpc_options['carousel_args']['dots'] ) ? filter_var( $lpc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $lpc_options['carousel_args']['arrows'] ) ? filter_var( $lpc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $lpc_options['carousel_args']['prevArrow'] ) ? $lpc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $lpc_options['carousel_args']['nextArrow'] ) ? $lpc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 992,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						)
					)
				)
			) );

			techmarket_products_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_brands_carousel_v12' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v12() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v12 	= techmarket_get_home_v12_meta();
			$bc_options = $home_v12['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v12_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v12_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_v12_carousel_args', array(
				'slidesToShow'	=> isset( $bc_options['carousel_args']['slidesToShow'] ) ? intval( $bc_options['carousel_args']['slidesToShow'] ) : 6,
				'slidesToScroll'=> isset( $bc_options['carousel_args']['slidesToScroll'] ) ? intval( $bc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'			=> isset( $bc_options['carousel_args']['dots'] ) ? filter_var( $bc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'		=> isset( $bc_options['carousel_args']['arrows'] ) ? filter_var( $bc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'responsive'		=> array(
					array(
						'breakpoint'	=> 450,
						'settings'		=> array(
							'slidesToShow'		=> 1,
							'slidesToScroll'	=> 1
						)
					),
					array(
						'breakpoint'	=> 780,
						'settings'		=> array(
							'slidesToShow'		=> 3,
							'slidesToScroll'	=> 3
						)
					),
					array(
						'breakpoint'	=> 1200,
						'settings'		=> array(
							'slidesToShow'		=> 4,
							'slidesToScroll'	=> 4
						)
					),
					array(
						'breakpoint'	=> 1400,
						'settings'		=> array(
							'slidesToShow'		=> 5,
							'slidesToScroll'	=> 5
						)
					)
				)
			) );

			techmarket_brands_carousel( $section_args , $taxonomy_args , $carousel_args );
		}
	}
}

if( ! function_exists( 'techmarket_home_v12_hook_control' ) ) {
	function techmarket_home_v12_hook_control() {
		if( is_page_template( array( 'template-homepage-v12.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v12' );

			$home_v12 = techmarket_get_home_v12_meta();
			add_action( 'techmarket_homepage_v12', 'techmarket_init_structured_data',						5 );
			add_action( 'techmarket_homepage_v12', 'techmarket_slider_with_banners_v12',					isset( $home_v12['swb']['priority'] ) ? intval( $home_v12['swb']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v12', 'techmarket_products_carousel_block_v12_1',				isset( $home_v12['pc1']['priority'] ) ? intval( $home_v12['pc1']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v12', 'techmarket_products_carousel_tabs_v12_1',				isset( $home_v12['pct1']['priority'] ) ? intval( $home_v12['pct1']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v12', 'techmarket_product_categories_carousel_v12',			isset( $home_v12['catc']['priority'] ) ? intval( $home_v12['catc']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v12', 'techmarket_3_column_banners_v12',						isset( $home_v12['brs']['priority'] ) ? intval( $home_v12['brs']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v12', 'techmarket_products_carousel_block_v12_2',				isset( $home_v12['pc2']['priority'] ) ? intval( $home_v12['pc2']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v12', 'techmarket_products_carousel_tabs_v12_2',				isset( $home_v12['pct2']['priority'] ) ? intval( $home_v12['pct2']['priority'] ) : 70 );
			add_action( 'techmarket_homepage_v12', 'techmarket_full_width_banner_v12',						isset( $home_v12['sbr']['priority'] ) ? intval( $home_v12['sbr']['priority'] ) : 80 );
			add_action( 'techmarket_homepage_v12', 'techmarket_products_carousel_block_v12_3',				isset( $home_v12['lpc']['priority'] ) ? intval( $home_v12['lpc']['priority'] ) : 90 );
			add_action( 'techmarket_homepage_v12', 'techmarket_brands_carousel_v12',						isset( $home_v12['bc']['priority'] ) ? intval( $home_v12['bc']['priority'] ) : 100 );
			add_action( 'techmarket_homepage_v12', 'techmarket_homepage_content',							200 );
		}
	}
}
