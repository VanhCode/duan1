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
                    $newPassword = $_POST['newPassword'];
                    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    updatePassword($newPasswordHash);
                    $success_change = '
                        <div style="display:flex;" class="group_content__succesS">
                            <div class="group_content__Animation__success__icon">
                                <i class="fa-regular fa-circle-check check__squa"></i>
                            </div>
                            <div class="group_content__Animation__success">
                                Đổi mật khẩu thành công
                            </div>
                        </div>
                    ';
                }
                include "thongtin/changepass.php";
            }
        } else {
            include "thongtin/profile.php";
        }

    ?>
</div>