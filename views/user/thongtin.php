<div class="account-box container">
    <?php

        if (isset($_GET['url']) && isset($_GET['user']) && isset($_GET['profile'])) {
            $url = $_GET['url'];
            $userAction = $_GET['user'];
            $profile = $_GET['profile'];
        
            if ($url == "user" && $userAction == "tai-khoan-cua-toi" && $profile == "ho-so") {
                include "thongtin/profile.php";
            } else if ($url == "user" && $userAction == "tai-khoan-cua-toi" && $profile == "ngan-hang") {
                include "thongtin/atm.php";
            } else if ($url == "user" && $userAction == "tai-khoan-cua-toi" && $profile == "dia-chi") {
                include "thongtin/address.php";
            } else if ($url == "user" && $userAction == "tai-khoan-cua-toi" && $profile == "change-page") {
                include "thongtin/changepass.php";
            }
        } else {
            include "thongtin/profile.php";
        }

    ?>
</div>