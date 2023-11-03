<?php
    session_start();

    require_once "../connect/connect.php";

    $querySPBanChay = "SELECT * FROM sanphambanchay";
    $stateSPBanChay = $db->prepare($querySPBanChay);
    $stateSPBanChay->execute();
    $resultSPBanChay = $stateSPBanChay->fetchAll(PDO::FETCH_ASSOC);

    // Lấy dữ liệu trong datebase để show ra trang giỏ hàng
    $querySpSelect = "SELECT * FROM giohang";
    $stateSpSelect = $db->prepare($querySpSelect);
    $stateSpSelect->execute();
    $resultSpSelect = $stateSpSelect->fetchAll(PDO::FETCH_ASSOC);

    // select số sản phẩm giỏ hàng icon
    $querySpSelectCart = "SELECT * FROM giohang LIMIT 5 OFFSET 0";
    $stateSpSelectCart = $db->prepare($querySpSelectCart);
    $stateSpSelectCart->execute();
    $resultSpSelectCart = $stateSpSelectCart->fetchAll(PDO::FETCH_ASSOC);

    // Đếm sản phẩm trong giỏ hàng để show ra
    $queryCountProducts = "SELECT COUNT(*) AS total_products FROM giohang";
    $stateCountProducts = $db->prepare($queryCountProducts);
    $stateCountProducts->execute();
    $rowCountProducts = $stateCountProducts->fetch(PDO::FETCH_ASSOC);
    $totalProducts = $rowCountProducts['total_products'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img1/iconLogo.png" type="image/x-icon">
    <title>VanhStore | Sản Phẩm Mua Bán Và Trao Đổi</title>
    <link rel="stylesheet" href="../css/sanpham.css">
</head>

<body>
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
                    <a class="signup nomation" href="dangky.php"><i class="fa fa-user-edit"></i> Đăng ký</a>
                    <div class="line-top"></div>
                    <a class="login nomation" href="dangnhap.php"><i class="fa fa-sign-in"></i> Đăng nhập</a>
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
                                <a href=".php" class="vanh-navBarr__a">Sản Phẩm <i class="fa-solid fa-chevron-down"></i></a>
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
                    if (isset($_SESSION['vanhstore'])) {
                    ?>
                        <div class="header-with-search__cart_hoverProductCart">
                            <a href="p" class="header-with-search__cart_icon"><i class="fa-solid fa-cart-shopping"></i></a>
                            <div class="amount__sessionCart">
                                <span class="cart-item-count"><?= $totalProducts ?></span>
                            </div>
                            <?php
                            if ($resultSpSelectCart && count($resultSpSelectCart) > 0) {
                            ?>
                                <div class="hoverProduct__cart">
                                    <div class="list__hoverProduct__cart">
                                        <div class="hoverProduct__cart_textTop">Sản phẩm mới thêm</div>
                                        <div class="list_hoverProduct__cart_boxContentProduct">
                                            <?php
                                            foreach ($resultSpSelectCart as $key) {
                                            ?>
                                                <a href="sp.php?id=<?= $key['id_spgiohang'] ?>" class="cart_boxContentProduct_flex">
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
                                                <a href="p" class="aViewProduct">Xem Giỏ Hàng</a>
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
                            <a href="p" class="header-with-search__cart_icon"><i class="fa-solid fa-cart-shopping"></i></a>
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

    <div class="main container">
        <div class="section-recommend-products-wrapper">
            <div style="display: contents;">
                <div>
                    <div class="section-recommend-products-wrapper__Box">
                        <div class="stardust-tabs-header-anchor"></div>
                        <nav class="stardust-tabs-header-wrapper">
                            <ul class="stardust-tabs-header">
                                <li class="stardust-tabs-header__tab stardust-tabs-header__tab--active">
                                    <div class="rTmd0c zJaHI0"></div>
                                    <div tabindex="0" class="span__stardust-tabs-header__tab"><span>SẢN PHẨM CỦA TÔI</span></div>
                                </li>
                            </ul>
                        </nav>
                        <div class="stardust-tabs-header-product">
                            <section class="stardust-tabs-panels__panel" style="display: block;">
                                <div class="stardust-tabs-panels__panel_navS">
                                    <?php
                                    if ($resultSPBanChay) {
                                        foreach ($resultSPBanChay as $itemSpBanChay) {
                                            $priceFomatSPBanChay = number_format($itemSpBanChay['price'], 0, ',', '.');
                                    ?>
                                            <div class="stardust-tabs-panels__panel_navSChilrent">
                                                <a href="sp.php?id=<?= $itemSpBanChay['id_spBanChay'] ?>" class="stardust-tabs-panels__flexHref">
                                                    <div class="stardust-tabs-panels__ColumFlex__div">
                                                        <div class="stardust-tabs-panels__ColumFlex_img">
                                                            <img src="../img1/<?= $itemSpBanChay['image'] ?>" alt="">
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
                                </div>
                            </section>
                            <section class="stardust-tabs-panels__panel" style="display: block;">
                                <div class="stardust-tabs-panels__panel_navS">
                                    <?php
                                    if ($resultSPBanChay) {
                                        foreach ($resultSPBanChay as $itemSpBanChay) {
                                            $priceFomatSPBanChay = number_format($itemSpBanChay['price'], 0, ',', '.');
                                    ?>
                                            <div class="stardust-tabs-panels__panel_navSChilrent">
                                                <a href="sp.php?id=<?= $itemSpBanChay['id_spBanChay'] ?>" class="stardust-tabs-panels__flexHref">
                                                    <div class="stardust-tabs-panels__ColumFlex__div">
                                                        <div class="stardust-tabs-panels__ColumFlex_img">
                                                            <img src="../img1/<?= $itemSpBanChay['image'] ?>" alt="">
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

    <!-- footer -->

    <footer>

        <div class="delivery container">
            <div class="delivery-content">
                <img src="../img1/giaohang1.png" alt="">
                <div class="delivery-text">
                    <h3>GIAO HÀNG MIỄN PHÍ</h3>
                    <P>Toàn cầu từ 75k</P>
                </div>
            </div>
            <div class="delivery-content">
                <img src="../img1/giaohang2.png" alt="">
                <div class="delivery-text">
                    <h3>DỄ DÀNG ĐỔI TRẢ</h3>
                    <P>Đổi trả thoải mái trong 30 ngày</P>
                </div>
            </div>
            <div class="delivery-content">
                <img src="../img1/giaohang3.png" alt="">
                <div class="delivery-text">
                    <h3>THANH TOÁN NHANH</h3>
                    <P>Thẻ tín dụng có sẵn</P>
                </div>
            </div>
            <div class="delivery-content">
                <img src="../img1/giaohang4.png" alt="">
                <div class="delivery-text">
                    <h3>QUÀ TẶNG MIỄN PHÍ</h3>
                    <P>Nhận quà tặng và giảm giá</P>
                </div>
            </div>
        </div>

        <div class="footer-information container">
            <div class="footer-text">
                <img class="logo__vanhCart_footer" src="../img1/vanhcart.jpg" alt="">
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
</body>

</html>