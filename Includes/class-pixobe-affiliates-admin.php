<?php

namespace PixobeAffiliates\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use PixobeAffiliates\Helpers\{Plugin_Constants,Assets_Helper};

class Pixobe_Affiliates_Admin {

	/**
	 * TODO.
	 */
	private Plugin_Constants $constants;

	/**
	 * ENV HElper.
	 */
	private Assets_Helper $assets_helper;

	/**
	 * TODO.
	 */
	private $plugin_name;

	/**
	 * TODO.
	 */
	private $plugin_slug;

	/**
	 * TODO.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( Plugin_Constants $constants ) {
		$this->constants   = $constants;
		$this->plugin_name = $constants->get_plugin_name();
		$this->plugin_slug = $constants->get_plugin_slug();
		$this->version     = $constants->get_version();
		$this->_menu_icon  = $constants->get_menu_icon();
		$this->assets_helper = Assets_Helper::get_instance();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles( $screen ) {
		if ( $this->is_plugin_page( $screen ) ) {

			$admin_styles = $this->assets_helper->get_admin_styles();
			foreach ( $admin_styles as $key => $value ) {
				wp_enqueue_style(
					$key,
					$value,
					array(),
					$this->version,
					'all'
				);
			}
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( $screen ) {
		if ( $this->is_plugin_page( $screen ) ) {
			$admin_scripts = $this->assets_helper->get_admin_scripts();
			foreach ( $admin_scripts as $key => $value ) {
				wp_enqueue_script(
					$key,
					$value,
					array( 'jquery' ),
					$this->version,
					false
				);
			}
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function add_admin_menu() {
		add_menu_page(
			$this->plugin_name,
			$this->plugin_name,
			'manage_options',
			$this->plugin_slug,
			function () {
				include_once $this->constants->get_plugin_dir_path() . 'views/admin/home.php';
			},
			$this->constants->get_menu_icon(),
			65
		);

		add_submenu_page(
			$this->plugin_slug,
			__( 'New', 'pixobe-affiliates' ),
			__( 'New', 'pixobe-affiliates' ),
			'manage_options',
			$this->plugin_slug,
			function () {
				include_once $this->constants->get_plugin_dir_path() . 'views/admin/home.php';
			},
		);

		add_submenu_page(
			$this->plugin_slug,
			__( 'Links', 'pixobe-affiliates' ),
			__( 'Links', 'pixobe-affiliates' ),
			'manage_options',
			$this->plugin_slug . '-links',
			function () {
				include_once $this->constants->get_plugin_dir_path() . 'views/admin/list-view.php';
			},
		);

		add_submenu_page(
			$this->plugin_slug,
			__( 'Features', 'pixobe-affiliates' ),
			__( 'Features', 'pixobe-affiliates' ),
			'manage_options',
			$this->plugin_slug . '-features',
			function () {
				include_once $this->constants->get_plugin_dir_path() . 'views/admin/features.php';
			},
		);
	}

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function add_script_attributes( $tag, $handle, $src ) {
		// if not your script, do nothing and return original $tag.
		if ( $this->plugin_slug . '-components.esm' === $handle ) {
			return wp_get_script_tag(
				array(
					'src'   => $src,
					'type'  => 'module',
					'defer' => true,
				)
			);
		}
		if ( 'pixobe-affiliates' === $handle ) {
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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	private function is_plugin_page( $screen ): bool {
		return strpos( $screen, $this->plugin_slug ) >= 0;
	}
}
