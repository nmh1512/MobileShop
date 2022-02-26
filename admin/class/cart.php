<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");
include_once($filepath . "/../lib/format.php");
?>
<?php
class Cart
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($id_sanpham, $color, $quantity, $id_login, $customer_id)
    {
        $quantity = $this->fm->validation($quantity);
        $color = $this->fm->validation($color);
        $id_sanpham = mysqli_real_escape_string($this->db->link, $id_sanpham);
        $color = mysqli_real_escape_string($this->db->link, $color);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $sId = $id_login;
        $query = "SELECT * FROM tb_sanpham WHERE id_sanpham = '$id_sanpham'";
        $result = $this->db->select($query)->fetch_assoc();
        $ten_sanpham = $result['ten_sanpham'];
        $giaban = $result['giaban'];
        $hinhanh_sanpham = $result['hinhanh_sanpham'];
        if ($customer_id == 'none') {
            $customer_id = $id_login;
            $check_cart = "SELECT id_sanpham, mau_sanpham FROM tb_giohang WHERE id_sanpham = '$id_sanpham' AND mau_sanpham = '$color' AND guest = '$customer_id'";
            $result_check = $this->db->select($check_cart);
            if ($result_check) {
                $query_plus = "UPDATE tb_giohang SET soluong = soluong + $quantity WHERE mau_sanpham = '$color' AND id_sanpham = '$id_sanpham' AND guest = '$customer_id'";
                $update_quantity = $this->db->update($query_plus);
                if ($update_quantity) {
                    echo "<script>window.location = 'gio-hang'</script>";
                }
            } else {
                $this->db->update("SET foreign_key_checks = 0");
                $query_cart = "INSERT INTO tb_giohang (id_sanpham, s_id, ten_sanpham, mau_sanpham, giaban, soluong, hinhanh_sanpham, customer_id, guest) 
                        VALUES ('$id_sanpham', '$sId', '$ten_sanpham', '$color', '$giaban', '$quantity', '$hinhanh_sanpham', '', '$customer_id')";
                $insert_cart = $this->db->insert($query_cart);

                if ($insert_cart) {
                    echo "<script>window.location = 'gio-hang'</script>";
                } else {
                    echo "<script>window.location = '404.html'</script>";
                }
                $this->db->update("SET foreign_key_checks = 1");
            }
        } else {
            $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
            $check_cart = "SELECT id_sanpham, mau_sanpham FROM tb_giohang WHERE id_sanpham = '$id_sanpham' AND mau_sanpham = '$color' AND customer_id = '$customer_id'";
            $result_check = $this->db->select($check_cart);


            if ($result_check) {
                $query_plus = "UPDATE tb_giohang SET soluong = soluong + $quantity WHERE mau_sanpham = '$color' AND id_sanpham = '$id_sanpham' AND customer_id = '$customer_id'";
                $update_quantity = $this->db->update($query_plus);
                if ($update_quantity) {
                    echo "<script>window.location = 'gio-hang'</script>";
                }
            } else {
                $query_cart = "INSERT INTO tb_giohang (id_sanpham, s_id, ten_sanpham, mau_sanpham, giaban, soluong, hinhanh_sanpham, customer_id) 
                    VALUES ('$id_sanpham', '$sId', '$ten_sanpham', '$color', '$giaban', '$quantity', '$hinhanh_sanpham', '$customer_id')";
                $insert_cart = $this->db->insert($query_cart);

                if ($insert_cart) {
                    echo "<script>window.location = 'gio-hang'</script>";
                } else {
                    echo "<script>window.location = '404.html'</script>";
                }
            }
        }
    }
    public function get_product_cart($id)
    {
        if ($id == Session::get('customer_id')) {
            $query = "SELECT * FROM tb_giohang WHERE customer_id = '$id'";
        } else {
            $query = "SELECT * FROM tb_giohang WHERE guest = '$id'";
        }
        $result = $this->db->select($query);
        if ($result) {
            return $result;
        } else {
            echo '  <div class="text-center mx-auto mt-4 pt-4">
            <p style="font-size: 2rem;">Không có sản phẩm nào trong giỏ hàng, hãy đi mua sắm ngay !</p>
            <a href="home" class="btn btn-outline-danger px-4 py-3"><i class="fa-solid fa-house"></i> Về trang chủ</a>
        </div>';
        }
    }
    public function insert_order($data, $customer_id, $orderId)
    {
        $this->db->update("SET foreign_key_checks = 0");
        $userName = mysqli_real_escape_string($this->db->link, $data['name']);
        $userPhone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $userEmail = mysqli_real_escape_string($this->db->link, $data['email']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $district = mysqli_real_escape_string($this->db->link, $data['district']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $note = mysqli_real_escape_string($this->db->link, $data['note']);
        $payMethod = mysqli_real_escape_string($this->db->link, $data['pay-method']);
        if ($customer_id == Session::get('customer_id')) {
            $query = "SELECT * FROM tb_giohang WHERE customer_id = '$customer_id'";
            $get_product = $this->db->select($query);
            $href = 'href="lich-su-mua-hang"';
        } else {
            $query = "SELECT * FROM tb_giohang WHERE guest = '$customer_id'";
            $customer_id = $userPhone;
            $href = 'href="lich-su-mua-hang?phone=' . $userPhone . '"';

            $queryCheck = "SELECT * FROM tb_tk_khachhang WHERE guest = '$customer_id'";
            $get_product = $this->db->select($queryCheck);
            if ($get_product) {
                $queryCus = "UPDATE tb_tk_khachhang 
                SET name = '$userName',
                    email = '$userEmail',
                    sdt = '$userPhone',
                    tinh_thanhpho = '$city',
                    quan_huyen ='$district', 
                    dia_chi = '$address' WHERE guest = '$customer_id'";
                $getId = "SELECT guest FROM tb_tk_khachhang WHERE guest = '$customer_id'";
            } else {
                $queryCus = "INSERT INTO tb_tk_khachhang (guest, name, email, sdt, tinh_thanhpho, quan_huyen, dia_chi) 
            VALUES ('$customer_id', '$userName', '$userEmail', '$userPhone', '$city', '$district', '$address')";
            }
            $this->db->insert($queryCus);
            $get_product = $this->db->select($query);
            
            $getId = "SELECT id FROM tb_tk_khachhang WHERE guest = '$customer_id'";
            $resultId = $this->db->insert($getId);
            $id = $resultId->fetch_assoc();
            $customer_id = $id['id'];
        }
        if ($get_product) {
            $queryCheckCode = "SELECT * FROM tb_thongtin_donhang WHERE ma_donhang = '$orderId'";
            $checkQueryCode = $this->db->select($queryCheckCode);
            if ($checkQueryCode) {
                $orderId .= 1;
            }
            $query_info = "INSERT INTO tb_thongtin_donhang (customer_id, ma_donhang, ho_ten, sdt, email, tinh_thanhpho, quan_huyen, dia_chi, ghichu, pt_thanhtoan) 
                            VALUES ('$customer_id', '$orderId', '$userName', '$userPhone', '$userEmail', '$city', '$district', '$address', '$note', '$payMethod')";
            $result_info = $this->db->insert($query_info);
            if ($result_info) {
                $query_getId = "SELECT * FROM tb_thongtin_donhang WHERE ma_donhang = '$orderId'";
                $result_getId = $this->db->select($query_getId)->fetch_assoc();
                $id_donhang = $result_getId['id'];
                while ($result = $get_product->fetch_assoc()) {
                    $productId = $result['id_sanpham'];
                    $productName = $result['ten_sanpham'];
                    $color = $result['mau_sanpham'];
                    $quantity = $result['soluong'];
                    $totalPrice = $result['soluong'] * $result['giaban'];
                    $img = $result['hinhanh_sanpham'];
                    $query_order = "INSERT INTO tb_donhang (id_donhang, id_sanpham, ten_sanpham, mau_sanpham, so_luong, hinhanh_sanpham, giaban) 
                    VALUES ('$id_donhang', '$productId', '$productName', '$color', '$quantity', '$img', '$totalPrice')";
                    $this->db->insert($query_order);
                }
            }
        }
        $clear = "<script>$('body').empty();</script>
        <div class='ordSucc text-center'><img class='w-75' src='logo/Green-Check.png' alt=''><div><h5>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi</h5><p>Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất</p></div>   <div class='d-flex w-75 text-center mx-auto justify-content-between'><div><a type='button' href='home' class='btn btn-danger col-12'>Về trang chủ</a></div><div><a type='button'" . $href . "class='btn btn-success col-12'>Xem đơn hàng</a></div></div>
        ";
        $this->db->update("SET foreign_key_checks = 1");
        return $clear;
    }
    public function dell_all_data_cart($customer_id)
    {
        if ($customer_id == Session::get('customer_id')) {
            $query = "DELETE FROM tb_giohang WHERE customer_id = '$customer_id'";
        } else {
            $query = "DELETE FROM tb_giohang WHERE s_id = '$customer_id'";
        }
        $result = $this->db->delete($query);
        return $result;
    }
    public function get_odered($customer_id)
    {
        $query = "SELECT * FROM tb_thongtin_donhang WHERE customer_id = '$customer_id' ORDER BY trangthai ASC, ngay_dat DESC";
        $result = $this->db->select($query);
        if ($result) {
            return $result;
        } else {
            echo '  <div class="text-center mx-auto mt-4 pt-4">
            <p style="font-size: 2rem;">Bạn chưa mua sản phẩm nào, hãy đi mua sắm ngay !</p>
            <a href="home" class="btn btn-outline-danger px-4 py-3"><i class="fa-solid fa-house"></i> Về trang chủ</a>
        </div>';
        }
    }
    public function get_product_order($id_donhang)
    {
        $query = "SELECT tb_donhang.*, tb_sanpham.ma_sanpham FROM tb_donhang INNER JOIN tb_sanpham ON tb_donhang.ten_sanpham = tb_sanpham.ten_sanpham
         WHERE id_donhang = '$id_donhang'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_order()
    {
        $query = "SELECT * FROM tb_thongtin_donhang ORDER BY ngay_dat DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_info_order($ma_donhang)
    {
        $query = "SELECT * FROM tb_thongtin_donhang WHERE ma_donhang = '$ma_donhang'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_order_complete()
    {
        $query = "SELECT * FROM tb_thongtin_donhang WHERE trangthai = 5";
    }
    public function get_odered_by_customer($customer_id)
    {
        $query = "SELECT * FROM tb_thongtin_donhang WHERE customer_id = '$customer_id' ORDER BY trangthai ASC, ngay_dat DESC";
        $result = $this->db->select($query);
        if ($result) {
            return $result;
        } else {
            echo '<div>Khách hàng này chưa mua sản phẩm nào</div>';
        }
    }
    public function get_quantity_order()
    {
        $query = "SELECT * FROM tb_thongtin_donhang WHERE trangthai = 0";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
