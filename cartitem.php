<?php
include "include/header.php";
$subTotal = 0;

?>
<?php
$id = Session::get('customer_id');
$login_check = Session::get('customer_login');


?>
<input id="customer_id" type="text" hidden value="<?php echo $id ?>">
<div class="wrapper">
  <section class="cart pt-4">
    <div class="cart-container">
      <?php
if($id){
  $get_total = $ct->get_product_cart($id);
} else {
  $get_total = $ct->get_product_cart(session_id());
}
      if ($get_total) {
        while ($resultTotal = $get_total->fetch_assoc()) {
          $total = $resultTotal['soluong'] * $resultTotal['giaban'];
          $subTotal += $total;
        }
      }

      if (isset($get_total)) {
      ?>
        <div class="cart-content mt-4 mx-auto">

          <div class="cart-content-table box mx-auto">

            <div class="table-cart">

            </div>

          </div>

          <div class="calcu box d-flex justify-content-between align-items-center">
            <div>
              <h5>Tổng tiền giỏ hàng</h5>
              <p>Tạm tính: <span class="total price"><span><?php echo $fm->format_currency($subTotal) ?></span> ₫</span></p>
              <p>
                Tổng thanh toán: <span class="total price" style="color: red"><span><?php echo $fm->format_currency($subTotal) ?></span> ₫</span>
              </p>
            </div>

            <div>
              <a href="checkout" type="button" class="btn btn-outline-danger px-4 ">MUA HÀNG</a>
            </div>
          </div>


        </div>
    </div>

  </section>
</div>
<?php
        include "include/footer.php";
?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
<script src="js/address.js"></script>
<script>
  var customer_id = $('#customer_id').val()

  function fetch_data() {
    $('.modal-busy').show();
    $.ajax({
      type: "POST",
      url: "ajax/loaddata.php",
      data: {
        customer_id: customer_id
      },
      success: function(data) {
        $('.table-cart').html(data)
        $('.modal-busy').hide();

      }
    })
  }

  function fetch_data_total() {
    // var id = $('#customer_id').val()
    // $('.modal-busy').show();
    $.ajax({
      type: "POST",
      url: "ajax/loaddatatotal.php",
      data: {
        customer_id: customer_id
      },
      success: function(data) {
        $('.total').html(data)
        // $('.modal-busy').hide();

      }
    })
  }
  fetch_data();

  function update_plus(str) {
    // var customer_id = $('#customer_id').val()
    var id = str;
    $.ajax({
      type: "POST",
      url: "ajax/plus.php",
      data: {
        id: id,
        customer_id: customer_id
      },
      success: function(data) {
        fetch_data()
        fetch_data_total()
      }
    })
  }

  function update_minus(str) {
    // var customer_id = $('#customer_id').val()
    var id = str;
    $.ajax({
      type: "POST",
      url: "ajax/minus.php",
      data: {
        id: id,
        customer_id: customer_id
      },
      success: function(data) {
        fetch_data()
        fetch_data_total()
      }
    })
  }

  function removeProduct(str) {
    // var customer_id = $('#customer_id').val()
    var id = str;
    $.ajax({
      type: "POST",
      url: "ajax/remove.php",
      data: {
        id: id,
        customer_id: customer_id
      },
      success: function(data) {
        window.document.location.reload();
      }
    })

  }
</script>
<script>
  var city = $('#city').val()
  var district = $('#district').val()
  $('#citySel option:selected').html(city)
  $('#disSel option:selected').html(district)
</script>
<?php
      }
?>

<!-- <div class="nologin-container">
    <div class="wrapper">
      <section class="cart">
        <div class="cart-container">

          <div class="cart-content mt-5">
            <div class="cart-content-left">
              <div class="cart-content-left-table box">

                <div class="table-cart">
                  <table id="table">
                    <tr>
                      <th style="width: 130px; height: 50px" scope="col">
                        <p>Sản phẩm</p>
                      </th>
                      <th style="width: 162px; height: 50px" scope="col">
                        <p>Tên sản phẩm</p>
                      </th>
                      <th style="width: 100px; height: 50px" scope="col">
                        <p>Màu</p>
                      </th>
                      <th style="width: 100px; height: 50px" scope="col">
                        <p>Số lượng</p>
                      </th>
                      <th style="width: 100px; height: 50px" scope="col">
                        <p>Thành tiền</p>
                      </th>
                      <th style="width: 100px; height: 50px" scope="col"></th>
                    </tr>

                  </table>
                </div>

              </div>

              <div class="calcu box">
                <h5>Tổng tiền giỏ hàng</h5>
                <p>Tạm tính: <span class="total"><span>0</span> ₫</span></p>
                <p>
                  Tổng thanh toán: <span class="grand-total" style="color: red"><span>0</span> ₫</span>
                </p>
              </div>
            </div>
            <div class="cart-content-right">
              <form class="form-cart" action="">
                <h3>Thông tin đặt hàng</h3>
                <p><i>Bạn cần nhập đầy đủ các trường thông tin có dấu *</i></p>
                <div class="form-group">
                  <div class="form-item">
                    <div class="control">
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Họ và tên *" required />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-item">
                    <div class="control">
                      <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Số điện thoại *" required />
                    </div>
                  </div>
                </div>
                <div class="form-group select-container">
                  <div class="select form-item">
                    <div class="control">
                      <select name="city" required class="form-control" id="exampleFormControlSelect1">
                        <option value="">Tỉnh / Thành phố</option>
                      </select>
                    </div>
                  </div>
                  <div class="select form-item">
                    <div class="control">
                      <select name="district" required class="form-control" id="exampleFormControlSelect1">
                        <option value="">Quận / Huyện</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-item">
                    <div class="control">
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Địa chỉ nhận hàng *" required />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-item">
                    <div class="control">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ghi chú"></textarea>
                    </div>
                  </div>
                </div>
                <button type="submit" class="submit-form btn btn-warning">
                  <b>XÁC NHẬN VÀ ĐẶT HÀNG</b>
                </button>
              </form>
            </div>
          </div>
        </div>

      </section>
    </div>
    <div class="icons">
      <div class="service">
        <span><i class="far fa-check-circle"></i></span>
        <div>
          <span>Sản phẩm</span><br />
          <strong>Chính hãng</strong>
        </div>
      </div>
      <div class="service">
        <span><i class="fas fa-truck"></i></span>
        <div>
          <span>Miễn phí vận chuyển</span><br />
          <strong>Toàn quốc</strong>
        </div>
      </div>
      <div class="service">
        <span><i class="fas fa-headset"></i></span>
        <div>
          <span>Hotline hỗ trợ</span><br />
          <strong>035.689.7701</strong>
        </div>
      </div>
      <div class="service">
        <span><i class="fa-solid fa-rotate"></i></span>
        <div>
          <span>Thủ tục đổi trả</span><br />
          <strong>Dễ dàng</strong>
        </div>
      </div>
    </div>
    <footer>
      <div class="footer-top">
        <li class="bct-logo">
          <a href=""><img src="./logo/logo-bct.png" alt="" /></a>
        </li>
        <li class="text"><a href=""></a>Liên hệ</li>
        <li class="text"><a href=""></a>Giới thiệu</li>
        <li class="contact">
          <a href=""><i class="fa-brands fa-facebook"></i></a>
          <a href=""><i class="fa-brands fa-instagram"></i></a>
          <a href=""><i class="fa-brands fa-twitter"></i></a>
        </li>
      </div>

      <div class="footer-bottom">
        <p>Cửa hàng MobiTH</p>
        <p>
          Địa chỉ: Số 16, cụm 15, thôn Vân Sa 2, xã Tản Hồng, huyện Ba Vì, Tp.
          Hà Nội
        </p>
        <p>Hotline: <strong>035.689.7701</strong></p>
        <p class="me">Design by Nguyễn Hùng</p>
      </div>
    </footer>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
  <script src="address.js"></script>
  <script src="cart.js"></script>

<?php

?>
</body>

</html> -->