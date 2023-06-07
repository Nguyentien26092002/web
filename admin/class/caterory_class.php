<?php
include "database.php";
?>
<?php
class Caterory
{
    private $db;

    public function __construct()
    {
        $this -> db = new Database();
    }

    public function insert_cartegory($cartgory_name)
    {
        $query =  "INSERT INTO product_category (name) values ('$cartgory_name')";
        $result = $this -> db -> insert($query);

        echo "<script> window.location.href = 'catelist.php'  </script>";
        return $result;
    }
    public function show_caterory()
    {
            $query = "SELECT * FROM  product_category ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
    }
    public function get_carteid($cartegory_id )
    {
        $query = "SELECT * FROM  product_category WHERE id ='$cartegory_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_cartegory($cartgory_name, $cartegory_id)
    {
        $query = "UPDATE product_category SET name ='$cartgory_name' where id ='$cartegory_id'";
        $result = $this->db->update($query);
        echo "<script> window.location.href = 'catelist.php'  </script>";
        return $result;
    }
    
    public function delete_cartegory($cartegory_id)
    {
        $query = " DELETE FROM product_category  where id ='$cartegory_id'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'catelist.php'  </script>";
        return $result;
    }
}
?>
