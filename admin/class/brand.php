<?php


$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");
?>
 
<?php
class brand
{

     private $db;

     public function __construct()
     {
          $this->db = new Database();
     }
     public function show_cartegory()
     {
          $query = "SELECT * FROM tb_danhmuc ORDER BY id_danhmuc DESC";
          $result = $this->db->select($query);
          return $result;
     }
     public function insert_brand($data, $logo)
     {
          $id_danhmuc = mysqli_real_escape_string($this->db->link, $data['id_danhmuc']);
          $ten_loaisanpham = mysqli_real_escape_string($this->db->link, $data['ten_loaisanpham']);


          $permited = array('jpg', 'jpeg', 'png', 'gif');
          $file_name = $_FILES['image']['name'];
          $file_size = $_FILES['image']['size'];
          $file_temp = $_FILES['image']['tmp_name'];
          $div = explode('.', $file_name);
          $file_ext = strtolower(end($div));
          $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
          $uploaded_image = "uploads/" . $unique_image;

          if ($id_danhmuc == '' || $ten_loaisanpham == '') {
               $alert = "<span style='color:red;' class='success'>Các trường thông tin cơ bản không được rỗng!</span>";
               return $alert;
          } else {
               move_uploaded_file($file_temp, $uploaded_image);

               $query = "INSERT INTO tb_loaisanpham (id_danhmuc, ten_loaisanpham, logo) 
                        VALUES ('$id_danhmuc', '$ten_loaisanpham', '$unique_image')";
               $result = $this->db->insert($query);
               if ($result) {
                    $alert = "<span style='color:green;' class='success'>Thêm thành công 1 loại sản phẩm</span>";
                    return $alert;
               } else {
                    $alert = "<span style='color:red;' class='success'>Thêm dữ liệu không thành công</span>";
                    return $alert;
               }
               return $result;
          }
     }
     public function show_brand()
     {
          $query = "SELECT tb_loaisanpham.*, tb_danhmuc.ten_danhmuc
        FROM tb_loaisanpham INNER JOIN tb_danhmuc ON tb_loaisanpham.id_danhmuc = tb_danhmuc.id_danhmuc
        ORDER BY tb_loaisanpham.id_loaisanpham ASC";
          $result = $this->db->select($query);
          return $result;
     }
     public function get_brand($id_loaisanpham)
     {
          $query = "SELECT * FROM tb_loaisanpham WHERE id_loaisanpham = '$id_loaisanpham'";
          $result = $this->db->select($query);
          return $result;
     }
     public function update_brand($ten_loaisanpham, $id_loaisanpham)
     {
          $query = "UPDATE tb_loaisanpham SET ten_loaisanpham = '$ten_loaisanpham' WHERE id_loaisanpham = '$id_loaisanpham'";
          $result = $this->db->update($query);
          header('Location:brands');
          return $result;
     }
     public function delete_brand($id_loaisanpham)
     {
          $query = "DELETE  FROM tb_loaisanpham WHERE id_loaisanpham= '$id_loaisanpham'";
          $result = $this->db->delete($query);
          if($result){
               $alert = '<h4 style="color:green;">Xóa thành công</h4>';
               return $alert;
          }
          return $result;
     }
     public function show_logo_brand($id)
     {
          if ($id == '73' || $id == '74') {
               $query = "SELECT tb_loaisanpham.*, tb_danhmuc.url_cat FROM tb_loaisanpham INNER JOIN tb_danhmuc ON tb_loaisanpham.id_danhmuc = tb_danhmuc.id_danhmuc WHERE tb_loaisanpham.id_danhmuc = '$id'";
               $result = $this->db->select($query);
               return $result;
          } else {
               '<script>$(".brand-logo").remove()</script>';
          }
     }
     public function get_product_by_brand($id)
     {
          $query = "SELECT * FROM tb_sanpham WHERE id_loaisanpham = '$id' ORDER BY giaban DESC LIMIT 20";
          $result = $this->db->select($query);
          if ($result) {
               return $result;
          } else {
               echo 'Chưa có sản phẩm nào ở thương hiệu này';
          }
     }
     public function show_cartegory_name_by_brand($urlBrand, $urlCat)
     {
          $query = "SELECT tb_loaisanpham.*, tb_danhmuc.*
        FROM tb_loaisanpham INNER JOIN tb_danhmuc ON tb_loaisanpham.id_danhmuc = tb_danhmuc.id_danhmuc
        WHERE tb_loaisanpham.url_brand = '$urlBrand' AND tb_danhmuc.url_cat = '$urlCat'";
          $result = $this->db->select($query);
          return $result;
     }
     public function show_brand_name($id)
     {
          $query = "SELECT * FROM tb_loaisanpham WHERE id_loaisanpham = '$id'";
          $result = $this->db->select($query);
          return $result;
     }
     public function show_logo_brand_by_cat($id)
     {
          $query1 = "SELECT tb_loaisanpham.id_danhmuc FROM tb_loaisanpham WHERE id_loaisanpham = '$id'";
          $result1 = $this->db->select($query1)->fetch_assoc();
          $id_danhmuc = $result1['id_danhmuc'];
          $query2 = "SELECT tb_loaisanpham.*, tb_danhmuc.url_cat FROM tb_loaisanpham INNER JOIN tb_danhmuc ON tb_loaisanpham.id_danhmuc = tb_danhmuc.id_danhmuc WHERE tb_loaisanpham.id_danhmuc = '$id_danhmuc'";
          $result2 = $this->db->select($query2);
          return $result2;
     }
     public function showCat($urlProduct)
     {
          $query = "SELECT tb_danhmuc.*, tb_loaisanpham.*, tb_sanpham.*
          FROM tb_sanpham 
          INNER JOIN tb_danhmuc ON tb_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc
          INNER JOIN tb_loaisanpham ON tb_sanpham.id_loaisanpham = tb_loaisanpham.id_loaisanpham
          WHERE tb_sanpham.url_product = '$urlProduct'";
          $result = $this->db->select($query);
          return $result;
     }
     public function quantity_by_brand($id_loaisanpham)
     {
          $query = "SELECT * FROM tb_sanpham WHERE id_loaisanpham = '$id_loaisanpham'";
          $result = $this->db->select($query);
          return $result;
     }
}


?>
