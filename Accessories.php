<?Php
include"header.php";
?>
<?php
if(isset($_GET['id']))
{
    $count =0;
    $brand = new Promotion;
    $cartegory_id = $_GET['id'];
    $show_brand = $brand -> show_brand($cartegory_id );
    $product = new Promotion;
    $show_product = $product-> show_product($cartegory_id);
}
    
        else 
        if( $_GET['brand_id'])
        {
            $count =1;
            $brand = new Promotion;
            $cartegory_id = $_GET['brand_id'];
            $show_brand = $brand -> show_brand($cartegory_id );
            $product = new Promotion;
            $show_product = $product-> show_product($cartegory_id);
        }
    
?>
<style>
header{
    background-color: transparent;
}
</style>
<section class="cartegory">
            <div class="container">
                <div class="carte_list">
                    <div class="caterory_left">
                        <ul>
                        <?php
                        if($show_brand)     
                        {
                            $i=0;
                            while( $result = $show_brand->fetch_assoc())
                            {$i++;
                        
                        ?>
                            <li class="cate-left_li"><a href="bike.php?brand_id=<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name']?></a>
                        </li>
                        <?php
                        }
                    }
                        ?>

                        </ul>
                    </div>



                    <div class="caterory_right row">
                        <div class="caterory_right_item  ">
                            <p>Sản Phẩm</p>
                        </div> 



                        <div class="caterory_right_content row">
                            
                            <?php
                        if($show_product)     
                        {
                            $i=0;
                            while( $result = $show_product->fetch_assoc())
                            {$i++;
                        
                        ?>
                        <div class="caterory_right_content_item ">
                                <a href="product.php?product_id=<?php echo $result['product_id']?>"><img src="admin/uploads/<?php echo $result['product_img_desc'] ?>" alt="Product">
                                <h1><?php echo $result['product_name'] ?></h1>
                                <p><?php echo $result['product_price'] ?> <sup>Đ</sup></p></a>
                                </div> 
                                <?php
                            }
                        }
                        else echo "Không có sản phẩm nào";
                        ?>
                        
                        </div>
                        
                        <?php
                        if($count == 1)
                        {
                            ?>
                            
  <button type="button" onclick="quay_lai_trang_truoc()">Quay lại trang trước</button>
                            <?php
                        }
                        ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="caterory_right_bot">
                            <div class="caterory_right_bot_item">
                                <p><span><span>Trang Đầu</span><span> &#60; 1 2 3 4 5 &gt; </span><span>Trang Cuối</span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>








<!-- 

                  <script>
      function quay_lai_trang_truoc(){
          history.back();
      }
  </script>
        <?php
        include"footer.php";
        ?>