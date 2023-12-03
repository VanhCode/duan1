<div id="tab-4" class="tab-content-item">
    
    <?php
        if(empty($load_order_danggiao)) {
            ?>
                <div class="form-single">
                    <div class="no-single"></div>
                    <h2>Chưa có đơn hàng</h2>
                </div>
            <?php
        } else {
            ?>
                <main>
                    <?php
                        $grouped_orders = [];
                                
                        foreach ($load_order_danggiao as $orderdetail) {

                            $order_id = $orderdetail['order_id'];

                            if (!isset($grouped_orders[$order_id])) {
                                $grouped_orders[$order_id] = [];
                            }
                            $grouped_orders[$order_id][] = $orderdetail;
                        }

                        foreach($grouped_orders as $order_id => $order_details) {
                            $thanhtien = 0;
                            ?>
                                <div>
                                    <div class="hiXKxx">
                                        <div>
                                            <div class="x0QT2k">
                                                <section>
                                                    <h3 class="a11y-hidden"></h3>
                                                    <div class="KrPQEI">
                                                        <div class="qCUYY8">
                                                            <div>
                                                                <svg width="17" height="16" viewBox="0 0 17 16" class="_0RxYUS">
                                                                    <title>Shop Icon</title>
                                                                    <path d="M1.95 6.6c.156.804.7 1.867 1.357 1.867.654 0 1.43 0 1.43-.933h.932s0 .933 1.155.933c1.176 0 1.15-.933 1.15-.933h.984s-.027.933 1.148.933c1.157 0 1.15-.933 1.15-.933h.94s0 .933 1.43.933c1.368 0 1.356-1.867 1.356-1.867H1.95zm11.49-4.666H3.493L2.248 5.667h12.437L13.44 1.934zM2.853 14.066h11.22l-.01-4.782c-.148.02-.295.042-.465.042-.7 0-1.436-.324-1.866-.86-.376.53-.88.86-1.622.86-.667 0-1.255-.417-1.64-.86-.39.443-.976.86-1.643.86-.74 0-1.246-.33-1.623-.86-.43.536-1.195.86-1.895.86-.152 0-.297-.02-.436-.05l-.018 4.79zM14.996 12.2v.933L14.984 15H1.94l-.002-1.867V8.84C1.355 8.306 1.003 7.456 1 6.6L2.87 1h11.193l1.866 5.6c0 .943-.225 1.876-.934 2.39v3.21z" stroke-width=".3" stroke="#333" fill="#333" fill-rule="evenodd"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="_9Ro5mP" tabindex="0">VanhStore</div>
                                                        </div>
                                                        <div class="EQko8g">
                                                            <div class="qP6Mvo">
                                                                <a class="KmBIg2" href="/user/purchase/order/154537687268094?type=6">
                                                                    <span class="nkmfr2"><svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-free-shipping-line">
                                                                        <g>
                                                                            <line fill="none" stroke-linejoin="round" stroke-miterlimit="10" x1="8.6" x2="4.2" y1="9.8" y2="9.8"></line>
                                                                            <circle cx="3" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                                                            <circle cx="10" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                                                            <line fill="none" stroke-miterlimit="10" x1="10.5" x2="14.4" y1="7.3" y2="7.3"></line>
                                                                            <polyline fill="none" points="1.5 9.8 .5 9.8 .5 1.8 10 1.8 10 9.1" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                                                            <polyline fill="none" points="9.9 3.8 14 3.8 14.5 10.2 11.9 10.2" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                                                        </g>
                                                                    </svg> Đơn hàng đang được giao đến bạn</span>
                                                                </a>
                                                                <div class="shopee-drawer" id="pc-drawer-id-32" tabindex="0">
                                                                    <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-help">
                                                                        <g>
                                                                            <circle cx="7.5" cy="7.5" fill="none" r="6.5" stroke-miterlimit="10"></circle>
                                                                            <path d="m5.3 5.3c.1-.3.3-.6.5-.8s.4-.4.7-.5.6-.2 1-.2c.3 0 .6 0 .9.1s.5.2.7.4.4.4.5.7.2.6.2.9c0 .2 0 .4-.1.6s-.1.3-.2.5c-.1.1-.2.2-.3.3-.1.2-.2.3-.4.4-.1.1-.2.2-.3.3s-.2.2-.3.4c-.1.1-.1.2-.2.4s-.1.3-.1.5v.4h-.9v-.5c0-.3.1-.6.2-.8s.2-.4.3-.5c.2-.2.3-.3.5-.5.1-.1.3-.3.4-.4.1-.2.2-.3.3-.5s.1-.4.1-.7c0-.4-.2-.7-.4-.9s-.5-.3-.9-.3c-.3 0-.5 0-.7.1-.1.1-.3.2-.4.4-.1.1-.2.3-.3.5 0 .2-.1.5-.1.7h-.9c0-.3.1-.7.2-1zm2.8 5.1v1.2h-1.2v-1.2z" stroke="none"></path>
                                                                        </g>
                                                                    </svg>
                                                                </div>
                                                                <div class="shopee-drawer" id="pc-drawer-id-8" tabindex="0"></div>
                                                            </div>
                                                            <div class="V+w7Xs cho_giao" tabindex="0">Đang giao hàng</div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <div class="FycaKn"></div>
                                                <?php
                                                    foreach($order_details as $detail) {
                                                        $thanhtien += ($detail['amount'] * $detail['sale']) + $detail['voucher'];
                                                        ?>
                                                            <section>
                                                                <h3 class="a11y-hidden"></h3>
                                                                <a href="index.php?action=user&user=order_detail&id_order=<?= $detail['order_id'] ?>">
                                                                    <div>
                                                                        <div class="_0OiaZ-">
                                                                            <div class="FbLutl">
                                                                                <div>
                                                                                    <section>
                                                                                        <div class="x7nENX">
                                                                                            <div class="aybVBK"><img src="./public/upload/image/product/<?= explode(',',$detail['images'])[0] ?>" class="rGP9Yd" alt="" tabindex="0">
                                                                                                <div class="_7uZf6Q">
                                                                                                    <div>
                                                                                                        <div class="iJlxsT"><span class="x5GTyN" tabindex="0"><?= $detail['product_name'] ?></span></div>
                                                                                                    </div>
                                                                                                    <div>
                                                                                                        <div class="vb0b-P" tabindex="0">Phân loại hàng: <?= $detail['color'] ?> | <?= $detail['size'] ?></div>
                                                                                                        <div class="_3F1-5M" tabindex="0">x<?= $detail['amount'] ?></div><span class="_8ex9dW">7 ngày trả hàng</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="_9UJGhr" tabindex="0">
                                                                                                <div class="rjqzk1">
                                                                                                    <span class="j2En5+">₫<?= number_format($detail['price'],0,',','.') ?></span>
                                                                                                    <span class="-x3Dqh OkfGBc">₫<?= number_format($detail['sale'] ,0,',','.') ?></span>
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </section>
                                                                                </div>
                                                                                <div class="Cde7Oe"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </section>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="O2KPzo">
                                            <div class="mn7INg xFSVYg"> </div>
                                            <div class="mn7INg EfbgJE"> </div>
                                        </div>
                                        <div class="kvXy0c">
                                            <div class="-78s2g"><span class="JMmT2C">
                                                    <div class="IlORNJ" tabindex="0"><svg width="16" height="17" viewBox="0 0 253 263" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <title>Shopee Guarantee</title>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M126.5 0.389801C126.5 0.389801 82.61 27.8998 5.75 26.8598C5.08763 26.8507 4.43006 26.9733 3.81548 27.2205C3.20091 27.4677 2.64159 27.8346 2.17 28.2998C1.69998 28.7657 1.32713 29.3203 1.07307 29.9314C0.819019 30.5425 0.688805 31.198 0.689995 31.8598V106.97C0.687073 131.07 6.77532 154.78 18.3892 175.898C30.003 197.015 46.7657 214.855 67.12 227.76L118.47 260.28C120.872 261.802 123.657 262.61 126.5 262.61C129.343 262.61 132.128 261.802 134.53 260.28L185.88 227.73C206.234 214.825 222.997 196.985 234.611 175.868C246.225 154.75 252.313 131.04 252.31 106.94V31.8598C252.31 31.1973 252.178 30.5414 251.922 29.9303C251.667 29.3191 251.292 28.7649 250.82 28.2998C250.35 27.8358 249.792 27.4696 249.179 27.2225C248.566 26.9753 247.911 26.852 247.25 26.8598C170.39 27.8998 126.5 0.389801 126.5 0.389801Z" fill="#ee4d2d"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M207.7 149.66L119.61 107.03C116.386 105.472 113.914 102.697 112.736 99.3154C111.558 95.9342 111.772 92.2235 113.33 88.9998C114.888 85.7761 117.663 83.3034 121.044 82.1257C124.426 80.948 128.136 81.1617 131.36 82.7198L215.43 123.38C215.7 120.38 215.85 117.38 215.85 114.31V61.0298C215.848 60.5592 215.753 60.0936 215.57 59.6598C215.393 59.2232 215.128 58.8281 214.79 58.4998C214.457 58.1705 214.063 57.909 213.63 57.7298C213.194 57.5576 212.729 57.4727 212.26 57.4798C157.69 58.2298 126.5 38.6798 126.5 38.6798C126.5 38.6798 95.31 58.2298 40.71 57.4798C40.2401 57.4732 39.7735 57.5602 39.3376 57.7357C38.9017 57.9113 38.5051 58.1719 38.1709 58.5023C37.8367 58.8328 37.5717 59.2264 37.3913 59.6604C37.2108 60.0943 37.1186 60.5599 37.12 61.0298V108.03L118.84 147.57C121.591 148.902 123.808 151.128 125.129 153.884C126.45 156.64 126.797 159.762 126.113 162.741C125.429 165.72 123.755 168.378 121.363 170.282C118.972 172.185 116.006 173.221 112.95 173.22C110.919 173.221 108.915 172.76 107.09 171.87L40.24 139.48C46.6407 164.573 62.3785 186.277 84.24 200.16L124.49 225.7C125.061 226.053 125.719 226.24 126.39 226.24C127.061 226.24 127.719 226.053 128.29 225.7L168.57 200.16C187.187 188.399 201.464 170.892 209.24 150.29C208.715 150.11 208.2 149.9 207.7 149.66Z" fill="#fff"></path>
                                                        </svg></div>
                                                </span><label class="_0NMXyN">Thành tiền:</label>
                                                <div class="DeWpya" tabindex="0" aria-label="Thành tiền: ₫107.000">₫<?= number_format($thanhtien, 0, ",", ".") ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    
                </main>
            <?php
        }
    ?>
</div>