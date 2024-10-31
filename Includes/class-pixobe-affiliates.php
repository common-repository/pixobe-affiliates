<?php

namespace PixobeAffiliates\Includes;

use PixobeAffiliates\Includes\{Pixobe_Affiliates_Loader,Pixobe_Affiliates_Admin,
					Pixobe_Affiliates_Deactivator,Pixobe_Affiliates_Activator};

use PixobeAffiliates\Helpers\Plugin_Constants;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Pixobe_Affiliates
 * @subpackage Pixobe_Affiliates/includes
 * @author     Pixobe Softwares <email@pixobe.com>
 */
class Pixobe_Affiliates {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Pixobe_Affiliates_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;


	/**
	 * Plugin contants
	 */
	protected Plugin_Constants $constants;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->constants = Plugin_Constants::get_instance();
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 *  Document
	 */
	private function load_dependencies() {
		$this->loader = new Pixobe_Affiliates_Loader();
		// add init action
		add_action( 'init', array( $this, 'pixobeaffiliates_translate_it' ) );
		register_activation_hook( $this->constants->get_main_plugin_file_path(), array( $this, 'activate_pixobe_affiliates' ) );
		register_deactivation_hook( $this->constants->get_main_plugin_file_path(), array( $this, 'deactivate_pixobe_affiliates' ) );
	}

	/**
	 *  Document
	 */
	private function set_locale() {
		$plugin_i18n = new Pixobe_Affiliates_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 *  Document
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Pixobe_Affiliates_Admin( $this->constants );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		// add admin menu.
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_admin_menu' );
		// add filter.
		$this->loader->add_filter( 'script_loader_tag', $plugin_admin, 'add_script_attributes', 10, 3 );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new Pixobe_Affiliates_Public( $this->constants );

		// enqueue styles.
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		// enqueue scripts.
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		// create shortcode.
		$this->loader->add_shortcode( 'pixobe_affiliates', $plugin_public, 'add_shortcode' );
		// add filter.
		$this->loader->add_filter( 'script_loader_tag', $plugin_public, 'add_script_attributes', 10, 3 );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}


	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Pixobe_Affiliates_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Loads the translation file
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 *
	 * @since    1.0.0
	 */
	public function pixobeaffiliates_translate_it() {
		load_plugin_textdomain( 'pixobe-affiliates' );
	}


	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-pixobe-affiliates-activator.php
	 */
	public function activate_pixobe_affiliates() {
		Pixobe_Affiliates_Activator::activate();
	}

	/**
	 * The code that runs during plugin deactivation.
	 * This action is documented in includes/class-pixobe-affiliates-deactivator.php
	 */
	public function deactivate_pixobe_affiliates() {
		Pixobe_Affiliates_Deactivator::deactivate();
	}

}
