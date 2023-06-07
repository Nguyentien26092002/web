<?php 
include"header.php";
include"slider.php";
include"class/admin.php";
?>
    <?php
    $admin = new Admin;
    $show_admin = $admin -> show_admin();
    ?>
<div class="admin_content_right">
<div class="admin_content_right_cateroty_list">
                    <h1>Danh sach </h1>
                    <div class ="button_add">
                        <a href="addacount.php">ADD</a>
                    </div>
                    <table>
                        <tr>    
                            <th>stt</th>
                            <th>ID</th>
                            <th>Tên Tài khoản</th>
                            <th>Quyền</th>
                            <th>Trạng Thái</th>
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
                            <td><?php echo $result['id'] ?></td>
                            <td><?php echo $result['name']?></td>
                            <td><?php if($result['status']==1)
                            {
                                echo "Quản trị viên";
                            }
                            else
                            {
                                echo "Nhân Viên";
                            }
                            
                            ?></td>
                            <td><?php if($result['position']==1)
                            {
                                echo "Đang hoạt động";                              
                            }
                            else
                            {
                                if($result['position']==0)
                                echo "Không hoạt động";
                            }
                            ?></td>
                            <td><a href="adminupdate.php?admin_id=<?php echo $result['id'] ?>">Sua</a>|<a href="admindelete.php?admin_id=<?php echo $result['id']?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xoa</a></td> 
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
    </section>
</body>
</html>