<?php
/**
 * Template tags for Home v3
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function techmarket_get_default_home_v3_options() {
	$home_v3 = array(
		'swb'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 10,
			'animation'			=> '',
			'sdr_shortcode'		=> '',
			'br1'				=> array(
				'title'			=> wp_kses_post( __( '<strong>Fresh s7 Edge</strong> <br> 32 GB Unlocked<br> Quad Core', 'techmarket' ) ),
				'price'			=> '$279.99',
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br2'				=> array(
				'pre_title'		=> esc_html__( 'Feat Category', 'techmarket' ),
				'title'			=>  wp_kses_post( __( 'Catch Best <br><strong>Deals</strong> on the <br> Curved TVs <br> Entertainment', 'techmarket' ) ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br3'				=> array(
				'title'			=> wp_kses_post( __( 'New Arrivals<br> in <strong>Accessories</strong> <br> at Best Prices.', 'techmarket' ) ),
				'action_link'	=> '#',
				'action_text'	=>  '',
				'price'			=> wp_kses_post( __( '<span class="start_price">from</span>$13.79', 'techmarket' ) ),
				'bg_choice'		=> 'image'
			),
			'br4'				=> array(
				'title'			=>  wp_kses_post( __( '<strong>20% Off Tech</strong> <br> at Ultrabooks, <br> Laptops, Tablets<br>Notebooks &<br>More', 'techmarket' ) ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br5'				=> array(
				'pre_title'		=> esc_html__( 'Best Gift Idea', 'techmarket' ),
				'title'			=> wp_kses_post( __( 'Mini Two Wheel <br><strong>Self Balancing</strong> <br> Scooter', 'techmarket' ) ),
				'price'			=> '<ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>439.99</span></ins> <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>689.00</span></del>',
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br6'				=> array(
				'title'			=> wp_kses_post( __( 'Brilliant New<br> <strong>Earphones for </strong> <br> Bluetooth devices', 'techmarket' ) ),
				'price'			=> wp_kses_post( __( '<span class="start_price">from</span>$5.99', 'techmarket' ) ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			)
		),
		'fl'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 20,
			'animation'			=> '',
			'features'		=> array(
				array(
					'icon'		=> 'tm tm-free-delivery',
					'label'		=> sprintf( '<h5 class="mt-0">%s</h5><span>%s</span>', esc_html__( 'Free Delivery', 'techmarket' ), esc_html__( 'from $50', 'techmarket' ) ),
				),
				array(
					'icon'		=> 'tm tm-feedback',
					'label'		=> sprintf( '<h5 class="mt-0">%s</h5><span>%s</span>', esc_html__( '99% Customer', 'techmarket' ), esc_html__( 'Feedbacks', 'techmarket' ) ),
				),
				array(
					'icon'		=> 'tm tm-free-return',
					'label'		=> sprintf( '<h5 class="mt-0">%s</h5><span>%s</span>', esc_html__( '365 Days', 'techmarket' ), esc_html__( 'for free return', 'techmarket' ) ),
				),
				array(
					'icon'		=> 'tm tm-safe-payments',
					'label'		=> sprintf( '<h5 class="mt-0">%s</h5><span>%s</span>', esc_html__( 'Payment', 'techmarket' ), esc_html__( 'Secure System', 'techmarket' ) ),
				),
				array(
					'icon'		=> 'tm tm-best-brands',
					'label'		=> sprintf( '<h5 class="mt-0">%s</h5><span>%s</span>', esc_html__( 'Only Best', 'techmarket' ), esc_html__( 'Brands', 'techmarket' ) ),
				)
			)
		),
		'catc1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 30,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Featured categories', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'number'			=> 12,
			'columns'			=> 8,
			'slugs'				=> '',
			'carousel_args' 	=> array(
				'slidesToShow'		=> 8,
				'slidesToScroll'	=> 1,
				'dots'				=> 'no',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'ntc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 40,
			'animation'			=> '',
			'notice_info'		=> esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
		),
		'pc1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 50,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Hot New Arrivals', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'=> array(
					'columns'		=> '7',
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 7,
				'slidesToScroll'	=> 7,
				'dots'				=> 'yes',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'pc2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 60,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Trending Now', 'techmarket' ),
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
		'brs'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 70,
			'animation'			=> '',
			'br1'				=> array(
				'title'			=> wp_kses_post( __( '<strong>Shop now</strong> to find savings on everything you need<br> for the big game.', 'techmarket' ) ),
				'action_text'	=> esc_html__( 'Browse', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'br2'				=> array(
				'title'			=> wp_kses_post( __( '<strong>1000 mAh</strong> <br> Power Bank Pro.', 'techmarket' ) ),
				'price'			=> '$34.99',
				'action_text'	=> esc_html__( 'Buy Now', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			)
		),
		'pct1'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 80,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Cell Phones & Tablets', 'techmarket' ),
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
					'title'				=> esc_html__( 'Android Phones', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'IOS Phones', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Tablets', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Accessories', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'best_selling_products',
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
		'pc3'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 90,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Recommended For You', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'=> array(
					'columns'		=> '5',
					'template'		=> 'content-product-with-rating'
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 5,
				'slidesToScroll'	=> 5,
				'dots'				=> 'yes',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'pcbg'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 100,
			'animation'			=> '',
			'section_title'		=> wp_kses_post( __( 'Make <br>dreams <br><span>your reality</span>', 'techmarket' ) ),
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '7',
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 7,
				'slidesToScroll'	=> 7,
				'dots'				=> 'yes',
				'arrows'			=> 'no'
			)
		),
		'lpct'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 110,
			'animation'			=> '',
			'section_title'	    => esc_html__( 'Tv & Visual Entertainment', 'techmarket' ),
			'tabs'				=> array(
				array(
					'title'				=> esc_html__( 'Top 20', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'recent_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 4,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					)
				),
				array(
					'title'				=> esc_html__( '4K Ultra HD', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'featured_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 4,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'QLED Tvs', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'sale_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 4,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'SUHD Tvs', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'	    	=> 'top_rated_products',
						'shortcode_atts'	=> array(
							'columns' 		=> 4,
							'per_page' 		=> 12,
							'template'		=> 'content-landscape-product-card'
						)
					)
				)
			),
			'carousel_args'	=> array(
				'slidesToShow'	=> 4,
				'slidesToScroll'=> 4,
				'dots'			=> 'yes',
				'arrows'		=> 'no',
				'prevArrow'		=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'		=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'brwpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 120,
			'animation'			=> '',
			'br'				=> array(
				'title'			=> wp_kses_post( __( 'Esssentials<br> of <strong>Wearable<br> Gadgets</strong>', 'techmarket' ) ),
				'action_text'	=> esc_html__( 'View All', 'techmarket' ),
				'action_link'	=> '#',
				'bg_choice'		=> 'image'
			),
			'pc'				=> array(
				'shortcode_content'	=> array(
					'shortcode'		=> 'recent_products',
					'shortcode_atts'=> array(
						'columns'	=> '7',
					)
				),
				'carousel_args'		=> array(
					'slidesToShow'	=> 7,
					'slidesToScroll'=> 7,
					'dots'			=> 'yes',
					'arrows'		=> 'no'
				)
			)
		),
		'sbr'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 130,
			'animation'			=> '',
			'title'				=> wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
			'sub_title'			=> esc_html__( 'Travel up to 22km in a single charge.', 'techmarket' ),
			'action_text'		=> wp_kses_post( __( 'Browse now', 'techmarket' ) . '<i class="feature-icon d-flex ml-4 tm tm-long-arrow-right"></i>' ),
			'action_link'		=> '#',
			'bg_choice'			=> 'image'
		),
		'catc2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 140,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Computers & Laptops Categories', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'number'			=> 12,
			'columns'			=> 6,
			'slugs'				=> '',
			'carousel_args' 	=> array(
				'slidesToShow'		=> 6,
				'slidesToScroll'	=> 1,
				'dots'				=> 'no',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'pct2'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 150,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Digital Cameras For You', 'techmarket' ),
			'tabs' 				=> array(
				array(
					'title'				=> esc_html__( 'Best Choice', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'recent_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Action Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'featured_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'Compacts', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'sale_products',
						'shortcode_atts'=> array(
							'columns'	=> '8'
						)
					)
				),
				array(
					'title'				=> esc_html__( 'DSLR Cameras', 'techmarket' ),
					'shortcode_content'	=> array(
						'shortcode'		=> 'top_rated_products',
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
		'lpc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 160,
			'animation'			=> '',
			'section_title'		=> esc_html__( 'Recently viewed products', 'techmarket' ),
			'header_custom_nav'	=> 'yes',
			'shortcode_content'	=> array(
				'shortcode'		=> 'recent_products',
				'shortcode_atts'	=> array(
					'columns'		=> '5',
					'template'		=> 'content-landscape-product'
				)
			),
			'carousel_args'		=> array(
				'slidesToShow'		=> 5,
				'slidesToScroll'	=> 5,
				'dots'				=> 'yes',
				'arrows'			=> 'yes',
				'prevArrow'			=> '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> '<a href="#"><i class="tm tm-arrow-right"></i></a>'
			)
		),
		'bc'	=> array(
			'is_enabled'		=> 'yes',
			'priority'			=> 170,
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

	return apply_filters( 'techmarket_get_default_home_v3_options', $home_v3 );
}

function techmarket_get_home_v3_meta( $merge_default = true ) {
	global $post;

	if ( isset( $post->ID ) ){

		$clean_home_v3_options = get_post_meta( $post->ID, '_home_v3_options', true );
		$home_v3_options = maybe_unserialize( $clean_home_v3_options );

		if( ! is_array( $home_v3_options ) ) {
			$home_v3_options = json_decode( $clean_home_v3_options, true );
		}

		if ( $merge_default ) {
			$default_options = techmarket_get_default_home_v3_options();
			$home_v3 = wp_parse_args( $home_v3_options, $default_options );
		} else {
			$home_v3 = $home_v3_options;
		}

		return apply_filters( 'techmarket_home_v3_meta', $home_v3, $post );
	}
}

if ( ! function_exists( 'techmarket_revslider_v3' ) ) {
	/**
	 * Displays Slider in Home v3
	 */
	function techmarket_revslider_v3() {

		$home_v3 	= techmarket_get_home_v3_meta();

		$is_enabled = isset( $home_v3['swb']['is_enabled'] ) ? $home_v3['swb']['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $home_v3['swb']['animation'] ) ? $home_v3['swb']['animation'] : '';
		$shortcode = !empty( $home_v3['swb']['sdr_shortcode'] ) ? $home_v3['swb']['sdr_shortcode'] : '[rev_slider alias="home-v3-slider"]';

		$section_class = 'home-v3-slider';
		if ( ! empty( $animation ) ) {
			$section_class = ' animate-in-view';
		}
		?>
		<div class="<?php echo esc_attr( $section_class );?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
			<?php echo apply_filters( 'techmarket_home_v3_slider_html', do_shortcode( $shortcode ) ); ?>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_slider_with_banners_v3' ) ) {
	/**
	 *
	 */
	function techmarket_slider_with_banners_v3() {

		$home_v3 	= techmarket_get_home_v3_meta();
		$swb_options = $home_v3['swb'];
		$br1_options = $swb_options['br1'];
		$br2_options = $swb_options['br2'];
		$br3_options = $swb_options['br3'];
		$br4_options = $swb_options['br4'];
		$br5_options = $swb_options['br5'];
		$br6_options = $swb_options['br6'];

		$is_enabled = isset( $swb_options['is_enabled'] ) ? $swb_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' ) {
			return;
		}

		$animation = isset( $swb_options['animation'] ) ? $swb_options['animation'] : '';

		$banner_1_args = apply_filters( 'techmarket_slider_with_banners_v3_banner_1_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'title'			=>  isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __( '<strong>Fresh s7 Edge</strong> <br> 32 GB Unlocked<br> Quad Core', 'techmarket' ) ),
			'action_link'	=>  isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
			'bg_image'		=>  isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '287', '165' ) ) : array( '//placehold.it/287x165', '287', '165' ),
			'bg_choice'		=>  isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
			'price'			=> 	isset( $br1_options['price'] ) ? $br1_options['price'] : '279.99',
			'bg_color' 		=>  isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
			'bg_height' 	=>  isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : ''
		) );

		$banner_2_args = apply_filters( 'techmarket_slider_with_banners_v3_banner_2_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'pre_title'		=> isset( $br2_options['pre_title'] ) ? $br2_options['pre_title'] : esc_html__( 'Feat Category', 'techmarket' ),
			'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( 'Catch Best <br><strong>Deals</strong> on the <br> Curved TVs <br> Entertainment', 'techmarket' ) ),
			'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
			'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '287', '166' ) ) : array( '//placehold.it/287x166', '287', '166' ),
			'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
			'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : ''
		) );

		$banner_3_args = apply_filters( 'techmarket_slider_with_banners_v3_banner_3_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'title'			=> isset( $br3_options['title'] ) ? $br3_options['title'] : wp_kses_post( __( 'New Arrivals<br> in <strong>Accessories</strong> <br> at Best Prices.', 'techmarket' ) ),
			'action_text'	=> isset( $br3_options['action_text'] ) ? $br3_options['action_text'] : '',
			'action_link'	=> isset( $br3_options['action_link'] ) ? $br3_options['action_link'] : '#',
			'bg_image'		=> isset( $br3_options['bg_image'] ) && intval( $br3_options['bg_image'] ) ? wp_get_attachment_image_src( $br3_options['bg_image'], array( '287', '161' ) ) : array( '//placehold.it/287x161', '287', '161' ),
			'bg_choice'		=> isset( $br3_options['bg_choice'] ) ? $br3_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br3_options['bg_color'] ) ? $br3_options['bg_color'] : '',
			'price'			=> isset( $br3_options['price'] ) ? $br3_options['price'] : wp_kses_post( __( '<span class="start_price">from</span>$13.79', 'techmarket' ) ),
			'bg_height' 	=> isset( $br3_options['bg_height'] ) ? $br3_options['bg_height'] : ''
		) );

		$banner_4_args = apply_filters( 'techmarket_slider_with_banners_v3_banner_4_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'title'			=> isset( $br4_options['title'] ) ? $br4_options['title'] : wp_kses_post( __( '<strong>20% Off Tech</strong> <br> at Ultrabooks, <br> Laptops, Tablets<br>Notebooks &<br>More', 'techmarket' ) ),
			'action_link'	=> isset( $br4_options['action_link'] ) ? $br4_options['action_link'] : '#',
			'bg_image'		=> isset( $br4_options['bg_image'] ) && intval( $br4_options['bg_image'] ) ? wp_get_attachment_image_src( $br4_options['bg_image'], array( '287', '165' ) ) : array( '//placehold.it/287x165', '287', '165' ),
			'bg_choice'		=> isset( $br4_options['bg_choice'] ) ? $br4_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br4_options['bg_color'] ) ? $br4_options['bg_color'] : '',
			'bg_height' 	=> isset( $br4_options['bg_height'] ) ? $br4_options['bg_height'] : ''
		) );

		$banner_5_args = apply_filters( 'techmarket_slider_with_banners_v3_banner_5_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'text-in-left',
			'pre_title'		=> isset( $br5_options['pre_title'] ) ? $br5_options['pre_title'] : esc_html__( 'Best Gift Idea', 'techmarket' ),
			'title'			=> isset( $br5_options['title'] ) ? $br5_options['title'] : wp_kses_post( __( 'Mini Two Wheel <br><strong>Self Balancing</strong> <br> Scooter', 'techmarket' ) ),
			'price'			=> isset( $br5_options['price'] ) ? $br5_options['price'] : '<ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>439.99</span></ins> <del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>689.00</span></del>',
			'action_link'	=> isset( $br5_options['action_link'] ) ? $br5_options['action_link'] : '#',
			'bg_image'		=> isset( $br5_options['bg_image'] ) && intval( $br5_options['bg_image'] ) ? wp_get_attachment_image_src( $br5_options['bg_image'], array( '287', '166' ) ) : array( '//placehold.it/287x166', '287', '166' ),
			'bg_choice'		=> isset( $br5_options['bg_choice'] ) ? $br5_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br5_options['bg_color'] ) ? $br5_options['bg_color'] : '',
			'bg_height' 	=> isset( $br5_options['bg_height'] ) ? $br5_options['bg_height'] : ''
		) );

		$banner_6_args = apply_filters( 'techmarket_slider_with_banners_v3_banner_6_args', array(
			'animation'		=> $animation,
			'section_class'	=> 'small-banner text-in-left',
			'title'			=> isset( $br6_options['title'] ) ? $br6_options['title'] : wp_kses_post( __( 'Brilliant New<br> <strong>Earphones for </strong> <br> Bluetooth devices', 'techmarket' ) ),
			'action_text'	=> isset( $br6_options['action_text'] ) ? $br6_options['action_text'] : '',
			'action_link'	=> isset( $br6_options['action_link'] ) ? $br6_options['action_link'] : '#',
			'bg_image'		=> isset( $br6_options['bg_image'] ) && intval( $br6_options['bg_image'] ) ? wp_get_attachment_image_src( $br6_options['bg_image'], array( '287', '161' ) ) : array( '//placehold.it/287x161', '287', '161' ),
			'bg_choice'		=> isset( $br6_options['bg_choice'] ) ? $br6_options['bg_choice'] : 'image',
			'bg_color' 		=> isset( $br6_options['bg_color'] ) ? $br6_options['bg_color'] : '',
			'price'			=> isset( $br6_options['price'] ) ? $br6_options['price'] : wp_kses_post( __( '<span class="start_price">from</span>$5.99', 'techmarket' ) ),
			'bg_height' 	=> isset( $br6_options['bg_height'] ) ? $br6_options['bg_height'] : ''
		) );

		?><div class="homev3-slider-with-banners row">
			<div class="slider">
				<?php techmarket_revslider_v3(); ?>
			</div>
			<div class="slider-with-6-banners column-2">
				<?php techmarket_banner( $banner_1_args ); ?>
				<?php techmarket_banner( $banner_2_args ); ?>
				<?php techmarket_banner( $banner_3_args ); ?>
				<?php techmarket_banner( $banner_4_args ); ?>
				<?php techmarket_banner( $banner_5_args ); ?>
				<?php techmarket_banner( $banner_6_args ); ?>
			</div>
		</div><?php
	}
}

if ( ! function_exists( 'techmarket_features_list_v3' ) ) {
	/**
	 *
	 */
	function techmarket_features_list_v3() {
		$home_v3 	= techmarket_get_home_v3_meta();
		$fl_options = $home_v3['fl'];

		$is_enabled = isset( $fl_options['is_enabled'] ) ? $fl_options['is_enabled'] : 'no';

		if ( $is_enabled !== 'yes' || empty( $fl_options['features'] ) ) {
			return;
		}

		$animation = isset( $fl_options['animation'] ) ? $fl_options['animation'] : '';

		$args = array(
			'animation'		=> $animation,
			'features'		=> array()
		);

		foreach ( $fl_options['features'] as $key => $feature ) {
			if( isset( $feature['icon'] ) && isset( $feature['label'] ) ) {
				$args['features'][] = array(
					'icon'		=> $feature['icon'],
					'label'		=> $feature['label']
				);
			}
		}

		$args = apply_filters( 'techmarket_features_list_v3_args', $args );

		techmarket_features_list( $args );
	}
}

if ( ! function_exists( 'techmarket_product_categories_carousel_v3_1' ) ) {
	/**
	 *
	 */
	function techmarket_product_categories_carousel_v3_1() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$catc_options = $home_v3['catc1'];

			$is_enabled = isset( $catc_options['is_enabled'] ) ? $catc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $catc_options['animation'] ) ? $catc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_product_categories_carousel_v3_1_section_args', array(
				'animation'		    => $animation,
				'section_title'		=> isset( $catc_options['section_title'] ) ? $catc_options['section_title'] : esc_html__( 'Featured categories', 'techmarket' ),
				'header_custom_nav'	=> isset( $catc_options['header_custom_nav'] ) ? filter_var( $catc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true
			) );

			$taxonomy_args = apply_filters( 'techmarket_product_categories_carousel_v3_1_taxonomy_args', array(
				'number'		=> isset( $catc_options['number'] ) ? $catc_options['number'] : 12,
				'columns'		=> isset( $catc_options['columns'] ) ? $catc_options['columns'] : 8,
				'slugs'			=> isset( $catc_options['slugs'] ) ? $catc_options['slugs'] : '',
			) );

			$carousel_args = apply_filters( 'techmarket_product_categories_carousel_v3_1_carousel_args', array(
				'slidesToShow'		=> isset( $catc_options['carousel_args']['slidesToShow'] ) ? intval( $catc_options['carousel_args']['slidesToShow'] ) : 8,
				'slidesToScroll'	=> isset( $catc_options['carousel_args']['slidesToScroll'] ) ? intval( $catc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'				=> isset( $catc_options['carousel_args']['dots'] ) ? filter_var( $catc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'			=> isset( $catc_options['carousel_args']['arrows'] ) ? filter_var( $catc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'prevArrow'			=> isset( $catc_options['carousel_args']['prevArrow'] ) ? $catc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> isset( $catc_options['carousel_args']['nextArrow'] ) ? $catc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
				'responsive'		=> array(
					array(
						'breakpoint'	=> 779,
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
						'breakpoint'	=> 1400,
						'settings'		=> array(
							'slidesToShow'		=> 5,
							'slidesToScroll'	=> 5
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
			) );

			techmarket_product_categories_carousel( $section_args , $taxonomy_args , $carousel_args );
		}
	}
}

if ( ! function_exists( 'techmarket_fullwidth_notice_v3' ) ) {
	function techmarket_fullwidth_notice_v3() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$ntc_options = $home_v3['ntc'];

			$is_enabled = isset( $ntc_options['is_enabled'] ) ? $ntc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $ntc_options['animation'] ) ? $ntc_options['animation'] : '';

			$args = apply_filters( 'techmarket_fullwidth_notice_v3_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'stretch-full-width',
				'notice_info'		=> isset( $ntc_options['notice_info'] ) ? $ntc_options['notice_info'] : esc_html__( 'Download our new app today! Dont miss our mobile-only offers and shop with Android Play.', 'techmarket' )
			) );

			techmarket_fullwidth_notice( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_block_v3_1' ) ) {
	function techmarket_products_carousel_block_v3_1() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$pc1_options = $home_v3['pc1'];

			$is_enabled = isset( $pc1_options['is_enabled'] ) ? $pc1_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pc1_options['animation'] ) ? $pc1_options['animation'] : '';


			$args = apply_filters( 'techmarket_products_carousel_block_v3_1_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pc1_options['section_title'] ) ? $pc1_options['section_title'] : esc_html__( 'Hot New Arrivals', 'techmarket' ),
				'section_class'		=> '',
				'header_custom_nav'	=> isset( $pc1_options['header_custom_nav'] ) ? filter_var( $pc1_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $pc1_options['shortcode_content']['shortcode'] ) ? $pc1_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pc1_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pc1_options['shortcode_content'] ) : array( 'columns' => '7' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pc1_options['carousel_args']['slidesToShow'] ) ? intval( $pc1_options['carousel_args']['slidesToShow'] ) : 7,
					'slidesToScroll'	=> isset( $pc1_options['carousel_args']['slidesToScroll'] ) ? intval( $pc1_options['carousel_args']['slidesToScroll'] ) : 7,
					'dots'				=> isset( $pc1_options['carousel_args']['dots'] ) ? filter_var( $pc1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pc1_options['carousel_args']['arrows'] ) ? filter_var( $pc1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $pc1_options['carousel_args']['prevArrow'] ) ? $pc1_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $pc1_options['carousel_args']['nextArrow'] ) ? $pc1_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 779,
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
							'breakpoint'	=> 1600,
							'settings'		=> array(
								'slidesToShow'		=> 5,
								'slidesToScroll'	=> 5
							)
						)
					)
				)
			) );

			techmarket_products_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_block_v3_2' ) ) {
	function techmarket_products_carousel_block_v3_2() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$pc2_options = $home_v3['pc2'];

			$is_enabled = isset( $pc2_options['is_enabled'] ) ? $pc2_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pc2_options['animation'] ) ? $pc2_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v3_2_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pc2_options['section_title'] ) ? $pc2_options['section_title'] : esc_html__( 'Trending Now', 'techmarket' ),
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
							'breakpoint'	=> 779,
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

if ( ! function_exists( 'techmarket_2_column_banners_v3' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_2_column_banners_v3() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$brs_options = $home_v3['brs'];
			$br1_options = $brs_options['br1'];
			$br2_options = $brs_options['br2'];

			$is_enabled = isset( $brs_options['is_enabled'] ) ? $brs_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $brs_options['animation'] ) ? $brs_options['animation'] : '';

			$args = apply_filters( 'techmarket_2_column_banners_v3_args', array(
				'banners'		=> array(
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br1_options['title'] ) ? $br1_options['title'] : wp_kses_post( __( '<strong>Shop now</strong> to find savings on everything you need<br> for the big game.', 'techmarket' ) ),
						'action_text'	=> isset( $br1_options['action_text'] ) ? $br1_options['action_text'] : esc_html__( 'Browse', 'techmarket' ),
						'action_link'	=> isset( $br1_options['action_link'] ) ? $br1_options['action_link'] : '#',
						'bg_image'		=> isset( $br1_options['bg_image'] ) && intval( $br1_options['bg_image'] ) ? wp_get_attachment_image_src( $br1_options['bg_image'], array( '1301', '259' ) ) : array( '//placehold.it/1301x259', '1301', '259' ),
						'bg_choice'		=> isset( $br1_options['bg_choice'] ) ? $br1_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br1_options['bg_color'] ) ? $br1_options['bg_color'] : '',
						'bg_height' 	=> isset( $br1_options['bg_height'] ) ? $br1_options['bg_height'] : '',
						'section_class'	=> 'banner-long text-in-right'
					),
					array(
						'animation'		=> $animation,
						'title'			=> isset( $br2_options['title'] ) ? $br2_options['title'] : wp_kses_post( __( '<strong>1000 mAh</strong> <br> Power Bank Pro.', 'techmarket' ) ),
						'price'			=> isset( $br2_options['price'] ) ? $br2_options['price'] : '$34.99',
						'action_text'	=> isset( $br2_options['action_text'] ) ? $br2_options['action_text'] : esc_html__( 'Buy Now', 'techmarket' ),
						'action_link'	=> isset( $br2_options['action_link'] ) ? $br2_options['action_link'] : '#',
						'bg_image'		=> isset( $br2_options['bg_image'] ) && intval( $br2_options['bg_image'] ) ? wp_get_attachment_image_src( $br2_options['bg_image'], array( '420', '259' ) ) : array( '//placehold.it/420x259', '420', '259' ),
						'bg_choice'		=> isset( $br2_options['bg_choice'] ) ? $br2_options['bg_choice'] : 'image',
						'bg_color' 		=> isset( $br2_options['bg_color'] ) ? $br2_options['bg_color'] : '',
						'bg_height' 	=> isset( $br2_options['bg_height'] ) ? $br2_options['bg_height'] : '',
						'section_class'	=> 'banner-short text-in-left'
					)
				)
			) );

			techmarket_banners( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_tabs_v3_1' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */

	function techmarket_products_carousel_tabs_v3_1() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$pct1_options = $home_v3['pct1'];

			$is_enabled = isset( $pct1_options['is_enabled'] ) ? $pct1_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct1_options['animation'] ) ? $pct1_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_tabs_v3_1_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $pct1_options['section_title'] ) ? $pct1_options['section_title'] : esc_html__( 'Cell Phones & Tablets', 'techmarket' ),
				'section_class'	=> 'section-hot-new-arrivals',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct1_options['tabs'][0]['title'] ) ? $pct1_options['tabs'][0]['title'] : esc_html__( 'Bestsellers', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][1]['title'] ) ? $pct1_options['tabs'][1]['title'] : esc_html__( 'Android Phones', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][2]['title'] ) ? $pct1_options['tabs'][2]['title'] : esc_html__( 'IOS Phones', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][3]['title'] ) ? $pct1_options['tabs'][3]['title'] : esc_html__( 'Tablets', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct1_options['tabs'][4]['title'] ) ? $pct1_options['tabs'][4]['title'] : esc_html__( 'Accessories', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct1_options['tabs'][4]['shortcode_content']['shortcode'] ) ? $pct1_options['tabs'][4]['shortcode_content']['shortcode'] : 'best_selling_products',
						'shortcode_atts'	=> isset( $pct1_options['tabs'][4]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct1_options['tabs'][4]['shortcode_content'] ) : array( 'columns' => '8' )
					)
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct1_options['carousel_args']['slidesToShow'] ) ? intval( $pct1_options['carousel_args']['slidesToShow'] ) : 8,
					'slidesToScroll'	=> isset( $pct1_options['carousel_args']['slidesToScroll'] ) ? intval( $pct1_options['carousel_args']['slidesToScroll'] ) : 7,
					'dots'				=> isset( $pct1_options['carousel_args']['dots'] ) ? filter_var( $pct1_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct1_options['carousel_args']['arrows'] ) ? filter_var( $pct1_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 779,
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

if ( ! function_exists( 'techmarket_products_carousel_block_v3_3' ) ) {
	function techmarket_products_carousel_block_v3_3() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$pc3_options = $home_v3['pc3'];

			$is_enabled = isset( $pc3_options['is_enabled'] ) ? $pc3_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pc3_options['animation'] ) ? $pc3_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v3_3_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $pc3_options['section_title'] ) ? $pc3_options['section_title'] : esc_html__( 'Recommended For You', 'techmarket' ),
				'section_class'		=> 'rating-product section-products-carousel',
				'header_custom_nav'	=> isset( $pc3_options['header_custom_nav'] ) ? filter_var( $pc3_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $pc3_options['shortcode_content']['shortcode'] ) ? $pc3_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pc3_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pc3_options['shortcode_content'] ) : array( 'columns' => '5' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pc3_options['carousel_args']['slidesToShow'] ) ? intval( $pc3_options['carousel_args']['slidesToShow'] ) : 5,
					'slidesToScroll'	=> isset( $pc3_options['carousel_args']['slidesToScroll'] ) ? intval( $pc3_options['carousel_args']['slidesToScroll'] ) : 5,
					'dots'				=> isset( $pc3_options['carousel_args']['dots'] ) ? filter_var( $pc3_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pc3_options['carousel_args']['arrows'] ) ? filter_var( $pc3_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $pc3_options['carousel_args']['prevArrow'] ) ? $pc3_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $pc3_options['carousel_args']['nextArrow'] ) ? $pc3_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 779,
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
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesToShow'		=> 5,
								'slidesToScroll'	=> 5
							)
						)
					)
				)
			) );

			techmarket_products_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_carousel_with_bg_v3' ) ) {
	/**
	 *
	 */
	function techmarket_products_carousel_with_bg_v3() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$pcbg_options = $home_v3['pcbg'];

			$is_enabled = isset( $pcbg_options['is_enabled'] ) ? $pcbg_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pcbg_options['animation'] ) ? $pcbg_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_with_bg_v3_args', array(
				'animation'		    => $animation,
				'section_title'		=> isset( $pcbg_options['section_title'] ) ? $pcbg_options['section_title'] : wp_kses_post( __( 'Make <br>dreams <br><span>your reality</span>', 'techmarket' ) ),
				'section_class'		=> 'stretch-full-width',
				'image'				=> isset( $pcbg_options['image'] ) && intval( $pcbg_options['image'] ) ? wp_get_attachment_image_src( $pcbg_options['image'], array( '275', '174' ) ) : array( '//placehold.it/275x174', '275', '174' ),
				'shortcode_tag'		=> isset( $pcbg_options['shortcode_content']['shortcode'] ) ? $pcbg_options['shortcode_content']['shortcode'] :'recent_products',
				'shortcode_atts'	=> isset( $pcbg_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pcbg_options['shortcode_content'] ) : array( 'columns' => '5' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pcbg_options['carousel_args']['slidesToShow'] ) ? intval( $pcbg_options['carousel_args']['slidesToShow'] ) : 7,
					'slidesToScroll'	=> isset( $pcbg_options['carousel_args']['slidesToScroll'] ) ? intval( $pcbg_options['carousel_args']['slidesToScroll'] ) : 7,
					'dots'				=> isset( $pcbg_options['carousel_args']['dots'] ) ? filter_var( $pcbg_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pcbg_options['carousel_args']['arrows'] ) ? filter_var( $pcbg_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 779,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 780,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesToShow'		=> 5,
								'slidesToScroll'	=> 5
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

			techmarket_products_carousel_with_bg( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_products_cards_carousel_tabs_v3' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */
	function techmarket_products_cards_carousel_tabs_v3() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$lpct_options = $home_v3['lpct'];

			$is_enabled = isset( $lpct_options['is_enabled'] ) ? $lpct_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $lpct_options['animation'] ) ? $lpct_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_cards_carousel_tabs_v3_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $lpct_options['section_title'] ) ? $lpct_options['section_title'] : esc_html__( 'Tv & Visual Entertainment', 'techmarket' ),
				'section_class'	=> 'section-hot-new-arrivals section-landscape-products-card-carousel-tabs',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $lpct_options['tabs'][0]['title'] ) ? $lpct_options['tabs'][0]['title'] : esc_html__( 'Top 20', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '4', 'content-landscape-product-card' )
					),
					array(
						'title'				=> isset( $lpct_options['tabs'][1]['title'] ) ? $lpct_options['tabs'][1]['title'] : esc_html__( '4K Ultra HD', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '4', 'content-landscape-product-card' )
					),
					array(
						'title'				=> isset( $lpct_options['tabs'][2]['title'] ) ? $lpct_options['tabs'][2]['title'] : esc_html__( 'QLED Tvs', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '4', 'content-landscape-product-card' )
					),
					array(
						'title'				=> isset( $lpct_options['tabs'][3]['title'] ) ? $lpct_options['tabs'][3]['title'] : esc_html__( 'SUHD Tvs', 'techmarket' ),
						'shortcode_tag'		=> isset( $lpct_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $lpct_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $lpct_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpct_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '4', 'content-landscape-product-card' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $lpct_options['carousel_args']['slidesToShow'] ) ? intval( $lpct_options['carousel_args']['slidesToShow'] ) : 4,
					'slidesToScroll'	=> isset( $lpct_options['carousel_args']['slidesToScroll'] ) ? intval( $lpct_options['carousel_args']['slidesToScroll'] ) : 4,
					'dots'				=> isset( $lpct_options['carousel_args']['dots'] ) ? filter_var( $lpct_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $lpct_options['carousel_args']['arrows'] ) ? filter_var( $lpct_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
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
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						)
					)
				)
			) );

			techmarket_products_carousel_tabs( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_banner_with_products_carousel_v3' ) ) {
	function techmarket_banner_with_products_carousel_v3() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$br_options = $home_v3['brwpc']['br'];
			$pc_options = $home_v3['brwpc']['pc'];


			$is_enabled = isset( $home_v3['brwpc']['is_enabled'] ) ? $home_v3['brwpc']['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $home_v3['brwpc']['animation'] ) ? $home_v3['brwpc']['animation'] : '';

			$banner_args = apply_filters( 'techmarket_banner_with_products_carousel_v3_banner_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'column-1',
				'title'			=> isset( $br_options['title'] ) ? $br_options['title'] : wp_kses_post( __( 'Esssentials <br> of <strong>Wearable <br> Gadgets</strong>', 'techmarket' ) ),
				'action_text'	=> isset( $br_options['action_text'] ) ? $br_options['action_text'] : esc_html__( 'View All', 'techmarket' ),
				'action_link'	=> isset( $br_options['action_link'] ) ? $br_options['action_link'] : '#',
				'bg_image'		=> isset( $br_options['bg_image'] ) && intval( $br_options['bg_image'] ) ? wp_get_attachment_image_src( $br_options['bg_image'], array( '209', '321' ) ) : array( '//placehold.it/209x321', '209', '321' ),
				'bg_choice'		=> isset( $br_options['bg_choice'] ) ? $br_options['bg_choice'] : 'image',
				'bg_color' 		=> isset( $br_options['bg_color'] ) ? $br_options['bg_color'] : '',
				'bg_height' 	=> isset( $br_options['bg_height'] ) ? $br_options['bg_height'] : ''
			) );

			$pc_args = apply_filters( 'techmarket_banner_with_products_carousel_v3_pc_args', array(
				'animation'			=> $animation,
				'section_class'		=> 'section-products-carousel column-2',
				'shortcode_tag'		=> isset( $pc_options['shortcode_content']['shortcode'] ) ? $pc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $pc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pc_options['shortcode_content'] ) : array( 'columns' => '7' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $pc_options['carousel_args']['slidesToShow'] ) ? intval( $pc_options['carousel_args']['slidesToShow'] ) : 7,
					'slidesToScroll'	=> isset( $pc_options['carousel_args']['slidesToScroll'] ) ? intval( $pc_options['carousel_args']['slidesToScroll'] ) : 7,
					'dots'				=> isset( $pc_options['carousel_args']['dots'] ) ? filter_var( $pc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pc_options['carousel_args']['arrows'] ) ? filter_var( $pc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(

						array(
							'breakpoint'	=> 780,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesToShow'		=> 4,
								'slidesToScroll'	=> 4
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
				)
			) );
			?>
			<div class="home-v3-banner-with-products-carousel row">
				<?php techmarket_banner( $banner_args ); ?>
				<?php techmarket_products_carousel( $pc_args ); ?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_full_width_banner_v3' ) ) {
	/**
	 * Display Banner
	 */
	function techmarket_full_width_banner_v3() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$sbr_options = $home_v3['sbr'];

			$is_enabled = isset( $sbr_options['is_enabled'] ) ? $sbr_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $sbr_options['animation'] ) ? $sbr_options['animation'] : '';

			$args = apply_filters( 'techmarket_full_width_banner_v3_args', array(
				'animation'		=> $animation,
				'section_class'	=> 'full-width-banner',
				'title'			=> isset( $sbr_options['title'] ) ? $sbr_options['title'] : wp_kses_post( __( '<strong>Extremely Portable</strong>, learn <br> to ride in just 3 minutes', 'techmarket' ) ),
				'sub_title'		=> isset( $sbr_options['sub_title'] ) ? $sbr_options['sub_title'] : esc_html__( 'Travel upto 22km in a single charge.', 'techmarket' ),
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

if ( ! function_exists( 'techmarket_product_categories_carousel_v3_2' ) ) {
	/**
	 *
	 */
	function techmarket_product_categories_carousel_v3_2() {
		if( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$catc_options = $home_v3['catc2'];

			$is_enabled = isset( $catc_options['is_enabled'] ) ? $catc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $catc_options['animation'] ) ? $catc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_product_categories_carousel_v3_2_section_args', array(
				'animation'		    => $animation,
				'section_class'		=> 'categorie_carousel_2',
				'section_title'		=> isset( $catc_options['section_title'] ) ? $catc_options['section_title'] : esc_html__( 'Computers & Laptops Categories', 'techmarket' ),
				'header_custom_nav'	=> isset( $catc_options['header_custom_nav'] ) ? filter_var( $catc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true
			) );

			$taxonomy_args = apply_filters( 'techmarket_product_categories_carousel_v3_2_taxonomy_args', array(
				'number'		=> isset( $catc_options['number'] ) ? $catc_options['number'] : 12,
				'columns'		=> isset( $catc_options['columns'] ) ? $catc_options['columns'] : 6,
				'slugs'			=> isset( $catc_options['slugs'] ) ? $catc_options['slugs'] : '',
			) );

			$carousel_args = apply_filters( 'techmarket_product_categories_carousel_v3_2_carousel_args', array(
				'slidesToShow'		=> isset( $catc_options['carousel_args']['slidesToShow'] ) ? intval( $catc_options['carousel_args']['slidesToShow'] ) : 6,
				'slidesToScroll'	=> isset( $catc_options['carousel_args']['slidesToScroll'] ) ? intval( $catc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'				=> isset( $catc_options['carousel_args']['dots'] ) ? filter_var( $catc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'			=> isset( $catc_options['carousel_args']['arrows'] ) ? filter_var( $catc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'prevArrow'			=> isset( $catc_options['carousel_args']['prevArrow'] ) ? $catc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
				'nextArrow'			=> isset( $catc_options['carousel_args']['nextArrow'] ) ? $catc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
				'responsive'		=> array(
					array(
						'breakpoint'	=> 779,
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
						'breakpoint'	=> 1400,
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

if ( ! function_exists( 'techmarket_products_carousel_tabs_v3_2' ) ) {
	/**
	 * Displays Product Tabs Carousel
	 */
	function techmarket_products_carousel_tabs_v3_2() {

		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$pct2_options = $home_v3['pct2'];

			$is_enabled = isset( $pct2_options['is_enabled'] ) ? $pct2_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $pct2_options['animation'] ) ? $pct2_options['animation'] : '';


			$args = apply_filters( 'techmarket_products_carousel_tabs_v3_2_args', array(
				'animation'			=> $animation,
				'section_title'	=> isset( $pct2_options['section_title'] ) ? $pct2_options['section_title'] : esc_html__( 'Digital Cameras For You', 'techmarket' ),
				'section_class'	=> 'section-hot-new-arrivals',
				'tabs' 			=> array(
					array(
						'title'				=> isset( $pct2_options['tabs'][0]['title'] ) ? $pct2_options['tabs'][0]['title'] : esc_html__( 'Best Choice', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][0]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][0]['shortcode_content']['shortcode'] : 'recent_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][0]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][0]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][1]['title'] ) ? $pct2_options['tabs'][1]['title'] : esc_html__( 'Action Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][1]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][1]['shortcode_content']['shortcode'] : 'featured_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][1]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][1]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][2]['title'] ) ? $pct2_options['tabs'][2]['title'] : esc_html__( 'Compacts', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][2]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][2]['shortcode_content']['shortcode'] : 'sale_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][2]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][2]['shortcode_content'] ) : array( 'columns' => '8' )
					),
					array(
						'title'				=> isset( $pct2_options['tabs'][3]['title'] ) ? $pct2_options['tabs'][3]['title'] : esc_html__( 'DSLR Cameras', 'techmarket' ),
						'shortcode_tag'		=> isset( $pct2_options['tabs'][3]['shortcode_content']['shortcode'] ) ? $pct2_options['tabs'][3]['shortcode_content']['shortcode'] : 'top_rated_products',
						'shortcode_atts'	=> isset( $pct2_options['tabs'][3]['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $pct2_options['tabs'][3]['shortcode_content'] ) : array( 'columns' => '8' )
					),
				),
				'carousel_args'	=> array(
					'slidesToShow'		=> isset( $pct2_options['carousel_args']['slidesToShow'] ) ? intval( $pct2_options['carousel_args']['slidesToShow'] ) : 8,
					'slidesToScroll'	=> isset( $pct2_options['carousel_args']['slidesToScroll'] ) ? intval( $pct2_options['carousel_args']['slidesToScroll'] ) : 8,
					'dots'				=> isset( $pct2_options['carousel_args']['dots'] ) ? filter_var( $pct2_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $pct2_options['carousel_args']['arrows'] ) ? filter_var( $pct2_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : false,
					'responsive'		=> array(
						array(
							'breakpoint'	=> 779,
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
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesToShow'		=> 5,
								'slidesToScroll'	=> 5
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

if ( ! function_exists( 'techmarket_products_carousel_block_v3_4' ) ) {
	function techmarket_products_carousel_block_v3_4() {
		if ( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$lpc_options = $home_v3['lpc'];

			$is_enabled = isset( $lpc_options['is_enabled'] ) ? $lpc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $lpc_options['animation'] ) ? $lpc_options['animation'] : '';

			$args = apply_filters( 'techmarket_products_carousel_block_v3_4_args', array(
				'animation'			=> $animation,
				'section_title'		=> isset( $lpc_options['section_title'] ) ? $lpc_options['section_title'] : esc_html__( 'Recently viewed products', 'techmarket' ),
				'section_class'		=> 'section-landscape-products-carousel',
				'header_custom_nav'	=> isset( $lpc_options['header_custom_nav'] ) ? filter_var( $lpc_options['header_custom_nav'], FILTER_VALIDATE_BOOLEAN ) : true,
				'shortcode_tag'		=> isset( $lpc_options['shortcode_content']['shortcode'] ) ? $lpc_options['shortcode_content']['shortcode'] : 'recent_products',
				'shortcode_atts'	=> isset( $lpc_options['shortcode_content'] ) ? techmarket_get_atts_for_shortcode( $lpc_options['shortcode_content'] ) : array( 'columns' => '5', 'template' => 'content-landscape-product' ),
				'carousel_args'		=> array(
					'slidesToShow'		=> isset( $lpc_options['carousel_args']['slidesToShow'] ) ? intval( $lpc_options['carousel_args']['slidesToShow'] ) : 5,
					'slidesToScroll'	=> isset( $lpc_options['carousel_args']['slidesToScroll'] ) ? intval( $lpc_options['carousel_args']['slidesToScroll'] ) : 5,
					'dots'				=> isset( $lpc_options['carousel_args']['dots'] ) ? filter_var( $lpc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : true,
					'arrows'			=> isset( $lpc_options['carousel_args']['arrows'] ) ? filter_var( $lpc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
					'prevArrow'			=> isset( $lpc_options['carousel_args']['prevArrow'] ) ? $lpc_options['carousel_args']['prevArrow'] : '<a href="#"><i class="tm tm-arrow-left"></i></a>',
					'nextArrow'			=> isset( $lpc_options['carousel_args']['nextArrow'] ) ? $lpc_options['carousel_args']['nextArrow'] : '<a href="#"><i class="tm tm-arrow-right"></i></a>',
					'responsive'		=> array(
						array(
							'breakpoint'	=> 780,
							'settings'		=> array(
								'slidesToShow'		=> 2,
								'slidesToScroll'	=> 2
							)
						),
						array(
							'breakpoint'	=> 1200,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1400,
							'settings'		=> array(
								'slidesToShow'		=> 3,
								'slidesToScroll'	=> 3
							)
						),
						array(
							'breakpoint'	=> 1700,
							'settings'		=> array(
								'slidesToShow'		=> 4,
								'slidesToScroll'	=> 4
							)
						)
					)
				)

			) );

			techmarket_products_carousel( $args );
		}
	}
}

if ( ! function_exists( 'techmarket_brands_carousel_v3' ) ) {
	/**
	 * Display brands carousel
	 *
	 */
	function techmarket_brands_carousel_v3() {

		if( techmarket_is_woocommerce_activated() ) {

			$home_v3 	= techmarket_get_home_v3_meta();
			$bc_options = $home_v3['bc'];

			$is_enabled = isset( $bc_options['is_enabled'] ) ? $bc_options['is_enabled'] : 'no';

			if ( $is_enabled !== 'yes' ) {
				return;
			}

			$animation = isset( $bc_options['animation'] ) ? $bc_options['animation'] : '';

			$section_args = apply_filters( 'techmarket_brands_carousel_v3_section_args', array(
				'animation'		=> $animation,
				'section_title'	=> isset( $bc_options['section_title'] ) ? $bc_options['section_title'] : ''
			) );

			$taxonomy_args = apply_filters( 'techmarket_brands_carousel_v3_taxonomy_args', array(
				'orderby'		=> isset( $bc_options['orderby'] ) ? $bc_options['orderby'] : 'title',
				'order'			=> isset( $bc_options['order'] ) ? $bc_options['order'] : 'ASC',
				'number'		=> isset( $bc_options['number'] ) ? $bc_options['number'] : 12,
				'hide_empty'	=> isset( $bc_options['hide_empty'] ) ? filter_var( $bc_options['hide_empty'], FILTER_VALIDATE_BOOLEAN ) : false
			) );

			$carousel_args = apply_filters( 'techmarket_brands_carousel_v3_carousel_args', array(
				'slidesToShow'	=> isset( $bc_options['carousel_args']['slidesToShow'] ) ? intval( $bc_options['carousel_args']['slidesToShow'] ) : 6,
				'slidesToScroll'=> isset( $bc_options['carousel_args']['slidesToScroll'] ) ? intval( $bc_options['carousel_args']['slidesToScroll'] ) : 1,
				'dots'			=> isset( $bc_options['carousel_args']['dots'] ) ? filter_var( $bc_options['carousel_args']['dots'], FILTER_VALIDATE_BOOLEAN ) : false,
				'arrows'		=> isset( $bc_options['carousel_args']['arrows'] ) ? filter_var( $bc_options['carousel_args']['arrows'], FILTER_VALIDATE_BOOLEAN ) : true,
				'responsive'		=> array(
					array(
						'breakpoint'	=> 650,
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

if( ! function_exists( 'techmarket_home_v3_hook_control' ) ) {
	function techmarket_home_v3_hook_control() {
		if( is_page_template( array( 'template-homepage-v3.php' ) ) ) {
			remove_all_actions( 'techmarket_homepage_v3' );

			$home_v3 = techmarket_get_home_v3_meta();
			add_action( 'techmarket_homepage_v3', 'techmarket_init_structured_data',					5 );
			add_action( 'techmarket_homepage_v3', 'techmarket_slider_with_banners_v3',					isset( $home_v3['swb']['priority'] ) ? intval( $home_v3['swb']['priority'] ) : 10 );
			add_action( 'techmarket_homepage_v3', 'techmarket_features_list_v3',						isset( $home_v3['fl']['priority'] ) ? intval( $home_v3['fl']['priority'] ) : 20 );
			add_action( 'techmarket_homepage_v3', 'techmarket_product_categories_carousel_v3_1',		isset( $home_v3['catc1']['priority'] ) ? intval( $home_v3['catc1']['priority'] ) : 30 );
			add_action( 'techmarket_homepage_v3', 'techmarket_fullwidth_notice_v3',						isset( $home_v3['ntc']['priority'] ) ? intval( $home_v3['ntc']['priority'] ) : 40 );
			add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_block_v3_1',			isset( $home_v3['pc1']['priority'] ) ? intval( $home_v3['pc1']['priority'] ) : 50 );
			add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_block_v3_2',			isset( $home_v3['pc2']['priority'] ) ? intval( $home_v3['pc2']['priority'] ) : 60 );
			add_action( 'techmarket_homepage_v3', 'techmarket_2_column_banners_v3',						isset( $home_v3['brs']['priority'] ) ? intval( $home_v3['brs']['priority'] ) : 70 );
			add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_tabs_v3_1',				isset( $home_v3['pct1']['priority'] ) ? intval( $home_v3['pct1']['priority'] ) : 80 );
			add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_block_v3_3',			isset( $home_v3['pc3']['priority'] ) ? intval( $home_v3['pc3']['priority'] ) : 90 );
			add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_with_bg_v3',			isset( $home_v3['pcbg']['priority'] ) ? intval( $home_v3['pcbg']['priority'] ) : 100 );
			add_action( 'techmarket_homepage_v3', 'techmarket_products_cards_carousel_tabs_v3',			isset( $home_v3['lpct']['priority'] ) ? intval( $home_v3['lpct']['priority'] ) : 110 );
			add_action( 'techmarket_homepage_v3', 'techmarket_banner_with_products_carousel_v3',		isset( $home_v3['brwpc']['priority'] ) ? intval( $home_v3['brwpc']['priority'] ) : 120 );
			add_action( 'techmarket_homepage_v3', 'techmarket_full_width_banner_v3',					isset( $home_v3['sbr']['priority'] ) ? intval( $home_v3['sbr']['priority'] ) : 130 );
			add_action( 'techmarket_homepage_v3', 'techmarket_product_categories_carousel_v3_2',		isset( $home_v3['catc2']['priority'] ) ? intval( $home_v3['catc2']['priority'] ) : 140 );
			add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_tabs_v3_2',				isset( $home_v3['pct2']['priority'] ) ? intval( $home_v3['pct2']['priority'] ) : 150 );
			add_action( 'techmarket_homepage_v3', 'techmarket_products_carousel_block_v3_4',			isset( $home_v3['lpc']['priority'] ) ? intval( $home_v3['lpc']['priority'] ) : 160 );
			add_action( 'techmarket_homepage_v3', 'techmarket_brands_carousel_v3',						isset( $home_v3['bc']['priority'] ) ? intval( $home_v3['bc']['priority'] ) : 170 );
			add_action( 'techmarket_homepage_v3', 'techmarket_homepage_content',						200 );
		}
	}
}
