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

<section class="filters filters--journal">
  <div class="container">
    <div class="filters__header">
      <h4 class="section-title">Luxury Travel Inspiration & Destination Guides</h4>
      <p class="filters__text">Luxury travel inspiration, destination guides and curated perspectives on places, experiences and discreet living, from Courchevel, Mykonos and beyond.</p>
    
      <div class="journal-header journal-header__controls">
        <div class="journal-header__field">
          <label for="journal-header__select" class="journal-header__label">All Articles</label>
          <select class="journal-header__select" id="journal-category-filter">
            <option value="">All articles</option>
            <?php
            $categories = get_categories( array( 'hide_empty' => true ) );
            foreach ( $categories as $cat ) :
            ?>
              <option value="<?php echo esc_attr( $cat->term_id ); ?>"><?php echo esc_html( $cat->name ); ?></option>
            <?php endforeach; ?>
          </select>
          <span class="journal-header__arrow">
          <svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.42313 5.01292L0 0.589792L0.589792 0L4.42313 3.83333L8.25646 0L8.84625 0.589792L4.42313 5.01292Z" fill="#828282"/>
          </svg>
          </span>
        </div>

        <div class="journal-header__field journal-header__field--search">
          <label for="journal-search-input" class="journal-header__label">Search Article</label>
          <input type="text" class="journal-header__input" id="journal-search-input" placeholder="Private Ski Access">
          <button type="button" class="journal-header__search-btn" id="journal-search-btn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.4853 20.1537L13.2238 13.8922C12.7238 14.3179 12.1488 14.6474 11.4988 14.8807C10.8488 15.1141 10.1957 15.2307 9.53934 15.2307C7.93768 15.2307 6.58209 14.6763 5.47259 13.5675C4.36326 12.4586 3.80859 11.1039 3.80859 9.50323C3.80859 7.90239 4.36301 6.54648 5.47184 5.43548C6.58068 4.32464 7.93543 3.76923 9.53609 3.76923C11.1369 3.76923 12.4928 4.32389 13.6038 5.43323C14.7147 6.54273 15.2701 7.89831 15.2701 9.49998C15.2701 10.1948 15.147 10.8672 14.9008 11.5172C14.6547 12.1672 14.3316 12.723 13.9316 13.1845L20.1931 19.4462L19.4853 20.1537ZM9.53934 14.2307C10.8662 14.2307 11.9863 13.774 12.8998 12.8605C13.8133 11.9471 14.2701 10.827 14.2701 9.49998C14.2701 8.17298 13.8133 7.05281 12.8998 6.13948C11.9863 5.22598 10.8662 4.76923 9.53934 4.76923C8.21234 4.76923 7.09218 5.22598 6.17884 6.13948C5.26534 7.05281 4.80859 8.17298 4.80859 9.49998C4.80859 10.827 5.26534 11.9471 6.17884 12.8605C7.09218 13.774 8.21234 14.2307 9.53934 14.2307Z" fill="#828282"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="journal-articles section">
  <div class="container">
    <?php
    $journal_query = new WP_Query( array(
      'post_type'      => 'post',
      'posts_per_page' => 12,
      'post_status'    => 'publish',
    ) );
    ?>

    <?php if ( $journal_query->have_posts() ) : ?>
    <div class="journal-articles__grid" id="journal-grid">
      <?php while ( $journal_query->have_posts() ) : $journal_query->the_post();
        $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
        if ( ! $thumb_url ) $thumb_url = get_template_directory_uri() . '/assets/images/placeholder.png';
        $post_categories = get_the_category();
        $cat_name = ! empty( $post_categories ) ? $post_categories[0]->name : '';
      ?>
      <article class="journal-card">
        <a href="<?php the_permalink(); ?>" class="journal-card__image-wrapper">
          <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" class="journal-card__image">
        </a>
        <div class="journal-card__content">
          <?php if ( $cat_name ) : ?>
            <span class="journal-card__location"><?php echo esc_html( strtoupper( $cat_name ) ); ?></span>
          <?php endif; ?>
          <h3 class="journal-card__title"><?php the_title(); ?></h3>
          <p class="journal-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18, '...' ) ); ?></p>
          <a href="<?php the_permalink(); ?>" class="journal-card__link">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.6885 11.7885L0 11.1L10.0807 1H0.7885V0H11.7885V11H10.7885V1.70775L0.6885 11.7885Z" fill="black"/>
            </svg>
          </a>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php else : ?>
      <p>No articles found.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>