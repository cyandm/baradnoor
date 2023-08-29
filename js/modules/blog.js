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

const selectHandler = document.querySelector(".postform");
const optionSelect = document.querySelectorAll(".postform option");

selectHandler.addEventListener("change", (e) => {
  console.log("e :", e.target.value);
  console.log(optionSelect);
  optionSelect.forEach((el) => {
    if (el.value === e.target.value) {
      console.log("first");
      console.log(el.dataset.uri);
      window.location = el.dataset.uri;
    }
  });

  console.log(selectHandler);

  // window.location = output.value;
});
