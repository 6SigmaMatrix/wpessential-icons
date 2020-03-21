<?php
/**
 * Plugin file get form directory
 *
 * @since  1.0.0
 */
function wpe_ic_root( $dir = '' ) {
	return plugin_dir_path( __FILE__ ) . $dir;
}

add_filter( 'WPE_ic_directory', 'wpe_ic_root' );
/**
 * Plugin file get form url
 *
 * @since  1.0.0
 */
function wpe_ic_uri( $dir = '' ) {
	return plugin_dir_url( __FILE__ ) . $dir;
}

add_filter( 'WPE_ic_http_url', 'wpe_ic_uri' );
/**
 * Plugin file url extrect
 *
 * @since  1.0.0
 */
function wpe_ic_dir_extract( $path = '', $extract = '@' ) {
	return implode( '/', explode( $extract, $path ) );
}

add_filter( 'WPE_ic_dir_extract', 'wpe_ic_dir_extract' );

function wpe_get_line_icons_list() {
	$pattern       = '/\.(fa-(?:\w+(?:-)?)+):before/';
	$pattern       = '/eicon-(?:\w+(?:-)?)+/';
	$file_location = apply_filters( 'WPE_ic_http_url', 'assets/css/elementor-icons.min.css' );
	$subject       = wp_remote_get( $file_location );

	preg_match_all( $pattern, $subject['body'], $matches, PREG_SET_ORDER );

	$icons = array();

	foreach ( $matches as $match ) {
		$icons[] = $match[0];
	}

	print_r(wp_json_encode($icons));exit;
	return $icons;
}
//echo wpe_get_line_icons_list();