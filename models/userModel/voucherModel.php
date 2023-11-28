<?php
    function voucher($user_id) {
        $sql = "SELECT * FROM user_voucher JOIN voucher ON voucher.voucher_id = user_voucher.voucher_id WHERE user_id = $user_id";
        return pdo_query($sql);
    }

    function voucher_byId($id_voucher) {
        $sql = "SELECT * FROM voucher WHERE voucher_id = $id_voucher";
        return pdo_query_one($sql);
    }
?>