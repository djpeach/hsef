$(document).ready(function() {
  let userSelectToggle = $('#selectUserToggle');
  let userSelect = $('#userSelect');

  userSelect.prop('disabled', !userSelectToggle.prop('checked'))

  userSelectToggle.change(function () {
    userSelect.prop('disabled', !userSelectToggle.prop('checked'))
  });

  $("#userSelect").autocomplete({
    source: [ "c++", "java", "php", "coldfusion", "javascript", "asp", "ruby" ]
  });

});