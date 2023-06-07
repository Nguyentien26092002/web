<?Php
include"header.php";
?>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
$product = new Promotion;
$ip = $product -> show_item_cart($ip);

$total_show = new Promotion;
$show_total = $_SERVER['REMOTE_ADDR'];
$show_total = $total_show -> show_total($show_total);
if($show_total)
{
  $resultB = $show_total->fetch_assoc();
  $sl = $resultB['sl'];
  $item= $resultB['item'];
}
?>
 <style>
 header{
     background-color: black;
 }

 </style>


<section class="cart">
        <div class="container">
            <div class="cart_top_wrap">
                <div class="cart_top ">
                    <div class="cart_top_icon cart_top_item">
                        <li class="fa fa-shopping-bag " ></li>
                    </div>
                    <div class="cart_top_adress cart_top_item">
                        <li class="fa fa-map-marked-alt "> </li>
                    </div>
                    <div class="cart_top_cash cart_top_item">
                        <li class="fa fa-money-bill-alt " ></li>
                    </div>
                </div>
            </div>
                <div class="cart_content row">
                    <div class="cart_content_left">
                      <div id="cart-items-wrapper">
                    <table class="table_cart">
            <tr>
                <th class="table_cart1" >Ảnh </th>
                <th class="table_cart2" >Tên Sản Phẩm</th>
                <th class="table_cart3" >Màu</th>
                <th class="table_cart4" >Số Lượng</th>
                <th class="table_cart5" >Giá</th>
                <th class="table_cart6" >Xóa</th>
            </tr>
  <?php
    if ($ip) {
      while ($result = $ip->fetch_assoc()) {
        $bike_color = new Promotion;
        $id = $result['product_id'];    
        $color = $result['cart_color'];
        $color_img = $bike_color->color_image($color, $id);
        if ($color_img) {
            $resultA = $color_img->fetch_assoc();
            $a = $result['cart_id'];
  ?>
          <tr>
            <td class="table_cart1" ><img src="admin/uploads/<?php echo $resultA['product_img_desc']?>"></td>
            <td class="table_cart2" ><p><?php echo $result['product_name']?></p></td>
            <td class="table_cart3" ><p id="color"><?php echo $result['cart_color']?></p></td>
            <td class="table_cart4" >
              <div class="cart-item">
              <button type="button" class="product_quantity_but decrement" value="<?php echo $a ?> <?php  if($a==1) echo "disabled"?>" data-quantity="-1"><p>-</p></button>
            
              <input  min="1" max="5" type="number"  value="<?php echo $result['cart_quantity'] ?>" required onchange="checkQuantity(this)" >
        
          <button  type="button"  class="product_quantity_but increment" value="<?php echo $a ?>" data-quantity="1"><p>+</p></button>
        </div>

              </td>
              <td class="table_cart5" > <div class="product_price"><?php echo $formattedNumber = number_format($result['total'], 0, '.', '.') ?> Đ</div></td>
        
              <td class="del_x table_cart6 "><a href="cartdelete.php?id=<?php echo $result['cart_id'] ?> " onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><p style=" padding-bottom:3px; ">x</p></a></td>
            </tr>
    <?php 
          }
        }
      }
    ?>

  </table>
  </div>
  <script>
function checkQuantity(input) {
  if (input.value == 1) {
    input.value = 1; 
  } else if (input.value > 5) {
    input.value = 5; // Nếu giá trị nhập vào lớn hơn 5, thay đổi thành 5
  }
}
  $(document).ready(function() {
    $(document).on('click', '.decrement', function() {
      var a = $(this).val();
      var input = $(this).siblings('input[type="number"]')[0];
if(input.value >1)
{
  $.ajax({
        url: 'decrementajax.php',
        type: 'GET',
        data: {
          a: a
        },
        success: function(response) {
          response = JSON.parse(response);
          $('#total_item').val(response.total);
        }
      });
      $('#cart-items-wrapper').load(location.href + ' #cart-items-wrapper', function() {
        $(this).find('.cart-item').each(function() {
          // Do something with each cart item
        });
      });
      $('#mydiv').load(location.href + ' #mydiv', function() {
        $(this).find('.cart-load').each(function() {
          // Do something with each cart item
        });
      });
      
}
           
     
    });

    $(document).on('click', '.increment', function() {
      var a = $(this).val();
      var input = $(this).siblings('input[type="number"]')[0];
    if (input.value < 5) {
  $.ajax({
        url: 'incrementajax.php',
        type: 'GET',
        data: {
          a: a
        },
        success: function(response) {
          $('#total_item').val(response.total);
        }
      });
      $('#cart-items-wrapper').load(location.href + ' #cart-items-wrapper', function() {
        $(this).find('.cart-item').each(function() {
          // Do something with each cart item
        });
      });
      $('#mydiv').load(location.href + ' #mydiv', function() {
        $(this).find('.cart-load').each(function() {
          // Do something with each cart item
        });
      });
    }
    });
  
  });
  </script>
             
                        <div class="Cart_left_but">
                          <button><a style="text-decoration: none; " href="
                          <?php
if(isset($b))
{
  echo 'bike.php?id='.$b;
}
else
{
  echo 'index.php';
}
                          ?>
                          " >Quay Lại Tiếp Tục Mua Hàng</a></button>
                        </div>
                    </div>  

                    <div class="cart_content_right">
                      <?php 

                      ?>
                      <div id="mydiv">
                        <table class="cart-load">
                            <tr>
                                <th colspan="2">Tổng Tiền</th>
                            </tr>
                            <tr>
                                <td>Tổng Sản Phẩm</td>
                                <td><?php echo $resultB['item']?></td>
                            </tr>
                            <tr>
                                <td>Tổng Tiền Hàng</td>
                                <td><p><?php echo $formattedNumber = number_format($sl, 0, '.', '.') ?><sup>đ</sup></p></td>
                            </tr>
                            <tr>
                                <td>Tạm Tính</td>
                                <td><p style="color:black; font-weight: bold;"><?php echo $formattedNumber = number_format($sl, 0, '.', '.')?><sup>đ</sup></p></td>
                            </tr>   
                            <tr>
                              <td>Thanh Toán Ít nhất</td>
                              <td><p style="color:black; font-weight: bold;"><?php echo $formattedNumber = number_format($sl*10/100, 0, '.', '.') ; ?><sup>đ</sup></p></td>
                          </tr>                     
                        </table>
                        </div>
                        <div class="cart_content_right_text">
                            <p>Bạn cần thanh toán trước ít nhất 10% giá trị sản phẩm</p>
                        </div>
                        <div class="cart_content_right_button">
                        <form method="post" action="<?php echo ($resultB['item'] != 0) ? 'customer_adres.php' : ''; ?>">
  <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
  <button type="submit" onclick="return validateForm();">Đặt Hàng</button>
</form>

<script>
function validateForm() {
  if (<?php echo $resultB['item']; ?> == 0) {

    alert('Giỏ hàng trống');
    return false;
  }
  return true;
}
</script>

                          
                          
                        </div>

                 

                </div>
             </div>
      
        </div>

      </section>  

<script>

  </script>
 <?php
        include"footer.php";
        ?>