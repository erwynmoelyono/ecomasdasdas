jQuery( function ( $ ) {

	// Only show the "remove image" button when needed
	if ( ! $('#tm_add_br_product_brand_thumbnail_id').val() )
		$('.tm_add_br_remove_image_button').hide();

	// Uploading files
	var file_frame;

	$(document).on( 'click', '.tm_add_br_upload_image_button', function( event ){

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}

		// Create the media frame.
		file_frame = wp.media.frames.downloadable_file = wp.media({
			title: techmarket_admin_brand_options.media_title,
			button: {
				text: techmarket_admin_brand_options.media_btn_text,
			},
			multiple: false
		});

		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {
			attachment = file_frame.state().get('selection').first().toJSON();

			$('#tm_add_br_product_brand_thumbnail_id').val( attachment.id );
			$('#tm_add_br_product_brand_thumbnail img').attr('src', attachment.url );
			$('.tm_add_br_remove_image_button').show();
		});

		// Finally, open the modal.
		file_frame.open();
	});

	$(document).on( 'click', '.tm_add_br_remove_image_button', function( event ){
		$('#tm_add_br_product_brand_thumbnail img').attr('src', techmarket_admin_brand_options.placeholder_img_src);
		$('#tm_add_br_product_brand_thumbnail_id').val('');
		$('.tm_add_br_remove_image_button').hide();
		return false;
	});

	$(document).on( 'click', '.tm_edit_br_upload_image_button', function( event ){

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}

		// Create the media frame.
		file_frame = wp.media.frames.downloadable_file = wp.media({
			title: techmarket_admin_brand_options.media_title,
			button: {
				text: techmarket_admin_brand_options.media_btn_text,
			},
			multiple: false
		});

		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {
			attachment = file_frame.state().get('selection').first().toJSON();

			$('#tm_edit_br_product_brand_thumbnail_id').val( attachment.id );
			$('#tm_edit_br_product_brand_thumbnail img').attr('src', attachment.url );
			$('.tm_edit_br_remove_image_button').show();
		});

		// Finally, open the modal.
		file_frame.open();
	});

	$(document).on( 'click', '.tm_edit_br_remove_image_button', function( event ){
		$('#tm_edit_br_product_brand_thumbnail img').attr('src', techmarket_admin_brand_options.placeholder_img_src);
		$('#tm_edit_br_product_brand_thumbnail_id').val('');
		$('.tm_edit_br_remove_image_button').hide();
		return false;
	});
});