$(document).ready(function() {
  let schoolSelect = $('#schoolSelect');
  let schoolId = $('#schoolId');

  schoolSelect.autocomplete({
    appendTo: "#schoolSelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/users/fuzzyMatch/school`, // sends get to api with ?term=<user input>
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

  let gradeLevelSelect = $('#gradeLevelSelect');
  let gradeLevelId = $('#gradeLevelId');

  gradeLevelSelect.autocomplete({
    appendTo: "#gradeLevelSelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/users/fuzzyMatch/gradeLevel`, // sends get to api with ?term=<user input>
    delay: 500,
    select: function (event, ui) {
      gradeLevelId.val(ui.item.value); // add actual value to hidden field
      gradeLevelSelect.val(ui.item.label);
      return false;
    },
    focus: function( event, ui ) {
      gradeLevelId.val(ui.item.value); // add actual value to hidden field
      gradeLevelSelect.val(ui.item.label);
      return false;
    },
    close: function (event, ui) {
      gradeLevelId.val(ui.item.value); // add actual value to hidden field
      gradeLevelSelect.val(ui.item.label);
      return false;
    },
  });

  let projectSelect = $('#projectSelect');
  let projectId = $('#projectId');

  projectSelect.autocomplete({
    appendTo: "#projectSelectDiv",
    position: { my : "right top", at: "right bottom" },
    source: `/hsef/api/users/fuzzyMatch/project`, // sends get to api with ?term=<user input>
    delay: 500,
    select: function (event, ui) {
      projectId.val(ui.item.value); // add actual value to hidden field
      projectSelect.val(ui.item.label);
      return false;
    },
    focus: function( event, ui ) {
      projectId.val(ui.item.value); // add actual value to hidden field
      projectSelect.val(ui.item.label);
      return false;
    },
    close: function (event, ui) {
      projectId.val(ui.item.value); // add actual value to hidden field
      projectSelect.val(ui.item.label);
      return false;
    },
  });
});