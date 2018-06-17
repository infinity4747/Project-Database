//this is for search

var count = 1;

function searchBook() {
	if (count%3==1) {
		document.getElementById('search').style.display = "none";
		document.getElementById('login').style.display = "none";
		document.getElementById('look').style.display = "block";
		document.getElementById('look').value = "";
	}
	else if (count%3==0){
		document.getElementById('search').style.display = "inline-block";
		document.getElementById('login').style.display = "inline-block";
		document.getElementById('look').style.display = "none";
	}
	count++;
}

document.getElementById('look').addEventListener('click', searchBook);
document.getElementById('search').addEventListener('click', searchBook);

// this is for element page

var n = null;
var element = null;

function process2(responses) {
	let list = null;
	let array = responses;
	document.getElementById('list').style.display = "none";
	document.getElementById('element').style.display = "block";
	
	switch(element) {
		case "image1": n = 1; list = array['1']; break;
		case "image2": n = 2; list = array['2']; break;
		case "image3": n = 3; list = array['3']; break;
		case "image4": n = 4; list = array['4']; break;
		case "image5": n = 5; list = array['5']; break;
		case "image6": n = 6; list = array['6'];
	}
	
	console.log(list);
	
	if (category == "new_books") {
		document.getElementById('p_list').style.display = "none";
	}
	else {
		document.getElementById('p_list').style.display = "block";
		document.getElementById('p_list').textContent = categoryName;
		document.getElementById('p_element').textContent = list.name;
		document.getElementById('heading').textContent = list.name;
	}
	
	document.getElementById('current').src = "Images/Gallery/Element"+n+"/element1.jpg";
	for (i=1; i<7; i++) {
		document.getElementById(''+i).src = "Images/Gallery/Element"+n+"/book"+i+".jpg";
	}
	
	for(i=1; i<6; i++) {
		let rating1 = document.getElementById('rating1');
		let rating2 = document.getElementById('rating2');
		let div1 = document.createElement('div');
		let div2 = document.createElement('div');
		
		if (i == 1) {
			rating1.innerHTML = '';
			rating2.innerHTML = '';
		}
		
		if (i<=list.rating) {
			div1.setAttribute('class', 'fa fa-star checked');
			div2.setAttribute('class', 'fa fa-star checked');
		}
		else {
			div1.setAttribute('class', 'fa fa-star');
			div2.setAttribute('class', 'fa fa-star');
		}
		
		rating1.appendChild(div1);
		rating2.appendChild(div2);
	}
	
	document.getElementById('reference').textContent = list['reference'];
	document.getElementById('color2').style.background = list['color_1'];
	document.getElementById('color2').style.background = list['color_2'];
	
	if (list['sale']) {
		document.getElementById('price1').textContent = "$"+list['new_price'];
		document.getElementById('price2').textContent = "$"+list['old_price'];
		document.getElementById('sale_percent').textContent = list['sale_percent'];
		document.getElementById('reduced').style.display = 'block';
	}
	else {
		document.getElementById('price1').textContent = "$"+list['price'];
		document.getElementById('price2').style.display = 'none';
		document.getElementById('sale_percent').style.display = 'none';
		document.getElementById('reduced').style.display = 'none';
	}
	
	document.getElementById('date').textContent = list['date'];
}

function onSuccess2(response) {
	response.json().then(process2);
}

function click(event) {
	let image = event.currentTarget;
	element = image.id;
	fetch('http://demo1373984.mockable.io/element_page').then(onSuccess2, onFail);
}

document.getElementById('image1').addEventListener('click', click);
document.getElementById('image2').addEventListener('click', click);
document.getElementById('image3').addEventListener('click', click);
document.getElementById('image4').addEventListener('click', click);
document.getElementById('image5').addEventListener('click', click);
document.getElementById('image6').addEventListener('click', click);

// this is for gallery

function leftClick() {
	document.getElementById('right').style.display = "flex";
	document.getElementById('left').style.display = "none";
	document.getElementById('6').setAttribute('value', 'hidden');
	document.getElementById('1').setAttribute('value', 'visible');
}
function rightClick() {
	document.getElementById('right').style.display = "none";
	document.getElementById('left').style.display = "flex";
	document.getElementById('6').setAttribute('value', 'visible');
	document.getElementById('1').setAttribute('value', 'hidden');
}

function changeCurrent(id) {
	console.log("Images/Gallery/Element"+element+"/element"+id+".jpg");
	document.getElementById('current').src = "Images/Gallery/Element"+n+"/element"+id+".jpg";
}

function changeColor(n) {
	switch(n) {
		case 1: document.getElementById('first_color').setAttribute('selected', 'selected');
				document.getElementById('second_color').setAttribute('selected', 'none');
				break;
		case 2: document.getElementById('first_color').setAttribute('selected', 'none');
				document.getElementById('second_color').setAttribute('selected', 'selected');
				break;
	}
}