<?php
/**
 * Template Name: Partner with Us
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

<section class="hero">
  <div class="hero__img">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner_hero-winter.png" alt="work hero winter" class="for-winter">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner__hero-summer.png" alt="work hero summer" class="for-summer">
  </div>
  <div class="hero__overlay"></div>
  <div class="container">
    <h1 class="hero__title">Partner with AR PRIVÉ</h1>
    <p class="hero__description">For private owners and professional villa managers seeking discreet, high-end clientele</p>
    <div class="hero__actions hero__partner-action">
      <a href="#" class="btn btn--solid--white">Request Your Stay</a>
    </div>
  </div>

</section>

<section class="breadcrumb breadcrumb__modifier breadcrumb__mobile-hide">
  <div class="container">
    <a href="<?php echo home_url('/'); ?>" class="breadcrumb__home">
      <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.33333 19.718H6.25633V11.872H12.4103V19.718H17.3333V7.718L9.33333 1.66667L1.33333 7.718V19.718ZM0 21.0513V7.05133L9.33333 0L18.6667 7.05133V21.0513H11.077V13.2053H7.58967V21.0513H0Z" fill="#1F1F1F"/>
      </svg>
    </a>
    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
    </svg>

    <a href="#" class="breadcrumb__current">Property Partners</a>
  </div>
</section>

<section class="text-block section">
  <div class="container">
    <h4 class="section-title">ABOUT AR PRIVÉ</h4>

    <div class="text-block__content">
      <p class="text-block__text">AR PRIVÉ is a boutique hospitality curator specializing in high-end seasonal destinations. We represent a selective portfolio of villas and chalets, collaborating with private owners and professional property managers who value discretion, respect and refined service.</p>
      <p class="text-block__text">Our work goes beyond booking: we protect your asset, welcome only vetted guests, and deliver concierge-level hosting on your behalf.</p>
      <blockquote class="text-block__quote">
        “We are not a marketplace — we are your local, trusted partner.”
      </blockquote>
    </div>
  </div>
</section>

<section class="target-cards section">
  <div class="container">
    <h4 class="section-title">WHO THIS IS FOR</h4>

    <div class="target-cards__grid">
      <article class="target-cards__card">
        <h5 class="target-cards__card-title">For Private Owners</h5>
        <p class="target-cards__card-text">
          Homes of exceptional quality seeking vetted, respectful guests — with full service support.
        </p>
      </article>

      <article class="target-cards__card">
        <h5 class="target-cards__card-title">For Property Managers</h5>
        <p class="target-cards__card-text">
          Professional partners looking to expand their reach to an ultra-high-net-worth clientele.
        </p>
      </article>
    </div>
  </div>
</section>

<section class="partner-services section">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/process-water-mark.svg" alt="water mark" class="partner-services__water-mark">
  <div class="container">
    <div class="partner-services__header">
      <h4 class="section-title">WHAT WE DO FOR PROPERTY PARTNERS</h4>
      <p class="partner-services__subheadline">Our role is to elevate your property while protecting it.</p>
    </div>

    <div class="partner-services__grid">
      <article class="partner-services__item">
        <div class="partner-services__icon-wrapper">
          <svg width="46" height="59" viewBox="0 0 46 59" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.7817 37.3075H25.9617L24.1508 27.1092C25.1253 26.7692 25.9356 26.1833 26.5817 25.3517C27.2278 24.5194 27.5508 23.5903 27.5508 22.5642C27.5508 21.2714 27.0939 20.1683 26.18 19.255C25.2661 18.3417 24.1625 17.885 22.8692 17.885C21.5758 17.885 20.4731 18.3406 19.5608 19.2517C18.6486 20.1628 18.1925 21.2633 18.1925 22.5533C18.1925 23.5922 18.5156 24.5261 19.1617 25.355C19.8078 26.1844 20.6289 26.7692 21.625 27.1092L19.7817 37.3075ZM22.8717 58.59C16.3089 56.6317 10.8561 52.6406 6.51334 46.6167C2.17111 40.5933 0 33.7967 0 26.2267V8.5725L22.8717 0L45.7433 8.5725V26.2267C45.7433 33.7967 43.5722 40.5933 39.23 46.6167C34.8872 52.6406 29.4344 56.6317 22.8717 58.59ZM22.8717 55.3175C28.6033 53.4758 33.3353 49.8319 37.0675 44.3858C40.8003 38.9392 42.6667 32.8875 42.6667 26.2308V10.635L22.8717 3.30167L3.07667 10.635V26.2308C3.07667 32.8875 4.94306 38.9392 8.67583 44.3858C12.4081 49.8319 17.14 53.4758 22.8717 55.3175Z" fill="#B78A67"/>
          </svg>
        </div>
        <h5 class="partner-services__title">A Discreet Relationship</h5>
        <p class="partner-services__description">
          You work with a dedicated partnership advisor who protects your property’s interests and keeps communication efficient and private.
        </p>
      </article>

      <article class="partner-services__item">
        <div class="partner-services__icon-wrapper">
          <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M29.8625 59.7433C25.7342 59.7433 21.8531 58.9617 18.2192 57.3983C14.5853 55.8344 11.4244 53.7089 8.73667 51.0217C6.04833 48.3344 3.92028 45.1744 2.3525 41.5417C0.784167 37.9089 0 34.0275 0 29.8975C0 25.7697 0.781666 21.8892 2.345 18.2558C3.90889 14.6225 6.03444 11.4578 8.72167 8.76167C11.4089 6.06556 14.5689 3.93139 18.2017 2.35917C21.8344 0.786389 25.7158 0 29.8458 0C33.9764 0 37.8594 0.785558 41.495 2.35667C45.1306 3.92834 48.2931 6.06111 50.9825 8.755C53.672 11.4489 55.8044 14.6108 57.38 18.2408C58.9556 21.8714 59.7433 25.7503 59.7433 29.8775C59.7433 34.0081 58.9578 37.8911 57.3867 41.5267C55.815 45.1622 53.6822 48.3247 50.9883 51.0142C48.2944 53.7036 45.1322 55.8308 41.5017 57.3958C37.8706 58.9608 33.9908 59.7433 29.8625 59.7433ZM29.8617 56.6667C37.3089 56.6667 43.6381 54.0642 48.8492 48.8592C54.0608 43.6547 56.6667 37.3289 56.6667 29.8817C56.6667 22.4344 54.0622 16.1053 48.8533 10.8942C43.6439 5.6825 37.3125 3.07667 29.8592 3.07667C22.4058 3.07667 16.0789 5.68112 10.8783 10.89C5.67722 16.0994 3.07667 22.4308 3.07667 29.8842C3.07667 37.3375 5.67917 43.6644 10.8842 48.865C16.0886 54.0661 22.4144 56.6667 29.8617 56.6667ZM29.8742 46.41C25.2808 46.41 21.3756 44.8044 18.1583 41.5933C14.9417 38.3822 13.3333 34.4833 13.3333 29.8967C13.3333 25.3094 14.9389 21.4019 18.15 18.1742C21.3611 14.9469 25.26 13.3333 29.8467 13.3333C34.4339 13.3333 38.3414 14.9408 41.5692 18.1558C44.7964 21.3714 46.41 25.2758 46.41 29.8692C46.41 34.4625 44.8025 38.3678 41.5875 41.585C38.3719 44.8017 34.4675 46.41 29.8742 46.41ZM29.8608 43.3333C33.5864 43.3333 36.7631 42.0228 39.3908 39.4017C42.0192 36.7806 43.3333 33.6075 43.3333 29.8825C43.3333 26.1569 42.0206 22.9803 39.395 20.3525C36.7694 17.7242 33.5911 16.41 29.86 16.41C26.1283 16.41 22.9539 17.7228 20.3367 20.3483C17.7189 22.9739 16.41 26.1522 16.41 29.8833C16.41 33.615 17.7206 36.7894 20.3417 39.4067C22.9628 42.0244 26.1358 43.3333 29.8608 43.3333ZM29.8592 33.0767C28.9981 33.0767 28.2506 32.7581 27.6167 32.1208C26.9833 31.4831 26.6667 30.7367 26.6667 29.8817C26.6667 29.0267 26.9853 28.2769 27.6225 27.6325C28.2603 26.9886 29.0067 26.6667 29.8617 26.6667C30.7167 26.6667 31.4664 26.9875 32.1108 27.6292C32.7547 28.2708 33.0767 29.0225 33.0767 29.8842C33.0767 30.7453 32.7558 31.4928 32.1142 32.1267C31.4725 32.76 30.7208 33.0767 29.8592 33.0767Z" fill="#B78A67"/>
          </svg>
        </div>
        <h5 class="partner-services__title">A Discreet Relationship</h5>
        <p class="partner-services__description">
          You work with a dedicated partnership advisor who protects your property’s interests and keeps communication efficient and private.
        </p>
      </article>

      <article class="partner-services__item">
        <div class="partner-services__icon-wrapper">
          <svg width="46" height="61" viewBox="0 0 46 61" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 51.6408V48.5642H5.12833V22.615C5.12833 18.2817 6.51055 14.4622 9.275 11.1567C12.0394 7.85111 15.5322 5.77861 19.7533 4.93916V3.2175C19.7533 2.30917 20.0594 1.54583 20.6717 0.9275C21.2844 0.309167 22.0494 0 22.9667 0C23.8844 0 24.6553 0.309167 25.2792 0.9275C25.9031 1.54583 26.215 2.30917 26.215 3.2175V4.93916C30.4456 5.77861 33.9461 7.85111 36.7167 11.1567C39.4867 14.4622 40.8717 18.2817 40.8717 22.615V48.5642H46V51.6408H0ZM22.9725 60.1442C21.5164 60.1442 20.2739 59.6269 19.245 58.5925C18.2167 57.5586 17.7025 56.3153 17.7025 54.8625H28.2658C28.2658 56.3258 27.7478 57.5719 26.7117 58.6008C25.675 59.6297 24.4286 60.1442 22.9725 60.1442ZM8.205 48.5642H37.795V22.615C37.795 18.5189 36.3483 15.0317 33.455 12.1533C30.5617 9.27555 27.0675 7.83667 22.9725 7.83667C18.8781 7.83667 15.3931 9.27555 12.5175 12.1533C9.6425 15.0317 8.205 18.5189 8.205 22.615V48.5642Z" fill="#B78A67"/>
          </svg>
        </div>
        <h5 class="partner-services__title">A Discreet Relationship</h5>
        <p class="partner-services__description">
          You work with a dedicated partnership advisor who protects your property’s interests and keeps communication efficient and private.
        </p>
      </article>
    </div>
  </div>
</section>

<section class="partner-process section">
  <div class="container">
    <h4 class="section-title">HOW PARTNERSHIP WORKS</h4>

    <div class="partner-process__layout">
      <div class="partner-process__media">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-process__media-winter.png" alt="partner process media" class="for-winter">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-process__media-summer.png" alt="partner process media" class="for-summer">
      </div>

      <div class="partner-process__steps">

        <article class="partner-process__step">
          <h6 class="partner-process__step-title">Share your property</h6>
          <p class="partner-process__step-text">Location, capacity and details (confidential).</p>
        </article>

        <article class="partner-process__step">
          <h6 class="partner-process__step-title">Assessment & standards</h6>
          <p class="partner-process__step-text">We verify suitability (design, service, maintenance requirements).</p>
        </article>

        <article class="partner-process__step">
          <h6 class="partner-process__step-title">Agreement & onboardingy</h6>
          <p class="partner-process__step-text">Private contract, tailored conditions, optional off-market visibility.</p>
        </article>

        <article class="partner-process__step">
          <h6 class="partner-process__step-title">We handle the stays</h6>
          <p class="partner-process__step-text">Guest management, staff coordination, lifestyle concierge and reporting.</p>
        </article>

      </div>
    </div>
  </div>
</section>

<section class="contact-form section">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/_submission_water-mark.svg" alt="water mark" class="contact-form__water-mark">
  <div class="container">
    <div class="contact-form__header">
      <h2 class="section-title">SUBMIT YOUR PROPERTY TO AR PRIVÉ</h2>
      <p class="contact-form__subtitle">Share your details to join our private portfolio. All information remains confidential.</p>
      <span class="contact-form__disclaimer">ONLY ELIGIBLE PROPERTIES WILL BE REVIEWED.</span>
    </div>

    <div class="contact-form__layout">
      <!-- <form action="#" class="contact-form__form">

        <div class="contact-form__section">
          <h3 class="contact-form__group-title">Property Details</h3>
          <div class="contact-form__group">
            <div class="contact-form__row">
              <div class="contact-form__field">
                <label>Location (Destination)</label>
                <select>
                  <option>Courchevel</option>
                </select>
              </div>
              <div class="contact-form__field">
                <label>Property Type</label>
                <select>
                  <option>Chalet</option>
                </select>
              </div>
            </div>
          </div>

          <div class="contact-form__group contact-form__group--primary">
            <div class="contact-form__field">
              <label>Capacity (number of guests) *</label>
              <input type="text" placeholder="04">
            </div>
            <div class="contact-form__row contact-form__row--btm-border">
              <div class="contact-form__field">
                <label>Number of Bathrooms *</label>
                <input type="text" placeholder="02">
              </div>
              <div class="contact-form__field">
                <label>Number of Bedrooms *</label>
                <input type="text" placeholder="02">
              </div>
            </div>
            <div class="contact-form__field">
              <label>Surface Area (optional) (m²)</label>
              <input type="text" placeholder="100">
            </div>
            <div class="contact-form__row">
              <div class="contact-form__field">
                <label>Link to Property Photos (URL) *</label>
                <input type="url" placeholder="https://photos/properties.com">
              </div>
              <div class="contact-form__field">
                <label>Link to Floor Plan (optional) (URL)</label>
                <input type="url" placeholder="https://floor/plan.com">
              </div>
            </div>
            <div class="contact-form__field">
              <label>Private Notes (optional)</label>
              <textarea placeholder="Message"></textarea>
            </div>
          </div>
        </div>

        <div class="contact-form__section">
          <h3 class="contact-form__group-title">Owner/Manager Information</h3>
          <div class="contact-form__group contact-form__group--primary">
            <div class="contact-form__row">
              <div class="contact-form__field">
                <label>Full Name *</label>
                <input type="text" placeholder="Aldo Ruta">
              </div>
              <div class="contact-form__field">
                <label>Email *</label>
                <input type="email" placeholder="aldo.ruta@email.com">
              </div>
            </div>
            <div class="contact-form__row">
              <div class="contact-form__field">
                <label>Mobile Phone *</label>
                <div class="contact-form__tel-input">
                  <div class="contact-form__flag-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/_country-flag.svg" alt="Italy" class="contact-form__flag-icon">
                    <span class="contact-form__flag-arrow"></span>
                  </div>
                  <input type="tel" placeholder="+39 334 905 1603">
                </div>
              </div>
              <div class="contact-form__field">
                <label>Role *</label>
                <select>
                  <option>Owner</option>
                  <option>Manager</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="contact-form__section">
          <h3 class="contact-form__group-title">Tell Us More (Optional)</h3>
          <div class="contact-form__field">
            <textarea class="contact-form__textarea" placeholder="Message"></textarea>
          </div>
        </div>

        <div class="contact-form__footer">
          <h3 class="contact-form__group-title">Confidentiality Note:</h3>
          <p class="contact-form__note">Your information is used exclusively to evaluate eligibility for our private portfolio. We do not publish or share property content without written consent.</p>
          <button type="submit" class="contact-form__submit">Submit Property Application</button>
          <p class="contact-form__sub-note">Properties must meet curated standards in design, maintenance and hospitality potential. This avoids low-quality submissions.</p>
        </div>
      </form> -->
      <?php echo do_shortcode('[contact-form-7 id="d125491" title="Property Submission form"]'); ?>

      <aside class="contact-form__gallery">
        <div class="contact-form__image-wrapper contact-form__image-wrapper__primary">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-submission_winter-primary.png" alt="Luxury Interior" class="for-winter">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-submission-summer-primary.png" alt="Luxury Interior" class="for-summer">
        </div>
        <div class="contact-form__image-wrapper contact-form__image-wrapper__secondary">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/parnter-sumbission_winter-secondary.png" alt="Mountain Sunset" class="for-winter">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-submission-summer-secondary.png" alt="Mountain Sunset" class="for-summer">
        </div>
      </aside>
    </div>
  </div>
</section>

<?php get_footer(); ?>