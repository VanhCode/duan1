let httpRequest = new XMLHttpRequest();

var amountClickBoxS = document.querySelectorAll(".amount-click-box");

amountClickBoxS.forEach(function (amountClickBox) {
    let id__cart = amountClickBox.querySelector('.id__cart');
    let amount__cartItem = amountClickBox.querySelector('.amount__cartItem');
    let click_left = amountClickBox.querySelector('.click_left');
    let click_right = amountClickBox.querySelector('.click_right');

    click_left.addEventListener('click', function () {

        if (amount__cartItem.value > 1) {
            amount__cartItem.value--;
        }

        httpRequest.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                amount__cartItem.value = this.responseText;
            }
        }

        httpRequest.open("GET", "./php/ajaxCart.php?cart_id=" + id__cart.value + "&amount=" + amount__cartItem.value, true);
        httpRequest.send();

    });

    click_right.addEventListener('click', function () {
        amount__cartItem.value++;

        httpRequest.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                amount__cartItem.value = this.responseText;
            }
        }

        httpRequest.open("GET", "./php/ajaxCart.php?cart_id=" + id__cart.value + "&amount=" + amount__cartItem.value, true);
        httpRequest.send();
    });
});


var formSendCart = document.querySelector('#formSendCart');


// Check nút xóa khi chưa chọn sản phẩm

var checkBoxCarts = document.querySelectorAll(".stardust-checkbox__input:checked");
var errItem = document.querySelector("#err__delete");
var delete__bycheckbox = document.querySelector(".delete__checkbox");
var confirmModal = document.getElementById('confirmModal');

delete__bycheckbox.addEventListener('click', function () {
    formSendCart.setAttribute('action', 'index.php?action=gio-hang');
    if (!box_checkbox()) {
        errItem.style.display = "block";
        setTimeout(function () {
            errItem.style.display = "none";
        }, 2000);
    } else {
        confirmModal.style.display = 'block';

        disableMouseScroll();

        confirmModal.addEventListener('transitionend', function () {
            if (confirmModal.style.display === 'none') {
                enableMouseScroll();
            }
        });
    }

})

// End check nút xóa khi chưa chọn sản phẩm


// Gửi form đi để mua hàng
function sendDeleteCart() {

    var checkBoxCarts = document.querySelectorAll(".stardust-checkbox__input:checked");
    var err__sendCart = document.querySelector("#err__sendCart");
    var button__request__confirm = document.querySelector(".button__request__confirm");
    var confirmModal = document.getElementById('confirmModal');

    let count = 0;

    if (!box_checkbox()) {
        err__sendCart.style.display = "block";
        count++;
    }

    button__request__confirm.addEventListener('click', function () {
        err__sendCart.style.display = "none";
    })

    if (count > 0) {
        return false;
    }
}


// Set attribute cho form gửi đi


var thanhtoan__order = document.querySelector('#thanhtoan__order');
thanhtoan__order.addEventListener('click', function () {
    formSendCart.setAttribute('action', 'index.php?action=thanh-toan');
})

// End Set attribute cho form gửi đi




function box_checkbox() {
    var checkBoxCarts = document.querySelectorAll(".stardust-checkbox__input:checked");

    for (var i = 0; i < checkBoxCarts.length; i++) {
        if (checkBoxCarts[i].checked == true) {
            return true;
        } else {
            return false;
        }
    }

}

// End Gửi form đi để mua hàng



var confirmModal = document.getElementById('confirmModal');
var BackgrountNone = document.getElementById('BackgrountNone');
var confirmModalChil = document.getElementById('confirmModalChil');
// Lấy phần tử HTML chính
var mainElement = document.documentElement;

// Hàm xử lý sự kiện cuộn chuột
function disableScroll(event) {
    event.preventDefault();
}

// Bắt đầu vô hiệu hóa cuộn chuột
function disableMouseScroll() {
    mainElement.addEventListener('wheel', disableScroll, { passive: false });
}

// Hủy bỏ vô hiệu hóa cuộn chuột
function enableMouseScroll() {
    mainElement.removeEventListener('wheel', disableScroll);
}


// Bắt sự kiện khi nền được nhấp
BackgrountNone.addEventListener('click', function (e) {
    if (e.target === BackgrountNone) {
        confirmModal.style.display = 'none';
        enableMouseScroll(); // Bật lại cuộn
    }
});

// Bắt sự kiện khi nút "Trở Lại" được nhấp
var confirmBackBtn = document.getElementById('confirmBackBtn');
confirmBackBtn.onclick = function () {
    confirmModal.style.display = 'none';
    enableMouseScroll(); // Bật lại cuộn
    return false;
};


confirmYesBtn.onclick = function () {
    var form = document.querySelector('form');
    form.submit();
    enableMouseScroll(); // Bật lại cuộn
};