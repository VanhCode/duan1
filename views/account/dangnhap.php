<!-- main -->

<div class="bg__upImage">
    <div class="bg__img container">
        <div class="bg__box_content_form">
            <div class="Content__box__form"></div>
            <form action="" class="form" method="POST">
                <div class="form__box_group_title_inputS">
                    <div class="group_content__title">
                        <div class="group_content__title_text">
                            <div class="content__title_textSignup">Đăng nhập</div>
                        </div>
                    </div>
                    <div>
                        <?= isset($success) ? $success : "" ?>
                    </div>
                    <div class="group_inputS">
                        <div></div>
                        <div class="group_input_control">
                            <div class="group_input_box">
                                <input type="text" placeholder="Email/Số điện thoại/Tên đăng nhập" value="<?= $phone ?>" id="phone" name="phone" class="phone">
                            </div>
                            <div id="phoneErr" class="phoneErr"></div>
                        </div>
                        <div class="group_input_control">
                            <div class="group_input_box">
                                <input type="password" placeholder="Mật khẩu" id="password" value="<?= $password ?>" name="password" class="password">
                                <i class="fa-regular fa-eye-slash"></i>
                                <i class="fa-sharp fa-regular fa-eye"></i>
                            </div>
                            <div id="passwordErr" class="passwordErr"></div>
                        </div>
                        <button type="submit" name="submitClick" class="btn btn_submit_send curson-no-click" disabled>Đăng nhập</button>
                        <div class="tRiWov">
                            <a class="anLGcx" href="">Quên mật khẩu</a>
                            <a class="anLGcx" href="">Đăng nhập với SMS</a>
                        </div>
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
                    </div>
                    <div class="XLzpXt">
                        <div class="Oug9xv Z8OMtU">Bạn mới biết đến VanhStore <a class="wzgwUg" href="index.php?action=signup">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>