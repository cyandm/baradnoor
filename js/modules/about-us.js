const swiperSlide = new Swiper("#swiperAboutUs", {
  direction: "horizontal",
  loop: true,
  speed: 2000,
  effect: "fade",
  autoplay: {
    // auto play
    delay: 2000,
  },
  fadeEffect: {
    // added
    crossFade: true, // added(resolve the overlapping of the slides)
  },
});
