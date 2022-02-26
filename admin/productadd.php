<?php
include "include/header.php";


?>
<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $insert_product = $product->insert_product($_POST, $_FILES);
  echo "<script>window.location = 'products'</script>";
}

// if (isset($_POST['add_color'])) {
//   // $color = $_POST['add_color'];
//   // $insert_color = $product -> insert_color($color);
//   // echo $color;
//   var_dump($_POST['add_color']);

// }

?>
<div style="padding: 0 25px 20px 0;">
  <a style="float: right;" class="btn btn-secondary" href="products"><i class="fas fa-undo-alt"></i> Quay lại</a>
</div>

<div class="productlist-wrapper" style="padding: 10px;">
  <h1>Thêm sản phẩm</h1>
  <?php
  if (isset($insert_product)) {
    echo $insert_product;
  }
  ?>
  <div>
    <h5>Thông tin cơ bản</h5>
  </div>
  <form action="add-product" method="POST" enctype="multipart/form-data">
    <div class="form-group row">
      <div class="col-md-6">
        <label for="">Tên sản phẩm</label>
        <input name="productName" type="text" class="form-control" id="" placeholder="Nhập tên sản phẩm...">
      </div>

      <div class="col-md-6">
        <label for="">Mã sản phẩm</label>
        <input name="productCode" type="text" class="form-control" id="" placeholder="Nhập mã sản phẩm...">
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
              <option value="<?php echo $result['id_danhmuc'] ?>"><?php echo $result['ten_danhmuc'] ?></option>
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
        </select>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label for="">Giá gốc</label>
        <input name="price0" type="number" class="form-control" id="" aria-describedby="" placeholder="Nhập giá gốc sản phẩm...">
      </div>

      <div class="col-md-6">
        <label for="">Giá bán</label>
        <input name="price" type="number" class="form-control" id="" placeholder="Nhập giá bán sản phẩm...">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label for="">Chọn màu sắc sản phẩm</label>
        <div class="color-choice d-flex">
          <select name="id_color[]" class="form-control">
            <option>-- Màu 1 --</option>
            <?php
            $show_color = $product->show_color();
            if ($show_color) {
              while ($result = $show_color->fetch_assoc()) {
            ?>
                <option value="<?php echo $result['id_color'] ?>"><?php echo $result['ten_color'] ?></option>
            <?php
              }
            }
            ?>
          </select>

          <select name="id_color[]" class="form-control">
            <option>-- Màu 2 --</option>
            <?php
            $show_color = $product->show_color();
            if ($show_color) {
              while ($result = $show_color->fetch_assoc()) {
            ?>
                <option value="<?php echo $result['id_color'] ?>"><?php echo $result['ten_color'] ?></option>
            <?php
              }
            }
            ?>
          </select>

          <select name="id_color[]" class="form-control">
            <option>-- Màu 3 --</option>
            <?php
            $show_color = $product->show_color();
            if ($show_color) {
              while ($result = $show_color->fetch_assoc()) {
            ?>
                <option value="<?php echo $result['id_color'] ?>"><?php echo $result['ten_color'] ?></option>
            <?php
              }
            }
            ?>
          </select>

          <select name="id_color[]" class="form-control">
            <option>-- Màu 4 --</option>
            <?php
            $show_color = $product->show_color();
            if ($show_color) {
              while ($result = $show_color->fetch_assoc()) {
            ?>
                <option value="<?php echo $result['id_color'] ?>"><?php echo $result['ten_color'] ?></option>
            <?php
              }
            }
            ?>
          </select>

          <select name="id_color[]" class="form-control">
            <option>-- Màu 5 --</option>
            <?php
            $show_color = $product->show_color();
            if ($show_color) {
              while ($result = $show_color->fetch_assoc()) {
            ?>
                <option value="<?php echo $result['id_color'] ?>"><?php echo $result['ten_color'] ?></option>
            <?php
              }
            }
            ?>
          </select>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fa-solid fa-plus"></i>
          </button>


        </div>
      </div>
      <div class="col-md-6">
        <label for="">Type</label>
        <div class="type-choice">
          <select name="type" class="form-control" id="id_type">
            <option>-- Chọn type --</option>
            <option value="1">Nổi bật</option>
            <option value="0">Thông thường</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-6">
        <label for="">Nhà cung cấp</label>
        <input name="ncc" type="text" class="form-control" id="" placeholder="Nhập nhà cung cấp sản phẩm...">
      </div>

      <div class="col-md-6">
        <label for="">Số lượng</label>
        <input name="quantity" type="number" class="form-control" id="" aria-describedby="" placeholder="...">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-6">
        <label for="">Url (vui lòng nhập theo kiểu chữ snake) <br> Ví dụ: iphone-13-promax</label>
        <input name="url" type="text" class="form-control" id="" placeholder="Nhập url sản phẩm...">
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
                <input name="screen" type="text" class="form-control" id="" aria-describedby="" placeholder="...">
              </div>
              <div>
                <label class="info" for="">Hệ điều hành:</label>
                <input name="system" type="text" class="form-control" id="" aria-describedby="" placeholder="...">
              </div>
              <div>
                <label class="info" for="">Camera sau:</label>
                <input name="cam1" type="text" class="form-control" id="" aria-describedby="" placeholder="...">
              </div>
              <div>
                <label class="info" for="">Camera trước:</label>
                <input name="cam2" type="text" class="form-control" id="" aria-describedby="" placeholder="...">
              </div>
              <div>
                <label class="info" for="">Chip:</label>
                <input name="chip" type="text" class="form-control" id="" aria-describedby="" placeholder="...">
              </div>
            </div>
            <div class="col-md-6">
              <div>
                <label class="info" for="">RAM:</label>
                <input name="ram" type="text" class="form-control" id="" aria-describedby="" placeholder="...">
              </div>
              <div>
                <label class="info" for="">ROM:</label>
                <input name="rom" type="text" class="form-control" id="" aria-describedby="" placeholder="...">
              </div>
              <div>
                <label class="info" for="">Sim:</label>
                <input name="sim" type="text" class="form-control" id="" aria-describedby="" placeholder="...">
              </div>
              <div>
                <label class="info" for="">Pin:</label>
                <input name="pin" type="text" class="form-control" id="" aria-describedby="" placeholder="...">
              </div>
              <div>
                <label class="info" for="">Sạc:</label>
                <input name="charge" type="text" class="form-control" id="" aria-describedby="" placeholder="...">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Chi tiết</label>
      <textarea name="info" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="">Upload ảnh đại diện sản phẩm</label>
      <input required type="file" name="image">
    </div>
    <div class="form-group">
      <label for="">Upload ảnh sản phẩm</label>
      <input multiple type="file" name="images[]">
    </div>
    <button name="submit" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Lưu</button>
  </form>
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
        <form action="add-product" method="POST" enctype="multipart/form-data"> 
          <div>
            <input type="text" class="form-control" name="add_color" aria-describedby="" placeholder="Nhập tên màu...">
          </div>
          <div>
            <button type="submit" class="btn btn-primary" name="add_color">Thêm</button>
          </div>
        </form>

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
<script>
  $(document).ready(function() {
    $("#id_danhmuc").change(function() {

      var x = $(this).val()
      $.get("ajax/productlist_ajax.php", {
        id_danhmuc: x
      }, function(data) {
        $("#id_loaisanpham").html(data);
      })
    })
  })
</script>

<!-- <script src="js/product_ajax.js"></script> -->

</html>