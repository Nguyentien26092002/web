<?php 
include "header.php";
include "slider.php";
include "class/agency.php";
?>
<?php
$admin = new Agency;
$show = $_GET['agency_id'];
$show = $admin -> Get_admin($show);




if($_POST)
{  
    $check = new Agency;
    $id= $_GET['agency_id'];
    $name = $_POST['name'];
    $check_exit = $check->select_name($name);
    if($check_exit)
    {
        ?>
        <script>
            alert("Địa chỉ đã tồn tại");
        </script>
        <?php
    }
    else
    {
        $brand = new Agency;
     $update = $brand -> update_admin($id);
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
                    <form action=" " method="post">
                        <?php 
                        if($show)
                        {
                            $resultA = $show -> fetch_assoc();

                        ?>
                    <input  name="id" type="tetx"  value="<?php echo $resultA['agency_provine'] ?>">
                       <input required name="name" type="tetx"  value="<?php echo $resultA['agency_adress'] ?>">
                       <input required name="status" type="tetx"  value="<?php echo $resultA['agency_phone'] ?>">
                       <?php
                                               }
                                               ?>
                        <button type="submit">sua</button>

                    </form>
                </div>  
        </div>
    </section> 
</body>
</html> 