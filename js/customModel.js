function sendUser() {
    var firstname = document.querySelector('.first')
    var last = document.querySelector('.last')
    var email = document.querySelector('.email')
    var phone = document.querySelector('.phone')
    var password = document.querySelector('.password')

    var er_firstname = document.querySelector('.er_firstname')
    var er_lastname = document.querySelector('.er_lastname')
    var er_email = document.querySelector('.er_email')
    var er_phone = document.querySelector('.er_phone')
    var er_pass = document.querySelector('.er_pass')

    let count = 0

    if(er_phone.innerHTML!=''){
        count++
    }
    if(er_email.innerHTML!=''){
        count++
    }
    if(firstname.value == "") {
        er_firstname.innerHTML = "Vui lòng nhập trường này"
        count++
    } else {
        er_firstname.innerHTML = ""
    }

    if(last.value == "") {
        er_lastname.innerHTML = "Vui lòng nhập trường này"
        count++
    } else {
        er_lastname.innerHTML = ""
    }

    if(email.value == "") {
        er_email.innerHTML = "Vui lòng nhập trường này"
        count++
    } else {
        er_email.innerHTML = ""
    }

    if(phone.value == "") {
        er_phone.innerHTML = "Vui lòng nhập trường này"
        count++
    } else {
        er_phone.innerHTML = ""
    }
    
    if(password.value == "") {
        er_pass.innerHTML = "Vui lòng nhập trường này"
        count++
    } else {
        er_pass.innerHTML = ""
    }
    console.log(count);
    if(count > 0) {
        return false
    } else {
        return true
    }
}


var blurinpS = document.querySelectorAll('.blurinp');
var errorS = document.querySelectorAll('.error');

blurinpS.forEach(function(blurinp) {
    blurinp.addEventListener('blur', function(e) {
        if(blurinp.value == "") {
            let err = blurinp.nextElementSibling.innerHTML = "Vui lòng nhập trường này"
        } else {
            let err = blurinp.nextElementSibling.innerHTML = ""
        }
    })

    blurinp.addEventListener('keyup', function(e) {
        if(blurinp.value == "") {
            let err = blurinp.nextElementSibling.innerHTML = "Vui lòng nhập trường này"
        } else {
            let err = blurinp.nextElementSibling.innerHTML = ""
        }
    })

})
