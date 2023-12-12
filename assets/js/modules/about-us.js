const swiperSlide = new Swiper('#swiperAboutUs', {
  direction: 'horizontal',
  loop: true,
  speed: 2000,
  effect: 'fade',
  autoplay: {
    delay: 2000,
  },
  fadeEffect: {
    crossFade: true,
  },
});
