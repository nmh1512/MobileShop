<?php
include '../admin/lib/format.php';
include "../admin/lib/database.php";
$db = new Database;
$fm = new Format;
$output = '';


if (isset($_POST['pId'])) {
    $start = $_POST['pId'];
    $limit = $_POST['limit'];
} else {
    $limit = 20;
    $start = $limit;
}
if (isset($_POST['key'])) {
    $keyword = $_POST['key'];
    $arrKey = explode(" ", $keyword);
    $subQuery = '';
    foreach ($arrKey as $key) {
        if ($subQuery == '') {
            $subQuery .= "ten_sanpham LIKE '%" . $key . "%' ";
        } else {
            $subQuery .= " OR ten_sanpham LIKE '%" . $key . "%'";
        }
    }
    $subQuery1 =  '(' . $subQuery . ')' . " AND";
    $subQuery2 =  '(' . $subQuery . ')';
} else {
    $subQuery1 = '';
    $subQuery2 = '';
}
if (isset($_POST['idCat'])) {
    $id_danhmuc = $_POST['idCat'];
    if (isset($_POST['queryDate'])) {
        $queryDate = $_POST['queryDate'];
        $query = "SELECT * FROM tb_sanpham WHERE " . $subQuery1 . " id_danhmuc = '$id_danhmuc' " . $queryDate . " LIMIT $start, $limit";
 
    } elseif (isset($_POST['query'])) {
        $query = $_POST['query'];
        $query .= " ORDER BY giaban DESC LIMIT $start, $limit";
        
    } else {
        $query = "SELECT * FROM tb_sanpham WHERE " . $subQuery1 . " id_danhmuc = '$id_danhmuc' ORDER BY giaban DESC LIMIT $start, $limit";
    }
    $data = loadMoreCat($db, $query, $start, $output, $fm);
    echo $data;
} elseif (isset($_POST['idBrand'])) {
    $idBrand = $_POST['idBrand'];
    if (isset($_POST['queryDate'])) {
        $queryDate = $_POST['queryDate'];
        $query = "SELECT * FROM tb_sanpham WHERE " . $subQuery1 . " id_loaisanpham = '$idBrand' " . $queryDate . " LIMIT $start, $limit";
        $data = loadMoreBrand($db, $query, $start, $output, $fm);
    } elseif (isset($_POST['query'])) {
        $query = $_POST['query'];
        $query .= " ORDER BY giaban DESC LIMIT $start, $limit";
        $data = loadMoreBrand($db, $query, $start, $output, $fm);
    } else {
        $query = "SELECT * FROM tb_sanpham WHERE " . $subQuery1 . " id_loaisanpham = '$idBrand' ORDER BY giaban DESC LIMIT $start, $limit";
        $data = loadMoreBrand($db, $query, $start, $output, $fm);
    }
    echo $data;
} else {
    if (isset($_POST['queryDate'])) {
        $queryDate = $_POST['queryDate'];
        $query = "SELECT * FROM tb_sanpham WHERE " . $subQuery2 . $queryDate . " LIMIT $start, $limit";
    } elseif (isset($_POST['query'])) {
        $query = $_POST['query'];
        $query = "SELECT * FROM tb_sanpham WHERE " . $subQuery2 . $query . " ORDER BY giaban DESC LIMIT $start, $limit";
    } else {
        $query = "SELECT * FROM tb_sanpham WHERE " . $subQuery2 . " ORDER BY giaban DESC LIMIT $start, $limit";
    }
    $data = loadMoreCat($db, $query, $start, $output, $fm);

    echo $data;
}
function loadMoreCat($db, $query, $start, $output, $fm)
{
    $sql_select = $db->select($query);
    if (mysqli_num_rows($sql_select) > 0) {
        while ($result = mysqli_fetch_assoc($sql_select)) {
            $start++;
            $output .= '
        <div class="cartegory-content-item">
        <a href="' . $result['url_product'] . '">
            <img class="productImg" src="admin/uploads/' . $result['hinhanh_sanpham'] . '" alt="">
            <div class="info">
                <h6>' . $result['ten_sanpham'] . '</h6>
                <span class="price"><span>' . $fm->format_currency($result['giaban']) . '</span> ₫</sp>
            </div>
        </a>
    </div>
    ';
        }
        $output .= '<input hidden type="text" id="pId" value="' . $start . '"> ';
    }
    return $output;
}


function loadMoreBrand($db, $query, $start, $output, $fm)
{
    $sql_select = $db->select($query);
    if (mysqli_num_rows($sql_select) > 0) {
        while ($result = mysqli_fetch_assoc($sql_select)) {
            $start++;
            $output .= '
            <div class="cartegory-content-item">
            <a href="' . $result['url_product'] . '">
                <img class="productImg" src="admin/uploads/' . $result['hinhanh_sanpham'] . '" alt="">
                <div class="info info-product-brand text-left pt-3">
                    <h6 class="p-0 font-weight-bold">' . $result['ten_sanpham'] . '</h6>
                    <span class="price"><span> ' . $fm->format_currency($result['giaban'])  . ' </span> ₫</sp>
                </div>
                <ul style="font-size: 0.8rem;" class="info-product text-left p-0 mt-2">
                    <li class="first">Màn hình ' . $result['manhinh'] . ', Chip ' . $result['chip'] . '</li>
                    <li>RAM ' . $result['ram'] . ', ROM ' . $result['rom'] . '</li>
                    <li>Camera sau: ' . $result['cam_sau'] . '</li>
                    <li>Camera trước: ' . $result['cam_truoc'] . '</li>
                    <li>Pin ' . $result['pin'] . ', Sạc ' . $result['sac'] . '</li>
                </ul>
            </a>
        </div>
    ';
        }
        $output .= '<input hidden type="text" id="pId" value="' . $start . '"> ';
    }
    return $output;
}
