const buttonProductHandler = document.querySelectorAll(".cat-product");
const divContainerProduct = document.querySelectorAll(
  ".container-tab-product-group"
);

buttonProductHandler.forEach((catButton) => {
  catButton.addEventListener("click", () => {
    buttonProductHandler.forEach((el) => el.classList.remove("current-cat"));
    catButton.classList.add("current-cat");
    divContainerProduct.forEach((div) => {
      div.classList.remove("show");

      if (catButton.dataset.tab === div.dataset.tab) div.classList.add("show");
    });
  });
});
