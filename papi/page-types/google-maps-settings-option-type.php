<?php

class Google_Maps_Settings_Option_Type extends Papi_Option_Type {

	/**
	 * The type meta options.
	 *
	 * @return array
	 */
	public function meta() {
		return [
			'menu' => 'options-general.php',
			'name' => __( 'Google Maps', 'papi_gm_property' ),
		];
	}

	/**
	 * Register reusable section meta box.
	 */
	public function register() {
		$this->box( __( 'API Key', 'papi_gm_property' ), [ $this, 'register_api_key' ] );
	}

	/**
	 * @return array
	 *
	 * @todo Why you no show?
	 */
	public function register_api_key() {
		return [
            papi_property( [
                'title'    => __( 'API Key', 'papi_gm_property' ),
                'type'     => 'string',
                'slug'     => 'google_maps_api_key'
			] )
		];
	}

}
