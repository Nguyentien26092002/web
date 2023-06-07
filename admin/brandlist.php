<?php 
include "header.php";
include "slider.php";
include "class/brandclass.php";
?>
<?php
$brand = new Brandclass;
$show_brand = $brand -> show_brand();
?>
<div class="admin_content_right">
<div class="admin_content_right_cateroty_list">
                    <h1>Danh sach </h1>
                    <div class ="button_add">
                        <a href="brand.php">ADD</a>
                    </div>
                    <table>
                        <tr>
                            <th>stt</th>
                            <th>ID</th>
                            <th>CategoryID</th>
                            <th>Danh Muc</th>
                            <th>Tuy bien</th>
                        </tr>
                        <?php 
                        if($show_brand)
                        {
                            $i=0;
                            while( $result = $show_brand->fetch_assoc())
                            {$i++;
                        
                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $result['brand_id']?></td> 
                            <td><?php echo $result['name']?></td>
                            <td><?php echo $result['brand_name']?></td>
                            <td><a href="brandupdate.php?brand_id=<?php echo $result['brand_id'] ?>">Sua</a>|<a href="branddelete.php?brand_id=<?php echo $result['brand_id']?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xoa</a></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
    </section>
</body>
</html>