<?php
/**
 * Plugin Name: WPEssential Icons
 * Description: WPEssential Icons is used to add the icons in supported any element. It have 7 icons library to present
 * the icon on your desire element. No need to learn the programming code. Just install the WPEssential Icons plugin
 * form WordPress.org.
 * Plugin URI: https://wpessential.org/home
 * Author: WPEssential
 * Version: 1.0.0
 * Author URI: https://wpessential.org/
 * Text Domain: wpessential-icons
 * Requires PHP: 7.3
 * Requires at least: 5.0
 * Tested up to: 5.3
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages/
 */
//https://wpessential.org/wpe-plugins/wpessential-icons

/**
 * Plugin Version
 *
 * @since  1.0.0
 */
define( 'WPE_IC_VR', '1.0.0' );

/**
 * Fire on 'plugin_loaded'
 *
 * @since  1.0.0
 */
function wpe_ic_plugin_loaded_action() {
	$file_location = plugin_dir_path( __FILE__ ) . 'functions.php';
	require_once "{$file_location}";
	$file_location = apply_filters( 'WPE_ic_directory', 'class-wpe-icons-init.php' );
	require_once "{$file_location}";
	new \WPEssential\WPE_Icons_Init();
}

add_action( 'plugins_loaded', 'wpe_ic_plugin_loaded_action' );

