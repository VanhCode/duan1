<!-- đổi mật khẩu -->

<div class="repass-box box4">
    <div class="Hvae38" role="main">
        <div class="w1iqPz">
            <form onsubmit="return sendChangePass()" action="index.php?action=user&user=tai-khoan-cua-toi&profile=change-page" method="POST" autocomplete="off">
                <div class="pass-header">
                    <div class="text-header-pass">
                        <h2 class="h2-text-repasss">Đổi mật khẩu</h2>
                        <div class="confidentiality-account">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</div>
                    </div>
                </div>
                <div class="form-repass">
                    <div class="colum-group colum-group2">
                        <div class="cl1 cl1-item">
                            <div class="cl1-text">
                                <label class="q1">Nhập lại mật khẩu cũ</label>
                            </div>
                        </div>
                        <div class="cl2">
                            <div class="cl2-group">
                                <div class="cl2-text" id="oldPass">
                                    <input type="password" class="pDzPRp inputsClick" id="oldPassword" name="oldPassword">
                                    <i class="fa-regular fa-eye-slash"></i>
                                    <i class="fa-sharp fa-regular fa-eye"></i>
                                </div>
                                <div id="errOld" class="cl2-err cl2-err-css"></div>
                            </div>
                        </div>
                    </div>
                    <div class="colum-group colum-group2">
                        <div class="cl1 cl1-item">
                            <div class="cl1-text">
                                <label class="q1">Mật khẩu mới</label>
                            </div>
                        </div>
                        <div class="cl2">
                            <div class="cl2-group">
                                <div class="cl2-text" id="newPass">
                                    <input id="newPassWord" type="password" class="pDzPRp inputsClick" name="newPassword">
                                    <i class="fa-regular fa-eye-slash"></i>
                                    <i class="fa-sharp fa-regular fa-eye"></i>
                                </div>
                                <div id="errNewPass" class="cl2-err cl2-err-css"></div>
                            </div>
                        </div>
                    </div>
                    <div class="colum-group colum-group2">
                        <div class="cl1 cl1-item">
                            <div class="cl1-text">
                                <label class="q1">Xác nhận mật khẩu mới</label>
                            </div>
                        </div>
                        <div class="cl2">
                            <div class="cl2-group">
                                <div class="cl2-text" id="errPassNewLai">
                                    <input id="passlai" type="password" class="pDzPRp" name="passlai">
                                    <i class="fa-regular fa-eye-slash"></i>
                                    <i class="fa-sharp fa-regular fa-eye"></i>
                                </div>
                                <div id="errNewPassLai" class="cl2-err cl2-err-css"></div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-repass">
                        <div class="V2For-">

                        </div>
                        <div class="KPocjz">
                            <button type="submit" name="changePass" class="btn btn-solid-primary btn--m btn--inline btn-solid-primary--disabled btn__send__change curson-no-click" disabled>Xác nhận</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- end đổi mật khẩu -->