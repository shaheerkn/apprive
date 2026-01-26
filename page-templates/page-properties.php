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
?>

<section class="breadcrumb breadcrumb__modifier">
  <div class="container single-chalet__links">
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

        <a href="#" class="breadcrumb__current">Courchevel</a>

      <a href="#" class="breadcrumb__arrow">
        <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
        </svg>
      </a>
      <a href="#" class="breadcrumb__current">Properties</a>
      <a href="#" class="breadcrumb-arrow__mobile">
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1.60104 6.25L6.42792 11.0769L5.83333 11.6667L0 5.83333L5.83333 0L6.42792 0.589792L1.60104 5.41667H11.6667V6.25H1.60104Z" fill="#1F1F1F"/>
        </svg>
      </a>
  </div>
</section>

<section class="filters-panel">
  <div class="container">
    <div class="filters-panel__header">
      <h4 class="section-title">Private Chalets & Villas Portfolio</h4>
      <h4 class="filters-panel__subtitle">Find the best stay of your dreams</h4>
      <p class="filters-panel__text">Explore a curated selection of private chalets and villas, carefully chosen for location, design and privacy. All properties are available on request and supported by full private concierge service.</p>
    </div>

    <div class="filters-panel__inputs">
      <div class="filters-panel__inputs-container">
        <label for="#">DESTINATION</label>

        <div class="filters-panel__inputs-selection">
          <button>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18.2895 19.1152L10.9845 11.8102C10.4011 12.3068 9.73029 12.6912 8.97196 12.9634C8.21363 13.2356 7.4516 13.3717 6.68588 13.3717C4.81726 13.3717 3.23575 12.7249 1.94133 11.4313C0.647111 10.1377 0 8.55711 0 6.68967C0 4.82203 0.646819 3.24012 1.94046 1.94396C3.2341 0.647985 4.81464 0 6.68208 0C8.54972 0 10.1316 0.647111 11.4278 1.94133C12.7238 3.23575 13.3718 4.81726 13.3718 6.68587C13.3718 7.49651 13.2282 8.281 12.941 9.03933C12.6538 9.79767 12.2768 10.446 11.8102 10.9845L19.1152 18.2898L18.2895 19.1152ZM6.68588 12.2051C8.23385 12.2051 9.54071 11.6722 10.6065 10.6065C11.6722 9.5409 12.2051 8.23404 12.2051 6.68587C12.2051 5.13771 11.6722 3.83085 10.6065 2.76529C9.54071 1.69954 8.23385 1.16667 6.68588 1.16667C5.13771 1.16667 3.83085 1.69954 2.76529 2.76529C1.69954 3.83085 1.16667 5.13771 1.16667 6.68587C1.16667 8.23404 1.69954 9.5409 2.76529 10.6065C3.83085 11.6722 5.13771 12.2051 6.68588 12.2051Z" fill="#2C2C2C"/>
            </svg>
          </button>
          <select name="#" id="#" class="filters-panel__inputs-values">
            <option value="#">Search Station</option>
            <option value="#">Searh Station</option>
          </select>
        </div>
      </div>

      <div class="filters-panel__inputs-container">
        <label for="#">Check in Date</label>
        <input type="date" name="#" id="#" class="filters-panel__inputs-values">
      </div>

      <div class="filters-panel__inputs-container">
        <label for="#">Check out Date</label>
        <input type="date" name="#" id="#" class="filters-panel__inputs-values">
      </div>

      <div class="filters-panel__inputs-container">
        <label for="#">Guests</label>
        <select name="#" id="#" class="filters-panel__inputs-values">
          <option value="04">04</option>
          <option value="05">04</option>
          <option value="06">06</option>
        </select>
      </div>
      <div class="filters-panel-btn">
        <button class="filter-btn"><img src="./assets/icons/filter.svg" alt="filter"></button>
        <button><img src="./assets/icons/icon-search.svg" alt="filter"></button>
      </div>

      <div class="filters-panel__filter-modal">
        <button class="filters-panel__filter-modal__close">
          <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.825708 14.7181L0 13.8924L6.53333 7.35904L0 0.825708L0.825708 0L7.35904 6.53333L13.8924 0L14.7181 0.825708L8.18475 7.35904L14.7181 13.8924L13.8924 14.7181L7.35904 8.18475L0.825708 14.7181Z" fill="black"/>
          </svg>
        </button>
        <h3>Filters</h3>

      <div class="filters-panel__filter-modal__body">
        <div class="filters-panel__filter-group">
          <h4 class="filters-panel__filter-group__title">Price Range</h4>

          <div class="filters-panel__price-range">
            <input type="range" min="0" max="25000" value="25000">

            <div class="filters-panel__price-range__text">
              <span>0 €</span>
              <span>+ 25,000 €</span>
            </div>
          </div>
        </div>

        <div class="filters-panel__filter-group">
          <h4 class="filters-panel__filter-group__title">Bedrooms & beds</h4>

          <div class="filters-panel__filter-subgroup">
            <p>Bedrooms</p>
            <div class="filters-panel__pill-group filters-panel__pill-hide">
              <button class="filters-panel__pill active">All</button>
              <button class="filters-panel__pill">Studio</button>
              <button class="filters-panel__pill">1</button>
              <button class="filters-panel__pill">2</button>
              <button class="filters-panel__pill">3</button>
              <button class="filters-panel__pill">4</button>
              <button class="filters-panel__pill">5</button>
              <button class="filters-panel__pill">6+</button>
            </div>

            <div class="filters-panel__pill-mobile">
              <input type="checkbox" id="dropdown-toggle" class="dropdown-state">

              <label for="dropdown-toggle" class="custom-select-trigger">
                <span>All</span>
                <div class="arrow">
                  <svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.42313 5.01292L0 0.589792L0.589792 0L4.42313 3.83333L8.25646 0L8.84625 0.589792L4.42313 5.01292Z" fill="#2C2C2C"/>
                  </svg>

                </div>
              </label>

              <ul class="custom-options">
                <li><label for="dropdown-toggle">All</label></li>
                <li><label for="dropdown-toggle">More Options</label></li>
              </ul>
            </div>
          </div>

          <div class="filters-panel__filter-subgroup">
            <p>Beds</p>
            <div class="filters-panel__pill-group filters-panel__pill-hide">
              <button class="filters-panel__pill active">All</button>
              <button class="filters-panel__pill">1</button>
              <button class="filters-panel__pill">2</button>
              <button class="filters-panel__pill">3</button>
              <button class="filters-panel__pill">4</button>
              <button class="filters-panel__pill">5</button>
              <button class="filters-panel__pill">6</button>
              <button class="filters-panel__pill">7</button>
              <button class="filters-panel__pill">8+</button>
            </div>

            <div class="filters-panel__pill-mobile">
              <input type="checkbox" id="dropdown-toggle" class="dropdown-state">

              <label for="dropdown-toggle" class="custom-select-trigger">
                <span>All</span>
                <div class="arrow">
                  <svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.42313 5.01292L0 0.589792L0.589792 0L4.42313 3.83333L8.25646 0L8.84625 0.589792L4.42313 5.01292Z" fill="#2C2C2C"/>
                  </svg>
                </div>
              </label>

              <ul class="custom-options">
                <li><label for="dropdown-toggle">All</label></li>
                <li><label for="dropdown-toggle">More Options</label></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="filters-panel__filter-group">
          <h4 class="filters-panel__filter-group__title">Wellness & Leisure</h4>

          <div class="filters-panel__checkbox-grid">
            <label><input type="checkbox"> Fitness room</label>
            <label><input type="checkbox"> Hammam</label>
            <label><input type="checkbox"> Indoor jacuzzi</label>
            <label><input type="checkbox"> Nordic bath</label>
            <label><input type="checkbox"> Outdoor swimming pool</label>
            <label><input type="checkbox"> Snooker</label>
            <label><input type="checkbox"> Game room</label>
            <label><input type="checkbox"> Home cinema room</label>
            <label><input type="checkbox"> Indoor swimming pool</label>
            <label><input type="checkbox"> Outdoor jacuzzi</label>
            <label><input type="checkbox"> Sauna</label>
          </div>
        </div>

        <div class="filters-panel__filter-group">
          <h4 class="filters-panel__filter-group__title">Amenities</h4>

          <div class="filters-panel__checkbox-grid filters-panel__checkbox-grid--two">
            <label><input type="checkbox"> Elevator</label>
            <label><input type="checkbox"> Baby cot</label>
            <label><input type="checkbox"> Wood fireplace</label>
          </div>
        </div>

        <div class="filters-panel__filter-group">
          <h4 class="filters-panel__filter-group__title">Property Type</h4>

          <div class="filters-panel__checkbox-grid filters-panel__property-group">
            <label><input type="checkbox">
              <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 34V8H8V0H26V16H34V34H20V26H14V34H0ZM2 32H8V26H2V32ZM2 24H8V18H2V24ZM2 16H8V10H2V16ZM10 24H16V18H10V24ZM10 16H16V10H10V16ZM10 8H16V2H10V8ZM18 24H24V18H18V24ZM18 16H24V10H18V16ZM18 8H24V2H18V8ZM26 32H32V26H26V32ZM26 24H32V18H26V24Z" fill="#585858"/>
              </svg>
              Apartment
            </label>
              <label><input type="checkbox">
                <svg width="36" height="32" viewBox="0 0 36 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M26.5005 15.538V12.8305L24.7695 14.5615L23.677 13.469L26.5005 10.646V8.538H24.3925L21.5695 11.3615L20.477 10.269L22.208 8.538H19.5005V7H22.208L20.477 5.269L21.5695 4.1765L24.3925 6.9615H26.5005V4.892L23.677 2.069L24.7695 0.976501L26.5005 2.7075V0H28.0385V2.7075L29.7695 0.976501L30.862 2.069L28.0385 4.892V7H30.1465L32.9695 4.1765L34.062 5.269L32.331 7H35.0385V8.538H32.331L34.062 10.269L32.9695 11.3615L30.1465 8.538H28.0385V10.646L30.862 13.469L29.7695 14.5615L28.0385 12.8305V15.538H26.5005ZM21.5465 24.696L19.2695 22.419V31.769H3.2695V22.369L1.377 24.2615L0 22.8845L11.2695 11.615L22.9235 23.269L21.5465 24.696ZM5.2695 29.769H10.2695V24.769H12.2695V29.769H17.2695V20.419L11.2695 14.419L5.2695 20.3805V29.769Z" fill="#585858"/>
                </svg>
              Chalet
            </label>
          </div>
        </div>

        <div class="filters-panel__filter-group">
          <h4 class="filters-panel__filter-group__title">Location</h4>

          <div class="filters-panel__checkbox-grid">
            <label><input type="checkbox"> Centre</label>
            <label><input type="checkbox"> Ski-out</label>
            <label><input type="checkbox"> Ski-in Ski-out</label>
            <label><input type="checkbox"> Near slopes</label>
            <label><input type="checkbox"> Near Ski school</label><br>
            <label><input type="checkbox"> Ski-in</label>
            <label><input type="checkbox"> Near the center</label>
          </div>
        </div>
      </div>

      <div class="filters-panel__filter-modal__footer">
        <button class="filters-panel__clear-btn">Clear all</button>
        <button class="filters-panel__search-btn">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18.2895 19.1152L10.9845 11.8102C10.4011 12.3068 9.73029 12.6912 8.97196 12.9634C8.21363 13.2356 7.4516 13.3717 6.68588 13.3717C4.81726 13.3717 3.23575 12.7249 1.94133 11.4313C0.647111 10.1377 0 8.55711 0 6.68967C0 4.82203 0.646819 3.24012 1.94046 1.94396C3.2341 0.647985 4.81464 0 6.68208 0C8.54972 0 10.1316 0.647111 11.4278 1.94133C12.7238 3.23575 13.3718 4.81726 13.3718 6.68587C13.3718 7.49651 13.2282 8.281 12.941 9.03933C12.6538 9.79767 12.2768 10.446 11.8102 10.9845L19.1152 18.2898L18.2895 19.1152ZM6.68588 12.2051C8.23385 12.2051 9.54071 11.6722 10.6065 10.6065C11.6722 9.5409 12.2051 8.23404 12.2051 6.68587C12.2051 5.13771 11.6722 3.83085 10.6065 2.76529C9.54071 1.69954 8.23385 1.16667 6.68588 1.16667C5.13771 1.16667 3.83085 1.69954 2.76529 2.76529C1.69954 3.83085 1.16667 5.13771 1.16667 6.68587C1.16667 8.23404 1.69954 9.5409 2.76529 10.6065C3.83085 11.6722 5.13771 12.2051 6.68588 12.2051Z" fill="white"/>
          </svg>
          <span>Search</span>
        </button>
      </div>
      </div>
      </div>
  </div>
</section>

<section class="listing-grid">
  <img src="./assets/images/propertiesProducts/water-mark.svg" class="listing-grid__water-mark" alt="water-mark">
  <div class="container">
    <div class="listing-grid__text">
      <p class="listing-grid__text-count">Showing <span>548</span> Properties</p>

      <select name="#" id="#" class="listing-grid__text-select">
        <option value="#">Sort by: Price low to high</option>
        <option value="#">Sort by: Price low to high</option>
        <option value="#">Sort by: Price low to high</option>
        <option value="#">Sort by: Price low to high</option>
        <option value="#">Sort by: Price low to high</option>
      </select>
    </div>
    <div class="listing-grid__content">
      <article class="listing-grid__item">
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
        <button class="listing-grid-fav"><img src="./assets/icons/fav.svg" alt="favorites"></button>

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
      <button class="listing-grid__actions-prev">
        <svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.30775 18.6155L0 9.30775L9.30775 0L10.3713 1.0635L2.127 9.30775L10.3713 17.552L9.30775 18.6155Z" fill="black"/>
        </svg>
      </button>
      <button class="listing-grid__actions-page">1</button>
      <button class="listing-grid__actions-page">2</button>
      <button class="listing-grid__actions-page">3</button>
      <div class="listing-grid__actions-dots">
        <span class="listing-grid__actions-dot"></span>
        <span class="listing-grid__actions-dot"></span>
        <span class="listing-grid__actions-dot"></span>
      </div>
      <button class="listing-grid__actions-page">19</button>
      <button class="listing-grid__actions-page">20</button>
      <button class="listing-grid__actions-next">
        <svg width="11" height="19" viewBox="0 0 11 19" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1.0635 18.6155L0 17.552L8.24425 9.30775L0 1.0635L1.0635 0L10.3712 9.30775L1.0635 18.6155Z" fill="black"/>
        </svg>
      </button>
    </div>

    <a href="#" class="listing-grid__mobile-action">Learn More</a>
  </div>
</section>

<section class="brand-values">
  <div class="container">
    <div class="brand-values__item">
      <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M40 67.3715L8.65417 29.7432L17.6925 11.6665H62.3075L71.3458 29.7432L40 67.3715ZM29.3908 28.3332H50.6092L43.9425 14.9998H36.0575L29.3908 28.3332ZM38.3333 60.1982V31.6665H14.6408L38.3333 60.1982ZM41.6667 60.1982L65.3592 31.6665H41.6667V60.1982ZM54.3075 28.3332H66.8592L60.1925 14.9998H47.6408L54.3075 28.3332ZM13.1408 28.3332H25.6925L32.3592 14.9998H19.8075L13.1408 28.3332Z" fill="white"/>
      </svg>
      <p class="brand-values__item-title">Luxury</p>
      <p class="brand-values__item-description">Refined hospitality and exceptional attention to detail.</p>
    </div>

    <div class="brand-values__item">
      <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M39.0067 66.4744C39.4422 66.4744 39.8886 66.376 40.3459 66.1794C40.8031 65.9833 41.1728 65.7441 41.455 65.4619L67.4425 39.4744C68.2797 38.6371 68.9261 37.7805 69.3817 36.9044C69.8367 36.0283 70.0642 35.0666 70.0642 34.0194C70.0642 32.9594 69.8367 31.9305 69.3817 30.9327C68.9261 29.9349 68.2797 29.0235 67.4425 28.1985L54.9425 15.6985C54.1175 14.8613 53.2703 14.2471 52.4009 13.856C51.5309 13.4649 50.5661 13.2694 49.5067 13.2694C48.4595 13.2694 47.4872 13.4649 46.59 13.856C45.6922 14.2471 44.8461 14.8613 44.0517 15.6985L41.1475 18.6027L47.3142 24.7885C47.9764 25.438 48.47 26.1774 48.795 27.0069C49.1195 27.8358 49.2817 28.6774 49.2817 29.5319C49.2817 31.2674 48.7145 32.7024 47.58 33.8369C46.4456 34.9713 45.0109 35.5385 43.2759 35.5385C42.4209 35.5385 41.5864 35.4083 40.7725 35.1477C39.9586 34.8871 39.2267 34.4319 38.5767 33.7819L32.1984 27.4235L17.8075 41.8144C17.4703 42.1521 17.2172 42.5358 17.0484 42.9652C16.8795 43.3946 16.795 43.8271 16.795 44.2627C16.795 45.0494 17.0472 45.698 17.5517 46.2085C18.0556 46.7191 18.7009 46.9744 19.4875 46.9744C19.9231 46.9744 20.3695 46.876 20.8267 46.6794C21.2839 46.4833 21.6536 46.2441 21.9359 45.9619L32.5 35.3977L34.8592 37.7569L24.3142 48.321C23.9764 48.6583 23.7231 49.0416 23.5542 49.471C23.3859 49.9005 23.3017 50.3333 23.3017 50.7694C23.3017 51.5133 23.5645 52.148 24.09 52.6735C24.6156 53.1991 25.25 53.4619 25.9934 53.4619C26.4295 53.4619 26.8761 53.3635 27.3334 53.1669C27.7906 52.9702 28.1603 52.7308 28.4425 52.4485L39.7759 41.1352L42.135 43.4935L30.8209 54.8269C30.5259 55.1091 30.2834 55.4788 30.0934 55.936C29.9028 56.3933 29.8075 56.8399 29.8075 57.276C29.8075 58.0194 30.0703 58.6538 30.5959 59.1794C31.122 59.7055 31.7567 59.9685 32.5 59.9685C32.9361 59.9685 33.3689 59.8841 33.7984 59.7152C34.2278 59.5463 34.6111 59.293 34.9484 58.9552L46.2817 47.641L48.6409 50.0002L37.3075 61.3335C36.9703 61.6713 36.7172 62.0763 36.5484 62.5485C36.3795 63.0208 36.295 63.4533 36.295 63.846C36.295 64.6327 36.5717 65.2674 37.125 65.7502C37.6784 66.233 38.3056 66.4744 39.0067 66.4744ZM38.9875 69.8077C37.2736 69.8077 35.8067 69.1808 34.5867 67.9269C33.3667 66.6724 32.8314 65.1241 32.9809 63.2819C31.092 63.3035 29.5192 62.7396 28.2625 61.5902C27.0064 60.4402 26.4103 58.8355 26.4742 56.776C24.4147 56.7971 22.792 56.2085 21.6059 55.0102C20.4197 53.8113 19.8803 52.231 19.9875 50.2694C18.1325 50.291 16.5811 49.7696 15.3334 48.7052C14.0856 47.6413 13.4617 46.1605 13.4617 44.2627C13.4617 43.4083 13.6272 42.5527 13.9584 41.696C14.2895 40.8388 14.7797 40.0855 15.4292 39.436L32.1984 22.686L40.8075 31.2952C41.0897 31.5902 41.4381 31.8327 41.8525 32.0227C42.267 32.2127 42.735 32.3077 43.2567 32.3077C43.97 32.3077 44.6003 32.0588 45.1475 31.561C45.6947 31.0633 45.9684 30.4146 45.9684 29.6152C45.9684 29.0941 45.8731 28.6263 45.6825 28.2119C45.4925 27.7974 45.25 27.4491 44.955 27.1669L33.4875 15.6985C32.6625 14.8613 31.8045 14.2471 30.9134 13.856C30.0222 13.4649 29.047 13.2694 27.9875 13.2694C26.9403 13.2694 25.9895 13.4649 25.135 13.856C24.28 14.2471 23.4336 14.8613 22.5959 15.6985L12.4484 25.8652C11.735 26.5791 11.1584 27.4296 10.7184 28.4169C10.2778 29.4041 10.0447 30.4233 10.0192 31.4744C9.99363 32.2266 10.0578 32.9499 10.2117 33.6444C10.3656 34.3388 10.6092 34.9916 10.9425 35.6027L8.41669 38.1285C7.85669 37.2352 7.41863 36.2063 7.10252 35.0419C6.78641 33.8774 6.64113 32.6883 6.66669 31.4744C6.69224 29.9616 6.99557 28.5119 7.57669 27.1252C8.1578 25.7385 8.98919 24.5046 10.0709 23.4235L20.1542 13.3402C21.3164 12.1902 22.5461 11.3355 23.8434 10.776C25.14 10.216 26.5428 9.93604 28.0517 9.93604C29.56 9.93604 30.952 10.216 32.2275 10.776C33.5031 11.3355 34.7156 12.1902 35.865 13.3402L38.7692 16.2435L41.6734 13.3402C42.8356 12.1902 44.0545 11.3355 45.33 10.776C46.6056 10.216 47.9978 9.93604 49.5067 9.93604C51.015 9.93604 52.4178 10.216 53.715 10.776C55.0117 11.3355 56.235 12.1902 57.385 13.3402L69.8017 25.7569C70.9511 26.9063 71.8378 28.1969 72.4617 29.6285C73.0856 31.0602 73.3975 32.5302 73.3975 34.0385C73.3975 35.5474 73.0856 36.9396 72.4617 38.2152C71.8378 39.4908 70.9511 40.7033 69.8017 41.8527L43.8142 67.821C43.122 68.5133 42.3686 69.0174 41.5542 69.3335C40.7403 69.6496 39.8847 69.8077 38.9875 69.8077Z" fill="white"/>
      </svg>

      <p class="brand-values__item-title">Trust</p>
      <p class="brand-values__item-description">Confidential and precise support throughout your stay.</p>
    </div>

    <div class="brand-values__item">
      <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M19.4233 63.3333V60H60.5767V63.3333H19.4233ZM19.2308 53.7183L14.4042 28.25C14.2931 28.2928 14.1681 28.3172 14.0292 28.3233C13.8903 28.33 13.7653 28.3333 13.6542 28.3333C12.6069 28.3333 11.7361 27.9781 11.0417 27.2675C10.3472 26.5569 10 25.6942 10 24.6792C10 23.6286 10.3472 22.7358 11.0417 22.0008C11.7361 21.2653 12.6081 20.8975 13.6575 20.8975C14.7069 20.8975 15.5992 21.2653 16.3342 22.0008C17.0686 22.7358 17.4358 23.6286 17.4358 24.6792C17.4358 24.9108 17.4261 25.1258 17.4067 25.3242C17.3878 25.5225 17.3228 25.7178 17.2117 25.91L27.885 30.1925L37.7883 16.7117C37.3056 16.3956 36.9231 15.9778 36.6408 15.4583C36.3592 14.9394 36.2183 14.3806 36.2183 13.7817C36.2183 12.7311 36.5856 11.8383 37.32 11.1033C38.0544 10.3678 38.9464 10 39.9958 10C41.0458 10 41.9394 10.3664 42.6767 11.0992C43.4133 11.8319 43.7817 12.7219 43.7817 13.7692C43.7817 14.3975 43.6408 14.9658 43.3592 15.4742C43.0769 15.9831 42.6944 16.3956 42.2117 16.7117L52.115 30.1925L62.7883 25.91C62.7283 25.7328 62.6761 25.5378 62.6317 25.325C62.5867 25.1128 62.5642 24.8975 62.5642 24.6792C62.5642 23.6286 62.9114 22.7358 63.6058 22.0008C64.3003 21.2653 65.1722 20.8975 66.2217 20.8975C67.2711 20.8975 68.1633 21.2653 68.8983 22.0008C69.6328 22.7358 70 23.6286 70 24.6792C70 25.6881 69.6311 26.5492 68.8933 27.2625C68.1556 27.9764 67.2597 28.3333 66.2058 28.3333C66.1214 28.3333 66.0264 28.3194 65.9208 28.2917C65.8153 28.2639 65.6997 28.25 65.5742 28.25L60.7692 53.7183H19.2308ZM22.0767 50.385H57.9233L62.0125 29.9292L50.955 34.34L40 19.3458L29.045 34.34L17.9875 29.9292L22.0767 50.385Z" fill="white"/>
      </svg>

      <p class="brand-values__item-title">Exclusivity</p>
      <p class="brand-values__item-description">Private access to rare and off-market properties.</p>
    </div>
  </div>
</section>

<?php get_footer(); ?>