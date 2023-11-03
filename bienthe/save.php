<?php
    session_start();
    require_once "./connect/connect.php";
    require_once "./php/flashSale.php";
    require_once "./php/searchMaxProduct.php";
    require_once "./php/sanphambanchay.php";
    require_once "./php/dulieusp.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VanhStore | Mua và Bán Trên Ứng Dụng Hoặc Website</title>
    <link rel="shortcut icon" href="./img1/iconLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="wrapper">
        <!-- header -->
        <div class="thongBaoSuccess">
            <div class="animation__loadWeb">
                <i class="fa-solid fa-xmark"></i>
                <img src="./img1/loadweb.png" alt="">
            </div>
        </div>
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
                                    <a href="./view/user.php" class="userLog nomation"><i class="fa-solid fa-user"></i> <?= $_SESSION['vanhstore'] ?></a>
                                    <ul class="userChil">
                                        <li><a href="./view/user.php">Tài khoản của tôi</a></li>
                                        <li><a href="./view/user.php">Hồ sơ</a></li>
                                        <li>
                                            <a href="./php/logout.php" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất hay không?')">Đăng xuất</a>
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
                        <a class="signup nomation" href="./view/dangky.php"><i class="fa fa-user-edit"></i> Đăng ký</a>
                        <div class="line-top"></div>
                        <a class="login nomation" href="./view/dangnhap.php"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="header-nav">
                <div class="container nav-bn">
                    <a href="index.php" class="header-logo-navH1">
                        <img src="./img1/vanhstore.jpg" alt="">
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
                                    <a href="./view/sanpham.php" class="vanh-navBarr__a">Sản Phẩm <i class="fa-solid fa-chevron-down"></i></a>
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
                                        <a href="./view/cart.php" class="header-with-search__cart_icon"><i class="fa-solid fa-cart-shopping"></i></a>
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
                                                                    foreach($resultSpSelectCart as $keyCart) {
                                                                        ?>
                                                                            <a href="./view/chitietsp.php?id=<?= $keyCart['id_spgiohang'] ?>" class="cart_boxContentProduct_flex">
                                                                                <div class="cart_boxContentProduct_img">
                                                                                    <div class="cart_boxContentProduct_imgChil">
                                                                                        <img src="./img1/<?= $keyCart['image'] ?>" alt="">
                                                                                    </div>
                                                                                    <div class="cart_boxContentProduct_textContent"><?= $keyCart['name_sanpham'] ?></div>
                                                                                </div>
                                                                                <div class="cart_boxContentProduct_priceProduct"><?= number_format($keyCart['price'], 0, ',', '.'); ?>đ</div>
                                                                            </a>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                <div class="cart_boxContentProduct_btnhrefProduct">
                                                                    <a href="./view/cart.php" class="aViewProduct">Xem Giỏ Hàng</a>
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
                                        <a href="./view/cart.php" class="header-with-search__cart_icon"><i class="fa-solid fa-cart-shopping"></i></a>
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
        
        <!-- Main start -->

        <div style="display: contents;">
            <div class="main__boxGroup main__boxGroup-product">
                <div class="bg_mainTop__prd">
                    <div class="section-banner-hotword--with-skin container">
                        <div class="full-home-banners-wrapper">
                            <div class="full-home-banners__flex">
                                <div class="full-home-banners">
                                    <a>
                                        <img src="./img1/d3.png" alt="">
                                    </a>
                                    <a>
                                        <img src="./img1/d12.png" alt="">
                                    </a>
                                    <a>
                                        <img src="./img1/d5.png" alt="">
                                    </a>
                                    <a>
                                        <img src="./img1/d4.png" alt="">
                                    </a>
                                    <a>
                                        <img src="./img1/d10.png" alt="">
                                    </a>
                                    <a>
                                        <img src="./img1/d13.png" alt="">
                                    </a>
                                    <a>
                                        <img src="./img1/d1.png" alt="">
                                    </a>
                                    <a>
                                        <img src="./img1/d7.png" alt="">
                                    </a>
                                    <a>
                                        <img src="./img1/d6.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="click__bannerGo">
                                <button class="click-left"><</button>
                                <button class="click-right">></button>
                            </div>
                            <div class="list-item__dostClick">
                                <div class="item item-0 active"></div>
                                <div class="item item-1"></div>
                                <div class="item item-2"></div>
                                <div class="item item-3"></div>
                                <div class="item item-4"></div>
                                <div class="item item-5"></div>
                                <div class="item item-6"></div>
                                <div class="item item-7"></div>
                                <div class="item item-8"></div>
                            </div>
                        </div>
                        <div class="full-home__item_sale">
                            <a href="">
                                <div class="sale__timeBanner-end">
                                    <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                        <div class="sale__timeBanner-end__box_image">
                                            <div class="box__img_bannerEnd box__img_1"></div>
                                        </div>
                                    </div>
                                    <div class="time__sale_box">Khung Giờ Sale</div>
                                </div>
                            </a>
                            <a href="">
                                <div class="sale__timeBanner-end">
                                    <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                        <div class="sale__timeBanner-end__box_image">
                                            <div class="box__img_bannerEnd1 box__img_1"></div>
                                        </div>
                                    </div>
                                    <div class="time__sale_box">Miễn Phí Ship - VanhStore</div>
                                </div>
                            </a>
                            <a href="">
                                <div class="sale__timeBanner-end">
                                    <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                        <div class="sale__timeBanner-end__box_image">
                                            <div class="box__img_bannerEnd2 box__img_1"></div>
                                        </div>
                                    </div>
                                    <div class="time__sale_box">Voucher Giảm Giá Lớn</div>
                                </div>
                            </a>
                            <a href="">
                                <div class="sale__timeBanner-end">
                                    <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                        <div class="sale__timeBanner-end__box_image">
                                            <div class="box__img_bannerEnd3 box__img_1"></div>
                                        </div>
                                    </div>
                                    <div class="time__sale_box">Giảm 50% Outlet</div>
                                </div>
                            </a>
                            <a href="">
                                <div class="sale__timeBanner-end">
                                    <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                        <div class="sale__timeBanner-end__box_image">
                                            <div class="box__img_bannerEnd4 box__img_1"></div>
                                        </div>
                                    </div>
                                    <div class="time__sale_box">Mã Giảm Giá</div>
                                </div>
                            </a>
                            <a href="">
                                <div class="sale__timeBanner-end">
                                    <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                        <div class="sale__timeBanner-end__box_image">
                                            <div class="box__img_bannerEnd5 box__img_1"></div>
                                        </div>
                                    </div>
                                    <div class="time__sale_box">Ngày Hội Sale Quốc Tế</div>
                                </div>
                            </a>
                            <a href="">
                                <div class="sale__timeBanner-end">
                                    <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                        <div class="sale__timeBanner-end__box_image">
                                            <div class="box__img_bannerEnd6 box__img_1"></div>
                                        </div>
                                    </div>
                                    <div class="time__sale_box">Hot Trend Giá Sốc</div>
                                </div>
                            </a>
                            <a href="">
                                <div class="sale__timeBanner-end">
                                    <div class="sale__timeBanner-end__box sale__timeBanner-end__box2">
                                        <div class="sale__timeBanner-end__box_image">
                                            <div class="box__img_bannerEnd7 box__img_1"></div>
                                        </div>
                                    </div>
                                    <div class="time__sale_box">Giá Rẻ Bất Ngờ</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="dm__main container">
                        <div></div>
                        <div class="section-below-the-fold">

                        <!-- Danh mục sản phẩm -->

                            <div class="vanhstore__header_simpleBox">
                                <div class="vanhstore-header-section__header">
                                    <div class="vanhstore-header-section__header__title">Danh Mục Sản Phẩm</div>
                                </div>
                                <div class="vanhstore-header-section__content">
                                    <div class="image-carousel">
                                        <ul class="image-carousel__item-list">
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image"></div>
                                                    <div class="image-carousel__image-text">
                                                        Các Mẫu Quần Mới
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image2"></div>
                                                    <div class="image-carousel__image-text">
                                                        Thời Trang Nam
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image3"></div>
                                                    <div class="image-carousel__image-text">
                                                        Thời Trang Nữ
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image4"></div>
                                                    <div class="image-carousel__image-text">
                                                        Áo Khoác
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image5"></div>
                                                    <div class="image-carousel__image-text">
                                                        Phụ Kiện & Thời Trang
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image6"></div>
                                                    <div class="image-carousel__image-text">
                                                        Mẫu Áo Mới Nhất
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image7"></div>
                                                    <div class="image-carousel__image-text">
                                                        Giày Thể Thao
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="image-carousel__item-list">
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image"></div>
                                                    <div class="image-carousel__image-text">
                                                        Các Mẫu Quần Mới
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image2"></div>
                                                    <div class="image-carousel__image-text">
                                                        Thời Trang Nam
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image3"></div>
                                                    <div class="image-carousel__image-text">
                                                        Thời Trang Nữ
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image4"></div>
                                                    <div class="image-carousel__image-text">
                                                        Áo Khoác
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image5"></div>
                                                    <div class="image-carousel__image-text">
                                                        Phụ Kiện & Thời Trang
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image6"></div>
                                                    <div class="image-carousel__image-text">
                                                        Mẫu Áo Mới Nhất
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="image-carousel__title">
                                                <a href="" class="image-carousel__contentA">
                                                    <div class="image-carousel__image7"></div>
                                                    <div class="image-carousel__image-text">
                                                        Giày Thể Thao
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- End danh mục sản phẩm -->

                            <!-- Flast sale and clock -->

                            <div style="display: contents;">
                                <div class="oclock_flashsale">
                                    <div class="vanh-header-section__header">
                                        <div class="vanh-header-section__content_flash_andClock">
                                            <div class="vanh-header-section__content_flash">
                                            </div>
                                            <div class="section__content_flashClock">
                                                <span id="hrs">00</span>
                                                <span id="minu">00</span>
                                                <span id="seco">00</span>
                                            </div>
                                        </div>
                                        <a href="">Xem Tất Cả <i class="fa-solid fa-chevron-right"></i></a>
                                    </div>
                                    <div class="oclock_slider__banner">
                                        <div class="oclock_sliderBar-BoxFull">
                                            <ul class="oclock_slider__banner_img">
                                                <div class="oclock_slider__banner_Boximg">
                                                    <a>
                                                        <img src="./img1/d19.png" alt="">
                                                    </a>
                                                    <a>
                                                        <img src="./img1/bs1.png" alt="">
                                                    </a>
                                                    <a>
                                                        <img src="./img1/a28.jpg" alt="">
                                                    </a>
                                                    <a>
                                                        <img src="./img1/a14.jpg" alt="">
                                                    </a>
                                                    <a>
                                                        <img src="./img1/d13.png" alt="">
                                                    </a>
                                                </div>
                                            </ul>
                                            <div class="oclock_control__slider">
                                                <button class="oclock_control__slider_back"><</button>
                                                <button class="oclock_control__slider_next">></button>
                                            </div>
                                            <div class="oclock_dostSlider">
                                                <div class="dost dost-0 activeSlider__oclock"></div>
                                                <div class="dost dost-1"></div>
                                                <div class="dost dost-2"></div>
                                                <div class="dost dost-3"></div>
                                                <div class="dost dost-4"></div>
                                            </div>
                                        </div>
                                        <div class="oclock__Flashsale_timeSlider">
                                            <div class="clock">
                                                <div style="--clr:#ee4d2d; --h:57px;" id="hour" class="hand"><i></i></div>
                                                <div style="--clr:#214789; --h:75px;" id="min" class="hand"><i></i></div>
                                                <div style="--clr:#000000; --h:88px;" id="sec" class="hand"><i></i></div>
                                                <span style="--i:1;"><b>1</b></span>
                                                <span style="--i:2;"><b>2</b></span>
                                                <span style="--i:3;"><b>3</b></span>
                                                <span style="--i:4;"><b>4</b></span>
                                                <span style="--i:5;"><b>5</b></span>
                                                <span style="--i:6;"><b>6</b></span>
                                                <span style="--i:7;"><b>7</b></span>
                                                <span style="--i:8;"><b>8</b></span>
                                                <span style="--i:9;"><b>9</b></span>
                                                <span style="--i:10;"><b>10</b></span>
                                                <span style="--i:11;"><b>11</b></span>
                                                <span style="--i:12;"><b>12</b></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="oclock_time-right__banner">
                                        <div class="oclock__Flashsale_timeSlider_nav">
                                            <ul id="oclock__Flashsale_timeSlider_ul" class="oclock__Flashsale_timeSlider_ul">
                                                <?php
                                                    if($resultFlash) {
                                                        foreach($resultFlash as $item) {
                                                            $formatted_price = number_format($item['price'], 0, ',', '.');
                                                            ?>
                                                                <li class="oclock__Flashsale_timeSlider_li">
                                                                    <div class="oclock__Flashsale_div">
                                                                        <a href="./view/chitietsp.php?id=<?= $item['id_spBanChay'] ?>" class="oclock__Flashsale_timeSlider_a">
                                                                            <div class="Flashsale_timeSlider_BoxImageS">
                                                                                <img src="./img1/<?= $item['image'] ?>">
                                                                                <div class="Flashsale_timeSlider_textSpan">
                                                                                    <span class="Flashsale_timeSlider_Span">Sale</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="Flashsale_timeSlider_BoxTextS">
                                                                                <div class="Flashsale_timeSlider_BoxTextS_price">
                                                                                    đ <?= $formatted_price ?>
                                                                                </div>
                                                                                <div class="Flashsale_timeSlider_BoxTextS_updateSale">
                                                                                    <div class="Flashsale_timeSlider_BoxTextS_updateSaleNumber">
                                                                                        <div class="BoxTextS_Image_sendSuccess"></div>
                                                                                        <div class="BoxTextS_sendSuccess_content">
                                                                                            <?= $item['about_ban'] ?>
                                                                                        </div>
                                                                                        <div class="BoxTextS_sendSuccess_bg"></div>
                                                                                        <div class="BoxTextS_sendSuccess_bg_2"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="carousel-arrow carousel-arrow--prev carousel-arrow--hint">
                                            <button id="carousel-arrow--prev__icon" class="carousel-arrow--prev__icon"><i class="fa-solid fa-angle-left"></i></button>
                                        </div>
                                        <div class="carousel-arrow carousel-arrow--next carousel-arrow--hint">
                                            <button id="carousel-arrow--next__icon" class="carousel-arrow--next__icon"><i class="fa-solid fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    
                            <!-- end Flast Sale -->

                            <!-- Banner Sale2 -->
                                
                            <div class="" style="margin-top: 20px; height: 110px;">
                                <div class="simple-banner">
                                    <img class="banner-image" role="presentation" alt="" src="./img1/fva.jpg">
                                    <div class="click-sections-wrapper">
                                        <a class="click-section" target="_self" href="">
                                            <!---->
                                            Banner flast sale 2
                                            <!---->
                                        </a>
                                        <a class="click-section" target="_self" href="">
                                            <!---->
                                            Banner flast sale 2  0
                                            <!---->
                                        </a>
                                        <a class="click-section" target="_self" href="">
                                            <!---->
                                            Banner flast sale 2
                                            <!---->
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- End Banner Sale2 -->

                            <!-- Free vận chuyển -->

                            <div class="homepage-mall-section">
                                <div class="vanh-header-section F--Nrr vanh-header-section--simple">
                                    <div class="vanh-header-section__header">
                                        <div class="vanh-header-section__header__title">
                                            <div class="chil__sale_logoFl">
                                                <a class="freeVc" href="/mall">Vanh Shop</a>
                                                <div class="freeVc_Box_logoS">
                                                    <div class="freeVc_Box_logoS__Box1">
                                                        <img class="freeVc_Box_logoS__Box1_img1" src="./img1/t1.png" alt=""> 7 ngày miễn phí trả hàng
                                                    </div>
                                                    <div class="freeVc_Box_logoS__Box1">
                                                        <img class="freeVc_Box_logoS__Box1_img1" src="./img1/t2.png" alt=""> Hàng chính hãng 100%
                                                    </div>
                                                    <div class="freeVc_Box_logoS__Box1">
                                                        <img class="freeVc_Box_logoS__Box1_img1" src="./img1/t3.png" alt=""> Miễn phí vận chuyển
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vanh-header-section__header-link">
                                            <button class="vanh-button-no-outline">
                                                <a href="" class="vanh-a-no-outline">
                                                    <div class="vanh-div-no-outline">
                                                        Xem tất cả
                                                        <div class="vanh-icon-no-outline">
                                                            <i class="fa-solid fa-chevron-right"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="vanh-header-section__content">
                                        <div class="vanh-header-section__content_imgS">
                                            <div style="width: 100%;">
                                                <div class="vanh-banner-content_imgS__carousel">
                                                    <div class="vanh-banner-content_imgS__carouselList_Img">
                                                        <ul class="stardust-carousel2__item-list__image">
                                                            <a class="stardust-carousel2__item-list__li">
                                                                <img src="./img1/a38.jpg" alt="">
                                                            </a>
                                                            <a class="stardust-carousel2__item-list__li">
                                                                <img src="./img1/a36.jpg" alt="">
                                                            </a>
                                                            <a class="stardust-carousel2__item-list__li">
                                                                <img src="./img1/a44.jpg" alt="">
                                                            </a>
                                                            <a class="stardust-carousel2__item-list__li">
                                                                <img src="./img1/bh.jpg" alt="">
                                                            </a>
                                                        </ul>
                                                        <div class="box__dost__banner3">
                                                            <div class="dostB3 dostB3-0 dostB3_active"></div>
                                                            <div class="dostB3 dostB3-1"></div>
                                                            <div class="dostB3 dostB3-2"></div>
                                                            <div class="dostB3 dostB3-3"></div>
                                                        </div>
                                                        <div class="box__nextBack__banner3">
                                                            <button class="backBanner3"><</button>
                                                            <button class="nextBanner3">></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="vanh-header-section__content_productS">
                                            <div class="BoximageContentS-carousel">
                                                <div class="BoximageContentS-carousel__wrapperB">
                                                    <ul id="ulControl" class="BoximageContentS-carousel__wrapperB_ul"> 
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image yM9KRq">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image yM9KRq">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image yM9KRq">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image yM9KRq">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image yM9KRq">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image yM9KRq">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image yM9KRq">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image yM9KRq">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="BoximageContentS-carousel__wrapperB_lis">
                                                            <div>
                                                                <div class="ofs-carousel__item">
                                                                    <a class="ofs-carousel__shop-cover-image" href="">
                                                                        <div class="ofs-carousel__shop-cover-image_chil_div">
                                                                            <div class="ofs-carousel__cover-image bgr_yzProduct">

                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <div class="ofs-carousel__item__text">
                                                                        Ưu đãi đến 50%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="BoximageContentS-carousel__wrapperB_controlS">
                                                    <button id="preControl" class="pre_control"><i class="fa-solid fa-angle-left"></i></button>
                                                    <button id="neControl" class="ne_control"><i class="fa-solid fa-angle-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End Free vận chuyển -->
                            
                            <!-- Tìm kiếm nhiều nhất -->

                            <div class="container">
                                <div class="maybe-you-like">
                                    <div style="display: contents;">
                                        <div class="text-header-you">
                                            <div class="tile-like-headerMay">
                                                <div>Tìm kiếm nhiều nhất</div>
                                            </div>
                                            <a href="" class="view-full-product-link">
                                                <button class="icon-next-view-link">
                                                    Xem Tất Cả
                                                    <i class="fa-solid fa-chevron-right"></i>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="productS-link-full-view viewOne">
                                            <?php
                                                if($resultSearchMax) {
                                                    foreach($resultSearchMax as $itemSearchMax) {
                                                        $priceFomatSearch = number_format($itemSearchMax['price'], 0, ',', '.');
                                                        ?>
                                                            <div class="productS-full-link-view">
                                                                <a href="./view/chitietsp.php?id=<?= $itemSearchMax['id_spBanChay'] ?>" class="">
                                                                    <div class="prd-v2">
                                                                        <div class="prd-v3">
                                                                            <div style="pointer-events: none;">
                                                                                <div class="prd-img-hv">
                                                                                    <img src="./img1/<?= $itemSearchMax['image'] ?>" class="prd-img" alt="">
                                                                                    <div class="yt-prd">
                                                                                        <div class="yt-chill rgba-yt-chil">
                                                                                            <span class="span-yt-chil span-yt-prd">Hot</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="prd-v3-chil">
                                                                                <div class="prd-v3-title-text">
                                                                                    <div class="prd-v3-box-text">
                                                                                        <div class="prd-v3-text">
                                                                                            <?= $itemSearchMax['name'] ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="prd-v3-price prd-v3-price-bv">
                                                                                    <div class="prd-v3-price-textChil">
                                                                                        <span class="prd-v3-price-textChil-span">
                                                                                            <?= $priceFomatSearch ?>đ
                                                                                        </span>
                                                                                    </div>
                                                                                    <div class="check-sub-success">
                                                                                        <?= $itemSearchMax['about_ban'] ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End Tìm kiếm nhiều nhất -->

                            <div class="section-recommend-products-wrapper">
                                <div style="display: contents;">
                                    <div>
                                        <div class="section-recommend-products-wrapper__Box">
                                            <div class="stardust-tabs-header-anchor"></div>
                                            <nav class="stardust-tabs-header-wrapper">
                                                <ul class="stardust-tabs-header">
                                                    <li class="stardust-tabs-header__tab stardust-tabs-header__tab--active">
                                                        <div class="rTmd0c zJaHI0"></div>
                                                        <div tabindex="0" class="span__stardust-tabs-header__tab"><span>SẢN PHẨM BÁN CHẠY</span></div>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <div class="stardust-tabs-header-product">
                                                <section class="stardust-tabs-panels__panel" style="display: block;">
                                                    <div class="stardust-tabs-panels__panel_navS">
                                                        <?php
                                                            if($resultSPBanChay) {
                                                                foreach($resultSPBanChay as $itemSpBanChay) {
                                                                    $priceFomatSPBanChay = number_format($itemSpBanChay['price'], 0, ',', '.');
                                                                    ?>
                                                                        <div class="stardust-tabs-panels__panel_navSChilrent">
                                                                            <a href="./view/chitietsp.php?id=<?= $itemSpBanChay['id_spBanChay'] ?>" class="stardust-tabs-panels__flexHref">
                                                                                <div class="stardust-tabs-panels__ColumFlex__div">
                                                                                    <div class="stardust-tabs-panels__ColumFlex_img">
                                                                                        <img src="./img1/<?= $itemSpBanChay['image'] ?>" alt="">
                                                                                        <div class="ColumFlex_img__spanSale">
                                                                                            <span class="ColumFlex_img__span">Sale</span>
                                                                                        </div>
                                                                                        <div class="ColumFlex_img__spanSalePt">
                                                                                            <span class="ColumFlex_img__textSaleContent"><?= $itemSpBanChay['sale'] ?></span>
                                                                                            <span class="ColumFlex_img__textSaleGiam">GIẢM</span>
                                                                                        </div>
                                                                                        <!-- <div class="ColumFlex_img__bgrImage">
                                                                                            <img src="../../img1/bgpr.png" alt="">
                                                                                        </div> -->
                                                                                    </div>
                                                                                    <div class="stardust-tabs-panels__ColumFlex_BoxText">
                                                                                        <div class="stardust-ColumFlex_title">
                                                                                            <?= $itemSpBanChay['name'] ?>
                                                                                        </div>
                                                                                        <div class="stardust-ColumFlex_Boxprice">
                                                                                            <div class="stardust-ColumFlex_Boxprice">
                                                                                                <?= $priceFomatSPBanChay ?> đ
                                                                                            </div>
                                                                                            <div class="stardust-ColumFlex_clickPrice">
                                                                                                <?= $itemSpBanChay['about_ban'] ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
                                                        
                                                        <div class="btn__click_stardust__product">
                                                            <a class="btn btn-light btn--m btn--inline btn-light--link btn__click___productAhref" href="">Xem thêm</a>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <!-- end main -->
                </div>
            </div>
        </div>

        <!-- footer -->

        <footer>

            <div class="delivery container">
                <div class="delivery-content">
                    <img src="./img1/giaohang1.png" alt="">
                    <div class="delivery-text">
                        <h3>GIAO HÀNG MIỄN PHÍ</h3>
                        <P>Toàn cầu từ 75k</P>
                    </div>
                </div>
                <div class="delivery-content">
                    <img src="./img1/giaohang2.png" alt="">
                    <div class="delivery-text">
                        <h3>DỄ DÀNG ĐỔI TRẢ</h3>
                        <P>Đổi trả thoải mái trong 30 ngày</P>
                    </div>
                </div>
                <div class="delivery-content">
                    <img src="./img1/giaohang3.png" alt="">
                    <div class="delivery-text">
                        <h3>THANH TOÁN NHANH</h3>
                        <P>Thẻ tín dụng có sẵn</P>
                    </div>
                </div>
                <div class="delivery-content">
                    <img src="./img1/giaohang4.png" alt="">
                    <div class="delivery-text">
                        <h3>QUÀ TẶNG MIỄN PHÍ</h3>
                        <P>Nhận quà tặng và giảm giá</P>
                    </div>
                </div>
            </div>

            <div class="footer-information container">
                <div class="footer-text">
                    <img class="logo__vanhCart_footer" src="./img1/vanhcart.jpg" alt="">
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
                    <h2>Sản phẩm</h2>
                    <div class="address-footer-hover">
                        <ul>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Quần áo</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Giày dép</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Sale sản phẩm</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Phụ kiện</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Hot trend</a></li>
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
    <script src="./js/trangchu2.js"></script>
</body>
</body>

</html>