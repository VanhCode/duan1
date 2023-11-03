const addCl = document.querySelectorAll('.add_atc_cl');
const acContentf = document.querySelector('.account-content');

// Mặc định thẻ đầu tiên có class "add-active"
addCl[0].classList.add('add-active');

addCl.forEach(aCount => {
  aCount.addEventListener('click', function(event) {
    // Ngăn chặn hành vi mặc định của thẻ <a>
    event.preventDefault();

    // Loại bỏ lớp "add-active" từ tất cả các thẻ <a> có class "add_atc_cl"
    addCl.forEach(otherLink => {
      otherLink.classList.remove('add-active');
    });

    // Thêm lớp "add-active" cho thẻ <a> hiện tại
    aCount.classList.add('add-active');

    // Lấy đường dẫn URL từ thẻ <a> hiện tại
    const url = aCount.getAttribute('href');

    // Hiển thị thẻ <div> có class "account-content"
    acContentf.style.display = 'block';

    // Lưu đường dẫn URL vào local storage
    localStorage.setItem('stickyLink', url);

    // Lưu trạng thái "display" vào local storage
    localStorage.setItem('accountContentDisplayState', 'block');

    // Gửi yêu cầu chuyển hướng đến URL
    window.location.href = url;
  });
});



const clickableLinks = document.querySelectorAll("a.click_text_sticky");

// Kiểm tra lưu trữ local storage để xem thẻ nào đã được chọn trước đó
const storedStickyLink = localStorage.getItem("stickyLink");

// Nếu có một thẻ đã được chọn trước đó, thêm lớp "sticky" cho nó
if (storedStickyLink) {
  const initialStickyLink = document.querySelector(`a[href="${storedStickyLink}"]`);
  if (initialStickyLink) {
    initialStickyLink.classList.add("sticky");
  }
}

clickableLinks.forEach((link, index) => {
  link.addEventListener("click", (event) => {
    event.preventDefault();


    // Kiểm tra xem thẻ hiện tại có phải là thẻ thứ 2 không
    if (index !== 1) {
      // Loại bỏ lớp "sticky" từ tất cả các thẻ có class "click_text_sticky"
      clickableLinks.forEach((otherLink) => {
        otherLink.classList.remove("sticky");
      });

      // Thêm lớp "sticky" cho thẻ hiện tại
      link.classList.add("sticky");

      // Lấy đường dẫn URL từ thẻ hiện tại
      const url = link.getAttribute("href");

      // Lưu đường dẫn URL vào local storage
      localStorage.setItem("stickyLink", url);

      // Gửi yêu cầu chuyển hướng đến URL
      window.location.href = url;
    }
  });
});


// const clickableLinks = document.querySelectorAll("a.click_text_sticky");
const accountContent = document.querySelector(".account-content");

// Kiểm tra lưu trữ local storage để xem trạng thái "display" của div đã được lưu trước đó
const storedDisplayState = localStorage.getItem("accountContentDisplayState");

// Khôi phục trạng thái "display" của div nếu nó đã được lưu trước đó
if (storedDisplayState === "block") {
  accountContent.style.display = "block";
}

clickableLinks.forEach((link, index) => {
  link.addEventListener("click", (event) => {
    event.preventDefault();

    // Loại bỏ lớp "sticky" từ tất cả các thẻ có class "click_text_sticky"
    clickableLinks.forEach((otherLink) => {
      otherLink.classList.remove("sticky");
    });

    // Thêm lớp "sticky" cho thẻ hiện tại
    link.classList.add("sticky");

    // Lấy đường dẫn URL từ thẻ hiện tại
    const url = link.getAttribute("href");

    // Lưu đường dẫn URL vào local storage
    localStorage.setItem("stickyLink", url);

    // Kiểm tra xem thẻ hiện tại có phải là thẻ thứ 2 không
    if (index === 1) {
      accountContent.style.display = "block";
      // Lưu trạng thái "display" vào local storage
      localStorage.setItem("accountContentDisplayState", "block");
    } else {
      accountContent.style.display = "none";
      // Lưu trạng thái "display" vào local storage
      localStorage.setItem("accountContentDisplayState", "none");
    }

    // Gửi yêu cầu chuyển hướng đến URL
    window.location.href = url;
  });
});









// const clickableLinks = document.querySelectorAll("a.click_text_sticky");
// const accountContent = document.querySelector(".account-content");

// // Kiểm tra lưu trữ local storage để xem trạng thái "display" của div đã được lưu trước đó
// const storedDisplayState = localStorage.getItem("accountContentDisplayState");

// // Khôi phục trạng thái "display" của div nếu nó đã được lưu trước đó
// if (storedDisplayState === "block") {
//   accountContent.style.display = "block";
// }

// clickableLinks.forEach((link, index) => {
//   link.addEventListener("click", (event) => {
//     event.preventDefault();

//     // Loại bỏ lớp "sticky" từ tất cả các thẻ có class "click_text_sticky"
//     clickableLinks.forEach((otherLink) => {
//       otherLink.classList.remove("sticky");
//     });

//     // Thêm lớp "sticky" cho thẻ hiện tại
//     link.classList.add("sticky");

//     // Lấy đường dẫn URL từ thẻ hiện tại
//     const url = link.getAttribute("href");

//     // Lưu đường dẫn URL vào local storage
//     localStorage.setItem("stickyLink", url);

//     // Kiểm tra xem thẻ hiện tại có phải là thẻ thứ 2 không
//     if (index === 1) {
//       accountContent.style.display = "block";
//       // Lưu trạng thái "display" vào local storage
//       localStorage.setItem("accountContentDisplayState", "block");
//     } else {
//       accountContent.style.display = "none";
//       // Lưu trạng thái "display" vào local storage
//       localStorage.setItem("accountContentDisplayState", "none");
//     }

//     // Gửi yêu cầu chuyển hướng đến URL
//     window.location.href = url;
//   });
// });











// Phần ngăn chặn sự kiện load lại khi click vào thẻ a

// const accountLink = document.querySelector('#aacount');
// const singleBox = document.querySelector('.single-box');
// const accountBox = document.querySelector('.account-box');

// accountLink.addEventListener("click", (e) => {
//   // e.preventDefault();
//   var accountContent = document.querySelector(".account-content");
//   accountContent.style.display = "block";

//   singleBox.style.display = 'none';

//   accountBox.style.display = 'block';

//   const stickySpans = document.querySelectorAll('.menu-item a.sticky');

//   stickySpans.forEach(span => {
//     span.classList.remove('sticky');
//   });

// });


// PHẦN NÀY LÀ PHẦN KHI CLICK VÀO PHẦN TÀI KHOẢN CỦA TÔI

// const accountLink = document.querySelector('#aacount');
// const clickableLinkss = document.querySelectorAll('a.click_text_sticky');


// accountLink.addEventListener('click', function (event) {
//   event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

//   // Lấy đường dẫn URL từ thẻ hiện tại
//   const url = accountLink.getAttribute('href');

//   // Lấy trạng thái "sticky" hiện tại từ Local Storage
//   const currentStickyLink = localStorage.getItem("stickyLink");

//   // Nếu trạng thái "sticky" có sẵn, loại bỏ nó bằng cách xóa nó khỏi Local Storage
//   if (currentStickyLink) {
//     localStorage.removeItem("stickyLink");

//     // Loại bỏ lớp "sticky" từ tất cả các thẻ có class "click_text_sticky"
//     clickableLinkss.forEach((link) => {
//       link.classList.remove('sticky');
//     });
//   }

//   // Gửi yêu cầu chuyển hướng đến URL
//   window.location.href = url;
// });




// // Lấy ra tất cả các thẻ a
// const links = document.querySelectorAll('.add_atc_cl');

// // Đặt lựa chọn mặc định cho thẻ đầu tiên
// if (localStorage.getItem('activeLink') === null) {
//     links[0].classList.add('add-active');
//     localStorage.setItem('activeLink', 0);
// } else {
//     const activeIndex = parseInt(localStorage.getItem('activeLink'));
//     links[activeIndex].classList.add('add-active');
// }

// // Thêm sự kiện click cho mỗi thẻ a
// links.forEach((link, index) => {
//     link.addEventListener('click', () => {
//         // Loại bỏ lớp 'add-active' từ tất cả các thẻ a
//         links.forEach((el) => el.classList.remove('add-active'));

//         // Thêm lớp 'add-active' cho thẻ a được click
//         link.classList.add('add-active');

        
//         // Lưu trạng thái của thẻ a được click vào Local Storage
//         localStorage.setItem('activeLink', index);
//     });
// });
