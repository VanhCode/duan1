<?php
    // Select sản phẩm
    function listProduct() {
        $sql = "SELECT * FROM products WHERE 1 ORDER BY product_id ASC";
        return pdo_query($sql);
    }

    
    // Select sản phẩm mới đăng theo ngày
    function CountlistProduct__moiNhat() {
        $sql = "SELECT * FROM products WHERE 1 ORDER BY product_id DESC";
        return pdo_query($sql);
    }

    function listProduct__moiNhat($price,$page) {
        $sql = "SELECT * FROM products WHERE 1 ORDER BY $price LIMIT $page, 20";
        return pdo_query($sql);
    }


    // Sản phẩm sale
    function productSale() {
        $sql = "SELECT * FROM products WHERE sale > 0 AND create_at ORDER BY product_id DESC LIMIT 16";
        return pdo_query($sql);
    }


    // Select sản phẩm cùng danh mục mà khác id (Sản phẩm cùng loại)
    function product_cungloai($category_id,$product_id) {
        $sql = "SELECT * FROM products WHERE category_id = '$category_id' AND product_id <> '$product_id'";
        return pdo_query($sql);
    }

    

    // Select sản phẩm được tìm kiếm nhiều nhất
    function listProSearchMax() {
        $sql = "SELECT * FROM products WHERE search_count > 5 ORDER BY search_count ASC";
        return pdo_query($sql);
    }


    // Select sản phẩm theo danh mục
    function listProduct_byCategory($category_id,$orderBy,$begin) {
        $sql = "SELECT * FROM products WHERE category_id = '$category_id' ORDER BY $orderBy LIMIT $begin, 20";
        return pdo_query($sql);
    }

    
    
    // Chi tiết sản phẩm
    function chitietSanpham($id) {
        $sql = "SELECT * FROM products WHERE product_id = $id";
        return pdo_query_one($sql);
    }


    // Lấy tổng số lượng theo của size sản phẩm
    function countAmount($id_product) {
        $sql = "SELECT 
                    SUM(amount) as amount
                FROM 
                    variants 
                WHERE product_id = '$id_product' GROUP BY product_id";
        return pdo_query_one($sql);
    }


    // Group lấy màu sắc 
    function listVariationColor($id_product) {
        $sql = "SELECT 
                    variant_id,
                    product_id,
                    color,
                    GROUP_CONCAT(size) AS size,
                    GROUP_CONCAT(amount) AS amount
                FROM 
                    variants
                WHERE 
                    product_id = '$id_product' GROUP BY color";
        return pdo_query($sql);
    }    


    // Group lấy size 
    function listVariationSize($id_product) {
        $sql = "SELECT 
                    variant_id,
                    product_id,
                    GROUP_CONCAT(size) AS size,
                    GROUP_CONCAT(amount) AS amount
                FROM 
                    variants
                WHERE 
                    product_id = '$id_product' GROUP BY product_id";
        return pdo_query_one($sql);
    }


    // Update search_count mỗi khi tìm kiếm tên 
    function searchMax($keyword) {
        $sql = "UPDATE products SET search_count = search_count + 1 WHERE product_name LIKE '%".$keyword."%'";
        pdo_execute($sql);
    }
?>