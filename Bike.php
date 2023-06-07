<?Php
include"header.php";
?>
<?php
if(isset($_GET['id']))
{
    $brand = new Promotion;
    $cartegory_id = $_GET['id'];    
    $show_brand = $brand -> show_brand_list();
    $product = new Promotion;

    $show_product = $product-> show_product_list();
    $list = new Promotion;
    $show_list = $list -> show_list($cartegory_id );
}
    
        else 
        if( $_GET['brand_id'])
        {
            $brand = new Promotion;
            $cartegory_id = $_GET['brand_id'];
            $show_brand = $brand -> show_brand($cartegory_id );
            $list = new Promotion;
            $show_list = $list -> show_list($cartegory_id );
            $product = new Promotion;
            $show_product = $product-> show_product($cartegory_id);
        }
    
?>
<style>
header{
    background-color: black;
}
</style>
<section class="cartegory">
            <div class="container">
                <div class="carte_list">
                    <div class="caterory_left">
                        <ul>
                        <?php
                        if($show_list)     
                        {

                            while( $result = $show_list->fetch_assoc())
                            {
                        
                        ?>
                            <li class="cate-left_li"><a href="Bike.php?brand_id=<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name']?></a>
                        </li>
                        <?php
                        }
                    }
                        ?>

                        </ul>
                    </div>



                    <div class="caterory_right row">
                        <div class="caterory_right_item  ">
                            <h1>Sản Phẩm</h1>
                        </div> 



                        <div class="caterory_right_content  row" id="list_page">
                            
                            <?php
                        if($show_product)     
                        {
                            while( $result = $show_product->fetch_assoc())
                            {
                        
                        ?>
                        <div class="caterory_right_content_item ">
                                <a href="product.php?product_id=<?php echo $result['product_id']?>"><img src="admin/uploads/<?php echo $result['product_img_desc'] ?>" alt="Product">
                                <h4><?php echo $result['product_name'] ?></h4>
                                <p><?php 
                                $number = $result['product_price']; 
                                $formattedNumber = number_format($number, 0, '.', '.');
                                echo  $formattedNumber?> <sup>Đ</sup></p></a>
                                </div> 
                                <?php
                            }
                        }
                        else echo "<p>Không có sản phẩm nào</p>";
                        ?>
                        
                        </div>
                        
                        <?php
                        if($show_product!=true)
                        {
                            ?>
                            
  <button class="button_comback" type="button" onclick="quay_lai_trang_truoc()">Quay lại trang trước</button>
                            <?php
                        }
                        ?>






                        <div class="caterory_right_bot">
                            <div class="caterory_right_bot_item">

                            <?php 
                            $count= new Promotion;
                                if(isset($_GET['id'])  )
                                {
                                        $select_count = $count->countnone();
                                }
                                else
                                {
                                    if($_GET['brand_id'])
                                    {
                                        $select_brand = $_GET['brand_id'];
                                        $select_count = $count->count($select_brand);
                                    }
                                }

  

                                if($select_count)
                                {
                                    $result = $select_count->fetch_assoc();
                                    $total_pages = ceil($result['sl'] / 8);
                                    iF($total_pages>=2)
                                    {
                                      ?>
                                            <div class="pagination">
                                      <?php  
                                    for($i=1; $i <=$total_pages; $i++)
                                    {
                                         ?>
                                   
<button class="page-button" data-page="<?php echo $i; ?>"><?php echo $i; ?></button>
                                        
<?php
                                    }
                                    ?>
                                     </div>
                                     <?php
                                    }

                            ?>



<?php
                                }
?>
                            </div>

                        </div>
                    </div>

                </div>
            </div>









                  <script>
      function quay_lai_trang_truoc(){
          history.back();
      }






    $(document).on('click', '.page-button', function() {
        var a = $(this).data('page');
  $.ajax({
        url: 'bikeajax.php',
        type: 'Post',
        data: {
          a: a
        },

        success: function(response) {
            $('#list_page').html(response);
        }
      });
    });

  </script>



        <?php
        include"footer.php";
        ?>