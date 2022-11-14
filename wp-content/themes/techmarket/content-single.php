<?php
/**
 * Template used to display post content on single pages.
 *
 * @package techmarket
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'techmarket_single_post_top' );

	/**
	 * Functions hooked into techmarket_single_post add_action
	 *
	 * @hooked techmarket_post_header          - 10
	 * @hooked techmarket_post_meta            - 20
	 * @hooked techmarket_post_content         - 30
	 * @hooked techmarket_init_structured_data - 40
	 */
	do_action( 'techmarket_single_post' );

	/**
	 * Functions hooked in to techmarket_single_post_bottom action
	 *
	 * @hooked techmarket_post_nav         - 10
	 * @hooked techmarket_display_comments - 20
	 */
	do_action( 'techmarket_single_post_bottom' );
	?>

</article><!-- #post-## -->
