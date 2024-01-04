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
        $sql = "SELECT * FROM products WHERE sale BETWEEN $min AND  $max ORDER BY product_id DESC";
        $result = pdo_query($sql);
        return $result;
    }
    function search__khoanggia($min,$max,$sapxep,$begin) {
        $sql = "SELECT * FROM products WHERE sale BETWEEN $min AND  $max ORDER BY $sapxep LIMIT $begin, 20";
        $result = pdo_query($sql);
        return $result;
    }

    // Sản phẩm theo keyword phổ biến, mới nhất, bán chạy
    function list_product_byKeyword($keyword,$sapxep,$begin) {
        $sql = "SELECT
                    order_details.order_detail_id,
                    order_details.product_id,
                    order_details.amount,
                    products.product_id,
                    products.product_name,
                    products.price,
                    products.sale,
                    products.images
                FROM 
                    order_details
                JOIN
                    products ON order_details.product_id = products.product_id
                WHERE 
                    products.product_name LIKE '%'.$keyword.'%'
                AND
                    order_details.amount >= 2 
                ORDER BY 
                    $sapxep LIMIT $begin, 20";
        return pdo_query($sql);
    }  
?>