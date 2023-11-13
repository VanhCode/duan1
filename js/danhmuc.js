document.addEventListener('DOMContentLoaded', function () {
    const boxImgCategory = document.querySelector('.category__banners__imgs');
    const images = document.querySelectorAll('.category__banners__imgs img');
    // console.log(images);

    let index = 0

    function sliderRun() {
        if(index == images.length - 1) {
            index = 0;
            let width = images[0].offsetWidth
            boxImgCategory.style.transform = `translateX(0px)`
            document.querySelector('.active').classList.remove('active')
            document.querySelector('.icdost-' + index).classList.add('active')
        } else {
            index++
            let width = images[0].offsetWidth
            boxImgCategory.style.transform = `translateX(${width * -1 * index}px)`
            document.querySelector('.active').classList.remove('active')
            document.querySelector('.icdost-' + index).classList.add('active')
        }
    }

    let runBannerCategory = setInterval(sliderRun, 4000);

    let next = document.querySelector('.click-right');
    next.addEventListener('click', () => {
        clearInterval(runBannerCategory)
        sliderRun()
        runBannerCategory = setInterval(runBannerCategory, 4000);
        // ở đây khi mà click thì nó sẽ xóa bỏ chạy tự động khi click
    })

    // Nút Mũi Tên Bên Trái
    let back = document.querySelector('.click-left');
    back.addEventListener('click', () => {
        clearInterval(runBannerCategory)

        if (index == 0) {
            index = images.length - 1
            let width = images[0].offsetWidth
            boxImgCategory.style.transform = `translateX(${width * -1 * index}px)`
            document.querySelector('.active').classList.remove('active')
            document.querySelector('.icdost-' + index).classList.add('active')
        } else {
            index--
            let width = images[0].offsetWidth
            boxImgCategory.style.transform = `translateX(${width * -1 * index}px)`
            document.querySelector('.active').classList.remove('active')
            document.querySelector('.icdost-' + index).classList.add('active')
        }
        runBannerCategory = setInterval(runBannerCategory, 4000);
    })

    // Nút item
    let items = document.querySelectorAll('.icdost');

    items.forEach(function (item, index) {
        item.addEventListener('click', function () {
            clearInterval(runBannerCategory);
            index = Array.from(items).indexOf(this);
            let width = images[0].offsetWidth;
            boxImgCategory.style.transform = `translateX(${width * -1 * index}px)`;
            document.querySelector('.active').classList.remove('active');
            this.classList.add('active');
            runBannerCategory = setInterval(runBannerCategory, 4000);
        });
    });

});

// Lấy tất cả các thẻ `a-checkbox__href`
const links = document.querySelectorAll(".a-checkbox__href");

// Lặp qua từng thẻ `a` và thêm sự kiện click
links.forEach(function(link) {
    link.addEventListener("click", function() {
        // Lấy checkbox tương ứng với thẻ `a` được click
        const checkbox = link.querySelector(".vanhstore-checkbox__box svg");

        // Lấy trạng thái lưu trong localStorage
        const isChecked = localStorage.getItem(checkbox.name);

        // Kiểm tra xem checkbox có class "active__checked_cate" không
        if (checkbox.classList.contains("active__checked_cate")) {
            // Nếu có, hãy loại bỏ class "active__checked_cate" và thay đổi trạng thái checked
            checkbox.classList.remove("active__checked_cate");
            checkbox.checked = false;
            // Xóa trạng thái lưu trong localStorage
            localStorage.removeItem(checkbox.name);
        } else {
            // Nếu không, hãy thêm class "active__checked_cate" và thay đổi trạng thái checked
            checkbox.classList.add("active__checked_cate");
            checkbox.checked = true;
            // Lưu trạng thái checked trong localStorage
            localStorage.setItem(checkbox.name, "true");
        }

        // Loại bỏ class "active__checked_cate" từ các checkbox khác
        const allCheckboxes = document.querySelectorAll(".vanhstore-checkbox__box svg");
        allCheckboxes.forEach(function(otherCheckbox) {
            if (otherCheckbox !== checkbox && otherCheckbox.classList.contains("active__checked_cate")) {
                otherCheckbox.classList.remove("active__checked_cate");
            }
        });

        // Bạn có thể thực hiện các hành động khác tại đây nếu cần
    });
});

// Kiểm tra localStorage khi tải trang lại
links.forEach(function(link) {
    const checkbox = link.querySelector(".vanhstore-checkbox__box");
    const isChecked = localStorage.getItem(checkbox.name);
    if (isChecked === "true") {
        checkbox.classList.add("active__checked_cate");
        checkbox.checked = true;
    }
});







// Lấy thẻ "vanhstore-category-list__toggle-btn"
const toggleBtn = document.querySelector(".vanhstore-category-list__toggle-btn");

// Lấy phần "stardust-dropdown__item-body"
const dropdownBody = document.querySelector(".stardust-dropdown__item-body");

// Thêm Event Listener cho thẻ "vanhstore-category-list__toggle-btn"
toggleBtn.addEventListener("click", function() {
    // Kiểm tra xem phần "stardust-dropdown__item-body" có lớp "active__header__toggle" không
    const isActive = dropdownBody.classList.contains("active__header__toggle");
    toggleBtn.style.display = "none";
    // Nếu có lớp "active__header__toggle", thì xóa nó; nếu không, thêm nó
    if (isActive) {
        dropdownBody.classList.remove("active__header__toggle");
    } else {
        dropdownBody.classList.add("active__header__toggle");
    }
});


// Lấy thẻ "vanhstore-category-list__toggle-btn"
const toggleBtnFilter = document.querySelector(".vanhstore-filter-group__toggle-btn");

// Lấy phần "stardust-dropdown__item-body"
const dropdownBodyFilter = document.querySelector(".stardust-filter_list__body");

// Thêm Event Listener cho thẻ "vanhstore-category-list__toggle-btn"
toggleBtnFilter.addEventListener("click", function() {
    // Kiểm tra xem phần "stardust-dropdown__item-body" có lớp "active__header__toggle" không
    const isActive = dropdownBodyFilter.classList.contains("active__header__toggle");
    toggleBtnFilter.style.display = "none";
    // Nếu có lớp "active__header__toggle", thì xóa nó; nếu không, thêm nó
    if (isActive) {
        dropdownBodyFilter.classList.remove("active__header__toggle");
    } else {
        dropdownBodyFilter.classList.add("active__header__toggle");
    }
});




// Lấy tất cả các thẻ có lớp "btn-sort__bar"
const sortButtons = document.querySelectorAll('.btn-sort__bar');

// Kiểm tra xem có trạng thái trước đó được lưu trong sessionStorage không
const activeButtonIndex = sessionStorage.getItem('activeButtonIndex');

// Nếu có, thì đặt lớp "active-sortbar" cho thẻ tương ứng
if (activeButtonIndex !== null) {
    const index = parseInt(activeButtonIndex, 10);
    sortButtons[index].classList.add('active-sortbar');
} else {
    // Nếu không có trạng thái được lưu, đặt nó cho thẻ đầu tiên mặc định
    sortButtons[0].classList.add('active-sortbar');
}

// Lặp qua từng thẻ và thêm sự kiện click
sortButtons.forEach((button, index) => {
    button.addEventListener('click', (event) => {
        // Ngăn mặc định hành vi chuyển đến đầu trang
        event.preventDefault();

        // Lấy URL từ thuộc tính "href" của thẻ
        const url = button.getAttribute('href');

        // Lấy chỉ số của thẻ được bấm từ thuộc tính "data-index"
        const clickedIndex = parseInt(button.getAttribute('data-index'), 10);

        // Loại bỏ lớp "active-sortbar" khỏi tất cả các thẻ
        sortButtons.forEach(btn => {
            btn.classList.remove('active-sortbar');
        });

        // Thêm lớp "active-sortbar" cho thẻ được bấm
        button.classList.add('active-sortbar');

        // Lưu trạng thái được chọn vào sessionStorage
        sessionStorage.setItem('activeButtonIndex', clickedIndex);

        // Chuyển trang đến URL đã lấy
        window.location.href = url;
    });
});
