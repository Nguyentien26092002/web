<?php
include "database.php";
?>
<?php
class Admin
{
    private $db;

    public function __construct()
    {
        $this -> db = new Database();
    }

    public function add_admin($name,$Pass,$positon)
    {
        $query =  "INSERT INTO admin ( name, Pass_word , position, status ) values ( '$name', '$Pass','$positon',0)";
        $result = $this -> db -> insert($query);      
        echo "<script> window.location.href = 'adminlist.php'  </script>"; 
        return $result;
    }





        public function add_promotion()
    {
        $content = $_POST["content"];
        $title = $_POST['title'];
        $img = $_FILES['img']['name'];
        $filestyle = strtolower(pathinfo($img,PATHINFO_EXTENSION));
        $filetagert = basename($_FILES['img']['name']);
        $filesze =  $_FILES['img']['size'];
        if(file_exists( "promotion/$filetagert"))
        {
            $arlert ="file da ton tai";
            return $arlert;
        }
        else
        {
            if($filestyle!="jpg" && $filestyle!="png" && $filestyle!="jpeg")
            {
                $arlert ="chỉ chọn file png jpg jpeg";
                return $arlert;
            }
            else
            {
                if($filesze > 1000000)
                {
                    $arlert ="file không được lớn hơn 1MB";
                    return $arlert;
                } 
                else
                {    

                        move_uploaded_file($_FILES["img"]["tmp_name"],"promotion/".$_FILES['img']['name']);
                        $query  = "INSERT INTO promotion (	content, title,imga) 
                            values ('$content', '$title', '$img')"; 
                            $result = $this->db->insert($query);                        
                        }
                   
                    }  

                }
                            
            echo "<script> window.location.href = 'promotionlist.php';
            </script>";
            return $result;
               
            }
           
        
        






    public function select_name($check_exit)
    {
            $query = "SELECT * FROM  admin where name ='$check_exit' ";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_admin()
    {
            $query = "SELECT *  From admin 
            order by id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_promotion()
    {
            $query = "SELECT *  From promotion
            order by id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function get_promotion($show)
    {
            $query = "SELECT *  From promotion
             where id = '$show'";
            $result = $this->db->select($query);
            return $result;
    }

    public function Get_admin($show)
    {
        $query = "SELECT * FROM  admin WHERE id ='$show'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_admin( $Pass, $id)
    {
        $name = $_POST['name'];
        $status = $_POST['status'];
        $position = $_POST['position'];
        $query = "UPDATE admin SET name ='$name', status= '$status' , position = '$position' , Pass_word = '$Pass' where id ='$id'";
        $result = $this->db->update($query);
        echo "<script> window.location.href = 'adminlist.php'  </script>"; 
        return $result;
    }

    public function status( $id)
    {
        $query = "UPDATE admin SET status= 1 where id ='$id'";
        $result = $this->db->update($query);
        echo "<script> window.location.href = 'adminlist.php'  </script>"; 
        return $result;
    }
    
    
    public function Delete_admin($admin_id)
    {
        $query = " DELETE FROM admin  where id ='$admin_id'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'adminlist.php'  </script>"; 
        return $result;
    }
    public function Delete_promotion($admin_id)
    {
        $query = " DELETE FROM promotion  where id ='$admin_id'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'promotionlist.php'  </script>"; 
        return $result;
    }
    public function promotion_update($id)
    {
        $content = $_POST["content"];
        $title = $_POST['title'];
        if(isset($_FILES['img']) && $_FILES['img']['error'] == 0)
        {
            $img = $_FILES['img']['name'];
            $filestyle = strtolower(pathinfo($img,PATHINFO_EXTENSION));
            $filetagert = basename($_FILES['img']['name']);
            $filesze =  $_FILES['img']['size'];
            if(file_exists( "promotion/$filetagert"))
            {
                $arlert ="file da ton tai";
                return $arlert;
            }
            else
            {
                if($filestyle!="jpg" && $filestyle!="png" && $filestyle!="jpeg")
                {
                    $arlert ="chỉ chọn file png jpg jpeg";
                    return $arlert;
                }
                else
                {
                    if($filesze > 1000000)
                    {
                        $arlert ="file không được lớn hơn 1MB";
                        return $arlert;
                    } 
                    else
                    {    
                        $queryA = "SELECT *  From promotion where id = '$id'";
                       $resultA = $this->db->select($queryA);
                       if ($resultA) {
                        $data = mysqli_fetch_assoc($resultA);
                        $ten_file_anh = $data['imga'];
                        unlink("./promotion/$ten_file_anh");
                   move_uploaded_file($_FILES["img"]["tmp_name"],"promotion/".$_FILES['img']['name']);

                        $query  = "UPDATE promotion SET title = '$title', content = '$content', imga = '$img' where id = '$id'"; 
                        $result = $this->db->update($query); 
                       
                    }

                       
                            }
                       
                        }  
    
                    }
        }
        else
        {
            $query  = "UPDATE promotion SET title= '$title', content='$content' where id = '$id'"; 
                $result = $this->db->update($query); 
        }

                            
            echo "<script> window.location.href = 'promotionlist.php';
            </script>";
            return $result;
               
            }
           
        
        














}
?>
