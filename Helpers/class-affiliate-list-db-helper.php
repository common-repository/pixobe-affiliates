<?php
/**
 * Helper class to load data from custom database
 */

namespace PixobeAffiliates\Helpers;

/**
 * Db helper
 */
class Affiliate_List_DB_Helper {

	/**
	 * Return the table name.
	 */
	private static function get_table_name() {
		global $wpdb;
		return $wpdb->prefix . 'pixobe_affiliates';
	}

	/**
	 * Create or update a record.
	 */
	public static function create_update( $data, $id ) {
		global $wpdb;
		$table_name = self::get_table_name();

		if ( empty( $id ) ) {
			$wpdb->insert( $table_name, $data ); // db call ok; no-cache ok.
			$id = $wpdb->insert_id;
		} else {
			$wpdb->update( $table_name, $data, array( 'id' => $id ) ); // db call ok; no-cache ok.
		}
		return self::handle_response( $wpdb, $id );
	}

	/**
	 *  Function doc
	 */
	public static function get_record( $id ) {
		global $wpdb;
		$table_name = self::get_table_name();
		return $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * FROM ${table_name} WHERE id=%d",
				array( $id )
			)
		);
	}


	/**
	 *
	 */
	public static function get_records( $args ) {
		global $wpdb;
		$table_name = self::get_table_name();
		if ( $args['filter_by'] ) {
			return $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM  ${table_name}  where category=%s  order by %s %s limit %d offset %d",
					array( $args['filter_by'], $args['orderby'], $args['order'], $args['limit'], $args['offset'] )
				),
				ARRAY_A
			);
		} else {
			return $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM ${table_name}   order by %s %s limit %d offset %d",
					array( $args['orderby'], $args['order'], $args['limit'], $args['offset'] )
				),
				ARRAY_A
			);
		}
	}

	/**
	 *  Function doc
	 */
	public static function get_count( $args ) {
		global $wpdb;
		$table_name = self::get_table_name();

		if ( $args['filter_by'] ) {
			return $wpdb->get_var(
				$wpdb->prepare(
					"SELECT count(1) as count FROM  ${table_name} where category=%s",
					array( $args['filter_by'] )
				)
			);
		} else {
			return $wpdb->get_var( "SELECT count(1) as count FROM ${table_name}" );
		}
	}

	/**
	 *
	 */
	public static function get_categories() {
		global $wpdb;
		$table_name = self::get_table_name();
		return $wpdb->get_col( "SELECT distinct( category ) FROM ${table_name} order by category asc" );
	}


	/**
	 *
	 */
	public static function delete_record( $id ) {
		global $wpdb;
		$table_name     = self::get_table_name();
		$record_deleted = $wpdb->delete( $table_name, array( 'id' => $id ), array( '%d' ) );
		return self::handle_response( $wpdb, $record_deleted );
	}

	/**
	 *
	 */
	public static function delete_records( $links ) {
		if ( ! empty( $links ) ) {
			foreach ( $links as $link ) {
				self::delete_record( $link );
			}
		}
	}

	/**
	 *  @throws \Exception
	 */
	private static function handle_response( $wpdb, $result ) {
		if ( $wpdb->last_error ) {
			if ( strpos( $wpdb->last_error, 'Duplicate' ) !== false ) {
				throw new \Exception( 'DUPLICATE_NAME' );
			}
			throw new \Exception( $wpdb->last_error );
		}
		return $result;
	}
}
