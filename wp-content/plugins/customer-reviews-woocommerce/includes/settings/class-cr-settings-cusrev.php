<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'CR_CusRev_Settings' ) ):

	class CR_CusRev_Settings {

		protected $settings_menu;
		protected $tab;
		protected $settings;

		public function __construct( $settings_menu ) {
			$this->settings_menu = $settings_menu;
			$this->tab = 'cusrev';

			add_action( 'woocommerce_admin_field_verified_badge', array( $this, 'show_verified_badge_checkbox' ) );
			add_action( 'woocommerce_admin_field_verified_page', array( $this, 'show_verified_page' ) );
			add_filter( 'cr_settings_tabs', array( $this, 'register_tab' ) );
			add_action( 'ivole_settings_display_' . $this->tab, array( $this, 'display' ) );
			add_action( 'cr_save_settings_' . $this->tab, array( $this, 'save' ) );
			add_action( 'admin_footer', array( $this, 'output_page_javascript' ) );
			add_action( 'wp_ajax_ivole_check_verified_reviews_ajax', array( $this, 'check_verified_reviews_ajax' ) );
			add_action( 'woocommerce_admin_settings_sanitize_option_ivole_reviews_verified', array( $this, 'save_verified_badge_checkbox' ), 10, 3 );
			add_action( 'woocommerce_admin_settings_sanitize_option_ivole_age_restriction', array( $this, 'save_age_restriction_checkbox' ), 10, 3 );
		}

		public function register_tab( $tabs ) {
			$tabs[$this->tab] = __( 'CusRev.com', 'customer-reviews-woocommerce' );
			return $tabs;
		}

		public function display() {
			$this->init_settings();
			WC_Admin_Settings::output_fields( $this->settings );
		}

		public function save() {
			$this->init_settings();

			$field_id = 'ivole_license_key';
			if( !empty( $_POST ) && isset( $_POST[$field_id] ) ) {
				$license = new CR_License();
				$license->register_license( $_POST[$field_id] );
			}

			WC_Admin_Settings::save_fields( $this->settings );
		}

		protected function init_settings() {
			$this->settings = array(
				array(
					'title' => __( 'CusRev.com', 'customer-reviews-woocommerce' ),
					'type'  => 'title',
					'desc'  => __( 'Display a public page with verified copies of reviews on CusRev.com', 'customer-reviews-woocommerce' ),
					'id'    => 'cr_cusrev_options'
				),
				array(
					'title'   => __( 'Page Enabled', 'customer-reviews-woocommerce' ),
					'desc'    => sprintf( __( 'Enable or disable a public page with verified copies of reviews of your store and products at CusRev website. If this option is enabled, additional %1$s icons for individual reviews on product pages of your store will be displayed. Each %2$s icon will contain a nofollow link to a verified copy of the review on CusRev.com.', 'customer-reviews-woocommerce' ),
					'<img src="' . untrailingslashit( plugin_dir_url( dirname( dirname( __FILE__ )  ) ) ) . '/img/shield-20.png" style="width:17px;">', '<img src="' . untrailingslashit( plugin_dir_url( dirname( dirname( __FILE__ ) ) ) ) . '/img/shield-20.png" style="width:17px;">' ),
					'id'      => 'ivole_reviews_verified',
					'default' => 'no',
					'type'    => 'verified_badge'
				),
				array(
					'title'    => __( 'Page URL', 'customer-reviews-woocommerce' ),
					'desc'     => __( 'Specify name of the page with verified reviews. This will be a base URL for reviews related to your shop. You can use alphanumeric symbols and \'.\' in the name of the page.', 'customer-reviews-woocommerce' ),
					'id'       => 'ivole_reviews_verified_page',
					'default'  => Ivole_Email::get_blogdomain(),
					'type'     => 'verified_page',
					'css'      => 'width:250px;vertical-align:middle;',
					'desc_tip' => true
				),
				array(
					'title'    => __( 'Age Restriction', 'customer-reviews-woocommerce' ),
					'desc'     => __( 'Enable this option if your store sells age-restricted products (e.g., adult content, alcohol, etc.)', 'customer-reviews-woocommerce' ),
					'default'  => 'no',
					'type'     => 'verified_badge',
					'css'      => 'width:250px;vertical-align:middle;',
					'desc_tip' => false,
					'id' => 'ivole_age_restriction',
					'autoload' => false,
					'class' => 'cr-setting-disabled'
				),
				array(
					'type' => 'sectionend',
					'id'   => 'cr_cusrev_options'
				)
			);
		}

		public function is_this_tab() {
			return $this->settings_menu->is_this_page() && ( $this->settings_menu->get_current_tab() === $this->tab );
		}

		/**
		* Custom field type for verified_badge checkbox
		*/
		public function show_verified_badge_checkbox( $value ) {
			$tmp = CR_Admin::cr_get_field_description( $value );
			$description = $tmp['description'];
			$option_value = get_option( $value['id'], $value['default'] );
			?>
			<tr valign="top">
				<th scope="row" class="titledesc">
					<?php echo esc_html( $value['title'] ); ?>
				</th>
				<td class="forminp forminp-checkbox">
					<fieldset>
						<legend class="screen-reader-text"><span><?php echo esc_html( $value['title'] ) ?></span></legend>
						<label for="<?php echo $value['id'] ?>">
							<input name="<?php echo esc_attr( $value['id'] ); ?>" id="<?php echo esc_attr( $value['id'] ); ?>"
							type="checkbox" class="cr-disabled-checkbox<?php echo ( isset( $value['class'] ) && 0 < strlen( $value['class'] ) ) ? ' ' . esc_attr( $value['class'] ) : ''; ?>"
							value="1" disabled="disabled" /><?php echo $description ?></label>
						<p class="cr-verified-badge-status"></p>
					</fieldset>
				</td>
			</tr>
			<?php
		}

		/**
		* Custom field type for verified page
		*/
		public function show_verified_page( $value ) {
			$tmp = CR_Admin::cr_get_field_description( $value );
			$tooltip_html = $tmp['tooltip_html'];
			$description = $tmp['description'];
			?>
			<tr valign="top">
				<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
					<?php echo $tooltip_html; ?>
				</th>
				<td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
					https://www.cusrev.com/reviews/
					<input
					name="<?php echo esc_attr( $value['id'] ); ?>"
					id="<?php echo esc_attr( $value['id'] ); ?>"
					type="text"
					style="<?php echo esc_attr( $value['css'] ); ?>"
					class="<?php echo esc_attr( $value['class'] ); ?>"
					value="<?php echo get_option( 'ivole_reviews_verified_page', Ivole_Email::get_blogdomain() ); ?>"
					disabled />
					<?php echo $description; ?>
				</td>
			</tr>
			<?php
		}

		public function save_verified_badge_checkbox( $value, $option, $raw_value ) {
			$value = '1' === $raw_value || 'yes' === $raw_value ? 'yes' : 'no';

			$ageRestriction = false;
			if( isset( $_POST['ivole_age_restriction'] ) && ( 1 == $_POST['ivole_age_restriction'] || 'yes' == $_POST['ivole_age_restriction'] ) ) {
				$ageRestriction = true;
			}

			$verified_reviews = new CR_Verified_Reviews();
			if( 'yes' === $value ) {
				if( 0 != $verified_reviews->enable( $_POST['ivole_reviews_verified_page'], $ageRestriction ) ) {
					// if activation failed, disable the option
					$value = 'no';
				}
			} else {
				$verified_reviews->disable( $ageRestriction );
			}

			return $value;
		}

		public function save_age_restriction_checkbox( $value, $option, $raw_value ) {
			$value = '1' === $raw_value || 'yes' === $raw_value ? 'yes' : 'no';
			return $value;
		}

		/**
		* Function to check if verified reviews are enabled
		*/
		public function check_verified_reviews_ajax() {
			$vrevs = new CR_Verified_Reviews();
			$rval = $vrevs->check_status();

			if ( 0 === $rval ) {
				wp_send_json( array( 'status' => 0 ) );
			} else {
				wp_send_json( array( 'status' => 1 ) );
			}
		}

		public function output_page_javascript() {
			if ( $this->is_this_tab() ) {
				?>
				<script type="text/javascript">
				jQuery(function($) {
					// Load of Review Extensions page and check if verified reviews are enabled
					if ( jQuery('#ivole_reviews_verified').length > 0 ) {
						let data = {
							'action': 'ivole_check_verified_reviews_ajax'
						};
						jQuery('.cr-verified-badge-status').text('Checking settings...');
						jQuery('.cr-verified-badge-status').css('visibility', 'visible');
						jQuery.post(ajaxurl, data, function(response) {
							jQuery('#ivole_reviews_verified').prop( 'checked', <?php echo 'yes' === get_option( 'ivole_reviews_verified', 'no' ) ? 'true' : 'false'; ?> );
							jQuery('.cr-verified-badge-status').css( 'visibility', 'hidden' );
							jQuery('.cr-disabled-checkbox').prop( 'disabled', false );
							jQuery('#ivole_reviews_verified_page').prop( 'disabled', <?php echo 'yes' === get_option( 'ivole_reviews_verified', 'no' ) ? 'false' : 'true'; ?> );
							jQuery('#ivole_age_restriction').prop( 'checked', <?php echo 'yes' === get_option( 'ivole_age_restriction', 'no' ) ? 'true' : 'false'; ?> );
						});
						jQuery('#ivole_reviews_verified').change(function(){
							if( this.checked ) {
								jQuery('#ivole_reviews_verified_page').prop( 'disabled', false );
							} else {
								jQuery('#ivole_reviews_verified_page').prop( 'disabled', true );
							}
						});
					}
				});
				</script>
				<?php
			}
		}

	}

endif;
