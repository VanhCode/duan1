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
                            <input type="text" class="information_ip ip_name_thanhtoan" placeholder="Nhập tên của bạn..." value="<?= $user['firth_name'] . " " . $user['last_name'] ?>" name="fullname">
                            <div class="information_Err information_Errname"></div>
                        </div>
                        <div class="group_location_ip">
                            <h4>Số điện thoại..*</h4>
                            <input type="text" class="information_ip ip_phone_thanhtoan" placeholder="Nhập số điện thoại..." value="<?= $user['phone'] ?>" name="phone">
                            <div class="information_Err information_Errphone"></div>
                        </div>
                        <div class="group_location_ip">
                            <h4>Địa chỉ..*</h4>
                            <input type="text" class="information_ip ip_address_thanhtoan" placeholder="Nhập địa chỉ..." value="<?= $user['address'] ?>" name="address">
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
                        $listvoucher = voucher($userID, $product_bill['product_id']);
                        $thanhtien = $product_bill['sale'] * $product_bill['amount'];
                        $tong += $thanhtien;
                    ?>

                        <input type="hidden" name="product_id[]" value="<?= $product_bill['product_id'] ?>">
                        <input type="hidden" name="id_cart[]" value="<?= $_SESSION['id_cart'][$key] ?>">

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
                                        <div class="h3ONzh">₫<?= number_format($product_bill['sale'], 0, ",", ".") ?></div>
                                        <div class="h3ONzh"><?= $product_bill['amount'] ?></div>
                                        <div class="h3ONzh fHRPUO">₫<?= number_format($thanhtien, 0, ",", ".") ?></div>
                                    </div>
                                </div>
                                <div class="uw1QJu">
                                    <div class="za7qoR">
                                        <div class="D2AHAU">
                                            <div class="hcC4-3"><svg fill="none" viewBox="0 0 23 22" class="shopee-svg-icon icon-voucher-applied-line">
                                                    <rect x="13" y="9" width="10" height="10" rx="5" fill="#EE4D2D"></rect>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.881 11.775a.54.54 0 00-.78.019l-2.509 2.765-1.116-1.033a.542.542 0 00-.74.793l1.5 1.414a.552.552 0 00.844-.106l2.82-3.109a.54.54 0 00-.019-.743z" fill="#fff"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.488 16.178h.858V14.57h-.858v1.607zM6.488 13.177h.858v-1.605h-.858v1.605zM6.488 10.178h.858V8.572h-.858v1.606zM6.488 7.178h.858V5.572h-.858v1.606z" fill="#EE4D2D"></path>
                                                    <g filter="url(#voucher-filter1_d)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 4v2.325a1.5 1.5 0 01.407 2.487l-.013.012c-.117.103-.25.188-.394.251v.65c.145.063.277.149.394.252l.013.012a1.496 1.496 0 010 2.223l-.013.012c-.117.103-.25.188-.394.251v.65c.145.063.277.149.394.252l.013.012A1.5 1.5 0 011 15.876V18h12.528a6.018 6.018 0 01-.725-1H2v-.58c.55-.457.9-1.147.9-1.92a2.49 2.49 0 00-.667-1.7 2.49 2.49 0 00.667-1.7 2.49 2.49 0 00-.667-1.7A2.49 2.49 0 002.9 7.7c0-.773-.35-1.463-.9-1.92V5h16v.78a2.494 2.494 0 00-.874 2.283 6.05 6.05 0 011.004-.062A1.505 1.505 0 0119 6.325V4H1z" fill="#EE4D3D"></path>
                                                    </g>
                                                    <defs>
                                                        <filter id="voucher-filter1_d" x="0" y="3" width="20" height="16" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
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
                                                <div>Voucher của Shop</div>
                                            </div>
                                        </div>
                                        <div class="zjjc32">
                                            <div class="yeg4Dy item_voucher">
                                                <div class="p6tHng"></div>
                                                <div class="uLPYi2" style="border-color: rgb(238, 77, 45); color: rgb(238, 77, 45);">
                                                    <span class="price_innerVoucher">-₫0</span>
                                                    <div class="f3xPPv"><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 1 5 35" style="fill: rgb(238, 77, 45);">
                                                            <path d="M0 0v2.27a2 2 0 010 3.46v2.54a2 2 0 010 3.46v2.54a2 2 0 010 3.46V19h2v-1h-.76A2.99 2.99 0 001 13.76v-1.52a3 3 0 000-4.48V6.24a3 3 0 000-4.48V1h1V0H0z"></path>
                                                        </svg></div>
                                                    <div class="odBn9-"><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 1 5 35" style="fill: rgb(238, 77, 45);">
                                                            <path d="M0 0v2.27a2 2 0 010 3.46v2.54a2 2 0 010 3.46v2.54a2 2 0 010 3.46V19h2v-1h-.76A2.99 2.99 0 001 13.76v-1.52a3 3 0 000-4.48V6.24a3 3 0 000-4.48V1h1V0H0z"></path>
                                                        </svg></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    <button type="button" class="_64JAsH btn_model_all">
                                                        <span>Chọn Voucher</span>
                                                    </button>
                                                    <!-- Model -->
                                                    <div class="vanhstore-popup vanhstore-modal__transition-enter-done model_all_sub" id="confirmModal">
                                                        <div class="vanhstore-popup__overlay BackgrountNone" id="BackgrountNone"></div>
                                                        <div class="vanhstore-popup__container">
                                                            <div class="shopee-popup-form__header">
                                                                <div class="shopee-popup-form__title"><span tabindex="0">Chọn Voucher</span></div>
                                                                <div class="stardust-popover" id="stardust-popover0" tabindex="0">
                                                                    <div role="button" class="stardust-popover__target">
                                                                        <div aria-label=" Hỗ Trợ" class="w9zs1-">Hỗ Trợ&nbsp;
                                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" class="shopee-svg-icon icon-question-circle">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 12C9.31371 12 12 9.31371 12 6C12 2.68629 9.31371 0 6 0C2.68629 0 0 2.68629 0 6C0 9.31371 2.68629 12 6 12ZM6 11C3.23858 11 1 8.76142 1 6C1 3.23858 3.23858 1 6 1C8.76142 1 11 3.23858 11 6C11 8.76142 8.76142 11 6 11ZM5.39088 7.5C5.39745 7.12789 5.44184 6.83396 5.52404 6.6182C5.60625 6.40244 5.77394 6.16323 6.02713 5.90056L6.67324 5.26735C6.94945 4.97029 7.08755 4.65135 7.08755 4.31051C7.08755 3.98217 6.99712 3.72499 6.81628 3.53893C6.63543 3.35288 6.37238 3.25985 6.02713 3.25985C5.69174 3.25985 5.42211 3.34428 5.21825 3.51313C5.01438 3.68199 4.91245 4.19325 4.91245 4.19325H4C4 4.19325 4.19646 3.27783 4.56967 2.9667C4.94287 2.65556 5.42869 2.5 6.02713 2.5C6.64859 2.5 7.13276 2.65869 7.47965 2.97608C7.82655 3.29347 8 3.72889 8 4.28236C8 4.82958 7.73366 5.36898 7.20099 5.90056L6.66338 6.40713C6.42334 6.66041 6.30333 7.0247 6.30333 7.5H5.39088ZM5.15 9.00714C5.15 8.79286 5.21278 8.6131 5.33836 8.46786C5.46393 8.32262 5.65 8.25 5.89658 8.25C6.14315 8.25 6.33036 8.32262 6.45822 8.46786C6.58607 8.6131 6.65 8.79286 6.65 9.00714C6.65 9.22143 6.58607 9.39881 6.45822 9.53929C6.33036 9.67976 6.14315 9.75 5.89658 9.75C5.65 9.75 5.46393 9.67976 5.33836 9.53929C5.21278 9.39881 5.15 9.22143 5.15 9.00714Z" fill="black" fill-opacity="0.54"></path>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="confirmModalChil" class="gLboXK">
                                                                <?php
                                                                foreach (voucher($userID, $product_bill['product_id']) as $voucher) {
                                                                    $tinhtien = ($tong * $voucher['del_percent'] / 100) - $voucher['del_price'];
                                                                ?>
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
                                                                                    <div class="vc_MainTitle_text vc_MainTitle_fsvLine"><?= $voucher['content_voucher'] ?></div>
                                                                                </div>
                                                                                <div data-testid="vcSubtitle" class="vc_Subtitle_subTitle vc_Subtitle_oneLine">Đơn Tối Thiểu ₫0</div>
                                                                                <div data-testid="vcLabel" class="vc_Label_label">
                                                                                    <div class="vc_Label_shopeeWalletLabel" data-cy="voucher_card_label">
                                                                                        <div class="vc_Label_shopeeWalletLabelContent" data-cy="voucher_card_label_content" aria-label="Freeship Cyber Monday" style="color: red;">Voucher giảm giá</div>
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
                                                                                    <input type="radio" name="voucher_<?= $product_bill['cart_id'] ?>" class="vc_RadioButton_radio vc_RadioButton_radioDisabled voucher_radio" value="<?= $tinhtien ?>" id="">
                                                                                    <input type="radio" name="id_voucher" style="opacity: 0;" class="" value="<?= $voucher['voucher_id'] ?>" id="">
                                                                                </div>
                                                                                <div>
                                                                                    <div data-testid="vcTNCLink" class="vc_TNCLink_tncLink" role="navigation">
                                                                                        <a>
                                                                                            <span>Điều Kiện</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>

                                                            </div>
                                                            <div class="rySPUB">
                                                                <button type="button" id="confirmBackBtn" class="vanhstore-button-solid vanhstore-button-solid--primary vanhstore-button-solid--confirm-popup confirmBackBtn">Ok</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Model -->

                                                    <div style="display: contents;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <input type="hidden" class="tongtien" name="tongtien" value="<?= $tong ?>">

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
                <h3 class="bwwaGp iL6wsx BcITa9">Tổng tiền:</h3>
                <div class="bwwaGp R3a05f BcITa9">₫<?= number_format($tong, 0, ",", ".") ?></div>
                <h3 class="bwwaGp iL6wsx BcITa9">Voucher giảm giá:</h3>
                <div class="bwwaGp R3a05f BcITa9 voucher_html">₫0</div>
                <h3 class="bwwaGp iL6wsx _5y8V6a">Tổng thanh toán:</h3>
                <div class="bwwaGp l2Nmnm R3a05f _5y8V6a priceVch_html">₫<?= number_format($tong, 0, ",", ".") ?></div>
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
    var voucherHtml = document.querySelector('.voucher_html');
    var priceVchHtml = document.querySelector('.priceVch_html');
    var tongtien = document.querySelector('.tongtien');
    var voucherRadioS = document.querySelectorAll('.voucher_radio');
    var item_voucher = document.querySelectorAll('.item_voucher');
    

    let arrNameVoucher = [];
    voucherRadioS.forEach(function(radioIndex) {
        arrNameVoucher.push(radioIndex.name);
    })
    let result = arrNameVoucher.reduce((acc, val) => {
        if (acc[val]) {
            acc[val].push(val);
        } else {
            acc[val] = [val];
        }
        return acc;
    }, {});


    let sumVoucher = [];
    var price_innerVoucher = document.querySelectorAll('.price_innerVoucher');

    Object.values(result).forEach(function(valueGroup,index) {
        let inputRadioS = document.querySelectorAll('input[name="' + valueGroup[0] + '"]');
        inputRadioS.forEach(function(radioIndex,id) {
            radioIndex.addEventListener('click', function() {
                if(this.checked){
                    sumVoucher[index] = this.value;
                    price_innerVoucher[index].innerHTML = this.value;
                }else{
                    sumVoucher[index] = 0;
                }

                radioIndex.nextElementSibling.checked = true;
                tongVoucher = sumVoucher.reduce((a,b) => Number(a) + Number(b));
                voucherHtml.innerHTML = tongVoucher;

                let result = (Number(tongtien.value) + Number(tongVoucher));
                let formattedTotal = result.toLocaleString('vi-VN').replace(/,/g, '.');
                priceVchHtml.innerHTML = "₫" + formattedTotal;
                // console.log(sumVoucher);
            })
        })
    })
    // console.log(sumVoucher);


    var btnModel = document.querySelectorAll('.btn_model_all');
    var models = document.querySelectorAll('.model_all_sub');

    btnModel.forEach(function(button, index) {
        var BackgrountNone = models[index].querySelector('.BackgrountNone');
        var confirmBackBtn = models[index].querySelector('.confirmBackBtn');
        models[index].addEventListener('click', function(e) {
            if (e.target == BackgrountNone || e.target == confirmBackBtn) {
                display(models[index]);
            }
        })

        button.addEventListener('click', function() {
            display(models[index]);
        })
    })

    function display(element) {
        if (element.style.display == "none") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    }


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