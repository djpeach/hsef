$(document).ready(function() {
  let boothSelect = $('#boothSelect');
  let boothId = $('#boothId');

  boothSelect.autocomplete({
    appendTo: "#boothSelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/users/fuzzyMatch/booth`, // sends get to api with ?term=<user input>
    delay: 500,
    select: function (event, ui) {
      boothId.val(ui.item.value); // add actual value to hidden field
      boothSelect.val(ui.item.label);
      return false;
    },
    focus: function( event, ui ) {
      boothId.val(ui.item.value); // add actual value to hidden field
      boothSelect.val(ui.item.label);
      return false;
    },
    close: function (event, ui) {
      boothId.val(ui.item.value); // add actual value to hidden field
      boothSelect.val(ui.item.label);
      return false;
    },
  });

  let categorySelect = $('#categorySelect');
  let categoryId = $('#categoryId');

  categorySelect.autocomplete({
    appendTo: "#categorySelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/users/fuzzyMatch/category`, // sends get to api with ?term=<user input>
    delay: 500,
    select: function (event, ui) {
      categoryId.val(ui.item.value); // add actual value to hidden field
      categorySelect.val(ui.item.label);
      return false;
    },
    focus: function( event, ui ) {
      categoryId.val(ui.item.value); // add actual value to hidden field
      categorySelect.val(ui.item.label);
      return false;
    },
    close: function (event, ui) {
      categoryId.val(ui.item.value); // add actual value to hidden field
      categorySelect.val(ui.item.label);
      return false;
    },
  });
});