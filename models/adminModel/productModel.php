<?php
    // Thêm sản phẩm
    function addProduct($name, $price, $sale, $image, $danhmuc) {
        $sql = "INSERT INTO products (product_name, price, sale, images, category_id) 
                VALUES ('$name','$price','$sale','$image','$danhmuc')";
        return pdo_execute_returnLastInsertId($sql);
    }


    // Select sản phẩm
    function listProduct() {
        $sql = "SELECT 
                    products.product_id,
                    products.product_name,
                    products.price,
                    products.sale,
                    products.images,
                    products.category_id,
                    categories.category_id,
                    categories.category_name 
                FROM 
                    products
                INNER JOIN
                    categories ON products.category_id = categories.category_id WHERE 1 ORDER BY products.product_id ASC;
                ";
        $result = pdo_query($sql);
        return $result;
    }

    function selectIdproduct($id) {
        $sql = "SELECT
                    products.product_id,
                    products.product_name,
                    products.price,
                    products.sale,
                    products.images,
                    products.category_id,
                    variants.product_id,
                    variants.variant_id,
                    variants.color,
                    variants.size,
                    variants.amount
                FROM 
                    products
                LEFT JOIN 
                    variants ON products.product_id = variants.product_id
                WHERE 
                    products.product_id = '$id';";
                    
        $result = pdo_query_one($sql);
        return $result;
    }

    function getVariationsByProductId($id) {
        $sql = "SELECT
                    variant_id,
                    color,
                    size,
                    amount
                FROM 
                    variants
                WHERE 
                    product_id = $id";
    
        return pdo_query($sql);
    }


    // Update sản phẩm
    function updateProduct($id,$name,$price,$sale,$image,$category) {
        if($image != "") {
            $sql = "UPDATE products SET product_name='".$name."',price='".$price."',sale='".$sale."',images='".$image."',category_id='".$category."'
                WHERE product_id = '$id'";
        } else {
            $sql = "UPDATE products SET product_name='".$name."',price='".$price."',sale='".$sale."',category_id='".$category."'
                WHERE product_id = '$id'";
        }
        return pdo_execute_returnLastInsertId($sql);
    }


    // Delete Sản Phẩm
    function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE product_id = '$id'";
        pdo_execute($sql);
    }

?>