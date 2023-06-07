<?php
include "database.php";
?>
<?php
class Customer
{
    private $db;

    public function __construct()
    {
        $this -> db = new Database();
    }

    public function add_admin($name,$Pass,$positon)
    {
        $query =  "INSERT INTO admin ( name, Pass_word , position, status ) values ( '$name', '$Pass','$positon','1')";
        $result = $this -> db -> insert($query);    

        echo "<script> window.location.href = 'adminlist.php'  </script>"; 
        return $result;
    }
    public function select_name($check_exit)
    {
            $query = "SELECT * FROM  admin where name ='$check_exit' ";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_Customer()
    {
            $query = "SELECT *  From customer_inf where static = 0
            order by cus_id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_all($a)
    {
            $query = "SELECT *From receipt, pay where  receipt.id_receipt = pay.id_receipt and receipt.id_receipt = '$a'";
            $result = $this->db->select($query);
            return $result;
    }

    public function showed_Customer()
    {
            $query = "SELECT *  From customer_inf where static = 1
            order by cus_id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_receipt()
    {
            $query = "SELECT *  From receipt,customer where customer.customer_id = receipt.id_customer
            order by create_at desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function showed_feedback()
    {
            $query = "SELECT *  From customer_feedback, product_bike where customer_feedback.product_id = product_bike.product_id order by id_feedback desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function update_admin( $id)
    {

        $query = "UPDATE customer_inf SET  static= 1  where cus_id ='$id'";
        $result = $this->db->update($query);
        echo "<script> window.location.href = 'customer_inf.php'  </script>";
        return $result;
    }
    
    public function del_cus($show)
    {
        $query = " DELETE FROM customer_inf  where cus_id ='$show'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'customer_inf.php'  </script>";
        return $result;
    }

    public function del_feed($show)
    {
        $query = " DELETE FROM customer_feedback  where id_feedback ='$show'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'customer_infed.php'  </script>";
        return $result;
    }


        public function Del_all($id, $a,$idcus)
        {
            $query = "UPDATE receipt SET  static = '$a'  where id_receipt ='$id'";
            $result = $this->db->update($query);
            $query = "UPDATE receipt_detail SET  static = '$a'  where id_recceipt ='$id'";
            $result = $this->db->update($query);
            $query = "UPDATE customer SET  static = '$a'  where customer_id ='$idcus'";
            $result = $this->db->update($query);
            echo "<script> window.location.href = 'receipt.php'  </script>";
            return $result;
        }
}
?>  
