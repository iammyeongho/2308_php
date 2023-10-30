// JavaScript는 동기적인 프로그래밍 언어
// 즉, 호이스팅이 된 이후부터 개발자가 작성한 코드의 순서대로 실행

// 비동기적이라는 것은 특정 코드의 연산이 끝날 때 까지 코드의 실행을 멈추지 않고
// 다음 코드를 먼저 실행 하는 것
// 언제 코드가 실행될지 예측할 수 없음
// 타이머 함수, HTTP 요청, 이벤ㅌ ㅡ핸들러가 비동기 처리방식으로 동작

// 동기처리 방식
// console.log('A');
// console.log('B');
// console.log('C');

function my_setTimeout(callback, ms) {
	const NOW = new Date();
	let i = new Date();
	while(i - NOW <= 1000) {
		i = new Date();
	}
	callback();
}

my_setTimeout(() => console.log('1'), 1000);
my_setTimeout(() => console.log('2'), 1000);
my_setTimeout(() => console.log('3'), 1000);

// 비동기처리 방식
// console.log('A');
// setTimeout(()=> {console.log('B') }, 1000);
// console.log('C');

// a는 3초, b는 2초, c는 1초에 순차로 출력

// 콜백 지옥 (콜백 함수를 이용해 비동기를 동기로 만들기 때문에 코드가 난잡해짐): 비동기 처리를 동기처리로 하고 싶을 때 
// setTimeout( () => {
// 	console.log('A');
// 	setTimeout( () => {
// 		console.log('B');
// 		setTimeout( () => {
// 			console.log('C');
// 		},1000);
// 	},2000);
// },3000);

