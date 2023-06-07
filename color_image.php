<?php 
include "fontend/promotionclass.php";

if($_GET) {
    $color_pic = $_GET['color'];
    $product_id_color = $_GET['product_id'];
    $color = new Promotion; 
    $color_pic = $color->color_image($color_pic, $product_id_color); 
    if($color_pic) {
        $resultB = $color_pic->fetch_assoc();
        $color_a = ucwords($_GET['color']) ;
        $response = array(
            'image' => 'admin/uploads/' . $resultB['product_img_desc'],
            'color' => $color_a
        );
        echo json_encode($response);
    } else {
        echo "<h1>ảnh bị lỗi</h1>";
    }
}
?>
