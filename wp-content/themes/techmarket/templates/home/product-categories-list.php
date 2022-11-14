<?php
/**
 * Products Categories List
 *
 * @package Techmarket/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section_class = empty( $section_class ) ? 'product-categories-list' : 'product-categories-list ' . $section_class;
$category_args = techmarket_get_atts_for_taxonomy_slugs( $category_args );
$categories = get_terms( 'product_cat', $category_args );

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
} ?>
<section class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation ); ?>"<?php endif; ?>>
	<?php if( ! empty( $section_title ) ) : ?>
		<header class="section-header">
			<h2 class="section-title"><?php echo wp_kses_post ( $section_title ); ?></h2>
		</header>
	<?php endif; ?>

	<ul class="categories">
		<?php foreach( $categories as $category ) : ?>
		<li class="category">
			<div class="media">
				<a href="<?php echo esc_url( get_term_link( $category ) ); ?>">
					<?php woocommerce_subcategory_thumbnail( $category ); ?>
				</a>
				<div class="media-body">
					<div class="head-and-list">
						<h4 class="media-heading"><a href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a></h4>
						<?php
							$child_category_args = wp_parse_args( array( 'taxonomy' => 'product_cat', 'parent' => $category->term_id ), $child_category_args );
							echo '<ul class="sub-categories list-unstyled">' . wp_list_categories( $child_category_args ) . '</ul>';
						?>
					</div>
					<a class="view-all" href="<?php echo esc_url( get_term_link( $category ) ); ?>"><?php echo esc_html__( 'View All', 'techmarket' ); ?></a>
				</div>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
</section>
