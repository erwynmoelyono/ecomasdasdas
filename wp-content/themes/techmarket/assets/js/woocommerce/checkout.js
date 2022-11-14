jQuery( window ).load( function() {
	var windowHeight	= jQuery( window ).height();
	var paymentHeight	= jQuery( '#order_review > .order-review-wrapper' ).height();

	/**
	 * Make the order review element stick to the top of the browser window.
	 */
	function stickyPayment() {
		if ( ! jQuery( '#order_review_heading' ).length || ! jQuery( 'form.woocommerce-checkout' ).length || ! jQuery( '#customer_details' ).length ) {
			return;
		}

		var tallestPaymentBox = -1;
		jQuery( '.payment_box' ).each( function() {
			tallestPaymentBox = tallestPaymentBox > jQuery( this ).outerHeight() ? tallestPaymentBox : jQuery( this ).outerHeight();
		});

		var headerStickyheight = 0;
		if ( jQuery( '.techmarket-sticky-wrap' ).length !== 0 ) {
			jQuery( 'body' ).addClass( 'techmarket-has-sticky-header' );
			headerStickyheight = jQuery( '.techmarket-sticky-wrap' ).height();
		}

		var topDistance           = jQuery( document ).scrollTop();
		var paymentWidth          = jQuery( '#order_review' ).outerWidth();
		var	checkoutWidth         = jQuery( 'form.woocommerce-checkout' ).outerWidth();
		var	addressWidth          = jQuery( '#customer_details' ).outerWidth();
		var	gutter                = checkoutWidth - addressWidth - paymentWidth;
		var	paymentOffset         = addressWidth + gutter;
		var checkoutPosition      = jQuery( '#customer_details' ).offset();
		var currentPaymentBox     = jQuery( '.wc_payment_method input:checked' ).siblings( '.payment_box' ).outerHeight();
		var expandedHeight        = paymentHeight + ( tallestPaymentBox - currentPaymentBox + headerStickyheight + 30 );
		var customerDetailsHeight = jQuery( '#customer_details' ).outerHeight();

		// If we're in desktop orientation and the order review column is taller than the customer details column and smaller than the window height
		if ( ( jQuery( window ).width() > 768 ) && ( customerDetailsHeight > expandedHeight ) && ( windowHeight > expandedHeight ) ) {

				if ( topDistance > checkoutPosition.top ) {
					jQuery( '#order_review' ).addClass( 'payment-fixed' );
					if ( jQuery( '#order_review' ).css( 'direction' ) === 'rtl' ) {
						jQuery( '#order_review' ).css({
							'margin-right':		paymentOffset,
							'width':			paymentWidth
						});
					} else {
						jQuery( '#order_review' ).css({
							'margin-left':		paymentOffset,
							'width':			paymentWidth
						});
					}
				} else {
					jQuery( '#order_review' ).removeAttr( 'style' ).removeClass( 'payment-fixed' );
				}
		}
	}

	// Do sticky on scroll
	jQuery( window ).scroll( function() {
		stickyPayment();
	});

	// Do sticky on window resize
	jQuery( window ).resize( function() {
		stickyPayment();
	});
});
