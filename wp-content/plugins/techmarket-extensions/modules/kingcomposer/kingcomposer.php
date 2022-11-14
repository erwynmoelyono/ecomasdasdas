<?php

/**
 * Module Name 			: King Composer Addons
 * Module Description 	: Provides additional King Composer Elements for the Techmarket theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Techmarket_KCExtensions' ) ) {
	class Techmarket_KCExtensions {

		/**
		 * Constructor function.
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'setup_constants' ),	10 );
			add_action( 'init', array( $this, 'map_kc_elements' ),	20 );
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
			if ( ! defined( 'TECHMARKET_KC_PLUGIN_EXTENSIONS_DIR' ) ) {
				define( 'TECHMARKET_KC_PLUGIN_EXTENSIONS_DIR', plugin_dir_path( __FILE__ ) );
			}

			// Plugin Folder URL
			if ( ! defined( 'TECHMARKET_KC_PLUGIN_EXTENSIONS_URL' ) ) {
				define( 'TECHMARKET_KC_PLUGIN_EXTENSIONS_URL', plugin_dir_url( __FILE__ ) );
			}

			// Plugin Root File
			if ( ! defined( 'TECHMARKET_KC_PLUGIN_EXTENSIONS_FILE' ) ) {
				define( 'TECHMARKET_KC_PLUGIN_EXTENSIONS_FILE', __FILE__ );
			}
		}

		/**
		 * Map Config Dir
		 *
		 * @since  1.0.0
		 * @access public
		 */
		public function map_kc_elements() {
			require_once TECHMARKET_KC_PLUGIN_EXTENSIONS_DIR.'/maps.php';
		}
	}
}

if( class_exists( 'KingComposer' ) ) {
	// Finally initialize code
	new Techmarket_KCExtensions();
}