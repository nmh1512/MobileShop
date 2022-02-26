<?php
include "include/header.php";


?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $admin->newMember($_POST);
    echo "<script>window.location = 'members'</script>";
}

?>
<div style="padding: 0 25px 20px 0;">
    <a style="float: right;" class="btn btn-secondary" href="members"><i class="fas fa-undo-alt"></i> Quay lại</a>
</div>

<div class="productlist-wrapper" style="padding: 10px;">
    <h1>Thêm nhân viên</h1>
    <form id="addMember" action="add-member" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Họ tên nhân viên</label>
                <input require name="nameMember" type="text" class="form-control" id="" placeholder="Nhập họ tên nhân viên...">
            </div>

            <div class="col-md-6">
                <label for="">Ngày sinh</label>
                <input require name="birthday" type="date" class="form-control" id="">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Giới tính</label>
                <select name="sex" class="form-control">
                    <option value="">-- Chọn giới tính --</option>
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                    <option value="2">Khác</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Địa chỉ</label></br>
                <input require name="address" type="text" class="form-control" id="" placeholder="Nhập địa chỉ...">
            </div>
        </div>
        <div class="form-group row">
             <div class="col-md-6">
                <label for="">Số điện thoại</label>
                <input name="phone" type="tel" pattern="[0-9]{10}" class="form-control" id="" placeholder="Nhập số điện thoại...">
            </div>
            <div class="col-md-6">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" id="" placeholder="Nhập email...">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <label for="">Tài khoản</label>
                <input require name="account" type="text" class="form-control" minlength="4" id="username" oninput="checkUsername()" placeholder="Nhập tài khoản...">
                <span style="color:red;" id="check-username"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Mật khẩu</label>
                <input require name="password" type="password" class="form-control" id="pass" minlength="8" placeholder="Nhập mật khẩu...">
            </div>
            <div class="col-md-6">
                <label for="">Xác nhận mật khẩu</label>
                <input require name="cPassword" type="password" class="form-control" minlength="8" id="checkpass" oninput="checkPass()" id="" placeholder="Xác nhận mật khẩu...">
                <span style="color: red;" id="check-pass"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Chức vụ</label>
                <select name="level" class="form-control">
                    <option value="">-- Chọn chức vụ --</option>
                    <option value="0">Admin</option>
                    <option value="1">Quản lý</option>
                    <option value="2">Nhân viên</option>
                    <option value="3">Cộng tác viên</option>
                    <option value="4">Nhà văn</option>
                </select>
            </div>
        </div>
        <button id="submit" name="submit" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Lưu</button>
    </form>
</div>



</div>
<!-- End of Content Wrapper -->

<script src="js/checkMember.js"></script>
<?php
include "include/footer.php";
?>


</html>