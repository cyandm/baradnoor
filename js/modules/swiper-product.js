const swiperProduct = new Swiper("#swiperProduct", {
  pagination: {
    el: ".swiper-pagination-product",
    clickable: true,
  },
});

const headerProduct = document.querySelector(".desktop-header");
const sliderProduct = document.querySelector(".slider-product");
const mainProductPage = document.querySelector("main.product-page");

if (mainProductPage) {
  const setMarginRight = () => {
    sliderProduct.style.marginRight = headerProduct.offsetLeft + "px";
  };

  setMarginRight();
  window.addEventListener("resize", () => setMarginRight());
}
