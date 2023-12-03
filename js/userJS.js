// const stickyLinks = document.querySelectorAll('.click_text_sticky');
// const addActiveLinks = document.querySelectorAll('.add_atc_cl');


// function handleStickyLinkClick(clickedLink) {
//     // addActiveLinks.forEach((link) => link.classList.remove('add-active'));
//     clickedLink.classList.remove('add-active');
//     localStorage.setItem('addActiveLink', clickedLink.getAttribute('data-target'));

//     stickyLinks.forEach((link) => link.classList.remove('sticky'));
//     clickedLink.classList.add('sticky');
//     localStorage.setItem('stickyLink', clickedLink.getAttribute('href'));
// }

// if (localStorage.getItem('stickyLink') !== null) {
//     const savedStickyLink = localStorage.getItem('stickyLink');
    

//     const selectedLink = document.querySelector(`.click_text_sticky[href="${savedStickyLink}"]`);
    
//     if (selectedLink) {
//         selectedLink.classList.add('sticky');
//     }
// }

// stickyLinks.forEach((link) => {
//     link.addEventListener('click', () => {
//         handleStickyLinkClick(link);
//     });
// });




// function handleAddActiveLinkClick(clickedLink) {

//     clickedLink.classList.remove('sticky');
//     localStorage.setItem('stickyLink', clickedLink.getAttribute('href'));
  
//     addActiveLinks.forEach((link) => link.classList.remove('add-active'));
//     clickedLink.classList.add('add-active');
    
//     localStorage.setItem('addActiveLink', clickedLink.getAttribute('data-target'));
// }


// addActiveLinks.forEach((link) => {
//     link.addEventListener('click', () => {
//         handleAddActiveLinkClick(link);
//     });
// });


// if (localStorage.getItem('addActiveLink') !== null) {
//     const savedAddActiveLink = localStorage.getItem('addActiveLink');

//     // Tìm thẻ a tương ứng và thêm class 'add-active'
//     const selectedAddActiveLink = document.querySelector(`.add_atc_cl[data-target="${savedAddActiveLink}"]`);

//     if (selectedAddActiveLink) {
//         selectedAddActiveLink.classList.add('add-active');
//     }
// }



// END PHẦN CLICK TÀI KHOẢN CỦA TÔI


// Click tab đơn mua

// const navItems = document.querySelectorAll('.nav-form li');
// const tabContents = document.querySelectorAll('.tab-content-item');

// let activeTabIndex = -1;
// navItems.forEach((item, index) => {
//   if (item.classList.contains('activeNav')) {
//     activeTabIndex = index;
//     return;
//   }
// });

// tabContents.forEach((tab, index) => {
//   if (index !== activeTabIndex) {
//     tab.style.display = 'none';
//   }
// });

// navItems.forEach((item, index) => {
//   item.addEventListener('click', () => {
//     tabContents.forEach(tab => {
//       tab.style.display = 'none';
//     });

//     tabContents[index].style.display = 'block';

//     navItems.forEach(navItem => {
//       navItem.classList.remove('activeNav');
//     });
//     item.classList.add('activeNav');
//   });
// });



// const anchorElements = document.querySelectorAll('li.abill a');
// let selectedTab = localStorage.getItem('selectedTab');

// anchorElements.forEach(anchorElement => {
//   anchorElement.addEventListener('click', function(event) {
//     event.preventDefault();

//     const allLiElements = document.querySelectorAll('li.abill');
//     allLiElements.forEach(liElement => {
//       liElement.classList.remove('activeNav');
//     });

//     const parentLiElement = this.parentElement;
//     parentLiElement.classList.add('activeNav');
//     selectedTab = this.getAttribute('href');
//     localStorage.setItem('selectedTab', selectedTab);

//     // Chuyển đổi trang sau khi cập nhật lớp 'activeNav'
//     window.location.href = selectedTab;
//   });

//   // Nếu tab được lưu trong local storage, thêm lớp 'activeNav'
//   if (selectedTab && anchorElement.getAttribute('href') === selectedTab) {
//     const parentLiElement = anchorElement.parentElement;
//     parentLiElement.classList.add('activeNav');
//   }
// });

// // Mặc định, thêm lớp 'activeNav' cho tab đầu tiên
// if (!selectedTab) {
//   anchorElements[0].click();
// }



// // phần click khi chuyển tab menu

document.addEventListener("DOMContentLoaded", function () {
  const urlImageLoad = document.querySelector(".url-image-load__imagechill");
  const upFileInput = document.querySelector(".upFile");
  // const file=upFileInput.files[0];

  // Khi input file thay đổi
  if(upFileInput) {
    upFileInput.addEventListener("change", function () {
        urlImageLoad.src = URL.createObjectURL(upFileInput.files[0]);
        console.log(urlImageLoad.src);
  
    });
  }
});


const urlImageLoad = document.querySelector(".url-image-load");
const upFileInput = document.querySelector(".upFile");
const subFileButton = document.querySelector(".subFile");
const divImg = document.querySelector(".div-img");

if(urlImageLoad && upFileInput && subFileButton && divImg) {
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

}


const accountLinks = document.querySelectorAll(".account-content-item a");
const boxes = document.querySelectorAll(".account-box > div");


accountLinks.forEach(link => {
  link.addEventListener("click", function(event) {
    // event.preventDefault();
    
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
if(boxes[0]) {
  boxes[0].style.display = "block";

}




var icon1 = document.querySelectorAll('.fa-eye');
var icon2 = document.querySelectorAll('.fa-eye-slash');
var inputs = document.querySelectorAll('.pDzPRp');

if(icon1[0] && icon2[0] && inputs[0] && icon1[1] && icon2[1] && inputs[1] && icon1[2] && icon2[2] && inputs[2]) {
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
  icon1[2].addEventListener('click', () => {
      icon1[2].style.display = 'none';
      inputs[2].setAttribute('type', 'text');
      icon2[2].style.display = 'block';
  });

  icon2[2].addEventListener('click', () => {
      icon2[2].style.display = 'none';
      inputs[2].setAttribute('type', 'password');
      icon1[2].style.display = 'block';
  });
}


// const anomationBox = document.querySelector('.anomation');
// const nomationBox = document.querySelector('.nomation-box');
// var accountContent = document.querySelector(".account-content");

// anomationBox.addEventListener('click', (e) => {
//   // e.preventDefault();
//   nomationBox.style.display = 'block';

//   accountContent.style.display = "none";
//   singleBox.style.display = 'none';
//   accountBox.style.display = 'none';
  
//   const stickySpans = document.querySelectorAll('.menu-item a.sticky');

//   stickySpans.forEach(span => {
//     span.classList.remove('sticky');
//   });
  
//   anomationBox.classList.add('sticky');
// })