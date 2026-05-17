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
      <div class="enquiry__form-wrap">
        <h2 class="enquiry__form-title">Travel details</h2>
        <form id="enquiry-form" class="enquiry__form">

          <div class="enquiry__field">
            <label class="enquiry__label">Destinations</label>
            <div class="enquiry__checkboxes">
              <label class="enquiry__checkbox">
                <input type="checkbox" name="destinations[]" value="Mykonos">
                <span class="enquiry__checkbox-custom"></span>
                <span class="enquiry__checkbox-text">Mykonos</span>
              </label>
              <label class="enquiry__checkbox">
                <input type="checkbox" name="destinations[]" value="Courchevel">
                <span class="enquiry__checkbox-custom"></span>
                <span class="enquiry__checkbox-text">Courchevel</span>
              </label>
            </div>
          </div>

          <div class="enquiry__field">
            <label class="enquiry__label">Dates (optional)</label>
            <input type="text" class="enquiry__input" name="your-dates" placeholder="DD/MM/YYYY - DD/MM/YYYY">
          </div>

          <div class="enquiry__field">
            <label class="enquiry__label">About your trip</label>
            <textarea class="enquiry__textarea" name="your-trip" placeholder="Tell us about your ideal trip..."></textarea>
          </div>

          <div class="enquiry__row enquiry__row--3">
            <div class="enquiry__field">
              <label class="enquiry__label">Title</label>
              <select class="enquiry__input" name="your-title">
                <option value="">Select</option>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Ms">Ms</option>
                <option value="Dr">Dr</option>
              </select>
            </div>
            <div class="enquiry__field">
              <label class="enquiry__label">First Name <span class="required">*</span></label>
              <input type="text" class="enquiry__input" name="your-firstname" placeholder="First Name">
            </div>
            <div class="enquiry__field">
              <label class="enquiry__label">Last Name <span class="required">*</span></label>
              <input type="text" class="enquiry__input" name="your-lastname" placeholder="Last Name">
            </div>
          </div>

          <div class="enquiry__row enquiry__row--2">
            <div class="enquiry__field">
              <label class="enquiry__label">Phone Number <span class="required">*</span></label>
              <input type="tel" class="enquiry__input" name="your-phone" placeholder="+39 123 456 7890">
            </div>
            <div class="enquiry__field">
              <label class="enquiry__label">Email <span class="required">*</span></label>
              <input type="email" class="enquiry__input" name="your-email" placeholder="email@example.com">
            </div>
          </div>

          <button type="submit" class="enquiry__submit">Send your enquiry</button>

          <p class="enquiry__disclaimer">By submitting this form, you agree to our Privacy Policy and consent to being contacted by our team regarding your enquiry.</p>

        </form>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
