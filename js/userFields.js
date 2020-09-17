$(document).ready(function() {
  let userSelectToggle = $('#selectUserToggle');
  let userSelect = $('#userSelect');
  let userValue = $('#userValue');

  userSelect.prop('disabled', !userSelectToggle.prop('checked'))

  userSelectToggle.change(function () {
    userSelect.prop('disabled', !userSelectToggle.prop('checked'))
  });

  userSelect.autocomplete({
    source: `/hsef/api/users/fuzzyMatch`, // sends get to api with ?term=<user input>
    minLength: 2,
    select: function (event, ui) {
      userValue.val(ui.item.value);
      userSelect.val(ui.item.label);
      return false;
    }
  });

});