$(document).ready(function() {
  let schoolSelect = $('#schoolSelect');
  let schoolId = $('#schoolId');

  schoolSelect.autocomplete({
    appendTo: "#schoolSelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/users/fuzzyMatch/school`, // sends get to api with ?term=<user input>
    delay: 500,
    minLength: 2,
    select: function (event, ui) {
      schoolId.val(ui.item.value); // add actual value to hidden field
      schoolSelect.val(ui.item.label);
      return false;
    },
    focus: function( event, ui ) {
      schoolId.val(ui.item.value); // add actual value to hidden field
      schoolSelect.val(ui.item.label);
      return false;
    },
    close: function (event, ui) {
      schoolId.val(ui.item.value); // add actual value to hidden field
      schoolSelect.val(ui.item.label);
      return false;
    },
  });
});