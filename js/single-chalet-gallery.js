document.addEventListener('DOMContentLoaded', function () {
  const gallery = document.querySelector('.product-detail__gallery');
  if (!gallery) return;

  const swiperContainer = gallery.querySelector('.chalet-gallery-swiper');
  const wrapper = swiperContainer ? swiperContainer.querySelector('.swiper-wrapper') : null;
  const countEl = gallery.querySelector('.product-detail__count');
  const expandBtn = gallery.querySelector('.product-detail__expand');

  let swiperInstance = null;

  // Store all slides once on page load so we can filter them per season
  const allSlides = wrapper ? Array.from(wrapper.querySelectorAll('.swiper-slide')) : [];

  function isSlideVisibleForSeason(slide) {
    const isWinter = document.body.classList.contains('color-scheme-winter');
    const isSummer = document.body.classList.contains('color-scheme-summer');
    const winterImg = slide.querySelector('img.for-winter');
    const summerImg = slide.querySelector('img.for-summer');
    const regularImg = slide.querySelector('img:not(.for-winter):not(.for-summer)');

    if (regularImg) return true;
    if (isWinter && winterImg) return true;
    if (isSummer && summerImg) return true;
    return false;
  }

  function updateCount() {
    if (!countEl || !swiperInstance) return;
    const total = wrapper.querySelectorAll('.swiper-slide').length;
    countEl.textContent = `${total} Photo${total !== 1 ? 's' : ''}`;
  }

  function initSwiper() {
    // Destroy existing instance first
    if (swiperInstance) {
      swiperInstance.destroy(true, true);
      swiperInstance = null;
    }

    if (!wrapper) return;

    // Remove all slides from wrapper
    allSlides.forEach(slide => {
      if (slide.parentNode) {
        slide.parentNode.removeChild(slide);
      }
    });

    // Only add back slides visible for the current season
    allSlides.forEach(slide => {
      if (isSlideVisibleForSeason(slide)) {
        wrapper.appendChild(slide);
      }
    });

    // Initialize Swiper with only the visible slides in the DOM
    // Use scoped DOM elements for navigation to avoid conflicts with other Swipers on the page
    swiperInstance = new Swiper(".chalet-gallery-swiper", {
      slidesPerView: 1,
      watchSlidesProgress: true,
      navigation: {
        nextEl: swiperContainer.querySelector('.swiper-button-next'),
        prevEl: swiperContainer.querySelector('.swiper-button-prev'),
      },
      on: {
        init: function() {
          setTimeout(() => updateCount(), 100);
        },
        slideChange: function() {
          updateCount();
        }
      }
    });

    setTimeout(() => updateCount(), 150);
  }

  // Initialize on load
  initSwiper();

  // Expand gallery functionality
  if (expandBtn) {
    expandBtn.addEventListener('click', function () {
      gallery.classList.toggle('is-expanded');
      document.body.classList.toggle('single-chalet--no-scroll');
    });
  }

  // Close gallery on Escape key
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && gallery.classList.contains('is-expanded')) {
      gallery.classList.remove('is-expanded');
      document.body.classList.remove('single-chalet--no-scroll');
    }
  });

  // Listen for season toggle changes
  const headerToggle = document.querySelector('.header__season-toggle .header__toggle-input');
  const mobileToggle = document.querySelector('.mobile-menu__season-toggle .header__toggle-input');

  function handleSeasonChange() {
    // Reinitialize Swiper — it removes hidden slides and rebuilds
    initSwiper();
  }

  if (headerToggle) {
    headerToggle.addEventListener('change', handleSeasonChange);
  }

  if (mobileToggle) {
    mobileToggle.addEventListener('change', handleSeasonChange);
  }
});
