<?php 

/*
 * Add Theme Support
 */
function codelibry_supports(){

  // WordPress Support
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
}

add_action( 'after_setup_theme', 'codelibry_supports' );

/*
 * Allow SVG uploads
 */
function codelibry_allow_svg( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'codelibry_allow_svg' );

function codelibry_fix_svg_mime_check( $data, $file, $filename, $mimes ) {
	$ext = pathinfo( $filename, PATHINFO_EXTENSION );
	if ( 'svg' === $ext ) {
		$data['type'] = 'image/svg+xml';
		$data['ext']  = 'svg';
	}
	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'codelibry_fix_svg_mime_check', 10, 4 );
