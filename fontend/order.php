<?php
include "database.php";
?>
<?php
/**
 * Summary of Promotion
 */
class Order
{
    private $db;

    public function __construct()
    {
        $this -> db = new Database();
    }

    public function insert_customer()
    {
        $name = $_POST['name'];
        $SDT = $_POST['SDT'];
        $mail = $_POST['mail'];
        $title = $_POST['title'];
        $query =  "INSERT INTO customer_inf (
            Customer_name,
            customer_sdt,
            customer_mail,
            customer_title
        ) values ('$name','$SDT','$mail','$title')";
        $result = $this -> db -> insert($query);
        header('location:index.php');
        return $result;
    }
    public function show_promotion()
    {
            $query = "SELECT * FROM  promotion ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_page($star, $end)
    {
            $query = "SELECT * FROM  product_bike ORDER BY product_id DESC LIMIT $star, $end";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_caterory()
    {
            $query = "SELECT * FROM  product_category ORDER BY id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_product($cartegory_id)
    {
        $query = "SELECT product_img_des.product_id, product_bike.product_name, product_bike.product_price, MAX(product_img_des.product_img_desc) AS product_img_desc
        FROM product_bike
        INNER JOIN product_img_des ON product_img_des.product_id = product_bike.product_id
        WHERE product_bike.cartegory_id = '$cartegory_id' or product_bike.brand_id = '$cartegory_id'
        GROUP BY product_img_des.product_id, product_bike.product_name, product_bike.product_price
        ORDER BY product_img_des.stt DESC "  ;
            $result = $this->db->select($query);
            return $result;
    }
    public function show_product_item($product_id)
    {
            $query = "SELECT * FROM  product_bike where product_id ='$product_id'";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_brand($cartegory_id)
    {
            $query = "SELECT  * From brand where category_id = '$cartegory_id' or
            brand_id = '$cartegory_id'
            order by brand_id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function get_brand($brand_name)
    {
            $query = "SELECT brand_name FROM brand inner join product_bike on
            product_bike.brand_id = brand.brand_id 
            where product_bike.product_id = '$brand_name'";
            $result = $this->db->select($query);        
            return $result;
    }
    
    public function show_product_des($product_des)
    {
            $query = "SELECT  *FROM product_img_des , product_bike  where product_bike.product_id = product_img_des.product_id and product_bike.product_id = '$product_des' ";
            $result = $this->db->select($query);
            return $result;
    }
    public function  get_color($color_name) 
    {
        $query = "SELECT  *FROM product_img_des   where product_img_des.product_img_desc = '$color_name'  ";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function add_cart($total)
    {
        $product_id = $_POST['product_id'];
        $ip_user = $_POST['ip_user'];
        $color = $_POST['color_a'];
        $quantity = $_POST['quantity'];

        $query = ("INSERT INTO customer_cart (product_id,cart_color,cart_quantity,user_ip, total) 
        values ('$product_id','$color','$quantity','$ip_user','$total')");
        $result = $this -> db -> insert($query);
        return $result;
    }

 

    public function   pay_insert($bill,$money,$code,$a)
    {

        $query = ("INSERT INTO pay (trading_code,money_paid,id_receipt,static) 
        values ('$code','$money','$bill','$a')");
        $result = $this -> db -> insert($query);
        return $result;
    }

    public function show_item($ip)
    {
        $query = ("SELECT *FROM customer_cart WHERE user_ip = '$ip' ");
        $result = $this -> db -> select($query);
        return $result;
    }   

    public function update_cart($productid, $product_color, $newquantity, $newtotal )
    {
        $query = "UPDATE customer_cart SET cart_quantity = '$newquantity', total = '$newtotal' WHERE product_id = '$productid' AND cart_color = '$product_color'";
        $result = $this -> db -> update($query);
        return $result;
    }   
    public function count_color( $count_color)  
    {
        $query = "SELECT  color from product_img_des where product_id = '$count_color'order by stt desc";
            $result = $this->db->select($query);
            return $result;
    }


    public function color_back( $color_name)  
    {
        $query = "SELECT  color_img from color where color.color_name = '$color_name' ";
            $result = $this->db->select($query);
            return $result;
    }
    public function color_image( $color_pic,$product_id_color)
    {
        $query = "SELECT  *from product_img_des where color = '$color_pic' and product_id = '$product_id_color'";
        $result = $this->db->select($query);
        return $result;
    }
        public function show_total($total_show)
        {
        $query = "SELECT sum(total) as sl , sum(cart_quantity) as item , cart_id from customer_cart where user_ip = '$total_show'  ";
        $result = $this->db->select($query);
        return $result;
}
public function show_item_cart($ip)
{
    $query = ("SELECT *FROM customer_cart, product_bike WHERE product_bike.product_id = customer_cart.product_id  and  user_ip = '$ip' ");
    $result = $this -> db -> select($query);
    return $result;
}   

}
    
?>
