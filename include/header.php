<?php
include 'admin/lib/session.php';
Session::init();
?>
<?php
include_once 'admin/lib/database.php';
include_once 'admin/lib/format.php';
error_reporting(E_ALL);
spl_autoload_register(function ($className) {
  include_once "admin/class/" . $className . ".php";
});
$db = new Database;
$fm = new Format;
$ct = new Cart;
$customer = new Customer;
$cat = new cartegory;
$product = new product;
$brand = new brand;
$news = new News;
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
  <base href="http://localhost:8080/baitap/datn/" />
  <!-- <base href="https://abc.okechua.com/" /> -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Freedom Mobile - Điện thoại hịn</title>
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
  <div class="modal-busy" style="display: none"></div>
  <header>
    <nav class="header navbar navbar-expand-lg navbar-light">
      <div class="logo col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
        <a href="home" class="navbar-brand">
          <img class="img-logo" src="./logo/logo1.png" alt="" />
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <div class="search-box">
              <form action="search?keyword=keyword" method="get">
                <input id="keyword" class="search" type="text" placeholder="Bạn muốn tìm gì... ?" name="keyword" require />
                <button type="submit" class="search-btn">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form>
            </div>
          </li>
          <li class="ml-4 nav-item">
            <?php
            $login_check = Session::get('customer_login');
            if ($login_check == false) {
              echo "
   
          <a class='tools' href='login'>Đăng nhập</a>

          ";
            } else {
              echo "
 
          <a class='tools' href='profile'><i class='fa-solid fa-user'></i> Tài khoản</a>
 
          ";
            }
            ?>
          </li>
          <li class="nav-item">
          <a class='tools' <?php if ($login_check) {
                echo 'href="lich-su-mua-hang"';
              } else {
                echo 'data-toggle="modal" data-target="#exampleModalCenter"';
              } ?> href="lich-su-mua-hang">
            <i class="fas fa-history"></i> Lịch sử đơn hàng</a>
          </li>
          <li class="nav-item">
          <a class='tools cart' href="gio-hang">
            <i class="fa-solid fa-cart-shopping"></i>
          </a>
          </li>
        </ul>
      </div>
    </nav>
   

    <div class="nav-container">
      <ul class="nav justify-content-center">
        <?php


        $show_cartegory = $cat->show_cartegory();
        $show_brand = $brand->show_brand();
        if ($show_cartegory) {
          while ($result = $show_cartegory->fetch_assoc()) {
        ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $result['url_cat']; ?>">
                <?php echo $result['icon'] ?>
                <?php echo $result['ten_danhmuc'] ?>
              </a>
            </li>
        <?php
          }
        }
        ?>
      </ul>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tra cứu lịch sử đơn hàng</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="lich-su-mua-hang?sdt=phone" method="get">
              <div class="form-group">
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" require class="form-control" placeholder="Nhập số điện thoại mua hàng">
              </div>
              <div class="text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Tiếp tục</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </header>