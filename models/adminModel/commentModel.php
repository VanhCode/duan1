<?php
function listComment_statistical(){
    $sql="SELECT products.product_id,products.images,products.product_name,COUNT(content) AS count_comment
    FROM products
    JOIN comments
    ON comments.product_id=products.product_id
    GROUP BY products.product_id";
    return query($sql)->fetchAll();
}
function listCommentByProduct_id($id_product){
    $sql="SELECT users.user_id, users.user_image, CONCAT(users.last_name ,' ',users.firth_name) AS fullName,
    comments.comment_id,comments.product_id,comments.content,comments.create_at
    FROM comments
    JOIN users
    ON users.user_id=comments.user_id
    WHERE comments.product_id=".$id_product;
    return query($sql)->fetchAll();
}