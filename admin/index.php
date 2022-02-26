<?php

include "include/header.php";


$get_order_quantity = $ct->get_quantity_order();
$quantityCus = $customer->show_customer();
$productQuantity = $product->productQuantity();
$profitDay = $profit->profitDay();
$level = Session::get('level');
?>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    Session::destroy();
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    if($level != 4) {
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Trang chủ</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="orders" class="shortcut card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-l font-weight-bold text-primary text-uppercase mb-1">
                                Đơn hàng chờ xác nhận</div>
                            <?php if ($get_order_quantity) {
                                $quantity = mysqli_num_rows($get_order_quantity);
                            } else {
                                $quantity = 0;
                            } ?>
                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?php echo $quantity ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="customer" class="shortcut card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-l font-weight-bold text-success text-uppercase mb-1">
                                Khách hàng thành viên</div>
                            <?php if ($quantityCus) {
                                $quantityCus = mysqli_num_rows($quantityCus);
                            } else {
                                $quantityCus = 0;
                            } ?>
                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?php echo $quantityCus ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-l font-weight-bold text-warning text-uppercase mb-1">
                                Thu nhập hôm nay</div>
                            <?php
                            $total = 0;
                            if ($profitDay) {

                                while ($resultProfit = $profitDay->fetch_assoc()) {
                                    $total += $resultProfit['loi_nhuan'];
                                }
                            } ?>
                            <div style="height:48px;" class="<?php if (strlen($total) > 7) echo 'h2';
                                                                else echo 'h1' ?> mb-0 font-weight-bold text-gray-800"><span><?php echo $fm->format_currency($total) ?><span>₫</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="products" class="shortcut card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-l font-weight-bold text-danger text-uppercase mb-1">
                                Số lượng sản phẩm</div>
                            <?php if ($productQuantity) {
                                $productQuantity = mysqli_num_rows($productQuantity);
                            } else {
                                $productQuantity = 0;
                            } ?>
                            <div class="h1 mb-0 font-weight-bold text-gray-800"><?php echo $productQuantity ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <div class="d-flex">
        <div class="col-8">
            <!-- <label for="">:</label> -->
            <select style="width: 250px;" class="browser-default custom-select select-date">
                <option selected>-- Thống kê doanh thu theo --</option>
                <option value="7days">7 ngày qua</option>
                <option value="28days">28 ngày qua</option>
                <option value="90days">90 ngày qua</option>
                <option value="365days">365 ngày qua</option>
            </select>
            <div id="myfirstchart" style="height: 250px;"></div>
        </div>
        <div class="col-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active nav-product" href="#">Sản phẩm bán chạy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-product" href="#">Sản phẩm sắp hết hàng</a>
                </li>
            </ul>
            <div class="checkProduct" id="checkProduct" style="background-color: white;">
            </div>
        </div>

    </div>
<?php 
} else {
    ?>
    <div class="text-center">

        <img class="" src="img/pngtree-hand-drawn-cute-girl-working-png-image_835610.jpg" alt="">
    </div>
    <?php
}

?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<?php
include "include/footer.php";
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="js/index.js"></script>
</body>

</html>