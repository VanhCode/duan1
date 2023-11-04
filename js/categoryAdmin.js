function sendCategory() {
    var danhmuc = document.querySelector('.danhmuc');
    var error_category = document.querySelector('.error_category');

    let count = 0;

    if(danhmuc.value == "") {
        error_category.innerHTML = "Vui lòng nhập trường này";
        count++;
    } else {
        error_category.innerHTML = "";
    }

    if(count > 0) {
        return false;
    } else {
        return true;
    }
}


var danhmuc = document.querySelector('.danhmuc');
var error_category = document.querySelector('.error_category');

if (danhmuc && error_category) {
    danhmuc.addEventListener('blur', function() {
        let count = 0;

        if(danhmuc.value == "") {
            error_category.innerHTML = "Vui lòng nhập trường này";
            count++;
        } else {
            error_category.innerHTML = "";
        }

        if(count > 0) {
            return false;
        } else {
            return true;
        }
    });

    danhmuc.addEventListener('keyup', function(event) {
        let count = 0;

        if(danhmuc.value == "") {
            error_category.innerHTML = "Vui lòng nhập trường này";
            count++;
        } else {
            error_category.innerHTML = "";
        }

        if(count > 0) {
            return false;
        } else {
            return true;
        }
    });
}


