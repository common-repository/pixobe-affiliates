<?php

namespace PixobeAffiliates\Includes;

use PixobeAffiliates\Helpers\{Plugin_Constants ,Affiliate_List_DB_Helper, Form_Helpers,Assets_Helper};

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Pixobe_Affiliates
 * @subpackage Pixobe_Affiliates/public
 * @author     Pixobe Softwares <email@pixobe.com>
 */
class Pixobe_Affiliates_Public {


	/**
	 * Constants
	 */
	private $constants;

	/**
	 * ENV HElper.
	 */
	private Assets_Helper $assets_helper;

	/**
	 * Version
	 */
	private $version;

	/**
	 *
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( Plugin_Constants $constants ) {
		$this->constants = $constants;
		$this->version   = $constants->get_version();
		$this->assets_helper = Assets_Helper::get_instance();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pixobe_Affiliates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pixobe_Affiliates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$public_styles = $this->assets_helper->get_public_styles();
		foreach ( $public_styles as $key => $value ) {
			wp_enqueue_style(
				$key,
				$value,
				array(),
				$this->version,
				'all'
			);
		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pixobe_Affiliates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pixobe_Affiliates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$public_scripts = $this->assets_helper->get_public_scripts();
		foreach ( $public_scripts as $key => $value ) {
			wp_enqueue_script(
				$key,
				$value,
				array( 'jquery' ),
				$this->version,
				false
			);
		}
	}

	/**
	 * add script attributes
	 */
	public function add_script_attributes( $tag, $handle, $src ) {
		// if not your script, do nothing and return original $tag.
		if ( 'pixobe-affiliates-esm' == $handle ) {
			return wp_get_script_tag(
				array(
					'src'   => $src,
					'type'  => 'module',
					'defer' => true,
				)
			);
		}
		if ( 'pixobe-affiliates' == $handle ) {
			return wp_get_script_tag(
				array(
					'src'      => $src,
					'nomodule' => true,
					'defer'    => true,
				)
			);
		}
		return $tag;
	}

	/**
	 * add short code
	 */
	public function add_shortcode( $atts ) {
		$id = $atts['id'];
		if ( isset( $id ) ) {

			$config = Form_Helpers::get_transient( $id );

			if ( false === $config ) {
				$db_helper = new Affiliate_List_DB_Helper();
				$response  = $db_helper->get_record( $id );
				if ( $response ) {
					$config = json_decode( $response->config, true );
					// update id.
					$config['id'] = $response->id;
				}
			}

			if ( $config ) {
				$config = (array) $config;
				// update the atts overriden in specific shortcode.
				$config = (object) shortcode_atts( $config, $atts, 'pixobe_affiliates' );
				try {
					ob_start();
					$view = Form_Helpers::get_view_path( $config->style );
					if ( file_exists( $view ) ) {
						include $view;
					}
					return ob_get_clean();
				} catch ( \Exception $e ) {
					error_log( $e->getMessage() );
				}
			}
		}
		return null;
	}
}
