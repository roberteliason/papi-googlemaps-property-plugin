<?php

namespace PAPI_Google_Maps_Property;

final class API {

	/**
	 * @var null
	 */
	protected static $instance = null;

	/**
	 * @var string
	 */
	protected $taxonomy_name = 'hsb-object-option-types';


	/**
	 * API constructor.
	 */
	private function __construct() {

	}


	/**
	 * Creates or returns an instance of this class.
	 *
	 * @return API A single instance of this class.
	 */
	public static function get() {
		if ( self::$instance === null ) {
			self::$instance = new self;
		}

		return self::$instance;
	}


	/**
	 * Get the API-key from setting or alert the admin to set it.
	 *
	 * @return string
	 */
	public static function API_Key() {
		$plugin_api_key = ! empty( papi_get_option( 'google_maps_api_key' ) ) ? papi_get_option( 'google_maps_api_key' ) : '';

		if(empty($plugin_api_key)) {
			//Raise error;
		}

		return $plugin_api_key;
	}
}