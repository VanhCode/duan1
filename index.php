<?php
    ob_start();
    session_start();

    include "./models/pdo.php";
    include "./models/config_vnpay.php";
    include "./models/userModel/accountModel.php";
    include "./models/userModel/categoryModel.php";
    include "./models/userModel/productModel.php";
    include "./models/userModel/searchModel.php";
    include "./models/userModel/cartModel.php";
    include "./models/userModel/commentModel.php";
    include "./models/userModel/orderModel.php";
    include "./models/userModel/voucherModel.php";
    include "./models/lib/randomDonhang.php";

    
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
    $sanpham_moinhat = select_product_moinhat();


    if(isset($_GET['detail_product']) && ($_GET['detail_product'] > 0)) {
        $detail_product = $_GET['detail_product'];
        $chitiet_product = chitietSanpham($detail_product);
    } else {
        $detail_product = "";
        $chitiet_product = "";
    }



    // Cart (Cart)
    $countProduct_cart = countProductCart($userID);
    if(isset($userID)) {
        $listCart = listCartHeader($userID);
    }



    if(isset($_GET['action']) && $_GET['action'] != "") {
        $action = $_GET['action'];


        if ($action == "login" || $action == "signup" || $action == "reset_pass" || $action == "success_reset") {
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
                if(isset($_GET['page']) && ($_GET['page'] > 0)) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                if($page == "" || $page == 1) {
                    $begin = 0;
                } else {
                    $begin = ($page - 1) * 20;
                }

                $price = "product_id DESC";

                if(isset($_GET['gia-thap-cao'])) {
                    $price = "price ASC";
                }
                if(isset($_GET['gia-cao-thap'])) {
                    $price = "price DESC";
                }

                $countPage = CountlistProduct__moiNhat();
                $listProduct_moiNhat = listProduct__moiNhat($price,$begin);

                $count = count($countPage);
                $countTrang = ceil($count / 20);                             
                

                // Lọc theo khoảng giá
                $min_price = isset($_GET['min_price']) ? $_GET['min_price'] : "";
                $max_price = isset($_GET['max_price']) ? $_GET['max_price'] : "";

                if(isset($_GET['min_price']) && isset($_GET['max_price'])) {
                    if(isset($_GET['page_gia']) && ($_GET['page_gia'] > 0)) {
                        $page_gia = $_GET['page_gia'];
                    } else {
                        $page_gia = 1;
                    }
    
                    if($page_gia == "" || $page_gia == 1) {
                        $begin = 0;
                    } else {
                        $begin = ($page_gia - 1) * 20;
                    }

                    $itemsPerPage = 20; 
                    $count_listprd_search = count_search__khoanggia($min_price,$max_price);
                    $listProduct_khoanggia = search__khoanggia($min_price, $max_price, $price, $begin, $itemsPerPage);
                    $count_minMax = count($count_listprd_search);
                    $count_price_min_max = ceil($count_minMax / $itemsPerPage);
                }

                include "views/sanpham.php";
                break;
            case "danh-muc":
                if(isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                    $categoryId = $_GET['category_id'];
                    if(isset($_GET['page']) && ($_GET['page'] > 0)) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
    
                    if($page == "" || $page == 1) {
                        $begin = 0;
                    } else {
                        $begin = ($page - 1) * 20;
                    }
    
    
                    $sapxep = "product_id ASC";
    
                    if(isset($_GET['gia-thap-cao'])) {
                        $sapxep = "price ASC";
                    }
    
                    if(isset($_GET['gia-cao-thap'])) {
                        $sapxep = "price DESC";
                    }
    
                    $listProduct_byIdcategory = listProduct_byCategory($categoryId,$sapxep,$begin);
                    
                    $count = count($listProduct_byIdcategory);
                    $countTrang = ceil($count / 20); 
                } else {
                    $categoryId = "";
                }
                
                
                
                // Nếu không có id danh mục thì sẽ hiển thị sản phẩm theo bình thường 
                if(isset($_GET['page']) && ($_GET['page'] > 0)) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                if($page == "" || $page == 1) {
                    $begin = 0;
                } else {
                    $begin = ($page - 1) * 20;
                }

                $price = "product_id DESC";

                if(isset($_GET['gia-thap-cao'])) {
                    $price = "price ASC";
                }
                if(isset($_GET['gia-cao-thap'])) {
                    $price = "price DESC";
                }

                $countPage = CountlistProduct__moiNhat();
                $listProduct_moiNhat = listProduct__moiNhat($price,$begin);

                $count = count($countPage);
                $countTrang = ceil($count / 20);   
                

                include "views/danhmuc.php";
                break;
            case "user":
                $profile = $_GET['profile'] ?? "";
                $userAction = $_GET['user'] ?? "";
                $order = $_GET['order'] ?? "";
                
                $userProfile = select__userByid($userID);

                if(isset($_POST['updateAccount'])) {

                    $oldImage = $_POST['oldImage'];
                    $filename = "";
                    
                    if($_FILES['image']['name']) {
                        $filename = time().basename($_FILES['image']['name']);
                        $target = "./public/upload/image/user/".$filename;
                        move_uploaded_file($_FILES['image']['tmp_name'],$target);
                    }
                    
                    updateAccount($userID,$_POST['first_name'],$_POST['last_name'],$_POST['email'],$filename ? $filename : $oldImage,$_POST['phone'],$_POST['date'],$_POST['address'],$_POST['gender']);
                    
                    $success_account = '
                        <div style="display:flex;" class="group_content__succesS">
                            <div class="group_content__Animation__success__icon">
                                <i class="fa-regular fa-circle-check check__squa"></i>
                            </div>
                            <div class="group_content__Animation__success">
                                Cập nhật hồ sơ thành công
                            </div>
                        </div>
                    ';

                    // header('Location:'.$_SERVER['HTTP_REFERER']);
                    // die;
                }


                include "views/user/user.php";
                break;
            case "huydon":
                $id_order = $_GET['id_order'] ?? 0;
            
                $status = "canceled";
                
                if (!empty($status)) {
                    update_donhuy($id_order,$status);
                }
            
                header('Location:'.$_SERVER['HTTP_REFERER']);
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
                                    // print_r($_SESSION['user_id']);
                                    // die();
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

                        $hinh = "";

                        if($gender == 'Nam') {
                            $hinh = "nam.png";
                        } else if($gender == 'Nữ') {
                            $hinh = "nu.jpg";
                        } else {
                            $hinh = "user.jpg";
                        }

                        $resultInsert = addAccount($firstname,$lastname,$phone,$hinh,$hashed_password,$phone,$date,$gender);
            
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
                unset($_SESSION["cart"]);
                unset($_SESSION["id_cart"]);
                unset($_SESSION["id_voucher"]);
                unset($_SESSION["payment_session"]);
                unset($_SESSION["ma_don_hang"]);
                logoutAccount();
                break;
            case "reset_pass":

                if(isset($_POST['guimail'])) {
                    $email = $_POST['phone'];
                    $mailFogot = check_email_quenmk($email);
                    $fullname = $mailFogot['first_name']." ".$mailFogot['last_name'];
                    if($mailFogot) {
                        $hashedPassword = $mailFogot['password'];
                        
                        // Giải mã mật khẩu
                        $decodedPassword = decodePassword($hashedPassword);
                        
                        checkemailPass($mailFogot['email'], $fullname, $decodedPassword);
                        
                    }
                    $_SESSION['form_reset'] = true;
                }

                include "views/account/quenmk.php";
                break;
            case "chi-tiet-sanpham":
                if(isset($_GET['detail_product']) && ($_GET['detail_product'] > 0)) {
                    $detail_product = $_GET['detail_product'];
                    $chitiet_product = chitietSanpham($detail_product);
                    $listVariationColor = listVariationColor($detail_product);
                    $listVariationSize = listVariationSize($detail_product);
                    $top3Pro=getTopPro();
                    $listSpCungloai = product_cungloai($chitiet_product['category_id'],$detail_product);

                    $sumAmout = countAmount($detail_product);

                    $listComment = loadall__comment__Byid($_GET['detail_product']);

                } else {
                    $detail_product = "";
                }

                // if($_SERVER['REQUEST_METHOD'] == "POST") {
                //     $productId = $_POST['idproduct'];
                //     $noidung = $_POST['noidung'];
                //     insert__comment($userID,$productId,$noidung);
                //     header('Location:'.$_SERVER['HTTP_REFERER']);
                //     die;
                // }
                
                include "views/chitietsp.php";
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

                // Delete cart theo check box
                if(isset($_POST['deleteCart'])) {
                    $idCart = $_POST['id_cart'];
                    deleteCart_checkbox_mutiItem($idCart);
                    header('Location: index.php?action=gio-hang');
                }

                unset($_SESSION["cart"]);
                unset($_SESSION["id_cart"]);
                unset($_SESSION["id_voucher"]);
                unset($_SESSION["payment_session"]);
                unset($_SESSION["ma_don_hang"]);
                
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
                
                if(!isset($_SESSION['user_id'])) {
                    header('Location: index.php?action=login');
                    exit();
                } else {
                    // Đặt hàng
                    $data = [];
                    $_SESSION['id_cart'] = $_SESSION['id_cart'] ?? $_POST['id_cart'];

                    // echo "<pre>";
                    // print_r($_SESSION['id_cart']);
                    // echo "<pre>";
                    // die;

                    foreach($_SESSION['id_cart'] as $cart) {
                        $data[] = listCart__bill($cart);
                    }
                    // End đặt hàng
    
                    if(isset($_POST['dathang'])) {
                        $data = [];
                        $_SESSION['id_voucher'] = $_POST['id_voucher'] ?? 0;

                        $_SESSION['payment_session'] = $_POST['payment_radio'];


                        if(isset($_POST['payment_radio']) && ($_POST['payment_radio'] == "VNPAY")) {
                            
                            $data = [];
    
                            foreach($_SESSION['id_cart'] as $cart) {
                                $data[] = listCart__bill($cart);
                            }
    
                            $_SESSION['cart'] = $_POST;
    
                            $_SESSION['ma_don_hang'] = generateRandomOrderCode();
                            
                            $vnp_TxnRef = $_SESSION['ma_don_hang']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                            $voucher = voucher_byId($_SESSION['id_voucher']);
                            
                            $tongdon = 0;
                            foreach($data as $key => $oder_detail) {      
                                $tongdon += $oder_detail['amount'] * $oder_detail['sale'];
                            }

                            $tongdon = $tongdon - ($tongdon * $voucher['del_percent'] / 100) - $voucher['del_price'];


                            $vnp_OrderInfo = "Thanh toán đơn hàng tại VanhStore";
                            $vnp_OrderType = "VNPAY";
                            $vnp_Amount = $tongdon * 100; //Giá tiền
                            $vnp_Locale = "VN";
                            $vnp_BankCode = "NCB";
                            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                            $vnp_ExpireDate = $expire;
                            $vnp_Bill_Address=$_POST['address'];
    
                            $inputData = array(
                                "vnp_Version" => "2.1.0",
                                "vnp_TmnCode" => $vnp_TmnCode,
                                "vnp_Amount" => $vnp_Amount,
                                "vnp_Command" => "pay",
                                "vnp_CreateDate" => date('YmdHis'),
                                "vnp_CurrCode" => "VND",
                                "vnp_IpAddr" => $vnp_IpAddr,
                                "vnp_Locale" => $vnp_Locale,
                                "vnp_OrderInfo" => $vnp_OrderInfo,
                                "vnp_OrderType" => $vnp_OrderType,
                                "vnp_ReturnUrl" => $vnp_Returnurl,
                                "vnp_TxnRef" => $vnp_TxnRef,
                                "vnp_ExpireDate" => $vnp_ExpireDate,
                                "vnp_Bill_FirstName" => $_POST['fullname'],
                                "vnp_Inv_Phone" => $_POST['phone'],
                                "vnp_Bill_Address" => $_POST['address']
                            );
    
                            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                                $inputData['vnp_BankCode'] = $vnp_BankCode;
                            }
    
    
                            ksort($inputData);
    
                            $query = "";
                            $i = 0;
                            $hashdata = "";
                            foreach ($inputData as $key => $value) {
                                if ($i == 1) {
                                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                                } else {
                                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                                    $i = 1;
                                }
                                $query .= urlencode($key) . "=" . urlencode($value) . '&';
                            }
    
                            $vnp_Url = $vnp_Url . "?" . $query;
                            if (isset($vnp_HashSecret)) {
                                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                            }
                            $returnData = array(
                                'code' => '00',
                                'message' => 'success',
                                'data' => $vnp_Url
                            );
    
                            if (isset($_POST['dathang']) && isset($_POST['payment_radio']) && ($_POST['payment_radio'] == "VNPAY")) {
                                header('Location: ' . $vnp_Url);
                                die();
                            } else {
                                echo json_encode($returnData);
                            }
                        } else {
                            $data = [];
    
                            foreach($_SESSION['id_cart'] as $cart) {
                                $data[] = listCart__bill($cart);
                            }
    
                            $_SESSION['cart'] = $_POST;
    
                            $_SESSION['ma_don_hang'] = generateRandomOrderCode();
                            $vnp_TxnRef = $_SESSION['ma_don_hang'];
                            
                            // echo "<pre>";
                            // print_r($_POST);
                            // echo "</pre>";
                            // die;

                            header('Location: index.php?action=cam-on');
                        }
                    }
    
                    include "views/thanhtoan.php";
                    break;
                }

            case "cam-on":
                
                if($_SESSION['payment_session'] == "VNPAY") {

                    if (isset($_GET["vnp_Amount"]) && $_GET['vnp_ResponseCode'] == '00') {
                        
                        if(isset($user)) {
                            $ma_donhang = $_SESSION['ma_don_hang'];
                            $loai_thanhtoan = "VNPAY";
                            $tinhtrang_thanhtoan = "paid";
                            $fullname = $user['first_name']." ".$user['last_name'];
                            $ngaydathang = date("d-m-Y H:i:s");
                            $data = [];

                            foreach($_SESSION['cart']['id_cart'] as $cart) {
                                $data[] = listCart__bill($cart);
                            }
                            $id_order = insert_bill($userID,$ma_donhang,$_SESSION['cart']['fullname'],$_SESSION['cart']['phone'],$_SESSION['cart']['address'],$tinhtrang_thanhtoan,$loai_thanhtoan,$_SESSION['cart']['voucher'] = $_SESSION['cart']['voucher'] ?? 0);

                            foreach($data as $key => $oder_detail) {
                                // if(isset($_SESSION['cart']['voucher_'.$oder_detail['cart_id']])){
                                //     $voucher = $_SESSION['cart']['voucher_'.$oder_detail['cart_id']];
                                //     insert_bill_detail($id_order, $oder_detail['product_id'], $oder_detail['amount'], $oder_detail['size'], $oder_detail['color'], $oder_detail['sale'],$voucher);
                                    
                                // } else {
                                // }
                                
                                insert_bill_detail($id_order, $oder_detail['product_id'], $oder_detail['amount'], $oder_detail['size'], $oder_detail['color'], $oder_detail['sale']);
                            }

                            $_GET['image'] = explode(",", $data[0]['images']);
                            sendMail_bil($data, $_GET['image'], $ngaydathang, $ma_donhang, $user['email'], $fullname);   
                        }

                        $vnp_BankCode = $_GET["vnp_BankCode"];
                        $vnp_BankTranNo = $_GET["vnp_BankTranNo"];
                        $vnp_CardType = $_GET["vnp_CardType"];
                        $vnp_OrderInfo = $_GET["vnp_OrderInfo"];
                        $vnp_PayDate = $_GET["vnp_PayDate"];
                        $vnp_TmnCode = $_GET["vnp_TmnCode"];
                        $vnp_TransactionNo = $_GET["vnp_TransactionNo"];
                        $ma_donhang = $_SESSION["ma_don_hang"];


                        foreach ($_SESSION["cart"]['id_cart'] as $value) {
                            delete_cart($value);
                        }

                        unset($_SESSION["id_cart"]);
                        unset($_SESSION["cart"]);
                        unset($_SESSION["id_voucher"]);
                        unset($_SESSION["payment_session"]);
                        unset($_SESSION["ma_don_hang"]);

                    } else {
                        echo "<script>alert('Đã hủy thanh toán');</script>";
                        echo '<script>window.location.href = "index.php?action=thanh-toan";</script>';
                    }
                } else {
                    $ma_donhang = $_SESSION['ma_don_hang'];
                    $loai_thanhtoan = "tienmat";
                    $tinhtrang_thanhtoan = "unpaid";
                    $fullname = $user['first_name']." ".$user['last_name'];
                    $ngaydathang = date("d-m-Y H:i:s");


                    $data = [];

                    foreach($_SESSION['cart']['id_cart'] as $cart) {
                        $data[] = listCart__bill($cart);
                    }


                    $id_order = insert_bill($userID,$ma_donhang,$_SESSION['cart']['fullname'],$_SESSION['cart']['phone'],$_SESSION['cart']['address'],$tinhtrang_thanhtoan,$loai_thanhtoan,$_SESSION['cart']['voucher'] = $_SESSION['cart']['voucher'] ?? 0);
                   
                    
                    foreach($data as $key => $oder_detail) {
                        // if(isset($_SESSION['cart']['voucher_'.$oder_detail['cart_id']])){
                        //     $voucher = $_SESSION['cart']['voucher_'.$oder_detail['cart_id']];
                        //     insert_bill_detail($id_order, $oder_detail['product_id'], $oder_detail['amount'], $oder_detail['size'], $oder_detail['color'], $oder_detail['sale'],$voucher);
                            
                        // } else {
                        //     insert_bill_detail($id_order, $oder_detail['product_id'], $oder_detail['amount'], $oder_detail['size'], $oder_detail['color'], $oder_detail['sale'],0);
                            
                        // }
                        insert_bill_detail($id_order, $oder_detail['product_id'], $oder_detail['amount'], $oder_detail['size'], $oder_detail['color'], $oder_detail['sale']);
                    }


                    $_GET['image'] = explode(",", $data[0]['images']);
                    sendMail_bil($data, $_GET['image'], $ngaydathang, $ma_donhang, $user['email'], $fullname);             
    

                    foreach ($_SESSION["cart"]['id_cart'] as $value) {
                        delete_cart($value);
                    }

                    unset($_SESSION["id_cart"]);
                    unset($_SESSION["cart"]);
                    unset($_SESSION["id_voucher"]);
                    unset($_SESSION["payment_session"]);
                    unset($_SESSION["ma_don_hang"]);
                }
                
                include "views/camon.php";
                break;
            default:
                include "views/404.php";
        }

        include "views/viewblock/footer.php";
    } else if(isset($_GET['keyword']) && ($_GET['keyword'] != "")) {

        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

        $search_page = isset($_GET['search_page']) ? $_GET['search_page'] : 1;
        
        if($search_page == "" || $search_page == 1) {
            $begin = 0;
        } else {
            $begin = ($search_page - 1) * 20;
        }


        $sapxep = "product_id ASC";

        if (isset($_GET['gia-thap-cao'])) {
            $sapxep = "price ASC";
        }

        if (isset($_GET['gia-cao-thap'])) {
            $sapxep = "price DESC";
        }

        $count_prdSearch = count_searchModel($keyword);
        $listProdSearch = searchModel($keyword,$sapxep,$begin);

        $count = count($count_prdSearch);

        $countTrang = ceil($count / 20);



        include "views/viewblock/header.php";
        include "views/viewSearch.php";
        include "views/viewblock/footer.php";
    } else {
        include "views/viewblock/header.php";
        include "views/home.php";
        include "views/viewblock/footer.php";
    }

?>