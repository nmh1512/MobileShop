<?php
include "include/header.php";


?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $insert_news = $news->insert_news($_POST, $_FILES);
    echo "<script>window.location = 'news'</script>";
}

?>
<div style="padding: 0 25px 20px 0;">
    <a style="float: right;" class="btn btn-secondary" href="news"><i class="fas fa-undo-alt"></i> Quay lại</a>
</div>

<div class="productlist-wrapper" style="padding: 10px;">
    <h1>Thêm tin tức</h1>
    <form action="add-news" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Tên tác giả</label>
                <input require name="writer" type="text" class="form-control" id="" placeholder="Nhập tên tác giả...">
            </div>

            <div class="col-md-6">
                <label for="">Tiêu đề</label></br>
                <input require name="title" type="text" class="form-control" id="" placeholder="Nhập tiêu đề...">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Type</label>
                <select name="type" class="form-control">
                    <option value="">-- Chọn loại tin tức --</option>
                    <option value="0">Thông thường</option>
                    <option value="1">Tin hot</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Url</label>
                <input require name="url" type="text" class="form-control" id="" placeholder="Nhập url tiêu đề...">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Nội dung</label>
            <textarea require name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Upload ảnh đại diện</label>
                <input required type="file" name="image">
            </div>
        </div>

        <button name="submit" type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> Lưu</button>
    </form>
</div>


</div>
<!-- End of Content Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include "include/footer.php";
?>
<script>
    CKEDITOR.replace('exampleFormControlTextarea1', {
        filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
</script>

</html>