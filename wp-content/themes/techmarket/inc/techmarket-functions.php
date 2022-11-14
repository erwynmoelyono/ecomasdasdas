<?php
/**
 * Techmarket  functions.
 *
 * @package techmarket
 */


if ( ! function_exists( 'techmarket_breadcrumb' ) ) {
	function techmarket_breadcrumb( $args = array() ) {

		if ( apply_filters( 'techmarket_show_breadcrumb' , true ) ){

			if ( is_rtl() ) {
				$delimiter = '<span class="delimiter"><i class="fas fa-angle-left"></i></span>';
			} else {
				$delimiter = '<span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>';
			}

			$args = wp_parse_args( $args, apply_filters( 'techmarket_breadcrumb_defaults', array(
				'delimiter'   => $delimiter,
				'wrap_before' => '<nav class="woocommerce-breadcrumb">',
				'wrap_after'  => '</nav>',
				'before'      => '',
				'after'       => '',
				'home'        => _x( 'Home', 'breadcrumb', 'techmarket' )
			) ) );

			if ( techmarket_is_woocommerce_activated() ) {
				woocommerce_breadcrumb( $args );
			} else {

				require get_template_directory() . '/inc/classes/class-techmarket-breadcrumb.php';

				$breadcrumbs = new Techmarket_Breadcrumb();

				if ( $args['home'] ) {
					$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
				}

				$args['breadcrumb'] = $breadcrumbs->generate();

				techmarket_get_template( 'global/breadcrumb.php', $args );
			}
		}
	}
}

if( ! function_exists( 'techmarket_is_redux_activated' ) ) {
	/**
	 * Check if Redux Framework is activated
	 */
	function techmarket_is_redux_activated() {
		return class_exists( 'ReduxFrameworkPlugin' ) ? true : false;
	}
}

if ( ! function_exists( 'techmarket_is_woocommerce_activated' ) ) {
	/**
	 * Query WooCommerce activation
	 */
	function techmarket_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}

if( ! function_exists( 'techmarket_is_woocommerce_extension_activated' ) ) {
	/**
	 * Query WooCommerce Extension Activation.
	 * @var  $extension main extension class name
	 * @return boolean
	 */
	function techmarket_is_woocommerce_extension_activated( $extension ) {
		if( techmarket_is_woocommerce_activated() ) {
			$is_activated = class_exists( $extension ) ? true : false;
		} else {
			$is_activated = false;
		}

		return $is_activated;
	}
}

if( ! function_exists( 'techmarket_is_yith_wcwl_activated' ) ) {
	/**
	 * Checks if YITH Wishlist is activated
	 *
	 * @return boolean
	 */
	function techmarket_is_yith_wcwl_activated() {
		return techmarket_is_woocommerce_extension_activated( 'YITH_WCWL' );
	}
}

if( ! function_exists( 'techmarket_is_yith_woocompare_activated' ) ) {
	/**
	 * Checks if YITH WooCompare is activated
	 *
	 * @return boolean
	 */
	function techmarket_is_yith_woocompare_activated() {
		return techmarket_is_woocommerce_extension_activated( 'YITH_Woocompare' );
	}
}

if( ! function_exists( 'techmarket_is_wpml_activated' ) ) {
	/**
	 * Checks if WPML is activated
	 *
	 * @return  boolean
	 */
	function techmarket_is_wpml_activated() {
		return function_exists( 'icl_object_id' );
	}
}

if ( ! function_exists( 'techmarket_is_yith_wcan_activated' ) ) {
	/**
	 * Checks if YITH WCAN is activated
	 *
	 * @return  boolean
	 */
	function techmarket_is_yith_wcan_activated() {
		return function_exists( 'YITH_WCAN' );
	}
}

if( ! function_exists( 'techmarket_is_revslider_activated' ) ) {
	/**
	 * Checks if Revslider is activated
	 *
	 * @return  boolean
	 */
	function techmarket_is_revslider_activated() {
		return function_exists( 'putRevSlider' );
	}
}

if( ! function_exists( 'techmarket_is_jetpack_activated' ) ) {
	/**
	 * Query Jetpack activation
	 */
	function techmarket_is_jetpack_activated() {
		return class_exists( 'Jetpack' ) ? true : false ;
	}
}

if( ! function_exists( 'techmarket_is_elementor_activated' ) ) {
	/**
	 * Check if Elementor is activated
	 */
	if( ! function_exists( 'techmarket_is_elementor_activated' ) ) {
		function techmarket_is_elementor_activated() {
			return did_action( 'elementor/loaded' ) ? true : false;
		}
	}
}

if( ! function_exists( 'techmarket_is_ocdi_activated' ) ) {
	/**
	 * Check if One Click Demo Import is activated
	 */
	function techmarket_is_ocdi_activated() {
		return class_exists( 'OCDI_Plugin' ) ? true : false;
	}
}

if ( ! function_exists( 'techmarket_is_dokan_activated' ) ) {
	/**
	 * Check if Dokan is activated
	 */
	function techmarket_is_dokan_activated() {
		return class_exists( 'WeDevs_Dokan' ) ? true : false;
	}
}

if ( ! function_exists( 'techmarket_is_wc_vendors_activated' ) ) {
	/**
	 * Check if WC Vendors is activated
	 */
	function techmarket_is_wc_vendors_activated() {
		return class_exists( 'WC_Vendors' ) ? true : false;
	}
}

if ( ! function_exists( 'techmarket_is_wc_marketplace_activated' ) ) {
	/**
	 * Check if WC Marketplace is activated
	 */
	function techmarket_is_wc_marketplace_activated() {
		return class_exists( 'WCMp' ) ? true : false;
	}
}

if ( ! function_exists( 'techmarket_is_product_archive' ) ) {
	/**
	 * Checks if the current page is a product archive
	 * @return boolean
	 */
	function techmarket_is_product_archive() {
		if ( techmarket_is_woocommerce_activated() ) {
			if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() || is_tax( get_object_taxonomies( 'product' ) ) ) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'techmarket_use_cdn' ) ) {
	/**
	 * Should use CDN or local
	 */
	function techmarket_use_cdn() {
		return apply_filters( 'techmarket_use_cdn', true );
	}
}

/**
 * Call a shortcode function by tag name.
 *
 * @since  1.4.6
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function techmarket_do_shortcode( $tag, array $atts = array(), $content = null ) {
	global $shortcode_tags;

	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
		return false;
	}

	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}

/**
 * Get the content background color
 * Accounts for the Techmarket Designer and Techmarket Powerpack content background option.
 *
 * @since  1.6.0
 * @return string the background color
 */
function techmarket_get_content_background_color() {
	if ( class_exists( 'Techmarket_Designer' ) ) {
		$content_bg_color = get_theme_mod( 'sd_content_background_color' );
		$content_frame    = get_theme_mod( 'sd_fixed_width' );
	}

	if ( class_exists( 'Techmarket_Powerpack' ) ) {
		$content_bg_color = get_theme_mod( 'sp_content_frame_background' );
		$content_frame    = get_theme_mod( 'sp_content_frame' );
	}

	$bg_color = str_replace( '#', '', get_theme_mod( 'background_color' ) );

	if ( class_exists( 'Techmarket_Powerpack' ) || class_exists( 'Techmarket_Designer' ) ) {
		if ( $content_bg_color && ( 'true' == $content_frame || 'frame' == $content_frame ) ) {
			$bg_color = str_replace( '#', '', $content_bg_color );
		}
	}

	return '#' . $bg_color;
}

/**
 * Apply inline style to the Techmarket header.
 *
 * @uses  get_header_image()
 * @since  2.0.0
 */
function techmarket_header_styles() {
	$is_header_image = get_header_image();

	if ( $is_header_image ) {
		$header_bg_image = 'url(' . esc_url( $is_header_image ) . ')';
	} else {
		$header_bg_image = 'none';
	}

	$styles = apply_filters( 'techmarket_header_styles', array(
		'background-image' => $header_bg_image,
	) );

	foreach ( $styles as $style => $value ) {
		echo esc_attr( $style . ': ' . $value . '; ' );
	}
}

/**
 * Adjust a hex color brightness
 * Allows us to create hover styles for custom link colors
 *
 * @param  strong  $hex   hex color e.g. #111111.
 * @param  integer $steps factor by which to brighten/darken ranging from -255 (darken) to 255 (brighten).
 * @return string        brightened/darkened hex color
 * @since  1.0.0
 */
function techmarket_adjust_color_brightness( $hex, $steps ) {
	// Steps should be between -255 and 255. Negative = darker, positive = lighter.
	$steps  = max( -255, min( 255, $steps ) );

	// Format the hex color string.
	$hex    = str_replace( '#', '', $hex );

	if ( 3 == strlen( $hex ) ) {
		$hex    = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
	}

	// Get decimal values.
	$r  = hexdec( substr( $hex, 0, 2 ) );
	$g  = hexdec( substr( $hex, 2, 2 ) );
	$b  = hexdec( substr( $hex, 4, 2 ) );

	// Adjust number of steps and keep it inside 0 to 255.
	$r  = max( 0, min( 255, $r + $steps ) );
	$g  = max( 0, min( 255, $g + $steps ) );
	$b  = max( 0, min( 255, $b + $steps ) );

	$r_hex  = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
	$g_hex  = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
	$b_hex  = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

	return '#' . $r_hex . $g_hex . $b_hex;
}

/**
 * Sanitizes choices (selects / radios)
 * Checks that the input matches one of the available choices
 *
 * @param array $input the available choices.
 * @param array $setting the setting object.
 * @since  1.3.0
 */
function techmarket_sanitize_choices( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Checkbox sanitization callback.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 * @since  1.5.0
 */
function techmarket_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	/**
	 * Query WooCommerce activation
	 */
	function is_woocommerce_activated() {
		_deprecated_function( 'is_woocommerce_activated', '2.1.6', 'techmarket_is_woocommerce_activated' );

		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Schema type
 *
 * @return void
 */
function techmarket_html_tag_schema() {
	_deprecated_function( 'techmarket_html_tag_schema', '2.0.2' );

	$schema = 'http://schema.org/';
	$type   = 'WebPage';

	if ( is_singular( 'post' ) ) {
		$type = 'Article';
	} elseif ( is_author() ) {
		$type = 'ProfilePage';
	} elseif ( is_search() ) {
		$type 	= 'SearchResultsPage';
	}

	echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
}

/**
 * Sanitizes the layout setting
 *
 * Ensures only array keys matching the original settings specified in add_control() are valid
 *
 * @param array $input the layout options.
 * @since 1.0.3
 */
function techmarket_sanitize_layout( $input ) {
	_deprecated_function( 'techmarket_sanitize_layout', '2.0', 'techmarket_sanitize_choices' );

	$valid = array(
		'right' => 'Right',
		'left'  => 'Left',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Techmarket Sanitize Hex Color
 *
 * @param string $color The color as a hex.
 * @todo remove in 2.1.
 */
function techmarket_sanitize_hex_color( $color ) {
	_deprecated_function( 'techmarket_sanitize_hex_color', '2.0', 'sanitize_hex_color' );

	if ( '' === $color ) {
		return '';
	}

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}

	return null;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 * @todo remove in 2.1.
 */
function techmarket_categorized_blog() {
	_deprecated_function( 'techmarket_categorized_blog', '2.0' );

	if ( false === ( $all_the_cool_cats = get_transient( 'techmarket_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'techmarket_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so techmarket_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so techmarket_categorized_blog should return false.
		return false;
	}
}

if ( ! function_exists( 'techmarket_get_header_version' ) ) {
	/**
	 * Gets the Header version set in theme options
	 */
	function techmarket_get_header_version() {
		global $post;

		$template_file = '';

		if ( isset( $post ) ) {
			$template_file = get_post_meta( $post->ID, '_wp_page_template', true );
		}

		switch( $template_file ) {
			case 'template-homepage-v1.php':
				$home_v1 		= techmarket_get_home_v1_meta();
				$header_style 	= ! empty( $home_v1['header_style'] ) ? $home_v1['header_style'] : 'v1';
				$header_version = apply_filters( 'techmarket_home_v1_header_version', $header_style );
				break;
			case 'template-homepage-v2.php':
				$home_v2 		= techmarket_get_home_v2_meta();
				$header_style 	= ! empty( $home_v2['header_style'] ) ? $home_v2['header_style'] : 'v1';
				$header_version = apply_filters( 'techmarket_home_v2_header_version', $header_style );
				break;
			case 'template-homepage-v3.php':
				$home_v3 		= techmarket_get_home_v3_meta();
				$header_style 	= ! empty( $home_v3['header_style'] ) ? $home_v3['header_style'] : 'v2';
				$header_version = apply_filters( 'techmarket_home_v3_header_version', $header_style );
				break;
			case 'template-homepage-v4.php':
				$home_v4 		= techmarket_get_home_v4_meta();
				$header_style 	= ! empty( $home_v4['header_style'] ) ? $home_v4['header_style'] : 'v2';
				$header_version = apply_filters( 'techmarket_home_v4_header_version', $header_style );
				break;
			case 'template-homepage-v5.php':
				$home_v5 		= techmarket_get_home_v5_meta();
				$header_style 	= ! empty( $home_v5['header_style'] ) ? $home_v5['header_style'] : 'v3';
				$header_version = apply_filters( 'techmarket_home_v5_header_version', $header_style );
				break;
			case 'template-homepage-v6.php':
				$home_v6 		= techmarket_get_home_v6_meta();
				$header_style 	= ! empty( $home_v6['header_style'] ) ? $home_v6['header_style'] : 'v4';
				$header_version = apply_filters( 'techmarket_home_v6_header_version', $header_style );
				break;
			case 'template-homepage-v7.php':
				$home_v7 		= techmarket_get_home_v7_meta();
				$header_style 	= ! empty( $home_v7['header_style'] ) ? $home_v7['header_style'] : 'v2';
				$header_version = apply_filters( 'techmarket_home_v7_header_version', $header_style );
				break;
			case 'template-homepage-v8.php':
				$home_v8 		= techmarket_get_home_v8_meta();
				$header_style 	= ! empty( $home_v8['header_style'] ) ? $home_v8['header_style'] : 'v2';
				$header_version = apply_filters( 'techmarket_home_v8_header_version', $header_style );
				break;
			case 'template-homepage-v9.php':
				$home_v9 		= techmarket_get_home_v9_meta();
				$header_style 	= ! empty( $home_v9['header_style'] ) ? $home_v9['header_style'] : 'v7';
				$header_version = apply_filters( 'techmarket_home_v9_header_version', $header_style );
				break;
			case 'template-homepage-v10.php':
				$home_v10 		= techmarket_get_home_v10_meta();
				$header_style 	= ! empty( $home_v10['header_style'] ) ? $home_v10['header_style'] : 'v8';
				$header_version = apply_filters( 'techmarket_home_v10_header_version', $header_style );
				break;
			case 'template-homepage-v11.php':
				$home_v11 		= techmarket_get_home_v11_meta();
				$header_style 	= ! empty( $home_v11['header_style'] ) ? $home_v11['header_style'] : 'v9';
				$header_version = apply_filters( 'techmarket_home_v11_header_version', $header_style );
				break;
			case 'template-homepage-v12.php':
				$home_v12 		= techmarket_get_home_v12_meta();
				$header_style 	= ! empty( $home_v12['header_style'] ) ? $home_v12['header_style'] : 'v10';
				$header_version = apply_filters( 'techmarket_home_v12_header_version', $header_style );
				break;
			case 'template-landingpage-v1.php':
				$header_version = apply_filters( 'techmarket_landing_v1_header_version', 'v5' );
				break;
			case 'template-landingpage-v2.php':
				$header_version = apply_filters( 'techmarket_landing_v2_header_version', 'v6' );
				break;
			default:
				$header_version = apply_filters( 'techmarket_header_version', 'v1' );
		}

		return $header_version;
	}
}

if ( ! function_exists( 'techmarket_get_footer_version' ) ) {
	/**
	 * Gets the Footer version set in theme options
	 */
	function techmarket_get_footer_version() {
		$footer_version = apply_filters( 'techmarket_footer_version', 'v1' );
		return $footer_version;
	}
}

/**
 * Enables template debug mode
 *
 */
function techmarket_template_debug_mode() {
	if ( ! defined( 'TECHMARKET_TEMPLATE_DEBUG_MODE' ) ) {
		$status_options = get_option( 'woocommerce_status_options', array() );
		if ( ! empty( $status_options['template_debug_mode'] ) && current_user_can( 'manage_options' ) ) {
			define( 'TECHMARKET_TEMPLATE_DEBUG_MODE', true );
		} else {
			define( 'TECHMARKET_TEMPLATE_DEBUG_MODE', false );
		}
	}
}

/**
 * Get other templates (e.g. product attributes) passing attributes and including the file.
 *
 * @access public
 * @param string $template_name
 * @param array $args (default: array())
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return void
 */
function techmarket_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	if ( $args && is_array( $args ) ) {
		extract( $args );
	}

	$located = techmarket_locate_template( $template_name, $template_path, $default_path );

	if ( ! file_exists( $located ) ) {
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin
	$located = apply_filters( 'techmarket_get_template', $located, $template_name, $args, $template_path, $default_path );

	do_action( 'techmarket_before_template_part', $template_name, $template_path, $located, $args );

	include( $located );

	do_action( 'techmarket_after_template_part', $template_name, $template_path, $located, $args );
}

/**
 * Locate a template and return the path for inclusion.
 *
 * This is the load order:
 *
 *		yourtheme		/	$template_path	/	$template_name
 *		yourtheme		/	$template_name
 *		$default_path	/	$template_name
 *
 * @access public
 * @param string $template_name
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return string
 */
function techmarket_locate_template( $template_name, $template_path = '', $default_path = '' ) {
	if ( ! $template_path ) {
		$template_path = 'templates/';
	}

	if ( ! $default_path ) {
		$default_path = 'templates/';
	}

	// Look within passed path within the theme - this is priority
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name
		)
	);

	// Get default template
	if ( ! $template || TECHMARKET_TEMPLATE_DEBUG_MODE ) {
		$template = $default_path . $template_name;
	}

	// Return what we found
	return apply_filters( 'techmarket_locate_template', $template, $template_name, $template_path );
}

if ( ! function_exists( 'pr' ) ) {
	/**
	 * print_r() convenience function.
     *
     * In terminals this will act similar to using print_r() directly, when not run on cli
     * print_r() will also wrap <pre> tags around the output of given variable.
     *
     * @param mixed $var Variable to print out.
     * @return void
	 */
	function pr( $var ) {
		if ( ! WP_DEBUG ) {
			return;
		}

		$template = (PHP_SAPI !== 'cli' && PHP_SAPI !== 'phpdbg') ? '<pre class="pr">%s</pre>' : "\n%s\n\n";
		printf( $template, trim( print_r( $var, true ) ) );
	}
}

if ( ! function_exists( 'techmarket_get_image' ) ) {
	/**
	 * Get an HTML img element representing an image src array
	 */
	function techmarket_get_image( $image_src ) {
		$html = '';
		if ( $image_src ) {
			list($src, $width, $height) = $image_src;
			$hwstring = image_hwstring($width, $height);
			$attr = array(
				'src'   => $src,
				'alt'   => '',
			);

			$attr = array_map( 'esc_attr', $attr );
			$html = rtrim("<img $hwstring");
			foreach ( $attr as $name => $value ) {
            	$html .= " $name=" . '"' . $value . '"';
	        }
	        $html .= ' />';
		}
		return $html;
	}
}

if ( ! function_exists( 'techmarket_clean_kses_post' ) ) {
	/**
	 * Clean variables using wp_kses_post.
	 * @param string|array $var
	 * @return string|array
	 */
	function techmarket_clean_kses_post( $var ) {
		return is_array( $var ) ? array_map( 'techmarket_clean_kses_post', $var ) : wp_kses_post( stripslashes( $var ) );
	}
}

if ( ! function_exists( 'techmarket_newsletter_form' ) ) {
	/**
	 * Pizzaro Newsletter Form
	 *
	 */
	function techmarket_newsletter_form() {
		ob_start();
		?>
		<form class="newsletter-form">
			<input type="text" placeholder="<?php echo esc_attr( esc_html__( 'Enter your email address', 'techmarket' ) ); ?>">
			<button class="button" type="button"><?php echo esc_html__( 'Sign up', 'techmarket' ); ?></button>
		</form>
		<?php
		$newsletter_form = ob_get_clean();
		echo apply_filters( 'techmarket_newsletter_form', $newsletter_form );
	}
}

if ( ! function_exists( 'techmarket_get_social_networks' ) ) {
	/**
	 * List of all available social networks
	 *
	 * @return array array of all social networks and its details
	 */
	function techmarket_get_social_networks() {
		return apply_filters( 'techmarket_get_social_networks', array(
			'facebook' 		=> array(
				'label'	=> esc_html__( 'Facebook', 'techmarket' ),
				'icon'	=> 'fab fa-facebook',
				'id'	=> 'facebook_link',
				'link'	=> '#',
			),
			'twitter' 		=> array(
				'label'	=> esc_html__( 'Twitter', 'techmarket' ),
				'icon'	=> 'fab fa-twitter',
				'id'	=> 'twitter_link',
				'link'	=> '#',
			),
			'pinterest' 	=> array(
				'label'	=> esc_html__( 'Pinterest', 'techmarket' ),
				'icon'	=> 'fab fa-pinterest',
				'id'	=> 'pinterest_link',
			),
			'linkedin' 		=> array(
				'label'	=> esc_html__( 'LinkedIn', 'techmarket' ),
				'icon'	=> 'fab fa-linkedin',
				'id'	=> 'linkedin_link',
			),
			'googleplus' 	=> array(
				'label'	=> esc_html__( 'Google+', 'techmarket' ),
				'icon'	=> 'fab fa-google-plus',
				'id'	=> 'googleplus_link',
				'link'	=> '#',
			),
			'tumblr' 	=> array(
				'label'	=> esc_html__( 'Tumblr', 'techmarket' ),
				'icon'	=> 'fab fa-tumblr',
				'id'	=> 'tumblr_link'
			),
			'instagram' 	=> array(
				'label'	=> esc_html__( 'Instagram', 'techmarket' ),
				'icon'	=> 'fab fa-instagram',
				'id'	=> 'instagram_link',
			),
			'youtube' 		=> array(
				'label'	=> esc_html__( 'Youtube', 'techmarket' ),
				'icon'	=> 'fab fa-youtube-play',
				'id'	=> 'youtube_link',
			),
			'vimeo' 		=> array(
				'label'	=> esc_html__( 'Vimeo', 'techmarket' ),
				'icon'	=> 'fab fa-vimeo-square',
				'id'	=> 'vimeo_link',
			),
			'dribbble' 		=> array(
				'label'	=> esc_html__( 'Dribbble', 'techmarket' ),
				'icon'	=> 'fab fa-dribbble',
				'id'	=> 'dribbble_link',
				'link'	=> '#',
			),
			'stumbleupon' 	=> array(
				'label'	=> esc_html__( 'StumbleUpon', 'techmarket' ),
				'icon'	=> 'fab fa-stumbleupon',
				'id'	=> 'stumble_upon_link'
			),
			'rss'			=> array(
				'label'	=> esc_html__( 'RSS', 'techmarket' ),
				'icon'	=> 'fas fa-rss',
				'id'	=> 'rss_link',
				'link'	=> get_bloginfo( 'rss2_url' ),
			)
		) );
	}
}

if ( ! function_exists( 'techmarket_get_fonts_url' ) ) {
	/**
	 * Register Google Fonts
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function techmarket_get_fonts_url() {

		$google_fonts = apply_filters( 'techmarket_google_font_families', array(
			'rubik' => 'Rubik:300,400,400i,500,500i,900,900i',
		) );

		$query_args = array(
			'family' => implode( '|', $google_fonts ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

		if ( apply_filters( 'techmarket_switch_to_roboto', false ) && tm_is_windows_7() ) {
			$fonts_url = get_template_directory_uri() . '/assets/css/font-rubik.min.css';
		}

		return $fonts_url;
	}
}

require_once get_template_directory() . '/inc/functions/menu.php';
require_once get_template_directory() . '/inc/structure/content.php';
require_once get_template_directory() . '/inc/structure/header.php';
require_once get_template_directory() . '/inc/structure/footer.php';
