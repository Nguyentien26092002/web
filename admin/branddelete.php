<?php 
include "class/brandclass.php";
$brand = new Brandclass;
    $brand_id = $_GET['brand_id'];
    $delete_brand = $brand ->Delete_brand($brand_id);
?>
