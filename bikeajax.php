<?php
include "fontend/promotionclass.php";

if($_POST['a'])
{
$star = ($_POST['a']-1) *8 ;
$end = 8;
$new = new Promotion;
$img = new Promotion;
$veiw = $new-> show_page($star,$end );
if($veiw)
{
    while($result = $veiw->fetch_assoc())
    {
        $select_img = $img->get_color_page($result['product_id']);
        if($select_img)
        {
            $resultA = $select_img->fetch_assoc();
        
?>

<div class="caterory_right_content_item ">
                                <a href="product.php?product_id=<?php echo $result['product_id']?>"><img src="admin/uploads/<?php echo $resultA['product_img_desc'] ?>" alt="Product">
                                <h4><?php echo $result['product_name'] ?></h4>
                                <p><?php 
                                $number = $result['product_price']; 
                                $formattedNumber = number_format($number, 0, '.', '.');
                                echo  $formattedNumber?> <sup>Đ</sup></p></a>
                                </div> 
<?php
        }
    }
}

}

?>