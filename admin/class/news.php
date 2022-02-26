<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . "/../lib/database.php");

?>
<?php
class News
{

    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_news()
    {
        $query = "SELECT * FROM tb_tintuc ORDER BY ngay_dang DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_news_home()
    {
        $query = "SELECT * FROM tb_tintuc ORDER BY ngay_dang DESC LIMIT 3   ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_more_news($url)
    {
        $query = "SELECT * FROM tb_tintuc WHERE url_tintuc != '$url' ORDER BY ngay_dang DESC LIMIT 6";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_news($data, $file)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['writer']);
        $title = mysqli_real_escape_string($this->db->link, $data['title']);
        $url = mysqli_real_escape_string($this->db->link, $data['url']);
        $content = mysqli_real_escape_string($this->db->link, $data['content']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        move_uploaded_file($file_temp, $uploaded_image);

        $query = "INSERT INTO tb_tintuc (tacgia, title, img, noidung, url_tintuc, type) 
                 VALUES ('$name', '$title', '$unique_image', '$content', '$url', '$type')";
        $this->db->insert($query);
    }
    public function hot_news()
    {
        $query = "SELECT * FROM tb_tintuc WHERE type = 1 ORDER BY ngay_dang DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function new_content($url)
    {
        $query = "SELECT * FROM tb_tintuc WHERE url_tintuc = '$url'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getNewsById($id_tintuc)
    {
        $query = "SELECT * FROM tb_tintuc WHERE id = '$id_tintuc'";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateNews($data, $files, $id_tintuc)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['writer']);
        $title = mysqli_real_escape_string($this->db->link, $data['title']);
        $url = mysqli_real_escape_string($this->db->link, $data['url']);
        $content = mysqli_real_escape_string($this->db->link, $data['content']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        //Kiem tra hinh anh va lay hinh anh cho vao folder upload
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;


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
            // tacgia, title, img, noidung, url_tintuc, type
            $query = "UPDATE tb_tintuc
              SET tacgia = '$name',
              title = '$title',        
              img ='$unique_image',
              url_tintuc = '$url',
              noidung = '$content',
              type = '$type'
  
              WHERE id = '$id_tintuc'";
        } else {
            //Neu ng dung ko chon anh 
            $query = "UPDATE tb_tintuc 
              SET tacgia = '$name',
              title = '$title',        
              url_tintuc = '$url',
              noidung = '$content',
              type = '$type'

              WHERE id = '$id_tintuc'";
        }
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span style='color:green;' class='success'>Sửa dữ liệu thành công</span>";
            return $query;
        } else {
            $alert = "<span style='color:red;' class='success'>Sửa dữ liệu không thành công</span>";
            return $query;
        }
    }
    public function delNews($id)
    {
        $query = "DELETE FROM tb_tintuc WHERE id = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = '<h4 style="color:green;">Xóa thành công</h4>';
            return $alert;
       }
       return $result;
    }
}
?>
