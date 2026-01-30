<?php
/**
 * AJAX Favorites Handler
 *
 * @package arprive
 */

function ar_toggle_favorite() {
    // Check if user is logged in
    if ( ! is_user_logged_in() ) {
        wp_send_json_error( array(
            'message'  => 'Please login to add favorites.',
            'redirect' => wp_login_url(),
        ), 401 );
    }

    // Verify Nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'ar_favorite_nonce' ) ) {
        wp_send_json_error( array( 'message' => 'Invalid nonce' ) );
    }

    $property_id = isset( $_POST['property_id'] ) ? intval( $_POST['property_id'] ) : 0;

    if ( ! $property_id || get_post_type( $property_id ) !== 'property' ) {
        wp_send_json_error( array( 'message' => 'Invalid property' ) );
    }

    $user_id = get_current_user_id();
    $favorites = get_user_meta( $user_id, 'favorite_properties', true );

    if ( ! is_array( $favorites ) ) {
        $favorites = array();
    }

    $is_favorite = false;

    if ( in_array( $property_id, $favorites ) ) {
        // Remove
        $favorites = array_diff( $favorites, array( $property_id ) );
        $is_favorite = false;
    } else {
        // Add
        $favorites[] = $property_id;
        $is_favorite = true;
    }

    // Reset keys and save
    $favorites = array_values( $favorites );
    update_user_meta( $user_id, 'favorite_properties', $favorites );

    wp_send_json_success( array(
        'is_favorite' => $is_favorite,
        'count'       => count( $favorites ),
    ) );
}

add_action( 'wp_ajax_toggle_favorite', 'ar_toggle_favorite' );
// No nopriv action needed as guest logic is handled via JS redirect or 401 response
