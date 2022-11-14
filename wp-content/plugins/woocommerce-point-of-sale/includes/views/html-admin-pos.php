<?php
/**
 * Point of Sale
 *
 * Renders the Point of Sale UI.
 *
 * @var $register_data
 * @var $outlet_data
 */

$validate_manifest         = true;
$manifest_url              = WC_POS()->plugin_url() . '/assets/dist/images/manifest.json';
$mainfest_url_headers      = wc_pos_get_headers( $manifest_url, 1 );
$mainfest_url_content_type = isset( $mainfest_url_headers, $mainfest_url_headers['Content-Type'] ) ? $mainfest_url_headers['Content-Type'] : '';
$manifest_path             = WC_POS()->plugin_path() . '/assets/dist/images/manifest.json';
$manifest_content          = wc_pos_file_get_contents( $manifest_path );
$manifest_content_decoded  = json_decode( $manifest_content, true );

if (
	is_null( $manifest_content_decoded )
	|| ( 'application/json' !== strtolower( $mainfest_url_content_type ) )
) {
	$validate_manifest = false;
}

defined( 'ABSPATH' ) || exit;
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo esc_html( $register_data['name'] ) . ' &lsaquo; ' . esc_html( $outlet_data['name'] ) . ' &lsaquo; ' . esc_html__( 'Point of Sale', 'woocommerce-point-of-sale' ); ?></title>
		<?php if ( $validate_manifest ) : ?>
		<link rel="manifest" href="<?php echo esc_url( $manifest_url ); ?>">
		<?php endif; ?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/apple-icon-57x57.png'; ?>">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/apple-icon-60x60.png'; ?>">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/apple-icon-72x72.png'; ?>">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/apple-icon-76x76.png'; ?>">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/apple-icon-114x114.png'; ?>">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/apple-icon-120x120.png'; ?>">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/apple-icon-144x144.png'; ?>">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/apple-icon-152x152.png'; ?>">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/apple-icon-180x180.png'; ?>">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/android-icon-192x192.png'; ?>">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/favicon-32x32.png'; ?>">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/favicon-96x96.png'; ?>">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/favicon-16x16.png'; ?>">
		<link rel="mask-icon" href="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/safari-pinned-tab.svg'; ?>" color="#7f54b3">
		<meta name="msapplication-TileColor" content="<?php echo esc_attr( $primary_color ); ?>">
		<meta name="msapplication-TileImage" content="<?php echo esc_url( WC_POS()->plugin_url() ) . '/assets/dist/images/ms-icon-144x144.png'; ?>">
		<meta name="theme-color" content="<?php echo esc_attr( $primary_color ); ?>">
		<meta http-equiv="Content-Type" name="viewport" charset="<?php echo esc_attr( get_option( 'blog_charset' ) ); ?>" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo esc_attr( $primary_color ); ?>" />
	</head>
	<body>
		<div id="wc-pos-registers-edit">
			<app></app>
		</div>

		<script data-cfasync="false" type="text/javascript" class="wc_pos_params" >
			window.wc_pos_params = <?php echo wp_kses_post( WC_POS_Sell::get_js_params() ); ?>;
			window.pos_register_data = <?php echo wp_kses_post( json_encode( $register_data ) ); ?>;
			window.pos_outlet_data = <?php echo wp_kses_post( json_encode( $outlet_data ) ); ?>;
			window.pos_receipt = <?php echo wp_kses_post( json_encode( WC_POS_Sell::instance()->get_receipt( $register_data['receipt'] ) ) ); ?>;
			window.pos_grid = <?php echo wp_kses_post( $this->get_grid() ); ?>;
			window.pos_wc = <?php echo wp_kses_post( WC_POS_Sell::get_js_wc_params() ); ?>;
			window.pos_cart = <?php echo wp_kses_post( WC_POS_Sell::get_js_cart_params() ); ?>;
			window.pos_i18n = <?php echo wp_kses_post( json_encode( require_once WC_POS()->plugin_path() . '/i18n/app.php' ) ); ?>;
			window.coupon_i18n = <?php echo wp_kses_post( json_encode( require_once WC_POS()->plugin_path() . '/i18n/coupon.php' ) ); ?>;
			window.pos_custom_product = <?php echo wp_kses_post( WC_POS_Sell::instance()->get_custom_product_params() ); ?>;
			window.wc_pos_options = <?php echo wp_kses_post( json_encode( WC_POS_Sell::get_pos_options() ) ); ?>;
		</script>

		<?php
			/*
			 * The following functions allow the POS enqueued scripts and styles to
			 * be loaded exclusively. Using wp_footer() would load more stuff that we
			 * do not need here.
			 */
			wp_enqueue_scripts();
			print_late_styles();
			print_footer_scripts();
		?>
		<?php require_once WC_POS()->plugin_path() . '/includes/views/modal/html-modal-payments.php'; ?>
	</body>
</html>
