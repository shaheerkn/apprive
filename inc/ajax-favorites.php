<?php
/**
 * AJAX Favorites Handler (localStorage-based)
 *
 * Favorites are stored in the browser's localStorage.
 * These AJAX endpoints provide property data for display only.
 *
 * @package arprive
 */

/**
 * AJAX handler to get favorite properties by IDs (for header dropdown)
 */
function ar_get_favorites_by_ids() {
    $property_ids = isset( $_POST['property_ids'] ) ? array_map( 'intval', (array) $_POST['property_ids'] ) : array();
    $property_ids = array_filter( $property_ids );

    if ( empty( $property_ids ) ) {
        wp_send_json_success( array( 'items' => array(), 'count' => 0 ) );
    }

    $items = array();
    foreach ( $property_ids as $property_id ) {
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
add_action( 'wp_ajax_get_favorites_by_ids', 'ar_get_favorites_by_ids' );
add_action( 'wp_ajax_nopriv_get_favorites_by_ids', 'ar_get_favorites_by_ids' );

/**
 * AJAX handler to get rendered property cards by IDs (for favourites page)
 */
function ar_get_favorite_cards() {
    $property_ids = isset( $_POST['property_ids'] ) ? array_map( 'intval', (array) $_POST['property_ids'] ) : array();
    $property_ids = array_filter( $property_ids );

    if ( empty( $property_ids ) ) {
        wp_send_json_success( array( 'html' => '' ) );
    }

    $args = array(
        'post_type'      => 'property',
        'posts_per_page' => -1,
        'post__in'       => $property_ids,
        'post_status'    => 'publish',
        'orderby'        => 'post__in',
    );

    $query = new WP_Query( $args );

    ob_start();
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'template-parts/property/card', null, array( 'is_favourites' => true ) );
        }
        wp_reset_postdata();
    }
    $html = ob_get_clean();

    wp_send_json_success( array( 'html' => $html ) );
}
add_action( 'wp_ajax_get_favorite_cards', 'ar_get_favorite_cards' );
add_action( 'wp_ajax_nopriv_get_favorite_cards', 'ar_get_favorite_cards' );
