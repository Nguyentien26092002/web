<?php 
include "header.php";
include "slider.php";
include "class/customer.php";
?>
<?php
if(!empty($_POST))
{

    if($_POST['action']=='cancel')
    {
        $a = 2;
    }
    else
    {
        if($_POST['action']=='confirm')
        {
            $a =1;
        }
        else
        {
            if($_POST['action']=='done')
            {
                $a = 3;
            }
        }
    }

    $cus = $_POST['idcus'];
    $id = $_POST['id'];
    $new = new Customer;
    $Del = $new->Del_all($id,$a,$cus);
}
?>