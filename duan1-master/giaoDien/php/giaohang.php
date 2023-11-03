<?php
    require_once "../connect/connect.php";

    $queryGiaoHang = "SELECT * FROM giaohang";
    $stateGiaoHang = $db->prepare($queryGiaoHang);
    $stateGiaoHang->execute();
    $resultGiaoHang = $stateGiaoHang->fetchAll(PDO::FETCH_ASSOC);

?>