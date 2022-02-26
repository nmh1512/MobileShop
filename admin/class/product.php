<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");
?>

<?php
class product
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
   public function show_brand()
   {
      $query = "SELECT * FROM tb_loaisanpham ORDER BY id_danhmuc DESC";
      $result = $this->db->select($query);
      return $result;
   }
   public function show_brand_ajax($id_danhmuc)
   {
      $query = "SELECT * FROM tb_loaisanpham WHERE id_danhmuc = $id_danhmuc ORDER BY id_loaisanpham DESC";
      $result = $this->db->select($query);
      return $result;
   }
   public function insert_color($color)
   {
      $query = "INSERT IGNORE INTO tb_color (ten_color) VALUES ('$color')";
      $result = $this->db->insert($query);
      echo "<script type='text/javascript'>alert('Thêm dữ liệu thành công!');</script>";
      return $result;
   }
   public function show_color()
   {
      $query = "SELECT * FROM tb_color ORDER BY id_color DESC";
      $result = $this->db->select($query);
      return $result;
   }
   public function get_id_product($url)
   {
      $query = "SELECT * FROM tb_sanpham WHERE url_product = '$url'";
      $result = $this->db->select($query);
      return $result;
   }
   public function show_color_product($id_sanpham)
   {
      $query = "SELECT tb_color_sanpham.*, tb_color.ten_color
               FROM tb_color_sanpham INNER JOIN tb_color ON tb_color_sanpham.id_color = tb_color.id_color

               WHERE tb_color_sanpham.id_sanpham = '$id_sanpham'";
      $result = $this->db->select($query);
      return $result;
   }
   public function show_images_product($id_sanpham)
   {
      $query = "SELECT * 
               FROM tb_anhsanpham WHERE id_sanpham = '$id_sanpham'";
      $result = $this->db->select($query);
      return $result;
   }
   public function insert_product($data, $files)
   {
      foreach ($data['id_color'] as $key => $value) {
         if ($value == "-- Màu 1 --" || $value == "-- Màu 2 --" || $value == "-- Màu 3 --" || $value == "-- Màu 4 --" || $value == "-- Màu 5 --") {
            unset($data['id_color'][$key]);
         }
      }

      $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
      $productCode = mysqli_real_escape_string($this->db->link, $data['productCode']);
      $id_danhmuc = mysqli_real_escape_string($this->db->link, $data['id_danhmuc']);
      $id_loaisanpham = mysqli_real_escape_string($this->db->link, $data['id_loaisanpham']);
      $quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
      $info = mysqli_real_escape_string($this->db->link, $data['info']);
      $type = mysqli_real_escape_string($this->db->link, $data['type']);
      $price = mysqli_real_escape_string($this->db->link, $data['price']);
      $price0 = mysqli_real_escape_string($this->db->link, $data['price0']);
      $ncc = mysqli_real_escape_string($this->db->link, $data['ncc']);
      $url = mysqli_real_escape_string($this->db->link, $data['url']);
      $screen = mysqli_real_escape_string($this->db->link, $data['screen']);
      $system = mysqli_real_escape_string($this->db->link, $data['system']);
      $cam1 = mysqli_real_escape_string($this->db->link, $data['cam1']);
      $cam2 = mysqli_real_escape_string($this->db->link, $data['cam2']);
      $chip = mysqli_real_escape_string($this->db->link, $data['chip']);
      $ram = mysqli_real_escape_string($this->db->link, $data['ram']);
      $rom = mysqli_real_escape_string($this->db->link, $data['rom']);
      $sim = mysqli_real_escape_string($this->db->link, $data['sim']);
      $pin = mysqli_real_escape_string($this->db->link, $data['pin']);
      $charge = mysqli_real_escape_string($this->db->link, $data['charge']);
      //Kiem tra hinh anh va lay hinh anh cho vao folder upload
      $permited = array('jpg', 'jpeg', 'png', 'gif');
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_temp = $_FILES['image']['tmp_name'];


      $div = explode('.', $file_name);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
      $uploaded_image = "uploads/" . $unique_image;


      if ($productName == "" || $productCode == "" || $id_danhmuc == "" || $quantity == "" || $price == "" || $type == "" || $file_name == "") {
         $alert = "<span style='color:red;' class='success'>Các trường thông tin cơ bản không được rỗng!</span>";
         return $alert;
      } else {
         move_uploaded_file($file_temp, $uploaded_image);

         $query = "INSERT INTO tb_sanpham (ma_sanpham, ten_sanpham, id_danhmuc, id_loaisanpham, soluong_nhap,
                                       soluong, mota_sanpham, type_sanpham, giaban, giagoc, ncc,
                                       hinhanh_sanpham, manhinh, hedieuhanh, cam_sau, 
                                       cam_truoc, chip, ram, rom, sim, pin, sac, url_product) 
                  VALUES ('$productCode','$productName','$id_danhmuc','$id_loaisanpham','$quantity',
                       '$quantity', '$info','$type', $price, $price0, '$ncc','$unique_image','$screen','$system','$cam1','$cam2',
                       '$chip','$ram','$rom','$sim','$pin','$charge','$url')";
         $result = $this->db->insert($query);

         if ($result) {
            $query = "SELECT * FROM tb_sanpham WHERE ma_sanpham = '$productCode'";
            $result = $this->db->select($query)->fetch_assoc();
            $id_sanpham = $result['id_sanpham'];
            if ($files['images']['name'][0] != "") {
               $files_name = $_FILES['images']['name'];
               $files_temp = $_FILES['images']['tmp_name'];

               $i = 11;
               foreach ($files_name as $key => $element) {
                  $divs = explode('.', $element);
                  $files_ext = strtolower(end($divs));
                  $unique_images = substr(md5(time()), 0, $i++) . '.' . $files_ext;
                  $uploaded_images = "uploads/" . $unique_images;
                  move_uploaded_file($files_temp[$key], $uploaded_images);
                  $query = "INSERT INTO tb_anhsanpham (id_sanpham, anh_sanpham) VALUES ('$id_sanpham', '$unique_images')";
                  $this->db->insert($query);
               }
            }
            $id_color = $data['id_color'];
            foreach ($id_color as $key => $element) {
               $query = "INSERT INTO tb_color_sanpham (id_sanpham, id_color) VALUES ('$id_sanpham', '$element')";
               $this->db->insert($query);
            }
            $alert = "<span style='color:green;' class='success'>Thêm thành công 1 sản phẩm</span>";
            return $alert;
         } else {
            $alert = "<span style='color:red;' class='success'>Thêm dữ liệu không thành công</span>";
            return $alert;
         }
         return $result;
      }
   }
   public function show_info_product()
   {
      $query = "SELECT * FROM tb_sanpham ORDER BY id_sanpham DESC";
      $result = $this->db->select($query);
      return $result;
   }
   public function show_product()
   {

      $query = "SELECT tb_sanpham.*, tb_danhmuc.ten_danhmuc, tb_loaisanpham.ten_loaisanpham
            FROM tb_sanpham INNER JOIN tb_danhmuc ON tb_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc
            INNER JOIN tb_loaisanpham ON tb_sanpham.id_loaisanpham = tb_loaisanpham.id_loaisanpham
            ORDER BY tb_sanpham.id_danhmuc ASC, tb_sanpham.id_sanpham DESC";
      $result = $this->db->select($query);
      return $result;
   }

   public function update_product($data, $files, $id_sanpham)
   {
      $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
      $productCode = mysqli_real_escape_string($this->db->link, $data['productCode']);
      $id_danhmuc = mysqli_real_escape_string($this->db->link, $data['id_danhmuc']);
      $id_loaisanpham = mysqli_real_escape_string($this->db->link, $data['id_loaisanpham']);
      $quantity0 = mysqli_real_escape_string($this->db->link, $data['quantity0']);
      $quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
      $info = mysqli_real_escape_string($this->db->link, $data['info']);
      $type = mysqli_real_escape_string($this->db->link, $data['type']);
      $price = mysqli_real_escape_string($this->db->link, $data['price']);
      $price0 = mysqli_real_escape_string($this->db->link, $data['price0']);
      $ncc = mysqli_real_escape_string($this->db->link, $data['ncc']);
      $url = mysqli_real_escape_string($this->db->link, $data['url']);
      $screen = mysqli_real_escape_string($this->db->link, $data['screen']);
      $system = mysqli_real_escape_string($this->db->link, $data['system']);
      $cam1 = mysqli_real_escape_string($this->db->link, $data['cam1']);
      $cam2 = mysqli_real_escape_string($this->db->link, $data['cam2']);
      $chip = mysqli_real_escape_string($this->db->link, $data['chip']);
      $ram = mysqli_real_escape_string($this->db->link, $data['ram']);
      $rom = mysqli_real_escape_string($this->db->link, $data['rom']);
      $sim = mysqli_real_escape_string($this->db->link, $data['sim']);
      $pin = mysqli_real_escape_string($this->db->link, $data['pin']);
      $charge = mysqli_real_escape_string($this->db->link, $data['charge']);
      //Kiem tra hinh anh va lay hinh anh cho vao folder upload
      $permited = array('jpg', 'jpeg', 'png', 'gif');
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_temp = $_FILES['image']['tmp_name'];

      $div = explode('.', $file_name);
      $file_ext = strtolower(end($div));
      $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
      $uploaded_image = "uploads/" . $unique_image;

      if ($productName == "" || $productCode == "" || $id_danhmuc == "" || $quantity == "" || $price == "" || $type == "") {
         $alert = "<span style='color:red;' class='success'>Các trường thông tin cơ bản không được rỗng!</span>";
         return $alert;
      } else {
         if (!empty($file_name)) {
            //Neu ng dung chon anh
            if ($file_size > 204800) {
               $alert = "<span style='color:red;' class='success'>Kích cỡ hình ảnh phải nhỏ hơn 2MB</span>";
               return $alert;
            } elseif (in_array($file_ext, $permited) === false) {
               $alert = "<span style='color:red;' class='success'>Bạn chỉ có thể đăng các loại file ảnh như: " . implode(', ', $permited) . "</span>";
               return $alert;
            }
            move_uploaded_file($file_temp, $uploaded_image);

            $query = "UPDATE tb_sanpham 
            SET ma_sanpham = '$productCode',
            ten_sanpham = '$productName',
            id_danhmuc = '$id_danhmuc',
            id_loaisanpham = '$id_loaisanpham',
            soluong_nhap = '$quantity0',
            soluong = '$quantity',
            mota_sanpham = '$info',
            type_sanpham = '$type',
            giaban = $price,
            giagoc = '$price0',
            ncc = '$ncc',
            hinhanh_sanpham ='$unique_image',
            manhinh = '$screen',
            hedieuhanh = '$system',
            cam_sau = '$cam1',
            cam_truoc = '$cam2',
            chip = '$chip',
            ram = '$ram',
            rom = '$rom',
            sim = '$sim',
            pin = '$pin',
            sac = '$charge',
            url_product = '$url'

            WHERE id_sanpham = '$id_sanpham'";
         } else {
            //Neu ng dung ko chon anh 
            $query = "UPDATE tb_sanpham 
            SET ma_sanpham = '$productCode',
            ten_sanpham = '$productName',
            id_danhmuc = '$id_danhmuc',
            id_loaisanpham = '$id_loaisanpham',
            soluong_nhap = '$quantity0',
            soluong = '$quantity',
            mota_sanpham = '$info',
            type_sanpham = '$type',
            giaban = $price,
            giagoc = '$price0', 
            ncc = '$ncc',
            manhinh = '$screen',
            hedieuhanh = '$system',
            cam_sau = '$cam1',
            cam_truoc = '$cam2',
            chip = '$chip',
            ram = '$ram',
            rom = '$rom',
            sim = '$sim',
            pin = '$pin',
            sac = '$charge',
            url_product = '$url'

            WHERE id_sanpham = '$id_sanpham'";
         }
         $result = $this->db->update($query);
         if ($result) {
            $alert = "<span style='color:green;' class='success'>Sửa dữ liệu thành công</span>";
            return $alert;
         } else {
            $alert = "<span style='color:red;' class='success'>Sửa dữ liệu không thành công</span>";
            return $alert;
         }
      }
   }




   public function delete_product($id_sanpham)
   {
      $query = "DELETE FROM tb_sanpham WHERE id_sanpham= '$id_sanpham'";
      $result = $this->db->delete($query);
      if ($result) {
         $alert = "<span style='color:green;' class='success'>Xóa thành công 1 sản phẩm </span>";
         $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
         $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
         $url = strtok($url, '?');
         return $alert;
      } else {
         $alert = "<span style='color:red;' class='success'>Xóa sản phẩm không thành công</span>";
         return $alert;
      }
      return $result;
   }
   public function getProductById($id_sanpham)
   {
      $query = "SELECT * FROM tb_sanpham WHERE id_sanpham = '$id_sanpham'";
      $result = $this->db->select($query);
      return $result;
   }



   //////// Đổ dữ liệu ra giao diện
   public function getproduct_feathered()
   {
      $query = "SELECT * FROM tb_sanpham WHERE id_danhmuc = 73 AND type_sanpham ='1' ORDER BY id_sanpham DESC LIMIT 20";
      $result = $this->db->select($query);
      return $result;
   }
   public function getproduct_apple()
   {
      $query = "SELECT * FROM tb_sanpham WHERE id_loaisanpham ='23' ORDER BY giaban DESC LIMIT 10";
      $result = $this->db->select($query);
      return $result;
   }
   public function getproduct_feathered_tablet()
   {
      $query = "SELECT * FROM tb_sanpham WHERE id_danhmuc = 74 AND type_sanpham ='1' ORDER BY id_sanpham DESC LIMIT 10";
      $result = $this->db->select($query);
      return $result;
   }
   public function get_details($id_sanpham)
   {

      $query = "SELECT tb_sanpham.*, tb_danhmuc.ten_danhmuc, tb_loaisanpham.ten_loaisanpham
         FROM tb_sanpham INNER JOIN tb_danhmuc ON tb_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc
         INNER JOIN tb_loaisanpham ON tb_sanpham.id_loaisanpham = tb_loaisanpham.id_loaisanpham
         -- INNER JOIN tb_color ON tb_sanpham.id_color = tb_color.id_color

         WHERE tb_sanpham.id_sanpham = '$id_sanpham'";
      // $query = "SELECT * FROM tb_sanpham ORDER BY id_sanpham DESC";
      $result = $this->db->select($query);
      return $result;
   }
   public function get_imgs($id_sanpham)
   {
      $query = "SELECT anh_sanpham FROM tb_anhsanpham WHERE id_sanpham ='$id_sanpham'";
      $result = $this->db->select($query);
      return $result;
   }

   public function get_color_product($id_sanpham)
   {
      $query = "SELECT id_color FROM tb_sanpham WHERE id_sanpham ='$id_sanpham'";
      $result = $this->db->select($query);
      return $result;
   }
   public function search_product($arrKey)
   {
      $subQuery = '';
      foreach ($arrKey as $key) {
         if($subQuery == '') {
            $subQuery .= " ten_sanpham LIKE '%" . $key . "%' ";
         } else {
         $subQuery .= " OR ten_sanpham LIKE '%" . $key . "%' ";
         }
      }
      $query = "SELECT * FROM tb_sanpham WHERE ". $subQuery ." ORDER BY id_danhmuc ASC, giaban DESC LIMIT 20";
      $result = $this->db->select($query);
      if ($result) {
         return $result;
      } else {
         echo '
         <div class="box mx-auto my-0" style="width:1200px">
   <h5 class="font-weight-bold">Không có kết quả phù hợp với từ khóa: ' . $key . '</h5>
   <div class="not-found">
      <h6 class="font-weight-bold">Để tìm được kết quả chính xác hơn, bạn vui lòng:</h6>
       <ul>
         <li>Kiểm tra lỗi chính tả của từ khóa đã nhập</li>
         <li>Thử lại bằng từ khóa khác</li>
         <li>Thử lại bằng những từ khóa tổng quát hơn</li>
         <li>Thử lại bằng những từ khóa ngắn gọn hơn</li>
      </ul>
    
   </div>
</div>

         ';
      }
   }
   public function get_cat($arrKey)
   {
      $subQuery = '';
      foreach ($arrKey as $key) {
         if($subQuery == '') {
            $subQuery .= " ten_sanpham LIKE '%" . $key . "%' ";
         } else {
         $subQuery .= " OR ten_sanpham LIKE '%" . $key . "%' ";
         }
      }
      $queryCat = "SELECT DISTINCT tb_sanpham.id_danhmuc, tb_danhmuc.ten_danhmuc FROM tb_sanpham INNER JOIN tb_danhmuc ON tb_sanpham.id_danhmuc = tb_danhmuc.id_danhmuc WHERE".$subQuery. "ORDER BY id_danhmuc ASC";
      $resultCat = $this->db->select($queryCat);
      return $resultCat;
   }
   public function get_id($arrKey, $id_danhmuc)
   {
      $subQuery = '';
      foreach ($arrKey as $key) {
         if($subQuery == '') {
            $subQuery .= " ten_sanpham LIKE '%" . $key . "%' ";
         } else {
         $subQuery .= " OR ten_sanpham LIKE '%" . $key . "%' ";
         }
      }
      $query = "SELECT DISTINCT id_loaisanpham FROM tb_sanpham WHERE ".'('.$subQuery.')'." AND id_danhmuc = '$id_danhmuc'";
      $result = $this->db->select($query);
      return $result;
   }
   public function countProduct($arrKey, $id_danhmuc)
   {
      $subQuery = '';
      foreach ($arrKey as $key) {
         if($subQuery == '') {
            $subQuery .= " ten_sanpham LIKE '%" . $key . "%' ";
         } else {
         $subQuery .= " OR ten_sanpham LIKE '%" . $key . "%' ";
         }
      }
      $query = "SELECT * FROM tb_sanpham WHERE id_danhmuc = '$id_danhmuc' AND " . '('.$subQuery.')';
      $result = $this->db->select($query);
      return $result;
   }
   public function get_brand($id_danhmuc, $id_loaisanpham)
   {
      $query = "SELECT * FROM tb_loaisanpham WHERE id_danhmuc = '$id_danhmuc' AND id_loaisanpham = '$id_loaisanpham'";
      $result = $this->db->select($query);
      return $result;
   }
   public function count_product_by_id($arrKey, $id_loaisanpham)
   {
      $subQuery = '';
      foreach ($arrKey as $key) {
         if($subQuery == '') {
            $subQuery .= " ten_sanpham LIKE '%" . $key . "%' ";
         } else {
         $subQuery .= " OR ten_sanpham LIKE '%" . $key . "%' ";
         }
      }
      $query = "SELECT * FROM tb_sanpham WHERE id_loaisanpham = '$id_loaisanpham' AND " .'('.$subQuery.')';
      $result = $this->db->select($query);
      return $result;
   }
   public function quantity_search($arrKey)
   {
      $subQuery = '';
      foreach ($arrKey as $key) {
         if($subQuery == '') {
            $subQuery .= " ten_sanpham LIKE '%" . $key . "%' ";
         } else {
         $subQuery .= " OR ten_sanpham LIKE '%" . $key . "%' ";
         }
      }
      $query = "SELECT * FROM tb_sanpham WHERE". $subQuery ."ORDER BY id_danhmuc ASC, giaban DESC";
      $result = $this->db->select($query);
      return $result;
   }
   public function productSimilar($id_loaisanpham, $id_sanpham)
   {
      $query = "SELECT * FROM tb_sanpham WHERE id_loaisanpham = '$id_loaisanpham' AND id_sanpham != '$id_sanpham' LIMIT 5";
      $result = $this->db->select($query);
      return $result;
   }
   public function productSimilarPlus($id_danhmuc, $count, $id_sanpham)
   {
      $limit = 5 - $count;
      $query = "SELECT * FROM tb_sanpham WHERE id_danhmuc = '$id_danhmuc' AND id_sanpham != '$id_sanpham' LIMIT $limit";
      $result = $this->db->select($query);
      return $result;
   }
   public function productQuantity()
   {
      $query = "SELECT * FROM tb_sanpham";
      $result = $this->db->select($query);
      return $result;
   }
}

?>
