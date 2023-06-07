<?php
  $filename = $_POST['filename'];
  echo "The current image is: " . $filename;
  $query = "SELECT * FROM product_bike
  INNER JOIN product_img_des ON product_img_des.product_id = product_bike.product_id
  WHERE product_bike.color = '$filename' OR product_img_des.color = '$filename'";
?>