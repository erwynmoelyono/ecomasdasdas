<?php
/**
 * Techmarket template functions.
 *
 * @package techmarket
 */

if ( ! function_exists( 'techmarket_get_sidebar' ) ) {
	/**
	 * Display techmarket sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function techmarket_get_sidebar( $name = null ) {
		get_sidebar( $name );
	}
}

if ( ! function_exists( 'techmarket_init_structured_data' ) ) {
	/**
	 * Generates structured data.
	 *
	 * Hooked into the following action hooks:
	 *
	 * - `techmarket_loop_post`
	 * - `techmarket_single_post`
	 * - `techmarket_page`
	 *
	 * Applies `techmarket_structured_data` filter hook for structured data customization :)
	 */
	function techmarket_init_structured_data() {

		// Post's structured data.
		if ( is_home() || is_category() || is_date() || is_search() || is_single() && ( techmarket_is_woocommerce_activated() && ! is_woocommerce() ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'normal' );
			$logo  = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

			$json['@type']            = 'BlogPosting';

			$json['mainEntityOfPage'] = array(
				'@type'                 => 'webpage',
				'@id'                   => get_the_permalink(),
			);

			$json['publisher']        = array(
				'@type'                 => 'organization',
				'name'                  => get_bloginfo( 'name' ),
				'logo'                  => array(
					'@type'               => 'ImageObject',
					'url'                 => $logo[0],
					'width'               => $logo[1],
					'height'              => $logo[2],
				),
			);

			$json['author']           = array(
				'@type'                 => 'person',
				'name'                  => get_the_author(),
			);

			if ( $image ) {
				$json['image']            = array(
					'@type'                 => 'ImageObject',
					'url'                   => $image[0],
					'width'                 => $image[1],
					'height'                => $image[2],
				);
			}

			$json['datePublished']    = get_post_time( 'c' );
			$json['dateModified']     = get_the_modified_date( 'c' );
			$json['name']             = get_the_title();
			$json['headline']         = $json['name'];

			if( has_excerpt() ) {
				$json['description']      = get_the_excerpt();
			}

		// Page's structured data.
		} elseif ( is_page() ) {
			$json['@type']            = 'WebPage';
			$json['url']              = get_the_permalink();
			$json['name']             = get_the_title();

			if( has_excerpt() ) {
				$json['description']      = get_the_excerpt();
			}
		}

		if ( isset( $json ) ) {
			Techmarket::set_structured_data( apply_filters( 'techmarket_structured_data', $json ) );
		}
	}
}

require_once get_template_directory() . '/inc/template-tags/content.php';
require_once get_template_directory() . '/inc/template-tags/homepage.php';
require_once get_template_directory() . '/inc/template-tags/home-v1.php';
require_once get_template_directory() . '/inc/template-tags/home-v2.php';
require_once get_template_directory() . '/inc/template-tags/home-v3.php';
require_once get_template_directory() . '/inc/template-tags/home-v4.php';
require_once get_template_directory() . '/inc/template-tags/home-v5.php';
require_once get_template_directory() . '/inc/template-tags/home-v6.php';
require_once get_template_directory() . '/inc/template-tags/home-v7.php';
require_once get_template_directory() . '/inc/template-tags/home-v8.php';
require_once get_template_directory() . '/inc/template-tags/home-v9.php';
require_once get_template_directory() . '/inc/template-tags/home-v10.php';
require_once get_template_directory() . '/inc/template-tags/home-v11.php';
require_once get_template_directory() . '/inc/template-tags/home-v12.php';
require_once get_template_directory() . '/inc/template-tags/landingpage-v1.php';
require_once get_template_directory() . '/inc/template-tags/landingpage-v2.php';
require_once get_template_directory() . '/inc/template-tags/header.php';
require_once get_template_directory() . '/inc/template-tags/footer.php';
