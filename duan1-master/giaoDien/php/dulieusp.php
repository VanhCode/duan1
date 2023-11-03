<?php
    require_once "./connect/connect.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        if($id && $id > 0) {
            $query = "SELECT * FROM sanphambanchay WHERE id_spBanChay = :id LIMIT 1";
            $state = $db->prepare($query);
            $data = [
                ':id' => $id
            ];
            $state->execute($data);
            $result = $state->fetch(PDO::FETCH_ASSOC);
            if($result) {
                $new_product = [
                    'id_spBanChay' => $id,
                    'image' => $result['image'],
                    'name' => $result['name'],
                    'price' => $result['price'],
                    'price_throw' => $result['price_throw'],
                    'amount_daban' => $result['amount_daban']
                ];
            }
        }
    }

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
?>