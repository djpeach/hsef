$(document).ready(function() {
  let gradeLevelFormModal = $('#gradeLevelFormModal');
  let newGradeLevelForm = $('#newGradeLevelFormInModal');
  let gradeLevelFormErrors = $('#gradeLevelFormErrors');

  if (newGradeLevelForm.length !== 0) {
    newGradeLevelForm.submit(function(e) {
      e.preventDefault();
      let formData = newGradeLevelForm.serializeJSON();
      axios.post('/gradeLevel', formData).then((res) => {
        if (res.status === 200 && res.data.createdGradeLevel) {
          gradeLevelFormModal.modal('hide');
          newGradeLevelForm.trigger('reset');

          let gradeLevelSelect = $('#gradeLevelSelect');
          let gradeLevelId = $('#gradeLevelId');
          gradeLevelSelect.val(res.data.createdGradeLevel.name);
          gradeLevelId.val(res.data.createdGradeLevel.id);
          gradeLevelFormErrors.html('');
        } else if (res.data.error) {
          gradeLevelFormErrors.html(`<li>${res.data.error}</li>`);
        } else {
          gradeLevelFormErrors.html(`<li>Unknown error, please try again.</li>`);
        }
      })
    })
  }
});