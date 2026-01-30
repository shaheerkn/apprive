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

<section class="breadcrumb breadcrumb__modifier">
  <div class="container single-chalet__links">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb__home">
      <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.33333 19.718H6.25633V11.872H12.4103V19.718H17.3333V7.718L9.33333 1.66667L1.33333 7.718V19.718ZM0 21.0513V7.05133L9.33333 0L18.6667 7.05133V21.0513H11.077V13.2053H7.58967V21.0513H0Z" fill="#1F1F1F"/>
      </svg>
    </a>

    <?php if ( $destination && ! is_wp_error( $destination ) && is_a($destination, 'WP_Term') ) : ?>
        <!-- Breadcrumb arrow separator -->
        <span class="breadcrumb__arrow">
            <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
            </svg>
        </span>

        <!-- Destination breadcrumb -->
        <a href="<?php echo esc_url( get_term_link( $destination ) ); ?>" class="breadcrumb__current">
            <?php echo esc_html( $destination->name ); ?>
        </a>
    <?php endif; ?>
    
    <!-- Breadcrumb arrow separator -->
    <a href="#" class="breadcrumb__arrow">
      <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
      </svg>
    </a>

    <!-- Property name breadcrumb -->
    <span class="breadcrumb__current">Properties</span>

    <!-- Mobile back arrow -->
    <a href="#" class="breadcrumb-arrow__mobile">
      <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.60104 6.25L6.42792 11.0769L5.83333 11.6667L0 5.83333L5.83333 0L6.42792 0.589792L1.60104 5.41667H11.6667V6.25H1.60104Z" fill="#1F1F1F"/>
      </svg>
    </a>
  </div>
</section>

<section class="filters">
  <div class="container">
    <div class="filters__header">
      <h4 class="section-title">Private Chalets & Villas Portfolio</h4>
      <h4 class="filters__subtitle">Find the best stay of your dreams</h4>
      <p class="filters__text">Explore a curated selection of private chalets and villas, carefully chosen for location, design and privacy. All properties are available on request and supported by full private concierge service.</p>
    </div>

    <form id="property-filters-form">
        <input type="hidden" name="action" value="filter_properties">
        <input type="hidden" name="page" value="1" id="filter-page">
        <?php if ( $destination && ! is_wp_error( $destination ) && is_a($destination, 'WP_Term') ) : ?>
            <input type="hidden" name="initial_destination" value="<?php echo esc_attr($destination->term_id); ?>">
        <?php endif; ?>

        <div class="filters__content">
            <div class="filters__input-group">
                <label for="filter-destination">DESTINATION</label>
                <select name="destination" id="filter-destination">
                    <option value="">All Destinations</option>
                    <?php
                    $destinations = get_terms( array(
                        'taxonomy' => 'destination',
                        'hide_empty' => false,
                    ) );
                    if ( ! empty( $destinations ) && ! is_wp_error( $destinations ) ) {
                        foreach ( $destinations as $term ) {
                            $selected = ( $destination && is_a($destination, 'WP_Term') && $destination->term_id == $term->term_id ) ? 'selected' : '';
                            echo '<option value="' . esc_attr( $term->term_id ) . '" ' . $selected . '>' . esc_html( $term->name ) . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="filters__input-group">
                <label for="filter-checkin">Check in Date</label>
                <input type="date" name="checkin" id="filter-checkin">
            </div>

            <div class="filters__input-group">
                <label for="filter-checkout">Check out Date</label>
                <input type="date" name="checkout" id="filter-checkout">
            </div>

            <div class="filters__input-group">
                <label for="guests">Guests</label>
                <select name="guests" id="guests">
                    <option value="">Any</option>
                    <?php for($i=1; $i<=20; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo sprintf('%02d', $i); ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="filters__buttons">
                <button type="button" class="filters__filter-btn"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/filter.svg" alt="filter"></button>
                <button type="submit" class="filters__search-btn"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-search.svg" alt="search"></button>
            </div>

            <div class="filters__modal">
                <button type="button" class="filters__modal-close">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.825708 14.7181L0 13.8924L6.53333 7.35904L0 0.825708L0.825708 0L7.35904 6.53333L13.8924 0L14.7181 0.825708L8.18475 7.35904L14.7181 13.8924L13.8924 14.7181L7.35904 8.18475L0.825708 14.7181Z" fill="black"/>
                    </svg>
                </button>
                <h3>Filters</h3>

                <div class="filters__modal-body">
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
                        <h4 class="filters__filter-group__title">Bedrooms & beds</h4>

                        <div class="filters__filter-subgroup">
                            <p>Bedrooms</p>

                            <div class="filters__radio-group hide-on-tablet">
                                <label for="bedrooms-all">
                                    <input type="radio" name="bedrooms" id="bedrooms-all" value="" checked>
                                    All
                                </label>

                                <label for="bedrooms-studio">
                                    <input type="radio" name="bedrooms" id="bedrooms-studio" value="studio">
                                    Studio
                                </label>

                                <?php for($i=1; $i<=6; $i++): ?>
                                <label for="bedrooms-<?php echo $i; ?>">
                                    <input type="radio" name="bedrooms" id="bedrooms-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </label>
                                <?php endfor; ?>
                            </div>

                            <div class="hide-on-desktop">
                                <select name="bedrooms" id="bedrooms">
                                    <option value="">All</option>
                                    <option value="studio">Studio</option>
                                    <?php for($i=1; $i<=5; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="filters__filter-subgroup">
                            <p>Beds</p>

                            <div class="filters__radio-group hide-on-tablet">
                                <label for="beds-all">
                                    <input type="radio" name="beds" id="beds-all" value="" checked>
                                    All
                                </label>

                                <?php for($i=1; $i<=6; $i++): ?>
                                <label for="beds-<?php echo $i; ?>">
                                    <input type="radio" name="beds" id="beds-<?php echo $i; ?>" value="<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </label>
                                <?php endfor; ?>
                            </div>

                            <div class="hide-on-desktop">
                                <select name="beds" id="beds">
                                    <option value="">All</option>
                                    <?php for($i=1; $i<=6; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="filters__filter-group">
                        <h4 class="filters__filter-group__title">Wellness & Leisure</h4>
                        <div class="filters__checkboxes-group">
                            <?php
                            $wellness_terms = get_terms( array('taxonomy' => 'wellness-and-leisure', 'hide_empty' => false) );
                            if ( ! empty( $wellness_terms ) && ! is_wp_error( $wellness_terms ) ) {
                                foreach ( $wellness_terms as $term ) {
                                    echo '<label><input type="checkbox" name="wellness[]" value="' . esc_attr( $term->term_id ) . '"> ' . esc_html( $term->name ) . '</label>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="filters__filter-group">
                        <h4 class="filters__filter-group__title">Amenities</h4>
                        <div class="filters__checkboxes-group">
                             <?php
                            $amenity_terms = get_terms( array('taxonomy' => 'amenity', 'hide_empty' => false) );
                            if ( ! empty( $amenity_terms ) && ! is_wp_error( $amenity_terms ) ) {
                                foreach ( $amenity_terms as $term ) {
                                    echo '<label><input type="checkbox" name="amenities[]" value="' . esc_attr( $term->term_id ) . '"> ' . esc_html( $term->name ) . '</label>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="filters__filter-group">
                        <h4 class="filters__filter-group__title">Property Type</h4>
                        <div class="filters__checkboxes-group filters__checkboxes-group--cards">
                             <?php
                            $prop_types = get_terms( array('taxonomy' => 'property-type', 'hide_empty' => false) );
                            if ( ! empty( $prop_types ) && ! is_wp_error( $prop_types ) ) {
                                foreach ( $prop_types as $term ) {
                                    $slug = $term->slug;
                                    $svg = '';
                                    if( $slug === 'apartment' ) {
                                        $svg = '<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 34V8H8V0H26V16H34V34H20V26H14V34H0ZM2 32H8V26H2V32ZM2 24H8V18H2V24ZM2 16H8V10H2V16ZM10 24H16V18H10V24ZM10 16H16V10H10V16ZM10 8H16V2H10V8ZM18 24H24V18H18V24ZM18 16H24V10H18V16ZM18 8H24V2H18V8ZM26 32H32V26H26V32ZM26 24H32V18H26V24Z" fill="#585858"/></svg>';
                                    } elseif( $slug === 'chalet' ) {
                                        $svg = '<svg width="36" height="32" viewBox="0 0 36 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5005 15.538V12.8305L24.7695 14.5615L23.677 13.469L26.5005 10.646V8.538H24.3925L21.5695 11.3615L20.477 10.269L22.208 8.538H19.5005V7H22.208L20.477 5.269L21.5695 4.1765L24.3925 6.9615H26.5005V4.892L23.677 2.069L24.7695 0.976501L26.5005 2.7075V0H28.0385V2.7075L29.7695 0.976501L30.862 2.069L28.0385 4.892V7H30.1465L32.9695 4.1765L34.062 5.269L32.331 7H35.0385V8.538H32.331L34.062 10.269L32.9695 11.3615L30.1465 8.538H28.0385V10.646L30.862 13.469L29.7695 14.5615L28.0385 12.8305V15.538H26.5005ZM21.5465 24.696L19.2695 22.419V31.769H3.2695V22.369L1.377 24.2615L0 22.8845L11.2695 11.615L22.9235 23.269L21.5465 24.696ZM5.2695 29.769H10.2695V24.769H12.2695V29.769H17.2695V20.419L11.2695 14.419L5.2695 20.3805V29.769Z" fill="#585858"/></svg>';
                                    }
                                    
                                    echo '<label for="property-type-' . esc_attr($slug) . '">';
                                    echo '<input type="checkbox" name="property_type[]" id="property-type-' . esc_attr($slug) . '" value="' . esc_attr( $term->term_id ) . '">';
                                    if($svg) echo $svg;
                                    echo ' ' . esc_html( $term->name );
                                    echo '</label>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="filters__filter-group">
                        <h4 class="filters__filter-group__title">Location</h4>
                        <div class="filters__checkboxes-group">
                             <?php
                            $access_types = get_terms( array('taxonomy' => 'access-type', 'hide_empty' => false) );
                            if ( ! empty( $access_types ) && ! is_wp_error( $access_types ) ) {
                                foreach ( $access_types as $term ) {
                                    echo '<label><input type="checkbox" name="location[]" value="' . esc_attr( $term->term_id ) . '"> ' . esc_html( $term->name ) . '</label>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="filters__modal-footer">
                    <button type="button" class="filters__clear-btn" id="clear-filters">Clear all</button>
                    <button type="submit" class="filters__search-btn">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.2895 19.1152L10.9845 11.8102C10.4011 12.3068 9.73029 12.6912 8.97196 12.9634C8.21363 13.2356 7.4516 13.3717 6.68588 13.3717C4.81726 13.3717 3.23575 12.7249 1.94133 11.4313C0.647111 10.1377 0 8.55711 0 6.68967C0 4.82203 0.646819 3.24012 1.94046 1.94396C3.2341 0.647985 4.81464 0 6.68208 0C8.54972 0 10.1316 0.647111 11.4278 1.94133C12.7238 3.23575 13.3718 4.81726 13.3718 6.68587C13.3718 7.49651 13.2282 8.281 12.941 9.03933C12.6538 9.79767 12.2768 10.446 11.8102 10.9845L19.1152 18.2898L18.2895 19.1152ZM6.68588 12.2051C8.23385 12.2051 9.54071 11.6722 10.6065 10.6065C11.6722 9.5409 12.2051 8.23404 12.2051 6.68587C12.2051 5.13771 11.6722 3.83085 10.6065 2.76529C9.54071 1.69954 8.23385 1.16667 6.68588 1.16667C5.13771 1.16667 3.83085 1.69954 2.76529 2.76529C1.69954 3.83085 1.16667 5.13771 1.16667 6.68587C1.16667 8.23404 1.69954 9.5409 2.76529 10.6065C3.83085 11.6722 5.13771 12.2051 6.68588 12.2051Z" fill="white"/>
                        </svg>
                        <span>Search</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
  </div>
</section>

<section class="listing-grid">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/propertiesProducts/water-mark.svg" class="listing-grid__water-mark" alt="water-mark">
  <div class="container">
    <div class="listing-grid__text">
      <p class="listing-grid__text-count">Showing <span id="property-count"><?php echo $property_query->found_posts; ?></span> Properties</p>

      <select name="sort" id="property-sort" class="listing-grid__text-select">
        <option value="default">Sort by: Default</option>
        <option value="price_asc">Sort by: Price low to high</option>
        <option value="price_desc">Sort by: Price high to low</option>
      </select>
    </div>
    
    <div class="listing-grid__content" id="property-grid">
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

    <div class="listing-grid__actions" id="property-pagination">
        <?php
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'current'   => max( 1, $paged ),
            'total'     => $property_query->max_num_pages,
            'prev_text' => '<svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.30775 18.6155L0 9.30775L9.30775 0L10.3713 1.0635L2.127 9.30775L10.3713 17.552L9.30775 18.6155Z" fill="black"/></svg>',
            'next_text' => '<svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.0635 18.6155L0 17.552L8.24425 9.30775L0 1.0635L1.0635 0L10.3712 9.30775L1.0635 18.6155Z" fill="black"/></svg>',
            'type'      => 'list',
            'mid_size'  => 1,
        ) );
        ?>
    </div>

    <a href="#" class="listing-grid__mobile-action">Learn More</a>
  </div>
</section>

<?php get_footer(); ?>