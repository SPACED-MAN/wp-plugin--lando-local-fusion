<?php

/**
 * @link              https://github.com/SPACED-MAN/wp-plugin--lando-local-fusion
 * @since             1.0.0
 * @package           lando_local_fusion
 *
 * @wordpress-plugin
 * Plugin Name:       Lando Local Fusion
 * Plugin URI:        https://github.com/SPACED-MAN/wp-plugin--lando-local-fusion
 * Description:       This can speed up local development in Lando/Pantheon by allowing you to bypass pulling media locally. Instead, this allows you to reference media on Pantheon's server as appropriate.
 * Version:           1.0.0
 * Author:            Tyler Shingleton
 * Author URI:        https://github.com/SPACED-MAN
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lando-local-fusion
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 */
define( 'lando_local_fusion_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lando-local-fusion-activator.php
 */
function activate_lando_local_fusion() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lando-local-fusion-activator.php';
	Lando_Local_Fusion_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lando-local-fusion-deactivator.php
 */
function deactivate_lando_local_fusion() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lando-local-fusion-deactivator.php';
	Lando_Local_Fusion_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lando_local_fusion' );
register_deactivation_hook( __FILE__, 'deactivate_lando_local_fusion' );

/**
 * The core plugin class
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lando-local-fusion.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lando_local_fusion() {

	$plugin = new Lando_Local_Fusion();
	$plugin->run();

}
run_lando_local_fusion();
