<?php
    require_once "../connect/connect.php";
    
    // Cộng số lượng sản phẩm
    if (isset($_GET['cong'])) {
        $id = $_GET['cong'];
        if ($id && $id > 0) {
            $querySelect = "SELECT amount FROM giohang WHERE id_spgiohang = '$id'";
            $stateSelect = $db->prepare($querySelect);
            $stateSelect->execute();
            $row_sanpham = $stateSelect->fetch(PDO::FETCH_ASSOC);

            $amount = $row_sanpham['amount'] + 1;
    
            $queryUpdate = "UPDATE giohang SET amount = '$amount' WHERE id_spgiohang = '$id'";
            $stateUpdate = $db->prepare($queryUpdate);
            $resultCong = $stateUpdate->execute();
    
            if ($resultCong) {
                header("Location: ../view/cart.php?id=$id");
                exit();
            }
        } else {
            header("location: ../view/404.php");
            exit();
        }
    }

    // Trừ số lượng sản phẩm
    if (isset($_GET['tru'])) {
        $id = $_GET['tru'];
        if ($id && $id > 0) {

            $querySelect = "SELECT amount FROM giohang WHERE id_spgiohang = '$id'";
            $stateSelect = $db->prepare($querySelect);
            $stateSelect->execute();
            $row_sanpham = $stateSelect->fetch(PDO::FETCH_ASSOC);
    
            if ($row_sanpham['amount'] > 1) {
                $amount = $row_sanpham['amount'] - 1;
            
                $queryUpdate = "UPDATE giohang SET amount = '$amount' WHERE id_spgiohang = '$id'";
                $stateUpdate = $db->prepare($queryUpdate);
                $resultTru = $stateUpdate->execute();
            
                if ($resultTru) {
                    header("Location: ../view/cart.php?id=$id");
                    exit();
                }
            } else {
                
                $queryUpdate = "UPDATE giohang SET amount = '1' WHERE id_spgiohang = '$id'";
                $stateUpdate = $db->prepare($queryUpdate);
                $resultUpdate = $stateUpdate->execute();
            
                if ($resultUpdate) {
                    header("Location: ../view/cart.php?id=$id");
                    exit();
                }
            }

        } else {
            header("location: ../view/404.php");
            exit();
        }
    }
?>