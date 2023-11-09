<?php
    // Thêm sản phẩm vào giỏ hàng
    function add_cart($user_id,$product_id,$amount,$size,$color) {
        $sql = "INSERT INTO `cart`(`user_id`, `product_id`, `amount`, `size`, `color`) 
                    VALUES 
        ('$user_id','$product_id','$amount','$size','$color')";
        pdo_execute($sql);
    }
    
    // Select sản phẩm giỏ hàng theo id tài khoản
    function listCart($user_id) {
        $sql = "SELECT
                    cart.cart_id,
                    cart.amount,
                    cart.size,
                    cart.color,
                    cart.product_id,
                    products.product_id,
                    products.product_name,
                    products.price,
                    products.images,
                    products.sale
                FROM
                    cart
                INNER JOIN
                    products ON cart.product_id = products.product_id
                WHERE
                    cart.user_id = '$user_id'";
        return pdo_query($sql);
    }


    // Update giỏ hàng
    function updateCart($idCart,$amount) {
        $sql = "UPDATE cart SET amount = '".$amount."' WHERE cart_id = '$idCart'";
        pdo_execute($sql);
    }


    // CheckCart
    function checkProCartBySizeColor($productId, $size, $color) {
        $sql = "SELECT * FROM cart WHERE product_id = '$productId' AND size = '$size' AND color = '$color'";
        return pdo_query_one($sql);
    }

    
?>