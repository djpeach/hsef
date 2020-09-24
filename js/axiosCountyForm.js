$(document).ready(function() {
  let countyFormModal = $('#countyFormModal');
  let newCountyForm = $('#newCountyFormInModal');
  let countyFormErrors = $('#countyFormErrors');

  if (newCountyForm.length !== 0) {
    newCountyForm.submit(function(e) {
      e.preventDefault();
      let formData = newCountyForm.serializeJSON();
      axios.post('/county', formData).then((res) => {
        if (res.status === 200 && res.data.createdCounty) {
          countyFormModal.modal('hide');
          newCountyForm.trigger('reset');

          let countySelect = $('#countySelect');
          let countyId = $('#countyId');
          countySelect.val(res.data.createdCounty.name);
          countyId.val(res.data.createdCounty.id);
        } else if (res.data.error) {
          countyFormErrors.append(`<li>${res.data.error}</li>`);
        } else {
          countyFormErrors.append(`<li>Unknown error, please try again.</li>`);
        }
      })
    })
  }
});