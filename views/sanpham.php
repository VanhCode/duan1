<link rel="stylesheet" href="./css/chitietsp.css">
<div class="main container">
        <div class="section-recommend-products-wrapper">
            <div class="category__product">
                <?php
                    include "viewblock/boxleft.php";
                ?>
                <div class="category__list__product">
                    <div style="display: contents;">
                        <div class="section-recommend-products-wrapper__Box">
                            <div class="stardust-tabs-header-anchor"></div>
                            <nav class="stardust-tabs-header-wrapper">
                                <div class="pro_you">
                                    <i class="fa-solid fa-shop"></i>
                                    <h3>Sản phẩm của tôi</h3>
                                </div>
                            </nav>
                            <div class="vanhstore-sort-bar bar__loc">
                                <div class="flex__price_bost">
                                    <legend style="display: none;"></legend>
                                    <div class="vanhstore-sort-bar__label">Sắp xếp theo</div>
                                    <div class="vanhstore-sort-by-options">
                                        <section class="vanhstore-sort-by-options__option-group">
                                            <a href="" class="btn-sort__bar" data-index="0">Phổ Biến</a>
                                            <a href="" class="btn-sort__bar" data-index="1">Mới Nhất</a>
                                            <a href="" class="btn-sort__bar" data-index="2">Bán Chạy</a>
                                        </section>
                                        <section>
                                            <div style="pointer-events: auto;">
                                                <button class="sort-price-select">
                                                    <span style="pointer-events: none; color: <?= isset($_GET['gia-thap-cao']) || isset($_GET['gia-cao-thap']) ? "#ee4d2d" : "" ?>;" class="price__svg">
                                                        <?php
                                                            if(isset($_GET['gia-thap-cao'])) {
                                                                ?>
                                                                    Giá: Thấp đến Cao
                                                                <?php
                                                            } else if(isset($_GET['gia-cao-thap'])) {
                                                                ?>
                                                                    Giá: Cao đến Thấp
                                                                <?php
                                                            } else {
                                                                ?>
                                                                    Giá
                                                                <?php
                                                            }                                                           
                                                        ?>
                                                    </span>
                                                    <svg viewBox="0 0 10 6" class="shopee-svg-icon icon-arrow-down-small">
                                                        <path d="M9.7503478 1.37413402L5.3649665 5.78112957c-.1947815.19574157-.511363.19651982-.7071046.00173827a.50153763.50153763 0 0 1-.0008702-.00086807L.2050664 1.33007451l.0007126-.00071253C.077901 1.18820749 0 1.0009341 0 .79546595 0 .35614224.3561422 0 .7954659 0c.2054682 0 .3927416.07790103.5338961.20577896l.0006632-.00066318.0226101.02261012a.80128317.80128317 0 0 1 .0105706.0105706l3.3619016 3.36190165c.1562097.15620972.4094757.15620972.5656855 0a.42598723.42598723 0 0 0 .0006944-.00069616L8.6678481.20650022l.0009529.0009482C8.8101657.07857935 8.9981733 0 9.2045341 0 9.6438578 0 10 .35614224 10 .79546595c0 .20495443-.077512.39180497-.2048207.53283641l.0003896.00038772-.0096728.00972053a.80044712.80044712 0 0 1-.0355483.03572341z" fill-rule="nonzero"></path>
                                                    </svg>
                                                    <ul class="price-hover__desc">
                                                        <li><a href="index.php?action=san-pham<?= isset($_GET['page']) ? "&page=".$_GET['page'] : "" ?>&gia-thap-cao" style="color:<?= isset($_GET['gia-thap-cao']) ? "#ee4d2d" : "" ?>;">Giá: Thấp đến Cao</a></li>
                                                        <li><a href="index.php?action=san-pham<?= isset($_GET['page']) ? "&page=".$_GET['page'] : "" ?>&gia-cao-thap" style="color:<?= isset($_GET['gia-cao-thap']) ? "#ee4d2d" : "" ?>;">Giá: Cao đến Thấp</a></li>
                                                    </ul>
                                                </button>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="vanhstore-mini-page-controller">
                                    <div class="vanhstore-mini-page-controller__state">
                                        <span class="vanhstore-mini-page-controller__current" style="color:#ee4d2d;"><?= $page ?></span>
                                        /
                                        <span class="vanhstore-mini-page-controller__total"><?= isset($_GET['min_price']) && isset($_GET['max_price']) ? $count_price_min_max : $countTrang ?></span>
                                            
                                    </div>
                                    <?php
                                        if(isset($_GET['min_price']) && isset($_GET['max_price'])) {
                                            ?>
                                                <a href="index.php?action=san-pham&min_price=<?= $_GET['min_price'] ?>&max_price=<?= $_GET['max_price'] ?>&page_gia=<?= $page_gia - 1 >= 1 ? $page_gia - 1 : $page_gia ?>" class="vanhstore-mini_controller_left"><</a>
                                                <a href="index.php?action=san-pham&min_price=<?= $_GET['min_price'] ?>&max_price=<?= $_GET['max_price'] ?>&page_gia=<?= $page_gia + 1 <= $count_price_min_max ? $page_gia + 1 : $page_gia ?>" class="vanhstore-mini_controller_right">></a>
                                            <?php
                                        } else {
                                            ?>
                                                <a href="index.php?action=san-pham&page=<?= $page - 1 >= 1 ? $page - 1 : $page ?>" class="vanhstore-mini_controller_left"><</a>
                                                <a href="index.php?action=san-pham&page=<?= $page + 1 <= $countTrang ? $page + 1 : $page ?>" class="vanhstore-mini_controller_right">></a>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="stardust-tabs-header-product">
                                <section class="stardust-tabs-panels__panel" style="display: block;">
                                    <?php
                                        if(isset($_GET['min_price']) && isset($_GET['max_price'])) {
                                            ?>
                                                <div class="stardust-tabs-panels__panel_navS">
                                                    <?php
                                                        foreach($listProduct_khoanggia as $productNew) {
                                                            ?>
                                                                <div class="stardust-tabs-panels__panel_navSChilrent std__sanpham">
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
                                                                            <div class="vanhstore-item-card__hover-footer _6o9eaa">
                                                                                <a href="">Tìm sản phẩm tương tự</a>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                    <div class="btn__click_stardust__product page__product">
                                                        <div class="vanhstore-mini-page-controller">
                                                            <a href="index.php?action=san-pham&page=<?= $page - 1 >= 1 ? $page - 1 : $page ?>" class="vanhstore-mini_controller_left ctl__left">&lt;</a>
                                                            <div class="vanhstore-mini-page-controller__state page__url">
                                                                <?php
                                                                    for($i = 1; $i <= $count_price_min_max; $i++) {
                                                                        ?>
                                                                            <a href="index.php?action=san-pham&page=<?= $i; ?>" class="curent__page <?= $page == $i ? "activePage" : "" ?>"><?= $i ?></a>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                            <a href="index.php?action=san-pham&page=<?= $page + 1 <= $countTrang ? $page + 1 : $page ?>" class="vanhstore-mini_controller_right ctl__right">&gt;</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        } else {
                                            ?>
                                                <div class="stardust-tabs-panels__panel_navS">
                                                    <?php
                                                        foreach($listProduct_moiNhat as $productNew) {
                                                            ?>
                                                                <div class="stardust-tabs-panels__panel_navSChilrent std__sanpham">
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
                                                                            <div class="vanhstore-item-card__hover-footer _6o9eaa">
                                                                                <a href="">Tìm sản phẩm tương tự</a>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                    <div class="btn__click_stardust__product page__product">
                                                        <div class="vanhstore-mini-page-controller">
                                                            <a href="index.php?action=san-pham&page=<?= $page - 1 >= 1 ? $page - 1 : $page ?>" class="vanhstore-mini_controller_left ctl__left">&lt;</a>
                                                            <div class="vanhstore-mini-page-controller__state page__url">
                                                                <?php
                                                                    for($i = 1; $i <= $countTrang; $i++) {
                                                                        ?>
                                                                            <a href="index.php?action=san-pham&page=<?= $i; ?>" class="curent__page <?= $page == $i ? "activePage" : "" ?>"><?= $i ?></a>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                            <a href="index.php?action=san-pham&page=<?= $page + 1 <= $countTrang ? $page + 1 : $page ?>" class="vanhstore-mini_controller_right ctl__right">&gt;</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>