<?php
namespace WPEssential\Elementor;

/**
 * WPE_Icons_Elementor_Init.
 * An final class to load the WPEssential Icons elementor.
 *
 * @see     https://wpessential.info/wpessential/
 * @package WPEssentil/elementor
 * @final
 * @since   1.0.0
 * @version 1.0.0
 */
final class WPE_Icons_Elementor_Init {

	/**
	 * Constructer
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function __construct() {
		add_filter( 'elementor/icons_manager/native', [ $this, 'wpe_ic_icons_load' ] );
	}

	/**
	 * Load the elementor icons
	 *
	 * @since  1.0.0
	 * @access static
	 */
	public function wpe_ic_icons_load( $args_def ) {
		$args = [
			'wpe-captian-icons' => [
				'name'      => 'wpe-captian-icons',
				'label'     => __( 'WPEssential IC Captian', 'elementor' ),
				'url'       => apply_filters( 'WPE_ic_http_url', 'assets/css/wpe.captian.icon.min.css' ),
				'enqueue'   => [ apply_filters( 'WPE_ic_http_url', 'assets/css/wpe.captian.icon.min.css' ) ],
				'prefix'    => '',
				'labelIcon' => 'icon-346',
				'ver'       => '1.0',
				'fetchJson' => apply_filters( 'WPE_ic_http_url', 'assets/css/json/wpe.captian.icon.min.json' ),
				'native'    => true,
			],
			'wpe-typ-icons'     => [
				'name'      => 'wpe-typ-icons',
				'label'     => __( 'WPEssential IC Type', 'elementor' ),
				'url'       => apply_filters( 'WPE_ic_http_url', 'assets/css/wpe.typ.icons.min.css' ),
				'enqueue'   => [ apply_filters( 'WPE_ic_http_url', 'assets/css/wpe.typ.icons.min.css' ) ],
				'prefix'    => 'typcn ',
				'labelIcon' => 'typcn typcn-arrow-move-outline',
				'ver'       => '1.0',
				'fetchJson' => apply_filters( 'WPE_ic_http_url', 'assets/css/json/wpe.typ.icons.min.json' ),
				'native'    => true,
			],
			'wpe-ion-icons'     => [
				'name'      => 'wpe-ion-icons',
				'label'     => __( 'WPEssential IC Ion', 'elementor' ),
				'url'       => apply_filters( 'WPE_ic_http_url', 'assets/css/wpe.ion.icons.min.css' ),
				'enqueue'   => [ apply_filters( 'WPE_ic_http_url', 'assets/css/wpe.ion.icons.min.css' ) ],
				'prefix'    => 'ion ',
				'labelIcon' => 'ion ion-logo-ionic',
				'ver'       => '1.0',
				'fetchJson' => apply_filters( 'WPE_ic_http_url', 'assets/css/json/wpe.ion.icons.min.json' ),
				'native'    => true,
			],
			'wpe-eicon-icons'   => [
				'name'      => 'wpe-eicon-icons',
				'label'     => __( 'WPEssential IC Elementor', 'elementor' ),
				'url'       => apply_filters( 'WPE_ic_http_url', 'assets/css/elementor-icons.min.css' ),
				'enqueue'   => [ apply_filters( 'WPE_ic_http_url', 'assets/css/elementor-icons.min.css' ) ],
				'prefix'    => '',
				'labelIcon' => 'eicon-elementor-square',
				'ver'       => '1.0',
				'fetchJson' => apply_filters( 'WPE_ic_http_url', 'assets/css/json/elementor.icons.min.json' ),
				'native'    => true,
			],
		];

		$args_def = array_merge( $args, $args_def );

		return $args_def;
	}

	/**
	 * Get icons list
	 *
	 * @since  1.0.0
	 * @access private|static
	 */
	private static function wpe_get_icons_list() {
		//lni
		$pattern       = '/lni-(?:\w+(?:-)?)+/';
		$file_location = apply_filters( 'WPE_ic_http_url', 'assets/css/lni.min.css' );
		//cap
		$pattern       = '/icon-(?:\w+(?:-)?)+/';
		$file_location = apply_filters( 'WPE_ic_http_url', 'assets/css/cap.css' );
		$pattern       = '/typcn-(?:\w+(?:-)?)+/';
		$file_location = apply_filters( 'WPE_ic_http_url', 'assets/css/typ.css' );
		//entypo
		$pattern       = '/entypo-(?:\w+(?:-)?)+/';
		$file_location = apply_filters( 'WPE_ic_http_url', 'assets/css/entypo.css' );
		//ion
		$pattern       = '/ion-(?:\w+(?:-)?)+/';
		$file_location = apply_filters( 'WPE_ic_http_url', 'assets/css/ion.css' );
		//elementor
		$pattern       = '/eicon-(?:\w+(?:-)?)+/';
		$file_location = apply_filters( 'WPE_ic_http_url', 'assets/css/eicon.css' );

		$subject = wp_remote_get( $file_location );

		preg_match_all( $pattern, $subject['body'], $matches, PREG_SET_ORDER );

		$icons = array();

		foreach ( $matches as $match ) {
			$icons[] = $match[0];
		}

		return $icons;
	}
}

new WPE_Icons_Elementor_Init();
