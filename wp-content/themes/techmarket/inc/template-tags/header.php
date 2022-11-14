<?php

if ( ! function_exists( 'techmarket_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function techmarket_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_attr_e( 'Skip to navigation', 'techmarket' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'techmarket' ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'techmarket_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function techmarket_site_branding() {
		?>
		<div class="site-branding">
			<?php techmarket_site_title_or_logo(); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'techmarket_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function techmarket_site_title_or_logo() {
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			the_custom_logo();
		} elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			jetpack_the_site_logo();
		} elseif ( apply_filters( 'techmarket_site_logo_svg', true ) ) {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="custom-logo-link" rel="home">';
			techmarket_get_svg_logo();
			echo '</a>';
		} else {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="custom-logo-link" rel="home">';
			?>
			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<?php if ( '' != get_bloginfo( 'description' ) ) : ?>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php endif;
			echo '</a>';
		}
	}
}

if ( ! function_exists( 'techmarket_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function techmarket_primary_navigation() {
		?>
		<nav id="primary-navigation" class="primary-navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'techmarket' ); ?>" data-nav="flex-menu">
			<?php
				wp_nav_menu( apply_filters( 'techmarket_primary_menu_args', array(
					'theme_location'	=> 'primary',
					'container'			=> false,
					'menu_class'		=> 'nav yamm',
					'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
					'walker'			=> new WP_Bootstrap_Navwalker(),
				) ) );
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'techmarket_secondary_navigation' ) ) {
	/**
	 * Display Secondary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function techmarket_secondary_navigation() {
		?>
		<nav id="secondary-navigation" class="secondary-navigation" aria-label="<?php esc_html_e( 'Secondary Navigation', 'techmarket' ); ?>" data-nav="flex-menu">
			<?php
				wp_nav_menu( apply_filters( 'techmarket_secondary_menu_args', array(
					'theme_location'	=> 'secondary',
					'container'			=> false,
					'menu_class'		=> 'nav',
					'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
					'walker'			=> new WP_Bootstrap_Navwalker(),
				) ) );
			?>
		</nav><!-- #secondary-navigation -->
		<?php
	}
}

if ( ! function_exists( 'techmarket_departments_menu' ) ) {
	/**
	 *
	 */
	function techmarket_departments_menu() {
		?>
		<div id="departments-menu" class="dropdown departments-menu">
			<?php
				$departments_menu_title = techmarket_is_woocommerce_activated() ? esc_html__( 'All Departments', 'techmarket' ) : esc_html__( 'Categories', 'techmarket' );
				$departments_menu_title = apply_filters( 'techmarket_departments_menu_title', $departments_menu_title );
				$departments_menu_icon  = apply_filters( 'techmarket_departments_menu_icon', 'tm tm-departments-thin' );
			?>
			<button class="btn dropdown-toggle btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="<?php echo esc_attr( $departments_menu_icon ); ?>"></i><span><?php echo esc_html( $departments_menu_title ); ?></span></button>
			<?php
			wp_nav_menu( apply_filters( 'techmarket_departments_menu_args', array(
				'theme_location'	=> 'departments-menu',
				'container'			=> false,
				'menu_class'		=> 'dropdown-menu yamm departments-menu-dropdown',
				'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
				'walker'			=> new WP_Bootstrap_Navwalker(),
			) ) );
			?>
		</div><!-- #departments-menu -->
		<?php
	}
}

if ( ! function_exists( 'techmarket_navbar_primary_menu' ) ) {
	/**
	 * Display Navbar Primary Menu
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function techmarket_navbar_primary_menu() {
		?>
		<nav id="navbar-primary" class="navbar-primary" aria-label="<?php esc_html_e( 'Navbar Primary', 'techmarket' ); ?>" data-nav="flex-menu">
			<?php
				wp_nav_menu( apply_filters( 'techmarket_navbar_primary_menu_args', array(
					'theme_location'	=> 'navbar-primary',
					'container'			=> false,
					'menu_class'		=> 'nav yamm',
					'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
					'walker'			=> new WP_Bootstrap_Navwalker(),
				) ) );
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'techmarket_handheld_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function techmarket_handheld_navigation() {
		?>
		<nav id="handheld-navigation" class="handheld-navigation" aria-label="<?php esc_html_e( 'Handheld Navigation', 'techmarket' ); ?>">
			<?php
				$handheld_menu_title = apply_filters( 'techmarket_handheld_menu_title', esc_html__( 'Menu', 'techmarket' ) );
				$handheld_menu_icon  = apply_filters( 'techmarket_handheld_menu_icon', 'tm tm-departments-thin' );
			?>
			<button class="btn navbar-toggler" type="button"><i class="<?php echo esc_attr( $handheld_menu_icon ); ?>"></i><span><?php echo esc_html( $handheld_menu_title ); ?></span></button>

			<div class="handheld-navigation-menu">
				<?php
					wp_nav_menu( apply_filters( 'techmarket_handheld_menu_args', array(
						'theme_location'	=> 'handheld',
						'container'			=> false,
						'menu_class'		=> 'nav',
						'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
						'walker'			=> new WP_Bootstrap_Navwalker(),
						'items_wrap'		=> '<span class="tmhm-close">' . apply_filters( 'techmarket_handheld_menu_close_button_text', esc_html__( 'Close', 'techmarket' ) ) . '</span><ul id="%1$s" class="%2$s">%3$s</ul>'
					) ) );
				?>
			</div>
		</nav><!-- #handheld-navigation -->
		<?php
	}
}

if ( ! function_exists( 'techmarket_header_action_button' ) ) {
	/**
	 * Displays an action button at the header
	 */
	function techmarket_header_action_button() {
		
		$action_button_args = apply_filters( 'techmarket_header_action_button_args', array(
			'url'	=> '#',
			'text'  => esc_html__( 'Go to TechMarket Shop', 'techmarket' ),
			'icon'	=> is_rtl() ? 'tm tm-long-arrow-left' : 'tm tm-long-arrow-right'
		) );


		if ( apply_filters( 'techmarket_show_header_action_button', true ) && ! empty( $action_button_args ) ) : ?>
		<a role="button" class="header-action-btn" href="<?php echo esc_url( $action_button_args['url'] );?>">
			<?php echo esc_html( $action_button_args['text'] ); ?>
			<?php if( ! empty( $action_button_args['icon'] ) ) : ?>
				<i class="<?php echo esc_attr( $action_button_args['icon'] );?>"></i>
			<?php endif; ?>
		</a>
		<?php endif;
	}
}

if ( ! function_exists( 'techmarket_navbar_search' ) ) {
	/**
	 * Displays search box in navbar
	 */
	function techmarket_navbar_search() {
		techmarket_get_template( 'sections/navbar-search.php' );
	}
}

if ( ! function_exists( 'techmarket_sticky_wrap_start' ) ) {
	/**
	 * Open sticky wrapper
	 */
	function techmarket_sticky_wrap_start() {
		if( techmarket_has_sticky_header() ) {
			?>
			<div class="techmarket-sticky-wrap">
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_sticky_wrap_end' ) ) {
	/**
	 * Close sticky wrapper
	 */
	function techmarket_sticky_wrap_end() {
		if( techmarket_has_sticky_header() ) {
			?>
			</div><!-- /.techmarket-sticky-wrap -->
			<?php
		}
	}
}

if ( ! function_exists( 'techmarket_row_wrap_start' ) ) {
	/**
	 * Open row wrapper
	 */
	function techmarket_row_wrap_start() {
		?>
		<div class="row">
		<?php
	}
}

if ( ! function_exists( 'techmarket_row_wrap_end' ) ) {
	/**
	 * Close row wrapper
	 */
	function techmarket_row_wrap_end() {
		?>
		</div><!-- /.row -->
		<?php
	}
}

if ( ! function_exists( 'techmarket_stretch_row_wrap_start' ) ) {
	/**
	 * Open row wrapper
	 */
	function techmarket_stretch_row_wrap_start() {
		?>
		<div class="stretched-row">
			<div class="col-full">
				<div class="row">
		<?php
	}
}

if ( ! function_exists( 'techmarket_stretch_row_wrap_end' ) ) {
	/**
	 * Close row wrapper
	 */
	function techmarket_stretch_row_wrap_end() {
		?>
				</div><!-- /.row -->
			</div><!-- /.col-full -->
		</div><!-- /.stretched-row -->
		<?php
	}
}

if ( ! function_exists( 'techmarket_get_svg_logo' ) ) {
	/**
	 * Gets logo-svg.php template
	 */
	function techmarket_get_svg_logo() {
		techmarket_get_template( 'global/logo-svg.php' );
	}
}
