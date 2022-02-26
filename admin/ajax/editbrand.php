<?php
include "../lib/database.php";
$db = new Database;

if(isset($_POST['id'])){
    $idLoaisanpham = $_POST['id'];
    $tenDanhmuc = $_POST['tenDanhmuc'];
    $tenLoaisanpham = $_POST['tenLoaisanpham'];
    
    $query = "UPDATE tb_danhmuc SET ten_danhmuc = '$tenDanhmuc', ten_loaisanpham = $tenLoaisanpham WHERE id_loaisanpham = '$idLoaisanpham";
    $db -> update($query);
   
}
