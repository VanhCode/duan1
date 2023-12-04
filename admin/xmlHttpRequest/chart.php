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
    $sql.="SELECT ".($type == 'MONTH' ? "DATE_FORMAT(dates.date, '%Y-%m')" : "$type(dates.date)")." AS date, COUNT(orders.order_id) AS num_orders, SUM((order_details.amount * order_details.price) - orders.voucher) AS revenue
    FROM dates
    LEFT JOIN orders ON DATE(orders.create_at) = DATE(dates.date)
    LEFT JOIN order_details ON order_details.order_id=orders.order_id
    GROUP BY $type(dates.date)";
    return query($sql)->fetchAll();
}
$data=statistical($_POST['from']??'2023-10-11',$_POST['to']??'2023-11-30',$_POST['type']??'DATE');
$date=[];
$numOrder=[];
$revenue=[];
foreach ($data as $key=>$value){
    if($value['num_orders']==null){
        $data[$key]['num_orders']=0;
    }
    if($value['revenue']==null){
        $data[$key]['revenue']=0;
    }
    $date[]=$value['date']??0;
    $numOrder[]=$value['num_orders']??0;
    $revenue[]=$value['revenue']??0;
}
$data=[];
$data['date']=$date;
$data['numOrder']=$numOrder;
$data['revenue']=$revenue;
echo json_encode($data);
