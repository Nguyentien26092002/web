<?php 
include "header.php";
include "slider.php";
include "class/agency.php";
?>
    <?php
    $admin = new Agency;
    $show_admin = $admin -> show_color();
    ?>
<div class="admin_content_right">
<div class="admin_content_right_cateroty_list">
                    <h1>Danh sach </h1>
                    <div class ="button_add">
                        <a href="addcolor.php">ADD</a>
                    </div>  
                    <table>
                        <tr>
                            <th>stt</th>
                            <th>Màu</th>
                            <th>Ảnh màu </th>
                            <th>Sửa/Xóa</th>
                        </tr>
                        <?php 
                        if($show_admin)
                        {
                            $i=0;
                            while( $result = $show_admin->fetch_assoc())
                            {$i++;
                        
                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><?php echo $result['color_name'] ?></td>
                            <td><img style="width: 40px; height:40px;  align-items: center; padding-top: 5px; " src="./img_color/<?php echo $result['color_img']?>"></td>
                            <td><a href="colorupdate.php?color_name=<?php echo $result['color_name'] ?>">Sua</a>|<a href="colordelete.php?color_name=<?php echo $result['color_name']?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xoa</a></td> 
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
    </section>
</body>
</html>