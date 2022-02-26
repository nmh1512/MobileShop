$(document).ready(function () {
  $("#formRegister").validate({
    rules: {
      username: {
        required: true,
        minlength: 4,
      },
      name: "required",
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 8,
      },
      phone: {
        required: true,
        digits: true,
      },
      city: "required",
      district: "required",
      address: "required",
    },
    messages: {
      username: {
        required: 'Vui lòng nhập tên tài khoản',
        minlength: 'Độ dài tài khoản phải lớn hơn 4 ký tự',
      },
      name: "Vui lòng nhập họ tên",
      email: {
        required: 'Vui lòng nhập email',
        email: 'Email không đúng định dạng',
      },
      password: {
        required: 'Vui lòng nhập mật khẩu',
        minlength: 'Độ dài mật khẩu phải lớn hơn 8 ký tự',
      },
      phone: {
        required: 'Vui lòng nhập số điện thoại',
        digits: 'Số điện thoại không đúng định dạng',
      },
      city: "Vui lòng chọn tỉnh/thành phố",
      district: "Vui lòng chọn quận/huyện",
      address: "Vui lòng nhập địa chỉ",
    },
  });
});
function checkUsername() {
  var username = $('#username').val();
  $.ajax({
    url: "ajax/checkregister.php",
    data: {
      username: username
    },
    type: 'POST',
    success: function(data) {
      $("#check-username").html(data);
    },
    error: function() {}
  })
}

function checkPass() {
  var pass = $('#pass').val();
  var checkpass = $('#checkpass').val();
  if (pass !== checkpass) {
    $('#check-pass').html('Mật khẩu không trùng khớp');
  } else {
    $('#check-pass').html('');

  }
}

function checkEmail() {
  var email = $('#email').val();
  $.ajax({
    url: "ajax/checkregister.php",
    data: {
      email: email
    },
    type: 'POST',
    success: function(data) {
      $("#check-email").html(data);
      console.log(data)
    },
    error: function() {}
  })
}

function checkPhone() {
  var phone = $('#phone').val();
  $.ajax({
    url: "ajax/checkregister.php",
    data: {
      phone: phone
    },
    type: 'POST',
    success: function(data) {
      $("#check-phone").html(data);
      console.log(data)
    },
    error: function() {}
  })
}