<?php
    include "../models/pdo.php";
    include "../models/userModel/accountModel.php";

    $isCheck = true;
    $phoneErr = $success = "";
    if(isset($_POST['firstname'])) {
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
        $firstnameErr = "";

        if (empty($firstname)) {
            $isCheck = false;
            $firstnameErr = "Vui lòng điền vào mục này";
        }
    
        if (!empty($firstnameErr)) {
            echo $firstnameErr;
        }
    }

    if(isset($_POST['lastname'])) {
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
        $lastnameErr = "";

        if (empty($lastname)) {
            $isCheck = false;
            $lastnameErr = "Vui lòng điền vào mục này";
        }
    
        if (!empty($lastnameErr)) {
            echo $lastnameErr;
        }
    }

    if(isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        $phoneErr = "";
        
        if(empty($phone)) {
            $isCheck = false;
            $phoneErr = "Vui lòng điền vào mục này";
        } else {
            if (preg_match('/^(03|08|09|06)\d{8}$/', $phone)) {
                
            } else if (preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $phone)) {
                
            } else {
                $isCheck = false;
                $phoneErr = "Số điện thoại hoặc email không hợp lệ";
            }
        }

        if (selectCheck($phone)) {
            $isCheck = false;
            $phoneErr = "Số điện thoại hoặc email này đã tồn tại";
        }

        if (!empty($phoneErr)) {
            $isCheck = false;
            echo $phoneErr;
        }
    }

    if(isset($_POST['password'])) {
        $password = isset($_POST['password']) ? $_POST['password'] : "";
        $passwordErr = "";

        if(empty($password)) {
            $isCheck = false;
            $passwordErr = "Vui lòng điền vào mục này.";
        } else {
            if (strlen($password) < 6) {
                $isCheck = false;
                $passwordErr = "Mật khẩu mới phải lớn hơn 6 kí tự";
            }
        }
    
        if (!empty($passwordErr)) {
            $isCheck = false;
            echo $passwordErr;
        }
    }

    if(isset($_POST['date'])) {
        $date = isset($_POST['date']) ? $_POST['date'] : "";
        $dateErr = "";

        if (empty($date)) {
            $isCheck = false;
            $dateErr = "Vui lòng nhập ngày sinh";
        }
    
        if (!empty($dateErr)) {
            $isCheck = false;
            echo $dateErr;
        }
    }

    // if(isset($_POST['submitClick'])) {
    //     if($isCheck) {
    //         $firstname = $_POST['firstname'];
    //         $lastname = $_POST['lastname'];
    //         $phone = $_POST['phone'];
    //         $password = $_POST['password'];
    //         $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //         $date = $_POST['date'];
    //         $gender = $_POST['gender'];

    //         $resultInsert = addAccount($firstname,$lastname,$phone,$password,$phone,$date,$gender);

    //         if(!$resultInsert) {
    //             $success = '
    //                 <div style="display:flex;" class="group_content__succesS">
    //                     <div class="group_content__Animation__success__icon">
    //                         <i class="fa-regular fa-circle-check check__squa"></i>
    //                     </div>
    //                     <div class="group_content__Animation__success">
    //                         Đăng ký thành công
    //                     </div>
    //                 </div>
    //             ';
    //         } else {
    //             echo '<script>alert("Lỗi truy vấn cơ sở dữ liệu.");</script>';
    //         } 
    //     } else {
    //         echo '<script>alert("Lỗi.");</script>';
    //     }
    // }   
?>