<main class="container main__bill">
    <form onsubmit="return sendThanhToan()" action="index.php?action=thanh-toan" method="POST">
        <div class="bill__location">
            <div class="bill__bg_location"></div>
            <div class="bill__location_text">
                <div class="group__location_text_icon">
                    <div class="group__location-page">
                        <div class="Iafoll">
                            <svg height="16" viewBox="0 0 12 16" width="12" class="shopee-svg-icon icon-location-marker">
                                <path d="M6 3.2c1.506 0 2.727 1.195 2.727 2.667 0 1.473-1.22 2.666-2.727 2.666S3.273 7.34 3.273 5.867C3.273 4.395 4.493 3.2 6 3.2zM0 6c0-3.315 2.686-6 6-6s6 2.685 6 6c0 2.498-1.964 5.742-6 9.933C1.613 11.743 0 8.498 0 6z" fill-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h2>Địa chỉ nhận hàng</h2>
                    </div>
                </div>
                <div class="title__location_edit">
                    <div class="group__location_edit">
                        <div class="group_location_ip">
                            <h4>Họ và tên..*</h4>
                            <input type="text" class="information_ip ip_name_thanhtoan" value="<?= $user['firth_name'] . " " . $user['last_name'] ?>" name="fullname">
                            <div class="information_Err information_Errname"></div>
                        </div>
                        <div class="group_location_ip">
                            <h4>Số điện thoại..*</h4>
                            <input type="text" class="information_ip ip_phone_thanhtoan" value="<?= $user['phone'] ?>" name="phone">
                            <div class="information_Err information_Errphone"></div>
                        </div>
                        <div class="group_location_ip">
                            <h4>Địa chỉ..*</h4>
                            <input type="text" class="information_ip ip_address_thanhtoan" value="<?= $user['address'] ?>" name="address">
                            <div class="information_Err information_Erraddress"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product_bill">
            <div class="product_bill_title">
                <div class="flex_text_product_bill">
                    <div class="textH2">
                        <h2>Sản phẩm</h2>
                    </div>
                    <div class="jNp+ZB _04sLFc"></div>
                    <div class="jNp+ZB">Kích thước</div>
                    <div class="jNp+ZB">Đơn giá</div>
                    <div class="jNp+ZB">Số lượng</div>
                    <div class="jNp+ZB LBqTli">Thành tiền</div>
                </div>
            </div>
            <div>

                <div class="product_full_bill">
                    <?php
                    $tong = 0;
                    foreach ($data as $key => $product_bill) {
                        $thanhtien = $product_bill['price'] * $product_bill['amount'];
                        $tong += $thanhtien;
                    ?>

                        <input type="hidden" name="product_id[]" value="<?= $product_bill['product_id'] ?>">
                        <input type="hidden" name="id_cart[]" value="<?= $_POST['id_cart'][$key] ?>">

                        <div>
                            <div class="product_one_bill">
                                <div class="KxX-H6">
                                    <div class="_2OGC7L xBI6Zm">
                                        <div class="h3ONzh EOqcX3">
                                            <img class="rTOisL" alt="product image" src="./public/upload/image/product/<?= explode(",", $product_bill['images'])[0] ?>" width="40" height="40">
                                            <span class="oEI3Ln">
                                                <span class="gHbVhc"><?= $product_bill['product_name'] ?></span>
                                            </span>
                                        </div>
                                        <div class="h3ONzh Le31ox">
                                            <span class="dVLwMH">Loại: <?= $product_bill['color'] ?></span>
                                        </div>
                                        <div class="h3ONzh"><?= $product_bill['size'] ?></div>
                                        <div class="h3ONzh">₫<?= number_format($product_bill['price'], 0, ",", ".") ?></div>
                                        <div class="h3ONzh"><?= $product_bill['amount'] ?></div>
                                        <div class="h3ONzh fHRPUO">₫<?= number_format($thanhtien, 0, ",", ".") ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="Nivkv-">
                        <div class="ULZMSb">
                            <h3 class="bwwaGp iL6wsx -snVIl">
                                <div>Tổng số tiền (<?= count($data) ?> sản phẩm):</div>
                            </h3>
                            <div class="bwwaGp R3a05f -snVIl kMV1h4">₫<?= number_format($tong, 0, ",", ".") ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="+w8dNn">
            <div class="At3Wkr">
                <div class="W-XOpk">
                    <div class="kKkbFa">
                        <div class="jeFLq1"><svg fill="none" viewBox="0 -2 23 22" class="shopee-svg-icon icon-voucher-line">
                                <g filter="url(#voucher-filter0_d)">
                                    <mask id="a" fill="#fff">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 2h18v2.32a1.5 1.5 0 000 2.75v.65a1.5 1.5 0 000 2.75v.65a1.5 1.5 0 000 2.75V16H1v-2.12a1.5 1.5 0 000-2.75v-.65a1.5 1.5 0 000-2.75v-.65a1.5 1.5 0 000-2.75V2z"></path>
                                    </mask>
                                    <path d="M19 2h1V1h-1v1zM1 2V1H0v1h1zm18 2.32l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zm0 .65l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zm0 .65l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zM19 16v1h1v-1h-1zM1 16H0v1h1v-1zm0-2.12l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zm0-.65l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zm0-.65l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zM19 1H1v2h18V1zm1 3.32V2h-2v2.32h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zm.6 1.56v-.65h-2v.65h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zm.6 1.56v-.65h-2v.65h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zM20 16v-2.13h-2V16h2zM1 17h18v-2H1v2zm-1-3.12V16h2v-2.12H0zm1.4.91a2.5 2.5 0 001.5-2.29h-2a.5.5 0 01-.3.46l.8 1.83zm1.5-2.29a2.5 2.5 0 00-1.5-2.3l-.8 1.84c.18.08.3.26.3.46h2zM0 10.48v.65h2v-.65H0zM.9 9.1a.5.5 0 01-.3.46l.8 1.83A2.5 2.5 0 002.9 9.1h-2zm-.3-.46c.18.08.3.26.3.46h2a2.5 2.5 0 00-1.5-2.3L.6 8.65zM0 7.08v.65h2v-.65H0zM.9 5.7a.5.5 0 01-.3.46l.8 1.83A2.5 2.5 0 002.9 5.7h-2zm-.3-.46c.18.08.3.26.3.46h2a2.5 2.5 0 00-1.5-2.3L.6 5.25zM0 2v2.33h2V2H0z" mask="url(#a)"></path>
                                </g>
                                <path clip-rule="evenodd" d="M6.49 14.18h.86v-1.6h-.86v1.6zM6.49 11.18h.86v-1.6h-.86v1.6zM6.49 8.18h.86v-1.6h-.86v1.6zM6.49 5.18h.86v-1.6h-.86v1.6z"></path>
                                <defs>
                                    <filter id="voucher-filter0_d" x="0" y="1" width="20" height="16" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                        <feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                        <feOffset></feOffset>
                                        <feGaussianBlur stdDeviation=".5"></feGaussianBlur>
                                        <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.09 0"></feColorMatrix>
                                        <feBlend in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend>
                                        <feBlend in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
                                    </filter>
                                </defs>
                            </svg>
                            <h2 class="Pd8fbQ">VanhStore Voucher</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="a+7foE pd_vch">
                <div class="vc_Card_card">
                    <div class="vc_Card_left">
                        <div class="vc_Card_sawtooth"></div>
                    </div>
                    <div class="vc_Card_right"></div>
                    <div class="vc_VoucherStandardTemplate_hideOverflow"></div>
                    <div data-testid="voucher-card" class="vc_VoucherStandardTemplate_template" role="presentation">
                        <div class="vc_VoucherStandardTemplate_left" role="presentation">
                            <div data-testid="vcLogo" class="vc_Logo_imageLogo" data-target="shop_icon"><img class="vc_Logo_logo" src="./img1/vch.png" alt="Logo"></div>
                            <div data-testid="vcIconText" class="vc_IconText_iconText vc_IconText_oneLine" data-cy="voucher_card_icon_text" style="color: white;">Mã vận chuyển</div>
                            <div data-testid="vcIconSubText" class="vc_IconSubText_iconSubText vc_IconSubText_white" data-cy="voucher_card_sub_icon_text">Tất cả hình thức thanh toán</div>
                        </div>
                        <div class="vc_VoucherStandardTemplate_middle" role="presentation" tabindex="0">
                            <div class="vc_A11yAriaText_A11yContent"><span aria-label="voucher #"></span><span aria-label=" Vui lòng mua hàng trên ứng dụng Shopee để sử dụng ưu đãi."></span></div>
                            <div data-testid="vcMainTitle" class="vc_MainTitle_mainTitle">
                                <div class="vc_MainTitle_text vc_MainTitle_fsvLine">Giảm tối đa ₫300k</div>
                            </div>
                            <div data-testid="vcSubtitle" class="vc_Subtitle_subTitle vc_Subtitle_oneLine">Đơn Tối Thiểu ₫0</div>
                            <div data-testid="vcLabel" class="vc_Label_label">
                                <div class="vc_Label_shopeeWalletLabel" data-cy="voucher_card_label">
                                    <div class="vc_Label_shopeeWalletLabelContent" data-cy="voucher_card_label_content" aria-label="Freeship Cyber Monday" style="color: red;">Freeship Cyber Monday</div>
                                </div>
                            </div>
                            <div data-testid="vcProgressBarExpiry" class="vc_ProgressBarExpiry_progressBarExpiry">
                                <div data-testid="vcProgressBar" class="vc_ProgressBar_progressBar vc_ProgressBarExpiry_progressBar" style="--vc-progress-bar-percentage: 99%;"></div>
                                <div class="vc_ProgressBarExpiry_usageLimitedText vc_ProgressBarExpiry_twoRowsLimitText"><span class="vc_ProgressBarExpiry_isRunningOutSoon">Đã dùng 99%, </span><span class="vc_ProgressBarExpiry_isEndingSoon">Sắp hết hạn: Còn 1 ngày</span></div>
                            </div>
                        </div>
                        <div class="vc_VoucherStandardTemplate_right" role="presentation">
                            <div></div>
                            <div class="vc_VoucherStandardTemplate_center">
                                <input type="radio" class="vc_RadioButton_radio vc_RadioButton_radioDisabled" name="" id="">
                            </div>
                            <div>
                                <div data-testid="vcTNCLink" class="vc_TNCLink_tncLink" role="navigation"><a><span>Điều Kiện</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__send_bill">
            <div class="DQ7t9K">
                <h2 class="a11y-visually-hidden">Phương thức thanh toán</h2>
                <div class="_2qsKTk">
                    <div class="SzEjHI zDPGhr">Phương thức thanh toán</div>
                    <div class="KoRB7y payment">
                        <div class="vanhstore_payment_box_radio">
                            <label class="box_payment_radio bgPaymentClick">
                                <span style="pointer-events: none;">Thanh toán khi nhận hàng</span>
                                <input style="pointer-events: none;" type="radio" class="payment_radio" name="payment_radio" value="tienmat" checked>
                            </label>
                        </div>
                        <div class="vanhstore_payment_box_radio radio_vnpay">
                            <label class="box_payment_radio">
                                <span style="pointer-events: none;">Thanh toán VNPAY</span>
                                <input style="pointer-events: none;" type="radio" class="payment_radio" name="payment_radio" value="VNPAY">
                            </label>
                        </div>
                    </div>
                    <a class="FooGkf div-style box_style_radio">Thay đổi</a>
                </div>
            </div>
            <div class="KQyCj0">
                <h2 class="a11y-visually-hidden">Tổng thanh toán:</h2>
                <h3 class="bwwaGp iL6wsx BcITa9">Tổng tiền hàng</h3>
                <div class="bwwaGp R3a05f BcITa9">₫<?= number_format($tong, 0, ",", ".") ?></div>
                <h3 class="bwwaGp iL6wsx _5y8V6a">Tổng thanh toán:</h3>
                <div class="bwwaGp l2Nmnm R3a05f _5y8V6a">₫<?= number_format($tong, 0, ",", ".") ?></div>
                <div class="uTFqRt">
                    <div class="k4VpYA">
                        <div class="C-NSr-">
                            Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân theo <a href="" target="_blank" rel="noopener noreferrer">Điều khoản Vanhstore</a>
                        </div>
                    </div>
                    <button name="dathang" class="stardust-button stardust-button--primary stardust-button--large apLZEG">Đặt hàng</button>
                </div>
            </div>
        </div>
    </form>
</main>

<!-- End main -->

<script>
    function sendThanhToan() {
        var ip_name_thanhtoan = document.querySelector('.ip_name_thanhtoan');
        var ip_phone_thanhtoan = document.querySelector('.ip_phone_thanhtoan');
        var ip_address_thanhtoan = document.querySelector('.ip_address_thanhtoan');
        var paymentRadio = document.querySelectorAll('.payment_radio');

        var information_Errname = document.querySelector('.information_Errname');
        var information_Errphone = document.querySelector('.information_Errphone');
        var information_Erraddress = document.querySelector('.information_Erraddress');
        let count = 0; // Khởi   tạo biến count

        if (ip_name_thanhtoan.value == "") {
            information_Errname.innerHTML = "Vui lòng nhập trường này";
            count++;
        } else {
            information_Errname.innerHTML = "";
        }

        if (ip_phone_thanhtoan.value == "") {
            information_Errphone.innerHTML = "Vui lòng nhập trường này";
            count++;
        } else {
            information_Errphone.innerHTML = "";
        }

        if (ip_address_thanhtoan.value == "") {
            information_Erraddress.innerHTML = "Vui lòng nhập trường này";
            count++;
        } else {
            information_Erraddress.innerHTML = "";
        }

        if (paymentRadio.checked == false) {
            count++;
        }

        if (count > 0) {
            return false;
        }
    }

    var paymentRadio = document.querySelectorAll('.payment_radio');
    var box_payment_radio = document.querySelectorAll('.box_payment_radio');

    paymentRadio.forEach(function(radio) {
        radio.addEventListener('change', function() {
            box_payment_radio.forEach(function(box) {
                box.classList.remove('bgPaymentClick');
            });

            if (this.checked) {
                this.closest('.box_payment_radio').classList.add('bgPaymentClick');
            }
        });
    });

    var radio_vnpay = document.querySelector('.radio_vnpay');
    var box_style_radio = document.querySelector('.box_style_radio');

    box_style_radio.addEventListener('click', function() {
        box_style_radio.style.display = "none";
        radio_vnpay.style.display = "block";
    })
</script>