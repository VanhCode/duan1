<?php
    include "./models/pdo.php";
    include "./models/userModel/accountModel.php";
    include "./php/ajaxdangky.php";

    if (isset($_GET['url'])) {
        $url = $_GET['url'];

        if ($url == "login" || $url == "signup") {
            include "views/header-account/header-account.php";
        } else if ($url == "gio-hang") {
            include "views/header-cart/headerCart.php";
        } else if ($url == "thanh-toan") {
            include "views/header-thanhtoan/header-thanhtoan.php";
        } else {
            include "views/viewblock/header.php";
        }


        switch ($url) {
            case "home":
                include "views/home.php";
                break;
            case "san-pham":
                include "views/sanpham.php";
                break;
            case "danh-muc":
                include "views/danhmuc.php";
                break;
            case "user":
                include "views/user/user.php";
                break;
            case "login":
                include "views/account/dangky.php";
                break;
            case "signup":
                include "views/account/dangnhap.php";
                break;
            case "chi-tiet-sanpham":
                include "views/chitietsp.php";
                break;
            case "gio-hang":
                include "views/giohang.php";
                break;
            case "thanh-toan":
                include "views/thanhtoan.php";
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