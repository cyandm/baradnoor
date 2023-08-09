const faqButtonOpenHandler = document.querySelectorAll(".button-fqa-card");

faqButtonOpenHandler.forEach((faqButton) => {
  faqButton.addEventListener("click", () => {
    faqButton.parentElement.parentElement.classList.toggle("active");
  });
});
