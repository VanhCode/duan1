<?php
    include '../../models/PDO_admin.php';
    $order_id=$_GET['order_id']??0;
    if(isset($_GET['status'])){
        $status=$_GET['status']??'pending';
        
        updateData('orders',[
            'status'=>$status
        ],'order_id='.$order_id);
        echo $status;
    }

    if($status== 'completed') {
        $status_payment = 'paid';   
        updateData('orders',[
            'payment_status'=>$status_payment
        ],'order_id='.$order_id);
        echo $status_payment;
    }

    if(isset($_GET['payment_status'])){

        $status=$_GET['payment_status']??'pending';

        updateData('orders',[
            'payment_status'=>$status
        ],'order_id='.$order_id);
        echo $status;
    }
?>