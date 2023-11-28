<?php
    // NOW(): Là hàm trả về thời điểm hiện tại
    // DATE_SUB(NOW(), INTERVAL 3 DAY): Là hàm trả về thời điểm hiện tại trừ đi 3 ngày.
    

    function searchModel($keySearch,$sapxep,$begin) {
        $sql = "SELECT * FROM products WHERE 1 AND product_name LIKE '%".$keySearch."%' ORDER BY $sapxep LIMIT $begin, 20";
        $result = pdo_query($sql);
        return $result;
    }


    // Tìm kiếm sản phẩm theo giá
    function search__khoanggia($min,$max,$sapxep,$begin) {
        $sql = "SELECT * FROM products WHERE price >= $min AND price <= $max ORDER BY $sapxep LIMIT $begin, 20";
        $result = pdo_query($sql);
        return $result;
    }
?>