<?php
    // Thêm đơn hàng
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

    // Select Đơn hàng
    function load_all_order($user_id) {
        $sql = "SELECT
                    orders.order_id,
                    orders.user_id,
                    orders.ma_don_hang,
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    products.product_id,
                    products.product_name,
                    products.images,
                    products.price,
                    products.sale
                FROM
                    orders
                INNER JOIN
                    order_details ON orders.order_id = order_details.order_id
                INNER JOIN
                    products ON order_details.product_id = products.product_id
                WHERE
                    user_id = $user_id
                
        ";
        return pdo_query($sql);
    }

    function load_bill_choxacnhan($user_id) {
        $sql = "SELECT
                    orders.order_id,
                    orders.user_id,
                    orders.ma_don_hang,
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    products.product_id,
                    products.product_name,
                    products.images,
                    products.price,
                    products.sale
                FROM
                    orders
                INNER JOIN
                    order_details ON orders.order_id = order_details.order_id
                INNER JOIN
                    products ON order_details.product_id = products.product_id
                WHERE
                    orders.status = 'pending'
                AND
                    user_id = $user_id
                
        ";
        return pdo_query($sql);
    }

    function load_bill_daxacnhan($user_id) {
        $sql = "SELECT
                    orders.order_id,
                    orders.user_id,
                    orders.ma_don_hang,
                    orders.status,
                    orders.payment_status,
                    orders.payment_method,
                    order_details.order_detail_id,
                    order_details.order_id,
                    order_details.product_id,
                    order_details.amount,
                    order_details.size,
                    order_details.color,
                    order_details.price as price_orderDetail,
                    products.product_id,
                    products.product_name,
                    products.images,
                    products.price,
                    products.sale
                FROM
                    orders
                INNER JOIN
                    order_details ON orders.order_id = order_details.order_id
                INNER JOIN
                    products ON order_details.product_id = products.product_id
                WHERE
                    orders.status = 'confirmed'
                AND
                    user_id = $user_id
                
        ";
        return pdo_query($sql);
    }
?>