$(document).ready(function () {
  $(".eye").click(function () {
    $(this).toggleClass("open");
    $(this).children("i").toggleClass("fa-eye-slash fa-eye");
    if ($(this).hasClass("open")) {
      $("#password").attr("type", "text");
    } else {
      $("#password").attr("type", "password");
    }
  });
});
