<?php
    require_once "../connect/connect.php";
    require_once "../php/checkUser.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img1/iconLogo.png" type="image/x-icon">
    <title>VanhStore | Mua và Bán Trên Ứng Dụng Di Động Hoặc Website</title>
    <link rel="stylesheet" href="../css/user.css">

</head>

<body>
    <div class="wrapper">
        <!-- header -->

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
                                    <a href="user.php" class="userLog nomation"><i class="fa-solid fa-user"></i> <?= $_SESSION['vanhstore'] ?></a>
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
                        <a class="signup nomation" href="./dangky.php"><i class="fa fa-user-edit"></i> Đăng ký</a>
                        <div class="line-top"></div>
                        <a class="login nomation" href="./dangnhap.php"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="header-nav">
                <div class="container nav-bn">
                    <a href="../index.php" class="header-logo-navH1">
                        <img src="../img1/vanhstore.jpg" alt="">
                    </a>
                    <div class="header-with-search">
                        <div class="vanh-searchbar">
                            <div class="vanh-searchbar__main">
                                <form action="" role="search" class="vanh-searchbar-form">
                                    <?php
                                    if (isset($_SESSION['vanhstore'])) {
                                    ?>
                                        <input type="text" class="vanh-searchbar-form-input" placeholder="SALE TOÀN BỘ SẢN PHẨM LÊN ĐẾN 50%">
                                    <?php
                                    } else {
                                    ?>
                                        <input type="text" class="vanh-searchbar-form-input" placeholder="Miễn phí ship 0đ - Đăng ký ngay!">
                                    <?php
                                    }
                                    ?>
                                </form>
                            </div>
                            <a href="" class="btn btn-chil-icon btn-solid-primary btn--s btn--inline vanh-searchbar__search-button">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                        <div class="vanh-navBarr__main">
                            <ul class="vanh-navBarr__Ul-li">
                                <li class="megamenu__li">
                                    <a href="../view/sanpham.php" class="vanh-navBarr__a">Sản Phẩm <i class="fa-solid fa-chevron-down"></i></a>
                                    <ul class="chil-nav">
                                        <li>
                                            <ul>
                                                <h3 class="h3_logo__productNavBar">Quần</h3>
                                                <li class="chil-nav__liMenu"><a href="">Quần Jean</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Short</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Âu</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Joke</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Nỉ Bông</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Đi Biển</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Bò</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <h3 class="h3_logo__productNavBar">Áo</h3>
                                                <li class="chil-nav__liMenu"><a href="">Sơ Mi</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Hoodie</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Phông Hot</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Polo Cộc Tay</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Áo Dài</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Áo Khoác Gió</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Áo Phao Thu Đông</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <h3 class="h3_logo__productNavBar">Giày</h3>
                                                <li class="chil-nav__liMenu"><a href="">Nike</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Adidas</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Balencia</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Gucci</a></li>
                                                <li class="chil-nav__liMenu"><a href="">LV Trainer</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Dior</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Ultraboost</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="megamenu__li">
                                    <a href="" class="vanh-navBarr__a">Quần Áo <i class="fa-solid fa-chevron-down"></i></a>
                                    <ul class="chil-nav2">
                                        <li>
                                            <ul>
                                                <h3 class="h3_logo__productNavBar">Quần</h3>
                                                <li class="chil-nav__liMenu"><a href="">Quần Jean</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Short</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Âu</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Joke</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Nỉ Bông</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Đi Biển</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Bò</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <h3 class="h3_logo__productNavBar">Áo</h3>
                                                <li class="chil-nav__liMenu"><a href="">Sơ Mi</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Hoodie</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Phông Hot</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Polo Cộc Tay</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Áo Dài</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Áo Khoác Gió</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Áo Phao Thu Đông</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <a href="" class="vanh-navBarr__a">Giày Dép</a>
                                <a href="" class="vanh-navBarr__a">Thời Trang Nam</a>
                                <a href="" class="vanh-navBarr__a">Thời Trang Nữ</a>
                                <li class="megamenu__li">
                                    <a href="" class="vanh-navBarr__a">Sản Phẩm Mới Nhất <i class="fa-solid fa-chevron-down"></i></a>
                                    <ul class="chil-nav3">
                                        <li>
                                            <ul>
                                                <h3 class="h3_logo__productNavBar">Mới nhất</h3>
                                                <li class="chil-nav__liMenu"><a href="">Joke rách gối 2023</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Sơ Mi Phong Cách Hàn Quốc</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Combo 1 Set Đi Biển</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Thời Trang Du Lịch</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Set Burberry</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Áo Da Quảng Châu</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Quần Bò</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <h3 class="h3_logo__productNavBar">PHổ biến</h3>
                                                <li class="chil-nav__liMenu"><a href="">Áo Tay Lỡ</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Hoodie Logo Thêu</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Combo Đầm và Váy</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Chân Váy</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Áo Dài</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Bộ Đi Tiệc</a></li>
                                                <li class="chil-nav__liMenu"><a href="">LV Trainer</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <ul>
                                                <h3 class="h3_logo__productNavBar">Hàng đầu</h3>
                                                <li class="chil-nav__liMenu"><a href="">Bộ Gucci Mùa Hè</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Polo LV</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Các Mẫu Sơ Mi Mới 2023</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Váy Bà Bầu</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Áo Khoác Gió Kaki</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Giày Lười</a></li>
                                                <li class="chil-nav__liMenu"><a href="">Áo Phao Thu Đông</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <a href="" class="vanh-navBarr__a">Sale</a>
                            </ul>
                        </div>
                    </div>
                    <div class="header-with-search__cart-wrapper">
                        <?php
                            if(isset($_SESSION['vanhstore'])) {
                                ?>
                                    <div class="header-with-search__cart_hoverProductCart">
                                        <a href="../view/cart.php" class="header-with-search__cart_icon"><i class="fa-solid fa-cart-shopping"></i></a>
                                        <div class="amount__sessionCart">
                                            <span class="cart-item-count"><?= $totalProducts ?></span>
                                        </div>
                                        <?php
                                            if($resultSpSelectCart && count($resultSpSelectCart) > 0) {
                                                ?>
                                                    <div class="hoverProduct__cart">
                                                        <div class="list__hoverProduct__cart">
                                                            <div class="hoverProduct__cart_textTop">Sản phẩm mới thêm</div>
                                                            <div class="list_hoverProduct__cart_boxContentProduct">
                                                                <?php
                                                                    foreach($resultSpSelectCart as $key) {
                                                                        ?>
                                                                            <a href="../view/chitietsp.php?id=<?= $key['id_spgiohang'] ?>" class="cart_boxContentProduct_flex">
                                                                                <div class="cart_boxContentProduct_img">
                                                                                    <div class="cart_boxContentProduct_imgChil">
                                                                                        <img src="../img1/<?= $key['image'] ?>" alt="">
                                                                                    </div>
                                                                                    <div class="cart_boxContentProduct_textContent"><?= $key['name_sanpham'] ?></div>
                                                                                </div>
                                                                                <div class="cart_boxContentProduct_priceProduct"><?= number_format($key['price'], 0, ',', '.'); ?>đ</div>
                                                                            </a>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                <div class="cart_boxContentProduct_btnhrefProduct">
                                                                    <a href="../view/cart.php" class="aViewProduct">Xem Giỏ Hàng</a>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                <?php
                                            } else {
                                                ?>
                                                    <div class="hoverProduct__cart">
                                                        <div class="list__hoverProduct__cartNoProduct">
                                                            <div class="cart_boxContentProduct_flex__bg_img"></div>
                                                            <div class="cart_boxContentProduct_textNoProduct">Chưa có sản phẩm</div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                <?php
                            } else {
                                ?>
                                    <div class="header-with-search__cart_hoverProductCart">
                                        <a href="index.php?action" class="header-with-search__cart_icon"><i class="fa-solid fa-cart-shopping"></i></a>
                                        <div class="hoverProduct__cart">
                                            <div class="list__hoverProduct__cartNoProduct">
                                                <div class="cart_boxContentProduct_flex__bg_img"></div>
                                                <div class="cart_boxContentProduct_textNoProduct">Chưa có sản phẩm</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </header>

        <!-- header end -->

        <main>
            <div class="main-user container">
                <div class="user-menu">
                    <div class="img-user">
                        <div class="updateForm">
                            <img src="../img1/lgeditimg.png" alt="">
                            <div class="update-userImg">
                                <h5><?= $_SESSION['vanhstore'] ?></h5>
                                <a href=""><i class="fa-solid fa-pen"></i> Sửa Hồ Sơ</a>
                            </div>
                        </div>
                        <div class="menu-item">
                            <div class="sale">
                                <a href="" class="asale">
                                    <div class="icon">
                                        <i class="fa-brands fa-salesforce"></i>
                                    </div>
                                    <div class="sale-text span-text span-pd">
                                        <span>Siêu Sale Toàn Quốc</span>
                                    </div>
                                </a>
                            </div>
                            <div class="account">
                                <a href="" id="aacount" class="aacount">
                                    <div class="icon">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                    <div class="sale-text span-text">
                                        <span id="clickTop">Tài Khoản Của Tôi</span>
                                    </div>
                                </a>
                                <div class="account-content account-content-open">
                                    <div class="account-content-item">
                                        <a href="" class="add-active" data-target="box1"><span>Hồ sơ</span></a>
                                        <a href="" data-target="box2"><span>Ngân hàng</span></a>
                                        <a href="" data-target="box3"><span>Địa chỉ</span></a>
                                        <a href="" data-target="box4"><span>Đổi mật khẩu</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="single">
                                <a href="" id="singleID" class="single-text sticky">
                                    <div class="icon">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="sale-text span-text">
                                        <span id="clickTop">Đơn Mua</span>
                                    </div>
                                </a>
                            </div>
                            <div class="nomationS">
                                <a href="" id="anomationID" class="anomation">
                                    <div class="icon">
                                        <i class="fa-regular anomation__menu__icon fa-bell"></i>
                                    </div>
                                    <div class="sale-text span-text">
                                        <span id="clickTop">Thông Báo</span>
                                    </div>
                                </a>
                            </div>
                            <div class="voucher">
                                <a href="" class="avoucher">
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
                    <div class="single-box">
                        <div class="nav-form">
                            <ul>
                                <li class="activeNav">Tất cả</li>
                                <li>Chờ thành toán</li>
                                <li>Vận chuyển</li>
                                <li>Đang giao</li>
                                <li>Hoàn thành</li>
                                <li>Đã hủy</li>
                                <li>Trả hàng/Hoàn tiền</li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-content-item">
                                <div class="search-form">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <input type="text" name="submit" placeholder="Bạn có thể tìm kiếm theo tên Shop, ID đơn hàng hoặc Tên Sản Phẩm">
                                </div>
                                <div class="form-single">
                                    <div class="no-single"></div>
                                    <h2>Chưa có đơn hàng</h2>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-content-item">
                                <div class="form-single">
                                    <div class="no-single"></div>
                                    <h2>Chưa có đơn hàng</h2>
                                </div>
                            </div>
                            <div id="tab-3" class="tab-content-item">
                                <div class="form-single">
                                    <div class="no-single"></div>
                                    <h2>Chưa có đơn hàng</h2>
                                </div>
                            </div>
                            <div id="tab-4" class="tab-content-item">
                                <div class="form-single">
                                    <div class="no-single"></div>
                                    <h2>Chưa có đơn hàng</h2>
                                </div>
                            </div>
                            <div id="tab-5" class="tab-content-item">
                                <div class="form-single">
                                    <div class="no-single"></div>
                                    <h2>Chưa có đơn hàng</h2>
                                </div>
                            </div>
                            <div id="tab-6" class="tab-content-item">
                                <div class="form-single">
                                    <div class="no-single"></div>
                                    <h2>Chưa có đơn hàng</h2>
                                </div>
                            </div>
                            <div id="tab-7" class="tab-content-item">
                                <div class="form-single">
                                    <div class="no-single"></div>
                                    <h2>Bạn không có yêu cầu trả hàng/Hoàn tiền nào</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-box container">
                        <!-- chỉnh sửa hồ sơ -->

                        <div class="administer-user box1">
                            <div style="display: contents;">
                                <div class="administer-chil">
                                    <div class="administer">
                                        <h2 class="SbCTde">Hồ Sơ Của Tôi</h2>
                                        <div class="administer-text">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
                                    </div>
                                    <div class="edit-user">
                                        <div class="box-form">
                                            <form action="">
                                                <table class="table-user">
                                                    <tr>
                                                        <td class="td-user td-user-bottom">
                                                            <label>Tên đăng nhập</label>
                                                        </td>
                                                        <td class="suggest">
                                                            <div>
                                                                <div class="userLogin">
                                                                    <input type="text" class="nameLogin" value="">
                                                                </div>
                                                                <div class="suggest-text">Tên đăng nhập chỉ có thể thay đổi một lần.</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-user">
                                                            <label>Tên</label>
                                                        </td>
                                                        <td class="suggest">
                                                            <div>
                                                                <div class="userLogin">
                                                                    <input type="text" class="nameLogin" value="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-user">
                                                            <label>Email</label>
                                                        </td>
                                                        <td class="suggest">
                                                            <div class="td3">
                                                                <div class="emailClass">tran*****@gmail.com</div>
                                                                <button class="emailButton buttonEmail">Thay đổi</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-user">
                                                            <label>Số điện thoại</label>
                                                        </td>
                                                        <td class="suggest">
                                                            <div class="td3">
                                                                <div class="emailClass"></div>
                                                                <button class="emailButton">Thêm</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-user">
                                                            <label>Giới tính</label>
                                                        </td>
                                                        <td class="gender">
                                                            <div class="td3">
                                                                <div class="start-radio-group" role="radiogroup">
                                                                    <div class="radio-group-item">
                                                                        <div class="input-radio">
                                                                            <input type="radio" name="gender" id="">
                                                                        </div>
                                                                        <div class="radio-text">
                                                                            <span>Nam</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="radio-group-item">
                                                                        <div class="input-radio">
                                                                            <input type="radio" name="gender" id="">
                                                                        </div>
                                                                        <div class="radio-text">
                                                                            <span>Nữ</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="radio-group-item">
                                                                        <div class="input-radio">
                                                                            <input type="radio" name="gender" id="">
                                                                        </div>
                                                                        <div class="radio-text">
                                                                            <span>Khác</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-user">
                                                            <label>Ngày sinh</label>
                                                        </td>
                                                        <td class="suggest">
                                                            <div class="td-date">
                                                                <div class="dateClass">
                                                                    <input type="date" name="date" class="dateGroup">
                                                                </div>
                                                                <div class="dateErr"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-user">
                                                            <label></label>
                                                        </td>
                                                        <td class="suggest">
                                                            <button type="button" class="btn btn-solid-primary btn--m btn--inline" aria-disabled="false">Lưu</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        <div class="edit-img">
                                            <div class="div-img">
                                                <div class="imgUrl">
                                                    <div class="url-image-load">

                                                    </div>
                                                </div>
                                                <input class="upFile" type="file" accept=".jpg,.jpeg,.png">
                                                <button type="button" class="btn btn--m btn-inline subFile">Chọn ảnh</button>
                                                <div class="file-text">
                                                    <div class="capacity">Dụng lượng file tối đa 1 MB</div>
                                                    <div class="capacity">Định dạng:.JPEG, .PNG</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end chỉnh sửa hồ sơ -->

                        <div class="atm-box box2">
                            <div class="Hvae38" role="main">
                                <div>
                                    <div class="my-account-section">
                                        <div class="my-account-section__header">
                                            <div class="my-account-section__header-left">
                                                <div class="my-account-section__header-title">Thẻ Tín dụng/Ghi nợ</div>
                                                <div class="my-account-section__header-subtitle"></div>
                                            </div>
                                            <div class="my-account-section__header-button">
                                                <button>
                                                    <a href="">Thêm Thẻ Mới</a>
                                                </button>
                                                <i class="fa-solid fa-top-list fa-plus"></i>
                                            </div>
                                        </div>
                                        <div class="bacc-centered-msg">Bạn chưa liên kết thẻ.</div>
                                    </div>
                                    <div class="my-account-section">
                                        <div class="my-account-section__header">
                                            <div class="my-account-section__header-left">
                                                <div class="my-account-section__header-title">Tài Khoản Ngân Hàng Của Tôi</div>
                                                <div class="my-account-section__header-subtitle"></div>
                                            </div>
                                            <div class="my-account-section__header-button">
                                                <button class="new-button-account">
                                                    <a href="">Thêm Tài Khoản Ngân Hàng</a>
                                                </button>
                                                <i class="fa-regular add-new-i fa-plus"></i>
                                            </div>
                                        </div>
                                        <div class="bacc-centered-msg">Bạn chưa có tài khoản ngân hàng nào.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end thẻ ngân hàng -->

                        <div class="address-box box3">
                            <div class="Hvae38" role="main">
                                <div style="display: contents;">
                                    <div class="UWIOO4">
                                        <div class="d2XTTX">
                                            <div class="KxkIgA">
                                                <div class="Df4Vny">Địa chỉ của tôi</div>
                                                <div class="VwAsdf"></div>
                                            </div>
                                            <div class="my-account-section__header-button">
                                                <button>
                                                    <a href="">Thêm địa chỉ mới</a>
                                                </button>
                                                <i class="fa-solid fa-top-list fa-plus"></i>
                                            </div>
                                        </div>
                                        <div class="FS90r3">
                                            <svg fill="none" viewBox="0 0 121 120" class="+elnpp">
                                                <path d="M16 79.5h19.5M43 57.5l-2 19" stroke="#BDBDBD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M56.995 78.791v-.001L41.2 38.195c-2.305-5.916-2.371-12.709.44-18.236 1.576-3.095 4.06-6.058 7.977-8 5.061-2.5 11.038-2.58 16.272-.393 3.356 1.41 7 3.92 9.433 8.43v.002c2.837 5.248 2.755 11.853.602 17.603L60.503 78.766v.001c-.617 1.636-2.88 1.643-3.508.024Z" fill="#fff" stroke="#BDBDBD" stroke-width="2"></path>
                                                <path d="m75.5 58.5 7 52.5M13 93h95.5M40.5 82.5 30.5 93 28 110.5" stroke="#BDBDBD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M44.5 79.5c0 .55-.318 1.151-1.038 1.656-.717.502-1.761.844-2.962.844-1.2 0-2.245-.342-2.962-.844-.72-.505-1.038-1.105-1.038-1.656 0-.55.318-1.151 1.038-1.656.717-.502 1.761-.844 2.962-.844 1.2 0 2.245.342 2.962.844.72.505 1.038 1.105 1.038 1.656Z" stroke="#BDBDBD" stroke-width="2"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M48.333 68H18.5a1 1 0 1 0 0 2h30.667l-.834-2Zm20.5 2H102a1 1 0 0 0 0-2H69.667l-.834 2Z" fill="#BDBDBD"></path>
                                                <path d="M82 73h20l3 16H84.5L82 73ZM34.5 97H76l1.5 13H33l1.5-13ZM20.5 58h18l-1 7h-18l1-7Z" fill="#E8E8E8"></path>
                                                <path clip-rule="evenodd" d="M19.5 41a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM102.5 60a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" stroke="#E8E8E8" stroke-width="2"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M93.5 22a1 1 0 0 0-1 1v3h-3a1 1 0 1 0 0 2h3v3a1 1 0 1 0 2 0v-3h3a1 1 0 1 0 0-2h-3v-3a1 1 0 0 0-1-1Z" fill="#E8E8E8"></path>
                                                <circle cx="58.5" cy="27" r="7" stroke="#BDBDBD" stroke-width="2"></circle>
                                            </svg>
                                            <div class="tYrwYD">
                                                Bạn chưa có địa chỉ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end địa chỉ -->

                        <div class="repass-box box4">
                            <div class="Hvae38" role="main">
                                <div class="w1iqPz">
                                    <form action="" method="POST">
                                        <div class="pass-header">
                                            <div class="text-header-pass">
                                                <h2 class="h2-text-repasss">Thêm mật khẩu</h2>
                                                <div class="confidentiality-account">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</div>
                                            </div>
                                        </div>
                                        <div class="form-repass">
                                            <div class="colum-group colum-group2">
                                                <div class="cl1 cl1-item">
                                                    <div class="cl1-text">
                                                        <label class="q1">Mật khẩu mới</label>
                                                    </div>
                                                </div>
                                                <div class="cl2">
                                                    <div class="cl2-group">
                                                        <div class="cl2-text">
                                                            <input type="password" class="pDzPRp inputsClick" name="newPassword">
                                                            <i class="fa-regular fa-eye-slash"></i>
                                                            <i class="fa-sharp fa-regular fa-eye"></i>
                                                        </div>
                                                        <div class="cl2-err cl2-err-css"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="colum-group colum-group2">
                                                <div class="cl1 cl1-item">
                                                    <div class="cl1-text">
                                                        <label class="q1">Xác nhận mật khẩu</label>
                                                    </div>
                                                </div>
                                                <div class="cl2">
                                                    <div class="cl2-group">
                                                        <div class="cl2-text">
                                                            <input type="password" class="pDzPRp" name="newPasswordClick">
                                                            <i class="fa-regular fa-eye-slash"></i>
                                                            <i class="fa-sharp fa-regular fa-eye"></i>
                                                        </div>
                                                        <div class="cl2-err cl2-err-css"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="submit-repass">
                                                <div class="V2For-">

                                                </div>
                                                <div class="KPocjz">
                                                    <button type="submit" class="btn btn-solid-primary btn--m btn--inline btn-solid-primary--disabled" aria-disabled="true">Xác nhận</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- end đổi mật khẩu -->
                    </div>

                    <div class="nomation-box container">
                        <div class="ggNFa">
                            <div class="HEB6C8">
                                <div class="yvbeD6 qsxtA-">
                                    <img width="invalid-value" height="invalid-value" class="qsxtA- vc8g9F" style="object-fit: contain" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/4cddac8a462d1f793ceb4194c08ef8ee.png">
                                </div>
                                <p>Chưa có cập nhật đơn hàng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- end main -->

        <!-- footer -->

        <footer>

            <div class="delivery container">
                <div class="delivery-content">
                    <img src="../../img/giaohang1.png" alt="">
                    <div class="delivery-text">
                        <h3>GIAO HÀNG MIỄN PHÍ</h3>
                        <P>Toàn cầu từ 75k</P>
                    </div>
                </div>
                <div class="delivery-content">
                    <img src="../../img/giaohang2.png" alt="">
                    <div class="delivery-text">
                        <h3>DỄ DÀNG ĐỔI TRẢ</h3>
                        <P>Đổi trả thoải mái trong 30 ngày</P>
                    </div>
                </div>
                <div class="delivery-content">
                    <img src="../../img/giaohang3.png" alt="">
                    <div class="delivery-text">
                        <h3>THANH TOÁN NHANH</h3>
                        <P>Thẻ tín dụng có sẵn</P>
                    </div>
                </div>
                <div class="delivery-content">
                    <img src="../../img/giaohang4.png" alt="">
                    <div class="delivery-text">
                        <h3>QUÀ TẶNG MIỄN PHÍ</h3>
                        <P>Nhận quà tặng và giảm giá</P>
                    </div>
                </div>
            </div>

            <div class="footer-information container">
                <div class="footer-text">
                    <img class="logo__vanhCart_footer" src="../../img1/vanhcart.jpg" alt="">
                    <div class="address-footer">
                        <ul>
                            <li> 22 Trịnh văn bô, Quận Nam Từ Liêm, Hà Nội</li>
                            <li> 0969621079</li>
                            <li> Thứ Hai-Thứ Sáu 8:00 đến 19:00</li>
                            <li> tranvanh2k4@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="footer-text">
                    <h2>Thông tin</h2>
                    <div class="address-footer-hover">
                        <ul>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Trang chủ</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Giới thiệu</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Sale sản phẩm</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Tin tức</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-text">
                    <h2>Tại mua từ tôi</h2>
                    <div class="address-footer-hover">
                        <ul>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Trang chủ</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Giới thiệu</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Sale sản phẩm</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Tin tức</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-text">
                    <h2>Kết nối với chúng tôi</h2>
                    <form class="form-footer" action="" method="post">
                        <p>
                            Điền email của bạn để nhận thông tin giảm giá và sự kiện của shop
                        </p>
                        <input type="text" name="send-footer" placeholder="Nhập email">
                        <button type="submit" class="send" name="send" id="send">Gửi</button>
                        <button type="submit" class="reset" name="reset" id="reset">Hủy</button>
                    </form>
                </div>
            </div>
        </footer>

        <!-- end footer -->
    </div>

    <script src="../js/userJS.js"></script>
</body>

</html>