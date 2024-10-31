<?php

namespace PixobeAffiliates\Includes;

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
class Pixobe_Affiliates_Database {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function create() {
		self::create_affiliate_table();
	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function drop() {
		global $wpdb;
		$table_name      = $wpdb->prefix . 'pixobe_affiliates';
		$wpdb->query( "DROP TABLE IF EXISTS  ${table_name}" );
	}


	/**
	 * Create an affiliate table
	 */
	private static function create_affiliate_table() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$table_name      = $wpdb->prefix . 'pixobe_affiliates';

		$sql = "CREATE TABLE $table_name (
		id mediumint(9) AUTO_INCREMENT PRIMARY KEY,
		name  VARCHAR(100) NOT NULL,
        style VARCHAR(100) NOT NULL,
        theme VARCHAR(100) ,
        config json NOT NULL,
        usedin mediumint(9) NOT NULL DEFAULT 0,
        clicks mediumint(9) NOT NULL DEFAULT 0,
        status VARCHAR(20) DEFAULT 'INITIAL',
        category VARCHAR(50) ,
        created datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        modified datetime,
        UNIQUE KEY AffiliateName (name)

	) $charset_collate;";
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		maybe_create_table( $table_name, $sql );
		// $wpdb->query("ALTER TABLE $table_name DROP COLUMN current_status");
	}
}
