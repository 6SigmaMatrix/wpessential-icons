<?php
/**
 * Plugin Name: WPEssential Icons
 * Description: WPEssential Icons is used to add the icons in supported any element. It have 7 icons library to present
 * the icon on your desire element. No need to learn the programming code. Just install the WPEssential Icons plugin
 * form WordPress.org.
 * Plugin URI: https://wpessential.org/home
 * Author: WPEssential
 * Version: 2.0
 * Author URI: https://wpessential.org/
 * Text Domain: wpessential-icons
 * Requires PHP: 7.4
 * Requires at least: 5.0
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages/
 */

require_once plugin_dir_path( __FILE__ ) . 'constants.php';
require_once WPE_P_ICONS_DIR . 'inc/Loader.php';

add_action( 'plugins_loaded', function () {
	if ( ! did_action( 'wpessential_loaded' ) ) {
		require_once WPE_P_ICONS_DIR . 'inc/Libraries/RequiredNotifire.php';
		\WPEssential\Plugins\Icons\Libraries\RequiredNotifire::make( __( 'Thanks for', 'wpessential-icons' ) )
		                                                     ->plugin_check( 'wpessential' )
		                                                     ->desc( __( 'Choosing the Wpessential product. The installed plugin has required the WPEssential base plugin.', 'wpessential-icons' ) )
		                                                     ->dismiss( true )
		                                                     ->icon( WPE_P_ICONS_URL . 'assets/images/wpessential-logo.jpg' );

	}
}, 1000 );

/**
 * Fire on 'wpessential_loaded'
 *
 * @since  1.0.0.00001
 */
function wpe_icons_plugin_loaded_action ()
{
	\WPEssential\Plugins\Icons\Loader::constructor();
}

add_action( 'wpessential_loaded', 'wpe_icons_plugin_loaded_action' );
