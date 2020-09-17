$(document).ready(function() {
  let userSelectToggle = $('#selectUserToggle');
  let userSelect = $('#userSelect');
  let userValue = $('#userValue');

  userSelect.prop('readonly', !userSelectToggle.prop('checked'))

  userSelectToggle.change(function () {
    userSelect.prop('readonly', !userSelectToggle.prop('checked'))
  });

  userSelect.autocomplete({
    source: `/hsef/api/users/fuzzyMatch/promote-to-admin`, // sends get to api with ?term=<user input>
    minLength: 2,
    select: function (event, ui) {
      userValue.val(ui.item.value); // add actual value to hidden field
      userSelect.val(ui.item.label);
      return false;
    }
  });

});