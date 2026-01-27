<?php

if( function_exists('acf_add_options_page') ) {

    // Register Options Page
    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/**
 * Populate ACF Select field with WordPress Menus
 */
function ar_populate_acf_menu_select( $field ) {
    
    // Reset choices
    $field['choices'] = array();
    
    // Get all menus
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    
    if ( ! empty( $menus ) ) {
        foreach ( $menus as $menu ) {
            $field['choices'][ $menu->term_id ] = $menu->name;
        }
    }
    
    return $field;
}

// Apply to specific fields by key
add_filter( 'acf/load_field/name=header_menu_select', 'ar_populate_acf_menu_select' );
add_filter( 'acf/load_field/name=footer_menu_destinations', 'ar_populate_acf_menu_select' );
add_filter( 'acf/load_field/name=footer_menu_discover', 'ar_populate_acf_menu_select' );
