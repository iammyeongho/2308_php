// 타이머 함수

//  1. setTimeout(콜백 함수, 시간(ms)) : 일정 시간이 흐른 후에 콜백함수를 실핼
// setTimeout(() => console.log('시간'), 3000);

// 콘솔에 1초 뒤에 A, 2초 뒤에 B, 3초 뒤에 C가 출력되도록 프로그램
// setTimeout(a_log, 1000);
// setTimeout(b_log, 2000);
// setTimeout(c_log, 3000);

// function a_log() {
// 	console.log('A');
// }
// function b_log() {
// 	console.log('B');
// }
// function c_log() {
// 	console.log('C');
// }

// setTimeout(
// 	() => {
// 		console.log('A');
// 		seTimeout(
// 			() => {
// 				console.log('B');
// 				setTimeout(
// 					() => {
// 						console.log('C');
// 					}, 1000);
// 			}, 1000);
// 	}, 1000);

// function my_print(chr, ms) {
// 	setTimeout(() => console.log(chr), ms);
// }

// my_print('A', 1000);
// my_print('B', 2000);
// my_print('C', 3000);

// 2. clearTimeout(해당 setTimeout객체) : 타이머를 삭제하는 기능
// let mySet = setTimeout(() => console.log('C'), 5000);
// clearTimeout(mySet);

// 3. setInterval(콜백함수, 시간(ms)) : 일정 시간마다 반복
// let myInter = setInterval(() => console.log('하이하이'), 1000)

// 4. clearInterval(해당 setInterval) : 인터벌 삭제
// clearInterval(myInter);

// 화면을 로드하고 5초 뒤에 '두둥등장' 이라는 매우 큰 글씨가 나타나게 해주세요
// const H1 = document.createElement('h1');
// H1.innerHTML = '두등등장!';
// document.body.appendChild(H1);
// const APPEAR = document.querySelector('#appear');

setTimeout(myAddH1, 5000);

function myAddH1() {
	const H1 = document.createElement('h1');
	H1.innerHTML = '두등등장!';
	document.body.appendChild(H1)
}
const STOP = document.getElementById('stop');

STOP.addEventListener('click', popClose); 

// DIV_ALL.innerHTML = '두둥등장'