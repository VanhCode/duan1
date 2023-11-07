<?php
    function searchModel($keySearch) {
        $sql = "SELECT * FROM products WHERE 1 AND product_name LIKE '%".$keySearch."%' ORDER BY product_id ASC";
        $result = pdo_query($sql);
        return $result;
    }
?>