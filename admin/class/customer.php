<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");
include_once($filepath . "/../lib/format.php");
?>
<?php
class Customer
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customer($data)
    {
        $username = mysqli_real_escape_string($this->db->link, $data['username']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $district = mysqli_real_escape_string($this->db->link, $data['district']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);

        $query = "INSERT INTO tb_tk_khachhang (taikhoan, matkhau, name, email, sdt, tinh_thanhpho, quan_huyen, dia_chi) 
                  VALUES ('$username','$password','$name','$email','$phone','$city','$district','$address')";
        $result = $this->db->insert($query);
        if ($result) {
            return "<script>$('section').remove();
            $('.icons').remove();
            $('footer').remove();</script>";
        }
    }
    public function login_customer($data)
    {
        $username = mysqli_real_escape_string($this->db->link, $data['username']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        $check = "SELECT * FROM tb_tk_khachhang WHERE taikhoan ='$username' AND matkhau = '$password'";
        $result_check = $this->db->select($check);
        if ($result_check) {
            $value = $result_check->fetch_assoc();
            $id = $value['id'];
            Session::set('customer_login', true);
            Session::set('customer_id', $id);
            Session::set('login_id', session_id());
            Session::set('customer_name', $value['name']);
            Session::set('account_name', $value['taikhoan']);
            $query = "UPDATE tb_tk_khachhang SET trang_thai = 1 WHERE id = '$id'";
            $this->db->update($query);
            echo "<script>window.location = 'home'</script>";
        } else {
            $alert = "<div class='text-center'><span style='font-size: 10px;' class='error'>Tài khoản hoặc mật khẩu không chính xác</span><div>";
            return $alert;
        }
    }
    public function show_profile($id)
    {
        $query = "SELECT * FROM tb_tk_khachhang WHERE id ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function edit_customer($data, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $district = mysqli_real_escape_string($this->db->link, $data['district']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);

        $query = "UPDATE tb_tk_khachhang SET name='$name' ,email='$email' ,sdt='$phone', tinh_thanhpho='$city', quan_huyen='$district', dia_chi='$address' WHERE id = '$id'";
        $result = $this->db->update($query);
        if ($result) {
            return "<div style='color: green;'>Sửa thông tin thành công</div>";
        }
    }
    public function show_customer()
    {
        $query = "SELECT * FROM tb_tk_khachhang WHERE taikhoan != ''";
        $result = $this->db->select($query);
        return $result;
    }
    public function statusOffline($customer_id)
    {
        $query = "UPDATE tb_tk_khachhang SET trang_thai = 0 WHERE id = '$customer_id'";
        $result = $this->db->update($query);
        return $result;
    }
    public function delete_customer($id)
    {
        $query = "DELETE  FROM tb_tk_khachhang WHERE id= '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = '<h4 style="color:green;">Xóa thành công</h4>';
            return $alert;
       }
       return $result;
    }
}
?>