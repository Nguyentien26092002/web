<?Php
include"header.php";
?>
 <?php 
 $product = new Promotion;
 $product_id = $_GET['product_id'];
 $product_id = $product -> show_product_item($product_id);


 $product_img = new Promotion;
 $product_des = $_GET['product_id'];
 $product_des  = $product_img -> show_product_des($product_des);


 $brand = new Promotion;
  $brand_name = $_GET['product_id'];
 $brand_name = $brand-> get_brand($brand_name);

 $count = new Promotion ;
 $count_color= $_GET['product_id'];
 $count_color = $count -> count_color($count_color);

?> 
<body onload="autoClick()" >
<style>
header{
    background-color: black;
}

</style>

<sextion class="product">
        <div class="container">
            <div class="product_top">
            <?php 
            if($brand_name)     
                        {
                             $result = $brand_name->fetch_assoc();
                        ?>
                <p>Home &#8594; Bike &#8594; <?php echo $result['brand_name']; ?></p>
            </div>
            <div class="product_name">
              <h1><?php echo $result['brand_name']; ?></h1>
            </div>
            <?php
                        }
     ?>
         <div class="product_content">
    <div class="product_content-left">
       <div class="product_content-left_small">
       <?php
        if ($count_color) {
            while ($result = $count_color->fetch_assoc()) {
                $color = new Promotion;
                $product_idd = $_GET['product_id'];
                $color_name = $result['color'];
                $color_name = $color->color_back($color_name);
                $color_value = $result['color'];
                ?>

                <input type="hidden" name="product_id" id="product_id" value="<?php echo $_GET['product_id'] ?>">
                <button type="button" name="color" id="color" value="<?php echo $color_value ?>" class="color_change" <?php
                    if ($color_name) {
                        $resultA = $color_name->fetch_assoc();
                        echo 'style="background-image: url(admin/img_color/'. $resultA['color_img'].'); border:1px solid black; "';
                    }
                    ?>></button>
                <?php
            }
        }
        ?>
       </div>

        <div class="product_content-left-big">



        <script>
$(document).ready(function() {
    $('.color_change').click(function() {
        var color = $(this).val();
        var product_id = $("#product_id").val();
        $.ajax({
            url: 'color_image.php',
            type: 'GET',
            data: { color: color , product_id: product_id },
            dataType: 'json',
            success: function(response) {
                $('.product_content-left-big').html('<img  src="' + response.image + '">');
                $('#color_a').val(response.color);
            }
        });
    });
});
</script>


    </div>
    </div>

                <div class="product_content_right">             
                <?php
             if($product_id)     
                        {
                             $result = $product_id->fetch_assoc()
                       
                        ?>
                    <div class="product_content_right_name">
                        <h2><?php echo $result['product_name']?></h2>
               
                        <p><?php echo   $formattedNumber = number_format($result['product_price'], 0, '.', '.') ?><sup>đ</sup></p>
                        <?php
                        }
                    ?>
                    </div>
                    <div class="product_content_right_color">
                     
<!-- HTML code -->
<form style="text-align: center;" action="" method="post" enctype="multipart/form-data">
  <div class="product_content_right_name">
    <label for="quantity" >Số lượng</label> 
    <div class="quantity-input">
      <button type="button" class="product_quantity_but" onclick="decrement()"><p>-</p></button>
      <input class="product_quantity" id="quantity" name="quantity"  min="1" max="5" step="1" readonly value="1">
      <button type="button" class="product_quantity_but" onclick="increment()"><p>+</p></button>
      <input type="hidden" name="product_price" value="<?php echo $result['product_price'] ?>">
      <input type="hidden" name="product_id" value="<?php echo isset($_GET['product_id']) ? $_GET['product_id'] : ''; ?>">
      <input type="hidden" name="ip_user" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
      </div>
      <input  readonly type="text" style="outline: none; border:none; color:cadetblue " name="color_a" id="color_a" value="">
    <button name="add" type="submit" class="product_button_buy">
       Mua Ngay
    </button>
  </div>
</form>

<?php
if (isset($_POST['add'])) {         
  $product_id = $_POST['product_id'];
  $color = $_POST['color_a'];
  $product_price = $_POST['product_price'];
  $ip = $_SERVER['REMOTE_ADDR'];
  $quantity = $_POST['quantity']; 
  $check = new Promotion;
  $check_product = $check->show_item($ip);
  $product_price  = $quantity*$product_price ;
if( $check_product)
{
  $result = $check_product->fetch_assoc();
  if( $product_id == $result['product_id'] && $color == $result['cart_color'] )
  {
    $newquantity =   $quantity + $result['cart_quantity'];
    $newtotal = $product_price + $result['total'];
  $user= new Promotion;
  $user_add = $user->update_cart($product_id, $color,  $newquantity, $newtotal);
  }
  else
  {
    $user= new Promotion;
      $user_add = $user->add_cart($product_price);
  }
}
    else
    {
      $user= new Promotion;
      $user_add = $user->add_cart($product_price);
    }
  }
?>

</div>
                    </div>
                </div>
            </div>
        </div>
       <div class="inf_product row">
        <div class="inf_product_container">
          <h1>NHỮNG CON SỐ NỔI BẬT</h1>
        </div>
        <div class="inf_product_container_title row">
          <div class="inf_product_title">
            <h3>DOHC <sup>Động cơ</sup></h3>
            <p>&#8722;</p>
        </div>
        <div class="inf_product_title">
          <h3>150 <span> HP </span><sup>Mã Lực</sup></h3>
          <p>&#8722;</p>
      </div>
        <div class="inf_product_title">
          <h3>157 <sup> KG</sup></h3>
          <p>&#8722;</p>
        </div>
       <div class="inf_product_title">
          <h3>2.7   
            <sup>L/100km</sup></h3>
          <p >&#8722;</p>
        </div>
        </div>

        </div>
</sextion>
<?php
if(isset($_POST['commented']))
{
  $coment =new Promotion;
  $add_coment = $coment ->add_coment($_GET['product_id']);
  if($add_coment)
  {
    echo "<script>alert('Cảm ơn bạn đã đánh giá')</script>";
  }
}
?>
<div class="comment">


<form  action="" method="post" class="comment_form">
<h2><?php echo $result['product_name']?></h2>
    
<div class="stars">
    <input class="star star-1" id="star-1"  type="radio" value="5" name="star"/>
    <label class="star star-1" for="star-1"></label>
    <input class="star star-2" id="star-2" type="radio" value="4" name="star"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-4" id="star-4" type="radio" value="2" name="star"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-5" id="star-5" type="radio" value="1" name="star"/>
    <label class="star star-5" for="star-5"></label>
</div>


<div class="star_bottom">

  <input required name="name" type="text" placeholder="Tên của bạn">

  <input required name="sdt" type="number" placeholder="số điện thoại của bạn" >
  <input required class="input_comment" name="feedback" type="text"  placeholder="Bình Luận">
  <br>
<button name="commented" id="submit-btn" disabled type="submit" >Gửi phản hồi</button>
</div>
</form>
</div>

<div class="comment_list">
  <div class="comment_listtop">
  <h2>Bình Luận</h2>
  </div>
  <?php
$list = new Promotion;
$list_coment = $list ->select_comment($_GET['product_id']);
  ?>

  <?php 
if($list_coment)
{
  while($resultc =$list_coment->fetch_assoc())
  {
   ?>
  <div class="comnet_title">
    
  <span class="star_customer"><p class="fa fa-check"> <?php echo $resultc['date_feedback']?></p>  <p class="fa fa-star star_coment"><?php echo $resultc['star']; ?> </p> </span>
    
  <p><b><?php echo $resultc['name']; ?></b></p>
  <p>Bình Luận: <?php echo $resultc['feedback']?></p>
  <p><?php echo $resultc['title_feedback']?></p>
  </div>
  <?php 
  }
}
else
{
  echo "<h2 >Chưa có đánh giá nào</h2>";
}
  ?>
</div>
<script>
    // Lấy các input radio và button submit
    const stars = document.querySelectorAll('input[name="star"]');
    const submitBtn = document.getElementById('submit-btn');
    
    // Bắt sự kiện khi người dùng chọn một trong các tùy chọn sao
    stars.forEach(function(star) {
        star.addEventListener('change', function() {
            // Kiểm tra xem có tùy chọn sao nào được chọn hay không
            if (document.querySelector('input[name="star"]:checked')) {
                submitBtn.removeAttribute('disabled'); // Kích hoạt button submit
            } else {
                submitBtn.setAttribute('disabled', true); // Vô hiệu hóa button submit
            }
        });
    });
</script>
        <script>
  function increment() {
    var input = document.getElementById("quantity");
    if (parseInt(input.value) < 5) {
      input.value = parseInt(input.value) + 1;
    }
  }
  function decrement() {
    var input = document.getElementById("quantity");
    if (parseInt(input.value) > 1) {
      input.value = parseInt(input.value) - 1;
    }
  }
</script>
<script>
  function autoClick() {
  // Lấy đối tượng button
  var button = document.getElementById("color");

  // Tự động click vào button
  button.click();
}
  </script>
<?php
        include"footer.php";
        ?>