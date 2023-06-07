<?php 
include "class/caterory_class.php"
?>

<?php
$cartegory = new Caterory;
if(!isset($_GET['caterory_id']) || $_GET['caterory_id'] ==null )
{
    echo  "<script>window.location = 'catelist.php'</script>";
} 
else 
{
    $cartegory_id = $_GET['caterory_id'];
}
    $delete_cart = $cartegory -> delete_cartegory($cartegory_id);
?>
