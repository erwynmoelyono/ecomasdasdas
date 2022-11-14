<?php
/**
 * The sidebar containing the shop widget area.
 *
 * @package techmarket
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div id="dokan-secondary" class="dokan-clearfix dokan-w3 dokan-store-sidebar" role="complementary">
<?php
	if ( is_active_sidebar( 'sidebar-store' ) ) {

		dynamic_sidebar( 'sidebar-store' );

	} else {

		do_action( 'techmarket_default_store_sidebar_widgets' );
	}
?>
</div><!-- /.sidebar-store -->