<?php
/**
 * Products Tabs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( empty( $args['tabs'] ) ) {
	return;
}

$section_class = empty( $section_class ) ? 'section-products-tabs' : $section_class . ' section-products-tabs';

if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$header_nav_align = empty( $header_nav_align ) ? 'justify-content-center' : $header_nav_align;

$default_active_tab = empty( $default_active_tab ) ? 0 : $default_active_tab;

$tab_uniqid = 'tab-' . uniqid();
?>
<section class="<?php echo esc_attr( $section_class ); ?>" <?php if ( ! empty( $animation ) ): ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>

	<div class="section-products-tabs-wrap">

		<header class="section-header">
			<?php if( ! empty( $section_title ) ) : ?>
				<h2 class="section-title"><?php echo wp_kses_post ( $section_title ); ?></h2>
			<?php endif; ?>
			<ul class="nav <?php echo esc_attr( $header_nav_align ); ?>" role="tablist">
				<?php foreach( $args['tabs'] as $key => $tab ) :

					$tab_id = $tab_uniqid . $key; ?>

					<?php if ( !empty( $tab['title'] ) ) : ?>

					<li class="nav-item">
						<a data-toggle="tab" href="#<?php echo esc_attr( $tab_id ); ?>" class="nav-link <?php if ( $key == $default_active_tab ) echo esc_attr( 'active' ); ?>"><?php echo wp_kses_post ( $tab['title'] ); ?></a>
					</li>

					<?php endif; ?>

				<?php endforeach; ?>
			</ul>
		</header>

		<div class="tab-content">

			<?php foreach( $args['tabs'] as $key => $tab ) :

				$tab_id = $tab_uniqid . $key; ?>

				<?php if ( !empty( $tab['title'] ) ) : ?>

				<div class="tab-pane <?php if ( $key == $default_active_tab ) echo esc_attr( 'active' ); ?>" id="<?php echo esc_attr( $tab_id ); ?>" role="tabpanel">
					<?php echo techmarket_do_shortcode( $tab['shortcode_tag'], $tab['shortcode_atts'] ) ?>
				</div>

				<?php endif; ?>

			<?php endforeach; ?>

		</div>

		<?php if( ! empty( $action_text ) ) : ?>
			<a class="button" href="<?php echo esc_url( $action_link ); ?>"><?php echo wp_kses_post( $action_text ); ?></a>
		<?php endif; ?>

	</div>

</section>
