<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://github.com/RajatWisdm/
 * @since      1.0.0
 *
 * @package    Rajat_Cal
 * @subpackage Rajat_Cal/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Rajat_Cal
 * @subpackage Rajat_Cal/includes
 * @author     Rajat Ganguly <rajat.ganguly@wisdmlabs.com>
 */
class Rajat_Cal_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'rajat-cal',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
