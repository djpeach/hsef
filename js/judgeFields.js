$(document).ready(function() {
  let userSelectToggle = $('#selectUserToggle');
  let userSelect = $('#userSelect');
  let operatorId = $('#userId');

  userSelect.prop('readonly', !userSelectToggle.prop('checked'))

  userSelectToggle.change(function () {
    userSelect.prop('readonly', !userSelectToggle.prop('checked'))
  });

  userSelect.autocomplete({
    appendTo: "#userSelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/users/fuzzyMatch/promote-to-judge`, // sends get to api with ?term=<user input>
    delay: 500,
    select: function (event, ui) {
      operatorId.val(ui.item.value); // add actual value to hidden field
      userSelect.val(ui.item.label);
      return false;
    },
    focus: function( event, ui ) {
      operatorId.val(ui.item.value); // add actual value to hidden field
      userSelect.val(ui.item.label);
      return false;
    },
    close: function (event, ui) {
      operatorId.val(ui.item.value); // add actual value to hidden field
      userSelect.val(ui.item.label);
      return false;
    },
  });
});