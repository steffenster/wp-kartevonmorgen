<?php

/**
 * @Author: Steffen Peschel
 * @Date:   2018-09-03 00:32:17
 * @Last Modified by:   Steffen Peschel
 * @Last Modified time: 2018-09-03 05:30:23
 */

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           WP_KVM
 *
 * @wordpress-plugin
 * Plugin Name:       WP KVM
 * Plugin URI:        
 * Description:       
 * Version:           1.0.0
 * Author:            
 * Author URI:        
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-kvm
 * Domain Path:       /languages
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'WP_KVM_VERSION', '1.0.0' );
define( 'PLUGIN_WP_KVM_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_WP_KVM_URL', plugin_dir_url( __FILE__ ) );;

// load composer autoloader
require_once( PLUGIN_WP_KVM_PATH . 'vendor/autoload.php' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_wp_kvm() {
	\WP_KVM\Plugin_WP_KVM_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_wp_kvm() {
	\WP_KVM\Plugin_WP_KVM_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_kvm' );
register_deactivation_hook( __FILE__, 'deactivate_wp_kvm' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_kvm() {
	$plugin = new \WP_KVM\Inc\WP_KVM();
	$plugin->run();
}
run_wp_kvm();