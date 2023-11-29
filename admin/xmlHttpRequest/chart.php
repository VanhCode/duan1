<?php
include "../../models/PDO_admin.php";

function statistical($from,$to,$type='DATE'){

    $sql="WITH RECURSIVE dates AS (
      SELECT DATE('$from') AS date
      UNION ALL
      SELECT DATE_ADD(date, INTERVAL 1 DAY)
      FROM dates
      WHERE DATE_ADD(date, INTERVAL 1 DAY) <= '$to'
    )
    ";
    $sql.="SELECT dates.date, COUNT(orders.order_id) AS num_orders, SUM(order_details.amount * order_details.price) AS revenue
    FROM dates
    LEFT JOIN orders ON $type(orders.create_at) = $type(dates.date)
    LEFT JOIN order_details ON order_details.order_id=orders.order_id
    GROUP BY $type(dates.date)";
    return query($sql)->fetchAll();
}
$data=statistical('2023-11-01','2023-12-31','MONTH');
foreach ($data as $key=>$value){
    if($value['num_orders']==null){
        $data[$key]['num_orders']=0;
    }
    if($value['revenue']==null){
        $data[$key]['revenue']=0;
    }
}
echo "<pre>";
print_r($data);
//echo json_encode($data);