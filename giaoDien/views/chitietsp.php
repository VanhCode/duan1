<!-- Main -->

<div class="main">
    <div class="container">
        <div class="flex items-center page-product__main">
            <a class="page-product__main_a" href="index.php">VanhStore</a>
            <i class="fa-solid fa-angle-right"></i>
            <a class="page-product__main_a" href="">Sản Phẩm Chi Tiết</a>
            <i class="fa-solid fa-angle-right"></i>
            <span class="page-product__main_span">Áo Nỉ</span>
        </div>
        <div class="product-briefing_main">
            <div></div>
            <div class="flex_product-briefing_image">
                <div class="flex flex-column">
                    <div class="flex-column flex-column__chil">
                        <div class="flex-column__chil_pictur">
                            <div class="chil_pictur">
                                <img id="onmouseoverImg" class="onmouseoverImg" src="./img1/a1.jpg" alt="">
                            </div>
                        </div>
                        <div class="flex-column__chil_img_hover">
                            <div class="flex-column__chil_img_transform">
                                <div class="img__onmouseo">
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
                <form id="productForm" action="" method="post">
                    <input type="hidden" name="id_sanpham" value="">
                    <div class="flex__product-text">
                        <div class="box-flex__product-text">
                            <span class="nameSp" name="name">Áo Nỉ SWETTER</span>
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
                                        <div class="flex_price__product_text_throw" name="priceThrow">200000đ</div>
                                        <div class="flex_price__product_text" name="price">150000đ</div>
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
                                                <option value="">Tiết kiệm</option>
                                                <option value="">Nhanh</option>
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
                                                25000 sản phẩm có sẵn
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
                        <div style="margin-top: 45px; border-top: 1px solid rgba(0, 0, 0, 0.05);">
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
                                <div tabindex="0" class="span__stardust-tabs-header__tab"><span>Gợi ý sản phẩm</span></div>
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
                                            <a href="../view/chitietsp.php?id=<?= $itemSpBanChay['id_spBanChay'] ?>" class="stardust-tabs-panels__flexHref">
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