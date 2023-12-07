<!-- chỉnh sửa hồ sơ -->

<div class="administer-user">
    <div style="display: contents;">
        <form onsubmit="return checkForm()" action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
            <div class="administer-chil">
                <div class="administer">
                    <h2 class="SbCTde">Hồ Sơ Của Tôi</h2>
                    <div class="administer-text">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
                </div>
                <div style="position: absolute; right: 40px; top: 21px;">
                    <?= isset($success_account) ? $success_account : "" ?>
                </div>
                <div class="edit-user">
                    <div class="box-form">
                        
                            <table class="table-user">
                                <tr>
                                    <td class="td-user td-user-bottom">
                                        <label>Tên đăng nhập</label>
                                    </td>
                                    <td class="suggest">
                                        <div>
                                            <div class="userLogin">
                                                <input type="text" class="nameLogin" name="first_name" value="<?= $userProfile['first_name'] ?>">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-user">
                                        <label>Tên</label>
                                    </td>
                                    <td class="suggest">
                                        <div>
                                            <div class="userLogin">
                                                <input type="text" class="nameLogin" name="last_name" value="<?= $userProfile['last_name'] ?>">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-user">
                                        <label>Email</label>
                                    </td>
                                    <td class="suggest">
                                        <div class="td3">
                                            <div class="userLogin">
                                                <input type="text" class="nameLogin inputEmail" name="email" value="<?= $userProfile['email'] ?>">
                                            </div>
                                        </div>
                                        <small style="color: red" class="er_email erForm"></small>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-user">
                                        <label>Số điện thoại</label>
                                    </td>
                                    <td class="suggest">
                                        <div class="td3">
                                            <div class="userLogin">
                                                <input type="text" class="nameLogin inputPhone" name="phone" value="<?= $userProfile['phone'] ?>">
                                            </div>
                                        </div>
                                        <small style="color: red" class="er_phone erForm"></small>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-user">
                                        <label>Địa chỉ</label>
                                    </td>
                                    <td class="suggest">
                                        <div class="td3">
                                            <div class="userLogin">
                                                <input type="text" class="nameLogin" name="address" value="<?= $userProfile['address'] ?>">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-user">
                                        <label>Giới tính</label>
                                    </td>
                                    <td class="gender">
                                        <div class="td3">
                                            <div class="start-radio-group" role="radiogroup">
                                                <div class="radio-group-item">
                                                    <div class="input-radio">
                                                        <input type="radio" name="gender" value="Nam" <?= $userProfile['gender'] == "Nam" ? "checked" : "" ?>>
                                                    </div>
                                                    <div class="radio-text">
                                                        <span>Nam</span>
                                                    </div>
                                                </div>
                                                <div class="radio-group-item">
                                                    <div class="input-radio">
                                                        <input type="radio" name="gender" value="Nữ" <?= $userProfile['gender'] == "Nữ" ? "checked" : "" ?>>
                                                    </div>
                                                    <div class="radio-text">
                                                        <span>Nữ</span>
                                                    </div>
                                                </div>
                                                <div class="radio-group-item">
                                                    <div class="input-radio">
                                                        <input type="radio" name="gender" value="Khác" <?= $userProfile['gender'] == "Khác" ? "checked" : "" ?>>
                                                    </div>
                                                    <div class="radio-text">
                                                        <span>Khác</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-user">
                                        <label>Ngày sinh</label>
                                    </td>
                                    <td class="suggest">
                                        <div class="td-date">
                                            <div class="dateClass">
                                                <input type="date" name="date" value="<?= date('Y-m-d', strtotime($userProfile['date'])) ?>" class="dateGroup">
                                            </div>
                                            <div class="dateErr"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="td-user">
                                        <label></label>
                                    </td>
                                    <td class="suggest">
                                        <button type="submit" name="updateAccount" class="btn btn-solid-primary btn--m btn--inline" aria-disabled="false">Lưu</button>
                                    </td>
                                </tr>
                            </table>
                    
                    </div>
                    <div class="edit-img">
                        <div class="div-img">
                            <div class="imgUrl">
                                <div class="url-image-load">
                                    <img class="url-image-load__imagechill" src="public/upload/image/user/<?= $userProfile['user_image'] ?>" alt="">
                                    <input type="hidden" name="oldImage" value="<?= $userProfile['user_image'] ?>">
                                </div>
                            </div>
                            <input class="upFile" type="file" name="image" accept=".jpg,.jpeg,.png">
                            <button type="button" class="btn btn--m btn-inline subFile">Chọn ảnh</button>
                            <div class="file-text">
                                <div class="capacity">Dụng lượng file tối đa 1 MB</div>
                                <div class="capacity">Định dạng:.JPEG, .PNG</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- end chỉnh sửa hồ sơ -->
<script>
    function checkForm(){
        let countErr=0;
        let erEl=document.querySelectorAll('.erForm');
        erEl.forEach((el)=>{
            if(el.innerHTML!==""){
                console.log(el.innerHTML)
                countErr++;
            }
        });
        if(countErr==0){
            return true;
        }
        return false;
    }
    let errPhone =document.querySelector('.er_phone');
    let inputPhone=document.querySelector('.inputPhone');
    var xmlHttp = new XMLHttpRequest();
    inputPhone.onblur= function (e){
        xmlHttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                errPhone.innerHTML = xmlHttp.responseText;
            }
        };
        xmlHttp.open("GET", "admin/xmlHttpRequest/check.php?phone="+inputPhone.value);
        xmlHttp.send();
    }
    let errEmail = document.querySelector('.er_email');
    let inputEmail=document.querySelector('.inputEmail');
    inputEmail.onblur= function (e){
        xmlHttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                errEmail.innerHTML = xmlHttp.responseText;
            }
        };
        xmlHttp.open("GET", "admin/xmlHttpRequest/check.php?email="+inputEmail.value);
        xmlHttp.send();
    }
    checkForm();


</script>