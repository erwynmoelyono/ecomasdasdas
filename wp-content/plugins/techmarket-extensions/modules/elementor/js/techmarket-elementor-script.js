jQuery( function( $ ) {
    if ( window.elementorFrontend && elementorFrontend.hooks !== 'undefined' && elementorFrontend.hooks.addAction !== 'undefined' ) {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {
            var $target = $scope.find('[data-ride="tm-slick-carousel"]');
            if( $target.length ) {
                $target.each( function() {
                    var $slick_target = false;

                    if ( $(this).data( 'slick' ) !== 'undefined' && $(this).find( $(this).data( 'wrap' ) ).length > 0 ) {
                        $slick_target = $(this).find( $(this).data( 'wrap' ) );
                        $slick_target.data( 'slick', $(this).data( 'slick' ) );
                    } else if ( $(this).data( 'slick' ) !== 'undefined' && $(this).is( $(this).data( 'wrap' ) ) ) {
                        $slick_target = $(this);
                    }

                    if( $slick_target ) {
                        $slick_target.not('.slick-initialized').slick();
                    }
                });
            }
        } );
    }
} );