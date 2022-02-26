<?php
include "include/header.php";




$show_customer = $customer->show_customer();
if (isset($_GET['id_customer'])) {
    $id = $_GET['id_customer'];
    $del_customer = $customer->delete_customer($id);
}
?>
<div class="px-4 pb-2 d-flex justify-content-between align-items-center">
    <h1>Danh sách khách hàng</h1>
    <?php
    if (isset($del_customer)) {
        echo $del_customer;
    }
    ?>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Tài khoản</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($show_customer) {
                            $i = 0;
                            while ($result = $show_customer->fetch_assoc()) {
                                $i++;
                        ?>

                                <tr id="<?php echo $i ?>">
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $result['id'] ?></td>
                                    <td><?php echo $result['taikhoan'] ?></td>
                                    <td><?php echo $fm->formatDate($result['ngay_dang_ky']) ?></td>
                                    <td>
                                        <?php
                                        if ($result['trang_thai'] == 0) {
                                            echo 'Offline';
                                        } else {
                                            echo '<p class="m-0" style="color:green;"><span style="font-size: 0.8rem;"><i class="fas fa-circle"></i></span> Online</p>';
                                        }
                                        ?>


                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#id<?php echo $result['id'] ?>">
                                            Thông tin
                                        </a>
                                        <div class="modal fade" id="id<?php echo $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Thông tin khách hàng <?php echo $result['taikhoan'] ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <ul>
                                                                <li>Họ tên: <?php echo $result['name'] ?> </li>
                                                                <li>Số điện thoại: <?php echo $result['sdt'] ?> </li>
                                                                <li>Email: <?php echo $result['email'] ?> </li>
                                                                <li>Địa chỉ: <?php echo $result['dia_chi'] . ', ' . $result['quan_huyen'] . ', ' . $result['tinh_thanhpho'] . '.' ?> </li>
                                                            </ul>
                                                        </div>
                                                        <?php
                                                        $id = $result['id'];
                                                        $show_order = $ct->get_odered_by_customer($id);
                                                        if ($show_order) {
                                                            $j = 0;

                                                        ?>
                                                            <div>
                                                                <h5>Đơn hàng đã mua</h5>
                                                                <div>
                                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>STT</th>
                                                                                <th>Mã đơn hàng</th>
                                                                                <th>Sản phẩm</th>
                                                                                <th>Tổng thanh toán</th>
                                                                                <th>Ngày đặt</th>
                                                                                <th>Phương thức thanh toán</th>
                                                                                <th>Trạng thái</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            while ($resultOrder = $show_order->fetch_assoc()) {
                                                                                $j++;
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?php echo $j ?></td>
                                                                                    <td><?php echo $resultOrder['ma_donhang'] ?></td>
                                                                                    <td>
                                                                                        <?php
                                                                                        $id_donhang = $resultOrder['id'];
                                                                                        $get_product_order = $ct->get_product_order($id_donhang);
                                                                                        if ($get_product_order) {
                                                                                            $subTotal = 0;
                                                                                            while ($resultProduct = $get_product_order->fetch_assoc()) {

                                                                                        ?>

                                                                                                <div class="d-flex my-2 align-items-center">
                                                                                                    <img style="width: 100px;" src="uploads/<?php echo $resultProduct['hinhanh_sanpham'] ?>" alt="">
                                                                                                    <div class="ml-2">
                                                                                                        <div><?php echo $resultProduct['ten_sanpham'] ?></div>
                                                                                                        <div><?php echo $resultProduct['mau_sanpham'] ?>, Số lượng: <?php echo $resultProduct['so_luong'] ?></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                        <?php
                                                                                                $subTotal += $resultProduct['giaban'];
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                    </td>
                                                                                    <td><?php echo $fm->format_currency($subTotal) ?>₫</td>
                                                                                    <td><?php echo $fm->formatDate($resultOrder['ngay_dat']); ?></td>
                                                                                    <td><?php echo $resultOrder['pt_thanhtoan']; ?></td>
                                                                                    <td>
                                                                                        <?php
                                                                                        if ($resultOrder['trangthai'] == 0) {
                                                                                            $alert = 'Chờ xác nhận';
                                                                                        } elseif ($resultOrder['trangthai'] == 1) {
                                                                                            $alert = 'Đã xác nhận';
                                                                                        } elseif ($resultOrder['trangthai'] == 2) {
                                                                                            $alert = '<span style="color: red;">Đã hủy bởi khách hàng</span>';
                                                                                        } elseif ($resultOrder['trangthai'] == 3) {
                                                                                            $alert = '<span style="color: red;">Đã hủy bởi người bán</span>';
                                                                                        } elseif ($resultOrder['trangthai'] == 4) {
                                                                                            $alert = 'Đang giao hàng';
                                                                                        } else {
                                                                                            $alert = 'Đã hoàn thành';
                                                                                        }
                                                                                        echo $alert;
                                                                                        ?>

                                                                                    </td>
                                                                                </tr>

                                                                            <?php
                                                                            } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a type="btn" title="Xóa" class="btn btn-danger" data-toggle="modal" data-target="#remove<?php echo $result['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>

                                        <div class="modal fade" id="remove<?php echo $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="text-center mx-3 mt-3 mb-4" style="line-height: 1.2rem;">
                                                            <span style="font-size: 1rem;" class="font-weight-bold">Bạn có muốn xóa khách hàng <?php echo $result['name'] . ' - ' . $result['taikhoan']; ?> ?</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <a type="button" class="col-5 w-100 btn btn-secondary" data-dismiss="modal">Trở lại</a>
                                                            <a href="customer?id_customer=<?php echo $result['id']; ?>" type="button" class="col-5 w-100 btn btn-danger">Xác nhận</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<?php
include "include/footer.php";
?>
</body>

</html>