<?php get_header(); ?>

<section class="hero hero--home">
    <div class="hero__img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-winter-desktop.jpg" alt="" class="for-winter">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-summer-desktop.jpg" alt="" class="for-summer">
    </div>
  
    <div class="hero__overlay"></div>
    <div class="container">
      <h2 class="hero__title hero__title-desktop for-winter">Luxury Chalets in Courchevel with Private Concierge</h2>
      <h2 class="hero__title hero__title-desktop for-summer">Luxury Villas in Mykonos with Private Concierge</h2>
      <h1 class="hero__title hero__title-mobile">Exclusive stays paired with truly private service.</h1>
      
      <p class="hero__description hero__description-secondary for-winter">Exclusive winter stays paired with truly private service. <br> Ski-in ski-out chalets, refined hospitality and tailored experiences in Courchevel.</p>
      <p class="hero__description hero__description-secondary for-summer">Exclusive summer stays paired with truly private service. <br> Sea-view villas, refined hospitality and tailored experiences in Mykonos.</p>
      <p class="hero__description hero__description-mobile">Where refinement, discretion, and personal attention define every moment.</p>
      
      <div class="hero__actions">
        <a href="#request" class="btn btn--solid--white">Request Your Stay</a>
        <a href="https://wa.me/393349051603" target="_blank" class="btn btn--outline-white">Chat with us <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/icon-whatsapp.svg" alt="WhatsApp" /></a>
      </div>
    </div>
  </section>

  <section class="section work-proces">
    <div class="container">

      <h2 class="section-title">How AR PRIVÉ works</h2>

      <div class="work-proces__content">
        <article class="work-proces__item">
          <span class="work-proces__count">1.</span>
          <div class="work-proces__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-process-winter-1.png" class="for-winter" alt="Tell us your dates, group size and preferences">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-process-summer-1.png" class="for-summer" alt="Tell us your travel dates, group details and personal preferences.">
          </div>

          <div class="work-proces__info">
            <p class="for-winter">Tell us your dates, group size and preferences</p>
            <p class="for-summer">Tell us your dates, group size and preferences</p>
          </div>
        </article>

        <article class="work-proces__item">
          <span class="work-proces__count">2.</span>
          <div class="work-proces__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-process-winter-2.png" class="for-winter" alt="Tell us your dates, group size and preferences">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-process-summer-2.png" class="for-summer" alt="Tell us your travel dates, group details and personal preferences.">
          </div>

          <div class="work-proces__info">
            <p class="for-winter">We privately curate tailored options for you</p>
            <p class="for-summer">We discreetly curate a refined selection of residences and experiences tailored to your lifestyle.</p>
          </div>
        </article>

        <article class="work-proces__item">
          <span class="work-proces__count">3.</span>
          <div class="work-proces__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-process-winter-3.png" class="for-winter" alt="Tell us your dates, group size and preferences">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/work-process-summer-3.png" class="for-summer" alt="Tell us your travel dates, group details and personal preferences.">
          </div>

          <div class="work-proces__info">
            <p class="for-winter">You choose — we manage every detail</p>
            <p class="for-summer">Once your selection is confirmed, AR Privé discreetly coordinates every detail of your stay.</p>
          </div>
        </article>
      </div>

      <div class="work-proces__dots">
        <span class="work-proces__dot active"></span>
        <span class="work-proces__dot"></span>
        <span class="work-proces__dot"></span>
      </div>

      <p class="work-proces__description for-winter">Our private concierge service in Courchevel ensures discretion, confidentiality and seamless assistance before and throughout your stay.</p>
      <p class="work-proces__description for-summer">AR Privé provides private concierge support ensuring discretion, continuity and seamless coordination from the first enquiry to the final moment of your stay.</p>
      <a href="#" class="btn work-proces__btn">Start Your Request</a>
    </div>
  </section>

  <section class="section singature-destination">
    <div class="container">
      <h2 class="section-title">DESTINATION</h2>

      <div class="singature-destination__body">
        <div class="singature-destination__content">
          <h3 class="for-winter secondary-title">Courchevel Winter</h3>
          <h3 class="for-summer secondary-title">Mykonos Summer</h3>

          <p class="singature-destination__description for-winter">Courchevel represents alpine excellence, combining exceptional ski access with refined chalet living and world-class gastronomy in the heart of the French Alps.</p>
          <p class="singature-destination__description for-summer">Mykonos blends refined seaside living with vibrant island energy.Our curated villa collection offers privacy, panoramic Aegean views and effortless access to the island’s most sought-after beach clubs and lifestyle experiences.</p>

          <a href="#" class="for-winter btn singature-destination__btn">Discover Courchevel</a>
          <a href="#" class="for-summer btn singature-destination__btn">Discover Mykonos</a>
        </div>

        <div class="singature-destination__gallery">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/destination-winter-img-1.png" class="for-winter" alt="Signature Destinations">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/destination-summer-img-1.png" class="for-summer" alt="Signature Destinations">
        </div>
      </div>
    </div>
  </section>

  <section class="chalets section">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/section-watermark.svg" alt="" class="section-watermark" />

    <div class="container">
      <h2 class="section-title">A CURATED COLLECTION OF LUXURY CHALETS IN COURCHEVEL</h2>

      <div class="chalets__content">
        <p class="chalets__text">We present a limited number of exclusive luxury chalets in Courchevel, carefully selected for location, architecture, privacy and quality.</p>
        <p class="chalets__text">Each chalet is offered privately, on request, with dedicated personal assistance and full concierge service.</p>
      </div>

      <div class="chalets__grid">
        <div class="chalets__card">
          <a href="#" class="chalets__image-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/resort-1.jpg" alt="Chalet Mazot Cannors" class="chalets__image">
          </a>
          <h3 class="text">Chalet Mazot Cannors</h3>
          <p class="description">Courchevel 1850</p>
        </div>

        <div class="chalets__card">
          <a href="#" class="chalets__image-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/resort-2.jpg" alt="Chalet Overview" class="chalets__image">
          </a>
          <h3 class="text">Chalet Overview</h3>
          <p class="description">Courchevel 1650</p>
        </div>

        <div class="chalets__card">
          <a href="#" class="chalets__image-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/resort-3.jpg" alt="Chalet Sommet" class="chalets__image">
          </a>
          <h3 class="text">Chalet Sommet</h3>
          <p class="description">Courchevel 1850</p>
        </div>
      </div>

      <div class="chalets__actions">
        <a cl href="<?php echo home_url(); ?>/partner" class="btn work-proces__btn">View Private Portfolio</a>
      </div>
    </div>
  </section>

  <section class="concierge-services section">
    <div class="concierge-services__container">
      <h2 class="section-title">Concierge & Private Services</h2>

      <div class="concierge-services__grid">
        <article class="concierge-services__item concierge-services__item--active">
          <h3 class="concierge-services__item-title">Hosting & Lifestyle</h3>

          <div class="concierge-services__image-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update-service-winter-1.png" alt="Luxury chalet" class="concierge-services__image for-winter">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update-service-summer-1.png" alt="Luxury chalet" class="concierge-services__image for-summer">

            <ul class="concierge-services__list">
              <li class="concierge-services__list-item">VIP tables &private venues</li>
              <li class="concierge-services__list-item">Restaurant & club reservations</li>
              <li class="concierge-services__list-item">Event organisation & celebration planning</li>
              <li class="concierge-services__list-item">Local immersive experiences</li>
            </ul>
          </div>
        </article>

        <article class="concierge-services__item">
          <h3 class="concierge-services__item-title">Transfers & Mobility</h3>

          <div class="concierge-services__image-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update-service-winter-2.png" alt="Skiers on mountain" class="concierge-services__image for-winter">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update-service-summer-2.png" alt="Luxury chalet" class="concierge-services__image for-summer">

            <ul class="concierge-services__list">
              <li class="concierge-services__list-item for-summer">Rental Auto / Quad / Scooter</li>
              <li class="concierge-services__list-item for-summer">Chauffer Service</li>
              <li class="concierge-services__list-item for-summer">Helicopter connections</li>
              <li class="concierge-services__list-item for-winter">Chauffeured travel</li>
              <li class="concierge-services__list-item for-winter">Private driver</li>
              <li class="concierge-services__list-item for-winter">Helicopter connections</li>
            </ul>
          </div>

        </article>

        <article class="concierge-services__item">
          <h3 class="concierge-services__item-title">In-Home Services</h3>

          <div class="concierge-services__image-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update-service-winter-3.jpeg" alt="Private dining setup" class="concierge-services__image for-winter">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update-service-summer-3.png" alt="Luxury chalet" class="concierge-services__image for-summer">

            <ul class="concierge-services__list">

              <li class="concierge-services__list-item">Private chef & mixologist</li>
              <li class="concierge-services__list-item">Housekeeping & staffing</li>
              <li class="concierge-services__list-item">Spa therapist & wellness treatments</li>
              <li class="concierge-services__list-item">Private trainer & coaching</li>
            </ul>
          </div>
        </article>

        <article class="concierge-services__item">
          <h3 class="concierge-services__item-title">Experiences</h3>

          <div class="concierge-services__image-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update-service-winter-4.png" alt="Courchevel resort" class="concierge-services__image for-winter">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/update-service-summer-4.png" alt="Luxury chalet" class="concierge-services__image for-summer">

            <ul class="concierge-services__list">
              <li class="concierge-services__list-item for-winter">Ski Schools</li>
              <li class="concierge-services__list-item for-winter">ski touring</li>
              <li class="concierge-services__list-item for-winter">dog sled ride</li>
              <li class="concierge-services__list-item for-winter">snow scooter</li>
              <li class="concierge-services__list-item for-winter">Ice climbing</li>

              <li class="concierge-services__list-item for-summer">Private Yachting Adventure</li>
              <li class="concierge-services__list-item for-summer">Greek Farmstead Cooking Session</li>
              <li class="concierge-services__list-item for-summer">Exploring Ancient Delos</li>
              <li class="concierge-services__list-item for-summer">Horse Riding</li>
              <li class="concierge-services__list-item for-summer">Professional Mykonian PhotoShoot</li>
            </ul>
          </div>
        </article>
      </div>

      <div class="concierge-services__dots">
        <span class="concierge-services__dot active"></span>
        <span class="concierge-services__dot"></span>
        <span class="concierge-services__dot"></span>
        <span class="concierge-services__dot"></span>
      </div>
    </div>
  </section>
<?php
get_footer();
