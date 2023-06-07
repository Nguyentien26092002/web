<?php 
include "header.php";
include "slider.php";
include "class/caterory_class.php"
?>
<?php
$cartegory = new Caterory;
if(!isset($_GET['caterory_id']) || $_GET['caterory_id'] ==null )
{
    echo  "<script>window.location = 'catelist.php'</script>";
}
else 
{
    $cartegory_id = $_GET['caterory_id'];
}
$get_carteid = $cartegory ->get_carteid($cartegory_id);
if($get_carteid)
{
    $result = $get_carteid->fetch_assoc(); 
}
?>
<?php
if($_SERVER['REQUEST_METHOD']==='POST') 
{
    $cartgory_name = $_POST['cartgory_name'];
    $update_cart = $cartegory -> update_cartegory($cartgory_name, $cartegory_id);
}
?>
<div class="admin_content_right">
                <div class="admin_content_right_cateroty_add">
                    <h1>ADD</h1>
                    <form action=" " method="post">
                        <input required name="cartgory_name" type="tetx" placeholder="Nhap ten danh muc " 
                        value="<?php echo $result['name']?>">
                        <button type="submit">Them</button>
                    </form>
                </div>
        </div>
    </section>
</body>
</html>