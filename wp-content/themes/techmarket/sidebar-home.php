<?php
/**
 * The sidebar containing the home widget area.
 *
 * @package techmarket
 */

if ( ! is_active_sidebar( 'home-sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'home-sidebar-1' ); ?>
</div><!-- #secondary -->
