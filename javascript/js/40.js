// 콜백에 관해
// test를 콘솔에 출력하는 함수
function test() {
	console.log("test");
}

// 콜백 함수를 실행하는 함수
function cb(fnc) {
	fnc();
}
// 콘솔에 test를 치면
// ƒ test() {
// console.log("test");
// }

// 콘솔에 cb(test)를 치면
// test가 뜸

// 콜백함수를 부를때 소괄호() 넣으면 해당 함수를 실행함

// 인라인 이벤트
// html파일 9~11라인 확인

// 프로퍼티 리스너
const BTNGOOGLE = document.getElementById('btn_google');
BTNGOOGLE.onclick = function() {
	location.href = 'http:\/\/www.google.com'
}

// addEventListener(evevntType, function)

// 팝업창 열기
function popOpen() {
	winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500');
}

const BTNDAUM = document.getElementById('btn_daum');
let winOpen;
BTNDAUM.addEventListener('click', popOpen);

// 팝업창 닫기
function popClose() {
	winOpen.close();
}

const BTNCLOSE = document.getElementById('btn_close');
BTNCLOSE.addEventListener('click', popClose); 

// BTNCLOSE.addEventListener('click', () => popClose); 
// BTNCLOSE.addEventListener('click', () => winOpen.close()); 
// BTNCLOSE.addEventListener('click', () => popOpen.close());

// 이벤트 삭제
// 실행한 이벤트에 접근해야함
// BTNDAUM.removeEventListener('click', popOpen);
// BTNCLOSE.removeEventListener('click', popClose);


// 마우스 이벤트
const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', () => {
	prompt('삭제하시겠습니까?');
	// alert('DIV1에 들어왔습니다.');
	DIV1.style.backgroundColor = '#000000'
});