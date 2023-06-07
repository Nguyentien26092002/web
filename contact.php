<?Php
include"header.php";
?>
<?php
$promotion = new Promotion;
$show_promotion = $promotion -> show_promotion();
?>
<style>
header{
    background-color: black;
}

</style>
<?php
$customer = new Promotion;
if($_SERVER['REQUEST_METHOD']==='POST')
{
  $customer_inf = $customer -> insert_customer();
  if($customer_inf)
  {

    ?>
<script>
    // Hiển thị thông báo alert
    alert("Minh Long sẽ sớm liên hệ đến bạn");

    // Sau 5 giây, chuyển hướng đến trang index.php
    setTimeout(function () {
        window.location.href = './index.php';
    }, 5000);
</script>
    <?php
  }
}
?>

       

  <?php 
                        if($show_promotion)
                        {
                            $i=0;
                            while( $result = $show_promotion->fetch_assoc())
                            {$i++;
                        
                        ?>
          <?php
                          }
                        }
          ?>
  

    <div class="head">
<p><a href="index.php">Home</a> &#8594; Tìm Kiếm </p>
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