<?php 
include "header.php";
include "slider.php";
include "class/brandclass.php";
?>
<?php
$brand = new Brandclass;
 if(!isset($_GET['brand_id']) || $_GET['brand_id'] ==null )
 {
     echo  "<script>window.location = 'catelist.php'</script>";
 }
 else 
 {
    $brand_id = $_GET['brand_id'];
 }
$get_brand = $brand ->get_brand($brand_id);
if($get_brand)
{
    $resultA = $get_brand->fetch_assoc(); 
}


if($_SERVER['REQUEST_METHOD']==='POST')
{
    $cartegory_id = $_POST['cartegory_id'];
    $brand_name = $_POST['brand_name'];
    $update_brand = $brand -> update_brand( $cartegory_id, $brand_name, $brand_id);
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
                    <h1>ADD</h1>
                    <br>
                    <form action=" " method="post">
                       <select name="cartegory_id" id="">
                        <option value="#">Chọn danh mục sản phẩm</option>
                        <?php
                        $show_cartegory = $brand -> show_caterory();
                        if($show_cartegory)
                        {
                            while($result = $show_cartegory ->fetch_assoc())
                            {
                         ?>
                        <option
                        <?php 
                        if($resultA['category_id']===$result['id'])
                        {
                             echo "SELECTeD";
                        }
                        ?> value="<?php echo $result['id']?>"><?php echo $result['name']?></option>
                        <?php
                            }
                        }
                        ?>
                       </select> <br>
                       <input required name="brand_name" type="tetx" placeholder="Nhap ten danh muc" 
                       value="<?php echo $resultA['brand_name'] ?>">
                        <button type="submit">sua</button>
                    </form>
                </div>  
        </div>
    </section> 
</body>
</html> 