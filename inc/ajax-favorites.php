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

/**
 * AJAX handler to get favorites for the header dropdown
 */
function ar_get_favorites() {
    if ( ! is_user_logged_in() ) {
        wp_send_json_success( array( 'items' => array(), 'count' => 0 ) );
    }

    $user_id   = get_current_user_id();
    $favorites = get_user_meta( $user_id, 'favorite_properties', true );

    if ( ! is_array( $favorites ) || empty( $favorites ) ) {
        wp_send_json_success( array( 'items' => array(), 'count' => 0 ) );
    }

    $items = array();
    foreach ( $favorites as $property_id ) {
        $post = get_post( $property_id );
        if ( ! $post || $post->post_type !== 'property' ) continue;

        $prop_gallery = get_field( 'prop_gallery', $property_id );
        $image_url    = '';
        if ( $prop_gallery && is_array( $prop_gallery ) && ! empty( $prop_gallery ) ) {
            $image_url = wp_get_attachment_image_url( $prop_gallery[0], 'medium' );
        } elseif ( has_post_thumbnail( $property_id ) ) {
            $image_url = get_the_post_thumbnail_url( $property_id, 'medium' );
        }

        $location_text = get_field( 'prop_location_text', $property_id );

        $items[] = array(
            'id'       => $property_id,
            'title'    => get_the_title( $property_id ),
            'image'    => $image_url,
            'location' => $location_text ?: '',
            'url'      => get_permalink( $property_id ),
        );
    }

    wp_send_json_success( array(
        'items' => $items,
        'count' => count( $items ),
    ) );
}
add_action( 'wp_ajax_get_favorites', 'ar_get_favorites' );
add_action( 'wp_ajax_nopriv_get_favorites', 'ar_get_favorites' );
