<?php
/**
 * Template Name: About Us
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

<section class="hero hero-modifier">
  <div class="hero__img">
    <img src="assets/images/about-hero-winter.png" alt="" class="for-winter">
    <img src="assets/images/about-summer-hero.png" alt="" class="for-summer">
  </div>

  <div class="hero__overlay"></div>
  <div class="container">
    <h1 class="hero__title for-winter" data-aos="fade-up" data-aos-delay="500">We craft moments, not just stays</h1>
    <p class="hero__description for-winter" data-aos="fade-up" data-aos-delay="600">Private homes, curated experiences, and timeless discretion.</p>
    <h1 class="hero__title for-summer" data-aos="fade-up" data-aos-delay="500">We craft moments — not just stays.</h1>
    <p class="hero__description for-summer" data-aos="fade-up" data-aos-delay="600">Private homes, curated experiences, and timeless discretion.p>
  </div>
</section>

<section class="breadcrumb single-chalet__breadcrumb breadcrumb__mobile-hide">
  <div class="container single-chalet__links">
    <a href="#" class="breadcrumb__home" data-aos="fade-right" data-aos-delay="200">
      <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.33333 19.718H6.25633V11.872H12.4103V19.718H17.3333V7.718L9.33333 1.66667L1.33333 7.718V19.718ZM0 21.0513V7.05133L9.33333 0L18.6667 7.05133V21.0513H11.077V13.2053H7.58967V21.0513H0Z" fill="#1F1F1F"/>
      </svg>
    </a>

    <a href="#" class="breadcrumb__arrow" data-aos="fade-right" data-aos-delay="300">
      <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
      </svg>
    </a>

    <a href="#" class="breadcrumb__current" data-aos="fade-right" data-aos-delay="400">Discover Us</a>

    <a href="#" class="breadcrumb__arrow" data-aos="fade-right" data-aos-delay="500">
      <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.13333 7.077L0 0.943667L0.943667 0L8.02067 7.077L0.943667 14.154L0 13.2103L6.13333 7.077Z" fill="black"/>
      </svg>
    </a>

    <a href="#" class="breadcrumb__current" data-aos="fade-right" data-aos-delay="900">About Us</a>
  </div>
</section>

<section class="about-intro section">
  <div class="container">

    <figure class="about-intro__gallery">
      <figure class="about-intro__image-wrapper about-intro__image-wrapper--primary" data-aos="fade-right" data-aos-delay="200">
        <img src="./assets/images/about-intro-primary-winter.png" alt="Luxury Winter Cabin" class="for-winter">
        <img src="./assets/images/about-intro-primary-summer.png" alt="Luxury Winter Cabin" class="for-summer">
      </figure>

      <figure class="about-intro__image-wrapper about-intro__image-wrapper--secondary" data-aos="fade-left" data-aos-delay="300">
        <img src="./assets/images/about-intro-secondary-winter.png" alt="Luxury Summer Villa" class="for-winter">
        <img src="./assets/images/about-intro-secondary-summer.png" alt="Luxury Summer Villa" class="for-summer">
      </figure>
    </figure>

    <article class="about-intro__content">
      <h2 class="section-title">Who we are</h2>
      <div class="about-intro__description">
        <p class="about-intro__text about-intro__text--highlight">
          <span>AR PRIVÉ</span>is a boutique hospitality and lifestyle concierge for discerning travellers. We combine hand-picked private
            homes with refined, discreet, and personalised service — ensuring that every stay becomes effortless and memorable.
        </p>
        <p class="about-intro__text">
          We believe luxury is not in the price of a place, but in the way you are welcomed, cared for, and understood.
        </p>
      </div>
    </article>
  </div>
</section>

<section class="brand-pillars section">
  <div class="container">
    <h2 class="section-title" data-aos="fade-up">Who we are</h2>

    <div class="brand-pillars__grid">
      <article class="brand-pillars__item" data-aos="fade-up" data-aos-delay="100">
        <figure aria-hidden="true">
          <svg width="63" height="56" viewBox="0 0 63 56" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M31.3458 55.705L0 18.0767L9.03833 0H53.6533L62.6917 18.0767L31.3458 55.705ZM20.7367 16.6667H41.955L35.2883 3.33333H27.4033L20.7367 16.6667ZM29.6792 48.5317V20H5.98667L29.6792 48.5317ZM33.0125 48.5317L56.705 20H33.0125V48.5317ZM45.6533 16.6667H58.205L51.5383 3.33333H38.9867L45.6533 16.6667ZM4.48667 16.6667H17.0383L23.705 3.33333H11.1533L4.48667 16.6667Z" fill="#B78A67"/>
          </svg>
        </figure>
        <div class="brand-pillars__content">
          <h5 class="brand-pillars__content--title">Exclusivity</h5>
          <p class="brand-pillars__content--text">Private selection, including confidential off-market homes.</p>
        </div>
      </article>

      <article class="brand-pillars__item" data-aos="fade-up" data-aos-delay="200">
        <figure>
          <svg width="56" height="60" viewBox="0 0 56 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 60V47.4617C6.83333 44.5728 4.375 41.3258 2.625 37.7208C0.875 34.1164 0 30.4161 0 26.62C0 19.2256 2.5925 12.9403 7.7775 7.76417C12.9631 2.58805 19.2594 0 26.6667 0C32.6711 0 38.0975 1.82806 42.9458 5.48417C47.7942 9.14028 50.9383 13.8614 52.3783 19.6475L55.8342 33.3283C56.0558 34.1733 55.8975 34.9411 55.3592 35.6317C54.8208 36.3217 54.1028 36.6667 53.205 36.6667H46.6667V47.9483C46.6667 49.4294 46.1394 50.6972 45.085 51.7517C44.0306 52.8061 42.7628 53.3333 41.2817 53.3333H33.3333V60H30V50H41.2817C41.88 50 42.3717 49.8078 42.7567 49.4233C43.1411 49.0383 43.3333 48.5467 43.3333 47.9483V33.3333H52.3333L49.1667 20.4167C47.8889 15.3183 45.1453 11.1967 40.9358 8.05167C36.7264 4.90611 31.97 3.33333 26.6667 3.33333C20.2222 3.33333 14.7222 5.58944 10.1667 10.1017C5.61111 14.6144 3.33333 20.1019 3.33333 26.5642C3.33333 29.8864 4.01389 33.0425 5.375 36.0325C6.73611 39.0231 8.66667 41.6811 11.1667 44.0067L13.3333 46V60H10ZM24.8075 38.59H28.5258L28.7692 35.5125C29.6408 35.3458 30.4711 35.0553 31.26 34.6408C32.0483 34.2264 32.7094 33.6881 33.2433 33.0258L35.9233 34.3717L37.7817 31.205L35.3458 29.41C35.7136 28.4956 35.8975 27.5811 35.8975 26.6667C35.8975 25.7522 35.7136 24.8378 35.3458 23.9233L37.7817 22.1283L35.9233 18.9617L33.2433 20.3075C32.7094 19.6453 32.0483 19.1069 31.26 18.6925C30.4711 18.2781 29.6408 17.9875 28.7692 17.8208L28.5258 14.7433H24.8075L24.5642 17.8208C23.6925 17.9875 22.8622 18.2781 22.0733 18.6925C21.285 19.1069 20.6239 19.6453 20.09 20.3075L17.41 18.9617L15.5517 22.1283L17.9875 23.9233C17.6197 24.8378 17.4358 25.7522 17.4358 26.6667C17.4358 27.5811 17.6197 28.4956 17.9875 29.41L15.5517 31.205L17.41 34.3717L20.09 33.0258C20.6239 33.6881 21.285 34.2264 22.0733 34.6408C22.8622 35.0553 23.6925 35.3458 24.5642 35.5125L24.8075 38.59ZM26.6625 32.885C24.9347 32.885 23.4672 32.28 22.26 31.07C21.0522 29.86 20.4483 28.3908 20.4483 26.6625C20.4483 24.9347 21.0533 23.4672 22.2633 22.26C23.4733 21.0522 24.9425 20.4483 26.6708 20.4483C28.3986 20.4483 29.8661 21.0533 31.0733 22.2633C32.2811 23.4733 32.885 24.9425 32.885 26.6708C32.885 28.3986 32.28 29.8661 31.07 31.0733C29.86 32.2811 28.3908 32.885 26.6625 32.885Z" fill="#B78A67"/>
          </svg>
        </figure>
        <div class="brand-pillars__content">
          <h5 class="brand-pillars__content--title">Discretion</h5>
          <p class="brand-pillars__content--text">Your privacy and comfort always come firstp</p>
        </div>
      </article>

      <article class="brand-pillars__item" data-aos="fade-up" data-aos-delay="300">
        <figure>
          <svg width="67" height="55" viewBox="0 0 67 55" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 54.6667V49.3842C0 47.9636 0.376666 46.6944 1.13 45.5767C1.88278 44.4594 2.95055 43.5581 4.33333 42.8725C7.03833 41.5558 10.0147 40.4831 13.2625 39.6542C16.5103 38.8247 19.7647 38.41 23.0258 38.41C26.2864 38.41 29.5406 38.8247 32.7883 39.6542C36.0361 40.4831 39.0125 41.5558 41.7175 42.8725C43.1003 43.5581 44.1683 44.4594 44.9217 45.5767C45.6744 46.6944 46.0508 47.9636 46.0508 49.3842V54.6667H0ZM3.07667 51.59H42.9742V49.3667C42.9742 48.4405 42.7061 47.6747 42.17 47.0692C41.6333 46.4631 40.9892 45.9561 40.2375 45.5483C38.1692 44.4567 35.5686 43.5069 32.4358 42.6992C29.3031 41.8914 26.1681 41.4875 23.0308 41.4875C19.8931 41.4875 16.7547 41.8933 13.6158 42.705C10.4764 43.5172 7.875 44.4658 5.81167 45.5508C5.06111 45.9569 4.41778 46.4631 3.88167 47.0692C3.345 47.6747 3.07667 48.4405 3.07667 49.3667V51.59ZM23.0233 31.0258C20.2383 31.0258 17.9186 30.1 16.0642 28.2483C14.2092 26.3967 13.2817 23.9503 13.2817 20.9092H12.5767C12.2328 20.9092 11.9331 20.7811 11.6775 20.525C11.4225 20.2683 11.295 19.9672 11.295 19.6217C11.295 19.2756 11.4225 18.9744 11.6775 18.7183C11.9331 18.4617 12.2328 18.3333 12.5767 18.3333H13.2817C13.3672 16.735 13.7033 15.2744 14.29 13.9517C14.8767 12.6289 15.8569 11.3417 17.2308 10.09V13.1942C17.2308 13.5731 17.3406 13.8747 17.56 14.0992C17.7794 14.3236 18.08 14.4358 18.4617 14.4358C18.8428 14.4358 19.1431 14.3261 19.3625 14.1067C19.5825 13.8872 19.6925 13.5906 19.6925 13.2167V8.88416C20.1431 8.71861 20.6669 8.5725 21.2642 8.44583C21.8614 8.31972 22.4486 8.25666 23.0258 8.25666C23.6025 8.25666 24.1894 8.31972 24.7867 8.44583C25.3839 8.5725 25.9081 8.71833 26.3592 8.88333V13.2125C26.3592 13.5792 26.4689 13.8747 26.6883 14.0992C26.9078 14.3236 27.2083 14.4358 27.59 14.4358C27.9711 14.4358 28.2714 14.3261 28.4908 14.1067C28.7103 13.8872 28.82 13.5919 28.82 13.2208V10.09C30.2367 11.3417 31.2278 12.6289 31.7933 13.9517C32.3583 15.2744 32.6836 16.73 32.7692 18.3183H33.4742C33.8181 18.3183 34.1178 18.4467 34.3733 18.7033C34.6289 18.96 34.7567 19.2614 34.7567 19.6075C34.7567 19.9542 34.6289 20.2558 34.3733 20.5125C34.1178 20.7692 33.8181 20.8975 33.4742 20.8975H32.7692C32.7692 23.9464 31.8411 26.3967 29.985 28.2483C28.1289 30.1 25.8083 31.0258 23.0233 31.0258ZM23.0258 27.9483C24.9442 27.9483 26.535 27.3169 27.7983 26.0542C29.0611 24.7914 29.6925 23.2006 29.6925 21.2817H16.3592C16.3592 23.2006 16.9906 24.7914 18.2533 26.0542C19.5161 27.3169 21.1069 27.9483 23.0258 27.9483ZM47.9442 37.1025L47.7125 34.7308C47.2886 34.6197 46.8492 34.4414 46.3942 34.1958C45.9392 33.9497 45.5514 33.6664 45.2308 33.3458L43.0258 34.3075L41.795 32.1792L43.7567 30.7692C43.6711 30.5169 43.6283 30.2861 43.6283 30.0767V28.7242C43.6283 28.5364 43.6711 28.295 43.7567 28L41.795 26.59L43.0258 24.4617L45.2308 25.4233C45.5447 25.1089 45.9314 24.8269 46.3908 24.5775C46.8503 24.3275 47.2883 24.1478 47.705 24.0383L47.9358 21.6667H50.4158L50.6475 24.0383C51.0614 24.1428 51.4997 24.3211 51.9625 24.5733C52.4253 24.8256 52.8139 25.1089 53.1283 25.4233L55.3333 24.4617L56.5642 26.59L54.6025 28C54.6881 28.295 54.7308 28.5364 54.7308 28.7242V30.0767C54.7308 30.2861 54.6881 30.5169 54.6025 30.7692L56.5642 32.1792L55.3333 34.3075L53.1283 33.3458C52.8078 33.6664 52.42 33.9497 51.965 34.1958C51.5094 34.4414 51.0722 34.6197 50.6533 34.7308L50.4292 37.1025H47.9442ZM49.1792 32.3975C50.0231 32.3975 50.7364 32.1064 51.3192 31.5242C51.9014 30.9419 52.1925 30.2286 52.1925 29.3842C52.1925 28.5403 51.9014 27.8272 51.3192 27.245C50.7364 26.6628 50.0231 26.3717 49.1792 26.3717C48.3353 26.3717 47.6222 26.6628 47.04 27.245C46.4578 27.8272 46.1667 28.5403 46.1667 29.3842C46.1667 30.2286 46.4578 30.9419 47.04 31.5242C47.6222 32.1064 48.3353 32.3975 49.1792 32.3975ZM55.9392 19.0767L55.73 16.5808C55.0939 16.4542 54.4183 16.2017 53.7033 15.8233C52.9889 15.4456 52.4289 14.9831 52.0233 14.4358L49.59 15.3717L48.2567 13.115L50.3458 11.5642C50.2625 11.2503 50.1925 10.9125 50.1358 10.5508C50.0792 10.1897 50.0508 9.85222 50.0508 9.53833C50.0508 9.22444 50.0792 8.88694 50.1358 8.52583C50.1925 8.16417 50.2625 7.82639 50.3458 7.5125L48.2567 5.96166L49.59 3.705L52.0192 4.64083C52.4336 4.09417 52.9986 3.63166 53.7142 3.25333C54.4297 2.875 55.0975 2.62389 55.7175 2.5L55.9483 0H58.7275L58.9367 2.49583C59.5728 2.6225 60.2481 2.875 60.9625 3.25333C61.6775 3.63166 62.2378 4.09417 62.6433 4.64083L65.0767 3.705L66.41 5.96166L64.32 7.5125C64.4033 7.82639 64.4733 8.16417 64.53 8.52583C64.5867 8.88694 64.615 9.22444 64.615 9.53833C64.615 9.85222 64.5867 10.1897 64.53 10.5508C64.4733 10.9125 64.4033 11.2503 64.32 11.5642L66.41 13.115L65.0767 15.3717L62.6475 14.4358C62.2331 14.9831 61.6681 15.4456 60.9525 15.8233C60.2369 16.2017 59.5689 16.4528 58.9483 16.5767L58.7175 19.0767H55.9392ZM57.3333 14.09C58.6283 14.09 59.7106 13.655 60.58 12.785C61.4494 11.9156 61.8842 10.8333 61.8842 9.53833C61.8842 8.24333 61.4494 7.16111 60.58 6.29167C59.7106 5.42222 58.6283 4.9875 57.3333 4.9875C56.0383 4.9875 54.9561 5.42222 54.0867 6.29167C53.2167 7.16111 52.7817 8.24333 52.7817 9.53833C52.7817 10.8333 53.2167 11.9156 54.0867 12.785C54.9561 13.655 56.0383 14.09 57.3333 14.09Z" fill="#B78A67"/>
          </svg>
        </figure>
        <div class="brand-pillars__content">
          <h5 class="brand-pillars__content--title">Personalisation</h5>
          <p class="brand-pillars__content--text">Every request is handled by hand — never automated. </p>
        </div>
      </article>

      <article class="brand-pillars__item" data-aos="fade-up" data-aos-delay="400">
        <svg width="53" height="51" viewBox="0 0 53 51" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M24.1892 42.8725H0V37.6925C0 36.3464 0.385 35.0978 1.155 33.9467C1.925 32.7956 2.9825 31.8967 4.3275 31.25C7.4525 29.7739 10.56 28.6597 13.65 27.9075C16.74 27.1553 19.8139 26.7792 22.8717 26.7792H23.17V29.8558H22.8717C19.9317 29.8558 17.0319 30.2025 14.1725 30.8958C11.3136 31.5892 8.52639 32.5972 5.81083 33.92C4.94139 34.39 4.26833 34.9508 3.79167 35.6025C3.315 36.2542 3.07667 36.9508 3.07667 37.6925V39.8017H23.4167C23.4811 40.3256 23.5819 40.845 23.7192 41.36C23.8558 41.8744 24.0125 42.3786 24.1892 42.8725ZM41.6317 50.975C38.3067 50.1522 35.6806 48.3328 33.7533 45.5167C31.8256 42.7011 30.8617 39.5503 30.8617 36.0642V29.1067L41.6317 23.6925L52.3592 29.1008V36.0758C52.3592 39.5358 51.3969 42.6783 49.4725 45.5033C47.5486 48.3283 44.935 50.1522 41.6317 50.975ZM41.6317 47.8942C44.0628 47.0653 45.9564 45.5444 47.3125 43.3317C48.6681 41.1183 49.3458 38.6917 49.3458 36.0517V30.9492L41.6175 27.1025L33.875 30.9492V36.0517C33.875 38.6906 34.5544 41.123 35.9133 43.3492C37.2722 45.5753 39.1783 47.0903 41.6317 47.8942ZM22.8717 19.4875C20.1839 19.4875 17.8881 18.5356 15.9842 16.6317C14.0803 14.7278 13.1283 12.4319 13.1283 9.74417C13.1283 7.05583 14.0803 4.75972 15.9842 2.85583C17.8881 0.951941 20.1839 0 22.8717 0C25.5594 0 27.8553 0.951941 29.7592 2.85583C31.6631 4.75972 32.615 7.05583 32.615 9.74417C32.615 12.4319 31.6631 14.7278 29.7592 16.6317C27.8553 18.5356 25.5594 19.4875 22.8717 19.4875ZM22.8717 16.4108C24.705 16.4108 26.2744 15.7581 27.58 14.4525C28.8856 13.1469 29.5383 11.5775 29.5383 9.74417C29.5383 7.91083 28.8856 6.34139 27.58 5.03583C26.2744 3.73028 24.705 3.0775 22.8717 3.0775C21.0383 3.0775 19.4689 3.73028 18.1633 5.03583C16.8578 6.34139 16.205 7.91083 16.205 9.74417C16.205 11.5775 16.8578 13.1469 18.1633 14.4525C19.4689 15.7581 21.0383 16.4108 22.8717 16.4108Z" fill="#B78A67"/>
        </svg>
        <div class="brand-pillars__content">
          <h5 class="brand-pillars__content--title">Local Expertise</h5>
          <p class="brand-pillars__content--text">We work directly with trusted professionals on-sitep </p>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="founder-note section">
  <div class="container">
    <div class="founder-note__content">
      <svg width="60" height="55" viewBox="0 0 60 55" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M45.4545 55H30.9091V3.8147e-06H60L45.4545 55Z" fill="black"/>
        <path d="M14.5455 55H0V3.8147e-06H29.0909L14.5455 55Z" fill="black"/>
      </svg>
      <h4 class="section-title">A note from our founder</h4>

      <div class="founder-note__body">
        <p>AR PRIVÉ was born from a decade of hospitality experience, working closely with international travellers, private clients, and luxury venues. Throughout the years, one principle became clear: the most memorable stays are not about excess, but about care.</p>
        <p>Our mission is simple — to offer refined discretion, personal attention, and access to experiences that feel both intimate and exceptional.</p>
        <p>This is hospitality as it should be: thoughtful, honest, and quietly unforgettable.</p>
      </div>
      <a href="#" class="founder-note__signature">Aldo Ruta — Founder & Private Concierge</a>
    </div>
    <div class="founder-note__media">
      <img src="./assets/images/founder.png" alt="founder image">
    </div>
  </div>
</section>

<?php get_footer(); ?>