<?php
/**
 * Template tags for Landingpage v1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_landing_v1_options() {
	$landing_v1 = array(
		'sdr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'shortcode'			=> ''
		),
		'rpwc' => array(
			'is_enabled'		=> 'yes',
			'priority'			=> 20,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Welcome in Gaming World.', 'techmarket' ),
			'description'		=> esc_html__( 'Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu. Aliquam erat volutpat.', 'techmarket' ),
			'category_args'		=> array(
				'number'			=> 4,
				'slugs'				=> '',
			),
			'post_choice'		=> 'recent',
			'post_id'			=> '',
			'limit'				=> 6,
		),
		'pwi1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Desktops PCs', 'techmarket' ),
			'description'		=> esc_html__( 'Donec id malesuada elit. Donec tempor sit amet est ac blandit. Phasellus ac sem nisl. Vestibulum aliquam, ligula in pretium congue, massa felis ultrices metus, nec mattis elit diam lobortis justo. Ut dapibus gravida eros ac bibendum. Phasellus ac tempus libero. Mauris eleifend, mi at viverra scelerisque, dolor leo luctus justo, id fermentum tellus nisl eget est.', 'techmarket' ),
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '5',
					'per_page'		=> '5',
					'template'		=> 'content-product-with-rating'
				),
			),
			'action_text'		=> esc_html__( 'Shop All Desktops PCs', 'techmarket' ),
			'action_link'		=> '#',
		),
		'pwi2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Gaming Laptops', 'techmarket' ),
			'description'		=> esc_html__( 'Donec id malesuada elit. Donec tempor sit amet est ac blandit. Phasellus ac sem nisl. Vestibulum aliquam, ligula in pretium congue, massa felis ultrices metus, nec mattis elit diam lobortis justo. Ut dapibus gravida eros ac bibendum. Phasellus ac tempus libero. Mauris eleifend, mi at viverra scelerisque, dolor leo luctus justo, id fermentum tellus nisl eget est.', 'techmarket' ),
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '5',
					'per_page'		=> '10',
					'template'		=> 'content-product-with-rating'
				),
			),
			'action_text'		=> esc_html__( 'Shop All Gaming Laptops', 'techmarket' ),
			'action_link'		=> '#',
		),
		'pwi3'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Accesories', 'techmarket' ),
			'description'		=> esc_html__( 'Donec id malesuada elit. Donec tempor sit amet est ac blandit. Phasellus ac sem nisl. Vestibulum aliquam, ligula in pretium congue, massa felis ultrices metus, nec mattis elit diam lobortis justo. Ut dapibus gravida eros ac bibendum. Phasellus ac tempus libero. Mauris eleifend, mi at viverra scelerisque, dolor leo luctus justo, id fermentum tellus nisl eget est.', 'techmarket' ),
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '7',
					'per_page'		=> '7'
				),
			),
			'action_text'		=> esc_html__( 'Shop All Accesories', 'techmarket' ),
			'action_link'		=> '#',
		),
	);

	return apply_filters( 'techmarket_get_default_landing_v1_options', $landing_v1 );
}

function techmarket_get_landing_v1_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_landing_v1_options = get_post_meta( $post->ID, '_landing_v1_options', true );
		$landing_v1_options = maybe_unserialize( $clean_landing_v1_options );

		if( ! is_array( $landing_v1_options ) ) {
			$landing_v1_options = json_decode( $clean_landing_v1_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_landing_v1_options();
			$landing_v1 = wp_parse_args( $landing_v1_options, $default_options );
		} else {
			$landing_v1 = $landing_v1_options;
		}

		return apply_filters( 'techmarket_get_landing_v1_meta', $landing_v1, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_lv1' ) ) {
	/**
	 * Displays Slider in Landing v1
	 */
	function techmarket_revslider_lv1() {

		$landing_v1 = techmarket_get_landing_v1_meta();
		$sdr 		= $landing_v1['sdr'];

		$is_enabled = isset( $sdr['is_enabled'] ) ? $sdr['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $sdr['animation'] ) ? $sdr['animation'] : '';
		$shortcode = !empty( $sdr['shortcode'] ) ? $sdr['shortcode'] : '[rev_slider alias="landing-v1-slider"]';

		$section_class = 'landing-v1-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_landing_v1_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_recent_posts_with_categories_lv1' ) ) {
	/**
	 * Display Posts
	 */
	function techmarket_recent_posts_with_categories_lv1() {

		$landing_v1   = techmarket_get_landing_v1_meta();
		$rpwc_options = $landing_v1['rpwc'];

		$is_enabled = isset( $rpwc_options['is_enabled'] ) ? $rpwc_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $rpwc_options['animation'] ) ? $rpwc_options['animation'] : '';

		$args = apply_filters( 'techmarket_recent_posts_with_categories_lv1_args', array(
			'section_class'		=> '',
			'animation'			=> $animation,
			'section_title'		=> isset( $rpwc_options['section_title'] ) ? $rpwc_options['section_title'] : esc_html__( 'Welcome in Gaming World.', 'techmarket' ),
			'description'		=> isset( $rpwc_options['description'] ) ? $rpwc_options['description'] : esc_html__( 'Nullam dignissim elit ut urna rutrum, a fermentum mi auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu. Aliquam erat volutpat.', 'techmarket' ),
			'category_args'		=> array(
				'number'			=> isset( $rpwc_options['category_args']['number'] ) ? $rpwc_options['category_args']['number'] : 4,
				'slugs'				=> isset( $rpwc_options['category_args']['slugs'] ) ? $rpwc_options['category_args']['slugs'] : '',
			),
			'post_choice'		=> isset( $rpwc_options['post_choice'] ) ? $rpwc_options['post_choice'] : 'recent',
			'post_id'			=> isset( $rpwc_options['post_id'] ) ? $rpwc_options['post_id'] : '',
			'limit'				=> isset( $rpwc_options['limit'] ) ? $rpwc_options['limit'] : 6
		) );

		techmarket_recent_posts_with_categories( $args );
	}
}

if ( ! function_exists( 'techmarket_products_with_image_lv1_1' ) ) {
	/**
	 * Displays Products with image
	 *
	 * @return void
	 */
	function techmarket_products_with_image_lv1_1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$landing_v1   = techmarket_get_landing_v1_meta();
			$pwi_options = $landing_v1['pwi1'];

			$is_enabled = isset( $pwi_options['is_enabled'] ) ? $pwi_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pwi_options['animation'] ) ? $pwi_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_with_image_lv1_1_args', array(
				'section_title'		=> isset( $pwi_options['section_title'] ) ? $pwi_options['section_title'] : esc_html__( 'Desktops PCs', 'techmarket' ),
				'animation'			=> $animation,
				'section_class'		=> '',
				'description'		=> isset( $pwi_options['description'] ) ? $pwi_options['description'] : esc_html__( 'Donec id malesuada elit. Donec tempor sit amet est ac blandit. Phasellus ac sem nisl. Vestibulum aliquam, ligula in pretium congue, massa felis ultrices metus, nec mattis elit diam lobortis justo. Ut dapibus gravida eros ac bibendum. Phasellus ac tempus libero. Mauris eleifend, mi at viverra scelerisque, dolor leo luctus justo, id fermentum tellus nisl eget est.', 'techmarket' ),
				'image'				=> isset( $pwi_options['image'] ) && intval( $pwi_options['image'] ) ? wp_get_attachment_image_src( $pwi_options['image'], array( '602', '496' ) ) : array( '//placehold.it/602x496', '602', '496' ),
				'shortcode_tag'		=> isset( $pwi_options['shortcode_content']['shortcode'] ) ? $pwi_options['shortcode_content']['shortcode'] :'recent_products',
				'shortcode_atts'	=> isset( $pwi_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pwi_options['shortcode_content'] ) : array( 'columns' => 5, 'per_page' => 5, 'template' => 'content-product-with-rating' ),
				'action_text'		=> isset( $pwi_options['action_text'] ) ? $pwi_options['action_text'] : esc_html__( 'Shop All Desktops PCs', 'techmarket' ),
				'action_link'		=> isset( $pwi_options['action_link'] ) ? $pwi_options['action_link'] : '#',
			) );

			techmarket_products_with_image( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_with_image_lv1_2' ) ) {
	/**
	 * Displays Products with image
	 *
	 * @return void
	 */
	function techmarket_products_with_image_lv1_2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$landing_v1   = techmarket_get_landing_v1_meta();
			$pwi_options = $landing_v1['pwi2'];

			$is_enabled = isset( $pwi_options['is_enabled'] ) ? $pwi_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pwi_options['animation'] ) ? $pwi_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_with_image_lv1_2_args', array(
				'section_title'		=> isset( $pwi_options['section_title'] ) ? $pwi_options['section_title'] : esc_html__( 'Gaming Laptops', 'techmarket' ),
				'animation'			=> $animation,
				'section_class'		=> '',
				'description'		=> isset( $pwi_options['description'] ) ? $pwi_options['description'] : esc_html__( 'Donec id malesuada elit. Donec tempor sit amet est ac blandit. Phasellus ac sem nisl. Vestibulum aliquam, ligula in pretium congue, massa felis ultrices metus, nec mattis elit diam lobortis justo. Ut dapibus gravida eros ac bibendum. Phasellus ac tempus libero. Mauris eleifend, mi at viverra scelerisque, dolor leo luctus justo, id fermentum tellus nisl eget est.', 'techmarket' ),
				'image'				=> isset( $pwi_options['image'] ) && intval( $pwi_options['image'] ) ? wp_get_attachment_image_src( $pwi_options['image'], array( '602', '496' ) ) : array( '//placehold.it/602x496', '602', '496' ),
				'shortcode_tag'		=> isset( $pwi_options['shortcode_content']['shortcode'] ) ? $pwi_options['shortcode_content']['shortcode'] :'recent_products',
				'shortcode_atts'	=> isset( $pwi_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pwi_options['shortcode_content'] ) : array( 'columns' => 5, 'per_page' => 10, 'template' => '
					content-product-with-rating' ),
				'action_text'		=> isset( $pwi_options['action_text'] ) ? $pwi_options['action_text'] : esc_html__( 'Shop All Gaming Laptops', 'techmarket' ),
				'action_link'		=> isset( $pwi_options['action_link'] ) ? $pwi_options['action_link'] : '#',
			) );

			techmarket_products_with_image( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_with_image_lv1_3' ) ) {
	/**
	 * Displays Products with image
	 *
	 * @return void
	 */
	function techmarket_products_with_image_lv1_3() {

		if ( techmarket_is_woocommerce_activated() ) {

			$landing_v1   = techmarket_get_landing_v1_meta();
			$pwi_options = $landing_v1['pwi3'];

			$is_enabled = isset( $pwi_options['is_enabled'] ) ? $pwi_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pwi_options['animation'] ) ? $pwi_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_with_image_lv1_3_args', array(
				'section_title'		=> isset( $pwi_options['section_title'] ) ? $pwi_options['section_title'] : esc_html__( 'Accesories', 'techmarket' ),
				'animation'			=> $animation,
				'section_class'		=> '',
				'description'		=> isset( $pwi_options['description'] ) ? $pwi_options['description'] : esc_html__( 'Donec id malesuada elit. Donec tempor sit amet est ac blandit. Phasellus ac sem nisl. Vestibulum aliquam, ligula in pretium congue, massa felis ultrices metus, nec mattis elit diam lobortis justo. Ut dapibus gravida eros ac bibendum. Phasellus ac tempus libero. Mauris eleifend, mi at viverra scelerisque, dolor leo luctus justo, id fermentum tellus nisl eget est.', 'techmarket' ),
				'image'				=> isset( $pwi_options['image'] ) && intval( $pwi_options['image'] ) ? wp_get_attachment_image_src( $pwi_options['image'], array( '602', '496' ) ) : array( '//placehold.it/602x496', '602', '496' ),
				'shortcode_tag'		=> isset( $pwi_options['shortcode_content']['shortcode'] ) ? $pwi_options['shortcode_content']['shortcode'] :'recent_products',
				'shortcode_atts'	=> isset( $pwi_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pwi_options['shortcode_content'] ) : array( 'columns' => 7, 'per_page' => 7 ),
				'action_text'		=> isset( $pwi_options['action_text'] ) ? $pwi_options['action_text'] : esc_html__( 'Shop All Accesories', 'techmarket' ),
				'action_link'		=> isset( $pwi_options['action_link'] ) ? $pwi_options['action_link'] : '#',
			) );

			techmarket_products_with_image( $args );
		}
	}
}

if( ! function_exists( 'techmarket_landing_v1_hook_control' ) ) {
	function techmarket_landing_v1_hook_control() {
		if( is_page_template( array( 'template-landingpage-v1.php' ) ) ) {
			remove_all_actions( 'techmarket_landingpage_v1' );

			$landing_v1 = techmarket_get_landing_v1_meta();
			add_action( 'techmarket_landingpage_v1', 'techmarket_init_structured_data',					5 );
			add_action( 'techmarket_landingpage_v1', 'techmarket_revslider_lv1',						isset( $landing_v1['sdr']['priority'] ) ? intval( $landing_v1['sdr']['priority'] ) : 10 );
			add_action( 'techmarket_landingpage_v1', 'techmarket_recent_posts_with_categories_lv1',		isset( $landing_v1['rpwc']['priority'] ) ? intval( $landing_v1['rpwc']['priority'] ) : 20 );
			add_action( 'techmarket_landingpage_v1', 'techmarket_products_with_image_lv1_1',			isset( $landing_v1['pwi1']['priority'] ) ? intval( $landing_v1['pwi1']['priority'] ) : 30 );
			add_action( 'techmarket_landingpage_v1', 'techmarket_products_with_image_lv1_2',			isset( $landing_v1['pwi2']['priority'] ) ? intval( $landing_v1['pwi2']['priority'] ) : 40 );
			add_action( 'techmarket_landingpage_v1', 'techmarket_products_with_image_lv1_3',			isset( $landing_v1['pwi3']['priority'] ) ? intval( $landing_v1['pwi3']['priority'] ) : 50 );
			add_action( 'techmarket_landingpage_v1', 'techmarket_homepage_content',						200 );
		}
	}
}