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
// var_dump($_POST,$_FILES);
}
?>
<div class="admin_content_right">
    <div class="admin_content_right_product_add">
        <h1>ADD</h1>
        <form method="post" enctype="multipart/form-data">
        <select id="add" name="color_des[]">
                        <option value="">---Chon mau </option>
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
            <div id="color-images">
                <div class="color-image">
                    <label>Màu:</label>
                    <select class="add_new_color" name="color_des[]">
                        <option value="">---Chon mau </option>
                    </select>
                    <label>Ảnh:</label>
                    <input type="file" name="image_des[]" required>
                </div>
            </div>
  
            <button id="add_new" type="button" onclick="addDiv()">Thêm Màu và Ảnh</button><br><br>
            <button  type="submit">Them</button>

        </form>
    </div>
</div>
</section>

<script>
$(document).ready(function() {
    $('#add_new').click( function() { 
        $.get("colorajax.php", function(data) {
            $(".add_new_color").html(data);
        });
    });
});
</script>

<script>
function addColorImage() {
    var newDiv = document.createElement('div');
    newDiv.className = "color-image";

    var labelColor = document.createElement('label');
    labelColor.innerHTML = "Màu:";
    newDiv.appendChild(labelColor);

    var selectColor = document.createElement('select');
    selectColor.className = "add_new_color"; // Thêm class cho phần tử select
    selectColor.name = "color_des[]";
    newDiv.appendChild(selectColor);


    var labelImage = document.createElement('label');
    labelImage.innerHTML = "Ảnh:";
    newDiv.appendChild(labelImage);

    var inputImage = document.createElement('input');
    inputImage.type = "file";
    inputImage.name = "image_des[]";
    inputImage.required = true;
    newDiv.appendChild(inputImage);

    document.getElementById('color-images').appendChild(newDiv);
}

// Thêm đoạn mã sau vào trong script
document.getElementById('add_new').addEventListener('click', function() { 
    addColorImage();
});

</script>
</body>
</html>
