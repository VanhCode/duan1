<?php
    function listCategory() {
        $sql = "SELECT * FROM categories WHERE 1 ORDER BY category_id ASC";
        $result = pdo_query($sql);
        return $result;
    }
?>