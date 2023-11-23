<div class="container">
    <?php
        if(!empty($listCart)) {
            ?>
                <form action="index.php?action=gio-hang" id="formSendCart" onsubmit="return sendDeleteCart()" method="POST">
                    <!-- Model delete Cart checkbox -->

                    <div class="vanhstore-popup vanhstore-modal__transition-enter-done" id="confirmModal">
                        <div class="vanhstore-popup__overlay" id="BackgrountNone"></div>
                        <div class="vanhstore-popup__container">
                            <div id="confirmModalChil" class="gLboXK">
                                <div class="hr7yn9">Bạn có muốn bỏ 1 sản phẩm?</div>
                                <div class="rySPUB">
                                    <button id="confirmBackBtn" class="vanhstore-button-solid vanhstore-button-solid--primary vanhstore-button-solid--confirm-popup">Trở Lại</button>
                                    <button name="deleteCart" id="confirmYesBtn" class="cancel-btn">có</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End model delete Cart checkbox -->
                    <div class="cheked__product">
                        <main>
                            <div class="if-swd">
                                <div class="rtM2Xz">
                                    <img src="./img1/sale.png" alt="fs-icon">
                                    <span class="bXROAg">Nhấn vào mục Mã giảm giá ở cuối trang để hưởng miễn phí vận chuyển bạn nhé!</span>
                                </div>
                                <div class="BjIo5w">
                                    <div class="mcsiKT">
                                        <label class="stardust-checkbox">
                                            <input class="stardust-checkbox__input" type="checkbox" aria-checked="false" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                                            <div class="stardust-checkbox__box"></div>
                                        </label>
                                    </div>
                                    <div class="yl931K">Sản Phẩm</div>
                                    <div class="yl931j">Kích Thước</div>
                                    <div class="pZMZa7">Đơn Giá</div>
                                    <div class="lKFOxX">Số Lượng</div>
                                    <div class="_5f317z">Số Tiền</div>
                                    <div class="+4E7yJ">Thao Tác</div>
                                </div>
                                    <div class="_48e0yS">
                                        <div>
                                            <div class="SFF7z2 dWLQTS">
                                                <div class="xP1eaK">
                                                    <div class="_5sTIHk">
                                                        <label class="stardust-checkbox">
                                                            <input class="stardust-checkbox__input" type="checkbox" aria-checked="false" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                                                            <div class="stardust-checkbox__box"></div>
                                                        </label>
                                                    </div>
                                                    <a href="" class="wJCpl6">
                                                        <div class="icon-shop">
                                                            <i class="bTa6Yo fa-solid fa-shop"></i>
                                                        </div>
                                                        <span style="margin-left: 10px;">VanhStore</span>
                                                        <a href="" class="p2B+nr">
                                                            <i class="bTa6Yo icon-message fa-regular fa-message"></i>
                                                        </a>
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- sản phẩm -->
                                                <?php
                                                    $tong = 0;
                                                    foreach($listCart as $cart) {
                                                        $giamgia = $cart['price'] * $cart['sale'] / 100;
                                                        $sotien = $cart['price'] * $cart['amount'];
                                                        $tong += $sotien;
                                                        ?>
                                                            <div class="Eb+POp">
                                                                <div class="VPZ9zs">
                                                                    <div class="zoXdNN">
                                                                        <div class="lgcEHJ">
                                                                            <label class="stardust-checkbox">
                                                                                <input class="stardust-checkbox__input" id="checkBox__productCart" type="checkbox" name="id_cart[]" value="<?= $cart['cart_id'] ?>">
                                                                                <div class="stardust-checkbox__box"></div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="link-img-product">
                                                                            <div class="box-img-product">
                                                                                <div class="div-box-imgA">
                                                                                    <a href="index.php?action=chi-tiet-sanpham&detail_product=<?= $cart['product_id'] ?>">
                                                                                        <img class="img-product-item" src="./public/upload/image/product/<?= explode(",", $cart['images'])[0] ?>" alt="">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="title-text-product">
                                                                                    <a href="" class="text-img-content">
                                                                                        <?= $cart['product_name'] ?>
                                                                                    </a>
                                                                                    <img class="eQNnTs" src="./img1/saleimg.png" alt="">
                                                                                    <div class="QRuJU-"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="color-product">
                                                                            <div class="color-group">
                                                                                <h5>Phân loại:</h5>
                                                                                <p><?= $cart['color'] ?></p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="size__product">
                                                                            <div class="price-flex">
                                                                                <span><?= $cart['size'] ?></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="price-product">
                                                                            <div class="price-flex flex__price2">
                                                                                <span id="price-throwChange" class="price-money price-chil">
                                                                                    ₫<?= number_format($giamgia, 0, ",", ".") ?>
                                                                                </span>
                                                                                <span id="price-click" class="price-money">
                                                                                    ₫<?= number_format($cart['price'], 0, ",", ".") ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="amount-product">
                                                                            <div class="amount-click-box">
                                                                                <input type="hidden" name="" class="id__cart" value="<?= $cart['cart_id'] ?>">
                                                                                <a id="" class="clickAdd__deleteprice_right click_left"><i class="fa-solid fa-minus"></i></a>
                                                                                <input disabled type="text" id="" class="amount__flex amount__cartItem" value="<?= $cart['amount'] ?>">
                                                                                <a id="" class="clickAdd__deleteprice_left click_right"><i class="fa-solid fa-plus"></i></a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="money-product">
                                                                            <div>
                                                                                <span id="money-send" class="money-send">
                                                                                    ₫<?= number_format($sotien, 0, ",", ".") ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="delete-product">
                                                                            <div>
                                                                                <a href="index.php?action=deleteCart&cart_id=<?= $cart['cart_id'] ?>" class="delete-sp">
                                                                                    Xóa
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                    }
                                                ?>
                                        
                                        <!-- end sản phẩm -->

                                        <div class="sale-voucher">
                                            <i class="fa-solid icon-sale-voucher fa-ticket-simple"></i>
                                            <div class="voucher-text">
                                                <div class="sale10pt">Shop Voucher giảm đến 10%</div>
                                                <div class="newVoucher">Mới</div>
                                                <div class="click-view-voucher">
                                                    <a href="" class="view-next">Xem thêm voucher</a>
                                                    <div style="display: contents;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </main>
                        <section class="abate row-abate">
                            <div></div>
                            <div class="row1 row-abate1">
                                <i class="fa-solid icon-sale-voucher fa-ticket-simple"></i>
                                <div class="text-abate-voucher">VanhStore Voucher</div>
                                <div class="line-abate"></div>
                                <a href="" class="click-abate">Chọn hoặc nhập mã</a>
                            </div>
                            <div class="line-row-abate line-bottom-abate"></div>
                            <div class="row-left-abate left-abate-checkbox">
                                <label class="stardust-checkbox">
                                    <input class="stardust-checkbox__input" type="checkbox" aria-checked="false" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                                    <div class="stardust-checkbox__box"></div>
                                </label>
                            </div>
                            <div class="click-abate">
                                <i class="fa-solid icon-abate-left fa-circle-dollar-to-slot"></i>
                                <div class="vanhstoxu-abate">VanhStore Xu</div>
                                <div class="check-product-click-abate">Bạn chưa chọn sản phẩm</div>
                            </div>
                            <div class="price-send-abate">
                                -0đ
                            </div>
                            <div class="line-send-abate-end"></div>
                            <div class="s1Gxkq c2pfrq">
                                <div class="wqjloc">
                                    <label class="stardust-checkbox">
                                        <input class="stardust-checkbox__input" type="checkbox" aria-checked="false" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                                        <div class="stardust-checkbox__box"></div>
                                    </label>
                                </div>
                                <a href="" class="iGlIrs clear-btn-style">Chọn Tất Cả</a>
                                <a class="delete__bycheckbox"><input type="button" class="clear-btn-style clear-abate delete__checkbox" value="Xóa"></a>
                                <div class=""></div>
                                <a href="" class="clear-btn-style save-like">Lưu vào mục Đã thích</a>
                                <div class="save-line"></div>
                                <div class="total-payout">
                                    <div class="check-total-payout">
                                        <div class="flex-total-payout">
                                            <div class="total-text-">Tổng thanh toán (<?= $countProduct_cart['countProduct_cart'] ?>): </div>
                                            <div class="price-end-total">₫<?= number_format($tong, 0, ",", ".") ?></div>
                                        </div>
                                    </div>
                                    <div class="line-end-total-payout"></div>
                                </div>
                                <button id="thanhtoan__order" name="muahang" class="vanh-button-solid vanh-button-solid--primary">
                                    <span class="send-end-total">Mua hàng</span>
                                </button>
                            </div>
                        </section>
                    </div>
                </form>
            <?php
        } else {
            ?>
                <div class="no__productCart">
                    <div class="no__productCart__logo"></div>
                    <div class="no__productCart__text">Giỏ hàng của bạn còn trống</div>
                    <a href="index.php?action=san-pham" class="no__productCart__aClickProduct">Mua Ngay</a>
                </div>
            <?php
        }
    ?>
    
</div>

<div class="container">
    <div class="maybe-you-like">
        <div style="display: contents;">
            <div class="text-header-you">
                <div class="tile-like-headerMay">
                    <div>Có thể bạn cũng thích</div>
                </div>
                <a href="index.php?action=san-pham" class="view-full-product-link">
                    <button class="icon-next-view-link">
                        Xem Tất Cả
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </a>
            </div>
            <div class="productS-link-full-view viewOne">  
                <?php
                    foreach($listProduct as $productCart) {
                        ?>
                            <div class="productS-full-link-view">
                                <a href="index.php?action=chi-tiet-sanpham&detail_product=<?= $productCart['product_id'] ?>" class="">
                                    <div class="prd-v2">
                                        <div class="prd-v3">
                                            <div style="pointer-events: none;">
                                                <div class="prd-img-hv">
                                                    <img src="./public/upload/image/product/<?= explode(",", $productCart['images'])[0] ?>" class="prd-img" alt="">
                                                    <div class="yt-prd">
                                                        <div class="yt-chill rgba-yt-chil">
                                                            <span class="span-yt-chil span-yt-prd">Yêu thích</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="prd-v3-chil">
                                                <div class="prd-v3-title-text">
                                                    <div class="prd-v3-box-text">
                                                        <div class="prd-v3-text">
                                                            <?= $productCart['product_name'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prd-v3-price prd-v3-price-bv">
                                                    <div class="prd-v3-price-textChil">
                                                        <span class="prd-v3-price-textChil-span">
                                                            ₫<?= number_format($productCart['price'], 0,',','.') ?>
                                                        </span>
                                                    </div>
                                                    <div class="check-sub-success">
                                                        Đã bán 2k5
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- end main -->

<script src="./js/cartajax.js"></script>