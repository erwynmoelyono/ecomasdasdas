(function($) {
	'use strict';

	$(document).ready( function() {
		
		$.each( $('.widget-features-block-input-containers').children(), function(){
			if($(this).find('input').val() != ''){
				$(this).show();
			}
		});
		
		$('.widget-features-block-container').off('click', '.add-new-block');
		$('.widget-features-block-container').on('click', '.add-new-block', function(e) {
			var element = $(this).parents( '.widget-features-block-container' );
			var max_entries = $(element).data( 'max_entries' );
			var rows = 0;
			$.each( $(element).find('.widget-features-block-input-containers').children(), function(){
				if($(this).find('input').val() == ''){
					$(this).find('.entry-title').addClass('active');
					$(this).find('.entry-desc').slideDown();
					$(this).find('input').first().val('0');
					$(this).show();
					return false;
				} else {
					rows++;
					$(this).show();
					$(this).find('.entry-title').removeClass('active');
					$(this).find('.entry-desc').slideUp();
				}
			});
			if( rows === parseInt( max_entries ) ) {
				$(element).find('.message').show();
			}
		});
		
		$('.widget-features-block-container').on('click', '.delete-block', function(e) {
			var element = $(this).parents( '.widget-features-block-container' );
			var count = 1;
			var current = $(this).closest('.features-input-block').attr('id');
			$.each($("#"+current+" .entry-desc").children(), function(){
				$(this).val('');
			});
			$.each($("#"+current+" .entry-desc p").children(), function(){
				$(this).val('');
			});
			$('#'+current+" .entry-title").removeClass('active');
			$('#'+current+" .entry-desc").hide();
			$('#'+current).remove();
			$.each( $(element).find('.widget-features-block-input-containers'), function(){
				if($(this).find('input').val() != ''){
					$(this).find('input').first().val(count);
				}
				count++;
			});
		});
		
		$('.features-input-block').off('click', '.entry-title');
		$('.features-input-block').on('click', '.entry-title', function(e) {
			var element = $(this).parents( '.widget-features-block-container' );
			if($(this).hasClass("active")){
				$(this).removeClass("active");
				$(this).next(".entry-desc").slideUp();
			} else {
				$(element).find('.widget-features-block-input-containers .entry-title').removeClass("active");
				$(element).find('.widget-features-block-input-containers .entry-desc').slideUp();
				$(this).addClass("active");
				$(this).next(".entry-desc").slideDown();
			}
		});
	});

})(jQuery);