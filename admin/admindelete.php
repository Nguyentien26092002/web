<?php 
include "class/admin.php";
$admin = new Admin;
    $admin_id = $_GET['admin_id'];
    $admin_id = $admin ->Delete_admin($admin_id);
?>
