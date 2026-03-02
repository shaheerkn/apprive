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

/**
 * Property Helper Functions
 *
 * Helper functions for retrieving and displaying property ACF field data.
 * These functions handle data retrieval, formatting, and conditional display logic.
 *
 * @package ArPrive
 * @since 1.0.0
 */

/**
 * Get and format property specifications
 *
 * Retrieves the prop_specs group field and returns formatted specifications array.
 * Handles optional fields gracefully with empty string fallbacks.
 *
 * @param int|null $post_id Optional post ID. Defaults to current post.
 * @return array|false Array of specifications or false if group not found.
 */
function ar_get_property_specs( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$specs = get_field( 'prop_specs', $post_id );

	if ( ! $specs ) {
		return false;
	}

	// Return formatted specifications array
	return array(
		'max_guests'          => isset( $specs['max_guests'] ) ? (int) $specs['max_guests'] : 0,
		'bedroom_count'       => isset( $specs['bedroom_count'] ) ? (int) $specs['bedroom_count'] : 0,
		'bathroom_count'      => isset( $specs['bathroom_count'] ) ? (int) $specs['bathroom_count'] : 0,
		'size_sqm'            => isset( $specs['size_sqm'] ) && $specs['size_sqm'] ? (int) $specs['size_sqm'] : '',
		'access_type'         => isset( $specs['access_type'] ) && $specs['access_type'] ? esc_html( $specs['access_type'] ) : '',
		'staff_availability'  => isset( $specs['staff_availability'] ) && $specs['staff_availability'] ? esc_html( $specs['staff_availability'] ) : '',
	);
}

/**
 * Get and format property pricing information
 *
 * Retrieves the prop_pricing group field and returns formatted pricing array.
 * Includes currency symbol and price period with sensible defaults.
 *
 * @param int|null $post_id Optional post ID. Defaults to current post.
 * @return array|false Array of pricing info or false if group not found.
 */
function ar_get_property_pricing( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$pricing = get_field( 'prop_pricing', $post_id );

	// Check for custom price label override (e.g. "Contact for price")
	$price_label = isset( $pricing['price_label_override'] ) ? trim( $pricing['price_label_override'] ) : '';

	if ( $price_label ) {
		return array(
			'starting_price' => 0,
			'currency'       => '',
			'price_period'   => '',
			'formatted'      => $price_label,
			'is_custom'      => true,
		);
	}

	if ( ! $pricing || ! isset( $pricing['starting_price'] ) || intval( $pricing['starting_price'] ) <= 0 ) {
		return false;
	}

	// Return formatted pricing array
	return array(
		'starting_price' => (int) $pricing['starting_price'],
		'currency'       => isset( $pricing['currency'] ) && $pricing['currency'] ? $pricing['currency'] : '€',
		'price_period'   => isset( $pricing['price_period'] ) && $pricing['price_period'] ? $pricing['price_period'] : '/week',
		'formatted'      => sprintf(
			'%s%s%s',
			isset( $pricing['currency'] ) && $pricing['currency'] ? $pricing['currency'] : '€',
			number_format( (int) $pricing['starting_price'], 0, '.', ',' ),
			isset( $pricing['price_period'] ) && $pricing['price_period'] ? $pricing['price_period'] : '/week'
		),
		'is_custom'      => false,
	);
}

/**
 * Display property gallery with seasonal logic
 *
 * Handles seasonal gallery display based on prop_seasonal_toggle field.
 * Falls back to main gallery if seasonal gallery is empty.
 * Supports winter (Nov-Mar) and summer (Apr-Oct) galleries.
 *
 * @param int|null $post_id Optional post ID. Defaults to current post.
 * @return array|false Array of image IDs or false if no gallery found.
 */
function ar_display_property_gallery( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	// Check if seasonal galleries are enabled
	$seasonal_enabled = get_field( 'prop_seasonal_toggle', $post_id );

	if ( $seasonal_enabled ) {
		// Determine current season based on month
		$current_month = (int) date( 'n' );

		// Winter: November (11) - March (3)
		// Summer: April (4) - October (10)
		$is_winter = ( $current_month >= 11 || $current_month <= 3 );

		// Get appropriate seasonal gallery
		$seasonal_gallery = $is_winter
			? get_field( 'prop_winter_gallery', $post_id )
			: get_field( 'prop_summer_gallery', $post_id );

		// Use seasonal gallery if it has images, otherwise fall back to main
		if ( $seasonal_gallery && is_array( $seasonal_gallery ) && count( $seasonal_gallery ) > 0 ) {
			return $seasonal_gallery;
		}
	}

	// Fall back to main gallery
	$main_gallery = get_field( 'prop_gallery', $post_id );

	if ( $main_gallery && is_array( $main_gallery ) && count( $main_gallery ) > 0 ) {
		return $main_gallery;
	}

	return false;
}

/**
 * Check if property field or repeater has content
 *
 * Utility function to check if an ACF field/repeater has content for conditional display.
 * Prevents empty sections from showing on the front-end.
 *
 * @param string   $field_name ACF field name to check.
 * @param int|null $post_id    Optional post ID. Defaults to current post.
 * @return bool True if field has content, false otherwise.
 */
function ar_property_has_content( $field_name, $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	$field_value = get_field( $field_name, $post_id );

	// Handle different field types
	if ( is_array( $field_value ) ) {
		// Check if array has content (repeater, gallery, etc.)
		return count( $field_value ) > 0;
	} elseif ( is_string( $field_value ) ) {
		// Check if string is not empty
		return ! empty( trim( $field_value ) );
	} elseif ( is_numeric( $field_value ) ) {
		// Numbers are always considered as having content (even 0)
		return true;
	}

	// Default: field has no content
	return false;
}
