document.addEventListener('DOMContentLoaded', function () {
  const swiperContainer = document.querySelector('.featured .swiper-wrapper');
  if (!swiperContainer) return;

  const swiper = new Swiper('.featured-swiper', {
    slidesPerView: 2,
    slidesPerGroup: 2,
    spaceBetween: 40,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {

      400: {
        slidesPerView: 1.1,
        slidesPerGroup: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 1.2,
        slidesPerGroup: 1,
        spaceBetween: 20,
      },

      992: {
        slidesPerView: 1.3,
        slidesPerGroup: 1,
        spaceBetween: 30,
      },
      1200: {
        slidesPerView: 2,
        slidesPerGroup: 1,
        spaceBetween: 40,
      }
    },
  });
});