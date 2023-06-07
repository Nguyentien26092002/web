<?php  
include "header.php";
include "slider.php";
include "class/has.php";
?>
<?php
$brand = new Has;
if($_POST)
{
   $add = new Has;
    $agency = $_POST['agency'];
    $quantity = $_POST['quantity'];
    $product = $_POST['product'];
    $insert_brand = $add -> insert_brand( $agency,$quantity,$product);
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
                       <select name="agency" id="agency">
                        <option value="#">Chọn đại lý</option>
                        <?php
                        $show_cartegory = $brand -> show_caterory();
                        if($show_cartegory)
                        {
                            while($result = $show_cartegory ->fetch_assoc())
                            {
                         ?>
                        <option value="<?php echo $result['agency_id']?>"><?php echo $result['agency_adress']?></option>
                        <?php
                            }
                        }
                        ?>
                       </select> <br>

                       <select name="product" id="">
                        <option value="#">Chọn sản phẩm</option>
                        <?php
                        $product = new Has;
                        $show_product = $product -> show_product();
                        if($show_product)
                        {
                            while($result = $show_product ->fetch_assoc())
                            {
                         ?>
                        <option value="<?php echo $result['product_id']?>"><?php echo $result['product_name']?></option>
                        <?php
                            }
                        }
                        ?>
                       </select> <br>

                       <input required name="quantity" type="number" min="1" placeholder="Nhập số lượng">
                        <button type="submit">Them</button>
                    </form>
                </div>
        </div>
    </section>
    <script>
    $(document).ready(function()
    {
        $('#agency').change(function()
        {
            // alert($(this).val())
            var x = $(this).val()
            $.get(  "productaddajax.php",{cartegory_id:x}, function(data)
            {
                $("#brand_id").html(data);
            })
        })
    })
</script>
</body>
</html>