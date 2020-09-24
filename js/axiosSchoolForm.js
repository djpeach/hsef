$(document).ready(function() {
  let schoolFormModal = $('#schoolFormModal');
  let newSchoolForm = $('#newSchoolFormInModal');
  let schoolFormErrors = $('#schoolFormErrors');

  if (newSchoolForm.length !== 0) {
    newSchoolForm.submit(function(e) {
      e.preventDefault();
      let formData = newSchoolForm.serializeJSON();
      axios.post('/school', formData).then((res) => {
        if (res.status === 200 && res.data.createdSchool) {
          schoolFormModal.modal('hide');
          newSchoolForm.trigger('reset');

          let schoolSelect = $('#schoolSelect');
          let schoolId = $('#schoolId');
          schoolSelect.val(res.data.createdSchool.name);
          schoolId.val(res.data.createdSchool.id);
          schoolFormErrors.html('');
        } else if (res.data.error) {
          schoolFormErrors.html(`<li>${res.data.error}</li>`);
        } else {
          schoolFormErrors.html(`<li>Unknown error, please try again.</li>`);
        }
      })
    })
  }
});