var delete__hoadon = document.querySelectorAll('.delete__hoadon');
var confirmModal = document.querySelectorAll('.confirmModal');
// Lấy phần tử HTML chính
var mainElement = document.documentElement;
delete__hoadon.forEach(function (btnIndex,index) {
    btnIndex.addEventListener('click', function (event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của nút
        
        if(confirmModal[index].style.display == 'none') {
            confirmModal[index].style.display = 'block';
        } else {
            confirmModal[index].style.display = 'none';
        }

        var confirmBackBtn = confirmModal[index].querySelector('.confirmBackBtn');
        var confirmYesBtn = confirmModal[index].querySelector('.confirmYesBtn');
        confirmBackBtn.onclick = function() {
            confirmModal[index].style.display = 'none';
            enableMouseScroll(); // Bật lại cuộn
            // return false;
        }

        // confirmYesBtn.onclick = function () {
        //     var formgroup = document.getElementById('formSendCart');
        //     formgroup.submit();
        //     enableMouseScroll(); // Bật lại cuộn
        // };

        disableMouseScroll();

        confirmModal[index].addEventListener('transitionend', function () {
            if (confirmModal[index].style.display === 'none') {
                enableMouseScroll();
            }
        });

        
        
    })


});


function disableScroll(event) {
    event.preventDefault();
}

function disableMouseScroll() {
    mainElement.addEventListener('wheel', disableScroll, { passive: false });
}

// Hủy bỏ vô hiệu hóa cuộn chuột
function enableMouseScroll() {
    mainElement.removeEventListener('wheel', disableScroll);
}


// // Bắt sự kiện khi nút "Trở Lại" được nhấp
// var confirmBackBtn = document.getElementById('confirmBackBtn');
// confirmBackBtn.onclick = function (event) {
//     event.preventDefault(); // Ngăn chặn hành vi mặc định của nút
//     confirmModal.style.display = 'none';
//     enableMouseScroll(); // Bật lại cuộn
//     return false;
// };

// // Bắt sự kiện khi nút "Có" được nhấp
// var confirmYesBtn = document.getElementById('confirmYesBtn');
// confirmYesBtn.onclick = function () {
//     var form = document.getElementById('formSendCart');
//     form.submit();
//     enableMouseScroll(); // Bật lại cuộn
// };
