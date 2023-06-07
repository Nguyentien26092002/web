<?php
include"fontend/promotionclass.php";
?>
    <?php
    $list = new Promotion;
    $showlist = $list ->show_caterory();
    $cartegory = new Promotion;
    $show_category = $cartegory -> show_caterory();
    ?>
<!DOCTYPE html>
  <html lang="vi">
  <head >
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <!-- <script src="js.js"></script> -->
      <link rel="stylesheet" href="style.css">
      <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  </head>
  <body>
      <header class="header_list">
          <div class="logo">
           <a href="index.php"><img src="Picture/logo-removebg-preview.png" alt="loGo"></a>
          </div>
          <div class="menu">
          <?php 
                        if($show_category)
                        {
                            $i=0;
                            while( $result = $show_category->fetch_assoc())
                            {$i++;
                              $cut = str_replace(' ', '', $result['name']);
                        
                        ?>
            <li> <a href="<?php echo $cut ?>.php?id=<?php echo $result['id']?>"><?php echo $result['name']?></a>
           
           
            <?php
                $brand = new Promotion;
                $cartegory_id = $result['id'];
                $show_brand = $brand -> show_brand($cartegory_id );
            if($show_brand)     
                        {
                          ?>
                           <ul class="sub_menu">
                            <?php
                            $i=0;
                            while( $resultA = $show_brand->fetch_assoc())
                            {$i++;
                        
                        ?>
                  <li><a href="<?php echo $cut?>.php?brand_id=<?php echo $resultA['brand_id']?>"><?php echo $resultA['brand_name']?></a></li>
                  <?php
                            }
                          }
                  ?>
              </ul>
          <?php
                            }
                          }
          ?>
          </li>

          </div>


          <div class="others">   
              <form action="search.php" method="post" >
                <input class="text_search" required name="find" placeholder="Find" type="text">
                <button type="submit" class="fas fa-search"></button>
                </form>
                <form style="background-color:transparent;" method="post" action="cart.php">
                <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                <button style="background-color:transparent; outline:none; border:none;" class="fa fa-shopping-cart " type="submit"></button>
                  </form>             

          </div>
        </header>

        
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
        <div class="mobile_menu">
        <?php 
                        if($showlist)
                        {
                            $i=0;
                            while( $result = $showlist->fetch_assoc())
                            {$i++;
                              $cut = str_replace(' ', '', $result['name']);
                        
                        ?>
            <li> <a href="<?php echo $cut ?>.php?id=<?php echo $result['id']?>"><?php echo $result['name']?></a>
           
           
            <?php
                $brand = new Promotion;
                $cartegory_id = $result['id'];
                $show_brand = $brand -> show_brand($cartegory_id );
            if($show_brand)     
                        {
                          ?>
                           <ul class="sub_menu">
                            <?php
                            $i=0;
                            while( $resultA = $show_brand->fetch_assoc())
                            {$i++;
                        
                        ?>
                  <li><a href="<?php echo $cut?>.php?brand_id=<?php echo $resultA['brand_id']?>"><?php echo $resultA['brand_name']?></a></li>
                  <?php
                            }
                          }
                  ?>
              </ul>
          <?php
                            }
                          }
          ?>
          </li>



        </div>

        <script>
  var slideFromLeft = document.querySelector('.mobile_menu');
  var toggleButton = document.querySelector('.fa-bars');

  toggleButton.onclick = function() {
    slideFromLeft.classList.toggle('show_mobile');
    if (slideFromLeft.classList.contains('show_mobile')) {
      document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = 'auto';
    }
  };
</script>