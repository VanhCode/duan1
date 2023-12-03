<?php
function listOrder(){
    $sql="SELECT u.user_id,o.order_id,CONCAT(u.firth_name,' ',u.last_name) AS fullName,u.user_image,o.receiver_name,o.receiver_address,o.receiver_phone,o.status,o.payment_status,o.create_at,SUM((od.price * od.amount) - o.voucher) AS total
    FROM `orders` o
    JOIN users u
    ON u.user_id= o.user_id
    JOIN order_details od
    ON od.order_id=o.order_id
    GROUP BY order_id";
    return query($sql)->fetchAll();
}
function listOrder_detail($order_id){
    $sql="SELECT od.order_detail_id,o.voucher,p.product_id,p.product_name,p.images,od.amount,od.price,od.size,od.color,od.price * od.amount AS total
    FROM order_details od
    JOIN products p
    ON p.product_id=od.product_id
    JOIN orders o
    ON o.order_id=od.order_id
    WHERE od.order_id=".$order_id;
    return query($sql)->fetchAll();
}