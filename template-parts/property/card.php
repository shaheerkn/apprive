<?php
/**
 * Property Card Template Part
 *
 * @package arprive
 */

$property_id = get_the_ID();
$prop_gallery = get_field('prop_gallery', $property_id);
$main_image_url = '';

if ($prop_gallery && is_array($prop_gallery) && !empty($prop_gallery)) {
    $main_image_url = wp_get_attachment_image_url($prop_gallery[0], 'medium_large');
} elseif (has_post_thumbnail()) {
    $main_image_url = get_the_post_thumbnail_url($property_id, 'medium_large');
} else {
    // Fallback image or placeholder could go here
    $main_image_url = get_template_directory_uri() . '/assets/images/placeholder.png';
}

$location_text = get_field('prop_location_text', $property_id);
$prop_pricing = get_field('prop_pricing', $property_id);
$starting_price = $prop_pricing['starting_price'];
$currency = $prop_pricing['currency'] ?: '€';
$price_period = $prop_pricing['price_period'] ?: '/week';

$prop_specs = get_field('prop_specs', $property_id);
$max_guests = $prop_specs['max_guests'];
$bedroom_count = $prop_specs['bedroom_count'];


$bathroom_count = $prop_specs['bathroom_count'];
$size_sqm = $prop_specs['size_sqm'];
$access_type = $prop_specs['access_type'];
$staff_availability = $prop_specs['staff_availability'];

// Features - prioritize key features, then taxonomies
$features = array();
if (have_rows('prop_key_features')) {
    while (have_rows('prop_key_features')) {
        the_row();
        $features[] = get_sub_field('feature_label');
        if (count($features) >= 3) break;
    }
}

// If not enough features, maybe fallback to something else, or leave it.
$features_string = implode(' · ', $features);

// Favorites logic — active state is set via JS from localStorage
$is_favorite = false;
?>

<article class="listing-grid__item" data-id="<?php echo esc_attr($property_id); ?>">
    <a href="<?php the_permalink(); ?>" class="listing-grid__image">
        <img src="<?php echo esc_url($main_image_url); ?>" alt="<?php the_title_attribute(); ?>" class="for-winter">
        <img src="<?php echo esc_url($main_image_url); ?>" class="for-summer" alt="<?php the_title_attribute(); ?>">
    </a>
    <div class="listing-grid__info">
        <div class="listing-grid__info-header">
            <h5 class="text for-winter"><?php the_title(); ?></h5>
            <h5 class="text for-summer"><?php the_title(); ?></h5>
            <button class="listing-grid-fav <?php echo $is_favorite ? 'active' : ''; ?>" data-id="<?php echo esc_attr($property_id); ?>">
                <?php if (!$args['is_favourites'] && $is_favorite) : ?>
                    <!-- Filled Heart SVG (You might need to adjust the SVG path/fill) -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                <?php elseif (!$args['is_favourites']) : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/fav-black.svg" alt="favorites">
                <?php endif; ?>
            </button>
        </div>

        <div class="listing-grid__info-details">
            <p class="listing-grid__info-location for-winter"><?php echo esc_html($location_text); ?></p>
            <p class="listing-grid__info-features for-winter"><?php echo esc_html($features_string); ?></p>
            <p class="listing-grid__info-features for-summer"><?php echo esc_html($features_string); ?></p>
            <?php if ($max_guests) : ?>
                <p class="listing-grid__info-guests"><?php echo esc_html($max_guests); ?> Guests</p>
            <?php endif; ?>
        </div>
        <p class="listing-grid__info-price">From <span><?php echo esc_html($starting_price); ?><?php echo esc_html($currency); ?></span><?php echo esc_html($price_period); ?></p>
    </div>
</article>
