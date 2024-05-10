<?php
/*
 * Copyright (c) 2020. This file is copyright by WPEssential.
 */

namespace WPEssential\Plugins\Icons\Assets;

final class RegisterAssets
{
	public static function constructor ()
	{
		add_filter( 'wpe/register/css', [ __CLASS__, 'register_style' ], 20 );
	}

	public static function register_style ( $list )
	{
		return wp_parse_args( [
			'elementor-icons'           => [
				'link' => WPE_P_ICONS_URL . '/assets/css/elementor-icons',
				'dep'  => false,
				'ver'  => WPEELBLOCK_VERSION,
			],
			'wpessential-icons-captian' => [
				'link' => WPE_P_ICONS_URL . '/assets/css/wpe.captian.icon',
				'dep'  => false,
				'ver'  => WPEELBLOCK_VERSION,
			],
			'wpessential-icons-ion'     => [
				'link' => WPE_P_ICONS_URL . '/assets/css/wpe.ion.icons',
				'dep'  => false,
				'ver'  => WPEELBLOCK_VERSION,
			],
			'wpessential-icons-typ'     => [
				'link' => WPE_P_ICONS_URL . '/assets/css/wpe.typ.icons',
				'dep'  => false,
				'ver'  => WPEELBLOCK_VERSION,
			],
		], $list );
	}

	public static function ver_check ( $ver = WPE_P_ICONS_VERSION )
	{
		return \WPEssential\Plugins\Utility\RegisterAssets::ver_check( $ver );
	}
}
