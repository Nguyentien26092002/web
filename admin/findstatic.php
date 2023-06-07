<?php
include "class/productclass.php";
if(isset($_POST['page']))
{
    $name = $_POST['page'];
    $cartegory = new Product;

    $show_category = $cartegory -> show_static($name);
    if($show_category)
    {
        $resultA = $show_category->fetch_assoc()
?>
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
            $admin = new Product;
            $Show_all = new Product;
            $show_admin = $admin->show_inf($resultA['customer_id']);
            if ($show_admin) {
                
            while( $result = $show_admin->fetch_assoc() )
            {

            
                    ?>

                    <tr>
                    <td><button onclick="myfuntion()" class="big">&#8582;</button></td>
                       
                        <td><?php echo $result['name'] ?></td>
                        <td><?php echo $result['address'] ?></td>
                        <td>0<?php echo $result['phone'] ?></td>
                        <td><?php echo $result['id_receipt'] ?></td>
                        <td><?php echo  $formattedNumber = number_format($result['sum_price'], 0, '.', '.') ?></td>
                       
                       <td style="color:red;"><?php 
                    if( $result['static'] == 0)
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
                                        <td><?php echo  $formattedNumber = number_format($resultB['money_paid'], 0, '.', '.') ?></td>
                                        <td><?php echo $resultB['item'] ?></td>
                                        <td><?php echo $resultB['create_at'] ?></td>
                                        <td><?php echo $formattedNumber = number_format($sum, 0, '.', '.')  ?></td>
                                        <td>
                                        <form method="PoST" action="receiptdone.php">
                                            <input type="hidden" name="id"value="<?php echo $result['id_receipt'] ?>">
                                            <input type="hidden" name="idcus"value="<?php echo $result['id_customer'] ?>">
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
            
            ?>
        </table>
<?php
            }
    }
    else
    echo "<p>không tìm thấy kết quả</p>";
    ?>

<?php
}
?>
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
</script>