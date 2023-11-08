<?php
    session_start();
    include "./models/pdo.php";
    include "./models/userModel/accountModel.php";
    include "./models/userModel/categoryModel.php";
    include "./models/userModel/productModel.php";
    include "./models/userModel/searchModel.php";

    
    $userID = $_SESSION['user_id'] ?? 0;
    $user = select__userByid($userID);

    $listCategory = listCategory();
    $listcategoryLimit = listCategory__limit(5);

    $productSale = productSale();
    $listProsearchMax = listProSearchMax();

    if(isset($_GET['action']) && $_GET['action'] != "") {
        $action = $_GET['action'];


        if ($action == "login" || $action == "signup") {
            include "views/header-account/header-account.php";
        } else if ($action == "gio-hang") {
            include "views/header-cart/headerCart.php";
        } else if ($action == "thanh-toan") {
            include "views/header-thanhtoan/header-thanhtoan.php";
        } else if ($action == "logout") {
            logoutAccount();
        } else {
            include "views/viewblock/header.php";
        }


        switch ($action) {
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
                $profile = $_GET['profile'] ?? "";
                $userAction = $_GET['user'] ?? "";
                $order = $_GET['order'] ?? "";
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
                                    $_SESSION['user_id'] = $row['user_id'];
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
            case "chi-tiet-sanpham":
                if(isset($_GET['detail_product']) && ($_GET['detail_product'] > 0)) {
                    $detail_product = $_GET['detail_product'];
                    $chitiet_product = chitietSanpham($detail_product);
                    $listVariationColor = listVariationColor($detail_product);
                    $listVariationSize = listVariationSize($detail_product);
                    $sumAmout = countAmount($detail_product);
                } else {
                    $detail_product = "";
                    $chitiet_product = "";
                }
                
                include "views/chitietsp.php";
                break;
            case "search":
                if(isset($_POST['searchProduct'])) {
                    $keyword = $_POST['keyword'];

                    // Hàm này để tăng số lần tên nào được tìm kiếm nhiều nhất
                    searchMax($keyword);
                } else {
                    $keyword = "";
                }
                $listProdSearch = searchModel($keyword);
                include "views/viewSearch.php";
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