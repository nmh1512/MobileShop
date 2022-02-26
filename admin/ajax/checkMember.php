<?php
include "../lib/database.php";
$db = new Database;


if(isset($_POST['username'])){
    $query = "SELECT * FROM tb_admin WHERE user_admin='" . $_POST['username'] . "'";
    $result = $db->select($query);
    $count = mysqli_num_rows($result);
    if($count > 0) {
        echo "Tên tài khoản đã tồn tại";
    }
} 

