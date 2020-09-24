$(document).ready(function() {
  let countySelect = $('#countySelect');
  let countyId = $('#countyId');

  countySelect.autocomplete({
    appendTo: "#countySelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/users/fuzzyMatch/county`, // sends get to api with ?term=<user input>
    delay: 500,
    select: function (event, ui) {
      countyId.val(ui.item.value); // add actual value to hidden field
      countySelect.val(ui.item.label);
      return false;
    },
    focus: function( event, ui ) {
      countyId.val(ui.item.value); // add actual value to hidden field
      countySelect.val(ui.item.label);
      return false;
    },
    close: function (event, ui) {
      countyId.val(ui.item.value); // add actual value to hidden field
      countySelect.val(ui.item.label);
      return false;
    },
  });
});