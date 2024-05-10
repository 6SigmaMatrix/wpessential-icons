<?php

namespace WPEssential\Plugins\Icons\Builders\Elementor\Utility;

final class Elementor
{
	public static function constructor ()
	{
		add_filter( 'elementor/icons_manager/additional_tabs', [ __CLASS__, 'icons_load' ], 9999999, 1 );
	}

	/**
	 * Load the elementor icons
	 *
	 * @since  1.0.0.00001
	 * @access static
	 */
	public static function icons_load ( $args_def )
	{
		$args = [
			'wpe-captian-icons' => [
				'name'      => 'wpe-captian-icons',
				'label'     => __( 'WPEssential IC Captian', 'elementor' ),
				'url'       => WPE_P_ICONS_URL . 'assets/css/wpe.captian.icon.min.css',
				'enqueue'   => [ WPE_P_ICONS_URL . 'assets/css/wpe.captian.icon.min.css' ],
				'prefix'    => '',
				'labelIcon' => 'icon-346',
				'ver'       => '1.0',
				'fetchJson' => WPE_P_ICONS_URL . 'assets/css/json/wpe.captian.icon.min.json',
				'native'    => true,
			],
			'wpe-typ-icons'     => [
				'name'      => 'wpe-typ-icons',
				'label'     => __( 'WPEssential IC Type', 'elementor' ),
				'url'       => WPE_P_ICONS_URL . 'assets/css/wpe.typ.icons.min.css',
				'enqueue'   => [ WPE_P_ICONS_URL . 'assets/css/wpe.typ.icons.min.css' ],
				'prefix'    => 'typcn ',
				'labelIcon' => 'typcn typcn-arrow-move-outline',
				'ver'       => '1.0',
				'fetchJson' => WPE_P_ICONS_URL . 'assets/css/json/wpe.typ.icons.min.json',
				'native'    => true,
			],
			'wpe-ion-icons'     => [
				'name'      => 'wpe-ion-icons',
				'label'     => __( 'WPEssential IC Ion', 'elementor' ),
				'url'       => WPE_P_ICONS_URL . 'assets/css/wpe.ion.icons.min.css',
				'enqueue'   => [ WPE_P_ICONS_URL . 'assets/css/wpe.ion.icons.min.css' ],
				'prefix'    => 'ion ',
				'labelIcon' => 'ion ion-logo-ionic',
				'ver'       => '1.0',
				'fetchJson' => WPE_P_ICONS_URL . 'assets/css/json/wpe.ion.icons.min.json',
				'native'    => true,
			],
			'wpe-eicon-icons'   => [
				'name'      => 'wpe-eicon-icons',
				'label'     => __( 'WPEssential IC Elementor', 'elementor' ),
				'url'       => WPE_P_ICONS_URL . 'assets/css/elementor-icons.min.css',
				'enqueue'   => [ WPE_P_ICONS_URL . 'assets/css/elementor-icons.min.css' ],
				'prefix'    => '',
				'labelIcon' => 'eicon-elementor-square',
				'ver'       => '1.0',
				'fetchJson' => WPE_P_ICONS_URL . 'assets/css/json/elementor.icons.min.json',
				'native'    => true,
			],
		];

		$args_def = array_merge( $args, $args_def );

		return $args_def;
	}

	/**
	 * Get icons list
	 *
	 * @since  1.0.0.00001
	 * @access private|static
	 */
	private static function get_icons_list ()
	{
		//lni
		$pattern       = '/lni-(?:\w+(?:-)?)+/';
		$file_location = WPE_P_ICONS_URL . 'assets/css/lni.min.css';
		//cap
		$pattern       = '/icon-(?:\w+(?:-)?)+/';
		$file_location = WPE_P_ICONS_URL . 'assets/css/cap.css';
		$pattern       = '/typcn-(?:\w+(?:-)?)+/';
		$file_location = WPE_P_ICONS_URL . 'assets/css/typ.css';
		//entypo
		$pattern       = '/entypo-(?:\w+(?:-)?)+/';
		$file_location = WPE_P_ICONS_URL . 'assets/css/entypo.css';
		//ion
		$pattern       = '/ion-(?:\w+(?:-)?)+/';
		$file_location = WPE_P_ICONS_URL . 'assets/css/ion.css';
		//elementor
		$pattern       = '/eicon-(?:\w+(?:-)?)+/';
		$file_location = WPE_P_ICONS_URL . 'assets/css/eicon.css';

		$subject = wp_remote_get( $file_location );

		preg_match_all( $pattern, $subject[ 'body' ], $matches, PREG_SET_ORDER );

		$icons = [];

		foreach ( $matches as $match ) {
			$icons[] = $match[ 0 ];
		}

		return $icons;
	}
}
