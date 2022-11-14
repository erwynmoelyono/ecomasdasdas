<?php
/**
 * Template used to display post content.
 *
 * @package techmarket
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to techmarket_loop_post action.
	 *
	 * @hooked techmarket_post_header          - 10
	 * @hooked techmarket_post_meta            - 20
	 * @hooked techmarket_post_content         - 30
	 * @hooked techmarket_init_structured_data - 40
	 */
	do_action( 'techmarket_loop_post' );
	?>

</article><!-- #post-## -->
