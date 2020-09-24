$(document).ready(function() {
  let schoolSelect = $('#countySelect');
  let schoolId = $('#countyId');

  schoolSelect.autocomplete({
    appendTo: "#countySelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/users/fuzzyMatch/county`, // sends get to api with ?term=<user input>
    delay: 500,
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