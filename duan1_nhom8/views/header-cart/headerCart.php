<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img1/iconLogo.png" type="image/x-icon">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="./css/cart.css">
</head>

<body>
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
                    if (isset($_SESSION['vanhstore'])) {
                    ?>
                        <nav class="navTop">
                            <ul class="userTop">
                                <li class="boxUser">
                                    <a href="index.php?url=announcement" class="nomation"><i class="fa-solid fa-bell"></i> Thông báo</a>
                                </li>
                                <li>
                                    <div class="line-top"></div>
                                </li>
                                <li class="boxUser">
                                    <a href="index.php?url=support" class="nomation"><i class="fa-regular fa-circle-question"></i> Hỗ trợ</a>
                                </li>
                                <li>
                                    <div class="line-top"></div>
                                </li>
                                <li class="boxUser">
                                    <a href="index.php?url=laguage" class="nomation"><i class="fa-solid fa-globe"></i> Tiếng việt</a>
                                </li>
                                <li>
                                    <div class="line-top"></div>
                                </li>
                                <li class="boxUser">
                                    <a href="index.php?url=user" class="userLog nomation"><i class="fa-solid fa-user"></i> <?= $_SESSION['vanhstore'] ?></a>
                                    <ul class="userChil">
                                        <li><a href="index.php?url=user">Tài khoản của tôi</a></li>
                                        <li><a href="index.php?url=user">Hồ sơ</a></li>
                                        <li>
                                            <a href="index.php?url=logout" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất hay không?')">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    <?php
                    } else {
                    ?>
                        <li class="boxUser">
                            <a href="index.php?url=announcement" class="nomation"><i class="fa-solid fa-bell"></i> Thông báo</a>
                        </li>
                        <li>
                            <div class="line-top"></div>
                        </li>
                        <li class="boxUser">
                            <a href="index.php?url=support" class="nomation"><i class="fa-regular fa-circle-question"></i> Hỗ trợ</a>
                        </li>
                        <li>
                            <div class="line-top"></div>
                        </li>
                        <li class="boxUser">
                            <a href="index.php?url=language" class="nomation"><i class="fa-solid fa-globe"></i> Tiếng việt</a>
                        </li>
                        <li>
                            <div class="line-top"></div>
                        </li>
                        <a class="signup nomation" href="index.php?url=login"><i class="fa fa-user-edit"></i> Đăng ký</a>
                        <div class="line-top"></div>
                        <a class="login nomation" href="index.php?url=signup"><i class="fa fa-sign-in"></i> Đăng nhập</a>
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