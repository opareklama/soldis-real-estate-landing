<?php
defined( 'ABSPATH' ) || exit;

/**
 * Plugin Name:       SOLDIS Landing
 * Plugin URI:        https://opareklama.com
 * Description:       A premium, production-ready landing page system developed by OPA Reklama.
 * Version:           1.0.2
 * Author:            OPA Reklama
 * Author URI:        https://opareklama.lt/
 * License:           Proprietary
 * Text Domain:       soldis-landing
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/opareklama/soldis-real-estate-landing
 * Primary Branch:    main
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'SOLDIS_LANDING_VERSION' ) ) {
	define( 'SOLDIS_LANDING_VERSION', '1.0.2' );
}
define( 'SOLDIS_LANDING_PATH', plugin_dir_path( __FILE__ ) );
define( 'SOLDIS_LANDING_URL', plugin_dir_url( __FILE__ ) );
define( 'SOLDIS_LANDING_BASENAME', plugin_basename( __FILE__ ) );

// Load Autoloader
require_once SOLDIS_LANDING_PATH . 'app/Autoloader.php';

// Initialize Autoloader
$autoloader = new \OpaReklama\SoldisLanding\Autoloader();
$autoloader->register();
$autoloader->addNamespace( 'OpaReklama\SoldisLanding', SOLDIS_LANDING_PATH . 'app' );

/**
 * The code that runs during plugin activation.
 */
function activate_soldis_landing() {
	require_once SOLDIS_LANDING_PATH . 'app/Foundation/Activator.php';
	\OpaReklama\SoldisLanding\Foundation\Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_soldis_landing() {
	require_once SOLDIS_LANDING_PATH . 'app/Foundation/Deactivator.php';
	\OpaReklama\SoldisLanding\Foundation\Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_soldis_landing' );
register_deactivation_hook( __FILE__, 'deactivate_soldis_landing' );

/**
 * Begins execution of the plugin.
 */
function run_soldis_landing() {
	$plugin = new \OpaReklama\SoldisLanding\Plugin();
	$plugin->run();
}
run_soldis_landing();

