<?php
include("fontend/productclass.php");

if(isset($_GET))
{
    $cart_id = $_GET['a'];
    $get = new Product;
    $get_inf = $_GET['a'];
    $get_inf = $get -> show_item($get_inf);
    if($get_inf)
    {
        $result = $get_inf ->fetch_assoc();
        $a = $result['product_price'];
        $quantity = $result['cart_quantity'] + 1;
        $b = $result['total'];
        $total = $b + $a;
        $update = new Product;
        $update_cart = $update->update_cart($cart_id,$quantity,$total);
        $response = array(
            'total' => $total
        );

        // In ra thẻ input với giá trị là total
        echo "<input type='text' id='total_item' name='total_item' value='" . $total . "'/>";
    }
    
    echo json_encode($response);
}
?>
