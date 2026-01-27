<?php
/**
 * Single Property Template
 *
 * Displays a single property post with dynamic breadcrumbs, ACF fields, and modular template parts.
 *
 * @package arprive
 */

get_header();

// Get destination taxonomy for breadcrumbs (T098-T100)
$destination = get_field( 'prop_location_taxonomy' );
?>

<section class="breadcrumb breadcrumb__modifier">
	<div class="container single-chalet__links">
		<!-- Home breadcrumb link (T097) -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb__home">
			<svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1.33333 19.718H6.25633V11.872H12.4103V19.718H17.3333V7.718L9.33333 1.66667L1.33333 7.718V19.718ZM0 21.0513V7.05133L9.33333 0L18.6667 7.05133V21.0513H11.077V13.2053H7.58967V21.0513H0Z" fill="#1F1F1F"/>
			</svg>
		</a>

		<?php if ( $destination && ! is_wp_error( $destination ) ) : ?>
			<!-- Breadcrumb arrow separator -->
			<span class="breadcrumb__arrow">
				<svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
				</svg>
			</span>

			<!-- Destination breadcrumb (T098-T100, T103) -->
			<a href="<?php echo esc_url( get_term_link( $destination ) ); ?>" class="breadcrumb__current">
				<?php echo esc_html( $destination->name ); ?>
			</a>
		<?php endif; ?>

		<!-- Breadcrumb arrow separator -->
		<span class="breadcrumb__arrow">
			<svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
			</svg>
		</span>

		<!-- Property name breadcrumb (T101, T103) -->
		<span class="breadcrumb__current"><?php the_title(); ?></span>

		<!-- Mobile back arrow -->
		<?php if ( $destination && ! is_wp_error( $destination ) ) : ?>
			<a href="<?php echo esc_url( get_term_link( $destination ) ); ?>" class="breadcrumb-arrow__mobile">
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1.60104 6.25L6.42792 11.0769L5.83333 11.6667L0 5.83333L5.83333 0L6.42792 0.589792L1.60104 5.41667H11.6667V6.25H1.60104Z" fill="#1F1F1F"/>
				</svg>
			</a>
		<?php else : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="breadcrumb-arrow__mobile">
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1.60104 6.25L6.42792 11.0769L5.83333 11.6667L0 5.83333L5.83333 0L6.42792 0.589792L1.60104 5.41667H11.6667V6.25H1.60104Z" fill="#1F1F1F"/>
				</svg>
			</a>
		<?php endif; ?>
	</div>
</section>

<section class="product-detail section">
  <div class="container">
    <?php
    /**
     * Property Header Template Part
     * Displays: title, location, action buttons (favorite/share), pricing, and specifications
     * Implemented in T038-T049: User Story 1 - Property Information Display
     */
    get_template_part( 'template-parts/property/header' );
    ?>
  </div>
</section>

<?php
/**
 * Key Features Template Part
 * Displays key features from prop_key_features repeater with icons
 * Implemented in T054-T061: User Story 3 - Amenities and Features Organization
 */
get_template_part( 'template-parts/property/key-features' );
?>

<?php
/**
 * About the Chalet Template Part
 * Displays post content (the_content) for About the Chalet section
 * Implemented in T067-T069: User Story 3 - Amenities and Features Organization
 */
get_template_part( 'template-parts/property/about' );
?>

<?php
/**
 * Room & Space Details Template Part
 * Displays room details from prop_room_details repeater with icons and optional gallery
 * Implemented in T062-T064, T072: User Story 3 - Amenities and Features Organization
 */
get_template_part( 'template-parts/property/room-details' );
?>

<?php
/**
 * In-Chalet Services Template Part
 * Displays services from prop_services repeater with icons
 * Implemented in T065-T066, T073: User Story 3 - Amenities and Features Organization
 */
get_template_part( 'template-parts/property/services' );
?>

<section class="key-features location-context">
  <div class="key-features__container">
    <h2 class="key-features-title">LOCATION CONTEXT</h2>

    <h4 class="location-context__subTitle">Location</h4>
    <p class="location-context__text">Courchevel 1850 – Bellecôte Area</p>
    <div class="key-features__list">
      <ul>
        <li>
          <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#66A1B1"/>
            </svg>
          </span>
          3 minutes from main slopes
        </li>
        <li>
          <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#66A1B1"/>
            </svg>
          </span>
          Immediate access to ski-in / ski-out
        </li>
        <li>
          <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#66A1B1"/>
            </svg>
          </span>
          Close to Michelin restaurants and luxury boutiques
        </li>
        <li>
          <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#66A1B1"/>
            </svg>
          </span>
          Quiet, private, and prestigious neighborhood
        </li>
      </ul>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/location-context-winter.svg" class="for-winter" alt="location">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/location-context-summer.svg" class="for-summer" alt="location">
    </div>
  </div>
</section>

<section class="key-features information">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chalet-info__water-mark.svg" alt="water-mark">
  <div class="key-features__container">
    <h2 class="key-features-title">GOOD TO KNOW</h2>
    <h4>Useful information</h4>
    <div class="key-features__list">
      <ul>
        <li>
          <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#5A98C0"/>
            </svg>
          </span>
          Check-in: after 16:00
        </li>
        <li>
          <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#5A98C0"/>
            </svg>
          </span>
          Check-out: before 10:00
        </li>
        <li>
          <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#5A98C0"/>
            </svg>
          </span>
          Pets on request
        </li>
      </ul>
      <ul>
        <li>
          <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#5A98C0"/>
            </svg>
          </span>
          Dedicated ski room
        </li>
        <li>
          <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 0L15.2411 8.75891L24 12L15.2411 15.2411L12 24L8.75891 15.2411L0 12L8.75891 8.75891L12 0Z" fill="#5A98C0"/>
            </svg>
          </span>
          Private elevator
        </li>
      </ul>
    </div>
  </div>
</section>

<section class="featured key-features">
  <div class="key-features__container">
    <h2 class="key-features-title">YOU MAY ALSO LIKE</h2>
    <div class="swiper featured-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/featured-product_for-winter.svg" class="for-winter" alt="featured-product">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/featured-product-for-summer.svg" class="for-summer" alt="featured-product">
            <div class="showcase__details">
              <div class="showcase__info">
                <div>
                  <h6 class="showcase__name for-winter">Chalet Mazot Cannors</h6>
                  <h6 class="showcase__name for-summer">Destiny Resort</h6>
                  <p class="showcase__location for-winter">Courchevel 1850</p>
                  <p class="showcase__location for-summer">Infinity pool · Sea view · Direct </p>
                </div>
                <div class="showcase__capacity">
                  <p class="featured-cpacity">10 Guests</p>
                </div>
              </div>
              <p class="showcase__amenities for-winter">Spa · Fireplace · Ski-in/ski-out</p>
              <p class="showcase__amenities for-summer">beach access</p>
              <a href="#" class="showcase__link">View Property <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-up.svg" alt="arrow" class="showcase__arrow"></a>
            </div>
        </div>
        <div class="swiper-slide">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/feature-silde-two-winter.svg" class="for-winter" alt="featured-product">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/feautured-slide-two-summer.svg" class="for-summer" alt="featured-product">
              <div class="showcase__details">
              <div class="showcase__info">
                <div>
                  <h6 class="showcase__name for-winter">Chalet Mazot Cannors</h6>
                  <h6 class="showcase__name for-summer">Villa Amra</h6>
                  <p class="showcase__location for-winter">Courchevel 1850</p>
                  <p class="showcase__location for-summer">Sunset lounge · Private terrace · </p>
                </div>
                <div class="showcase__capacity">
                  <p class="featured-cpacity">10 Guests</p>
                </div>
              </div>
              <p class="showcase__amenities for-winter">Spa · Fireplace · Ski-in/ski-out</p>
              <p class="showcase__amenities for-summer">Heated pool</p>
              <a href="#" class="showcase__link">View Property <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-up.svg" alt="arrow" class="showcase__arrow"></a>
            </div>
        </div>
        <div class="swiper-slide">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/featured-product_for-winter.svg" alt="featured-product">
              <div class="showcase__details">
              <div class="showcase__info">
                <div>
                  <h6 class="showcase__name">Chalet Mazot Cannors</h6>
                  <p class="showcase__location">Courchevel 1850</p>
                </div>
                <div class="showcase__capacity">
                  <p class="featured-cpacity">10 Guests</p>
                </div>
              </div>
              <p class="showcase__amenities">Spa · Fireplace · Ski-in/ski-out</p>
              <a href="#" class="showcase__link">Request Availability <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-up.svg" alt="arrow" class="showcase__arrow"></a>
            </div>
        </div>
      </div>
    </div>
    <div class="pagination">
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
