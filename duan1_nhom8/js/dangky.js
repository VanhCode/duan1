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

    // firstname

    $("input[name='firstname']").on("input keyup change", function () {
        var inputFirstname = $(this).val();
        
        $.ajax({
            type: "POST",
            url: "../php/ajaxdangky.php",
            data: { firstname: inputFirstname },
            success: function (responseFirstname) {

                $("#fristnameErr").html(responseFirstname);
                if (responseFirstname.trim() !== "") {
                    $("#firstname").addClass("activeErr");
                } else {
                    $("#firstname").removeClass("activeErr");
                }
            }
        });
    });

    // end firstname

    // lastname

    $("input[name='lastname']").on("input change keyup", function () {
        var inputLastname = $(this).val();
        
        $.ajax({
            type: "POST",
            url: "../php/ajaxdangky.php",
            data: { lastname: inputLastname },
            success: function (responseLirstname) {

                $("#lastnameErr").html(responseLirstname);
                if (responseLirstname.trim() !== "") {
                    $("#lastname").addClass("activeErr");
                } else {
                    $("#lastname").removeClass("activeErr");
                }
            }
        });
    });

    // end lastname

    // số điện thoại hoặc email

    $("input[name='phone']").on("input change keyup", function () {
        var inputPhone = $(this).val();
        

        $.ajax({
            type: "POST",
            url: "../php/ajaxdangky.php",
            data: { phone: inputPhone },
            success: function (responsePhone) {

                $("#phoneErr").html(responsePhone);
                if (responsePhone.trim() !== "") {
                    $("#phone").addClass("activeErr");
                } else {
                    $("#phone").removeClass("activeErr");
                }
            }
        });
    });

    // end số điện thoại hoặc email

    // Password

    $("#password").on("input change keyup", function () {
        var inputPassword = $(this).val();

        $.ajax({
            type: "POST",
            url: "../php/ajaxdangky.php",
            data: { password: inputPassword },
            success: function (responsePassword) {

                $("#passwordErr").html(responsePassword);
                if (responsePassword.trim() !== "") {
                    $("#password").addClass("activeErr");
                } else {
                    $("#password").removeClass("activeErr");
                }
            }
        });
    });

    // end Password
    
    // Date

    var isDateValid = true;

    $("input[name='date']").on("input keyup change", function () {
        var inputDate = new Date($(this).val());
        var currentYear = new Date().getFullYear();
        checkDateLength(inputDate, currentYear);

        if (!isDateValid) {
            return;
        }

        $.ajax({
            type: "POST",
            url: "../php/ajaxdangky.php",
            data: { date: inputDate },
            success: function (responseDate) {
                if (responseDate.trim() !== "") {
                    $("#date").addClass("activeErr");
                    isDateValid = false;
                } else {
                    $("#date").removeClass("activeErr");
                    isDateValid = true;
                }

                $("#dateErr").html(responseDate);
            }
        });
    });

    $("#date").blur(function () {
        var dateBlur = $(this).val();
        if (dateBlur == '') {
            $("#dateErr").html("Vui lòng nhập ngày sinh.");
            $(this).addClass("activeErr");
        } else if (!isDateValid) {
            $("#dateErr").html("Năm sinh không hợp lệ.");
        }
    });

    function checkDateLength(inputDate, currentYear) {
        if (inputDate.getFullYear() > currentYear) {
            $("#dateErr").html("Năm sinh không hợp lệ.");
            $("#date").addClass("activeErr");
            isDateValid = false;
        } else {
            $("#dateErr").html("");
            $("#date").removeClass("activeErr");
            isDateValid = true;
        }
    }

    // end Date

    // giới tính

    $("input[name='gender']").on("change", function () {
        var selectedGender = $("input[name='gender']:checked").val();
        
        if (!selectedGender) {
            $("#genderErr").html("Vui lòng chọn giới tính.");
            $(".group__genderS").addClass("activeErr");
        } else {
            $("#genderErr").html("");
            $(".group__genderS").removeClass("activeErr");
        }
    });

    // end giới tính


    $("input, select").on("input keyup change", function () {

        var count = 0;
    
        if ($("#firstname").hasClass("activeErr") || $("#firstname").val() === "") {
            count++;
        }
    
        if ($("#lastname").hasClass("activeErr") || $("#lastname").val() === "") {
            count++;
        }
    
        if ($("#password").hasClass("activeErr") || $("#password").val() === "") {
            count++;
        }
    
        if ($("#phone").hasClass("activeErr") || $("#phone").val() === "") {
            count++;
        }
    
        if ($("#date").hasClass("activeErr") || $("#date").val() === "") {
            count++;
        }
    
        if (count > 0) {
            $(".btn_submit_send").addClass("curson-no-click").prop("disabled", true);
        } else {
            $(".btn_submit_send").removeClass("curson-no-click").prop("disabled", false);
        }
    });


    $(".btn_submit_send").on("click", function (event) {
        var isInputValid = true;
        
        if ($("#firstname").hasClass("activeErr") || $("#lastname").hasClass("activeErr") || $("#password").hasClass("activeErr") || $("#phone").hasClass("activeErr") || $("#date").hasClass("activeErr")) {
            isInputValid = false;
        }

        var selectedGender = $("input[name='gender']:checked").val();
        if (!selectedGender) {
            isInputValid = false;
            $("#genderErr").html("Vui lòng chọn giới tính.");
            $(".group__genderS").addClass("activeErr");
        } else {
            $("#genderErr").html("");
            $(".group__genderS").removeClass("activeErr");
        }

        if (!isInputValid) {
            event.preventDefault();
        }
    });

});
