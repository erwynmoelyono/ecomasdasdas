<?php

/**
 * Module Name 			: Theme Shortcodes
 * Module Description 	: Provides additional shortcodes for the Techmarket theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Techmarket_Shortcodes' ) ) {
	class Techmarket_Shortcodes {

		/**
		 * Constructor function.
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'setup_constants' ),	10 );
			add_action( 'init', array( $this, 'includes' ),			10 );
		}

		/**
		 * Setup plugin constants
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function setup_constants() {

			// Plugin Folder Path
			if ( ! defined( 'TECHMARKET_EXTENSIONS_SHORTCODE_DIR' ) ) {
				define( 'TECHMARKET_EXTENSIONS_SHORTCODE_DIR', plugin_dir_path( __FILE__ ) );
			}

			// Plugin Folder URL
			if ( ! defined( 'TECHMARKET_EXTENSIONS_SHORTCODE_URL' ) ) {
				define( 'TECHMARKET_EXTENSIONS_SHORTCODE_URL', plugin_dir_url( __FILE__ ) );
			}

			// Plugin Root File
			if ( ! defined( 'TECHMARKET_EXTENSIONS_SHORTCODE_FILE' ) ) {
				define( 'TECHMARKET_EXTENSIONS_SHORTCODE_FILE', __FILE__ );
			}
		}

		/**
		 * Include required files
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function includes() {

			#-----------------------------------------------------------------
			# Shortcodes
			#-----------------------------------------------------------------
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/3-2-3-product-cards-tab-with-featured-product.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/6-1-6-tabs-with-deals.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/banner.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/banners.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/brands-carousel.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/brands.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/compare-page.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/deals-cards-carousel-with-gallery.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/deals-cards-carousel.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/deals-carousel.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/features-list.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/fullwidth-notice.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/jumbotron.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/media-single-banner.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/poster.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/product-card-carousel-with-gallery.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/product-categories-carousel.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/product-categories-filter.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/product-categories-list.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/products-cards-carousel-with-bg.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/products-carousel-tabs-with-featured-product.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/products-carousel-tabs.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/products-carousel-vertical-tabs.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/products-carousel-with-bg.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/products-carousel.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/products-isotope.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/products-tabs.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/products-with-image.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/recent-posts-with-categories.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/team-member.php';
			require_once TECHMARKET_EXTENSIONS_SHORTCODE_DIR . '/elements/terms.php';
		}
	}
}

// Finally initialize code
new Techmarket_Shortcodes();