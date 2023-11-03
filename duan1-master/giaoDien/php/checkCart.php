<?php
    if(!isset($_SESSION['vanhstore'])) {
        header('location: ../view/dangnhap.php');
        exit();
    } else {
        // Select 6 sản phẩm từ sản phẩm thứ 26 trong cơ sở dữ liệu
        $querySearchMax = "SELECT * FROM sanphambanchay LIMIT 6 OFFSET 26";
        $stateSearchMax = $db->prepare($querySearchMax);
        $stateSearchMax->execute();
        $resultSearchMax = $stateSearchMax->fetchAll(PDO::FETCH_ASSOC);

        // Đếm sản phẩm trong giỏ hàng để show ra
        $queryCountProducts = "SELECT COUNT(*) AS total_products FROM giohang";
        $stateCountProducts = $db->prepare($queryCountProducts);
        $stateCountProducts->execute();
        $rowCountProducts = $stateCountProducts->fetch(PDO::FETCH_ASSOC);
        $totalProducts = $rowCountProducts['total_products'];

        // Lấy dữ liệu trong datebase để show ra trang giỏ hàng
        $querySpSelect = "SELECT * FROM giohang";
        $stateSpSelect = $db->prepare($querySpSelect);
        $stateSpSelect->execute();
        $resultSpSelect = $stateSpSelect->fetchAll(PDO::FETCH_ASSOC);
    }
?>