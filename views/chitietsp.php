<!-- Main -->


<div class="main">
    <div class="container">
        <div class="flex items-center page-product__main">
            <a class="page-product__main_a" href="index.php">VanhStore</a>
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
                                    $giamgia = $chitiet_product['price'] * $chitiet_product['sale'] / 100;
                                    foreach(explode(",", $chitiet_product['images']) as $key => $imageChil) {
                                        ?>
                                            <div class="img__onmouseo">
                                                <img name="img_product" src="./public/upload/image/product/<?= $imageChil ?>" class="list-img <?= $key == 0 ? "img__onmouseo-border" : "" ?>" alt="">
                                            </div>
                                        <?php
                                    }
                                ?>
                                <!-- <div class="img__onmouseo">
                                    <img name="img_product" src="./img1/a1.jpg" class="list-img img__onmouseo-border" alt="">
                                </div>
                                <div class="img__onmouseo">
                                    <img src="./img1/a2.jpg" class="list-img" alt="">
                                </div>
                                <div class="img__onmouseo">
                                    <img src="./img1/a18.jpg" class="list-img" alt="">
                                </div>
                                <div class="img__onmouseo">
                                    <img src="./img1/a2.jpg" class="list-img" alt="">
                                </div>
                                <div class="img__onmouseo">
                                    <img src="./img1/a2.jpg" class="list-img" alt="">
                                </div>
                                <div class="img__onmouseo">
                                    <img src="./img1/a2.jpg" class="list-img" alt="">
                                </div>
                                <div class="img__onmouseo">
                                    <img src="./img1/a2.jpg" class="list-img" alt="">
                                </div> -->
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
                <form id="productForm" action="" method="post">
                    <input type="hidden" name="id_sanpham" value="">
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
                                        <?php
                                            if($chitiet_product['sale'] > 0) {
                                                ?>
                                                    <div class="flex_price__product_text_throw" name="priceThrow">₫<?= number_format($chitiet_product['price'], 0, ",",".") ?></div>
                                                <?php
                                            }
                                        ?>
                                        <div class="flex_price__product_text" name="price">₫<?= ($chitiet_product['sale'] > 0) ? number_format($giamgia, 0, ",",".") : number_format($chitiet_product['price'], 0, ",",".") ?></div>
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
                                                foreach($listVariationColor as $variationColor) {
                                                    ?>
                                                        <div class="flex__column_color_clickBox">
                                                            <label class="color_tee_product">
                                                                <span style="font-size: 15px;"><?= $variationColor['color'] ?></span>
                                                                <input type="radio" value="<?= $variationColor['color'] ?>" name="color" class="color">
                                                            </label>
                                                        </div>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="err-color__mau"></div>
                                        <?php
                                            foreach($listVariationColor as $variationSize) {
                                                ?>
                                                    <div class="flex__column_size sizetesst" id="play__size">
                                                        <div class="flex__column_size_text">Size</div>
                                                        <div class="flex__column_size_clickBox">
                                                            <?php
                                                                foreach(explode(",", $variationSize['size']) as $key => $size) {
                                                                    ?>
                                                                        <label class="size_tee_product" id="boxSize">
                                                                            <span style="pointer-events: none;"><?= $size ?></span>
                                                                            <input type="radio" style="pointer-events: none;" name="size" value="<?= $size ?>" class="size">
                                                                            <input type="text" class="amount__boxSize" style="opacity: 0; position: absolute; pointer-events: none;" value="<?= explode(",", $variationSize['amount'])[$key] ?>">
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
                                                <!-- <input type="number" name="amount__flex" placeholder="0" min="0" max="100" class="amount__flex" id="amount__flex"> -->
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
                                            <?php
                                                if (isset($_SESSION['vanhstore'])) {
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
                        <div style="margin-top: 86px; border-top: 1px solid rgba(0, 0, 0, 0.05);">
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
                                <div tabindex="0" class="span__stardust-tabs-header__tab"><span>Sản phẩm liên quan</span></div>
                            </li>
                        </ul>
                    </nav>
                    <div class="stardust-tabs-header-product">
                        <section class="stardust-tabs-panels__panel" style="display: block;">
                            <div class="stardust-tabs-panels__panel_navS">
                                
                                <?php
                                    foreach($listSpCungloai as $sp_cungloai) {
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
                                                                <span class="ColumFlex_img__textSaleContent"><?= $sp_cungloai['sale'] ?>%</span>
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
                                                                    ₫<?= number_format($sp_cungloai['price'], 0, ",",".") ?>
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