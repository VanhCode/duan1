const menuLinks = document.querySelectorAll('.menu-item a');

menuLinks.forEach(link => {
  link.addEventListener('click', function (event) {
    event.preventDefault();
  });
});



// Phần ngăn chặn sự kiện load lại khi click vào thẻ a

const accountLink = document.querySelector('#aacount');
const singleBox = document.querySelector('.single-box');
const accountBox = document.querySelector('.account-box');

accountLink.addEventListener("click", (e) => {
  e.preventDefault();
  var accountContent = document.querySelector(".account-content");
  accountContent.style.display = "block";

  singleBox.style.display = 'none';

  accountBox.style.display = 'block';

  const stickySpans = document.querySelectorAll('.menu-item a.sticky');

  stickySpans.forEach(span => {
    span.classList.remove('sticky');
  });

});

// Click tab đơn mua

const navItems = document.querySelectorAll('.nav-form li');
const tabContents = document.querySelectorAll('.tab-content-item');

let activeTabIndex = -1;
navItems.forEach((item, index) => {
  if (item.classList.contains('activeNav')) {
    activeTabIndex = index;
    return;
  }
});

tabContents.forEach((tab, index) => {
  if (index !== activeTabIndex) {
    tab.style.display = 'none';
  }
});

navItems.forEach((item, index) => {
  item.addEventListener('click', () => {
    tabContents.forEach(tab => {
      tab.style.display = 'none';
    });

    tabContents[index].style.display = 'block';

    navItems.forEach(navItem => {
      navItem.classList.remove('activeNav');
    });
    item.classList.add('activeNav');
  });
});

// phần click khi chuyển tab menu

const clickTop = document.querySelector('.single-text');
const singleID = document.querySelector('#singleID');

singleID.addEventListener("click", (e) => {
  e.preventDefault();
  var accountContent = document.querySelector(".account-content");

  accountContent.style.display = "none";

  singleBox.style.display = 'block';

  accountBox.style.display = 'none';

  const stickySpans = document.querySelectorAll('.menu-item a.sticky');

  stickySpans.forEach(span => {
    span.classList.remove('sticky');
  });

  clickTop.classList.add('sticky');
});


document.addEventListener("DOMContentLoaded", function () {
  const urlImageLoad = document.querySelector(".url-image-load");
  const upFileInput = document.querySelector(".upFile");
  const subFileButton = document.querySelector(".subFile");
  const divImg = document.querySelector(".div-img");

  urlImageLoad.addEventListener("click", function () {
    upFileInput.click();
  });

  upFileInput.addEventListener("change", function () {
    if (upFileInput.files && upFileInput.files[0]) {
      const reader = new FileReader();

      reader.onload = function (e) {
        urlImageLoad.style.backgroundImage = `url(${e.target.result})`;
      };

      reader.readAsDataURL(upFileInput.files[0]);
    }
  });


  subFileButton.addEventListener("click", function () {
    upFileInput.click();
  });


  divImg.addEventListener("click", function (event) {
    const target = event.target;
    if (target.classList.contains("div-img")) {
      upFileInput.click();
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const urlImageLoad = document.querySelector(".url-image-load");
  const upFileInput = document.querySelector(".upFile");

  // Khi input file thay đổi
  upFileInput.addEventListener("change", function () {
    if (upFileInput.files && upFileInput.files[0]) {
      const reader = new FileReader();

      reader.onload = function (e) {
        urlImageLoad.style.backgroundImage = `url(${e.target.result})`;
      };

      reader.readAsDataURL(upFileInput.files[0]);
    }
  });
});

document.addEventListener("DOMContentLoaded", function() {
  const accountLinks = document.querySelectorAll(".account-content-item a");
  const boxes = document.querySelectorAll(".account-box > div");

  accountLinks.forEach(link => {
    link.addEventListener("click", function(event) {
      event.preventDefault();
      
      const target = this.getAttribute("data-target");

      accountLinks.forEach(link => {
        link.classList.remove("add-active");
      });

      this.classList.add("add-active");

      boxes.forEach(box => {
        if (box.classList.contains(target)) {
          box.style.display = "block";
        } else {
          box.style.display = "none";
        }
      });
    });
  });

  // Hiển thị box đầu tiên khi trang tải xong
  boxes[0].style.display = "block";
});

var icon1 = document.querySelectorAll('.fa-eye');
var icon2 = document.querySelectorAll('.fa-eye-slash');
var inputs = document.querySelectorAll('.pDzPRp');

icon1[0].addEventListener('click', () => {
    icon1[0].style.display = 'none';
    inputs[0].setAttribute('type', 'text');
    icon2[0].style.display = 'block';
});

icon2[0].addEventListener('click', () => {
    icon2[0].style.display = 'none';
    inputs[0].setAttribute('type', 'password');
    icon1[0].style.display = 'block';
});

icon1[1].addEventListener('click', () => {
    icon1[1].style.display = 'none';
    inputs[1].setAttribute('type', 'text');
    icon2[1].style.display = 'block';
});

icon2[1].addEventListener('click', () => {
    icon2[1].style.display = 'none';
    inputs[1].setAttribute('type', 'password');
    icon1[1].style.display = 'block';
});


const anomationBox = document.querySelector('.anomation');
const nomationBox = document.querySelector('.nomation-box');
var accountContent = document.querySelector(".account-content");

anomationBox.addEventListener('click', (e) => {
  e.preventDefault();
  nomationBox.style.display = 'block';

  accountContent.style.display = "none";
  singleBox.style.display = 'none';
  accountBox.style.display = 'none';
  
  const stickySpans = document.querySelectorAll('.menu-item a.sticky');

  stickySpans.forEach(span => {
    span.classList.remove('sticky');
  });
  
  anomationBox.classList.add('sticky');
})
