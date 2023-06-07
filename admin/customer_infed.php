<?php 
include "header.php";
include "slider.php";
include "class/customer.php";
?>
<style>
.coment td:nth-child(1),
.coment th:nth-child(1) {
  width: 15%;
}

.coment td:nth-child(2),
.coment th:nth-child(2) {
  width: 15%;
}

.coment td:nth-child(3),
.coment th:nth-child(3) {
  width: 15%;
}

.coment td:nth-child(4),
.coment th:nth-child(4) {
  width: 35%;
}

.coment td:nth-child(5),
.coment th:nth-child(5) {
  width: 15%;
}

.coment td:nth-child(6),
.coment th:nth-child(6) {
  width: 5%;
}
    </style>
    <?php
    $admin = new Customer;
    $show_admin = $admin -> showed_feedback();
    ?>
<div class="admin_content_right">
<div class="admin_content_right_cateroty_list">
                    <h1>Danh sách </h1>
                    <table class="coment">
                        <tr>
                            <th>Ngày</th>
                            <th>Tên</th>
                            <th>Số điện thoại </th>
                            <th>Bình Luận</th>
                            <th>Sản phẩm</th>
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
                            <td><?php echo $result['date_feedback'] ?></td>
                            <td><?php echo $result['name'] ?></td>
                            <td>0<?php echo $result['sdt'] ?></td>
                            <td><?php echo $result['feedback'] ?></td>
                            <td><?php echo $result['product_name'] ?></td>
                            <td><a href="cusupdate.php?id=<?php echo $result['id_feedback']?>"  onclick="return confirm('Bạn chắc muốn xóa?')">Xóa</a></td> 
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
    </section>
</body>
</html>