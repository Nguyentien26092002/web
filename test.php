<?php
include"fontend/promotionclass.php";
?>
    <?php
    $cartegory = new Promotion;
    $show_category = $cartegory -> show_caterory();

    ?>
<!DOCTYPE html>
  <html lang="vi">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <!-- <script src="js.js"></script> -->
      <link rel="stylesheet" href="style.css">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  </head>
  <body>

        <div class="mobile">
        <div class="left">
        <i class="fa fa-bars" style="color:white"></i>
          </div>

          <div class="mid">
          <a href="index.php"><img src="Picture/logo-removebg-preview.png" alt="loGo"></a>
          </div>


          <div class="right">   
  
                <form style="background-color:transparent;" method="post" action="cart.php">
                <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                <button style="background-color:transparent; outline:none; border:none;" class="fa fa-shopping-cart " type="submit"></button>
                  </form>       

          </div>
        </div>