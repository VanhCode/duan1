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

function listClickImage () {
    var prevBoxImg = document.querySelector('#back__onmouseo')
    var nextBoxImg = document.querySelector('#next__onmouseo')
    var transformBox = document.querySelector('.flex-column__chil_img_transform')

    var curenIndex = 0


    nextBoxImg.addEventListener('click', function() {
        if (curenIndex > -180) {
            curenIndex -= 90;
            transformBox.style.transform = `translate(${curenIndex}px, 0px)`;
        }
    })

    prevBoxImg.addEventListener('click', function() {
        if (curenIndex !== 0) {
            curenIndex += 90;
            transformBox.style.transform = `translate(${curenIndex}px, 0px)`;
        }
    })
}


function ProductAnimation () {
    var buttonsColorS = document.querySelectorAll('.color_tee_product');

    function handleButtonClickColor(event) {
        event.preventDefault();

        var hasClassColor = event.target.classList.contains('selected__button');

        buttonsColorS.forEach(function(button) {
            button.classList.remove('selected__button');
        });

        if (!hasClassColor) {
            event.target.classList.add('selected__button');
        }
    }

    buttonsColorS.forEach(function(button) {
        button.addEventListener('click', handleButtonClickColor);
    });


    var buttonsSizeS = document.querySelectorAll('.size_tee_product');

    function handleButtonClickSize(event) {
        event.preventDefault();

        var hasClassSize = event.target.classList.contains('selected__button');

        buttonsSizeS.forEach(function(button) {
            button.classList.remove('selected__button');
        });

        if (!hasClassSize) {
            event.target.classList.add('selected__button');
        }
    }

    buttonsSizeS.forEach(function(button) {
        button.addEventListener('click', handleButtonClickSize);
    });
}

listOmouover();
listClickImage();
ProductAnimation();

document.getElementById("addTocart").addEventListener("click", function (event) {
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

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}


var message = getParameterByName('message');

if (message) {
    var boxAnimationSuccess = document.querySelector('.boxAnimationSuccess');
    boxAnimationSuccess.style.display = 'block';

    setTimeout(function() {
        boxAnimationSuccess.style.display = 'none';
    }, 3000);
}

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
