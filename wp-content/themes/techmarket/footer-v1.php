<?php
/**
 * The template for displaying the footer v1.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package techmarket
 */

?>

			</div><!-- .col-full -->
		</div><!-- .row -->
	</div><!-- #content -->

	<?php do_action( 'techmarket_before_footer_v1' ); ?>

	<footer id="colophon" class="site-footer footer-v1">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to techmarket_footer action
			 *
			 * @hooked techmarket_footer_newsletter - 10
			 * @hooked techmarket_social_icons      - 20
			 * @hooked techmarket_footer_widgets    - 30
			 * @hooked techmarket_footer_site_info  - 40
			 */
			do_action( 'techmarket_footer_v1' ); ?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'techmarket_after_footer_v1' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
