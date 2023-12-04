<?php
    // function voucher($user_id,$product_id) {
    //     $sql = "SELECT * FROM user_voucher JOIN voucher ON voucher.voucher_id = user_voucher.voucher_id WHERE user_id = $user_id 
    //             AND
    //             user_voucher.product_id IS NULL
    //             ";
    //     $voucher_all_product = pdo_query($sql);
    //     $sql = "SELECT * FROM user_voucher JOIN voucher ON voucher.voucher_id = user_voucher.voucher_id WHERE user_id = $user_id 
    //             AND
    //             user_voucher.product_id = $product_id
    //             ";
    //     $voucher_by_product = pdo_query($sql);
    //     $data = array_merge($voucher_all_product, $voucher_by_product);
    //     return $data;
    // }

    function voucher_byId($id_voucher) {
        $sql = "SELECT * FROM voucher WHERE voucher_id = $id_voucher";
        return pdo_query_one($sql);
    }

    function voucher($user_id,$dk=0) {
        $sql = "SELECT * FROM user_voucher JOIN voucher ON voucher.voucher_id = user_voucher.voucher_id WHERE user_id = $user_id 
                AND
                user_voucher.product_id IS NULL
                AND
                $dk <= voucher.to_price
                ";
        return pdo_query($sql);
    }
?>