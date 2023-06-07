<?php 
include "header.php";
include "slider.php";
include "class/productclass.php";
?>
    <?php
    $cartegory = new Product;
    $show_category = $cartegory -> show_product();
    ?>
    <style>
        .hid 
{
    display:none;
    padding-bottom: 40px;
}
.big
{
    border: none;
    background-color: transparent;
}
        </style>
<div class="admin_content_right">
<div class="admin_content_right_cateroty_list">
                    <h1>Danh sach </h1>
                    <div class ="button_add">
                        <a href="productadd.php">ADD</a>
                    </div>
                    <div>
                    <form  >
                <input required id="search" name="find" placeholder="Find" value="" type="text">
                <button  id="find" style=" 
    border: none;
    background-color: transparent;" type="submit" class="fas fa-search"></button>
                </form>
                    </div>
                   <div id="find_out">
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
                            <td><?php echo  $formattedNumber = number_format($result['product_price'], 0, '.', '.') ?></td>
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

                   </div>                
                </div>
    </section>
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

$(document).ready(function() {

  $('#find').click(function() {
    event.preventDefault();
    var page = $('#search').val();

    // Gửi yêu cầu AJAX đến server
    $.ajax({
      url: 'findajax.php',
      type: 'post',
      data: { page: page },
      success: function(response) {
        // Hiển thị kết quả trả về trên trang HTML
        $('#find_out').html(response);
      }
    });
  });
});

</script>
</body>
</html>