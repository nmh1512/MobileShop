<?php
include "include/header.php";

$showAd = $admin->infoAdmin();

if (isset($_GET['id_member'])) {
    $id = $_GET['id_member'];
    $delMember = $admin->deleteMember($id);
}
$arr= [
    1 => "QL",
    2 => "NV",
    3 => "CTV",
    4 => "NVA"

];


?>
<div class="px-4 pb-2 d-flex justify-content-between align-items-center">
    <h1>Danh sách nhân viên</h1>

    <a href="add-member" class="btn btn-primary" type="button"><i class="fa-solid fa-plus"></i> Thêm nhân viên</a>
</div>

<div class="container-fluid">
<?php
if (isset($delMember)) {
    echo $delMember;
}
?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Tài khoản</th>
                            <th>Chức vụ</th>
                            <th>Ngày tham gia</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($showAd) {
                            $i = 0;
                            while ($result = $showAd->fetch_assoc()) {
                                $i++;
                                foreach($arr as $key => $val) {
                                    if($result['level'] == $key) {
                                        $idMem = $val;
                                    }
                                }
                        ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $idMem.$result['id_admin'] ?></td>
                                    <td><?php echo $result['name_admin'] ?></td>
                                    <td>
                                        <?php
                                        if ($result['gioi_tinh'] == 0) {
                                            echo 'Nam';
                                        } elseif ($result['gioi_tinh'] == 1) {
                                            echo 'Nữ';
                                        } else {
                                            echo 'Khác';
                                        }
                                        ?>

                                    </td>
                                    <td><?php echo $fm->formatDate1($result['ngay_sinh']) ?></td>
                                    <td><?php echo '0' . $result['sdt_admin'] ?></td>
                                    <td><?php echo $result['email_admin'] ?></td>
                                    <td><?php echo $result['user_admin'] ?></td>
                                    <td>
                                        <?php
                                        if ($result['level'] == 0) {
                                            echo 'Admin';
                                        } elseif ($result['level'] == 1) {
                                            echo 'Quản lý';
                                        } elseif ($result['level'] == 2) {
                                            echo 'Nhân viên';
                                        } elseif ($result['level'] == 3) {
                                            echo 'Cộng tác viên';
                                        } else {
                                            echo 'Nhà văn';
                                        }
                                        ?>

                                    </td>
                                    <td><?php echo $fm->formatDate1($result['ngay_tao']) ?></td>
                                    <td class="p-1 text-center">

                                        <a href="privilege?id_member=<?php echo $result['id_admin']; ?>" title="Phân quyền" class="btn btn-primary mb-1"><i class="fas fa-tasks"></i></a>

                                        <a title="Xóa" class="btn btn-danger" data-toggle="modal" data-target="#remove<?php echo $result['id_admin']; ?>"><i class="fa-solid fa-trash-can"></i></a>

                                        <div class="modal fade" id="remove<?php echo $result['id_admin']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="text-center mx-3 mt-3 mb-4" style="line-height: 1.2rem;">
                                                            <span style="font-size: 1rem;" class="font-weight-bold">Bạn có muốn xóa nhân viên <?php echo $result['name_admin'] . ' - ' . $result['user_admin']; ?> ?</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <a type="button" class="col-5 w-100 btn btn-secondary" data-dismiss="modal">Trở lại</a>
                                                            <a href="member?id_member=<?php echo $result['id_admin']; ?>" type="button" class="col-5 w-100 btn btn-danger">Xác nhận</a>
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