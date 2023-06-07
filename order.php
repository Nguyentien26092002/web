<?Php
include"header.php";
include"connnect.php";
require_once("./config.php");
?>
<head>
<script src="js/app.js"></script>
</head>
<style>
header{
    background-color: black;
}
/* table
{
    background-color:blue;
} */


</style>

     

      <section class="adress">




<div class="container">


        <div class="cart_content ">
            <div class="cart_content_left">
            <div class="adress_top">
                    <p>Tìm Kiếm đơn hàng</p>
                </div>
                <form action="" id="frmCreateOrder" method="post">        
                <div class="adress_top_input row">
                   
                    <div class="adress_top_item ">
                        <input name="sdt" required placeholder="Nhập Số điện thoại" type ="text">
                    </div> 

                    <div class="adress_top_item">
                        <input name="cccd" required placeholder="Nhập Số CCCD/CMND" type ="number">
                    </div>   
                    
                    
                </div>
                <div class="adress_bottom">

                    <div class="adrees_bottom_button" style="margin-bottom: 40px;">
                        <button type="submit" >Tìm Kiếm</button>
</form>
                    </div>
                </div>  

    </div>
    <div class="cart_content_right">
    <?php
if($_POST)
{
    $find = new Promotion;
    $find_order = $find-> get_order();
    if($find_order)
    {
        $result = $find_order->fetch_assoc();
       
        $get = new Promotion;
        $find_inf = $get-> find_order($result['customer_id']);
        if($find_inf)
        {
            $resultB= $find_inf->fetch_assoc();

?>  
    <table   >
                            <tr>
                                <th colspan="2">Đơn hàng</th>
                            </tr>
                            <tr>
                                <td>Mã Đơn hàng</td>
                                <td><p style="color:black; font-weight: bold;"><?php echo $resultB['id_receipt']?></p></td>
                            </tr>  
                            <tr>
                                <td>Tên khách hàng</td>
                                <td><p style="color:black; font-weight: bold;"><?php echo $result['name'] ?></p></td>
                            </tr>  
                            <tr>
                                <td>Tổng Sản Phẩm</td>
                                <td><p style="color:black; font-weight: bold;"><?php echo $resultB['item']?></p></td>
                            </tr>
                            <tr>
                                <td>Tình trạng</td>
                                <td><p style="color:black; font-weight: bold;"><?php if($resultB['static']==1)
                                echo "Đơn hàng đã được xác nhận";
                                else
                                {
                                    if($resultB['static']==2)
                                    {
                                        echo "Đơn hàng đã bị hủy ";  
                                    }
                                    else
                                    {
                                        if($resultB['static']==33)
                                        {
                                            echo "Đơn hàng đã hoàn thành ";  
                                        } 
                                        else
                                        {
                                            if($resultB['static']==0)
                                    {
                                        echo"Đơn hàng đang đợi xử lý";  
                                    }
                                        }
                                    }
                                }
                                
                                ?></p></td>
                            </tr>
                            <tr>
                                <td>Số tiền đã thanh toán</td>
                                <td><p style="color:black; font-weight: bold;"><?php echo $formattedNumber = number_format($resultB['money_paid'], 0, '.', '.')?><sup>đ</sup></p></td>
                            </tr>   
                            <tr>
                              <td>Thanh toán khi giao hàng</td>
                              <td><p style="color:black; font-weight: bold;"><?php 
                              $sl= $resultB['sum_price'] - $resultB['money_paid'];   
                              echo $formattedNumber = number_format($sl, 0, '.', '.')  ; ?><sup>đ</sup></p></td>
                          </tr>   

                        </table>
                        <?php
                    }

    }
    else
    {
        echo "<script> alert('Không tồn tại đơn hàng') </script>";
    }
}
                        ?>
                    <div class="cart_content_bottom">
                    <div class="cart_content_right_text">
                   
                </div>

                <div class="cart_content_right_button">




                </div>
                    </div>
            </div>
                </div>

            </div>
            </div>
</section>


<?php

        include"footer.php";
        ?>