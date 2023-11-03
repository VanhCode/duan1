$("input[name='password']").on("input keyup", function () {
    var password = $(this).val();
    checkPasswordLength(password);
});

$("#password").blur(function () {
    var password = $(this).val();

    if (password == '') {
        $("#passwordErr").html("Vui lòng nhập mật khẩu.");
        $(this).addClass("activeErr");
    }
});

function checkPasswordLength(password) {
    if (password.length < 6) {
        $("#passwordErr").html("Mật khẩu mới gồm ít nhất 6 kí tự.");
        $("#password").addClass("activeErr");
    } else {
        $("#passwordErr").html("");
        $("#password").removeClass("activeErr");
    }
}

// date

function checkDateLength(selectedDate, currentYear) {
    if (selectedDate.getFullYear() > currentYear) {
        $("#dateErr").html("Năm sinh không hợp lệ.");
        $("#date").addClass("activeErr");
    } else {
        $("#dateErr").html("");
        $("#date").removeClass("activeErr");
    }
}

$("#firstname").on("input keyup", function () {

    $("#fristnameErr").html("");
    $(this).removeClass("activeErr");
});

$("#firstname").blur(function () {
    var firstnameBlur = $(this).val();
    
    if (firstnameBlur == '') {
        $("#fristnameErr").html("Vui lòng nhập họ của bạn.");
        $(this).addClass("activeErr");
    }
});

// end firstname

// lastname

$("#lastname").on("input keyup", function () {

    $("#lastnameErr").html("");
    $(this).removeClass("activeErr");
});

$("#lastname").blur(function () {
    var lastnameBlur = $(this).val();
    
    if (lastnameBlur == '') {
        $("#lastnameErr").html("Vui lòng nhập tên của bạn.");
        $(this).addClass("activeErr");
    }
});

$("#date").blur(function () {
    var dateBlur = $(this).val();
    
    if (dateBlur == '') {
        $("#dateErr").html("Vui lòng nhập ngày sinh.");
        $(this).addClass("activeErr");
    } else {
        $("#dateErr").html("");
        $(this).removeClass("activeErr");
    }
});

function checkDateLength(selectedDate, currentYear) {
    if (selectedDate.getFullYear() > currentYear) {
        $("#dateErr").html("Năm sinh không hợp lệ.");
        $("#date").addClass("activeErr");
    } else {
        $("#dateErr").html("");
        $("#date").removeClass("activeErr");
    }
}








$("input[name='date']").on("input keyup change", function () {
    var inputDate = new Date($("input[name='date']").val());
    var currentYear = new Date().getFullYear();
    checkDateLength(inputDate, currentYear);

    $.ajax({
        type: "POST",
        url: "../php/ajaxphp/ajaxdangky.php",
        data: { date: inputDate },
        success: function (responseDate) {

            $("#dateErr").html(responseDate);
            if (responseDate.trim() !== "") {
                $("#date").addClass("activeErr");
            } else {
                $("#date").removeClass("activeErr");
            }
        }
    });
});

$("#date").blur(function () {
    var dateBlur = $(this).val();
    
    if (dateBlur == '') {
        $("#dateErr").html("Vui lòng nhập ngày sinh.");
        $(this).addClass("activeErr");
    }
});

function checkDateLength(inputDate, currentYear) {
    if (inputDate.getFullYear() > currentYear) {
        $("#dateErr").html("Năm sinh không hợp lệ.");
        $("#date").addClass("activeErr");
    } else {
        $("#dateErr").html("");
        $("#date").removeClass("activeErr");
    }
}

$(".btn_submit_send").on("click", function (event) {
    if ($(this).hasClass("curson-no-click")) {
        event.preventDefault();
    }
});