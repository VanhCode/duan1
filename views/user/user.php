<main>
    <div class="main-user container">
        <div class="user-menu">
            <div class="img-user">
                <div class="updateForm">
                    <img src="./img1/lgeditimg.png" alt="">
                    <div class="update-userImg">
                        <h5>Vanh</h5>
                        <a href=""><i class="fa-solid fa-pen"></i> Sửa Hồ Sơ</a>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="sale">
                        <a href="index.php?action=user&user=sieu-sale" class="asale <?= $user == 'sieu-sale' ? 'sticky' : '' ?>">
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
                        <a href="index.php?action=user&user=don-mua" id="singleID" class="single-text <?= $user == 'don-mua' ? 'sticky' : '' ?>">
                            <div class="icon">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <div class="sale-text span-text">
                                <span id="clickTop">Đơn Mua</span>
                            </div>
                        </a>
                    </div>
                    <div class="nomationS">
                        <a href="index.php?action=user&user=thong-bao" id="anomationID" class="anomation <?= $user == 'thong-bao' ? 'sticky' : '' ?>">
                            <div class="icon">
                                <i class="fa-regular anomation__menu__icon fa-bell"></i>
                            </div>
                            <div class="sale-text span-text">
                                <span id="clickTop">Thông Báo</span>
                            </div>
                        </a>
                    </div>
                    <div class="voucher">
                        <a href="index.php?action=user&user=voucher" class="avoucher <?= $user == 'voucher' ? 'sticky' : '' ?>">
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
                    $user = $_GET['user'];

                    if ($action == "user" && $user == "sieu-sale") {
                        include "sale.php";
                    } else if($action == "user" && $user == "tai-khoan-cua-toi") {
                        include "thongtin.php";
                        // echo '<style>.account-content { display: block; }</style>';
                    } else if($action == "user" && $user == "don-mua") {
                        include "donmua.php";
                    } else if($action == "user" && $user == "thong-bao") {
                        include "thongbao.php";
                    } else if($action == "user" && $user == "voucher") {
                        include "voucher.php";
                    } else {
                        include "donmua.php";
                    }

                } else {
                    include "donmua.php";
                }
            ?>
            

        </div>
    </div>
</main>
<!-- end main -->