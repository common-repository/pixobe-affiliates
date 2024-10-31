<?php

namespace PixobeAffiliates\Models;

/**
 *
 *  Admin Home Models
 */


use PixobeAffiliates\Helpers\{ Default_Config,Affiliate_List_DB_Helper,
					Form_Helpers, Admin_Notices ,Plugin_Constants};


class Admin_Home_Model {

	use Admin_Notices;

	/**
	 * ID of the record.
	 */
	 private $id;

	/**
	 * Action
	 *
	 * @var notification
	 */
	 private $action;


	 /**
	  * Plugin constants
	  */
	private Plugin_Constants $plugin_constant;

	 /**
	  * Constructor
	  */
	public function __construct() {
		$this->plugin_constant = Plugin_Constants::get_instance();
		$this->id = Form_Helpers::santize_input( 'id' );
		$this->action = Form_Helpers::santize_input( 'action', 'init' );
	}

	/**
	 *  Submit handler.
	 */
	public function create_config() : \stdClass {
		$data  = $this->get_sanitized_config_array();
		$config = $this->process_action( $data, $this->action );
		return (object) $config;
	}


	/**
	 * Returns page for a particular template
	 */
	public function get_style_admin_page( $config ) {
		$template_path = Form_Helpers::get_admin_view_path( $config->style );
		if ( false === file_exists( $template_path ) ) {
			add_action(
				'pa_notifications',
				array( $this, 'template_not_found_message' )
			);
			$config->style = Default_Config::get_default_style();
			$template_path = Form_Helpers::get_admin_view_path( $config->style );
		}
		return $template_path;
	}

	/**
	 * Handle various actions.
	 */
	private function process_action( $data, $current_action ) {

		$default_config = Default_Config::get_default_config( $data['style'] );

		switch ( $current_action ) {
			case 'edit':
				$config = $this->get_config( $this->id );
				break;
			case 'create-update':
				try {

					$this->id = Affiliate_List_DB_Helper::create_update( $data, $this->id );

					$config = $this->get_config( $this->id );
					// update transient for faster cache.
					Form_Helpers::set_transient( $this->id, $config );

					add_action(
						'pa_notifications',
						function() use ( $data ) {
							empty( $data['id'] ) ? $this->show_success_notification() : $this->show_success_update_notification();
						}
					);

				} catch ( \Exception $e ) {
					$config = $this->get_config( $this->id );
					if ( 'DUPLICATE_NAME' === $e->getMessage() ) {
						add_action( 'pa_notifications', array( $this, 'show_duplicate_error_message' ) );
					} else {
						add_action( 'pa_notifications', array( $this, 'show_general_error_message' ) );
					}
				}
				break;

			case 'style-change':
				// If id is present copy from data.
				$config = $default_config;
				if ( $this->id ) {
					$current_config = json_decode( $data['config'], true );
					$config = $this->shortcode_atts( $default_config, $current_config );
				}
				break;

			default:
				$config = $default_config;
		}
		$config['id'] = $this->id;
		return $config;
	}


	/**
	 *  Sanitize and return config from request
	 */
	private function get_sanitized_config_array() {
		$data             = array();
		$data['id']     = Form_Helpers::santize_input( 'id' );
		$data['name']     = Form_Helpers::santize_input( 'name' );
		$data['style']    = Form_Helpers::santize_input( 'style' );
		$data['category'] = Form_Helpers::santize_input( 'category' );
		$data['config']   = json_encode( filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING ) );
		return $data;
	}

	/**
	 * Copy from one array to other.
	 */
	private function shortcode_atts( $pairs, $atts ) {
		$atts = (array) $atts;
		$out  = array();
		foreach ( $pairs as $name => $default ) {
			if ( array_key_exists( $name, $atts ) ) {
				$value = $atts[ $name ];
				$out[ $name ] = \is_array( $value ) ? $value[0] : $value;
			} else {
				$out[ $name ] = $default;
			}
		}
		return $out;
	}

	/**
	 *  get config data form db
	 */
	private function get_config( $id ) {
		$record = Affiliate_List_DB_Helper::get_record( $id );
		return json_decode( $record->config, true );
	}

	/**
	 * Current id in context.
	 */
	public function get_id() {
		return $this->id;
	}

}
