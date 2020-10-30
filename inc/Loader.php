<?php

namespace WPEssential\Plugins\Icons;

use WPEssential\Plugins\Icons\Utility\BuildersInit;
use WPEssential\Plugins\Icons\Utility\Enqueue;
use WPEssential\Plugins\Icons\Utility\RegisterAssets;

final class Loader
{
	public static function constructor ()
	{
		self::load_files();
		self::autoload();
		self::start();
		add_action( 'wpessential_init', [ __CLASS__, 'init' ], 20 );
	}

	public static function autoload ()
	{
		$psr = [
			'WPEssential\\Plugins\\Icons\\' => WPE_P_ICONS_DIR . 'inc/'
		];

		$class_loader = new Libraries\ClassLoader;

		foreach ( $psr as $prefix => $paths ) {
			$class_loader->addNamespace( $prefix, $paths );
		}

		$class_loader->register();

	}

	public static function load_files ()
	{
		require_once WPE_P_ICONS_DIR . 'inc/functions.php';
		require_once WPE_P_ICONS_DIR . 'inc/Libraries/ClassLoader.php';
	}

	public static function start ()
	{
		RegisterAssets::constructor();
		Enqueue::constructor();
	}

	public static function init ()
	{
		do_action( 'wpessential_icons_init' );
		BuildersInit::constructor();
		load_plugin_textdomain( 'wpessential-icons', false, WPE_P_ICONS_DIR . 'language' );
	}
}
