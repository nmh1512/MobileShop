<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");

?>
<?php
class Members
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function infoAdmin()
    {
        $query = "SELECT * FROM tb_admin WHERE level != 0 ORDER BY level";
        $result = $this->db->select($query);
        return $result;
    }
    public function newMember($data)
    {

        $name = mysqli_real_escape_string($this->db->link, $data['nameMember']);
        $birthday = mysqli_real_escape_string($this->db->link, $data['birthday']);
        $sex = mysqli_real_escape_string($this->db->link, $data['sex']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $account = mysqli_real_escape_string($this->db->link, $data['account']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        $level = mysqli_real_escape_string($this->db->link, $data['level']);
        $query = "INSERT INTO tb_admin (name_admin, gioi_tinh, ngay_sinh, dia_chi, sdt_admin, email_admin, user_admin, pass_admin, level) 
                VALUES ('$name','$sex','$birthday','$address','$phone','$email','$account','$password','$level')";
        $result = $this->db->insert($query);

        return $result;
    }
    public function deleteMember($id)
    {
        $query = "DELETE FROM tb_admin WHERE id_admin = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = '<h4 style="color:green;">Xóa thành công</h4>';
            return $alert;
        }
        return $result;
    }
    public function showProfile($id)
    {
        $query = "SELECT * FROM tb_admin WHERE id_admin = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateMember($data, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['nameMember']);
        $birthday = mysqli_real_escape_string($this->db->link, $data['birthday']);
        $sex = mysqli_real_escape_string($this->db->link, $data['sex']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);

        $query = "UPDATE tb_admin 
                SET name_admin = '$name',
                gioi_tinh = '$sex',
                ngay_sinh = '$birthday',
                dia_chi = '$address',
                sdt_admin = '$phone',
                email_admin = '$email'
                
                WHERE id_admin = '$id'
                ";
        $result = $this->db->update($query);
        if ($result) {
            $alert = '<h4 style="color:green;">Sửa thông tin thành công</h4>';
            return $alert;
        }
        return $result;
    }
    public function checkPrivillege($uri = false)
    {
        $uri = $uri != false ? $uri : $_SERVER['REQUEST_URI'];
        if (empty($_SESSION['current_user']['privileges'])) {
            return false;
        }
        $privilege = $_SESSION['current_user']['privileges'];
        $privilege = implode("|", $privilege);
        preg_match('/' . $privilege . '/', $uri, $matches);
        return !empty($matches);
    }
    public function getPrivilege($id)
    {
        $query = "SELECT * FROM tb_phanquyen_nhanvien INNER JOIN tb_phanquyen ON tb_phanquyen_nhanvien.id_phanquyen = tb_phanquyen.id_phanquyen WHERE tb_phanquyen_nhanvien.id_member = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getPriMember($id)
    {
        $query = "SELECT * FROM tb_phanquyen_nhanvien WHERE id_member = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getPriLeftTop()
    {
        $query = "SELECT * FROM tb_phanquyen WHERE id_phanquyen < 3";
        $result = $this->db->select($query);
        return $result;
    }
    public function getPriLeftBottom()
    {
        $query = "SELECT * FROM tb_phanquyen WHERE id_phanquyen > 2 AND id_phanquyen < 7";
        $result = $this->db->select($query);
        return $result;
    }
    public function getPriRight()
    {
        $query = "SELECT * FROM tb_phanquyen WHERE id_phanquyen > 6";
        $result = $this->db->select($query);
        return $result;
    }
    public function addPri($id_member, $data)
    {
        $deletePri = "DELETE FROM tb_phanquyen_nhanvien WHERE id_member = '$id_member'";
        $this->db->delete($deletePri);
        if (!empty($data['privilagesleft'])) {
            $data1 = $data['privilagesleft'];
            $insertString1 = '';
            foreach ($data1 as $val1) {
                $insertString1 .= !empty($insertString1) ? "," : "";
                $insertString1 .= "('$id_member', '$val1')";
            }
            $queryLeft = "INSERT INTO tb_phanquyen_nhanvien (id_member, id_phanquyen) VALUES " .  $insertString1;
            $this->db->insert($queryLeft);
        }
        if (!empty($data['privilagesright'])) {
            $data2 = $data['privilagesright'];
            $insertString2 = '';
            foreach ($data2 as $val2) {
                $insertString2 .= !empty($insertString2) ? "," : "";
                $insertString2 .= "('$id_member', '$val2')";
            }
            $queryRight = "INSERT INTO tb_phanquyen_nhanvien (id_member, id_phanquyen) VALUES " . $insertString2;
            $this->db->insert($queryRight);
        }
        $alert = "<h4 style='color: green;'>Phân quyền thành công</h4>";
        return $alert;
    }
}

?>
