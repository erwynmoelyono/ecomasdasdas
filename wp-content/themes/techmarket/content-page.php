<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package techmarket
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to techmarket_page add_action
	 *
	 * @hooked techmarket_page_header          - 10
	 * @hooked techmarket_page_content         - 20
	 * @hooked techmarket_init_structured_data - 30
	 */
	do_action( 'techmarket_page' );
	?>
</div><!-- #post-## -->
