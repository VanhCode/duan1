<?php
function totalSell($day=7){
    $sql="SELECT SUM(amount * price) AS total_sell
    FROM order_details od
    JOIN orders o
    ON o.order_id=od.order_id
    WHERE date(create_at) >= DATE_SUB(CURRENT_DATE,INTERVAL ${day} DAY)";
    return query($sql)->fetch();
}
function totalUser(){
    $sql="SELECT COUNT(user_id) AS total_user
    FROM users";
    return query($sql)->fetch();
}
function newOrder($day=7){
    $sql="SELECT u.user_id,o.order_id,CONCAT(u.firth_name,' ',u.last_name) AS fullName,u.user_image,o.receiver_name,o.receiver_address,o.receiver_phone,o.status,o.payment_status,date(o.create_at) as create_at,SUM((od.price * od.amount) - od.voucher) AS total
    FROM `orders` o
    JOIN users u
    ON u.user_id= o.user_id
    JOIN order_details od
    ON od.order_id=o.order_id
    WHERE date(create_at) >= DATE_SUB(CURRENT_DATE,INTERVAL ${day} DAY)
    GROUP BY order_id";
    return query($sql)->fetchAll();
}