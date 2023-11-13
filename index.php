<?php
    ob_start();
    session_start();
    include "./models/pdo.php";
    include "./models/userModel/accountModel.php";
    include "./models/userModel/categoryModel.php";
    include "./models/userModel/productModel.php";
    include "./models/userModel/searchModel.php";
    include "./models/userModel/cartModel.php";

    
    $userID = $_SESSION['user_id'] ?? 0;
    $user = select__userByid($userID);


    // Danh mục (category)
    $listCategory = listCategory();
    $listCategoryColum = listCategoryColum(6,10);
    $listcategoryLimit = listCategory__limit(5);

    
    // Sản phẩm (product)
    $listProduct = listProduct();
    $productSale = productSale();
    $listProsearchMax = listProSearchMax();



    if(isset($_GET['detail_product']) && ($_GET['detail_product'] > 0)) {
        $detail_product = $_GET['detail_product'];
        $chitiet_product = chitietSanpham($detail_product);
    } else {
        $detail_product = "";
        $chitiet_product = "";
    }



    // Cart (Cart)
    $countProduct_cart = countProductCart();
    if(isset($userID)) {
        $listCart = listCartHeader($userID);
    }



    if(isset($_GET['action']) && $_GET['action'] != "") {
        $action = $_GET['action'];


        if ($action == "login" || $action == "signup") {
            include "views/header-account/header-account.php";
        } else if ($action == "gio-hang") {
            include "views/header-cart/headerCart.php";
        } else if ($action == "thanh-toan") {
            include "views/header-thanhtoan/header-thanhtoan.php";
        } else {
            include "views/viewblock/header.php";
        }


        switch ($action) {
            case "home":
                include "views/home.php";
                break;
            case "san-pham":
                $listProduct_moiNhat = listProduct__moiNhat();
                include "views/sanpham.php";
                break;
            case "danh-muc":
                if(isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                    $categoryId = $_GET['category_id'];
                } else {
                    $categoryId = "";
                }
                
                $sapxep = "product_id ASC";

                if(isset($_GET['gia-thap-cao'])) {
                    $sapxep = "price ASC";
                }

                if(isset($_GET['gia-cao-thap'])) {
                    $sapxep = "price DESC";
                }

                $listProduct_byIdcategory = listProduct_byCategory($categoryId,$sapxep);
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


                            if($success) {
                                echo "<script>setTimeout(function() {window.location.href = 'index.php?action=login'}, 2000)</script>";
                            }

       
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
                logoutAccount();
                break;
            case "chi-tiet-sanpham":
                if(isset($_GET['detail_product']) && ($_GET['detail_product'] > 0)) {
                    $detail_product = $_GET['detail_product'];
                    $chitiet_product = chitietSanpham($detail_product);
                    $listVariationColor = listVariationColor($detail_product);
                    $listVariationSize = listVariationSize($detail_product);

                    $listSpCungloai = product_cungloai($chitiet_product['category_id'],$detail_product);

                    $sumAmout = countAmount($detail_product);
                } else {
                    $detail_product = "";
                    $chitiet_product = "";
                }
                
                include "views/chitietsp.php";
                break;
            case "search":
                $keyword = "";

                if(isset($_POST['searchProduct'])) {
                    $keyword = $_POST['keyword']??'';

                    // Hàm này để tăng số lần tên nào được tìm kiếm nhiều nhất
                    searchMax($keyword);
                } else {
                    $keyword = $_GET['keyword']??'';
                }

                $sapxep = "product_id ASC";

                if(isset($_GET['gia-thap-cao'])) {
                    $sapxep = "price ASC";
                }

                if(isset($_GET['gia-cao-thap'])) {
                    $sapxep = "price DESC";
                }


                $listProdSearch = searchModel($keyword,$sapxep);
                include "views/viewSearch.php";
                break;
            case "gio-hang":
                if(!isset($_SESSION['user_id'])) {
                    header('Location: index.php?action=login');
                    exit();
                } else {
                    if(isset($userID)) {
                        $listCart = listCart($userID);
                        include "views/giohang.php";
                    }
                }
                break;
            case "addTocart":
                if(isset($_POST['addTocart'])) {  
 
                    if ($user) {
                        $stateCheck = checkProCartBySizeColor($_POST['id_sanpham'],$_POST['size'],$_POST['color']);
    
                        if ($stateCheck) {
                            $amount = $stateCheck['amount'] + $_POST['amount__flex'];
                            updateCart($stateCheck['cart_id'], $amount);
                        } else {
                            add_cart($userID, $_POST['id_sanpham'], $_POST['amount__flex'], $_POST['size'], $_POST['color']);                   
                        }
    
                        $message = $_POST['id_sanpham'];
                        header("Location: index.php?action=chi-tiet-sanpham&detail_product={$_POST['id_sanpham']}&message=$message");
                        exit();
                    } else {
                        header('Location: index.php?action=login');
                        exit();
                    }
    
                }

                break;
            case "deleteCart";
                if(isset($_GET['cart_id']) && $_GET['cart_id'] > 0) {
                    $cart_id = $_GET['cart_id'];
                    delete_cart($cart_id);
                    header('Location: index.php?action=gio-hang');
                } else {
                    $cart_id = "";
                }
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