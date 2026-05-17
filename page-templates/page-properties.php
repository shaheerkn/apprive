<?php
/**
 * Template Name: Properties
 * Template Post Type: page
 *
 * @package arprive
 * @subpackage arprive/templates
 * @since 1.0.0
 * @version 1.0.0
 * @author Arprive
 * @link https://arprive.com
 * @license GPL-2.0+
 * @copyright 2026 Arprive
 */

get_header();

$destination = get_queried_object();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type'      => 'property',
    'posts_per_page' => 12, // Adjust as needed
    'paged'          => $paged,
    'post_status'    => 'publish',
);

if ( $destination && ! is_wp_error( $destination ) && is_a($destination, 'WP_Term') ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'destination',
            'field'    => 'term_id',
            'terms'    => $destination->term_id,
        ),
    );
}

$property_query = new WP_Query( $args );
?>


<section class="filters">
  <div class="container">
    <div class="filters__header">
      <h4 class="section-title">Private Villas & Chalets Collection</h4>
      <p class="filters__text">Explore a curated selection of private chalets and villas, carefully chosen for location, design and privacy. All properties are available on request and supported by full private concierge service.</p>
      <button class="filters__add-btn" id="open-filters-btn">Add filters</button>
    </div>
  </div>
</section>

<section class="listing-grid">
  <div class="container">
    <div class="listing-grid__layout">
    <div class="listing-grid__main">
      <div class="listing-grid__content" id="property-grid" data-max-pages="<?php echo esc_attr( $property_query->max_num_pages ); ?>">
          <?php
          if ( $property_query->have_posts() ) :
              while ( $property_query->have_posts() ) :
                  $property_query->the_post();
                  get_template_part( 'template-parts/property/card', null, array( 'is_favourites' => false ) );
              endwhile;
              wp_reset_postdata();
          else :
              echo '<p>No properties found.</p>';
          endif;
          ?>
      </div>

      <div class="listing-grid__loader" id="property-loader" style="display: <?php echo ($property_query->max_num_pages > 1) ? 'flex' : 'none'; ?>;">
          <div class="listing-grid__spinner"></div>
      </div>
    </div>

    <form id="property-filters-form" class="listing-grid__sidebar">
        <input type="hidden" name="action" value="filter_properties">
        <input type="hidden" name="page" value="1" id="filter-page">
        <?php if ( $destination && ! is_wp_error( $destination ) && is_a($destination, 'WP_Term') ) : ?>
            <input type="hidden" name="initial_destination" value="<?php echo esc_attr($destination->term_id); ?>">
        <?php endif; ?>

        <div class="filters__content">
            <button type="button" class="filters__close-btn" id="close-filters-btn">&times;</button>
            <h3 class="filters__main-title">Filter by</h3>
            <div class="filters__filter-group">
                <h4 class="filters__filter-group__title">Destination</h4>
                <div class="filters__checkboxes-group filters__checkboxes-group--column">
                    <?php
                    $destinations = get_terms( array(
                        'taxonomy' => 'destination',
                        'hide_empty' => false,
                    ) );
                    if ( ! empty( $destinations ) && ! is_wp_error( $destinations ) ) {
                        foreach ( $destinations as $term ) {
                            $checked = ( $destination && is_a($destination, 'WP_Term') && $destination->term_id == $term->term_id ) ? 'checked' : '';
                            echo '<label><input type="checkbox" name="destination[]" value="' . esc_attr( $term->term_id ) . '" ' . $checked . '> ' . esc_html( $term->name ) . '</label>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="filters__filter-group">
                <h4 class="filters__filter-group__title">Date</h4>
                <div class="filters__date-group">
                    <div class="filters__date-field">
                        <label for="filter-date-from">From</label>
                        <input type="date" name="date_from" id="filter-date-from">
                    </div>
                    <div class="filters__date-field">
                        <label for="filter-date-to">To</label>
                        <input type="date" name="date_to" id="filter-date-to">
                    </div>
                </div>
            </div>

            <div class="filters__filter-group">
                <h4 class="filters__filter-group__title">Bedrooms</h4>
                <div class="filters__quantity">
                    <div class="filters__quantity-label">
                        <span class="filters__quantity-title">Min. Bedrooms</span>
                        <span class="filters__quantity-range">(1 - 15)</span>
                    </div>
                    <div class="filters__quantity-controls">
                        <button type="button" class="filters__quantity-btn" id="bedrooms-minus">−</button>
                        <span class="filters__quantity-value" id="bedrooms-display">All</span>
                        <input type="hidden" name="bedrooms" id="bedrooms-count" value="0">
                        <button type="button" class="filters__quantity-btn" id="bedrooms-plus">+</button>
                    </div>
                </div>
            </div>

            <div class="filters__filter-group">
                <h4 class="filters__filter-group__title">Price Range</h4>

                <div class="filters__price-range">
                    <input type="range" name="price_max" min="0" max="25000" step="500" value="25000" id="filter-price-range">

                    <div class="filters__price-range__text">
                        <span>0 €</span>
                        <span>+ <span id="price-display">25,000</span> €</span>
                    </div>
                </div>
            </div>

            <div class="filters__filter-group">
                <h4 class="filters__filter-group__title">Amenities & features</h4>
                <div class="filters__checkboxes-group">
                    <?php
                    $wellness_terms = get_terms( array('taxonomy' => 'wellness-and-leisure', 'hide_empty' => false) );
                    if ( ! empty( $wellness_terms ) && ! is_wp_error( $wellness_terms ) ) {
                        foreach ( $wellness_terms as $term ) {
                            echo '<label><input type="checkbox" name="wellness[]" value="' . esc_attr( $term->term_id ) . '"> ' . esc_html( $term->name ) . '</label>';
                        }
                    }
                    $amenity_terms = get_terms( array('taxonomy' => 'amenity', 'hide_empty' => false) );
                    if ( ! empty( $amenity_terms ) && ! is_wp_error( $amenity_terms ) ) {
                        foreach ( $amenity_terms as $term ) {
                            echo '<label><input type="checkbox" name="amenities[]" value="' . esc_attr( $term->term_id ) . '"> ' . esc_html( $term->name ) . '</label>';
                        }
                    }
                    ?>
                </div>
            </div>


            <div class="filters__actions">
                <button type="submit" class="filters__search-btn">
                    <span>Search</span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.2895 19.1152L10.9845 11.8102C10.4011 12.3068 9.73029 12.6912 8.97196 12.9634C8.21363 13.2356 7.4516 13.3717 6.68588 13.3717C4.81726 13.3717 3.23575 12.7249 1.94133 11.4313C0.647111 10.1377 0 8.55711 0 6.68967C0 4.82203 0.646819 3.24012 1.94046 1.94396C3.2341 0.647985 4.81464 0 6.68208 0C8.54972 0 10.1316 0.647111 11.4278 1.94133C12.7238 3.23575 13.3718 4.81726 13.3718 6.68587C13.3718 7.49651 13.2282 8.281 12.941 9.03933C12.6538 9.79767 12.2768 10.446 11.8102 10.9845L19.1152 18.2898L18.2895 19.1152ZM6.68588 12.2051C8.23385 12.2051 9.54071 11.6722 10.6065 10.6065C11.6722 9.5409 12.2051 8.23404 12.2051 6.68587C12.2051 5.13771 11.6722 3.83085 10.6065 2.76529C9.54071 1.69954 8.23385 1.16667 6.68588 1.16667C5.13771 1.16667 3.83085 1.69954 2.76529 2.76529C1.69954 3.83085 1.16667 5.13771 1.16667 6.68587C1.16667 8.23404 1.69954 9.5409 2.76529 10.6065C3.83085 11.6722 5.13771 12.2051 6.68588 12.2051Z" fill="white"/>
                    </svg>
                </button>
            </div>
            
            <div class="filters__speak-with-us">
                <h4 class="filters__speak-with-us__title">Speak with us</h4>
                <p class="filters__speak-with-us__text">Each destination is carefully experienced by our local specialists to shape your perfect stay</p>
                <a href="tel:" class="filters__speak-with-us__btn">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.667 17.5C14.861 17.5 13.0729 17.1215 11.3027 16.3646C9.53255 15.6076 7.92394 14.5174 6.47699 13.0938C5.03005 11.6701 3.9236 10.0764 3.15765 8.3125C2.3917 6.54861 2.00949 4.76736 2.01102 2.96875C2.01102 2.71875 2.10269 2.5 2.28602 2.3125C2.46935 2.125 2.69449 2.03125 2.96144 2.03125H6.20699C6.39032 2.03125 6.56283 2.09549 6.72449 2.22396C6.88616 2.35243 6.98546 2.52083 7.02255 2.72917L7.60255 5.46875C7.63963 5.65972 7.63349 5.84201 7.58421 6.01562C7.53491 6.18924 7.43563 6.33681 7.28616 6.45833L5.22699 8.38542C5.95588 9.65972 6.85088 10.8264 7.91199 11.8854C8.9731 12.9444 10.1425 13.8368 11.4202 14.5625L13.4402 12.5C13.5836 12.3472 13.7507 12.2431 13.9414 12.1875C14.132 12.1319 14.3258 12.1285 14.5227 12.1771L17.1337 12.7917C17.3306 12.8542 17.4914 12.9653 17.6162 13.125C17.741 13.2847 17.8034 13.4618 17.8034 13.6562V16.6562C17.8034 16.9062 17.7063 17.1198 17.5122 17.2969C17.318 17.474 17.0875 17.5556 16.8205 17.5434L16.667 17.5Z" fill="white"/>
                    </svg>
                    <span>Make a Call</span>
                </a>
                <a href="/enquiry/" class="filters__speak-with-us__btn">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.33301 16.6667C2.87467 16.6667 2.48245 16.5035 2.15634 16.1771C1.83023 15.8507 1.66717 15.4583 1.66717 15V5C1.66717 4.54167 1.83023 4.14931 2.15634 3.82292C2.48245 3.49653 2.87467 3.33333 3.33301 3.33333H16.6663C17.1247 3.33333 17.5171 3.49653 17.8435 3.82292C18.1699 4.14931 18.333 4.54167 18.333 5V15C18.333 15.4583 18.1699 15.8507 17.8435 16.1771C17.5171 16.5035 17.1247 16.6667 16.6663 16.6667H3.33301ZM9.99967 10.5833L16.6663 6.25V5L9.99967 9.33333L3.33301 5V6.25L9.99967 10.5833Z" fill="white"/>
                    </svg>
                    <span>Enquire</span>
                </a>
            </div>
        </div>
    </form>
    </div>

    <div class="listing-grid__mobile-actions">
        <a href="#" class="listing-grid__mobile-action">Learn More</a>
    </div>

    <div class="overlay"></div>
  </div>
</section>

<?php get_footer(); ?>