<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>
        <?php
            if(!isset($action)) {
                ?>
                    VanhStore | Mua và Bán Trên Ứng Dụng Hoặc Website
                <?php
            } else if ($action == 'chi-tiet-sanpham') {
                echo $chitiet_product['product_name'];
            } else {
                ?>
                    VanhStore | Mua và Bán Trên Ứng Dụng Hoặc Website
                <?php
            }
        ?>
    </title>
    <link rel="shortcut icon" href="./img1/iconLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/loadding.css">
    <link rel="stylesheet" href="./css/danhmuc.css">
    <?php
        if(isset($_GET['action']) == "") {
            ?>
                <link rel="stylesheet" href="./css/index.css">
            <?php
        } else if($_GET['action'] == "user") {
            ?>
                <link rel="stylesheet" href="./css/user.css">
            <?php
        } else if($_GET['action'] == "search") {
            ?>
                <link rel="stylesheet" href="./css/viewsearch.css">
            <?php
        } else if($_GET['action'] == "danh-muc") {
            ?>
                <link rel="stylesheet" href="./css/danhmuc.css">
            <?php
        } else {
            ?>
                <link rel="stylesheet" href="./css/chitietsp.css">
            <?php
        }
    ?>
</head>
<body>

    <?php
        if(isset($_GET['detail_product']) || isset($_GET['user'])) {
        
        } else {
            ?>
                <div id="loading-overlay">
                    <div class="loader"></div>
                </div>
            <?php
        }
    ?>
    <div class="wrapper">
        <!-- header -->

        <!-- <div class="thongBaoSuccess">
            <div class="animation__loadWeb">
                <i class="fa-solid fa-xmark"></i>
                <img src="./img1/loadweb.png" alt="">
            </div>
        </div> -->
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
                            if($user) {
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
                                                <a href="index.php?action=user" class="userLog nomation"><i class="fa-solid fa-user"></i> <?= $user ? $user['firth_name']." ".$user['last_name'] : "" ?></a>
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
            <div class="header-nav">
                <div class="container nav-bn">
                    <a href="index.php" class="header-logo-navH1">
                        <img src="./img1/vanhstore.jpg" alt="">
                    </a>
                    <div class="header-with-search">
                        <form action="index.php?action=search" autocomplete="off" method="POST" role="search" class="vanh-searchbar-form">
                            <div class="vanh-searchbar">
                                <div class="vanh-searchbar__main">
                                    <?php
                                        if(isset($user)) {
                                            ?>
                                                <input type="text" name="keyword" list="listSearch" class="vanh-searchbar-form-input" placeholder="SALE TOÀN BỘ SẢN PHẨM LÊN ĐẾN 50%">
                                            <?php
                                        } else {
                                            ?>
                                                <input type="text" name="keyword" list="listSearch" class="vanh-searchbar-form-input" placeholder="Miễn phí ship 0đ - Đăng ký ngay!">
                                            <?php
                                        }
                                    ?>  
                                </div>
                                <div class="btn__click_view_search_pr">
                                    <input type="submit" name="searchProduct" value=" " class="btn btn-chil-icon btn-solid-primary btn--s btn--inline vanh-searchbar__search-button">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                            </div>
                        </form>
                        <div class="vanh-navBarr__main">
                            <ul class="vanh-navBarr__Ul-li">
                                <li class="megamenu__li">
                                    <a href="index.php?action=san-pham" class="vanh-navBarr__a">Sản Phẩm <i class="fa-solid fa-chevron-down"></i></a>
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
                            if($user) {
                                ?>
                                    <div class="header-with-search__cart_hoverProductCart">
                                        <a href="index.php?action=gio-hang" class="header-with-search__cart_icon"><i class="fa-solid fa-cart-shopping"></i></a>
                                            <?php
                                                if($countProduct_cart['countProduct_cart']) {
                                                    ?>
                                                        <div class="amount__sessionCart">
                                                            <span class="cart-item-count"><?= $countProduct_cart['countProduct_cart'] ?></span>
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                            
                                            <?php
                                                if($countProduct_cart['countProduct_cart'] && $countProduct_cart['countProduct_cart'] > 0) {
                                                    ?>
                                                        <div class="hoverProduct__cart">
                                                            <div class="list__hoverProduct__cart">
                                                                <div class="hoverProduct__cart_textTop">Sản phẩm mới thêm</div>
                                                                <div class="list_hoverProduct__cart_boxContentProduct">
                                                                    <?php
                                                                        foreach($listCart as $cartHeader) {
                                                                            ?>
                                                                                <a href="index.php?action=chi-tiet-sanpham&detail_product=<?= $cartHeader['product_id'] ?>" class="cart_boxContentProduct_flex">
                                                                                    <div class="cart_boxContentProduct_img">
                                                                                        <div class="cart_boxContentProduct_imgChil">
                                                                                            <img src="./public/upload/image/product/<?= explode(",", $cartHeader['images'])[0] ?>" alt="">
                                                                                        </div>
                                                                                        <div class="cart_boxContentProduct_textContent"><?= $cartHeader['product_name'] ?></div>
                                                                                    </div>
                                                                                    <div class="cart_boxContentProduct_priceProduct">₫<?= number_format($cartHeader['price'], 0, ",", ".") ?></div>
                                                                                </a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    
                                                                    <div class="cart_boxContentProduct_btnhrefProduct">
                                                                        <a href="index.php?action=gio-hang" class="aViewProduct">Xem Giỏ Hàng</a>
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
                                        </a>
                                    </div>
                                <?php
                            } else {
                                ?>
                                    <div class="header-with-search__cart_hoverProductCart">
                                        <a href="index.php?action=gio-hang" class="header-with-search__cart_icon"><i class="fa-solid fa-cart-shopping"></i></a>
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