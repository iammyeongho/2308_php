// const BTNDETAIL = document.querySelector('#btnDetail');
// const BTN_MODAL_CLOSE =document.querySelector('#btnModalClose');

// BTNDETAIL.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.remove('displayNone');
// })

// BTN_MODAL_CLOSE.addEventListener('click', () => {
// 	const MODAL = document.querySelector('#modal');
// 	MODAL.classList.add('displayNone');
// })


// 상세 모달 제어
function openDetail(id) {
	const URL = '/board/detail?id='+id; 
	console.log(URL);
	fetch(URL)
	.then( response => response.json() )
	.then( data => {
		const TITLE = document.querySelector('#b_title');
		const CREATED_AT = document.querySelector('#created_at');
		const UPDATED_AT = document.querySelector('#updated_at');
		const CONTENT = document.querySelector('#b_content');
		const IMG = document.querySelector('#b_img');

		TITLE.innerHTML = data.data.b_titel;
		CREATED_AT.innerHTML = data.data.created_at;
		UPDATED_AT.innerHTML = data.data.updated_at;
		CONTENT.innerHTML = data.data.b_content;
		IMG.setAttribute('src', data.data.b_img);

		// 모달 오픈
		openModel()
	})
	.catch( error => console.log(error) )
}

function openModel() {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.add('show');
	MODAL.style = 'display: block; background-color: rgba(0,0,0,0.7);';
}

// 모달 닫기 함수
function closeDetailModal() {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.remove('show');
	MODAL.style = 'display: none;';
}