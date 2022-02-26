<?php
include "../admin/lib/database.php";
$db = new Database;

if(isset($_POST['username'])){
    $query = "SELECT * FROM tb_tk_khachhang WHERE taikhoan='" . $_POST['username'] . "'";
    $result = $db->select($query);
    $count = mysqli_num_rows($result);
    if($count > 0) {
        echo "Tên tài khoản đã tồn tại";
        echo "<script>$('#username').addClass('error');</script>";   
    }
} 
if (isset($_POST['email'])) {
    $query = "SELECT * FROM tb_tk_khachhang WHERE email='" . $_POST['email'] . "'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if($count > 0) {
        echo "Email này đã được đăng ký bởi tài khoản khác";   
        echo "<script>$('#email').addClass('error');</script>";  
    }
} 
if(isset($_POST['phone'])) {
    $query = "SELECT * FROM tb_tk_khachhang WHERE sdt='" . $_POST['phone'] . "'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);
    if($count > 0) {
        echo "Số điện thoại này đã được đăng ký bởi tài khoản khác";
        echo "<script>$('#phone').addClass('error');</script>";  
    }
}
