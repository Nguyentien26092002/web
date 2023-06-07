<?php 
include "class/has.php";
$brand = new Has;
    $product = $_GET['product'];
    $agency = $_GET['agency'];
    $delete_brand = $brand ->Delete_brand($product,$agency);
?>
