<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img1/iconLogo.png" type="image/x-icon">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="./css/cart.css">
</head>

<body>
    <div id="loading-overlay">
        <div class="loader"></div>
    </div>

    <div id="err__delete">
        <div class="center__er">
            <div class="ic__err">
                <i class="fa-solid fa-circle-exclamation"></i>
                <h3>Vui lòng chọn sản phẩm</h3>
            </div>
        </div>
    </div>

    <div id="err__sendCart">
        <div class="vanhstore-popup__overlay"></div>
        <div class="vanhstore-popup__container">
            <div class="vanhstore-alert-popup card">
                <div class="vanhstore-alert-popup__message">Bạn vẫn chưa chọn sản phẩm nào để mua.
                    <div class="vanhstore-alert-popup__message-list"></div>
                </div>
                <div class="vanhstore-alert-popup__button-horizontal-layout">
                    <button id="button__request__confirm" class="button__request__confirm">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <header>
            <div class="header-top container">
                <div class="time">
                    <a href="" class="flex-header onl-ht">Mua Sắm Online</a>
                    <a href="" class="flex-header ht1">Trở Thành Người Bán VanhStore</a>
                    <a href="" class="flex-header ht1">Liên hệ</a>
                    <a href="" class="flex-header ht1">Kết nối</a>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
                <div class="btn-span">
                    <?php
                    if ($user) {
                    ?>
                        <nav class="navTop">
                            <ul class="userTop">
                                <li class="boxUser">
                                    <a href="index.php?action=announcement" class="nomation"><i class="fa-solid fa-bell"></i> Thông báo</a>
                                </li>
                                <li>
                                    <div class="line-top"></div>
                                </li>
                                <li class="boxUser">
                                    <a href="index.php?action=support" class="nomation"><i class="fa-regular fa-circle-question"></i> Hỗ trợ</a>
                                </li>
                                <li>
                                    <div class="line-top"></div>
                                </li>
                                <li class="boxUser">
                                    <a href="index.php?action=language" class="nomation"><i class="fa-solid fa-globe"></i> Tiếng việt</a>
                                </li>
                                <li>
                                    <div class="line-top"></div>
                                </li>
                                <li class="boxUser">
                                    <a href="index.php?action=user" class="userLog nomation"><i class="fa-solid fa-user"></i> <?= $user ? $user['firth_name'] . " " . $user['last_name'] : "" ?></a>
                                    <ul class="userChil">
                                        <li><a href="index.php?action=user">Tài khoản của tôi</a></li>
                                        <li><a href="index.php?action=user">Hồ sơ</a></li>
                                        <li>
                                            <a href="index.php?action=logout">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    <?php
                    } else {
                    ?>
                        <li class="boxUser">
                            <a href="thongBao.php" class="nomation"><i class="fa-solid fa-bell"></i> Thông báo</a>
                        </li>
                        <li>
                            <div class="line-top"></div>
                        </li>
                        <li class="boxUser">
                            <a href="support.php" class="nomation"><i class="fa-regular fa-circle-question"></i> Hỗ trợ</a>
                        </li>
                        <li>
                            <div class="line-top"></div>
                        </li>
                        <li class="boxUser">
                            <a href="language.php" class="nomation"><i class="fa-solid fa-globe"></i> Tiếng việt</a>
                        </li>
                        <li>
                            <div class="line-top"></div>
                        </li>
                        <a class="signup nomation" href="index.php?action=signup"><i class="fa fa-user-edit"></i> Đăng ký</a>
                        <div class="line-top"></div>
                        <a class="login nomation" href="index.php?action=login"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </header>

        <!-- header end -->

        <!-- header nav -->

        <div class="nav-hea">
            <div class="header-nav container">
                <a class="a-h1" href="index.php">
                    <img src="./img1/vanhcart.jpg" alt="">
                    <h2>Giỏ Hàng</h2>
                </a>
                <div class="search-btn">
                    <div class="form-input-search">
                        <input type="text" placeholder="Tìm kiếm">
                    </div>
                    <button class="btn-primary a-search">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>