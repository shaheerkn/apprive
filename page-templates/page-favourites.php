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
      <img src="assets/images/partner_hero-winter.png" alt="work hero winter" class="for-winter">
      <img src="assets/images/partner__hero-summer.png" alt="work hero summer" class="for-summer">
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
      <a href="#" class="breadcrumb__home">
        <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1.33333 19.718H6.25633V11.872H12.4103V19.718H17.3333V7.718L9.33333 1.66667L1.33333 7.718V19.718ZM0 21.0513V7.05133L9.33333 0L18.6667 7.05133V21.0513H11.077V13.2053H7.58967V21.0513H0Z" fill="#1F1F1F"/>
        </svg>
      </a>
       <a href="#" class="breadcrumb__arrow">
          <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
          </svg>
        </a>
         <a href="#" class="breadcrumb__current">Favourite</a>
    </div>
  </section>

  <section class="listing-grid">
    <img src="./assets/images/propertiesProducts/water-mark.svg" class="listing-grid__water-mark" alt="water-mark">
    <div class="container">
      <h4 class="section-title">FIND YOUR SAVED DESTINATIONS</h4>
      <div class="listing-grid__content">
        <article class="listing-grid__item">
          <a href="#" class="listing-grid__image">
            <img src="./assets/images/propertiesProducts/one.png" alt="product" class="for-winter">
            <img src="./assets/images/propertiesProducts/one-summer.svg" class="for-summer" alt="summper">
          </a>
          <div class="listing-grid__info">
            <div class="listing-grid__info-header">
              <h5 class="text for-winter">Chalet Mazot Cannors</h5>
              <h5 class="text for-summer">Destiny Resort</h5>
              <button class="listing-grid__info-share"><img src="./assets/icons/share.svg" alt="share product"></button>
            </div>

            <div class="listing-grid__info-details">
              <p class="listing-grid__info-location for-winter">Courchevel 1850</p>
              <p class="listing-grid__info-features for-winter">Spa · Fireplace · Ski-in/ski-out</p>
              <p class="listing-grid__info-features for-summer">Infinity pool · Sea view · Direct beach access</p>
            </div>
            <p class="listing-grid__info-price">From <span>10,000€</span>/week</p>
          </div>
        </article>

        <article class="listing-grid__item">
          <a href="#" class="listing-grid__image">
            <img src="./assets/images/propertiesProducts/two.png" alt="product" class="for-winter">
            <img src="./assets/images/propertiesProducts/two-summer.svg" alt="product for summer" class="for-summer">
          </a>

          <div class="listing-grid__info">
            <div class="listing-grid__info-header">
              <h5 class="text for-winter">Chalet Mazot Cannors</h5>
              <h5 class="text for-summer">Destiny Resort</h5>
              <button class="listing-grid__info-share"><img src="./assets/icons/share.svg" alt="share product"></button>
            </div>

            <div class="listing-grid__info-details">
              <p class="listing-grid__info-location for-winter">Courchevel 1850</p>
              <p class="listing-grid__info-features for-winter">Spa · Fireplace · Ski-in/ski-out</p>
              <p class="listing-grid__info-features for-summer">Sunset lounge · Private terrace · Heated pool</p>
            </div>
            <p class="listing-grid__info-price">From <span>15,000€</span>/week</p>
          </div>
        </article>

        <article class="listing-grid__item">
          <a href="#" class="listing-grid__image">
            <img src="./assets/images/propertiesProducts/item-three-winter.png" alt="product" class="listing-grid__item-image for-winter">
            <img src="./assets/images/propertiesProducts/item-three-summer.png" alt="product" class="listing-grid__item-image for-summer">
          </a>

          <div class="listing-grid__info">
            <div class="listing-grid__info-header">
              <h5 class="text for-winter">Chalet Mazot Cannors</h5>
              <h5 class="text for-summer">Agios Ioannis</h5>
              <button class="listing-grid__info-share"><img src="./assets/icons/share.svg" alt="share product"></button>
            </div>

            <div class="listing-grid__info-details">
              <p class="listing-grid__info-location for-winter">Courchevel 1850</p>
              <p class="listing-grid__info-features for-winter">Spa · Fireplace · Ski-in/ski-out</p>
              <p class="listing-grid__info-features for-summer">Close to beach clubs · Outdoor dining · Cycladic design</p>
            </div>
            <p class="listing-grid__info-price">From <span>18,000€</span>/week</p>
          </div>
        </article>

        <article class="listing-grid__item">
          <a href="#" class="listing-grid__image">
            <img src="./assets/images/propertiesProducts/one.png" alt="product" class="for-winter">
            <img src="./assets/images/propertiesProducts/one-summer.svg" class="for-summer" alt="summper">
          </a>
          <div class="listing-grid__info">
            <div class="listing-grid__info-header">
              <h5 class="text for-winter">Chalet Mazot Cannors</h5>
              <h5 class="text for-summer">Destiny Resort</h5>
              <button class="listing-grid__info-share"><img src="./assets/icons/share.svg" alt="share product"></button>
            </div>

            <div class="listing-grid__info-details">
              <p class="listing-grid__info-location for-winter">Courchevel 1850</p>
              <p class="listing-grid__info-features for-winter">Spa · Fireplace · Ski-in/ski-out</p>
              <p class="listing-grid__info-features for-summer">Infinity pool · Sea view · Direct beach access</p>
            </div>
            <p class="listing-grid__info-price">From <span>10,000€</span>/week</p>
          </div>
        </article>

        <article class="listing-grid__item">
          <a href="#" class="listing-grid__image">
            <img src="./assets/images/propertiesProducts/two.png" alt="product" class="for-winter">
            <img src="./assets/images/propertiesProducts/two-summer.svg" alt="product for summer" class="for-summer">
          </a>

          <div class="listing-grid__info">
            <div class="listing-grid__info-header">
              <h5 class="text for-winter">Chalet Mazot Cannors</h5>
              <h5 class="text for-summer">Destiny Resort</h5>
              <button class="listing-grid__info-share"><img src="./assets/icons/share.svg" alt="share product"></button>
            </div>

            <div class="listing-grid__info-details">
              <p class="listing-grid__info-location for-winter">Courchevel 1850</p>
              <p class="listing-grid__info-features for-winter">Spa · Fireplace · Ski-in/ski-out</p>
              <p class="listing-grid__info-features for-summer">Sunset lounge · Private terrace · Heated pool</p>
            </div>
            <p class="listing-grid__info-price">From <span>15,000€</span>/week</p>
          </div>
        </article>

        <article class="listing-grid__item">
          <a href="#" class="listing-grid__image">
            <img src="./assets/images/propertiesProducts/item-three-winter.png" alt="product" class="listing-grid__item-image for-winter">
            <img src="./assets/images/propertiesProducts/item-three-summer.png" alt="product" class="listing-grid__item-image for-summer">
          </a>

          <div class="listing-grid__info">
            <div class="listing-grid__info-header">
              <h5 class="text for-winter">Chalet Mazot Cannors</h5>
              <h5 class="text for-summer">Agios Ioannis</h5>
              <button class="listing-grid__info-share"><img src="./assets/icons/share.svg" alt="share product"></button>
            </div>

            <div class="listing-grid__info-details">
              <p class="listing-grid__info-location for-winter">Courchevel 1850</p>
              <p class="listing-grid__info-features for-winter">Spa · Fireplace · Ski-in/ski-out</p>
              <p class="listing-grid__info-features for-summer">Close to beach clubs · Outdoor dining · Cycladic design</p>
            </div>
            <p class="listing-grid__info-price">From <span>18,000€</span>/week</p>
          </div>
        </article>
      </div>

      <div class="listing-grid__actions">
        <a href="#" class="btn btn--outline-primary">Load More</a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>