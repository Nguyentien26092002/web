<?php 
include "fontend/productclass.php";
$brand = new Product;
    $product = $_GET['id'];
    $delete_brand = $brand ->Delete_cart($product);
?>
