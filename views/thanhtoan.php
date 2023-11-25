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
                            <input type="text" class="information_ip ip_name_thanhtoan" value="<?= $user['firth_name']." ".$user['last_name'] ?>" name="fullname">
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
                        foreach($data as $key => $product_bill) {
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

        if(ip_name_thanhtoan.value == "") {
            information_Errname.innerHTML = "Vui lòng nhập trường này";
            count++;
        } else {
            information_Errname.innerHTML = "";
        }

        if(ip_phone_thanhtoan.value == "") {
            information_Errphone.innerHTML = "Vui lòng nhập trường này";
            count++;
        } else {
            information_Errphone.innerHTML = "";
        }

        if(ip_address_thanhtoan.value == "") {
            information_Erraddress.innerHTML = "Vui lòng nhập trường này";
            count++;
        } else {
            information_Erraddress.innerHTML = "";
        }

        if(paymentRadio.checked == false) {
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