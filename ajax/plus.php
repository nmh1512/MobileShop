<?php
include "../admin/lib/database.php";
$db = new Database;
$customer_id = $_POST['customer_id'];

if(isset($_POST['id'])){
    $id_sanpham = $_POST['id'];
    
    $query = "UPDATE tb_giohang SET soluong = soluong + 1 WHERE id_cart = '$id_sanpham' AND customer_id = '$customer_id'";

    $update_row = $db -> update($query);


}

?>

