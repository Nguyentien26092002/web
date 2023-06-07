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

</style>
<?php
$total_show = new Promotion;
$show_total = $_SERVER['REMOTE_ADDR'];
$show_total = $total_show -> show_total($show_total);
if($show_total)
{
  $resultB = $show_total->fetch_assoc();
  $sl = $resultB['sl'];
  $item= $resultB['item'];
}

$sql = "SELECT * FROM province";
$result = mysqli_query($conn, $sql);

if(isset($_POST))
{
    $ip = $_POST['ip'];
    $product = new Promotion;
    $ip = $product -> show_item_cart($ip);



?>
      <!---adress-->


      <section class="cart">




<div class="container">
    <div class="cart_top_wrap">
        <div class="cart_top ">
            <div class="  cart_top_item">
            <form  method="post" action="cart.php">
                <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                <button style="background-color:transparent; outline:none; border:none; " class="fa fa-shopping-bag back " type="submit"></button>
                  </form> 
            </div>  
            
            <div class="cart_top_icon cart_top_adress cart_top_item">
                <li class="fa fa-map-marked-alt "> </li>
            </div>
            <div class="cart_top_cash cart_top_item">
                <li class="fa fa-money-bill-alt " ></li>
            </div>
        </div>
    </div>
        <div class="cart_content ">
            <div class="cart_content_left">
            <div class="adress_top">
                    <p>Địa chỉ giao hàng</p>
                </div>
                <form action="./vnpay_create_payment.php" id="frmCreateOrder" method="post">        
                <div class="adress_top_input row">
                   
                    <div class="adress_top_item ">
                        <input name="name" required placeholder="Họ và tên" type ="text">
                    </div> 
                    <div class="adress_top_item">
                        <input name="sdt" required placeholder="Số Điện Thoại" type ="number">
                    </div>   
                    
                    <div class="adress_top_item">
                <select id="province" name="province" class="form-control">
                    <option required value="">Chọn một Tỉnh/Thành Phố</option>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['province_id'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                    </div>
                    <div class="adress_top_item">
                <select id="district" name="district" class="form-control">
                    <option required value="">Chọn Quận/Huyện</option>
                </select>
                    </div>
                    <div class="adress_top_item">
                <select id="wards" name="wards" class="form-control">
                    <option required value="">Chọn Phường/Xã</option>
                </select>
                    </div>
                    
                    <div class="adress_top_item">
                        <input name="cccd" required placeholder="Số CMND/CCCD" type ="text">
                    </div> 
                    <div class="adress_bottom_item">
                        <input name="adress" required placeholder="Địa Chỉ" type ="text">
                </div> 

                </div>
                <div class="adress_bottom">
                    <div class="adress_bottom_top">
                        <p>Phương thức thanh toán</p>
                    </div>
                    <div class="adress_bottom_type">
                        <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại</p>


                        <div class="adress_bottom_check">
                       
                       <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label>
                       <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                        </div>
                        <div class="adress_bottom_check">
                       
                       <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label>
                       <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                        </div>
                        <div class="adress_bottom_check">
                        
                       <label for="bankCode">Thanh toán qua thẻ quốc tế</label>
                       <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                        </div>
                    <div class="adrees_bottom_button">
                        <button >Quay Lại</button>
                    </div>
                    </div>
                </div>

    </div>
    <div class="cart_content_right">
    
    <table >
                            <tr>
                                <th colspan="2">Tổng Tiền</th>
                            </tr>
                            <tr>
                                <td>Tổng Sản Phẩm</td>
                                <td><?php echo $resultB['item']?></td>
                            </tr>
                            <input type="hidden" name="item" value="<?php echo $resultB['item']?>"> 
                            <input type="hidden" name="price" value="<?php echo $sl?>"> 
                            <tr>
                                <td>Tổng Tiền Hàng</td>
                                <td><p style="color:black; font-weight: bold;"><?php echo $formattedNumber = number_format($sl, 0, '.', '.')?><sup>đ</sup></p></td>
                            </tr>
                            <tr>
                                <td>Tạm Tính</td>
                                <td><p style="color:black; font-weight: bold;"><?php echo $formattedNumber = number_format($sl, 0, '.', '.')?><sup>đ</sup></p></td>
                            </tr>   
                            <tr>
                              <td>Thanh Toán Ít nhất</td>
                              <td><p style="color:black; font-weight: bold;"><?php echo $formattedNumber = number_format($sl*10/100, 0, '.', '.')  ; ?><sup>đ</sup></p></td>
                          </tr>                     
                        </table>
                    <div class="cart_content_bottom">
                    <div class="cart_content_right_text">
                    <p>Bạn cần thanh toán trước ít nhất 10% giá trị sản phẩm</p>
                </div>
                <div class="cart_content_right_input">
                    <input required id="amount" value="" name="amount" type="number" min ="<?php echo  $sl*10/100; ?>"  max="<?php echo $sl?>" placeholder="Số Tiền Bạn Muốn Thanh Toán ">
                </div>
                <div class="cart_content_right_button">
                    <button type="submit" > Thanh Toán</button>

</form>



                </div>
                    </div>
            </div>
                </div>

            </div>

</section>


<?php
}
        include"footer.php";
        ?>