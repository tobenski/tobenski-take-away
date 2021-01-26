<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/tobenski/
 * @since             1.0.0
 * @package           Tobenski_Take_Away
 *
 * @wordpress-plugin
 * Plugin Name:       Take Away - Det Gamle Posthus
 * Plugin URI:        https://github.com/tobenski/tobenski-take-away
 * Description:       This plugin provides "Det Gamle Posthus" website its Take-Away section.
 * Version:           1.0.0
 * Author:            Knud Rishøj
 * Author URI:        https://github.com/tobenski/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tobenski-take-away
 * Domain Path:       /languages
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
define( 'TOBENSKI_TAKE_AWAY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tobenski-take-away-activator.php
 */
function activate_tobenski_take_away() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tobenski-take-away-activator.php';
	Tobenski_Take_Away_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tobenski-take-away-deactivator.php
 */
function deactivate_tobenski_take_away() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tobenski-take-away-deactivator.php';
	Tobenski_Take_Away_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tobenski_take_away' );
register_deactivation_hook( __FILE__, 'deactivate_tobenski_take_away' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tobenski-take-away.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tobenski_take_away() {

	$plugin = new Tobenski_Take_Away();
	$plugin->run();

}
run_tobenski_take_away();
