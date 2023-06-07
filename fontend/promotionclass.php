<?php
include "database.php";
?>
<?php
/**
 * Summary of Promotion
 */
class Promotion
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
            customer_title,
            static
        ) values ('$name','$SDT','$mail','$title',0)";
        $result = $this -> db -> insert($query);
        return $result;
    }
    public function add_coment($id)
    {
        $star = $_POST['star'];
        $name = $_POST['name'];
        $SDT = $_POST['sdt'];
        $currentDateTime = date("Y-m-d H:i:s");
        $title = $_POST['feedback'];
        $query =  "INSERT INTO customer_feedback (
            feedback,
            date_feedback,
            static,
            product_id,
            name,
            sdt,
            star
        ) values ('$title','$currentDateTime',0,'$id','$name','$SDT','$star')";
        $result = $this -> db -> insert($query);
        return $result;
    }
    public function show_promotion()
    {
            $query = "SELECT * FROM  promotion ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_promotionver()
    {
            $query = "SELECT * FROM promotion ORDER BY id DESC LIMIT 4 ";
            $result = $this->db->select($query);
            return $result;
    }
    public function count($id)
    {
            $query = "SELECT count(product_id) as sl FROM product_bike where brand_id ='$id'   ";
            $result = $this->db->select($query);
            return $result;
    }       
    public function show_page($star, $end)
    {
            $query = "SELECT * FROM  product_bike ORDER BY product_id DESC LIMIT $star, $end";
            $result = $this->db->select($query);
            return $result;
    }
    public function countnone()
    {
            $query = "SELECT count(product_id) as sl FROM product_bike ";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_caterory()
    {
            $query = "SELECT * FROM  product_category ORDER BY id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function get_order()
    {
        $sdt = $_POST['sdt'];
        $cccd = $_POST['cccd'];
            $query = "SELECT * FROM  customer where cccd = '$cccd' and phone='$sdt'";
            $result = $this->db->select($query);
            return $result;
    }
    public function find_order($id)
    {
            $query = "SELECT * FROM  receipt, pay  where receipt.id_receipt = pay.id_receipt and receipt.id_customer = '$id'";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_product($cartegory_id)
    {
        $query = "SELECT product_img_des.product_id, product_bike.product_name, product_bike.product_price, MAX(product_img_des.product_img_desc) AS product_img_desc
        FROM product_bike
        INNER JOIN product_img_des ON product_img_des.product_id = product_bike.product_id
        WHERE  product_bike.brand_id = '$cartegory_id'
        GROUP BY product_img_des.product_id, product_bike.product_name, product_bike.product_price
        ORDER BY product_img_des.stt DESC LIMIT 8 "  ;
            $result = $this->db->select($query);
            return $result;
    }
    public function show_product_list()
    {
        $query = "SELECT product_img_des.product_id, product_bike.product_name, product_bike.product_price, MAX(product_img_des.product_img_desc) AS product_img_desc
        FROM product_bike
        INNER JOIN product_img_des ON product_img_des.product_id = product_bike.product_id
        GROUP BY product_img_des.product_id, product_bike.product_name, product_bike.product_price
        ORDER BY product_img_des.stt DESC  LIMIT 8"  ;
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
    public function show_brand_list()
    {
            $query = "SELECT  * From brand 
            order by brand_id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_list()
    {
            $query = "SELECT  * From brand  order by brand_id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function list_agency()
    {
            $query = "SELECT  * From agency  order by agency_id asc";
            $result = $this->db->select($query);
            return $result;
    }

    
    public function search($inf)
    {
        $query = "SELECT DISTINCT brand.*, product_bike.*, product_img_des.*
                  FROM brand
                  INNER JOIN product_bike ON product_bike.brand_id = brand.brand_id
                  INNER JOIN product_img_des ON product_bike.product_id = product_img_des.product_id
                  WHERE product_bike.product_name LIKE '%$inf%' OR brand.brand_name LIKE '%$inf%'
                  GROUP BY product_img_des.product_id"; // Thêm câu lệnh GROUP BY ở đây
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
    public function select_comment($id)
    {
            $query = "SELECT *FROM customer_feedback  
            where product_id = '$id'";
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
    public function  get_color_page($id) 
    {
        $query = "SELECT  *FROM product_img_des   where product_id = '$id'  order by stt asc ";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function  get_idcus($id) 
    {
        $query = "SELECT  *FROM  receipt  where id_receipt = '$id'  ";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_cus($id)
    {
        $query = "DELETE FROM customer WHERE customer_id = '$id'";
        $result = $this->db->delete($query);
        $queryB = "DELETE FROM receipt WHERE id_customer = '$id'";
        $resultB = $this->db->delete($queryB);
        
        // Kiểm tra kết quả của câu lệnh SQL
        if ($result && $resultB) {
            // Kết quả xóa thành công
            return true;
        } else {
            // Xử lý lỗi khi xóa dữ liệu
            return false;
        }
    }
    
    public function Del_cart($id)
    {
        $queryB = "DELETE FROM customer_cart WHERE user_ip = '$id'";
        $resultB = $this->db->delete($queryB);
        return $resultB;
    }
    public function Del_detail($id)
    {
        $queryA = "DELETE FROM receipt WHERE id_receipt = '$id'";
        $resultA = $this->db->delete($queryA);
        $queryB = "DELETE FROM receipt_detail WHERE id_recceipt = '$id'";
        $resultB = $this->db->delete($queryB);
        return $resultB;
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
        echo "<script> window.location.href = 'cart.php'  </script>";
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
        echo "<script> window.location.href = 'cart.php'  </script>";
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
public function show_customer()
{
    $query = ("SELECT *FROM customer ");
    $result = $this -> db -> select($query);
    return $result;
}
public function select_promotion()
{
    $query = ("SELECT *FROM promotion order by id desc ");
    $result = $this -> db -> select($query);
    return $result;
}

}
    
?>
