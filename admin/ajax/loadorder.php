<?php
include "../lib/format.php";
$fm = new Format;
$connection = mysqli_connect('localhost', 'root', '', 'datn_mobile');

//Danh sách trạng thái:
 //0 => Chờ xác nhận
 //1 => Đã xác nhận
 //2 => Đã hủy bởi khách hàng
 //3 => Đã hủy bởi người bán
 //4 => Đang giao hàng
 //5 => Đã giao hàng
 //6 => Đã hoàn thành
//Kiểm tra đơn hàng bị hủy
if (isset($_POST['removeId'])) {
    $id_donhang = $_POST['removeId'];
    $get_status = mysqli_query($connection, "SELECT * FROM tb_thongtin_donhang WHERE id = '$id_donhang'");
    $result = $get_status->fetch_assoc();

    if ($result['trangthai'] == 1) {
        $queryQ = '';
        $orders = updateQuantity($connection, $id_donhang);
        foreach ($orders as $id => $quantity) {
            $queryQ .= "UPDATE tb_sanpham SET soluong = soluong + $quantity WHERE id_sanpham = '$id'; ";
        }
        $query = $queryQ . "UPDATE tb_thongtin_donhang SET trangthai = 3 WHERE id = '$id_donhang'";
        $sql_select = mysqli_multi_query($connection, $query);
    } else {
        $sql_select = mysqli_query($connection, "UPDATE tb_thongtin_donhang SET trangthai = 3 WHERE id = '$id_donhang'");
    }
} elseif (isset($_POST['confirmId'])) {

    $id_donhang = $_POST['confirmId'];
    $queryQ = '';
    $orders = updateQuantity($connection, $id_donhang);
    foreach ($orders as $id => $quantity) {
        $queryQ = "UPDATE tb_sanpham SET soluong = soluong - $quantity WHERE id_sanpham = '$id' AND soluong > 0; ";
        mysqli_query($connection, $queryQ);
    }
    $query = "UPDATE tb_thongtin_donhang SET trangthai = 1 WHERE id = '$id_donhang'";
    mysqli_query($connection, $query);
    echo $query;
} elseif (isset($_POST['shipingId'])) {

    $id = $_POST['shipingId'];
    mysqli_query($connection, "UPDATE tb_thongtin_donhang SET trangthai = 4 WHERE id = '$id'");
} elseif (isset($_POST['complete'])) {
    $id = $_POST['complete'];
    $orders = [];
    $get_price = mysqli_query($connection, "SELECT tb_donhang.*, tb_sanpham.giagoc FROM tb_donhang INNER JOIN tb_sanpham ON tb_donhang.id_sanpham = tb_sanpham.id_sanpham WHERE tb_donhang.id_donhang = '$id'");
    if (mysqli_num_rows($get_price) > 0) {
        $i = 0;
        while ($result = $get_price->fetch_assoc()) {
            $orders[$i] = [
                'soluong' => $result['so_luong'],
                'giagoc' => $result['giagoc'],
                'giaban' => $result['giaban']
            ];
            $i++;
        };
    }
    $sales = 0;
    $price0 = 0;
    foreach ($orders as $value) {
        $sales += $value['giaban'];
        $price0 += ($value['giagoc'] * $value['soluong']);
    }
    $profit = $sales - $price0;
    mysqli_query($connection, "INSERT INTO tb_thongke(id_donhang, doanh_thu, loi_nhuan) VALUES ('$id','$sales', '$profit')");
    mysqli_query($connection, "UPDATE tb_thongtin_donhang SET trangthai = 6 WHERE id = '$id'");
    // mysqli_multi_query($connection, "INSERT INTO tb_thongke(id_donhang, doanh_thu, loi_nhuan) VALUES ('$id','$sales', '$profit'); UPDATE tb_thongtin_donhang SET trangthai = 6 WHERE id = '$id'");
} else {
    $arr = [
        0 => 'Chờ xác nhận',
        1 => 'Đã xác nhận',
        2 => 'Đã hủy',
        3 => 'Đã hủy bởi khách hàng',
        4 => 'Đã hủy bởi người bán',
        5 => 'Đang giao hàng',
        6 => 'Đã giao hàng',
        7 => 'Đã hoàn thành',
    ];
    if (isset($_POST['display'])) {
        $display = $_POST['display'];
        if ($display == 'Tất cả đơn hàng') {
            $query = "ORDER BY tb_thongtin_donhang.ngay_dat DESC, trangthai ASC";
            $str = 'Chưa có đơn hàng nào';
            echo loadOrder($connection, $query, $fm, $str);
        } else {
            foreach ($arr as $key => $value) {
                if ($display == $value) {
                    switch ($key) {
                        case 0:
                            $query = "WHERE trangthai=0 ORDER BY tb_thongtin_donhang.ngay_dat DESC";
                            $str = 'Chưa có đơn hàng nào chờ xác nhận';
                            break;
                        case 1:
                            $query = "WHERE trangthai=1 ORDER BY tb_thongtin_donhang.ngay_dat DESC";
                            $str = 'Chưa có đơn hàng nào được xác nhận';
                            break;
                        case 2:
                            $query = "WHERE trangthai=2 OR trangthai=3 ORDER BY tb_thongtin_donhang.ngay_dat DESC";
                            $str = 'Chưa có đơn hàng nào được bị hủy';
                            break;
                        case 3:
                            $query = "WHERE trangthai=2 ORDER BY tb_thongtin_donhang.ngay_dat DESC";
                            $str = 'Chưa có đơn hàng nào được bị hủy bởi khách hàng';
                            break;
                        case 4:
                            $query = "WHERE trangthai=3 ORDER BY tb_thongtin_donhang.ngay_dat DESC";
                            $str = 'Chưa có đơn hàng nào được bị hủy bởi người bán';
                            break;
                        case 5:
                            $query = "WHERE trangthai=4 ORDER BY tb_thongtin_donhang.ngay_dat DESC";
                            $str = 'Chưa có đơn hàng nào đang giao';
                            break;
                        case 6:
                            $query = "WHERE trangthai=5 ORDER BY tb_thongtin_donhang.ngay_dat DESC";
                            $str = 'Chưa có đơn hàng nào đã giao';
                            break;
                        case 7:
                            $query = "WHERE trangthai=6 ORDER BY tb_thongtin_donhang.ngay_dat DESC";
                            $str = 'Chưa có đơn hàng nào đã hoàn thành';
                            break;
                    }
                }
            }
            $show = loadOrder($connection, $query, $fm, $str);

            echo $show;
        }
    }
}
function loadOrder($connection, $queryX, $fm, $str)
{
    $query = "SELECT tb_thongtin_donhang.*, tb_tk_khachhang.taikhoan FROM tb_thongtin_donhang INNER JOIN tb_tk_khachhang ON tb_thongtin_donhang.customer_id = tb_tk_khachhang.id ";
    $output = '';
    $alert = '';
    $query .= $queryX;
    $td = '';
    $i = 0;
    $sql_select = mysqli_query($connection, $query);
    $output .=
        '

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>STT</th>
<th>Mã đơn hàng</th>
<th>Sản phẩm</th>
<th>Tổng thanh toán</th>
<th>Ngày đặt</th>
<th>Khách hàng</th>
<th>Trạng thái</th>
<th>Action</th>
</tr>
</thead>
<tbody>
';

    if (mysqli_num_rows($sql_select) > 0) {
        while ($result = mysqli_fetch_assoc($sql_select)) {
            $i++;
            if ($result['taikhoan']) {
                $taikhoan = $result['taikhoan'];
            } else {
                $taikhoan = 'Guest';
            }
            $output .= '
<tr>
<td>' . $i . '</td>
<td id=' . $result['id'] . '>' . $result['ma_donhang'] . '<br>
<a href="" data-toggle="modal" data-target="#id' . $result['id'] . '">Xem chi tiết</a>
<div class="modal fade bd-example-modal-lg" id="id' . $result['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg ">
<div class="modal-content">
  <div class="modal-header">
    <h3 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng ' . $result['ma_donhang'] . '</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div>
      <table class="w-100">
        <thead>
          <th>Mã sản phẩm</th>
          <th>Sản phẩm</th>
          <th>Màu</th>
          <th>Số lượng</th>
          <th>Đơn giá</th>
        </thead>
        <tbody>

';
            $id_donhang = $result['id'];
            $ma_donhang = $result['ma_donhang'];
            if ($result['trangthai'] == 0) {
                $alert = 'Chờ xác nhận';
                $td = '
        <button type="btn" class="w-100 btn btn-primary mb-2" onclick="confirmOrder(' . $id_donhang . ')"><i class="fa-solid fa-check"></i> Xác nhận</button>
<a type="btn" class="w-100 btn btn-danger" data-toggle="modal" data-target="#remove' . $id_donhang . '">
<i class="fas fa-trash-alt"></i> Hủy đơn hàng
</a>
<div class="modal fade" id="remove' . $id_donhang . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-body">
            <div class="text-center mx-3 mt-3 mb-4" style="line-height: 1.2rem;">
                <span class="font-weight-bold">Bạn có muốn hủy đơn hàng ' . $ma_donhang . ' ?</span>

            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="col-5 btn btn-secondary" data-dismiss="modal">Trở lại</button>
                <button onclick="removeOrder(' . $result['id'] . ')" data-dismiss="modal" type="button" class="col-5 btn btn-danger">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
</div>
';
            } elseif ($result['trangthai'] == 1) {
                $alert = 'Đã xác nhận';
                $td = '
<button onclick="shiping(' . $result['id'] . ')" type="button" class="btn btn-primary mb-2 w-100"><i class="fas fa-shipping-fast"></i> Giao hàng</button>
<a href="" data-toggle="modal" type="button" class="btn btn-danger w-100" data-target="#remove' . $id_donhang . '">
<i class="fas fa-trash-alt"></i> Hủy đơn hàng
</a>
<div class="modal fade" id="remove' . $id_donhang . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-body">
            <div class="text-center mx-3 mt-3 mb-4" style="line-height: 1.2rem;"">
                <span class="font-weight-bold">Bạn có muốn hủy đơn hàng ' . $ma_donhang . ' ?</span>

            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="col-5 btn btn-secondary" data-dismiss="modal">Trở lại</button>
                <button onclick="removeOrder(' . $result['id'] . ')" data-dismiss="modal" type="button" class="col-5 btn btn-danger">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
</div>
';
            } elseif ($result['trangthai'] == 2) {
                $alert = '<span style="color: red;">Đã hủy bởi khách hàng</span>
';
                $td = '';
            } elseif ($result['trangthai'] == 3) {
                $alert = '<span style="color: red;">Đã hủy bởi người bán</span>';
                $td = '';
            } elseif ($result['trangthai'] == 4) {
                $alert = 'Đang giao hàng';
                $td = '
                <a href="" data-toggle="modal" type="button" class="btn btn-primary w-100" data-target="#complete' . $id_donhang . '">
                <i class="fa-solid fa-check"></i> Hoàn thành đơn hàng
                </a>
                <div class="modal fade" id="complete' . $id_donhang . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                
                        <div class="modal-body">
                            <div class="text-center mx-3 mt-3 mb-4" style="line-height: 1.2rem;"">
                                <span class="font-weight-bold">Xác nhận đơn hàng ' . $ma_donhang . ' được giao thành công ?</span>
                
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="col-5 btn btn-secondary" data-dismiss="modal">Trở lại</button>
                                <button onclick="complete(' . $result['id'] . ')" data-dismiss="modal" type="button" class="col-5 btn btn-danger">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div> 
                ';
               
            } elseif ($result['trangthai'] == 5) {
                $alert = 'Đơn hàng được giao thành công';
                $td = '<button type="btn" class="w-100 btn btn-primary mb-2" onclick="complete(' . $id_donhang . ')"><i class="fa-solid fa-check"></i> Hoàn thành đơn hàng</button>';
            } else {
                $alert = 'Đã hoàn thành';
                $td = '';
            }
            $sql_select_order = mysqli_query($connection, "SELECT tb_donhang.*, tb_sanpham.ma_sanpham FROM tb_donhang INNER JOIN tb_sanpham ON tb_donhang.ten_sanpham = tb_sanpham.ten_sanpham
WHERE id_donhang = '$id_donhang'");
            $subTotal = 0;
            while ($resultProduct =  mysqli_fetch_assoc($sql_select_order)) {
                $price = $resultProduct['giaban'] / $resultProduct['so_luong'];

                $output .= '
       
<tr>
<td>' . $resultProduct['ma_sanpham'] . '</td>
<td>
  <div class="d-flex my-1">
    <img style="width: 100px;" src="uploads/' . $resultProduct['hinhanh_sanpham'] . '" alt="">
    <div class="ml-2">
      <div>' . $resultProduct['ten_sanpham'] . '</div>
    </div>
  </div>
</td>
<td>' . $resultProduct['mau_sanpham'] . '</td>
<td>' . $resultProduct['so_luong'] . '</td>
<td>' . $fm->format_currency($price) . '₫</td>
</tr>


';
                $subTotal += $resultProduct['giaban'];
            }
            $output .= '
<tr>
<td colspan="5" class="text-right font-weight-bold" style="font-size: 1.2rem;">Tổng thanh toán: <span style="color: red;">' . $fm->format_currency($subTotal) . '₫</span></td>
</tr>
</tbody>
</table>
</div>
<div class="d-flex mt-4 justify-content-between">
<div class="pr-4 col-6">
<h5 class="mb-3 font-weight-bold">Địa chỉ và thông tin người nhận hàng</h5>
<div>


';
            $sql_select_order = mysqli_query($connection, "SELECT * FROM tb_thongtin_donhang WHERE ma_donhang = '$ma_donhang'");
            while ($resultInfo =  mysqli_fetch_assoc($sql_select_order)) {
                $output .= '
<ul>
<li class="pb-2">Họ tên người nhận: ' . $resultInfo['ho_ten'] . '</li>
<li class="pb-2">Số điện thoại: ' . $resultInfo['sdt'] . '</li>
<li class="pb-2">Email: ' . $resultInfo['email'] . '</li>
<li class="pb-2">Địa chỉ nhận hàng: ' . $resultInfo['dia_chi'] . ', ' . $resultInfo['quan_huyen'] . ', ' . $resultInfo['tinh_thanhpho'] . '</li>
</ul>

</div>
</div>
<div class="col-5">
<div>
<h5 class="font-weight-bold">Phương thức thanh toán:</h5>
' . $resultInfo['pt_thanhtoan'] . '
</div>
<div class="mt-3">
<h5 class="font-weight-bold">Ngày đặt hàng: </h5>
' . $fm->formatDate($resultInfo['ngay_dat']) . '
</div>
<div class="mt-3">
<h5 class="font-weight-bold">Trạng thái: </h5>
' . $alert . '
</div>
</div>              
        ';
            }

            $output .= '
    </div>
</div>
</div>
</div>
</div>
</td>
<td>
    

';
            $sql_select_order = mysqli_query($connection, "SELECT tb_donhang.*, tb_sanpham.ma_sanpham FROM tb_donhang INNER JOIN tb_sanpham ON tb_donhang.ten_sanpham = tb_sanpham.ten_sanpham
WHERE id_donhang = '$id_donhang'");
            while ($resultProduct =  mysqli_fetch_assoc($sql_select_order)) {
                $output .= '
<div class="d-flex my-2 align-items-center">
<img style="width: 100px;" src="uploads/' . $resultProduct['hinhanh_sanpham'] . '" alt="">
<div class="ml-2">
<div>' . $resultProduct['ten_sanpham'] . '</div>
<div>' . $resultProduct['mau_sanpham'] . ', Số lượng: ' . $resultProduct['so_luong'] . '</div>
</div>
</div>
';
            }
            $output .= '</td>
<td>' . $fm->format_currency($subTotal) . '₫</td>
<td>' . $fm->formatDate($result['ngay_dat']) . '</td>  
<td>' . $taikhoan . '</td>
<td>' . $alert . '</td>
<td>
' . $td . '
</td>
</tr>
';
        }
    } else {
        $output .= "<h5 style='color: red'>$str</h5>";
    }
    $output .= '</tbody>
</table>
';

    return $output;
}

function updateQuantity($connection, $id_donhang)
{
    $orders = [];
    $idOld = 0;
    $quantityOld = 0;
    $get_order = mysqli_query($connection, "SELECT * FROM tb_donhang WHERE id_donhang = '$id_donhang'");
    while ($result = $get_order->fetch_assoc()) {
        if ($result['id_sanpham'] == $idOld) {
            $quantityOld += $result['so_luong'];
        } else {
            $idOld = $result['id_sanpham'];
            $quantityOld = $result['so_luong'];
        }
        $orders[$idOld] = $quantityOld;
    };
    return $orders;
}
