const updateCursor = (e) => {
  var x = e.clientX || e.touches[0].clientX;
  var y = e.clientY || e.touches[0].clientY;

  const root = document.documentElement;

  root.style.setProperty("--cursorX", x + "px");
  root.style.setProperty("--cursorY", y + "px");
};

document.addEventListener("mousemove", updateCursor);
document.addEventListener("touchmove", updateCursor);

/************************ */

firstSlide = document.querySelector("#home_first_slide");

if (firstSlide) {
  firstSlide.addEventListener("click", () => {
    firstSlide.classList.remove("active");
  });
}

/////////////////// Image Preloader //////////////////////
/*const preloaderImageHandler = () => {
  const containerImagePreloader = document.querySelector(".preloader");
  const containerImageWidth = containerImagePreloader.offsetWidth;
  console.log(containerImagePreloader.offsetWidth);
  const preloadeImage = document.querySelector(".proloader-image");
  preloadeImage.style.backgroundPositionY = containerImageWidth / 20 + "px";
};
*/

/////////////////////// Height Product Handler   //////////////////////////////
const setHeightProductHome = () => {
  const home = document.querySelector(".home");
  if (home) {
    const productContainer = document.querySelector(".products-in-home-page");
    const contentOfProduct = document.querySelector(
      ".container-tab-product-group.show"
    );
    productContainer.style.setProperty(
      "--height",
      contentOfProduct.offsetHeight + 10 + "px"
    );
  }
};

window.addEventListener("load", () => {
  setHeightProductHome(); /*, preloaderImageHandler();*/
});

window.addEventListener("resize", () => {
  setHeightProductHome();
  /*,
  preloaderImageHandler();*/
});

const selectProductHome = document.querySelector(
  ".container-cat-product select"
);
const optionSelectProductHome = document.querySelectorAll(
  ".container-cat-product select option"
);
const buttonProductHandler = document.querySelectorAll(".cat-product");
const divContainerProduct = document.querySelectorAll(
  ".container-tab-product-group"
);

if (selectProductHome && optionSelectProductHome) {
  selectProductHome.addEventListener("change", (select) => {
    optionSelectProductHome.forEach((option) => {
      if (option.value === select.target.value) {
        divContainerProduct.forEach((div) => {
          div.classList.remove("show");

          if (option.value === div.dataset.tabid) div.classList.add("show");
        });
      }
    });
  });
}

buttonProductHandler.forEach((catButton) => {
  catButton.addEventListener("click", () => {
    buttonProductHandler.forEach((el) => el.classList.remove("current-cat"));
    catButton.classList.add("current-cat");
    divContainerProduct.forEach((div) => {
      div.classList.remove("show");

      if (catButton.dataset.tab === div.dataset.tab) div.classList.add("show");
    });
    setHeightProductHome();
  });
});
