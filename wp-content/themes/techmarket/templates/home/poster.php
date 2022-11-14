<?php
/**
 * Poster
 *
 * @author  Transvelo
 * @package Techmarket/Templates
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$section_class = empty( $section_class ) ? 'poster' : 'poster ' . $section_class;
if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

$style_attr = '';
if( isset( $bg_choice ) && $bg_choice == 'color' && ! empty( $bg_color ) && ! empty( $bg_height ) ) {
	$style_attr = 'background-color:' . $bg_color  . '; height:' . $bg_height . 'px;';
} elseif ( ! empty( $bg_image[0] ) ) {
	$style_attr = 'background-size: cover; background-position: center center; background-image: url( ' . esc_url( $bg_image[0] ) . ' ); height: ' . esc_attr( $bg_image[2] ) . 'px;';
}

?>
<div class="<?php echo esc_attr( $section_class ); ?>" <?php if ( !empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>> 
	<a href="<?php echo esc_url( $action_link ); ?>">
		<div class="poster-bg" <?php if ( !empty( $style_attr ) ) : ?>style="<?php echo esc_attr( $style_attr );?>"<?php endif; ?>>
			<div class="caption">
				<div class="poster-info">
				<?php
					if( ! empty( $pre_title ) ) {
						echo '<h4 class="pretitle">' . wp_kses_post( $pre_title ) . '</h4>' ;
					}
					if( ! empty( $title ) ) {
						echo '<h3 class="title">' . wp_kses_post( $title ) . '</h3>' ;
					}
					if( ! empty( $sub_title ) ) {
						echo '<h4 class="subtitle">' . wp_kses_post( $sub_title ) . '</h4>' ;
					}
				?>
				<?php if( ! empty( $price ) ) : ?>
					<span class="price"><?php echo wp_kses_post( $price ); ?></span>
				<?php endif; ?>
				</div>
				
				<div class="poster-caption">
					<?php if( ! empty( $action_text ) ) : ?>
						<span class="poster-action button"><?php echo wp_kses_post( $action_text ); ?></span>
					<?php endif; ?>
					<?php if( ! empty( $condition ) ) : ?>
						<span class="condition"><?php echo wp_kses_post( $condition ); ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</a>
</div>