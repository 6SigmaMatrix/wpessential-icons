<?php

namespace WPEssential\Plugins\Icons\Assets;

class AssetsInit
{
	public static function constructor ()
	{
		self::run();
	}

	protected static function run ()
	{
		RegisterAssets::constructor();
		Enqueue::constructor();
	}
}
