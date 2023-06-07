<?php 
include "class/agency.php";
$admin = new Agency;
    $admin_id = $_GET['agency_id'];
    $admin_id = $admin ->Delete_admin($admin_id);
?>
s