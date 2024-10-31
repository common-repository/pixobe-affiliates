<?php

/**
 *
 * Admin and public scripts and css.
 *
 * @package Helpers
 */

namespace PixobeAffiliates\Helpers;

use PixobeAffiliates\Helpers\Plugin_Constants;

class  Assets_Helper {
	/**
	 * Instance.
	 *
	 * @var instance.
	 */
	private static $instance;


	/**
	 *  Default constructor
	 */
	public function __construct() {
		$constant = Plugin_Constants::get_instance();

		$this->stencil_url = $constant->get_plugin_dir_url() . 'www/build/';
		$this->js_url = $constant->get_plugin_dir_url() . 'assets/js/';
		$this->imgage_url = $constant->get_plugin_dir_url() . 'assets/images/';
		$this->css_url = $constant->get_plugin_dir_url() . 'assets/css/';

	}

	/**
	 *
	 * Get Instance.
	 */
	public static function get_instance() {
		if ( ! self::$instance instanceof self ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Get version.
	 */
	public function get_admin_scripts() {
		return array(
			'pixobe-affiliates-esm' => $this->stencil_url . 'components.esm.js',
			'pixobe-affiliates' => $this->stencil_url . 'components.js',
			'pixobe-affiliates-admin' => $this->js_url . 'admin.js',
		);
	}

	/**
	 * Get version.
	 */
	public function get_admin_styles() {
		return array(
			'pixobe-affiliates-admin-styles' => $this->css_url . 'admin.min.css',
		);
	}

	/**
	 * Get version.
	 */
	public function get_public_scripts() {
		return array(
			'pixobe-affiliates-esm' => $this->stencil_url . 'components.esm.js',
			'pixobe-affiliates' => $this->stencil_url . 'components.js',
		);
	}

	/**
	 * Get version.
	 */
	public function get_public_styles() {
		return array(
			'pixobe-affiliates-public-styles' => $this->css_url . 'public.min.css',
		);
	}

	/**
	 * Get version.
	 */
	public function get_image_url() {
		return $this->imgage_url;
	}

}
