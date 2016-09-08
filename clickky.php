<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://clickky.biz
 * @since             1.0.0
 * @package           Clickky
 *
 * @wordpress-plugin
 * Plugin Name:       Сlickky
 * Plugin URI:        https://clickky.biz/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Сlickky
 * Author URI:        http://clickky.biz/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       clickky
 * Domain Path:       /
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'CLICKKY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'CLICKKY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-сlickky-activator.php
 */
function activate_clickky() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-clickky-activator.php';
	Clickky_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-сlickky-deactivator.php
 */
function deactivate_clickky() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-clickky-deactivator.php';
	Clickky_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_clickky' );
register_deactivation_hook( __FILE__, 'deactivate_clickky' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */

require_once plugin_dir_path( __FILE__ )  . 'includes/class-clickky.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_clickky() {

	$plugin = new Clickky();
	$plugin->run();

}
run_clickky();

