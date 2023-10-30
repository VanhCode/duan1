<?php
    require "./connect/connect.php";

    $queryFlash = "SELECT * FROM sanphambanchay LIMIT 16";
    $stateFlash = $db->prepare($queryFlash);
    $stateFlash->execute();
    $resultFlash = $stateFlash->fetchAll(PDO::FETCH_ASSOC);
?>