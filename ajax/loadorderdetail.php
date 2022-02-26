<?php
include '../admin/lib/format.php';
include "../admin/lib/database.php";
$db = new Database;
$fm = new Format;

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "UPDATE tb_thongtin_donhang SET trangthai = 2 WHERE id = '$id'";
    $sql_select = $db->update($query);
} elseif (isset($_POST['receivedId'])) {
    $id = $_POST['receivedId'];
    $query = "UPDATE tb_thongtin_donhang SET trangthai = 5 WHERE id = '$id'";
    $sql_select = $db->update($query);
} else {
    $customer_id = $_POST['customer_id'];
    if (strlen($customer_id) == 10) {
        $query = "SELECT * FROM tb_thongtin_donhang WHERE sdt = '$customer_id' ORDER BY ngay_dat DESC, trangthai ASC";
    } else {
        $query = "SELECT * FROM tb_thongtin_donhang WHERE customer_id = '$customer_id' ORDER BY ngay_dat DESC, trangthai ASC";
    }
    $output = '';
    $alert = '';

    $td = '';
    $sql_select = $db->select($query);
    $output .= '
    
    <table class="w-100" id="table" class="mx-auto">
                            <thead>
                                <th style="width: 15%; height: 50px" scope="col">
                                    <p>Mã đơn hàng</p>
                                </th>
                                <th style="width: 30%; height: 50px" scope="col">
                                    <p>Sản phẩm</p>
                                </th>
                                <th style="width: 15%; height: 50px" scope="col">
                                    <p>Tổng thanh toán</p>
                                </th>
                                <th style="width: 20%; height: 50px" scope="col">
                                    <p>Ngày đặt</p>
                                </th>
                                <th style="width: 10%; height: 50px" scope="col">
                                <p>Trạng thái</p>
                                </th>
                                <th style="width: 10%; height: 50px" scope="col"></th>
                            </thead>
                            <tbody>
    
    ';

    if (mysqli_num_rows($sql_select) > 0) {
        while ($result = mysqli_fetch_assoc($sql_select)) {
            $output .= '
            <tr id="order" style="border-top: 1px solid silver;">
            <td class="py-1 px-1">' . $result['ma_donhang'] . '</td>
            <td class="py-1 px-1">';
            $id_donhang = $result['id'];
            $ma_donhang = $result['ma_donhang'];
            $queryOrder = "SELECT tb_donhang.*, tb_sanpham.ma_sanpham FROM tb_donhang INNER JOIN tb_sanpham ON tb_donhang.ten_sanpham = tb_sanpham.ten_sanpham
WHERE id_donhang = '$id_donhang'";
            $sql_select_order = $db->select($queryOrder);
            $subTotal = 0;
            while ($resultOrder =  mysqli_fetch_assoc($sql_select_order)) {
                $output .= '
                        <div class="d-flex my-2 align-items-center">
                            <img style="width: 50px;" src="admin/uploads/' . $resultOrder['hinhanh_sanpham'] . '" alt="">
                            <div class="ml-2">
                                <div>' . $resultOrder['ten_sanpham'] . '</div>
                                <div>' . $resultOrder['mau_sanpham'] . ', Số lượng: ' . $resultOrder['so_luong'] . '</div>
                            </div>
                        </div>
            
            ';
                $subTotal += $resultOrder['giaban'];
            }
            $output .= '
    <td class="py-1 px-1">
    ' . $fm->format_currency($subTotal) . '₫
    </td>
    <td class="py-1 px-1">' . $fm->formatDate($result['ngay_dat']) . '</td>';
            if ($result['trangthai'] == 0) {
                $alert = 'Chờ xác nhận';
                $td = '
                <a href="" data-toggle="modal" data-target="#id' . $ma_donhang . '">
                Hủy đơn hàng
            </a>
            <div class="modal fade" id="id' . $ma_donhang . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
        
                        <div class="modal-body">
                            <div class="text-center m-4">
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
                $td = '';
            } elseif ($result['trangthai'] == 2) {
                $alert = '<span style="color: red;">Đã hủy</span>
                ';
                $td = '';
            } elseif ($result['trangthai'] == 3) {
                $alert = '<span style="color: red;">Đã hủy bởi người bán</span>';
                $td = '';
            } elseif ($result['trangthai'] == 4) {
                $alert = 'Đang giao hàng';
                $td = '<a style="color: white;" type="button" class="btn btn-primary" onclick="received(' . $result['id'] . ')"><i class="fas fa-check"></i> Đã nhận hàng</a>';
            } else {
                $alert = 'Đã nhận hàng';
                $td = '';
            }
            $output .= '
            
            <td class="py-1 px-1">' . $alert . '</td>
            <td class="py-1 px-1">
            ' . $td . '
            </td>
            </tr>
            ';
        }
        $output .= '</tbody>
    </table>
    ';
    } else {
        $output =  '<div class="text-center mx-auto my-4 pt-4">
        <p style="font-size: 2rem;">Bạn chưa đặt đơn hàng nào, hãy đi mua sắm ngay !</p>
        <a href="home" class="btn btn-outline-danger px-4 py-3"><i class="fa-solid fa-house"></i> Về trang chủ</a>
    </div>';
    }

    echo $output;
}
