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

    function sendMail($email) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        return pdo_query_one($sql,$email);
    }

    function check_email_quenmk($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        return pdo_query_one($sql, $email);
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

    function updateAccount($user_id,$firth_name,$last_name,$email,$image,$phone,$date,$gender) {
        $sql = "UPDATE users SET firth_name = '".$firth_name."', last_name = '".$last_name."', email = '".$email."', user_image = '".$image."', phone = '".$phone."', date = '".$date."', gender = '".$gender."' 
                WHERE user_id = '".$user_id."'";
        pdo_execute($sql);
    }

    function checkemailPass($email,$fullname,$pass) {
        include "./PHPMailer/src/PHPMailer.php";
        include "./PHPMailer/src/Exception.php";
        include "./PHPMailer/src/SMTP.php";
    

        $mail = new PHPMailer\PHPMailer\PHPMailer(true); 
        $mail->CharSet = 'UTF-8';
        // print_r($mail);

        try {
            //Server settings
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'tranvanh2k4@gmail.com';                 // SMTP username
            $mail->Password = 'wydpxhjaafutpjnh';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
         
            //Recipients
            $mail->setFrom('tranvanh2k4@gmail.com', 'VanhStore');

            $mail->addAddress($email,$fullname);     // Add a recipient            
            // Name is optional

            // $mail->addReplyTo('info@example.com', 'Information');

            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
         
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
         
            //Content
            // Embedding Image
            $mail->addEmbeddedImage('./img1/vanhcart.jpg', 'vanhcart', 'vanhcart.jpg');
            $email = 'email@example.com';
            // Tạo link đặt lại mật khẩu
            $resetLink = 'https://shopee.vn/forgot_password/?token=' . urlencode($resetToken) . '&email=' . urlencode($email);

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Thiết lập lại mật khẩu đăng nhập VanhStore';

            $mail->Body    = '
                <div style="max-width: 610px; margin: 0 auto; font-family: "Roboto", sans-serif; display: flex;">
                    <div style="width: 100%;">
                        <div style="text-align: center;">
                            <img style="width: 200px; margin: 0 auto;" src="cid:vanhcart" alt="">
                        </div>
                        <div style="max-width: 610px; margin: 0 auto;">
                            <p>Xin chào '.$fullname.',</p>
                            <p>Chúng tôi nhận được yêu cầu thiết lập lại mật khẩu cho tài khoản VanhStore của bạn.</p>                
                            <p>Nhấn <a href="' . $resetLink . '" style="color: #ee4d2d;">tại đây</a> để thiết lập mật khẩu mới cho tài khoản của bạn.</p>
                            <p>Hoặc vui lòng copy và dán đường dẫn bên dưới lên trình duyệt:</p>
                            <p>['.$resetLink.']</p>   
                            <p>Nếu bạn không yêu cầu thiết lập lại mật khẩu, vui lòng liên hệ Bộ phận Chăm sóc Khách hàng tại đây</p>  
                            <p>Trân trọng,</p>
                            <p>Đội ngũ VanhStore</p>
                            <p>Bạn có thắc mắc? Liên hệ chúng tôi <a style="color: #ee4d2d;" href="">tại đây</a></p>
                            <p>Mật khẩu của bạn là: '.$pass.'</p>
                        </div>
                    </div>
                </div>
            ';

            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
         
            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    function decodePassword($hashedPassword) {
        // Thực hiện giải mã mật khẩu ở đây
        $decodedPassword = password_hash($hashedPassword, PASSWORD_DEFAULT);
        return $decodedPassword;
    }
?>

