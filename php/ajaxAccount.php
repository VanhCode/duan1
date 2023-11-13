<?php
    ob_start();
    session_start();
    include "../models/pdo.php";
    include "../models/userModel/accountModel.php";

    $userID = $_SESSION['user_id'] ?? 0;

    $checkChangePass = true;
    $errOldPassword = $errNewPass = $errNewPassLai = "";
    
    if(isset($_POST['oldPassword'])) {
        $oldPassword = isset($_POST['oldPassword']) ? $_POST['oldPassword'] : "";
        
        $storedPassword = changePassword($userID);
    
        if (is_array($storedPassword)) {
            $storedPassword = $storedPassword['password'];
        }
    
        if(empty($oldPassword)) {
            echo "Vui lòng nhập trường này";
        } else {
            if (!password_verify($oldPassword, $storedPassword)) {
                echo "Mật khẩu cũ không khớp";
            }
        }
    }
    

    // if(isset($_POST['newPassword'])) {
        
    //     $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : "";

    //     if(empty($newPassword)) {
    //         $checkChangePass = false;
    //         $errNewPass = "Vui lòng nhập trường này";
    //         echo $errNewPass;
    //     } 

    // }


    // if(isset($_POST['changePass'])) {
    //     $oldPassword = $_POST['oldPassword'];
    //     $newPassword = $_POST['newPassword'];
    //     $newPasswordClick = $_POST['newPasswordClick'];

    //     $storedPassword = changePassword($userID);

    //     if (is_array($storedPassword)) {
    //         $storedPassword = $storedPassword['password'];
    //     }

    //     if(empty($oldPassword)) {
    //         $checkChangePass = false;
    //         $errOldPassword = "Vui lòng nhập trường này";
    //     } else if (!password_verify($oldPassword, $storedPassword)) {
    //         $checkChangePass = false;
    //         $errOldPassword = "Mật khẩu cũ không khớp";
    //     } else {
    //         $errOldPassword = "";
    //     }

    //     if(empty($newPassword)) {
    //         $checkChangePass = false;
    //         $errNewPass = "Vui lòng nhập trường này";
    //     } else {
    //         $errNewPass = "";
    //     }

    //     if(empty($newPasswordClick)) {
    //         $checkChangePass = false;
    //         $errNewPassLai = "Vui lòng nhập trường này";
    //     } else {
    //         $errNewPassLai = "";
    //     }
    // }
?>