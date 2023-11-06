document.getElementById('imageInput').addEventListener('change', function (event) {
	const fileList = event.target.files;

	var removeImg = document.querySelectorAll('.remove_img');
	for(let i = 0; i < removeImg.length; i++) {
		removeImg[i].parentElement.remove()
	}
	
	for (let i = 0; i < fileList.length; i++) {
		const file = fileList[i];
		if (file.type.startsWith('image/')) {
			const imgElement = document.createElement('img');
			imgElement.src = URL.createObjectURL(file);
			imgElement.classList.add('remove_img')

			const imageContainer = document.createElement('div');
			imageContainer.appendChild(imgElement);

			document.querySelector('.product__images').appendChild(imageContainer);
		}
	}

});


var oldImageElement = document.querySelector('#oldImage');
var oldImage = oldImageElement.value.split(',');
var boxDiv = document.querySelectorAll('.ab_ic');

boxDiv.forEach(function(box) {
    var deleteButton = box.querySelector('.lb_lg');
    var indexToDelete = parseInt(box.getAttribute('data-index'));
    
    deleteButton.addEventListener('click', function() {
        oldImage.splice(indexToDelete, 1);
        oldImageElement.value = oldImage.join(',');
        this.parentElement.remove();
    });
});






