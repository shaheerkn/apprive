<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arprive
 */

?>

<?php if ( is_front_page() && have_rows('brand_values', 'option') ) : ?>
  <section class="brand-values">
    <div class="container">
      <?php 
      while( have_rows('brand_values', 'option') ): the_row(); 
        $icon = get_sub_field('icon');
        $title = get_sub_field('title');
        $description = get_sub_field('description');
        ?>
      <div class="brand-values__item">
        <?php if( $icon ): ?>
          <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>" class="brand-values__icon" width="80" height="80">
        <?php endif; ?>

        <p class="brand-values__item-title"><?php echo esc_html($title); ?></p>
        <p class="brand-values__item-description"><?php echo esc_html($description); ?></p>
      </div>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>

<footer class="footer">
    <div class="container">
      <?php
        if ( ! is_page( 'partner-with-us' ) ) {
          get_template_part( 'template-parts/footer-booking-form' );
        }
      ?>

      <div class="footer-bottom">
        <div class="footer-bottom__left">
          <div class="footer-bottom__left-logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/logo-main.svg" alt="logo"></a>
          </div>

          <div class="footer-bottom__left-contact">
            <p>Follow Us</p>
            <div class="footer-bottom__socials">
              <?php if( have_rows('social_links', 'option') ): ?>
                <?php while( have_rows('social_links', 'option') ): the_row(); ?>
                  <a href="<?php echo esc_url(get_sub_field('url')); ?>" target="_blank" rel="noopener noreferrer">
                    <?php get_template_part('template-parts/svgs/icon', get_sub_field('network')); ?>
                  </a>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="footer-bottom__right">
          <div class="footer-bottom__right-list">
            <h6>Destinations</h6>

            <?php 
              wp_nav_menu( array(
                'theme_location'   => 'footer-menu-destinations',
                'container'       => false,
                'items_wrap'      => '<ul>%3$s</ul>',
                'fallback_cb'     => false,
              ) );
            ?>
          </div>

          <div class="footer-bottom__right-list">
            <h6>Discover Us</h6>
            <?php
              wp_nav_menu( array(
                'theme_location'   => 'footer-menu-discover',
                'container'       => false,
                'items_wrap'      => '<ul>%3$s</ul>',
                'fallback_cb'     => false,
              ) );
            ?>
            
          </div>

          <div class="footer-bottom__right-list">
            <h6>Contact Us</h6>

            <ul class="footer-bottom__right-list__contactInfo">
              <li>
                <span>
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.54 2C3.6 2.89 3.75 3.76 3.99 4.59L2.79 5.79C2.38 4.59 2.12 3.32 2.03 2H3.54ZM13.4 14.02C14.25 14.26 15.12 14.41 16 14.47V15.96C14.68 15.87 13.41 15.61 12.2 15.21L13.4 14.02ZM4.5 0H1C0.45 0 0 0.45 0 1C0 10.39 7.61 18 17 18C17.55 18 18 17.55 18 17V13.51C18 12.96 17.55 12.51 17 12.51C15.76 12.51 14.55 12.31 13.43 11.94C13.33 11.9 13.22 11.89 13.12 11.89C12.86 11.89 12.61 11.99 12.41 12.18L10.21 14.38C7.38 12.93 5.06 10.62 3.62 7.79L5.82 5.59C6.1 5.31 6.18 4.92 6.07 4.57C5.7 3.45 5.5 2.25 5.5 1C5.5 0.45 5.05 0 4.5 0Z" fill="white"/>
                  </svg>
                </span>
                <a href="tel:<?php echo esc_attr(get_field('contact_phone', 'option')); ?>"><?php the_field('contact_phone', 'option'); ?></a>
              </li>
        
              <li>
                <span>
                  <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 2C20 0.9 19.1 0 18 0H2C0.9 0 0 0.9 0 2V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2ZM18 2L10 7L2 2H18ZM18 14H2V4L10 9L18 4V14Z" fill="white"/>
                  </svg>
                </span>
                <a href="mailto:<?php echo esc_attr(get_field('contact_email', 'option')); ?>"><?php the_field('contact_email', 'option'); ?></a>
              </li>

               <li>
                <span>
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2ZM7 9C7 6.24 9.24 4 12 4C14.76 4 17 6.24 17 9C17 11.88 14.12 16.19 12 18.88C9.92 16.21 7 11.85 7 9Z" fill="white"/>
                    <path d="M12 11.5C13.3807 11.5 14.5 10.3807 14.5 9C14.5 7.61929 13.3807 6.5 12 6.5C10.6193 6.5 9.5 7.61929 9.5 9C9.5 10.3807 10.6193 11.5 12 11.5Z" fill="white"/>
                  </svg>

                </span>
                <a href="#"><?php the_field('contact_location', 'option'); ?></a>
              </li>

              <li><?php the_field('contact_text', 'option'); ?></li>
            </ul>
          </div>
        </div>
        <?php 
          $partners = get_field('partners_logos', 'option');
          if( $partners ):
          ?>
          <div class="footer-bottom__partner">
            <?php foreach( $partners as $partner_url ): ?>
              <a href="#"><img src="<?php echo esc_url($partner_url); ?>" alt="partner logo"></a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <?php 
        $copyright = get_field('copyright_text', 'option');
        if( $copyright ) {
          echo '<p class="footer-copyRight">' .'© ' . date('Y') . ' ' . esc_html($copyright) . '</p>';
        }
      ?>
    </div>
  </footer>

<?php wp_footer(); ?>

</body>
</html>