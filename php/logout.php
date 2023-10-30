<?php
    session_start();

    if(isset($_SESSION['vanhstore'])) {
        unset($_SESSION['vanhstore']);
        header('location: ../index.php');
        exit();
    } else {
        header('location: ../view/dangnhap.php');
        exit();
    }
?>
