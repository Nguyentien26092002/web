<?php 
include"header.php";
include"slider.php";
include"class/customer.php";
?>
    <?php
    $admin = new Customer;
    $show_admin = $admin -> show_Customer();
    ?>
<div class="admin_content_right">
<div class="admin_content_right_cateroty_list">
                    <h1>Danh sach </h1>
                    <table>
                        <tr>
                            <th>stt</th>
                            <th>Tên</th>
                            <th>Số điện thoại </th>
                            <th>Email</th>
                            <th>Thông Tin</th>
                            <th>Tư vấn</th>
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
                            <td><?php echo $result['Customer_name'] ?></td>
                            <td>0<?php echo $result['customer_sdt'] ?></td>
                            <td><?php echo $result['customer_mail'] ?></td>
                            <td><?php echo $result['customer_title'] ?></td>
                            <td><a href="cusinfdelete.php?id=<?php echo $result['cus_id']?>"  onclick="return confirm('Bạn chắc muốn xóa?')">Xóa</a></td> 
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
    </section>
</body>
</html>