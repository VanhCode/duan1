<?php
    include "../models/pdo.php";
    include "../models/userModel/accountModel.php";
    
    $isCheck = true;
    if (isset($_POST['phone'])) {
        $phoneOrEmail = $_POST['phone'];
        $phoneOrEmailErr = "";


        if (preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $phoneOrEmailErr)) {
            $isCheck = false;
            $phoneOrEmailErr = "Email không đúng định dạng";
        }

        if (!check_email_quenmk($phoneOrEmail)) {
            $isCheck = false;
            $phoneOrEmailErr = "Email không hợp lệ";
        }

        if (!empty($phoneOrEmailErr)) {
            $isCheck = false;
            echo $phoneOrEmailErr;
        }
    }

    if(isset($_POST['guimail'])) {
        
    }
?>