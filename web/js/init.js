function updateData() {
  var container = $("#lists-container");
  var gett = parseInt(window.get);

  $.ajax({
    url: '/get-new-loads' + (gett > 0 ? "?showCompleted=" + gett : ""),
    success: function (data) {
      container.html(data);
      console.log("Loads updated!  " + new Date());
    }
  });
}

$(document).ready(function () {
  $(".datapicker").datepicker();
  $(".number").stepper();

  if ($("#lists-container").length) {
    setInterval("updateData()", 10 * 1000);
  }

  var modal = $("#show_modal");

  $("#lists-container").on('click', 'span.label', function () {
    var t = $(this);
    var string = t.data('info').split('**').join("<br />");


    modal.find('.modal-body').html(string);
    modal.modal();
  });

  $("input.colorpicker").ColorPickerSliders({
    placement: 'right',
    hsvpanel: true,
    previewformat: 'hex'
  });
});