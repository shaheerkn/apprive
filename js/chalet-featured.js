document.addEventListener('DOMContentLoaded', function () {
  const swiperContainer = document.querySelector('.featured .mySwiper');
  if (!swiperContainer) return;

  const swiper = new Swiper(swiperContainer, {
    slidesPerView: 2,
    slidesPerGroup: 2,
    spaceBetween: 40,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 1.2,
        slidesPerGroup: 1,
        spaceBetween: 20,
      },
    },
  });
});