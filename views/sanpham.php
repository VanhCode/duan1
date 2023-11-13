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
                                                                <div class="vanhstore-item-card__hover-footer _6o9eaa">
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
    </div>