$(document).ready(function() {
  let categoryFormModal = $('#categoryFormModal');
  let newCategoryForm = $('#newCategoryFormInModal');
  let categoryFormErrors = $('#categoryFormErrors');

  if (newCategoryForm.length !== 0) {
    newCategoryForm.submit(function(e) {
      e.preventDefault();
      let formData = newCategoryForm.serializeJSON();
      axios.post('/category', formData).then((res) => {
        if (res.status === 200 && res.data.createdCategory) {
          categoryFormModal.modal('hide');
          newCategoryForm.trigger('reset');

          let categorySelect = $('#categorySelect');
          let categoryId = $('#categoryId');
          if (categorySelect.length !== 0 && categoryId.length !== 0) {
            categorySelect.val(res.data.createdCategory.name);
            categoryId.val(res.data.createdCategory.id);
          }

          let categoryPrefs = $('#judgeCategoryPrefs');
          if (categoryPrefs.length !== 0 ) {
            console.log('got judge category prefs');
            let newOption = new Option(res.data.createdCategory.name, res.data.createdCategory.id, true, true);
            categoryPrefs.append(newOption).trigger('change');
          }
          categoryFormErrors.html('');
        } else if (res.data.error) {
          categoryFormErrors.html(`<li>${res.data.error}</li>`);
        } else {
          categoryFormErrors.html(`<li>Unknown error, please try again.</li>`);
        }
      })
    })
  }
});