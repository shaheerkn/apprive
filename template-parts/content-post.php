<?php
/**
 * Template part for displaying single post articles
 *
 * @package arprive
 */

$post_categories = get_the_category();
$thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>
  <div class="single-article__container container">

    <div class="single-article__meta">
      <span class="single-article__date"><?php echo get_the_date( 'j F Y' ); ?></span>
      <?php if ( ! empty( $post_categories ) ) : ?>
        <span class="single-article__meta-separator">-</span>
        <span class="single-article__categories">
          <?php
          $cat_links = array();
          foreach ( $post_categories as $cat ) {
            $cat_links[] = '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a>';
          }
          echo implode( ', ', $cat_links );
          ?>
        </span>
      <?php endif; ?>
    </div>

    <h1 class="single-article__title"><?php the_title(); ?></h1>

    <?php if ( has_excerpt() ) : ?>
      <p class="single-article__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
    <?php endif; ?>

    <?php if ( $thumb_url ) : ?>
      <div class="single-article__featured-image">
        <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>">
      </div>
    <?php endif; ?>

    <div class="single-article__content">
      <?php the_content(); ?>
    </div>

  </div>
</article>
