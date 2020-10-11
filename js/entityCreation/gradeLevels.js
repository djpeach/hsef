$(document).ready(function() {
  let gradeLevelFormModal = $('#gradeLevelFormModal');
  let newGradeLevelForm = $('#newGradeLevelFormInModal');
  let gradeLevelFormErrors = $('#gradeLevelFormErrors');
  let gradeLevelSelect = $('#gradeLevelSelect');
  let gradeLevelId = $('#gradeLevelId');
  let gradeLevelPrefs = $('#judgeGradeLevelPrefs');

  if (exists(newGradeLevelForm)) {
    newGradeLevelForm.submit(function(e) {
      e.preventDefault();
      let formData = newGradeLevelForm.serializeJSON();
      axios.post('/gradeLevel', formData).then((res) => {
        if (res.status === 200 && res.data.createdGradeLevel) {
          gradeLevelFormModal.modal('hide');
          newGradeLevelForm.trigger('reset');
          if (exists(gradeLevelSelect) && exists(gradeLevelId)) {
            gradeLevelSelect.val(res.data.createdGradeLevel.name);
            gradeLevelId.val(res.data.createdGradeLevel.id);
          }

          if (gradeLevelPrefs.length !== 0 ) {
            let newOption = new Option(res.data.createdGradeLevel.name, res.data.createdGradeLevel.id, true, true);
            gradeLevelPrefs.append(newOption).trigger('change');
          }

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