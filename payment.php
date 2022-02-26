<?php
include "include/header.php";
?>

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$today = date("jngi");
if (Session::get('customer_id')) {
    $customer_id = Session::get('customer_id');
    $orderId = '#' . '' . $customer_id . '' . $today;
} else {
    $customer_id = session_id();
    $orderId = '#' . 'guest' . $today;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order'])) {
    $insertOrder = $ct->insert_order($_POST, $customer_id, $orderId);
    $delCart = $ct->dell_all_data_cart($customer_id);
    echo $insertOrder;
} else {

?>
    <div class="wrapper mt-4">
        <div class="d-flex align-items-start pay-box">
            <div class=" pay pay-left p-0">

                <form method="POST" class="form-cart" action="">
                    <?php
                    $showProfile = $customer->show_profile($customer_id);
                    if ($showProfile) {
                        $result = $showProfile->fetch_assoc();

                    ?>
                        <div class="pay-content">
                            <h3>Địa chỉ nhận hàng</h3>

                            <div class="d-flex checkout-form-field">
                                <div class="form-group col-6 px-2">

                                    <div class="txt-field">
                                        <input type="text" name="name" class="px-1 checkout-form" id="exampleFormControlInput1" required value="<?php echo $result['name'] ?>" />
                                        <label class="label-checkout-form" for="">Họ tên</label>
                                    </div>

                                </div>
                                <div class="form-group checkout-form-field col-6 px-2">

                                    <div class="txt-field">
                                        <input type="tel" name="phone" pattern="[0-9]{10}" class="px-1 checkout-form" id="exampleFormControlInput1" required value="<?php echo $result['sdt'] ?>" />
                                        <label for="">Số điện thoại</label>
                                    </div>

                                </div>

                            </div>
                            <div class="form-group checkout-form-field col-12 px-2">

                                <div class="txt-field">
                                    <input type="email" name="email" email class="px-1 checkout-form" id="exampleFormControlInput1" required value="<?php echo $result['email'] ?>" />
                                    <label for="">Email</label>
                                </div>

                            </div>

                            <input class="checkout-form" id="city" type="text" hidden value="<?php echo $result['tinh_thanhpho'] ?>">
                            <input class="checkout-form" id="district" type="text" hidden value="<?php echo $result['quan_huyen'] ?>">
                            <div class="form-group checkout-form-field select-container">
                                <div class="col-6 px-2">
                                    <div class="txt-field select w-100">
                                        <select class="checkout-form py-2" id="citySel" name="city" required>
                                        </select>
                                        <label class="label-checkout-form" for="">Tỉnh / Thành phố</label>
                                    </div>
                                </div>
                                <div class="col-6 px-2">
                                    <div class="txt-field select w-100">
                                        <select class="checkout-form py-2" id="disSel" name="district" required>
                                        </select>
                                        <label class="label-checkout-form" for="">Quận / Huyện</label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group checkout-form-field px-2">

                                <div class="txt-field">
                                    <input type="text" name="address" class="checkout-form px-1" id="exampleFormControlInput1" required value="<?php echo $result['dia_chi'] ?>" />

                                    <label class="label-checkout-form" for="">Địa chỉ cụ thể</label>
                                </div>

                            </div>
                            <div class="form-group checkout-form-field px-2">

                                <div class="txt-field">
                                    <input type="text" name="note" class="px-1 checkout-form" id="exampleFormControlInput1" value="" />

                                    <label class="label-checkout-form" for="">Ghi chú</label>
                                </div>

                            </div>

                        <?php

                    } else {
                        ?>
                            <div class="pay-content">
                                <h3>Địa chỉ nhận hàng</h3>

                                <div class="d-flex checkout-form-field">
                                    <div class="form-group col-6 px-2">

                                        <div class="txt-field">
                                            <input type="text" name="name" class="px-1 checkout-form" id="exampleFormControlInput1" required value="" />

                                            <label class="label-checkout-form" for="">Họ tên</label>
                                        </div>

                                    </div>
                                    <div class="form-group checkout-form-field col-6 px-2">

                                        <div class="txt-field">
                                            <input type="tel" name="phone" pattern="[0-9]{10}" class="px-1 checkout-form" id="exampleFormControlInput1" required value="" />


                                            <label for="">Số điện thoại</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group checkout-form-field col-12 px-2">

                                    <div class="txt-field">
                                        <input type="email" name="email" email class="px-1 checkout-form" id="exampleFormControlInput1" required value="" />
                                        <label for="">Email</label>
                                    </div>

                                </div>
                                <input class="checkout-form" id="city" type="text" hidden value="">
                                <input class="checkout-form" id="district" type="text" hidden value="">
                                <div class="form-group checkout-form-field select-container">
                                    <div class="col-6 px-2">
                                        <div class="txt-field select w-100">
                                            <select class="checkout-form py-2" id="citySel" name="city" required>
                                            </select>
                                            <label class="label-checkout-form" for="">Tỉnh / Thành phố</label>
                                        </div>
                                    </div>
                                    <div class="col-6 px-2">
                                        <div class="txt-field select w-100">
                                            <select class="checkout-form py-2" id="disSel" name="district" required>
                                            </select>
                                            <label class="label-checkout-form" for="">Quận / Huyện</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group checkout-form-field px-2">

                                    <div class="txt-field">
                                        <input type="text" name="address" class="checkout-form px-1" id="exampleFormControlInput1" required value="" />

                                        <label class="label-checkout-form" for="">Địa chỉ cụ thể</label>
                                    </div>

                                </div>
                                <div class="form-group checkout-form-field px-2">

                                    <div class="txt-field">
                                        <input type="text" name="note" class="px-1 checkout-form" id="exampleFormControlInput1" value="" />

                                        <label class="label-checkout-form" for="">Ghi chú</label>
                                    </div>

                                </div>


                            <?php
                        }
                            ?>
                            </div>

                            <div class="pay-content">
                                <h5>Lựa chọn phương thức thanh toán</h5>
                                <!-- <div style="cursor: pointer;" class="btn-radio btn btn-warning p-2 mr-1">
                                    <input class="radio-box" type="radio" id="" name="pay-method" value="Thanh toán qua VNPay">
                                    <label class="m-0" for="contactChoice1">Thanh toán qua VNPay</label>
                                </div><br>
                                <div style="cursor: pointer;" class="btn-radio btn btn-warning p-2 my-3 mr-1">
                                    <input class="radio-box" type="radio" id="" name="pay-method" value="Paypal">
                                    <label class="m-0" for="contactChoice1">Paypal</label>
                                </div><br> -->
                                <div style="cursor: pointer;" class="btn-radio btn btn-warning p-2 mr-1">
                                    <input class="radio-box" type="radio" id="" name="pay-method" value="Thanh toán khi nhận hàng">
                                    <label class="m-0" for="contactChoice1">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>
                            <button onclick="orderSuccess" type="submit" name="order" class="submit-form btn btn-warning">
                                <b>XÁC NHẬN VÀ ĐẶT HÀNG</b>
                            </button>
                            <!-- <a href="./vnpay_php/index.php" type="submit" name="order" class="submit-form btn btn-warning">
                                <b>XÁC NHẬN VÀ ĐẶT HÀNG</b>
                            </a> -->
                </form>


            </div>
            <div class=" pay pay-right">
                <?php
                $total = 0;
                $subTotal = 0;
                $get_cart = $ct->get_product_cart($customer_id);
                if ($get_cart) {
                    while ($result = $get_cart->fetch_assoc()) {
                        $total = $result['soluong'] * $result['giaban'];
                        $subTotal += $total;
                ?>
                        <div class="order-info d-flex">
                            <div class="mr-4">
                                <img style="width: 120px;" src="admin/uploads/<?php echo $result['hinhanh_sanpham'] ?>" alt="">
                            </div>
                            <div>
                                <h6 class="font-weight-bold"><?php echo $result['ten_sanpham'] ?></h6>
                                <p class="m-0">Màu sắc: <?php echo $result['mau_sanpham'] ?></p>
                                <p class="m-0">Số lượng: <?php echo $result['soluong'] ?></p>
                                <p class="m-0">Đơn giá: <?php echo $fm->format_currency($result['giaban']) ?> ₫</p>

                            </div>

                        </div>
                        <hr class="my-4">
                <?php
                    }
                }
                ?>
                <div class="mt-4">
                    <h6 class="font-weight-bold">Tổng thanh toán: <p class="float-right"><span><?php echo $fm->format_currency($subTotal) ?></span> ₫</p>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "include/footer.php";
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
    <script src="js/address.js"></script>
    <script src="js/register.js"></script>
    <script>
        var city = $('#city').val()
        var district = $('#district').val()
        $("#citySel").val(city).change();
        $("#disSel").val(district).change();
    </script>
    </div>
    <script>
        const radio = document.querySelectorAll(".radio-box");
        const btnRadio = document.querySelectorAll(".btn-radio");
        for (let i = 0; i < btnRadio.length; i++) {
            btnRadio[i].addEventListener("click", function() {
                radio[i].checked = true;
            });
        }
    </script>

<?php
}
?>
</body>

</html>