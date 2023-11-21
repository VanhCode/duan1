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
                    foreach ($listcategoryLimit as $category) {
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
                                foreach ($listCategoryColum as $category) {
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
        <form action="index.php?action=san-pham" method="GET">

            <input type="hidden" name="action" value="san-pham">
            
            <div class="vanhstore-filter-group__body vanhstore-price-range-filter__edit">
                <div class="vanhstore-price-range-filter__inputs">
                    <input type="text" class="vanhstore-price-range-filter__input" name="min_price" placeholder="₫ TỪ" value="">
                    <div class="vanhstore-price-range-filter__range-line"></div>
                    <input type="text" class="vanhstore-price-range-filter__input" name="max_price" placeholder="₫ ĐẾN" value="">
                </div>
            </div>
            <input type="submit" class="btn-price__range-filter" value="ÁP DỤNG">
        </form>
    </div>
</div>