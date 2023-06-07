<?php
include "class/customer.php";

$name = new Customer;
$show = $_GET['id'];
$show = $name->del_cus($show);
?>