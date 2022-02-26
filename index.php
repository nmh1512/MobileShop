<?php
include "./include/header.php";
include "./include/slider.php";
?>

<div class="banner">
  <img src="./banner/banner-iphone.png" alt="" />
</div>
</section>
<section>
  <div class="title">
    <h4><a href="dien-thoai/apple-iphone">APPLE AUTHPRISED RESELLER</a></h4>
  </div>
  <div class="cartegory-list-content">
    <?php
    $getproduct_apple = $product->getproduct_apple();
    if ($getproduct_apple) {
      while ($resultApple = $getproduct_apple->fetch_assoc()) {
    ?>
        <div class="cartegory-content-item">
          <a href="<?php echo $resultApple['url_product']; ?>">
            <img src="admin/uploads/<?php echo $resultApple['hinhanh_sanpham'] ?>" alt="">
            <div class="info">
              <h6><?php echo $resultApple['ten_sanpham']; ?></h6>
              <span class="price"><span><?php echo $fm->format_currency($resultApple['giaban']); ?></span> ₫</span>
            </div>
          </a>
        </div>
    <?php
      }
    }
    ?>
  </div>
</section>
<section>
  <div class="title">
    <h4><a href="dien-thoai">ĐIỆN THOẠI NỔI BẬT</a></h4>
  </div>
  <div class="cartegory-list-content">
    <?php
    $getproduct_feathered = $product->getproduct_feathered();
    if ($getproduct_feathered) {
      while ($resultFeathered = $getproduct_feathered->fetch_assoc()) {
    ?>
        <div class="cartegory-content-item">
          <a href="<?php echo $resultFeathered['url_product']; ?>">
            <img src="admin/uploads/<?php echo $resultFeathered['hinhanh_sanpham'] ?>" alt="">
            <div class="info">
              <h6><?php echo $resultFeathered['ten_sanpham']; ?></h6>
              <span class="price"><?php echo $fm->format_currency($resultFeathered['giaban']); ?> ₫</sp>
            </div>
          </a>
        </div>
    <?php
      }
    }
    ?>
  </div>
</section>
<section>
  <div class="title">
    <h4><a href="may-tinh-bang">TABLET NỔI BẬT</a></h4>
  </div>
  <div class="cartegory-list-content">
    <?php
    $getproduct_feathered_tablet = $product->getproduct_feathered_tablet();
    if ($getproduct_feathered_tablet) {
      while ($resultFeatheredtab = $getproduct_feathered_tablet->fetch_assoc()) {
    ?>
        <div class="cartegory-content-item">
          <a href="<?php echo $resultFeatheredtab['url_product']; ?>">
            <img src="admin/uploads/<?php echo $resultFeatheredtab['hinhanh_sanpham'] ?>" alt="">
            <div class="info">
              <h6><?php echo $resultFeatheredtab['ten_sanpham']; ?></h6>
              <span class="price"><?php echo $fm->format_currency($resultFeatheredtab['giaban']); ?> ₫</sp>
            </div>
          </a>
        </div>
    <?php
      }
    }
    ?>
  </div>
</section>
<section>
  <div class="title">
    <h4><a href="may-tinh-bang">TIN TỨC CÔNG NGHỆ</a></h4>
  </div>
  <div class="d-flex flex-wrap more-news mt-4">

    <?php
    $moreNews = $news->show_news_home();
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
include "include/footer.php";
?>
<script src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
