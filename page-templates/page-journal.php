<?php
/**
 * Template Name: Journal
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

<section class="hero journal-hero">
  <div class="hero__img">
    <img src="assets/images/journal-hero__winter.png" alt="" class="for-winter">
    <img src="assets/images/join-us-hero-winter.png" alt="" class="for-summer">
  </div>
  <div class="hero__overlay"></div>
  <div class="container">
    <h1 class="hero__title">Journal — Insights & Inspirations by AR PRIVÉ</h1>
    <p class="hero__description">Stories of places, experiences and discreet luxury.</p>
    <p class="hero__description-secondary">Curated perspectives from Courchevel, Mykonos and destinations where refined living <br> takes shape</p>
  </div>
</section>

<section class="breadcrumb">
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
      <a href="#" class="breadcrumb__current">Journal</a>
      <a href="#" class="breadcrumb-arrow__mobile">
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1.60104 6.25L6.42792 11.0769L5.83333 11.6667L0 5.83333L5.83333 0L6.42792 0.589792L1.60104 5.41667H11.6667V6.25H1.60104Z" fill="#1F1F1F"/>
        </svg>
      </a>
  </div>
</section>

<section class="journal-header section">
  <div class="container">
    <div class="journal-header__content">
      <p class="text">
        Our journal is a curated selection of insights, experiences and moments that reflect our approach to refined travel, private access and quiet luxury.
      </p>
    </div>

    <div class="journal-header__controls">
      <div class="journal-header__field">
        <select class="journal-header__select">
          <option value="all">All articles</option>
          <option value="travel">Refined Travel</option>
          <option value="luxury">Quiet Luxury</option>
        </select>
        <span class="journal-header__arrow"></span>
      </div>

      <div class="journal-header__field journal-header__field--search">
        <input type="text" class="journal-header__input" placeholder="Search article">
        <button type="button" class="journal-header__search-btn">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.9023 21.846L12.5537 13.4973C11.887 14.0649 11.1203 14.5042 10.2537 14.8153C9.387 15.1264 8.51611 15.282 7.641 15.282C5.50544 15.282 3.698 14.5428 2.21867 13.0643C0.739555 11.5859 0 9.77955 0 7.64533C0 5.51089 0.739222 3.703 2.21767 2.22167C3.69611 0.740554 5.50244 0 7.63667 0C9.77111 0 11.579 0.739555 13.0603 2.21867C14.5414 3.698 15.282 5.50544 15.282 7.641C15.282 8.56744 15.1179 9.464 14.7897 10.3307C14.4614 11.1973 14.0307 11.9383 13.4973 12.5537L21.846 20.9027L20.9023 21.846ZM7.641 13.9487C9.41011 13.9487 10.9037 13.3397 12.1217 12.1217C13.3397 10.9039 13.9487 9.41033 13.9487 7.641C13.9487 5.87167 13.3397 4.37811 12.1217 3.16033C10.9037 1.94233 9.41011 1.33333 7.641 1.33333C5.87167 1.33333 4.37811 1.94233 3.16033 3.16033C1.94233 4.37811 1.33333 5.87167 1.33333 7.641C1.33333 9.41033 1.94233 10.9039 3.16033 12.1217C4.37811 13.3397 5.87167 13.9487 7.641 13.9487Z" fill="black"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>

<section class="journal-articles section">
  <div class="container">
    <div class="journal-articles__grid">
      <article class="journal-card">
        <a href="#" class="journal-card__image-wrapper">
          <img src="./assets/images/journal-article__one.png" alt="Mountain View" class="journal-card__image">
        </a>
        <div class="journal-card__content">
          <span class="journal-card__location">COURCHEVEL</span>
          <h3 class="journal-card__title">A Private Way to Experience Mykonos by Sea</h3>
          <p class="journal-card__excerpt">
            Discover hidden coves, discreet yacht routes and a quieter rhythm of island life.
          </p>
          <a href="#" class="journal-card__link">Read more</a>
        </div>
      </article>

      <article class="journal-card">
        <a href="#" class="journal-card__image-wrapper">
          <img src="./assets/images/journal-article__two.png" alt="Gym Interior" class="journal-card__image">
        </a>
        <div class="journal-card__content">
          <span class="journal-card__location">COURCHEVEL</span>
          <h3 class="journal-card__title">A Private Way to Experience Mykonos by Sea</h3>
          <p class="journal-card__excerpt">
            Discover hidden coves, discreet yacht routes and a quieter rhythm of island life.
          </p>
          <a href="#" class="journal-card__link">Read more</a>
        </div>
      </article>

      <article class="journal-card">
        <div class="journal-card__image-wrapper">
          <img src="./assets/images/journal-article__three.png" alt="Modern Bedroom" class="journal-card__image">
        </div>
        <div class="journal-card__content">
          <span class="journal-card__location">COURCHEVEL</span>
          <h3 class="journal-card__title">A Private Way to Experience Mykonos by Sea</h3>
          <p class="journal-card__excerpt">
            Discover hidden coves, discreet yacht routes and a quieter rhythm of island life.
          </p>
          <a href="#" class="journal-card__link">Read more</a>
        </div>
      </article>

      <article class="journal-card">
        <a href="#" class="journal-card__image-wrapper">
          <img src="./assets/images/journal-article__one.png" alt="Mountain View" class="journal-card__image">
        </a>
        <div class="journal-card__content">
          <span class="journal-card__location">COURCHEVEL</span>
          <h3 class="journal-card__title">A Private Way to Experience Mykonos by Sea</h3>
          <p class="journal-card__excerpt">
            Discover hidden coves, discreet yacht routes and a quieter rhythm of island life.
          </p>
          <a href="#" class="journal-card__link">Read more</a>
        </div>
      </article>

      <article class="journal-card">
        <a href="#" class="journal-card__image-wrapper">
          <img src="./assets/images/journal-article__two.png" alt="Gym Interior" class="journal-card__image">
        </a>
        <div class="journal-card__content">
          <span class="journal-card__location">COURCHEVEL</span>
          <h3 class="journal-card__title">A Private Way to Experience Mykonos by Sea</h3>
          <p class="journal-card__excerpt">
            Discover hidden coves, discreet yacht routes and a quieter rhythm of island life.
          </p>
          <a href="#" class="journal-card__link">Read more</a>
        </div>
      </article>

      <article class="journal-card">
        <div class="journal-card__image-wrapper">
          <img src="./assets/images/journal-article__three.png" alt="Modern Bedroom" class="journal-card__image">
        </div>
        <div class="journal-card__content">
          <span class="journal-card__location">COURCHEVEL</span>
          <h3 class="journal-card__title">A Private Way to Experience Mykonos by Sea</h3>
          <p class="journal-card__excerpt">
            Discover hidden coves, discreet yacht routes and a quieter rhythm of island life.
          </p>
          <a href="#" class="journal-card__link">Read more</a>
        </div>
      </article>
    </div>
  </div>
</section>

<?php get_footer(); ?>