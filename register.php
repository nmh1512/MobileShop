<?php
include 'admin/lib/session.php';
Session::init();
?>
<?php
include_once 'admin/lib/database.php';
include_once 'admin/lib/format.php';

spl_autoload_register(function ($className) {
  include_once "admin/class/" . $className . ".php";
});
$db = new Database;
$fm = new Format;
$customer = new Customer;


?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Prama: mno-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng ký</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <header>
    <div class="header">
      <div class="d-flex align-items-center">
        <a href="home">
          <img class="img-logo" src="./logo/logo1.png" alt="" />
        </a>
        <h2 class="ml-3">Đăng Ký</h2>
      </div>
    </div>
  </header>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $insert_customer = $customer->insert_customer($_POST);
  }

  ?>
  <section class="mx-auto container-form">
    <div id="container" class="p-4">
      <div class="box-login w-75 mx-auto my-4 register-form">
        <h3 class="pb-4">Đăng ký tài khoản</h3>
        <form id="formRegister" action="" method="POST">
          <div class="d-flex flex-wrap">
            <div class="form-group col-6">
              <input type="text" class="form-control" id="username" aria-describedby="" placeholder="Tên tài khoản" name="username" oninput="checkUsername()" />
              <small class="error" id="check-username"></small>
            </div>
            <div class="form-group col-6">
              <input type="password" class="form-control" id="pass" aria-describedby="" placeholder="Mật khẩu" name="password" />
            </div>
            <div class="form-group col-6">
              <input type="password" class="form-control" id="checkpass" aria-describedby="" placeholder="Nhập lại mật khẩu" name="check_pass" oninput="checkPass()" />
              <small class="error" id="check-pass"></small>
            </div>

            <div class="form-group col-6">
              <input type="text" class="form-control" id="name" aria-describedby="" placeholder="Họ và tên" name="name" />
            </div>
            <div class="form-group col-6">
              <input type="email" class="form-control" id="email" aria-describedby="" placeholder="Email" name="email" oninput="checkEmail()" />
              <smal class="error" l id="check-email"></smal>
            </div>
            <div class="form-group col-6">
              <input type="tel" class="form-control" id="phone" aria-describedby="" placeholder="Số điện thoại" name="phone" oninput="checkPhone()" />
              <small class="error" id="check-phone"></small>
            </div>

            <div class="form-group col-6">
              <select name="city" class="form-control" id="city">
                <option value="">Tỉnh / Thành phố</option>
              </select>
            </div>
            <div class="form-group col-6">
              <select name="district" class="form-control" id="district">
                <option value="">Quận / Huyện</option>
              </select>
            </div>
            <div class="form-group col-12">
              <input name="address" type="text" class="form-control" id="address" aria-describedby="" placeholder="Địa chỉ" />
            </div>
          </div>
          <div class="text-center">
            <button type="submit" name="register" class="btn btn-success w-50 submit-register">
              Đăng ký
            </button>
          </div>
        </form>
        <div class="text-center pt-4">
          <small>Đã có tài khoản? <a id="register" href="login">Đăng nhập</a> ngay!</small>
        </div>
        <div class="text-center pt-4"></div>
      </div>
    </div>
  </section>
  
  <?php
  include "include/footer.php";
  ?>
  <?php
  if(isset($insert_customer)){
    echo $insert_customer; ?>
    <section class="mx-auto container-form">
    <div id="container" class="p-4">
    <div class="box-login col-4 mx-auto">
      <div class="w-50 mx-auto">
        <img class="w-100" src="./logo/Green-Check.png" alt="">
      </div>
      <div class="text-center">
        <h6>Đăng ký tài khoản thành công</h6>
        <a href="login" type="button" class="btn btn-success">Đăng nhập ngay!</a>
      </div>
    </div>
  </section>
    <?php
  }
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>

  <script src="js/address.js"></script>
  <script src="js/register.js"></script>
</body>

</html>