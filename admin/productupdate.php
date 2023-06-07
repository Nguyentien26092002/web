<?php 
include "header.php";
include "slider.php";
include "class/productclass.php";
?>
<?php

$product = new Product;
$id = $_GET['product_id'];
$product_id = $_GET['product_id'];
$product_id = $product-> show_bike($product_id);
  


if($_SERVER['REQUEST_METHOD']==='POST')
{
  

  
  if(isset($_FILES['image_des']) && $_FILES['image_des']['error'] == 0)
{
  $new = new Product;
$del_old = $new->show_bike_img($id);

if($del_old)
{
    while ($row = $del_old->fetch_assoc()) {

        $ten_file_anh = $row['product_img_desc'];
        unlink("./uploads/$ten_file_anh");
    }
}
}

$insert_product = $product -> Update_product($id);
}
?>

<div class="admin_content_right">
<h1>Cập Nhật</h1>
<div class="admin_add">

  
<form action=" " method="post" enctype="multipart/form-data">
<div class="add_top">
<div class="add_left">
    <?php
    if($product_id)
    {
        $result = $product_id->fetch_assoc();
      $a = $result['product_des'];
    ?>
                        <div class="add_class">
                        <label for="">Nhập tên <span style="color: red;">*</span></label>
                        <input name="product_name" required type="tetx" value="<?php echo $result['product_name'] ?>">
                      </div>
                      <div class="add_class">
  
<label for="">Nhập giá sản phẩm <span style="color: red;">*</span></label>
                        <input name="product_price" required type="text" value="<?php echo $result['product_price'] ?>">
</div>
                       <div class="add_class">
                       <label for="">Loại động cơ <span style="color: red;">*</span></label>
                        <input name="dongco" required type="tetx" value="<?php echo $result['engine_type'] ?>">
                       </div>
                       <div class="add_class">
                       <label for="">Nhập mã lực <span style="color: red;">*</span></label>
                        <input name="hp" required type="tetx" value="<?php echo $result['hp'] ?>">
                       </div>

                   <div class="add_class">
                   <label for="">Tiêu thụ nhiên liệu trên lít <span style="color: red;">*</span></label>
                        <input name="fuel" required type="tetx" value="<?php echo $result['fuel'] ?>">
                   </div>

                        <div class="add_class">
                        <label for="">Chiều cao xe <span style="color: red;">*</span></label>
                        <input name="height" required type="tetx" value="<?php echo $result['height'] ?>">
                        </div>
</div>
<div class="add_right">



                       
<div class="add_class">
<?php 
                            $color = new Product;
                            $id_color = $_GET['product_id'];  

                            $show_color = $color->Show_color_img($id_color);
                            if($show_color)
                            {
                                while($resultA = $show_color->fetch_assoc())
                                {
                            ?>
<div id="color-images">
    <div class="color-image">
      <label>Màu:</label>
      <select  class="add_new_color" name="color_des[]" >
      
                            <option value="<?php echo $resultA['color']?>"><?php echo $resultA['color']?> </option>
                            <?php 
                            $color = new Product;
                            $show_color = $color->color_showw($resultA['color']);
                            if($show_color)
                            {
                                while($result=$show_color->fetch_assoc())
                                {
                            ?>
                            <option value="<?php echo $result['color_name']?>"><?php echo $result['color_name']?> </option>
                            <?php
                                }
                            }
                            ?>
        </select>
      <img style="width: 80px; height:80px" src="./uploads/<?php echo $resultA['product_img_desc']?>">
<br>
<p>Chọn ảnh mới:</p>
<br>
      <input type="file" name="image_des[]" >
    </div>
  </div>
  <?php
                                }
                            }
  ?>
  <button type="button" disabled  id="add_new" onclick="addColorImage()">Thêm Màu và Ảnh</button><br><br>
</div>

</div>    





</div>

                       
  
  

  <div class="add_class">
  <label for="">Nhập mô tả sản phẩm <span style="color: red;">*</span></label>
<textarea name="product_des" id="editor1" cols="30" rows="10">        <?php echo $a

  ?>     </textarea>
  </div>


  <?php

    }
  ?>
                        <button  type="submit">Them</button>

                    </form>
                </div>
        </div>









    <script>
$(document).ready(function() {
  $('.add_new_color').on('change', function() {
    $('#add_new').prop('disabled', false);
  });

  $('#add_new').click(function() {
    var selectedColors = $('.add_new_color').map(function() {
      return $(this).val();
    }).get();
    $.get("colorajax.php", {selected: selectedColors}, function(data) {
      var newDiv = $('<div class="color-image"></div>');
      var labelColor = $('<label>Màu:</label>');
      var selectColor = $('<select class="add_new_color" name="color_des[]"></select>');
      selectColor.append(data);
      selectedColors.forEach(function(color) {
        selectColor.find('option[value="' + color + '"]').remove();
      });
      var labelImage = $('<label>Ảnh:</label>');
      var inputImage = $('<input type="file" name="image_des[]" required>');
      newDiv.append(labelColor).append(selectColor).append(labelImage).append(inputImage);
      $('#color-images').append(newDiv);

     
      while (selectColor.children('option').length === 1) {
        $('#add_new').hide();
        break;
      }
    });
  });
});
</script>