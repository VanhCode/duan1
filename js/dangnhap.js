var icon1 = document.querySelector('.fa-eye');
var icon2 = document.querySelector('.fa-eye-slash');
var inputPass = document.querySelector('.password');

icon2.addEventListener('click', () => {
    icon2.style.display = 'none';
    inputPass.setAttribute('type', 'password');
    icon1.style.display = 'block';
});

icon1.addEventListener('click', () => {
    icon1.style.display = 'none';
    inputPass.setAttribute('type', 'text');
    icon2.style.display = 'block';
});


$(document).ready(function () {

    $("input[name='phone']").on("input change keyup", function () {
        var inputPhone = $(this).val();

        $.ajax({
            type: "POST",
            url: "./php/ajaxdangnhap.php",
            data: { phone: inputPhone },
            success: function (responsePhone) {

                $("#phoneErr").html(responsePhone);
                if (responsePhone.trim() !== "") {
                    $("#phone").addClass("activeErr");
                } else {
                    $("#phone").removeClass("activeErr");
                }
                checkSubmitButton();
            }
        });
    });


    $("#password").on("input change keyup", function () {
        var inputPassword = $(this).val();

        $.ajax({
            type: "POST",
            url: "./php/ajaxdangnhap.php",
            data: { password: inputPassword },
            success: function (responsePassword) {

                $("#passwordErr").html(responsePassword);
                if (responsePassword.trim() !== "") {
                    $("#password").addClass("activeErr");
                } else {
                    $("#password").removeClass("activeErr");
                }
                checkSubmitButton();
            }
        });
    });

    function checkSubmitButton() {
        var count = 0;
        if ($("#phone").hasClass("activeErr") || $("#phone").val() === "") {
            count++;
        }
        if ($("#password").hasClass("activeErr") || $("#password").val() === "") {
            count++;
        }
        if (count > 0) {
            $(".btn_submit_send").addClass("curson-no-click").prop("disabled", true);
        } else {
            $(".btn_submit_send").removeClass("curson-no-click").prop("disabled", false);
        }
    }

    $(".btn_submit_send").on("click", function (event) {
        if ($(this).hasClass("curson-no-click")) {
            event.preventDefault();
        }
    });

});