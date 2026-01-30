<?php
/**
 * Template Name: Join Us
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/join-us-hero-winter.png" alt="" class="for-winter">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/join-use-hero-summer.png" alt="" class="for-summer">
  </div>
  <div class="hero__overlay"></div>
  <div class="container">
    <h1 class="hero__title">B2B Partnerships for Luxury Travel Professionals</h1>
    <p class="hero__description hero__modifier">Trusted support in Mykonos & Courchevel — curated villas and private concierge for your clients.</p>
  </div>
</section>

<section class="breadcrumb breadcrumb__modifier">
  <div class="container single-chalet__links">
    <a href="<?php echo home_url('/'); ?>" class="breadcrumb__home">
      <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.33333 19.718H6.25633V11.872H12.4103V19.718H17.3333V7.718L9.33333 1.66667L1.33333 7.718V19.718ZM0 21.0513V7.05133L9.33333 0L18.6667 7.05133V21.0513H11.077V13.2053H7.58967V21.0513H0Z" fill="#1F1F1F"/>
      </svg>
    </a>
    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
    </svg>

    <a href="<?php echo home_url(); ?>/how-we-work" class="breadcrumb__current">Discover Us</a>
    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
    </svg>

    <a href="#" class="breadcrumb__current">Join Us</a>
  </div>
</section>

<section class="text-layout section">
  <div class="container">
    <h4 class="section-title">ABOUT US</h4>

    <div class="text-layout__content">
      <p class="text-layout__text">AR PRIVÉ is a boutique hospitality firm specialized in high-end seasonal destinations.</p>
      <p class="text-layout__text">We curate private villas and chalets, and we provide discreet lifestyle concierge services for international travelers.</p>
      <p class="text-layout__text">Our work blends local insight, refined hosting and trusted partnerships, allowing agencies and travel professionals to offer exceptional stays with complete confidence.</p>
      <p class="text-layout__text">We elevate your service, while you remain the clients’ trusted advisor.</p>
    </div>
  </div>
</section>

<section class="services-overview section">
  <div class="container">
    <article class="services-overview__content">
      <h4 class="section-title">WHAT WE DO</h4>
      <h3 class="services-overview__title">Local Expertise</h3>
      <div class="services-overview__body">
        <p class="services-overview__text">
          We help you secure the right villa or chalet, then we shape every detail around your clients' lifestyle — from private staff and wellness to dining, yacht access or on-mountain experiences.
        </p>
        <p class="services-overview__text">
          You remain their trusted advisor, while our local team discreetly curates and delivers the stay.
        </p>
        <p class="services-overview__text services-overview__text--italic">
          Just share your clients' travel needs — with our B2B team — we take care of the rest.
        </p>
      </div>
    </article>

    <figure class="services-overview__gallery">
      <figure class="services-overview__image services-overview__image--1">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/what-we-do__one.png" class="for-winter" alt="Luxury Interior">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services-overview_summer-one.png" class="for-summer" alt="Luxury Interior">
      </figure>
      <figure class="services-overview__image services-overview__image--2">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/what-we-do__two.png" class="for-winter" alt="Pool View">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services-overview_summer-two.png" class="for-summer" alt="pool view">
      </figure>
      <figure class="services-overview__image services-overview__image--3">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/what-we-do__three.png" class="for-winter" alt="Winter Cabin">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services-overview_summer-three.png" class="for-summer" alt="Winter Cabin">
      </figure>
      <figure class="services-overview__image services-overview__image--4">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/what-we-do__four.png" class="for-winter" alt="Summer Villa">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/services-overview_summer-four.png" class="for-summer" alt="Summer Villa">
      </figure>
    </figure>
  </div>
</section>

<section class="collaboration-steps section">
  <div class="container">
    <h2 class="section-title">HOW WE COLLABORATE</h2>

    <div class="collaboration-steps__grid">

      <article class="collaboration-steps__step grid-item-1">
        <span class="collaboration-steps-label">STEP 1</span>
        <div class="collaboration-steps__content">
          <h3 class="collaboration-steps-title">How to make a request?</h3>
          <p class="collaboration-steps__text">You can contact us directly with your clients' travel dates, group size and expectations. We will advise you on the best properties and services in Mykonos or Courchevel, based on real availability and local expertise.</p>
          <p class="collaboration-steps__text collaboration-steps__text--italic">We curate on your behalf — quietly, efficiently and privately.</p>
        </div>
      </article>

      <article class="collaboration-steps__step grid-item-2">
        <span class="collaboration-steps-label">STEP 2</span>
        <div class="collaboration-steps__content">
          <h3 class="collaboration-steps-title">How is the booking organized?</h3>
          <p class="collaboration-steps__text">Once we have found the right villa or chalet together, we privately confirm availability and secure the stay.</p>
          <p class="collaboration-steps__text">You remain your client's direct contact, while our team supports you with personalized planning, tailored services and logistical precision.</p>
          <p class="collaboration-steps__text collaboration-steps__text--italic">Your relationship with the client stays yours. Our support stays fully behind you.</p>
        </div>
      </article>

      <article class="collaboration-steps__step grid-item-3">
        <span class="collaboration-steps-label">STEP 3</span>
        <div class="collaboration-steps__content">
          <h3 class="collaboration-steps-title">How do we manage the stay?</h3>
          <p class="collaboration-steps__text">Before arrival, we assign a dedicated Lifestyle & Property Host to welcome your clients, coordinate in-home services, manage reservations, and assist with last-minute needs throughout the stay.</p>
          <p class="collaboration-steps__text">You are always updated, and your clients receive a discreet, seamless experience at all times.</p>
          <p class="collaboration-steps__text collaboration-steps__text--italic">You design the relationship. We deliver the experience.</p>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="terms-overview section">
  <article class="container">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/collaboration-terms__water-mark.svg" alt="water mark">
    <h4 class="section-title">Private collaboration terms</h4>
    <article class="terms-overview__content">
      <p class="terms-overview__text">
        Agreements are defined privately based on destination, season and property type
      </p>
      <p class="terms-overview__text">
        We operate with a transparent commission structure for selected partners, always shared on request and tailored to your business model.
      </p>
      <p class="terms-overview__text">
        Our approach prioritizes clarity, discretion and long-term cooperation
      </p>
    </article>
  </article>
</section>

<?php get_footer(); ?>