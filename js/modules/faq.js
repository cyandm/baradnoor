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
