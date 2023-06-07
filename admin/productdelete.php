<?php 
include "class/productclass.php";
$item = new Product;

    $product = $_GET['product_id'];
    $delete_product = $item ->Delete_product($product);

$name = new Product;
$get_img = $name-> Get_img($product); 
if($get_img) {
    
    while($result = $get_img->fetch_assoc())
    {
        $ten_file_anh = $result['product_img_desc'];
        unlink("./uploads/$ten_file_anh"); 
    }
    $img  = new Product;
    $delete_product = $img->Delete_img($product);
    }

?>

