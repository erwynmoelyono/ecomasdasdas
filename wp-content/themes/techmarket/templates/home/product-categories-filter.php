<?php
/**
 * Product Categories Filter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_class = empty( $section_class ) ? 'section-categories-filter stretch-full-width' : 'section-categories-filter stretch-full-width ' . $section_class;
$category_args = techmarket_get_atts_for_taxonomy_slugs( $category_args );

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$section_id = 'categories-filter-' . uniqid();

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
	<div class="col-full">
		<header class="section-header">
			<?php if( ! empty( $section_title ) ) : ?>
				<h2 class="section-title"><?php echo wp_kses_post ( $section_title ); ?></h2>
			<?php endif; ?>
			<div class="categories">
				<div class="select-picker"><?php wp_dropdown_categories( $category_args ); ?></div>
			</div>
		</header>
		<div class="categories-filter-products" data-shortcode_atts="<?php echo htmlspecialchars( json_encode( $shortcode_atts ), ENT_QUOTES, 'UTF-8' ); ?>"></div>
	</div>
</section>