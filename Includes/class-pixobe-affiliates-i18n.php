<?php

namespace PixobeAffiliates\Includes;

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/pixobe/pixobe-affiliates
 * @since      1.0.0
 *
 * @package    Pixobe_Affiliates
 * @subpackage Pixobe_Affiliates/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Pixobe_Affiliates
 * @subpackage Pixobe_Affiliates/includes
 * @author     Pixobe Softwares <email@pixobe.com>
 */
class Pixobe_Affiliates_I18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'pixobe-affiliates',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
