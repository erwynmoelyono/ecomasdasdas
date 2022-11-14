<?php
/**
 * Functions used in shop loop
 */

if ( ! function_exists( 'techmarket_get_shop_views' ) ) {
	/**
	 * Get shop views available by techmarket
	 */
	function techmarket_get_shop_views() {

		$shop_views = apply_filters( 'techmarket_shop_views_args', array(
			'grid'				=> array(
				'label'			=> esc_html__( 'Grid View', 'techmarket' ),
				'icon'			=> 'tm tm-grid-small',
				'enabled'		=> true,
				'active'		=> true,
				'template'		=> array( 'slug' => 'content', 'name' => 'product' ),
			),
			'grid-extended'		=> array(
				'label'			=> esc_html__( 'Grid Extended View', 'techmarket' ),
				'icon'			=> 'tm tm-grid',
				'enabled'		=> true,
				'active'		=> false,
				'template'		=> array( 'slug' => 'templates/contents/content', 'name' => 'product-grid-extended' ),
			),
			'list-view-large'	=> array(
				'label'			=> esc_html__( 'List View Large', 'techmarket' ),
				'icon'			=> 'tm tm-listing-large',
				'enabled'		=> true,
				'active'		=> false,
				'template'		=> array( 'slug' => 'templates/contents/content', 'name' => 'product-list-large' ),
			),
			'list-view'			=> array(
				'label'			=> esc_html__( 'List View', 'techmarket' ),
				'icon'			=> 'tm tm-listing',
				'enabled'		=> true,
				'active'		=> false,
				'template'		=> array( 'slug' => 'templates/contents/content', 'name' => 'product-list-view' ),
			),
			'list-view-small'	=> array(
				'label'			=> esc_html__( 'List View Small', 'techmarket' ),
				'icon'			=> 'tm tm-listing-small',
				'enabled'		=> true,
				'active'		=> false,
				'template'		=> array( 'slug' => 'templates/contents/content', 'name' => 'product-list-small' ),
			)
		) );

		return $shop_views;
	}
}

if ( ! function_exists( 'techmarket_wc_products_per_page' ) ) {
	/**
	 * Outputs a dropdown for user to select how many products to show per page
	 */
	function techmarket_wc_products_per_page() {
		
		global $wp_query;

		$action 			= '';
		$cat 				= '';
		$cat 				= $wp_query->get_queried_object();
		$method 			= apply_filters( 'techmarket_wc_ppp_method', 'post' );
		$return_to_first 	= apply_filters( 'techmarket_wc_ppp_return_to_first', false );
		$total    			= $wp_query->found_posts;
		$per_page 			= $wp_query->get( 'posts_per_page' );
		$_per_page 			= techmarket_set_loop_shop_columns() * 4;

		// Generate per page options
		$products_per_page_options = array();
		while( $_per_page < $total ) {
			$products_per_page_options[] = $_per_page;
			$_per_page = $_per_page * 2;
		}

		if ( empty( $products_per_page_options ) ) {
			return;
		}

		$products_per_page_options[] = -1;

		// Set action url if option behaviour is true
		// Paste QUERY string after for filter and orderby support
		$query_string = ! empty( $_SERVER['QUERY_STRING'] ) ? '?' . add_query_arg( array( 'ppp' => false ), $_SERVER['QUERY_STRING'] ) : null;

		if ( isset( $cat->term_id ) && isset( $cat->taxonomy ) && $return_to_first ) :
			$action = get_term_link( $cat->term_id, $cat->taxonomy ) . $query_string;
		elseif ( $return_to_first ) :
			$action = get_permalink( wc_get_page_id( 'shop' ) ) . $query_string;
		endif;

		// Only show on product categories
		if ( ! woocommerce_products_will_display() ) :
			return;
		endif;
		
		do_action( 'techmarket_wc_ppp_before_dropdown_form' );

		?><form method="POST" action="<?php echo esc_url( $action ); ?>" class="form-techmarket-wc-ppp"><?php

			 do_action( 'techmarket_wc_ppp_before_dropdown' );

			?><select name="ppp" onchange="this.form.submit()" class="techmarket-wc-wppp-select c-select"><?php

				foreach( $products_per_page_options as $key => $value ) :

					?><option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $per_page ); ?>><?php
						$ppp_text = apply_filters( 'techmarket_wc_ppp_text', esc_html__( 'Show %s', 'techmarket' ), $value );
						esc_html( printf( $ppp_text, $value == -1 ? esc_html__( 'All', 'techmarket' ) : $value ) ); // Set to 'All' when value is -1
					?></option><?php

				endforeach;

			?></select><?php

			// Keep query string vars intact
			foreach ( $_GET as $key => $val ) :

				if ( 'ppp' === $key || 'submit' === $key ) :
					continue;
				endif;
				if ( is_array( $val ) ) :
					foreach( $val as $inner_val ) :
						?><input type="hidden" name="<?php echo esc_attr( $key ); ?>[]" value="<?php echo esc_attr( $inner_val ); ?>" /><?php
					endforeach;
				else :
					?><input type="hidden" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $val ); ?>" /><?php
				endif;
			endforeach;

			do_action( 'techmarket_wc_ppp_after_dropdown' );

		?></form><?php

		do_action( 'techmarket_wc_ppp_after_dropdown_form' );
	}
}

if ( ! function_exists( 'techmarket_advanced_pagination' ) ) {
	/**
	 * Displays an advanced pagination
	 */
	function techmarket_advanced_pagination() {

		global $wp_query, $wp_rewrite;

		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		// Setting up default values based on the current URL.
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$url_parts    = explode( '?', $pagenum_link );

		// Get max pages and current page out of the current query, if available.
		$total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
		$current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

		// Append the format placeholder to the base URL.
		$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

		// URL base depends on permalink settings.
		$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		$base 		= esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
		$add_args 	= false;

		$output = '';

		if ( $current && 1 < $current ) :
			$link = str_replace( '%_%', 2 == $current ? '' : $format, $base );
			$link = str_replace( '%#%', $current - 1, $link );
			$prev_text = is_rtl() ? '<i class="tm tm-long-arrow-right"></i>' : '<i class="tm tm-long-arrow-left"></i>' ;
			$output .= '<a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $prev_text . '</a>';
		endif;

		$number_input = '<form method="post" class="form-adv-pagination"><input id="goto-page" size="2" min="1" max="' . esc_attr( $total ) . '" step="1" type="number" class="form-control" value="' . esc_attr( $current ) . '" /></form>';
		$output .= sprintf( esc_html__( '%s of %s', 'techmarket' ), $number_input, $total );

		if ( $current && ( $current < $total || -1 == $total ) ) :
			$link = str_replace( '%_%', $format, $base );
			$link = str_replace( '%#%', $current + 1, $link );
			$next_text = is_rtl() ? '<i class="tm tm-long-arrow-left"></i>' : '<i class="tm tm-long-arrow-right"></i>' ;
			$output .= '<a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $next_text . '</a>';
		endif;

		$link = str_replace( '%_%', $format, $base );
		?>
		<nav class="techmarket-advanced-pagination">
			<?php echo ( $output );
			ob_start(); ?>
			jQuery(document).ready(function($){
				$( '.form-adv-pagination' ).on( 'submit', function() {
					var link 		= '<?php echo esc_url( apply_filters( 'paginate_links', $link ) ); ?>',
						goto_page 	= $( '#goto-page' ).val(),
						new_link 	= link.replace( '%#%', goto_page ).replace(/&#038;/g, '&');

					window.location.href = new_link;
					return false;
				});
			});
			<?php
				$custom_script = ob_get_clean();
				wp_add_inline_script( 'techmarket-scripts', $custom_script );
			?>
		</nav>
		<?php
	}
}

if ( ! function_exists( 'techmarket_reset_woocommerce_loop' ) ) {
	/**
	 * Resets WooCommerce loop so that the subcategories and products can have different number of columns
	 */
	function techmarket_reset_woocommerce_loop() {
		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.3', '<' ) ) {
			global $woocommerce_loop;
			$woocommerce_loop[ 'columns' ] 	= '';
			$woocommerce_loop[ 'loop' ]		= '';
			$woocommerce_loop[ 'type' ]		= '';
		}
	}
}

if ( ! function_exists( 'techmarket_set_loop_shop_columns' ) ) {
	/**
	 * Sets Shop Loop Columns
	 */
	function techmarket_set_loop_shop_columns() {
		
		$columns = apply_filters( 'techmarket_shop_loop_products_columns', 5 );

		return apply_filters( 'techmarket_shop_loop_columns', $columns );
	}
}

if ( ! function_exists( 'techmarket_set_loop_shop_subcategories_columns' ) ) {
	function techmarket_set_loop_shop_subcategories_columns() {
		return apply_filters( 'techmarket_shop_loop_subcategories_columns', 5 );
	}
}

if ( ! function_exists( 'techmarket_set_pagination_args' ) ) {
	/** 
	 * Sets arguments for pagination
	 */
	function techmarket_set_pagination_args( $args ) {
		
		$args[ 'end_size' ] = 2;
		$args[ 'mid_size' ] = 2;

		return $args;
	}
}

if ( ! function_exists( 'techmarket_set_loop_shop_per_page' ) ) {
	/**
	 * Sets no of products per page
	 */
	function techmarket_set_loop_shop_per_page() {

		if ( isset( $_REQUEST['wppp_ppp'] ) ) :
			$per_page = intval( $_REQUEST['wppp_ppp'] );
			WC()->session->set( 'products_per_page', intval( $_REQUEST['wppp_ppp'] ) );
		elseif ( isset( $_REQUEST['ppp'] ) ) :
			$per_page = intval( $_REQUEST['ppp'] );
			WC()->session->set( 'products_per_page', intval( $_REQUEST['ppp'] ) );
		elseif ( WC()->session->__isset( 'products_per_page' ) ) :
			$per_page = intval( WC()->session->__get( 'products_per_page' ) );
		else :
			$per_page = techmarket_set_loop_shop_columns() * 4;
			$per_page = apply_filters( 'techmarket_loop_shop_per_page', $per_page );
		endif;
		
		return $per_page;
	}
}