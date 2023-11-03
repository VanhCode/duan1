<?php
    require_once "./connect/connect.php";

    $querySPBanChay = "SELECT * FROM sanphambanchay";
    $stateSPBanChay = $db->prepare($querySPBanChay);
    $stateSPBanChay->execute();
    $resultSPBanChay = $stateSPBanChay->fetchAll(PDO::FETCH_ASSOC);

?>