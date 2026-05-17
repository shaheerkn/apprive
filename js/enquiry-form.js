(function () {
  const form = document.getElementById('enquiry-form');
  if (!form) return;

  const submitBtn = document.querySelector('.enquiry__submit');

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    submitForm();
  });

  if (submitBtn) {
    submitBtn.addEventListener('click', function (e) {
      e.preventDefault();
      submitForm();
    });
  }

  function submitForm() {
    var formData = new FormData();
    var formId = enquiryFormVars.cf7FormId;
    var pageId = enquiryFormVars.pageId;

    // CF7 required internal fields
    formData.append('_wpcf7', formId);
    formData.append('_wpcf7_version', '6.0');
    formData.append('_wpcf7_locale', 'en_US');
    formData.append('_wpcf7_unit_tag', 'wpcf7-f' + formId + '-p' + pageId + '-o1');
    formData.append('_wpcf7_container_post', pageId);

    // Destinations (checkboxes) - CF7 expects array format
    var destinations = form.querySelectorAll('input[name="destinations[]"]:checked');
    destinations.forEach(function (cb) {
      formData.append('destinations[]', cb.value);
    });

    // Text fields matching CF7 field names
    formData.append('your-dates', form.querySelector('[name="your-dates"]').value);
    formData.append('your-trip', form.querySelector('[name="your-trip"]').value);
    formData.append('your-title', form.querySelector('[name="your-title"]').value);
    formData.append('your-firstname', form.querySelector('[name="your-firstname"]').value);
    formData.append('your-lastname', form.querySelector('[name="your-lastname"]').value);
    formData.append('your-phone', form.querySelector('[name="your-phone"]').value);
    formData.append('your-email', form.querySelector('[name="your-email"]').value);
    formData.append('your-consent', '1');

    var endpoint = enquiryFormVars.restUrl + 'contact-form-7/v1/contact-forms/' + formId + '/feedback';

    // Disable button
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.textContent = 'Sending...';
    }

    fetch(endpoint, {
      method: 'POST',
      body: formData,
    })
      .then(function (response) { return response.json(); })
      .then(function (data) {
        if (data.status === 'mail_sent') {
          form.reset();
          if (submitBtn) {
            submitBtn.textContent = 'Enquiry sent!';
            setTimeout(function () {
              submitBtn.textContent = 'Send your enquiry';
              submitBtn.disabled = false;
            }, 3000);
          }
        } else {
          if (submitBtn) {
            submitBtn.textContent = 'Send your enquiry';
            submitBtn.disabled = false;
          }
          if (data.message) {
            alert(data.message);
          }
        }
      })
      .catch(function () {
        if (submitBtn) {
          submitBtn.textContent = 'Send your enquiry';
          submitBtn.disabled = false;
        }
        alert('Something went wrong. Please try again.');
      });
  }
})();
