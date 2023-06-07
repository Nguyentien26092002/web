
<?php
// Include file productclass.php
include "class/productclass.php";
$id = $_GET['id'];
// Tạo đối tượng Product
$color = new Product;

// Lấy dữ liệu màu sắc từ cơ sở dữ liệu
$show_color = $color->color_showw($id);
if($show_color) {
  // Lặp qua dữ liệu và tạo các tùy chọn cho trường select
  while($result = $show_color->fetch_assoc()) {
    echo '<option value="' . $result['color_name'] . '">' . $result['color_name'] . '</option>';
  }
}
?>
