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

<div id="tertiary" class="widget-area shop-sidebar" role="complementary">
<?php
	if ( is_active_sidebar( 'shop-sidebar-2' ) ) {

		dynamic_sidebar( 'shop-sidebar-2' );

	} else {

		do_action( 'techmarket_default_shop_2_sidebar_widgets' );
	}
?>
</div><!-- /.sidebar-shop-2 -->