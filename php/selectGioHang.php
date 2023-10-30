<?php
    require "../connect/connect.php";

    $querySlGioHang = "SELECT * FROM sanphambanchay";
    $stateSlGioHang = $db->prepare($querySlGioHang);
    $stateSlGioHang->execute();
    $resultSlGioHang = $stateSlGioHang->fetch(PDO::FETCH_ASSOC);
?>