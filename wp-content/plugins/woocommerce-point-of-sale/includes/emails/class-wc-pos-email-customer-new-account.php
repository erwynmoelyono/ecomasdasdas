<?php
/**
 * Class WC_POS_Email_New_Order file.
 *
 * @package WooCommerce_Point_Of_Sale/Classes/Emails
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_POS_Email_Customer_New_Account', false ) ) {
	return new WC_POS_Email_Customer_New_Account();
}

/**
 * New Point of Sale Customer Email.
 *
 * An email sent to the customer when a new account is being created for them via the Point of Sale.
 *
 * @class   WC_POS_Email_Customer_New_Account
 * @extends WC_Email
 */
class WC_POS_Email_Customer_New_Account extends WC_Email {

	/**
	 * User login name.
	 *
	 * @var string
	 */
	public $user_login;

	/**
	 * User email.
	 *
	 * @var string
	 */
	public $user_email;

	/**
	 * User password.
	 *
	 * @var string
	 */
	public $user_pass;

	/**
	 * Is the password generated?
	 *
	 * @var bool
	 */
	public $password_generated;

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->id             = 'pos_customer_new_account';
		$this->customer_email = true;
		$this->title          = __( 'New POS account', 'woocommerce-point-of-sale' );
		$this->description    = __( 'New customer accocunt emails are sent to the customer when a new account is being created for them via the Point of Sale.', 'woocommerce-point-of-sale' );
		$this->template_html  = 'emails/customer-new-account.php';
		$this->template_plain = 'emails/plain/customer-new-account.php';

		// Call parent constructor.
		parent::__construct();
	}

	/**
	 * Get email subject.
	 *
	 * @return string
	 */
	public function get_default_subject() {
		return __( 'Your {site_title} account has been created!', 'woocommerce-point-of-sale' );
	}

	/**
	 * Get email heading.
	 *
	 * @return string
	 */
	public function get_default_heading() {
		return __( 'Welcome to {site_title}', 'woocommerce-point-of-sale' );
	}

	/**
	 * Trigger.
	 *
	 * @param int    $user_id User ID.
	 * @param string $user_pass User password.
	 * @param bool   $password_generated Whether the password was generated automatically or not.
	 */
	public function trigger( $user_id, $user_pass = '', $password_generated = false ) {
		$this->setup_locale();

		if ( $user_id ) {
			$this->object = new WP_User( $user_id );

			$this->user_pass          = $user_pass;
			$this->user_login         = stripslashes( $this->object->user_login );
			$this->user_email         = stripslashes( $this->object->user_email );
			$this->recipient          = $this->user_email;
			$this->password_generated = $password_generated;
		}

		if ( $this->is_enabled() && $this->get_recipient() ) {
			$this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
		}

		$this->restore_locale();
	}

	/**
	 * Get content html.
	 *
	 * @return string
	 */
	public function get_content_html() {
		return wc_get_template_html(
			$this->template_html,
			array(
				'email_heading'      => $this->get_heading(),
				'additional_content' => $this->get_additional_content(),
				'user_login'         => $this->user_login,
				'user_pass'          => $this->user_pass,
				'blogname'           => $this->get_blogname(),
				'password_generated' => $this->password_generated,
				'sent_to_admin'      => false,
				'plain_text'         => false,
				'email'              => $this,
			)
		);
	}

	/**
	 * Get content plain.
	 *
	 * @return string
	 */
	public function get_content_plain() {
		return wc_get_template_html(
			$this->template_plain,
			array(
				'email_heading'      => $this->get_heading(),
				'additional_content' => $this->get_additional_content(),
				'user_login'         => $this->user_login,
				'user_pass'          => $this->user_pass,
				'blogname'           => $this->get_blogname(),
				'password_generated' => $this->password_generated,
				'sent_to_admin'      => false,
				'plain_text'         => true,
				'email'              => $this,
			)
		);
	}

	/**
	 * Default content to show below main email content.
	 *
	 * @return string
	 */
	public function get_default_additional_content() {
		return __( 'We look forward to seeing you soon.', 'woocommerce-point-of-sale' );
	}

	/**
	 * Return content from the additional_content field.
	 *
	 * Displayed above the footer.
	 *
	 * @return string
	 */
	public function get_additional_content() {
		$content = $this->get_option( 'additional_content', '' );

		return apply_filters( 'woocommerce_email_additional_content_' . $this->id, $this->format_string( $content ), $this->object, $this );
	}
}

return new WC_POS_Email_Customer_New_Account();
