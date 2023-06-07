
<?php 
include "class/has.php";
    $product = new Has;
    $agency   = $_GET['agency'];

  $show_brand_ajax = $product-> show_brand_ajax($agency);
  
 if($show_brand_ajax)
{
  while($result= $show_brand_ajax->fetch_assoc())
   {
 ?>
<table style="width: 60%; text-align:center;" >
    <tr>
        <th>Sản phẩm</th>
        <th>Số lượng</th>
        <th>Thay đổi</th>
    </tr>
    <tr>
        <td><?php echo $result["product_name"] ?></td>
        <td><?php echo $result["quantity"] ?></td>
        <td><a href="hasupdate.php?product=<?php echo $result['product_id'] ?>&agency=<?php echo $_GET['agency'] ?>">Sua</a>|<a href="hasdelete.php?product=<?php echo$result['product_id']?>&agency=<?php echo $_GET['agency'] ?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xoa</a></td>
    </tr>
</table>
 <?php
    }
   }
    ?>