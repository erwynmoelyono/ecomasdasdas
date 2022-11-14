<?php
/**
 * Techmarket Meta Boxes
 *
 * Sets up the write panels used by products and orders (custom post types).
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Techmarket_Admin_Meta_Boxes.
 */
class Techmarket_Admin_Meta_Boxes {

	/**
	 * Is meta boxes saved once?
	 *
	 * @var boolean
	 */
	private static $saved_meta_boxes = false;

	/**
	 * Meta box error messages.
	 *
	 * @var array
	 */
	public static $meta_box_errors  = array();

	/**
	 * Constructor.
	 */
	public function __construct() {
		global $post;
		
		
		//add_action( 'add_meta_boxes', array( $this, 'remove_meta_boxes' ), 10 );
		//add_action( 'add_meta_boxes', array( $this, 'rename_meta_boxes' ), 20 );
		
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 30 );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ), 1, 2 );

		// Save Page Meta Boxes
		add_action( 'techmarket_process_page_home_v1_meta', 'Techmarket_Meta_Box_Home_v1::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v2_meta', 'Techmarket_Meta_Box_Home_v2::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v3_meta', 'Techmarket_Meta_Box_Home_v3::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v4_meta', 'Techmarket_Meta_Box_Home_v4::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v5_meta', 'Techmarket_Meta_Box_Home_v5::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v6_meta', 'Techmarket_Meta_Box_Home_v6::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v7_meta', 'Techmarket_Meta_Box_Home_v7::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v8_meta', 'Techmarket_Meta_Box_Home_v8::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v9_meta', 'Techmarket_Meta_Box_Home_v9::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v10_meta', 'Techmarket_Meta_Box_Home_v10::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v11_meta', 'Techmarket_Meta_Box_Home_v11::save', 10, 2 );
		add_action( 'techmarket_process_page_home_v12_meta', 'Techmarket_Meta_Box_Home_v12::save', 10, 2 );
		add_action( 'techmarket_process_page_landing_v1_meta', 'Techmarket_Meta_Box_Landing_v1::save', 10, 2 );
		add_action( 'techmarket_process_page_landing_v2_meta', 'Techmarket_Meta_Box_Landing_v2::save', 10, 2 );

		add_action( 'techmarket_process_page_meta', 'Techmarket_Meta_Box_Page::save', 10, 2 );

		// Error handling (for showing errors from meta boxes on next page load)
		add_action( 'admin_notices', array( $this, 'output_errors' ) );
		add_action( 'shutdown', array( $this, 'save_errors' ) );
	}

	/**
	 * Add an error message.
	 * @param string $text
	 */
	public static function add_error( $text ) {
		self::$meta_box_errors[] = $text;
	}

	/**
	 * Save errors to an option.
	 */
	public function save_errors() {
		update_option( 'techmarket_meta_box_errors', self::$meta_box_errors );
	}

	/**
	 * Show any stored error messages.
	 */
	public function output_errors() {
		$errors = maybe_unserialize( get_option( 'techmarket_meta_box_errors' ) );

		if ( ! empty( $errors ) ) {

			echo '<div id="techmarket_errors" class="error notice is-dismissible">';

			foreach ( $errors as $error ) {
				echo '<p>' . wp_kses_post( $error ) . '</p>';
			}

			echo '</div>';

			// Clear
			delete_option( 'techmarket_meta_box_errors' );
		}
	}

	/**
	 * Add Techmarket Meta boxes.
	 */
	public function add_meta_boxes( $post_type ) {
		global $post;
		
		$screen = get_current_screen();

		$template_file = get_post_meta( $post->ID, '_wp_page_template', true );

		switch( $template_file ) {
			case 'template-homepage-v1.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v2.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v3.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v4.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v5.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v6.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v7.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v8.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v9.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v10.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v11.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-homepage-v12.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-landingpage-v1.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			case 'template-landingpage-v2.php':
				$this->add_home_meta_boxes( $post_type );
			break;
			default:
				$this->add_page_meta_box( $post_type );
		}
	}

	private function add_page_meta_box() {
		global $post;

		$page_for_posts = get_option( 'page_for_posts' );
		$page_for_shop = get_option('woocommerce_shop_page_id');

		if( $post->ID === $page_for_posts || $post->ID === $page_for_shop ) {
			return;
		}

		add_meta_box( '_techmarket_page_metabox', esc_html__( 'Techmarket Page Options', 'techmarket' ), 'Techmarket_Meta_Box_Page::output', 'page', 'normal', 'high' );
	}

	/**
	 * Add Home Meta boxes
	 */
	private function add_home_meta_boxes() {
		global $post;

		$template_file = get_post_meta( $post->ID, '_wp_page_template', true );

		if ( ! ( $template_file === 'template-homepage-v1.php'|| $template_file === 'template-homepage-v2.php'|| $template_file === 'template-homepage-v3.php'|| $template_file === 'template-homepage-v4.php'|| $template_file === 'template-homepage-v5.php'|| $template_file === 'template-homepage-v6.php' || $template_file === 'template-homepage-v7.php'  || $template_file === 'template-homepage-v8.php'  || $template_file === 'template-homepage-v9.php'  || $template_file === 'template-homepage-v10.php' || $template_file === 'template-homepage-v11.php' || $template_file === 'template-homepage-v12.php' || $template_file === 'template-landingpage-v1.php' || $template_file === 'template-landingpage-v2.php' ) ) {
			return;
		}

		switch( $template_file ) {
			case 'template-homepage-v1.php':
				$meta_box_title 	= esc_html__( 'Home v1 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v1::output';
			break;
			case 'template-homepage-v2.php':
				$meta_box_title 	= esc_html__( 'Home v2 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v2::output';
			break;
			case 'template-homepage-v3.php':
				$meta_box_title 	= esc_html__( 'Home v3 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v3::output';
			break;
			case 'template-homepage-v4.php':
				$meta_box_title 	= esc_html__( 'Home v4 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v4::output';
			break;
			case 'template-homepage-v5.php':
				$meta_box_title 	= esc_html__( 'Home v5 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v5::output';
			break;
			case 'template-homepage-v6.php':
				$meta_box_title 	= esc_html__( 'Home v6 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v6::output';
			break;
			case 'template-homepage-v7.php':
				$meta_box_title 	= esc_html__( 'Home v7 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v7::output';
			break;
			case 'template-homepage-v8.php':
				$meta_box_title 	= esc_html__( 'Home v8 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v8::output';
			break;
			case 'template-homepage-v9.php':
				$meta_box_title 	= esc_html__( 'Home v9 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v9::output';
			break;
			case 'template-homepage-v10.php':
				$meta_box_title 	= esc_html__( 'Home v10 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v10::output';
			break;
			case 'template-homepage-v11.php':
				$meta_box_title 	= esc_html__( 'Home v11 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v11::output';
			break;
			case 'template-homepage-v12.php':
				$meta_box_title 	= esc_html__( 'Home v12 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Home_v12::output';
			break;
			case 'template-landingpage-v1.php':
				$meta_box_title 	= esc_html__( 'Landing v1 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Landing_v1::output';
			break;
			case 'template-landingpage-v2.php':
				$meta_box_title 	= esc_html__( 'Landing v2 Options', 'techmarket' );
				$meta_box_output 	= 'Techmarket_Meta_Box_Landing_v2::output';
			break;

		}
		
		add_meta_box( 'techmarket-home-page-options', $meta_box_title, $meta_box_output, 'page', 'normal', 'high' );
	}

	/**
	 * Check if we're saving, the trigger an action based on the post type.
	 *
	 * @param  int $post_id
	 * @param  object $post
	 */
	public function save_meta_boxes( $post_id, $post ) {

		// $post_id and $post are required
		if ( empty( $post_id ) || empty( $post ) || self::$saved_meta_boxes ) {
			return;
		}

		// Dont' save meta boxes for revisions or autosaves
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the nonce
		if ( empty( $_POST['techmarket_meta_nonce'] ) || ! wp_verify_nonce( $_POST['techmarket_meta_nonce'], 'techmarket_save_data' ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check user has permission to edit
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// We need this save event to run once to avoid potential endless loops. This would have been perfect:
		//	remove_action( current_filter(), __METHOD__ );
		// But cannot be used due to https://github.com/woothemes/woocommerce/issues/6485
		// When that is patched in core we can use the above. For now:
		self::$saved_meta_boxes = true;

		$what = $post->post_type;

		if ( $what == 'page' ) {
			
			$template_file = get_post_meta( $post_id, '_wp_page_template', true );

			switch( $template_file ) {
				case 'template-homepage-v1.php':
					$what .= '_home_v1';
				break;
				case 'template-homepage-v2.php':
					$what .= '_home_v2';
				break;
				case 'template-homepage-v3.php':
					$what .= '_home_v3';
				break;
				case 'template-homepage-v4.php':
					$what .= '_home_v4';
				break;
				case 'template-homepage-v5.php':
					$what .= '_home_v5';
				break;
				case 'template-homepage-v6.php':
					$what .= '_home_v6';
				break;
				case 'template-homepage-v7.php':
					$what .= '_home_v7';
				break;
				case 'template-homepage-v8.php':
					$what .= '_home_v8';
				break;
				case 'template-homepage-v9.php':
					$what .= '_home_v9';
				break;
				case 'template-homepage-v10.php':
					$what .= '_home_v10';
				break;
				case 'template-homepage-v11.php':
					$what .= '_home_v11';
				break;
				case 'template-homepage-v12.php':
					$what .= '_home_v12';
				break;
				case 'template-landingpage-v1.php':
					$what .= '_landing_v1';
				break;
				case 'template-landingpage-v2.php':
					$what .= '_landing_v2';
				break;
			}
		}

		do_action( 'techmarket_process_' . $what . '_meta', $post_id, $post );
	}
}

new Techmarket_Admin_Meta_Boxes();