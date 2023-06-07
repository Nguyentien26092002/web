<?php 
include "header.php";
include "slider.php";
include "class/agency.php";
?>
    <?php
    $admin = new Agency;
    $show_admin = $admin -> show_admin();
    ?>
<div class="admin_content_right">
<div class="admin_content_right_cateroty_list">

                    <h1 >Danh sach </h1>
                    <div class ="button_add">
                        <a href="add.php">ADD</a>
                    </div>
                    <table>
                        <tr>
                            <th>stt</th>
                            <th>ID</th>
                            <th>Chi Nhánh</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
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
                            <td><?php echo $result['agency_id'] ?></td>
                            <td><?php echo $result['agency_provine']?></td>
                            <td><?php echo $result['agency_adress']?></td>
                            <td>0<?php echo $result['agency_phone']?></td>
                            <td><a href="agencyupdate.php?agency_id=<?php echo $result['agency_id'] ?>">Sua</a>|<a href="agencydelete.php?agency_id=<?php echo $result['agency_id']?>"  onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xoa</a></td> 
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
    </section>
</body>
</html>