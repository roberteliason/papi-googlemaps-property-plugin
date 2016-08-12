( function($, PAPI_GM_Property) {

    /**
     * Initialize all Google Maps on page
     */
    PAPI_GM_Property.initializeGoogleMaps = function () {

        if ( 'undefined' == typeof( google ) || 'undefined' == typeof( google.maps ) ) {
            return;
        }

        var $mapContainers = $( '.map-container' );

        $.each( $mapContainers, function () {
            PAPI_GM_Property.initializeSingleGoogleMap( this );
        });
    };



    /**
     * Initializes a single Google Map
     *
     * @param mapContainer
     */
    PAPI_GM_Property.initializeSingleGoogleMap = function ( mapContainer ) {

        var lat = Number( $( mapContainer ).attr( 'data-lat' ) );
        var lng = Number( $( mapContainer ).attr( 'data-lng' ) );
        var position = {
            lat: lat,
            lng: lng
        };

        var map = new google.maps.Map( mapContainer, {
            zoom: 15,
            scrollwheel: false,
            center: position
        } );

        google.maps.event.trigger( map, 'resize' );

        var marker = new google.maps.Marker( {
            position: position,
            map: map
        } );

    };


    /**
     * Add Google Maps support
     */
    $( document ).ready( function () {
        PAPI_GM_Property.initializeGoogleMaps();
    });

}(jQuery, PAPI_GM_Property ));
