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

    
    public function insert_product()
    {
        $product_name = $_POST['product_name'];
        $product_des = $_POST['product_des'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $hp = $_POST['hp'];
        $fuel = $_POST['fuel'];
        $height = $_POST['height'];
        $dongco = $_POST['dongco'];

        $query =  "INSERT INTO product_bike ( 

            product_name,
            brand_id,
            product_price,
            product_des,
            hp,
            engine_type,
            height,
            fuel
            
            ) 
            values (
            '$product_name',
            '$brand_id',
            '$product_price',
            '$product_des',
            '$hp',
            '$dongco',
            '$height',
            '$fuel'
        
            )";
        $result = $this -> db -> insert($query);   
       
                    if($result) 
                    {
                        $query = "SELECT * FROM product_bike order by product_id desc limit 1";
                        $result =$this -> db -> select($query) ->fetch_assoc();
                        $color_count = count($_FILES["image_des"]["name"]);
                        $product_id = $result['product_id'];   
                        $queries = array(); 
                        for($i=0;$i< $color_count ;$i++)
                        {
                            $image_des = $_FILES['image_des']['name'][$i];
        $filestyle = strtolower(pathinfo($image_des,PATHINFO_EXTENSION));
        $filetagert = basename($_FILES['image_des']['name'][$i]);
        $filesze =  $_FILES['image_des']['size'][$i];
        if(file_exists( "uploads/$filetagert"))
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
                   
                        $color = $_POST["color_des"][$i];
                        $image_name = $_FILES['image_des']['name'][$i];
                        move_uploaded_file($_FILES["image_des"]["tmp_name"][$i],"uploads/".$_FILES['image_des']['name'][$i]);
                        $queries[]  = "INSERT INTO product_img_des (	product_id, product_img_desc, color) 
                            values ('$product_id', '$image_name', '$color')";                         
                        }
                        
                    }  

                }
               
            }
           
            foreach ($queries as $query) {
                $result = $this->db->insert($query);
            }
        }
        echo "<script> window.location.href = 'productlist.php';
        </script>";
        return $result;
    }


    public function update_product($id)
    {
        $product_name = $_POST['product_name'];
        $product_des = $_POST['product_des'];
        $hp = $_POST['hp'];
        $fuel = $_POST['fuel'];
        $height = $_POST['height'];
        $dongco = $_POST['dongco'];
        $product_price = $_POST['product_price'];
    
        $query = "UPDATE product_bike SET 
            product_name = '$product_name',
            product_price = '$product_price',
            product_des = '$product_des',
            hp = '$hp',
            engine_type = '$dongco',
            height = '$height',
            fuel = '$fuel'
            WHERE product_id = '$id'";
        $result = $this->db->insert($query);
    
        if ( isset($_FILES['image_des']) && $_FILES['image_des']['error'] == 0) {
            $query = "SELECT * FROM product_bike WHERE product_id = '$id'";
            $result = $this->db->select($query)->fetch_assoc();
            $color_count = count($_FILES["image_des"]["name"]);
            $product_id = $result['product_id'];
            $queries = array(); 
            for($i=0;$i< $color_count ;$i++)
            {
                $image_des = $_FILES['image_des']['name'][$i];
$filestyle = strtolower(pathinfo($image_des,PATHINFO_EXTENSION));
$filetagert = basename($_FILES['image_des']['name'][$i]);
$filesze =  $_FILES['image_des']['size'][$i];
if(file_exists( "uploads/$filetagert"))
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
       
    $query = "DELETE FROM product_img_des WHERE product_id = '$id'";
    $resultB = $this->db->delete($query);

            $color = $_POST["color_des"][$i];
            $image_name = $_FILES['image_des']['name'][$i];
            move_uploaded_file($_FILES["image_des"]["tmp_name"][$i],"uploads/".$_FILES['image_des']['name'][$i]);
            $queries[]  = "INSERT INTO product_img_des (product_id, product_img_desc, color) 
                values ('$product_id', '$image_name', '$color')";                         
            }
            
        }  

    }
   
}

foreach ($queries as $query) {
    $result = $this->db->insert($query);
}
}
echo "<script> window.location.href = 'productlist.php';
</script>";
return $result;
}










    public function show_caterory()
    {
            $query = "SELECT * FROM  product_category ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_product()
    {
            $query = "SELECT * FROM  product_bike ORDER BY product_id desc ";
            $result = $this->db->select($query);
            return $result; 
    }
    public function show_find($name)
    {
            $query = "SELECT * FROM  product_bike where product_name  LIKE '%$name%'  ";
            $result = $this->db->select($query);
            return $result; 
    }
    public function show_receipt($name)
    {
            $query = "SELECT * FROM  customer where cccd='$name' or phone ='$name'  ";
            $result = $this->db->select($query);
            return $result; 
    }
    public function show_static($name)
    {
            $query = "SELECT * FROM  customer where static ='$name'  ";
            $result = $this->db->select($query);
            return $result; 
    }
    public function show_all($a)
    {
            $query = "SELECT *From receipt, pay where  receipt.id_receipt = pay.id_receipt and receipt.id_receipt = '$a'";
            $result = $this->db->select($query);
            return $result;
    }

    public function show_inf($id)
    {
            $query = "SELECT *  From receipt,customer where customer.customer_id = receipt.id_customer and  customer.customer_id ='$id' ";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_bike($product_id)
    {
            $query = "SELECT * FROM  product_bike where product_id ='$product_id'";
            $result = $this->db->select($query);
            return $result; 
    }
    public function show_bike_img($product_id)  
    {
        $query = "SELECT * FROM  product_img_des where product_id ='$product_id' order by stt desc ";
        $result = $this->db->select($query);
        return $result; 
    }
    
    public function Show_color_img($id_color )
    {
        $query = "SELECT * FROM  product_img_des where product_id ='$id_color'  ";
        $result = $this->db->select($query);
        return $result; 
    }
    public function color_show()
    {
            $query = "SELECT * FROM  color";
            $result = $this->db->select($query);
            return $result;
    }
    public function color_showw($a)
    {
            $query = "SELECT * FROM  color where color_name <>'$a' ";
            $result = $this->db->select($query);
            return $result;
    }
    public function show_brand()
    {
            // $query = "SELECT * FROM  brand ORDER BY id DESC";
            $query = "SELECT *  From brand inner join product_category on brand.category_id = product_category.id 
            order by brand.brand_id desc";
            $result = $this->db->select($query);
            return $result;
    }
    public function  show_brand_ajax()
    {
        $query = "SELECT * FROM  brand ";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_brand( $cartegory_id, $brand_name, $brand_id)
    {
        $query = "UPDATE brand SET brand_name ='$brand_name', category_id = '$cartegory_id'where brand_id ='$brand_id'";
        $result = $this->db->update($query);
        echo "<script> window.location.href = 'brandlist.php';
        </script>";
        return $result;
    }
    
    public function Delete_brand($brand_id)
    {
        $query = " DELETE FROM brand  where brand_id ='$brand_id'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'brandlist.php';
        </script>";
        return $result;
    }
    public function Delete_product($brand_id)
    {
        $query = " DELETE FROM product_bike where product_id ='$brand_id'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'productlist.php';
        </script>";
        return $result;
    }
    public function Delete_img_color($id)
    {
        $query = " DELETE FROM  product_img_des where product_id ='$id'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'productlist.php';
        </script>";
        return $result;
    }

    public function Delete_img($brand_id)
    {
        $query = " DELETE FROM product_img_des where product_id ='$brand_id'";
        $result = $this->db->delete($query);
        echo "<script> window.location.href = 'productlist.php' </script>";
        return $result;
    }
   
    public function  Get_img($product)
    {
            $query = "SELECT * FROM  product_img_des where product_id = '$product' ";
            $result = $this->db->select($query);
            return $result; 
    }
}
?>
