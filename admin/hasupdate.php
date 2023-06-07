
<?php 
include "header.php";
include "slider.php";
include "class/has.php";
    $update = new Has;
    $product = $_GET['product'];
    $agency = $_GET['agency'];

  $show_brand_ajax = $update-> show_ajax($agency,$product);
  if($_POST)
{
$up = new Has;
$quantity_up = $_POST['quantity'];
$quantity_up = $up -> update_quantity($agency,$product,$quantity_up);
}
 if($show_brand_ajax)
{
$result= $show_brand_ajax->fetch_assoc();

 ?>
<form action="" method="POST">
<table style="width: 60%; text-align:center;" >
    <tr>
        <th>Sản phẩm</th>
        <th>Số lượng</th>

    </tr>   
    <tr>
        <td><?php echo $result["product_name"] ?></td>
        <td><input id="input_field" name="quantity"  value="<?php echo $result["quantity"] ?>"> </td>   
    </tr>

</table>
<button type="submit">Sửa</button>
</form>
 <?php

   }
    ?>

<script>
// Sử dụng JavaScript để giới hạn người dùng chỉ nhập số vào ô input và tự động reload lại giá trị
document.getElementById('input_field').addEventListener('input', function(e) {
  var inputValue = e.target.value;
  // Loại bỏ tất cả các ký tự không phải số
  var numericValue = inputValue.replace(/[^0-9]/g, '');
  // Gán lại giá trị cho ô input chỉ bao gồm số
  e.target.value = numericValue;

});
</script>