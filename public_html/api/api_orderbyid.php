<?php
    include('../classes/order.php');
    $o=new order();
    if(isset($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
        $o->get_order("SELECT * from customer_order where id='$id'");
    }
    else
    {
        $o->get_order("SELECT * from customer_order");
    }
?>