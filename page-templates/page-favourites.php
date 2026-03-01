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
      <a href="<?php echo home_url('/'); ?>" class="breadcrumb__home">
        <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1.33333 19.718H6.25633V11.872H12.4103V19.718H17.3333V7.718L9.33333 1.66667L1.33333 7.718V19.718ZM0 21.0513V7.05133L9.33333 0L18.6667 7.05133V21.0513H11.077V13.2053H7.58967V21.0513H0Z" fill="#1F1F1F"/>
        </svg>
      </a>
      <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
      </svg>

      <span class="breadcrumb__current">Favourite</span>
    </div>
  </section>

  <section class="listing-grid">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/propertiesProducts/water-mark.svg" class="listing-grid__water-mark" alt="water-mark">
    <div class="container">
      <h4 class="section-title">FIND YOUR SAVED DESTINATIONS</h4>

      <div class="listing-grid__content listing-grid__content--favourites">
          <p>Loading your favorites...</p>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
