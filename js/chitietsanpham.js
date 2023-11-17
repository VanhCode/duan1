function sendAddtocart() {
    var colors = document.querySelectorAll('.colorProduct');
    var sizes = document.querySelectorAll('.size');
    var err = document.querySelector('#errAmount');

    let count = 0;

    for(var i = 0; i < colors.length; i++) {
        for(var j = 0; j < sizes.length; j++) {
            if(colors[i].checked == "" || sizes[j].checked == "") {
                err.innerHTML = "Vui lòng chọn phân loại";
                count++;
            } else {
                err.innerHTML = "";
                return true;
            }
        }
    }

    if(count > 0) {
        return false;
    }
    
}


var colorS = document.querySelectorAll(".color_tee_product")
var boxSizeS = document.querySelectorAll('.sizetesst')
var sizeTee = document.querySelectorAll('.size_tee_product')
var valueAmount = document.querySelector('#value__amount')
var amountFlex = document.querySelector('.amount__flex')


sizeTee.forEach(function(sizeTeeChildrent) {
    sizeTeeChildrent.onclick = function() {
        // console.log(sizeTeeChildrent.querySelector('.amount__boxSize').value)
        valueAmount.innerHTML = sizeTeeChildrent.querySelector('.amount__boxSize').value
        amountFlex.setAttribute('max', sizeTeeChildrent.querySelector('.amount__boxSize').value)
    }
})

boxSizeS[0].style.display='flex';
colorS.forEach(function (sizeChil, index) {
    // Kiểm tra xem boxSizeS[index] tồn tại
    if (boxSizeS[index]) {
        sizeChil.addEventListener('click', function () {
            // Ẩn tất cả các phần tử trong boxSizeS
            boxSizeS.forEach(function (sizeIndex) {
                sizeIndex.style.display = "none";
            });
            // Hiển thị phần tử tương ứng với index được click
            boxSizeS[index].style.display = "flex";
        });
    } else {
        console.error("boxSizeS[" + index + "] không tồn tại.");
    }
});





listOmouover();
listClickImage();
ProductAnimation();

function listOmouover () {
    var list = document.querySelectorAll(".list-img");
    var mainImg = document.querySelector("#onmouseoverImg");

    for (var i = 0; i < list.length; i++) {
        list[i].addEventListener("mouseover", function() {
            list.forEach(function(img) {
                img.classList.remove('img__onmouseo-border');
            });
            
            this.classList.add('img__onmouseo-border');
            
            mainImg.src = this.src;
        });
    }
}


amountFlex.addEventListener('input', function() {

    const inputValue = parseInt(amountFlex.value);
    
    if (inputValue > max) {
        errAmount.innerHTML = 'Số lượng không được vượt quá ' + max;
        amountFlex.value = max;
    } else {
        errAmount.innerHTML = '';
    }
});

function listClickImage () {
    var prevBoxImg = document.querySelector('#back__onmouseo')
    var nextBoxImg = document.querySelector('#next__onmouseo')
    var transformBox = document.querySelector('.flex-column__chil_img_transform')

    var curenIndex = 0
    

    nextBoxImg.addEventListener('click', function() {
        if (curenIndex > -180) {
            curenIndex -= 93;
            transformBox.style.transform = `translate(${curenIndex}px, 0px)`;
        }
    })

    prevBoxImg.addEventListener('click', function() {
        if (curenIndex !== 0) {
            curenIndex += 93;
            transformBox.style.transform = `translate(${curenIndex}px, 0px)`;
        }
    })
}


function ProductAnimation () {
    
    var checkboxcolor = document.querySelectorAll('.color');
    checkboxcolor.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            // Lấy tất cả các thẻ buttonsSizeS
            var buttonsColors = document.querySelectorAll('.color_tee_product');
            
            // Lấy tất cả các checkbox
            var allCheckboxes = document.querySelectorAll('.color');

            // Duyệt qua tất cả checkbox
            allCheckboxes.forEach(function(checkbox) {
                if (checkbox !== this) {
                    // Xóa lớp "selected__button" và trạng thái "checked" của checkbox khác
                    checkbox.parentElement.classList.remove('selected__button');
                    checkbox.checked = false;
                }
            }, checkbox);

            // Kiểm tra xem checkbox đã có class "selected__button" hay chưa
            if (checkbox.parentElement.classList.contains('selected__button')) {
                // Nếu đã có class "selected__button", xóa nó
                checkbox.parentElement.classList.remove('selected__button');
                // Loại bỏ trạng thái "checked" của checkbox
                checkbox.checked = false;
            } else {
                // Nếu chưa có class "selected__button", thêm nó
                checkbox.parentElement.classList.add('selected__button');
                // Đặt trạng thái "checked" của checkbox
                checkbox.checked = true;
            }
        });
    });


    // var buttonsColorS = document.querySelectorAll('.color_tee_product');

    // function handleButtonClickColor(event) {
    //     event.preventDefault();

    //     var hasClassColor = event.target.classList.contains('selected__button');

    //     buttonsColorS.forEach(function(button) {
    //         button.classList.remove('selected__button');
    //     });

    //     if (!hasClassColor) {
        //         event.target.classList.add('selected__button');
    //     }
    // }

    // buttonsColorS.forEach(function(button) {
    //     button.addEventListener('click', handleButtonClickColor);
    // });

    
    

    // var sizeS = document.querySelectorAll('.size');
    // sizeS.forEach(function(radio) {
    //     radio.addEventListener('click', function() {
    //         // Xóa lớp "selected__button" khỏi tất cả các thẻ buttonsSizeS trước
    //         var buttonsSizeS = document.querySelectorAll('.size_tee_product');
    //         buttonsSizeS.forEach(function(button) {
    //             button.classList.remove('selected__button');
    //         });

    //         // Thêm lớp "selected__button" cho thẻ đã được chọn
    //         radio.parentElement.classList.add('selected__button');
    //     });
    // });
    
    var checkboxes = document.querySelectorAll('.size');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            // Lấy tất cả các thẻ buttonsSizeS
            var buttonsSizeS = document.querySelectorAll('.size_tee_product');
            
            // Lấy tất cả các checkbox
            var allCheckboxes = document.querySelectorAll('.size');

            // Duyệt qua tất cả checkbox
            allCheckboxes.forEach(function(checkbox) {
                if (checkbox !== this) {
                    // Xóa lớp "selected__button" và trạng thái "checked" của checkbox khác
                    checkbox.parentElement.classList.remove('selected__button');
                    checkbox.checked = false;
                }
            }, checkbox);

            // Kiểm tra xem checkbox đã có class "selected__button" hay chưa
            if (checkbox.parentElement.classList.contains('selected__button')) {
                // Nếu đã có class "selected__button", xóa nó
                checkbox.parentElement.classList.remove('selected__button');
                // Loại bỏ trạng thái "checked" của checkbox
                checkbox.checked = false;
            } else {
                // Nếu chưa có class "selected__button", thêm nó
                checkbox.parentElement.classList.add('selected__button');
                // Đặt trạng thái "checked" của checkbox
                checkbox.checked = true;
            }
        });
    });




    
    // function handleButtonClickSize(event) {
    //     event.preventDefault();

    //     var hasClassSize = event.target.classList.contains('selected__button');
    
    //     buttonsSizeS.forEach(function(button) {
    //         button.classList.remove('selected__button');
    //     });

    //     if (!hasClassSize) {
    //         event.target.classList.add('selected__button');
    //     }
    // }

    // buttonsSizeS.forEach(function(button) {
    //     button.addEventListener('click', handleButtonClickSize);
    // });

    // var buttonsSizeS = document.querySelectorAll('.size_tee_product input[type="checkbox"]');
    // var sizeS = document.querySelectorAll('.size');

    // sizeS.forEach(function(radio) {
        //     radio.addEventListener('click', function() {
    //         console.log(radio.value);
    //     });
    // });
}
var cartCheck = document.getElementById("addTocart");

cartCheck.addEventListener("click", function (event) {
    var amount = document.getElementById("amount__flex").value;
    var errAmount = document.getElementById("errAmount");
    var boxAnimationSuccess = document.querySelector('.boxAnimationSuccess');

    // Kiểm tra số lượng
    if (amount < 1) {
        errAmount.textContent = "Vui lòng chọn phân loại";
        event.preventDefault();
    } else {
        errAmount.textContent = "";
        var boxAnimationSuccess = document.querySelector('.boxAnimationSuccess');
        boxAnimationSuccess.style.display = 'block';

        // setTimeout(function() {
            //     boxAnimationSuccess.style.display = 'none';
            // }, 3000);
    }
})






// var xhr = new XMLHttpRequest();
// xhr.open("POST", "../view/addProduct.php?id=<?= $result['id_spBanChay'] ?>", true);
// xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

// xhr.onreadystatechange = function () {
//     if (xhr.readyState === 4) {
//         if (xhr.status === 200) {
//             var response = xhr.responseText;
            
            

//         } else {
//             alert("Có lỗi xảy ra. Vui lòng thử lại sau.");
//         }
//     }
// };

// xhr.send("amount=" + amount);


// Box size and Color

var colorS = document.querySelectorAll(".color_tee_product")
var boxSizeS = document.querySelectorAll('.size_tee_product')

colorS.forEach(function(sizeChil, index) {
    boxSizeS[index].style.display = "none"
    sizeChil.addEventListener('click', function() {
        boxSizeS[index].style.display = "block"
    })
})

