<?php
include "include/header.php";

?>

<div class="px-4 pb-2 d-flex justify-content-between align-items-center">
  <h1>Danh sách đơn hàng</h1>
  <div class="d-flex align-items-center">
    <h5 class="m-0 mr-3">Chế độ xem</h5>
    <select class="p-2" name="" id="view">
      <option selected>Tất cả đơn hàng</option>
      <option>Chờ xác nhận</option>
      <option>Đã xác nhận</option>
      <option>Đã hủy</option>
      <option>Đã hủy bởi khách hàng</option>
      <option>Đã hủy bởi người bán</option>
      <option>Đang giao hàng</option>
      <option>Đã giao hàng</option>
      <option>Đã hoàn thành</option>
    </select>
  </div>
</div>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">

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
<script src="js/order.js"></script>

</html>