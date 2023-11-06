<?php
    session_start();
    include "./models/pdo.php";
    include "./models/userModel/accountModel.php";

    
    if(isset($_GET['url']) && $_GET['url'] != "") {
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
                    $isCheck = true;
                    $phoneErr = $success = "";
                    $phone = $password = "";

                    if (isset($_POST['submitClick'])) {
                        $phone = $_POST['phone'];
                        $password = $_POST['password'];
                    
                        if ($isCheck) {

                            $result = selectAllAccount($phone);
                            
                            if (!$result) {
                                
                                $row = selectCheck($phone);

                                if($row) {
                                    $hashed_password = $row['password'];
                
                                    if (password_verify($password, $hashed_password)) {
                                        $_SESSION['vanhstore'] = $row['firth_name'] . " " . $row['last_name'];
                                        header('location: index.php');
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
                    include "views/account/dangnhap.php";
                    break;
                case "signup":
                    $isCheck = true;
                    $phoneErr = $success = "";
                    if(isset($_POST['submitClick'])) {
                        if($isCheck) {
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $phone = $_POST['phone'];
                            $password = $_POST['password'];
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            $date = $_POST['date'];
                            $gender = $_POST['gender'];
                
                            $resultInsert = addAccount($firstname,$lastname,$phone,$hashed_password,$phone,$date,$gender);
                
                            if(!$resultInsert) {
                                $success = '
                                    <div style="display:flex;" class="group_content__succesS">
                                        <div class="group_content__Animation__success__icon">
                                            <i class="fa-regular fa-circle-check check__squa"></i>
                                        </div>
                                        <div class="group_content__Animation__success">
                                            Đăng ký thành công
                                        </div>
                                    </div>
                                ';
                            } else {
                                echo '<script>alert("Lỗi truy vấn cơ sở dữ liệu.");</script>';
                            } 
                        } else {
                            echo '<script>alert("Lỗi.");</script>';
                        }
                    }  
                    include "views/account/dangky.php";
                    break;
                case "logout":
                    if(isset($_SESSION['vanhstore'])) {
                        unset($_SESSION['vanhstore']);
                    }
                    header('location:index.php');
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