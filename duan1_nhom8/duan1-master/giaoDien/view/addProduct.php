<?php
    session_start();

    if(isset($_POST['addTocart'])) {

        if(!isset($_SESSION['vanhstore'])) {
            header('location: ../view/dangnhap.php');
            exit();
        } else {
            require_once "../connect/connect.php";
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
                            'id_spBanChay' => $result['id_spBanChay'],
                            'image' => $result['image'],
                            'name' => $result['name'],
                            'price' => $result['price'],
                            'price_throw' => $result['price_throw'],
                            'amount_daban' => $result['amount_daban']
                        ];
                        
                        // Kiểm tra xem giỏ hàng của tài khoản đã có hay chưa
                        if (!isset($_SESSION['cart'])) {
                            $_SESSION['cart'] = [];
                        } else {
                            $_SESSION['cart'][] = $new_product;
                        }
                        
                        
                    }
                }
            }

            $image = $name = $priceThrow = $price = $amount = $money = "";
            $errAmount = "";
            $message = "";
            
            $id = $result['id_spBanChay'];
            $image = $result['image'];
            $name = $result['name'];
            $priceThrow = $result['price_throw'];
            $price = $result['price'];
            $amount = $_POST['amount__flex'];

            $isCheck = true;

            $queryCheck = "SELECT * FROM giohang WHERE id_spgiohang = '$id'";
            $stateCheck = $db->prepare($queryCheck);
            $stateCheck->execute();


            if($isCheck) {
                if ($stateCheck->rowCount() > 0) {
                    $row_sanpham = $stateCheck->fetch(PDO::FETCH_ASSOC);
                    $amount = $row_sanpham['amount'] + $amount;
                    $queryUpdate = "UPDATE giohang SET amount = '$amount' WHERE id_spgiohang = '$id'";
                    $stateUpdate = $db->prepare($queryUpdate);
                    $stateUpdate->execute();
                } else {
                    // $amount = $amount;
                    $queryAdd = "INSERT INTO `giohang`(`id_spgiohang`, `image`, `name_sanpham`, `price_throw`, `price`, `amount`, `money`) VALUES ('$id','$image','$name','$priceThrow','$price','$amount','$price')";
                    $stateAdd = $db->prepare($queryAdd);
                    $stateAdd->execute();
                }
        
        
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $querySp = "SELECT * FROM sanphambanchay WHERE id_spBanChay = :id LIMIT 1";
                    $stateSp = $db->prepare($querySp);
                    $dataSp = [
                        ':id' => $id
                    ];
                    $stateSp->execute($dataSp);
                    $resultSp = $stateSp->fetch(PDO::FETCH_ASSOC);
                    if($resultSp) {
                        $message = "Thêm vào giỏ hàng thành công.";
                        header("Location: ../view/chitietsp.php?id={$resultSp['id_spBanChay']}&message=$message");
                        exit();
                    }
                }
            } else {
                header("location: ../view/404.php");
                exit();
            }
        }      
    }
?>