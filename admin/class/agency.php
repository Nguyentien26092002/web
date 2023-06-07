<?php
include "database.php";
?>
<?php
class Agency
{
    private $db;

    public function __construct()
    {
        $this -> db = new Database();
    }

    public function add_admin($name,$Pass,$agency)
    {
        $query =  "INSERT INTO agency ( agency_adress, agency_phone,agency_provine ) values ( '$name', '$Pass','$agency')";
        $result = $this -> db -> insert($query);    
        echo "<script> window.location.href = 'list.php'  </script>";
        return $result;
    }
    public function add_color()
    {
        if (isset($_POST['name']) && isset($_FILES['img'])) {
            $name = $_POST['name'];
            $img = $_FILES['img']['name'];
            $file_size =  $_FILES['img']['size'];
            $file_extension = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            $target_file = "img_color/" . basename($_FILES['img']['name']);
            $allowed_extensions = array('jpg', 'jpeg', 'png');
            $max_file_size = 1000000; // 1MB
    
            if (file_exists($target_file)) {
                die("File đã tồn tại.");
            } elseif (!in_array($file_extension, $allowed_extensions)) {
                die("Chỉ chọn file có định dạng jpg, jpeg hoặc png.");
            } elseif ($file_size > $max_file_size) {
                die("Kích thước file không được vượt quá 1MB.");
            } elseif (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                die("Lỗi khi tải file lên.");
            } else {

    
                // Chuẩn bị câu truy vấn
                $sql = "INSERT INTO color (color_name, color_img) VALUES ('$name', '$img')";
                $result = $this->db->insert($sql);

                echo "<script> window.location.href = 'colorlist.php'  </script>";
                return $result;
            }
        }
    }
    
    public function select_name($check_exit)
    {
            $query = "SELECT * FROM  agency where agency_adress ='$check_exit' ";
            $result = $this->db->select($query);
            return $result;
    }
    public function select_color($check_exit)
    {
            $query = "SELECT *FROM  color where color_name = '$check_exit'  ";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_admin()
    {
            $query = "SELECT *  From agency
            order by agency_id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_color()
    {
            $query = "SELECT *  From color";
            $result = $this->db->select($query);
            return $result;
    }
    public function Get_admin($show)
    {
        $query = "SELECT * FROM  agency WHERE agency_id ='$show'";
        $result = $this->db->select($query);
        return $result;
    }
    public function Get_color($show)
    {
        $query = "SELECT * FROM  color WHERE color_name ='$show'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_admin( $id)
    {
        $name = $_POST['name'];
        $status = $_POST['status'];
        $agency = $_POST['id'];
        $query = "UPDATE agency SET agency_provine ='$agency', agency_phone= '$status' , agency_adress = '$name' where agency_id ='$id'";
        $result = $this->db->update($query);
        echo "<script> window.location.href = 'list.php'  </script>";
        return $result;
    }public function update_color($id, $a,$img)
    {
        $name = $_POST['id'];
        $query = "UPDATE color SET color_name = '$name', color_img = '$img' WHERE color_name = '$id'";
        $result = $this->db->update($query);
    
        if ($a == 0 ) {
            $file_extension = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            $target_file = "img_color/" . basename($_FILES['img']['name']);
            $allowed_extensions = array('jpg', 'jpeg', 'png');
            $max_file_size = 1000000; // 1MB
            $file_size = $_FILES['img']['size'];
    
            if (file_exists($target_file)) {
                die("File đã tồn tại.");
            } elseif (!in_array($file_extension, $allowed_extensions)) {
                die("Chỉ chọn file có định dạng jpg, jpeg hoặc png.");
            } elseif ($file_size > $max_file_size) {
                die("Kích thước file không được vượt quá 1MB.");
            } elseif (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                die("Lỗi khi tải file lên.");
            } else {
                $new_target_file = "uploads/" . basename($_FILES['img']['name']);
                move_uploaded_file($_FILES["img"]["tmp_name"], $new_target_file);

            }
        }
        echo "<script> window.location.href = 'colorlist.php'  </script>";
        return $result;
    }
    
    
    public function Delete_admin($admin_id)
    {
        $query = " DELETE FROM agency  where agency_id ='$admin_id'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'list.php'  </script>";
        return $result;
    }
    public function Delete_color($admin_id)
    {
        $query = " DELETE FROM color  where color_name ='$admin_id'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'colorlist.php'  </script>";
        return $result;
    }
}
?>
