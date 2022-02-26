<?php
include "include/header.php";


?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $insert_brand = $brand->insert_brand($_POST, $_FILES);
}
if (isset($_GET['id_loaisanpham'])) {
  $id = $_GET['id_loaisanpham'];
  $del_brand = $brand->delete_brand($id);
}

$show_brand = $brand->show_brand();
?>
<div class="px-4 pb-2 d-flex justify-content-between align-items-center">
  <h1>Danh sách loại sản phẩm</h1>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
    <i class="fa-solid fa-plus"></i> Thêm loại sản phẩm
  </button>

  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm loại sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="brandlist.php" method="POST" enctype="multipart/form-data">
            <div>
              <div class="form-group">
                <select name="id_danhmuc" class="form-control" id="exampleFormControlSelect1">
                  <option>-- Chọn danh mục --</option>
                  <?php
                  $show_cartegory = $brand->show_cartegory();
                  if ($show_cartegory) {
                    while ($result = $show_cartegory->fetch_assoc()) {
                  ?>
                      <option value="<?php echo $result['id_danhmuc'] ?>"><?php echo $result['ten_danhmuc'] ?></option>
                  <?php
                    }
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label for="">Tên loại sản phẩm</label>
                <input type="text" class="form-control bg-light border-0 small" placeholder="Tên loại sản phẩm..." aria-describedby="basic-addon2" name="ten_loaisanpham" style="background-color: white !important;
                  border: 1px solid rgb(206, 206, 206) !important;" />
              </div>

              <div class="form-group">
                <label for="">Upload logo brand</label>
                <input type="file" name="image">
              </div>
            </div>
            <div>
              <button name="submit" type="submit" class="btn btn-primary float-right">Lưu</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<div class="pl-4 pb-2">
  <?php
  if (isset($del_brand)) {
    echo $del_brand;
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
              <th>Danh mục</th>
              <th>Tên loại sản phẩm</th>
              <th>Logo</th>
              <th>Tùy chỉnh</th>
            </tr>
          </thead>
          <tbody>

            <?php
            if ($show_brand) {
              $i = 0;
              while ($result = $show_brand->fetch_assoc()) {
                $i++;
            ?>

                <tr id="<?php echo $result['id_loaisanpham']; ?>">
                  <td><?php echo $i ?></td>
                  <td data-target="idLoaisanpham"><?php echo $result['id_loaisanpham'] ?></td>
                  <td id="<?php echo $result['id_danhmuc']; ?>" data-target="tenDanhmuc"><?php echo $result['ten_danhmuc'] ?></td>
                  <td data-target="tenLoaisanpham"><?php echo $result['ten_loaisanpham'] ?></td>
                  <td>
                    <img src="uploads/<?php echo $result['logo'] ?>" alt="">
                  </td>
                  <td class="col-2">
                    <a data-role="update" data-id="<?php echo $result['id_loaisanpham']; ?>" title="Sửa" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a> |
                    <a type="btn" title="Xóa" class="btn btn-danger" data-toggle="modal" data-target="#remove<?php echo $result['id_loaisanpham']; ?>"><i class="fa-solid fa-trash-can"></i></a>

                    <div class="modal fade" id="remove<?php echo $result['id_loaisanpham']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="text-center mx-3 mt-3 mb-4" style="line-height: 1.2rem;">
                              <span style="font-size: 1rem;" class="font-weight-bold">Bạn có muốn xóa loại sản phẩm <?php echo $result['ten_loaisanpham']; ?> ?</span>
                            </div>
                            <div class="d-flex justify-content-between">
                              <a type="button" class="col-5 w-100 btn btn-secondary" data-dismiss="modal">Trở lại</a>
                              <a href="brands?id_loaisanpham=<?php echo $result['id_loaisanpham']; ?>" type="button" class="col-5 w-100 btn btn-danger">Xác nhận</a>
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


<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="idLoaisanpham" class="form-control">
        <div class="form-group">
          <select name="id_danhmuc" class="form-control">
            <option selected id="tenDanhmuc"></option>
            <?php
            $show_cartegory = $brand->show_cartegory();
            if ($show_cartegory) {
              while ($result = $show_cartegory->fetch_assoc()) {
            ?>
                <option value="<?php echo $result['id_danhmuc'] ?>"><?php echo $result['ten_danhmuc'] ?></option>
            <?php
              }
            }
            ?>
          </select>
          <label>Loại sản phẩm: </label>
          <input type="text" id="tenLoaisanpham" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" id="save" data-dismiss="modal" class="btn btn-primary">Save changes</a>
      </div>
    </div>
  </div>
</div>
<?php
include "include/footer.php";
?>

</body>
<script src="js/edit-brandlist.js"></script>

</html>