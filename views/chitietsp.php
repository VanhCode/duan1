<!-- Main -->
<link rel="stylesheet" href="./css/chitietsp.css">
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

<div class="main">
    <div class="container">
        <div class="flex items-center page-product__main">
            <a class="page-product__main_a" href="index.php">Trang chủ</a>
            <i class="fa-solid fa-angle-right"></i>
            <a class="page-product__main_a" href="">Sản Phẩm Chi Tiết</a>
            <i class="fa-solid fa-angle-right"></i>
            <span class="page-product__main_span"><?= $chitiet_product['product_name'] ?></span>
        </div>
        <div class="product-briefing_main">
            <div></div>
            <div class="flex_product-briefing_image">
                <div class="flex flex-column">
                    <div class="flex-column flex-column__chil">
                        <div class="flex-column__chil_pictur">
                            <div class="chil_pictur">
                                <img id="onmouseoverImg" class="onmouseoverImg" src="./public/upload/image/product/<?= explode(",", $chitiet_product['images'])[0] ?>" alt="">
                            </div>
                        </div>
                        <div class="flex-column__chil_img_hover">
                            <div class="flex-column__chil_img_transform">
                                <?php

                                    foreach (explode(",", $chitiet_product['images']) as $key => $imageChil) {
                                        ?>
                                            <div class="img__onmouseo">
                                                <img name="img_product" src="./public/upload/image/product/<?= $imageChil ?>" class="list-img <?= $key == 0 ? "img__onmouseo-border" : "" ?>" alt="">
                                            </div>
                                        <?php
                                    }
                                ?>
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
                <form id="productForm" <?= $user ? 'onsubmit="return sendAddtocart()"' : '' ?> action="index.php?action=addTocart" method="post">
                    <input type="hidden" name="id_sanpham" value="<?= $detail_product ?>">
                    <div class="flex__product-text">
                        <div class="box-flex__product-text">
                            <span class="nameSp" name="name"><?= $chitiet_product['product_name'] ?></span>
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
                                <div class="flex_assess_number">4k9</div>
                                <div class="flex_assess_text">Đánh Giá</div>
                            </div>
                            <div class="flex_sold">
                                <div class="flex_sold_number">2k5</div>
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
                                            <div class="flex_price__product_text_throw" name="priceThrow">₫<?= number_format($chitiet_product['price'], 0, ",", ".") ?></div>
                                            <div class="flex_price__product_text" name="price">₫<?= number_format($chitiet_product['sale'], 0, ",", ".") ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex__click_form">
                            <div>
                                <div class="flex-column">
                                    <div class="flex-column__Box__information">
                                        <div class="flex__column_color">
                                            <div class="flex__column_color_text">Màu Sắc</div>
                                            <?php
                                            foreach ($listVariationColor as $variationColor) {
                                            ?>
                                                <div class="flex__column_color_clickBox">
                                                    <label class="color_tee_product">
                                                        <span style="font-size: 15px;"><?= $variationColor['color'] ?></span>
                                                        <input type="radio" value="<?= $variationColor['color'] ?>" name="color" class="color colorProduct">
                                                    </label>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="err-color__mau"></div>
                                        <?php
                                        foreach ($listVariationColor as $variationSize) {
                                        ?>
                                            <div class="flex__column_size sizetesst" id="play__size">
                                                <div class="flex__column_size_text">Size</div>
                                                <div class="flex__column_size_clickBox">
                                                    <?php
                                                    foreach (explode(",", $variationSize['size']) as $key => $size) {
                                                    ?>
                                                        <label class="size_tee_product" id="boxSize">
                                                            <span style="pointer-events: none;"><?= $size ?></span>
                                                            <input type="radio" style="pointer-events: none;" name="size" value="<?= $size ?>" class="size">
                                                            <input type="radio" class="amount__boxSize" style="opacity: 0; position: absolute; pointer-events: none;" value="<?= explode(",", $variationSize['amount'])[$key] ?>">
                                                        </label>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="errSize"></div>
                                            </div>
                                        <?php
                                        }
                                        ?>


                                        <div class="flex__column_amount">
                                            <div class="flex__column_size_text">Số Lượng</div>
                                            <div class="flex__column_amount_input">

                                                <button onclick="remote('-')" type="button" class="minus_icon"><i class="fa-solid fa-minus"></i></button>
                                                <input type="text" name="amount__flex" value="1" min="1" max="<?= $sumAmout['amount'] ?>" class="amount__flex" id="amount__flex">
                                                <button onclick="remote('+')" type="button" class="plus_icon"><i class="fa-solid fa-plus"></i></button>
                                            
                                            </div>
                                            <div class="flex__column_amount__span">
                                                <span id="value__amount"><?= $sumAmout['amount'] ?></span>
                                                <span class="pro_new">Sản phẩm có sẵn</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="errAmount" class="error-message"></div>

                                <div style="margin-top: 35px;">
                                    <div class="box-btn-add">
                                        <div class="add__product">
                                            <button class="a_href_add_click_text btn__send" name="addTocart">
                                                <i class="fa-solid fa-cart-arrow-down"></i>
                                                <span class="add_click_text">Thêm Vào Giỏ Hàng</span>
                                            </button>
                                            <a href="" class="click_send_new btn__send">Mua Ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 127px; border-top: 1px solid rgba(0, 0, 0, 0.05);">
                            <div class="logo__dayS">
                                <div class="logo__dayS_img">
                                    <img src="./img1/iconLogo.png" alt="">
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
        <div class="UwHWuz">
            <div class="page-product__content">
                <div class="page-product__content__left">
                    <div class="product-detail page-product__detail">
                        <section class="U9rGd1">
                            <h2 class="Iv7FJp">MÔ TẢ SẢN PHẨM</h2>
                            <div class="MCCLkq">
                                <div class="f7AU53">
                                    <p class="irIKAp">
                                        Chào bạn đến với shop Hà Nội Phố của cô chủ nhỏ mới đến TPHCM

                                        #NIACINAMIDE - Thành phần “thần thánh” đa công dụng được yêu thích. Hoạt động như một chất chống oxy hóa. Giúp tái tạo và củng cố “hàng rào” bảo vệ da, tăng sản sinh các ceramides lấy lại sự trẻ trung, mềm mịn cho làn da. Điều tiết bã nhờn trên da, cải thiện kết cấu da, làm dịu nốt mụn, đặc biệt là loại mụn trứng cá. Làm sáng đều màu da, khắc phục được những hệ quả của mụn để lại như vết thâm hay sẹo.

                                        #ZINC - Kẽm có khả năng điều tiết bã nhờn, thích hợp với da dầu có mụn.

                                        REVIEW
                                        "Trước khi sử dụng em này da mình là da hỗn hợp thiên dầu, mụn li ti khá nhiều và một vài nốt mụn sưng đỏ. Sau khoảng gần 2 tháng kiên trì liên tục sử dụng thì mình khá hài lòng về em này vì da đã có một chút chuyển biến.

                                        Làn da của mình bắt đầu mịn màng hơn, lỗ chân lông được thu nhỏ lại và làn da trở nên săn chắc. Đặc biệt là da có hiệu ứng “bóng” ở gò má tạo cảm giác da khỏe mạnh hơn hẳn. Tình trạng mụn cũng giảm hẳn, các nốt mụn sưng đỏ được làm dịu đi nhiều, nhưng để xử lý mụn nặng thì mình ko nghĩ em này sẽ thích hợp đâu nhé các nàng. Đối với các tình trạng mụn nhẹ thì sp này có hiệu quả khá là tốt. Khả năng làm mờ thâm và sáng da được đánh giá là khá ổn vì vết thâm cũng mờ dần, nếu kiên trì thì hiệu quả sẽ rõ rệt hơn."

                                        # # # Routine sang tối thông thường # # #

                                        Sáng

                                        • Bước 1: Rửa Mặt
                                        • Bước 2: Nước Cân Bằng Da (Toner)
                                        • Bước 3: Essence/ Serum/ Ampoule
                                        • Bước 4: Emulsion/ Lotion
                                        • Bước 5: Dưỡng Ẩm (Bằng Moisturizer/ Cream/ Face Oil)
                                        • Bước 6: KCN


                                        Tối

                                        • Bước 1+2: Double Cleansing (Rửa Mặt + Tẩy Trang)
                                        • Bước 3: Nước Cân Bằng Da (Toner)
                                        • Bước 4: Mặt Nạ (Mask)
                                        • Bước 5: Treatments
                                        • Bước 6: Essence/ Serum/ Ampoule
                                        • Bước 7: Emulsion/ Lotion
                                        • Bước 8: Kem Mắt (Eyes Cream)
                                        • Bước 9: Dưỡng Ẩm (Bằng Moisturizer/ Cream/ Face Oil)
                                        • Bước 10: Mặt Nạ Ngủ (Sleeping Mask)

                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="form_comment">
                        <div style="display:contents;">
                            <div class="product-ratings">
                                <div class="product-ratings__header">
                                    <div class="product-ratings__header_score">BÌNH LUẬN SẢN PHẨM</div>
                                </div>
                                <div class="product-rating-overview">
                                    <div class="product-rating-overview__briefing">
                                        <div class="product-rating-overview__score-wrapper">
                                            <span class="product-rating-overview__rating-score">3.5</span>
                                            <span class="product-rating-overview__rating-score-out-of"> trên 5 </span>
                                        </div>
                                        <div class="vanhstore-rating-stars product-rating-overview__stars">
                                            <div class="vanhstore-rating-stars__stars">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-rating-overview__filters">
                                        <div class="product-rating-overview__filter product-rating-overview__filter--active">tất cả</div>
                                        <!-- <div class="product-rating-overview__filter">5 Sao (310)</div> -->
                                        <!-- <div class="product-rating-overview__filter">4 Sao (0)</div> -->
                                        <!-- <div class="product-rating-overview__filter">3 Sao (0)</div> -->
                                        <!-- <div class="product-rating-overview__filter">2 Sao (3)</div> -->
                                        <!-- <div class="product-rating-overview__filter">1 Sao (166)</div> -->
                                        <div class="product-rating-overview__filter"><?= !empty($listComment) ? "Có Bình luận"." "."(".count($listComment).")" : "Không có bình luận" ?></div>
                                        <!-- <div class="product-rating-overview__filter">Có hình ảnh / video (90)</div> -->
                                    </div>
                                </div>
                                <div class="product-ratings__list" style="opacity: 1;">
                                    <div class="vanhstore-product-comment-list" id="comment">
                                        <?php
                                            foreach($listComment as $commnent) {
                                                ?>
                                                    <div class="vanhstore-product-rating">
                                                        <a href="" class="vanhstore-product-rating__avatar">
                                                            <div class="vanhstore-avatar">
                                                                <img class="vanhstore-avatar__img" src="./public/upload/image/user/<?= isset($commnent['user_image']) ? $commnent['user_image'] : "" ?>" alt="">
                                                            </div>
                                                        </a>
                                                        <div class="vanhstore-product-rating__main">
                                                            <a class="vanhstore-product-rating__author-name" href="/shop/991020722"><?= $commnent['first_name']." ".$commnent['last_name'] ?></a>
                                                            <div class="repeat-purchase-con">
                                                                <div class="vanhstore-product-rating__rating">
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                    <i class="fa-solid fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="vanhstore-product-rating__time"><?= date('Y-m-d', strtotime($commnent['create_at'])) ?></div>
                                                            <div class="vanhstore-product-comment-list__content"><?= $commnent['content'] ?>
                                                                <div style="position: absolute; right: 0px; bottom: 0px; background: linear-gradient(to left, rgb(255, 255, 255) 75%, rgba(255, 255, 255, 0)); padding-left: 24px;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                    if(isset($_SESSION['user_id'])) {
                                        ?>
                                            <form id="commentForm" action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                                                <div class="comment__product">
                                                    <div class="comment__product__header">
                                                        <img src="./public/upload/image/user/<?= $user['user_image'] ?>" alt="">    
                                                    </div>
                                                    <div class="comment__product__content__btn">
                                                        <input type="hidden" id="idproduct" name="idproduct" value="<?= $chitiet_product['product_id'] ?>">
                                                        <input type="hidden" id="iduser" name="iduser" value="<?= $userID ?>">
                                                        <input type="text" class="vanhstore__input__comments" id="noidung" name="noidung" placeholder="Viết bình luận...">
                                                        <input type="submit" class="vanhstore__input__buttons" name="submitComment" value="Gửi">
                                                    </div>
                                                </div>
                                            </form>
                                        <?php
                                    } else {
                                        ?>
                                            <div class="comment__product">
                                                <span>Bạn cần đăng nhập để sử dụng tính năng bình luận</span>
                                            </div>
                                        <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-product__content__right">
                    <div style="display: contents;"></div>
                    <section class="product-shop-hot-sales page-product__hot-sales">
                        <h2 class="product-shop-hot-sales__header">Top sản phẩm bán chạy</h2>
                        <a href="" class="item-card-special__link product-shop-hot-sales__item">
                            <div class="item-card-special">
                                <div class="item-card-special__img">
                                    <div class="lazy-image__container item-card-special__img-background">
                                        <img width="100%" src="./img1/a1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="item-card-special__lower-padding">
                                    <div class="item-card-special__name item-card-special__name--special">ÁO thun</div>
                                    <div class="item-card-special__section-price item-card-special__section-price--special">
                                        <div class="item-card-special__current-price item-card-special__current-price--special">₫150.000</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="item-card-special__link product-shop-hot-sales__item">
                            <div class="item-card-special">
                                <div class="item-card-special__img">
                                    <div class="lazy-image__container item-card-special__img-background">
                                        <img width="100%" src="./img1/a1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="item-card-special__lower-padding">
                                    <div class="item-card-special__name item-card-special__name--special">Áo thun</div>
                                    <div class="item-card-special__section-price item-card-special__section-price--special">
                                        <div class="item-card-special__current-price item-card-special__current-price--special">₫150.000</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="item-card-special__link product-shop-hot-sales__item">
                            <div class="item-card-special">
                                <div class="item-card-special__img">
                                    <div class="lazy-image__container item-card-special__img-background">
                                        <img width="100%" src="./img1/a1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="item-card-special__lower-padding">
                                    <div class="item-card-special__name item-card-special__name--special">Áo thun</div>
                                    <div class="item-card-special__section-price item-card-special__section-price--special">
                                        <div class="item-card-special__current-price item-card-special__current-price--special">₫150.000</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="item-card-special__link product-shop-hot-sales__item">
                            <div class="item-card-special">
                                <div class="item-card-special__img">
                                    <div class="lazy-image__container item-card-special__img-background">
                                        <img width="100%" src="./img1/a1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="item-card-special__lower-padding">
                                    <div class="item-card-special__name item-card-special__name--special">ÁO thun</div>
                                    <div class="item-card-special__section-price item-card-special__section-price--special">
                                        <div class="item-card-special__current-price item-card-special__current-price--special">₫150.000</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </section>
                </div>
            </div>
        </div>
    </div>


    <!-- end chi tiết sản phẩm -->

    <!-- Gợi ý sản phẩm -->

    <div class="section-recommend-products-wrapper container">
        <div style="display: contents;">
            <div>
                <div class="section-recommend-products-wrapper__Box wrp__chitiet" style="margin-top: 1.5em">
                    <div class="stardust-tabs-header-anchor"></div>
                    <nav class="stardust-tabs-header-wrapper">
                        <ul class="stardust-tabs-header">
                            <li class="stardust-tabs-header__tab stardust-tabs-header__tab--active">
                                <div class="rTmd0c zJaHI0"></div>
                                <div tabindex="0" class="span__stardust-tabs-header__tab"><span>Sản phẩm liên quan</span></div>
                            </li>
                        </ul>
                    </nav>
                    <div class="stardust-tabs-header-product">
                        <section class="stardust-tabs-panels__panel" style="display: block;">
                            <div class="stardust-tabs-panels__panel_navS">
                                
                                <?php
                                foreach ($listSpCungloai as $sp_cungloai) {
                                    $sales = 100 - (($sp_cungloai['sale'] / $sp_cungloai['price']) * 100);
                                ?>
                                            <div class="stardust-tabs-panels__panel_navSChilrent">
                                                <a href="index.php?action=chi-tiet-sanpham&detail_product=<?= $sp_cungloai['product_id'] ?>" class="stardust-tabs-panels__flexHref">
                                                    <div class="stardust-tabs-panels__ColumFlex__div">
                                                        <div class="stardust-tabs-panels__ColumFlex_img">
                                                            <img src="./public/upload/image/product/<?= explode(",", $sp_cungloai['images'])[0] ?>" alt="">
                                                            <div class="ColumFlex_img__spanSale">
                                                                <span class="ColumFlex_img__span">Sale</span>
                                                            </div>
                                                            <div class="ColumFlex_img__spanSalePt">
                                                                <span class="ColumFlex_img__textSaleContent"><?= ceil($sales) ?>%</span>
                                                                <span class="ColumFlex_img__textSaleGiam">GIẢM</span>
                                                            </div>
                                                            <div class="ColumFlex_img__bgrImage">
                                                                <img src="./img1/bgpr.png" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="stardust-tabs-panels__ColumFlex_BoxText">
                                                            <div class="stardust-ColumFlex_title">
                                                                <?= $sp_cungloai['product_name'] ?>
                                                            </div>
                                                            <div class="stardust-ColumFlex_Boxprice">
                                                                <div class="stardust-ColumFlex_Boxprice">
                                                                    ₫<?= number_format($sp_cungloai['sale'], 0, ",", ".") ?>
                                                                </div>
                                                                <div class="stardust-ColumFlex_clickPrice">
                                                                    đã bán 23.2k
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vanhstore_product_item-cart prSt__cart">
                                                            <a href="">Tìm sản phẩm tương tự</a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php
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

<script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }


    var message = getParameterByName('message');

    if (message) {
        var boxAnimationSuccess = document.querySelector('.boxAnimationSuccess');
        boxAnimationSuccess.style.display = 'block';

        setTimeout(function() {
            boxAnimationSuccess.style.display = 'none';
        }, 3000);

    }

    if (window.history.replaceState) {
        var currentUrl = window.location.href;
        var urlWithoutMessage = currentUrl.split('&').filter(function(item) {
            return !item.includes('message');
        }).join('&');
        window.history.replaceState(null, null, urlWithoutMessage);
    }
</script>