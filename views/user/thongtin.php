<div class="account-box container">
    <?php

        if (isset($_GET['action']) && isset($_GET['user']) && isset($_GET['profile'])) {
            $action = $_GET['action'];
            $user = $_GET['user'];
            $profile = $_GET['profile'];
        
            if ($action == "user" && $user == "tai-khoan-cua-toi" && $profile == "ho-so") {
                include "thongtin/profile.php";
            } else if ($action == "user" && $user == "tai-khoan-cua-toi" && $profile == "ngan-hang") {
                include "thongtin/atm.php";
            } else if ($action == "user" && $user == "tai-khoan-cua-toi" && $profile == "dia-chi") {
                include "thongtin/address.php";
            } else if ($action == "user" && $user == "tai-khoan-cua-toi" && $profile == "change-page") {
                if(isset($_POST['changePass'])) {
                    // updatePassword($password);
                }
                include "thongtin/changepass.php";
            }
        } else {
            include "thongtin/profile.php";
        }

    ?>
</div>