<?php
/**
 * AJAX Filters Handler
 *
 * @package arprive
 */

function ar_filter_properties() {
    // Verify Nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'ar_filter_nonce' ) ) {
        wp_send_json_error( array( 'message' => 'Invalid nonce' ) );
    }

    $paged = isset( $_POST['page'] ) ? intval( $_POST['page'] ) : 1;
    $sort = isset( $_POST['sort'] ) ? sanitize_text_field( $_POST['sort'] ) : 'default';

    $args = array(
        'post_type'      => 'property',
        'post_status'    => 'publish',
        'posts_per_page' => 12,
        'paged'          => $paged,
        'tax_query'      => array( 'relation' => 'AND' ),
        'meta_query'     => array( 'relation' => 'AND' ),
    );

    // --- Taxonomy Filters ---

    // Debugging
    error_log( 'Filter POST: ' . print_r( $_POST, true ) );

    // Destination
    // If 'destination' is set in POST (even if empty string), we use it.
    // We only fallback to 'initial_destination' if 'destination' is NOT present in POST (unlikely with this form).
    if ( isset( $_POST['destination'] ) ) {
        if ( '' !== $_POST['destination'] ) {
            $args['tax_query'][] = array(
                'taxonomy' => 'destination',
                'field'    => 'term_id',
                'terms'    => intval( $_POST['destination'] ),
            );
        }
        // If it IS empty string, we deliberately want ALL destinations, so we do nothing.
    } elseif ( ! empty( $_POST['initial_destination'] ) ) {
         // Fallback only if filter input is missing entirely
         $args['tax_query'][] = array(
            'taxonomy' => 'destination',
            'field'    => 'term_id',
            'terms'    => intval( $_POST['initial_destination'] ),
        );
    }

    // Wellness & Leisure
    if ( ! empty( $_POST['wellness'] ) && is_array( $_POST['wellness'] ) ) {
        $args['tax_query'][] = array(
            'taxonomy' => 'wellness-and-leisure',
            'field'    => 'term_id',
            'terms'    => array_map( 'intval', $_POST['wellness'] ),
            'operator' => 'IN', 
        );
    }

    // Amenities
    if ( ! empty( $_POST['amenities'] ) && is_array( $_POST['amenities'] ) ) {
        $args['tax_query'][] = array(
            'taxonomy' => 'amenity',
            'field'    => 'term_id',
            'terms'    => array_map( 'intval', $_POST['amenities'] ),
            'operator' => 'IN',
        );
    }

    // Property Type
    if ( ! empty( $_POST['property_type'] ) && is_array( $_POST['property_type'] ) ) {
        $args['tax_query'][] = array(
            'taxonomy' => 'property-type',
            'field'    => 'term_id',
            'terms'    => array_map( 'intval', $_POST['property_type'] ),
            'operator' => 'IN',
        );
    }

    // Location (Access Type)
    if ( ! empty( $_POST['location'] ) && is_array( $_POST['location'] ) ) {
        $args['tax_query'][] = array(
            'taxonomy' => 'access-type',
            'field'    => 'term_id',
            'terms'    => array_map( 'intval', $_POST['location'] ),
            'operator' => 'IN',
        );
    }

    // --- Meta Filters ---

    // Guests
    if ( ! empty( $_POST['guests'] ) ) {
        $args['meta_query'][] = array(
            'key'     => 'prop_specs_max_guests',
            'value'   => intval( $_POST['guests'] ),
            'compare' => '=',
            'type'    => 'NUMERIC',
        );
    }

    // Beds (mapped to max_guests as per spec/previous logic)
    if ( ! empty( $_POST['beds'] ) ) {
        $beds_val = intval( $_POST['beds'] );
        if ($beds_val == 8) {
            $args['meta_query'][] = array(
                'key'     => 'prop_specs_max_guests',
                'value'   => 8,
                'compare' => '>=',
                'type'    => 'NUMERIC',
            );
        } else {
            $args['meta_query'][] = array(
                'key'     => 'prop_specs_max_guests',
                'value'   => $beds_val,
                'compare' => '=',
                'type'    => 'NUMERIC',
            );
        }
    }

    // Price Range (Max)
    // Note: Spec mentions range, but UI typically sends min/max or just max.
    // For this implementation assuming 'price_max' from the slider.
    if ( ! empty( $_POST['price_max'] ) ) {
        $price_max = intval( $_POST['price_max'] );
        // When slider is at max (25000), skip filter — means "no price limit"
        if ( $price_max < 25000 ) {
            $args['meta_query'][] = array(
                'key'     => 'prop_pricing_starting_price',
                'value'   => $price_max,
                'compare' => '<=',
                'type'    => 'NUMERIC',
            );
        }
    }

    // Bedrooms
    if ( ! empty( $_POST['bedrooms'] ) ) {
        $bedroom_val = intval( $_POST['bedrooms'] );
        if ($bedroom_val == 6) {
             // 6+ logic
             $args['meta_query'][] = array(
                'key'     => 'prop_specs_bedroom_count',
                'value'   => 6,
                'compare' => '>=',
                'type'    => 'NUMERIC',
            );
        } else {
            $args['meta_query'][] = array(
                'key'     => 'prop_specs_bedroom_count',
                'value'   => $bedroom_val,
                'compare' => '=', // Strict match or >= depending on UX preference. Usually strict for pills.
                'type'    => 'NUMERIC',
            );
        }
    }

    // --- Sorting ---
    switch ( $sort ) {
        case 'price_asc':
            $args['meta_key'] = 'prop_pricing_starting_price';
            $args['orderby']  = 'meta_value_num';
            $args['order']    = 'ASC';
            break;
        case 'price_desc':
            $args['meta_key'] = 'prop_pricing_starting_price';
            $args['orderby']  = 'meta_value_num';
            $args['order']    = 'DESC';
            break;
        default:
            $args['orderby'] = 'date';
            $args['order']   = 'DESC';
            break;
    }

    $query = new WP_Query( $args );

    ob_start();
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'template-parts/property/card', null, array( 'is_favourites' => false ) );
        }
        wp_reset_postdata();
    } else {
        echo '<div class="no-results">No properties found matching your criteria.</div>';
    }
    $html = ob_get_clean();

    wp_send_json_success( array(
        'html'        => $html,
        'found_posts' => $query->found_posts,
        'max_pages'   => $query->max_num_pages,
    ) );
}

add_action( 'wp_ajax_filter_properties', 'ar_filter_properties' );
add_action( 'wp_ajax_nopriv_filter_properties', 'ar_filter_properties' );
