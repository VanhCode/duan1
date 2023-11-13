function sendChangePass() {
    var inputOldPass = document.getElementById('oldPassword');
    var inputPassNew = document.getElementById('newPassWord');
    var inputPasslai = document.getElementById('passlai');
    var oldPass = document.getElementById('oldPass');
    var newPass = document.getElementById('newPass');
    var errOld = document.getElementById('errOld');
    var errNewPass = document.getElementById('errNewPass');
    var errPass = document.getElementById('errNewPassLai');
    var errPassNewLai = document.getElementById('errPassNewLai');
    var kitu = /^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*()-_+=<>?])[A-Za-z\d!@#$%^&*()-_+=<>?]{3,}$/;
    let globalCount = 0;

    newPass.classList.remove('activetb');
    newPass.classList.remove('activeManh');
    inputPassNew.classList.remove('bg__usertb');
    inputPassNew.classList.remove('bg__usermanh');
    errNewPass.style.color = 'red'

    if (inputOldPass.value === "") {
        oldPass.classList.add('activeErr');
        inputOldPass.classList.add('bg__userErr');
        errOld.innerHTML = "Vui lòng nhập trường này";
        globalCount++;
    }

    if (inputPassNew.value === "") {
        newPass.classList.add('activeErr');
        inputPassNew.classList.add('bg__userErr');
        errNewPass.innerHTML = "Vui lòng nhập trường này";
        globalCount++;
    } else if (inputPassNew.value.length < 6) {
        newPass.classList.add('activeErr');
        inputPassNew.classList.add('bg__userErr');
        errNewPass.innerHTML = "Mật khẩu phải lớn hơn 6 kí tự";
        globalCount++;
    } else if (!kitu.test(inputPassNew.value)) {
        newPass.classList.add('activeErr');
        inputPassNew.classList.add('bg__userErr');
        errNewPass.innerHTML = "Mật khẩu phải có ít nhất 1 số và 1 kí tự và chữ cái viết hoa";
        globalCount++;
    }

    if (inputPasslai.value === "") {
        errPassNewLai.classList.add('activeErr');
        inputPasslai.classList.add('bg__userErr');
        errPass.innerHTML = "Vui lòng nhập trường này";
        globalCount++;
    } else {
        if (inputPassNew.value != inputPasslai.value) {
            errPassNewLai.classList.add('activeErr');
            inputPasslai.classList.add('bg__userErr');
            errPass.innerHTML = "Mật khẩu mới không khớp";
            globalCount++;
        }
    }

    if(globalCount > 0) {
        return false;
    } else {
        newPass.classList.remove('activetb');
        newPass.classList.remove('activeManh');
        inputPassNew.classList.remove('bg__usertb');
        inputPassNew.classList.remove('bg__usermanh');
        errNewPass.style.color = 'red'
        return true;
    }
}

var inputOldPass = document.getElementById('oldPassword');
var inputPassNew = document.getElementById('newPassWord');
var inputPasslai = document.getElementById('passlai');
var newPass = document.getElementById('newPass');
var oldPass = document.getElementById('oldPass');
var errOld = document.getElementById('errOld');
var errNewPass = document.getElementById('errNewPass');
var errPass = document.getElementById('errNewPassLai');
var errPassNewLai = document.getElementById('errPassNewLai');
var btn_submit = document.querySelector('.btn__send__change');
let globalCount = 0;

$("input[name='oldPassword']").on("input change keyup", function () {
    var inputOldPass = $(this).val();

    $.ajax({
        type: "POST",
        url: "./php/ajaxAccount.php",
        data: { oldPassword: inputOldPass },
        success: function (responseoldPass) {
            $("#errOld").html(responseoldPass);
            if (responseoldPass.trim() !== "") {
                $("#oldPass").addClass("activeErr");
                $("#oldPassword").addClass("bg__userErr");
            } else {
                $("#oldPass").removeClass("activeErr");
                $("#oldPassword").removeClass("bg__userErr");
            }
            checkSubmitButton();
        }
    });
});

inputOldPass.addEventListener('blur', function() {
    if (inputOldPass.value === "") {
        oldPass.classList.add('activeErr');
        inputOldPass.classList.add('bg__userErr');
        errOld.innerHTML = "Vui lòng nhập trường này";
        globalCount++;
    }

    checkSubmitButton();
})

inputPassNew.addEventListener('input', handleInputChange);
inputPassNew.addEventListener('blur', handleInputChange);
inputPassNew.addEventListener('keyup', handleInputChange);

function handleInputChange() {

    newPass.classList.remove('activetb');
    newPass.classList.remove('activeManh');
    inputPassNew.classList.remove('bg__usertb');
    inputPassNew.classList.remove('bg__usermanh');
    errNewPass.style.color = 'red'

    if (inputPassNew.value === "") {
        newPass.classList.add('activeErr');
        inputPassNew.classList.add('bg__userErr');
        errNewPass.innerHTML = "Vui lòng nhập trường này";
        globalCount++;
    } else {
        newPass.classList.remove('activeErr');
        inputPassNew.classList.remove('bg__userErr');
        errNewPass.innerHTML = "";
        globalCount = 0;

        var newPasswordLength = inputPassNew.value.length;
    
        if (newPasswordLength <= 6) {
            newPass.classList.add('activeErr');
            inputPassNew.classList.add('bg__userErr');
            errNewPass.innerHTML = "Mật khẩu yếu";
        } else if (newPasswordLength > 6 && newPasswordLength <= 8) {
            newPass.classList.add('activetb');
            inputPassNew.classList.add('bg__usertb');
            errNewPass.style.color = '#bc8f20';
            errNewPass.innerHTML = "Mật khẩu trung bình";
        } else {
            newPass.classList.add('activeManh');
            inputPassNew.classList.add('bg__usermanh');
            errNewPass.style.color = 'rgb(95 194 163)';
            errNewPass.innerHTML = "Mật khẩu mạnh";
        }

    }

    checkSubmitButton();
}

inputPasslai.addEventListener('input', handleInputPassLai);
inputPasslai.addEventListener('blur', handleInputPassLai);
inputPasslai.addEventListener('keyup', handleInputPassLai);

function handleInputPassLai() {

    if (inputPasslai.value === "") {
        errPassNewLai.classList.add('activeErr');
        inputPasslai.classList.add('bg__userErr');
        errPass.innerHTML = "Vui lòng nhập trường này";
        globalCount++;
    } else {
        if (inputPassNew.value != inputPasslai.value) {
            errPassNewLai.classList.add('activeErr');
            inputPasslai.classList.add('bg__userErr');
            errPass.innerHTML = "Mật khẩu mới không khớp";
            globalCount++;
        } else {
            errPassNewLai.classList.remove('activeErr');
            inputPasslai.classList.remove('bg__userErr');
            errPass.innerHTML = "";
            globalCount = 0;
        }
    }

    checkSubmitButton();
}


function checkSubmitButton() {
    var count = 0;

    if ($("#oldPass").hasClass("activeErr") || $("#oldPassword").val() === "") {
        count++;
    }
    if ($("#newPassWord").val() === "") {
        count++;
    }
    if ($("#errPassNewLai").hasClass("activeErr") || $("#passlai").val() === "") {
        count++;
    }

    if(globalCount > 0) {
        count++;
    }

    if (count > 0) {
        btn_submit.classList.add('curson-no-click');
        btn_submit.disabled = true;
    } else {
        btn_submit.classList.remove('curson-no-click');
        btn_submit.disabled = false;
    }
}
