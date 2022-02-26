<?php
include "include/header.php";
?>
<!-- <?php
        // $check = Session::get('customer_login');
        // if ($check == false) {
        //     echo "<script>window.location = 'home.php'</script>";
        // } 
        ?> -->
<?php
$id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $edit_customer = $customer->edit_customer($_POST, $id);
}
?>
<div class="wrapper">
    <div class="w-75 mx-auto profile-container d-flex">
        <div class="profile-left col-4">

            <?php
            $showProfile = $customer->show_profile($id);
            if ($showProfile) {
                while ($result = $showProfile->fetch_assoc()) {

            ?>
                    <div class="text-center">
                        <img src="logo/user.png" class="w-75" alt="">
                        <div class="font-weight-bold mb-4 mt-2"><?php echo $result['taikhoan'] ?></div>
                    </div>
                    <div class="text-center">
                        <a href="lich-su-mua-hang">Lịch sử mua hàng</a>
                    </div>
                    <hr>
                    <div class="text-center">
                        <i style="color: red;" class="fas fa-sign-out-alt"></i>
                        <a href="?customerId=<?php echo $id ?>" style="color: red;">Đăng xuất</a>
                    </div>


        </div>
        <div class="profile-right col-8">
            <h3>Hồ sơ người dùng</h3>
            <?php
                    if (isset($edit_customer)) {
                        echo $edit_customer;
                    }
            ?>
            <hr>
            <h5 class="mb-4">Thông tin cơ bản</h5>
            <form id="formRegister" class="mt-4" action="" method="POST">

                <div class="d-flex profile align-items-center">
                    <label class="col-3 m-0 text-right" for="name">Họ tên</label>
                    <input class="col-9 py-1" type="text" name="name" id="" value="<?php echo $result['name'] ?>">
                </div>
                <div class="d-flex profile align-items-center">
                    <label class="col-3 m-0 text-right" for="email">Email</label>
                    <input class="col-9 py-1" type="Email" name="email" id="" value="<?php echo $result['email'] ?>">
                </div>
                <div class="d-flex profile align-items-center">
                    <label class="col-3 m-0 text-right" for="phone">Số điện thoại</label>
                    <input class="col-9 py-1" type="tel" name="phone" id="" value="<?php echo $result['sdt'] ?>">
                </div>
                <div>
                    <h5 class="mb-4">Địa chỉ</h5>
                    <div>
                        <input name="address" type="text" class="form-control profile" id="address" value="<?php echo $result['dia_chi'] ?>" aria-describedby="" />
                    </div>
                    <input id="city" type="text" hidden value="<?php echo $result['tinh_thanhpho'] ?>">
                    <input id="district" type="text" hidden value="<?php echo $result['quan_huyen'] ?>">
                    <select id="citySel" name="city" class="form-control profile">
                        <option selected></option>
                    </select>
                    <select id="disSel" name="district" class="form-control profile">
                        <option selected></option>
                    </select>

                </div>
        <?php
                }
            }
        ?>
        <div class="text-left">
            <button type="submit" name="save" class="btn btn-danger w-25 mt-4">
                Lưu
            </button>
        </div>
            </form>
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
    var city = $('#city').val()
    var district = $('#district').val()
    $("#citySel").val(city).change();
    $("#disSel").val(district).change();
</script>


</body>

</html>