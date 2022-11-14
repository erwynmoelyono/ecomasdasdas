<?php

/**
 * Module Name          : Elementor Addons
 * Module Description   : Provides additional Elementor Elements for the Techmarket theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Techmarket_Elementor_Extensions' ) ) {
    final class Techmarket_Elementor_Extensions {

        /**
         * Techmarket_Extensions The single instance of Techmarket_Extensions.
         * @var     object
         * @access  private
         * @since   1.0.0
         */
        private static $_instance = null;

        /**
         * Constructor function.
         * @access  public
         * @since   1.0.0
         * @return  void
         */
        public function __construct() {
            add_action( 'init', array( $this, 'setup_constants' ),  10 );
            add_action( 'elementor/elements/categories_registered', array( $this, 'add_widget_categories' ) );
            add_action( 'init', array( $this, 'elementor_widgets' ),  20 );
            add_action( 'elementor/frontend/after_register_scripts', array( $this, 'widget_scripts' ) );
        }

        /**
         * Techmarket_Elementor_Extensions Instance
         *
         * Ensures only one instance of Techmarket_Elementor_Extensions is loaded or can be loaded.
         *
         * @since 1.0.0
         * @static
         * @return Techmarket_Elementor_Extensions instance
         */
        public static function instance () {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
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
            if ( ! defined( 'TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR' ) ) {
                define( 'TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR', plugin_dir_path( __FILE__ ) );
            }

            // Plugin Folder URL
            if ( ! defined( 'TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_URL' ) ) {
                define( 'TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_URL', plugin_dir_url( __FILE__ ) );
            }

            // Plugin Root File
            if ( ! defined( 'TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_FILE' ) ) {
                define( 'TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_FILE', __FILE__ );
            }
        }

        /**
         * Widget Category Register
         *
         * @since  1.0.0
         * @access public
         */
        public function add_widget_categories( $elements_manager ) {
            $elements_manager->add_category(
                'techmarket-elements',
                [
                    'title' => esc_html__( 'Techmarket Elements', 'techmarket-extensions' ),
                    'icon' => 'fa fa-shopping-bag',
                ]
            );
        }

        /**
         * Widgets
         *
         * @since  1.0.0
         * @access public
         */
        public function elementor_widgets() {
            
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/3-2-3-product-cards-tab-with-featured-product.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/6-1-6-tabs-with-deals.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/banner.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/banners.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/brands-carousel.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/brands.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/deals-cards-carousel.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/deals-carousel.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/deals-cards-carousel-with-gallery.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/features-list.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/fullwidth-notice.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/jumbotron.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/media-single-banner.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/product-card-carousel-with-gallery.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/product-categories-carousel.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/product-categories-filter.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/product-categories-list.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/products-cards-carousel-with-bg.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/products-carousel-tabs-with-featured-product.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/products-carousel-tabs.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/products-carousel-vertical-tabs.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/products-carousel-with-bg.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/products-carousel.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/products-isotope.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/product-tabs.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/products-with-image.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/recent-posts-with-categories.php';
            require_once TECHMARKET_ELEMENTOR_PLUGIN_EXTENSIONS_DIR.'/widgets/team-member.php';
        }

        public function widget_scripts() {
            if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
                wp_enqueue_script( 'techmarket-elementor', TECHMARKET_EXTENSIONS_URL . '/modules/elementor/js/techmarket-elementor-script.js', array( 'jquery', 'techmarket-slick' ), '1.3.3', true );
            }
        }
    }
}

if ( did_action( 'elementor/loaded' ) ) {
    // Finally initialize code
    Techmarket_Elementor_Extensions::instance();
}