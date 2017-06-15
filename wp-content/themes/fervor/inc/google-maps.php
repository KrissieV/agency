<?php
/**
 * Google Maps functions for ACF.
 *
 *
 * @package fervor
 */

function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyBMByNVBSQul61a69kdhQd6sovGVEsm2dw');
}

add_action('acf/init', 'my_acf_init');