<link rel="stylesheet" href="./css/chitietsp.css">
<div class="main container">
        <div class="section-recommend-products-wrapper">
            <div class="category__product">
                <div class="category__title__text">
                    <div class="category__list__text">
                        <a href="" class="flex__all__list__category">
                            <i class="fa-solid fa-bars"></i>
                            Tất Cả Danh Mục
                        </a>
                        <div class="vanhstore-category__list__body">
                            <div class="vanhstore-category-list__category">
                                <div class="folding-items__list__category">
                                    <?php
                                        foreach($listcategoryLimit as $category) {
                                            ?>
                                                <a href="index.php?action=danh-muc&category_id=<?= $category['category_id'] ?>" class="vanhstore-category-list__sub-category">
                                                    <i class="fa-solid fa-play list-category__active"></i>
                                                    <?= $category['category_name'] ?>
                                                </a>
                                            <?php
                                        }
                                    ?>
                                    <div class="stardust-dropdown folding-items__toggle">
                                        <div class="stardust-dropdown__item-header">
                                            <div class="vanhstore-category-list__toggle-btn">
                                                Thêm <i class="fa-solid fa-chevron-down"></i>
                                            </div>
                                        </div>
                                        <div class="stardust-dropdown__item-body">
                                            <div class="folding-items__folded-items">
                                                <?php
                                                    foreach($listCategoryColum as $category) {
                                                        ?>
                                                            <a href="index.php?action=danh-muc&category_id=<?= $category['category_id'] ?>" class="vanhstore-category-list__sub-category">
                                                                <i class="fa-solid fa-play list-category__active"></i>
                                                                <?= $category['category_name'] ?>
                                                            </a>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div></div>
                    <div class="vanhstore-search-filter-status">
                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon">
                            <g>
                                <polyline fill="none" points="5.5 13.2 5.5 5.8 1.5 1.2 13.5 1.2 9.5 5.8 9.5 10.2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                                </polyline>
                                <polyline id="filter__ticked" points="9.2 11.3 10.3 12.1 11.8 10.4" style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-miterlimit: 10; stroke-width: 0.5;">
                                </polyline>
                                <circle cx="10.5" cy="11.2" r="2.5" stroke="none"></circle>
                                <use xlink:href="#filter__ticked"></use>
                            </g>
                        </svg>
                        <div class="vanhstore-search-filter-status__text">
                            Bộ Lọc Tìm Kiếm
                        </div>
                    </div>
                    <div class="vanhstore-filter-group vanhstore-facet-filter">
                        <div class="vanhstore-filter-group__header">Theo Danh Mục</div>
                        <div class="folding-items vanhstore-filter-group__body folding-items--folded">
                            <div class="vanhstore-filter vanhstore-checkbox-filter">
                                <div class="vanhstore-checkbox">
                                    <label class="vanhstore-checkbox__control">
                                        <a href="pgp.com" class="a-checkbox__href">
                                            <span class="vanhstore-checkbox__box"><svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-checkbox-ticked shopee-checkbox__tick icon-tick-bold">
                                                    <g>
                                                        <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                                    </g>
                                                </svg></span>
                                        </a>
                                        <span class="vanhstore-checkbox__label">Áo Thun</span>
                                    </label>
                                </div>
                            </div>
                            <div class="vanhstore-filter vanhstore-checkbox-filter">
                                <div class="vanhstore-checkbox">
                                    <label class="vanhstore-checkbox__control">
                                        <a href="#" class="a-checkbox__href">
                                            <span class="vanhstore-checkbox__box"><svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-checkbox-ticked shopee-checkbox__tick icon-tick-bold">
                                                    <g>
                                                        <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                                    </g>
                                                </svg></span>
                                        </a>
                                        <span class="vanhstore-checkbox__label">Áo Khoác</span>
                                    </label>
                                </div>
                            </div>
                            <div class="vanhstore-filter vanhstore-checkbox-filter">
                                <div class="vanhstore-checkbox">
                                    <label class="vanhstore-checkbox__control">
                                        <a href="#" class="a-checkbox__href">
                                            <span class="vanhstore-checkbox__box"><svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-checkbox-ticked shopee-checkbox__tick icon-tick-bold">
                                                    <g>
                                                        <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                                    </g>
                                                </svg></span>
                                        </a>
                                        <span class="vanhstore-checkbox__label">Hoodie & Áo Nỉ</span>
                                    </label>
                                </div>
                            </div>
                            <div class="vanhstore-filter vanhstore-checkbox-filter">
                                <div class="vanhstore-checkbox">
                                    <label class="vanhstore-checkbox__control">
                                        <a href="#" class="a-checkbox__href">
                                            <span class="vanhstore-checkbox__box"><svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-checkbox-ticked shopee-checkbox__tick icon-tick-bold">
                                                    <g>
                                                        <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <span class="vanhstore-checkbox__label">Áo Sơ Mi</span>
                                    </label>
                                </div>
                            </div>
                            <div class="stardust-dropdown folding-items__toggle">
                                <div class="stardust-dropdown__item-header">
                                    <div class="vanhstore-filter-group__toggle-btn">
                                        Thêm <i class="fa-solid fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="stardust-dropdown__item-body stardust-filter_list__body">
                                    <div class="folding-items__folded-items">
                                        <div class="vanhstore-filter vanhstore-checkbox-filter">
                                            <div class="vanhstore-checkbox">
                                                <label class="vanhstore-checkbox__control">
                                                    <a href="#" class="a-checkbox__href">
                                                        <span class="vanhstore-checkbox__box"><svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-checkbox-ticked shopee-checkbox__tick icon-tick-bold">
                                                                <g>
                                                                    <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <span class="vanhstore-checkbox__label">Áo Thun</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="vanhstore-filter vanhstore-checkbox-filter">
                                            <div class="vanhstore-checkbox">
                                                <label class="vanhstore-checkbox__control">
                                                    <a href="#" class="a-checkbox__href">
                                                        <span class="vanhstore-checkbox__box"><svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-checkbox-ticked shopee-checkbox__tick icon-tick-bold">
                                                                <g>
                                                                    <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <span class="vanhstore-checkbox__label">Áo Khoác</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="vanhstore-filter vanhstore-checkbox-filter">
                                            <div class="vanhstore-checkbox">
                                                <label class="vanhstore-checkbox__control">
                                                    <a href="#" class="a-checkbox__href">
                                                        <span class="vanhstore-checkbox__box"><svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-checkbox-ticked shopee-checkbox__tick icon-tick-bold">
                                                                <g>
                                                                    <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <span class="vanhstore-checkbox__label">Hoodie & Áo
                                                        Nỉ</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="vanhstore-filter vanhstore-checkbox-filter">
                                            <div class="vanhstore-checkbox">
                                                <label class="vanhstore-checkbox__control">
                                                    <a href="#" class="a-checkbox__href">
                                                        <span class="vanhstore-checkbox__box"><svg enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-checkbox-ticked shopee-checkbox__tick icon-tick-bold">
                                                                <g>
                                                                    <path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <span class="vanhstore-checkbox__label">Áo Sơ Mi</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vanhstore-price-range-filter">
                        <div class="vanhstore-price-range-filter__text">Khoảng Giá</div>
                        <form action="" method="post">
                            <div class="vanhstore-filter-group__body vanhstore-price-range-filter__edit">
                                <div class="vanhstore-price-range-filter__inputs">
                                    <input type="text" class="vanhstore-price-range-filter__input" placeholder="₫ TỪ" value="">
                                    <div class="vanhstore-price-range-filter__range-line"></div>
                                    <input type="text" class="vanhstore-price-range-filter__input" placeholder="₫ ĐẾN" value="">
                                </div>
                            </div>
                            <input type="submit" name="apply_form" class="btn-price__range-filter" value="ÁP DỤNG">
                        </form>
                    </div>
                </div>
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
                                        <span class="vanhstore-mini-page-controller__total"><?= $countTrang ?></span>
                                            
                                    </div>
                                    <a href="index.php?action=san-pham&page=<?= $page - 1 >= 1 ? $page - 1 : $page ?>" class="vanhstore-mini_controller_left"><</a>
                                    <a href="index.php?action=san-pham&page=<?= $page + 1 <= $countTrang ? $page + 1 : $page ?>" class="vanhstore-mini_controller_right">></a>
                                </div>
                            </div>
                            <div class="stardust-tabs-header-product">
                                <section class="stardust-tabs-panels__panel" style="display: block;">
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
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>