<?php
include '../admin/lib/format.php';
include "../admin/lib/database.php";
$db = new Database;
$fm = new Format;

$query = "SELECT * FROM tb_sanpham WHERE ";
$limit = " LIMIT 20";


if (isset($_POST['key'])) {
    $keyword = $_POST['key'];
    if (isset($_POST['count'])) {
        $count = $_POST['count'];
    }
    $arrKey = explode(" ", $keyword);
    $subQuery = '';
    foreach ($arrKey as $key) {
        if ($subQuery == '') {
            $subQuery .= " ten_sanpham LIKE '%" . $key . "%' ";
        } else {
            $subQuery .= " OR ten_sanpham LIKE '%" . $key . "%' ";
        }
    }
    $query .=  '(' . $subQuery . ')';

    if (isset($_POST['idBrand'])) {
        $idBrand = $_POST['idBrand'];
        $idCat = $_POST['idCat'];
        if ($idCat == 73 || $idCat == 74) {
            $query .= " AND id_danhmuc = '$idCat'";
        } else {
            $query .= " AND id_loaisanpham = '$idBrand'";
        }
        $arr = filterSearch($query);
        $sql_select = $db->select($arr[0] . $limit);
        if ($sql_select) {
            $numRow = mysqli_num_rows($sql_select);
            if ($numRow > 0) {
                while ($result = mysqli_fetch_assoc($sql_select)) {
                    $fmPrice = $fm->format_currency($result['giaban']);
                    $arr[1] .= '
            <div class="cartegory-content-item">
            <a href="' . $result['url_product'] . '">
                <img class="productImg" src="admin/uploads/' . $result['hinhanh_sanpham'] . '" alt="">
                <div class="info">
                    <h6>' . $result['ten_sanpham'] . '</h6>
                    <span class="price"><span>' . $fmPrice . '</span> ₫</sp>
                </div>
            </a>
        </div>';
                }


                $sql_check = $db->select($arr[0]);
                $numRowCheck = mysqli_num_rows($sql_check);
                if ($numRow == $numRowCheck) {
                    $data = 0;
                } else {
                    $data = 1;
                }
                $arr[1] .= '<input type="text" hidden id="checkData" value="' . $data . '">';
            }
        } else {
            $arr[1] .= '<h6 id="check">Không có kết quả</h6>';
        }
        echo $arr[1];
    } elseif (isset($_POST['filterSearch'])) {
        $arr = filterSearch($query);
        $sql_select = $db->select($arr[0] . $limit);
        if ($sql_select) {
            $numRow = mysqli_num_rows($sql_select);

            if ($numRow > 0) {
                while ($result = mysqli_fetch_assoc($sql_select)) {
                    $fmPrice = $fm->format_currency($result['giaban']);
                    $arr[1] .= '
            <div class="cartegory-content-item">
            <a href="' . $result['url_product'] . '">
                <img class="productImg" src="admin/uploads/' . $result['hinhanh_sanpham'] . '" alt="">
                <div class="info">
                    <h6>' . $result['ten_sanpham'] . '</h6>
                    <span class="price"><span>' . $fmPrice . '</span> ₫</sp>
                </div>
            </a>
        </div>

        ';
                }
                $sql_check = $db->select($arr[0]);

                $numRowCheck = mysqli_num_rows($sql_check);
                if ($numRow == $numRowCheck) {
                    $data = 0;
                } else {
                    $data = 1;
                }
                $arr[1] .= '<input type="text" hidden id="checkData" value="' . $data . '">';
            }
        } else {
            $arr[1] .= '<h6 id="check">Không có kết quả</h6>';
        }
        echo $arr[1];
    } else {
        $arr = [
            '45' => 'Tai nghe',
            '46' => 'Cáp, sạc',
            '47' => 'Ốp lưng',
            '48' => 'Dán màn hình',
            '49' => 'Sạc dự phòng'
        ];

        if (isset($_POST['brand'])) {
            $brand = $_POST['brand'];
            if ($brand == 'Điện thoại') {
                $query .=  " AND id_danhmuc = 73";
                $show = showProduct($query, $db, $fm, $limit, $count);
            } elseif ($brand == 'Máy tính bảng') {
                $query .=  " AND id_danhmuc = 74";
                $show = showProduct($query, $db, $fm, $limit, $count);
            } else {
                foreach ($arr as $key => $value) {
                    if ($brand == $value) {
                        $query .= " AND id_loaisanpham = $key";
                        $show = showProduct($query, $db, $fm, $limit, $count);
                    }
                }
            }
            echo $show;
        }
    }
} else {
    // -----------------------Brand----------------------
    if (isset($_POST['idBrand'])) {
        $id_loaisanpham = $_POST['idBrand'];
        $query .= "id_loaisanpham = '$id_loaisanpham' ";
        $arr = filter($query);
        $sql_select = $db->select($arr[0] . $limit);
        if ($sql_select) {
            $numRow = mysqli_num_rows($sql_select);
            if ($numRow > 0) {
                while ($result = mysqli_fetch_assoc($sql_select)) {
                    $fmPrice = $fm->format_currency($result['giaban']);
                    $arr[1] .= '
                <div class="cartegory-content-item">
                    <a href="' . $result['url_product'] . '">
                        <img class="productImg" src="admin/uploads/' . $result['hinhanh_sanpham'] . '" alt="">
                        <div class="info info-product-brand text-left pt-3">
                            <h6 class="p-0 font-weight-bold">' . $result['ten_sanpham'] . '</h6>
                            <span class="price"><span> ' . $fmPrice . ' </span> ₫</sp>
                        </div>
                        <ul style="font-size: 0.8rem;" class="info-product text-left p-0 mt-2">
                            <li class="first">Màn hình ' . $result['manhinh'] . ', Chip ' . $result['chip'] . '</li>
                            <li>RAM ' . $result['ram'] . ', ROM ' . $result['rom'] . '</li>
                            <li>Camera sau: ' . $result['cam_sau'] . '</li>
                            <li>Camera trước: ' . $result['cam_truoc'] . '</li>
                            <li>Pin ' . $result['pin'] . ', Sạc ' . $result['sac'] . '</li>
                        </ul>
                    </a>
                </div>';
                }
                $sql_check = $db->select($arr[0]);

                $numRowCheck = mysqli_num_rows($sql_check);
                if ($numRow == $numRowCheck) {
                    $data = 0;
                } else {
                    $data = 1;
                }
                $arr[1] .= '<input type="text" hidden id="checkData" value="' . $data . '">';
            }
        } else {
            $arr[1] .= '<h6 id="check">Không có kết quả</h6>';
        }

        echo $arr[1];
    }




    // ----------------Cartegory---------------------
    if (isset($_POST['idCat'])) {
        $id_danhmuc = $_POST['idCat'];
        $query .= "id_danhmuc = '$id_danhmuc' ";
        $arr = filter($query);
        $sql_select = $db->select($arr[0] . $limit);
        if ($sql_select) {
            $numRow = mysqli_num_rows($sql_select);
            if ($numRow > 0) {
                while ($result = mysqli_fetch_assoc($sql_select)) {
                    $fmPrice = $fm->format_currency($result['giaban']);
                    $arr[1] .= '
                <div class="cartegory-content-item">
                <a href="' . $result['url_product'] . '">
                    <img class="productImg" src="admin/uploads/' . $result['hinhanh_sanpham'] . '" alt="">
                    <div class="info">
                        <h6>' . $result['ten_sanpham'] . '</h6>
                        <span class="price"><span>' . $fmPrice . '</span> ₫</sp>
                    </div>
                </a>
            </div>';
                }
                $sql_check = $db->select($arr[0]);

                $numRowCheck = mysqli_num_rows($sql_check);
                if ($numRow == $numRowCheck) {
                    $data = 0;
                } else {
                    $data = 1;
                }
                $arr[1] .= '<input type="text" hidden id="checkData" value="' . $data . '">';
            }
        } else {
            $arr[1] .= '<h6 id="check">Không có kết quả</h6>';
        }
        echo $arr[1];
    }
}

function showProduct($query, $db, $fm, $limit, $count)
{
    $output = '';
    $sql_select = $db->select($query . $limit);

    $output .= '
   <div class="cartegory-list-top sime-box1 py-1 px-1">
        <div class="dropdown select-box">
            <div class="dropdown">
                <a href="" class="dropdown-toggle" type="button" id="selectText" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Giá</a>
                    <div class="dropdown-menu price-filter pb-0" aria-labelledby="dropdownMenuButton">
                        <div id="list-search" class="container">
                            <div class="pb-2">';
    if (strpos($query, 73) !== false || strpos($query, 74) !== false) {
        $output .= '
            <ul class="option text-center p-0 pt-1 pb-2 m-2">
                Dưới 5 triệu
            </ul>
            <ul class="option text-center p-0 pt-1 pb-2 m-2">
                Từ 5 đến 10 triệu
            </ul>
            <ul class="option text-center p-0 pt-1 pb-2 m-2">
                Từ 10 đến 15 triệu
            </ul>
            <ul class="option text-center p-0 pt-1 pb-2 m-2">
                Từ 15 đến 20 triệu
            </ul>
            <ul class="option text-center p-0 pt-1 pb-2 m-2">
                Trên 20 triệu
            </ul>
            ';
    } else {
        $output .= '
            <ul class="option text-center p-0 pt-1 pb-2 m-2">Dưới 100.000₫</ul>
            <ul class="option text-center p-0 pt-1 pb-2 m-2">Từ 100.000₫ - 300.000₫</ul>
            <ul class="option text-center p-0 pt-1 pb-2 m-2">Từ 300.000₫ - 500.000₫</ul>
            <ul class="option text-center p-0 pt-1 pb-2 m-2">Trên 500.000₫</ul> 
            ';
    }

    $output .= '</div></div>
                </div>
                </div>
                </div>
                <div class="dropdown select-box">
                <div class="dropdown">
                    <a href="" class="dropdown-toggle" type="button" id="selectText1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sắp xếp theo</a>
                    <div id="list-search" class="container price-filter1 dropdown-menu pb-0" aria-labelledby="dropdownMenuButton">
                        <div class="container">
                            <div class="pb-2">
                                <ul class="option1 text-center p-0 pt-1 pb-2 m-2">Giá thấp đến cao</ul>
                                <ul class="option1 text-center p-0 pt-1 pb-2 m-2">Giá cao đến thấp</ul>
                                <ul class="option1 text-center p-0 pt-1 pb-2 m-2">Sản phẩm mới</ul>
                                <ul class="option1 text-center p-0 pt-1 pb-2 m-2">Sản phẩm cũ</ul>
                            </div>
                        </div>
                   
                            </div>
                        </div>
                    </div>
                </div>
    <div class="cartegory-list-content">

    ';
    if ($sql_select) {
        $numRow = mysqli_num_rows($sql_select);

        if ($numRow > 0) {
            while ($result = mysqli_fetch_assoc($sql_select)) {
                $id_danhmuc = $result['id_danhmuc'];
                $id_loaisanpham = $result['id_loaisanpham'];
                $fmPrice = $fm->format_currency($result['giaban']);
                $output .= '
            <div class="cartegory-content-item">     
                <a href="' . $result['url_product'] . '">
                        <img class="productImg" src="admin/uploads/' . $result['hinhanh_sanpham'] . '" alt="">
                        <div class="info">
                            <h6>' . $result['ten_sanpham'] . '</h6>
                            <span class="price"><span>' . $fmPrice . '</span> ₫</sp>
                        </div>
                </a>
            </div>';
            }
        }
    }
    $output .= '</div>
    <input id="idCat" type="text" hidden value="' . $id_danhmuc . '">
    <input id="idBrand" type="text" hidden value="' . $id_loaisanpham . '">
<script src="js/filter.js"></script>
';
    $sql_check = $db->select($query);

    $numRowCheck = mysqli_num_rows($sql_check);
    if ($numRow == $numRowCheck) {
        $data = 0;
    } else {
        $data = 1;
    }
    $output .= '<input data-id="' . $count . '" type="text" hidden id="checkData" value="' . $data . '">';
    return $output;
}

function filterSearch($query)
{
    $output = '';
    //Kiểm tra lọc giá sản phẩm
    if (isset($_POST['text'])) {
        $text = $_POST['text'];
        $pos = strpos($text, '₫');
        if ($pos !== false) {
            $arr = [
                ' AND giaban <= 100000' => 'Dưới 100.000₫',
                ' AND giaban BETWEEN 100000 AND 300000' => 'Từ 100.000₫ - 300.000₫',
                ' AND giaban BETWEEN 300000 AND 500000' => 'Từ 300.000₫ - 500.000₫',
                ' AND giaban >= 500000' => 'Trên 500.000₫',
            ];
            if (isset($_POST['queryDate'])) {
                $queryDate = $_POST['queryDate'];
                foreach ($arr as $key => $value) {
                    if ($text == $value) {
                        $queryPrice = $key;
                    }
                }
                $query .=  $queryPrice;
                $output .= '<input hidden id="queryDelete" type="text" value="' . $query . '">';
                $output .= '<input hidden id="queryDateDelete" type="text" value="' . $queryDate . '">';
                $query .=  $queryDate;
            } else {
                $queryOrder = " ORDER BY id_danhmuc ASC, giaban DESC";
                foreach ($arr as $key => $value) {
                    if ($text == $value) {
                        $query .= $key;
                    }
                }
                $output .= '<input hidden id="queryDelete" type="text" value="' . $query . '">';
                $query .= $queryOrder;
            }
        } else {
            //Nếu tồn tại lọc sắp xếp trước đó thì sẽ nối thêm query
            if (isset($_POST['queryDate'])) {
                $queryDate = $_POST['queryDate'];
                if (explode(' ', trim($text))[0] == 'Từ') {
                    $firstPrice = explode(' ', trim($text))[1] . '000000';
                    $secondPrice = explode(' ', trim($text))[3] . '000000';
                    $queryPrice = " AND giaban BETWEEN $firstPrice AND $secondPrice ";
                } elseif (explode(' ', trim($text))[0] == 'Trên') {
                    $giaban = 20000000;
                    $queryPrice = " AND giaban >= $giaban ";
                } else {
                    $giaban = 5000000;
                    $queryPrice = " AND giaban <= $giaban ";
                }
                $query .=  $queryPrice;
                $output .= '<input hidden id="queryDelete" type="text" value="' . $query . '">';
                //Đưa ra màn hình 1 input hidden chứa query lọc giá để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp        
                $output .= '<input hidden id="queryDateDelete" type="text" value="' . $queryDate . '">';
                //Đưa ra màn hình 1 input hidden chứa query sắp xếp để có thể tái sử dụng      
                $query .=  $queryDate;
                // Nối query
            } else {
                //Ko có lọc sắp xếp trước đó thì chạy query bình thường
                $queryOrder = " ORDER BY id_danhmuc ASC, giaban DESC";
                if (explode(' ', trim($text))[0] == 'Từ') {
                    $firstPrice = explode(' ', trim($text))[1] . '000000';
                    $secondPrice = explode(' ', trim($text))[3] . '000000';
                    $query .= " AND giaban BETWEEN $firstPrice AND $secondPrice ";
                } elseif (explode(' ', trim($text))[0] == 'Trên') {
                    $giaban = 20000000;
                    $query .= " AND giaban >= $giaban ";
                } else {
                    $giaban = 5000000;
                    $query .= " AND giaban <= $giaban ";
                }
                $output .= '<input hidden id="queryDelete" type="text" value="' . $query . '">';
                //Đưa ra màn hình 1 input hidden chứa query lọc giá để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp
                $query .= $queryOrder;
            }
        }
    }
    // Kiểm tra lọc sắp xếp
    if (isset($_POST['text1'])) {
        $text = $_POST['text1'];
        //Nếu tồn tại lọc giá trước đó thì sẽ nối thêm query
        $arr = [
            ' ORDER BY giaban' => 'Giá thấp đến cao',
            ' ORDER BY giaban DESC' => 'Giá cao đến thấp',
            ' ORDER BY ngay_them DESC' => 'Sản phẩm mới',
            ' ORDER BY ngay_them' => 'Sản phẩm cũ'
        ];
        if (isset($_POST['query'])) {
            $query = $_POST['query'];
            foreach ($arr as $key => $value) {
                if ($text == $value) {
                    $queryEnd = $key;
                }
            }
            $reuseQuery = $_POST['query'];
            //Đưa ra màn hình 1 input hidden chứa query lọc giá để có thể tái sử dụng
            $output .= '<input hidden id="queryDelete" type="text" value="' . $reuseQuery . '">';
            //Đưa ra màn hình 1 input hidden chứa query sắp xếp để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp
            $output .= '<input hidden id="queryDateDelete" type="text" value="' . $queryEnd . '">';
            $query .= $queryEnd;
        } else {
            //Ko có lọc giá trước đó thì chạy query bình thường
            foreach ($arr as $key => $value) {
                if ($text == $value) {
                    $queryEnd = $key;
                }
            }
            $output .= '<input hidden id="queryDateDelete" type="text" value="' . $queryEnd . '">';
            //Đưa ra màn hình 1 input hidden chứa query lọc sắp xếp để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp
            $query .= $queryEnd;
        }
    }
    //Bỏ chọn lọc giá
    if (isset($_POST['removePrice'])) {
        //Nếu tồn tại lọc sắp xếp trước đó thì sẽ nối thêm query
        if (isset($_POST['queryDate'])) {
            $queryEnd = $_POST['queryDate'];
            $query .= $queryEnd;
            //Đưa ra màn hình 1 input hidden chứa query sắp xếp để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp
            $output .= '<input hidden id="queryDateDelete" type="text" value="' . $queryEnd . '">';
        } else {
            //Ko có lọc sắp xếp trước đó thì nối thêm order by
            $query .= " ORDER BY id_danhmuc ASC, giaban DESC";
        }
    }
    //Bỏ chọn sắp xếp
    if (isset($_POST['removePrice1'])) {
        //Nếu tồn tại lọc giá trước đó thì sẽ nối thêm query
        if (isset($_POST['query'])) {
            $queryPrice = $_POST['query'];
            $query = $queryPrice . "  ORDER BY id_danhmuc ASC, giaban DESC";
            //Đưa ra màn hình 1 input hidden chứa query lọc giá để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp
            $output .= '<input hidden id="queryDelete" type="text" value="' . $queryPrice . '">';
        } else {
            //Ko có lọc giá trước đó thì nối thêm order by
            $query .= " ORDER BY id_danhmuc ASC, giaban DESC";
        }
    }
    return array($query, $output);
}




function filter($query)
{
    $output = '';

    // Kiểm tra lọc giá sản phẩm
    if (isset($_POST['text'])) {
        $text = $_POST['text'];
        //Nếu tồn tại lọc sắp xếp trước đó thì sẽ nối thêm query
        if (isset($_POST['queryDate'])) {
            $queryDate = $_POST['queryDate'];
            if (explode(' ', trim($text))[0] == 'Từ') {
                $firstPrice = explode(' ', trim($text))[1] . '000000';
                $secondPrice = explode(' ', trim($text))[3] . '000000';
                $queryPrice = "AND giaban BETWEEN $firstPrice AND $secondPrice ";
            } elseif (explode(' ', trim($text))[0] == 'Trên') {
                $giaban = 20000000;
                $queryPrice = "AND giaban >= $giaban ";
            } else {
                $giaban = 5000000;
                $queryPrice = "AND giaban <= $giaban ";
            }
            $query .=  $queryPrice;
            $output .= '<input hidden id="queryDelete" type="text" value="' . $query . '">';
            //Đưa ra màn hình 1 input hidden chứa query lọc giá để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp        
            $output .= '<input hidden id="queryDateDelete" type="text" value="' . $queryDate . '">';
            //Đưa ra màn hình 1 input hidden chứa query sắp xếp để có thể tái sử dụng      
            $query .=  $queryDate;
            // Nối query
        } else {
            //Ko có lọc sắp xếp trước đó thì chạy query bình thường
            $queryOrder = " ORDER BY giaban DESC";
            if (explode(' ', trim($text))[0] == 'Từ') {
                $firstPrice = explode(' ', trim($text))[1] . '000000';
                $secondPrice = explode(' ', trim($text))[3] . '000000';
                $query .= "AND giaban BETWEEN $firstPrice AND $secondPrice ";
                $queryPrice = "AND giaban BETWEEN $firstPrice AND $secondPrice ";
            } elseif (explode(' ', trim($text))[0] == 'Trên') {
                $giaban = 20000000;
                $query .= "AND giaban >= $giaban ";
                $queryPrice = "AND giaban >= $giaban ";
            } else {
                $giaban = 5000000;
                $query .= "AND giaban <= $giaban ";
                $queryPrice = "AND giaban <= $giaban ";
            }
            $output .= '<input hidden id="queryDelete" type="text" value="' . $query . '">';
            //Đưa ra màn hình 1 input hidden chứa query lọc giá để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp
            $query .= $queryOrder;
        }
    }
    // //Kiểm tra lọc sắp xếp
    if (isset($_POST['text1'])) {
        $text = $_POST['text1'];
        //Nếu tồn tại lọc giá trước đó thì sẽ nối thêm query
        if (isset($_POST['query'])) {
            $query = $_POST['query'];
            if ($text == "Giá thấp đến cao") {
                $queryEnd = "ORDER BY giaban";
            } elseif ($text == 'Giá cao đến thấp') {
                $queryEnd = "ORDER BY giaban DESC";
            } elseif ($text == 'Sản phẩm mới') {
                $queryEnd = "ORDER BY ngay_them DESC";
            } else {
                $queryEnd = "ORDER BY ngay_them";
            }
            $reuseQuery = $_POST['query'];
            //Đưa ra màn hình 1 input hidden chứa query lọc giá để có thể tái sử dụng
            $output .= '<input hidden id="queryDelete" type="text" value="' . $reuseQuery . '">';
            //Đưa ra màn hình 1 input hidden chứa query sắp xếp để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp
            $output .= '<input hidden id="queryDateDelete" type="text" value="' . $queryEnd . '">';
            $query .= $queryEnd;
        } else {
            //Ko có lọc giá trước đó thì chạy query bình thường
            if ($text == 'Giá thấp đến cao') {
                $queryEnd = "ORDER BY giaban ASC";
            } elseif ($text == 'Giá cao đến thấp') {
                $queryEnd = "ORDER BY giaban DESC";
            } elseif ($text == 'Sản phẩm mới') {
                $queryEnd = "ORDER BY ngay_them DESC";
            } else {
                $queryEnd = "ORDER BY ngay_them ASC";
            }
            $output .= '<input hidden id="queryDateDelete" type="text" value="' . $queryEnd . '">';
            //Đưa ra màn hình 1 input hidden chứa query lọc sắp xếp để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp
            $query .= $queryEnd;
        }
    }
    // Bỏ chọn lọc giá
    if (isset($_POST['removePrice'])) {
        //Nếu tồn tại lọc sắp xếp trước đó thì sẽ nối thêm query
        if (isset($_POST['queryDate'])) {
            $queryEnd = $_POST['queryDate'];
            $query .= $queryEnd;
            //Đưa ra màn hình 1 input hidden chứa query sắp xếp để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp
            $output .= '<input hidden id="queryDateDelete" type="text" value="' . $queryEnd . '">';
        } else {
            //Ko có lọc sắp xếp trước đó thì nối thêm order by
            $query .= " ORDER BY giaban DESC";
        }
    }
    //Bỏ chọn sắp xếp
    if (isset($_POST['removePrice1'])) {
        //Nếu tồn tại lọc giá trước đó thì sẽ nối thêm query
        if (isset($_POST['query'])) {
            $queryPrice = $_POST['query'];
            $query = $queryPrice . " ORDER BY giaban DESC";
            //Đưa ra màn hình 1 input hidden chứa query lọc giá để có thể lấy giá trị nếu lọc giá tồn tại trước lọc sắp xếp
            $output .= '<input hidden id="queryDelete" type="text" value="' . $queryPrice . '">';
        } else {
            //Ko có lọc giá trước đó thì nối thêm order by
            $query .= " ORDER BY giaban DESC";
        }
    }
    return array($query, $output);
}
