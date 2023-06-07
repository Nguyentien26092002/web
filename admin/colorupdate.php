<?php 
include "header.php";
include "slider.php";
include "class/agency.php";
?>

<?php
$admin = new Agency;
$show = $_GET['color_name'];
$show = $admin->Get_color($show);

if($show) {
    $resultA = $show->fetch_assoc();
    $file = $resultA['color_img'];
    $nameA = $resultA['color_name'];
if($_POST) {  
    $id = $_POST['id'];
    if($id==$nameA)
    {
        if(empty($_FILES['img']['tmp_name'])) {
            $a = 1;
            $img =$file ;
            $brand = new Agency;
            $update = $brand->update_color($nameA, $a,$img);
        }
        else {
            $img = $_FILES['img']['name'];
            $ten_file_anh = $file;
            unlink("./img_color/$ten_file_anh"); 
            $a = 0;
            $brand = new Agency;
            $update = $brand->update_color($nameA, $a,$img);
        }
    }
    else
    {
        $check = new Agency;

        $check_exit = $check->select_color($id);
        if($check_exit) {
            ?>
            <script>
                alert("Tên màu đã tồn tại");
            </script>
            <?php
        }
        else {
            if(empty($_FILES['img']['tmp_name'])) {
                $a = 1;
                $img =$file ;
                $brand = new Agency;
                $update = $brand->update_color($nameA, $a,$img);
            }
            else {
                $img = $_FILES['img']['name'];
                $ten_file_anh = $file;
                unlink("./img_color/$ten_file_anh"); 
                $a = 0;
                $brand = new Agency;
                $update = $brand->update_color($nameA, $a,$img);
            }
    }
    

    }
}
?>

<style>
    select {
        height: 30px;
        width: 200px;
    }
</style>

<div class="admin_content_right">
    <div class="admin_content_right_cateroty_add">
        <h1>Sửa</h1>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <input name="id" type="text" value="<?php echo $resultA['color_name'] ?>">
            <span><img style="width: 40px; height:40px;  align-items: center;  border: 1px solid black; padding-top: 10px; " src="./img_color/<?php echo $resultA['color_img']?>"></span>
            <br>
            <label>Ảnh:</label>
            <input type="file" name="img" >
            <?php
            }
            ?>
            <button type="submit">Sửa</button>
        </form>
    </div>  
</div>
</section>
</body>
</html>
