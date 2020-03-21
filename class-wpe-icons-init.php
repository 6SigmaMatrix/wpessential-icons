<?php
namespace WPEssential;

/**
 * WPE_Icons_Init.
 * An final class to load the WPEssential Icons necessary files.
 *
 * @see     https://wpessential.info/wpessential/wpessential-icons/
 * @package WPEssentil
 * @final
 * @since   1.0.0
 * @version 1.0.0
 */
final class WPE_Icons_Init {
	/**
	 * Constructer
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function __construct() {
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'wpe_ic_notice' ] );

			return;
		}
		add_action( 'init', [ $this, 'wpe_ic_i18n' ] );
		self::wpe_ic_load_files();
	}

	/**
	 * Fire to plugin activate to show the error
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function wpe_ic_notice() {
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'wpessential-icons' ),
			'<strong>' . esc_html__( 'WPEssential Icons', 'wpessential-icons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'wpessential-icons' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Load the plugin translation
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function wpe_ic_i18n() {
		load_plugin_textdomain( 'wpessential-icons', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}

	/**
	 * Load the WPEssential Icons necessary files and run it's classes.
	 *
	 * @since  1.0.0
	 * @access private|static
	 */
	private static function wpe_ic_load_files() {
		// Create files classes list array
		$classes_array = [
			'elementor@class-wpe-icons-elementor-init',
		];
		// Create files classes filter
		$files_array = apply_filters( 'WPE_ic_files_loader_array', $classes_array );
		// Classes list executor
		foreach ( $files_array as $file ) {
			// Get the file directory folder location
			$file_location = apply_filters( 'WPE_ic_dir_extract', $file );
			$file_location = apply_filters( 'WPE_ic_directory', "{$file_location}.php" );
			// Check the element file exist or not. If file exists, it's work
			if ( file_exists( "{$file_location}" ) ) {
				// Load the elementor classes
				require_once "{$file_location}";
			}
		}
	}
}
