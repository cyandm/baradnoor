const menuHandler = document.querySelector(".hamburger-menu");
const menu = document.querySelector(".menu-mobile");

const menuItemsHasChildrenLinkGroup = document.querySelectorAll(
  ".menu-mobile .menu-item-has-children > a"
);

menuItemsHasChildrenLinkGroup.forEach((menuLink) => {
  menuLink.addEventListener("click", () => {
    menuLink.parentElement.classList.toggle("active");
  });
});

const closeHandler = document.querySelector(".close-button-search");

const searchHandler = document.querySelector(".mobile-search");

const doSearch = document.querySelector(".do-search");

const search = document.querySelector(".background-do-search");

//Body Blur Background Element Create
const bodyBlurBg = document.createElement("div");
bodyBlurBg.classList.add("body-blur-bg");
document.body.appendChild(bodyBlurBg);

menuHandler.addEventListener("click", () => {
  menu.classList.add("active");
  bodyBlurBg.classList.add("active");
});

closeHandler.addEventListener("click", () => {
  menu.classList.remove("active");
  bodyBlurBg.classList.remove("active");
});

searchHandler.addEventListener("click", () => {
  search.classList.add("active");
  bodyBlurBg.classList.add("active");
});

doSearch.addEventListener("click", () => {
  search.classList.remove("active");
  bodyBlurBg.classList.remove("active");
});

///////////////////////////////////////////
