$(document).ready(function() {
  let deleteType = $('input:radio[name="deleteType"]');
  let deleteConfirm = $('input:text[name="deleteConfirm"]');
  let deleteButton = $('button[name="DELETE_SUBMIT"]');

  deleteType.change(function() {
    deleteConfirm.prop('disabled', false);
  })

  let timerId;
  deleteConfirm.keydown(function() {
    clearTimeout(timerId);
    timerId = setTimeout(function() {
      deleteButton.prop('disabled', false);
    }, 800)
  });

});