<?php
    function addProduct($name, $price, $sale, $image, $danhmuc) {
        $sql = "INSERT INTO `products`(`product_name`, `price`, `sale`, `images`, `category_id`) 
                VALUES (?,?,?,?,?)";
        pdo_execute($sql, $name, $price, $sale, $image, $danhmuc);
        print_r(pdo_get_connection()->lastInsertId());
        // return $conn->lastInsertId();
    }
?>