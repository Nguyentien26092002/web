<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <style>
        .but button
{
      width:150px; height:50px; border-radius: 10px; background-color:transparent; border:1px solid black;
}
.but button:hover
{
background-color: black;
color: white;
}

        body {
            background-color: aqua;
            padding-top: 20px;
        }

        .text-muted
        {
            font-weight: bold;
            text-align: center;
        }
        .container {
            border: 1px solid black;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
            background-color: white;
            margin: auto;
            max-width: 800px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }

        .header {
            margin-bottom: 20px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        .but button {
            width: 150px;
            height: 50px;
            border-radius: 10px;
            background-color: transparent;
            border: 1px solid black;
            cursor: pointer;
        }

        .but button:hover {
            background-color: black;
            color: white;
        }
 
        </style>
    <body>
        <?php
        include "./vnpay_php/config.php";
        include "./fontend/promotionclass.php";
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="container"> 
            <div class="header clearfix">
                <h3 class="text-muted">Thanh Toán VNPAY</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount']/100?></label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                                $cart = new Promotion;
                                $cart_del = $cart-> Del_cart($_SERVER['REMOTE_ADDR']);
                              $a =0;
                            } else {
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                                echo "<script> alert('Giao dịch lỗi vui lòng thực hiện lại')</script>";
                                $a=1;
                                $del = new Promotion;
                                $get_cus = $del-> get_idcus($_GET['vnp_TxnRef']);
                                if($get_cus)
                                {
                                    $result=$get_cus->fetch_assoc();
                                    $delete = new Promotion;
                                    $id = $result['id_customer'];
                                   
                                    $delete_customer = $delete-> del_cus($id);
                                    $del_detaile = new Promotion;

                                    $del_all = $del_detaile->Del_detail($_GET['vnp_TxnRef']);

                                }

                            }
                            
                            $pay = new Promotion;
                
                            $insert_pay = $pay-> pay_insert($_GET['vnp_TxnRef'],$_GET['vnp_Amount']/100,$_GET['vnp_TransactionNo'],$a);
                        } else {
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>

</label>

            <div class="but">
            <button  onclick="location.href='cart.php'">Quay lại mua hàng</button>
            </div>
                    
                   
                </div> 
            </div>

            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
        <script>
window.addEventListener('beforeunload', function(e) {
  e.preventDefault();
  e.returnValue = '';
});
            </script>
    </body>
</html>
