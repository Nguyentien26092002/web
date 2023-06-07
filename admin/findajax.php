<?php
include "class/productclass.php";
if(isset($_POST['page']))
{
    $name = $_POST['page'];
    $cartegory = new Product;
    $show_category = $cartegory -> show_find($name);
    ?>
    <table >
    <tr>
        <th>Danh Muc</th>
        <th>Tên sản phẩm</th>
        <th>Giá </th>
        <th>Mô Tả </th>
        <th>Tuy bien</th>
    </tr>
    <?php 
    if($show_category)
    {
    
        while( $result = $show_category->fetch_assoc())
        {
            
    ?>
    <tr>
        <td><button onclick="myfuntion()" class="big">&#8582;</button></td>
        <td><?php echo $result['product_name']?></td> 
        <td><?php echo $result['product_price']?></td>
        <td><?php echo $result['product_des']?></td>
        <td><a href="productupdate.php?product_id=<?php echo $result['product_id'] ?>">Sua</a>|<a href="productdelete.php?product_id=<?php echo $result['product_id']?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xoa</a></td>
    </tr>
    <tr >
    <td style="border: none; padding:0" colspan="8">
        <div class="hid">
        <table  >
        <tr>
            <th>
                Màu xe
            </th>
            <th>
                Ảnh
            </th>
        </tr>
            <?php
                $color = new Product;
                $select_color = $color->Show_color_img($result['product_id']);
            if ($select_color) {
                while($resultB = $select_color->fetch_assoc())
                {                             
                ?>
                <tr>
                    <td><?php echo  $resultB['color']?></td>
                    <td><img style="width: 50px; height:50px" src="./uploads/<?php echo $resultB['product_img_desc']?>" ></td>
                    </tr>
                <?php
                  }
            }
            ?>                                            
        </table>
        </div>
    </td>

</tr>
    <?php
        }
    }
    ?>
</table>
<?php
}
?>
    <script>
function myfuntion()
{
    const subMenu = event.target.parentElement.parentElement.nextElementSibling.querySelector(".hid");
    if (subMenu.style.display === "block") {
      subMenu.style.display = "none";
    } else {
      subMenu.style.display = "block";
    }
}
</script>