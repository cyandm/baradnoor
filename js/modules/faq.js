const faqButtonOpenHandler = document.querySelectorAll(".button-faq-card");

faqButtonOpenHandler.forEach((faqButton) => {
  faqButton.addEventListener("click", () => {
    faqButton.parentElement.parentElement.classList.toggle("active");
  });
});
