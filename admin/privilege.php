<?php
include "include/header.php";


?>
<?php
if (isset($_GET['id_member'])) {
    $id = $_GET['id_member'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $privilage = $admin->addPri($id, $_POST);
}
$getPriMem = $admin->getPriMember($id);

$priList = [];
if ($getPriMem) {
    while ($resultPri = $getPriMem->fetch_assoc()) {
        $priList[] = $resultPri['id_phanquyen'];
    }
}

?>
<div style="padding: 0 25px 20px 0;">
    <a style="float: right;" class="btn btn-secondary" href="members"><i class="fas fa-undo-alt"></i> Quay lại</a>
</div>
<?php
if (!empty($_SESSION['current_user'])) {


?>
    <div class="productlist-wrapper" style="padding: 10px;">
        <h1>Phân quyền nhân viên</h1>
        <?php
        if (isset($privilage)) {
            echo $privilage;
        }

        ?>
        <form method="POST" action="">
            <div class="d-flex">
                <div class="col-6">
                    <div class="mt-4">
                        <?php
                        $getPriLeft = $admin->getPriLeftTop();
                        $i = 0;
                        while ($resultLeft1 = $getPriLeft->fetch_assoc()) {
                            $i++;
                        ?>
                            <div class="privilage-item d-flex align-items-center mb-3">
                                <label class="switch">
                                    <input name="privilagesleft[]" <?php
                                                                    if (in_array($resultLeft1['id_phanquyen'], $priList)) {
                                                                    ?> checked <?php } ?> value="<?php echo $resultLeft1['id_phanquyen'] ?>" id="privilege_<?php echo $id ?>" class="privilege" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <h5 class="ml-3"><?php echo $resultLeft1['name'] ?></h5>
                            </div>

                        <?php
                        } ?>
                    </div>
                    <div>
                        <div class="privilage-item d-flex align-items-center mb-3">
                            <label class="switch">
                                <input id="product-switch" class="privilege" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                            <h5 class="ml-3">Quản lý sản phẩm</h5>
                        </div>
                        <?php
                        $getPriLeft = $admin->getPriLeftBottom();
                        $i = 0;
                        while ($resultLeft2 = $getPriLeft->fetch_assoc()) {
                            $i++;
                        ?>
                            <div class="privilage-item-child d-flex align-items-center mb-3">
                                <label class="switch">
                                    <input name="privilagesleft[]" <?php
                                                                    if (in_array($resultLeft2['id_phanquyen'], $priList)) {
                                                                    ?> checked <?php } ?> value="<?php echo $resultLeft2['id_phanquyen'] ?>" id="privilege_<?php echo $id ?>" class="privilege product id<?php echo $i ?>" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <h6 class="ml-3"><?php echo $resultLeft2['name'] ?></h6>
                            </div>

                        <?php
                        } ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-4">
                        <?php

                        $getPriRight = $admin->getPriRight();
                        $i = 0;
                        while ($resultRight = $getPriRight->fetch_assoc()) {
                        ?>
                            <div class="privilage-item d-flex align-items-center mb-3">
                                <label class="switch">
                                    <input name="privilagesright[]" <?php
                                                                    if (in_array($resultRight['id_phanquyen'], $priList)) {
                                                                    ?> checked <?php } ?> value="<?php echo $resultRight['id_phanquyen'] ?>" id="privilege_<?php echo $id ?>" class="privilege" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                                <h5 class="ml-3"><?php echo $resultRight['name'] ?></h5>
                            </div>

                        <?php
                        } ?>
                    </div>
                </div>
            </div>
            <button name="submit" type="submit" class="text-center btn btn-primary"><i class="fa-solid fa-check"></i> Lưu</button>

        </form>

    </div>
<?php
}
?>

</div>
<!-- End of Content Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include "include/footer.php";
?>
<script src="js/privilege.js"></script>

</html>