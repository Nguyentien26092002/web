<?Php
include"header.php";
?>
<?php

?>
<?php
$customer = new Promotion;
if($_SERVER['REQUEST_METHOD']==='POST')
{
  $customer_inf = $customer -> insert_customer();
}
?>
<section id="Slider">
  <div class="aspect-ratio-169">
      <img src="Picture/hinh-nen-moto-4k_101648520.png">
      <img src="Picture/hinh-nen-moto-4k-cho-may-tinh_101647906.jpg">
      <img src="Picture/hinh-nen-xe-moto-ducati_101658320.jpg">
  </div>
  <div class="dot_container">
      <div class="dot active"></div>
      <div class="dot"></div>
      <div class="dot"></div>
  </div>
        </section>
        <div class="body_web">
          <div class="body_webup">
          <div class="body_webup_pic"> <img  src="Picture/hinh-nen-moto-dep-va-doc.jpg"></div>
            <div class="body_webup_title">
              <h1>TẠO DẤU ẤN RIÊNG CHO CHIẾC XE CỦA BẠN</h1>
              <h3>Hàng ngàn phụ tùng & phụ kiện xe chính hãng thiết kế riêng cho từng dòng mô tô. Khám phá ngay!</h3>
              </div>
          </div>
          <div class="body_webup">
            <div class="body_webup_title">
              <h1>THỜI TRANG PHONG CÁCH DÀNH CHO CÁC TAY LÁI</h1>
              <h3>Là một trong những đội ngũ tiên phong trong lĩnh vực xe mô tô, xe máy nhập khẩu, Minh Long Motor mong muốn mang đến những mẫu xe mới với giá thành tốt nhất</h3>
            </div>
       
          <div class="body_webup_pic" >
          <img  src="Picture/wp5951268.jpg">
        </div>
</div>

</div>

<?php
$promotion = new Promotion;
$show_promotion = $promotion -> show_promotionver();
    ?>


        <div class="Promotion row">
  <div class="pro_top">
    <h1>Tin Tức</h1>
  </div>
 
          <div class="Pro row">
            <?php
            if($show_promotion)
{
    while($result=$show_promotion->fetch_assoc())
    {
        ?>
            <div class="promotion_video zoomin">
              <a href="<?php echo $result['content']?>"><img src="./admin/promotion/<?php echo $result['imga']?>"></a>
              <a class="news" href="<?php echo $result['content']?>"><p class="news"><?php echo $result['title']?></p></a>
                </div>
                <?php
    }
}
        ?>
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