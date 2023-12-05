<?php
    // NOW(): Là hàm trả về thời điểm hiện tại
    // DATE_SUB(NOW(), INTERVAL 3 DAY): Là hàm trả về thời điểm hiện tại trừ đi 3 ngày.
    

    function count_searchModel($keySearch) {
        $sql = "SELECT * FROM products WHERE product_name LIKE '%".$keySearch."%' ORDER BY product_id DESC";
        $result = pdo_query($sql);
        return $result;
    }

    function searchModel($keySearch,$sapxep,$begin) {
        $sql = "SELECT * FROM products WHERE 1 AND product_name LIKE '%".$keySearch."%' ORDER BY $sapxep LIMIT $begin, 20";
        $result = pdo_query($sql);
        return $result;
    }


    // Tìm kiếm sản phẩm theo giá
    function count_search__khoanggia($min,$max) {
        $sql = "SELECT * FROM products WHERE price >= $min AND price <= $max ORDER BY product_id DESC";
        $result = pdo_query($sql);
        return $result;
    }
    function search__khoanggia($min,$max,$sapxep,$begin) {
        $sql = "SELECT * FROM products WHERE price >= $min AND price <= $max ORDER BY $sapxep LIMIT $begin, 20";
        $result = pdo_query($sql);
        return $result;
    }
?>