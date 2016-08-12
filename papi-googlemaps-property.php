<?php
/**
 * Plugin Name: PAPI Google Maps Property
 * Version: 0.1-alpha
 * Description: Provides a Google Maps Property for PAPI
 * Author: Robert Eliason
 * Author URI: https://github.com/roberteliason
 * Plugin URI: PLUGIN SITE HERE
 * Text Domain: papi-gm-property
 * Domain Path: /languages
 * @package PAPI Google Maps Property
 */

define( 'PAPI_GM_PROPERTY_BASEDIR', plugin_dir_path( __FILE__ ) );
define( 'PAPI_GM_PROPERTY_BASEURL', plugin_dir_url( __FILE__ ) );

/** Register the plugin autoloader. */
spl_autoload_register( function ( $classname ) {
    $classname = explode( '\\', $classname );

    $classfile = sprintf( '%sincludes/class-%s.php',
        plugin_dir_path( __FILE__ ),
        str_replace( '_', '-', strtolower( end( $classname ) ) )
    );

    if ( file_exists( $classfile ) ) {
        include_once( $classfile );
    }
} );


/** Load t10ns. */
load_plugin_textdomain( 'papi-gm-property', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


/** Register with PAPI */
add_filter( 'papi/settings/directories', function ( $directories ) {
    $directories[] = PAPI_GM_PROPERTY_BASEDIR . 'papi/page-types/';

	return $directories;
} );

add_action( 'papi/loaded', function () {
	require_once( PAPI_GM_PROPERTY_BASEDIR . 'papi/property/papi-property-googlemap.php' );
} );

add_action( 'wp_enqueue_scripts', function() {


	wp_enqueue_script( 'google_maps', "https://maps.googleapis.com/maps/api/js?key=" . $api_key . "&signed_in=false", 'jquery', false, true );
	wp_enqueue_script( 'papi_property_googlemaps_frontend', PAPI_GM_PROPERTY_BASEDIR . 'resources/js/papi-property-googlemap-frontend.js', ['jquery', 'google'] );
} );