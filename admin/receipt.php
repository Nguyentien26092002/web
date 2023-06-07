<?php 
include "header.php";
include "slider.php";
include "class/customer.php";
?>
<?php
$admin = new Customer;
$Show_all = new Customer;
$show_admin = $admin->show_receipt();
?>
<style>
.admin_content_right_cateroty_list table {
    width: 100%;
    border-collapse: collapse;
}

.admin_content_right_cateroty_list th, .admin_content_right_cateroty_list td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

.admin_content_right_cateroty_list th {
    background-color: #f2f2f2;
}

.admin_content_right_cateroty_list th:first-child, .admin_content_right_cateroty_list td:first-child {
    width: 5%;
}

.admin_content_right_cateroty_list th:nth-child(2), .admin_content_right_cateroty_list td:nth-child(2) {
    width: 20%;
}

.admin_content_right_cateroty_list th:nth-child(3), .admin_content_right_cateroty_list td:nth-child(3) {
    width: 15%;
}

.admin_content_right_cateroty_list th:nth-child(4), .admin_content_right_cateroty_list td:nth-child(4) {
    width: 20%;
}

.admin_content_right_cateroty_list th:nth-child(5), .admin_content_right_cateroty_list td:nth-child(5) {
    width: 10%;
}

.admin_content_right_cateroty_list th:nth-child(6), .admin_content_right_cateroty_list td:nth-child(6) {
    width: 15%;
}
.admin_content_right_cateroty_list th:nth-child(7), .admin_content_right_cateroty_list td:nth-child(7) {
    width: 25%;
}


.admin_content_right_cateroty_list td a {
    color: #ff0000;
    text-decoration: none;
}

.admin_content_right_cateroty_list td a:hover {
    text-decoration: underline;
}
.hid 
{
    display:none;
    padding-bottom: 40px;
}
td 
{
    border: 1px solid black;
}
</style>
<div class="admin_content_right">
    <div class="admin_content_right_cateroty_list">
        <h1>Danh Sách đơn hàng </h1>
       
      <form style="margin-top: 15px; margin-bottom:15px" >
                <input required id="search" name="find" placeholder="Nhập sdt hoặc cmnd/cccd" value="" type="text">
                <button  id="find" style="border: none;background-color: transparent;" type="submit" class="fas fa-search"></button>
</form>

                <select id ="static" name="action">
                <option >--Chọn--</option>
    <option value="1">Đã Xác nhận</option>
    <option value="2">Đã hủy </option>
    <option value="3">Đã hoàn thành</option>
  </select>
  <div id="find_out">
                     <table > 
            <tr>
                <th></th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Mã đơn</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
            </tr>
            <?php 
            if ($show_admin) {
                $i = 0;
                while ($result = $show_admin->fetch_assoc()) {
                    $i++;
                    ?>

                    <tr>
                    <td><button onclick="myfuntion()" class="big">&#8582;</button></td>
                       
                        <td><?php echo $result['name'] ?></td>
                        <td><?php echo $result['address'] ?></td>
                        <td>0<?php echo $result['phone'] ?></td>
                        <td><?php echo $result['id_receipt'] ?></td>
                        <td><?php echo  $formattedNumber = number_format($result['sum_price'], 0, '.', '.')  ?></td>
                        <td style="color:red;"><?php 
                        if($result['static'] ==0)
                        {
                            echo "Chờ xác nhận";
                        }
                        else
                        {
                            if($result['static'] ==1)
                            {
                                echo"Đã xác nhận";
                            }
                            else
                            {
                                if($result['static'] ==2)
                                {
                                    echo"Đã hủy";
                                }
                                else
                                {
                                    if($result['static'] ==3)
                                {
                                    echo"Đã hoàn thành";
                                }
                                
                                }
                            }
                      
                        }
                        ?></td>

                    </tr>
                    <tr >
                        <td style="border: none; padding:0" colspan="7">
                            <div class="hid">
                            <table  >
                                <tr>
                                    <th>Mã giao dịch</th>
                                    <th>Đã thanh toán</th>
                                    <th>Tổng sản phẩm</th>
                                    <th>Ngày thanh toán</th>
                                    <th>Cần thu</th>
                                    <th>Xác nhận</th>
                                </tr>
                                <?php
                                $show_detail = $Show_all->show_all($result['id_receipt']);
                                if ($show_detail) {
                                    $resultB = $show_detail->fetch_assoc();
                                    $sum = $result['sum_price'] - $resultB['money_paid'];
                                    ?>
                                    <tr>
                                        <td><?php echo $resultB['trading_code']?></td>
                                        <td><?php echo  $formattedNumber = number_format($resultB['money_paid'], 0, '.', '.')  ?></td>
                                        <td><?php echo $resultB['item'] ?></td>
                                        <td><?php echo $resultB['create_at'] ?></td>
                                        <td><?php echo $formattedNumber = number_format($sum, 0, '.', '.')  ?></td>
                                        <td>
                                        <form method="PoST" action="receiptdone.php">
                                            <input type="hidden" name="id" value="<?php echo $result['id_receipt'] ?>">
                                            <input type="hidden" name="idcus" value="<?php echo $result['id_customer'] ?>">
                                            <select name="action">
    <option value="confirm">Xác nhận</option>
    <option value="cancel">Hủy đơn</option>
    <option value="done">Hoàn thành đơn</option>
  </select>
  <button onclick="ok()" type="submit">Hoàn thành</button>
</form>
                                        
                                       
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            </div>
                        </td>

                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        <div>
    </div>
</div>
</section>
<script>
function myfuntion()
{
    const subMenu = event.target.parentElement.parentElement.nextElementSibling.querySelector(".hid");
    if (subMenu.style.display === "block") {
      subMenu.style.display = "none";
    } else {
      subMenu.style.display = "block";
    }
}
function ok()
{
    alert("Bạn đã chắc chắn");
}





$(document).ready(function() {

  $('#find').click(function() {
    event.preventDefault();
    var page = $('#search').val();

    // Gửi yêu cầu AJAX đến server
    $.ajax({
      url: 'findreceipt.php',
      type: 'post',
      data: { page: page },
      success: function(response) {
        // Hiển thị kết quả trả về trên trang HTML
        $('#find_out').html(response);
      }
    });
  });
});


$(document).ready(function() {

$('#static').change(function() {
  event.preventDefault();
  var page = $('#static').val();

  // Gửi yêu cầu AJAX đến server
  $.ajax({
    url: 'findstatic.php',
    type: 'post',
    data: { page: page },
    success: function(response) {
      // Hiển thị kết quả trả về trên trang HTML
      $('#find_out').html(response);
    }
  });
});
});
</script>
</script>

</body>
</html>
