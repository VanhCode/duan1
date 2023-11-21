<?php
    function insert_bill($user_id,$ma_don_hang,$receiver_name,$receiver_phone,$receiver_address,$payment_method) {
        $sql = "INSERT INTO `orders`(`user_id`, `ma_don_hang`, `receiver_name`, `receiver_phone`, `receiver_address`,`payment_method`) 
                VALUES 
        ('$user_id','$ma_don_hang','$receiver_name','$receiver_phone','$receiver_address','$payment_method')";
        pdo_execute($sql);

    }
?>