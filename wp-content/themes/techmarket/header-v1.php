<?php
/**
 * The header v1 for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package techmarket
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php
	/**
	 * Functions hooked into techmarket_before_header_v1
	 *
	 * @hooked techmarket_skip_links                       - 0
	 * @hooked techmarket_social_icons                     - 10
	 */
	do_action( 'techmarket_before_header_v1' ); ?>

	<header id="masthead" class="site-header header-v1" style="<?php techmarket_header_styles(); ?>">

		<div class="col-full <?php echo techmarket_has_handheld_header() ? 'desktop-only' : ''; ?>">

			<?php
			/**
			 * Functions hooked into techmarket_header_v1 action
			 *
			 * @hooked techmarket_site_branding                    - 20
			 * @hooked techmarket_secondary_navigation             - 30
			 * @hooked techmarket_product_search                   - 40
			 * @hooked techmarket_primary_navigation_wrapper       - 42
			 * @hooked techmarket_primary_navigation               - 50
			 * @hooked techmarket_header_cart                      - 60
			 * @hooked techmarket_primary_navigation_wrapper_close - 68
			 */
			do_action( 'techmarket_header_v1' ); ?>

		</div>

		<?php
		/**
		 * @hooked techmarket_handheld_header - 10
		 */
		do_action( 'techmarket_after_header' ); ?>

	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to techmarket_before_content
	 *
	 * @hooked techmarket_header_widget_region - 10
	 */
	do_action( 'techmarket_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">
			<div class="row">
		<?php
		/**
		 * Functions hooked in to techmarket_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'techmarket_content_top' );
