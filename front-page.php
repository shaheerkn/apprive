<?php get_header(); ?>

<section class="hero hero--new">
    <div class="hero__img">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/homepage-v2-desktop.jpg" alt="">
    </div>
    <div class="container">
      <h2 class="hero__title pp-editorial-new-ultralight-italic">Private villas. Seamless concierge.</h2>
      <p class="hero__description pp-editorial-new-regular">Everything handled before you arrive</p>
    </div>

    <div class="hero__filters">
      <form class="hero__filters-form" action="<?php echo esc_url( home_url( '/properties/' ) ); ?>" method="GET">
        <div class="hero__filter-group">
          <select name="destination" class="hero__filter-select">
            <option value="">DESTINATION</option>
            <?php
            $destinations = get_terms( array(
              'taxonomy'   => 'destination',
              'hide_empty' => false,
            ) );
            if ( ! empty( $destinations ) && ! is_wp_error( $destinations ) ) {
              foreach ( $destinations as $term ) {
                echo '<option value="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</option>';
              }
            }
            ?>
          </select>
        </div>

        <div class="hero__filter-group">
          <select name="guests" class="hero__filter-select">
            <option value="">GUESTS</option>
            <?php for ( $i = 1; $i <= 20; $i++ ) : ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?> <?php echo $i === 1 ? 'Guest' : 'Guests'; ?></option>
            <?php endfor; ?>
          </select>
        </div>

        <div class="hero__filter-group">
          <select name="bedrooms" class="hero__filter-select">
            <option value="">BEDROOMS</option>
            <?php for ( $i = 1; $i <= 6; $i++ ) : ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?><?php echo $i === 6 ? '+' : ''; ?> <?php echo $i === 1 ? 'Bedroom' : 'Bedrooms'; ?></option>
            <?php endfor; ?>
          </select>
        </div>

        <button type="submit" class="hero__filter-search">
          SEARCH
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.35 14.7C3.294 14.7 0 11.406 0 7.35C0 3.294 3.294 0 7.35 0C11.406 0 14.7 3.294 14.7 7.35C14.7 9.072 14.1 10.656 13.104 11.898L17.604 16.398L16.398 17.604L11.898 13.104C10.656 14.1 9.072 14.7 7.35 14.7ZM7.35 1.8C4.284 1.8 1.8 4.284 1.8 7.35C1.8 10.416 4.284 12.9 7.35 12.9C10.416 12.9 12.9 10.416 12.9 7.35C12.9 4.284 10.416 1.8 7.35 1.8Z" fill="white"/>
          </svg>
        </button>
      </form>
    </div>

    <a href="#" class="hero__search-btn">Search  villas</a>
  </section>

  <section class="collection section">
    <div class="container">
      <h2 class="collection__title pp-editorial-new-regular">Our Collection</h2>

      <?php
      $collection_query = new WP_Query( array(
        'post_type'      => 'property',
        'posts_per_page' => 4,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
      ) );
      ?>

      <?php if ( $collection_query->have_posts() ) : ?>
        <div class="collection__grid">
          <?php while ( $collection_query->have_posts() ) : $collection_query->the_post();
            $prop_id = get_the_ID();
            $gallery = get_field( 'prop_gallery', $prop_id );
            $image_url = ( $gallery && ! empty( $gallery ) ) ? wp_get_attachment_image_url( $gallery[0], 'medium_large' ) : get_the_post_thumbnail_url( $prop_id, 'medium_large' );
            if ( ! $image_url ) $image_url = get_template_directory_uri() . '/assets/images/placeholder.png';
          ?>
            <article class="collection__item">
              <a href="<?php the_permalink(); ?>" class="collection__link">
                <div class="collection__image-wrap">
                  <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>" class="collection__image">
                </div>
                <h3 class="collection__name pp-editorial-new-regular"><?php the_title(); ?></h3>
              </a>
            </article>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>

      <div class="collection__actions">
        <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>" class="btn collection__btn pp-editorial-new-regular">Discover our collection</a>
      </div>
    </div>
  </section>

  <section class="services-showcase">
    <div class="container">
      <h2 class="services-showcase__title pp-editorial-new-regular">A Different kind of concierge.</h2>

      <p class="services-showcase__description causten-regular">SOME EXPERIENCES CAN&rsquo;T BE FOUND. <br/> THEY HAVE TO BE PREPARED. EVERYTHING AROUND YOU IS ALREADY IN PLACE, SO WHAT YOU EXPERIENCE FEELS NATURAL, SEAMLESS, AND ENTIRELY YOURS.</p>

      <div class="services-showcase__actions">
        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn services-showcase__btn pp-editorial-new-regular">Discover our services</a>
      </div>

      <div class="services-showcase__grid">
        <article class="services-showcase__item">
          <div class="services-showcase__image-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services-1.jpg" alt="Hosting & Lifestyle" class="services-showcase__image">
          </div>
          <h3 class="services-showcase__name pp-editorial-new-regular">Hosting & Lifestyle</h3>
        </article>

        <article class="services-showcase__item">
          <div class="services-showcase__image-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services-2.jpg" alt="Transfers & Mobility" class="services-showcase__image">
          </div>
          <h3 class="services-showcase__name pp-editorial-new-regular">Transfers & Mobility</h3>
        </article>

        <article class="services-showcase__item">
          <div class="services-showcase__image-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services-3.jpg" alt="In-Home Services" class="services-showcase__image">
          </div>
          <h3 class="services-showcase__name pp-editorial-new-regular">In-Home Services</h3>
        </article>

        <article class="services-showcase__item">
          <div class="services-showcase__image-wrap">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services-4.jpg" alt="Experiences" class="services-showcase__image">
          </div>
          <h3 class="services-showcase__name pp-editorial-new-regular">Experiences</h3>
        </article>
      </div>
    </div>
  </section>

  <section class="cta">
    <div class="cta__bg">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cta-desktop.jpg" alt="Mykonos">
    </div>

    <div class="cta__content">
      <span class="cta__label pp-editorial-new-regular">Our Destination</span>
      <h2 class="cta__title pp-editorial-new-regular">Mykonos</h2>
      <a href="<?php echo esc_url( home_url( '/destination/mykonos/' ) ); ?>" class="btn cta__btn pp-editorial-new-regular">Explore the destination</a>
    </div>
  </section>

  <section class="speak-with-us">
    <div class="container">
      <div class="speak-with-us__inner">
        <div class="speak-with-us__content">
          <h2 class="speak-with-us__title pp-editorial-new-regular">Speak with us</h2>

          <div class="speak-with-us__text causten-regular">
            <p>WE KNOW THESE PLACES BEYOND WHAT CAN BE SEEN.<br>NOT JUST THE VILLAS, BUT WHAT MAKES THEM FEEL RIGHT, AT THE RIGHT MOMENT, FOR THE RIGHT PERSON.</p>
            <p>TELL US WHAT YOUR PERFECT STAY LOOKS LIKE,<br>AND WE&rsquo;LL SHAPE EVERYTHING AROUND IT, QUIETLY, PRECISELY, AS IT SHOULD BE.</p>
          </div>

          <div class="speak-with-us__actions">
            <a href="#" class="btn speak-with-us__btn pp-editorial-new-regular">Chat with us</a>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn speak-with-us__btn pp-editorial-new-regular">Enquire</a>
          </div>
        </div>

        <div class="speak-with-us__image">
          <picture>
            <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/speak-with-us-mobile.png">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/speak-with-us-bg.png" alt="">
          </picture>
        </div>
      </div>
    </div>
  </section>
<?php

get_footer();
