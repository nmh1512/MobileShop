<?php
    
    include "../class/product.php";
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
?>
<?php
    $product = new product;
    $id_danhmuc = $_GET['id_danhmuc'];

?>
    <option value="">-- Chọn loại sản phẩm --</option>;
<?php
    $show_brand_ajax = $product -> show_brand_ajax($id_danhmuc);
    if ($show_brand_ajax) {
        while ($result = $show_brand_ajax -> fetch_assoc()) {
        ?>
    <option value="<?php echo $result['id_loaisanpham'] ?>"><?php echo $result['ten_loaisanpham'] ?></option>;

<?php
        }
    }

?>
