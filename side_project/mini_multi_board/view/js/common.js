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
	fetch(URL)
	.then( response => response.json() )
	.then( data => {
		// api가 아닌 방법
		// const PK = document.querySelector('#modalPk');
		// const TITLE = document.querySelector('#b_title');
		// const CREATED_AT = document.querySelector('#created_at');
		// const UPDATED_AT = document.querySelector('#updated_at');
		// const CONTENT = document.querySelector('#b_content');
		// const IMG = document.querySelector('#b_img');

		// TITLE.innerHTML = data.data.b_titel;
		// CREATED_AT.innerHTML = data.data.created_at;
		// UPDATED_AT.innerHTML = data.data.updated_at;
		// CONTENT.innerHTML = data.data.b_content;
		// USER_PK.setAttribute('id', data.data.u_pk);
		// IMG.setAttribute('src', data.data.b_img);
		// PK.setAttribute('href', "delete?id="+data.data.id+"&b_type="+data.data.b_type);

		// if(data.deleteFlg === 1) {
		// 	PK.style.display = 'block';
		// } else {
		// 	PK.style.display = 'none';
		// }
		// 모달 오픈
		// openModel()

		const TITLE = document.querySelector('#b_title');
		const CREATED_AT = document.querySelector('#created_at');
		const UPDATED_AT = document.querySelector('#updated_at');
		const CONTENT = document.querySelector('#b_content');
		const IMG = document.querySelector('#b_img');
		const DEL_INPUT = document.querySelector('#del_id');
		const BTN_DEL = document.querySelector('#btn_del');

		TITLE.innerHTML = data.data.b_titel;
		CREATED_AT.innerHTML = data.data.created_at;
		UPDATED_AT.innerHTML = data.data.updated_at;
		CONTENT.innerHTML = data.data.b_content;;
		DEL_INPUT.value = data.data.id;
		IMG.setAttribute('src', data.data.b_img);

		// console.log(data);
		// if(data.data.uFlg === 1) {
		// 	PK.style.display = 'block';
		// } else {
		// 	PK.style.display = 'none';
		// }

		// 삭제 버튼 
		if(data.data.uFlg === "1") {
			BTN_DEL.classList.remove('d-none');
		} else {
			BTN_DEL.classList.add('d-none');
		}

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

// function idCheckFunc(u_id) {
// 	const URL = '/board/regist?u_id='+u_id; 
// 	// fetch(URL)
// 	// .then( response => response.json() )
// 	// .then()
// 	// .catch( error => console.log(error) )
// }    

function idChk() {
	const ID_CHK_MSG = document.querySelector('#idChkMsg');
	ID_CHK_MSG.innerHTML = '';

    const U_ID = document.querySelector('#u_id');
    const URL = '/user/idchk';
	const formData = new FormData();
	formData.append("u_id", U_ID.value);

	const HEADER = {	
		method: "POST"
		,body: formData
	};
	
    fetch(URL, HEADER)
	.then( response => response.json() )
	.then( data => {
		if(data.errflg === "0") {
			ID_CHK_MSG.innerHTML = '사용 가능한 아이디입니다.'
			ID_CHK_MSG.classList = 'text-success';
		} else {
			ID_CHK_MSG.innerHTML = '사용 불가능한 아이디입니다.'
			ID_CHK_MSG.classList = 'text-danger';
		}
		// let msg = arr.data.cnt === 0 ? '가능' : '불가능';
		// window.alert(msg);
	})
	.catch( error => console.log(error) )
}

// api를 통한 삭제 처리
function deleteCard() {
	const B_PK = document.querySelector('#del_id').value;
	const URL = '/board/remove?id=' + B_PK;

	fetch(URL)
	.then( response => response.json() )
	.then( data => {
		if(data.errflg === "0") {
			// 삭제 후 모달 닫기
			closeDetailModal();

			// 카드 삭제
			const MAIN = document.querySelector('main');
			const CARD_NAME = '#card' + data.id;
			const DEL_CARD = document.querySelector(CARD_NAME);
			MAIN.removeChild(DEL_CARD);
		} else {
			alert(data.msg);
		}
	})
	.catch( error => console.log(error) )
}
