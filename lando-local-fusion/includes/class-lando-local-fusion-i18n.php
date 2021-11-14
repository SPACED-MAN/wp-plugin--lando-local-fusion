<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/SPACED-MAN/wp-plugin--lando-local-fusion
 * @since      1.0.0
 *
 * @package    lando_local_fusion
 * @subpackage lando_local_fusion/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    lando_local_fusion
 * @subpackage lando_local_fusion/includes
 * @author     Tyler Shingleton <i@spaced-man.com>
 */
class Lando_Local_Fusion_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'lando-local-fusion',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
