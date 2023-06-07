<?php
include "class/admin.php";

$name = new Admin;
$show = $_GET['id'];
$show = $name->get_promotion($show);

if($show) {
    $result = $show->fetch_assoc();
    $ten_file_anh = $result['imga'];
        unlink("./promotion/$ten_file_anh"); 
    $admin = new Admin;
    $admin_id = $_GET['id'];
    
    $admin_id = $admin->Delete_promotion($admin_id);
    }
?>
