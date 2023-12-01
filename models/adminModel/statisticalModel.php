<?php
function product_volume()
{
    $sql="SELECT SUM(od.amount) AS sale_volume, p.product_name
    FROM `order_details` od
    JOIN products p
    ON od.product_id=p.product_id 
    GROUP BY p.product_id";
    return query($sql)->fetchAll();
}