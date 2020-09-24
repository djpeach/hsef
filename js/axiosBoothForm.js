$(document).ready(function() {
  let boothFormModal = $('#boothFormModal');
  let newBoothForm = $('#newBoothFormInModal');
  let boothFormErrors = $('#boothFormErrors');

  if (newBoothForm.length !== 0) {
    newBoothForm.submit(function(e) {
      e.preventDefault();
      let formData = newBoothForm.serializeJSON();
      axios.post('/booth', formData).then((res) => {
        if (res.status === 200 && res.data.createdBooth) {
          boothFormModal.modal('hide');
          newBoothForm.trigger('reset');

          let boothSelect = $('#boothSelect');
          let boothId = $('#boothId');
          boothSelect.val(res.data.createdBooth.name);
          boothId.val(res.data.createdBooth.id);
          boothFormErrors.html('');
        } else if (res.data.error) {
          boothFormErrors.html(`<li>${res.data.error}</li>`);
        } else {
          boothFormErrors.html(`<li>Unknown error, please try again.</li>`);
        }
      })
    })
  }
});