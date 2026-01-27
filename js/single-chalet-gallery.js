document.addEventListener('DOMContentLoaded', function () {
  const gallery = document.querySelector('.product-detail__gallery');
  if (!gallery) return;

  const swiperContainer = gallery.querySelector('.chalet-gallery-swiper');
  const countEl = gallery.querySelector('.product-detail__count');
  const expandBtn = gallery.querySelector('.product-detail__expand');

  let swiperInstance = null;

  // Function to check if a slide has visible images for current season
  function isSlideVisibleForSeason(slide) {
    const isWinter = document.body.classList.contains('color-scheme-winter');
    const isSummer = document.body.classList.contains('color-scheme-summer');
    const winterImg = slide.querySelector('img.for-winter');
    const summerImg = slide.querySelector('img.for-summer');
    const regularImg = slide.querySelector('img:not(.for-winter):not(.for-summer)');

    // console.log('Checking slide:', {
    //   isWinter,
    //   isSummer,
    //   hasWinterImg: !!winterImg,
    //   hasSummerImg: !!summerImg,
    //   hasRegularImg: !!regularImg
    // });

    // Regular non-seasonal images are always visible
    if (regularImg) {
      return true;
    }

    // Check if slide has an image for current season
    if (isWinter && winterImg) {
      return true;
    }

    if (isSummer && summerImg) {
      return true;
    }

    return false;
  }

  // Function to hide/show slides based on season
  function updateSlideVisibility() {
    if (!swiperContainer) return;

    const slides = swiperContainer.querySelectorAll('.swiper-slide');

    slides.forEach(slide => {
      const shouldShow = isSlideVisibleForSeason(slide);

      // Hide/show the slide itself
      if (shouldShow) {
        slide.style.display = '';
        slide.classList.remove('swiper-slide-hidden');
      } else {
        slide.style.display = 'none';
        slide.classList.add('swiper-slide-hidden');
      }
    });
  }

  // Function to get visible slides count
  function getVisibleSlidesCount() {
    if (!swiperContainer) return 0;
    const slides = swiperContainer.querySelectorAll('.swiper-slide:not(.swiper-slide-hidden)');
    return slides.length;
  }

  // Function to update photo count
  function updateCount() {
    if (!countEl || !swiperInstance) {
      console.log('Cannot update count - missing countEl or swiperInstance');
      return;
    }

    const total = getVisibleSlidesCount();
    const visibleSlides = Array.from(swiperContainer.querySelectorAll('.swiper-slide:not(.swiper-slide-hidden)'));
    const currentSlide = swiperInstance.slides[swiperInstance.activeIndex];

    // console.log('Update count:', {
    //   total,
    //   visibleSlidesCount: visibleSlides.length,
    //   currentActiveIndex: swiperInstance.activeIndex
    // });

    // Find the index of current slide in visible slides
    const currentVisibleIndex = visibleSlides.indexOf(currentSlide);

    if (currentVisibleIndex === -1) {
      // Current slide is hidden, use first visible slide
      const remaining = total;
      countEl.textContent = `${remaining} Photo${remaining !== 1 ? 's' : ''}`;
      // console.log('Showing remaining:', remaining, 'from index:', currentVisibleIndex);
    } else {
      // const remaining = Math.max(0, total - currentVisibleIndex);
      const remaining = total;
      countEl.textContent = `${remaining} Photo${remaining !== 1 ? 's' : ''}`;
      // console.log('Showing remaining:', remaining, 'from index:', currentVisibleIndex);
    }
  }

  // Initialize Swiper
  function initSwiper() {
    // Set initial slide visibility
    updateSlideVisibility();

    swiperInstance = new Swiper(".chalet-gallery-swiper", {
      slidesPerView: 1,
      watchSlidesProgress: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      on: {
        init: function() {
          // Use setTimeout to ensure Swiper is fully initialized
          setTimeout(() => {
            updateCount();
          }, 100);
        },
        slideChange: function() {
          updateCount();
        }
      }
    });

    // Also update count after Swiper is assigned
    setTimeout(() => {
      updateCount();
    }, 150);
  }

  // Initialize Swiper on load
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
    const isWinter = document.body.classList.contains('color-scheme-winter');
    const isSummer = document.body.classList.contains('color-scheme-summer');

    console.log('Season changed!', {
      isWinter,
      isSummer,
      bodyClasses: document.body.className
    });

    // Update slide visibility
    updateSlideVisibility();

    // Update Swiper first
    if (swiperInstance) {
      swiperInstance.update();
      swiperInstance.updateSlides();
      swiperInstance.updateProgress();
      swiperInstance.updateSlidesClasses();

      // Use setTimeout to ensure DOM and Swiper are fully updated
      setTimeout(() => {
        // Find first visible slide
        const firstVisibleSlide = swiperContainer.querySelector('.swiper-slide:not(.swiper-slide-hidden)');

        if (firstVisibleSlide) {
          const allSlides = Array.from(swiperInstance.slides);
          const index = allSlides.indexOf(firstVisibleSlide);

          console.log('Moving to first visible slide at index:', index, 'of', allSlides.length, 'total slides');

          if (index >= 0) {
            swiperInstance.slideTo(index, 300); // 300ms animation
          }
        } else {
          console.error('No visible slides found!');
        }

        // Update count after navigation
        setTimeout(() => {
          updateCount();
        }, 50);
      }, 100); // Wait for DOM updates
    }
  }

  if (headerToggle) {
    headerToggle.addEventListener('change', handleSeasonChange);
  }

  if (mobileToggle) {
    mobileToggle.addEventListener('change', handleSeasonChange);
  }
});
