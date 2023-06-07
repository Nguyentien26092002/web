<?php 
include"header.php";
include"slider.php";
include"class/admin.php";
?>
    <?php
    $admin = new Admin;

    $show_admin = $admin -> show_promotion();
    ?>
<div class="admin_content_right">
<div class="admin_content_right_cateroty_list">
                    <h1>Danh sach </h1>
                    <div class ="button_add">
                        <a href="promotionadd.php">ADD</a>
                    </div>
                    <table>
                        <tr>    
                            <th>stt</th>
                            <th>Tiêu đề</th>
                            <th>Link Video</th>
                            <th>Ảnh quảng cáo</th>
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
                            <td><?php echo $result['title']?></td>
                            <td><?php echo $result['content']
                            ?></td>
                            <td><img src="promotion/<?php echo $result['imga']  ?>"></td>
                            <td><a href="promotionupdate.php?id=<?php echo $result['id'] ?>">Sua</a>|<a href="promotiondelete.php?id=<?php echo $result['id']?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xoa</a></td> 
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
    </section>
</body>
</html>