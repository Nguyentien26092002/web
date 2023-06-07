<?Php
include"header.php";
include"connnect.php";
require_once("./config.php");
?>
<style>
header{
   background-color: black;
}
.head
{
    width: 100%;
    margin-top: 30px;
    padding-left: 40px;
    
}
.but button
{
      width:150px; height:50px; border-radius: 10px; background-color:transparent; border:1px solid black;
}
.but button:hover
{
background-color: black;
color: white;
}
.head p 
{

    color: gray;
    font-weight: bold;
    padding-left: 40px;
    
}
.head p a
{

    color: gray;
    font-weight: bold;
    padding-left: 40px;
    
}
.head input
{
margin-top: 30px;
    width: 400px; 
    height:40px;
    padding-left: 10px;
}
.head button
{
    width: 40px; 
    height:40px;
    border: none;
    background-color: transparent;
}
</style>


<section style="margin-top: 80px;" id="Slider">
<div class="head">
<p><a href="index.php">Home</a> &#8594; Tìm Kiếm </p>
<form  action="search.php" method="post" >
<input required name="find" placeholder="Find" type="text">
<button type="submit"><i style="color:black" class="fas fa-search"></i></button>

</form>
</div>

        </section>



<?php


if($_POST)
{
    $new = new Promotion;
    $inf = $_POST['find'];
$check = false;
    $search = $new->search($inf);
    ?>
     <div class="caterory_right row">
            <div style=" padding-left: 20px;"  class="SP" >
                <p>Sản Phẩm</p>
            </div> 
            
            <div class="caterory_right_content row">
                
        
    <?php
    if($search)
    {
        while($result=$search->fetch_assoc())
        {
            $check=true;
?>

           


<div class="caterory_right_content_item ">
                    <a href="product.php?product_id=<?php echo $result['product_id']?>"><img src="admin/uploads/<?php echo $result['product_img_desc'] ?>" alt="Product">
                    <h1><?php echo $result['product_name'] ?></h1>
                    <p><?php 
                    $number = $result['product_price']; // Số cần định dạng
                    $formattedNumber = number_format($number, 0, '.', '.');
                    echo  $formattedNumber?> <sup>Đ</sup></p></a>
                    </div> 

            

        <?php
                }
            }
        }
            if($check==false) 
            {
                ?>
                <div style="margin-top: 40px; padding-left: 20px;" class="caterory_right_item " >
                <p>Không có sản phẩm nào</p>
            </div> 
                <?php
            }
            ?>  


            <div class="caterory_right_bot">
                <div class="caterory_right_bot_item">
                <div style="padding-left:10px;" class="but">
         <button type="button" onclick="location.href='index.php'">Quay Về Trang chủ</button>
         </div>
                </div>
            </div>
            </div>  
            
        </div>
        <div class="customer_help">
      <h1>Liên Hệ Với Chúng Tôi</h1>

<form  action=" " method="post">
<input name="name" class="Customer_help_title" placeholder="Tên Của Anh/Chị" type="text">
        <input name="SDT" class="Customer_help_title" placeholder="Điện Thoại" type="text">
        <input name="mail" class="Customer_help_title" placeholder="Email" type="mail">
        <input name="title" class="Customer_help_title" placeholder="Nội Dung" type="text">
        <button type="submit" class="customer_send">Gửi</button>
</form>
      
    </div>

















<?php

        include"footer.php";
        ?>
     