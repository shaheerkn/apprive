document.addEventListener('DOMContentLoaded', function () {
  const gallery = document.querySelector('.product-detail__gallery');
  if (!gallery) return;

  const swiperContainer = gallery.querySelector('.mySwiper');
  const slides = swiperContainer ? swiperContainer.querySelectorAll('.swiper-slide') : [];
  const total = slides.length || 0;
  const countEl = gallery.querySelector('.product-detail__count');
  const nextBtn = gallery.querySelector('.swiper-button-next');
  const prevBtn = gallery.querySelector('.swiper-button-prev');
  const expandBtn = gallery.querySelector('.product-detail__expand');

  let index = 1;

  function updateCount() {
    if (!countEl) return;
    const remaining = Math.max(0, total - index + 1);
    countEl.textContent = `${remaining} Photo`;
  }

  updateCount();

  if (nextBtn) {
    nextBtn.addEventListener('click', function () {
      if (index < total) index += 1;
      updateCount();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', function () {
      if (index > 1) index -= 1;
      updateCount();
    });
  }
  if (window.Swiper && swiperContainer && swiperContainer.swiper) {
    const swiperInstance = swiperContainer.swiper;
    index = (swiperInstance.activeIndex || 0) + 1;
    updateCount();

    swiperInstance.on('slideChange', function () {
      index = (swiperInstance.activeIndex || 0) + 1;
      updateCount();
    });
  }

  if (expandBtn) {
    expandBtn.addEventListener('click', function () {
      gallery.classList.toggle('is-expanded');
      document.body.classList.toggle('single-chalet--no-scroll');
    });
  }

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && gallery.classList.contains('is-expanded')) {
      gallery.classList.remove('is-expanded');
      document.body.classList.remove('single-chalet--no-scroll');
    }
  });

});

var swiper = new Swiper(".mySwiper", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
