<?php
/**
 * Template tags for Home v9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v9_options() {
	$home_v9 = array(
		'sdr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'shortcode'			=> ''
		),
		'pt'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 20,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Featured Products', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'All Glasses', 'techmarket' ),
					'shortcode_content'	=> array(
					'shortcode'			=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4',
							'per_page'		=> '12',
							'template'      => 'content-product-with-rating'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Sunglasses', 'techmarket' ),
					'shortcode_content'	=> array(
					'shortcode'			=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4',
							'per_page'		=> '12',
							'template'      => 'content-product-with-rating'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Eyeglasses', 'techmarket' ),
					'shortcode_content'	=> array(
					'shortcode'			=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4',
							'per_page'		=> '12',
							'template'      => 'content-product-with-rating'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Special Collections', 'techmarket' ),
					'shortcode_content'	=> array(
					'shortcode'			=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns'		=> '4',
							'per_page'		=> '12',
							'template'      => 'content-product-with-rating'
						)
					)
				)
			),
			'action_link'	=> '#',
			'action_text'	=> wp_kses_post( '<i class="tm tm-free-return"></i>' . esc_html__( 'See More Products', 'techmarket' ) ),
		),
		'sbr1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'title'				=> sprintf( '%s<span><span>%s</span><span><span>%s</span><br>%s</span></span>', esc_html__( 'Woods', 'techmarket' ), esc_html__( 'G21', 'techmarket' ), esc_html__( 'Design By', 'techmarket' ), esc_html__( 'Valentina Doe', 'techmarket' ) ),
			'sub_title'			=> '',
			'action_text'		=> wp_kses_post( __( 'Get yours now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'		=> '#',
			'bg_choice'			=> 'image'
		),
		'brs'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'br1'				=> array(
				'title'				=> wp_kses_post( __(  'The <br> <strong>Wooden Circle</strong> <br>Collection', 'techmarket' ) ),
				'action_text'		=> wp_kses_post( __( 'View Collection', 'techmarket' ) . '<i class="tm tm-long-arrow-right"></i>' ),
				'action_link'		=> '#',
				'bg_choice'			=> 'color',
				'bg_color'			=> '#cedfe9',
				'bg_height'			=> '695'
			),
			'br2'				=> array(
				'title'				=> '&nbsp;',
				'sub_title'			=> '',
				'action_text'		=> '',
				'action_link'		=> '#',
				'bg_choice'			=> 'image'
			),
		),
		'sbr2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'pre_title'			=> esc_html__( 'Get in Touch', 'techmarket' ),
			'title'				=> sprintf( '%s<br>%s', esc_html__( 'How can we', 'techmarket' ), esc_html__( 'help you?', 'techmarket' ) ),
			'sub_title'			=> esc_html__( 'Whether it be to add to your collection, that first special wristwatch or the restoration of a much loved heirloom we are here to help', 'techmarket' ),
			'action_text'		=> '',
			'action_link'		=> '#',
			'bg_choice'			=> 'color',
			'bg_color'			=> '#eeeeee',
			'bg_height'			=> '495'
		),
		'bc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
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

	return apply_filters( 'techmarket_get_default_home_v9_options', $home_v9 );
}

function techmarket_get_home_v9_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v9_options = get_post_meta( $post->ID, '_home_v9_options', true );
		$home_v9_options = maybe_unserialize( $clean_home_v9_options );

		if( ! is_array( $home_v9_options ) ) {
			$home_v9_options = json_decode( $clean_home_v9_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v9_options();
			$home_v9 = wp_parse_args( $home_v9_options, $default_options );
		} else {
			$home_v9 = $home_v9_options;
		}

		return apply_filters( 'techmarket_home_v9_meta', $home_v9, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_v9' ) ) {
	/**
	 * Displays Slider in Home v9
	 */
	function techmarket_revslider_v9() {

		$home_v9 	= techmarket_get_home_v9_meta();
		$sdr 		= $home_v9['sdr'];

		$is_enabled = isset( $sdr['is_enabled'] ) ? $sdr['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $sdr['animation'] ) ? $sdr['animation'] : '';
		$shortcode = !empty( $sdr['shortcode'] ) ? $sdr['shortcode'] : '[rev_slider alias="home-v9-slider"]';

		$section_class = 'home-v9-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_home_v9_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_products_tabs_v9' ) ) {
	/**
	 * Displays Product Tabs
	 */
	function techmarket_products_tabs_v9() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v9 	= techmarket_get_home_v9_meta();
			$pt_options = $home_v9['pt'];

			$is_enabled = isset( $pt_options['is_enabled'] ) ? $pt_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pt_options['animation'] ) ? $pt_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_tabs_v9_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $pt_options['section_title'] ) ? $pt_options['section_title'] : esc_html__( 'Featured Products', 'techmarket' ),
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pt_options['tabs'][0]['title'] ) ? $pt_options['tabs'][0]['title'] : esc_html__( 'All Glasses', 'techmarket' ),
						'shortcode_tag'		=> isset( $pt_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pt_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pt_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pt_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '4', 'per_page' => '12', 'template' => 'content-product-with-rating' )
					),
					array(
						'title'				=> isset( $pt_options['tabs'][1]['title'] ) ? $pt_options['tabs'][1]['title'] : esc_html__( 'Sunglasses', 'techmarket' ),
						'shortcode_tag'		=> isset( $pt_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pt_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pt_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pt_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '4', 'per_page' => '12', 'template' => 'content-product-with-rating' )
					),
					array(
						'title'				=> isset( $pt_options['tabs'][2]['title'] ) ? $pt_options['tabs'][2]['title'] : esc_html__( 'Eyeglasses', 'techmarket' ),
						'shortcode_tag'		=> isset( $pt_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pt_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pt_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pt_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '4', 'per_page' => '12', 'template' => 'content-product-with-rating' )
					),
					array(
						'title'				=> isset( $pt_options['tabs'][3]['title'] ) ? $pt_options['tabs'][3]['title'] : esc_html__( 'Special Collections', 'techmarket' ),
						'shortcode_tag'		=> isset( $pt_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pt_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pt_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pt_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '4', 'per_page' => '12', 'template' => 'content-product-with-rating' )
					)
				),
				'action_link'	=> isset( $pt_options['action_link'] ) ? $pt_options['action_link'] : '#',
				'action_text'	=> isset( $pt_options['action_text'] ) ? $pt_options['action_text'] : wp_kses_post( '<i class="tm tm-free-return"></i>' . esc_html__( 'See More Products', 'techmarket' ) ),
			) );

			techmarket_products_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_full_width_banner_v9_1' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_full_width_banner_v9_1() {

		$home_v9 	= techmarket_get_home_v9_meta();
		$sbr_options = $home_v9['sbr1'];

		$is_enabled = isset( $sbr_options['is_enabled'] ) ? $sbr_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $sbr_options['animation'] ) ? $sbr_options['animation'] : '';

		$args = apply_filters( 'techmarket_full_width_banner_v9_1_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'full-width-banner home-v9-full-banner stretch-full-width',
			'title'			=> isset( $sbr_options['title'] ) ? $sbr_options['title'] : sprintf( '%s<span><span>%s</span><span><span>%s</span><br>%s</span></span>', esc_html__( 'Woods', 'techmarket' ), esc_html__( 'G21', 'techmarket' ), esc_html__( 'Design By', 'techmarket' ), esc_html__( 'Valentina Doe', 'techmarket' ) ),
			'sub_title'		=> isset( $sbr_options['sub_title'] ) ? $sbr_options['sub_title'] : '',
			'action_text'	=> isset( $sbr_options['action_text'] ) ? $sbr_options['action_text'] : wp_kses_post( __( 'Get yours now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'	=> isset( $sbr_options['action_link'] ) ? $sbr_options['action_link'] : '#',
			'bg_image'		=> isset( $sbr_options['bg_image'] ) && intval( $sbr_options['bg_image'] ) ? wp_get_attachment_image_src( $sbr_options['bg_image'], array( '1920', '637' ) ) : array( '//placehold.it/1920x637', '1920', '637' ),
			'bg_choice'		=> isset( $sbr_options['bg_choice'] ) ? $sbr_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $sbr_options['bg_color'] ) ? $sbr_options['bg_color'] : '',
			'bg_height' 	=> isset( $sbr_options['bg_height'] ) ? $sbr_options['bg_height'] : ''
		) );

		techmarket_banner( $args );
	}
}

if ( ! function_exists( 'techmarket_2_column_banners_v9' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_2_column_banners_v9() {

		$home_v9 	= techmarket_get_home_v9_meta();
		$brs_options = $home_v9['brs'];
		$br1_options = $brs_options['br1'];
		$br2_options = $brs_options['br2'];

		$is_enabled = isset( $brs_options['is_enabled'] ) ? $brs_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $brs_options['animation'] ) ? $brs_options['animation'] : '';

		$args = apply_filters( 'techmarket_2_column_banners_v9_args', array(
			'section_class'	=> 'techmarket-banner col-2-full-width-banner stretch-full-width',
			'banners'		=> array(
				array(
					'animation'		=> $animation,
					'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __(  'The <br> <strong>Wooden Circle</strong> <br>Collection', 'techmarket' ) ),
					'action_text'	=> isset( $br1_options['action_text'] ) ? $br1_options['action_text'] : wp_kses_post( __( 'View Collection', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
					'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
					'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '941', '695' ) ) : array( '//placehold.it/941x695', '941', '695' ),
					'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'color',
					'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '#cedfe9',
					'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : '695',
					'section_class'	=> 'text-in-center'
				),
				array(
					'animation'		=> $animation,
					'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : '',
					'sub_title'		=> isset( $br2_options['sub_title'] ) ? $br2_options['sub_title'] : '',
					'action_text'	=> isset( $br2_options['action_text'] ) ? $br2_options['action_text'] : '',
					'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
					'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '979', '695' ) ) : array( '//placehold.it/979x695', '979', '695' ),
					'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
					'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
					'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : '',
					'section_class'	=> 'text-in-center'
				)
			)
		) );

		techmarket_banners( $args );
	}
}

if ( ! function_exists( 'techmarket_full_width_banner_v9_2' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_full_width_banner_v9_2() {

		$home_v9 	= techmarket_get_home_v9_meta();
		$sbr_options = $home_v9['sbr2'];

		$is_enabled = isset( $sbr_options['is_enabled'] ) ? $sbr_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $sbr_options['animation'] ) ? $sbr_options['animation'] : '';

		$args = apply_filters( 'techmarket_full_width_banner_v9_2_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'full-width-banner stretch-full-width help-banner',
			'pre_title'		=> isset( $sbr_options['pre_title'] ) ? $sbr_options['pre_title'] : esc_html__( 'Get in Touch', 'techmarket' ),
			'title'			=> isset( $sbr_options['title'] ) ? $sbr_options['title'] : sprintf( '%s<br>%s', esc_html__( 'How can we', 'techmarket' ), esc_html__( 'help you?', 'techmarket' ) ),
			'sub_title'		=> isset( $sbr_options['sub_title'] ) ? $sbr_options['sub_title'] : esc_html__( 'Whether it be to add to your collection, that first special wristwatch or the restoration of a much loved heirloom we are here to help', 'techmarket' ),
			'action_text'	=> isset( $sbr_options['action_text'] ) ? $sbr_options['action_text'] : wp_kses_post( __( 'Get yours now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'	=> isset( $sbr_options['action_link'] ) ? $sbr_options['action_link'] : '#',
			'bg_image'		=> isset( $sbr_options['bg_image'] ) && intval( $sbr_options['bg_image'] ) ? wp_get_attachment_image_src( $sbr_options['bg_image'], array( '1920', '495' ) ) : array( '//placehold.it/1920x495', '1920', '495' ),
			'bg_choice'		=> isset( $sbr_options['bg_choice'] ) ? $sbr_options['bg_choice'] : 'color',
			'bg_color' 		=> isset( $sbr_options['bg_color'] ) ? $sbr_options['bg_color'] : '#eeeeee',
			'bg_height' 	=> isset( $sbr_options['bg_height'] ) ? $sbr_options['bg_height'] : '495'
		) );

		techmarket_banner( $args );
	}
}

if ( ! function_exists( 'techmarket_brands_carousel_v9' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v9() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v9 	= techmarket_get_home_v9_meta();
			$bc_options = $home_v9['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v9_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v9_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_v9_carousel_args', array(
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

if( ! function_exists( 'techmarket_home_v9_hook_control' ) ) {
	function techmarket_home_v9_hook_control() {
		if( is_page_template( array( 'template-homepage-v9.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v9' );

			$home_v9 = techmarket_get_home_v9_meta();
			add_action( 'techmarket_homepage_v9', 'techmarket_init_structured_data',		5 );
			add_action( 'techmarket_homepage_v9', 'techmarket_revslider_v9',				isset( $home_v9['sdr']['priority'] ) ? intval( $home_v9['sdr']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v9', 'techmarket_products_tabs_v9',			isset( $home_v9['pt']['priority'] ) ? intval( $home_v9['pt']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v9', 'techmarket_full_width_banner_v9_1',		isset( $home_v9['sbr1']['priority'] ) ? intval( $home_v9['sbr1']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v9', 'techmarket_2_column_banners_v9',			isset( $home_v9['brs']['priority'] ) ? intval( $home_v9['brs']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v9', 'techmarket_full_width_banner_v9_2',		isset( $home_v9['sbr2']['priority'] ) ? intval( $home_v9['sbr2']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v9', 'techmarket_brands_carousel_v9',			isset( $home_v9['bc']['priority'] ) ? intval( $home_v9['bc']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v9', 'techmarket_homepage_content',			200 );
		}
	}
}