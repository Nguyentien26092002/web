<?php 
include "header.php";
include "slider.php";
include "class/admin.php"
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $add = new Admin;
        $addadmin = $add->add_promotion();
    }
?>
<div class="admin_content_right">
                <div class="admin_content_right_cateroty_add">
                    <h1>ADD</h1>
                    <form action=" " method="post" enctype="multipart/form-data">
                        <input style="width: 80%; height: 50px; " required name="title" type="tetx" placeholder="Nhập tiêu đề">

                        <input style="width: 80%; height: 50px; " required name="content" type="tetx" placeholder="Link video">

                        <input  style="width: 80%; height: 50px; " required  name="img" type="file" >
                        <button type="submit">Them</button>
                    </form>
                </div>
        </div>
    </section>
</body>
</html>