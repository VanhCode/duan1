<?php
    session_start();
    require_once "../connect/connect.php";
    require_once "../php/checkCart.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img1/iconLogo.png" type="image/x-icon">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="../css/cart.css">
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
        </header>

        <!-- header end -->

        <!-- header nav -->

        <div class="nav-hea">
            <div class="header-nav container">
                <a class="a-h1" href="../index.php">
                    <img src="../img1/vanhcart.jpg" alt="">
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

        <div class="container">
            
                <?php
                    if(isset($resultSpSelect) && count($resultSpSelect) > 0) {
                        ?>
                            <div class="cheked__product">
                                <main>
                                    <div class="if-swd">
                                        <div class="rtM2Xz">
                                            <img src="../img1/sale.png" alt="fs-icon">
                                            <span class="bXROAg">Nhấn vào mục Mã giảm giá ở cuối trang để hưởng miễn phí vận chuyển bạn nhé!</span>
                                        </div>
                                        <div class="BjIo5w">
                                            <div class="mcsiKT">
                                                <label class="stardust-checkbox">
                                                    <input class="stardust-checkbox__input" type="checkbox" aria-checked="false" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                                                    <div class="stardust-checkbox__box"></div>
                                                </label>
                                            </div>
                                            <div class="yl931K">Sản Phẩm</div>
                                            <div class="pZMZa7">Đơn Giá</div>
                                            <div class="lKFOxX">Số Lượng</div>
                                            <div class="_5f317z">Số Tiền</div>
                                            <div class="+4E7yJ">Thao Tác</div>
                                        </div>
                                        <div class="_48e0yS">
                                            <div>
                                                <?php
                                                    if(isset($_SESSION['cart'])) {
                                                        // Lấy thông tin đăng nhập của người dùng (ID người dùng hoặc thông tin đăng nhập khác)
                                                       
    
                                                        if($resultSpSelect) {
                                                            $i = 0;
                                                            $tong = 0;
                                                            $thanhtien = 0;
                                                            foreach($resultSpSelect as $key) {
                                                                $tong = $key['money'] * $key['amount'];
                                                                $thanhtien += $tong;
                                                                $i++;
                                                                ?>
                                                                    <div class="SFF7z2 dWLQTS">
                                                                        <div class="xP1eaK">
                                                                            <div class="_5sTIHk">
                                                                                <label class="stardust-checkbox">
                                                                                    <input class="stardust-checkbox__input" type="checkbox" aria-checked="false" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                                                                                    <div class="stardust-checkbox__box"></div>
                                                                                </label>
                                                                            </div>
                                                                            <a href="" class="wJCpl6">
                                                                                <div class="icon-shop">
                                                                                    <i class="bTa6Yo fa-solid fa-shop"></i>
                                                                                </div>
                                                                                <span style="margin-left: 10px;">VanhStore</span>
                                                                                <a href="" class="p2B+nr">
                                                                                    <i class="bTa6Yo icon-message fa-regular fa-message"></i>
                                                                                </a>
                                                                            </a>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="Eb+POp">
                                                                        <div class="VPZ9zs">
                                                                            <div class="zoXdNN">
                                                                                <div class="lgcEHJ">
                                                                                    <label class="stardust-checkbox">
                                                                                        <input class="stardust-checkbox__input" type="checkbox" aria-checked="false" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                                                                                        <div class="stardust-checkbox__box"></div>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="link-img-product">
                                                                                    <div class="box-img-product">
                                                                                        <div class="div-box-imgA">
                                                                                            <a href="../view/chitietsp.php?id=<?= $key['id_spgiohang'] ?>">
                                                                                                <img class="img-product-item" src="../img1/<?= $key['image'] ?>" alt="">
                                                                                            </a>
                                                                                        </div>
                                                                                        <div class="title-text-product">
                                                                                            <a href="" class="text-img-content">
                                                                                                <?= $key['name_sanpham'] ?>
                                                                                            </a>
                                                                                            <img class="eQNnTs" src="../img1/saleimg.png" alt="">
                                                                                            <div class="QRuJU-"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="color-product">
                                                                                    <div class="color-group">
                                                                                        <h5>Phân loại:</h5>
                                                                                        <p>1</p>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="price-product">
                                                                                    <div class="price-flex">
                                                                                        <span id="price-throwChange" class="price-money price-chil">
                                                                                            <?= number_format($key['price_throw'], 0, ',', '.'); ?>đ
                                                                                        </span>
                                                                                        <span id="price-click" class="price-money">
                                                                                            <?= number_format($key['price'], 0, ',', '.'); ?>đ
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="amount-product">
                                                                                    <div class="amount-click-box">
                                                                                        <a href="../php/amountClick.php?tru=<?= $key['id_spgiohang'] ?>" class="clickAdd__deleteprice_right"><i class="fa-solid fa-minus"></i></a>
                                                                                        <div class="amount__productCartItem"><?= $key['amount'] ?></div>
                                                                                        <a href="../php/amountClick.php?cong=<?= $key['id_spgiohang'] ?>" class="clickAdd__deleteprice_left"><i class="fa-solid fa-plus"></i></a>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="money-product">
                                                                                    <div>
                                                                                        <span id="money-send" class="money-send" >
                                                                                            <?= number_format($tong, 0, ',', '.'); ?>đ
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="delete-product">
                                                                                    <div>
                                                                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')" href="../php/deleteProduct.php?id=<?= $key['id_spgiohang'] ?>" class="delete-sp">
                                                                                            Xóa
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="sale-voucher">
                                                                        <i class="fa-solid icon-sale-voucher fa-ticket-simple"></i>
                                                                        <div class="voucher-text">
                                                                            <div class="sale10pt">Shop Voucher giảm đến 10%</div>
                                                                            <div class="newVoucher">Mới</div>
                                                                            <div class="click-view-voucher">
                                                                                <a href="" class="view-next">Xem thêm voucher</a>
                                                                                <div style="display: contents;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                                <section class="abate row-abate">
                                    <div></div>
                                    <div class="row1 row-abate1">
                                        <i class="fa-solid icon-sale-voucher fa-ticket-simple"></i>
                                        <div class="text-abate-voucher">VanhStore Voucher</div>
                                        <div class="line-abate"></div>
                                        <a href="" class="click-abate">Chọn hoặc nhập mã</a>
                                    </div>
                                    <div class="line-row-abate line-bottom-abate"></div>
                                    <div class="row-left-abate left-abate-checkbox">
                                        <label class="stardust-checkbox">
                                            <input class="stardust-checkbox__input" type="checkbox" aria-checked="false" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                                            <div class="stardust-checkbox__box"></div>
                                        </label>
                                    </div>
                                    <div class="click-abate">
                                        <i class="fa-solid icon-abate-left fa-circle-dollar-to-slot"></i>
                                        <div class="vanhstoxu-abate">VanhStore Xu</div>
                                        <div class="check-product-click-abate">Bạn chưa chọn sản phẩm</div>
                                    </div>
                                    <div class="price-send-abate">
                                        -0đ
                                    </div>
                                    <div class="line-send-abate-end"></div>
                                    <div class="s1Gxkq c2pfrq">
                                        <div class="wqjloc">
                                            <label class="stardust-checkbox">
                                                <input class="stardust-checkbox__input" type="checkbox" aria-checked="false" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                                                <div class="stardust-checkbox__box"></div>
                                            </label>
                                        </div>
                                        <a href="" class="iGlIrs clear-btn-style">Chọn Tất Cả</a>
                                        <a href="" class="clear-btn-style clear-abate">Xóa</a>
                                        <div class=""></div>
                                        <a href="" class="clear-btn-style save-like">Lưu vào mục Đã thích</a>
                                        <div class="save-line"></div>
                                        <div class="total-payout">
                                            <div class="check-total-payout">
                                                <div class="flex-total-payout">
                                                    <div class="total-text-">Tổng thanh toán (<?= isset($totalProducts) ? $totalProducts : "" ?>): </div>
                                                    <div class="price-end-total"><?= isset($thanhtien) ? number_format($thanhtien, 0, ',', '.') : "" ?>đ</div>
                                                </div>
                                            </div>
                                            <div class="line-end-total-payout"></div>
                                        </div>
                                        <a href="" class="vanh-button-solid vanh-button-solid--primary">
                                            <span class="send-end-total">Mua hàng</span>
                                        </a>
                                    </div>
                                </section>
                            </div>
                        <?php
                    } else {
                        ?>
                            <div class="no__productCart">
                                <div class="no__productCart__logo"></div>
                                <div class="no__productCart__text">Giỏ hàng của bạn còn trống</div>
                                <a href="../view/sanpham.php" class="no__productCart__aClickProduct">Mua Ngay</a>
                            </div>
                        <?php
                    }
                ?>
        </div>

        <div class="container">
            <div class="maybe-you-like">
                <div style="display: contents;">
                    <div class="text-header-you">
                        <div class="tile-like-headerMay">
                            <div>Có thể bạn cũng thích</div>
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
                                foreach($resultSearchMax as $item) {
                                    ?>
                                        <div class="productS-full-link-view">
                                            <a href="../view/chitietsp.php?id=<?= $item['id_spBanChay'] ?>" class="">
                                                <div class="prd-v2">
                                                    <div class="prd-v3">
                                                        <div style="pointer-events: none;">
                                                            <div class="prd-img-hv">
                                                                <img src="../img1/<?= $item['image'] ?>" class="prd-img" alt="">
                                                                <div class="yt-prd">
                                                                    <div class="yt-chill rgba-yt-chil">
                                                                        <span class="span-yt-chil span-yt-prd">Yêu thích</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="prd-v3-chil">
                                                            <div class="prd-v3-title-text">
                                                                <div class="prd-v3-box-text">
                                                                    <div class="prd-v3-text">
                                                                        <?= $item['name'] ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="prd-v3-price prd-v3-price-bv">
                                                                <div class="prd-v3-price-textChil">
                                                                    <span class="prd-v3-price-textChil-span">
                                                                        <?= $item['price'] ?>đ
                                                                    </span>
                                                                </div>
                                                                <div class="check-sub-success">
                                                                    <?= $item['about_ban'] ?>
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

        <!-- end main -->

        
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
    </div>
</body>
<script src="../js/cartjs.js"></script>
</html>