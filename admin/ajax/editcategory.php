<?php
include "../lib/database.php";
$db = new Database;

if (isset($_POST['idDanhmuc'])) {
    $idDanhmuc = $_POST['idDanhmuc'];
    $tenDanhmuc = $_POST['tenDanhmuc'];

    $query = "UPDATE tb_danhmuc SET ten_danhmuc = '$tenDanhmuc' WHERE id_danhmuc = '$idDanhmuc'";
    $db -> update($query);
} else {
    $idLoaisanpham = $_POST['idLoaisanpham'];
    $tenDanhmuc = $_POST['tenDanhmuc'];
    $tenLoaisanpham = $_POST['tenLoaisanpham'];

    $query = "UPDATE tb_danhmuc SET ten_danhmuc = '$tenDanhmuc', ten_loaisanpham = $tenLoaisanpham WHERE id_loaisanpham = '$idLoaisanpham";
    $db -> update($query);
}
