
function checkUsername() {
  var username = $("#username").val();
  $.ajax({
    url: "ajax/checkMember.php",
    data: {
      username: username,
    },
    type: "POST",
    success: function (data) {
      if (data !== "") {
        $("#submit").attr("disabled", "disabled");
      } else {
        $("#submit").removeAttr("disabled");
      }
      $("#check-username").html(data);
    },
  });
}

function checkPass() {
  var pass = $("#pass").val();
  var checkpass = $("#checkpass").val();
  if (pass !== checkpass) {
    $("#check-pass").html("Mật khẩu không trùng khớp");
    $("#submit").attr("disabled", "disabled");
  } else {
    $("#check-pass").html("");
    $("#submit").removeAttr("disabled");
  }
}
