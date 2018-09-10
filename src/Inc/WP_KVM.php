<?php

/**
 * @Author: Steffen Peschel
 * @Date:   2018-09-03 01:14:11
 * @Last Modified by:   Steffen Peschel
 * @Last Modified time: 2018-09-10 16:36:25
 */

namespace WP_KVM\Inc;

use WP_KVM\Inc\WP_KVM_Loader;
use WP_KVM\Inc\WP_KVM_i18n;
use WP_KVM\Admin\WP_KVM_Admin;
use WP_KVM\Admin\WP_KVM_Meta_Box;
use WP_KVM\Front\WP_KVM_Public;

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
 * @package    WP_KVM
 */
class WP_KVM {
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      WP_KVM_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;
	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;
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
		if ( defined( 'WP_KVM_VERSION' ) ) {
			$this->version = WP_KVM_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wp-kvm';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_shortcodes();
	}
	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WP_KVM_Loader. Orchestrates the hooks of the plugin.
	 * - WP_KVM_i18n. Defines internationalization functionality.
	 * - WP_KVM_Admin. Defines all hooks for the admin area.
	 * - WP_KVM_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		$this->loader = new WP_KVM_Loader();
	}
	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the WP_KVM_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new WP_KVM_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new WP_KVM_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		$wp_kvm_meta_box = new WP_KVM_Meta_Box();
		$this->loader->add_action( 'add_meta_boxes', $wp_kvm_meta_box, 'add_meta_box' );
    	$this->loader->add_action( 'save_post', $wp_kvm_meta_box, 'save_meta_box', 10, 2 );
	}
	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new WP_KVM_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}
	/**
	 * Register all shortodes
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_shortcodes() {
		# an example:
		# $frontendlogin = new KF_DLM_Frontendlogin();
		# $this->loader->add_shortcode( 'frontendlogin', $frontendlogin, 'load_frontendlogin' );
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
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    WP_KVM_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}
	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}