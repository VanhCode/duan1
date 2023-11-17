<?php
    function insert__comment($userId,$productId,$content) {
        $sql = "INSERT INTO `comments`(`user_id`, `product_id`, `content`) 
                VALUES 
                ('$userId','$productId','$content')";
        pdo_execute($sql);
    }

    function loadall__comment__Byid($idproduct) {
        $sql = "SELECT
                    comments.comment_id,
                    comments.user_id,
                    comments.product_id,
                    comments.content,
                    comments.create_at,
                    users.user_id,
                    users.firth_name,
                    users.last_name
                FROM
                    comments
                INNER JOIN
                    users ON comments.user_id = users.user_id
                INNER JOIN
                    products ON comments.product_id = products.product_id
                WHERE
                    products.product_id = $idproduct
        ";
        return pdo_query($sql);
    }
?>