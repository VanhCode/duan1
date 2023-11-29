<?php
include '../../models/PDO_admin.php';
$voucher_id=$_GET['voucher_id']??8;
$sql="SELECT CONCAT(
  GREATEST(TIMESTAMPDIFF(DAY, NOW(), `end_date`), 0), ',',
  GREATEST(TIMESTAMPDIFF(HOUR, NOW(), `end_date`) % 24, 0), ',',
  GREATEST(TIMESTAMPDIFF(MINUTE, NOW(), `end_date`) % 60, 0), ',',
  GREATEST(TIMESTAMPDIFF(SECOND, NOW(), `end_date`) % 60, 0)) 
    AS conlai,start_date
    FROM `voucher` WHERE voucher_id=$voucher_id;";
$thoiGianConLai=query($sql)->fetch();
if(time()<strtotime($thoiGianConLai['start_date'])){
    echo 'Chưa bắt đầu';
}else{
    echo $thoiGianConLai['conlai'];
}


