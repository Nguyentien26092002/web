<?php 
include "header.php";
include "slider.php";
include "class/brandclass.php";
?>
<?php
$brand = new Brandclass;
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $cartegory_id = $_POST['cartegory_id'];
    $brand_name = $_POST['brand_name'];
    $insert_brand = $brand -> insert_brand( $cartegory_id, $brand_name);
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
                        <option value="<?php echo $result['id']?>"><?php echo $result['name']?></option>
                        <?php
                            }
                        }
                        ?>
                       </select>
                       </select> <br>
                       <input required name="brand_name" type="tetx" placeholder="Nhap ten danh muc">
                        <button type="submit">Them</button>
                    </form>
                </div>
        </div>
    </section>
</body>
</html>