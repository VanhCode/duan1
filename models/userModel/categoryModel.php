<?php
    // Select Danh mục
    function listCategory() {
        $sql = "SELECT * FROM categories WHERE 1 ORDER BY category_id ASC";
        $result = pdo_query($sql);
        return $result;
    }
    
    function listCategoryColum($limit,$index) {
        $sql = "SELECT * FROM categories WHERE 1 ORDER BY category_id ASC LIMIT $limit,$index";
        $result = pdo_query($sql);
        return $result;
    }

    function listCategory__limit($limit) {
        $sql = "SELECT * FROM categories WHERE 1 ORDER BY category_id ASC LIMIT $limit";
        $result = pdo_query($sql);
        return $result;
    }

?>