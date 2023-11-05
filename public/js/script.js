const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
		
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
});
// sidebar.addEventListener('mouseenter', function () {
// 	sidebar.classList.remove('hide');
// });
// sidebar.addEventListener('mouseleave', function () {
// 	sidebar.classList.add('hide');
// });




const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})


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

boxDiv.forEach(function(box, index) {
	var deleteButton = box.querySelector('.lb_lg');
	deleteButton.addEventListener('click', function() {
		oldImage.splice(index, 1);
		oldImageElement.value = oldImage.join(',');
		// console.log(oldImage);
		this.parentElement.remove();
	});
});