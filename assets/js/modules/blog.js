const selectHandler = document.querySelector(
  '.category-blog-container-mobile select'
);
const optionSelect = document.querySelectorAll(
  '.category-blog-container-mobile select option'
);

if (selectHandler && optionSelect) {
  selectHandler.addEventListener('change', (e) => {
    optionSelect.forEach((el) => {
      if (el.value === e.target.value) {
        window.location = el.dataset.uri;
      }
    });
  });
}
