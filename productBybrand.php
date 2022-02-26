<?php
include "include/header.php";

?>
<?php

if (!isset($_GET['urlBrand']) || $_GET['urlBrand'] == NULL) {
    echo "<script>window.location = '404.html'</script>";
} else {
    $urlBrand = $_GET['urlBrand'];
    $urlCat = $_GET['urlCat'];
}
if ($urlCat == 'tin-tuc') {
?>
    <div style="width: 800px" class="wrapper">
        <?php
        $newsContent = $news->new_content($urlBrand);
        if ($newsContent) {
            $result = $newsContent->fetch_assoc();
        ?>
            <div class="mx-auto">
                <h1 class="text-center mx-auto mt-4 font-weight-bold"><?php echo $result['title'] ?></h1>
                <div class="author-info text-center">
                    <p><span class="author font-weight-bold"><?php echo $result['tacgia'] ?></span> <span class="date">&bull; <?php echo $fm->formatDate1($result['ngay_dang']) ?></span></p>
                </div>
                <div class="news-content">
                    <?php echo $result['noidung'] ?>
                </div>
            </div>
        <?php
        }
        ?>

        <section class="m-0"> 
            <div class="hot-news">
                <h5 class="w-25 m-0">Bài viết liên quan</h5>
            </div>
            <div class="d-flex flex-wrap more-news mt-4">
               
                <?php
                $moreNews = $news->show_more_news($urlBrand);
                if ($moreNews) {
                    while ($resultMore = $moreNews->fetch_assoc()) {
                ?>
                        <div class="col-4 p-0 mb-4 more-news-item">
                            <img src="admin/uploads/<?php echo $resultMore['img'] ?>" alt="">
                            <a class="mt-3" href="tin-tuc/<?php echo $resultMore['url_tintuc'] ?>" style="font-size: 13px;"><?php echo $resultMore['title'] ?></a>
                        </div>
                <?php
                    }
                }
                ?>
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
                    $catName = $brand->show_cartegory_name_by_brand($urlBrand, $urlCat);
                    if ($catName) {
                        $resultName = $catName->fetch_assoc();
                        $id = $resultName['id_loaisanpham'];
                    ?>
                        <input id="idBrand" type="text" hidden value="<?php echo $id ?>">
                        <a href="<?php echo $resultName['url_cat'] ?>"><?php echo $resultName['ten_danhmuc'] ?></a>
                    <?php
                    }
                    ?>
                    <span>&#8250;&#8250;</span>
                    <?php
                    $brandName = $brand->show_brand_name($id);
                    if ($brandName) {
                        while ($resultNameBrand = $brandName->fetch_assoc()) {

                    ?>
                            <p><?php echo $resultNameBrand['ten_loaisanpham'] ?></p>
                    <?php
                        }
                    }
                    $quantityByBrand = $brand->quantity_by_brand($id);
                    $str = '';
                    $arr = [
                        'samsung' => ' Samsung',
                        'xiaomi' => ' Xiaomi',
                        'oppo' => ' OPPO',
                        'vivo' => ' Vivo',
                        'nokia' => ' Nokia',
                        'realme' => ' realme',
                        'huawei' => ' Huawei'
                    ];
                    if ($urlCat == 'dien-thoai') {
                        $str = ' Điện thoại';
                        if ($urlBrand == 'apple-iphone') {
                            $str .= ' Apple (Iphone)';
                        } else {
                            foreach ($arr as $url => $name) {
                                if ($urlBrand == $url) {
                                    $str .= $name;
                                }
                            }
                        }
                    } elseif ($urlCat == 'may-tinh-bang') {
                        $str = ' Máy tính bảng';
                        if ($urlBrand == 'apple-ipad') {
                            $str .= ' Apple (Ipad)';
                        } else {
                            foreach ($arr as $url => $name) {
                                if ($urlBrand == $url) {
                                    $str .= $name;
                                }
                            }
                        }
                    }

                    ?>

                </div>
                <div class="cartegory-list">
                    <div class="cartegory-list-top box py-2">
                        <?php
                        if ($quantityByBrand) {
                            $quantity = mysqli_num_rows($quantityByBrand);
                        ?>
                            <p class="font-weight-bold mr-4" style="font-size: 15px;"><?php echo $quantity . $str ?> </p>
                        <?php
                        }
                        ?>
                        <p style="font-size: 0.8rem;">Lọc danh sách: </p>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" type="button" role="button" aria-haspopup="true" aria-expanded="false">Danh mục <span class="caret"></span></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <?php
                                        $brandBycat = $brand->show_logo_brand_by_cat($id);
                                        if ($brandBycat) {
                                            while ($resultBrand = $brandBycat->fetch_assoc()) {
                                        ?>
                                                <ul class="text-center p-0 pt-1 pb-2 m-2">
                                                    <a class="w-100 pt-2 pb-3 px-3" href="<?php echo $resultBrand['url_cat'] ?>/<?php echo $resultBrand['url_brand'] ?>">
                                                        <img class="w-75" src="admin/uploads/<?php echo $resultBrand['logo'] ?>" alt="">
                                                    </a>
                                                </ul>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown select-box">
                            <div class="dropdown">
                                <a href="" class="dropdown-toggle" type="button" id="selectText" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Giá</a>
                                <div class="dropdown-menu price-filter pb-0" aria-labelledby="dropdownMenuButton">
                                    <div id="list" class="container">
                                        <div class="row justify-content-center  pb-2">
                                            <ul class="option text-center p-0 pt-1 pb-2 m-1">Dưới 5 triệu</ul>
                                            <ul class="option text-center p-0 pt-1 pb-2 m-1">Từ 5 đến 10 triệu</ul>
                                            <ul class="option text-center p-0 pt-1 pb-2 m-1">Từ 10 đến 15 triệu</ul>
                                            <ul class="option text-center p-0 pt-1 pb-2 m-1">Từ 15 đến 20 triệu</ul>
                                            <ul class="option text-center p-0 pt-1 pb-2 m-1">Trên 20 triệu</ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="dropdown select-box">
                            <div class="dropdown">
                                <a href="" class="dropdown-toggle" type="button" id="selectText1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sắp xếp theo</a>
                                <div id="list" class="container dropdown-menu price-filter1 pb-0" aria-labelledby="dropdownMenuButton">
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
                        $productBybrand = $brand->get_product_by_brand($id);

                        if ($productBybrand) {
                            while ($result = $productBybrand->fetch_assoc()) {

                        ?>
                                <div class="cartegory-content-item">
                                    <a href="<?php echo $result['url_product']; ?>">
                                        <img class="productImg" src="admin/uploads/<?php echo $result['hinhanh_sanpham'] ?>" alt="">
                                        <div class="info info-product-brand text-left pt-3">
                                            <h6 class="p-0 font-weight-bold"><?php echo $result['ten_sanpham'] ?></h6>
                                            <span class="price"><span><?php echo $fm->format_currency($result['giaban']); ?></span> ₫</sp>
                                        </div>
                                        <ul style="font-size: 0.8rem;" class="info-product text-left p-0 mt-2">
                                            <li class="first">Màn hình <?php echo $result['manhinh'] ?>, Chip <?php echo $result['chip'] ?></li>
                                            <li>RAM <?php echo $result['ram'] ?>, ROM <?php echo $result['rom'] ?></li>
                                            <li>Camera sau: <?php echo $result['cam_sau'] ?></li>
                                            <li>Camera trước: <?php echo $result['cam_truoc'] ?></li>
                                            <li>Pin <?php echo $result['pin'] ?>, Sạc <?php echo $result['sac'] ?></li>
                                        </ul>
                                    </a>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="text-center btn-load">
                        <?php
                        if ($quantityByBrand) {
                            $quantity = mysqli_num_rows($quantityByBrand);
                            $quantityShow = $quantity - 20;
                            if ($quantityShow > 0) {
                        ?>
                                <button data-quantity="<?php echo $quantity; ?>" id="load-more" type="btn" class="load-more brand-search">Xem thêm <span id="quantityProduct"><?php echo $quantityShow; ?></span> sản phẩm <i class="fas fa-caret-down"></i></button>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div>
                <input hidden id="query" type="text" value="" />
                <input hidden id="queryDate" type="text" value="" />
            </div>
        </section>

    </div>
<?php
}
include "include/footer.php";
?>

<script src="js/filter.js"></script>
<script src="js/loadmore.js"></script>


</body>

</html>