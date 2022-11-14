<?php
/**
 * Template Name: Centered Fullwidth
 *
 * @package techmarket
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post();

				do_action( 'techmarket_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to techmarket_page_after action
				 *
				 * @hooked techmarket_display_comments - 10
				 */
				do_action( 'techmarket_page_after' );

			endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();