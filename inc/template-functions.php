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
 * Save ACF field groups to the inc/acf-json/field-groups folder.
 */
function ar_acf_field_groups_save_folder( $path ) {
  return get_stylesheet_directory() . '/inc/acf-json/field-groups';
}
add_filter( 'acf/settings/save_json/type=acf-field-group', 'ar_acf_field_groups_save_folder' );

/**
 * Save ACF post types to the inc/acf-json/post-types folder.
 */
function ar_acf_cpt_save_folder( $path ) {
  return get_stylesheet_directory() . '/inc/acf-json/post-types';
}
add_filter( 'acf/settings/save_json/type=acf-post-type', 'ar_acf_cpt_save_folder' );

/**
 * Save ACF taxonomies to the inc/acf-json/taxonomies folder.
 */
function ar_acf_taxonomy_save_folder( $path ) {
  return get_stylesheet_directory() . '/inc/acf-json/taxonomies';
}
add_filter( 'acf/settings/save_json/type=acf-taxonomy', 'ar_acf_taxonomy_save_folder' );

/**
 * Save ACF options to the inc/acf-json/options-pages folder.
 */
function ar_acf_options_save_folder( $path ) {
  return get_stylesheet_directory() . '/inc/acf-json/options-pages';
}
add_filter( 'acf/settings/save_json/type=acf-ui-options-page', 'ar_acf_options_save_folder' );

/**
 * Load ACF Json from theme directory
 * 
 * @param mixed $paths
 * @return array
 */
function ar_acf_json_load_point($paths) {
	// Remove the original path (optional).
  unset($paths[0]);

  // Append the new path and return it.
  $paths[] = get_stylesheet_directory() . '/inc/acf-json/field-groups';
  $paths[] = get_stylesheet_directory() . '/inc/acf-json/post-types';
  $paths[] = get_stylesheet_directory() . '/inc/acf-json/taxonomies';
  $paths[] = get_stylesheet_directory() . '/inc/acf-json/options-pages';

  return $paths;
}
add_filter('acf/settings/load_json', 'ar_acf_json_load_point');
