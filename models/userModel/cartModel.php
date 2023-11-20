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


    function listCartHeader($user_id) {
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
                    cart.user_id = '$user_id' LIMIT 5";
        return pdo_query($sql);
    }

    function listCart__bill($cart_id) {
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
                    cart.cart_id = '$cart_id'";
        return pdo_query_one($sql);
    }


    function checkProCartBySizeColor($productId, $size, $color) {
        $sql = "SELECT * FROM cart WHERE product_id = '$productId' AND size = '$size' AND color = '$color'";
        return pdo_query_one($sql);
    }

    
    function countProductCart($userid) {
        $sql = "SELECT COUNT(*) as countProduct_cart FROM cart WHERE user_id = '$userid'";
        return pdo_query_one($sql);
    }


    function getCartByid($cartId) {
        $sql = "SELECT * FROM cart WHERE cart_id = '$cartId'";
        return pdo_query_one($sql);
    }


    // Update giỏ hàng
    function updateCart($idCart,$amount) {
        $sql = "UPDATE cart SET amount = '".$amount."' WHERE cart_id = '$idCart'";
        pdo_execute($sql);
    }


    // Delete cart
    function delete_cart($cart_id) {
        $sql = "DELETE FROM cart WHERE cart_id = '$cart_id'";
        pdo_execute($sql);
    }

    // Delete cart_Byid__checkbox
    function deleteCart_checkbox_mutiItem($idCart) {
        $idCart = implode(',', $idCart);
        $sql = "DELETE FROM cart WHERE cart_id IN ($idCart)";
        pdo_execute($sql);
    }
?>