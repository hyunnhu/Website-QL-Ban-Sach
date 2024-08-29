<?php
    include('../classes/order.php');
    $o=new order();
    if(isset($_REQUEST['key']))
    {
        $id=$_REQUEST['key'];
        $o->get_order("SELECT * from customer_order where qrcode='$id'");
    }
    else
    {
        $o->get_order("SELECT * from customer_order");
    }
?>