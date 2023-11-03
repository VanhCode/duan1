<?php
    session_start();
    if (!isset($_SESSION['vanhstore'])) {
        header('location: ../view/dangnhap.php');
        exit();
    } else {
        $querySet = "SELECT
        sanphambanchay.id_ship,
        giaohang.id_ship,
        giaohang.name_ship
        FROM
            webvanh.sanphambanchay
        INNER JOIN
            webvanh.giaohang ON sanphambanchay.id_ship = giaohang.id_ship;
        ";

        $stateSet = $db->prepare($querySet);
        $stateSet->execute();
        $resultSet = $stateSet->fetchAll(PDO::FETCH_ASSOC);

        // Lấy dữ liệu trong datebase để show ra trang giỏ hàng
        $querySpSelect = "SELECT * FROM giohang";
        $stateSpSelect = $db->prepare($querySpSelect);
        $stateSpSelect->execute();
        $resultSpSelect = $stateSpSelect->fetchAll(PDO::FETCH_ASSOC);

        $querySpSelectCart = "SELECT * FROM giohang LIMIT 5 OFFSET 0";
        $stateSpSelectCart = $db->prepare($querySpSelectCart);
        $stateSpSelectCart->execute();
        $resultSpSelectCart = $stateSpSelectCart->fetchAll(PDO::FETCH_ASSOC);

        // Đếm sản phẩm trong giỏ hàng để show ra
        $queryCountProducts = "SELECT COUNT(*) AS total_products FROM giohang";
        $stateCountProducts = $db->prepare($queryCountProducts);
        $stateCountProducts->execute();
        $rowCountProducts = $stateCountProducts->fetch(PDO::FETCH_ASSOC);

        $totalProducts = $rowCountProducts['total_products'];
    }
?>