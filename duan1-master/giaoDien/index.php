<?php
    if (isset($_GET['url'])) {
        $url = $_GET['url'];

        if ($url == "dangky" || $url == "dangnhap") {
            include "views/header-account/header-account.php";
        } else {
            include "views/viewblock/header.php";
        }

        switch ($url) {
            case "home":
                include "views/home.php";
                break;
            case "dangky":
                include "views/account/dangky.php";
                break;
            case "dangnhap":
                include "views/account/dangnhap.php";
                break;
            case "chi-tiet-sanpham":
                include "views/chitietsp.php";
                break;
            default:
                include "views/404.php";
        }

        include "views/viewblock/footer.php";
    } else {
        include "views/viewblock/header.php";
        include "views/home.php";
        include "views/viewblock/footer.php";
    }
?>