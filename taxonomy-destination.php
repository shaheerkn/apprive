<?php
/**
 * Destination Template
 *
 * Displays a destination page with dynamic content based on the destination taxonomy.
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

<section class="hero courchevel-hero">
  <div class="hero__img">
    <img src="assets/images/courchevelHero-winter-desktop.png" alt="" class="for-winter">
    <img src="assets/images/courchevelHero-summer-desktop.png" alt="" class="for-summer">
  </div>

  <div class="hero__overlay"></div>
  <div class="container">
    <h1 class="hero__title for-desktop for-winter">Luxury Chalets in Courchevel with Private Concierge</h1>
    <h1 class="hero__title for-desktop for-summer">Luxury Villas in Mykonos with Private Concierge</h1>
    <h1 class="hero__title for-mobile for-winter">Courchevel — Winter in Absolute Elegance</h1>
    <h1 class="hero__title for-mobile for-summer">Mykonos — Summer in Effortless Style</h1>
    <p class="hero__description for-desktop for-winter">Private luxury chalets, ski-in ski-out access and seamless concierge service in Courchevel.</p>
    <p class="hero__description for-desktop for-summer">Private luxury villas, Mediterranean pleasure and seamless concierge access in Mykonos.</p>
    <p class="hero__description for-mobile for-winter">Exclusive chalets, alpine refinement, and private concierge service.</p>
    <p class="hero__description for-mobile for-summer">Private villas, Mediterranean pleasure, and seamless concierge access.</p>
    <div class="hero__actions">
      <a href="#" class="btn btn--solid--white">Request Your Stay</a>
    </div>
  </div>
</section>

<section class="breadcrumb breadcrumb-hide">
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

        <a href="#" class="breadcrumb__current">Courchevel</a>
  </div>
</section>

<section class="spotlight">
  <div class="spotlight__content">
    <div class="container">
      <img src="./assets/images/courchevel-water-mark.svg" alt="section-watermark" class="spotlight__waterMark">
      <h3 class="section-title">An Icon of Alpine Excellence</h3>
      <div class="spotlight__description">
        <p>Courchevel represents the pinnacle of alpine luxury, offering world-class ski terrain, refined hospitality and an exclusive collection of private chalets in the heart of the French Alps.</p>
        <p>From ski-in ski-out living to Michelin-starred dining and discreet après-ski experiences, Courchevel delivers a winter lifestyle defined by comfort, privacy and excellence.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="spotlight__gallery">
      <img src="./assets/images/courchevel-winter.png" alt="courchevel winter" class="for-winter">
      <img src="./assets/images/courchevel-summer.png" alt="courchevel summer" class="for-summer">
    </div>
  </div>
</section>

<section class="tiles-grid section">
  <div class="container">
    <h4 class="section-title for-winter">Courchevel Areas & Altitudes</h4>
    <h4 class="section-title for-summer">Mykonos ZONES</h4>

    <div class="tiles-grid__list">
      <div class="tiles-grid__tile">
        <h5 class="tiles-grid__tile-title for-winter">Courchevel 1850</h5>
        <h5 class="tiles-grid__tile-title for-summer">Psarou</h5>
        <p class="description for-winter">The pinnacle of luxury — ski-in/ski-out, top dining, central position.</p>
        <p class="description for-summer">Ultra-exclusive — luxury yachts, elite crowd, VIP waterfront.</p>
      </div>

      <div class="tiles-grid__tile">
        <h5 class="tiles-grid__tile-title for-winter">Courchevel 1650</h5>
        <h5 class="tiles-grid__tile-title for-summer">Paraga</h5>
        <p class="description for-winter">Calmer rhythm — scenic views, wider spaces, relaxed atmosphere</p>
        <p class="description for-summer">Bohemian chic — beach clubs, sunset rituals, social ambiance.</p>
      </div>

      <div class="tiles-grid__tile">
        <h5 class="tiles-grid__tile-title for-winter">Courchevel 1550</h5>
        <h5 class="tiles-grid__tile-title for-summer">Agios Ioannis</h5>
        <p class="description for-winter">Family-friendly — accessibility, convenience, services.</p>
        <p class="description for-summer">Tranquil & romantic — privacy, sunset views toward Delos.</p>
      </div>

      <div class="tiles-grid__tile">
        <h5 class="tiles-grid__tile-title for-winter">Le Praz</h5>
        <h5 class="tiles-grid__tile-title for-summer">Mykonos Town (Chora)</h5>
        <p class="description for-winter">Authentic alpine charm — traditional chalets, quiet environment.</p>
        <p class="description for-summer">Historic glamour — restaurants, nightlife, boutiques, white alleys.</p>
      </div>
    </div>
  </div>
</section>

<section class="showcase section">
  <img src="./assets/images//chalets-water__mark.svg" class="showcase__water-mark" alt="water mark">
  <div class="container">
    <h4 class="section-title for-winter">Courchevel Areas & Altitudes</h4>
    <h4 class="section-title for-summer">FEATURED VILLAS IN MYKONOS</h4>

    <div class="showcase__grid">
      <article class="showcase__item">
          <a href="#" class="item-image">
          <img src="./assets/images/chalets-itemOne.png" alt="item featured item" class="showcase__image for-winter">
          <img src="./assets/images/chalets-itemOne-summer.png" alt="featured item" class="showcase__image for-summer">
          </a>
          <div class="showcase__details">
            <div class="showcase__info">
              <div class="showcase__info-text">
                <h6 class="text for-winter">Chalet Mazot Cannors</h6>
                <h6 class="text for-summer">Destiny Resort</h6>
                <p class="description for-winter">Courchevel 1850</p>
              </div>
              <div class="showcase__capacity">
                <p>10 Guests</p>
              </div>
            </div>
            <p class="showcase__amenities for-winter">Spa · Fireplace · Ski-in/ski-out</p>
            <p class="showcase__amenities for-summer">Infinity pool · Sea view · Direct beach access</p>
            <a href="#" class="showcase__link">Request Availability <img src="./assets/icons/arrow-up.svg" alt="arrow" class="showcase__arrow"></a>
          </div>
      </article>

      <article class="showcase__item">
        <a href="#" class="item-image">
          <img src="./assets/images/chalets-itemTwo.png" alt="item" class="showcase__image for-winter">
          <img src="./assets/images/chalets-itemTwo-summer.png" alt="item" class="showcase__image for-summer">
        </a>
          <div class="showcase__details">
            <div class="showcase__info">
              <div class="showcase__info-text">
                <h6 class="text for-winter">Chalet Mazot Cannors</h6>
                <h6 class="text for-summer">Villa Amra</h6>
                <p class="description for-winter">Courchevel 1850</p>
              </div>
              <div class="showcase__capacity">
                <p>8 Guests</p>
              </div>
            </div>
            <p class="showcase__amenities for-winter">Spa · Fireplace · Ski-in/ski-out</p>
            <p class="showcase__amenities for-summer">Sunset lounge · Private terrace · Heated pool</p>
            <a href="#" class="showcase__link">Request Availability <img src="./assets/icons/arrow-up.svg" alt="arrow" class="showcase__arrow"></a>
          </div>
      </article>

      <article class="showcase__item">
        <a href="#" class="item-image">
          <img src="./assets/images/chalets-itemThree.png" alt="item" class="showcase__image for-winter">
          <img src="./assets/images/chalets-itemthree-summer.png" alt="item" class="showcase__image for-summer">
        </a>
          <div class="showcase__details">
            <div class="showcase__info">
              <div class="showcase__info-text">
                <h6 class="text for-winter">Chalet Mazot Cannors</h6>
                  <h6 class="text for-summer">Agios Ioannis</h6>
                <p class="description for-winter">Courchevel 1850</p>
              </div>
              <div class="showcase__capacity">
                <p>6 Guests</p>
              </div>
            </div>
            <p class="showcase__amenities description">Spa · Fireplace · Ski-in/ski-out</p>
            <a href="#" class="showcase__link">Request Availability <img src="./assets/icons/arrow-up.svg" alt="arrow" class="showcase__arrow"></a>
          </div>
      </article>

    </div>
    <a href="#" class="showcase__view-all">
      <span class="for-winter">View All chalets in Courchevel</span>
      <span class="for-summer">View all villas in Mykonos</span>
    </a>
  </div>
</section>

<section class="insight-hub section">
  <div class="container">
    <div class="insight-hub__header">
      <h4 class="section-title for-winter">Courchevel Inspirations</h4>
      <h4 class="section-title for-summer">Mykonos Inspirations</h4>
      <p class="insight-hub__description for-winter">Explore curated articles and insider insights on luxury skiing, private chalets, alpine gastronomy and refined winter experiences in Courchevel.</p>
      <p class="insight-hub__description for-summer">Explore curated articles and insider insights — from the best slopes to Michelin dining and private alpine experiences.</p>
    </div>

    <div class="insight-hub__grid">
      <article class="insight-hub__card">
        <a href="#" class="insight-hub__card-image">
          <img src="./assets/images/inspiration-itemOne.png" class="for-winter" alt="inspiration-itemOne">
          <img src="./assets/images/inspiration-itemOne-summer.png" class="for-summer" alt="inspiration-itemOne">
        </a>
        <div class="insight-hub__content">
          <p class="insight-hub__date">September 10, 2025</p>
          <h6 class="insight-hub__article-title  for-winter">A Michelin Winter — The most refined dining in Courchevel 1850</h6>
          <h6 class="insight-hub__article-title  for-summer">Beach Club Etiquette — Experiencing Mykonos in style</h6>
          <p class="insight-hub__excerpt  for-winter">A world where winter sophistication meets culinary artistry. Indulge in a Michelin-level dining experience, perfectly set in the timeless elegance of Courchevel 1850.</p>
          <p class="insight-hub__excerpt  for-summer">Where to go, when to arrive, and how to do it the refined way.</p>
          <a href="#" class="insight-hub__read-more read__more-desktop for-winter">Read More</a>
        </div>
      </article>

      <article class="insight-hub__card">
        <a href="#" class="insight-hub__card-image">
          <img src="./assets/images/inspiration-itemTwo.png" class="for-winter" alt="inspiration-item">
          <img src="./assets/images/inspiration-itemTwo-summer.png" class="for-summer" alt="inspiration-itemTwo">
        </a>
        <div class="insight-hub__content">
          <p class="insight-hub__date">July 26, 2025</p>
          <h6 class="insight-hub__article-title for-winter">A Michelin Winter — The most refined dining in Courchevel 1850</h6>
          <h6 class="insight-hub__article-title for-summer">Yachts & Hidden Coves — A private way to see Mykonos</h6>
          <p class="insight-hub__excerpt for-winter">A world where winter sophistication meets culinary artistry. Indulge in a Michelin-level dining experience, perfectly set in the timeless elegance of Courchevel 1850.</p>
          <p class="insight-hub__excerpt for-summer">Discover the island from the sea, far from the crowds.</p>
          <a href="#" class="insight-hub__read-more for-winter">Read More</a>
        </div>
      </article>

      <article class="insight-hub__card">
        <a href="#" class="insight-hub__card-image">
          <img src="./assets/images/inspiration-itemThree.png" class="for-winter" alt="inspiration-item">
          <img src="./assets/images/inspiration-itemThree-summer.png" class="for-summer" alt="inspiration-item">
        </a>
        <div class="insight-hub__content">
          <p class="insight-hub__date">October 03, 2025</p>
          <h6 class="insight-hub__article-title for-winter">A Michelin Winter — The most refined dining in Courchevel 1850</h6>
          <h6 class="insight-hub__article-title for-summer">Sunset Rituals — The art of evenings in Mykonos</h6>
          <p class="insight-hub__excerpt for-winter">A world where winter sophistication meets culinary artistry. Indulge in a Michelin-level dining experience, perfectly set in the timeless elegance of Courchevel 1850.</p>
          <p class="insight-hub__excerpt for-summer">The most memorable sunset spots and dinner combinations.</p>
          <a href="#" class="insight-hub__read-more for-winter">Read More</a>
        </div>
      </article>

      <article class="insight-hub__card">
        <a href="#" class="insight-hub__card-image">
          <img src="./assets/images/inspiration-itemFour.png" class="for-winter" alt="inspiration-item">
          <img src="./assets/images/inspiration-itemfour-summer.png" class="for-summer" alt="inspiration-item">
        </a>
        <div class="insight-hub__content">
          <p class="insight-hub__date">September 29, 2025</p>
          <h6 class="insight-hub__article-title for-winter">A Michelin Winter — The most refined dining in Courchevel 1850</h6>
          <h6 class="insight-hub__article-title for-summer">In-Villa Lifestyle — Hosting the perfect summer gathering</h6>
          <p class="insight-hub__excerpt for-winter">A world where winter sophistication meets culinary artistry. Indulge in a Michelin-level dining experience, perfectly set in the timeless elegance of Courchevel 1850.</p>
          <p class="insight-hub__excerpt for-summer">Private chefs, mixologists, and poolside experiences</p>
          <a href="#" class="insight-hub__read-more for-winter">Read More</a>
        </div>
      </article>

      <article class="insight-hub__card">
        <a href="#" class="insight-hub__card-image">
          <img src="./assets/images/inspiration-itemFive.png" class="for-winter" alt="inspiration-item">
          <img src="./assets/images/inspiration-itemfive-summer.png" class="for-summer" alt="inspiration-item">
        </a>
        <div class="insight-hub__content">
          <p class="insight-hub__date">July 26, 2025</p>
          <h6 class="insight-hub__article-title for-winter">A Michelin Winter — The most refined dining in Courchevel 1850</h6>
          <h6 class="insight-hub__article-title for-summer">Beach Club Etiquette — Experiencing Mykonos in style</h6>
          <p class="insight-hub__excerpt for-winter">A world where winter sophistication meets culinary artistry. Indulge in a Michelin-level dining experience, perfectly set in the timeless elegance of Courchevel 1850.</p>
          <p class="insight-hub__excerpt for-summer">Where to go, when to arrive, and how to do it the refined way.</p>
          <a href="#" class="insight-hub__read-more for-winter">Read More</a>
        </div>
      </article>

      <article class="insight-hub__card">
        <a href="#" class="insight-hub__card-image">
          <img src="./assets/images/inspiration-itemSixth.png" class="for-winter" alt="inspiration-item" >
          <img src="./assets/images/inspiration-itemSixth.png" class="for-summer" alt="inspiration-item" >
        </a>
        <div class="insight-hub__content">
          <p class="insight-hub__date">October 03, 2025</p>
          <h6 class="insight-hub__article-title for-winter">A Michelin Winter — The most refined dining in Courchevel 1850</h6>
          <h6 class="insight-hub__article-title for-summer">Yachts & Hidden Coves — A private way to see Mykonos</h6>
          <p class="insight-hub__excerpt for-winter">A world where winter sophistication meets culinary artistry. Indulge in a Michelin-level dining experience, perfectly set in the timeless elegance of Courchevel 1850.</p>
          <p class="insight-hub__excerpt for-summer">Discover the island from the sea, far from the crowds</p>
          <a href="#" class="insight-hub__read-more for-winter">Read More</a>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="service-orchestration section">
  <img src="./assets/images/_courchevel-chalets__water-mark.svg" class="water-mark" alt="water mark">
  <div class="container">
    <h4 class="section-title for-winter">Your Courchevel Winter — Privately Orchestrated</h4>
    <h4 class="section-title for-summer">Your Mykonos Summer — Privately Orchestrated</h4>
    <div class="service-orchestration__services">
      <div class="service-orchestration__category">
        <h6 class="service-orchestration__category-title for-winter">Hosting and Lifestyle</h6>
        <h6 class="service-orchestration__category-title for-summer">Lifestyle & Access</h6>
        <ul class="service-orchestration__list">
          <li class="service-orchestration__item for-winter">Restaurant & booking</li>
          <li class="service-orchestration__item for-summer">VIP beach reservations</li>
          <li class="service-orchestration__item for-winter">Private events & arrangements</li>
          <li class="service-orchestration__item for-summer">Private table at clubs</li>
          <li class="service-orchestration__item for-winter">is-resot assistance</li>
          <li class="service-orchestration__item for-summer">Restaurant access & sunset dining</li>
        </ul>
      </div>

      <div class="service-orchestration__category">
        <h6 class="service-orchestration__category-title for-winter">Transfers & Mobility</h6>
        <h6 class="service-orchestration__category-title for-summer">Sea & Transport</h6>
        <ul class="service-orchestration__list">
          <li class="service-orchestration__item for-winter">Chauffeured driver</li>
          <li class="service-orchestration__item for-summer">Yacht charter & island hopping</li>
          <li class="service-orchestration__item for-winter">Helicopter connection</li>
          <li class="service-orchestration__item for-summer">Chauffeured transfers</li>
          <li class="service-orchestration__item for-winter">VIP airport handling</li>
          <li class="service-orchestration__item for-summer">Helicopter transfers from Athens & nearby islands</li>
        </ul>
      </div>

      <div class="service-orchestration__category">
        <h6 class="service-orchestration__category-title for-winter">In-chalet Services</h6>
        <h6 class="service-orchestration__category-title for-summer">In-villa Services</h6>
        <ul class="service-orchestration__list">
          <li class="service-orchestration__item for-winter">Private chef</li>
          <li class="service-orchestration__item for-winter">Spa & massage</li>
          <li class="service-orchestration__item for-winter">Staffing & housekeeping</li>
          <li class="service-orchestration__item for-summer">Private chef & mixologist</li>
          <li class="service-orchestration__item for-summer">Private parties & pool events</li>
          <li class="service-orchestration__item for-summer">Spa therapist & wellness</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
