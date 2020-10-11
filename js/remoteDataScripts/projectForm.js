$(document).ready(function() {
  let boothSelect = $('#boothSelect');
  let boothId = $('#boothId');

  boothSelect.autocomplete({
    appendTo: "#boothSelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/booths/fuzzyMatch`, // sends get to api with ?term=<user input>
    delay: 500,
    select: function (event, ui) {
      if (ui.item) {
        boothId.val(ui.item.value); // add actual value to hidden field
        boothSelect.val(ui.item.label);
      }
      return false;
    },
    focus: function (event, ui) {
      if (ui.item) {
        boothId.val(ui.item.value); // add actual value to hidden field
        boothSelect.val(ui.item.label);
      }
      return false;
    }
  });

  let categorySelect = $('#categorySelect');
  let categoryId = $('#categoryId');

  categorySelect.autocomplete({
    appendTo: "#categorySelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/categories/fuzzyMatch`, // sends get to api with ?term=<user input>
    delay: 500,
    select: function (event, ui) {
      if (ui.item) {
        categoryId.val(ui.item.value); // add actual value to hidden field
        categorySelect.val(ui.item.label);
      }
      return false;
    },
    focus: function (event, ui) {
      if (ui.item) {
        categoryId.val(ui.item.value); // add actual value to hidden field
        categorySelect.val(ui.item.label);
      }
      return false;
    }
  });
});