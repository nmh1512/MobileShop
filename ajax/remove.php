<?php
include "../admin/lib/database.php";
$db = new Database;
$customer_id = $_POST['customer_id'];

if(isset($_POST['id'])){
    $id_sanpham = $_POST['id'];
    $query = "DELETE FROM tb_giohang WHERE id_cart = '$id_sanpham' AND customer_id = '$customer_id'";
    $db->delete($query);
    $querycheck = "SELECT * FROM tb_giohang WHERE s_id = '$sId'";
    $db->select($querycheck);


}
