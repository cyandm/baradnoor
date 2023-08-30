// const headerBlog = document.querySelector(".desktop-header");
// const sliderBlog = document.querySelector(".slider-blog");
// const mainBlogPage = document.querySelector("main.blog-page");

// if (mainBlogPage) {
//   const setMarginRight = () => {
//     sliderBlog.style.marginRight = headerBlog.offsetLeft + "px";
//   };

//   setMarginRight();
//   window.addEventListener("resize", () => setMarginRight());
// }

const selectHandler = document.querySelector(
  ".category-blog-container-mobile select"
);
const optionSelect = document.querySelectorAll(
  ".category-blog-container-mobile select option"
);

if (selectHandler && optionSelect) {
  selectHandler.addEventListener("change", (e) => {
    optionSelect.forEach((el) => {
      if (el.value === e.target.value) {
        window.location = el.dataset.uri;
      }
    });
  });
}
