<?php 
include"header.php";
include"slider.php";
include "class/agency.php";
?>
<?php
if ($_POST) {
    $check = new Agency;
    $check_exit = $_POST['name'];
    $check_img = $_FILES['img']['name'];
    $check_exit = $check->select_color($check_exit,$check_img);
    if ($check_exit) {
        ?>
        <script>
            alert("Màu hoặc ảnh đã tồn tại ");
        </script>
        <?php
    } else {
        $add = new Agency;
        $addadmin = $add->add_color();
    }
}
?>
<div class="admin_content_right">
                <div class="admin_content_right_cateroty_add">
                    <h1>ADD</h1>
                    <br>

                    <form action=" " method="post" enctype="multipart/form-data">
      <label>Màu:</label>
      <input type="text" name="name" required>
      <label>Ảnh:</label>
      <input type="file" name="img" required>
  
                        <button type="submit">Them</button>

                    </form>
                    </div>
        </div>
    </section>
</body>
</html>