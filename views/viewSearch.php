           <!-- main start -->
           <link rel="stylesheet" href="./css/viewsearch.css">
           
           <main class="main__category">
               <div class="div__main__category__vanhstore">
                   <div class="container category__product">
                       <?php
                            include "viewblock/boxleft.php";
                       ?>
                       <div class="category__list__product">
                           <h1 class="shopee-search-result-header">
                               <div aria-hidden="true">
                                   <svg viewBox="0 0 18 24" class="shopee-svg-icon icon-hint-bulb">
                                       <g transform="translate(-355 -149)">
                                           <g transform="translate(355 149)">
                                               <g fill-rule="nonzero" transform="translate(5.4 19.155556)">
                                                   <path d="m1.08489412 1.77777778h5.1879153c.51164401 0 .92641344-.39796911.92641344-.88888889s-.41476943-.88888889-.92641344-.88888889h-5.1879153c-.51164402 0-.92641345.39796911-.92641345.88888889s.41476943.88888889.92641345.88888889z"></path>
                                                   <g transform="translate(1.9 2.666667)">
                                                       <path d="m .75 1.77777778h2.1c.41421356 0 .75-.39796911.75-.88888889s-.33578644-.88888889-.75-.88888889h-2.1c-.41421356 0-.75.39796911-.75.88888889s.33578644.88888889.75.88888889z"></path>
                                                   </g>
                                               </g>
                                               <path d="m8.1 8.77777718v4.66666782c0 .4295545.40294373.7777772.9.7777772s.9-.3482227.9-.7777772v-4.66666782c0-.42955447-.40294373-.77777718-.9-.77777718s-.9.34822271-.9.77777718z" fill-rule="nonzero"></path>
                                               <path d="m8.1 5.33333333v.88889432c0 .49091978.40294373.88888889.9.88888889s.9-.39796911.9-.88888889v-.88889432c0-.49091977-.40294373-.88888889-.9-.88888889s-.9.39796912-.9.88888889z" fill-rule="nonzero"></path>
                                               <path d="m8.80092773 0c-4.86181776 0-8.80092773 3.97866667-8.80092773 8.88888889 0 1.69422221.47617651 3.26933331 1.295126 4.61333331l2.50316913 3.9768889c.30201078.4782222.84303623.7697778 1.42482388.7697778h7.17785139c.7077799 0 1.3618277-.368 1.7027479-.9617778l2.3252977-4.0213333c.7411308-1.2888889 1.1728395-2.7786667 1.1728395-4.37688891 0-4.91022222-3.9409628-8.88888889-8.80092777-8.88888889m0 1.77777778c3.82979317 0 6.94810087 3.18933333 6.94810087 7.11111111 0 1.24444441-.3168334 2.43022221-.9393833 3.51466671l-2.3252977 4.0213333c-.0166754.0284444-.0481735.0462222-.0833772.0462222h-7.07224026l-2.43461454-3.8648889c-.68184029-1.12-1.04128871-2.4053333-1.04128871-3.71733331 0-3.92177778 3.11645483-7.11111111 6.94810084-7.11111111"></path>
                                           </g>
                                       </g>
                                   </svg>
                               </div>
                               <?php
                                    if(!empty($listProdSearch)) {
                                        ?>
                                            <span class="shopee-search-result-header__text">
                                                Kết quả tìm kiếm cho từ khoá '<span class="shopee-search-result-header__text-highlight" style="color: rgb(238, 77, 45); font-weight: 400;"><?= $keyword ?></span>'
                                            </span>
                                        <?php
                                    } else {
                                        ?>
                                            <span class="shopee-search-result-header__text">
                                                Chúng tôi không tìm thấy sản phẩm ' <span class="shopee-search-result-header__text-highlight" style="color: rgb(238, 77, 45); font-weight: 400;"><?= $keyword ?></span> ' nào
                                            </span>
                                        <?php
                                    }
                               ?>
                           </h1>
                           <?php
                                if(isset($_GET['product_filter']) && $_GET['product_filter'] == 'moi-nhat') {
                                    ?>
                                        <section class="category-search__item-result">
                                            <div class="vanhstore-sort-bar">
                                                <div class="flex__price_bost">
                                                    <legend style="display: none;"></legend>
                                                    <div class="vanhstore-sort-bar__label">Sắp xếp theo</div>
                                                    <div class="vanhstore-sort-by-options">
                                                        <section class="vanhstore-sort-by-options__option-group">
                                                            <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=pho-bien" class="btn-sort__bar" data-index="0">Phổ Biến</a>
                                                            <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=moi-nhat" class="btn-sort__bar" data-index="1">Mới Nhất</a>
                                                            <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=ban-chay" class="btn-sort__bar" data-index="2">Bán Chạy</a>
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
                                                                        <li><a href="index.php?keyword=<?= $_GET['keyword'] ?? $_GET['keyword'] ?>&gia-thap-cao">Giá: Thấp đến Cao</a></li>
                                                                        <li><a href="index.php?keyword=<?= $_GET['keyword'] ?? $_GET['keyword'] ?>&gia-cao-thap">Giá: Cao đến Thấp</a></li>
                                                                    </ul>
                                                                </button>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="vanhstore-mini-page-controller">
                                                    <div class="vanhstore-mini-page-controller__state">
                                                        <span class="vanhstore-mini-page-controller__current" style="color:#ee4d2d;"><?= $search_page ?></span>
                                                        /
                                                        <span class="vanhstore-mini-page-controller__total"><?= $countTrang ?></span>
                                                    </div>
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&search_page=<?= $search_page - 1 >= 1 ? $search_page - 1 : $search_page ?>" class="vanhstore-mini_controller_left"><</a>
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&search_page=<?= $search_page + 1 <= $countTrang ? $search_page + 1 : $countTrang ?>" class="vanhstore-mini_controller_right">></a>
                                                </div>
                                            </div>
                                            <ul class="row vanhstore-search-item-result__items">
                                                <?php
                                                    foreach($listProdSearch as $product) {
                                                        $sales = 100 - (($product['sale'] / $product['price']) * 100);
                                                        ?>
                                                            <li class="col-xs-2-4 vanhstore-search-item-result__item">
                                                                <a href="index.php?action=chi-tiet-sanpham&detail_product=<?= $product['product_id'] ?>">
                                                                    <div class="ZK4XOV">
                                                                        <div class="GnRhpE">
                                                                            <div style="pointer-events: none;">
                                                                                <div class="Vd2yUl OI9tKN">
                                                                                    <img src="./public/upload/image/product/<?= explode(",", $product['images'])[0] ?>" class="Fd4QmV KbUcCB" alt="">
                                                                                    <div class="D3Hha7">
                                                                                        <div class="JhPmwn rXAd6u" style="color: rgb(242, 82, 32);">
                                                                                            <div class="DqPlQB lGEnMK">Yêu thích</div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="TS7wv2">
                                                                                        <div class="JC9p5x">
                                                                                            <span class="FTxtVW">-<?= ceil($sales) ?>%</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="N+Ex9S">
                                                                                        <div class="customized-overlay-image">
                                                                                            <img alt="overlay image" src="./img1/bg_sale.png" width="" height="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="JxvxgB">
                                                                                <div class="wuYpH6" data-sqe="name">
                                                                                    <div class="efwNRW">
                                                                                        <div aria-hidden="true" class="DgXDzJ rolr6k Zvjf4O"><?= $product['product_name'] ?></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cA9TT+">
                                                                                    <div class="bPcAVl FMvHxS H5ICvW" aria-hidden="true">₫<?= number_format($product['price'], 0, ',','.') ?></div>
                                                                                    <div class="bPcAVl IWBsMB">
                                                                                        <span aria-label="current price"></span>
                                                                                        <span class="bx++ig">₫</span>
                                                                                        <span class="k9JZlv"><?= number_format($product['sale'], 0, ',','.') ?></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="DN6Jp1">
                                                                                    <div class="OwmBnn eumuJJ">Đã bán 51</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vanhstore-item-card__hover-footer _6o9eaa">
                                                                                <a href="">Tìm sản phẩm tương tự</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        <?php
                                                    }
                                                ?>
                                            </ul>
                                            <div class="btn__click_stardust__product page__product">
                                                <div class="vanhstore-mini-page-controller">
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&search_page=<?= $search_page - 1 >= 1 ? $search_page - 1 : $search_page ?>" class="vanhstore-mini_controller_left ctl__left">&lt;</a>
                                                    <div class="vanhstore-mini-page-controller__state page__url">
                                                        <?php
                                                            for($i = 1; $i <= $countTrang; $i++) {
                                                                ?>
                                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&search_page=<?= $i; ?>" class="curent__page <?= $search_page == $i ? "activePage" : "" ?>"><?= $i ?></a>
                                                                <?php
                                                            }
                                                        
                                                        ?>
                                                    </div>
                                                    
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&search_page=<?= $search_page + 1 <= $countTrang ? $search_page + 1 : $search_page ?>" class="vanhstore-mini_controller_right ctl__right">&gt;</a>
                                                </div>
                                            </div>
                                        </section>
                                    <?php
                                } else if(isset($_GET['product_filter']) && $_GET['product_filter'] == 'ban-chay') {
                                    ?>
                                        <section class="category-search__item-result">
                                            <div class="vanhstore-sort-bar">
                                                <div class="flex__price_bost">
                                                    <legend style="display: none;"></legend>
                                                    <div class="vanhstore-sort-bar__label">Sắp xếp theo</div>
                                                    <div class="vanhstore-sort-by-options">
                                                        <section class="vanhstore-sort-by-options__option-group">
                                                            <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=pho-bien" class="btn-sort__bar" data-index="0">Phổ Biến</a>
                                                            <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=moi-nhat" class="btn-sort__bar" data-index="1">Mới Nhất</a>
                                                            <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=ban-chay" class="btn-sort__bar" data-index="2">Bán Chạy</a>
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
                                                                        <li><a href="index.php?keyword=<?= $_GET['keyword'] ?? $_GET['keyword'] ?>&product_filter=ban-chay&gia-thap-cao">Giá: Thấp đến Cao</a></li>
                                                                        <li><a href="index.php?keyword=<?= $_GET['keyword'] ?? $_GET['keyword'] ?>&product_filter=ban-chay&gia-cao-thap">Giá: Cao đến Thấp</a></li>
                                                                    </ul>
                                                                </button>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="vanhstore-mini-page-controller">
                                                    <div class="vanhstore-mini-page-controller__state">
                                                        <span class="vanhstore-mini-page-controller__current" style="color:#ee4d2d;"><?= $search_page ?></span>
                                                        /
                                                        <span class="vanhstore-mini-page-controller__total"><?= $countTrang ?></span>
                                                    </div>
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=ban-chay&search_page=<?= $search_page - 1 >= 1 ? $search_page - 1 : $search_page ?>" class="vanhstore-mini_controller_left"><</a>
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=ban-chay&search_page=<?= $search_page + 1 <= $countTrang ? $search_page + 1 : $countTrang ?>" class="vanhstore-mini_controller_right">></a>
                                                </div>
                                            </div>
                                            <ul class="row vanhstore-search-item-result__items">
                                                <?php
                                                    foreach($listProdSearch as $productbanchay) {
                                                        $sales = 100 - (($productbanchay['sale'] / $productbanchay['price']) * 100);
                                                        ?>
                                                            <li class="col-xs-2-4 vanhstore-search-item-result__item">
                                                                <a href="index.php?action=chi-tiet-sanpham&detail_product=<?= $productbanchay['product_id'] ?>">
                                                                    <div class="ZK4XOV">
                                                                        <div class="GnRhpE">
                                                                            <div style="pointer-events: none;">
                                                                                <div class="Vd2yUl OI9tKN">
                                                                                    <img src="./public/upload/image/product/<?= explode(",", $productbanchay['images'])[0] ?>" class="Fd4QmV KbUcCB" alt="">
                                                                                    <div class="D3Hha7">
                                                                                        <div class="JhPmwn rXAd6u" style="color: rgb(242, 82, 32);">
                                                                                            <div class="DqPlQB lGEnMK">Yêu thích</div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="TS7wv2">
                                                                                        <div class="JC9p5x">
                                                                                            <span class="FTxtVW">-<?= ceil($sales) ?>%</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="N+Ex9S">
                                                                                        <div class="customized-overlay-image">
                                                                                            <img alt="overlay image" src="./img1/bg_sale.png" width="" height="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="JxvxgB">
                                                                                <div class="wuYpH6" data-sqe="name">
                                                                                    <div class="efwNRW">
                                                                                        <div aria-hidden="true" class="DgXDzJ rolr6k Zvjf4O"><?= $productbanchay['product_name'] ?></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cA9TT+">
                                                                                    <div class="bPcAVl FMvHxS H5ICvW" aria-hidden="true">₫<?= number_format($productbanchay['price'], 0, ',','.') ?></div>
                                                                                    <div class="bPcAVl IWBsMB">
                                                                                        <span aria-label="current price"></span>
                                                                                        <span class="bx++ig">₫</span>
                                                                                        <span class="k9JZlv"><?= number_format($productbanchay['sale'], 0, ',','.') ?></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="DN6Jp1">
                                                                                    <div class="OwmBnn eumuJJ">Đã bán 51</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vanhstore-item-card__hover-footer _6o9eaa">
                                                                                <a href="">Tìm sản phẩm tương tự</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        <?php
                                                    }
                                                ?>
                                            </ul>
                                            <div class="btn__click_stardust__product page__product">
                                                <div class="vanhstore-mini-page-controller">
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=ban-chay&search_page=<?= $search_page - 1 >= 1 ? $search_page - 1 : $search_page ?>" class="vanhstore-mini_controller_left ctl__left">&lt;</a>
                                                    <div class="vanhstore-mini-page-controller__state page__url">
                                                        <?php
                                                            for($i = 1; $i <= $countTrang; $i++) {
                                                                ?>
                                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=ban-chay&search_page=<?= $i; ?>" class="curent__page <?= $search_page == $i ? "activePage" : "" ?>"><?= $i ?></a>
                                                                <?php
                                                            }
                                                        
                                                        ?>
                                                    </div>
                                                    
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=ban-chay&search_page=<?= $search_page + 1 <= $countTrang ? $search_page + 1 : $search_page ?>" class="vanhstore-mini_controller_right ctl__right">&gt;</a>
                                                </div>
                                            </div>
                                        </section>
                                    <?php
                                } else {
                                    ?>
                                        <section class="category-search__item-result">
                                            <div class="vanhstore-sort-bar">
                                                <div class="flex__price_bost">
                                                    <legend style="display: none;"></legend>
                                                    <div class="vanhstore-sort-bar__label">Sắp xếp theo</div>
                                                    <div class="vanhstore-sort-by-options">
                                                        <section class="vanhstore-sort-by-options__option-group">
                                                            <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=pho-bien" class="btn-sort__bar" data-index="0">Phổ Biến</a>
                                                            <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=moi-nhat" class="btn-sort__bar" data-index="1">Mới Nhất</a>
                                                            <a href="index.php?keyword=<?= $_GET['keyword'] ?>&product_filter=ban-chay" class="btn-sort__bar" data-index="2">Bán Chạy</a>
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
                                                                        <li><a href="index.php?keyword=<?= $_GET['keyword'] ?? $_GET['keyword'] ?>&gia-thap-cao">Giá: Thấp đến Cao</a></li>
                                                                        <li><a href="index.php?keyword=<?= $_GET['keyword'] ?? $_GET['keyword'] ?>&gia-cao-thap">Giá: Cao đến Thấp</a></li>
                                                                    </ul>
                                                                </button>
                                                            </div>
                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="vanhstore-mini-page-controller">
                                                    <div class="vanhstore-mini-page-controller__state">
                                                        <span class="vanhstore-mini-page-controller__current" style="color:#ee4d2d;"><?= $search_page ?></span>
                                                        /
                                                        <span class="vanhstore-mini-page-controller__total"><?= $countTrang ?></span>
                                                    </div>
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&search_page=<?= $search_page - 1 >= 1 ? $search_page - 1 : $search_page ?>" class="vanhstore-mini_controller_left"><</a>
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&search_page=<?= $search_page + 1 <= $countTrang ? $search_page + 1 : $countTrang ?>" class="vanhstore-mini_controller_right">></a>
                                                </div>
                                            </div>
                                            <ul class="row vanhstore-search-item-result__items">
                                                <?php
                                                    foreach($listProdSearch as $product) {
                                                        $sales = 100 - (($product['sale'] / $product['price']) * 100);
                                                        ?>
                                                            <li class="col-xs-2-4 vanhstore-search-item-result__item">
                                                                <a href="index.php?action=chi-tiet-sanpham&detail_product=<?= $product['product_id'] ?>">
                                                                    <div class="ZK4XOV">
                                                                        <div class="GnRhpE">
                                                                            <div style="pointer-events: none;">
                                                                                <div class="Vd2yUl OI9tKN">
                                                                                    <img src="./public/upload/image/product/<?= explode(",", $product['images'])[0] ?>" class="Fd4QmV KbUcCB" alt="">
                                                                                    <div class="D3Hha7">
                                                                                        <div class="JhPmwn rXAd6u" style="color: rgb(242, 82, 32);">
                                                                                            <div class="DqPlQB lGEnMK">Yêu thích</div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="TS7wv2">
                                                                                        <div class="JC9p5x">
                                                                                            <span class="FTxtVW">-<?= ceil($sales) ?>%</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="N+Ex9S">
                                                                                        <div class="customized-overlay-image">
                                                                                            <img alt="overlay image" src="./img1/bg_sale.png" width="" height="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="JxvxgB">
                                                                                <div class="wuYpH6" data-sqe="name">
                                                                                    <div class="efwNRW">
                                                                                        <div aria-hidden="true" class="DgXDzJ rolr6k Zvjf4O"><?= $product['product_name'] ?></div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cA9TT+">
                                                                                    <div class="bPcAVl FMvHxS H5ICvW" aria-hidden="true">₫<?= number_format($product['price'], 0, ',','.') ?></div>
                                                                                    <div class="bPcAVl IWBsMB">
                                                                                        <span aria-label="current price"></span>
                                                                                        <span class="bx++ig">₫</span>
                                                                                        <span class="k9JZlv"><?= number_format($product['sale'], 0, ',','.') ?></span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="DN6Jp1">
                                                                                    <div class="OwmBnn eumuJJ">Đã bán 51</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vanhstore-item-card__hover-footer _6o9eaa">
                                                                                <a href="">Tìm sản phẩm tương tự</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        <?php
                                                    }
                                                ?>
                                            </ul>
                                            <div class="btn__click_stardust__product page__product">
                                                <div class="vanhstore-mini-page-controller">
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&search_page=<?= $search_page - 1 >= 1 ? $search_page - 1 : $search_page ?>" class="vanhstore-mini_controller_left ctl__left">&lt;</a>
                                                    <div class="vanhstore-mini-page-controller__state page__url">
                                                        <?php
                                                            for($i = 1; $i <= $countTrang; $i++) {
                                                                ?>
                                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&search_page=<?= $i; ?>" class="curent__page <?= $search_page == $i ? "activePage" : "" ?>"><?= $i ?></a>
                                                                <?php
                                                            }
                                                        
                                                        ?>
                                                    </div>
                                                    
                                                    <a href="index.php?keyword=<?= $_GET['keyword'] ?>&search_page=<?= $search_page + 1 <= $countTrang ? $search_page + 1 : $search_page ?>" class="vanhstore-mini_controller_right ctl__right">&gt;</a>
                                                </div>
                                            </div>
                                        </section>
                                    <?php
                                }
                           ?>
                       </div>
                   </div>
               </div>
           </main>


           <!-- end main -->