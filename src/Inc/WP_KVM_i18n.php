<?php

/**
 * @Author: Steffen Peschel
 * @Date:   2018-09-03 01:26:46
 * @Last Modified by:   Steffen Peschel
 * @Last Modified time: 2018-09-03 03:59:29
 */

namespace WP_KVM\Inc;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    WP_KVM
 */
class WP_KVM_i18n {
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'wp-kvm',
			false,
			PLUGIN_WP_KVM_PATH . 'languages/'
		);
	}
}