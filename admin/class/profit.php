<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");

?>
<?php
class Profit
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function profitDay()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $today = date('Y-m-d');
        $query = "SELECT * FROM tb_thongke WHERE DATE(ngay_hoan_thanh) = '$today'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
