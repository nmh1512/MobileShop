<?php
include "include/header.php";
?>
<?php
$login_check = Session::get('customer_login');
if (isset($_GET['phone'])) {
    $phone = $_GET['phone'];

?>
    <input id="customer_id" type="text" hidden value="<?php echo $phone ?>">
    <div class="wrapper">
        <div style="width: 95%;" class="mx-auto order-container">
            <div class="cart-content-left-table box mt-4">
                <h5 class="mb-4">Lịch sử mua hàng: <?php echo $phone ?></h5>

                <div class="table-cart">

                </div>
            </div>
        </div>
    </div>
    <?php
} elseif ($login_check) {
    $customer_id = Session::get('customer_id');
    $get_odered = $ct->get_odered($customer_id);
    if (isset($get_odered)) {
    ?>
        <input id="customer_id" type="text" hidden value="<?php echo $customer_id ?>">

        <div class="wrapper">
            <div style="width: 95%;" class="mx-auto order-container">
                <div class="cart-content-left-table box mt-4">
                    <h5 class="mb-4">Lịch sử mua hàng</h5>

                    <div class="table-cart">

                    </div>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo "<script>window.location = '404.html'</script>";
}
include "include/footer.php";

?>

</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<script>
    var customer_id = $('#customer_id').val()

    function fetch_data() {
        $(".modal-busy").show();
        $.ajax({
            type: "POST",
            url: "ajax/loadorderdetail.php",
            data: {
                customer_id: customer_id
            },
            success: function(data) {
                $('.table-cart').html(data)
                $(".modal-busy").hide();
            }
        })
    }
    fetch_data();

    function removeOrder(str) {
        var id = str;
        $.ajax({
            type: "POST",
            url: "ajax/loadorderdetail.php",
            data: {
                id: id
            },
            success: function(data) {
                fetch_data();
            }
        })
    }

    function received(str) {
        var receivedId = str;
        $.ajax({
            type: "POST",
            url: "ajax/loadorderdetail.php",
            data: {
                receivedId: receivedId
            },
            success: function(data) {
                fetch_data();
            }
        })
    }
</script>



</html>