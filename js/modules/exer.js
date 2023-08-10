const buttonExerHandler = document.querySelectorAll(".button");
const myDiv = document.querySelectorAll(".div");

buttonExerHandler.forEach((exerButton) => {
  exerButton.addEventListener("click", () => {
    myDiv.forEach((div) => {
      div.classList.remove("active");
      if (exerButton.dataset.tab === div.dataset.tab)
        div.classList.add("active");
    });
  });
});
