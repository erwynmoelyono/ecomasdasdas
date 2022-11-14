<?php
/**
 * Features Block
 *
 * @package Pizzaro/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$section_class = empty( $section_class ) ? 'features-list' : 'features-list ' . $section_class;
if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

?>
<div class="<?php echo esc_attr( $section_class ); ?>" <?php if ( !empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>>
	<div class="features">
		<?php foreach( $features as $feature ) : ?>
			<?php if ( ! empty( $feature['icon'] ) ) : ?>
			<div class="feature">
				<div class="media">
					<i class="feature-icon d-flex mr-3 <?php echo esc_attr( $feature['icon'] ); ?>"></i>
					<div class="media-body feature-text"><?php echo wp_kses_post( $feature['label'] ); ?></div>
				</div>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
