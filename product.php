<?php
include "include/header.php";
?>
<?php
$product = new product;
$id_login = Session::get('login_id');
$customer_id = Session::get('customer_id');

if (!isset($_GET['urlProduct']) || $_GET['urlProduct'] == NULL) {
  echo "<script>window.location = '404.html'</script>";
} else {
  $urlProduct = $_GET['urlProduct'];
  $get_id_product = $product->get_id_product($urlProduct);
  $getId = $get_id_product->fetch_assoc();
  $id_sanpham = $getId['id_sanpham'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $color = $_POST['color'];
  $quantity = $_POST['quantity'];
  if ($id_login) {
    $addtoCart = $ct->add_to_cart($id_sanpham, $color, $quantity, $id_login, $customer_id);
  } else {
    $addtoCart = $ct->add_to_cart($id_sanpham, $color, $quantity, session_id(), 'none');
  }
}
?>

<div class="wrapper">
  <?php

  $get_product_details = $product->get_details($id_sanpham);
  if ($get_product_details) {
    $resultDetails = $get_product_details->fetch_assoc();
    $id_danhmuc = $resultDetails['id_danhmuc'];
    $id_loaisanpham = $resultDetails['id_loaisanpham'];
  ?>
    <section class="product">
      <div class="product-container">
        <div class="product-top top">
          <a href="home"><i class="fa-solid fa-house"></i> Trang chủ</a>
          <span>&#8250;&#8250;</span>
          <?php
          $catName = $brand->showCat($urlProduct);
          if ($catName) {
            $resultName = $catName->fetch_assoc();
            $urlcat = $resultName['url_cat'];
          ?>
            <a href="<?php echo $urlcat ?>"><?php echo $resultName['ten_danhmuc'] ?></a>
            <span>&#8250;&#8250;</span>
            <a href="<?php echo $urlcat ?>/<?php echo $resultName['url_brand'] ?>"><?php echo $resultName['ten_loaisanpham'] ?></a>
          <?php
          }

          ?>

        </div>
        <div class="product-title">
          <h3 id="productName" class="font-weight-bold">
            <?php
            $nameProduct = '';
            if ($urlcat == 'dien-thoai') {
              $nameProduct .= 'Điện thoại ';
            } elseif ($urlcat == 'may-tinh-bang') {
              $nameProduct .= 'Máy tính bảng ';
            }
            echo $nameProduct .= $resultDetails['ten_sanpham']; ?>
          </h3>
        </div>
        <div class="product-content box row">
          <div class="product-content-left col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="product-content-left-big-img">
              <img id="productImg" class="col-8 w-100 mx-auto" src="admin/uploads/<?php echo $resultDetails['hinhanh_sanpham'] ?>" alt="">
            </div>
          </div>

          <div class="product-content-right col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <span class="price"><span id="price"><?php echo $fm->format_currency($resultDetails['giaban']); ?></span> ₫</span>
            <div class="free-ship">
              <p>MIỄN PHÍ VẬN CHUYỂN TOÀN QUỐC</p>
              <i class="fa-solid fa-truck-fast"></i>
            </div>
            <div class="product-color d-flex">
              <?php

              $get_imgs = $product->get_imgs($id_sanpham);
              if ($get_imgs) {
                $resultImgs = $get_imgs->fetch_assoc();
              ?>
                <div class="color py-3">
                  <img src="admin/uploads/<?php echo $resultImgs['anh_sanpham'] ?>" alt="">
                </div><?php

                    }
                      ?>
            </div>

            <div class="buy-now col-12 mx-0 px-0">
              <?php
              if ($resultDetails['soluong'] < 1) {
              ?>
                <button disabled type="button" class="btn-buy btn btn-danger" data-target="#code<?php echo $resultDetails['id_sanpham']; ?>">
                  <span>Sản phẩm này hiện tại đang hết hàng.</span>
                </button>
              <?php
              } else {
              ?>
                <a data-toggle="modal" type="button" class="btn-buy btn btn-danger" data-target="#code<?php echo $resultDetails['id_sanpham']; ?>">
                  <span>MUA NGAY</span><br>
                  <p style="color: white;">Giao tận nhà (COD) hoặc Nhận tại cửa hàng</p>
                </a>
                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="code<?php echo $resultDetails['id_sanpham']; ?>" tabindex="-1" role="dialog" aria-labelledby="code<?php echo $resultDetails['id_sanpham']; ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <p class="modal-title" id="code<?php echo $resultDetails['id_sanpham']; ?>"><?php echo $resultDetails['ten_sanpham']; ?><br><span class="price" style="font-size: 1rem;"><span><?php echo $fm->format_currency($resultDetails['giaban']) . '₫'; ?></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="d-flex">
                          <div class="col-6">
                            <img class="col-12 mx-auto" src="admin/uploads/<?php echo $resultDetails['hinhanh_sanpham'] ?>" alt="">
                          </div>
                          <div class="col-6">
                            <form method="POST" action="">
                              <div class="mb-3">
                                <p class="p-0 m-0 font-weight-bold">Chọn màu:</p>

                                <?php
                                $id_sanpham =  $resultDetails['id_sanpham'];
                                $show_color_product = $product->show_color_product($id_sanpham);
                                if ($show_color_product) {
                                  while ($resultColor = $show_color_product->fetch_assoc()) {
                                ?>
                                    <div style="cursor: pointer;" class="btn-radio choice-color m-1 btn btn-outline-danger p-2 mr-1">
                                      <input checked="checked" class="radio-box" type="radio" id="<?php echo $resultColor['ten_color'];  ?>" name="color" value="<?php echo $resultColor['ten_color'];  ?>">
                                      <label class="m-0" for="contactChoice1"><?php echo $resultColor['ten_color'];  ?></label>
                                    </div>
                                <?php
                                  }
                                }
                                ?>
                              </div>

                              <div>
                                <p class="p-0 m-0 font-weight-bold">Chọn số lượng:</p>
                                <div class="d-flex">
                                  <div class="quantity-pr minus btn btn-secondary"><i class="fa-solid fa-minus"></i></div>
                                  <input readonly class="quantity-pr pr-input p-0 quantity text-right" id="quantity" name="quantity" style="width: 40px;" type="number" min="1" max="<?php echo $resultColor['soluong']  ?>" value="1" />
                                  <div class="plus btn btn-danger quantity-pr"><i class="fa-solid fa-plus"></i></div>
                                </div>

                              </div>
                              <button type="submit" name="submit" class="btn btn-warning w-100 mt-3">Thêm vào giỏ hàng</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
              <?php

              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="product-bottom">
      <div class="blog-content box">
        <h5>Đánh giá chi tiết</h5>
        <?php echo $resultDetails['mota_sanpham']; ?>
      </div>
      <div class="content-right"> 
        <?php if($resultDetails['manhinh']) { ?>
        <div class="table box">
          <h5>Thông số kỹ thuật</h5>
         
          <table class="table table-striped">
            <tbody>
              <tr>
                <td scope="row">Màn hình:</td>
                <td><?php echo $resultDetails['manhinh']; ?></td>
              </tr>
              <tr>
                <td scope="row">Hệ điều hành:</td>
                <td><?php echo $resultDetails['hedieuhanh']; ?></td>
              </tr>
              <tr>
                <td scope="row">Camera sau:</td>
                <td><?php echo $resultDetails['cam_sau']; ?></td>
              </tr>
              <tr>
                <td scope="row">Camera trước:</td>
                <td><?php echo $resultDetails['cam_truoc']; ?></td>
              </tr>
              <tr>
                <td scope="row">Chip:</td>
                <td><?php echo $resultDetails['chip']; ?></td>
              </tr>
              <tr>
                <td scope="row">RAM:</td>
                <td><?php echo $resultDetails['ram']; ?></td>
              </tr>
              <tr>
                <td scope="row">Bộ nhớ trong</td>
                <td><?php echo $resultDetails['rom']; ?></td>
              </tr>
              <tr>
                <td scope="row">SIM:</td>
                <td><?php echo $resultDetails['sim']; ?></td>
              </tr>
              <tr>
                <td scope="row">Pin, sạc:</td>
                <td><?php echo $resultDetails['pin']; ?>, <?php echo $resultDetails['sac']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <?php }?>
      </div>

    </section>
  <?php
  }

  ?>

  <section class="product-related">
    <div class="product-related-title">
      <h5>Sản phẩm tương tự</h5>
    </div>
    <div class="cartegory-list-content">
      <?php
      if ($get_product_details) {
        $getProductSimilar = $product->productSimilar($id_loaisanpham, $id_sanpham);
        if ($getProductSimilar) {
          while ($resultSimilar = $getProductSimilar->fetch_assoc()) {
      ?>
            <div class="cartegory-content-item">
              <a href="<?php echo $resultSimilar['url_product']; ?>">
                <img class="productImg" src="admin/uploads/<?php echo $resultSimilar['hinhanh_sanpham'] ?>" alt="">
                <div class="info">
                  <h6><?php echo $resultSimilar['ten_sanpham'] ?></h6>
                  <span class="price"><span><?php echo $fm->format_currency($resultSimilar['giaban']); ?></span> ₫</sp>
                </div>
              </a>
            </div>
            <?php

          }
          $count = mysqli_num_rows($getProductSimilar);
          if ($count < 5) {
            $getProductSimilarPlus = $product->productSimilarPlus($id_danhmuc, $count, $id_sanpham);
            while ($resultSimilarPlus = $getProductSimilarPlus->fetch_assoc()) {
            ?>
              <div class="cartegory-content-item">
                <a href="<?php echo $resultSimilarPlus['url_product']; ?>">
                  <img class="productImg" src="admin/uploads/<?php echo $resultSimilarPlus['hinhanh_sanpham'] ?>" alt="">
                  <div class="info">
                    <h6><?php echo $resultSimilarPlus['ten_sanpham'] ?></h6>
                    <span class="price"><span><?php echo $fm->format_currency($resultSimilarPlus['giaban']); ?></span> ₫</sp>
                  </div>
                </a>
              </div>
      <?php

            }
          }
        }
        else {
          echo '<script>
          $(".product-related").remove();
          </script>';
        }
      }
      ?>
    </div>
  </section>
</div>
<?php
include "include/footer.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="js/productitem.js"></script>
<!-- <script src="js/addtocart_noLogin.js"></script> -->


</body>

</html>