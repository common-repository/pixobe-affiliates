<?php
namespace PixobeAffiliates\Helpers;

use PixobeAffiliates\Helpers\Plugin_Constants;
/**
 *
 * All Form Helpers used.
 *
 * @since 1.0.0
 * @package PixobeAffiliates\Helpers
 */


/**
 *  All Form Helpers used.
 *
 * @package PixobeAffiliates\Helpers
 */
class Form_Helpers {


	const TRANSIENT_AFF_KEY = 'PA_CONFIG';

	/**
	 *
	 * Santize request fields.
	 *
	 * @param string $param parameter to extract.
	 * @param string $def default value is null.
	 */
	public static function santize_input( string $param, $def = null ) {
		if ( isset( $_REQUEST[ $param ] ) ) {
			return sanitize_text_field( wp_unslash( $_REQUEST[ $param ] ) );
		}
		return $def;
	}

	/**
	 *
	 * Set Transient
	 *
	 * @param string $key key to set.
	 * @param string $config default value is null.
	 */
	public static function set_transient( string $key, $config = null ) {
		 $key = self::TRANSIENT_AFF_KEY . "${key}";
		 set_transient( $key, $config );
	}

	/**
	 *
	 * Get Transient
	 *
	 * @param string $key key to set.
	 */
	public static function get_transient( string $key ) {
		$key = self::TRANSIENT_AFF_KEY . "${key}";
		return get_transient( $key );
	}

	/**
	 *
	 * Delete Transient
	 *
	 * @param string $key key to set.
	 */
	public static function delete_transient( string $key ) {
		$key = self::TRANSIENT_AFF_KEY . "${key}";
		delete_transient( $key );
	}


	/**
	 *  Return view path for a style.
	 */
	public static function get_view_path( string $style ) {
		return Plugin_Constants::get_instance()->get_plugin_dir_path() . "views/components/$style/view.php";
	}

	/**
	 *  Return view path for a style.
	 */
	public static function get_admin_view_path( string $style ) {
		return Plugin_Constants::get_instance()->get_plugin_dir_path() . "views/components/$style/admin.php";
	}

}
