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
                    <div class ="button_add">
                        <a href="hasadd.php">ADD</a>
                    </div>
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
<div id="name">

</div>
                       <script>
    $(document).ready(function()
    {
        $('#agency').change(function()
        {
            // alert($(this).val())
            var x = $(this).val()
            $.get(  "hasadjax.php",{agency:x}, function(data)
            {
                $("#name").html(data);
            })
        })
    })
</script>
                    </form>
                </div>
        </div>
    </section>
</body>
</html>