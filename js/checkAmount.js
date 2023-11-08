function remote(move) {
    var amountFlex = document.querySelector('.amount__flex')
    var errAmount = document.querySelector('#errAmount')
    var min = parseInt(amountFlex.getAttribute('min'))
    var max = parseInt(amountFlex.getAttribute('max'))
    let input = document.querySelector('.amount__flex');

    
    if (move === "+" && input.value < max) {
        if(input.value == "") {
            errAmount.innerHTML = "Vui lòng nhập số lượng"
        } else {
            input.value++
            errAmount.innerHTML = ""
        }
    } else if (move !== "-") {
        errAmount.innerHTML = "Số lượng không được vượt quá " + max
        amountFlex.value = max
    }

    if (move === "-" && input.value > 1) {
        input.value--;
        errAmount.innerHTML = ""
    }

}

var amountFlex = document.querySelector('.amount__flex')
var errAmount = document.querySelector('#errAmount')
var max = parseInt(amountFlex.getAttribute('max'))


amountFlex.addEventListener('input', function() {
    max = parseInt(amountFlex.getAttribute('max'))
    const inputValue = parseInt(amountFlex.value);

    if (inputValue > max) {
        errAmount.innerHTML = 'Số lượng không được vượt quá ' + max;
        inputNumber.value = max;
    } else {
        errAmount.innerHTML = '';
    }
});