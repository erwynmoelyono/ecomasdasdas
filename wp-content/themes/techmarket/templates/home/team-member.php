<?php
/**
 * Team Member
 *
 * @author  Transvelo
 * @package Techmarket/Templates
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$section_class = empty( $section_class ) ? 'team-member' : 'team-member ' . $section_class;
if ( ! empty( $animation ) ) {
	$section_class .= ' animate-in-view';
}

?>


<div class="<?php echo esc_attr( $section_class ); ?>" <?php if ( !empty( $animation ) ) : ?>data-animation="<?php echo esc_attr( $animation );?>"<?php endif; ?>> 
			
	<a href="#" class="team-member">
		<img src="<?php echo esc_url( $image[0] ); ?>" alt="">
		<div class="profile">
			<h3><?php echo esc_html( $name ); ?> <small class="description"><?php echo esc_html( $designation ); ?></small></h3>
		</div>
	</a>
</div>