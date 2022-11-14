<?php
/**
 * The template for displaying the landingpage.
 * 
 * Template name: Landingpage v2
 *
 * @package techmarket
 */
remove_action( 'techmarket_content_top', 'techmarket_breadcrumb', 10 );

do_action( 'techmarket_before_landingpage_v2' );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			/**
			 * Functions hooked in to landingpage action
			 *
			 * @hooked techmarket_homepage_content      - 5
			 */
			do_action( 'techmarket_landingpage_v2' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<?php

get_footer();