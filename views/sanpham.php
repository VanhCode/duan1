<div class="main container">
        <div class="section-recommend-products-wrapper">
            <div style="display: contents;">
                <div>
                    <div class="section-recommend-products-wrapper__Box">
                        <div class="stardust-tabs-header-anchor"></div>
                        <nav class="stardust-tabs-header-wrapper">
                            <div class="pro_you">
                                <i class="fa-solid fa-shop"></i>
                                <h3>Sản phẩm mới nhất</h3>
                            </div>
                        </nav>
                        <div class="stardust-tabs-header-product">
                            <section class="stardust-tabs-panels__panel" style="display: block;">
                                <div class="stardust-tabs-panels__panel_navS">
                                    <?php
                                        foreach($listProduct_moiNhat as $productNew) {
                                            ?>
                                                <div class="stardust-tabs-panels__panel_navSChilrent">
                                                    <a href="index.php?action=chi-tiet-sanpham&detail_product=<?= $productNew['product_id'] ?>" class="stardust-tabs-panels__flexHref">
                                                        <div class="stardust-tabs-panels__ColumFlex__div">
                                                            <div class="stardust-tabs-panels__ColumFlex_img">
                                                                <img src="./public/upload/image/product/<?= explode(",", $productNew['images'])[0] ?>" alt="">
                                                                    <?php
                                                                        if($productNew['sale'] > 0) {
                                                                            ?>
                                                                                <div class="ColumFlex_img__spanSale">
                                                                                    <span class="ColumFlex_img__span">Sale</span>
                                                                                </div>  
                                                                                <div class="ColumFlex_img__spanSalePt">
                                                                                    <span class="ColumFlex_img__textSaleContent"><?= $productNew['sale'] ?>%</span>
                                                                                    <span class="ColumFlex_img__textSaleGiam">GIẢM</span>
                                                                                </div>
                                                                            <?php
                                                                        }
                                                                    ?>  
                                                                <div class="ColumFlex_img__bgrImage">
                                                                    <img src="./img1/bgpr.png" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="stardust-tabs-panels__ColumFlex_BoxText">
                                                                <div class="stardust-ColumFlex_title">
                                                                    <?= $productNew['product_name'] ?>
                                                                </div>
                                                                <div class="stardust-ColumFlex_Boxprice">
                                                                    <div class="stardust-ColumFlex_Boxprice">
                                                                        ₫<?= number_format($productNew['price'], 0, ",", ".") ?>
                                                                    </div>
                                                                    <div class="stardust-ColumFlex_clickPrice">
                                                                        Đã bán 2k
                                                                    </div>
                                                                </div>
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
                    <div class="section-recommend-products-wrapper__Box wpB2">
                        <div class="stardust-tabs-header-anchor"></div>
                        <nav class="stardust-tabs-header-wrapper wpB3">
                            <div class="pro_you">
                                <i class="fa-solid fa-shop"></i>
                                <h3>Sản phẩm phổ biến</h3>
                            </div>
                        </nav>
                        <div class="stardust-tabs-header-product">
                            <section class="stardust-tabs-panels__panel" style="display: block;">
                                <div class="stardust-tabs-panels__panel_navS">
                                    <div class="stardust-tabs-panels__panel_navSChilrent">
                                        <a href="../view/chitietsp.php?id=" class="stardust-tabs-panels__flexHref">
                                            <div class="stardust-tabs-panels__ColumFlex__div">
                                                <div class="stardust-tabs-panels__ColumFlex_img">
                                                    <img src="./img1/a1.jpg" alt="">
                                                    <div class="ColumFlex_img__spanSale">
                                                        <span class="ColumFlex_img__span">Sale</span>
                                                    </div>
                                                    <div class="ColumFlex_img__spanSalePt">
                                                        <span class="ColumFlex_img__textSaleContent">35%</span>
                                                        <span class="ColumFlex_img__textSaleGiam">GIẢM</span>
                                                    </div>
                                                    <div class="ColumFlex_img__bgrImage">
                                                        <img src="./img1/bgpr.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="stardust-tabs-panels__ColumFlex_BoxText">
                                                    <div class="stardust-ColumFlex_title">
                                                        Áo Thun Nam Nữ
                                                    </div>
                                                    <div class="stardust-ColumFlex_Boxprice">
                                                        <div class="stardust-ColumFlex_Boxprice">
                                                            200.000 đ
                                                        </div>
                                                        <div class="stardust-ColumFlex_clickPrice">
                                                            150.000 đ
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
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