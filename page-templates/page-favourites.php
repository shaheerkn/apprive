<?php
/**
 * Template Name: Favourites
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

// Fetch favorites
$user_id = get_current_user_id();
$favorites = array();

if ( is_user_logged_in() ) {
    $favorites = get_user_meta( $user_id, 'favorite_properties', true );
}

if ( empty( $favorites ) || ! is_array( $favorites ) ) {
    $favorites = array( 0 ); // Force no results if empty
}

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type'      => 'property',
    'posts_per_page' => 12,
    'paged'          => $paged,
    'post__in'       => $favorites,
    'post_status'    => 'publish',
    'orderby'        => 'post__in', // Maintain order of favorites added (optional)
);

// If user is not logged in or has no favorites, ensure query returns nothing (or handle UI below)
if ( ! is_user_logged_in() || empty( $favorites ) || $favorites === array(0) ) {
    // If we passed array(0), WP_Query returns nothing, which is correct.
}

$property_query = new WP_Query( $args );
?>

<section class="hero">
    <div class="hero__img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner_hero-winter.png" alt="work hero winter" class="for-winter">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner__hero-summer.png" alt="work hero summer" class="for-summer">
    </div>
    <div class="hero__overlay"></div>
    <div class="container">
      <h1 class="hero__title">Find your saved destinations</h1>
      <p class="hero__description">Find your saved destinations all in one place, so you never lose track of the trips you love. Quickly revisit your favorites, plan future journeys, and stay inspired wherever you go.</p>
      <div class="hero__actions hero__partner-action">
        <a href="#" class="btn btn--solid--white">Request Your Stay</a>
      </div>
    </div>

  </section>

  <section class="breadcrumb breadcrumb__modifier breadcrumb__mobile-hide">
    <div class="container">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb__home">
        <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1.33333 19.718H6.25633V11.872H12.4103V19.718H17.3333V7.718L9.33333 1.66667L1.33333 7.718V19.718ZM0 21.0513V7.05133L9.33333 0L18.6667 7.05133V21.0513H11.077V13.2053H7.58967V21.0513H0Z" fill="#1F1F1F"/>
        </svg>
      </a>
       <a href="#" class="breadcrumb__arrow">
          <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
          </svg>
        </a>
         <span class="breadcrumb__current">Favourite</span>
    </div>
  </section>

  <section class="listing-grid">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/propertiesProducts/water-mark.svg" class="listing-grid__water-mark" alt="water-mark">
    <div class="container">
      <h4 class="section-title">FIND YOUR SAVED DESTINATIONS</h4>
      
      <?php if ( ! is_user_logged_in() ) : ?>
        <div class="listing-grid__empty">
            <p>Please <a href="<?php echo wp_login_url( get_permalink() ); ?>">login</a> to view your favorite properties.</p>
        </div>
      <?php else : ?>
      
        <div class="listing-grid__content">
            <?php
            if ( $property_query->have_posts() ) :
                while ( $property_query->have_posts() ) :
                    $property_query->the_post();
                    get_template_part( 'template-parts/property/card' );
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>You haven\'t saved any properties yet.</p>';
            endif;
            ?>
        </div>

        <div class="listing-grid__actions">
            <?php
            $big = 999999999;
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

      <?php endif; ?>
    </div>
  </section>

<?php get_footer(); ?>
