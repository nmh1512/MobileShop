<?php
include "../lib/database.php";
include "../lib/format.php";
$db = new Database;
$fm = new Format;
$output = '';
if (isset($_POST['text'])) {
    $text = $_POST['text'];
    if ($text == 'Sản phẩm bán chạy') {
        $query = "SELECT soluong_nhap, soluong, ten_sanpham, hinhanh_sanpham, giaban FROM tb_sanpham";
        $sql = $db->select($query);
        $arr = [];
        if ($sql) {
            while ($result = $sql->fetch_assoc()) {
                $sl_nhap = $result['soluong_nhap'];
                $kho = $result['soluong'];
                $img = $result['hinhanh_sanpham'];
                $name = $result['ten_sanpham'];
                $price = $result['giaban'];
                $x = $sl_nhap - $kho;
                if ($x > 0) {
                    $arr[$name] = [$x, $img, $price];
                }
            }
            arsort($arr);
            $i = 0;
            foreach ($arr as $id => $val) {
                $i++;
                $output .= '
            <div class="d-flex px-4 pt-3">
                                    <div class="col-5">
                                        <img class="w-100" src="uploads/' . $val[1] . '" alt="">
                                    </div>
                                    <div class="pt-4 col-7">
                                        <h5>' . $id . '</h5>
                                        <span>Giá bán: ' . $fm->format_currency($val[2]) . ' ₫</span>
                                    </div>
                                </div>
                                <hr class="mt-3 mb-0">
            ';
                if ($i == 5) {
                    break;
                }
            }
        } else {
            $output .= '
    <div class="d-flex px-4 pt-3">
                           <h5 id="data">Chưa có sản phẩm nào bán chạy</h5>
                           </div>
                        <hr class="mt-3 mb-0">
    ';
        }
    } else {
        $query = "SELECT soluong_nhap, soluong, ten_sanpham, hinhanh_sanpham, giaban FROM tb_sanpham WHERE soluong < 5";
        $sql = $db->select($query);

        if ($sql) {
            while ($result = $sql->fetch_assoc()) {
                $output .= '
            <div class="d-flex px-4 pt-3">
                                    <div class="col-5">
                                        <img class="w-100" src="uploads/' . $result['hinhanh_sanpham'] . '" alt="">
                                    </div>
                                    <div class="pt-4 col-7">
                                        <h5>' . $result['ten_sanpham'] . '</h5>
                                        <span>Giá bán: ' . $fm->format_currency($result['giaban']) . ' ₫</span>
                                    </div>
                                </div>
                                <hr class="mt-3 mb-0">
            ';
            }
        } else {
            $output .= '
        <div class="d-flex px-4 pt-3">
                               <h5 id="data">Chưa có sản phẩm nào sắp hết hàng</h5>
                            </div>
                            <hr class="mt-3 mb-0">
        ';
        }
    }

    echo $output;
}
