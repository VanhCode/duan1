<?php
include '../../models/PDO_admin.php';
$status=$_GET['status']??'pending';
$order_id=$_GET['order_id']??0;
updateData('orders',[
    'status'=>$status
],'order_id='.$order_id);
echo $status;
?>