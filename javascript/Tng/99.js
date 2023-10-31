const BTN_API = document.querySelector('#btn-api');
const BTN_CLOSE = document.querySelector('#btn-close');

BTN_API.addEventListener('click', my_fetch);
BTN_CLOSE.addEventListener('click', my_close);

function my_fetch() {
	const INPUT_URL = document.querySelector('#input-url');
	fetch(INPUT_URL.value.trim())
	.then(response => response.json()) // 화살표 함수라서 리턴 생략 리턴 값은 data로 들어감 // 제이슨을 통해 response값을 배열로 만들어줌
	.then(data => makeImg(data)) // data에 MY_URL의 값이 들어있고 makeImg함수를 불러옴
	.catch(error => console.log(error))
}

function makeImg(data) {
	data.forEach( item => {
		const NEW_DIV = document.createElement('div');
		const NEW_ID = document.createElement('H1');
		const NEW_IMG = document.createElement('img');
		const DIV_IMG = document.querySelector('#div-img');

		NEW_DIV.style.backgroundColor = '#888888';
		
		NEW_ID.innerHTML=item.id;
		// NEW_ID.style.textAlign = 'center';
		
		NEW_IMG.setAttribute('src',item.download_url);
		NEW_IMG.style.width = '95%';
		// NEW_IMG.style.height = '95%';
		// NEW_IMG.style.padding = '30px'
		DIV_IMG.appendChild(NEW_DIV);
		NEW_DIV.appendChild(NEW_ID);
		NEW_DIV.appendChild(NEW_IMG);
	});
}

function my_close() {
	const DIV_IMG = document.querySelector('#div-img');
	DIV_IMG.replaceChildren();
}

// https://picsum.photos/v2/list?page=2&limit=5