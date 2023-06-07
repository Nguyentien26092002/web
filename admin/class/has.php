<?php
include "database.php";
?>
<?php
class Has
{
    private $db;

    public function __construct()
    {
        $this -> db = new Database();
    }

    public function insert_brand( $agency,$quantity,$product)
    {
        $query =  "INSERT INTO has ( product_id,agency_id, quantity) values ( '$product','$agency','$quantity')";
        $result = $this -> db -> insert($query);    
        echo "<script> window.location.href = 'haslist.php'  </script>";  
        return $result;
    }   
    public function show_caterory()
    {
            $query = "SELECT * FROM  agency ";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_product()
    {
            $query = "SELECT *  From product_bike order by product_id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_brand_ajax($agency)
    {
        $query = "SELECT has.product_id, product_name, quantity FROM has,product_bike  WHERE has.product_id = product_bike.product_id and  has.agency_id = '$agency' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_ajax($agency,$product)
    {
        $query = "SELECT has.product_id, product_name, quantity FROM has,product_bike  WHERE has.product_id = product_bike.product_id and  has.agency_id = '$agency'  and has.product_id ='$product'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_quantity($agency,$product,$quantity)
    {
        $query = "UPDATE has SET quantity ='$quantity' where agency_id = $agency and product_id='$product'";
        $result = $this->db->update($query);
        echo "<script> window.location.href = 'haslist.php'  </script>";
        return $result;
    }
    
    public function Delete_brand($product,$agency)
    {
        $query = " DELETE FROM has  where product_id ='$product' and agency_id = '$agency'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'haslist.php'  </script>";
        return $result;
    }
}
?>
