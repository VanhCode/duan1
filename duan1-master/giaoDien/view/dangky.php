<?php
    require "../php/ajaxdangky.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký ngay | VanhStore Việt Nam</title>
    <link rel="shortcut icon" href="../img1/iconLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/dangky.css">
</head>

<body>
    <div class="wrapper">

        <!-- Header -->

        <nav class="nav_signup">
            <div class="logo_header">
                <div class="logo">
                    <a href="../index.php">
                        <img src="../img1/vanhcart.jpg" alt="">
                    </a>
                    <div class="signup">
                        Đăng ký
                    </div>
                </div>
                <a href="" class="suppost">Bạn cần giúp đỡ?</a>
            </div>
        </nav>

        <!-- main -->

        <div class="bg__upImage">
            <div class="bg__img container">
                <div class="bg__box_content_form">
                    <div class="Content__box__form"></div>
                    <form class="form" method="POST">
                        <div class="form__box_group_title_inputS">
                            <div class="group_content__title">
                                <div class="group_content__title_text">
                                    <div class="content__title_textSignup">Đăng ký</div>
                                </div>
                            </div>
                            <div>
                                <?= $success ?>
                            </div>
                            <div class="group_inputS">
                                <div></div>
                                <div class="group_input_control">
                                    <div class="flex__group_inputTop">
                                        <div class="group_input_boxTop ml1">
                                            <div class="inputS__Top">
                                                <input type="text" placeholder="Họ" id="firstname" name="firstname" class="firstname">
                                            </div>
                                            <div id="fristnameErr" class="input__topCss fristnameErr"></div>
                                        </div>
                                        <div class="group_input_boxTop ml2">
                                            <div class="inputS__Top">
                                                <input type="text" placeholder="Tên" id="lastname" name="lastname" class="lastname">
                                            </div>
                                            <div id="lastnameErr" class="input__topCss lastnameErr"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="group_input_control">
                                    <div class="group_input_box">
                                        <input type="text" placeholder="Số điện thoại hoặc Email" id="phone" name="phone" class="phone">
                                    </div>
                                    <div id="phoneErr" class="phoneErr"></div>
                                </div>
                                <div class="group_input_control">
                                    <div class="group_input_box">
                                        <input type="password" placeholder="Mật khẩu mới" name="password" id="password" class="password">
                                        <i class="fa-regular fa-eye-slash"></i>
                                        <i class="fa-sharp fa-regular fa-eye"></i>
                                    </div>
                                    <div id="passwordErr" class="passwordErr"></div>
                                </div>
                                <div class="group_input_control">
                                    <div class="group_input_box">
                                        <input type="date" id="date" name="date" class="date" >
                                    </div>
                                    <div id="dateErr" class="dateErr"></div>
                                </div>
                                <div class="group_input_control">
                                    <div class="group_input_boxGender">
                                        <div class="group__genderS">
                                            <div class="gender">
                                                Nam
                                            </div>
                                            <div class="gender_input">
                                                <input type="radio" id="gender" value="Nam" name="gender" class="nam">
                                            </div>

                                        </div>
                                        <div class="group__genderS">
                                            <div class="gender">
                                                Nữ
                                            </div>
                                            <div class="gender_input">
                                                <input type="radio" id="gender" value="Nữ" name="gender" class="nu">
                                            </div>
                                        </div>
                                        <div class="group__genderS">
                                            <div class="gender">
                                                Khác
                                            </div>
                                            <div class="gender_input">
                                                <input type="radio" id="gender" value="Khác" name="gender" class="khac">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="genderErr" class="genderErr"></div>
                                </div>
                                <button type="submit" name="submitClick" class="btn btn_submit_send curson-no-click" disabled>Đăng ký</button>
                                <div>
                                    <div class="lhhucE">
                                        <div class="lreZhl"></div>
                                        <span class="PqS8vj">hoặc</span>
                                        <div class="lreZhl"></div>
                                    </div>
                                    <div class="_3051nA">
                                        <a class="bx8TqH lyJbNT bQ2eCN">
                                            <div class="Bq4Bra">
                                                <div class="_1a550J social-white-background social-white-fb-blue-png"></div>
                                            </div>
                                            <div class="">Facebook</div>
                                        </a>
                                        <a class="bx8TqH lyJbNT bQ2eCN">
                                            <div class="Bq4Bra">
                                                <div class="_1a550J social-white-background social-white-google-png"></div>
                                            </div>
                                            <div class="">Google</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="btS4Qu">
                                    <div class="XZg02F">Bằng việc đăng kí, bạn đã đồng ý với VanhStore về 
                                        <a href="" class="TVFtd9" target="_blank" rel="noopener noreferrer">Điều khoản dịch vụ</a> &amp;
                                        <a href="" class="TVFtd9" target="_blank" rel="noopener noreferrer">Chính sách bảo mật</a>
                                    </div>
                                </div>
                            </div>
                            <div class="XLzpXt">
                                <div class="Oug9xv Z8OMtU">Bạn đã có tài khoản? <a class="wzgwUg" href="p.php">Đăng nhập</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <footer>

            <div class="delivery container">
                <div class="delivery-content">
                    <img src="../img1/giaohang1.png" alt="">
                    <div class="delivery-text">
                        <h3>GIAO HÀNG MIỄN PHÍ</h3>
                        <P>Toàn cầu từ 75k</P>
                    </div>
                </div>
                <div class="delivery-content">
                    <img src="../img1/giaohang2.png" alt="">
                    <div class="delivery-text">
                        <h3>DỄ DÀNG ĐỔI TRẢ</h3>
                        <P>Đổi trả thoải mái trong 30 ngày</P>
                    </div>
                </div>
                <div class="delivery-content">
                    <img src="../img1/giaohang3.png" alt="">
                    <div class="delivery-text">
                        <h3>THANH TOÁN NHANH</h3>
                        <P>Thẻ tín dụng có sẵn</P>
                    </div>
                </div>
                <div class="delivery-content">
                    <img src="../img1/giaohang4.png" alt="">
                    <div class="delivery-text">
                        <h3>QUÀ TẶNG MIỄN PHÍ</h3>
                        <P>Nhận quà tặng và giảm giá</P>
                    </div>
                </div>
            </div>

            <div class="footer-information container">
                <div class="footer-text">
                    <img class="logo__vanhCart_footer" src="../img1/vanhcart.jpg" alt="">
                    <div class="address-footer">
                        <ul>
                            <li> 22 Trịnh văn bô, Quận Nam Từ Liêm, Hà Nội</li>
                            <li> 0969621079</li>
                            <li> Thứ Hai-Thứ Sáu 8:00 đến 19:00</li>
                            <li> tranvanh2k4@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="footer-text">
                    <h2>Thông tin</h2>
                    <div class="address-footer-hover">
                        <ul>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Trang chủ</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Giới thiệu</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Sale sản phẩm</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Tin tức</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-text">
                    <h2>Sản phẩm</h2>
                    <div class="address-footer-hover">
                        <ul>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Quần áo</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Giày dép</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Sale sản phẩm</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Phụ kiện</a></li>
                            <li><i class="fa-solid fa-caret-right"></i> <a href="">Hot trend</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-text">
                    <h2>Kết nối với chúng tôi</h2>
                    <form class="form-footer" action="" method="post">
                        <p>
                            Điền email của bạn để nhận thông tin giảm giá và sự kiện của shop
                        </p>
                        <input type="text" name="send-footer" placeholder="Nhập email">
                        <button type="submit" class="send" name="send" id="send">Gửi</button>
                        <button type="submit" class="reset" name="reset" id="reset">Hủy</button>
                    </form>
                </div>
            </div>
        </footer>
    </div>

    <script src="../js/dangky.js"></script>
</body>

</html>