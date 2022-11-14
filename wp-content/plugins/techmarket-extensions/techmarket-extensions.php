<?php
/**
 * Plugin Name:    	Techmarket Extensions
 * Plugin URI:     	https://themeforest.net/item/techmarket-multidemo-electronics-store-woocommerce-theme/20241155
 * Description:    	This selection of extensions compliment our lean and mean theme for WooCommerce, Techmarket. Please note: they don’t work with any WordPress theme, just Techmarket.
 * Author:         	MadrasThemes
 * Author URI:     	https://madrasthemes.com/
 * Version:        	1.4.9
 * Text Domain: 	techmarket-extensions
 * Domain Path: 	/languages
 * WC tested up to: 4.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Techmarket_Extensions' ) ) {
	/**
	 * Main Techmarket_Extensions Class
	 *
	 * @class Techmarket_Extensions
	 * @version	1.0.0
	 * @since 1.0.0
	 * @package	Kudos
	 * @author Ibrahim
	 */
	final class Techmarket_Extensions {
		/**
		 * Techmarket_Extensions The single instance of Techmarket_Extensions.
		 * @var 	object
		 * @access  private
		 * @since 	1.0.0
		 */
		private static $_instance = null;

		/**
		 * The token.
		 * @var     string
		 * @access  public
		 * @since   1.0.0
		 */
		public $token;

		/**
		 * The version number.
		 * @var     string
		 * @access  public
		 * @since   1.0.0
		 */
		public $version;

		/**
		 * Constructor function.
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function __construct () {
			
			$this->token 	= 'techmarket-extensions';
			$this->version 	= '1.0.0';
			
			add_action( 'plugins_loaded', array( $this, 'setup_constants' ),		10 );
			add_action( 'plugins_loaded', array( $this, 'includes' ),				20 );
			add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ),	30 );
		}

		/**
		 * Main Techmarket_Extensions Instance
		 *
		 * Ensures only one instance of Techmarket_Extensions is loaded or can be loaded.
		 *
		 * @since 1.0.0
		 * @static
		 * @see Techmarket_Extensions()
		 * @return Main Kudos instance
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
			if ( ! defined( 'TECHMARKET_EXTENSIONS_DIR' ) ) {
				define( 'TECHMARKET_EXTENSIONS_DIR', plugin_dir_path( __FILE__ ) );
			}

			// Plugin Folder URL
			if ( ! defined( 'TECHMARKET_EXTENSIONS_URL' ) ) {
				define( 'TECHMARKET_EXTENSIONS_URL', plugin_dir_url( __FILE__ ) );
			}

			// Plugin Root File
			if ( ! defined( 'TECHMARKET_EXTENSIONS_FILE' ) ) {
				define( 'TECHMARKET_EXTENSIONS_FILE', __FILE__ );
			}

			// Modules File
			if ( ! defined( 'TECHMARKET_MODULES_DIR' ) ) {
				define( 'TECHMARKET_MODULES_DIR', TECHMARKET_EXTENSIONS_DIR . '/modules' );
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
			# Post Formats
			#-----------------------------------------------------------------
			require_once TECHMARKET_MODULES_DIR . '/post-formats/post-formats.php';

			#-----------------------------------------------------------------
			# Static Block Post Type
			#-----------------------------------------------------------------
			require_once TECHMARKET_MODULES_DIR . '/post-types/static-block/static-block.php';

			#-----------------------------------------------------------------
			# Theme Shortcodes
			#-----------------------------------------------------------------
			require_once TECHMARKET_MODULES_DIR . '/theme-shortcodes/theme-shortcodes.php';

			#-----------------------------------------------------------------
			# King Composer Extensions
			#-----------------------------------------------------------------
			require_once TECHMARKET_MODULES_DIR . '/kingcomposer/kingcomposer.php';

			#-----------------------------------------------------------------
			# Visual Composer Extensions
			#-----------------------------------------------------------------
			require_once TECHMARKET_MODULES_DIR . '/js_composer/js_composer.php';

			#-----------------------------------------------------------------
			# Elementor Extensions
			#-----------------------------------------------------------------
			require_once TECHMARKET_MODULES_DIR . '/elementor/elementor.php';
		}

		/**
		 * Load the localisation file.
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_plugin_textdomain() {
			load_plugin_textdomain( 'techmarket-extensions', false, dirname( plugin_basename( TECHMARKET_EXTENSIONS_FILE ) ) . '/languages/' );
		}

		/**
		 * Cloning is forbidden.
		 *
		 * @since 1.0.0
		 */
		public function __clone () {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'techmarket-extensions' ), '1.0.0' );
		}

		/**
		 * Unserializing instances of this class is forbidden.
		 *
		 * @since 1.0.0
		 */
		public function __wakeup () {
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'techmarket-extensions' ), '1.0.0' );
		}
	}
}

/**
 * Returns the main instance of Techmarket_Extensions to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Techmarket_Extensions
 */
function Techmarket_Extensions() {
	return Techmarket_Extensions::instance();
}

/**
 * Initialise the plugin
 */
Techmarket_Extensions();