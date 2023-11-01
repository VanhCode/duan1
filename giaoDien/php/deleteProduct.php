<?php
    require_once "../connect/connect.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        if($id && $id > 0) {
            $query = "SELECT * FROM giohang WHERE id_spgiohang = :id LIMIT 1";
            $state = $db->prepare($query);
            $data = [
                ':id' => $id
            ];
            $state->execute($data);
            $result = $state->fetch(PDO::FETCH_ASSOC);
            if($result) {
                $queryDel = "DELETE FROM `giohang` WHERE id_spgiohang = :id LIMIT 1";
                $stateDel = $db->prepare($queryDel);
                $resultDel = $stateDel->execute([':id' => $id]);
                if($resultDel) {
                    header('location: ../view/cart.php');
                } else {
                    echo "<script>alert('Lỗi khi xóa.')</script>";
                }
            } else {
                echo "<script>alert('Không tìm thấy id cần xóa.')</script>";
            }
        }
    }
?>