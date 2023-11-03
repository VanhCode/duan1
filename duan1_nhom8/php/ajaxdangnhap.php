<?php
    session_start();

    if(isset($_SESSION['vanhstore'])) {
        header("Location: ../index.php");
        exit();
    }

    require_once "../connect/connect.php";

    $isCheck = true;
    $phoneErr = $success = "";
    $phone = $password = "";

    if(isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        $phoneErr = "";
        
        if(empty($phone)) {
            $isCheck = false;
            $phoneErr = "Vui lòng điền vào mục này.";
        }

        if (!empty($phoneErr)) {
            $isCheck = false;
            echo $phoneErr;
        }
    }

    if(isset($_POST['password'])) {
        $password = $_POST['password'];
        $passwordErr = "";
        
        if(empty($password)) {
            $isCheck = false;
            $passwordErr = "Vui lòng điền vào mục này.";
        }

        if (!empty($passwordErr)) {
            $isCheck = false;
            echo $passwordErr;
        }
    }

    if(isset($_POST['submitClick'])) {
        $phone = $_POST['phone'];
        $password = $_POST['password'];


        if($isCheck) {
            $query = "SELECT * FROM login WHERE email_phone = :email_phone";
            $state = $db->prepare($query);
            $data = [
                ':email_phone' => $phone,
            ];
            
            $result = $state->execute($data);

            // var_dump($result);

            if($result) {
                $row = $state->fetch(PDO::FETCH_ASSOC);

                if($row) {
                    // Lấy mật khẩu đã mã hóa từ cơ sở dữ liệu bằng fetch()
                    $hashed_password = $row['password'];

                    // So sánh mật khẩu đăng nhập với mật khẩu đã mã hóa bằng password_verify

                    if (password_verify($password, $hashed_password)) {
                        // setcookie('vanhstore', $row['firstname'] . " " . $row['lastname'], time() + 3600);
                        $_SESSION['vanhstore'] = $row['firstname'] . " " . $row['lastname'];
                        header('location: ../index.php');
                        exit();
                    } else {
                        $success = '
                            <div style="display:flex;" class="group_content__succesS">
                                <div class="group_content__Animation__success__icon">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                </div>
                                <div class="group_content__Animation__success">
                                    Tên tài khoản của bạn hoặc Mật khẩu không đúng, vui lòng thử lại
                                </div>
                            </div>
                        ';
                    }
                } else {
                    $success = '
                        <div style="display:flex;" class="group_content__succesS">
                            <div class="group_content__Animation__success__icon2">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </div>
                            <div class="group_content__Animation__success">
                                Tài khoản không tồn tại
                            </div>
                        </div>
                    ';
                }
            } else {
                echo '<script>alert("Lỗi truy vấn cơ sở dữ liệu.");</script>';
            }
        }
    }
    
?>