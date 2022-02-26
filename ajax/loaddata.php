<?php
include '../admin/lib/format.php';
include "../admin/lib/database.php";
$db = new Database;
$fm = new Format;
$customer_id = $_POST['customer_id'];
$output = '';
$query = "SELECT tb_giohang.*, tb_sanpham.soluong AS sl FROM tb_giohang INNER JOIN tb_sanpham ON tb_giohang.id_sanpham = tb_sanpham.id_sanpham WHERE customer_id='$customer_id' ORDER BY id_cart DESC";
$sql_select = $db -> select($query);
$output .= '
    <table id="table">
        <tr>
            <th scope="col">
                <p>Sản phẩm</p>
            </th>
            <th scope="col">
                <p>Tên sản phẩm</p>
            </th>
            <th scope="col">
                <p>Màu</p>
            </th>
            <th scope="col">
                <p>Số lượng</p>
            </th>
            <th scope="col">
                <p>Thành tiền</p>
            </th>
            <th scope="col"></th>
        </tr>


';

if(mysqli_num_rows($sql_select) > 0){
    while($result = mysqli_fetch_assoc($sql_select)){
        $output .= '
        <tr>
        <td><img src="admin/uploads/'. $result['hinhanh_sanpham'] .'" alt="" /></td>
        <td>
          <p class="tensanpham">'. $result['ten_sanpham'] .'</p>
        </td>
        <td>
          <p class="mausanpham">'. $result['mau_sanpham'] .'</p>
        </td>
        <td>
          <div onclick="update_minus('.$result['id_cart'].')" style="font-size: 0.65rem;" class="p-1 minus btn btn-secondary cartnumber px-2"><i class="fa-solid fa-minus"></i></div><input readonly class="text-center cartinput px-2 py-1 quantity'. $result['id_cart'] .'" type="text" value="'.$result['soluong'].'" min="1" max="'.$result['sl'].'" /><div onclick="update_plus('.$result['id_cart'].')" style="font-size: 0.65rem;" class="p-1 plus btn btn-danger cartnumber px-2"><i class="fa-solid fa-plus"></i></div>
        </td>
        <td>
          <p class="price">'.$fm->format_currency($result['giaban'] * $result['soluong']).'₫
        </td>
        <td>
          <div class="delete">
            <a class="d-flex href="#" onclick="removeProduct('.$result['id_cart'].')"><i class="fa-solid fa-circle-xmark"></i>Xóa</a>    
          </div>
        </td>
      </tr>
        ';

    }
} 
$output .= '
</table>
';
echo $output;
?>

