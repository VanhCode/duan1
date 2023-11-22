<?php
function insert_bill($user_id,$ma_don_hang,$receiver_name,$receiver_phone,$receiver_address,$payment_method) {
    $sql = "INSERT INTO `orders`(`user_id`, `ma_don_hang`, `receiver_name`, `receiver_phone`, `receiver_address`,`payment_method`) 
                VALUES 
        ('$user_id','$ma_don_hang','$receiver_name','$receiver_phone','$receiver_address','$payment_method')";
    return pdo_execute_returnLastInsertId($sql);

}

function insert_bill_detail($order_id, $product_id, $amount, $size, $color, $price) {
    $sql = "INSERT INTO `order_detailS`(`order_id`, `product_id`, `amount`, `size`, `color`, `price`) 
                VALUES 
        ('$order_id','$product_id','$amount','$size','$color','$price')";
    pdo_execute($sql);
}
?>