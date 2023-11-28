$(document).ready(function(){

    $("#commentForm").submit(function (e) {
        e.preventDefault();

        var iduser = $("#iduser").val();
        var idproduct = $("#idproduct").val();
        var noidung = $("#noidung").val();

        $.ajax({
            url:"views/binhluan.php",
            method:"POST",
            data: {noidung: noidung, idproduct: idproduct, iduser: iduser},
            success:function(data){

                $("#comment").html(data);
                $('#commentForm')[0].reset();
                // console.log('thanhcong');

            }
        })
    })

})