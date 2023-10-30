// let divSuccessTop = document.querySelector('.thongBaoSuccess');
// let iconSuccessLoad =  document.querySelector('.animation__loadWeb .fa-xmark');
// divSuccessTop.addEventListener('click', function() {

//     divSuccessTop.remove();
// });

// iconSuccessLoad.addEventListener('click', function() {
//     divSuccessTop.remove();
// })

const boxImg = document.querySelector('.full-home-banners')
const imgs = document.querySelectorAll('.full-home-banners img');

let index = 0
function chay() {
    if (index == imgs.length - 1) {
        index = 0
        let width = imgs[0].offsetWidth
        boxImg.style.transform = `translateX(0px)`
        document.querySelector('.active').classList.remove('active')
        document.querySelector('.item-' + index).classList.add('active')
    } else {
        index++
        let width = imgs[0].offsetWidth
        boxImg.style.transform = `translateX(${width * -1 * index}px)`
        document.querySelector('.active').classList.remove('active')
        document.querySelector('.item-' + index).classList.add('active')
    }
}

let tuDong = setInterval(chay, 6000);

// Nút Mũi Tên Bên Phải
let next = document.querySelector('.click-right');
next.addEventListener('click', () => {
    clearInterval(tuDong)
    chay()
    tuDong = setInterval(chay, 6000);
    // ở đây khi mà click thì nó sẽ xóa bỏ chạy tự động khi click
})

// Nút Mũi Tên Bên Trái
let back = document.querySelector('.click-left');
back.addEventListener('click', () => {
    clearInterval(tuDong)

    if (index == 0) {
        index = imgs.length - 1
        let width = imgs[0].offsetWidth
        boxImg.style.transform = `translateX(${width * -1 * index}px)`
        document.querySelector('.active').classList.remove('active')
        document.querySelector('.item-' + index).classList.add('active')
    } else {
        index--
        let width = imgs[0].offsetWidth
        boxImg.style.transform = `translateX(${width * -1 * index}px)`
        document.querySelector('.active').classList.remove('active')
        document.querySelector('.item-' + index).classList.add('active')
    }
    tuDong = setInterval(chay, 6000);
})

// Nút item 
let items = document.querySelectorAll('.item');

items.forEach(function (item, index) {
    item.addEventListener('click', function () {
        clearInterval(tuDong);
        index = Array.from(items).indexOf(this);
        let width = imgs[0].offsetWidth;
        boxImg.style.transform = `translateX(${width * -1 * index}px)`;
        document.querySelector('.active').classList.remove('active');
        this.classList.add('active');
        tuDong = setInterval(chay, 6000);
    });
});


// Banner Slider 2

const boxImgoclock = document.querySelector('.oclock_slider__banner_Boximg')
const ImgOclock = document.querySelectorAll('.oclock_slider__banner_Boximg img')

let curenIndex = 0
function run() {
    if (curenIndex == ImgOclock.length - 1) {
        curenIndex = 0
        let width2 = ImgOclock[0].offsetWidth
        boxImgoclock.style.transform = `translateX(0px)`
        document.querySelector('.activeSlider__oclock').classList.remove('activeSlider__oclock')
        document.querySelector('.dost-' + curenIndex).classList.add('activeSlider__oclock')
    } else {
        curenIndex++
        let width2 = ImgOclock[0].offsetWidth
        boxImgoclock.style.transform = `translateX(${width2 * -1 * curenIndex}px)`
        document.querySelector('.activeSlider__oclock').classList.remove('activeSlider__oclock')
        document.querySelector('.dost-' + curenIndex).classList.add('activeSlider__oclock')
    }
}

let tuDong2 = setInterval(run, 6000);

// Nút Mũi Tên Bên Phải
let nextCost = document.querySelector('.oclock_control__slider_next');
nextCost.addEventListener('click', () => {
    clearInterval(tuDong2)
    run()
    tuDong2 = setInterval(run, 6000);
})

// Nút Mũi Tên Bên Trái
let backCost = document.querySelector('.oclock_control__slider_back');
backCost.addEventListener('click', () => {
    clearInterval(tuDong2)

    if (curenIndex == 0) {
        curenIndex = ImgOclock.length - 1
        let width2 = ImgOclock[0].offsetWidth
        boxImgoclock.style.transform = `translateX(${width2 * -1 * curenIndex}px)`
        document.querySelector('.activeSlider__oclock').classList.remove('activeSlider__oclock')
        document.querySelector('.dost-' + curenIndex).classList.add('activeSlider__oclock')
    } else {
        curenIndex--
        let width2 = ImgOclock[0].offsetWidth
        boxImgoclock.style.transform = `translateX(${width2 * -1 * curenIndex}px)`
        document.querySelector('.activeSlider__oclock').classList.remove('activeSlider__oclock')
        document.querySelector('.dost-' + curenIndex).classList.add('activeSlider__oclock')
    }
    tuDong2 = setInterval(run, 6000);
})

// Nút item 
let dostS = document.querySelectorAll('.dost');

dostS.forEach(function (item, index) {
    item.addEventListener('click', function () {
        clearInterval(tuDong2);
        index = Array.from(dostS).indexOf(this);
        let width2 = ImgOclock[0].offsetWidth;
        boxImgoclock.style.transform = `translateX(${width2 * -1 * index}px)`;
        document.querySelector('.activeSlider__oclock').classList.remove('activeSlider__oclock');
        this.classList.add('activeSlider__oclock');
        tuDong2 = setInterval(run, 6000);
    });
});

let hrs = document.getElementById('hrs');
let minu = document.getElementById('minu');
let seco = document.getElementById('seco');

setInterval(() => {
    let currentTime = new Date();
    
    hrs.innerHTML = (currentTime.getHours() < 10 ? "0" : "") + currentTime.getHours();
    minu.innerHTML = (currentTime.getMinutes() < 10 ? "0" : "") + currentTime.getMinutes();
    seco.innerHTML = (currentTime.getSeconds() < 10 ? "0" : "") + currentTime.getSeconds();
})

let hr = document.getElementById('hour');
let min = document.getElementById('min');
let sec = document.getElementById('sec');

function displaTime() {
    let date = new Date();

    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();

    let hRotation = 30*hh + mm/2;
    let mRotation = 6*mm;
    let sRotation = 6*ss;

    hr.style.transform = `rotate(${hRotation}deg)`;
    min.style.transform = `rotate(${mRotation}deg)`;
    sec.style.transform = `rotate(${sRotation}deg)`;
}

setInterval(displaTime, 1000);

// Banner 3

const boxImgBanner3 = document.querySelector('.stardust-carousel2__item-list__image')
const imgB3 = document.querySelectorAll('.stardust-carousel2__item-list__li')

let curenIndexB3 = 0
function runB3() {
    if (curenIndexB3 == imgB3.length - 1) {
        curenIndexB3 = 0

        boxImgBanner3.style.transform = `translateX(0px)`
        document.querySelector('.dostB3_active').classList.remove('dostB3_active')
        document.querySelector('.dostB3-' + curenIndexB3).classList.add('dostB3_active')
    } else {
        curenIndexB3++
        let width2 = imgB3[0].offsetWidth
        boxImgBanner3.style.transform = `translateX(${width2 * -1 * curenIndexB3}px)`
        document.querySelector('.dostB3_active').classList.remove('dostB3_active')
        document.querySelector('.dostB3-' + curenIndexB3).classList.add('dostB3_active')
    }
}

let tuDong3 = setInterval(runB3, 6000);

// // Nút Mũi Tên Bên Phải
let nextB3 = document.querySelector('.nextBanner3');
nextB3.addEventListener('click', () => {
    clearInterval(tuDong3)
    runB3()
    tuDong3 = setInterval(runB3, 6000);
})

// // Nút Mũi Tên Bên Trái
let backB3 = document.querySelector('.backBanner3');
backB3.addEventListener('click', () => {
    clearInterval(tuDong3)

    if (curenIndexB3 == 0) {
        curenIndexB3 = imgB3.length - 1
        let width2 = imgB3[0].offsetWidth
        boxImgBanner3.style.transform = `translateX(${width2 * -1 * curenIndexB3}px)`
        document.querySelector('.dostB3_active').classList.remove('dostB3_active')
        document.querySelector('.dostB3-' + curenIndexB3).classList.add('dostB3_active')
    } else {
        curenIndexB3--
        let width2 = imgB3[0].offsetWidth
        boxImgBanner3.style.transform = `translateX(${width2 * -1 * curenIndexB3}px)`
        document.querySelector('.dostB3_active').classList.remove('dostB3_active')
        document.querySelector('.dostB3-' + curenIndexB3).classList.add('dostB3_active')
    }
    tuDong3 = setInterval(runB3, 6000);
})

// // Nút item 
let dostB3 = document.querySelectorAll('.dostB3');

dostB3.forEach(function (item, index) {
    item.addEventListener('click', function () {
        clearInterval(tuDong3);
        index = Array.from(dostB3).indexOf(this);
        let width2 = imgB3[0].offsetWidth;
        boxImgBanner3.style.transform = `translateX(${width2 * -1 * index}px)`;
        document.querySelector('.dostB3_active').classList.remove('dostB3_active');
        this.classList.add('dostB3_active');
        tuDong3 = setInterval(runB3, 6000);
    });
});


const carouselPreIcon = document.querySelector('#carousel-arrow--prev__icon');
const carouselNextIcon = document.querySelector('#carousel-arrow--next__icon');
const ulTransformProductSale = document.querySelector('#oclock__Flashsale_timeSlider_ul');

// Định nghĩa biến để theo dõi vị trí trượt hiện tại
let currentPosition = 0;

// Định nghĩa giới hạn trái và phải của slider
const minPosition = 0;
const maxPosition = -2168; // Thay totalProducts bằng số sản phẩm thực tế

// Cập nhật trạng thái ban đầu của nút prev/next
updateButtonStatus();

// Khi bấm nút 'carouselPreIcon'
carouselPreIcon.addEventListener('click', () => {
    currentPosition += 1084; // Tăng giá trị của currentPosition khi bấm nút 'carouselPreIcon'
    updateButtonStatus();
    ulTransformProductSale.style.transform = `translate(${currentPosition}px, 0px)`;
});

// Khi bấm nút 'carouselNextIcon'
carouselNextIcon.addEventListener('click', () => {
    currentPosition -= 1084; // Giảm giá trị của currentPosition khi bấm nút 'carouselNextIcon'
    updateButtonStatus();
    ulTransformProductSale.style.transform = `translate(${currentPosition}px, 0px)`;
});

// Hàm kiểm tra và cập nhật trạng thái nút prev/next
function updateButtonStatus() {
    if (currentPosition >= minPosition) {
        // Đã đến giới hạn trái, ẩn nút 'carouselPreIcon'
        carouselPreIcon.style.display = 'none';
        currentPosition = minPosition;
    } else {
        carouselPreIcon.style.display = 'block';
    }

    if (currentPosition <= maxPosition) {
        // Đã đến giới hạn phải, ẩn nút 'carouselNextIcon'
        carouselNextIcon.style.display = 'none';
        currentPosition = maxPosition;
    } else {
        carouselNextIcon.style.display = 'block';
    }
}

const preControlS = document.querySelector('#preControl');
const neControlS = document.querySelector('#neControl');
const ulTransForm = document.querySelector('#ulControl');

neControlS.addEventListener('click', () => {
    neControlS.style.display = 'none';
    preControlS.style.display = 'block';
    ulTransForm.classList.add('ulTransform');
});

preControlS.addEventListener('click', () => {
    preControlS.style.display = 'none';
    neControlS.style.display = 'block';
    ulTransForm.classList.remove('ulTransform');
});