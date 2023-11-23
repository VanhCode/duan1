$(document).ready(function () {

    $("input[name='phone']").on("input change keyup", function () {
        var inputPhone = $(this).val();
        // console.log(inputPhone);
        $.ajax({
            type: "POST",
            url: "./php/ajaxquenmk.php",
            data: { phone: inputPhone },
            success: function (responsePhone) {

                $("#errphoneOrEmail").html(responsePhone);
                if (responsePhone.trim() !== "") {
                    $("#bg_errforgotpass").addClass("activeErr");
                    $("#ip_bg").addClass("activeErr");
                } else {
                    $("#bg_errforgotpass").removeClass("activeErr");
                    $("#ip_bg").removeClass("activeErr");
                }
                
                checkSubmitButton();
            }
        });
    });

    function checkSubmitButton() {
        var count = 0;
        if ($("#ip_bg").hasClass("activeErr") || $("#ip_bg").val() === "") {
            count++;
        }
        if (count > 0) {
            $(".btn_forgotpass").addClass("curson-no-click").prop("disabled", true);
        } else {
            $(".btn_forgotpass").removeClass("curson-no-click").prop("disabled", false);
        }
    }
    
});

var xac_minh = document.querySelector('#xac_minh');