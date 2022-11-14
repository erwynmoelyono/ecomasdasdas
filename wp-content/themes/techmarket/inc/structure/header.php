<?php

if ( ! function_exists( 'techmarket_header_top_bar' ) ) {
	/**
	 * Displays top bar at the header
	 */
	function techmarket_header_top_bar() {
		$header_version = techmarket_get_header_version();

		switch ( $header_version ) {
			case 'v1':
				$top_bar_class = 'top-bar-v1';
				$top_bar_location = 'left';
			break;
			case 'v2':
				$top_bar_class = 'top-bar-v2';
				$top_bar_location = '';
			break;
			case 'v3':
				$top_bar_class = 'top-bar-v3';
				$top_bar_location = '';
			break;
			case 'v4':
				$top_bar_class = 'top-bar-v4';
				$top_bar_location = '';
			break;
			case 'v9':
				$top_bar_class = 'top-bar-v9';
				$top_bar_location = '';
			break;
			case 'v10':
				$top_bar_class = 'top-bar-v10';
				$top_bar_location = '';
			break;
			default:
				$top_bar_class = '';
				$top_bar_location = '';
			break;
		}

		$top_bar_location = apply_filters( 'techmarket_header_top_bar_location', $top_bar_location );

		if ( apply_filters( 'techmarket_header_top_bar', true ) ) : ?>
		<div class="top-bar <?php echo esc_attr( $top_bar_class ); ?>">
			<div class="col-full">
				<?php
					switch ( $top_bar_location ) {
						case 'left':
							wp_nav_menu( apply_filters( 'techmarket_top_bar_left_menu_args', array(
								'theme_location'	=> 'topbar-left',
								'container'			=> false,
								'depth'				=> 2,
								'menu_class'		=> 'nav justify-content-center',
								'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
								'walker'			=> new WP_Bootstrap_Navwalker()
							) ) );
						break;
						case 'right':
							wp_nav_menu( apply_filters( 'techmarket_top_bar_right_menu_args', array(
								'theme_location'	=> 'topbar-left',
								'container'			=> false,
								'depth'				=> 2,
								'menu_class'		=> 'nav justify-content-center',
								'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
								'walker'			=> new WP_Bootstrap_Navwalker()
							) ) );
						break;
						default:
							wp_nav_menu( apply_filters( 'techmarket_top_bar_left_menu_args', array(
								'theme_location'	=> 'topbar-left',
								'container'			=> false,
								'depth'				=> 2,
								'menu_class'		=> 'nav menu-top-bar-left',
								'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
								'walker'			=> new WP_Bootstrap_Navwalker()
							) ) );

							wp_nav_menu( apply_filters( 'techmarket_top_bar_right_menu_args', array(
								'theme_location'	=> 'topbar-right',
								'container'			=> false,
								'depth'				=> 2,
								'menu_class'		=> 'nav menu-top-bar-right',
								'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
								'walker'			=> new WP_Bootstrap_Navwalker()
							) ) );
						break;
					}
				?>
			</div>
		</div>
		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_has_handheld_header' ) ) {
	/**
	 * Load Different Header for handheld devices
	 */
	function techmarket_has_handheld_header() {
		return apply_filters( 'techmarket_has_handheld_header', true );
	}
}

if ( ! function_exists( 'techmarket_handheld_header' ) ) {
	/**
	 * Displays HandHeld Header
	 */
	function techmarket_handheld_header() {
		if( techmarket_has_handheld_header() ) : ?>
			<div class="col-full handheld-only">
				<div class="handheld-header">
					<?php
					/**
					 * @hooked techmarket_header_logo - 10
					 * @hooked techmarket_handheld_header_links - 20
					 * @hooked techmarket_handheld_header_cart_link - 40
					 * @hooked techmarket_handheld_header_search - 50
					 * @hooked techmarket_handheld_navigation - 60
					 */
					do_action( 'techmarket_handheld_header' ); ?>
				</div>
			</div>
		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_handheld_header_search' ) ) {
	/**
	 * The search function for the handheld header
	 *
	 * @since 1.0.0
	 */
	function techmarket_handheld_header_search() {
			?>
			<div class="site-search">
				<?php 
					techmarket_get_template( 'sections/navbar-search.php' );
				?>
			</div><?php
		
	}
}

if ( ! function_exists( 'techmarket_has_sticky_header' ) ) {
	/**
	 * Load sticky header
	 */
	function techmarket_has_sticky_header() {
		return apply_filters( 'techmarket_has_sticky_header', true );
	}
}
