<?php 
include "header.php";
include "slider.php";
include "class/productclass.php";
?>
<?php
$product = new Product;
if($_SERVER['REQUEST_METHOD']==='POST')
{
     $insert_product = $product -> insert_product();
}
?>
<div class="admin_content_right">
<h1>ADD</h1>
<div class="admin_add">

  
<form action=" " method="post" enctype="multipart/form-data">
<div class="add_top">
<div class="add_left">
                        <div class="add_class">
                        <label for="">Nhập tên <span style="color: red;">*</span></label>
                        <input name="product_name" required type="tetx" placeholder="Tên sản phẩm">
                      </div>
                      <div class="add_class">
  
<label for="">Nhập giá sản phẩm <span style="color: red;">*</span></label>
                        <input name="product_price" required type="text" placeholder="Giá sản phẩm">
</div>
                       <div class="add_class">
                       <label for="">Loại động cơ <span style="color: red;">*</span></label>
                        <input name="dongco" required type="tetx" placeholder="Nhập loại động cơ">
                       </div>
                       <div class="add_class">
                       <label for="">Nhập mã lực <span style="color: red;">*</span></label>
                        <input name="hp" required type="tetx" placeholder="Nhập mã lực">
                       </div>

                   <div class="add_class">
                   <label for="">Tiêu thụ nhiên liệu trên lít <span style="color: red;">*</span></label>
                        <input name="fuel" required type="tetx" placeholder="Tiêu thụ nhiên liệu">
                   </div>

                        <div class="add_class">
                        <label for="">Chiều cao xe <span style="color: red;">*</span></label>
                        <input name="height" required type="tetx" placeholder="Chiều cao xe">
                        </div>
</div>
<div class="add_right">
<div class="add_class">
<label for="">Hãng Xe<span style="color: red;">*</span></label>
                        <select name="brand_id" id="brand_id">
                        <option value="">---Chon danh muc </option>
                            <?php 
                            $show_cartegory = $product->show_brand_ajax();
                            if($show_cartegory)
                            {
                                while($result=$show_cartegory->fetch_assoc())
                                {
                            ?>
                            <option value="<?php echo $result['brand_id']?>"><?php echo $result['brand_name']?> </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
</div>


                       
<div class="add_class">
<div id="color-images">
    <div class="color-image">
      <label>Màu:</label>
      <select  class="add_new_color" name="color_des[]" >
      <option value="">--chọn màu-- </option>
<?php 
                            $color = new Product;
                            $show_color = $color->color_show();
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
      <label>Ảnh:</label>
      <input type="file" name="image_des[]" required>
    </div>
  </div>
  <button type="button" disabled  id="add_new" onclick="addColorImage()">Thêm Màu và Ảnh</button><br><br>
</div>

</div>    





</div>

                       
  
  

  <div class="add_class">
  <label for="">Nhap ten san pham <span style="color: red;">*</span></label>
                        <textarea name="product_des" id="editor1" cols="30" rows="10" placeholder="Mo ta san pham"></textarea>
  </div>
                        <button  type="submit">Them</button>

                    </form>
                </div>
        </div>
    </section>


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

      // Kiểm tra nếu không còn tùy chọn màu thì ẩn nút thêm
      while (selectColor.children('option').length === 1) {
        $('#add_new').hide();
        break;
      }
    });
  });
});
</script>






</body>

<script>
        CKEDITOR.replace('editor1', {
	filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
	filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
} );
</script>



</html>