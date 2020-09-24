$(document).ready(function() {
  let projectFormModal = $('#projectFormModal');
  let newProjectForm = $('#newProjectFormInModal');
  let projectFormErrors = $('#projectFormErrors');

  if (newProjectForm.length !== 0) {
    newProjectForm.submit(function(e) {
      e.preventDefault();
      let formData = newProjectForm.serializeJSON();
      axios.post('/project', formData).then((res) => {
        if (res.status === 200 && res.data.createdProject) {
          projectFormModal.modal('hide');
          newProjectForm.trigger('reset');

          let projectSelect = $('#projectSelect');
          let projectId = $('#projectId');
          projectSelect.val(res.data.createdProject.name);
          projectId.val(res.data.createdProject.id);
          projectFormErrors.html('');
        } else if (res.data.error) {
          projectFormErrors.html(`<li>${res.data.error}</li>`);
        } else {
          projectFormErrors.html(`<li>Unknown error, please try again.</li>`);
        }
      })
    })
  }
});