$(document).ready(function() {
  let rowSliders = $('*[data-toggle="row-slide"]');

  rowSliders.click(function() {
    let target = $($(this).attr('data-target'));
    let targetWidth = target.width();
    let siblings = target.closest('.row').children();
    let leftMostSibling = siblings.first();
    if (parseInt(leftMostSibling.css('marginLeft')) < 0) {
      siblings.first().css({'margin-left': 0});
    } else {
      siblings.first().css({'margin-left': -targetWidth});
    }
  });
});