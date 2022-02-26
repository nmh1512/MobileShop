<?php
include 'admin/lib/session.php';
Session::init();
?>
<?php
$login_check = Session::get('customer_login');
if ($login_check) {
  header('Location: home');
}
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
  <title>Đăng nhập</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />

</head>

<body>
  <header>
    <div class="header">
      <div class="d-flex align-items-center">
        <a href="home">
          <img class="img-logo" src="./logo/logo1.png" alt="" />
        </a>
        <h2 class="ml-3">Đăng nhập</h2>
      </div>
    </div>
  </header>
  <?php

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $login_customer = $customer->login_customer($_POST);
  }
  ?>

  <section class="mx-auto container-form">
    <div id="container">
      <div class="login-form d-flex justify-content-center">
        <div class="col-8 text-center">
          <img src="./logo/login-bg.png" alt="" />
        </div>
        <div class="box-login col-4">
          <h3 class="pb-4">Đăng nhập</h3>
          <form action="" method="POST">
            <div class="form-group">
              <input type="text" class="form-control login-input" id="username" placeholder=" " aria-describedby="" required name="username" />
              <label id="form-label" for="username" class="form-label-username">Tài khoản</label>
            </div>
            <div class="form-group">
              <input type="password" class="form-control login-input" placeholder=" " id="password" required name="password" />
              <label id="form-label" for="password" class="form-label-password">Mật khẩu</label>
              <div class="eye">
                <i class="far fa-eye"></i>
              </div>
            </div>
            <?php

            if (isset($login_customer)) {
              echo $login_customer;
            }
            ?>
            <button id="login" type="submit" name="login" class="btn btn-danger w-100" disabled="disabled">
              Đăng nhập
            </button>
          </form>
          <div class="text-center pt-4">
            <small>Chưa có tài khoản?
              <a id="register" href="register">Đăng ký</a> ngay!</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include "include/footer.php";
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
  <script src="js/login.js"></script>
</body>
<script>
  (function() {
    $("form > div > input").keyup(function() {
      var empty = false;
      $("form > div > input").each(function() {
        if ($(this).val() == "") {
          empty = true;
        }
      });
      if (empty) {
        $("#login").attr("disabled", "disabled");
      } else {
        $("#login").removeAttr("disabled");
      }
    });
  })();
</script>

</html>