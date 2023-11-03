<?php
    session_start();

    require_once "../connect/connect.php";
    require_once "../php/giaohang.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        if($id && $id > 0) {
            $query = "SELECT * FROM sanphambanchay WHERE id_spBanChay = :id LIMIT 1";
            $state = $db->prepare($query);
            $data = [
                ':id' => $id
            ];
            $state->execute($data);
            $result = $state->fetch(PDO::FETCH_ASSOC);
            if($result) {
                $new_product = [
                    'id_spBanChay' => $id,
                    'image' => $result['image'],
                    'name' => $result['name'],
                    'price' => $result['price'],
                    'price_throw' => $result['price_throw'],
                    'amount_daban' => $result['amount_daban']
                ];
            }
        }
    }

    $querySet = "SELECT
        sanphambanchay.id_ship,
        giaohang.id_ship,
        giaohang.name_ship
    FROM
        webvanh.sanphambanchay
    INNER JOIN
        webvanh.giaohang ON sanphambanchay.id_ship = giaohang.id_ship;
    ";
    $stateSet = $db->prepare($querySet);
    $stateSet->execute();
    $resultSet = $stateSet->fetchAll(PDO::FETCH_ASSOC);

    // select sản phẩm bán chạy
    $querySPBanChay = "SELECT * FROM sanphambanchay";
    $stateSPBanChay = $db->prepare($querySPBanChay);
    $stateSPBanChay->execute();
    $resultSPBanChay = $stateSPBanChay->fetchAll(PDO::FETCH_ASSOC);

    // select giỏ hàng icon
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $result['name'] ?></title>
    <link rel="shortcut icon" href="../../img1/iconLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/chitietsp.css">
</head>

<body>
    <div class="wrapper">

        <div class="boxAnimationSuccess">
            <div class="thongBaoSuccess">
                <div class="thongBaoSuccess_div__icon">
                    <i class="fa-solid fa-check"></i>
                </div>
                <div class="thongBaoSuccess_div__ss">
                    Thêm Vào Giỏ Hàng Thành Công
                </div>
            </div>
        </div>
        <!-- Header -->

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
                            if(isset($_SESSION['vanhstore'])) {
                                ?>
                                    <div class="header-with-search__cart_hoverProductCart">
                                        <a href="p" class="header-with-search__cart_icon"><i class="fa-solid fa-cart-shopping"></i></a>
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

        <!-- Main -->

        <div class="main">
            <div class="container">
                <div class="flex items-center page-product__main">
                    <a class="page-product__main_a" href="/trangchu2.php">VanhStore</a>
                    <i class="fa-solid fa-angle-right"></i>
                    <a class="page-product__main_a" href="/trangchu2.php">Sản Phẩm Chi Tiết</a>
                    <i class="fa-solid fa-angle-right"></i>
                    <span class="page-product__main_span"><?= $result['name'] ?></span>
                </div>
                <div class="product-briefing_main">
                    <div></div>
                    <div class="flex_product-briefing_image">
                        <div class="flex flex-column">
                            <div class="flex-column flex-column__chil">
                                <div class="flex-column__chil_pictur">
                                    <div class="chil_pictur">
                                        <img id="onmouseoverImg" class="onmouseoverImg" src="../img1/<?= $result['image'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="flex-column__chil_img_hover">
                                    <div class="flex-column__chil_img_transform">
                                        <div class="img__onmouseo">
                                            <img name="img_product" src="../img1/<?= $result['image'] ?>" class="list-img img__onmouseo-border" alt="">
                                        </div>
                                        <div class="img__onmouseo">
                                            <img src="../img1/<?= $result['img2'] ?>" class="list-img" alt="">
                                        </div>
                                        <div class="img__onmouseo">
                                            <img src="../img1/<?= $result['img3'] ?>" class="list-img" alt="">
                                        </div>
                                        <div class="img__onmouseo">
                                            <img src="../img1/<?= $result['img4'] ?>" class="list-img" alt="">
                                        </div>
                                        <div class="img__onmouseo">
                                            <img src="../img1/<?= $result['img5'] ?>" class="list-img" alt="">
                                        </div>
                                        <div class="img__onmouseo">
                                            <img src="../img1/<?= $result['img6'] ?>" class="list-img" alt="">
                                        </div>
                                        <div class="img__onmouseo">
                                            <img src="../img1/<?= $result['img7'] ?>" class="list-img" alt="">
                                        </div>
                                    </div>
                                    <button id="back__onmouseo" class="back__onmouseo"><i class="fa-solid fa-angle-left"></i></button>
                                    <button id="next__onmouseo" class="next__onmouseo"><i class="fa-solid fa-angle-right"></i></button>
                                </div>
                            </div>
                            <div class="flex-column__likeweb">
                                <div class="flex-colum__likeweb_icon">
                                    <span class="share__text_likeweb">Chia sẻ:</span>
                                    <a href="" class="btn__bg_iconclick_mess icon__click"></a>
                                    <a href="" class="btn__bg_iconclick_fb icon__click"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex_product-briefing_text flex-auto">
                        <form id="productForm" action="uct.php?id=<?= $result['id_spBanChay'] ?>" method="post">
                            <input type="hidden" name="id_sanpham" value="<?= $value['id_sanpham'] ?>">
                            <div class="flex__product-text">
                                <div class="box-flex__product-text">
                                    <span class="nameSp" name="name"><?= $result['name'] ?></span>
                                </div>
                                <div class="box-flex__product-text_icon_star">
                                    <div class="flex_assess_icon_star">
                                        <div class="text_icon_star">
                                            4.9
                                        </div>
                                        <div class="boxicon_star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="flex_assess">
                                        <div class="flex_assess_number"><?= $result['danhgia'] ?></div>
                                        <div class="flex_assess_text">Đánh Giá</div>
                                    </div>
                                    <div class="flex_sold">
                                        <div class="flex_sold_number"><?= $result['amount_daban'] ?></div>
                                        <div class="flex_sold_text">Đã Bán</div>
                                    </div>
                                </div>
                                <div style="margin-top: 25px;">
                                    <div class="flex-colum_price_product">
                                        <div class="flex_price__product">
                                            <div class="flex_price__product_span">
                                                Giá Bán:
                                            </div>
                                            <div class="flex_price__product_text">
                                                <div class="flex_price__product_text_throw" name="priceThrow"><?= number_format($result['price_throw'], 0, ',', '.'); ?>đ</div>
                                                <div class="flex_price__product_text" name="price"><?= number_format($result['price'], 0, ',', '.'); ?>đ</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex__click_form">
                                    <div>
                                        <div class="flex-column">
                                            <div class="flex-column__shipS">
                                                <div class="flex-column__shipS_span">
                                                    Vận Chuyển
                                                </div>
                                                <div class="flex-column__shipS_selectBox">
                                                    <select name="selectBox" id="selectBox">
                                                        <?php
                                                            if($resultGiaoHang) {
                                                                foreach($resultGiaoHang as $itemShipS) {
                                                                    ?>
                                                                        <option value="<?= $itemShipS['id_ship'] ?>"><?= $itemShipS['name_ship'] ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="flex-column__Box__information">
                                                <div class="flex__column_color">
                                                    <div class="flex__column_color_text">Màu Sắc</div>
                                                    <div class="flex__column_color_clickBox">
                                                        <button class="color_tee_product" data-value="Áo Đen">Áo Đen</button>
                                                        <button class="color_tee_product" data-value="Áo Đen">Áo Trắng</button>
                                                    </div>
                                                </div>
                                                <div class="err-color__mau"></div>
                                                <div class="flex__column_size">
                                                    <div class="flex__column_size_text">Size</div>
                                                    <div class="flex__column_size_clickBox">
                                                        <button class="size_tee_product" data-value="S">S</button>
                                                        <button class="size_tee_product" data-value="M">M</button>
                                                        <button class="size_tee_product" data-value="L">L</button>
                                                        <button class="size_tee_product" data-value="XL">XL</button>
                                                    </div>
                                                    <div class="errSize"></div>
                                                </div>

                                                <div class="flex__column_amount">
                                                    <div class="flex__column_size_text">Số Lượng</div>
                                                    <div class="flex__column_amount_input">
                                                        <input type="number" name="amount__flex" placeholder="0" min="0" max="100" class="amount__flex" id="amount__flex">
                                                    </div>
                                                    <div class="flex__column_amount__span">
                                                        <?= $result['product_cosan'] ?> sản phẩm có sẵn
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="errAmount" class="error-message"></div>
                                        <div style="margin-top: 35px;">
                                            <div class="box-btn-add">
                                                <div class="add__product">
                                                    <?php
                                                        if(isset($_SESSION['vanhstore'])) {
                                                            ?>
                                                                <button class="a_href_add_click_text btn__send" id="addTocart" name="addTocart">
                                                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                                                    <span class="add_click_text">Thêm Vào Giỏ Hàng</span>
                                                                </button>
                                                                <a href="" class="click_send_new btn__send">Mua Ngay</a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                                <button class="a_href_add_click_text btn__send" name="addTocart">
                                                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                                                    <span class="add_click_text">Thêm Vào Giỏ Hàng</span>
                                                                </button>
                                                                <a href="" class="click_send_new btn__send">Mua Ngay</a>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: 45px; border-top: 1px solid rgba(0, 0, 0, 0.05);">
                                    <div class="logo__dayS">
                                        <div class="logo__dayS_img">
                                            <img src="../img1/iconLogo.png" alt="">
                                        </div>
                                        <div class="logo__dayS_text">
                                            VanhStore Đảm Bảo
                                        </div>
                                        <div class="logo__dayS_text__span">
                                            3 Ngày Trả Hàng / Hoàn Tiền
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- end chi tiết sản phẩm -->
            
            <!-- Gợi ý sản phẩm -->
            
            <div class="section-recommend-products-wrapper container">
                <div style="display: contents;">
                    <div>
                        <div class="section-recommend-products-wrapper__Box">
                            <div class="stardust-tabs-header-anchor"></div>
                            <nav class="stardust-tabs-header-wrapper">
                                <ul class="stardust-tabs-header">
                                    <li class="stardust-tabs-header__tab stardust-tabs-header__tab--active">
                                        <div class="rTmd0c zJaHI0"></div>
                                        <div tabindex="0" class="span__stardust-tabs-header__tab"><span>Gợi ý sản phẩm</span></div>
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

        <!-- End main -->

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
    </div>
</body>
<script src="../js/chitietsanpham.js"></script>

</html>