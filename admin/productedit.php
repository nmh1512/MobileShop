<?php
include "include/header.php";


?>
<?php

if (!isset($_GET['id_sanpham']) || $_GET['id_sanpham'] == NULL) {
  echo "<script>window.location = '404.html'</script>";
} else {
  $id_sanpham = $_GET['id_sanpham'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $update_product = $product->update_product($_POST, $_FILES, $id_sanpham);
  echo "<script>window.location = 'products'</script>";
}
?>
<div class="row">
  <h2 class="pl-4 col-md-6">Sửa thông tin sản phẩm</h2>
  <div class="col-md-6" style="padding: 0 25px 20px 0;">
    <a style="float: right;" class="btn btn-secondary" href="products"><i class="fas fa-undo-alt"></i> Quay lại</a>
  </div>
</div>

<hr>

<div class="productlist-wrapper" style="padding: 10px;">
  <?php
  if (isset($update_product)) {
    echo $update_product;
  }
  ?>
  <div>
    <h3>Thông tin cơ bản</h3>
  </div>
  <?php
  $get_product_by_id = $product->getProductById($id_sanpham);
  if ($get_product_by_id) {
    $resultProduct = $get_product_by_id->fetch_assoc();
  ?>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Tên sản phẩm</label>
          <input name="productName" type="text" class="form-control" id="" value="<?php echo $resultProduct['ten_sanpham']; ?>">
        </div>

        <div class="col-md-6">
          <label for="">Mã sản phẩm</label>
          <input name="productCode" type="text" class="form-control" id="" value="<?php echo $resultProduct['ma_sanpham']; ?>">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Chọn danh mục</label>
          <select name="id_danhmuc" class="form-control" id="id_danhmuc">
            <option>-- Chọn danh mục --</option>
            <?php
            $show_cartegory = $product->show_cartegory();
            if ($show_cartegory) {
              while ($result = $show_cartegory->fetch_assoc()) {
            ?>

                <option <?php
                        if ($result['id_danhmuc'] == $resultProduct['id_danhmuc']) {
                          echo 'selected';
                        }
                        ?> value="<?php echo $result['id_danhmuc'] ?>"><?php echo $result['ten_danhmuc'] ?></option>
            <?php
              }
            }
            ?>
          </select>
        </div>

        <div class="col-md-6">
          <label for="">Chọn loại sản phẩm</label>
          <select name="id_loaisanpham" class="form-control" id="id_loaisanpham">
            <option value="">-- Chọn loại sản phẩm --</option>
            <?php
            $show_brand = $product->show_brand();
            if ($show_brand) {
              while ($result = $show_brand->fetch_assoc()) {
            ?>

                <option <?php
                        if ($result['id_loaisanpham'] == $resultProduct['id_loaisanpham']) {
                          echo 'selected';
                        }
                        ?> value="<?php echo $result['id_loaisanpham'] ?>"><?php echo $result['ten_loaisanpham'] ?></option>
            <?php
              }
            }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Giá gốc</label>
          <input name="price0" type="number" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['giagoc']; ?>">
        </div>

        <div class="col-md-6">
          <label for="">Giá bán</label>
          <input name="price" type="number" class="form-control" id="" value="<?php echo $resultProduct['giaban']; ?>">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Type</label>
          <div class="type-choice">
            <select name="type" class="form-control" id="id_type">
              <option>-- Chọn type --</option>
              <?php
              if ($resultProduct['type_sanpham'] == 1) {
              ?>
                <option selected value="1">Nổi bật</option>
                <option value="0">Thông thường</option>
              <?php
              } else {
              ?>
                <option value="1">Nổi bật</option>
                <option selected value="0">Thông thường</option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <label for="">Nhà cung cấp</label>
          <input name="ncc" type="text" class="form-control" id="" value="<?php echo $resultProduct['ncc']; ?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Số lượng nhập</label>
          <input name="quantity0" type="number" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['soluong_nhap']; ?>">
        </div>
        <div class="col-md-6">
          <label for="">Số lượng còn lại</label>
          <input name="quantity" type="number" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['soluong']; ?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <label for="">Url</label>
          <input name="url" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['url_product']; ?>">
        </div>
      </div>
      
      <div class="form-group product-collapse">
        <p>
          <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Thông số kỹ thuật</a>
        </p>
        <div class="collapse multi-collapse" id="multiCollapseExample1">
          <div class="card card-body">
            <div class="row">
              <div class="col-md-6">
                <div>
                  <label class="info" for="">Màn hình:</label>
                  <input name="screen" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['manhinh']; ?>">
                </div>
                <div>
                  <label class="info" for="">Hệ điều hành:</label>
                  <input name="system" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['hedieuhanh']; ?>">
                </div>
                <div>
                  <label class="info" for="">Camera sau:</label>
                  <input name="cam1" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['cam_sau']; ?>">
                </div>
                <div>
                  <label class="info" for="">Camera trước:</label>
                  <input name="cam2" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['cam_truoc']; ?>">
                </div>
                <div>
                  <label class="info" for="">Chip:</label>
                  <input name="chip" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['chip']; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div>
                  <label class="info" for="">RAM:</label>
                  <input name="ram" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['ram']; ?>">
                </div>
                <div>
                  <label class="info" for="">ROM:</label>
                  <input name="rom" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['rom']; ?>">
                </div>
                <div>
                  <label class="info" for="">Sim:</label>
                  <input name="sim" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['sim']; ?>">
                </div>
                <div>
                  <label class="info" for="">Pin:</label>
                  <input name="pin" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['pin']; ?>">
                </div>
                <div>
                  <label class="info" for="">Sạc:</label>
                  <input name="charge" type="text" class="form-control" id="" aria-describedby="" value="<?php echo $resultProduct['sac']; ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Chi tiết</label>
        <textarea name="info" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $resultProduct['mota_sanpham']; ?></textarea>
      </div>
      <div class="form-group border border-primary col-8">
        <div class="p-3">
          <label for="">Upload hình ảnh sản phẩm</label>
          <img class=" py-3 border border-left-primary border border-right-primary" src="uploads/<?php echo $resultProduct['hinhanh_sanpham']; ?>" width="120">
          <input type="file" name="image">
        </div>
      </div>
      <button name="submit" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Lưu</button>
    </form>
  <?php
  }

  ?>
</div>




<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2020</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm màu sắc sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="productlist.php" class="add_data_color" method="POST">
          <div>
            <input type="text" class="form-control" name="add_color" aria-describedby="" placeholder="Nhập tên màu...">
          </div>
        </form>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="add_color">Thêm</button>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Màu</th>
                <th>Tùy chỉnh</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $show_color = $product->show_color();
              if ($show_color) {
                $i = 0;
                while ($result = $show_color->fetch_assoc()) {
                  $i++;
              ?>

                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['id_color'] ?></td>
                    <td><?php echo $result['ten_color'] ?></td>
                    <td><a href="delete_item.php?id_color=<?php echo $result['id_color'] ?>">Xóa</a></td>
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
</div>
<?php
include "include/footer.php";
?>
<script>
  CKEDITOR.replace('exampleFormControlTextarea1', {
    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });
</script>
<script src="js/product_ajax.js"></script>
</body>

</html>