<?php
/**
 * @package techmarket
 */

$additional_post_classes = apply_filters( 'techmarket_additional_post_classes', array() );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $additional_post_classes ); ?>>

	<?php
		techmarket_post_content();
		techmarket_posted_on();
	?>

</article><!-- #post-## -->