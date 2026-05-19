/**
 * Property Card Carousel
 *
 * Initializes Swiper on property card image areas.
 * Exposes window.initPropertyCarousels() for re-initialization after AJAX loads.
 */
(function () {
  function initPropertyCarousels(container) {
    var root = container || document;
    var carousels = root.querySelectorAll('.listing-grid__carousel:not(.swiper-initialized)');

    carousels.forEach(function (el) {
      new Swiper(el, {
        slidesPerView: 1,
        loop: true,
        navigation: {
          prevEl: el.querySelector('.swiper-button-prev'),
          nextEl: el.querySelector('.swiper-button-next'),
        },
      });
    });
  }

  // Expose globally for AJAX re-init
  window.initPropertyCarousels = initPropertyCarousels;

  document.addEventListener('DOMContentLoaded', function () {
    initPropertyCarousels();

    // Prevent link navigation when clicking prev/next arrows
    document.addEventListener('click', function (e) {
      if (
        e.target.closest('.listing-grid__carousel-prev') ||
        e.target.closest('.listing-grid__carousel-next')
      ) {
        e.preventDefault();
        e.stopPropagation();
      }
    });
  });
})();
