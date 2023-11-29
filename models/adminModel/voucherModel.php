<?php
//function addVoucherForAllUser($voucher_id){
//    $sql="
//    INSERT INTO user_voucher(user_id,voucher_id)
//    SELECT user_id ,$voucher_id
//    FROM users
//    WHERE user_id NOT IN(SELECT user_id FROM user_voucher WHERE voucher_id=$voucher_id)";
//    pdo_execute($sql);
//}
function addVoucherForAllUser($voucher_id,$product_id='NULL'){
    $sql="INSERT INTO user_voucher(`user_id`,`voucher_id`,`product_id`)
    SELECT user_id ,$voucher_id ,$product_id
    FROM users
    WHERE user_id NOT IN(SELECT user_id FROM user_voucher WHERE voucher_id=$voucher_id)";
    pdo_execute($sql);
}
//function addVoucherForNewUser($voucher_id,$onlineDay){
//    $sql="INSERT INTO user_voucher(user_id,voucher_id)
//    SELECT user_id,$voucher_id
//    FROM users
//    WHERE DATE(user_create_at) <= DATE_SUB(NOW(),INTERVAL $onlineDay DAY)
//    AND user_id NOT IN(SELECT user_id FROM user_voucher WHERE voucher_id=$voucher_id)";
//    pdo_execute($sql);
//}

function addVoucherForNewUser($voucher_id,$onlineDay,$product_id='NULL'){
    $sql="INSERT INTO user_voucher(`user_id`,`voucher_id`,`product_id`)
    SELECT user_id,$voucher_id,$product_id
    FROM users
    WHERE DATE(user_create_at) <= DATE_SUB(NOW(),INTERVAL $onlineDay DAY)
    AND user_id NOT IN(SELECT user_id FROM user_voucher WHERE voucher_id=$voucher_id)";
    pdo_execute($sql);
}

//function addVoucherForUserWithPaymentLimit($voucher_id,$paymentLimit){
//    $sql="INSERT INTO user_voucher(user_id,voucher_id)
//    SELECT user_id,$voucher_id
//    FROM users
//    WHERE user_id IN(
//        SELECT user_id
//        FROM orders o
//        JOIN order_details od
//        ON od.order_id=o.order_id
//        GROUP BY o.user_id
//        HAVING SUM(od.amount*od.price) >=$paymentLimit
//    ) AND user_id NOT IN(SELECT user_id FROM user_voucher WHERE voucher_id=$voucher_id)";
//    pdo_execute($sql);
//}
function addVoucherForUserWithPaymentLimit($voucher_id,$paymentLimit,$product_id='NULL'){
    $sql="INSERT INTO user_voucher(`user_id`,`voucher_id`,`product_id`)
    SELECT user_id,$voucher_id ,$product_id
    FROM users
    WHERE user_id IN(
        SELECT user_id
        FROM orders o
        JOIN order_details od
        ON od.order_id=o.order_id
        GROUP BY o.user_id
        HAVING SUM(od.amount*od.price) >=$paymentLimit
    ) AND user_id NOT IN(SELECT user_id FROM user_voucher WHERE voucher_id=$voucher_id)";
    pdo_execute($sql);
}