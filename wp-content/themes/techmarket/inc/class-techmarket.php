<?php
/**
 * Techmarket Class
 *
 * @author   CheThemes
 * @since    2.0.0
 * @package  techmarket
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Techmarket' ) ) :

	/**
	 * The main Techmarket class
	 */
	class Techmarket {

		private static $structured_data;

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			$this->includes();
			$this->init_hooks();
		}

		public function includes() {
			include_once get_template_directory() . '/inc/classes/class-tgm-plugin-activation.php';
		}

		private function init_hooks() {
			add_action( 'after_setup_theme',          array( $this, 'setup' ) );
			add_action( 'widgets_init',               array( $this, 'widgets_init' ) );
			add_action( 'widgets_init',               array( $this, 'widgets_register' ) );
			add_action( 'wp_enqueue_scripts',         array( $this, 'scripts' ),       10 );
			add_action( 'wp_enqueue_scripts',         array( $this, 'child_scripts' ), PHP_INT_MAX ); // After WooCommerce.
			add_filter( 'body_class',                 array( $this, 'body_classes' ) );
			add_filter( 'get_terms_orderby',          array( $this, 'terms_orderby_slug_order' ), 10, 2 );
			add_filter( 'wp_page_menu_args',          array( $this, 'page_menu_args' ) );
			add_filter( 'navigation_markup_template', array( $this, 'navigation_markup_template' ) );
			add_action( 'wp_footer',                  array( $this, 'get_structured_data' ) );
			add_action( 'tgmpa_register',             array( $this, 'required_plugins' ) );
			add_action( 'admin_init',                 array( $this, 'add_theme_editor_style' ) );
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function setup() {
			/*
			 * Load Localisation files.
			 *
			 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
			 */

			// Loads wp-content/languages/themes/techmarket-it_IT.mo.
			load_theme_textdomain( 'techmarket', trailingslashit( WP_LANG_DIR ) . 'themes/' );

			// Loads wp-content/themes/child-theme-name/languages/it_IT.mo.
			load_theme_textdomain( 'techmarket', get_stylesheet_directory() . '/languages' );

			// Loads wp-content/themes/techmarket/languages/it_IT.mo.
			load_theme_textdomain( 'techmarket', get_template_directory() . '/languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 */
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			/**
			 * Enable support for site logo
			 */
			add_theme_support( 'custom-logo', array(
				'height'      => 110,
				'width'       => 470,
				'flex-width'  => true,
			) );

			// This theme uses wp_nav_menu() in 7 locations.
			register_nav_menus( array(
				'primary'			=> esc_html__( 'Primary Menu', 'techmarket' ),
				'secondary'			=> esc_html__( 'Secondary Menu', 'techmarket' ),
				'handheld'			=> esc_html__( 'Handheld Menu', 'techmarket' ),
				'departments-menu'	=> esc_html__( 'Departments Menu', 'techmarket' ),
				'navbar-primary'	=> esc_html__( 'Navbar Primary', 'techmarket' ),
				'topbar-left'		=> esc_html__( 'Top Bar Left', 'techmarket' ),
				'topbar-right'		=> esc_html__( 'Top Bar Right', 'techmarket' ),
			) );

			/*
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'widgets',
			) );

			// Setup the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'techmarket_custom_background_args', array(
				'default-color' => apply_filters( 'techmarket_default_background_color', 'ffffff' ),
				'default-image' => '',
			) ) );

			/**
			 *  Add support for the Site Logo plugin and the site logo functionality in JetPack
			 *  https://github.com/automattic/site-logo
			 *  http://jetpack.me/
			 */
			add_theme_support( 'site-logo', array( 'size' => 'full' ) );

			// Declare support for Post formats feature
			add_theme_support( 'post-formats', array(
				'image',
				'gallery',
				'video',
				'audio',
				'quote',
				'link',
				'aside',
				'status'
			) );

			// Declare WooCommerce support.
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );

			// Declare support for title theme feature.
			add_theme_support( 'title-tag' );

			// Declare support for selective refreshing of widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			// Register theme images sizes.
			if( apply_filters( 'techmarket_register_image_sizes', false ) ) {
				add_image_size( 'techmarket-blog-small', 460, 244, true );
				add_image_size( 'techmarket-blog-medium', 556, 294, true );
				add_image_size( 'techmarket-blog-large', 1433, 560, true );
				add_image_size( 'techmarket-blog-extra-large', 1726, 660, true );
				add_image_size( 'techmarket-blog-carousel', 270, 270, true );
			}

			// Remove support for widgets block editor till all dependent plugins support.
			remove_theme_support( 'widgets-block-editor' );
		}

		/**
		 * Register widget area.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_init() {
			$sidebar_args['sidebar-1'] = array(
				'name'          => esc_html__( 'Sidebar', 'techmarket' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Widgets added to this region will appear on blog archive.', 'techmarket' ),
			);

			$sidebar_args['shop-sidebar-1'] = array(
				'name'        => esc_html__( 'Shop Sidebar 1', 'techmarket' ),
				'id'          => 'shop-sidebar-1',
				'description' => esc_html__( 'Widgets added to this region will appear on shop archive.', 'techmarket' ),
			);

			$sidebar_args['shop-sidebar-2'] = array(
				'name'        => esc_html__( 'Shop Sidebar 2', 'techmarket' ),
				'id'          => 'shop-sidebar-2',
				'description' => esc_html__( 'Widgets added to this region will appear on shop archive.', 'techmarket' ),
			);

			$sidebar_args['product-filters-1'] = array(
				'name'          => esc_html__( 'Product Filters', 'techmarket' ),
				'id'            => 'product-filters-1',
				'description'   => esc_html__( 'Widgets added to this region will appear on shop sidebar.', 'techmarket' ),
			);

			$sidebar_args['home-sidebar-1'] = array(
				'name'        => esc_html__( 'Home Sidebar', 'techmarket' ),
				'id'          => 'home-sidebar-1',
				'description' => esc_html__( 'Widgets added to this region will appear on Home Page v5 and v6.', 'techmarket' ),
			);

			$sidebar_args['footer-widgets-1'] = array(
				'name'          => esc_html__( 'Footer Widgets', 'techmarket' ),
				'id'            => 'footer-widgets-1',
				'description'   => esc_html__( 'Widgets added to this region will appear in the footer block.', 'techmarket' ),
			);

			foreach ( $sidebar_args as $sidebar => $args ) {
				if( $sidebar == 'footer-widgets-1' ) {
					$widget_tags = apply_filters( 'techmarket_footer_widget_args', array(
						'before_widget' => '<div class="columns"><aside id="%1$s" class="widget %2$s clearfix"><div class="body">',
						'after_widget'  => '</div></aside></div>',
						'before_title'  => '<h4 class="widget-title">',
						'after_title'   => '</h4>',
					) );
				} else {
					$widget_tags = array(
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<span class="gamma widget-title">',
						'after_title'   => '</span>',
					);
				}

				/**
				 * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See the list below.
				 *
				 * 'techmarket_sidebar_widget_tags'
				 * 'techmarket_shop-sidebar_widget_tags'
				 * 'techmarket_product-filters_widget_tags'
				 * 'techmarket_footer-widgets_widget_tags'
				 */
				$filter_hook = sprintf( 'techmarket_%s_widget_tags', $sidebar );
				$widget_tags = apply_filters( $filter_hook, $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}
		}

		/**
		 * Register widgets.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_register() {

			// Techmarket Features Widget
			include_once get_template_directory() . '/inc/widgets/class-techmarket-features-widget.php';
			register_widget( 'Techmarket_Features_Widget' );

			// Techmarket Banner Widget
			include_once get_template_directory() . '/inc/widgets/class-techmarket-banner-widget.php';
			register_widget( 'Techmarket_Banner_Widget' );

			// Techmarket Poster Widget
			include_once get_template_directory() . '/inc/widgets/class-techmarket-poster-widget.php';
			register_widget( 'Techmarket_Poster_Widget' );

			// Techmarket Posts Carousel Widget
			include_once get_template_directory() . '/inc/widgets/class-techmarket-posts-carousel-widget.php';
			register_widget( 'Techmarket_Posts_Carousel_Widget' );

			if ( techmarket_is_woocommerce_activated() ) {
				// Techmarket Products Carousel Widget
				include_once get_template_directory() . '/inc/widgets/class-techmarket-products-carousel-widget.php';
				register_widget( 'Techmarket_Products_Carousel_Widget' );
			}
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @since  1.0.0
		 */
		public function scripts() {

			global $techmarket_version;

			$css_vendors = apply_filters( 'techmarket_css_vendors', array(
				'techmarket-bootstrap'		=> array(
					'css_file' 			=> 'bootstrap.css',
					'has_minified_file' => true,
					'minified_css_file' => 'bootstrap.min.css',
					'assets_folder'     => 'css'
				),
				'fontawesome'	=> array(
					'css_file' 			=> 'all.css',
					'has_minified_file' => true,
					'minified_css_file' => 'all.min.css',
					'assets_folder'     => 'vendors/fontawesome/css',
				),
				'techmarket-animate'		=> array(
					'css_file' 			=> 'animate.css',
					'has_minified_file' => true,
					'minified_css_file' => 'animate.min.css',
					'assets_folder'     => 'css',
				)
			) );

			if( is_rtl() ) {
				$css_vendors['techmarket-bootstrap']['css_file'] = 'bootstrap-rtl.css';
				$css_vendors['techmarket-bootstrap']['minified_css_file'] = 'bootstrap-rtl.css';
			}

			$should_minify_css = apply_filters( 'techmarket_should_minify_css', true );

			foreach( $css_vendors as $handle => $css_vendor ) {

				if ( $should_minify_css && $css_vendor['has_minified_file'] ) {
					$css_file = $css_vendor['minified_css_file'];
				} else {
					$css_file = $css_vendor['css_file'];
				}

				$assets_folder = $css_vendor['assets_folder'];

				wp_enqueue_style( $handle, get_template_directory_uri() . '/assets/' . $assets_folder . '/' . $css_file, '', $techmarket_version );
			}

			/**
			 * Styles
			 */
			$css_suffix = $should_minify_css ? '.min' : '';
			wp_enqueue_style( 'techmarket-style', get_template_directory_uri() . '/style' . $css_suffix . '.css', '', $techmarket_version );
			wp_style_add_data( 'techmarket-style', 'rtl', 'replace' );

			wp_enqueue_style( 'techmarket-ie-style', get_template_directory_uri() . '/assets/css/ie-style.css', array( 'techmarket-style' ), $techmarket_version );
			wp_style_add_data( 'techmarket-ie-style', 'conditional', 'IE' );

			if( apply_filters( 'techmarket_use_predefined_colors', true ) ) {
				$techmarket_color_dep = techmarket_is_woocommerce_activated() ? array( 'techmarket-woocommerce-style' ) : array( 'techmarket-style' );
				$techmarket_color_css_file = apply_filters( 'techmarket_primary_color', 'blue' );
				wp_enqueue_style( 'techmarket-color', get_template_directory_uri() . '/assets/css/color/' . $techmarket_color_css_file . '.css', $techmarket_color_dep, $techmarket_version );
			}

			/**
			 * Fonts
			 */
			if ( apply_filters( 'techmarket_load_default_fonts', true ) ) {
				$fonts_url = techmarket_get_fonts_url();
				wp_enqueue_style( 'techmarket-fonts', $fonts_url, array(), null );
			}

			wp_enqueue_style( 'techmarket-icons', get_template_directory_uri() . '/assets/css/font-techmarket.min.css', array(), $techmarket_version );

			/**
			 * Scripts
			 */
			wp_enqueue_script( 'techmarket-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array(), $techmarket_version, true );
			wp_enqueue_script( 'techmarket-tether', get_template_directory_uri() . '/assets/js/tether.min.js', array( 'jquery' ), '1.3.3', true );
			wp_enqueue_script( 'techmarket-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery', 'techmarket-tether' ), '4.0.0', true );
			wp_enqueue_script( 'techmarket-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '1.6.0', true );

			$waypoints_js_handler = function_exists( 'techmarket_is_elementor_activated' ) && techmarket_is_elementor_activated() ? 'elementor-waypoints' : 'techmarket-waypoints';
			wp_enqueue_script( $waypoints_js_handler, get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array( 'jquery' ), '4.0.0', true );

			if( techmarket_has_sticky_header() ) {
				wp_enqueue_script( 'techmarket-waypoints-sticky', get_template_directory_uri() . '/assets/js/waypoints-sticky.min.js', array( 'jquery' ), '4.0.0', true );
			}

			if( apply_filters( 'techmarket_enable_pace', true ) ) {
				wp_enqueue_script( 'techmarket-pace', get_template_directory_uri() . '/assets/js/pace.min.js', array( 'jquery' ), $techmarket_version, true );
			}

			if( apply_filters( 'techmarket_enable_live_search', false ) ) {
				wp_enqueue_script( 'techmarket-typeahead', get_template_directory_uri() . '/assets/js/typeahead.bundle.min.js', array( 'jquery' ), $techmarket_version, true );
				wp_enqueue_script( 'techmarket-handlebars', get_template_directory_uri() . '/assets/js/handlebars.min.js', array( 'techmarket-typeahead' ), $techmarket_version, true );
			}

			if( apply_filters( 'techmarket_enable_scrollup', true ) ) {
				wp_enqueue_script( 'techmarket-easing',		get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array( 'jquery' ), '1.4.0', true );
				wp_enqueue_script( 'techmarket-scrollup',	get_template_directory_uri() . '/assets/js/scrollup.min.js', array( 'jquery' ), $techmarket_version, true );
			}

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
			wp_enqueue_script( 'techmarket-scripts', get_template_directory_uri() . '/assets/js/scripts' . $suffix . '.js', array( 'jquery' ), $techmarket_version, true );

			$techmarket_js_options = apply_filters( 'techmarket_localize_script_data', array(
				'ajax_url'				=> admin_url( 'admin-ajax.php' ),
				'ajax_loader_url'		=> get_template_directory_uri() . '/assets/images/ajax-loader.gif',
				'enable_live_search'	=> apply_filters( 'techmarket_enable_live_search', false ),
				'live_search_limit'		=> apply_filters( 'techmarket_live_search_limit', 10 ),
				'live_search_template'	=> apply_filters( 'techmarket_live_search_template', '<a href="{{url}}" class="media live-search-media"><img src="{{image}}" class="media-left media-object flip pull-left" height="60" width="60"><div class="media-body"><p>{{{value}}}</p></div></a>' ),
				'live_search_empty_msg'	=> apply_filters( 'techmarket_live_search_empty_msg', esc_html__( 'Unable to find any products that match the currenty query', 'techmarket' ) ),
				'deal_countdown_text'	=> apply_filters( 'techmarket_deal_countdown_timer_clock_text', array(
					'days_text'		=> esc_html__( 'Days', 'techmarket' ),
					'hours_text'	=> esc_html__( 'Hours', 'techmarket' ),
					'mins_text'		=> esc_html__( 'Mins', 'techmarket' ),
					'secs_text'		=> esc_html__( 'Secs', 'techmarket' ),
				) ),
			) );

			wp_localize_script( 'techmarket-scripts', 'techmarket_options', $techmarket_js_options );
		}

		public function add_theme_editor_style() {
			add_editor_style();
		}

		/**
		 * Enqueue child theme stylesheet.
		 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
		 * primary css and the separate WooCommerce css.
		 *
		 * @since  1.5.3
		 */
		public function child_scripts() {
			wp_dequeue_style( 'kc-icon-1' );
			if ( is_child_theme() ) {
				wp_enqueue_style( 'techmarket-child-style', get_stylesheet_uri(), '' );
			}
		}

		/**
		 * Terms orderby slug order.
		 *
		 * @since 1.0.0
		 */
		public function terms_orderby_slug_order( $orderby, $args ) {
			if ( isset( $args['orderby'] ) && 'include' == $args['orderby'] && ! empty( $args['include'] ) ) {
				$include = implode( ',', array_map( 'sanitize_text_field', $args['include'] ) );
				$orderby = "FIELD( t.slug, $include )";
			}

			return $orderby;
		}

		/**
		 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
		 *
		 * @param array $args Configuration arguments.
		 * @return array
		 */
		public function page_menu_args( $args ) {
			$args['show_home'] = true;
			return $args;
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 * @return array
		 */
		public function body_classes( $classes ) {
			// Adds a class of group-blog to blogs with more than 1 published author.
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {
				$classes[]	= 'no-wc-breadcrumb';
			}

			/**
			 * What is this?!
			 * Take the blue pill, close this file and forget you saw the following code.
			 * Or take the red pill, filter techmarket_make_me_cute and see how deep the rabbit hole goes...
			 */
			$cute = apply_filters( 'techmarket_make_me_cute', false );

			if ( true === $cute ) {
				$classes[] = 'techmarket-cute';
			}

			$layout_args = $this->get_layout_args();

			if( isset( $layout_args['layout_name'] ) ) {
				$classes[] = $layout_args['layout_name'];
			}

			if( isset( $layout_args['body_classes'] ) ) {
				$classes[] = $layout_args['body_classes'];
			}

			$can_uppercase = apply_filters( 'techmarket_can_uppercase', true );

			if ( true === $can_uppercase ) {
				$classes[] = 'can-uppercase';
			}

			if ( is_user_logged_in() ) {
				$classes[] = 'user-logged-in';
			} else {
				$classes[] = 'user-not-logged-in';
			}

			return $classes;
		}

		public function get_layout_args() {
			global $post;

			$args = array();

			if( techmarket_is_woocommerce_activated() && is_woocommerce() ) {

				if( is_product() ) {

					$args['layout_name'] 	= techmarket_get_single_product_layout();
					$args['body_classes'] 	= techmarket_get_single_product_style();

				} else if( is_shop() || is_product_category() || is_tax( 'product_label' ) || is_tax( get_object_taxonomies( 'product' ) ) ) {

					$args['layout_name'] 	= techmarket_get_shop_layout();
				}

			} elseif ( is_front_page() && is_home() ) {

				// Default homepage
				$args['layout_name'] 	= techmarket_get_blog_layout();
				$args['body_classes'] 	= techmarket_get_blog_style();

			} elseif ( is_front_page() ) {

				// Static homepage
				$page_meta_values = get_post_meta( $post->ID, '_techmarket_page_metabox', true );
				$page_extra_class = '';

				if( isset( $page_meta_values['body_classes'] ) ) {
					$page_extra_class 	.= $page_meta_values['body_classes'];
				}

				if( ! empty( $page_extra_class ) ) {
					$args['body_classes'] = $page_extra_class;
				}

			} elseif ( is_home() ) {

				$args['layout_name'] 	= techmarket_get_blog_layout();
				$args['body_classes'] 	= techmarket_get_blog_style();

			} elseif( is_page() ) {

				$page_meta_values = get_post_meta( $post->ID, '_techmarket_page_metabox', true );
				$page_extra_class = '';

				if( isset( $page_meta_values['body_classes'] ) ) {
					$page_extra_class 	.= $page_meta_values['body_classes'];
				}

				if( ! empty( $page_extra_class ) ) {
					$args['body_classes'] = $page_extra_class;
				}

			} elseif ( is_single() ) {

				if ( 'post' == get_post_type() ) {
					$args['layout_name'] 	= techmarket_get_single_post_layout();
				}

			} elseif ( is_search() ) {

				$args['layout_name'] 	= techmarket_get_blog_layout();

			} else {

				$args['layout_name'] 	= techmarket_get_blog_layout();
				if ( 'post' == get_post_type() ) {
					$args['body_classes'] 	= techmarket_get_blog_style();
				}

			}

			return $args;
		}



		/**
		 * Custom navigation markup template hooked into `navigation_markup_template` filter hook.
		 */
		public function navigation_markup_template() {
			$template  = '<nav id="post-navigation" class="navigation %1$s" aria-label="Post Navigation">';
			$template .= '<span class="screen-reader-text">%2$s</span>';
			$template .= '<div class="nav-links">%3$s</div>';
			$template .= '</nav>';

			return apply_filters( 'techmarket_navigation_markup_template', $template );
		}

		/**
		 * Sets `self::structured_data`.
		 *
		 * @param array $json
		 */
		public static function set_structured_data( $json ) {
			if ( ! is_array( $json ) ) {
				return;
			}

			self::$structured_data[] = $json;
		}

		/**
		 * Outputs structured data.
		 *
		 * Hooked into `wp_footer` action hook.
		 */
		public function get_structured_data() {
			if ( ! self::$structured_data ) {
				return;
			}

			$structured_data['@context'] = 'http://schema.org/';

			if ( count( self::$structured_data ) > 1 ) {
				$structured_data['@graph'] = self::$structured_data;
			} else {
				$structured_data = $structured_data + self::$structured_data[0];
			}

			echo '<script type="application/ld+json">' . wp_json_encode( $this->sanitize_structured_data( $structured_data ) ) . '</script>';
		}

		/**
		 * Sanitizes structured data.
		 *
		 * @param  array $data
		 * @return array
		 */
		public function sanitize_structured_data( $data ) {
			$sanitized = array();

			foreach ( $data as $key => $value ) {
				if ( is_array( $value ) ) {
					$sanitized_value = $this->sanitize_structured_data( $value );
				} else {
					$sanitized_value = sanitize_text_field( $value );
				}

				$sanitized[ sanitize_text_field( $key ) ] = $sanitized_value;
			}

			return $sanitized;
		}

		public function required_plugins() {
			global $techmarket_version;
			
			$plugins = apply_filters( 'techmarket_tgmpa_plugins', array(
				array(
					'name'					=> esc_html__( 'Envato Market', 'techmarket' ),
					'slug'					=> 'envato-market',
					'source'				=> 'http://envato.github.io/wp-envato-market/dist/envato-market.zip',
					'required'				=> false,
					'version'				=> '2.0.6',
					'force_activation'		=> false,
					'force_deactivation'	=> false,
					'external_url'			=> '',
				),

				array(
					'name'					=> esc_html__( 'KingComposer', 'techmarket' ),
					'slug'					=> 'kingcomposer',
					'required'				=> false,
					'version'				=> '2.9.6',
					'force_activation'		=> false,
					'force_deactivation'	=> false,
					'external_url'			=> '',
				),

				array(
					'name'					=> esc_html__( 'One Click Demo Import', 'techmarket' ),
					'slug'					=> 'one-click-demo-import',
					'required'				=> false,
					'version'				=> '3.0.2',
					'force_activation'		=> false,
					'force_deactivation'	=> false,
					'external_url'			=> '',
				),

				array(
					'name'					=> esc_html__( 'Redux Framework', 'techmarket' ),
					'slug'					=> 'redux-framework',
					'required'				=> true,
					'version'				=> '4.2.6',
					'force_activation'		=> false,
					'force_deactivation'	=> false,
					'external_url'			=> '',
				),

				array(
					'name'					=> esc_html__( 'Regenerate Thumbnails', 'techmarket' ),
					'slug'					=> 'regenerate-thumbnails',
					'required'				=> false,
					'version'				=> '3.1.5',
					'force_activation'		=> false,
					'force_deactivation'	=> false,
					'external_url'			=> '',
				),

				array(
					'name'					=> esc_html__( 'Revolution Slider', 'techmarket' ),
					'slug'					=> 'revslider',
					'source'				=> 'https://transvelo.github.io/included-plugins/revslider.zip',
					'required'				=> false,
					'version'				=> '6.2.2',
					'force_activation'		=> false,
					'force_deactivation'	=> false,
					'external_url'			=> '',
				),

				array(
					'name'					=> esc_html__( 'Techmarket Extensions', 'techmarket' ),
					'slug'					=> 'techmarket-extensions',
					'source'				=> 'https://transvelo.github.io/techmarket/assets/plugins/techmarket-extensions.zip',
					'required'				=> false,
					'version'				=> $techmarket_version,
					'force_activation'		=> false,
					'force_deactivation'	=> false,
					'external_url'			=> '',
				),

				array(
					'name'					=> esc_html__( 'WooCommerce', 'techmarket' ),
					'slug'					=> 'woocommerce',
					'required'				=> true,
					'version'				=> '5.5.2',
					'force_activation'		=> false,
					'force_deactivation'	=> false,
					'external_url'			=> '',
				),

				array(
					'name'					=> esc_html__( 'YITH WooCommerce Compare', 'techmarket' ),
					'slug'					=> 'yith-woocommerce-compare',
					'required'				=> false,
					'version'				=> '2.5.3',
					'force_activation'		=> false,
					'force_deactivation'	=> false,
					'is_callable'			=> array( 'YITH_Woocompare', 'is_frontend' ),
					'external_url'			=> '',
				),

				array(
					'name'					=> esc_html__( 'YITH WooCommerce Wishlist', 'techmarket' ),
					'slug'					=> 'yith-woocommerce-wishlist',
					'required'				=> false,
					'version'				=> '3.0.23',
					'force_activation'		=> false,
					'force_deactivation'	=> false,
					'is_callable'			=> array( 'YITH_WCWL', 'get_instance' ),
					'external_url'			=> '',
				),

				array(
                    'name'                  => esc_html__( 'Contact Form by WPForms', 'techmarket' ),
                    'slug'                  => 'wpforms-lite',
                    'required'              => false,
                    'version'               => '1.6.8.1',
                    'force_activation'      => false,
                    'force_deactivation'    => false,
                    'external_url'          => '',
                ),

			) );

			$config = apply_filters( 'techmarket_tgmpa_config', array(
				'domain'			=> 'techmarket',
				'default_path' 		=> '',
				'parent_slug' 		=> 'themes.php',
				'menu'				=> 'install-required-plugins',
				'has_notices'		=> true,
				'is_automatic'		=> false,
				'message'			=> '',
				'strings'			=> array(
					'page_title'  					  => esc_html__( 'Install Required Plugins', 'techmarket' ),
					'menu_title'  					  => esc_html__( 'Install Plugins', 'techmarket' ),
					'installing'  					  => esc_html__( 'Installing Plugin: %s', 'techmarket' ),
					'oops'        					  => esc_html__( 'Something went wrong with the plugin API.', 'techmarket' ),
					'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'techmarket' ),
					'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'techmarket' ),
					'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'techmarket' ),
					'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'techmarket' ),
					'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'techmarket' ),
					'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'techmarket' ),
					'notice_ask_to_update' 	          => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'techmarket' ),
					'notice_cannot_update' 	          => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'techmarket' ),
					'install_link' 			          => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'techmarket'  ),
					'activate_link' 		          => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'techmarket'  ),
					'return'				          => esc_html__( 'Return to Required Plugins Installer', 'techmarket' ),
					'plugin_activated'		          => esc_html__( 'Plugin activated successfully.', 'techmarket' ),
					'complete' 				          => esc_html__( 'All plugins installed and activated successfully. %s', 'techmarket' ),
					'nag_type'				          => 'updated'
				)
			) );

			tgmpa( $plugins, $config );
		}
	}
endif;

return new Techmarket();
