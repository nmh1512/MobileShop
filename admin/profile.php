<?php
include "include/header.php";


?>
<?php
$id = Session::get('id_admin');
$level = Session::get('level');
$arr = [
    0 => 'Admin',
    1 => 'Quản lý',
    2 => 'Nhân viên',
    3 => 'Cộng tác viên',
    4 => 'Nhà văn'
];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $updateMember = $admin->updateMember($_POST, $id);
}
$info = $admin->showProfile($id);
?>
<div style="padding: 0 25px 20px 0;">
    <a style="float: right;" class="btn btn-secondary" href="index"><i class="fas fa-undo-alt"></i> Quay lại</a>
</div>

<div class="productlist-wrapper" style="padding: 10px;">
    <?php
    if ($info) {
        $result = $info->fetch_assoc();
    ?>
        <h1>Hồ sơ cá nhân <?php echo $result['user_admin'] ?> - <?php foreach($arr as $key => $val){if($key == $level) echo $val;} ?></h1>
        <?php
        if (isset($updateMember)) {
            echo $updateMember;
        }
        ?>
        <form action="profile" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="">Họ tên</label>
                    <input require name="nameMember" type="text" class="form-control" id="" value="<?php echo $result['name_admin'] ?>">
                </div>

                <div class="col-md-6">
                    <label for="">Ngày sinh</label>
                    <input require name="birthday" type="date" class="form-control" id="" value="<?php echo $result['ngay_sinh'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="">Giới tính</label>
                    <select name="sex" class="form-control">
                        <?php if ($result['gioi_tinh'] == 0) {
                        ?>
                            <option selected value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>
                        <?php
                        } elseif ($result['gioi_tinh'] == 1) {
                        ?>
                            <option value="0">Nam</option>
                            <option selected value="1">Nữ</option>
                            <option value="2">Khác</option>
                        <?php
                        } else { ?>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option selected value="2">Khác</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Địa chỉ</label></br>
                    <input require name="address" type="text" class="form-control" id="" value="<?php echo $result['dia_chi'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="">Số điện thoại</label>
                    <input name="phone" type="tel" pattern="[0-9]{10}" class="form-control" id="" value="<?php echo '0' . $result['sdt_admin'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="">Email</label>
                    <input name="email" type="email" class="form-control" id="" value="<?php echo $result['email_admin'] ?>">
                </div>
            </div>

            <button id="submit" name="submit" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Lưu</button>
        </form>
    <?php
    } ?>
</div>


</div>
<!-- End of Content Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include "include/footer.php";
?>


</html>