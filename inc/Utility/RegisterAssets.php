<?php
/*
 * Copyright (c) 2020. This file is copyright by WPEssential.
 */

namespace WPEssential\Plugins\Icons\Utility;

final class RegisterAssets
{
	public static string $minify;

	public static function constructor ()
	{
		self::$minify = \WPEssential\Plugins\Utility\RegisterAssets::minify_check();
		//add_filter( 'wpe/register/js', [ __CLASS__, 'register_script' ], 20 );
		add_filter( 'wpe/register/css', [ __CLASS__, 'register_style' ], 20 );
	}

	public static function register_script ( $list )
	{
		$minify = self::$minify;
		return $list;
	}

	public static function register_style ( $list )
	{
		$minify = self::$minify;
		return wp_parse_args( [
			'elementor-icons'           => [
				'link' => WPE_P_ICONS_URL . "/assets/css/elementor-icons{$minify}css",
				'dep'  => false,
				'ver'  => self::ver_check(),
			],
			'wpessential-icons-captian' => [
				'link' => WPE_P_ICONS_URL . "/assets/css/wpe.captian.icon{$minify}css",
				'dep'  => false,
				'ver'  => self::ver_check(),
			],
			'wpessential-icons-ion'     => [
				'link' => WPE_P_ICONS_URL . "/assets/css/wpe.ion.icons{$minify}css",
				'dep'  => false,
				'ver'  => self::ver_check(),
			],
			'wpessential-icons-typ'     => [
				'link' => WPE_P_ICONS_URL . "/assets/css/wpe.typ.icons{$minify}css",
				'dep'  => false,
				'ver'  => self::ver_check(),
			],
		], $list );
	}

	public static function ver_check ( $ver = WPE_P_ICONS_VERSION )
	{
		return \WPEssential\Plugins\Utility\RegisterAssets::ver_check( $ver );
	}
}
