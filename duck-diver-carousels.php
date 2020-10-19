<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.howardehrenberg.com
 * @since             1.0.0
 * @package           Duck_Diver_Carousels
 *
 * @wordpress-plugin
 * Plugin Name:       Duck Diver Carousel Any Content
 * Plugin URI:        https://www.duckdiverllc.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.1
 * Author:            Howard Ehrenberg
 * Author URI:        https://www.howardehrenberg.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       duck-diver-carousels
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/DuckDivers/duck-diver-carousels
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DUCK_DIVER_CAROUSELS_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-duck-diver-carousels-activator.php
 */
function activate_duck_diver_carousels() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-duck-diver-carousels-activator.php';
	Duck_Diver_Carousels_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-duck-diver-carousels-deactivator.php
 */
function deactivate_duck_diver_carousels() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-duck-diver-carousels-deactivator.php';
	Duck_Diver_Carousels_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_duck_diver_carousels' );
register_deactivation_hook( __FILE__, 'deactivate_duck_diver_carousels' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-duck-diver-carousels.php';

/**
 * Require ACF Fields
 *
 * @since    1.0.0
 */
require_once plugin_dir_path(  __FILE__ ) . 'includes/duck-diver-carousels-custom-fields.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_duck_diver_carousels() {

	$plugin = new Duck_Diver_Carousels();
	$plugin->run();

}
run_duck_diver_carousels();
