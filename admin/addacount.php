<?php 
include"header.php";
include"slider.php";
include "class/admin.php"
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $check = new Admin;
    $check_exit = $_POST['admin_name'];
    $check_exit = $check->select_name($check_exit);
    if ($check_exit) {
        ?>
        <script>
            alert("Tên Đăng nhập đã tồn tại ");
        </script>
        <?php
    } else {
        $name = $_POST['admin_name'];
        $Pass = password_hash($_POST['admin_pass'], PASSWORD_BCRYPT); 
        $positon = $_POST['admin_position'];
        $add = new Admin;
        $addadmin = $add->add_admin($name, $Pass, $positon);
    }
}

?>
<div class="admin_content_right">
                <div class="admin_content_right_cateroty_add">
                    <h1>ADD</h1>
                    <form action=" " method="post">
                        <input style="width: 80%; height: 50px; " required name="admin_name" type="tetx" placeholder="Nhập tên tài khoản">

                        <input style="width: 80%; height: 50px; " required name="admin_pass" type="tetx" placeholder="Nhập mật khẩu">

                        <input  style="width: 80%; height: 50px; " required min="0" max="1" type="number" name="admin_position" type="tetx" placeholder="Cấp Quyền">
                        <button type="submit">Them</button>
                    </form>
                </div>
        </div>
    </section>
</body>
</html>