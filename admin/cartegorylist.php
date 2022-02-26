<?php
  include "include/header.php";


?>
<?php
//Thêm danh mục

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ten_danhmuc = $_POST['ten_danhmuc'];
  $icon = $_POST['icon'];
  $insert_cartegory = $cat -> insert_cartegory($ten_danhmuc, $icon);
}
if(isset($_GET['id_danhmuc'])) {
  $id = $_GET['id_danhmuc'];
  $del_category = $cat -> delete_cartegory($id);
}


// Show danh mục

$show_cartegory = $cat -> show_cartegory();
?>
<div class="px-4 pb-2 d-flex justify-content-between align-items-center">
  <h1>Danh sách danh mục</h1>

  <form class="col-4 pr-0 add_cartegory
        d-none d-sm-inline-block
        form-inline
        navbar-search
      " method="POST" style="text-align:center;">
    <?php
        if(isset($insert_cartegory)){
          echo $insert_cartegory;
        } elseif(isset($del_category)) {
          echo $del_category;
        }
      ?>
    <div class="input-group">
      <input type="text" class="form-control small" placeholder="Thêm danh mục..." aria-describedby="basic-addon2"
        name="ten_danhmuc" />
        <input type="text" class="form-control small" placeholder="Icon (fontawesome)" aria-describedby="basic-addon2"
        name="icon" />

      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
          <i class="fa-solid fa-plus"></i>
        </button>
      </div>
    </div>
  </form>
</div>



<div>
  <?php
    if(isset($del_product)) {
      echo $del_product;
    }
  ?>

  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Tùy chỉnh</th>
              </tr>
            </thead>
            <tbody>

              <?php
                            if ($show_cartegory) {
                                $i = 0;
                                while($result = $show_cartegory -> fetch_assoc()){
                                $i++;
                            ?>

              <tr id="<?php echo $result['id_danhmuc']; ?>">
                <td>
                  <?php echo $i ?>
                </td>
                <td data-target="idDanhmuc"><?php echo $result['id_danhmuc'] ?>
                </td>
                <td data-target="tenDanhmuc"><?php echo $result['ten_danhmuc'] ?></td>
                <td class="col-2">
                  <a href="#" data-role="update" data-id="<?php echo $result['id_danhmuc']; ?>" title="Sửa"
                    class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a> |
                  <a type="btn" title="Xóa" class="btn btn-danger" data-toggle="modal" data-target="#remove<?php echo $result['id_danhmuc']; ?>"><i class="fa-solid fa-trash-can"></i></a>

                    <div class="modal fade" id="remove<?php echo $result['id_danhmuc']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="text-center mx-3 mt-3 mb-4" style="line-height: 1.2rem;">
                              <span style="font-size: 1rem;" class="font-weight-bold">Bạn có muốn xóa danh mục <?php echo $result['ten_danhmuc']; ?> ?</span>
                            </div>
                            <div class="d-flex justify-content-between">
                              <a type="button" class="col-5 w-100 btn btn-secondary" data-dismiss="modal">Trở lại</a>
                              <a href="categories?id_danhmuc=<?php echo $result['id_danhmuc']; ?>" type="button" class="col-5 w-100 btn btn-danger">Xác nhận</a>
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

<!-- Scroll to Top Button-->

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
          <input type="hidden" id="idDanhmuc" class="form-control">
        <div class="form-group">
          <label>Tên danh mục: </label>
          <input type="text" id="tenDanhmuc" class="form-control">
          <!-- <label>Icon (font-awesome): </label> -->
          <!-- <input type="text" id="icon" class="form-control"> -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a data-dismiss="modal" id="save" class="btn btn-primary">Save changes</a>
      </div>
    </div>
  </div>
</div>
<?php
include "include/footer.php";
?>
</body>
<script src="js/edit-Catlist.js"></script>

</html>