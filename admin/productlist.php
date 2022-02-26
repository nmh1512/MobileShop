<?php
include "include/header.php";

?>

<style>
  .blog-content img {
    width: 100% !important;
    object-fit: cover !important;
  }
</style>
<?php

if (isset($_GET['id_sanpham'])) {
  $id = $_GET['id_sanpham'];
  $del_product = $product->delete_product($id);
}

?>
<div class="px-4 pb-2 d-flex justify-content-between align-items-center">
  <h1>Danh sách sản phẩm</h1>
  <?php if ($admin->checkPrivillege('product-add')) {
?>
    <a href="product-add" class="btn btn-primary" type="button"><i class="fa-solid fa-plus"></i> Tạo mới sản phẩm</a>
  <?php } ?>
</div>
<div class="pl-4 pb-2">
  <?php
  if (isset($del_product)) {
    echo $del_product;
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
              <th>Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Ảnh sản phẩm</th>
              <th>Danh mục</th>
              <th>Brand</th>
              <th>Màu</th>
              <th>Số lượng</th>
              <th>Giá bán</th>
              <th>Giá gốc</th>
              <th>Type</th>
              <th>Xem thêm</th>
              <?php if ($admin->checkPrivillege('edit-product?id_sanpham=0') || $admin->checkPrivillege('products?id_sanpham=0')) { ?>
                <th>Action</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $product = new product;
            $product_show = $product->show_product();
            if ($product_show) {
              $i = 0;
              while ($result = $product_show->fetch_assoc()) {
                $i++;
            ?>
                <tr>
                  <td>
                    <?php echo $i; ?>
                  </td>
                  <td>
                    <?php echo $result['id_sanpham']; ?>
                  </td>
                  <td>
                    <?php echo $result['ma_sanpham']; ?>
                  </td>
                  <td>
                    <?php echo $result['ten_sanpham']; ?>
                  </td>
                  <td style="text-align: center;">
                    <img src="uploads/<?php echo $result['hinhanh_sanpham']; ?>" width="150">
                    <br>
                    <a href="" data-toggle="modal" data-target=".img<?php echo $result['id_sanpham']; ?>">
                      Xem thêm
                    </a>
                    <div class="modal fade img<?php echo $result['id_sanpham']; ?>" tabindex="-1" role="dialog" aria-labelledby="mobalImg" aria-hidden="true" style="text-align: start;">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="mobalImg"><strong>Hình ảnh của sản phẩm
                                <?php echo $result['ten_sanpham']; ?>
                              </strong></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="p-3 blog-content box d-flex flex-wrap">
                            <?php
                            $id_sanpham = $result['id_sanpham'];
                            $show_images_product = $product->show_images_product($id_sanpham);
                            if ($show_images_product) {
                              while ($resultImgs = $show_images_product->fetch_assoc()) {
                            ?>
                                <div class="col-4"><img class="col-12" src="./uploads/<?php echo $resultImgs['anh_sanpham']; ?>" alt=""></div>

                            <?php
                              }
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <?php echo $result['ten_danhmuc']; ?>
                  </td>
                  <td>
                    <?php echo $result['ten_loaisanpham']; ?>
                  </td>
                  <td>
                    <a href="#" data-toggle="modal" data-target="#color<?php echo $result['id_sanpham']; ?>">
                      Xem
                    </a>
                    <div class="modal fade bd-example-modal-sm" id="color<?php echo $result['id_sanpham']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel"><strong>Bảng màu sản phẩm <?php echo $result['ten_sanpham']; ?></strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="p-3 blog-content box mx-auto">
                            <table>
                              <thead>
                                <th>Mã màu</th>
                                <th>Màu sản phẩm</th>
                              </thead>
                              <tbody>
                                <?php

                                $show_color_product = $product->show_color_product($id_sanpham);
                                if ($show_color_product) {
                                  while ($resultColor = $show_color_product->fetch_assoc()) {
                                ?>
                                    <tr>
                                      <td><?php echo $resultColor['id_color']; ?></td>
                                      <td><?php echo $resultColor['ten_color']; ?></td>
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
                  </td>
                  <td>
                    <?php echo $result['soluong'] . '/' . $result['soluong_nhap']; ?>
                  </td>
                  <td>
                    <?php echo $fm->format_currency($result['giaban']); ?>₫
                  </td>
                  <td>
                    <?php echo $fm->format_currency($result['giagoc']); ?>₫
                  </td>
                  <td>
                    <?php
                    if ($result['type_sanpham'] == 0) {
                      echo 'Thông thường';
                    } else {
                      echo 'Nổi bật';
                    }
                    ?>
                  </td>
                  <td>
                    <a href="" data-toggle="modal" data-target="#mota<?php echo $result['ma_sanpham']; ?>">
                      Mô tả
                    </a>
                    <div class="modal fade bd-example-modal-lg" id="mota<?php echo $result['ma_sanpham']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="myLargeModalLabel"><strong>Đánh giá chi tiết <?php echo $result['ten_sanpham']; ?></strong></h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="p-3 blog-content box">
                            <?php echo $result['mota_sanpham']; ?>
                          </div>
                        </div>
                      </div>
                    </div><br>

                    <hr>

                    <a href="" data-toggle="modal" data-target="#thongso<?php echo $result['ma_sanpham']; ?>">
                      Thông số
                    </a>
                    <div class="modal fade" id="thongso<?php echo $result['ma_sanpham']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h6 class="modal-title" id="exampleModal"><strong>Thông số kỹ thuật <?php echo $result['ten_sanpham']; ?></strong></h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="table box">
                              <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <td scope="row">Màn hình:</td>
                                    <td>
                                      <?php echo $result['manhinh']; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Hệ điều hành:</td>
                                    <td>
                                      <?php echo $result['hedieuhanh']; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Camera sau:</td>
                                    <td>
                                      <?php echo $result['cam_sau']; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Camera trước:</td>
                                    <td>
                                      <?php echo $result['cam_truoc']; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Chip:</td>
                                    <td>
                                      <?php echo $result['chip']; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td scope="row">RAM:</td>
                                    <td>
                                      <?php echo $result['ram']; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Bộ nhớ trong</td>
                                    <td>
                                      <?php echo $result['rom']; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td scope="row">SIM:</td>
                                    <td>
                                      <?php echo $result['sim']; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Pin, sạc:</td>
                                    <td>
                                      <?php echo $result['pin']; ?>,
                                      <?php echo $result['sac']; ?>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="related-accessories box">
                              <div class="accessories1"></div>
                              <div class="accessories2"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>

                    <a href="" data-toggle="modal" data-target="#more<?php echo $result['ma_sanpham']; ?>">
                      More
                    </a>
                    <div class="modal fade" id="more<?php echo $result['ma_sanpham']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h6 class="modal-title" id="exampleModal"><strong>Thông tin khác của <?php echo $result['ten_sanpham']; ?></strong></h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="table box">
                              <table class="table table-striped">
                                <tbody>
                                  <tr>
                                    <td scope="row">Giá gốc:</td>
                                    <td>
                                      <?php echo $result['giagoc']; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Nhà cung cấp:</td>
                                    <td>
                                      <?php echo $result['ncc']; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td scope="row">Url (hiển thị trên web)</td>
                                    <td>
                                      <?php echo $result['url_product']; ?>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="related-accessories box">
                              <div class="accessories1"></div>
                              <div class="accessories2"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <?php if ($admin->checkPrivillege('edit-product?id_sanpham=' . $result['id_sanpham'] . '') || $admin->checkPrivillege('products?id_sanpham=' . $result['id_sanpham'] . '')) { ?>

                    <td style="text-align: center; font-size: 30px;">
                      <?php if ($admin->checkPrivillege('edit-product?id_sanpham=' . $result['id_sanpham'] . '')) { ?>
                        <a href="edit-product?id_sanpham=<?php echo $result['id_sanpham']; ?>" title="Sửa" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                      <?php }
                      if ($admin->checkPrivillege('products?id_sanpham=' . $result['id_sanpham'] . '')) { ?>
                        <a type="btn" title="Xóa" class="btn btn-danger" data-toggle="modal" data-target="#remove<?php echo $result['id_sanpham']; ?>"><i class="fa-solid fa-trash-can"></i></a>

                        <div class="modal fade" id="remove<?php echo $result['id_sanpham']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                <div class="text-center mx-3 mt-3 mb-4" style="line-height: 1.2rem;">
                                  <span style="font-size: 1rem;" class="font-weight-bold">Bạn có muốn xóa sản phẩm <?php echo $result['ten_sanpham']; ?> ?</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <a type="button" class="col-5 w-100 btn btn-secondary" data-dismiss="modal">Trở lại</a>
                                  <a href="products?id_sanpham=<?php echo $result['id_sanpham']; ?>" type="button" class="col-5 w-100 btn btn-danger">Xác nhận</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                    </td>
                  <?php } ?>
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
<!-- End of Content Wrapper -->
<!-- Scroll to Top Button-->

<?php
include "include/footer.php";
?>

</body>

</html>