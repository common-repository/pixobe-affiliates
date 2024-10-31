<?php

namespace PixobeAffiliates\Includes;

use PixobeAffiliates\Includes\Pixobe_Affiliates_Database;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Pixobe_Affiliates
 * @subpackage Pixobe_Affiliates/includes
 * @author     Pixobe Softwares <email@pixobe.com>
 */
class Pixobe_Affiliates_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		try {
			Pixobe_Affiliates_Database::create();
		} catch ( \Exception $e ) {
			var_dump( $e );
			die();
		}
	}
}
