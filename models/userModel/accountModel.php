<?php
    // Select tài khoản
    function select__userByid($id) {
        $sql = "SELECT * FROM users WHERE user_id = '$id'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function selectAllAccount($email) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        pdo_execute($sql);

    }

    function selectCheck($email) {
        $sql = "SELECT * FROM users WHERE email = '$email' OR phone = '$email'";
        $result = pdo_query_one($sql);
        return $result;
    }

    // Insert tài khoản 
    function addAccount($firstname,$lastname,$email,$password,$phone,$date,$gender) {
        $sql = "INSERT INTO users (`firth_name`, `last_name`, `email`,`password`, `phone`, `date`, `gender`)
                VALUES ('$firstname','$lastname','$email','$password','$phone','$date','$gender')
        ";
        pdo_execute($sql);
    }


    // Đăng xuất tài khoản
    function logoutAccount() {
        if(isset($_SESSION["user_id"])) {
            unset($_SESSION["user_id"]);
            header('Location: index.php');
        }
    }


    // Đổi mật khẩu
    function changePassword($user_id) {
        $sql = "SELECT password FROM users WHERE user_id = $user_id";
        return pdo_query_one($sql);
    }

    
    // Cập nhật mật khẩu
    function updatePassword($password) {
        $sql = "UPDATE users SET password = '".$password."'";
        pdo_execute($sql);
    }

    function updateAccount($user_id,$firth_name,$last_name,$email,$phone,$date,$gender) {
        $sql = "UPDATE users SET firth_name = '".$firth_name."', last_name = '".$last_name."', email = '".$email."', phone = '".$phone."', date = '".$date."', gender = '".$gender."' 
                WHERE user_id = '".$user_id."'";
        pdo_execute($sql);
    }
?>

