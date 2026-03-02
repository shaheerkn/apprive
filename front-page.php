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
      <a href="#request" class="btn work-proces__btn">Start Your Request</a>
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

          <a href="<?php echo home_url(); ?>/destination/courchevel/" class="for-winter btn singature-destination__btn">Discover Courchevel</a>
          <a href="<?php echo home_url(); ?>/destination/mykonos/" class="for-summer btn singature-destination__btn">Discover Mykonos</a>
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
      <h2 class="section-title for-summer">A Curated Collection of Luxury Villas in MYkonos</h2>
      <h2 class="section-title for-winter">A Curated Collection of Luxury Chalets in Courchevel</h2>

      <div class="chalets__content">
        <p class="chalets__text for-winter">We present a limited number of exclusive luxury chalets in Courchevel, carefully selected for location, architecture, privacy and quality.</p>
        <p class="chalets__text for-winter">Each chalet is offered privately, on request, with dedicated personal assistance and full concierge service.</p>

        <p class="chalets__text for-summer">We present a limited number of exclusive luxury villas in Mykonos, carefully selected for location, privacy, design and quality.</p>
        <p class="chalets__text for-summer">Each villa is offered privately, on request, with dedicated personal assistance and full concierge service.</p>
      </div>

      <?php
        // --- Winter properties (Courchevel) ---
        $winter_term = get_term_by('slug', 'courchevel', 'destination');
        $winter_query = null;
        if ($winter_term) {
          $winter_query = new WP_Query(array(
            'post_type'      => 'property',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'tax_query'      => array(
              array(
                'taxonomy' => 'destination',
                'field'    => 'term_id',
                'terms'    => $winter_term->term_id,
              )
            )
          ));
        }

        // --- Summer properties (Mykonos) ---
        $summer_term = get_term_by('slug', 'mykonos', 'destination');
        $summer_query = null;
        if ($summer_term) {
          $summer_query = new WP_Query(array(
            'post_type'      => 'property',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'tax_query'      => array(
              array(
                'taxonomy' => 'destination',
                'field'    => 'term_id',
                'terms'    => $summer_term->term_id,
              )
            )
          ));
        }
      ?>

      <?php if ($winter_query && $winter_query->have_posts()) : ?>
        <div class="for-winter">
          <div class="showcase__grid">
            <?php while ($winter_query->have_posts()) : $winter_query->the_post();
              $prop_id = get_the_ID();
              $gallery = get_field('prop_gallery', $prop_id);
              $image_url = ($gallery && !empty($gallery)) ? wp_get_attachment_image_url($gallery[0], 'medium_large') : get_the_post_thumbnail_url($prop_id, 'medium_large');
              if (!$image_url) $image_url = get_template_directory_uri() . '/assets/images/placeholder.png';
              $prop_specs = get_field('prop_specs', $prop_id);
              $max_guests = $prop_specs ? $prop_specs['max_guests'] : '';
              $feats = array();
              if (have_rows('prop_key_features', $prop_id)) {
                while (have_rows('prop_key_features', $prop_id)) {
                  the_row();
                  $feats[] = get_sub_field('feature_label');
                  if (count($feats) >= 3) break;
                }
              }
              $feats_str = implode(' · ', $feats);
              $is_favorite = false;
            ?>
            <article class="showcase__item">
              <div class="showcase__image-wrap">
                <a href="<?php the_permalink(); ?>" class="item-image">
                  <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" class="showcase__image">
                </a>
              </div>
              <div class="showcase__details">
                <div class="showcase__info">
                  <div class="showcase__info-text">
                    <h6 class="text"><?php the_title(); ?></h6>
                    <p class="showcase__amenities"><?php echo esc_html($feats_str); ?></p>
                  </div>
                  <div class="showcase__capacity">
                    <button class="listing-grid-fav <?php echo $is_favorite ? 'active' : ''; ?>" data-id="<?php echo esc_attr($prop_id); ?>" aria-label="Add to favorites">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/fav-black.svg" alt="favorites">
                    </button>
                    <?php if ($max_guests) : ?>
                      <p><?php echo esc_html($max_guests); ?> Guests</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </article>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($summer_query && $summer_query->have_posts()) : ?>
        <div class="for-summer">
          <div class="showcase__grid">
            <?php while ($summer_query->have_posts()) : $summer_query->the_post();
              $prop_id = get_the_ID();
              $gallery = get_field('prop_gallery', $prop_id);
              $image_url = ($gallery && !empty($gallery)) ? wp_get_attachment_image_url($gallery[0], 'medium_large') : get_the_post_thumbnail_url($prop_id, 'medium_large');
              if (!$image_url) $image_url = get_template_directory_uri() . '/assets/images/placeholder.png';
              $prop_specs = get_field('prop_specs', $prop_id);
              $max_guests = $prop_specs ? $prop_specs['max_guests'] : '';
              $feats = array();
              if (have_rows('prop_key_features', $prop_id)) {
                while (have_rows('prop_key_features', $prop_id)) {
                  the_row();
                  $feats[] = get_sub_field('feature_label');
                  if (count($feats) >= 3) break;
                }
              }
              $feats_str = implode(' · ', $feats);
              $is_favorite = false;
            ?>
            <article class="showcase__item">
              <div class="showcase__image-wrap">
                <a href="<?php the_permalink(); ?>" class="item-image">
                  <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" class="showcase__image">
                </a>
              </div>
              <div class="showcase__details">
                <div class="showcase__info">
                  <div class="showcase__info-text">
                    <h6 class="text"><?php the_title(); ?></h6>
                    <p class="showcase__amenities"><?php echo esc_html($feats_str); ?></p>
                  </div>
                  <div class="showcase__capacity">
                    <button class="listing-grid-fav <?php echo $is_favorite ? 'active' : ''; ?>" data-id="<?php echo esc_attr($prop_id); ?>" aria-label="Add to favorites">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/fav-black.svg" alt="favorites">
                    </button>
                    <?php if ($max_guests) : ?>
                      <p><?php echo esc_html($max_guests); ?> Guests</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </article>
            <?php endwhile; wp_reset_postdata(); ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="chalets__actions">
        <?php if ($winter_term) : ?>
          
          <a href="<?php echo home_url(); ?>/destination/courchevel/" class="btn work-proces__btn for-winter">View All Chalets in Courchevel</a>
        <?php endif; ?>
        <?php if ($summer_term) : ?>
          <a href="<?php echo home_url(); ?>/destination/mykonos/" class="btn work-proces__btn for-summer">View All Villas in Mykonos</a>
        <?php endif; ?>
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
