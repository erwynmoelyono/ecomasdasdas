<?php
/**
 * The template for displaying the homepage.
 * 
 * Template name: Homepage v6
 *
 * @package techmarket
 */
remove_action( 'techmarket_content_top', 'techmarket_breadcrumb', 10 );

do_action( 'techmarket_before_homepage_v6' );

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			/**
			 * Functions hooked in to homepage action
			 *
			 * @hooked techmarket_homepage_content      - 5
			 */
			do_action( 'techmarket_homepage_v6' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php
do_action( 'techmarket_sidebar', 'home' );
do_action( 'techmarket_homepage_v6_before_footer' );
get_footer();