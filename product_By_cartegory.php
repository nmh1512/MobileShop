<?php
include "include/header.php";

?>
<?php
if (!isset($_GET['url']) || $_GET['url'] == NULL) {
    echo "<script>window.location = '404.html'</script>";
} else {
    $url = $_GET['url'];
}
if($url == 'tin-tuc') {
    ?>
    <div class="wrapper">
    <?php

    $showNews = $news->show_news();
    $showHotNews = $news->hot_news();

    ?>

    <h3 class="my-3">Tin tức công nghệ</h3>
    <section class="product-bottom p-0">
        <div class="blog-content box p-0">
            <?php
            if ($showNews) {
                while ($result = $showNews->fetch_assoc()) {
            ?>
                    <div class="row news-item">
                        <div class="col-4 p-0">
                            <img class="p-0" style="width:218px; height: 150px;" src="admin/uploads/<?php echo $result['img'] ?>" alt="">
                        </div>
                        <div class="pl-1 col-8 news-info">
                            <a href="<?php echo $url ?>/<?php echo $result['url_tintuc'] ?>">
                                <h3 style="font-size: 22px;"><?php echo $fm->textShorten($result['title'], 100) ?></h3>
                            </a>
                            <span><?php echo $fm->formatDate1($result['ngay_dang']) ?></span>
                            <p><?php echo $fm->textShorten($result['noidung'], 200) ?></p>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="content-right">
            <div class="box">
                <div class="hot-news">
                    <h5 class="m-0">Bài viết đáng chú ý</h5>
                </div>
                <?php
            if ($showHotNews) {
                while ($resultHot = $showHotNews->fetch_assoc()) {
            ?>
                    <div class="row hot-news-item my-3">
                        <div class="col-4 pr-0">
                            <img class="p-0" style="width:100px; height: 70px;" src="admin/uploads/<?php echo $resultHot['img'] ?>" alt="">
                        </div>
                        <div class="col-8 news-info pl-0">
                                                        <a href="tin-tuc/<?php echo $result['url_tintuc'] ?>">

                                <h3 style="font-size: 14px;"><?php echo $fm->textShorten($resultHot['title'], 70) ?></h3>
                            </a>
                            <span><?php echo $fm->formatDate1($resultHot['ngay_dang']) ?></span>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            </div>
        </div>

    </section>
</div>
<?php
} else {
?>
<div class="wrapper">
    <div class="banner">
        <img src="./banner/banner-iphone.png" alt="" />
    </div>
    <section class="cartegory">
        <div class="cartegory-container">
            <div class="caregory-top top pb-0">
                <a href="home"><i class="fa-solid fa-house"></i> Trang chủ</a>
                <span>&#8250;&#8250;</span>
                <?php
                $catName = $cat->show_cartegory_name($url);
                if ($catName) {
                    $resultName = $catName->fetch_assoc();
                    $id = $resultName['id_danhmuc'];

                ?>
                    <input id="idCat" type="text" hidden value="<?php echo $id ?>">
                    <p><?php echo $resultName['ten_danhmuc'] ?></p>

                <?php
                }
                $quantityByCat = $cat->quantity_by_cat($id);
                $str = '';
                if ($id == 73) {
                    $str = ' Điện thoại';
                } elseif ($id == 74) {
                    $str = ' Máy tính bảng';
                } else {
                    $str = ' Phụ kiện';
                }
                ?>
            </div>
            <div class="brand-logo d-flex pb-1">
                <?php
                $brandBycat = $brand->show_logo_brand($id);
                if ($brandBycat) {
                    while ($resultBrand = $brandBycat->fetch_assoc()) {
                ?>
                        <a href="<?php echo $resultBrand['url_cat'] ?>/<?php echo $resultBrand['url_brand'] ?>" class="text-center border pt-1 pb-2 mb-2 mr-2 logo-brand">
                            <img class="w-75" src="admin/uploads/<?php echo $resultBrand['logo'] ?>" alt="">
                        </a>
                <?php
                    }
                }

                ?>
            </div>
            <div class="cartegory-list">
                <div class="cartegory-list-top box py-2">
                    <?php
                    if ($quantityByCat) {
                        $quantity = mysqli_num_rows($quantityByCat);
                    ?>
                        <p class="font-weight-bold mr-4" style="font-size: 15px;"><?php echo $quantity . $str ?> </p>
                    <?php
                    }
                    ?>
                    <p style="font-size: 0.8rem;">Lọc danh sách: </p>
                    <div class="dropdown select-box">
                        <div class="dropdown">
                            <a href="" class="dropdown-toggle" type="button" id="selectText" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Giá</a>
                            <div class="dropdown-menu price-filter pb-0" aria-labelledby="dropdownMenuButton">
                                <div id="list" class="container">
                                    <div class="row justify-content-center pb-2">
                                        <ul class="option text-center p-0 pt-1 pb-2 m-1">
                                            Dưới 5 triệu
                                        </ul>
                                        <ul class="option text-center p-0 pt-1 pb-2 m-1">
                                            Từ 5 đến 10 triệu
                                        </ul>
                                        <ul class="option text-center p-0 pt-1 pb-2 m-1">
                                            Từ 10 đến 15 triệu
                                        </ul>
                                        <ul class="option text-center p-0 pt-1 pb-2 m-1">
                                            Từ 15 đến 20 triệu
                                        </ul>
                                        <ul class="option text-center p-0 pt-1 pb-2 m-1">
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
                            <div id="list" class="container dropdown-menu pb-0 price-filter1" aria-labelledby="dropdownMenuButton">
                                <div class="container">
                                    <div class="row justify-content-center pb-2">
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
                    $productBycat = $cat->get_product_by_cat($id);

                    if ($productBycat) {
                        while ($result = $productBycat->fetch_assoc()) {

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
                <div class="text-center btn-load">
                    <?php
                    if ($quantityByCat) {
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
            <div>
                <input hidden id="query" type="text" value="" />
                <input hidden id="queryDate" type="text" value="" />
            </div>
        </div>
    </section>
</div>
<?php
}
include "include/footer.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="js/filter.js"></script>
<script src="js/loadmore.js"></script>
</body>

</html>