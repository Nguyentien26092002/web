<?php
include "database.php";
?>
<?php
class Brandclass
{
    private $db;

    public function __construct()
    {
        $this -> db = new Database();
    }

    public function insert_brand( $cartegory_id, $brand_name)
    {
        $query =  "INSERT INTO brand ( category_id , brand_name) values ( '$cartegory_id', '$brand_name')";
        $result = $this -> db -> insert($query);    
        echo "<script> window.location.href = 'brandlist.php'  </script>";
        return $result;
    }
    public function show_caterory()
    {
            $query = "SELECT * FROM  product_category ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_brand()
    {
            $query = "SELECT *  From brand inner join product_category on brand.category_id = product_category.id 
            order by brand.brand_id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function get_brand($brand_id)
    {
        $query = "SELECT * FROM  brand WHERE brand_id ='$brand_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_brand( $cartegory_id, $brand_name, $brand_id)
    {
        $query = "UPDATE brand SET brand_name ='$brand_name', category_id = '$cartegory_id'where brand_id ='$brand_id'";
        $result = $this->db->update($query);
         echo "<script> window.location.href = 'brandlist.php'  </script>";
        return $result;
    }
    
    public function Delete_brand($brand_id)
    {
        $query = " DELETE FROM brand  where brand_id ='$brand_id'";
        $result = $this->db->delete($query);
         echo "<script> window.location.href = 'brandlist.php'  </script>";
        return $result;
    }
}
?>
