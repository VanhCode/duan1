<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Thanh Toán</title>
    <link rel="shortcut icon" href="./img1/iconLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/thanhtoan.css">
    <link rel="stylesheet" href="./css/loadding.css">
</head>

<body>
    <div id="loading-overlay">
        <div class="loader">
            <span class="ovOne"></span>
            <span class="ovTwo"></span>
            <span class="ovThree"></span>
        </div>
    </div>
    <div class="wrapper">
        <header>
            <div class="header-top container">
                <div class="time">
                    <a href="" class="flex-header onl-ht">Mua Sắm Online</a>
                    <?php if($user):?>
                    <?php if($user['role']):?>
                            <a href="admin" class="flex-header ht1">Vào trang quản trị</a>
                    <?php endif?>
                    <?php endif;?>
                    <a href="" class="flex-header ht1">Liên hệ</a>
                    <a href="" class="flex-header ht1">Kết nối</a>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
                <div class="btn-span">
                    <nav class="navTop">
                        <ul class="userTop">
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
                            <li class="boxUser">
                                <a href="user.php" class="userLog nomation"><i class="fa-solid fa-user"></i> Vanh</a>
                                <ul class="userChil">
                                    <li><a href="user.php">Tài khoản của tôi</a></li>
                                    <li><a href="user.php">Hồ sơ</a></li>
                                    <li>
                                        <a href="../php/logout.php" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất hay không?')">Đăng xuất</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- <li class="boxUser">
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
                    <a class="signup nomation" href="./dangky.php"><i class="fa fa-user-edit"></i> Đăng ký</a>
                    <div class="line-top"></div>
                    <a class="login nomation" href="./dangnhap.php"><i class="fa fa-sign-in"></i> Đăng nhập</a> -->
                </div>
            </div>
        </header>

        <!-- header end -->

        <!-- header nav -->

        <div class="nav-hea">
            <div class="header-nav container">
                <a class="a-h1" href="index.php">
                    <img src="./img1/vanhcart.jpg" alt="">
                    <h2>Thanh Toán</h2>
                </a>
                <div class="search-btn">
                </div>
            </div>
        </div>

        <!-- end header nav -->