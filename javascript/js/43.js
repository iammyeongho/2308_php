// 1. HTTP (Hypertext Transfer Protocol) 란?
// 	어떻게 Hypertext를 주고 받을지 규약한 프로토콜로
// 	클라이언트가 서버에 데이터를 requset(요청)을 하고,
//  서버가 해당 requset에 따라 response(응답)을 클라이언트에 보내주는 방식입니다.
// 	Hypertext는 웹사이트에서 이용되는 하이퍼 링크나 리소스, 문서, 이미지 등을 모두 포함합니다.

// 2. AJAX ( Asynchronous JavaScript And XML ) 이란?
// 	웹페이지에서 비동기 방식으로 서버에게 데이터를 requset하고,
// 	서버의 response를 받아 동적으로 웹페이지를 갱신하는 프로그래밍 방식입니다.
//  즉, 웹 페이지 전체를 다시 로딩하지 않고도 일부분만을 갱신 할 수 있습니다.
// 	대표적으로 XMLHttpRequset 방식과 Fetch Api 방식이 있습니다.

// XML
// <xml>
// 		<data>
// 			<id>56</id>
// 			<name>홍길동</nmae>
// 		</data>
// <xml>

// 3. JSON ( JavaScript Object Notation ) 이란? 간단하게 말해서 문자열 : 규칙을 전해서 서버에 전달 (규칙 : 자바스크립트의 객체와 같다고해서 제이슨)
// 	JavaSctipt의 Object에 큰 영감을 받아 만들어진 서버 간의 HTTP 통신을 위한 텍스트 데이터 포맷입니다.
// 	장점은 다음과 같습니다.
// 	- 데이터를 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷
// 	- 가벼운 텍스트를 기반
//  - 가독성이 좋음
// 	- Key와 Value가 짝을 이루고 있음
// 	- 데이터를 서버와 주고 받을 때 직렬화 (Serialization)[*1 참조]하기 위해 사용
// 	- 프로그래밍 언어나 플랫폼에 상관없이 사용 가능

// 	JSON.stringify (obj) : Object를 JSON 포맷의 String으로 변환 (Serializing)해주는 메소드
// 	JSON.parse (json) : JSON 포맷의 String을 Object로 변환 (Deserializing)해주는 메소드
//  요즘은 api 또는 node.js 또는 제이쿼리 주로 사용

// json
// {
// 		data: {
// 			id: 56
// 			,name: '홍길동'
// 		}
// }

// 	4. API 예제 사이트
// 		https://picsum.photos/

// const MY_URL = "https://picsum.photos/v2/list?page=2&limit=5";
// 프라미스 객체를 실행하면, resolve, reject로 옴
// 아래 코드의 status : 200번대는 정상처리, 300번대 통신 정상, 서버에서 예외처리, 400번대 서버 통신 실패 시
// fetch(MY_URL)
// .then(response => console.log(response))
// .catch(error => console.log(error))

// body안에 있는 json 값을 자바스크립트 배열로 바꿔줌 
// 윌와 서버간의 규칙 api
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
		const NEW_IMG = document.createElement('img');
		const DIV_IMG = document.querySelector('#div-img');

		NEW_IMG.setAttribute('src',item.download_url);
		NEW_IMG.style.width = '200px';
		NEW_IMG.style.height = '200px';
		DIV_IMG.appendChild(NEW_IMG);
	});
}

function my_close() {
	const DIV_IMG = document.querySelector('#div-img');
	DIV_IMG.replaceChildren();
	// 강사님 코드 따오기
}

// 관호님 코드
// function del() { // ****************선생님과 오류 탐색******************231031
//  const OLD_IMG = document.querySelectorAll('#div-img > img');
//  // const OLD_IMG = document.getElementsbyTagName('img'); // 1. OLD_IMG => {0~4, entries, keys, values, forEach, length, item} 프로토타입까지 가져옴
//  // const OLD_IMG2 = document.getElementById('div-img');
//  for ( let item in OLD_IMG ) { // 2. for in으로 하면 entries, keys 등등을 지우려해서 오류.
//                                // 3. for of로 하면 하나를 지울 때마다 순서가 당겨져서 절반정도만 삭제.
//      OLD_IMG[item].remove();
//  }
//  // OLD_IMG2.remove();
// }


// fetch 2번째 아규먼트 세팅 방법
function infinityLopp() {
	let apiUrl = "http://192.168.0.82:6001/03_insert.php"
	let init = {
		method: "POST"
		,headers: {
			accept: "*"
		}
		,body: {
			title: "아아아아"
			,content: "오오오오"
			,em_id: "2"
		}
	};

	fetch(apiUrl, init)
	.then(response => console.log(response))
	.catch(error => console.log(error));
}