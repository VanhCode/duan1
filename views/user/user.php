<link rel="stylesheet" href="./css/user.css">
<main>
    <div class="main-user container">
        <div class="user-menu">
            <div class="img-user">
                <div class="updateForm">
                    <img src="./public/upload/image/user/<?= $user['user_image'] ?>" alt="">
                    <div class="update-userImg">
                        <h5><?= $user['firth_name']." ".$user['last_name'] ?></h5>
                        <a href=""><i class="fa-solid fa-pen"></i> Sửa Hồ Sơ</a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="sale">
                        <a href="index.php?action=user&user=sieu-sale" class="asale <?= $userAction == 'sieu-sale' ? 'sticky' : '' ?>">
                            <div class="icon">
                                <i class="fa-brands fa-salesforce"></i>
                            </div>
                            <div class="sale-text span-text span-pd">
                                <span>Ngày Hội Sale</span>
                            </div>
                        </a>
                    </div>
                    <div class="account">
                        <a href="index.php?action=user&user=tai-khoan-cua-toi" id="aacount" class="aacount">
                            <div class="icon ic__ac">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <div class="sale-text span-text">
                                <span id="clickTop">Tài Khoản Của Tôi</span>
                            </div>
                        </a>
                        <div class="account-content account-content-open">
                            <div class="account-content-item">
                                <a href="index.php?action=user&user=tai-khoan-cua-toi&profile=ho-so" class="add_atc_cl <?= ($profile =='ho-so') ? 'sticky' : "" ?>" data-target="box1"><span>Hồ sơ</span></a>
                                <a href="index.php?action=user&user=tai-khoan-cua-toi&profile=ngan-hang" class="add_atc_cl <?= $profile=='ngan-hang' ? 'sticky' : "" ?>" data-target="box2"><span>Ngân hàng</span></a>
                                <a href="index.php?action=user&user=tai-khoan-cua-toi&profile=dia-chi" class="add_atc_cl <?= $profile=='dia-chi' ? 'sticky' : "" ?>" data-target="box3"><span>Địa chỉ</span></a>
                                <a href="index.php?action=user&user=tai-khoan-cua-toi&profile=change-page" class="add_atc_cl <?= $profile=='change-page' ? 'sticky' : "" ?>" data-target="box4"><span>Đổi mật khẩu</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="single">
                        <a href="index.php?action=user&user=don-mua" id="singleID" class="single-text <?= $userAction == 'don-mua' || isset($_GET['user']) == "order_detail" ? 'sticky' : '' ?>">
                            <div class="icon">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <div class="sale-text span-text">
                                <span id="clickTop">Đơn Mua</span>
                            </div>
                        </a>
                    </div>
                    <div class="nomationS">
                        <a href="index.php?action=user&user=thong-bao" id="anomationID" class="anomation <?= $userAction == 'thong-bao' ? 'sticky' : '' ?>">
                            <div class="icon">
                                <i class="fa-regular anomation__menu__icon fa-bell"></i>
                            </div>
                            <div class="sale-text span-text">
                                <span id="clickTop">Thông Báo</span>
                            </div>
                        </a>
                    </div>
                    <div class="voucher">
                        <a href="index.php?action=user&user=voucher" class="avoucher <?= $userAction == 'voucher' ? 'sticky' : '' ?>">
                            <div class="icon">
                                <i class="fa-sharp fa-solid fa-ticket-simple"></i>
                            </div>
                            <div class="sale-text span-text">
                                <span id="clickTop">Kho Voucher</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-form">
            <?php


                if(isset($_GET['action']) && isset($_GET['user'])) {

                    $action = $_GET['action'];
                    $userAction = $_GET['user'];

                    if ($action == "user" && $userAction == "sieu-sale") {
                        include "sale.php";
                    } else if($action == "user" && $userAction == "tai-khoan-cua-toi") {

                        $userProfile = select__userByid($userID);

                        if($_SERVER['REQUEST_METHOD'] == "POST") {

                            $filename = time().basename($_FILES['image']['name']);
                            $target = "./public/upload/image/user/".$filename;
                            move_uploaded_file($_FILES['image']['tmp_name'],$target);
                            
                            updateAccount($userID,$_POST['firth_name'],$_POST['last_name'],$_POST['email'],$filename,$_POST['phone'],$_POST['date'],$_POST['gender']);
                            header('Location:'.$_SERVER['HTTP_REFERER']);
                        }

                        include "thongtin.php";
                    } else if($action == "user" && $userAction == "don-mua") {
                        $load_order_all = load_all_order($userID);
                        $load_order_choxacnhan = load_bill_choxacnhan($userID);
                        $load_order_daxacnhan = load_bill_daxacnhan($userID);
                        $load_order_danggiao = load_bill_danggiao($userID);
                        $load_order_hoanthanh = load_bill_hoanthanh($userID);
                        include "donmua.php";
                    } else if($action == "user" && $userAction == "thong-bao") {
                        include "thongbao.php";
                    } else if($action == "user" && $userAction == "order_detail") {
                        $id_order = $_GET['id_order'] ?? "";
                        $order_detail = load_bill_byid($id_order);
                        include "hoadonchitiet.php";
                    } else if($action == "user" && $userAction == "voucher") {
                        include "voucher.php";
                    } else {
                        include "donmua.php";
                    }

                } else {
                    $userProfile = select__userByid($userID);
                    include "thongtin.php";
                }
            ?>
            

        </div>
    </div>
</main>
<!-- end main -->