<?php 
include"header.php";
include"slider.php";
include "class/admin.php";
?>
<?php
$admin = new Admin;
$show = $_GET['admin_id'];
$show = $admin -> Get_admin($show);

if($show)
{
    $resultA = $show -> fetch_assoc();
$nameA = $resultA['name'];



if($_POST)
{
    if(trim($_POST['Pass']) == "") {
        $Pass = $resultA['Pass_word'];
    } else {
        $Pass = password_hash($_POST['Pass'], PASSWORD_BCRYPT); 
    }


    $id = $_GET['admin_id'];
    $check = new Admin;
    $name= $_POST['name'];
   if($name == $nameA)
   {
    $brand = new Admin;
    $update = $brand -> update_admin($Pass,$id );
   }

    else
    {

        $check_exit = $check->select_name($name);
        if($check_exit)
        {
            ?>
            <script>
                alert("Tên tài khoãn đã tồn tại");
            </script>
            <?php
        }
        else
        {
            $brand = new Admin;
            $update = $brand -> update_admin($Pass,$id );
        }
    }



   
}
?>
<style>
    select
    {
        height: 30px;
        width: 200px;
    }
    </style>
<div class="admin_content_right">
                <div class="admin_content_right_cateroty_add">
                    <h1>Sửa</h1>
                    <br>
                    <form action="" method="post">
                    <table>
    <thead>
        <tr>
            <th>Tên tài khoản</th>
            <th>Quyền</th>
            <th>Trạng thái</th>
            <th>Mật khẩu</th>
        </tr>
    </thead>
    <tbody>
        <tr>

                <td>
                    <input required name="name" type="text" value="<?php echo $resultA['name'] ?>">
                </td>
                <td>
                    <input required name="status" type="text" value="<?php echo $resultA['status'] ?>">
                </td>
                <td>
                    <input required name="position" type="text" value="<?php echo $resultA['position'] ?>">
                </td>
                <td>
                    <input name="Pass" type="text" placeholder="Nhập mật khẩu mới">
                </td>
                <td>
                    <button type="submit">Sửa</button>
                </td>

        </tr>
    </tbody>
</table>
</form>           
<?php
}
?>
                     
                       
                      
                      



                </div>  
        </div>
    </section> 
</body>
</html> 