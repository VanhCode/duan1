<?php
    include "../models/pdo.php";
    include "../models/userModel/cartModel.php";

    $cartId = $_GET['cart_id'] ?? 0;
    $amount = $_GET['amount'] ?? 0;

    updateCart($cartId,$amount);

    // Sau khi update thì sẽ lấy lại chính nó sản phẩm trong giỏ hàng được click số lượng
    $cartBill = getCartByid($cartId);

    echo $cartBill['amount'];
?>