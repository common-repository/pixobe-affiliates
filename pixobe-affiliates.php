<?php

/**
 * Plugin Name: Pixobe Affiliates
 * Plugin URI: https://www.pixobe.com/wordpress/affiliate-link-manager/
 * Description: Collect, collate, create beautiful product displays, comparision tables for your affiliate links to use in posts and pages.
 * Version: 1.0.2
 * Author: pixobe
 * Author URI: https://github.com/pixobe
 * Requires at least: 5.0
 * Tested up to: 6.1
 *
 * Text Domain: pixobe-affiliates
 * Domain Path: /languages/
 *
 * @package PixobeAffiliates
 * @category Core
 * @author Pixobe
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


// auto loader
require_once trailingslashit( dirname( __FILE__ ) ) . 'autoloader.php';
use PixobeAffiliates\Includes\Pixobe_Affiliates;

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pixobe_affiliates() {
	$plugin = new Pixobe_Affiliates();
	$plugin->run();
}
run_pixobe_affiliates();
