<?php
    try {
        $db = new PDO("mysql:host=localhost; dbname=webvanh; charset=utf8", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Lỗi kết nối dữ liệu: " . $e->getMessage();
    }
?>