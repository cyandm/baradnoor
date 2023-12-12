function objectifyFormArray(formArray) {
  var returnArray = {};
  for (var i = 0; i < formArray.length; i++) {
    returnArray[formArray[i]['name']] = formArray[i]['value'];
  }
  return returnArray;
}

jQuery(document).ready(($) => {
  const contactUsForm = $('#contact-us-form');
  const contactUsFormSubmit = $('#contact-us-form #contact-us-form-submit');
  const contactUsInput = document.querySelectorAll('#contact-us-form .data');

  $(contactUsForm).on('submit', (e) => {
    e.preventDefault();

    const formDataArray = $(contactUsForm).serializeArray();
    const formData = objectifyFormArray(formDataArray);

    $.ajax({
      url: cyn_head_script.url,
      type: 'post',
      data: {
        action: 'send_contact_us_form',
        _nonce: cyn_head_script.nonce,
        data: formData,
      },
      success: (res) => {
        console.warn(res);

        $(contactUsFormSubmit).text('ارسال شد');
        contactUsInput.forEach((el) => {
          el.value = '';
        });
        setTimeout(() => {
          $(contactUsFormSubmit).text('ارسال درخواست');
        }, 1000);
      },
      error: (err) => {
        console.error(err);
        $(contactUsFormSubmit).addClass('error');
      },
    });
  });
});
