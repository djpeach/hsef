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
      if (ui.item) {
        operatorId.val(ui.item.value); // add actual value to hidden field
        userSelect.val(ui.item.label);
      }
      return false;
    },
    focus: function (event, ui) {
      if (ui.item) {
        operatorId.val(ui.item.value); // add actual value to hidden field
        userSelect.val(ui.item.label);
      }
      return false;
    }
  });

  let categoryPrefs = $('#judgeCategoryPrefs');
  let categoryPrefsParent = $('#judgeCategoryPrefsDiv');

  categoryPrefs.select2({
    allowClear: true,
    minimumInputLength: 1,
    dropdownParent: categoryPrefsParent,
    theme: 'hsef',
    placeholder: 'Search for categories',
    language: {
      inputTooShort: function() {
        return 'Start typing to search for categories';
      }
    },
    ajax: {
      url: '/hsef/api/categories/fuzzyMatch',
      delay: 500,
      dataType: 'json',
      processResults: function (data) {
        return {
          results: data.map(item => ({id: item.value, text: item.label}))
        }
      }
    }
  })
});