<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/session.php");
Session::checkLogin();
include_once($filepath . "/../lib/database.php");
include_once($filepath . "/../lib/format.php");
?>


<?php
class adminLogin
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_admin($adminUser, $adminPassword)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPassword = $this->fm->validation($adminPassword);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);

        if (empty($adminUser) || empty($adminPassword)) {
            $alert = "Tài khoản và mật khẩu không được để trống";
            return $alert;
        } else {
            $query = "SELECT * FROM tb_admin WHERE user_admin = '$adminUser' AND pass_admin = '$adminPassword' LIMIT 1";
            $result = $this->db->select($query);

            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('adminLogin', true);
                Session::set('id_admin', $value['id_admin']);
                Session::set('user_admin', $value['user_admin']);
                Session::set('name_admin', $value['name_admin']);
                Session::set('level', $value['level']);
                header('Location:index');
            } else {
                $alert = "Tài khoản hoặc mật khẩu không chính xác";
                return $alert;
            }
        }
    }
  
}

?>