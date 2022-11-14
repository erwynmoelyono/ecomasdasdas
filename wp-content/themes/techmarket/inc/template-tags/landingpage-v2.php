<?php
/**
 * Template tags for Landingpage v2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_landing_v2_options() {
	$landing_v2 = array(
		'sdr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'shortcode'			=> ''
		),
		'hdr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 20,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Find the right TV for you', 'techmarket' ),
			'description'		=> esc_html__( 'Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu. Aliquam erat volutpat.', 'techmarket' ),
		),
		'msb1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( 'QLED - The Next Generation <br>in Televisions', 'techmarket' ) ),
			'description'		=> sprintf( '<p>%s</p><ul><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>', esc_html__( 'Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu. Aliquam erat volutpat.', 'techmarket' ), esc_html__( 'High-precision lens provides a clearer picture and a better view for 3D.', 'techmarket' ), esc_html__( '55" class screen full array LED TV', 'techmarket' ), esc_html__( 'With stand: 48.98"W x 30.69"H x 10.59"D', 'techmarket' ), esc_html__( 'Display type: LED, Resolution: 1920 x 1080, Contrast ratio: 2M:1', 'techmarket' ), esc_html__( 'Motion Rate: 120', 'techmarket' ) ),
			'action_text'		=> esc_html__( 'Show Products', 'techmarket' ),
			'action_link'		=> '#',
		),
		'msb2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( 'SUHD - Exceptional picture <br>performance for lifelike colors.', 'techmarket' ) ),
			'description'		=> sprintf( '<p>%s</p><ul><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>', esc_html__( 'Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu. Aliquam erat volutpat.', 'techmarket' ), esc_html__( 'High-precision lens provides a clearer picture and a better view for 3D.', 'techmarket' ), esc_html__( '55" class screen full array LED TV', 'techmarket' ), esc_html__( 'With stand: 48.98"W x 30.69"H x 10.59"D', 'techmarket' ), esc_html__( 'Display type: LED, Resolution: 1920 x 1080, Contrast ratio: 2M:1', 'techmarket' ), esc_html__( 'Motion Rate: 120', 'techmarket' ) ),
			'action_text'		=> esc_html__( 'Show Products', 'techmarket' ),
			'action_link'		=> '#',
		),
		'msb3'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( 'UHD - World of stunning 4K <br>resolution and innovative design.', 'techmarket' ) ),
			'description'		=> sprintf( '<p>%s</p><ul><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>', esc_html__( 'Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu. Aliquam erat volutpat.', 'techmarket' ), esc_html__( 'High-precision lens provides a clearer picture and a better view for 3D.', 'techmarket' ), esc_html__( '55" class screen full array LED TV', 'techmarket' ), esc_html__( 'With stand: 48.98"W x 30.69"H x 10.59"D', 'techmarket' ), esc_html__( 'Display type: LED, Resolution: 1920 x 1080, Contrast ratio: 2M:1', 'techmarket' ), esc_html__( 'Motion Rate: 120', 'techmarket' ) ),
			'action_text'		=> esc_html__( 'Show Products', 'techmarket' ),
			'action_link'		=> '#',
		),
		'pcf'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( '<strong>Choose TV</strong> you are Looking for:', 'techmarket' ) ),
			'category_args'		=> array(
				'show_option_all' 	=> esc_html__( 'All Categories', 'techmarket' ),
				'hide_if_empty'		=> 'yes',
				'slugs'				=> '',
			),
			'shortcode_atts'	=> array(
				'columns'			=> '4',
				'per_page'			=> '8',
				'template'			=> 'content-product-featured'
			),
		),
		'bc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 70,
			'animation'			=> '',
			'orderby'			=> 'title',
			'order'				=> 'ASC',
			'number'			=> 12,
			'hide_empty'		=> 'no',
			'carousel_args'		=> array(
				'slidesToShow'		=> 6,
				'slidesToScroll'	=> 1,
				'dots'				=> 'no',
				'arrows'			=> 'yes'
			)
		)
	);

	return apply_filters( 'techmarket_get_default_landing_v2_options', $landing_v2 );
}

function techmarket_get_landing_v2_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_landing_v2_options = get_post_meta( $post->ID, '_landing_v2_options', true );
		$landing_v2_options = maybe_unserialize( $clean_landing_v2_options );

		if( ! is_array( $landing_v2_options ) ) {
			$landing_v2_options = json_decode( $clean_landing_v2_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_landing_v2_options();
			$landing_v2 = wp_parse_args( $landing_v2_options, $default_options );
		} else {
			$landing_v2 = $landing_v2_options;
		}

		return apply_filters( 'techmarket_get_landing_v2_meta', $landing_v2, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_lv2' ) ) {
	/**
	 * Displays Slider in Landing v2
	 */
	function techmarket_revslider_lv2() {

		$landing_v2 = techmarket_get_landing_v2_meta();
		$sdr 		= $landing_v2['sdr'];

		$is_enabled = isset( $sdr['is_enabled'] ) ? $sdr['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $sdr['animation'] ) ? $sdr['animation'] : '';
		$shortcode = !empty( $sdr['shortcode'] ) ? $sdr['shortcode'] : '[rev_slider alias="landing-v2-slider"]';

		$section_class = 'landing-v2-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_landing_v2_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_page_header_info_lv2' ) ) {
	/**
	 * Display Page Header Info
	 */
	function techmarket_page_header_info_lv2() {

		$landing_v2 = techmarket_get_landing_v2_meta();
		$hdr_options = $landing_v2['hdr'];

		$is_enabled = isset( $hdr_options['is_enabled'] ) ? $hdr_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $hdr_options['animation'] ) ? $hdr_options['animation'] : '';

		$args = apply_filters( 'techmarket_page_header_info_lv2_args', array(
			'section_title'	=> isset( $hdr_options['section_title'] ) ? $hdr_options['section_title'] : esc_html__( 'Find the right TV for you', 'techmarket' ),
			'description'	=> isset( $hdr_options['description'] ) ? $hdr_options['description'] : esc_html__( 'Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu. Aliquam erat volutpat.', 'techmarket' ),
		) );

		if ( ! empty( $args['section_title'] ) && ! empty( $args['description'] ) ) {
			?>
			<div class="landing-v2-page-header">
				<h2 class="section-title"><?php echo wp_kses_post( $args['section_title'] ); ?></h2>
				<?php if ( ! empty( $args['description'] ) ) { ?>
					<div class="description"><?php echo wp_kses_post( $args['description'] ); ?></div>
				<?php } ?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_media_single_banner_lv2_1' ) ) {
	/**
	 * Display Media Single Banner
	 */
	function techmarket_media_single_banner_lv2_1() {

		$landing_v2 = techmarket_get_landing_v2_meta();
		$msb_options = $landing_v2['msb1'];

		$is_enabled = isset( $msb_options['is_enabled'] ) ? $msb_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $msb_options['animation'] ) ? $msb_options['animation'] : '';

		$args = apply_filters( 'techmarket_media_single_banner_lv2_1_args', array(
			'section_class'	=> '',
			'section_title'	=> isset( $msb_options['section_title'] ) ? $msb_options['section_title'] : wp_kses_post( __( 'QLED - The Next Generation <br>in Televisions', 'techmarket' ) ),
			'description'	=> isset( $msb_options['description'] ) ? $msb_options['description'] : sprintf( '<p>%s</p><ul><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>', esc_html__( 'Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu. Aliquam erat volutpat.', 'techmarket' ), esc_html__( 'High-precision lens provides a clearer picture and a better view for 3D.', 'techmarket' ), esc_html__( '55" class screen full array LED TV', 'techmarket' ), esc_html__( 'With stand: 48.98"W x 30.69"H x 10.59"D', 'techmarket' ), esc_html__( 'Display type: LED, Resolution: 1920 x 1080, Contrast ratio: 2M:1', 'techmarket' ), esc_html__( 'Motion Rate: 120', 'techmarket' ) ),
			'action_text'	=> isset( $msb_options['action_text'] ) ? $msb_options['action_text'] : esc_html__( 'Show Products', 'techmarket' ),
			'action_link'	=> isset( $msb_options['action_link'] ) ? $msb_options['action_link'] : '#',
			'image'			=> isset( $msb_options['image'] ) && intval( $msb_options['image'] ) ? wp_get_attachment_image_src( $msb_options['image'], array( '840', '620' ) ) : array( '//placehold.it/840x620', '840', '620' )
		) );

		techmarket_media_single_banner( $args );
	}
}

if ( ! function_exists( 'techmarket_media_single_banner_lv2_2' ) ) {
	/**
	 * Display Media Single Banner
	 */
	function techmarket_media_single_banner_lv2_2() {

		$landing_v2 = techmarket_get_landing_v2_meta();
		$msb_options = $landing_v2['msb2'];

		$is_enabled = isset( $msb_options['is_enabled'] ) ? $msb_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $msb_options['animation'] ) ? $msb_options['animation'] : '';

		$args = apply_filters( 'techmarket_media_single_banner_lv2_2_args', array(
			'section_class'	=> 'media-right',
			'section_title'	=> isset( $msb_options['section_title'] ) ? $msb_options['section_title'] : wp_kses_post( __( 'SUHD - Exceptional picture <br>performance for lifelike colors.', 'techmarket' ) ),
			'description'	=> isset( $msb_options['description'] ) ? $msb_options['description'] : sprintf( '<p>%s</p><ul><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>', esc_html__( 'Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu. Aliquam erat volutpat.', 'techmarket' ), esc_html__( 'High-precision lens provides a clearer picture and a better view for 3D.', 'techmarket' ), esc_html__( '55" class screen full array LED TV', 'techmarket' ), esc_html__( 'With stand: 48.98"W x 30.69"H x 10.59"D', 'techmarket' ), esc_html__( 'Display type: LED, Resolution: 1920 x 1080, Contrast ratio: 2M:1', 'techmarket' ), esc_html__( 'Motion Rate: 120', 'techmarket' ) ),
			'action_text'	=> isset( $msb_options['action_text'] ) ? $msb_options['action_text'] : esc_html__( 'Show Products', 'techmarket' ),
			'action_link'	=> isset( $msb_options['action_link'] ) ? $msb_options['action_link'] : '#',
			'image'			=> isset( $msb_options['image'] ) && intval( $msb_options['image'] ) ? wp_get_attachment_image_src( $msb_options['image'], array( '840', '620' ) ) : array( '//placehold.it/840x620', '840', '620' )
		) );

		techmarket_media_single_banner( $args );
	}
}

if ( ! function_exists( 'techmarket_media_single_banner_lv2_3' ) ) {
	/**
	 * Display Media Single Banner
	 */
	function techmarket_media_single_banner_lv2_3() {

		$landing_v2 = techmarket_get_landing_v2_meta();
		$msb_options = $landing_v2['msb3'];

		$is_enabled = isset( $msb_options['is_enabled'] ) ? $msb_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $msb_options['animation'] ) ? $msb_options['animation'] : '';

		$args = apply_filters( 'techmarket_media_single_banner_lv2_3_args', array(
			'section_class'	=> '',
			'section_title'	=> isset( $msb_options['section_title'] ) ? $msb_options['section_title'] : wp_kses_post( __( 'UHD - World of stunning 4K <br>resolution and innovative design.', 'techmarket' ) ),
			'description'	=> isset( $msb_options['description'] ) ? $msb_options['description'] : sprintf( '<p>%s</p><ul><li>%s</li><li>%s</li><li>%s</li><li>%s</li><li>%s</li></ul>', esc_html__( 'Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu. Aliquam erat volutpat.', 'techmarket' ), esc_html__( 'High-precision lens provides a clearer picture and a better view for 3D.', 'techmarket' ), esc_html__( '55" class screen full array LED TV', 'techmarket' ), esc_html__( 'With stand: 48.98"W x 30.69"H x 10.59"D', 'techmarket' ), esc_html__( 'Display type: LED, Resolution: 1920 x 1080, Contrast ratio: 2M:1', 'techmarket' ), esc_html__( 'Motion Rate: 120', 'techmarket' ) ),
			'action_text'	=> isset( $msb_options['action_text'] ) ? $msb_options['action_text'] : esc_html__( 'Show Products', 'techmarket' ),
			'action_link'	=> isset( $msb_options['action_link'] ) ? $msb_options['action_link'] : '#',
			'image'			=> isset( $msb_options['image'] ) && intval( $msb_options['image'] ) ? wp_get_attachment_image_src( $msb_options['image'], array( '840', '620' ) ) : array( '//placehold.it/840x620', '840', '620' )
		) );

		techmarket_media_single_banner( $args );
	}
}

if ( ! function_exists( 'techmarket_product_categories_filter_lv2' ) ) {
	/**
	 * Display Products
	 *
	 */
	function techmarket_product_categories_filter_lv2() {

		if( techmarket_is_woocommerce_activated() ) {

			$landing_v2 = techmarket_get_landing_v2_meta();
			$pcf_options = $landing_v2['pcf'];

			$is_enabled = isset( $pcf_options['is_enabled'] ) ? $pcf_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcf_options['animation'] ) ? $pcf_options['animation'] : '';

			$args = apply_filters( 'techmarket_product_categories_filter_lv2_args', array(
				'section_title'		=> isset( $pcf_options['section_title'] ) ? $pcf_options['section_title'] : wp_kses_post( __( '<strong>Choose TV</strong> you are Looking for:', 'techmarket' ) ),
				'animation'			=> $animation,
				'section_class'		=> '',
				'category_args'		=> array(
					'show_option_all' 	=> isset( $pcf_options['category_args']['show_option_all'] ) ? $pcf_options['category_args']['show_option_all'] : esc_html__( 'All Categories', 'techmarket' ),
					'taxonomy' 			=> 'product_cat',
					'hide_if_empty'		=> isset( $pcf_options['category_args']['hide_if_empty'] ) ? filter_var( $pcf_options['category_args']['hide_if_empty'], FILTER_VALIDATE_BOOLEAN ) : true,
					'slugs'				=> isset( $pcf_options['category_args']['slugs'] ) ? $pcf_options['category_args']['slugs'] : '',
					'value_field'		=> 'slug',
					'class'				=> 'categories-dropdown'
				),
				'shortcode_atts'	=> isset( $pcf_options['shortcode_atts'] ) ? $pcf_options['shortcode_atts'] : array( 'columns' => '4', 'per_page' => '8', 'template' => 'content-product-featured' ),
			) );

			techmarket_product_categories_filter( $args );
		}

	}
}

if ( ! function_exists( 'techmarket_brands_carousel_lv2' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_lv2() {

		if( techmarket_is_woocommerce_activated() ) {

			$landing_v2 = techmarket_get_landing_v2_meta();
			$bc_options = $landing_v2['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_lv2_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_lv2_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_lv2_carousel_args', array(
				'slidesToShow'	=> isset( $bc_options['carousel_args']['slidesToShow'] ) ? intval( $bc_options['carousel_args']['slidesToShow'] ) : 6,
				'slidesToScroll'=> isset( $bc_options['carousel_args']['slidesToScroll'] ) ? intval( $bc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'			=> isset( $bc_options['carousel_args']['dots'] ) ? filter_var( $bc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'		=> isset( $bc_options['carousel_args']['arrows'] ) ? filter_var( $bc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'responsive'		=> array(
					array(
						'breakpoint'	=> 480,
						'settings'		=> array(
							'slidesToShow'		=> 1,
							'slidesToScroll'	=> 1
						)
					),
					array(
						'breakpoint'	=> 750,
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
					)
				)
			) );

			techmarket_brands_carousel( $section_args , $taxonomy_args , $carousel_args );
		}
	}
}

if( ! function_exists( 'techmarket_landing_v2_hook_control' ) ) {
	function techmarket_landing_v2_hook_control() {
		if( is_page_template( array( 'template-landingpage-v2.php' ) ) ) {
			remove_all_actions( 'techmarket_landingpage_v2' );

			$landing_v2 = techmarket_get_landing_v2_meta();
			add_action( 'techmarket_landingpage_v2', 'techmarket_init_structured_data',					5 );
			add_action( 'techmarket_landingpage_v2', 'techmarket_revslider_lv2',						isset( $landing_v2['sdr']['priority'] ) ? intval( $landing_v2['sdr']['priority'] ) : 10 );
			add_action( 'techmarket_landingpage_v2', 'techmarket_page_header_info_lv2',					isset( $landing_v2['hdr']['priority'] ) ? intval( $landing_v2['hdr']['priority'] ) : 20 );
			add_action( 'techmarket_landingpage_v2', 'techmarket_media_single_banner_lv2_1',			isset( $landing_v2['msb1']['priority'] ) ? intval( $landing_v2['msb1']['priority'] ) : 30 );
			add_action( 'techmarket_landingpage_v2', 'techmarket_media_single_banner_lv2_2',			isset( $landing_v2['msb2']['priority'] ) ? intval( $landing_v2['msb2']['priority'] ) : 40 );
			add_action( 'techmarket_landingpage_v2', 'techmarket_media_single_banner_lv2_3',			isset( $landing_v2['msb3']['priority'] ) ? intval( $landing_v2['msb3']['priority'] ) : 50 );
			add_action( 'techmarket_landingpage_v2', 'techmarket_product_categories_filter_lv2',		isset( $landing_v2['pcf']['priority'] ) ? intval( $landing_v2['pcf']['priority'] ) : 60 );
			add_action( 'techmarket_landingpage_v2', 'techmarket_brands_carousel_lv2',					isset( $landing_v2['bc']['priority'] ) ? intval( $landing_v2['bc']['priority'] ) : 70 );
			add_action( 'techmarket_landingpage_v2', 'techmarket_homepage_content',						200 );
		}
	}
}