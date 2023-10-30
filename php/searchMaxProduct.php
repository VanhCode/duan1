<?php
    require_once './connect/connect.php';
    $querySearchMax = "SELECT * FROM sanphambanchay LIMIT 6 OFFSET 26";
    $stateSearchMax = $db->prepare($querySearchMax);
    $stateSearchMax->execute();
    $resultSearchMax = $stateSearchMax->fetchAll(PDO::FETCH_ASSOC);
?>