<?php
/**
 * Banner
 *
 * @author  Transvelo
 * @package Techmarket/Templates
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$section_class = empty( $section_class ) ? 'section-media-single-banner' : 'section-media-single-banner ' . $section_class;
if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'section-media-single-banner' . uniqid();

?>
<div class="quick-scroll">
	<a href="#<?php echo esc_attr( $section_id ); ?>" class="quick-scroll-icon"><i class="tm tm-arrow-down"></i></a>
</div>
<div id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( !empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>> 
	<div class="media">
		<?php if ( ! empty( $image[0] ) ) : ?>
			<img class="d-flex align-self-center" src="<?php echo esc_url( $image[0] ); ?>" alt="">
		<?php endif; ?>
		<div class="media-body">
			<?php if( ! empty( $section_title ) ) : ?>
				<h2 class="section-title"><?php echo wp_kses_post ( $section_title ); ?></h2>
			<?php endif; ?>
			<?php if( ! empty( $description ) ) : ?>
				<div class="description"><?php echo wp_kses_post( $description ); ?></div>
			<?php endif; ?>
			<?php if( ! empty( $action_text ) ) : ?>
				<a class="button" href="<?php echo esc_url( $action_link ); ?>"><?php echo wp_kses_post( $action_text ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>
