<?php
/**
 * Template Name: Enquiry
 * Template Post Type: page
 *
 * @package arprive
 */

  get_header();
?>

<section class="enquiry">
  <div class="container">
    <div class="enquiry__grid">

      <!-- Left Column -->
      <div class="enquiry__info">
        <h1 class="enquiry__title">Send your enquiry:</h1>
        <p class="enquiry__description">Our team will respond as quickly as possible. Each enquiry is entrusted to a dedicated specialist, who will assist you with care throughout every stage of the planning process.</p>

        <div class="enquiry__divider"></div>

        <div class="enquiry__contact">
          <h3 class="enquiry__contact-title">Other ways to get in touch</h3>
          <p class="enquiry__contact-item">Whatsapp: <a href="https://wa.me/393349051603">+39 334 9051603</a></p>
        </div>

      </div>

      <!-- Right Column -->
      <?php echo do_shortcode( '[contact-form-7 id="b5d73bd" title="Footer Booking form"]' ); ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>
