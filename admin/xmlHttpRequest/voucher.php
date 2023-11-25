<?php
include '../../models/PDO_admin.php';
$voucher_id=$_GET['voucher_id']??8;
$sql="SELECT CONCAT(
  GREATEST(TIMESTAMPDIFF(DAY, NOW(), `expiration_date`), 0), ',',
  GREATEST(TIMESTAMPDIFF(HOUR, NOW(), `expiration_date`) % 24, 0), ',',
  GREATEST(TIMESTAMPDIFF(MINUTE, NOW(), `expiration_date`) % 60, 0), ',',
  GREATEST(TIMESTAMPDIFF(SECOND, NOW(), `expiration_date`) % 60, 0)) 
    AS conlai
    FROM `voucher` WHERE voucher_id=$voucher_id;";
$thoiGianConLai=query($sql)->fetch();

echo $thoiGianConLai['conlai'];

