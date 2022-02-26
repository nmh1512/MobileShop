<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");
?>

<?php
class cartegory
{

     private $db;

     public function __construct()
     {
          $this->db = new Database();
     }

     public function insert_cartegory($ten_danhmuc, $icon)
     {
          $ten_danhmuc = mysqli_real_escape_string($this->db->link, $ten_danhmuc);
          $icon = mysqli_real_escape_string($this->db->link, $icon);
          if (empty($ten_danhmuc) || empty($icon)) {
               $alert = "<span style='color:red;' class='success'>Bạn chưa nhập đủ các trường!</span>";
               return $alert;
          } else {
               $query = "INSERT INTO tb_danhmuc (ten_danhmuc, icon) VALUES ('$ten_danhmuc', '$icon')";
               $result = $this->db->insert($query);
               if ($result) {
                    $alert = "<span style='color:green;' class='success'>Thêm thành công 1 danh mục</span>";
                    return $alert;
               } else {
                    $alert = "<span style='color:red;' class='success'>Thêm dữ liệu không thành công</span>";
                    return $alert;
               }
               return $result;
          }
     }
     public function show_cartegory()
     {
          $query = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc";
          $result = $this->db->select($query);
          return $result;
     }
     public function get_cartegory($id_danhmuc)
     {
          $query = "SELECT * FROM tb_danhmuc WHERE id_danhmuc = '$id_danhmuc'";
          $result = $this->db->select($query);
          return $result;
     }

     public function delete_cartegory($id_danhmuc)
     {
          $query = "DELETE  FROM tb_danhmuc WHERE id_danhmuc= '$id_danhmuc'";
          $result = $this->db->delete($query);
          if($result){
               $alert = '<h4 style="color:green;">Xóa thành công</h4>';
               return $alert;
          }
          return $result;
     }
     public function get_product_by_cat($id)
     {
          $query = "SELECT * FROM tb_sanpham WHERE id_danhmuc= '$id' ORDER BY giaban DESC LIMIT 20";
          $result = $this->db->select($query);
          if ($result) {
               return $result;
          } else {
               echo 'Chưa có sản phẩm nào ở danh mục này';
          }
     }
     public function show_cartegory_name($url)
     {
          $query = "SELECT * FROM tb_danhmuc WHERE url_cat = '$url'";
          $result = $this->db->select($query);
          return $result;
     }
     public function quantity_by_cat($id_danhmuc)
     {
          $query = "SELECT * FROM tb_sanpham WHERE id_danhmuc = '$id_danhmuc'";
          $result = $this->db->select($query);
          return $result;
     }
}
?>
