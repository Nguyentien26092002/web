<?php 
include "header.php";
include "slider.php";
include "class/caterory_class.php"
?>
<?php
$cartegory = new Caterory;
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $cartgory_name = $_POST['cartgory_name'];
    $insert_cart = $cartegory -> insert_cartegory($cartgory_name);
}
?>
<div class="admin_content_right">
                <div class="admin_content_right_cateroty_add">
                    <h1>ADD</h1>
                    <form action=" " method="post">
                        <input required name="cartgory_name" type="tetx" placeholder="Nhap ten danh muc">
                        <button type="submit">Them</button>
                    </form>
                </div>
        </div>
    </section>
</body>
</html>