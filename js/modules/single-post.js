// Single Blog select and option for mobile
const selectHandlerSingleBlog = document.querySelector(
  ".category-blog-mobile select"
);
const optionSingleBlog = document.querySelectorAll(
  ".category-blog-mobile select option"
);
const singlePostPage = document.querySelectorAll(".single-post-page");
if (singlePostPage) {
  if (selectHandlerSingleBlog && optionSingleBlog) {
    selectHandlerSingleBlog.addEventListener("change", (e) => {
      optionSingleBlog.forEach((el) => {
        if (el.value === e.target.value) {
          window.location = el.dataset.uri;
        }
      });
    });
  }
}
