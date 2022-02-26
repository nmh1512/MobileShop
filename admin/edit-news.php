<?php
include "include/header.php";



?>
<?php

if (!isset($_GET['id_tintuc']) || $_GET['id_tintuc'] == NULL) {
    echo "<script>window.location = '404.html'</script>";
} else {
    $id_tintuc = $_GET['id_tintuc'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit1'])) {
    $updateNews = $news->updateNews($_POST, $_FILES, $id_tintuc);
    echo "<script>window.location = 'news'</script>";
}

?>
<div class="row">
    <h2 class="pl-4 col-md-6">Sửa thông tin bài viết</h2>
    <div class="col-md-6" style="padding: 0 25px 20px 0;">
        <a style="float: right;" class="btn btn-secondary" href="news"><i class="fas fa-undo-alt"></i> Quay lại</a>
    </div>
</div>

<hr>

<div class="productlist-wrapper" style="padding: 10px;">
    <?php
    $getNews = $news->getNewsById($id_tintuc);
    if ($getNews) {
        $result = $getNews->fetch_assoc();
    ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="">Tên tác giả</label>
                    <input require name="writer" type="text" class="form-control" id="" value="<?php echo $result['tacgia'] ?>">
                </div>

                <div class="col-md-6">
                    <label for="">Tiêu đề</label></br>
                    <input require name="title" type="text" class="form-control" id="" value="<?php echo $result['title'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="">Type</label>
                    <div class="type-choice">
                        <select name="type" class="form-control" id="id_type">
                            <option>-- Chọn loại tin tức --</option>
                            <?php
                            if ($result['type'] == 1) {
                            ?>
                                <option selected value="1">Tin hot</option>
                                <option value="0">Thông thường</option>
                            <?php
                            } else {
                            ?>
                                <option value="1">Tin hot</option>
                                <option selected value="0">Thông thường</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Url</label>
                    <input require name="url" type="text" class="form-control" id="" value="<?php echo $result['url_tintuc'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Nội dung</label>
                <textarea require name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $result['noidung']; ?></textarea>
            </div>
          
            <div class="form-group border border-primary col-8">
                <div class="p-3">
                    <label for="">Upload hình ảnh sản phẩm</label>
                    <img class=" py-3 border border-left-primary border border-right-primary" src="uploads/<?php echo $result['img']; ?>" width="120">
                    <input type="file" name="image">
                </div>
            </div>

            <button name="submit1" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Lưu</button>
        </form>
    <?php

    }
    ?>
</div>


</div>
<!-- End of Content Wrapper -->



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