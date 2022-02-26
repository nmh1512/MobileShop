<?php
include "include/header.php";
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;
    $keywordFix = preg_replace('/([^\pL\.\ ]+)/u', '', $keyword);
    $arr = explode(" ", $keywordFix);
    $searchProduct = $product->search_product($arr);
} else {
    echo "<script>window.location = '404.html'</script>";
}

?>
<?php
if (isset($searchProduct)) {
?>
    <div class="wrapper">
        <div style="width: 1200px;" class="mx-auto order-container">
            <div class="cart-content-left-table p-3 search-content">
                <?php
                $quantitySearch = $product->quantity_search($arr);
                if ($quantitySearch) {
                    $quantityS = mysqli_num_rows($quantitySearch);
                    ?>
                    <h5 class="mb-3"><?php echo $quantityS; ?> kết quả ứng với từ khóa: <span id="key"><?php echo $keywordFix ?></span></h5>
                <?php
                }
                ?>

                <script>
                    var key = $("#key").html();
                    $('.search').val(key);
                </script>
                <?php
                $getCat = $product->get_cat($arr);
                if ($getCat) {
                    if (mysqli_num_rows($getCat) > 1) {
                ?> <div class="sime-box">
                            <div class="brandSelect">
                                <?php
                                while ($resultCat = $getCat->fetch_assoc()) {
                                    if ($resultCat['id_danhmuc'] == 73 || $resultCat['id_danhmuc'] == 74) {
                                        $count = $product->countProduct($arr, $resultCat['id_danhmuc']);
                                ?>
                                        <button data-count="<?php echo mysqli_num_rows($count) ?>" type="button" class="brand-search search-top"><?php echo $resultCat['ten_danhmuc'] ?> (<?php echo mysqli_num_rows($count) ?>)</button>
                                        <?php
                                    } else {
                                        $getId = $product->get_id($arr, $resultCat['id_danhmuc']);
                                        while ($resultId = $getId->fetch_assoc()) {
                                            $getBrand = $product->get_brand($resultCat['id_danhmuc'], $resultId['id_loaisanpham']);
                                            if ($getBrand) {
                                                while ($resultBrand = $getBrand->fetch_assoc()) {
                                                    $count1 = $product->count_product_by_id($arr, $resultId['id_loaisanpham']);
                                        ?>
                                                    <button data-count="<?php echo mysqli_num_rows($count1) ?>" type="button" class="brand-search search-top"><?php echo $resultBrand['ten_loaisanpham'] ?> (<?php echo mysqli_num_rows($count1) ?>)</button>
                                <?php
                                                }
                                            }
                                        }
                                    }
                                } ?>
                            </div>
                        </div>
                <?php
                    }
                }

                ?>
                <div class="cartegory-list">
                    <div class="content-load">
                        <div class="cartegory-list-top sime-box1 py-1 px-1">
                            <div class="dropdown select-box">
                                <div class="dropdown">
                                    <a href="" class="dropdown-toggle" type="button" id="selectText" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Giá</a>
                                    <div class="dropdown-menu price-filter pb-0" aria-labelledby="dropdownMenuButton">
                                        <div id="list-search" class="container">
                                            <div class="pb-2">
                                                <ul class="option text-center p-0 pt-1 pb-2 m-2">
                                                    Dưới 5 triệu
                                                </ul>
                                                <ul class="option text-center p-0 pt-1 pb-2 m-2">
                                                    Từ 5 đến 10 triệu
                                                </ul>
                                                <ul class="option text-center p-0 pt-1 pb-2 m-2">
                                                    Từ 10 đến 15 triệu
                                                </ul>
                                                <ul class="option text-center p-0 pt-1 pb-2 m-2">
                                                    Từ 15 đến 20 triệu
                                                </ul>
                                                <ul class="option text-center p-0 pt-1 pb-2 m-2">
                                                    Trên 20 triệu
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown select-box">
                                <div class="dropdown">
                                    <a href="" class="dropdown-toggle" type="button" id="selectText1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sắp xếp theo</a>
                                    <div id="list-search" class="container price-filter1 dropdown-menu pb-0" aria-labelledby="dropdownMenuButton">
                                        <div class="container">
                                            <div class="pb-2">
                                                <ul class="option1 text-center p-0 pt-1 pb-2 m-2">Giá thấp đến cao</ul>
                                                <ul class="option1 text-center p-0 pt-1 pb-2 m-2">Giá cao đến thấp</ul>
                                                <ul class="option1 text-center p-0 pt-1 pb-2 m-2">Sản phẩm mới</ul>
                                                <ul class="option1 text-center p-0 pt-1 pb-2 m-2">Sản phẩm cũ</ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cartegory-list-content">
                            <?php

                            if ($searchProduct) {
                                while ($result = $searchProduct->fetch_assoc()) {

                            ?>
                                    <div class="cartegory-content-item">
                                        <a href="<?php echo $result['url_product']; ?>">
                                            <img class="productImg" src="admin/uploads/<?php echo $result['hinhanh_sanpham'] ?>" alt="">
                                            <div class="info">
                                                <h6><?php echo $result['ten_sanpham'] ?></h6>
                                                <span class="price"><span><?php echo $fm->format_currency($result['giaban']); ?></span> ₫</sp>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="text-center btn-load">
                        <?php
                        if ($quantitySearch) {
                            $quantity = mysqli_num_rows($quantitySearch);
                            $quantityShow = $quantity - 20;
                            if ($quantityShow > 0) {
                        ?>
                                <button data-quantity="<?php echo $quantity; ?>" type="btn" class="load-more brand-search">Xem thêm <span id="quantityProduct"><?php echo $quantityShow; ?></span> sản phẩm <i class="fas fa-caret-down"></i></button>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <input hidden id="query" type="text" value="" />
            <input hidden id="queryDate" type="text" value="" />
        </div>

    <?php
}

    ?>
    </div>
    <?php
    include "include/footer.php";
    ?>
    </body>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="js/filter.js"></script>
    <script src="js/loadmore.js"></script>


    </html>