<?php
/**
 * The template for displaying the homepage.
 * 
 * Template name: Homepage v1
 *
 * @package techmarket
 */
remove_action( 'techmarket_content_top', 'techmarket_breadcrumb', 10 );

do_action( 'techmarket_before_homepage_v1' );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			/**
			 * Functions hooked in to homepage action
			 *
			 * @hooked techmarket_homepage_content      - 5
			 */
			do_action( 'techmarket_homepage_v1' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<?php

get_footer();