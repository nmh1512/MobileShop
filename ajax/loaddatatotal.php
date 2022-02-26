<?php
include "../admin/lib/database.php";
$db = new Database;
$subTotal = 0;
$customer_id = $_POST['customer_id'];

$query = "SELECT * FROM tb_giohang WHERE customer_id = '$customer_id' ORDER BY id_cart DESC";
$sql_select = $db -> select($query);
if(mysqli_num_rows($sql_select) > 0){
    while($result = mysqli_fetch_assoc($sql_select)){
        $total = $result['giaban'] * $result['soluong'];
        $subTotal += $total;
    }
}
echo $subTotal.' '.'₫';


?>