<?php
include "include/header.php";


$showNews = $news->show_news();
if (isset($_GET['id_tintuc'])) {
  $id = $_GET['id_tintuc'];
  $delNews = $news->delNews($id);
}
?>
<div class="px-4 pb-2 d-flex justify-content-between align-items-center">
  <h1>Danh sách tin tức</h1>

  <a href="add-news" class="btn btn-primary" type="button"><i class="fa-solid fa-plus"></i> Thêm tin tức</a>
</div>
<div class="pl-4 pb-2">
  <?php
  if (isset($delNews)) {
    echo $delNews;
  }
  ?>
</div>
<div>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã tin tức</th>
                <th>Title</th>
                <th>Hình ảnh</th>
                <th>Nội dung</th>
                <th>Tác giả</th>
                <th>Ngày đăng</th>
                <th>Type</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>

              <?php
              if ($showNews) {
                $i = 0;
                while ($result = $showNews->fetch_assoc()) {
                  $i++;
              ?>

                  <tr>
                    <td>
                      <?php echo $i ?>
                    </td>
                    <td><?php echo 'NEWS' . $result['id'] ?>
                    </td>
                    <td class="w-25"><?php echo $result['title'] ?></td>
                    <td class="text-center"><img src="uploads/<?php echo $result['img'] ?>" width="150"></td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#mota<?php echo $result['id']; ?>">Xem</a>
                      <div class="modal fade bd-example-modal-lg" id="mota<?php echo $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" id="myLargeModalLabel"><strong>Nội dung tin tức <?php echo 'NEWS' . $result['id'] ?></strong><br></h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="p-3 blog-content box">
                              <?php echo $result['noidung']; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td><?php echo $result['tacgia'] ?></td>
                    <td><?php echo $fm->formatDate1($result['ngay_dang']) ?></td>
                    <td><?php
                        if ($result['type'] == 0) {
                          echo 'Thông thường';
                        } else {
                          echo 'Tin hot';
                        }
                        ?></td>

                    <td style="text-align: center; font-size: 30px;">
                      <a href="edit-news?id_tintuc=<?php echo $result['id']; ?>" title="Sửa" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                      <hr>
                      <a type="btn" title="Xóa" class="btn btn-danger" data-toggle="modal" data-target="#remove<?php echo $result['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>

                      <div class="modal fade" id="remove<?php echo $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="text-center mx-3 mt-3 mb-4" style="line-height: 1.2rem;">
                                <span style="font-size: 1rem;" class="font-weight-bold">Bạn có muốn xóa tin tức <?php echo 'NEWS' . $result['id']; ?> ?</span>
                              </div>
                              <div class="d-flex justify-content-between">
                                <a type="button" class="col-5 w-100 btn btn-secondary" data-dismiss="modal">Trở lại</a>
                                <a href="news?id_tintuc=<?php echo $result['id']; ?>" type="button" class="col-5 w-100 btn btn-danger">Xác nhận</a>
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

<!-- End of Content Wrapper -->
<!-- Scroll to Top Button-->


<?php
include "include/footer.php";
?>
</body>

</html>