           <!-- main start -->
           <link rel="stylesheet" href="./css/danhmuc.css">
           <main class="main__category">
               <div class="div__main__category__vanhstore">
                   <div class="container category-banners">
                       <div style="width: 100%;">
                           <div class="category__banners__full">
                               <div class="category__banners__flex">
                                   <div class="category__banners__imgs" id="full-home-banners">
                                       <a href="">
                                           <img src="./img1/bgdm.png" alt="">
                                       </a>
                                       <a href="">
                                           <img src="./img1/bgvch.png" alt="">
                                       </a>
                                       <a href="">
                                           <img src="./img1/del.jfif" alt="">
                                       </a>
                                   </div>
                               </div>
                               <div class="btn__click__banners">
                                   <button class="click-left">
                                       <</button>
                                           <button class="click-right">></button>
                               </div>
                               <div class="list-icdost__dostClick">
                                   <div class="icdost icdost-0 active"></div>
                                   <div class="icdost icdost-1"></div>
                                   <div class="icdost icdost-2"></div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="container category__product">
                       <?php
                            include "viewblock/boxleft.php";
                       ?>
                       <div class="category__list__product">
                           <section class="category-search__item-result">
                               <div class="vanhstore-sort-bar">
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
                                                       <span style="pointer-events: none;" class="price__svg">Giá</span>
                                                       <svg viewBox="0 0 10 6" class="shopee-svg-icon icon-arrow-down-small">
                                                           <path d="M9.7503478 1.37413402L5.3649665 5.78112957c-.1947815.19574157-.511363.19651982-.7071046.00173827a.50153763.50153763 0 0 1-.0008702-.00086807L.2050664 1.33007451l.0007126-.00071253C.077901 1.18820749 0 1.0009341 0 .79546595 0 .35614224.3561422 0 .7954659 0c.2054682 0 .3927416.07790103.5338961.20577896l.0006632-.00066318.0226101.02261012a.80128317.80128317 0 0 1 .0105706.0105706l3.3619016 3.36190165c.1562097.15620972.4094757.15620972.5656855 0a.42598723.42598723 0 0 0 .0006944-.00069616L8.6678481.20650022l.0009529.0009482C8.8101657.07857935 8.9981733 0 9.2045341 0 9.6438578 0 10 .35614224 10 .79546595c0 .20495443-.077512.39180497-.2048207.53283641l.0003896.00038772-.0096728.00972053a.80044712.80044712 0 0 1-.0355483.03572341z" fill-rule="nonzero"></path>
                                                       </svg>
                                                       <ul class="price-hover__desc">
                                                           <li><a href="index.php?action=danh-muc&category_id=<?= $_GET['category_id'] ?>&gia-thap-cao">Giá: Thấp đến Cao</a></li>
                                                           <li><a href="index.php?action=danh-muc&category_id=<?= $_GET['category_id'] ?>&gia-cao-thap">Giá: Cao đến Thấp</a></li>
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
                                       <a href="index.php?action=danh-muc&category_id=<?= $_GET['category_id'] ?>&page=<?= $page - 1 >= 1 ? $page - 1 : $page ?>" class="vanhstore-mini_controller_left"><</a>
                                        <a href="index.php?action=danh-muc&category_id=<?= $_GET['category_id'] ?>&page=<?= $page + 1 <= $countTrang ? $page + 1 : $page ?>" class="vanhstore-mini_controller_right">></a>
                                   </div>
                               </div>
                               <ul class="row vanhstore-search-item-result__items">
                                    <?php
                                        foreach($listProduct_byIdcategory as $productByid) {
                                            $sales = 100 - (($productByid['sale'] / $productByid['price']) * 100);
                                            ?>
                                                <li class="col-xs-2-4 vanhstore-search-item-result__item">
                                                    <a href="index.php?action=chi-tiet-sanpham&detail_product=<?= $productByid['product_id'] ?>">
                                                        <div class="ZK4XOV">
                                                            <div class="GnRhpE">
                                                                <div style="pointer-events: none;">
                                                                    <div class="Vd2yUl OI9tKN">
                                                                        <img src="./public/upload/image/product/<?= explode(",", $productByid['images'])[0] ?>" class="Fd4QmV KbUcCB" alt="">
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
                                                                            <div aria-hidden="true" class="DgXDzJ rolr6k Zvjf4O"><?= $productByid['product_name'] ?></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cA9TT+">
                                                                        <div class="bPcAVl FMvHxS H5ICvW" aria-hidden="true">₫<?= number_format($productByid['price'], 0,",",".") ?></div>
                                                                        <div class="bPcAVl IWBsMB">
                                                                            <span aria-label="current price"></span>
                                                                            <span class="bx++ig">₫</span>
                                                                            <span class="k9JZlv"><?= number_format($productByid['sale'], 0,",",".") ?></span>
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
                            </section>
                            <div class="btn__click_stardust__product page__product">
                                <div class="vanhstore-mini-page-controller">
                                    <a href="index.php?action=danh-muc&category_id=<?= $_GET['category_id'] ?>&page=<?= $page - 1 >= 1 ? $page - 1 : $page ?>" class="vanhstore-mini_controller_left ctl__left">&lt;</a>
                                    <div class="vanhstore-mini-page-controller__state page__url">
                                        <?php
                                            for($i = 1; $i <= $countTrang; $i++) {
                                                ?>
                                                    <a href="index.php?action=danh-muc&category_id=<?= $_GET['category_id'] ?>&page=<?= $i; ?>" class="curent__page <?= $page == $i ? "activePage" : "" ?>"><?= $i ?></a>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                    <a href="index.php?action=danh-muc&category_id=<?= $_GET['category_id'] ?>&page=<?= $page + 1 <= $countTrang ? $page + 1 : $page ?>" class="vanhstore-mini_controller_right ctl__right">&gt;</a>
                                </div>
                            </div>
                        </div>
                   </div>
               </div>
           </main>


           <!-- end main -->