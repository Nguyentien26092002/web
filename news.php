<?Php
include"header.php";
?>
<style>
header{
    background-color: black;
}
</style>
<section class="news">
    <?php
        $select = new Promotion;

        $select_promotion = $select->select_promotion();
    ?>
            <div class="container">


            <div style="width: 100%;" class="caterory_right row">
                        <div class="promotion_top">
                            <h1>Tin Tức</h1>
                        </div> 


        <?php
if($select_promotion)
{
    while($result=$select_promotion->fetch_assoc())
    {
        ?>


                        <div class="promotion_page row">
                        <a href="<?php echo $result['content']?>" target="_blank"><img class="promtion_img" src="./admin/promotion/<?php echo $result['imga']?>"></a>
                        <a class="promotion_title" href="<?php echo $result['content']?>" target="_blank"><p class="promotion_title"><?php echo $result['title']?></p></a>
                        
                        </div>
                        <?php
    }
}
        ?>
                        
                        </div>

                    </div>
                </div>



</section>





                  <script>
      function quay_lai_trang_truoc(){
          history.back();
      }
  </script>
        <?php
        include"footer.php";
        ?>