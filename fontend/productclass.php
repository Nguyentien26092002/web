<?php
include "database.php";
?>
<?php

class Product
{
    private $db;

    public function __construct()
    {
        $this -> db = new Database();
    }



    public function show_item($ip)
    {
        $query = ("SELECT *FROM customer_cart, product_bike WHERE customer_cart.product_id = product_bike.product_id  and cart_id = '$ip' ");
        $result = $this -> db -> select($query);
        return $result;
    }
    public function   pay_insert($bill,$money,$code,$a)
    {

        $query = ("INSERT INTO pay (trading_code,money_paid,id_receipt,static) 
        values ('$code','$money','$bill','$a')");
        $result = $this -> db -> insert($query);
        $query = ("INSERT INTO customer (static) 
        values ('$a')");
        $result = $this -> db -> insert($query);
        $query = ("INSERT INTO receipt (static) 
        values ($a')");
        $result = $this -> db -> insert($query);
        return $result;
    }
    public function  customer_add($customerId)
    {
        $name = $_POST['name'];
        $sdt = floatval($_POST['sdt']);
        $cccd = $_POST['cccd'];
        $adres = $_POST['adress'];
        $wards = $_POST['wards'];
        $district = $_POST['district'];
        $province = $_POST['province'];

        $query = ("INSERT INTO customer ( customer_id,name,address,phone,cccd,province,district,wards,static) 
        values ('$customerId','$name','$adres','$sdt','$province','$district','$wards','$cccd','0')");
        $result = $this -> db -> insert($query);
        return $result;
    }
    public function  add_detail($id,$receipt)
    {
        $queryA = ("SELECT *FROM customer_cart WHERE user_ip = '$id' ");
        $resultA = $this -> db -> select($queryA);
        while($row=mysqli_fetch_assoc($resultA))
        {
            $product_id = $row['product_id'];
            $quantity = $row['cart_quantity'];
            $color = $row['cart_color'];
            $sum = $row['total'];
            $query = "INSERT INTO receipt_detail (id_recceipt,product_id, quantity, product, customer_pay, static) 
             VALUES ('$receipt','$product_id', '$quantity', '$color', '$sum', 0)";
            $result = $this->db->insert($query);
        }
        return $resultA;
    }

    public function  bill_add($id,$cus)
    {
        $name = $_POST['item'];
        $sdt = $_POST['price'];
        $date = date("Y-m-d");
        $query = ("INSERT INTO receipt (id_receipt,create_at,item, sum_price,id_customer,static) 
        values ('$id','$date','$name','$sdt','$cus', 0)");
        $result = $this -> db -> insert($query);
        return $result;
    }


    public function update_cart($cart_id,$quantity,$total)
    {
        $query = "UPDATE customer_cart SET cart_quantity = '$quantity', total = '$total' WHERE cart_id ='$cart_id'";
        $result = $this -> db -> update($query);
        return $result;
    }  
    public function Delete_cart($product)
    {
        $query = " DELETE FROM customer_cart where cart_id ='$product' ";
        $result = $this->db->delete($query);
        header('location:cart.php');
        return $result;
    } 
}
?>
