<?php
    // Select Danh sách danh mục
    function listDanhmuc() {
        $sql = "SELECT * FROM categories WHERE 1 ORDER BY category_id ASC";
        $result = pdo_query($sql);
        return $result;
    }

    // function selectImage__byId($img) {
    //     $sql = "SELECT * FROM categories WHERE cate = '$imgid'";
    //     $result = pdo_query_one($sql);
    //     return $result;
    // }


    // Thêm danh mục
    function addCategory($name,$image) {
        $sql = "INSERT INTO categories (`category_name`,`image_cate`) VALUES ('$name','$image')";
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
    function updateCategory($id,$name,$image) {
        $sql = "UPDATE categories SET category_name = '".$name."',image_cate = '".$image."' WHERE category_id = '".$id."'";
        pdo_execute($sql);
    }
?>