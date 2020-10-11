$(document).ready(function() {
  let deleteConfirm = $('input:text[name="deleteConfirm"]');
  let deleteButton = $('button[name$="DELETE_SUBMIT"]');

  let timerId;
  deleteConfirm.keydown(function() {
    clearTimeout(timerId);
    timerId = setTimeout(function() {
      deleteButton.prop('disabled', false);
    }, 800)
  });

});