<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package arprive
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ar_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ar_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ar_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ar_pingback_header' );

/**
 * Save ACF Json to theme directory
 * 
 * @param mixed $path
 * @return string
 */
function ar_acf_json_save_point($path)
{
	$path = get_template_directory() . '/inc/acf-json';

	return $path;
}
add_filter('acf/settings/save_json', 'ar_acf_json_save_point');

/**
 * Load ACF Json from theme directory
 * 
 * @param mixed $paths
 * @return array
 */
function ar_acf_json_load_point($paths) {
	$paths[] = get_template_directory() . '/inc/acf-json';
	return $paths;
}
add_filter('acf/settings/load_json', 'ar_acf_json_load_point');
