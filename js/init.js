<<<<<<< HEAD
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

  $("input.colorpicker").ColorPickerSliders({
    placement: 'right',
    hsvpanel: true,
    previewformat: 'hex'
  });
=======
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
>>>>>>> 2558046e9c6f30960af49028f08c9a4981e60b88
});