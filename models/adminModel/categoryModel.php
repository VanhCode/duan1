<?php
    // Select Danh sách danh mục
    function listDanhmuc() {
        $sql = "SELECT * FROM categories WHERE 1 ORDER BY category_id ASC";
        $result = pdo_query($sql);
        return $result;
    }


    // Thêm danh mục
    function addCategory($name) {
        $sql = "INSERT INTO categories (`category_name`) VALUES ('$name')";
        pdo_execute($sql);
    }



    // Edit danh mục
    function editCategory($id) {
        $sql = "SELECT * FROM categories WHERE category_id = '$id'";
        $result = pdo_query_one($sql);
        return $result;
    }


    // Delete danh mục
    function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE category_id = '$id'";
        pdo_execute($sql);
    }

    
    // Update danh mục
    function updateCategory($id,$name) {
        $sql = "UPDATE categories SET category_name = '".$name."' WHERE category_id = '".$id."'";
        pdo_execute($sql);
    }
?>