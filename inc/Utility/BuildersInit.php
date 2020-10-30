<?php

namespace WPEssential\Plugins\Icons\Utility;

use WPEssential\Plugins\Icons\Builders\Elementor\Utility\Elementor;

final class BuildersInit
{
	public static function constructor ()
	{
		self::builders();
	}

	private static function builders ()
	{
		if ( did_action( 'elementor/loaded' ) ) {
			Elementor::constructor();
		}
	}
}
