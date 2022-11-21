(function() {
	jQuery(document).ready(function() {
		// Select all/none
		jQuery( '.ivole-new-settings' ).on( 'click', '.select_all', function() {
			jQuery( this ).closest( 'td' ).find( 'select option' ).prop( 'selected', true );
			jQuery( this ).closest( 'td' ).find( 'select' ).trigger( 'change' );
			return false;
		});

		jQuery( '.ivole-new-settings' ).on( 'click', '.select_none', function() {
			jQuery( this ).closest( 'td' ).find( 'select option' ).prop( 'selected', false );
			jQuery( this ).closest( 'td' ).find( 'select' ).trigger( 'change' );
			return false;
		});

		jQuery( '#cr_check_duplicate_site_url' ).on( 'click', function() {
			let button = jQuery( this );
			button.next( 'span' ).addClass( 'is-active' );
			button.prop( 'disabled', true );
			jQuery.ajax(
				{
				url: ajaxurl,
				data: {
					action: 'cr_check_duplicate_site_url',
					security: button.attr( 'data-nonce' )
				}
				}
			).done( function( response ) {
				button.next( 'span' ).removeClass( 'is-active' );
				button.prop( 'disabled', false );
				button.prev( 'span' ).text( response.result );
				if( response.is_duplicate === false ) {
					button.remove();
				}
			} ).fail( function( response ) {
					button.next( 'span' ).removeClass( 'is-active' );
					button.prop( 'disabled', false );
			} );
		} );

		jQuery(".cr-trustbadgea").each(function() {
			let badge = jQuery(this).find(".cr-badge").eq(0);
			let scale = jQuery(this).width() / badge.outerWidth();
			if( 1 > scale ) {
				badge.css("transform", "scale(" + scale + ")");
			}
			badge.css("visibility", "visible");
		});

		jQuery('.cr-test-email-button').on( "click", function() {
			var is_coupon = '';
			var q_language = -1;

			if (jQuery(this).hasClass("coupon_mail")) {
				is_coupon = '_coupon';
			}

			if (typeof qTranslateConfig !== 'undefined' && typeof qTranslateConfig.qtx !== 'undefined') {
				q_language = qTranslateConfig.qtx.getActiveLanguage();
			}

			if (is_coupon == "") {
				var data = {
					'action': 'ivole_send_test_email',
					'email': jQuery(this).parent().find('input[type=text]').val(),
					'type': jQuery(this).parent().find('input[type=text]').attr('class'),
					'q_language': q_language,
					'nonce': jQuery(this).data('nonce')
				};
			} else {
				var data = {
					'action': 'ivole_send_test_email' + is_coupon,
					'email': jQuery(this).parent().find('input[type=text]').val(),
					'media_count': jQuery('#cr_email_test_media_count').val(),
					'q_language': q_language,
					'nonce': jQuery(this).data('nonce')
				};
			}

			jQuery('#ivole_test_email_status').text('Sending...');
			jQuery('#ivole_test_email_status').css('visibility', 'visible');
			jQuery('.cr-test-email-button').prop('disabled', true);
			jQuery.post(ajaxurl, data, function(response) {
				jQuery('#ivole_test_email_status').css('visibility', 'visible');
				jQuery('.cr-test-email-button').prop('disabled', false);

				if ( response.code === 0 ) {
					jQuery('#ivole_test_email_status').text('Success: email has been successfully sent!');
				} else if ( response.code === 1 ) {
					jQuery('#ivole_test_email_status').text('Error: email could not be sent, please check if your settings are correct and saved.');
				} else if ( response.code === 2 ) {
					jQuery('#ivole_test_email_status').text('Error: cannot connect to the email server (' + response.message + ').');
				} else if ( response.code === 13 ) {
					jQuery('#ivole_test_email_status').text('Error: "Email Subject" is empty. Please enter a string for the subject line of emails.');
				} else if ( response.code === 97 ) {
					jQuery('#ivole_test_email_status').text('Error: "Shop Name" is empty. Please enter name of your shop in the corresponding field.');
				} else if ( response.code === 99 ) {
					jQuery('#ivole_test_email_status').text('Error: please enter a valid email address!');
				} else if ( response.code === 100 ) {
					jQuery('#ivole_test_email_status').text('Error: cURL library is missing on the server.');
				} else {
					jQuery('#ivole_test_email_status').text(response.message);
				}
			}, 'json' );
		} );

		jQuery('.cr-twocols-cont .cr-twocols-chkbox').on( "click", function() {
			const container = jQuery( this ).parents( ".cr-twocols-cont" );
			const columns = container.find( ".cr-twocols-cols" );
			columns.each( function( index ) {
				if( jQuery( this ).hasClass( "cr-twocols-sel" ) ) {
					jQuery( this ).removeClass( "cr-twocols-sel" );
				} else {
					jQuery( this ).addClass( "cr-twocols-sel" );
					if( jQuery( this ).hasClass( "cr-twocols-left" ) ) {
						container.find( "input" ).val( "no" );
					}
					if( jQuery( this ).hasClass( "cr-twocols-right" ) ) {
						container.find( "input" ).val( "yes" );
					}
				}
			} );
		} );

		jQuery('.cr-settings-download-button').on( "click", function() {
			jQuery(this).addClass( "cr-settings-button-spinner" );

			const data = {
				'action': 'cr_settings_download_addon'
			};
			jQuery.post(
				{
					url: ajaxurl,
					data: data,
					context: this,
					success: function(response) {
						jQuery(this).removeClass( "cr-settings-button-spinner" );
						if( response && response["url"] ) {
							window.open( response["url"], "_blank" );
						}
					}
				}
			);

		} );

		jQuery('.cr-features-bnr-hide').on( "click", function( e ) {
			e.preventDefault();
			jQuery(this).closest( '.cr-features-banner' ).fadeTo( 500, 0.6 );
			const data = {
				'action': 'cr_settings_hide_banner',
				'banner': jQuery(this).data( 'banner' )
			};
			jQuery.post(
				{
					url: ajaxurl,
					data: data,
					context: this,
					success: function( response ) {
						jQuery(this).closest( '.cr-features-banner' ).hide();
					}
				}
			);

		} );

		if ( 0 < jQuery('#ivole_license_status').length ) {
			let data = {
				'action': 'ivole_check_license_ajax'
			};

			jQuery('#ivole_license_status').val( cr_settings_object.checking );

			jQuery.post( ajaxurl, data, function(response) {
				jQuery('#ivole_license_status').val( response.message );
				jQuery('.cr-settings-download-button').removeClass( 'cr-settings-button-spinner' );
				if( 1 !== response.code ) {
					jQuery('.cr-settings-download-button').addClass( 'disabled' );
				}
			} );
		}

	} );
} () );
