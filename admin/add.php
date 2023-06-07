<?php 
include"header.php";
include"slider.php";
include "class/agency.php"
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $check = new Agency;
    $check_exit = $_POST['admin_name'];
    $check_exit = $check->select_name($check_exit);
    if ($check_exit) {
        ?>
        <script>
            alert("Địa chỉ đã tồn tại ");
        </script>
        <?php
    } else {
        $name = $_POST['admin_name'];
        $pass = trim($_POST['admin_pass']);
        $agency = $_POST['agency'];
        $add = new Agency;
        $addadmin = $add->add_admin($name,$pass,$agency);
    }
}

?>
<div class="admin_content_right">
                <div class="admin_content_right_cateroty_add">
                    <h1>ADD</h1>
                    <form action=" " method="post">
                    <input style="width: 80%; height: 50px; " required name="agency" type="tetx" placeholder="Nhập Địa chỉ đại lý">
                        <input style="width: 80%; height: 50px; " required name="admin_name" type="tetx" placeholder="Nhập Địa chỉ cụ thể ">

                        <input style="width: 80%; height: 50px; " required name="admin_pass" type="number" placeholder="Nhập số điện thoại">
                        <button type="submit">Them</button>
                    </form>
                </div>
        </div>
    </section>
</body>
</html>