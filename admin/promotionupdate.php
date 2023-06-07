<?php 
include "header.php";
include "slider.php";
include "class/admin.php"
?>
<?php
$select = new Admin;
$id = $_GET['id'];
$select_id = $select->get_promotion($id);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $add = new Admin;
        
        $addadmin = $add->promotion_update($id);
    }
?>

<div class="admin_content_right">
                <div class="admin_content_right_cateroty_add">
                    <h1>ADD</h1>
                    <form action=" " method="post" enctype="multipart/form-data">
                        <?php
                            if($select_id)
                            {
                                $result = $select_id->fetch_assoc();
                                ?>
<input style="width: 80%; height: 50px; " required name="title" type="tetx"  value="<?php echo $result['title']?>">

<input style="width: 80%; height: 50px; margin-bottom: 15px; " required name="content" type="tetx"  value="<?php echo $result['content']?>">
<img src="promotion/<?php echo $result['imga']?>">

<input  style="width: 80%; height: 50px; "   name="img" type="file" >
                                <?php
                            }
                        ?>
                        <button type="submit">Them</button>
                    </form>
                </div>
        </div>
    </section>
</body>
</html>