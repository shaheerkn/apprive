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

$destination = get_queried_object();
$term_id = $destination->term_id;

// Hero Fields
$hero_img = get_field('hero_img', $destination);
$hero_title = get_field('hero_title', $destination) ?: $destination->name . ' Destinations';
$hero_desc = get_field('hero_desc', $destination);

// Spotlight Fields
$spotlight_title = get_field('spotlight_title', $destination) ?: 'An Icon of Excellence';
$spotlight_desc = get_field('spotlight_desc', $destination);
$spotlight_img = get_field('spotlight_img', $destination);

// Areas
$areas_title = get_field('areas_title', $destination) ?: $destination->name . ' Areas';

// Showcase
$showcase_title = get_field('showcase_title', $destination) ?: 'Featured Properties';

// Services
$services_title = get_field('services_title', $destination) ?: 'Privately Orchestrated';

?>

<section class="hero courchevel-hero">
  <div class="hero__img">
    <?php if($hero_img): ?><img src="<?php echo esc_url($hero_img); ?>" alt="" class=""><?php endif; ?>
  </div>

  <div class="hero__overlay"></div>
  <div class="container">
    <h1 class="hero__title for-desktop "><?php echo esc_html($hero_title); ?></h1>
    <!-- <h1 class="hero__title for-mobile "><?php echo esc_html($hero_title); ?></h1> -->
    
    <div class="hero__description for-desktop "><?php echo wp_kses_post($hero_desc); ?></div>
    <!-- <div class="hero__description for-mobile "><?php echo wp_kses_post($hero_desc); ?></div> -->
    
    <div class="hero__actions">
      <a href="#request" class="btn btn--solid--white">Request Your Stay</a>
    </div>
  </div>
</section>

<section class="breadcrumb breadcrumb-hide">
  <div class="container">
    <a href="<?php echo home_url(); ?>" class="breadcrumb__home">
      <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.33333 19.718H6.25633V11.872H12.4103V19.718H17.3333V7.718L9.33333 1.66667L1.33333 7.718V19.718ZM0 21.0513V7.05133L9.33333 0L18.6667 7.05133V21.0513H11.077V13.2053H7.58967V21.0513H0Z" fill="#1F1F1F"/>
      </svg>
    </a>

      <a href="#" class="breadcrumb__arrow">
        <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
        </svg>
      </a>

        <span class="breadcrumb__current"><?php echo esc_html($destination->name); ?></span>
  </div>
</section>

<section class="spotlight">
  <div class="spotlight__content">
    <div class="container">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/courchevel-water-mark.svg" alt="section-watermark" class="spotlight__waterMark">
      <h3 class="section-title"><?php echo esc_html($spotlight_title); ?></h3>
      <div class="spotlight__description">
        <?php echo wp_kses_post($spotlight_desc); ?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="spotlight__gallery">
      <?php if($spotlight_img): ?><img src="<?php echo esc_url($spotlight_img); ?>" alt="winter" class=""><?php endif; ?>
    </div>
  </div>
</section>

<?php if(have_rows('dest_areas', $destination)): ?>
<section class="tiles-grid section">
  <div class="container">
    <h4 class="section-title "><?php echo esc_html($areas_title); ?></h4>

    <div class="tiles-grid__list">
      <?php while(have_rows('dest_areas', $destination)): the_row(); 
        $a_title_w = get_sub_field('area_title');
        $a_desc_w = get_sub_field('area_description');
      ?>
      <div class="tiles-grid__tile">
        <h5 class="tiles-grid__tile-title "><?php echo esc_html($a_title_w); ?></h5>
        <p class="description "><?php echo esc_html($a_desc_w); ?></p>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="showcase section">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/chalets-water__mark.svg" class="showcase__water-mark" alt="water mark">
  <div class="container">
    <h4 class="section-title "><?php echo esc_html($showcase_title); ?></h4>

    <div class="showcase__grid">
      <?php
        // Query 3 properties for this destination
        $showcase_args = array(
            'post_type' => 'property',
            'posts_per_page' => 3,
            'tax_query' => array(
                array(
                    'taxonomy' => 'destination',
                    'field' => 'term_id',
                    'terms' => $term_id,
                )
            )
        );
        $showcase_query = new WP_Query($showcase_args);
        
        if($showcase_query->have_posts()):
            while($showcase_query->have_posts()): $showcase_query->the_post();
                $prop_id = get_the_ID();
                $gallery = get_field('prop_gallery', $prop_id);
                $image_url = ($gallery && !empty($gallery)) ? wp_get_attachment_image_url($gallery[0], 'medium_large') : get_the_post_thumbnail_url($prop_id, 'medium_large');
                $max_guests = get_field('max_guests', $prop_id);
                $location = get_field('prop_location_text', $prop_id);
                
                // Get features
                $feats = array();
                if(have_rows('prop_key_features', $prop_id)){
                    while(have_rows('prop_key_features', $prop_id)){
                        the_row();
                        $feats[] = get_sub_field('feature_label');
                        if(count($feats)>=3) break;
                    }
                }
                $feats_str = implode(' · ', $feats);
      ?>
      <article class="showcase__item">
          <a href="<?php the_permalink(); ?>" class="item-image">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" class="showcase__image ">
          </a>
          <div class="showcase__details">
            <div class="showcase__info">
              <div class="showcase__info-text">
                <h6 class="text "><?php the_title(); ?></h6>
                <p class="description "><?php echo esc_html($location); ?></p>
              </div>
              <div class="showcase__capacity">
                <p><?php echo esc_html($max_guests); ?> Guests</p>
              </div>
            </div>
            <p class="showcase__amenities "><?php echo esc_html($feats_str); ?></p>
            <a href="#" class="showcase__link">Request Availability <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-up.svg" alt="arrow" class="showcase__arrow"></a>
          </div>
      </article>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
    <!-- Link to full properties grid page or filter for this destination? 
         Currently just a placeholder link. Could link to same page? -->
    <a href="#" class="showcase__view-all">
      <span class="">View All chalets in <?php echo esc_html($destination->name); ?></span>
    </a>
  </div>
</section>

<?php
// Insight Hub / Inspirations
$related_posts = get_field('dest_related_posts', $destination);
if( $related_posts ): ?>
<section class="insight-hub section">
  <div class="container">
    <div class="insight-hub__header">
      <h4 class="section-title "><?php echo esc_html(get_field('inspirations_title', $destination)); ?></h4>
    </div>

    <div class="insight-hub__grid">
      <?php foreach( $related_posts as $post ): setup_postdata($post); 
         $thumb_url = get_the_post_thumbnail_url($post->ID, 'medium_large');
      ?>
      <article class="insight-hub__card">
        <a href="<?php the_permalink(); ?>" class="insight-hub__card-image">
          <img src="<?php echo esc_url($thumb_url); ?>" class="" alt="<?php the_title(); ?>">
        </a>
        <div class="insight-hub__content">
          <p class="insight-hub__date"><?php echo get_the_date('F d, Y'); ?></p>
          <h6 class="insight-hub__article-title "><?php the_title(); ?></h6>
          <div class="insight-hub__excerpt "><?php the_excerpt(); ?></div>
          <a href="<?php the_permalink(); ?>" class="insight-hub__read-more ">Read More</a>
        </div>
      </article>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if(have_rows('dest_services_cats', $destination)): ?>
<section class="service-orchestration section">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/_courchevel-chalets__water-mark.svg" class="water-mark" alt="water mark">
  <div class="container">
    <h4 class="section-title "><?php echo esc_html($services_title); ?></h4>
    <div class="service-orchestration__services">
      <?php while(have_rows('dest_services_cats', $destination)): the_row(); ?>
      <div class="service-orchestration__category">
        <h6 class="service-orchestration__category-title "><?php the_sub_field('svc_cat_title'); ?></h6>
        <ul class="service-orchestration__list">
          <?php if(have_rows('svc_items')): while(have_rows('svc_items')): the_row(); ?>
            <li class="service-orchestration__item "><?php the_sub_field('svc_item'); ?></li>
          <?php endwhile; endif; ?>
        </ul>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>