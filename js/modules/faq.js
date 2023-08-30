const faqButtonOpenHandler = document.querySelectorAll(".button-faq-card");

faqButtonOpenHandler.forEach((faqButton) => {
  faqButton.addEventListener("click", () => {
    faqButton.parentElement.parentElement.classList.toggle("active");
  });
});

const buttonFaqHandler = document.querySelectorAll(".cat-faq");
const divContainerFaq = document.querySelectorAll(".faq-content");

buttonFaqHandler.forEach((catButton) => {
  catButton.addEventListener("click", () => {
    buttonFaqHandler.forEach((el) => el.classList.remove("current-cat"));
    catButton.classList.add("current-cat");
    divContainerFaq.forEach((div) => {
      div.classList.remove("show");

      if (catButton.dataset.tab === div.dataset.tab) div.classList.add("show");
    });
  });
});

const selectFaqHome = document.querySelector(".container-cat-faq select");
const optionSelectFaqHome = document.querySelectorAll(
  ".container-cat-faq select option"
);
const divContainerProduct = document.querySelectorAll(".faq-content ");

if (selectFaqHome && optionSelectFaqHome) {
  selectFaqHome.addEventListener("change", (select) => {
    optionSelectFaqHome.forEach((option) => {
      if (option.value === select.target.value) {
        divContainerProduct.forEach((div) => {
          div.classList.remove("show");

          if (option.value === div.dataset.tabid) div.classList.add("show");
        });
      }
    });
  });
}
