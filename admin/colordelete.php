<?php
include "class/agency.php";

$name = new Agency;
$show = $_GET['color_name'];
$show = $name->Get_color($show);

if($show) {
    $result = $show->fetch_assoc();
    $ten_file_anh = $result['color_img'];
        unlink("./img_color/$ten_file_anh"); 
    $admin = new Agency;
    $admin_id = $_GET['color_name'];
    $admin_id = $admin->Delete_color($admin_id);
    }
?>
