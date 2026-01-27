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

<?php get_footer(); ?>