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
            'compare' => '>=',
            'type'    => 'NUMERIC',
        );
    }

    // Beds (mapped to max_guests as per spec/previous logic)
    if ( ! empty( $_POST['beds'] ) ) {
        $args['meta_query'][] = array(
            'key'     => 'prop_specs_max_guests',
            'value'   => intval( $_POST['beds'] ),
            'compare' => '>=',
            'type'    => 'NUMERIC',
        );
    }

    // Price Range (Max)
    // Note: Spec mentions range, but UI typically sends min/max or just max.
    // For this implementation assuming 'price_max' from the slider.
    if ( ! empty( $_POST['price_max'] ) ) {
        $price_max = intval( $_POST['price_max'] );
        if ($price_max == 25000) {
            $args['meta_query'][] = array(
                'key'     => 'prop_pricing_starting_price',
                'value'   => 25000,
                'compare' => '>=',
                'type'    => 'NUMERIC',
            );
        } else {
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

    // Pagination
    $big = 999999999;
    $pagination = paginate_links( array(
        'base'      => '%_%',
        'format'    => '?paged=%#%',
        'current'   => max( 1, $paged ),
        'total'     => $query->max_num_pages,
        'prev_text' => '<svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.30775 18.6155L0 9.30775L9.30775 0L10.3713 1.0635L2.127 9.30775L10.3713 17.552L9.30775 18.6155Z" fill="black"/></svg>',
        'next_text' => '<svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.0635 18.6155L0 17.552L8.24425 9.30775L0 1.0635L1.0635 0L10.3712 9.30775L1.0635 18.6155Z" fill="black"/></svg>',
        'type'      => 'list',
        'mid_size'  => 1,
    ) );

    wp_send_json_success( array(
        'html'       => $html,
        'pagination' => $pagination,
        'found_posts' => $query->found_posts,
    ) );
}

add_action( 'wp_ajax_filter_properties', 'ar_filter_properties' );
add_action( 'wp_ajax_nopriv_filter_properties', 'ar_filter_properties' );
